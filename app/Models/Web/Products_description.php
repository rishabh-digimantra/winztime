<?php

namespace App\Models\Web;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Products_description extends Model
{
    protected $table = 'products_description';

     public function getProductsDescriptionAttribute($value)
    {   
       
       return strip_tags($value);
    }

}