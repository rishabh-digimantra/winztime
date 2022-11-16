<?php

namespace App\Models\Web;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Web\Ticket;
use Lang;
use phpDocumentor\Reflection\Types\Self_;
use Session;
use Carbon;

class Campaign extends Model
{
    protected $table = 'campaigns';

    protected $appends = ['total_order_string', 'percent', 'is_early_bird','day_left'];


    /**
     * Get the product that owns the Campaign.
     */
    public function Product()
    {
        return $this->hasOne(Products::class, 'products_id', 'product_id');
    }

    /**
     * Get the product description that owns the Campaign.
     */
    public function ProductDescription()
    {
        return $this->hasOne(Products_description::class, 'products_id', 'product_id');
    }

    /**
     * Get the Tickets that owns the Campaign.
     */
    public function Coupons()
    {
        return $this->hasMany(Ticket::class);
    }


    /**
     * Get the Reward Details that owns the Campaign.
     */
    public function Reward()
    {
        return $this->hasOne('App\Models\Web\Reward', 'id', 'reward_id');
    }


    public function Ordersofcampaign($campaigns_id)
    {
        $total_order = Ticket::where('campaign_id', $campaigns_id)->where('type', 'O')->count();
        return $total_order;
    }

    public function getTotalOrderStringAttribute($value)
    {
        $campaign_id = $this->id ?: $this->campaigns_id;
        return $total_orders = $this->Ordersofcampaign($campaign_id);
        if ($this->campaign_type == "countdown") {
            $now = time(); // or your date as well
            $your_date = strtotime($this->end_date);
            if ($your_date >= $now) {
                $datediff = $your_date - $now;
            } else {
                $datediff =  $now - $your_date;
            }

            $days = round($datediff / (60 * 60 * 24));
            return $days;
        }
        return $total_orders;
    }
    // Get active campaigns percent value
    public function getPercentAttribute($value)
    {
        $campaign_id = $this->id;
        $total_orders = $this->Ordersofcampaign($campaign_id);
        if ($this->campaign_type == "countdown") {
            $now = time(); // or your date as well
            $your_date = strtotime($this->end_date);
            if ($your_date >= $now) {
                $datediff = $your_date - $now;
            } else {
                $datediff =  $now - $your_date;
            }
            $days = round($datediff / (60 * 60 * 24));
            $finalvalue = (100 - $days) / 100;
            if ($days > 100) {
                $finalvalue = ($days - 100) / 100;
            }
            return $finalvalue;
        }
        return floatval($total_orders / $this->no_of_orders);
    }

    public function getIsEarlyBirdAttribute()
    {
        $id = @$this->id ?? $this->campaigns_id;
        $total_no_of_orders = $this->Ordersofcampaign($id);
        $datacheck = $this->no_customers - $total_no_of_orders;
        return $datacheck;
    }

    public function getDayLeftAttribute()
    {
        $now = Carbon\Carbon::now();
        $date = Carbon\Carbon::parse($this->end_date);
        return $date->diffInDays($now);
    }
}
