<footer class="footer">
    <div class="container">
      <div class="topFootr">
        <div class="row">
          <div class="col-sm-3 wow fadeInLeft">
            <figure>
              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 204 185"xml:space="preserve">
                <style type="text/css">
                  .st2{fill:#ffff00;}
                </style>
                <g>
                  <polygon class="st2" points="191.81,182.88 56.36,161.96 151.85,161.96 151.85,146.66  "/>
                  <polygon class="st2" points="202.28,146.66 100.44,146.66 155.16,48.19 163.53,33.13 145.29,117.66  "/>
                  <polygon class="st2" points="110.9,63.51 56.36,161.96 44.77,182.88 67.36,87.1 8.97,63.51  "/>
                  <polygon class="st2" points="155.16,48.19 59.42,48.19 59.42,63.51 1.72,2.12  "/>
                </g>
                </svg>
            </figure>
          </div>
          <div class="col-6 col-sm-2 wow fadeInLeft">
            <ul class="fotNav">
              <li><a href="{{url('/page/about-us')}}" title="">About</a></li>
              <li><a href="{{url('/profile')}}" title="">My Account</a></li>
              <li><a href="{{url('/active-coupons')}}" title="">Active Tickets</a></li>
              <!-- <li><a href="#campaigns" title="">Campaigns</a></li> -->
              <li><a href="{{url('/shop')}}" title="">Products</a></li>
            </ul>
          </div>
          <div class="col-6 col-sm-2 wow fadeIn">
            <ul class="fotNav">
              <li><a href="{{url('/contact')}}" title="">Contact Us</a></li>
              <li><a href="{{url('/page/faqs')}}" title="">FAQs</a></li>
              <li><a href="{{url('/page/How-It-Works')}}" title="">How it Works</a></li>
              <li><a href="{{url('/page/charities')}}" title="">Charities</a></li>
              <!-- <li><a href="#" title="">Campaign Draw</a></li> -->
            </ul>
          </div>
           <div class="col-12 col-sm-2 wow fadeInRight">
            <p>Our Partners</p>
            <ul class="footPartner">
              <li><figure><img src="{{asset('web/assets/images/partnerLogo1.webp')}}"></figure></li>
              <!-- <li><figure><img src="{{asset('web/assets/images/partnerLogo2.webp')}}"></figure></li> -->
              <li><figure><img src="{{asset('web/assets/images/partnerLogo3.webp')}}"></figure></li>
              <li><figure><img src="{{asset('web/assets/images/partnerLogo4.webp')}}"></figure></li>
            </ul>
           </div>
          <div class="col-sm-3 wow fadeInRight">
            <p>Connect with us</p>
            <ul class="socialIcon">
              <li><a href="{{$result['commonContent']['setting'][53]->value}}"><i class="fab fa-instagram"></i></a></li>
              <li><a href="{{$result['commonContent']['setting'][50]->value}}"><i class="fab fa-facebook-f"></i></a></li><!-- replace this with snapchat -->
              <li><a href="{{$result['commonContent']['setting'][127]->value}}"><i class="fab fa-youtube"></i></a></li>
              <li><a href="{{$result['commonContent']['setting'][51]->value}}"><i class="fab fa-whatsapp"></i></a></li>
            </ul>

            <div class="app-buttons--wrapper">
              <ul class="app-buttons">
                <li>
                  <a href="{{env('ANDROID_APP_URI')}}" class="app-button">
                    <img src="{{asset('web/assets/images/app/android.png')}}" alt="Android">
                  </a>
                </li>
                <li>
                  <a href="{{env('IOS_APP_URI')}}" class="app-button">
                    <img src="{{asset('web/assets/images/app/ios.png')}}" alt="iOS">
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="copy">
        <div class="row">
          <div class="col-md-2">
               <a href="{{url('/')}}">
            <figure class="footer-logo">
              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 204 185" xml:space="preserve">
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
            </figure>
          </a>
          </div>
          <div class="col-md-7">
            <div class="linksPage">
              <p>© {{ date('Y') }}. All rights reserved</p>
              <ul>
                <li><a href="{{url('/page/Privacy-Policy#userAgremMain')}}">User Agreement</a></li>
                <li><a href="{{url('/page/Privacy-Policy')}}">Privacy Policy</a></li>
                <li><a href="{{url('/page/Term-Services')}}">Terms & Conditions</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-3">
            <p>We accept</p>
            <ul>
              <!-- <li><img src="{{asset('web/assets/images/footIcon01.svg')}}" alt="*"></li> -->
              <li><img src="{{asset('web/assets/images/footIcon02.svg')}}" alt="*"></li>
              <li><img src="{{asset('web/assets/images/footIcon03.svg')}}" alt="*"></li>
              <li><img src="{{asset('web/assets/images/footIcon04.svg')}}" alt="*"></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </footer>
  
<div id="whatspaaIconContect">
  <a href="{{$result['commonContent']['setting'][51]->value}}" target="_blank">
    <img src="{{asset('web/assets/images/whatsapp.png')}}">
  </a>
</div>