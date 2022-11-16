<script type="text/javascript" src="{{asset('web/assets/js/intlTelInput.min.js')}}" defer></script>
<script type="text/javascript" src="{{asset('web/assets/js/utils.js')}}" defer></script>
<section id="login-sec">

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6">
        <div class="row justify-content-center">
          <div class="col-12 col-sm-12 col-md-6 justify-content-center">
            @if(Session::has('loginError'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
              <span class="">@lang('website.Error'):</span>
              {!! session('loginError') !!}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            @endif
            @if(Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
              <span class="sr-only">@lang('website.Success'):</span>
              {!! session('success') !!}

              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            @endif
            @if(Session::has('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
              <span class="sr-only">@lang('website.Success'):</span>
              {!! session('status') !!}

              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            @endif
            @if( count($errors) > 0)
            @foreach($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
              <span class="sr-only">@lang('website.Error'):</span>
              {{ $error }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            @endforeach
            @endif

            @if(Session::has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
              <span class="sr-only">@lang('website.Error'):</span>
              {!! session('error') !!}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            @endif
            @if( count($errors) > 0 || Session::has('error'))
            <script type="text/javascript">
              $(document).ready(function() {
                $("#accordion-1").attr('style', 'display:none;');
              });
            </script>
            @endif
          </div>
        </div>
        <div class="accordion">
          <div class="quest-section">
            <a class="quest-title active1" href="#accordion-1">Please Login</a>
            <div id="accordion-1" class="quest-content">
              <form enctype="multipart/form-data" class="login-form-validate" action="{{ URL::to('/process-login')}}" method="post">
                {{csrf_field()}}
                <div class="col-12 input-effect">
                  <input class="effect-21" type="email" name="email" id="email" placeholder="" required="required">
                  <label>Email</label>
                  <span class="focus-border">
                    <i></i>
                  </span>
                </div>
                <div class="col-12 input-effect">
                  <input class="effect-21 login-field-validate form-text" name="password" id="password1" type="password" placeholder="" required="required">
                  <label>Password</label>
                  <span class="focus-border">
                    <i></i>
                  </span>
                  <!-- <a href="javascript:;" class="ct-pass" toggle="#password"></a> -->
                  <a href="javascript:;" toggle="#password1" class="field-icon toggle-password5 showHideIcon "><i class="fas fa-eye"></i></a>
                </div>
                <div class="row ct-form-row">
                  <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                    <a href="{{ URL::to('/password/reset')}}">Forgot Password ?</a>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                    <!-- onclick="loginfieldvalidate();" -->
                    <input type="submit" id="login-btn" value="Login">
                  </div>
                </div>
                <div class="col-12 col-sm-12 text-center mt-4">
                  <div class="social-btn">

                    @if($result['commonContent']['setting'][61]->value==1)
                    <!-- <a href="login/google" type="button" class="btn btn-google"><span><i class="fab fa-google-plus-g"></i>&nbsp; @lang('website.Google') </span></a> -->

                    <a href="login/google"><button type="button" class="btn btn-warning"><span><i class="fab fa-google-plus-g"></i>&nbsp; @lang('website.Google') </span></button></a>

                    @endif
                    @if($result['commonContent']['setting'][2]->value==1)
                    <!--  <a href="login/facebook" type="button" class="btn btn-facebook"><span><i class="fab fa-facebook-f"></i>&nbsp;@lang('website.Facebook')</span></a> -->
                    <a href="login/facebook"><button type="button" class="btn btn-warning"><span><i class="fab fa-facebook-f"></i>&nbsp; @lang('website.Facebook') </span></button></a>
                    @endif
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="quest-section">
            <a class="quest-title @if( count($errors) > 0) active @endif @if(Session::has('error')) active @endif" href="#accordion-2">New here? Register now</a>
            <div id="accordion-2" class="quest-content @if( count($errors) > 0 || Session::has('error')) open @endif" @if( count($errors)> 0 || Session::has('error')) style="display:block;" @endif>
              <form name="signup" enctype="multipart/form-data" action="{{ URL::to('/signupProcess')}}" method="post" id="reg-form">
                {{csrf_field()}}
                <div class="col-12 input-effect">
                  <input class="effect-21 numeric_not_allow" type="text" placeholder="" name="firstNamenew" value="{{ old('firstNamenew') }}" required="required" autocomplete="off" />
                  <label>First Name</label>
                  <span class="focus-border">
                    <i></i>
                  </span>
                </div>
                <div class="col-12 input-effect">
                  <input class="effect-21 numeric_not_allow" name="lastName" type="text" placeholder="" value="{{ old('lastName') }}" required="required" autocomplete="off" />
                  <label>Last Name</label>
                  <span class="focus-border">
                    <i></i>
                  </span>
                </div>
                <div class="co-lg-12 clearfix" id="reg-radio">
                  <label class="ct-container">Male
                    <input type="radio" name="gender" value="0" required="required" {{ old('gender') == "0" ? 'checked' : '' }} />
                    <span class="checkmark"></span>
                  </label>
                  <label class="ct-container">Female
                    <input type="radio" name="gender" value="1" required="required" {{ old('gender') == "1" ? 'checked' : '' }} />
                    <span class="checkmark"></span>
                  </label>
                </div>
                <div class="col-12 input-effect">
                  <input type="email" name="email_fake" id="email_fake" value="" style="display:none;" />
                  <input class="effect-21" name="email" id="r_email" type="email" placeholder="" value="{{ old('email') }}" required="required" autocomplete="off" />
                  <label>Email</label>
                  <span class="focus-border">
                    <i></i>
                  </span>
                </div>
                <div class="col-12 input-effect ">

                  <label>Date Of Birth*</label>
                  <div class="row">
                    <div class="col-4">
                      <select id="year" name="year" class="effect-21" required="required" onchange="getMonth($(this).val())">
                        <option value="" disabled selected>Select Year</option>
                      </select>
                    </div>

                    <div class="col-4 ">
                      <select id="month" name="month" class="effect-21" required="required" disabled onchange="getDaysInMonth($(this).val(),$('#year').val())">
                        <option value="" selected disabled>Select Month</option>
                      </select>
                    </div>

                    <div class="col-4">
                      <select id="day" name="day" class="effect-21" required="required" disabled onchange="checkDOB();">
                        <option value="" disabled selected>Select Day</option>
                      </select>
                    </div>

                  </div>


                  <span class="focus-border">
                    <i></i>
                  </span>
                </div>
                <div class="col-12 input-effect">
                  <input type="password" name="password_fake" id="password_fake" value="" style="display:none;" />

                  <input class="effect-21 regPass form-text" type="password" placeholder="" name="password" id="password" required="required" autocomplete="off" />
                  <label>Password</label>
                  <span class="focus-border">
                    <i></i>
                  </span>
                  <a href="javascript:;" toggle=".regPass" class="field-icon toggle-password5 showHideIcon"><i class="fas fa-eye"></i></a>
                </div>
                <div class="col-12 input-effect">
                  <input class="effect-21 form-text" type="password" placeholder="" id="re_password" name="re_password" required="required" autocomplete="off" />
                  <label>Confirm Password</label>
                  <span class="focus-border">
                    <i></i>
                  </span>
                  <a href="javascript:;" toggle="#re_password" class="field-icon  toggle-password6 showHideIcon"><i class="fas fa-eye"></i></a>
                </div>
                <div class="col-12 input-effect">
                  <input class="effect-21 countrycode numbersOnly" id="phone" name="phone" maxlength= "16" value="{{ old('phone') }}" type="tel" required="required" />
                  <input type="hidden" id="country_code" name="country_code">
                  <span class="focus-border">
                    <i></i>
                  </span>
                  <span id="valid-msg" class="hide">✓ Valid</span>
                  <span id="error-msg" class="hide"></span>
                </div>

                <div class="col-12 input-effect">
                  <input class="effect-21" type="text" placeholder="" name="invitationcode" id="invitationcode">
                  <label>Invitation Code(Optional)</label>
                  <span class="focus-border">
                    <i></i>
                  </span>
                </div>
                <div class="ct-form-row">
                  <div class="col-lg-12">
                    <!-- onclick="signupfieldvalidate();"  -->

                    <input type="submit" id="register-btn" value="Register">
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>

        <div id="loader"></div>
      </div>
    </div>
  </div>
</section>
<script type="text/javascript">
  function getYears() {
    var max = new Date().getFullYear()
    var min = max - 100
    var years = []
    var html = '';
    for (var i = max; i >= min; i--) {
      html += '<option value="' + i + '"> ' + i + '</option>';
    }
    $('#year').append(html);
    return years
  }
  getYears()

  function getMonth(year) {
    console.log(year)
    var theMonths = ["January", "February", "March", "April", "May",
      "June", "July", "August", "September", "October", "November", "December"
    ];
    var today = new Date();
    var aYear = today.getFullYear();
    if (aYear == year) {
      var aMonth = today.getMonth() - 1;
    } else {
      var aMonth = 11;
    }
    var i;
    var html = '';
    html += '<option selected disabled> Select Month</option>';
    for (i = 0; i <= aMonth; i++) {
      html += '<option value="' + (i + 1) + '"> ' + theMonths[i] + '</option>';
    }
    $('#month').empty().attr('disabled', false).append(html);
  }

  function getDaysInMonth(month, year) {
    main_date_count = new Date(year, month, 0).getDate();
    month = parseInt(month) - 1;
    var current_date = new Date();
    var current_month = current_date.getMonth();
    var s_date = new Date(year, month, 0);
    console.log(current_month, month, current_date.getFullYear())

    if (current_month == month && current_date.getFullYear() == s_date.getFullYear()) {
      var current_day = current_date.getDate();
      date_count = current_day - 1;
    } else {
      date_count = main_date_count;
    }
    var html = '';
    html += '<option selected disabled> Select Day</option>';
    for (i = 1; i <= date_count; i++) {
      html += '<option value="' + i + '"> ' + i + '</option>';
    }
    $('#day').empty().attr('disabled', false).append(html);
  }

  function checkDOB() {
    var y = $('#year').val();
    var m = parseInt($('#month').val());
    var d = $('#day').val();
    var specific_date = new Date(y + '-' + m + '-' + d);
    console.log(specific_date)
    var current_date = new Date();
    if (current_date.getTime() >= specific_date.getTime()) {
      console.log('current_date date is grater than specific_date')
    } else {
      alert("Please select valid date");
      $('#year').val('');
      $('#month').val('');
      $('#day').val('');
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
    input.addEventListener("countrychange", function() {
      var countryData = iti.getSelectedCountryData();

      document.getElementById('country_code').value = countryData.dialCode;
    });
    var reset = function() {
      input.classList.remove("error");
      errorMsg.innerHTML = "";
      errorMsg.classList.add("hide");
      validMsg.classList.add("hide");
    };
    input.addEventListener('blur', function() {
      reset();
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
  });

  var spinner = $('#loader');
  // $(function() {
  //   $('#reg-form').submit(function(e) {
  //     // console.log('form submit ----')
  //     spinner.show();
  //     // return false;

  //   });
  // });

  $(document).ready(function() {
    $(this).scrollTop(0);
  });
</script>
<style type="text/css">
  #loader {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    width: 100%;
    background: rgba(0, 0, 0, 0.75) url(images/loading2.gif) no-repeat center center;
    z-index: 10000;
  }
</style>