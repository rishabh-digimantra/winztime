@extends('web.layout')
@section('content')

<!-- checkout Content -->
@if(session::get('paytm') == 'success')
@php Session(['paytm' => 'sasa']); @endphp
<script>
  jQuery(document).ready(function() {
    // executes when HTML-Document is loaded and DOM is ready
    jQuery("#update_cart_form").submit();
  });
</script>
@endif
<?php
$totalcoupons = 0;
$order_lpoints = 0;
?>
<div class="overlayLoader">
  <img src="{{asset('web/assets/images/loader.gif')}}">
</div>
<section class="cart-sec">

  <div class="container">

    <div class="row">

      <h2>Checkout</h2>
      <div class="alert alert-danger" id="response_cart_message" style="display: none;">Please check the available items in Stock.</div>

      <div class="alert-two alert-danger alert-dismissible payment-message" style="display: none; font-weight: 700;">
        <!-- <button type="button" class="close" data-dismiss="alert">&times;</button> -->
        <strong>Payment Failed!</strong>
      </div>
      <div class="col-lg-8">
        <div class="shopping-address-box">
          <h3>Shipping Address</h3>
          <!-- when Address is already selected-->
          <div class="row selected-address  @if(session('step')==0) panel-active @elseif(session('step')>0)  @else hide @endif">

            @foreach($result['address'] as $address)

            @isset(session('billing_address')->selectedOption)

            @if(session('billing_address')->selectedOption==$address->id)

            <div class="col-lg-9 col-md-8 col-sm-8 col-8">

              <label class="ct-container">
                {{$address->buildingno}}, {{$address->address}}, {{$address->city}}, {{$address->Country->countries_name ?? ''}},{{$address->DialCode ?? ''}} {{$address->delivery_phone}}

              </label>
              <span class="address" style="display:none;">{{$address->address}}</span>
              <span class="city" style="display:none;">{{$address->city}}</span>


            </div>

            <div class="col-lg-3 col-md-4 col-sm-4 col-4">

              <a href="javascript:;" id="changebtn">Change</a>

            </div>
            @endif
            @endisset
            @endforeach
          </div>
          <!-- end already selected-->
          <!-- when someone clicked on change -->
          <div class="address-option contFormWrp checkoutForm shopping-address-add" @isset(session('billing_address')->selectedOption) style="display:none;" @else style="display:block;" @endisset>
            @if(session()->has('success_card') )
            <script type="text/javascript">
              jQuery(document).ready(function() {
                notificationWishlist("{{ session()->get('success_card') }}");
              });
            </script>

            @endif
            <form class="checkoutShipping" enctype="multipart/form-data" action="{{ URL::to('/checkout_shipping_new_address')}}" method="post">
              <input type="hidden" name="_token" value="{{ Session::token() }}" />
              <input type="hidden" name="zone_id" id="zone_id" value="1" />
              @if(count($result['address']) > 0)
              @foreach($result['address'] as $address)
              @if($address->default_address == 1)
              <h5>Default Address</h5>
              <label class="ct-container">{{$address->buildingno}}, {{$address->address}}, {{$address->city}}, {{$address->Country->countries_name ?? '' }}, {{$address->DialCode ?? ''}} {{$address->delivery_phone}}
                <input type="radio" name="selectedOption" checked="checked" value="{{$address->id}}" @isset(session('billing_address')->selectedOption) @if(session('billing_address')->selectedOption== $address->id ) checked @endif @endisset>
                <span class="checkmark"></span>
              </label>
              <strong>
                <a href="javascript:;" id="Modaldelivery" onclick="editDeliveryInstruction({{$address->id}})" data-target="deliveryEditModal">Edit</a>
                <a href="javascript:;" id="Modaldelivery" onclick="showDeliveryInstruction({{$address->id}})" data-target="#deliveryModal">Add Delivery Instructions</a></strong>
              @endif
              @endforeach
              @endif
              @if(count($result['address']) > 1)
              <h5>Other Address</h5>
              @foreach($result['address'] as $address)
              @if($address->default_address != 1)
              <label class="ct-container">{{$address->buildingno}}, {{$address->address}}, {{$address->city}}, {{$address->Country->countries_name ?? ''}}, {{$address->DialCode}} {{$address->delivery_phone}}
                <input type="radio" name="selectedOption" value="{{$address->id}}" @isset(session('billing_address')->selectedOption) @if(session('billing_address')->selectedOption== $address->id ) checked @endif @endisset>
                <span class="checkmark"></span>
              </label>
              <strong>
                <a href="javascript:;" id="Modaldelivery" onclick="editDeliveryInstruction({{$address->id}})" data-target="deliveryEditModal">Edit</a>
                <a href="javascript:;" id="Modaldelivery" onclick="showDeliveryInstruction({{$address->id}})" data-target="#deliveryModal">Add Delivery Instructions</a>
              </strong>
              @endif
              @endforeach
              @endif

              @if(count($result['address']) > 0)
              <div class="col-md-12">

                <a href="javascript:;" id="addAddress" data-toggle="modal" data-target="#addressModal"><strong>+ <i class="fas fa-home"></i>Add a new address </strong></a>
              </div>
              <div class="col-md-12">
                <button type="submit" class="btn btn-secondary"><span>Use this address</span></button>
              </div>
              @endif
            </form>
            @if(count($result['address']) <= 0) <form class="contctForm checkout-address-form-validate" id="asd" enctype="multipart/form-data" action="{{ URL::to('/addAddress')}}" method="post">
              <input type="hidden" name="_token" value="{{ Session::token() }}" />
              <input type="hidden" name="zone_id" value="-1" />
              <div class="row">
                <div class="form-group col-md-6 col-md-6">
                  <label for=""> @lang('website.First Name')</label>
                  <input type="text" class="form-control checkout-contact-field-validate" onkeypress="return /^[ A-Za-z-_@./#${}<>,?=;'|\!%*()&+-]*$/
                      .test(event.key)" name="first_name" aria-describedby="NameHelp1" value="{{Auth::guard('customer')->user()->first_name}}" placeholder="John">
                </div>
                <div class="form-group col-md-6">
                  <label for=""> @lang('website.Last Name')</label>
                  <input type="text" class="form-control checkout-contact-field-validate" id="lastname" onkeypress="return /^[ A-Za-z-_@./#${}<>,?=;'|\!%*()&+-]*$/
                      .test(event.key)" name="last_name" value="{{Auth::guard('customer')->user()->last_name}}" aria-describedby="NameHelp1" placeholder="Doe">
                </div>
                <div class="form-group col-md-12 ">
                  <label for="">Building Name, Floor, Apartment or Villa #</label>
                  <input type="text" class="form-control checkout-contact-field-validate" name="buildingno" id="buildingno" placeholder="Princess Tower, 5th floor, Apt 5023">

                </div>
                <input type="hidden" class="form-control " id="company" aria-describedby="companyHelp" placeholder="Enter Your Company Name" name="company" value="TEST TEST">
                <div class="form-group col-md-6">
                  <label for="">Street Name</label>
                  <input type="hidden" name="DialCode" class="DialCode" value="">
                  <input type="text" class="form-control checkout-contact-field-validate" name="address" id="address" placeholder="Omar Ibn Al Khattab Street">
                </div>

                <div class="form-group col-md-6">
                  <label for=""> @lang('website.Country')</label>
                  <div class="input-group select-control">
                    <select name="countries_id" id="entry_country_id" class="form-control countriesselect checkout-contact-field-validate">
                      <option value="">Please select Country</option>
                      @if(!empty($result['countries']))
                      @foreach($result['countries'] as $single_country)

                      <option value="{{$single_country->countries_id}}" data-country="{{$single_country->countries_iso_code_2}}">{{$single_country->countries_name}}</option>
                      @endforeach
                      @endif
                    </select>
                  </div>

                </div>
                <div class="form-group  col-md-6  ">
                  <label for=""> @lang('website.City')</label>
                  <input name="city_text"  type="text" class="form-control txtOnly checkout-contact-field-validate"  placeholder="Enter city" autocomplete="off" required>

                </div>
                <div class="form-group col-md-6 citydropdown citytext d-none">
                  <label for=""> @lang('website.City')</label>
                  <select name="city" id="check_ship_city" class="form-control ">
                    <option value=""></option>
                    <option value="Abu Dhabi">Abu Dhabi</option>
                    <option value="Dubai">Dubai</option>
                    <option value="Sharjah">Sharjah</option>
                    <option value="Ajman">Ajman</option>
                    <option value="Um Al Quwain">Umm Al Quwain</option>
                    <option value="Ras Al Khaimah">Ras Al Khaimah</option>
                    <option value="Fujairah">Fujairah</option>
                  </select>
                </div>

                <input type="hidden" class="form-control" id="postcode" aria-describedby="zpcodeHelp" name="postcode" value="123123">
                <div class="form-group col-md-6">
                  <label for=""> @lang('website.Phone')</label>
                  <input class="form-control numbersOnly checkout-contact-number-validate countrycode" id="phone" name="delivery_phone" type="tel" required="required">
                  <span id="valid-msg" class="hide">✓ Valid</span>
                  <span id="error-msg" class="hide"></span>
                </div>
                <div class="form-group col-md-12">
                  <h4>Add Delivery Instructions:</h4>
                  <ul>
                    <li><input type="radio" name="addresstype" value="Home" checked>Home (7am-10pm, all days)</li>
                    <li><input type="radio" name="addresstype" value="Office">Office (7am-6pm, Weekdays)</li>
                  </ul>
                  <label class="switch">
                    <input type="checkbox" name="default_address" value="1">
                    <span class="slider"></span>
                  </label>
                  <p class="newAdSw">Make this my default address</p>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group">
                  <button type="button" onclick="checkoutcontactfieldvalidate();" class="btn btn-secondary"><span>Submit</span></button>
                </div>
              </div>
              </form>
              @endif
          </div>
          <!-- end clicked on change -->
        </div>
        <div class="cart-box" @if(session('step')==3) style="display:block;" @else style="display:none;" @endisset>
          <?php
          $price = 0;
          $customers_basket_quantity_order_summary = 0;

          ?>
          <form method='POST' id="update_cart_form" action='{{ URL::to("/place_order")}}'>

            <input onclick="paymentMethods();" id="cash_on_delivery_label" type="hidden" name="payment_method" class="form-check-input payment_method" value="cash_on_delivery" checked="checked">
            <input type="hidden" id="totalCouponChecker" name="totalCouponChecker" value="added">
            <input type="hidden" id="lpointChecker" name="lpointChecker" value="uncheck">
            <input type="hidden" id="referral_conversion" name="referral_conversion" value="{{ $result['commonContent']['setting'][129]->value}}">
            <input type="hidden" id="lpoints_conversion" name="lpoints_conversion" value="{{ $result['commonContent']['setting'][128]->value}}">
            <input type="hidden" id="transaction_id" name="transaction_id" value="0">
            <input type="hidden" id="product_price" name="product_price" value="">
            <input type="hidden" id="remaining_point" name="remaining_point" value="">
            <?php
            if (isset($_GET['ref'])) {
              $_ref = $_GET['ref'];
            } else {
              $_ref = "0";
              // Fallback behaviour goes here
            }

            ?>
            <input type="hidden" id="ref" name="ref" value="{{$_ref}}">

            @foreach( $result['cart'] as $products)
            <?php
            $price += $products->final_price * $products->customers_basket_quantity;
            ?>
            @endforeach

            <!-- <input type="hidden" id="order_lpoints" name="order_lpoints" value="{{round((10 / 100)*(session('currency_value') * $price))}}"> -->
            <input type="hidden" id="order_lpoints" name="order_lpoints" value="">
            <input type="hidden" id="reward_id" name="reward_id" value="{{$products->reward[0]->id?? ''}}">
            <?php
            $price = 0;
            $customers_basket_quantity_order_summary = 0;
            $earlybirdcoupon = 0;
            ?>
            @foreach( $result['cart'] as $products)
            <?php
            $price += $products->final_price * $products->customers_basket_quantity;
            $datacheck = $products->campaign_id[0]->no_customers - $products->total_order;
            ?>
            @if($datacheck > 0)<input type="hidden" name="earlyBirdChecker_{{$products->products_id}}" value="added"> <?php $earlybirdcoupon++; ?>@endif
            <input type="hidden" name="campaign_id" value="{{$products->campaign_id}}">
            <div class="cart-box" @if(session::get('out_of_stock')==1 and session::get('out_of_stock_product')==$products->products_id)style=" box-shadow: 0 20px 50px rgba(0,0,0,.5); border:2px solid #FF9999;"@endif>
              <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
              <input type="hidden" name="cart[]" value="{{$products->customers_basket_id}}">
              <?php
              if (!empty($products->discount_price)) {
                $discount_price = $products->discount_price * session('currency_value');
              }
              if (!empty($products->final_price)) {
                $flash_price = $products->final_price * session('currency_value');
              }
              $orignal_price = $products->price * session('currency_value');

              if (!empty($products->discount_price)) {

                if (($orignal_price + 0) > 0) {
                  $discounted_price = $orignal_price - $discount_price;
                  $discount_percentage = $discounted_price / $orignal_price * 100;
                } else {
                  $discount_percentage = 0;
                  $discounted_price = 0;
                }
              }
              ?>
              <div class="row">
                <!-- {{$datacheck}} -->
                @if($datacheck > 0 )
                <div class="flashSale">
                  <p><i class="fas fa-bolt"></i>Z-Power is here</p>
                </div>
                @endif
                <div class="col-lg-3 col-md-3 col-sm-3">
                  <div class="cart-product">
                    @if(isset($products->reward[0]->reward_image))
                    <img src="{{asset('images/'.$products->reward[0]->reward_image)}}" alt="{{$products->products_name}}">
                    @endif
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <div class="cart-inner">
                    @if(isset($products->reward[0]->title))
                    <h3><?php echo htmlspecialchars_decode($products->reward[0]->title); ?></h3>
                    @endif
                    <p>{{$products->products_name}}</p>
                    <h6>
                      @if(!empty($products->final_price))
                      {{Session::get('symbol_left')}} {{$flash_price+0}} {{Session::get('symbol_right')}}
                      @elseif(!empty($products->discount_price))
                      {{Session::get('symbol_left')}} {{$discount_price+0}} {{Session::get('symbol_right')}}
                      <span> {{Session::get('symbol_left')}} {{$orignal_price+0}}{{Session::get('symbol_right')}}</span>
                      @else
                      {{Session::get('symbol_left')}} {{$orignal_price+0}}{{Session::get('symbol_right')}}
                      @endif
                    </h6>
                    <ul>
                      <li><strong><span class="donationEach">@if($datacheck > 0 )3 @else 2 @endif</span> Coupons</strong> Per unit if donated</li>
                    </ul>
                  </div>
                </div>
                <div class="col-lg-5 col-md-5 col-sm-5">
                  <div class="cart-btn-box">
                    <div class="quantity Qty">

                      <a href="#" class="quantity__minus qtyminuscheckout  @if($products->customers_basket_quantity<=1) d-none @endif " data-type="minus"><span>-</span></a>
                      <input name="quantity[]" type="text" readonly value="{{$products->customers_basket_quantity}}" class="quantity__input qty" min="0" max="{{$products->max_order}}">
                      <a href="#" class="quantity__plus qtypluscheckout check-pro" data-type="plus"><span>Add More</span></a>
                      <a href="{{ URL::to('/deleteCart?id='.$products->customers_basket_id)}}" class="btn check-product" id="add-mre-btn"><span>Remove</span></a>
                    </div>

                    <div class="align-middle col-12 col-md-6" style="display: none;">
                      <p><strong class="donationEach">@if($datacheck > 0 ) <?php $totalcoupons += 3 * $products->customers_basket_quantity; ?>3 @else <?php $totalcoupons += 2 * $products->customers_basket_quantity; ?> 2 @endif</strong><small> COUPONS per product</small></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php $customers_basket_quantity_order_summary += $products->customers_basket_quantity; ?>
            @endforeach
            @foreach($result['shipping_methods'] as $shipping_methods)
            @if($shipping_methods['success']==1)
            @foreach($shipping_methods['services'] as $services)
            <?php
            $method_Rates = 0;
            // if($services['shipping_method']=='upsShipping')
            //   $method_name=$shipping_methods['name'].'('.$services['name'].')';
            // else{
            $method_name = $services['name'];
            $method_Rates = $services['rate'];
            // }
            ?>
            <?php
            if (!empty(session('coupon_discount'))) {
              $coupon_amount = session('currency_value') * session('coupon_discount');
            } else {
              $coupon_amount = 0;
            }

            if (!empty(session('tax_rate'))) {
              $tax_rate = session('currency_value') * session('tax_rate');
            } else {
              $tax_rate = 0;
            }
            if (!empty(session('shipping_detail')) and !empty(session('shipping_detail')) > 0) {
              $shipping_price = session('shipping_detail')->shipping_price;
              $shipping_name = session('shipping_detail')->mehtod_name;
            } else {
              $shipping_price = $method_Rates;
              $shipping_name = '';
            }

            if (empty(session('shipping_address')) || session('shipping_address')->countries_id != '231') {
              $shipping_price = 0;
              $method_Rates = 0;
            }

            $tax_rate = number_format((float)$tax_rate, 2, '.', '');
            $coupon_discount = round(number_format((float)$coupon_amount, 2, '.', ''));
            $total_price = ($price + $tax_rate + $shipping_price) - $coupon_discount;
            session(['total_price' => ($total_price)]);
            ?>
            <input type="hidden" name="method_Rates" class="method_Rates" value="{{$method_Rates}}">
            <input class="shipping_data" id="{{$method_name}}" type="hidden" name="shipping_method" value="{{$services['shipping_method']}}" shipping_price="{{$services['rate']}}" method_name="{{$method_name}}" @if(!empty(session('shipping_detail')) and !empty(session('shipping_detail'))> 0)
            @if(session('shipping_detail')->mehtod_name == $method_name) checked @endif
            @elseif($shipping_methods['is_default']==1) checked @endif
            @if($shipping_methods['is_default']==1) checked @endif
            >
            @endforeach
            @endif
            @endforeach
            @php
            if(!empty(session('coupon_discount'))){
            $coupon_amount = session('currency_value') * session('coupon_discount');
            }else{
            $coupon_amount = 0;
            }
            @endphp
          </form>
        </div>

      </div>


      <div class="col-lg-4">

        <div class="cart-price">

          <div class="row">

            <div class="col-lg-6 col-md-6 col-sm-6  col-6">

              <h4>Cart Total</h4>

            </div>

            <div class="col-lg-6 col-md-6 col-sm-6  col-6">
              <input type="hidden" name="pPrice" id="pPrice" value="{{session('currency_value') * $price+$tax_rate+$shipping_price+0-number_format((float)$coupon_amount, 2, '.', '')}}">
              <h3>{{Session::get('symbol_left')}} <span class="totalPrice">{{number_format(session('currency_value') * $price+$tax_rate+$shipping_price+0-number_format((float)$coupon_amount, 2, '.', ''))}}</span> {{Session::get('symbol_right')}}</h3>

            </div>

            <div class="col-lg-6 col-md-6 col-sm-6  col-6">

              <h5>Total Products</h5>

            </div>

            <div class="col-lg-6 col-md-6 col-sm-6  col-6">

              <h6 class="total_products">{{$customers_basket_quantity_order_summary}}</h6>

            </div>

            <div class="col-lg-6 col-md-6 col-sm-6  col-6">

              <h5 class="forFixedHeight">Donate product(s) to receive an additional entry!</h5>

            </div>

            <div class="col-lg-6 col-md-6 col-sm-6  col-6">
              <h6>
                <label class="switch">
                  <input type="checkbox" name="donation" class="donationSwitch" onclick="donationTicket()" checked>
                  <span class="slider"></span>
                </label>
              </h6>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6  col-6">

              <h5>Total Coupons</h5>

            </div>

            <div class="col-lg-6 col-md-6 col-sm-6  col-6">
              @if(isset(auth()->guard('customer')->user()->id))
              @if(auth()->guard('customer')->user()->level_id == 3)

              <?php $points = round(($result['commonContent']['setting'][132]->value / 100) * (session('currency_value') * $price)); ?>

              @elseif(auth()->guard('customer')->user()->level_id == 2)

              <?php $points = round(($result['commonContent']['setting'][131]->value / 100) * (session('currency_value') * $price)); ?>
              @else

              <?php $points = round(($result['commonContent']['setting'][130]->value / 100) * (session('currency_value') * $price)); ?>
              @endif
              @else
              <?php $points = round(($result['commonContent']['setting'][130]->value / 100) * (session('currency_value') * $price)); ?>
              @endif
              <!-- @if($datacheck > 0 ){{($customers_basket_quantity_order_summary*3)}} @else {{($customers_basket_quantity_order_summary*2)}} @endif -->
              <h6 id="totalcoupons">{{$totalcoupons}}</h6>

            </div>
            <div class="col-lg-6 col-md-6 col-sm-6  col-6">
              <h5>@lang('website.Discount(Coupon)')</h5>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6  col-6">
              <h6>{{Session::get('symbol_left')}} {{number_format((float)$coupon_amount, 2, '.', '')+0}} {{Session::get('symbol_right')}}</h6>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6  col-6">
              <h5>{{$method_name}}</h5>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6  col-6">
              <h6 class="shipping_price_all">{{Session::get('symbol_left')}} <span class="shipping_price">{{$method_Rates *session('currency_value')}}</span>{{Session::get('symbol_right')}}</h6>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6  col-6">
              <h5>VAT</h5>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6  col-6">
              <h6 class="shipping_price_all">{{Session::get('symbol_left')}} {{$tax_rate*session('currency_value')}} {{Session::get('symbol_right')}}</h6>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6  col-6">

              <h5>Expected Delivery</h5>

            </div>

            <div class="col-lg-6 col-md-6 col-sm-6  col-6">

              <h6>48 - 96 Hours</h6>

            </div>

            <div class="col-lg-12 col-md-12 col-sm-12  col-12">

              <h5>You will earn
                @if(auth()->guard('customer')->user()->level_id == 3)

                <strong class="cart-ipoint js-earned-points">{{round(($result['commonContent']['setting'][132]->value / 100)*(session('currency_value') * $price))}}</strong>

                @elseif(auth()->guard('customer')->user()->level_id == 2)

                <strong class="cart-ipoint js-earned-points">{{round(($result['commonContent']['setting'][131]->value / 100)*(session('currency_value') * $price))}}</strong>
                @else

                <strong class="cart-ipoint js-earned-points">{{round(($result['commonContent']['setting'][130]->value / 100)*(session('currency_value') * $price))}}</strong>
                @endif
                ZPoints from this purchase
              </h5>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12  col-12">
              <h5 id="remaning_text"></h5>
            </div>
          </div>

          <div class="useZpontWrp">
            <div class="row">
              <!-- <h4>Use Z-points & Save AED <span class="userLpointAED">{{round(auth()->guard('customer')->user()->redeem_points/$result['commonContent']['setting'][128]->value) }}</span></h4> -->
              <div class="col-lg-9 col-md-9 col-sm-9 col-9">
                <h5>Pay with <strong><span id="redeem_point">{{auth()->guard('customer')->user()->redeem_points}}</span> Z-points</strong> and the remaining balance with card.</h5>
              </div>
              <div class="col-lg-3 col-md-3 col-sm-3 col-3">
                <h6><label class="switch">
                    <input type="checkbox" name="lpoints-pay" id="lpoints-pay" onclick="payWLpoitns_new({{auth()->guard('customer')->user()->redeem_points}})">
                    <span class="slider"></span>
                  </label></h6>
              </div>
            </div>
          </div>

        </div>


        <!-- <a href="javascript:;" id="payment_button" class="btn" id="continue-shop-btn"><span>Payment Method</span></a> -->
        <!-- <a href="javascript:;" id="cash_on_delivery_button" class="btn" id="continue-shop-btn"><span>Payment Method</span></a> -->

        <p style="border: 1px solid black;background: black; color: white; padding: 12px;font-size: 12px;margin-top: 15px;color: #ff0;font-weight: bold;">Please do not refresh the page and wait while we will be processing your payment request. This might take a few minutes</p>
        {{-- <button href="javascript:;" onclick="paymentMethods();" id="card_label" class="btn payment_method" style="width: 100%;" @if(count($result['address'])> 0) @else disabled @endif><span>Payment Method</span></button> --}}
        <a class="btn payment_method" onclick="checkoutStripe()">Checkout</a>
        {{-- <form action="" method="post">
          <input type="hidden" name="coupon_id" value="{{ $result["old_coupon_id"] }}">
          <input type="hidden" name="l_point" val>
          <input type="hidden" name="is_donate">
          <input type="hidden" name="address_id">
          <input type="hidden" name="">
        </form> --}}
      </div>

    </div>

  </div>

</section>

<!-- checkout Content -->
<script>
  function checkoutStripe(){
    console.log('sss')
    jQuery.ajax({
		headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},
		url: '{{ route("store-card") }}',
		type: "POST",
		data: {
      'coupon_id' : '{{ $result["old_coupon_id"] }}',
      'l_point' : $('#lpointChecker').val() == 'added' ? 1 : 0,
      'is_donate' : $('#totalCouponChecker').val() == 'added' ? 1 : 0,
      'address_id' : @php echo @session('billing_address')->selectedOption @endphp,
      'transaction_id' : '',
    },
		success: function (res) {
      window.location = '{{ route("stripe.get") }}';
			jQuery('#loader').hide();
		},
	});
  }
</script>
<script>
  $('#rzp-footer-form').submit(function(e) {
    var button = $(this).find('button');
    var parent = $(this);
    button.attr('disabled', 'true').html('Please Wait...');
    $.ajax({
      method: 'get',
      url: this.action,
      data: $(this).serialize(),
      complete: function(r) {
        jQuery("#update_cart_form").submit();
      }
    })
    return false;
  })
</script>
@if(session('step')==0)
<script>
  if (jQuery('input[name="selectedOption"]').is(":checked")) {

    jQuery('.checkoutShipping').submit();
  }
</script>
@endif
<script type="text/javascript">
  function padStart(str) {
    return ('0' + str).slice(-2)
  }
  jQuery(document).on('click', '#cash_on_delivery_button, #banktransfer_button', function(e) {
    jQuery("#update_cart_form").submit();
  });

  function demoSuccessHandler(transaction) {
    jQuery("#paymentDetail").removeAttr('style');
    jQuery('#paymentID').text(transaction.razorpay_payment_id);
    var paymentDate = new Date();
    jQuery('#paymentDate').text(
      padStart(paymentDate.getDate()) + '.' + padStart(paymentDate.getMonth() + 1) + '.' + paymentDate.getFullYear() + ' ' + padStart(paymentDate.getHours()) + ':' + padStart(paymentDate.getMinutes())
    );

    jQuery.ajax({
      method: 'post',
      url: "{!!route('dopayment')!!}",
      data: {
        "_token": "{{ csrf_token() }}",
        "razorpay_payment_id": transaction.razorpay_payment_id
      },
      complete: function(r) {
        jQuery("#update_cart_form").submit();
        console.log(r);
      }
    })
  }
</script>
<?php
if (!empty($result['payment_methods'][6]) and $result['payment_methods'][6]['active'] == 1) {

  $rezorpay_key =  $result['payment_methods'][6]['RAZORPAY_KEY'];

  if (!empty($result['commonContent']['setting'][79]->value)) {
    $name = $result['commonContent']['setting'][79]->value;
  } else {
    $name = Lang::get('website.Ecommerce');
  }

  $logo = $result['commonContent']['setting'][15]->value;
?>
  <script>
    var options = {
      key: "{{ $rezorpay_key }}",
      amount: '<?php echo (float) round($total_price, 2) * 100; ?>',
      name: '{{$name}}',
      image: '{{$logo}}',
      handler: demoSuccessHandler
    }
  </script>
  <script>
    window.r = new Razorpay(options);
    document.getElementById('razor_pay_button').onclick = function() {
      r.open()
    }
  </script>

<?php
}

foreach ($result['payment_methods'] as $payment_methods) {
  if ($payment_methods['active'] == 1 and $payment_methods['payment_method'] == 'midtrans') {
    if ($payment_methods['environment'] == 'Live') {
      print '<script src="https://app.midtrans.com/snap/snap.js" data-client-key="' . $payment_methods['public_key'] . '"></script>';
    } else {
      print '<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="' . $payment_methods['public_key'] . '"></script>';
    }
  }
}
?>
<script>
  jQuery(document).ready(function() {
    var x = jQuery("#separator").text();

    jQuery('#changebtn').click(function() {
      jQuery('.address-option').show();
      jQuery('.selected-address').hide();
    });
    jQuery('#changebtnPay').click(function() {
      jQuery('.payment-option').show();
      jQuery('.selected-payment').hide();
    });
    var midtrans_environment = jQuery('#midtrans_environment').val();
    if (midtrans_environment !== undefined) {
      midtrans_environment = midtrans_environment;
    } else {
      midtrans_environment = ';'
    }
  });
</script>
<script type="text/javascript">

</script>
<div class="modal fade" id="addressModal" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add a new address</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <i class="fas fa-times"></i>
        </button>

      </div>
      <div class="modal-body contact-section">
        <form class="contctForm contct-form-validate" enctype="multipart/form-data" action="{{ URL::to('/addAddress')}}" method="post">

          <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />

          <input type="hidden" name="zone_id" id="zone_id" value="-1" />



          <div class="form-row">

            <div class="form-group">

              <label for=""> @lang('website.First Name')</label>

              <input type="text" class="form-control contact-field-validate" name="first_name" aria-describedby="NameHelp1" placeholder="John" onkeypress="return /^[ A-Za-z-_@./#${}<>,?=;'|\!%*()&+-]*$/.test(event.key)">

              <!-- <span style="color:red;" class="help-block error-content" hidden>@lang('website.Please enter your first name')</span> -->

              <!-- <span style="color:red;" class="help-block error-content" hidden>@lang('website.Please enter your first name')</span> -->

            </div>

            <div class="form-group">

              <label for=""> @lang('website.Last Name')</label>

              <input type="text" class="form-control contact-field-validate" id="lastname" name="last_name" aria-describedby="NameHelp1" placeholder="Doe" onkeypress="return /^[ A-Za-z-_@./#${}<>,?=;'|\!%*()&+-]*$/.test(event.key)">

              <!-- <span style="color:red;" class="help-block error-content" hidden>@lang('website.Please enter your last name')</span> -->

            </div>

            <div class="form-group ">

              <label for="">Building Name, Floor, Apartment or Villa #</label>

              <input type="text" class="form-control contact-field-validate" name="buildingno" id="buildingno" placeholder="Princess Tower, 5th floor, Apt 5023">

              <!-- <span style="color:red;" class="help-block error-content" hidden>Please enter your building no</span> -->

            </div>

            <input type="hidden" class="form-control contact-field-validate" id="company" aria-describedby="companyHelp" placeholder="Enter Your Company Name" name="company" value="TEST TEST">

            <div class="form-group">

              <label for="">Street Name</label>

              <input type="text" class="form-control contact-field-validate" name="address" id="address" placeholder="Omar Ibn Al Khattab Street">

              <!-- <span style="color:red;" class="help-block error-content" hidden>Please enter your street</span> -->

            </div>
            <input type="hidden" name="DialCode" class="DialCode" value="">
            <div class="form-group ">


              <label for=""> @lang('website.Country')</label>

              <div class="input-group select-control">
                <select name="countries_id" id="entry_country_id" class="form-control countriesselect contact-field-validate">
                  <option value="">Please select Country</option>
                  @if(!empty($result['countries']))
                  @foreach($result['countries'] as $single_country)

                  <option value="{{$single_country->countries_id}}" data-country="{{$single_country->countries_iso_code_2}}">{{$single_country->countries_name}}</option>
                  @endforeach
                  @endif
                </select>
              </div>
            </div>

            <div class="form-group citydropdown d-none">
              <label for=""> @lang('website.City')</label>
              <select name="city" id="check_ship_city" class="form-control">
                <option value="">Select City</option>
                <option value="Abu Dhabi">Abu Dhabi</option>
                <option value="Dubai">Dubai</option>
                <option value="Sharjah">Sharjah</option>
                <option value="Ajman">Ajman</option>
                <option value="Um Al Quwain">Umm Al Quwain</option>
                <option value="Ras Al Khaimah">Ras Al Khaimah</option>
                <option value="Fujairah">Fujairah</option>
              </select>
              <!-- <span style="color:red;" class="help-block error-content" hidden>@lang('website.Please enter your city')</span> -->
            </div>

            <div class="form-group citytext">
              <label for=""> @lang('website.City')</label>
              <input name="city_text" name="city" value="" type="text" class="form-control  ">
            </div>

            <input type="hidden" class="form-control" id="postcode" aria-describedby="zpcodeHelp" name="postcode" value="123123">

            <div class="form-group">
				      <label for=""> @lang('website.Phone')</label>
              <input class="form-control contact-field-validate countrycode" id="phone" name="delivery_phone" type="tel" required="required">
              <!-- <label for=""> Mobile Phone</label>

              <div class="flagNumImg flagNumImg2">

              <input type="number" class="form-control contact-field-validate contact-number-validate new-number-validate" onblur="checkPhone();" id="delivery_phone" aria-describedby="numberHelp" placeholder="" name="delivery_phone">

                <span class="numValImg"><img src="{{asset('web/assets/images/uaeIcon2.png')}}"><small>+971</small></span>

                <input type="hidden" name="countryCodeUAE" value="+971">

              </div> -->

              <!-- <span style="color:red;" class="help-block error-content" hidden>@lang('website.Please enter your valid phone number')</span> -->
              <span id="valid-msg" class="hide">✓ Valid</span>
              <span id="error-msg" class="hide"></span>
            </div>

            <!-- <div class="form-group">

                <label for=""> Zip-Code</label>

                <input type="text" class="form-control" id="zipcode" aria-describedby="numberHelp" placeholder="please enter zipcode" name="zipcode" value="@if(!empty(session('shipping_address'))){{session('shipping_address')->zipcode}}@endif">

                <span style="color:red;" class="help-block error-content" hidden>@lang('website.Please enter your valid zipcode')</span>

              </div> -->



            <div class="form-group  col-12">

              <h4>Add Delivery Instructions:</h4>

              <!-- <label for="addresstype"  class="form-label"> Address Type</label> -->

              <ul>

                <li><input type="radio" selected checked name="addresstype" value="Home">Home (7am-10pm, all days)</li>

                <li><input type="radio" name="addresstype" value="Office">Office (7am-6pm, Weekdays)</li>

              </ul>

              <label class="switch">

                <input type="checkbox" name="default_address" value="1">

                <span class="slider"></span>

              </label>

              <small>Make this my default address</small>

            </div>

          </div>

          <div class="form-row">

            <div class="form-group">

              <button type="button" onclick="contactfieldvalidate();" class="btn btn-secondary"><span>Add Address</span></button>

            </div>

          </div>

        </form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="cardModal" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add a New Card </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <i class="fas fa-times"></i>
        </button>
      </div>
      <div class="modal-body contact-section">
        <script src="web/assets/js/jquery.payform.min.js" charset="utf-8"></script>
        <form name="updateMyProfile" class="align-items-center contact-card-number-form-validate" enctype="multipart/form-data" action="{{ URL::to('addCardOption')}}" method="post">
          @csrf
          @if( count($errors) > 0)
          @foreach($errors->all() as $error)
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
            <span class="sr-only">@lang('website.Error'):</span>
            {{ $error }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          @endforeach
          @endif

          @if(session()->has('error'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session()->get('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          @endif

          @if(Session::has('error'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
            <span class="sr-only">@lang('website.Error'):</span>
            {{ session()->get('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          @endif

          @if(Session::has('error'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
            <span class="sr-only">@lang('website.Error'):</span>
            {!! session('loginError') !!}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          @endif

          @if(session()->has('success_card') )
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session()->get('success_card') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          @endif

          <div class="addCardOption">
            <div class="row">
              <div class="col-sm-12" id="card-number-field">
                <div class="form-group">
                  <label for="cardnumber" class="col-form-label">Card Number</label>
                  <div class="cardImgWrp2">
                    <input type="text" name="cardnumber" class="form-control contact-card-number-validation" id="cardNumber">
                    <div id="credit_cards">
                      <p class="hide" id="visa"><i class="fab fa-cc-visa"></i></p>
                      <p class="hide" id="mastercard"><i class="fab fa-cc-mastercard"></i></p>
                      <p class="hide" id="amex"><i class="fab fa-cc-amex"></i></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="cardholder" class="col-form-label">Name On Card</label>
                  <input type="text" name="cardholder" class="form-control contact-card-number-validation" onkeypress="return /^[ A-Za-z-_@./]*$/
                    .test(event.key)" id="cardholder">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="firstName" class="ol-form-label">Expiry Date</label><sub class="expMM">MM/YY</sub>
                  <!-- 
                    <input type="tel" name="expirydate" class="" id="security_code" placeholder="MM/YY"> -->
                  <input id="cc" type="text" name="expirydate" placeholder="MM/YY" class="masked form-control contact-card-number-validation" pattern="(1[0-2]|0[1-9])\/(1[5-9]|2\d)" data-valid-example="05/18" />
                </div>
              </div>
            </div>
            <!-- <div class="form-group row">
                <div class="col-sm-12">
                  <label for="security_code" class="col-form-label">Security Code</label>
                  <input type="tel" name="securitycode" class="form-control checkout-contact-field-validate" id="security_code">
                </div>
              </div>   -->
            <div class="form-group row">
              <div class="col-sm-12"><button type="button" onclick="checkoutcontactcardfieldvalidate();" class="btn saveInst">Add Card</button></div>
            </div>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="deliveryEditModal" role="dialog">

</div>
<div class="modal fade" id="deliveryModal" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add Delivery Instrustions</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <i class="fas fa-times"></i>
        </button>
      </div>

      <div class="modal-body contact-section">
        <form class="contctFormIns" enctype="multipart/form-data" action="{{ URL::to('/addDeliveryIns')}}" method="post">
          <input type="hidden" name="_token" value="{{ Session::token() }}" />
          <div id="address-wrapper">
            <!-- to view the html here open OrderControlller and look getDeliveryInstruction -->
          </div>
          <div class="row">
            <div class="col-sm-12"><button type="button" onclick="descriptionins();" class="btn saveInst"><span>Save Instructions</span></button></div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/masking-input.js" data-autoinit="true"></script>
<script type="text/javascript">
  $(function() {

    var owner = $('#owner');
    var cardNumber = $('#cardNumber');
    var cardNumberField = $('#card-number-field');
    var mastercard = $("#mastercard");
    var confirmButton = $('#confirm-purchase');
    var visa = $("#visa");
    var amex = $("#amex");


    cardNumber.payform('formatCardNumber');


    cardNumber.keyup(function() {

      amex.removeClass('show');
      visa.removeClass('show');
      mastercard.removeClass('show');

      if ($.payform.validateCardNumber(cardNumber.val()) == false) {
        cardNumberField.addClass('has-error');
      } else {
        cardNumberField.removeClass('has-error');
        cardNumberField.addClass('has-success');
      }

      if ($.payform.parseCardType(cardNumber.val()) == 'visa') {
        visa.addClass('show')
      } else if ($.payform.parseCardType(cardNumber.val()) == 'amex') {
        amex.addClass('show');
      } else if ($.payform.parseCardType(cardNumber.val()) == 'mastercard') {
        mastercard.addClass('show');
      }
    });

    confirmButton.click(function(e) {

      e.preventDefault();

      var isCardValid = $.payform.validateCardNumber(cardNumber.val());
      if (!isCardValid) {
        alert("Wrong card number");
      } else {
        alert("Everything is correct");
      }
    });
  });
</script>
<script type="text/javascript">
  // document.getElementById("totalCouponChecker").value = sessionStorage.getItem("donationSwitch");
  totalPrice = parseInt($('.totalPrice').html());
  if (sessionStorage.getItem("donationSwitch") == 'added') {
    $(".donationSwitch").attr('checked', 'checked');
    $('.shopping-address-box').css('display', 'none');
    $('.cart-box').css('display', 'block')
    $("#card_label").attr('disabled', false)
    // $('.shopping-address-add').css('display','none')
    // $(".shipping_price").html('0');
    // $('.method_Rates').val("0");
    // $('#pPrice').val(totalPrice-25);  
    // $('.totalPrice').html(totalPrice-25);
    // donationTicket();
  } else {
    $(".donationSwitch").removeAttr('checked');
    $('.shopping-address-box').css('display', 'block')
    // $(".shipping_price").html('25');
    // $('.method_Rates').val("25");
    // $('#pPrice').val(totalPrice+25);  
    // $('.totalPrice').html(totalPrice+25);
    donationTicket();
  }

  $('.donationSwitch').click(function() {
    location.reload();
  });

  function donationTicket() {

    checker = jQuery('#totalCouponChecker').val();
    total_tickets = jQuery('#totalcoupons').html();
    total_products = jQuery('.total_products').html();
    totalnoOfTickets = jQuery('.donationEach').html();
    totalPrice = parseInt(jQuery('.totalPrice').html());
    // alert(checker);
    if (checker == 'added') {
      jQuery('.donationEach').each(function() {
        if (jQuery(this).html() == 3) {
          jQuery(this).html(2);
        } else {
          jQuery(this).html(1);
        }
      });
      total_tickets = total_tickets - total_products;
      jQuery('#totalcoupons').html(total_tickets);
      sessionStorage.setItem("donationSwitch", "notAdded");
      jQuery('#totalCouponChecker').val('notAdded');
      <?php if (empty(session('shipping_address')) || session('shipping_address')->countries_id != '231') : ?>
        jQuery('.method_Rates').val("20");
        jQuery('.shipping_price').html("20");
        jQuery('#pPrice').val(totalPrice + 20);
        jQuery('.totalPrice').html(totalPrice + 20);
      <?php endif; ?>

    } else {

      jQuery('.donationEach').each(function() {
        if (jQuery(this).html() == 2) {
          jQuery(this).html(3);
        } else {
          jQuery(this).html(2);
        }
      });
      total_tickets = parseInt(total_tickets) + parseInt(total_products);
      jQuery('#totalcoupons').html(total_tickets);
      sessionStorage.setItem("donationSwitch", "added");
      jQuery('#totalCouponChecker').val('added');

      jQuery('.method_Rates').val("0");
      jQuery('.shipping_price').html("0");
      <?php if (empty(session('shipping_address')) || session('shipping_address')->countries_id != '231') : ?>
        jQuery('#pPrice').val(totalPrice - 20);
        jQuery('.totalPrice').html(totalPrice - 20);
      <?php endif; ?>
    }
  }
  $(document).ready(function() {
    var input = document.querySelector("#phone"),
      errorMsg = document.querySelector("#error-msg"),
      validMsg = document.querySelector("#valid-msg");
    var errorMap = ["Invalid number", "Invalid country code", "Too short", "Too long", "Invalid number"];
    var iti = window.intlTelInput(input, {
      utilsScript: "{{asset('web/assets/js/utils.js')}}",
      initialCountry: "auto",
      geoIpLookup: function(callback) {
        $.get('https://ipinfo.io', function() {}, "jsonp").always(function(resp) {
          var countryCode = (resp && resp.country) ? resp.country : "us";
          callback(countryCode);
        });
      }
    });
    var reset = function() {
      input.classList.remove("error");
      errorMsg.innerHTML = "";
      errorMsg.classList.add("hide");
      validMsg.classList.add("hide");
    };
    input.addEventListener('blur', function() {
      reset();
      var countryData = iti.getSelectedCountryData();
      $(".DialCode").val(countryData.dialCode);
      if (input.value.trim()) {
        if (iti.isValidNumber()) {
          validMsg.classList.remove("hide");
        } else {
          input.classList.add("error");
          var errorCode = iti.getValidationError();
          errorMsg.innerHTML = errorMap[errorCode];
          errorMsg.classList.remove("hide");
          $('#phone').val("");
        }
      }
    });
    // on keyup / change flag: reset
    input.addEventListener('change', reset);
    input.addEventListener('keyup', reset);
    var addressDropdown = document.querySelector(".countriesselect");
    addressDropdown.addEventListener('change', function() {
      var country_iso = $(this).find(':selected').attr('data-country')
      iti.setCountry(country_iso);
      input.focus();
      input.blur();
      getCity(this)
    });
  });
</script>
<style type="text/css">
  input#phone {
    height: auto;
    float: none;
    padding-left: 52px !important;
    padding-right: 6px !important;
    /* padding: 0 !important; */
  }
</style>
@endsection