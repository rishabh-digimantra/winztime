<?php

namespace App\Models\Core;

use http\Env\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Kyslik\ColumnSortable\Sortable;

class Ticket extends Model
{
    //
    use Sortable;

    public $sortable =['id', 'title', 'start_date', 'end_date', 'product_id', 'reward_id', 'type_id', 'status','created_at','updated_at','_token'];
    protected $fillable = ['id', 'type', 'customer_id','product_id','campaign_id', 'order_id', 'status'];
    public function email(){


        $emails = DB::table('users')->select('email')->get();

        return $emails;

    }

    public function cutomers(){

        $products = DB::table('products')
            ->LeftJoin('products_description', 'products_description.products_id', '=', 'products.products_id')
            ->select('products_name', 'products.products_id', 'products.products_model')->get();


        return $products;

    }

    public function categories(){

        $categories = DB::table('categories')
            ->LeftJoin('categories_description', 'categories_description.categories_id', '=', 'categories.categories_id')
            ->select('categories_name', 'categories.categories_id')
            ->where('parent_id', '>', '0')
            ->get();


        return $categories;


    }

    public  function campaignInfo($id){

        $campaignInfo = DB::table('campaigns')->where('id','=', $id)->get();
        return $campaignInfo;
    }
    public  function customerInfo($id){

        $customerInfo = DB::table('users')->where('id','=', $id)->get();

        return $customerInfo;
    }
    public  function orderTotal($id){

        $orderInfo = DB::table('orders')->where('orders_id', $id)->pluck('order_price');
       
        return $orderInfo[0];
    }
    public function addcampaign($title,$start_date,$end_date,$product_id,$reward_id,$type_id,$status){


        $campaign_id = DB::table('campaigns')->insertGetId([
            'title'     =>   $title,
            'start_date'        =>   $start_date,
            'end_date'      =>   $end_date,
            'product_id'        =>   $product_id,
            'reward_id'     =>   $reward_id,
            'type_id'       =>   $type_id,
            'status'        =>   $status
            
        ]);
        return $campaign_id;
    }
   public function getcampaign($id){

       $campaign = DB::table('campaigns')->where('id', '=', $id)->get();


        return $campaign;
   }

   public function getemail(){

       $emails = DB::table('users')->select('email')->get();

       return $emails;

   }

   public function getproduct(){

       $products = DB::table('products')
           ->LeftJoin('products_description', 'products_description.products_id', '=', 'products.products_id')
           ->select('products_name', 'products.products_id', 'products.products_model')->get();


       return $products;

   }
     public function getcategories(){

         $categories = DB::table('categories')
             ->LeftJoin('categories_description', 'categories_description.categories_id', '=', 'categories.categories_id')
             ->select('categories_name', 'categories.categories_id')
             ->where('parent_id', '>', '0')
             ->get();

         return $categories;


     }

     public function getcode($code){

         $campaignInfo = DB::table('campaigns')->where('code','=', $code)->get();


         return $campaignInfo;


     }

     public function campaignupdate($coupans_id,$code,$description,$discount_type, $amount,$individual_use,
                                  $product_ids, $exclude_product_ids, $usage_limit,$usage_limit_per_user, $usage_count,
                                  $limit_usage_to_x_items, $product_categories,$used_by, $excluded_product_categories,
                                  $request,$email_restrictions,$minimum_amount,$maximum_amount,$expiry_date,$free_shipping){

         //insert record
         $campaign_id = DB::table('campaigns')->where('coupans_id', '=', $coupans_id)->update([
             'code'  	 				 =>   $code,
             'updated_at'				 =>   date('Y-m-d H:i:s'),
             'description'				 =>   $description,
             'discount_type'	 			 =>   $discount_type,
             'amount'	 	 			 =>   $amount,
             'individual_use'	 		 =>   $individual_use,
             'product_ids'	 			 =>   $product_ids,
             'exclude_product_ids'		 =>   $exclude_product_ids,
             'usage_limit'	 			 =>   $usage_limit,
             'usage_limit_per_user'	 	 =>   $usage_limit_per_user,
             'usage_count'	 	 =>           $usage_count,
             'limit_usage_to_x_items'	 =>   $limit_usage_to_x_items,
             'product_categories'	 	 =>   $product_categories,
             'used_by'	 	 =>   $used_by,
             'excluded_product_categories'=>   $excluded_product_categories,
             'exclude_sale_items'		 =>   $request->exclude_sale_items,
             'email_restrictions'	 	 =>   $email_restrictions,
             'minimum_amount'	 		 =>   $minimum_amount,
             'maximum_amount'	 		 =>   $maximum_amount,
             'expiry_date'				 =>	  $expiry_date,
             'free_shipping'				 =>   $free_shipping
         ]);

         return $campaign_id;

     }

     public function deletecampaign($request){

        $deletecampaign = DB::table('campaigns')->where('coupans_id', '=', $request->id)->delete();


        return $deletecampaign;

     }


     public function campaignproduct(){

         $campaigns = DB::table('products')->get();


         return $campaigns;


     }



}
