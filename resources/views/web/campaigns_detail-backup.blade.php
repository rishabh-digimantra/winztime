@extends('web.layout')

@section('content')

<!-- End Header Content -->

<!-- NOTIFICATION CONTENT -->

<!-- END NOTIFICATION CONTENT -->

<!-- Carousel Content -->

<!-- Fixed Carousel Content -->





  

<section class="main-section home-section-three" id="shopping">

  <!-- <div class="container"> -->

    <h2 class="wow fadeIn">Campaign Details</h2>



    @foreach($result['campaigns'] as $key => $row)

    @if($row->campaigns_id == $mycampaignsid)

    <form name="attributes" id="add-Product-form_{{$row->campaigns_id}}" method="post" >

      <input type="hidden" name="products_id" value="{{$row->products_id}}"products_id="{{$row->products_id}}" id="product_id">

      <input type="hidden" name="products_price" id="products_price" value="{{$row->products_price}}">

      <input type="hidden" name="checkout" id="checkout_url" value="false">

      <div class="sec3Wrap">

        <div class="clearfix">

          <div class="col-md-6">

            <div class="row">

              <div class="sec3Inner sec3Inner1 wow fadeIn">

                <?php 

                $datacheck = $row->no_of_orders-$result['total_order'][$key];

                ?>

                @if($datacheck > 0 )

                <div class="flashSale">

                  <p><i class="fas fa-bolt"></i>Early Bird offer is active </p>

                </div>

                @endif

                

                <h3>Buy</h3>

                <figure>

                  <!-- style="max-width: 100%;height: 400px;" -->

                  <!-- <img src="{{asset($result['products_img_path'][$key]->path)}}"> -->



                  <img src="{{asset($result['products_featured_img'][$key]->path)}}">

                </figure>

                <figcaption>

                  <h4>{{$result['products_description'][$key]->products_name}}</h4>

                  <p>{!!$result['products_description'][$key]->products_description !!}</p>

                </figcaption>

              </div>

            </div>

          </div>

          <div class="col-md-6">

            <div class="row">

              <div class="sec3Inner sec3Inner1 wow fadeIn is_liked" >

                <script async src="https://static.addtoany.com/menu/page.js"></script>  

                <ul>

                   @if(!empty(auth()->guard('customer')->user()->id))

                    @if(App\Models\Web\Customer::checkWhishlist($row->products_id) == true)

                      <li><a href="javascript:;" class="wishlist" products_id="{{$row->products_id}}"><img src="{{asset('web/assets/images/sec3Icon-red.png')}}" class="heart"></a></li>

                    @else

                      <li><a href="javascript:;" class="wishlist" products_id="{{$row->products_id}}"><img src="{{asset('web/assets/images/sec3Icon.png')}}" class="heart"></a></li>

                    @endif 

                    @else

                     <li><a href="javascript:;" class="wishlist" products_id="{{$row->products_id}}"><img src="{{asset('web/assets/images/sec3Icon.png')}}" class="heart"></a></li> 

                  @endif

                  <li class="subPopBtn"><a href="javascript:;"><img src="{{asset('web/assets/images/sec3Icon2.png')}}"></a>

                    <ul class="subPop a2a_kit">

                      <li><a class="a2a_button_facebook " title="Facebook" data-share="facebook"target="_blank"><i class="fab fa-facebook-f"></i>Share on Facebook</a></li>

                      <li><a href="http://twitter.com/share?text={{$result['products_description'][$key]->products_name}}&url=https://lucramania.com/campaigns/detail/{{$row->campaigns_id}}" title="Twitter" data-share="facebook"target="_blank"><i class="fab fa-twitter-square"></i>Share on Twitter</a></li>

                      <li><a class="a2a_button_linkedin"><i class="fab fa-linkedin-in"></i>Share on Linkedin</a></li>

                      <li><a href="https://api.whatsapp.com/send/?phone=971559461406&text&app_absent=0"><i class="fab fa-whatsapp"></i>Share on Whatsapp</a></li>

                      <!-- <li><a href="javascript:;"><i class="fab fa-instagram"></i>Share on Instagram</a></li> -->

                      <li><a href="mailto:?Subject=Please check out this exciting campaign!&amp;Body=Check out this exciting campaign! https://lucramania.com/campaigns/detail/{{$row->campaigns_id}}"><i class="far fa-envelope"></i>Share on E-mail</a></li>

                    </ul>

                  </li>



               <!--  <div class="a2a_kit a2a_default_style">

                  <a class="a2a_button_facebook " title="hello" data-share="facebook"target="_blank"><i class="fab fa-facebook-f"></i></a>

                  <a class="a2a_button_linkedin"></a>

                  <a class="a2a_button_whatsapp"></a>

                  <a class="a2a_button_email"></a>

                  </div> -->

                  

                </ul>

                <h3>Win</h3>

                <figure>

                  <img src="{{asset('images/'.$result['rewards'][$key]->reward_image)}}">

                </figure>

                <figcaption>

                  <h4>{{$result['rewards'][$key]->reward_title}}</h4>

                  <p>{!!$result['rewards'][$key]->reward_description!!}</p>

                </figcaption>

              </div>

            </div>

          </div>

          <div class="col-md-6 col-md-offset-3">

            <div class="sec3btm text-center wow fadeIn">

              <h4 style="color: #3e6ae1;">Launching Soon!</h4>

              <h5>{{Session::get('symbol_left')}} {{$row->products_price}} {{Session::get('symbol_right')}}</h5>

              <a href="javascript:;" class="btn productWrap swipe-to-top modal_show" products_id="{{$row->products_id}}" data-toggle="tooltip" data-placement="bottom">Images</a>

              

              <div class="pt_Quantity">

                <input type="number" name="quantity" min="0" max="100" step="1" value="1" data-inc="1" id="quantity_{{$row->campaigns_id}}">

              </div>

              <!--  -->

              <a href="javascript:;" class="cartBtn btn" onclick="addToCart('{{$row->products_id}}','{{$row->products_price}}','{{$row->campaigns_id}}')" >add to cart</a>

              <div class="progress-container">

                <!-- <div class="progress-bar" id="myBar" ></div> -->

                <div class="progress-bar" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="{{$row->no_of_orders}}" style="width: 0%"><?php //$result['total_order'][$key]  echo $result['total_order'][$key]; ?></div>

              </div>

              <p class="quantityWrap"><strong>0 Sold</strong> Out of {{$row->no_of_orders}}</p>

            </div>

          </div>

        </div>

      </div>

    </form>

    @endif

    @endforeach

  </section>

  @include('web.common.scripts.addToCompare')

  @include('web.common.scripts.Like')

  @endsection

