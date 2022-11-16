 <?php $qunatity=0; ?>

 @foreach($result['commonContent']['cart'] as $cart_data)

 <?php $qunatity += $cart_data->customers_basket_quantity; ?>

 @endforeach

 <noscript>

  <div id="jqcheck"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAB60lEQVQ4T2NkwAHePzrxf3ebL1jWp/0oA5egGiM2pVgFQQq31uj/N/ANZvj+8T3D7aNHGDwbTxNvwKtbO/9f3dLHYJ+axfDn5w+GI/NnMRhFtTEISJtjGIIh8Pv39/87ak0ZzCLiGMRUNMCufnLxDMOlrZsY3JtOMrCwsKPowTDg3tGZ/59f2sVgFRvPkO+bAzZgwsZJDEcXzWNQtIlikDGIwG3Az+9v/+9qsGOwTc1h4JeQhhswcfMUhrcP7zEcXzyXwb3xMAMbuwDcEBTTzi7P/s/M8IFB3zccbDPMBSADQODs2sUMzFwyDIah/ZgGfHt/7/+BvmAGm+RsBl4RMawGfHr5jOHowlkMjiUbGDj55MCGwE060Of1X0RZi0Hb2Q4e3eguAElc2X2A4e2DmwwOhVsRBnx6cfH/yXm5DFZxyQxcAoJ4Dfj24T3DsUVzGcwSJjLwSxkygk3ZVmv4X805gkHZRBNXwkQRv3/+NsP1nUsYvFvOMzI+PLXo/73DSxgsouIYOHj5UBRi8wJIwY8vnxlOLV/CIGcewsC4vkDhv01yLoOIoiqG7bgMACn88Owxw8HpvQyMGwqV/vs19TMwQnxDEthYW8DAeGCC3/9XN46TpBGmWEzDkoHx06dP/z9//kyWAby8vAwAcza2SBMOSCMAAAAASUVORK5CYII=" alt="Javascript is disabled" width="16" height="16">Javascript is disabled. Please enable it for better working experience.</div>

</noscript>
<header class="header wow fadeInDown">  

  <div class="container">

    <div class="topBar">

      <div class="row">

        <div class="col-lg-2">

          <a href="{{url('/')}}" title="" class="logo">

            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 204 185"xml:space="preserve">

              <style type="text/css">

              .st0{fill:#ffff00;}

            </style>

            <g>

              <polygon class="st0" points="191.81,182.88 56.36,161.96 151.85,161.96 151.85,146.66  "/>

              <polygon class="st0" points="202.28,146.66 100.44,146.66 155.16,48.19 163.53,33.13 145.29,117.66  "/>

              <polygon class="st0" points="110.9,63.51 56.36,161.96 44.77,182.88 67.36,87.1 8.97,63.51  "/>

              <polygon class="st0" points="155.16,48.19 59.42,48.19 59.42,63.51 1.72,2.12  "/>

            </g>

          </svg>

          <img src="{{asset('web/assets/images/footLogo.svg')}}" alt="Winztime Logo">

        </a>

      </div>

      <div class="col-lg-4">

        <nav class="nav navbar-nav navigation">

          <a href="#" id="pull" title=""><i class="fa fa-navicon"></i></a>

          <ul id="topMenu">

             {!! $result['commonContent']["menusRecursive"] !!}

          </ul>

        </nav>

      </div>

      <div class="col-lg-6 menu-list">

        <div class="logoRightBar">

          <ul>

            <li><p>Need Help? <a href="{{url('/')}}/contact">Contact us</a> <a href="tel:+971552801120">Call {{$result['commonContent']['setting'][11]->value}}</a></p></li>

            <li>

              <div class="currencyConvert">

              <img src="{{asset('web/assets/images/flagImg.webp')}}">

              <a href="javascript:;">AED<img src="{{asset('web/assets/images/arrowRght.webp')}}" alt="Arrow Right"></a>

            </div>

          </li>

            <li><a href="javascript:;" class="langTrans">English</a></li>



            @if(Auth::guard('customer')->check())

              <li class="usrNme" id="sak">Hi, <span style="text-transform: capitalize;">{{Auth::guard('customer')->user()->first_name}}</span>!

                <ul>

                  @if(Auth::guard('customer')->check())

                  <li><a href="{{url('/')}}/profile" title="">Personal Details</a></li>

                  <li><a href="{{url('/')}}/levels" title="">Levels</a></li>

                  <li><a href="{{url('/')}}/wishlist" title="">Wish list</a></li>

                  <li><a href="{{url('/')}}/active-coupons" title="">Active Coupons</a></li>

                  <li><a href="{{url('/')}}/my-zpoints" title="">Z-Points</a></li>

                  <!-- <li><a href="payment-options" title="">Payment Options</a></li> -->

                  <li><a href="{{url('/')}}/address-book" title="">Address Book</a></li>

                  <li><a href="{{url('/')}}/refer-a-friend" title="">Invite A Friend To Earn</a></li>

                  <li><a href="{{url('/')}}/change-password" title="">Change Password</a></li>

                  <li><a href="{{url('/')}}/logout" title="">Logout</a></li>

                  @endif

                </ul>

              </li> 

            @else

              <li><a href="{{URL('login')}}" class="lgnSgn">Register / Login</a></li>

            @endif

                <li class="cart-header dropdown head-cart-content">@include('web.headers.cartButtons.cartButton10') </li>   

          </ul>

        </div>

      </div>

    </div>

    </div>

  </div>

</header>