<?php

namespace App\Traits;

use stdClass;

trait RespondsWithHttpStatusv2
{
    protected function respose($data)
    {

        $main_array=array( 'success' => $data['status'],  'message' => $data['message'] ,'data' => $data['data'] ?? new \stdClass());
        if(isset($data['total_amount'])){
          $main_array['total_amount']  =$data['total_amount'];
        }
        if(isset($data['shipping_price'])){
          $main_array['shipping_price']  =$data['shipping_price'];
        }
        if(isset($data['points_to_earn'])){
          $main_array['points_to_earn']  =$data['points_to_earn'];
        }
         if(isset($data['cart_items'])){
          $main_array['cart_items']  =$data['cart_items'];
        }
        if(isset($data['redeem_points'])){
          $main_array['redeem_points']  =$data['redeem_points'];
        }
        return response($main_array,$data['code']);
    }
    
    protected function success($message, $data = [], $status = 200)
    {
        return response([
            'success' => true,
            'data' => $data,
            'message' => $message,
        ], $status);
    }

    protected function failure($message, $status = 400)
    {
        return response([
            'success' => false,
            'message' => $message,
        ], $status);
    }
}