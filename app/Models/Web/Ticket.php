<?php

namespace App\Models\Web;

use DB;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{

protected $appends = ['coupon_number'];
	   /** Get the product that owns the ticket.
     */
    public function Product()
    {
        return $this->hasOne(Products::class,'products_id','product_id');
    }

    /**
     * Get the product description that owns the ticket.
     */
    public function ProductDescription()
    {
        return $this->hasOne(Products_description::class,'products_id','product_id');
    }


    /**
     * Get the Reward Details that owns the ticket.
     */
    public function Reward()
    {
        return $this->hasOne('App\Models\Web\Reward','id','reward_id');
    }

    
    function sequenceNumber($id) {

  $slots = '00000';

  $len = strlen($id);

 

  if ($len >! 5) {

    $num = -1 * abs($len);



    $seq = substr_replace($slots,$id,$num);

    return $seq;

  }else{

    return $id;

  }

}

public function GetCouponNumberAttribute($value) {

    return 'Z-'.$this->sequenceNumber($this->campaign_id).'-'.$this->sequenceNumber($this->ticket_number).'-'.$this->type;

}

}