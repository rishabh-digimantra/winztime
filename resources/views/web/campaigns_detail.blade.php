@extends('web.layout')

@section('content')

<section class="product-details-sec">

  <div class="container">


    <form name="attributes" id="add-Product-form_{{$campaign->id}}" method="post">

      <input type="hidden" name="products_id" value="{{$campaign->product_id}}" products_id="{{$campaign->product_id}}" id="product_id">

      <input type="hidden" name="products_price" id="products_price" value="{{$campaign->getProducts->products_price}}">

      <input type="hidden" name="checkout" id="checkout_url" value="false">

      <?php

      // $datacheck = $campaign->no_customers - $campaign['get_ticket_count'];

      ?>

      <div class="row">
        <div class="col-lg-9">
          <div id="product-detail-box">

            <div class="row">

              <div class="col-lg-4 col-md-4 col-sm-4">

                <div class="product-detail-box-pic">

                  <img src="{{asset($campaign->getProducts->ProductImage->path)}}" class="img-fluid">

                  <h5>Buy A</h5>

                  <h6>{{ $campaign->getProducts->ProductDescription->products_name }}</h6>

                </div>

              </div>

              <div class="col-lg-4 col-sm-4">


                @if($campaign->campaign_type=="regular")
                <div class="progressbar">
                  <input type="hidden" id="totalcamp" value="{{$campaign->no_of_orders}}">

                  <div class="second circle" data-percent="{{$campaign->get_ticket_count}}" data-total="{{$campaign->no_of_orders}}" data-type="{{$campaign->campaign_type}}">
                    <img src="{{asset('web/assets/images/progressIcon.webp')}}">
                  </div>


                </div>
                @else
                @php
                $now = time(); // or your date as well
                $your_date = strtotime($campaign->end_date);
                if($your_date>=$now){
                $datediff = $your_date - $now ;
                }else{
                $datediff = $now- $your_date ;
                }

                $days=round($datediff / (60 * 60 * 24));

                $start_date = strtotime($campaign->start_date);
                $datediffstart = $your_date - $start_date ;
                $days_start=round($datediffstart / (60 * 60 * 24));
                @endphp



                <div class="progressbar">
                  <input type="hidden" id="totalcamp" value="{{$days_start}}">

                  <div class="second circle" data-percent="{{$days}}" data-total="{{$days_start}}" data-display="{{$days}}" data-type="{{$campaign->campaign_type}}">
                    <img src="{{asset('web/assets/images/progressIcon.webp')}}">
                  </div>


                </div>
                @endif
              </div>

              <div class="col-lg-4 col-sm-4">

                <div class="product-detail-box-pic">

                  <img src="{{asset('images/'.$campaign->getReward->reward_image)}}" class="img-fluid">

                  <h5>Get a chance to Win</h5>

                  <h6><?php echo htmlspecialchars_decode($campaign->getReward->title); ?></h6>

                </div>

              </div>
              @if($campaign->campaign_type=="regular")
              <h1>{{$campaign['get_ticket_count']}} sold <span>out of {{$campaign->no_of_orders}}</span></h1>
              @else

              <h1>Ends in <span>{{$days}} days</span></h1>

              @endif
            </div>
            <img src="{{asset('web/assets/images/time-pic.png')}}" class="img-fluid time-icon swing-3">
          </div>

          <h2>Buy a {{ $campaign->getProducts->ProductDescription->products_name }} Get a chance to win {!! $campaign->getReward->title !!} </h2>




        </div>

        <div class="col-lg-3">

          <div class="pro-price">

            <div class="row">

              <div class="col-lg-6 col-sm-6 col-6">

                <h4>Price</h4>

              </div>

              <div class="col-lg-6 col-sm-6 col-6">

                <h5>{{Session::get('symbol_left')}} {{$campaign->getProducts->products_price}} {{Session::get('symbol_right')}}</h5>

              </div>

            </div>

          </div>

          <a href="javascript:;" class="btn" id="continue-shop-btn2" onclick="addToCart('{{$campaign->product_id}}','{{$campaign->getProducts->products_price}}','{{$campaign->id}}')"><span>Add to Cart</span></a>



          @if(!empty(auth()->guard('customer')->user()->id))

          @if(App\Models\Web\Customer::checkWhishlist($campaign->product_id) == true)

          <a href="javascript:;" class="btn wishlist active" products_id="{{$campaign->product_id}}" campaign_id="{{$campaign->id ?? 0}}" id="continue-shop-btn"><span>In wish list</span></a>

          @else

          <a href="javascript:;" class="btn wishlist" products_id="{{$campaign->product_id}}" campaign_id="{{$campaign->id ?? 0}}" id="continue-shop-btn"><span>Add to wish list</span></a>

          @endif

          @else

          <a href="javascript:;" class="wishlist btn" products_id="{{$campaign->product_id}}" campaign_id="{{$campaign->id ?? 0}}" id="continue-shop-btn"><span>Add to wish list</span></a>

          @endif

          <!-- <a href="javascript:;" class="btn" id="continue-shop-btn"><span>Share Campaign</span></a> -->

          <ul class="socialshare">
            <li class="subPopBtn"><a href="javascript:;" id="continue-shop-btn" class="btn"><span>Share Campaign</span></a>

              <ul class="subPop a2a_kit">

                <li><a class="a2a_button_facebook " title="hello" data-share="facebook" target="_blank"><i class="fab fa-facebook-f"></i>Share on Facebook</a></li>

                <li><a href="http://twitter.com/share?text={{$campaign->getProducts->ProductDescription->products_name}}&url=https://winztime.com/campaigns/detail/{{$campaign->id}}" title="hello" data-share="facebook" target="_blank"><i class="fab fa-twitter-square"></i>Share on Twitter</a></li>

                <li><a class="a2a_button_linkedin"><i class="fab fa-linkedin-in"></i>Share on Linkedin</a></li>

                <li><a href="https://api.whatsapp.com/send/?phone=971552801120&text&app_absent=0"><i class="fab fa-whatsapp"></i>Share on Whatsapp</a></li>

                <!-- <li><a href="javascript:;"><i class="fab fa-instagram"></i>Share on Instagram</a></li> -->

                <li><a href="mailto:?Subject=Please check out this exciting campaign!&amp;Body=Check out this exciting campaign! https://winztime.com/campaigns/detail/{{$campaign->id}}"><i class="far fa-envelope"></i>Share on E-mail</a></li>

              </ul>

            </li>
          </ul>

        </div>

        <script async src="https://static.addtoany.com/menu/page.js"></script>
        <div class="col-lg-12">

          <div class="product-details-box2">

            <div class="row">

              <div class="col-lg-9 col-md-8 col-sm-8">

                <div class="pro-details-txt">

                  <h4>Prize details</h4>

                  <p>{!! $campaign->getReward->reward_description !!}</p>

                </div>

              </div>

              <div class="col-lg-3 col-md-4 col-sm-4">

                <div class="pro-details-pic">

                  <img src="{{asset('images/'.$campaign->getReward->reward_image)}}" class="img-fluid">

                </div>

              </div>



            </div>

          </div>

        </div>

        <div class="col-lg-12">

          <div class="product-details-box2">

            <div class="row">

              <div class="col-lg-3 col-md-4 col-sm-4">

                <div class="pro-details-pic">

                  <img src="{{asset($campaign->getProducts->ProductImage->path)}}" class="img-fluid">

                  <h5>{{$campaign->getProducts->ProductDescription->products_name}}</h5>

                  <h6>{{Session::get('symbol_left')}} {{$campaign->getProducts->products_price}} {{Session::get('symbol_right')}}</h6>

                </div>

              </div>

              <div class="col-lg-9 col-md-8 col-sm-8">

                <div class="pro-details-txt">

                  <h4>Product details</h4>

                  <p>{!! $campaign->getProducts->ProductDescription->products_description !!} </p>

                </div>

              </div>

            </div>

          </div>

        </div>



      </div>

    </form>



  </div>

</section>

<script type="text/javascript">
  jQuery(document).on('click', '.wishlist', function(e) {

    var products_id = jQuery(this).attr('products_id');
    var campaign_id = jQuery(this).attr('campaign_id');

    var selector = jQuery(this);

    var user_count = jQuery('#wishlist-count').html();

    jQuery.ajax({

      beforeSend: function(xhr) { // Add this line

        xhr.setRequestHeader('X-CSRF-Token', jQuery('[name="_csrfToken"]').val());

      },

      url: '{{ URL::to("/likeMyProduct")}}',

      type: "POST",

      data: {
        "products_id": products_id,
        "campaign_id": campaign_id,
        "_token": "{{ csrf_token() }}"
      },



      success: function(res) {

        var obj = JSON.parse(res);

        var message = obj.message;

        console.log(obj.success);

        if (obj.success == 0) {

        } else if (obj.success == 2) {

          jQuery(selector).addClass('active');

          // jQuery('.wishlist.active > img').attr('src','{{url('/')}}/web/assets/images/sec3Icon-red.png');

          jQuery(selector).children('span').html("In Wish list");

          // jQuery('.total_wishlist').html(obj.total_wishlist);



        } else if (obj.success == 1) {

          // jQuery('.heart').attr('src','https://winztime.com/web/assets/images/sec3Icon.png');

          jQuery(selector).removeClass('active');

          // jQuery('.wishlist > img').attr('src','{{url('/')}}/web/assets/images/sec3Icon.png');

          jQuery(selector).children('span').html("Add to Wish list");

          // jQuery('.total_wishlist').html(obj.total_wishlist);

        }



        notificationWishlist(message);





      },

    });



  });
</script>

@include('web.common.scripts.addToCompare')

@include('web.common.scripts.Like')

@endsection