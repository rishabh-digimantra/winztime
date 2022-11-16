<?php

namespace App\Models\Web;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Web\Products;
use App\Models\Core\User;
use App\Models\Web\Product_image;
use App\Models\Web\Products_description;
use App\Models\Web\Campaign;
use App\Models\Core\Campaign as camping_web;
use Lang;
use Session;

class Customers_basket extends Model
{
    protected $table = 'customers_basket';
    public $timestamps = false;
    protected $primaryKey = 'customers_basket_id';
    protected $appends = ['is_early_bird'];
    
    protected $fillable = [
        'customers_basket_id',
        'customers_id',
        'products_id',
        'customers_basket_quantity',
        'final_price',
        'customers_basket_date_added',
        'is_order',
        'campaign_id',
        'session_id',
        'created_at'
    ];


    public function getProductPriceAttribute($value)
    {
        return Products::where('products_id', $this->products_id)->value('products_price');
    }

    public function getProductNameAttribute($value)
    {
        return Products_description::where('products_id', $this->products_id)->value('products_name');
    }

    public function getProductImageAttribute($value)
    {
        $product =  Products::with('ProductImage')->where('products_id', $this->products_id)->select('products_image')->first();
        $reward = camping_web::with(['getReward'])->where('id', $this->campaign_id)->select('reward_id')->first();
        return array($product,$reward);
    }


    public function products()
    {
        return $this->belongsTo(Products::class, 'products_id', 'products_id');
    }


    public function products_image()
    {
        return $this->belongsTo(Product_image::class, 'products_id', 'products_id');
    }

    public function products_description()
    {
        return $this->belongsTo(Products_description::class, 'products_id', 'products_id');
    }

    public function camping_data()
    {
        return $this->belongsTo(Campaign::class, 'campaign_id', 'id');
    }

    public function userDetail()
    {
        return $this->belongsTo(User::class, 'customers_id', 'id');
    }

    public function getIsEarlyBirdAttribute(){
        $obj=new Campaign;
        $total_no_of_orders= $obj->Ordersofcampaign($this->campaign_id);
        $no_customers= Campaign::where('id',$this->campaign_id)->first();
        $datacheck = $no_customers->no_customers - $total_no_of_orders;
        return $datacheck;
    }
}
