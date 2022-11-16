<?php
$price = 0;
$customers_basket_quantity_order_summary = 0;
?>
@foreach( $result['cart'] as $products)
<?php
$price+= $products->final_price * $products->customers_basket_quantity;

$orignal_price = $products->price * session('currency_value');

if(!empty(session('shipping_detail')) and !empty(session('shipping_detail'))>0){
                      $shipping_price = session('shipping_detail')->shipping_price;
                      $shipping_name = session('shipping_detail')->mehtod_name;
                    }else{
                      $shipping_price = 0;
                      $shipping_name = '';
                    }
?>
<?php $customers_basket_quantity_order_summary += $products->customers_basket_quantity; ?>
@endforeach
@php
    if(!empty(session('coupon_discount'))){
    $coupon_amount = session('currency_value') * session('coupon_discount');  
  }else{
  $coupon_amount = 0;
}
@endphp

<table class="table right-table">
  <thead>
    <tr>
      <th scope="col" colspan="2" align="center">@lang('website.Order Summary')</th>
    </tr>
  </thead>     
  <tbody>
    <tr>
      <th scope="row">Total Products</th>
      <td align="right" class="total_products">{{$customers_basket_quantity_order_summary}}</td>
    </tr>
    <tr>
      <th scope="row">Total Coupons</th>
      <td align="right" id="totalcoupons">{{$customers_basket_quantity_order_summary*2}}</td>
      <input type="hidden" id="totalCouponChecker" value="added">
      <input type="hidden" id="lpointChecker" value="uncheck">
    </tr>
    <tr>
      <th scope="row">Donate to receive an <br>additional entry! <sub>I agree to donate all purchased products to charity as per the "Terms & Conditions"</sub></th>
      <td align="right"><label class="switch">
        <input type="checkbox" name="donation" onclick="donationTicket()"  checked>
        <span class="slider"></span>
      </label></td>
    </tr>
    <tr class="lpoints">
      <td scope="row" colspan="2">
        <sub> You will earn
          <strong class="cart-ipoint js-earned-points">{{round((10 / 100)*(session('currency_value') * $price))}}</strong>
          <strong> L-Points</strong> 
        from this purchase</sub>
      </td>
    </tr>
    <tr>
              <th scope="row">Shipping Charge</th>
              <td align="right">{{Session::get('symbol_left')}} {{$shipping_price*session('currency_value')}}{{Session::get('symbol_right')}}</td>

            </tr>
            <tr>
              <th scope="row">Expected Delivery</th>
              <td align="right">48 - 96 Hours</td>

            </tr>
    <tr class="item-price">
      <th scope="row"><strong>@lang('website.Total')</strong><sub>Prices inclusive of VAT<sub></th>
        <td align="right" >
          <strong>{{Session::get('symbol_left')}} 
          <span  class="totalPrice">{{number_format(session('currency_value') * $price+0-number_format((float)$coupon_amount, 2, '.', ''))}}
          </span> {{Session::get('symbol_right')}}
        </strong>
      </td>
      </tr>
    </tbody>
  </table>
  <!-- <div class="LpointsWrpBox">
    <h5>No L-Points available</h5>
    <p>You can use your available L-Points for your purchases.</p>
  </div> -->
  <div class="LpointsWrpBox LpointsWrpBox2">
    <h4>pay using L-Points</h4>
    <div class="lpointCrt">
      <h5>Use L-points & Save AED <span class="userLpointAED">20</span></h5>
      <p>Pay with <strong>100 L-points</strong> and the remaining<br> balance with card.</p>
      <label class="switch">
        <input type="checkbox" name="lpoints-pay" onclick="payWLpoitns()">
        <span class="slider"></span>
      </label>
    </div>
  </div>


