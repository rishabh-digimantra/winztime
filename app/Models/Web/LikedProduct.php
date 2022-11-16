<?php

namespace App\Models\Web;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class LikedProduct extends Model
{
  public $primaryKey="like_id";
public $timestamps=false;
  protected $table="liked_products";
  protected $fillable=['liked_customers_id','liked_products_id','date_liked','campaign_id'];


   /**
     * Get the product.
     */
    public function Product()
    {
        return $this->hasOne(Products::class,'products_id','liked_products_id');
    }

  
   /**
     * Get the Campaign.
     */
    public function Campaign()
    {
        return $this->hasOne(Campaign::class,'id','campaign_id');
    }

}
