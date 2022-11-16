<?php

namespace App\Repository;

use App\Models\Web\Campaign;
use App\Models\Web\Ticket;
use App\User;
use App\Http\Controllers\Web\AlertController;
use App\Repository\ICampaignRepository;
use Illuminate\Support\Facades\Hash;
use DB;
use Carbon;

class CampaignRepository implements ICampaignRepository
{
    protected $campaign = null;

    public function getActiveCampaigns($user_id = 0)
    {
        // liked_products.liked_products_id = campaigns.product_id AND 
        $today = date('Y-m-d 00:00:00');
        $campaigns = Campaign::with(array('Product:products_id,products_price,products_image', 'ProductDescription:products_id,products_name,products_description', 'Reward:id,title,reward_image,reward_description', 'Product.ProductImage:image_id,path'))
            ->select('campaigns.id as campaigns_id', 'campaigns.title as campaigns_title', 'campaigns.end_date', 'campaigns.reward_id', 'campaigns.product_id', 'no_of_orders', 'no_customers', 'campaign_type', 'start_date', 'end_date', (DB::raw("( CASE WHEN EXISTS (
              SELECT *
              FROM liked_products
              WHERE liked_products.liked_customers_id = " . $user_id . "
              ) THEN TRUE
              ELSE FALSE END)
              AS is_like")))
            ->orderBy('campaigns.id', 'desc')
            ->where('start_date', '<=', $today)
            ->where('end_date', '>=', $today)
            // ->groupBy('campaigns.id')
            ->where('campaigns.status', '1')
            // ->whereRaw('campaigns.end_date >= CURDATE()')
            ->get();
        return $campaigns;
    }

    public function getCloseCampaigns($user_id = 0)
    {
        $day_after = Carbon\Carbon::now()->addDay(10)->format('Y-m-d 00:00:00');
        $campaigns = Campaign::with(array('Product:products_id,products_price,products_image', 'ProductDescription:products_id,products_name,products_description', 'Reward:id,title,reward_image,reward_description', 'Product.ProductImage:image_id,path'))->select('campaigns.id as campaigns_id', 'campaigns.title as campaigns_title', 'campaigns.end_date', 'campaigns.reward_id', 'campaigns.product_id', 'no_of_orders', 'no_customers', 'campaign_type', (DB::raw("( CASE WHEN EXISTS (
            SELECT *
            FROM liked_products
            WHERE liked_products.liked_products_id = campaigns.product_id
            AND liked_products.liked_customers_id = " . $user_id . "
            ) THEN TRUE
            ELSE FALSE END)
            AS is_like")))
            ->where('campaign_type', '!=', 'regular')
            ->orderBy('campaigns.id', 'desc')
            ->where('campaigns.status', '1')
            ->where('end_date', '<=', $day_after)
            ->get();
        return $campaigns;
    }

    public function getCampaignById($user_id = 0, $id)
    {
        return $campaigns = Campaign::with(array('Product:products_id,products_price,products_image', 'ProductDescription:products_id,products_name,products_description', 'Reward:id,title,reward_image,reward_description', 'Product.ProductImage:image_id,path'))->select('campaigns.id as campaigns_id', 'campaigns.title as campaigns_title', 'campaigns.end_date', 'campaigns.reward_id', 'campaigns.product_id', 'no_of_orders', 'no_customers', 'campaign_type', (DB::raw("( CASE WHEN EXISTS (
            SELECT *
            FROM liked_products
            WHERE liked_products.liked_products_id = campaigns.product_id
            AND liked_products.liked_customers_id = " . $user_id . "
            ) THEN TRUE
            ELSE FALSE END)
            AS is_like")))
            ->where('campaigns.id',$id)
            ->first();
        // return Campaign::with('Product:products_id,products_price,products_image', 'ProductDescription:products_id,products_name,products_description', 'Reward:id,title,reward_image,reward_description', 'Product.ProductImage:image_id,path')->find($id);
    }

    public static function getOrderProductTicketsApp($order_id, $products_id, $user)
    {

        $tickets = Ticket::with(array('Product:products_id,products_price,products_image', 'ProductDescription:products_id,products_name,products_description', 'Reward:id,title,reward_image,reward_description', 'Product.ProductImage:image_id,path'))->select('tickets.ticket_number', 'tickets.customers_id', 'tickets.products_id as product_id', 'tickets.campaign_id', 'tickets.type', 'tickets.reward_id')->where('tickets.products_id', $products_id)->where('tickets.customers_id', $user)->where('orders_id', $order_id)->get();

        return  $tickets;
    }
}
