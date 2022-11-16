<?php

namespace App\Repository;

use App\Models\Web\Customer;
use App\User;
use App\Models\Core\Level;
use App\Models\Web\Address;
use App\Models\Core\Setting;
use App\Http\Controllers\Web\AlertController;
use App\Repository\IUserRepository;
use Illuminate\Support\Facades\Hash;
use DB;
use Lang;
use Mail;

class UserRepository implements IUserRepository
{
    protected $user = null;
    
    public function getAllUsers()
    {
        return User::all();
    }
    
    public function getUserById($id)
    {
        return User::find($id);
    }
     public function getUserByEmail($email)
    {
        return User::where('email',$email)->first();
    }
     public function GenerateOtpcode()
    {
       return random_int(100000, 999999);

    }
    
    public function generateData($collection)
    {
        $data = [];
        $data['Validinvitationcode'] = 0;
        $data['Validinvitationcodestatus'] = 0;
        if (!empty($collection['id'])) {
            $user = $this->getUserById($collection['id']);
            $data['Validinvitationcode'] = $user->refered_by;
            $data['Validinvitationcodestatus']  =$user->refered_by_status;
            $data['six_digit_random_number'] = $user->otp_code;
            $data['password'] = $user->password;
        } else {
            if (!empty($collection['invitationcode'])) {
                $invitationcode = $collection['invitationcode'];
                $whatIWant = substr($invitationcode, strpos($invitationcode, "-") + 1);
                $ref_User_Data = $this->getUserById($whatIWant);
              
                if (isset($ref_User_Data->id)) {

                    $data['Validinvitationcode'] = $whatIWant;
                    $data['Validinvitationcodestatus'] = 1;
                }
            }
            $data['six_digit_random_number'] = $this->GenerateOtpcode();
            $data['password'] =  Hash::make($collection['password']);
        }
        
        return $data;
    }
    
    public function createOrUpdateUser($collection = [])
    {
        $id=$collection['id'] ?? null;
        $genrateData = $this->generateData($collection);



        $signuparray=array(
            'first_name' => $collection['first_name'],
            'last_name' => $collection['last_name'],
            'country_code' => $collection['country_code'],
            'phone' =>  $collection['phone'],
            'role_id' => 2,
            'email' => $collection['email'],
            'gender' => @$collection['gender'],
            'dob' => @$collection['month'] . '/' . @$collection['day'] . '/' . @$collection['year'],
            'redeem_points' => 100,
            'country_res' => @$collection['country_res'] ?: '',
        );
       
        $signuparray['password'] = $genrateData['password'];
        $signuparray['otp_code'] = $genrateData['six_digit_random_number'];


        $signuparray['refered_by'] = $genrateData['Validinvitationcode'];
        $signuparray['refered_by_status'] = $genrateData['Validinvitationcodestatus'];




        $userSave = User::updateOrCreate(
            [
                'id' => $id
            ],
            $signuparray
        );
        $message = 'User updated Sucessfully';
        if (is_null(@$collection['id'])) {
            $this->sendotpalert($userSave['id'],$genrateData['six_digit_random_number']);
            $message = 'User added Sucessfully';
        }
        return $userSave['id'];
    }
    
    public function sendotpalert($id,$otp_code){
       $myVar = new AlertController();
       $alertSetting = $myVar->checkapiresponse($id, $otp_code);
   }
    public function deleteUser($id)
    {
        return User::find($id)->delete();
    }
    
    // send alert after registration
    public function sendAlert($customer)
    {
        $userDetail = $this->getUserById($customer->id);
        $userDetail->is_otp_verify = 1;
        $userDetail->otp_code = 0;
        $userDetail->save();
        $customer_array[0] = $customer;
        $myVar = new AlertController();
        $alertSetting = $myVar->createUserAlert($customer_array);
    }
    
    public function HandleSocialLogin($collection = '')
    {
        
        if (!empty($collection['gender'])) {
            if ($collection['gender'] == 'male') {
                $customers_gender = '0';
            } else {
                $customers_gender = '1';
            }
        } else {
            $customers_gender = '0';
        }

        $customers_firstname = $collection['first_name'];
       $customers_lastname = $collection['last_name'];
        if ($collection['social_type'] == 'facebook') {
            $columln_name = "fb_id";
        } else {
            $columln_name = "google_id";
        }
        $existUser = Customer::rightJoin('users', 'customers.user_id', '=', 'users.id')
        ->where('customers.' . $columln_name, '=', $collection['social_id'])
        ->orWhere('users.email', '=', $collection['email'])->orderBy('id', 'DESC')->get();
        // print_r($existUser);die;
        if (count($existUser) > 0) {
            $user_id = $existUser[0]->id;
            //update data of customer
            User::where('id', '=', $user_id)->update([
                'first_name' => $customers_firstname,
                'last_name' => $customers_lastname,
                'email' => $collection['email'],
                'password' => Hash::make('123456'),
                'status' => '1',
                'is_otp_verify' => '1',
                'gender' => $customers_gender,
                'updated_at' => date('Y-m-d h:i:s')
            ]);
            if (empty($existUser[0]->fb_id)) {
                $customers_id = Customer::insertGetId([
                    'user_id' => $user_id,
                    $columln_name => $collection['social_id'],
                    'created_at' => date('Y-m-d h:i:s')
                ]);
            } else {
                Customer::where('user_id', '=', $user_id)->update([
                    $columln_name => $collection['social_id'],
                      'updated_at' => date('Y-m-d h:i:s')
                ]);
            }
        } else {
            //insert data of customer
            $user_id = User::insertGetId([
                'role_id' => 2,
                'first_name' => $customers_firstname,
                'last_name' => $customers_lastname,
                'email' => $collection['email'],
                'password' =>  Hash::make('123456'),
                'status' => '1',
                'is_otp_verify' => '1',
                'gender' => $customers_gender,
                'redeem_points' => 100,
                'created_at' => date('Y-m-d h:i:s')
            ]);
            $customers_id = Customer::insertGetId([
                'user_id' => $user_id,
                $columln_name => $collection['social_id'],
                 'created_at' => date('Y-m-d h:i:s')
            ]);
        }
        
        return $user_id;
    }
    
    public function UpdateTokens($id, $device_token, $jwt_token)
    {
        $affected = User::where('id', $id)->update(['device_token' => $device_token]);
        return $affected;
    }
    
    public function GetUserByToken()
    {
        $user= User::get_user();
        return $user;
    }
    
    public function MakelevelObj($current_level_id,$level='current')
    {
        if($level=='current'){
            if($current_level_id=="1"){
                $id_points='order_lpoints_percent';
                $badge='Silver-badge.png';
            }else if($current_level_id=="2"){
                $id_points='order_lpoints_percent_gold';
                $badge='Gold-badge.png';
            }else{
                $id_points='order_lpoints_percent_platinum';
                $badge='Platinum-badge.png';
            }
            $new_setting= new Setting;
            $points_to_earn=$new_setting->getSettingsByName($id_points);
            $level_pbj=  Level::where('id',$current_level_id)->get();
            $level_pbj[0]->points_to_earn= "You now earn ".$points_to_earn->value." Z-Points on every AED 100 spent for a 12 month trailing period";
            $level_pbj[0]->badge= asset('web/assets/images/').'/'.$badge;
        }
        if($level=='next'){
            
            $level_pbj=  Level::where('id','>',$current_level_id)->get();
            $level_pbj->map(function($d) use ($current_level_id) {
                if($d->id=="1"){
                    $id_points='order_lpoints_percent';
                   
                }else if($d->id=="2"){
                    $id_points='order_lpoints_percent_gold';
                
                }else{
                    $id_points='order_lpoints_percent_platinum';
                   
                }
                $new_setting= new Setting;
                $points_to_earn=$new_setting->getSettingsByName($id_points);
                $d['points_to_earn'] =  "You now earn ".$points_to_earn->value." Z-Points on every AED 100 spent for a 12 month trailing period";
              
                return $d;
            });
        }
        
        return  $level_pbj;
    }
    
    public function MakeLevelUser($current_level_id){
        $result=array();
        $result['current_level'] = $this->MakelevelObj($current_level_id);
        $result['next_levels'] = $this->MakelevelObj($current_level_id,'next');
        return $result;
    }
    public function ContactUs($collection,$email_record){
        $from = "noreply@winztime.com";
        $data = array('name' => $collection['name'], 'adminEmail' => trim($email_record->value), 'message' => $collection['message'], 'email' => $collection['email']);
        $mail_send=   Mail::send('/mail/contactUs', ['data' => $data], function ($m) use ($data) {
            $m->to($data['adminEmail'])->subject(Lang::get("website.contact us title"))->getSwiftMessage()
            ->getHeaders()
            ->addTextHeader('x-mailgun-native-send', 'true');
        });
        
        
        return 'Thank You for Contacting Us';
    }
    
    public function MyZpoints($user_id){
        $new_setting=new Setting;
        $redeem_covertion=$new_setting->getSettingsByName('redeem_covertion');
        $result=DB::select("select coalesce(SUM(CASE WHEN type='1' THEN lpoints_points END),0) as lpointsorder_count,coalesce(SUM(CASE WHEN type='2' THEN lpoints_points END),0) as lpointsreffrel_count
        FROM lpoints where customers_id=".$user_id);
        $spent_l_points_array=DB::select("select coalesce(SUM(spent_lpoints),0) as spent_lpoints FROM orders where customers_id=".$user_id);
        $result[0]->spent_l_points=$spent_l_points_array[0]->spent_lpoints;
        $result[0]->total_earned=  number_format($result[0]->lpointsorder_count + $result[0]->lpointsreffrel_count);
        $result[0]->redeem_points=$this->getUserById($user_id)->redeem_points;
        $result[0]->worth_aed=$result[0]->redeem_points/$redeem_covertion->value;
        return $result;
    }
    
    public function addAddress($data){
         $id=$data['id'] ?? null;
        if ($data['addresstype'] == "home") {
            $data['addresstype_home'] = 1;
        } else {
            $data['addresstype_office'] = 1;
        }
        if (isset($data['default_address']) && $data['default_address'] == "1") {
            Address::where('user_id',$data['user_id'])->update(['default_address'=>0]);
        }
        $add_Count = Address::where('user_id',$data['user_id'])->count();
        if ($add_Count == 0) {
            $data['default_address'] = 1;
        }
 
        /*if(!empty($data['DialCode'])){
         $data['DialCode']='+'.$data['DialCode'];
        }*/

      //  $data['city']=$request->city_text;  
      $userSave = Address::updateOrCreate(
            [
                'id' => $id
            ],

             $data
);

       // $total = Address::updateOrCreate($data);   
        $message = "Address has been added successfully! ";
        return $message;
    }

     public function updatePassword($collection)
    {
     $user= $this->getUserByEmail($collection['email']);
     $user->password= Hash::make($collection['password']);
     $user->save();
     return $user;
    }

    public function getSocialurl($collection){
        if($collection['type']=="facebook"){
            $url=url('/').'/campaigns/detail/'.$collection['campaign_id'];

        }

         else if($collection['type']=="facebook"){
            $url=url('/').'/campaigns/detail/'.$collection['campaign_id'];

        }

    }
}
