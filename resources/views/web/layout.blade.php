<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
  @include('web.common.meta')
  <script src="https://cdn.lr-in.com/LogRocket.min.js" crossorigin="anonymous"></script>
  <script>
    window.LogRocket && window.LogRocket.init('1ykvxl/winztime');
  </script>
</head>
<!-- dir="rtl" -->

<body>
  <!-- Google Tag Manager (noscript) -->

  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PD2WS7J" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

  <!-- End Google Tag Manager (noscript) -->
  <style type="text/css">
    #error-msg {
      color: red;
    }

    #valid-msg {
      color: #00C900;
    }

    input.error {
      border: 1px solid #FF7C7C;
    }

    .hide {
      display: none;
    }
  </style>
  <noscript>
    <div id="jqcheck"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAB60lEQVQ4T2NkwAHePzrxf3ebL1jWp/0oA5egGiM2pVgFQQq31uj/N/ANZvj+8T3D7aNHGDwbTxNvwKtbO/9f3dLHYJ+axfDn5w+GI/NnMRhFtTEISJtjGIIh8Pv39/87ak0ZzCLiGMRUNMCufnLxDMOlrZsY3JtOMrCwsKPowTDg3tGZ/59f2sVgFRvPkO+bAzZgwsZJDEcXzWNQtIlikDGIwG3Az+9v/+9qsGOwTc1h4JeQhhswcfMUhrcP7zEcXzyXwb3xMAMbuwDcEBTTzi7P/s/M8IFB3zccbDPMBSADQODs2sUMzFwyDIah/ZgGfHt/7/+BvmAGm+RsBl4RMawGfHr5jOHowlkMjiUbGDj55MCGwE060Of1X0RZi0Hb2Q4e3eguAElc2X2A4e2DmwwOhVsRBnx6cfH/yXm5DFZxyQxcAoJ4Dfj24T3DsUVzGcwSJjLwSxkygk3ZVmv4X805gkHZRBNXwkQRv3/+NsP1nUsYvFvOMzI+PLXo/73DSxgsouIYOHj5UBRi8wJIwY8vnxlOLV/CIGcewsC4vkDhv01yLoOIoiqG7bgMACn88Owxw8HpvQyMGwqV/vs19TMwQnxDEthYW8DAeGCC3/9XN46TpBGmWEzDkoHx06dP/z9//kyWAby8vAwAcza2SBMOSCMAAAAASUVORK5CYII=" alt="Javascript is disabled" width="16" height="16"> Javascript is disabled. Please enable it for better working experience.</div>
  </noscript>

  <!-- Android and IOS banner start -->
  <div class="app-banner container-fluid">
    <div class="app-banner--main-container">
      <div class="app-banner--content">
        <div class="app-banner--title">Winztime</div>
        <div class="app-banner--sub-title">Use our mobile app for better experience.</div>
      </div>

      <button type="button" class="app-banner--action">Use App</button>
    </div>
  </div>
  <!-- Android and IOS banner end -->
  
  <div class="myLoader">
    <div class="loader logo">
      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 204 185" xml:space="preserve">

        <style type="text/css">
          .st0 {
            fill: #ffff00;
          }
        </style>

        <g>

          <polygon class="st0" points="191.81,182.88 56.36,161.96 151.85,161.96 151.85,146.66  "></polygon>

          <polygon class="st0" points="202.28,146.66 100.44,146.66 155.16,48.19 163.53,33.13 145.29,117.66  "></polygon>

          <polygon class="st0" points="110.9,63.51 56.36,161.96 44.77,182.88 67.36,87.1 8.97,63.51  "></polygon>

          <polygon class="st0" points="155.16,48.19 59.42,48.19 59.42,63.51 1.72,2.12  "></polygon>

        </g>

      </svg>
    </div>
  </div>
  @if (count($errors) > 0)
  @if($errors->any())
  <script>
    swal("Congrates!", "Thanks For Shopping!", "success");
  </script>
  @endif
  @endif

  <!-- Header Sections -->

  <!-- Top Offer -->
  <!--   <div class="header-area">
          <?php  //echo $final_theme['top_offer']; 
          ?>
        </div>
      -->

  <!-- End Top Offer -->

  <!-- Header Content -->
  <?php echo $final_theme['header']; ?>

  <!-- End Header Content -->
  <?php echo $final_theme['mobile_header']; ?>
  <!-- End of Header Sections -->

  <!-- NOTIFICATION CONTENT -->
  @include('web.common.notifications')
  @if (count($errors) > 0)
  @if($errors->any())
  <div class="alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    {{$errors->first()}}
  </div>
  @endif
  @endif

  @if(session()->has('sucess'))
  <div class="alert alert-success">
    {{ session()->get('sucess') }}
  </div>
  @endif

  <!-- END NOTIFICATION CONTENT -->
  @yield('content')



  <!-- Footer content -->
  <div class="notifications" id="notificationWishlist"></div>
  <?php echo $final_theme['footer']; ?>

  <!-- End Footer content -->
  <?php echo $final_theme['mobile_footer']; ?>
  @if(!empty($result['commonContent']['setting'][119]) and $result['commonContent']['setting'][119]->value==1)

  @if(empty(Cookie::get('cookies_data')))

  <div class="alert alert-warning alert-dismissible alert-cookie fade show" role="alert">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-12 col-md-8 col-lg-9">
          <div class="pro-description">
            @lang('website.This site uses cookies. By continuing to browse the site you are agreeing to our use of cookies. Review our')
            <a target="_blank" href="{{ URL::to('/page?name=cookies')}}" class="btn-link">@lang('website.cookies information')</a>

            @lang('website.for more details').
          </div>
        </div>
        <div class="col-12 col-md-4 col-lg-3">
          <button type="button" class="btn btn-secondary swipe-to-top" id="allow-cookies">
            @lang('website.OK, I agree')
          </button>
        </div>
      </div>
    </div>
  </div>
  @endif
  @endif

  <!-- Button trigger modal -->
  {{-- and empty(session('newsletter') --}}
  @if(!empty($result['commonContent']['setting'][118]) and $result['commonContent']['setting'][118]->value==1 and Request::path() == '/' )


  <!-- Newsletter Modal -->
  <div class="modal fade show" id="newsletterModal" tabindex="-1" role="dialog" aria-hidden="false">

    <div class="modal-dialog modal-dialog-centered modal-lg newsletter" role="document">
      <div class="modal-content">
        <div class="modal-body">

          <div class="container">
            <div class="row align-items-center">

              <div class="col-12 col-md-6">
                <div class="pro-image">
                  @if($result['commonContent']['setting'][124]->value)
                  <img class="img-fluid" src="{{asset('').$result['commonContent']['setting'][124]->value }}" alt="blogImage">
                  @endif
                </div>
              </div>
              <div class="col-12 col-md-6" style="padding-left: 0;">
                <div class="promo-box">
                  <h2 class="text-01">
                    @lang('website.Sign Up for Our Newsletter')
                  </h2>
                  <p class="text-03">
                    @lang('website.Be the first to learn about our latest trends and get exclusive offers')
                  </p>
                  <form class=" mailchimp-form" action="{{url('subscribeMail')}}">
                    <div class="form-group">
                      <input type="email" value="" name="email" class="required email form-control" placeholder="@lang('website.Enter Your Email Address')...">
                    </div>
                    <button type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="btn btn-secondary swipe-to-top newsletter">@lang('website.Subscribe')</button>
                  </form>
                </div>
              </div>
            </div>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endif


  <div class="mobile-overlay"></div>
  <!-- Product Modal -->


  <a href="web/#" id="back-to-top" class="btn-secondary swipe-to-top" title="@lang('website.back_to_top')">&uarr;</a>


  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">

    <div class="modal-dialog modal-lg" role="document">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <div class="modal-content">

        <div class="modal-body">

          <div class="container" id="products-detail">
          </div>
        </div>
      </div>
    </div>
  </div>

  @if(!in_array(\Route::currentRouteName(), ['login', 'otp', 'password.reset', 'password.request', 'password.email']))
    @if(!auth()->guard('customer')->check())
      @include('web.common.login-signup-modal')
    @endif
  @endif

  <!-- Include js plugin -->
</body>
@include('web.common.scripts')
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script type="text/javascript" src="{{asset('web/assets/js/xJquery.js')}}"></script>
<script type="text/javascript" src="{{asset('web/assets/js/script.js')}}" defer></script>
<script type="text/javascript" src="{{asset('web/assets/js/slick.min.js')}}" defer></script>
<script type="text/javascript" src="{{asset('web/assets/js/intlTelInput.min.js')}}" defer></script>
<script type="text/javascript" src="{{asset('web/assets/js/utils.js')}}" defer></script>
<script type="text/javascript" src="{{asset('js/jquery.validate.js')}}" defer></script>
<script type="text/javascript" src="{{asset('js/additional-methods.min.js')}}" defer></script>
<script type="text/javascript" src="{{asset('js/jquery-validator.js')}}" defer></script>


@include('web.common.custom_payment')

<script type="text/javascript">
  $(document).ready(function() {
    $('.sec3Slide').slick({
      dots: false,
      infinite: false,
      speed: 300,
      arrows: true,
      slidesToShow: 4,
      slidesToScroll: 1,
      responsive: [{
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
            infinite: true,
            // dots: true
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
      ]
    });
  });
</script>


<script>
    /**
   * Determine the mobile operating system.
   * This function returns one of 'iOS', 'Android', 'Windows Phone', or 'unknown'.
   *
   * @returns {String}
   */
    function getMobileOperatingSystem() {
      var userAgent = navigator.userAgent || navigator.vendor || window.opera;

      // Windows Phone must come first because its UA also contains "Android"
      if (/windows phone/i.test(userAgent)) {
        return "Windows Phone";
      }

      if (/android/i.test(userAgent)) {
        return "Android";
      }

      // iOS detection from: http://stackoverflow.com/a/9039885/177710
      if (/iPad|iPhone|iPod/.test(userAgent) && !window.MSStream) {
        return "iOS";
      }

      return "unknown";
    }

    jQuery('body').on('click', '.app-banner .app-banner--action', function(event) {
      event.preventDefault();

      let system = getMobileOperatingSystem();

      if (system.toLowerCase() === 'android') {
        window.location.href = '{{env("ANDROID_APP_URI")}}';
      } else if(system.toLowerCase() === 'ios') {
        window.location.href = '{{env("IOS_APP_URI")}}';
      }
    })
  </script>

</html>