      <div class="col-lg-8">

        <form method='POST' id="update_cart_form" action='{{ URL::to('/updateCart')}}' >

          <?php
          $totalcoupons = 0;
          $price = 0;

          $customers_basket_quantity_order_summary = 0;

          $earlybirdcoupon = 0;

          ?>

          @foreach( $result['cart'] as $products) 

          <?php

          $price+= $products->final_price * $products->customers_basket_quantity;

          $datacheck = $products->campaign_id[0]->no_customers - $products->total_order;

          ?>

          <div class="cart-box" @if(session::get('out_of_stock') == 1 and session::get('out_of_stock_product') == $products->products_id)style="  box-shadow: 0 20px 50px rgba(0,0,0,.5); border:2px solid #FF9999;"@endif>

            <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />

            <input type="hidden" name="cart[]" value="{{$products->customers_basket_id}}">
            <input type="hidden" id="totalCouponChecker" name="totalCouponChecker" value="added">

            @if($datacheck > 0)<input type="hidden" name="earlyBirdChecker" value="added"> <?php $earlybirdcoupon++; ?>@endif

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

            <div class="row">

              @if($datacheck > 0 )

                <div class="flashSale">

                <p><i class="fas fa-bolt"></i>Early Bird offer is active </p>

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
                  <h3><?php echo htmlspecialchars_decode($products->reward[0]->title);?></h3>
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

                    <li><strong><span class="donationEach">@if($datacheck > 0 ) <?php $totalcoupons += 3*$products->customers_basket_quantity; ?> 3 @else <?php $totalcoupons += 2*$products->customers_basket_quantity; ?> 2 @endif</span> Coupons</strong> Per unit if donated</li>

                  </ul>

                </div>

              </div>

              <div class="col-lg-5 col-md-5 col-sm-5">

                <div class="cart-btn-box">

                  <div class="quantity Qty">


                    <a href="#" class="quantity__minus qtyminuscart  @if($products->customers_basket_quantity<=1) d-none @endif" data-type="minus"><span>-</span></a>

                    <input name="quantity[]" type="text"  readonly value="{{$products->customers_basket_quantity}}" class="quantity__input qty"  min="1" max="{{$products->max_order}}">

                    <a href="#" class="quantity__plus qtypluscart" data-type="plus"><span>Add More</span></a>
 <a href="{{ URL::to('/deleteCart?id='.$products->customers_basket_id)}}" class="btn" id="add-mre-btn"><span>Remove</span></a>
                  <a href="{{ URL::to('/')}}" class="btn"  id="continue-mre-btn"><span>Continue Shopping</span></a>

                  </div>

                 

                </div>

              </div>

            </div>

          </div>

          <?php $customers_basket_quantity_order_summary += $products->customers_basket_quantity; ?>

          @endforeach

        </form>
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

              <h4>Cart Totals</h4>

            </div>

            <div class="col-lg-6 col-md-6 col-sm-6  col-6">

              <h3>{{Session::get('symbol_left')}} {{number_format(session('currency_value') * $price+0-number_format((float)$coupon_amount, 2, '.', ''))}} {{Session::get('symbol_right')}}</h3>

            </div>

            <div class="col-lg-6 col-md-6 col-sm-6  col-6">

              <h5>Total Products</h5>

            </div>

            <div class="col-lg-6 col-md-6 col-sm-6  col-6">

              <h6 class="total_products">{{$customers_basket_quantity_order_summary}}</h6>

            </div>
            <div class="col-lg-6 col-md-6 col-sm-6  col-6">

              <h5>Donate to receive an additional entry!</h5>

            </div>
            <div class="col-lg-6 col-md-6 col-sm-6  col-6">
              <h6>
                <label class="switch">
                  <input type="checkbox" name="donation" class="donationSwitch" onclick="donationTicket()"  checked>
                  <span class="slider"></span>
                </label>
              </h6>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6  col-6">

              <h5>Total Coupons</h5>

            </div>

            <div class="col-lg-6 col-md-6 col-sm-6  col-6">

              <h6 id="totalcoupons">{{$totalcoupons}}</h6>

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



                             <?php $points = round(($result['commonContent']['setting'][132]->value / 100)*(session('currency_value') * $price)); ?>



                        @elseif(auth()->guard('customer')->user()->level_id == 2)



                             <?php $points = round(($result['commonContent']['setting'][131]->value / 100)*(session('currency_value') * $price)); ?>

                        @else



                           <?php $points = round(($result['commonContent']['setting'][130]->value / 100)*(session('currency_value') * $price)); ?>

                        @endif

                        @else

                           <?php $points = round(($result['commonContent']['setting'][130]->value / 100)*(session('currency_value') * $price)); ?>  

                        @endif  

              <p>You will earn {{$points}} ZPoints from this purchase</p>

            </div>

          </div>

        </div>
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
        <a href="{{URL::to('/')}}" class="btn" id="continue-shop-btn"><span>Continue Shopping</span></a>

        <a href="{{URL::to('/checkout')}}" class="btn" id="continue-shop-btn"><span>Proceed To Checkout</span></a>

      </div>

      <script type="text/javascript">
        if (sessionStorage.getItem("donationSwitch") == 'added') {
          jQuery(".donationSwitch").attr('checked','checked');
        }else{
          jQuery(".donationSwitch").removeAttr('checked');
          donationTicket();
        }
          function donationTicket() {

         checker = jQuery('#totalCouponChecker').val();
         total_tickets = jQuery('#totalcoupons').html();
         total_products = jQuery('.total_products').html();
         totalnoOfTickets = jQuery('.donationEach').html();

         if (checker == 'added') {
          jQuery('.donationEach').each(function(){
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

          } else{

           jQuery('.donationEach').each(function(){
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
          }
        }
        jQuery('.qtypluscart').click(function(e){

            e.preventDefault();

            // Get the field name

            //fieldName = jQuery(this).attr('field');

            // Get its current value

            var currentVal = parseInt(jQuery(this).prev('.qty').val());   

            var maximumVal =  jQuery(this).prev('.qty').attr('max');

            

            //alert(maximum);

            // If is not undefined

            if (!isNaN(currentVal)) {

              if(maximumVal!=0){

                if(currentVal < maximumVal ){

                  // Increment

                  jQuery(this).prev('.qty').val(currentVal+1);

                }

              }



            } else {

              // Otherwise put a 0 there

              jQuery(this).prev('.qty').val(currentVal);

            }

            updateCartAjax();

        });

      jQuery(".qtyminuscart").click(function(e) {



        // Stop acting like a button

        e.preventDefault();



        // Get the field name

        fieldName = jQuery(this).attr('field');



        // Get its current value

        var currentVal = parseInt(jQuery(this).next('.qty').val());


        var minimumVal =  jQuery(this).next('.qty').attr('min');

        // If it isn't undefined or its greater than 0

        if (!isNaN(currentVal) && currentVal > minimumVal) {

          // Decrement one

          jQuery(this).next('.qty').val(currentVal - 1);



        } else {

          // Otherwise put a 0 there

          jQuery(this).next('.qty').val(minimumVal);



        }

        updateCartAjax();

      });

      </script>