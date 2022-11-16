@extends('web.layout')
@section('content')

<!-- checkout Content -->
<section class="checkout-area">

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
  $order_lpoints = 0;
 ?>
<section class="pro-content main-section">

  <div class="heading">
    <h2> @lang('website.Checkout') </h2>
  </div>
  <!-- </div> -->
  <!-- checkout Content -->
  <section class="checkout-area">
    <div class="row">
      <div class="col-12 col-lg-8 checkout-left">
        <div class="contFormWrp">
          <input type="hidden" id="hyperpayresponse" value="@if(!empty(session('paymentResponse'))) @if(session('paymentResponse')=='success') {{session('paymentResponse')}} @else {{session('paymentResponse')}}  @endif @endif">

          <div class="alert alert-danger alert-dismissible" id="paymentError" role="alert" style="display:none;">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <input type="hidden" name="session_steps" value="{{session('step')}}">
            @if(!empty(session('paymentResponse')) and session('paymentResponse')=='error') {{session('paymentResponseData') }} @endif
          </div>
          <div class="myCheck">
            <div class="checkout-module">
              <div class="myCheckWrap @if(session('step')==0) panel-active @elseif(session('step')>0)  @else hide @endif">
                <div class="row">
                  <div class="col-md-12"><h4>1. Shipping Address</h4></div>
                  <hr> 
                  <div class="col-md-12 selected-address"  @isset(session('billing_address')->selectedOption) style="display:block;" @else style="display:none;" @endisset>
                    @foreach($result['address'] as $address)
                    @isset(session('billing_address')->selectedOption)
                    @if(session('billing_address')->selectedOption==$address->id)
                    <address>
                      <p class="changeAddress">
                        <b>{{$address->first_name}} {{$address->last_name}}</b>, 
                        {{$address->buildingno}},
                        {{$address->address}},
                        {{$address->city}},
                        United Arab Emirates,
                         <span dir="ltr"> +971{{$address->delivery_phone}}</span>
                      </p>
                      <a href="javascript:;" id="changebtn">Change</a>
                    </address>  
                    @endif
                    @endisset
                    @endforeach
                  </div>

                  <hr> 
                  <div class="col-md-12 address-option" @isset(session('billing_address')->selectedOption) style="display:none;" @else style="display:block;" @endisset>
                    @if(session()->has('success_card') )
                    <script type="text/javascript">
                      jQuery(document).ready(function() {
                        notificationWishlist("{{ session()->get('success_card') }}");
                      });
                    </script>

                    @endif
                    <form class="" enctype="multipart/form-data"  action="{{ URL::to('/checkout_shipping_new_address')}}" method="post">
                      <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                      <input type="hidden"  name="zone_id" id="zone_id" value="-1" />
                      <div class="row">
                        @if(Auth::guard('customer')->check())
                        @if(count($result['address']) > 0)
                        <div class="col-md-12">
                          @foreach($result['address'] as $address)
                          @if($address->default_address == 1)
                          <h3>Default Address</h3>
                          <ul class="address_{{$address->id}} myAddress">
                            <li> 
                              <address>
                                <input type="radio" name="selectedOption" checked="checked" value="{{$address->id}}" 
                                @isset(session('billing_address')->selectedOption) @if(session('billing_address')->selectedOption== $address->id ) checked @endif @endisset>
                                <b>{{$address->first_name}} {{$address->last_name}}</b>, 
                                {{$address->buildingno}}, {{$address->address}},
                                {{$address->city}},
                                United Arab Emirates,
                                 <span dir="ltr"> +971{{$address->delivery_phone}}</span>
                                <!-- data-toggle="modal" -->
                                <strong>
                                  <!-- <a href="edit-address/{{$address->id}}"> -->
                                <a href="javascript:;" id="Modaldelivery" onclick="editDeliveryInstruction({{$address->id}})"  data-target="deliveryEditModal">Edit</a><a href="javascript:;" id="Modaldelivery" onclick="showDeliveryInstruction({{$address->id}})"  data-target="#deliveryModal">Add Delivery Instructions</a></strong>
                              </address>
                            </li>
                          </ul>
                          @endif
                          @endforeach
                          @if(count($result['address']) > 1)
                          <h3>Other Addresses</h3>
                          @foreach($result['address'] as $address)
                          @if($address->default_address != 1)
                          <ul class="address_{{$address->id}} myAddress">
                            <li> 
                              <address>
                                <input type="radio" name="selectedOption" value="{{$address->id}}" @isset(session('billing_address')->selectedOption) @if(session('billing_address')->selectedOption==$address->id) checked @endif @endisset>
                                <b>{{$address->first_name}} {{$address->last_name}}</b>, 
                                {{$address->buildingno}},
                                {{$address->address}},
                                {{$address->city}},
                                United Arab Emirates,
                                 <span dir="ltr"> +971{{$address->delivery_phone}}</span>
                                <!-- <a href="edit-address/{{$address->id}}"> -->
                                <strong><a href="javascript:;" id="Modaldelivery" onclick="editDeliveryInstruction({{$address->id}})"  data-target="deliveryEditModal">Edit</a><a href="javascript:;" id="Modaldelivery" onclick="showDeliveryInstruction({{$address->id}})"  data-target="#deliveryModal">Add Delivery Instructions</a></strong>
                              </address>
                            </li>
                          </ul>
                          @endif
                          @endforeach  
                          @endif
                        </div>
                        @endif
                        <div class="col-md-12">
                            <a href="javascript:;" id="addAddress"  data-toggle="modal" data-target="#addressModal"><strong>+ <i class="fas fa-home"></i>Add a new address </strong></a>
                        </div>
                        <hr>
                          @if(count($result['address']) > 0)
                          <div class="col-md-12">
                            <button type="submit" class="btn btn-secondary">Use this address</button>
                          </div>
                          @endif
                        @else
                        <p>Please <a href="login">Login/Register</a> to place an order.</p>
                        @endif 
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <!-- <div class="myCheckWrap  @if(session('step')==2) paanel-active @elseif(session('step')>2) @else hide @endif">
                <div class="row">
                  <div class="col-md-12"><h4>2. Payment Method</h4></div>
                  <div class="col-md-12 selected-payment" @isset(session('shipping_detail')->selectedCardOption) style="display:block;" @else style="display:none;" @endisset>
                    @foreach($result['card_option'] as $card)
                    @isset(session('shipping_detail')->selectedCardOption)
                    @if(session('shipping_detail')->selectedCardOption == $card->id)
                    <table class="table">
                      <thead>
                          <tbody>
                            <tr>
                              <td> @if($card->card_img == "visa")<i class="fab fa-cc-visa"></i>@elseif($card->card_img == "mastercard")<i class="fab fa-cc-mastercard"></i>@elseif($card->card_img == "amex")<i class="fab fa-cc-amex"></i>@endif Ending in {{substr($card->cardnumber, -4)}}</td>
                              <td class="text-center">{{$card->cardholder}}</td>
                              <td class="text-center">{{$card->expirydate}}</td>
                              <td><strong><a href="javascript:;" id="changebtnPay">Change</a></strong></td>
                            </tr>
                          </tbody>
                        </table>
                        @endif
                        @endisset
                        @endforeach                           
                      </div>
                      <div class="col-md-12 payment-option" @isset(session('shipping_detail')->selectedCardOption) style="display:none;" @else style="display:block;" @endisset>
                        <form  method="post" id="shipping_mehtods_form" enctype="multipart/form-data" action="{{ URL::to('/checkout_payment_method')}}">
                          <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                          @if(!empty($result['shipping_methods'])>0)
                          <input type="hidden" name="mehtod_name" id="mehtod_name">
                          <input type="hidden" name="shipping_price" id="shipping_price">
                          <table class="table">
                            <thead>
                              <tr>
                                <th>Your Credit or Debit Card</th>
                                <th class="text-center">Name On Card</th>
                                <th class="text-center">Expiry Date</th>
                              </tr>
                            </thead>
                            <tbody>
                              @if(Auth::guard('customer')->check())
                              @if(count($result['card_option']) > 0 )
                              <?php $i = 0; ?>
                              @foreach($result['card_option'] as $card)
                              <tr>
                                <td>@if($card->card_img == "visa")<i class="fab fa-cc-visa"></i>@elseif($card->card_img == "mastercard")<i class="fab fa-cc-mastercard"></i>@elseif($card->card_img == "amex")<i class="fab fa-cc-amex"></i>@endif<label><input required="required" type="radio" name="selectedCardOption" onclick="openResCvv({{$card->id}})" value="{{$card->id}}"  @isset(session('shipping_detail')->selectedCardOption) @if(session('shipping_detail')->selectedCardOption==$card->id) checked @endif  @endisset>Ending in {{substr($card->cardnumber, -4)}}</label><span class="selectChecker cvv_{{$card->id}}"><label>cvv <a href="javascript:;" class="cvvPopBtn" card_id="{{$card->id}}">(?)</a>: <ul class="cvvPop{{$card->id}} cvvPop"><a href="javascript:;" close_cv="{{$card->id}}" class="toClose"><i class="fas fa-times"></i></a><li><p>The CVV number is the last three digits at the back of your card.</p></li><li><img src="{{asset('web/assets/images/cvvImg.gif')}}" alt="*"></li></ul></label><input type="password" maxlength="3" onkeypress="return /^[0-9]*$/.test(event.key)" name="cvvNum_{{$card->id}}" class="form-control" ></span></td>
                                <td class="text-center">{{$card->cardholder}}</td>
                                <td class="text-center">{{$card->expirydate}}</td>
                              </tr>
                              <?php $i++; ?>
                              @endforeach
                              @endif
                              @else
                              <p>Please <a href="login">Login/Register</a> to place an order.</p>
                              @endif 
                            </tbody>
                          </table>
                          @foreach($result['shipping_methods'] as $shipping_methods)
                          <div class="heading">
                            <hr>
                          </div>
                          <div class="form-check">
                        <div class="form-row" >
                          @if($shipping_methods['success']==1)
                            @foreach($shipping_methods['services'] as $services)
                            <?php
                            if($services['shipping_method']=='upsShipping')
                              $method_name=$shipping_methods['name'].'('.$services['name'].')';
                            else{
                              $method_name=$services['name'];
                              $method_Rates=$services['rate'];
                            }
                            ?>
                              <input class="shipping_data" id="{{$method_name}}" type="hidden" name="shipping_method" value="{{$services['shipping_method']}}" shipping_price="{{$services['rate']}}"  method_name="{{$method_name}}" @if(!empty(session('shipping_detail')) and !empty(session('shipping_detail')) > 0)
                              @if(session('shipping_detail')->mehtod_name == $method_name) checked @endif
                              @elseif($shipping_methods['is_default']==1) checked @endif
                              @if($shipping_methods['is_default']==1) checked @endif
                              >
                            @endforeach
                          </ul>
                          @else
                          <ul class="list"style="list-style:none; padding: 0px;">
                            <li>@lang('website.Your location does not support this') {{$shipping_methods['name']}}.</li>
                          </ul>
                          @endif
                        </div>
                        <hr>
                      </div>
                      @endforeach
                      @endif
                      <div class="alert alert-danger alert-dismissible error_shipping" role="alert" style="display:none;">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        @lang('website.Please select your shipping method')
                      </div>
                      <div class="col-12 col-md-12">
                        <div class="row">
                          <a href="javascript:;" id="addAddress"  data-toggle="modal" data-target="#cardModal"><strong>+<i class="fas fa-credit-card"></i> Add a credit or debit card - <small>Lucramania accepts all major cards</small> </strong></a>
                        </div>
                      </div>
                      <div class="col-12 col-sm-12">
                        <div class="row">
                        <button type="submit"class="btn btn-secondary">Use this card</button>
                      </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div> -->
              <div class="myCheckWrap cart-content  @if(session('step')==3) panel-active @elseif(session('step')>3) @else hide @endif">
                <div class="row ">
                  <div class="col-md-12"><h4>2. Order Summary</h4></div>
                  <div class="col-md-12 cart-area cart-page-one">
                    <?php
                    $price = 0;
                    $customers_basket_quantity_order_summary = 0;
                    ?>
                    <form method='POST' id="update_cart_form" action='{{ URL::to("/place_order")}}' >
                      <input onclick="paymentMethods();" id="cash_on_delivery_label" type="hidden" name="payment_method" class="form-check-input payment_method" value="cash_on_delivery" checked="checked">
                      <input type="hidden" id="totalCouponChecker" name="totalCouponChecker" value="added">
                      <input type="hidden" id="lpointChecker" name="lpointChecker" value="uncheck">
                      <input type="hidden" id="referral_conversion" name="referral_conversion" value="{{ $result['commonContent']['setting'][129]->value}}">
                      <input type="hidden" id="lpoints_conversion" name="lpoints_conversion" value="{{ $result['commonContent']['setting'][128]->value}}">
                      <input type="hidden" id="transaction_id" name="transaction_id" value="0">


                        @foreach( $result['cart'] as $products) 
                        <?php
                        $price += $products->final_price * $products->customers_basket_quantity;
                        ?>
                        @endforeach
                      <input type="hidden" id="order_lpoints" name="order_lpoints" value="{{round((10 / 100)*(session('currency_value') * $price))}}">
                      <input type="hidden" id="reward_id" name="reward_id" value="{{$products->reward[0]->id}}">
                      
                      <table class="table top-table">

                        <?php

                        $price = 0;
                        $customers_basket_quantity_order_summary = 0;
                        $earlybirdcoupon = 0;
                        ?>
                        @foreach( $result['cart'] as $products) 
                        <?php
                        $price += $products->final_price * $products->customers_basket_quantity;
                        $datacheck = $products->campaign_id[0]->no_customers-$products->total_order;
                        
                        ?>
                        <input type="hidden" name="campaign_id" value="{{$products->campaign_id}}">
                        
                        @if($datacheck > 0)<input type="hidden" name="earlyBirdChecker" value="added"> <?php $earlybirdcoupon++; ?>@endif
                        <tbody  @if(session::get('out_of_stock') == 1 and session::get('out_of_stock_product') == $products->products_id)style="  box-shadow: 0 20px 50px rgba(0,0,0,.5); border:2px solid #FF9999;"@endif>

                          <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                          <input type="hidden" name="cart[]" value="{{$products->customers_basket_id}}">
                          <?php
                          if(!empty($products->discount_price)){
                            $discount_price = $products->discount_price * session('currency_value');
                          }
                          if(!empty($products->final_price)){
                            $flash_price = $products->final_price * session('currency_value');
                          }
                          $orignal_price = $products->price * session('currency_value');

                          if(!empty($products->discount_price)){

                            if(($orignal_price+0)>0){
                              $discounted_price = $orignal_price-$discount_price;
                              $discount_percentage = $discounted_price/$orignal_price*100;
                            }else{
                             $discount_percentage = 0;
                             $discounted_price = 0;
                           }
                         }
                         ?>
                         <tr class="d-flex myTxtWrpInr2">
                          <td class="item-price col-12 col-md-4" >
                            @if($datacheck > 0 )
                            <div class="flashSale">
                            <p><i class="fas fa-bolt"></i>Early Bird offer is active </p>
                            </div>
                          @endif
                            <h3>Buy</h3>
                            <figure class="prodCrtImg">
                              <img class="img-fluid" src="{{asset('').$products->image_path}}" alt="{{$products->products_name}}"/>
                            </figure> 
                          </td>
                          <td class="col-12 col-md-3 item-detail-left" style="opacity: 0;">

                            <div class="item-detail priceCrtWrp">

                              <h4>
                               <strong> @if(!empty($products->final_price))
                                {{Session::get('symbol_left')}} <span class="org_price">{{$flash_price+0}}</span> {{Session::get('symbol_right')}}
                                @elseif(!empty($products->discount_price))
                                {{Session::get('symbol_left')}} {{$discount_price+0}} {{Session::get('symbol_right')}}
                                <span> {{Session::get('symbol_left')}} <span class="org_price">{{$orignal_price+0}}</span>{{Session::get('symbol_right')}}</span>
                                @else
                                {{Session::get('symbol_left')}} {{$orignal_price+0}}{{Session::get('symbol_right')}}
                              @endif</strong>
                            </h4>
                          </div> 

                        </td>

                        <td class="item-price col-12 col-md-4">
                         <h3>Win</h3>
                         <figure class="prodCrtImg"> <img src="{{asset('images/'.$products->reward[0]->reward_image)}}"></figure>

                       </td>
                        <!-- <td class="col-12 col-md-3"> 
                          
                        </td> -->
                        <td class="align-middle item-total col-12 col-md-1 Qty" align="left">
                          <div class="input-group item-quantity">                         
                            <input name="quantity[]" type="text" readonly value="{{$products->customers_basket_quantity}}" class="form-control qty" min="{{$products->min_order}}" max="{{$products->max_order}}">
                            <span class="input-group-btn ">
                              <button type="button" value="quantity" class="quantity-right-plus btn qtypluscheckout" data-type="plus" data-field="">                                  
                                <span class="fas fa-plus"></span>
                              </button>
                              <button type="button" value="quantity" class="quantity-left-minus btn qtyminuscheckout" data-type="minus" data-field="">
                                <span class="fas fa-minus"></span>
                              </button>            
                            </span>
                          </div>
                        </td>
                      </tr>
                      <tr class="d-flex myTxtWrpInr">
                        <td class="item-price col-12 col-md-4"> <div class="item-detail productDescWrp">
                              <!-- <sub>Unit Price</sub>
                              <h4>
                                @if(!empty($products->final_price))
                               {{Session::get('symbol_left')}} {{$flash_price+0}} {{Session::get('symbol_right')}}
                               @elseif(!empty($products->discount_price))
                               {{Session::get('symbol_left')}} {{$discount_price+0}} {{Session::get('symbol_right')}}
                               <span> {{Session::get('symbol_left')}} {{$orignal_price+0}}{{Session::get('symbol_right')}}</span>
                               @else
                               {{Session::get('symbol_left')}} {{$orignal_price+0}}{{Session::get('symbol_right')}}
                               @endif
                             </h4> -->
                             <!-- <sup>Product</sup> -->
                             <h4><!-- {{$products->products_name}} -->{!!str_limit($products->products_name,30,'')!!}</h4>
                              <!-- <div class="item-controls">
                                <a href="{{ URL::to('/deleteCart?id='.$products->customers_basket_id)}}"  class="btn" >
                                  <span class="fas fa-times"></span>
                                  Delete
                                </a>
                              </div> -->                          
                            </div></td>
                            <td class="col-12 col-md-3 item-detail-left">

                              <div class="item-detail priceCrtWrp">

                                <h4>
                                 <strong> @if(!empty($products->final_price))
                                  {{Session::get('symbol_left')}} {{$flash_price+0}} {{Session::get('symbol_right')}}
                                  @elseif(!empty($products->discount_price))
                                  {{Session::get('symbol_left')}} {{$discount_price+0}} {{Session::get('symbol_right')}}
                                  <span> {{Session::get('symbol_left')}} {{$orignal_price+0}}{{Session::get('symbol_right')}}</span>
                                  @else
                                  {{Session::get('symbol_left')}} {{$orignal_price+0}}{{Session::get('symbol_right')}}
                                @endif</strong>
                              </h4>
                            </div> 

                          </td>
                          <td class="item-price col-12 col-md-4"><div class="item-detail">
                            <!-- <sup>Reward</sup> --><h4>{!!str_limit($products->reward[0]->title,30,'')!!}</h4>  
                          </div>  

                          <!-- <span class="cart_price_{{$products->customers_basket_id}}">
                            {{Session::get('symbol_left')}} {{$products->final_price * $products->customers_basket_quantity * session('currency_value')}} {{Session::get('symbol_right')}}
                          </span> --></td>
                          <td class="align-middle item-total col-12 col-md-1 deleteCartItemWrp" align="left">
                            <sup><a href="{{ URL::to('/deleteCart?id='.$products->customers_basket_id)}}"  class="deleteCartItem" >
                              <strong>Delete</strong>
                            </a></sup></td>
                          </tr>
                          <tr class="d-flex alter totalPriceWrp">
                            <input type="hidden" name="no_of_tickets" id="hiddenTicket" value="2">
                            <td class="align-middle col-12 col-md-6"><p><strong class="donationEach">@if($datacheck > 0 )3 @else 2 @endif</strong><small> COUPONS per product</small></p></td>

                            <td class="align-middle col-12 col-md-6 text-right"><p><small>Item Total:</small><strong> AED <span class="itemtotal">{{number_format($products->customers_basket_quantity*$orignal_price)}}</span></strong></p></td>
                          </tr>
                          <!-- <tr class="totalPrice"><td><p><small>Item Total:</small> AED {{$products->customers_basket_quantity*$orignal_price}}</p></td></tr> -->
                        </tbody>
                        <?php $customers_basket_quantity_order_summary += $products->customers_basket_quantity; ?>
                        @endforeach
                      </table>
                    </form>
                    <?php
                    if(!empty(session('coupon_discount'))){
                      $coupon_amount = session('currency_value') * session('coupon_discount');  
                    }else{
                      $coupon_amount = 0;
                    }

                    if(!empty(session('tax_rate'))){
                      $tax_rate = session('currency_value') * session('tax_rate');  
                    }else{
                      $tax_rate = 0;
                    }

                    if(!empty(session('shipping_detail')) and !empty(session('shipping_detail'))>0){
                      $shipping_price = session('shipping_detail')->shipping_price;
                      $shipping_name = session('shipping_detail')->mehtod_name;
                    }else{
                      $shipping_price = $method_Rates;
                      $shipping_name = '';
                    }

                                                          // dd($price,$tax_rate,$shipping_price);
                    $tax_rate = number_format((float)$tax_rate, 2, '.', '');
                    $coupon_discount = number_format((float)$coupon_amount, 2, '.', '');
                    $total_price = ($price+$tax_rate+$shipping_price)-$coupon_discount;
                    session(['total_price'=>($total_price)]);

                    ?>
                    <!-- <div class="row">
                      <div class="col-12 col-sm-12">
                        <div class="heading">
                          <h4>@lang('website.orderNotesandSummary')</h4>
                        </div>
                        <div class="form-group" style="width:100%; padding:0;">
                          <label for="exampleFormControlTextarea1">@lang('website.Please write notes of your order')</label>
                          <textarea name="comments" id="exampleFormControlTextarea1"  class="form-control" id="order_comments" rows="3">@if(!empty(session('order_comments'))){{session('order_comments')}}@endif</textarea>
                        </div>
                      </div>
                    </div> -->

                    <div class="row">
                      <div class="col-12 col-sm-12 mb-3">
                       <!--  <div class="heading">
                          <h3>@lang('website.Payment Methods'):</h3>
                          <hr>
                        </div> -->

                        <!-- <div class="alert alert-danger error_payment" style="display:none" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          @lang('website.Please select your payment method')
                        </div> -->


                        <form name="shipping_mehtods" method="post" id="payment_mehtods_form" enctype="multipart/form-data" action="{{ URL::to('/order_detail')}}">
                          <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                          <input onclick="paymentMethods();" id="cash_on_delivery_label" type="hidden" name="payment_method" class="form-check-input payment_method" value="cash_on_delivery" checked="checked">
                          <!-- <div class="form-group" style="width:100%; padding:0;">
                            <label for="exampleFormControlTextarea1" style="width:100%; margin-bottom:30px;">@lang('website.Please select a prefered payment method to use on this order')</label>

                            @foreach($result['payment_methods'] as $payment_methods)

                            @if($payment_methods['active']==1)
                            <input id="payment_currency" type="hidden" onClick="paymentMethods();" name="payment_currency" value="{{$payment_methods['payment_currency']}}">
                            @if($payment_methods['payment_method']=='braintree')

                            <input id="{{$payment_methods['payment_method']}}_public_key" type="hidden" name="public_key" value="{{$payment_methods['public_key']}}">
                            <input id="{{$payment_methods['payment_method']}}_environment" type="hidden" name="{{$payment_methods['payment_method']}}_environment" value="{{$payment_mehtods_form['environment']}}">


                            <div class="form-check form-check-inline">
                              <input id="{{$payment_methods['payment_method']}}_label" type="radio" onClick="paymentMethods();" name="payment_method" class="form-check-input payment_method" value="{{$payment_methods['payment_method']}}" @if(!empty(session('payment_method'))) @if(session('payment_method')==$payment_methods['payment_method']) checked @endif @endif>
                              <label class="form-check-label" for="{{$payment_methods['payment_method']}}_label"><img src="{{asset('web/images/miscellaneous').'/'.$payment_methods['payment_method'].'.png'}}" alt="{{$payment_methods['name']}}"></label>
                            </div>
                            @else

                            <input id="{{$payment_methods['payment_method']}}_public_key" type="hidden" name="public_key" value="{{$payment_methods['public_key']}}">
                            <input id="{{$payment_methods['payment_method']}}_environment" type="hidden" name="{{$payment_methods['payment_method']}}_environment" value="{{$payment_methods['environment']}}">


                            <div class="form-check form-check-inline">
                              <input onClick="paymentMethods();" id="{{$payment_methods['payment_method']}}_label" type="radio" name="payment_method" class="form-check-input payment_method" value="{{$payment_methods['payment_method']}}" @if(!empty(session('payment_method'))) @if(session('payment_method')==$payment_methods['payment_method']) checked @endif @endif>
                              <label class="form-check-label" for="{{$payment_methods['payment_method']}}_label">
                                @if(file_exists( 'web/images/miscellaneous/'.$payment_methods['payment_method'].'.png'))
                                <img width="100px" src="{{asset('web/images/miscellaneous/').'/'.$payment_methods['payment_method'].'.png'}}" alt="{{$payment_methods['name']}}">
                                @else
                                {{$payment_methods['name']}}
                                @endif
                              </label>
                            </div>
                            @endif  
                            @endif

                            @endforeach 

                          </div> -->
                        </form>
                        <div class="button">
                          @if(isset(session('billing_address')->selectedOption)) 
                          <button id="payment_button" class="btn btn-secondary" ><strong>Place Your Order</strong></button>
                          <!-- <button id="cash_on_delivery_button" class="btn btn-secondary" ><strong>Place Your Order</strong></button> -->
                          @endif
                          @foreach($result['payment_methods'] as $payment_methods)
                          @if($payment_methods['active']==1 and $payment_methods['payment_method']=='banktransfer')
                          <div class="alert alert-info alert-dismissible" id="payment_description" role="alert" style="display: none">
                            <span>{{$payment_methods['descriptions']}}</span>
                          </div>
                          @endif
                          @endforeach

                          <!--- paypal -->
                          <div id="paypal_button" class="payment_btns" style="display: none"></div>

                          <button id="braintree_button" style="display: none" class="btn btn-dark payment_btns" data-toggle="modal" data-target="#braintreeModel" >@lang('website.Order Now')</button>

                          <button id="stripe_button" class="btn btn-dark payment_btns" style="display: none" data-toggle="modal" data-target="#stripeModel" >@lang('website.Order Now')</button>

                          
                          <button id="razor_pay_button" class="razorpay-payment-button btn btn-dark payment_btns"  style="display: none"  type="button">@lang('website.Order Now')</button>
                          <a href="{{ URL::to('/store_paytm')}}" id="pay_tm_button" class="btn btn-dark payment_btns"  style="display: none"  type="button">@lang('website.Order Now')</a>

                          <button id="instamojo_button" class="btn btn-dark payment_btns" style="display: none" data-toggle="modal" data-target="#instamojoModel">@lang('website.Order Now')</button>

                          <a href="{{ URL::to('/checkout/hyperpay')}}" id="hyperpay_button" class="btn btn-dark payment_btns" style="display: none">@lang('website.Order Now')</a>
                          <button id="banktransfer_button" class="btn btn-dark payment_btns" style="display: none">@lang('website.Order Now')</button>
                          <button id="paystack_button" class="btn btn-dark payment_btns" style="display: none">@lang('website.Order Now')</button>

                          <button id="midtrans_button" class="btn btn-dark payment_btns" style="display: none">@lang('website.Order Now')</button>
                          <input type="hidden" id="midtransToken" value="">
                          {{-- payment error content show --}}
                          <div class="alert alert-danger alert-dismissible" id="payment_error" role="alert" style="display: none">
                            <span class="sr-only">@lang('website.Error'):</span>
                            <span id="payment_error-error-text"></span>
                          </div>

                        </div>
                      </div>
                      <!-- The braintree Modal -->
                      <div class="modal fade" id="braintreeModel">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <form id="checkout" method="post" action="{{ URL::to('/place_order')}}">
                              <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                              <!-- Modal Header -->
                              <div class="modal-header">
                                <h4 class="modal-title">@lang('website.BrainTree Payment')</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                              </div>
                              <div class="modal-body">
                                <div id="payment-form"></div>
                              </div>
                              <div class="modal-footer">
                                <button type="submit" class="btn btn-dark">@lang('website.Pay') {{Session::get('symbol_left')}} {{number_format((float)$total_price+0, 2, '.', '')}}{{Session::get('symbol_right')}}</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>

                      <!-- The instamojo Modal -->
                      <div class="modal fade" id="instamojoModel">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <form id="instamojo_form" method="post" action="">
                              <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                              <input type="hidden" name="amount" value="{{number_format((float)$total_price+0, 2, '.', '')}}">
                              <!-- Modal Header -->
                              <div class="modal-header">
                                <h4 class="modal-title">@lang('website.Instamojo Payment')</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                              </div>
                              <div class="modal-body">
                                <div class="from-group mb-3">
                                  <div class="col-12"> <label for="inlineFormInputGroup">@lang('website.Full Name')</label></div>
                                  <div class="input-group col-12">
                                    <input type="text" name="firstName" id="firstName" placeholder="@lang('website.Full Name')" class="form-control">
                                    <span class="help-block error-content" hidden>@lang('website.Please enter your full name')</span>
                                  </div>
                                </div>
                                <div class="from-group mb-3">
                                  <div class="col-12"> <label for="inlineFormInputGroup">@lang('website.Email')</label></div>
                                  <div class="input-group col-12">
                                    <input type="text" name="email_id" id="email_id" placeholder="@lang('website.Email')" class="form-control">
                                    <span class="help-block error-content" hidden>@lang('website.Please enter your email address')</span>
                                  </div>
                                </div>
                                <div class="from-group mb-3">
                                  <div class="col-12"> <label for="inlineFormInputGroup">@lang('website.Phone Number')</label></div>
                                  <div class="input-group col-12">
                                    <input type="text" name="phone_number" id="insta_phone_number" placeholder="@lang('website.Phone Number')" class="form-control">
                                    <span class="help-block error-content" hidden>@lang('website.Please enter your valid phone number')</span>
                                  </div>
                                </div>                                                       

                                <div class="alert alert-danger alert-dismissible" id="insta_mojo_error" role="alert" style="display: none">
                                  <span class="sr-only">@lang('website.Error'):</span>
                                  <span id="instamojo-error-text"></span>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" id="pay_instamojo" class="btn btn-dark">@lang('website.Pay') {{$web_setting[19]->value}}{{number_format((float)$total_price+0, 2, '.', '')}}</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>

                      <!-- The stripe Modal -->
                      <div class="modal fade" id="stripeModel">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <main>
                              <div class="container-lg">
                                <div class="cell example example2">
                                  <form>
                                    <div class="row">
                                      <div class="field">
                                        <div id="example2-card-number" class="input empty"></div>
                                        <label for="example2-card-number" data-tid="elements_examples.form.card_number_label">@lang('website.Card number')</label>
                                        <div class="baseline"></div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="field half-width">
                                        <div id="example2-card-expiry" class="input empty"></div>
                                        <label for="example2-card-expiry" data-tid="elements_examples.form.card_expiry_label">@lang('website.Expiration')</label>
                                        <div class="baseline"></div>
                                      </div>
                                      <div class="field half-width">
                                        <div id="example2-card-cvc" class="input empty"></div>
                                        <label for="example2-card-cvc" data-tid="elements_examples.form.card_cvc_label">@lang('website.CVC')</label>
                                        <div class="baseline"></div>
                                      </div>
                                    </div>
                                    <button type="submit" class="btn btn-dark" data-tid="elements_examples.form.pay_button">@lang('website.Pay') {{$web_setting[19]->value}}{{number_format((float)$total_price+0, 2, '.', '')}}</button>

                                    <div class="error" role="alert"><svg xmlns="https://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17">
                                      <path class="base" fill="#000" d="M8.5,17 C3.80557963,17 0,13.1944204 0,8.5 C0,3.80557963 3.80557963,0 8.5,0 C13.1944204,0 17,3.80557963 17,8.5 C17,13.1944204 13.1944204,17 8.5,17 Z"></path>
                                      <path class="glyph" fill="#FFF" d="M8.5,7.29791847 L6.12604076,4.92395924 C5.79409512,4.59201359 5.25590488,4.59201359 4.92395924,4.92395924 C4.59201359,5.25590488 4.59201359,5.79409512 4.92395924,6.12604076 L7.29791847,8.5 L4.92395924,10.8739592 C4.59201359,11.2059049 4.59201359,11.7440951 4.92395924,12.0760408 C5.25590488,12.4079864 5.79409512,12.4079864 6.12604076,12.0760408 L8.5,9.70208153 L10.8739592,12.0760408 C11.2059049,12.4079864 11.7440951,12.4079864 12.0760408,12.0760408 C12.4079864,11.7440951 12.4079864,11.2059049 12.0760408,10.8739592 L9.70208153,8.5 L12.0760408,6.12604076 C12.4079864,5.79409512 12.4079864,5.25590488 12.0760408,4.92395924 C11.7440951,4.59201359 11.2059049,4.59201359 10.8739592,4.92395924 L8.5,7.29791847 L8.5,7.29791847 Z"></path>
                                    </svg>
                                    <span class="message"></span></div>
                                  </form>
                                  <div class="success">
                                    <div class="icon">
                                      <svg width="84px" height="84px" viewBox="0 0 84 84" version="1.1" xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink">
                                        <circle class="border" cx="42" cy="42" r="40" stroke-linecap="round" stroke-width="4" stroke="#000" fill="none"></circle>
                                        <path class="checkmark" stroke-linecap="round" stroke-linejoin="round" d="M23.375 42.5488281 36.8840688 56.0578969 64.891932 28.0500338" stroke-width="4" stroke="#000" fill="none"></path>
                                      </svg>
                                    </div>
                                    <h3 class="title" data-tid="elements_examples.success.title">@lang('website.Payment successful')</h3>
                                    <p class="message"><span data-tid="elements_examples.success.message">@lang('website.Thanks You Your payment has been processed successfully')</span></p>
                                  </div>
                                </div>
                              </div>
                            </main>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-12 col-lg-4 checkout-right cart-page-one cart-area">
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
              <td align="right" id="totalcoupons">@if($datacheck > 0 ){{($customers_basket_quantity_order_summary*3)}} @else {{($customers_basket_quantity_order_summary*2)}} @endif</td>
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
                  @if(auth()->guard('customer')->user()->level_id == 3)

                    <strong class="cart-ipoint js-earned-points">{{round(($result['commonContent']['setting'][132]->value / 100)*(session('currency_value') * $price))}}</strong>

                  @elseif(auth()->guard('customer')->user()->level_id == 2)

                    <strong class="cart-ipoint js-earned-points">{{round(($result['commonContent']['setting'][131]->value / 100)*(session('currency_value') * $price))}}</strong>
                  @else

                   <strong class="cart-ipoint js-earned-points">{{round(($result['commonContent']['setting'][130]->value / 100)*(session('currency_value') * $price))}}</strong>
                  @endif
                 
                  <strong> L-Points</strong> 
                from this purchase</sub>
              </td>
            </tr>
            <tr>
              <th scope="row">{{$method_name}}</th>
              <td align="right">{{Session::get('symbol_left')}} {{$method_Rates *session('currency_value')}}{{Session::get('symbol_right')}}</td>

            </tr>
            <tr>
              <th scope="row">Expected Delivery</th>
              <td align="right">48 - 96 Hours</td>

            </tr>
            <tr class="item-price">
              <input type="hidden" name="pPrice" id="pPrice" value="{{session('currency_value') * $price+$shipping_price+0-number_format((float)$coupon_amount, 2, '.', '')}}">
              <th scope="row"><strong>@lang('website.Total')</strong><sub>Prices inclusive of VAT<sub></th>
                <td align="right" ><strong>{{Session::get('symbol_left')}} <span  class="totalPrice">{{number_format(session('currency_value') * $price+$shipping_price+0-number_format((float)$coupon_amount, 2, '.', ''))}}</span> {{Session::get('symbol_right')}}</strong></td>
              </tr>
            </tbody>
          </table>
           <input type="hidden" id="customer_name" value="{{auth()->guard('customer')->user()->first_name}} {{auth()->guard('customer')->user()->last_name}}">
          <input type="hidden" id="customer_email" value="{{auth()->guard('customer')->user()->email}}">
          <input type="hidden" id="customer_mobile" value="{{auth()->guard('customer')->user()->phone}}">
          <!-- <div class="LpointsWrpBox">
            <h5>No L-Points available</h5>
            <p>You can use your available L-Points for your purchases.</p>
          </div> -->
          <div class="LpointsWrpBox LpointsWrpBox2">
            <h4>pay using L-Points</h4>
            <div class="lpointCrt">
              <h5>Use L-points & Save AED <span class="userLpointAED">{{auth()->guard('customer')->user()->redeem_points/$result['commonContent']['setting'][128]->value }}</span></h5>
              <p>Pay with <strong>{{auth()->guard('customer')->user()->redeem_points}} L-points</strong> and the remaining<br> balance with card.</p>
              <label class="switch">
                <input type="checkbox" name="lpoints-pay" onclick="payWLpoitns()">
                <span class="slider"></span>
              </label>
            </div>
          </div>
        </div>
      </div>
    </section>
  </section>
  <script type="text/javascript" src="https://www.foloosi.com/js/foloosipay.v2.js"></script>
  <script>
    jQuery(document).on('click', '#cash_on_delivery_button, #banktransfer_button', function(e){
      jQuery("#update_cart_form").submit();
    });
    jQuery(document).on('click', '#payment_button', function(e){
      $(document).ready(function () {
        var totalPrice = $('#pPrice').val();
        var customer_name = $('#customer_name').val();
        var customer_email = $('#customer_email').val();
        var customer_mobile = $('#customer_mobile').val();
        $.ajax({
          method: "POST",
          url: "https://foloosi.com/api/v1/api/initialize-setup",
          headers: { 'merchant_key': 'live_$2y$10$xgQKLZz2FW5iMVOzBPDzvOsGUKBlJf8laBwGcFjhcVSoajZzt52Im'},
          data: { 
            transaction_amount: totalPrice,
            currency: "AED",
            redirect_url:"https://lucramania.com/thankyou",
            customer_name : customer_name, /*note : auto render in payment popup*/
            customer_email : customer_email, /*note : auto render in payment popup*/
            customer_mobile : customer_mobile
            }
        })
          .done(function( msg ) {
            var options = {
                "reference_token" : msg['data']['reference_token'], //which is get from step2
                "merchant_key" : "live_$2y$10$xgQKLZz2FW5iMVOzBPDzvOsGUKBlJf8laBwGcFjhcVSoajZzt52Im"
            }
            var fp1 = new Foloosipay(options);
            fp1.open();
            foloosiHandler(response, function (e) {
               if(e.data.status == 'success'){
                  //responde success code
                  // console.log(e.data.status);
                  jQuery('#transaction_id').val(e.data.data.transaction_no);
                  setTimeout(function(){ fp1.close();
                    fbq('track', 'Purchase', {currency: "AED", value: totalPrice});
                    jQuery("#update_cart_form").submit(); }, 3000);
                  
               }
               if(e.data.status == 'error'){
                  //responde success code
                  console.log(e.data.status);
                  console.log(e.data.data.payment_status);
               }
            });
          });
      });
    });
  </script>
  <script>
    $('#rzp-footer-form').submit(function (e) {
      var button = $(this).find('button');
      var parent = $(this);
      button.attr('disabled', 'true').html('Please Wait...');
      $.ajax({
        method: 'get',
        url: this.action,
        data: $(this).serialize(),
        complete: function (r) {
          jQuery("#update_cart_form").submit();
        }
      })
      return false;
    })
  </script>
  <script>
    function padStart(str) {
      return ('0' + str).slice(-2)
    }

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
        complete: function (r) {
          jQuery("#update_cart_form").submit();
          console.log(r);
        }
      })
    }
  </script>
  <?php
  if(!empty($result['payment_methods'][6]) and $result['payment_methods'][6]['active'] == 1){

    $rezorpay_key =  $result['payment_methods'][6]['RAZORPAY_KEY'];

    if(!empty($result['commonContent']['setting'][79]->value)){
      $name = $result['commonContent']['setting'][79]->value;
    }else{
      $name = Lang::get('website.Ecommerce');
    }

    $logo = $result['commonContent']['setting'][15]->value;
    ?>
    <script>
      var options = {
        key: "{{ $rezorpay_key }}",
        amount: '<?php echo (float) round($total_price, 2)*100;?>',
        name: '{{$name}}',
        image: '{{$logo}}',
        handler: demoSuccessHandler
      }
    </script>
    <script>
      window.r = new Razorpay(options);
      document.getElementById('razor_pay_button').onclick = function () {
        r.open()
      }
    </script>

    <?php
  }

  foreach($result['payment_methods'] as $payment_methods){
    if($payment_methods['active']==1 and $payment_methods['payment_method']=='midtrans'){
      if($payment_methods['environment'] == 'Live'){
        print '<script src="https://app.midtrans.com/snap/snap.js" data-client-key="'.$payment_methods['public_key'].'"></script>';
      }else{
        print '<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="'.$payment_methods['public_key'].'"></script>';

      }
    }
  }
  ?>
  <script>

    jQuery( document ).ready( function () {
      var x = jQuery("#separator").text();

      jQuery('#changebtn').click(function(){
        jQuery('.address-option').show();      
        jQuery('.selected-address').hide();      
      });
      jQuery('#changebtnPay').click(function(){
        jQuery('.payment-option').show();      
        jQuery('.selected-payment').hide();      
      });
      var midtrans_environment = jQuery('#midtrans_environment').val();
      if(midtrans_environment !== undefined){
        midtrans_environment = midtrans_environment;
      }else{
        midtrans_environment = ';'
      }
    });
  </script>
  <script type="text/javascript">
    document.getElementById('midtrans_button').onclick = function(){
      var tokken = jQuery('#midtransToken').val();
      // SnapToken acquired from previous step
      snap.pay(tokken, {
          // Optional
          onSuccess: function(result){
           // alert('onSuccess');
              // /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
              paymentSuccess(JSON.stringify(result, null, 2));
            },
          // Optional
          onPending: function(result){
           // alert('onPending');
           /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
         },
          // Optional
          onError: function(result){
            jQuery('#payment_error').show();
            var response = JSON.stringify(result, null, 2);
           // alert('error');
           /* You may add your own js here, this is just example */ document.getElementById('payment_error-error-text').innerHTML += result.status_message;
         }
       });
    };
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
          <form class="contctForm checkout-address-form-validate"  enctype="multipart/form-data" action="{{ URL::to('/addAddress')}}" method="post">
            <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
            <input type="hidden"  name="zone_id" id="zone_id" value="-1" />
            <div class="form-row">
              <div class="form-group">
                <label for=""> @lang('website.First Name')</label>
                <input type="text"  class="form-control checkout-contact-field-validate" onkeypress="return /^[ A-Za-z-_@./#${}<>,?=;'|\!%*()&+-]*$/
.test(event.key)" name="first_name" aria-describedby="NameHelp1" placeholder="John" >
              </div>
              <div class="form-group">
                <label for=""> @lang('website.Last Name')</label>
                <input type="text" class="form-control checkout-contact-field-validate" id="lastname" onkeypress="return /^[ A-Za-z-_@./#${}<>,?=;'|\!%*()&+-]*$/
.test(event.key)" name="last_name"  aria-describedby="NameHelp1" placeholder="Doe">
              </div>
              <div class="form-group ">
                <label for="">Building Name, Floor, Apartment or Villa #</label>
                <input type="text" class="form-control checkout-contact-field-validate" name="buildingno" id="buildingno" placeholder="Princess Tower, 5th floor, Apt 5023">
              
              </div>
              <input type="hidden" class="form-control " id="company" aria-describedby="companyHelp" placeholder="Enter Your Company Name" name="company" value="TEST TEST">
              <div class="form-group">
                <label for="">Street Name</label>
                <input type="text" class="form-control checkout-contact-field-validate" name="address" id="address" placeholder="Omar Ibn Al Khattab Street">
              </div>

              <div class="form-group">
                <label for=""> @lang('website.City')</label>
                <select name="city" id="check_ship_city" class="form-control checkout-contact-field-validate">
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
              <div class="form-group">
                <label for=""> @lang('website.Country')</label>
                <div class="input-group select-control">
                  <input type="text" class="form-control " value="United Arab Emirates" readonly="readonly" name="country_name" id="entry_country_id">
                </div>
         
              </div>
              <input type="hidden" class="form-control" id="postcode" aria-describedby="zpcodeHelp" name="postcode" value="123123">
              <div class="form-group">
                <label for=""> Mobile Phone</label>
                <div class="flagNumImg flagNumImg2">
                <input type="text" class="form-control checkout-contact-field-validate checkout-contact-number-validate" id="delivery_phone" aria-describedby="numberHelp" placeholder="" name="delivery_phone">
                <!-- <span style="color:red;" class="help-block error-content" hidden>@lang('website.Please enter your valid phone number')</span> -->
                <span class="numValImg"><img src="{{asset('web/assets/images/uaeIcon2.png')}}"><small>+971</small></span>
                <input type="hidden" name="countryCodeUAE" value="+971">
              </div>
              </div>
              <div class="form-group  col-12">
                <h4>Add Delivery Instructions:</h4>
                <ul>
                  <li><input type="radio"  name="addresstype" value="Home" checked>Home (7am-10pm, all days)</li>
                  <li><input type="radio"  name="addresstype" value="Office">Office (7am-6pm, Weekdays)</li>
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
                <button type="button" onclick="checkoutcontactfieldvalidate();"  class="btn btn-secondary">Add Address</button>
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
                    <input type="text"  name="cardnumber" class="form-control contact-card-number-validation" id="cardNumber">
                    <div id="credit_cards">
                      <p class="hide" id="visa"><i class="fab fa-cc-visa"  ></i></p>
                      <p class="hide" id="mastercard"><i class="fab fa-cc-mastercard"  ></i></p>
                      <p class="hide" id="amex"><i class="fab fa-cc-amex"  ></i></p>
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
                  <label for="firstName" class="ol-form-label">Expiry Date</label><sub class="expMM">MM/YY</sub><!-- 
                  <input type="tel" name="expirydate" class="" id="security_code" placeholder="MM/YY"> -->
                  <input id="cc" type="text" name="expirydate" placeholder="MM/YY" class="masked form-control contact-card-number-validation" pattern="(1[0-2]|0[1-9])\/(1[5-9]|2\d)" data-valid-example="05/18"/>
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
          <form class="contctFormIns"  enctype="multipart/form-data" action="{{ URL::to('/addDeliveryIns')}}" method="post">
            <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
            <div id="address-wrapper">
              <!-- to view the html here open OrderControlller and look forgetDeliveryInstruction -->
            </div>  
            <div class="row">  
              <div class="col-sm-12"><button type="button" onclick="descriptionins();" class="btn saveInst">Save Instructions</button></div>
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
        } 
        else {
            alert("Everything is correct");
        }
    });
});
</script>
  @endsection
