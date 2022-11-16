 <?php $qunatity=0; ?>
 @foreach($result['commonContent']['cart'] as $cart_data)
 <?php $qunatity += $cart_data->customers_basket_quantity; ?>
 @endforeach
 <header class="header">
  <div class="topBar clearfix">
    <a href="https://lucramania.com/page?name=covid-19">COVID-19 Response</a>
  </div>
  <div class="logoBar clearfix">
    <div class="row">
      <div class="col-md-8 col-sm-6">
        <a href="https://lucramania.com/" title="" class="logo"><!-- <img src="assets/images/logo.png"> --> @if($result['commonContent']['settings']['sitename_logo']=='name')
          <?=stripslashes($result['commonContent']['settings']['website_name'])?>.
        @endif</a>
      </div>
      <div class="col-md-4 col-sm-6">

        <ul class="logoRight">
  <!--         @foreach($languages as $language)
          <li><a  onclick="myFunction1({{$language->languages_id}})" class="languageSelct" href="javascript:;">                     
            {{$language->name}}
          </a></li>           
          @endforeach -->
          <!-- <li><a href="javascript:;" class="languageSelct">EN</a></li> -->
          <!-- <li><a href="javascript:;" onclick="myFunction1(5)" class="languageSelct">Ar<i class="fas fa-caret-down"></i></a></li> -->

          <!-- <li><a href="{{asset('wishlist')}}" class="languageSelct"><i class="fas fa-heart"></i></a></li> -->
              <!-- <li>
                <div class="srchBtn">
                  <a href="javascript:;" title="" class="searchSubmit"><i class="fas fa-search"></i></a>
                  <div class="srchArea">
                    <form role="search" method="get" class="search-form" action="/">
                      <input type="text" class="searchInput" name="s" placeholder="Search">
                    </form>
                  </div>
                </div>
              </li> -->

              @if(Auth::guard('customer')->check())
              <li class="usrNme">Hi, <span style="text-transform: capitalize;">{{Auth::guard('customer')->user()->first_name}}</span>!</li>   
              <!-- <li> -->
                <!-- <a href="javascript:;" class="lgnSgn " id="topselector2"><i class="fas fa-user"></i></a> -->
                  <!-- <ul id="topMenu">
                  
                  </ul> -->
                  <!-- <div id="topMenu2"> -->
                  <!-- <div class="availPointMenu">
                  <ul>
                    <li>example@example.com<span>new member</span></li>
                    <li class="text-right">Available Points <strong>0</strong></li>
                  </ul>
                  </div>
                  <div class="pointProgWrp">
                    <h4><small>0</small>l-Points earned</h4>
                    <h4 class="text-right"><small>Next level @</small><strong>2000 l-Points</strong></h4>
                    <div class="progress">
                      <div class="progress-bar-inr" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0">
                      </div>
                    </div>
                    <h4>You need <strong>2000</strong> l-Points</h4>
                  </div> -->
                  <!-- <ul class="personalMenu">
                    
                  </ul>
              </li> -->
              @else
              <li><a href="{{URL('login')}}" class="lgnSgn"><i class="fas fa-user"></i>Login / Register</a></li>
              @endif
              <li class="cart-header dropdown head-cart-content">
                @include('web.headers.cartButtons.cartButton10') 
              </li>
              <li class="prcdChckt"><a href="https://lucramania.com/viewcart">Checkout</a></li>
              <!-- <li><a href="/"><i class="fas fa-home"></i></a></li> -->
              <li>
                <nav class="nav navbar-nav navigation">
                  
                  <a href="#" id="pull" title=""><span></span><i class="fas fa-times"></i></a>
                  <ul id="topMenu" tabindex="-1">
                    {!! $result['commonContent']["menusRecursive"] !!}
                    @if(Auth::guard('customer')->check())
                    <hr>
                    <li><a href="https://lucramania.com/profile" title="">Personal Details</a></li>
                    <li><a href="https://lucramania.com/levels" title="">Levels</a></li>
                    <li><a href="https://lucramania.com/wishlist" title="">Wish list</a></li>
                    <li><a href="https://lucramania.com/active-coupons" title="">Active Coupons</a></li>
                    <li><a href="https://lucramania.com/my-lpoints" title="">L-Points</a></li>
                    <!-- <li><a href="payment-options" title="">Payment Options</a></li> -->
                    <li><a href="https://lucramania.com/address-book" title="">Address Book</a></li>
                    <li><a href="https://lucramania.com/refer-a-friend" title="">Invite A Friend To Earn</a></li>
                    <li><a href="https://lucramania.com/change-password" title="">Change Password</a></li>
                    <li><a href="https://lucramania.com/logout" title="">Logout</a></li>
                    @endif
                  </ul>
                </nav>
              </li><li>
                <nav class="nav navbar-nav navigation">
                  
                  <a href="#" id="pull" title=""><span></span><i class="fas fa-times"></i></a>
                  <ul id="topMenu" tabindex="-1">
                    {!! $result['commonContent']["menusRecursive"] !!}
                    @if(Auth::guard('customer')->check())
                    <hr>
                    <li><a href="https://lucramania.com/profile" title="">Personal Details</a></li>
                    <li><a href="https://lucramania.com/levels" title="">Levels</a></li>
                    <li><a href="https://lucramania.com/wishlist" title="">Wish list</a></li>
                    <li><a href="https://lucramania.com/active-coupons" title="">Active Coupons</a></li>
                    <li><a href="https://lucramania.com/my-lpoints" title="">L-Points</a></li>
                    <!-- <li><a href="payment-options" title="">Payment Options</a></li> -->
                    <li><a href="https://lucramania.com/address-book" title="">Address Book</a></li>
                    <li><a href="https://lucramania.com/refer-a-friend" title="">Invite A Friend To Earn</a></li>
                    <li><a href="https://lucramania.com/change-password" title="">Change Password</a></li>
                    <li><a href="https://lucramania.com/logout" title="">Logout</a></li>
                    @endif
                  </ul>
                </nav>
              </li>
            </ul>
          </div>
        </div>
        <!-- </div> -->
      </div>
      
      <!-- Facebook Pixel Code -->
      <script>
      !function(f,b,e,v,n,t,s)
      {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
      n.callMethod.apply(n,arguments):n.queue.push(arguments)};
      if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
      n.queue=[];t=b.createElement(e);t.async=!0;
      t.src=v;s=b.getElementsByTagName(e)[0];
      s.parentNode.insertBefore(t,s)}(window, document,'script',
      'https://connect.facebook.net/en_US/fbevents.js');
      fbq('init', '507878660370669');
      fbq('track', 'PageView');
      </script>
      <noscript><img height="1" width="1" style="display:none"
      src="https://www.facebook.com/tr?id=507878660370669&ev=PageView&noscript=1"
      /></noscript>
      <!-- End Facebook Pixel Code -->
    </header>