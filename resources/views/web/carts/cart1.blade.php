<style>
	.apply-coupon {
		white-space: initial;
		background: yellow;
		font-size: 13px;
		color: black;
		margin-top: 21px;
		margin-bottom: -37px;
	}
</style>

@if(!isset($result['cart'][0]->customers_basket_id))
<section class="cart-sec2 main-section">
	<div class="container">
		<h6>You currently have no items in your cart, Explore our products and get your chances to win amazing luxury prizes</h6>
		<a href="{{url('/')}}" class="btn"><span>Start shopping</span></a>
	</div>
</section>
@else
<div class="overlayLoadWrp">
	<div class="loader"></div>
</div>
<section class="cart-sec main-section cart-section-one">
	<div class="container">
		<h2>Cart</h2>
		<div class="alert alert-danger" id="response_cart_message" style="display: none;">Please check the available items in Stock.</div>
		@if(Session::has('error'))
			<div class="alert alert-danger" role="alert">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				{!! session('error') !!}
			</div>
    	@endif
		<div class="row respCart">
			<div class="col-lg-8">
				@isset($result['address'])
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
								<input type="text" maxlength="20" class="form-control checkout-contact-field-validate" onkeypress="return /^[ A-Za-z-_@./#${}<>,?=;'|\!%*()&+-]*$/
									.test(event.key)" name="first_name" aria-describedby="NameHelp1" value="{{Auth::guard('customer')->user()->first_name}}" placeholder="John">
								</div>
								<div class="form-group col-md-6">
								<label for=""> @lang('website.Last Name')</label>
								<input type="text" maxlength="20" class="form-control checkout-contact-field-validate" id="lastname" onkeypress="return /^[ A-Za-z-_@./#${}<>,?=;'|\!%*()&+-]*$/
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
								<input maxlength="16" class="form-control numbersOnly checkout-contact-number-validate countrycode" id="phone" name="delivery_phone" type="tel" required="required">
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
				@endisset

				<form method='POST' id="update_cart_form" action='{{ URL::to('/updateCart')}}'>
					<?php
					$totalcoupons = 0;
					$price = 0;
					$customers_basket_quantity_order_summary = 0;
					$earlybirdcoupon = 0;
					?>
					@foreach($result['cart'] as $key => $products)
					<?php
					$price += $products->final_price * $products->customers_basket_quantity;
					$datacheck = $products->campaign_id[0]->no_customers - $products->total_order;
					// echo "<pre>";
					// print_r($products->campaign_id[$key]->no_customers);
					// die();
					?>
					<div class="cart-box" @if(session::get('out_of_stock')==1 and session::get('out_of_stock_product')==$products->products_id)style=" box-shadow: 0 20px 50px rgba(0,0,0,.5); border:2px solid #FF9999;"@endif>
						<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
						<input type="hidden" name="cart[]" value="{{$products->customers_basket_id}}">
						<input type="hidden" id="totalCouponChecker" name="totalCouponChecker" value="added">
						@if($datacheck > 0)<input type="hidden" name="earlyBirdChecker" value="added"> <?php $earlybirdcoupon++; ?>@endif
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
							@if($datacheck > 0 )
							<div class="flashSale">
								<p><i class="fas fa-bolt wow animate__pulse animated"></i>Z-Power is here </p>
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
										<li><strong><span class="donationEach">@if($datacheck > 0 )<?php $totalcoupons += 3 * $products->customers_basket_quantity; ?> 3 @else <?php $totalcoupons += 2 * $products->customers_basket_quantity; ?> 2 @endif</span> Coupons</strong> Per unit if donated</li>
									</ul>
								</div>
							</div>
							<div class="col-lg-5 col-md-5 col-sm-5">
								<div class="cart-btn-box">
									<div class="quantity Qty">

										<a href="#" class="quantity__minus qtyminuscart @if($products->customers_basket_quantity<=1) d-none @endif" data-type="minus"><span>-</span></a>
										<input name="quantity[]" type="text" readonly value="{{$products->customers_basket_quantity}}" class="quantity__input qty" min="1" max="{{$products->max_order}}">
										<a href="#" class="quantity__plus qtypluscart" data-type="plus"><span>Add More</span></a>

										<a href="{{ URL::to('/deleteCart?id='.$products->customers_basket_id)}}" class="btn" id="add-mre-btn"><span>Remove</span></a>
										<!-- <a href="{{ URL::to('/')}}" class="btn" id="continue-mre-btn"><span>Continue Shopping</span></a> -->
									</div>



								</div>
							</div>
						</div>
					</div>
					<?php $customers_basket_quantity_order_summary += $products->customers_basket_quantity; ?>
					@endforeach
				</form>
				<!-- 
<div class="col-lg-6">
	<form id="apply_coupon" class="form-validate">
		<div class="row">
			<div class="input-group">
				<input type="text" name="coupon_code" class="form-control" id="coupon_code" placeholder="Add Promo Code" aria-label="Coupon Code" aria-describedby="coupon-code">

				<div class="">
					<button class="btn" type="submit" id="coupon-code"><span>APPLY</span></button>
				</div>
			</div>
			<div id="coupon_error" class="help-block" style="display: none;color:red;"></div>
			<div id="coupon_require_error" class="help-block" style="display: none;color:red;">Please enter a valid coupon code</div>
		</div>
	</form>
</div> -->

			</div>
			@php
			if(!empty(session('coupon_discount'))){
			$coupon_amount = session('currency_value') * session('coupon_discount');
			}else{
			$coupon_amount = 0;
			}
			@endphp
			<div class="col-lg-4">
				<div class="cart-price">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6  col-6">
							<h4>Cart Total</h4>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6  col-6">
							<h3>{{Session::get('symbol_left')}} <span class="totalPrice">{{number_format(session('currency_value') * $price+0-number_format((float)$coupon_amount, 2, '.', ''))}}</span> {{Session::get('symbol_right')}}</h3>
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
							<h6 id="totalcoupons">{{ $totalcoupons}}</h6>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6  col-6">
							<h5>@lang('website.Discount(Coupon)')</h5>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6  col-6">
							<h6>{{Session::get('symbol_left')}} {{number_format((float)$coupon_amount, 2, '.', '')+0}} {{Session::get('symbol_right')}}</h6>
						</div>
						<div class="col-lg-12 col-md-12 col-sm-12  col-12">

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
							<p>You will earn {{$points}} Z-Points from this purchase</p>
						</div>
					</div>
				</div>


				@if(!empty(session('coupon')))
				<div class="form-group">
					@foreach(session('coupon') as $coupons_show)

					<div class="alert apply-coupon">
						<a href="{{ URL::to('/removeCoupon/'.$coupons_show->coupans_id)}}" class="close"><span aria-hidden="true">&times;</span></a>
						@lang('website.Coupon Applied') {{$coupons_show->code}}. If you do not wish to apply this coupon just click cross button on this alert.
					</div>

					@endforeach
				</div>

				@else

				<form id="apply_coupon" class="form-validate">
					<div class="row">
						<div class="input-group">
							<input type="text" name="coupon_code" autocomplete="off" class="form-control" id="coupon_code" placeholder="Add Promo Code" aria-label="Coupon Code" aria-describedby="coupon-code">

							<div class="">
								<button class="btn" type="submit" id="coupon-code" style="margin-left: 2px;"><span style="font-size:14px;margin-top: -2px;">APPLY</span></button>
							</div>
						</div>
						<div id="coupon_error" class="help-block" style="display: none;color:red;"></div>
						<div id="coupon_require_error" class="help-block" style="display: none;color:red;">Please enter a valid coupon code</div>
					</div>
				</form>
				@endif
				<a href="{{URL::to('/')}}" class="btn" id="continue-shop-btn"><span>Continue Shopping</span></a>
				<a href="{{URL::to('/checkout')}}" class="btn" id="continue-shop-btn"><span>Proceed To Checkout</span></a>
			</div>
		</div>

	</div>
</section>

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
              <input type="text" maxlength="20" class="form-control contact-field-validate" name="first_name" aria-describedby="NameHelp1" placeholder="John" onkeypress="return /^[ A-Za-z-_@./#${}<>,?=;'|\!%*()&+-]*$/.test(event.key)">
            </div>

            <div class="form-group">
              <label for=""> @lang('website.Last Name')</label>
              <input type="text" maxlength="20" class="form-control contact-field-validate" id="lastname" name="last_name" aria-describedby="NameHelp1" placeholder="Doe" onkeypress="return /^[ A-Za-z-_@./#${}<>,?=;'|\!%*()&+-]*$/.test(event.key)">
            </div>

            <div class="form-group">
              <label for="">Building Name, Floor, Apartment or Villa #</label>
              <input type="text" class="form-control contact-field-validate" name="buildingno" id="buildingno" placeholder="Princess Tower, 5th floor, Apt 5023">
            </div>

            <input type="hidden" class="form-control contact-field-validate" id="company" aria-describedby="companyHelp" placeholder="Enter Your Company Name" name="company" value="TEST TEST">

            <div class="form-group">
              <label for="">Street Name</label>
              <input type="text" class="form-control contact-field-validate" name="address" id="address" placeholder="Omar Ibn Al Khattab Street">
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
            </div>

            <div class="form-group citytext">
              <label for=""> @lang('website.City')</label>
              <input name="city_text" name="city" value="" type="text" class="form-control  ">
            </div>

            <input type="hidden" class="form-control" id="postcode" aria-describedby="zpcodeHelp" name="postcode" value="123123">

            <div class="form-group">
				<label for=""> @lang('website.Phone')</label>
              <input maxlength="16" class="form-control contact-field-validate countrycode" id="phone" name="delivery_phone" type="tel" required="required">
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

<div class="modal fade" id="deliveryEditModal" role="dialog"></div>

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

<script type="text/javascript">
	// document.getElementById("totalCouponChecker").value = sessionStorage.getItem("donationSwitch");
	if (sessionStorage.getItem("donationSwitch") == 'added') {
		jQuery(".donationSwitch").attr('checked', 'checked');
    	jQuery('.shopping-address-box').css('display', 'none');
	} else {
		sessionStorage.setItem("donationSwitch", "added");
		jQuery(".donationSwitch").removeAttr('checked');
		jQuery('.shopping-address-box').css('display', 'block');
		donationTicket();
	}

	$('.donationSwitch').click(function() {
		location.reload();
	});

	jQuery('#changebtn').click(function(){
		jQuery('.address-option').show();      
		jQuery('.selected-address').hide();      
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
@endif