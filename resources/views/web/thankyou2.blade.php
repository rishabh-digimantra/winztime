@extends('web.layout')
@section('content')

<section class="pro-content empty-content">
  <div class="heading">
    <h2 class="">Thank You</h2>
  </div>
  <div class="row">
    <div class="col-md-8">
      <div class="activeWrp pro-empty-page">
        <?php 
              $shipping_price = 0;
              $coupon_amount = 0;
              $price = 0; 
              $customers_basket_quantity_order_summary = 0; 
              $customers_basket_quantity_order_summary += $result['commonContent']['cart'][0]->customers_basket_quantity; ?>
        <h2 style="font-size: 150px;"><i class="far fa-check-circle"></i></h2>
        <h1 >@lang('website.Thank You')</h1>
        <p>
          @lang('website.You have successfully place your order')
        </p>
      </div>
    </div>
    
    <div class="col-12 col-lg-4">
      <table class="table right-table">
          <thead>
            <tr>
              <th scope="col" colspan="2" align="center">@lang('website.Order Summary')</th>                    
            </tr>
          </thead>
          <tbody>

            <tr>
              <th scope="row">Total Products</th>
              <td align="right">{{$customers_basket_quantity_order_summary}}</td>
            </tr>
            <tr>
              <th scope="row">Total Coupons</th>
              <td align="right" id="totalcoupons">{{$customers_basket_quantity_order_summary*2}}</td>
              <input type="hidden" id="totalCouponChecker" value="added">
            </tr>
            <tr>
              <th scope="row">Donate to receive <br>additional entries! <sub>I agree to donate all purchased products to charity as per the "Draw Terms & Conditions"</sub></th>
              <td align="right"><label class="switch">
                <input type="checkbox" name="donation" onclick="donationTicket()"  checked>
                <span class="slider"></span>
              </label></td>
            </tr>
            <tr>
              <td scope="row">
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
                <td align="right" ><strong>{{Session::get('symbol_left')}} <span id="separator">{{number_format(session('currency_value') * $price+0-number_format((float)$coupon_amount, 2, '.', '')+$shipping_price)}}</span> {{Session::get('symbol_right')}}</strong></td>
              </tr>
            </tbody>
          </table>
    </div>
    <div class="col-12">
      
    </div>
  </div>  
</section> 

@endsection
