                <div class="col-12 col-lg-8">
                  <form method='POST' id="update_cart_form" action='{{ URL::to("/updateCart")}}' >
                    <table class="table top-table">

                      <?php
                      $price = 0;
                      $coupon_amount = 0;
                      $customers_basket_quantity_order_summary = 0;
                      $earlybirdcoupon = 0;
                      ?>
                      @foreach( $result['cart'] as $products) 
                      <?php
                      $price+= $products->final_price * $products->customers_basket_quantity;
                      $datacheck = $products->campaign_id[0]->no_of_orders - $products->campaign_id[0]->total_order;
                      ?>
                      <tbody  @if(session::get('out_of_stock') == 1 and session::get('out_of_stock_product') == $products->products_id)style="  box-shadow: 0 20px 50px rgba(0,0,0,.5); border:2px solid #FF9999;"@endif>

                    <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                    <input type="hidden" name="cart[]" value="{{$products->customers_basket_id}}">
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
                    <td class="item-price col-12 col-md-4">
                     <h3>Win</h3>
                     <figure class="prodCrtImg"> <img src="{{asset('images/'.$products->reward[0]->reward_image)}}"></figure>
                   </td>
                   <td class="align-middle item-total col-12 col-md-1 Qty" align="left">
                    <div class="input-group item-quantity">                         
                      <input name="quantity[]" type="text" readonly value="{{$products->customers_basket_quantity}}" class="form-control qty" min="{{$products->min_order}}" max="{{$products->max_order}}">
                      <span class="input-group-btn ">
                        <button type="button" value="quantity" class="quantity-right-plus btn qtypluscart" data-type="plus" data-field="">                                  
                          <span class="fas fa-plus"></span>
                        </button>
                        <button type="button" value="quantity" class="quantity-left-minus btn qtyminuscart" data-type="minus" data-field="">
                          <span class="fas fa-minus"></span>
                        </button>            
                      </span>
                    </div>
                    </td>
                  </tr>
                  <tr class="d-flex myTxtWrpInr">
                    <td class="item-price col-12 col-md-4"> 
                      <div class="item-detail productDescWrp">
                        <h4>{!!str_limit($products->products_name,30,'')!!}</h4>
                      </div>
                    </td>
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
                   <h4>{!!str_limit($products->reward[0]->title,30,'')!!}</h4>  
                 </div>  
               </td>
               <td class="align-middle item-total col-12 col-md-1 deleteCartItemWrp" align="left">
                <sup><a href="{{ URL::to('/deleteCart?id='.$products->customers_basket_id)}}"  class="deleteCartItem" >
                  <strong>Delete</strong>
                </a></sup></td>
              </tr>
              <tr class="d-flex alter totalPriceWrp">
                <td class="align-middle col-12 col-md-6"><p><strong class="donationEach">@if($datacheck > 0 )3 @else 2 @endif</strong><small>COUPONS per product</small></p></td>

                <td class="align-middle col-12 col-md-6 text-right"><p><small>Item Total:</small><strong> AED {{number_format($products->customers_basket_quantity*$orignal_price)}}</strong></p></td>
              </tr>
        </tbody>
            <?php $customers_basket_quantity_order_summary += $products->customers_basket_quantity; ?>
            @endforeach
          </table>
        </form>
        @if(!empty(session('coupon')))
        <div class="form-group">
          @foreach(session('coupon') as $coupons_show)

          <div class="alert alert-success">
            <a href="{{ URL::to('/removeCoupon/'.$coupons_show->coupans_id)}}" class="close"><span aria-hidden="true">&times;</span></a>
            @lang('website.Coupon Applied') {{$coupons_show->code}}.@lang('website.If you do note want to apply this coupon just click cross button of this alert.')
          </div>

          @endforeach
        </div>
        @endif
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
              <td align="right" class="total_products">{{$customers_basket_quantity_order_summary}}</td>
            </tr>
            <tr>
              <th scope="row">Total Coupons</th>
              <td align="right" id="totalcoupons">@if($datacheck > 0 ){{($customers_basket_quantity_order_summary*3)}} @else {{($customers_basket_quantity_order_summary*2)}} @endif</td>
              <input type="hidden" id="totalCouponChecker" value="added">
              <input type="hidden" id="lpointChecker" value="uncheck">
            </tr>
            <tr>
              <th scope="row">Donate to receive an <br>additional entry! <sub>I agree to donate all purchased products to charity as per the "Terms & Conditions"</sub></th>
              <td align="right"><label class="switch">
                <input type="checkbox" name="donation" onclick="donationTicket()"  checked>
                <span class="slider"></span>
              </label></td>
              <!-- <td align="right"><input type="checkbox" name="donation"></td> -->
            </tr>
            <tr class="lpoints">
              <td scope="row" colspan="2">
                <sub> You will earn
                  <strong class="cart-ipoint js-earned-points">{{round((10 / 100)*(session('currency_value') * $price))}}</strong>
                  <strong> L-Points</strong> 
                from this purchase</sub>
              </td>
            </tr>
            <tr class="item-price">
              <th scope="row"><strong>@lang('website.Total')</strong><sub>Prices inclusive of VAT<sub></th>
                <td align="right" ><strong>{{Session::get('symbol_left')}} <span  class="totalPrice">{{number_format(session('currency_value') * $price+0-number_format((float)$coupon_amount, 2, '.', ''))}}</span> {{Session::get('symbol_right')}}</strong></td>
              </tr>
            </tbody>
          </table>
          <a  href="https://lucramania.com/#shopping" class="btn btn-secondary swipe-to-top"><strong>@lang('website.Back To Shopping')</strong></a>
          <a href="{{ URL::to('/checkout')}}" class="btn btn-secondary m-btn col-12 swipe-to-top proceedToCheckoutBtn"><strong>@lang('website.proceedToCheckout')</strong></a>
        </div>
        <script type="text/javascript">
         jQuery(".qtyminuscart").click(function(e) {

             // Stop acting like a button
             e.preventDefault();

             // Get the field name
             fieldName = jQuery(this).attr('field');

             // Get its current value
             var currentVal = parseInt(jQuery(this).parents('span').prev('.qty').val());
             var minimumVal =  jQuery(this).parents('span').prev('.qty').attr('min');
             // If it isn't undefined or its greater than 0
             if (!isNaN(currentVal) && currentVal > minimumVal) {
               // Decrement one
               jQuery(this).parents('span').prev('.qty').val(currentVal - 1);
             } else {
               // Otherwise put a 0 there
               jQuery(this).parents('span').prev('.qty').val(minimumVal);

             }
             updateCartAjax();
           });

         jQuery('.qtypluscart').click(function(e){
          e.preventDefault();
          var currentVal = parseInt(jQuery(this).parents('span').prev('.qty').val());   
          var maximumVal =  jQuery(this).parents('span').prev('.qty').attr('max');
          if (!isNaN(currentVal)) {
            if(maximumVal!=0){
              if(currentVal < maximumVal ){
                    // Increment
                    jQuery(this).parents('span').prev('.qty').val(currentVal + 1);
                  }
                }
              } else {
                // Otherwise put a 0 there
                jQuery(this).prev('.qty').val(0);
              }
              updateCartAjax();
            });
          </script>