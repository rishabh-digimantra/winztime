<?php



namespace App\Models\Core;

use App\Models\Web\Ticket;
use http\Env\Request;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

use Kyslik\ColumnSortable\Sortable;
// use App\Models\Web\Products;

class Campaign extends Model

{

    //

    use Sortable;



    public $sortable = ['id', 'title', 'start_date', 'end_date', 'product_id', 'reward_id', 'type_id', 'no_of_orders', 'no_customers', 'status', 'created_at', 'updated_at', '_token'];

    protected $fillable = [
        'id', 'title', 'start_date', 'end_date', 'product_id', 'reward_id', 'type_id', 'status', 'created_at', 'updated_at', 'campaign_code', 'no_customers', 'campaign_type', 'no_of_orders', 'is_banner_active', 'winner_coupon_no', 'winner_name'
    ];

    public function email()
    {





        $emails = DB::table('users')->select('email')->get();



        return $emails;
    }



    public function cutomers()
    {



        $products = DB::table('products')

            ->LeftJoin('products_description', 'products_description.products_id', '=', 'products.products_id')

            ->select('products_name', 'products.products_id', 'products.products_model')->get();





        return $products;
    }

    public function campaignLeftStatus($id)

    {

        $data = DB::table('orders')->where('campaign_id', $id)->get();

        return $data;
    }

    public function getProductInfo($id)

    {

        $products = DB::table('products_description')->where('products_id', $id)->get();

        return $products;
    }

    public function getRewardInfo($id)

    {

        $rewards = DB::table('rewards')->where('id', $id)->get();



        return $rewards;
    }

    public function categories()
    {



        $categories = DB::table('categories')

            ->LeftJoin('categories_description', 'categories_description.categories_id', '=', 'categories.categories_id')

            ->select('categories_name', 'categories.categories_id')

            ->where('parent_id', '>', '0')

            ->get();





        return $categories;
    }



    public  function getcampaigntickets($id)
    {

        $campaignInfo = DB::table('tickets')->where('campaign_id', '=', $id)->where('status', '!=', 0)->orderBy('ticket_number', 'Desc')->get();

        return $campaignInfo;
    }

    public  function campaign($code)
    {



        $campaignInfo = DB::table('campaigns')->where('code', '=', $code)->get();



        return $campaignInfo;
    }



    public function addcampaign($title, $start_date, $end_date, $product_id, $reward_id, $type_id, $status)
    {





        $campaign_id = DB::table('campaigns')->insertGetId([

            'title'                      =>   $title,

            'start_date'                      =>   $start_date,

            'end_date'                      =>   $end_date,

            'product_id'                     =>   $product_id,

            'reward_id'                     =>   $reward_id,

            'type_id'                    =>   $type_id,

            'status'                        =>   $status



        ]);

        return $campaign_id;
    }

    public static function getcampaign($id)
    {



        $campaign = DB::table('campaigns')->where('id', '=', $id)->get();

        // dd($campaign);



        return $campaign;
    }



    public function getemail()
    {



        $emails = DB::table('users')->select('email')->get();



        return $emails;
    }



    public function getproduct()
    {



        $products = DB::table('products')

            ->LeftJoin('products_description', 'products_description.products_id', '=', 'products.products_id')

            ->select('products_name', 'products.products_id', 'products.products_model')->get();





        return $products;
    }

    public function getcategories()
    {



        $categories = DB::table('categories')

            ->LeftJoin('categories_description', 'categories_description.categories_id', '=', 'categories.categories_id')

            ->select('categories_name', 'categories.categories_id')

            ->where('parent_id', '>', '0')

            ->get();



        return $categories;
    }



    public function getcode($code)
    {



        $campaignInfo = DB::table('campaigns')->where('code', '=', $code)->get();





        return $campaignInfo;
    }



    public function campaignupdate(
        $coupans_id,
        $code,
        $description,
        $discount_type,
        $amount,
        $individual_use,

        $product_ids,
        $exclude_product_ids,
        $usage_limit,
        $usage_limit_per_user,
        $usage_count,

        $limit_usage_to_x_items,
        $product_categories,
        $used_by,
        $excluded_product_categories,

        $request,
        $email_restrictions,
        $minimum_amount,
        $maximum_amount,
        $expiry_date,
        $free_shipping
    ) {



        //insert record

        $campaign_id = DB::table('campaigns')->where('coupans_id', '=', $coupans_id)->update([

            'code'                        =>   $code,

            'updated_at'                 =>   date('Y-m-d H:i:s'),

            'description'                 =>   $description,

            'discount_type'                  =>   $discount_type,

            'amount'                       =>   $amount,

            'individual_use'              =>   $individual_use,

            'product_ids'                  =>   $product_ids,

            'exclude_product_ids'         =>   $exclude_product_ids,

            'usage_limit'                  =>   $usage_limit,

            'usage_limit_per_user'          =>   $usage_limit_per_user,

            'usage_count'          =>           $usage_count,

            'limit_usage_to_x_items'     =>   $limit_usage_to_x_items,

            'product_categories'          =>   $product_categories,

            'used_by'          =>   $used_by,

            'excluded_product_categories' =>   $excluded_product_categories,

            'exclude_sale_items'         =>   $request->exclude_sale_items,

            'email_restrictions'          =>   $email_restrictions,

            'minimum_amount'              =>   $minimum_amount,

            'maximum_amount'              =>   $maximum_amount,

            'expiry_date'                 =>      $expiry_date,

            'free_shipping'                 =>   $free_shipping

        ]);



        return $campaign_id;
    }



    public function deletecampaign($request)
    {



        $deletecampaign = DB::table('campaigns')->where('coupans_id', '=', $request->id)->delete();





        return $deletecampaign;
    }





    public function campaignproduct()
    {
        $campaigns = DB::table('products')->get();
        return $campaigns;
    }

    public function winnerList()
    {
        return $this->hasMany(Winner::class, 'campaigns_id', 'id');
    }

    public function getReward()
    {
        return $this->hasone(Reward::class, 'id', 'reward_id');
    }

    public function getProducts()
    {
        return $this->hasone(Products::class, 'products_id', 'product_id');
    }

    public function getTicket()
    {
        return $this->hasMany(Ticket::class, 'campaign_id', 'id')->where('type', 'O');
    }
    
    public function getProductImage()
    {
        # code...
    }
}
