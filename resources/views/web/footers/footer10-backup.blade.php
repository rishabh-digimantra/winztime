<footer class="footer">
    <div class="topFootr clearfix">
      <div class="row">
        <div class="col-md-4">
          <div class=" wow fadeIn text-left">
            <h3>Lucramania.</h3>
            <ul class="socialArea">
              <li><a href="{{$result['commonContent']['setting'][53]->value}}"><i class="fab fa-instagram"></i></a></li>
              <li><a href="{{$result['commonContent']['setting'][51]->value}}"><i class="fab fa-snapchat"></i></a></li>
              <li><a href="{{$result['commonContent']['setting'][50]->value}}"><i class="fab fa-facebook-f"></i></a></li>
              <li><a href="{{$result['commonContent']['setting'][52]->value}}"><i class="fab fa-twitter"></i></a></li>
              <li><a href="{{$result['commonContent']['setting'][127]->value}}"><i class="fas fa-play"></i></a></li>
            </ul>
          </div>
        </div>
        <div class="col-md-4">
          <div class="footerMid wow fadeIn">
            <ul class="footerMenu">
              <li><a href="{{url('/page?name=about-us')}}" title="">About us</a></li>
              <li><a href="{{url('/page?name=contact')}}" title="">Contact us</a></li>
              <li><a href="{{url('/page?name=faqs')}}" title="">FAQs</a></li>
              <li><a href="{{url('/page?name=legal')}}" title="">Legal</a></li>
            </ul>
          </div>
        </div>
        
        <div class="col-md-4">
          <div class=" wow fadeIn text-right">
            <h3>Let’s talk.</h3>
            <h4>{{$result['commonContent']['setting'][11]->value}}<br>{{$result['commonContent']['setting'][3]->value}}</h4>
          </div>
        </div>
      </div>
    </div>
    <div class="copy clearfix">
      <div class="row">
        <div class="col-md-8">
          <div class="copyLeft">
            <p><a href="javascript:;">Lucramania.</a> © {{ date('Y') }}. All rights reserved.</p>
          </div>
        </div>
        <!-- <div class="col-md-4">
          <div class="footerMid"  style="text-align: center;">
            <p>Designed and Developed by <a href="https://www.digitalsetgo.com/">DigitalsetGo</a></p>
          </div>
        </div> -->
        <div class="col-md-4">
          <div class="copyRight">
            <h5>We accept</h5>
            <ul>
              <li><i class="fab fa-cc-visa"></i></li>
              <li><i class="fab fa-cc-mastercard"></i></li>
              <li><i class="fab fa-cc-amex"></i></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </footer>

  