<div id="login-signup-modal" class="modal" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content pt-4 pb-4">
      <div class="modal-header">
        <ul id="login-signup-modal-nav" class="nav nav-pills nav-justified">
          <li class="nav-item">
            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#register-form-wrapper" type="button" role="tab" aria-selected="false">Sign Up</button>
          </li>
          <li class="nav-item">
            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#login-form-wrapper" type="button" role="tab" aria-selected="false">Login</button>
          </li>
        </ul>
      </div>
      <div class="modal-body">
        <div class="tab-content" id="myTabContent">
          <div id="register-form-wrapper" class="form-wrapper tab-pane fade" role="tabpanel">
            <div class="d-block text-center mb-3">
              <p>*Get a FREE credit of 100 Z Points upon Sign up</p>
            </div>

            <div class="form-title d-flex justify-content-center mb-5">
              <div class="d-inline-flex align-items-center">
                <span class="icon-wrapper">
                  <i class="fa fa-sign-in icon" aria-hidden="true"></i>
                </span>
                <span class="d-inline-block ml-2 font-weight-bold">New here? Register now</span>
              </div>
            </div>

            <form name="signup" enctype="multipart/form-data" action="{{ URL::to('/signupProcess')}}" method="post" id="reg-form">
              {{csrf_field()}}
              <div class="row">
                <div class="col-12 col-md-6">
                  <div class="input-effect">
                    <input class="effect-21 numeric_not_allow" type="text" placeholder="" name="firstNamenew" value="{{ old('firstNamenew') }}" required="required" autocomplete="off" />
                    <label>First Name</label>
                    <span class="focus-border">
                      <i></i>
                    </span>
                  </div>
                </div>
                <div class="col-12 col-md-6">
                  <div class="input-effect">
                    <input class="effect-21 numeric_not_allow" name="lastName" type="text" placeholder="" value="{{ old('lastName') }}" required="required" autocomplete="off" />
                    <label>Last Name</label>
                    <span class="focus-border">
                      <i></i>
                    </span>
                  </div>
                </div>
              </div>
              <div class="col-12 input-effect">
                <input type="email" name="email_fake" id="email_fake" value="" style="display:none;" />
                <input class="effect-21 text-set" name="email" id="r_email" type="email" placeholder="" value="{{ old('email') }}" required="required" autocomplete="off" />
                <label>Email</label>
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
              <div class="col-12 input-effect ">
                <label>Date of Birth*</label>
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
              <div class="row">
                <div class="col-12 col-md-6">
                  <div class="input-effect">
                    <input type="password" name="password_fake" id="password_fake" value="" style="display:none;" />
                    <input class="effect-21 text-set regPass" type="password" placeholder="" name="password" id="password" required="required" autocomplete="off" />
                    <label>Password</label>
                    <span class="focus-border">
                      <i></i>
                    </span>
                    <a href="javascript:;" toggle=".regPass" class="field-icon toggle-password5 showHideIcon"><i class="fas fa-eye"></i></a>
                  </div>
                </div>
                <div class="col-12 col-md-6">
                  <div class="input-effect">
                    <input class="effect-21" text-set type="password" placeholder="" id="re_password" name="re_password" required="required" autocomplete="off" />
                    <label>Confirm Password</label>
                    <span class="focus-border">
                      <i></i>
                    </span>
                    <a href="javascript:;" toggle="#re_password" class="field-icon  toggle-password6 showHideIcon"><i class="fas fa-eye"></i></a>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12 col-md-6">
                  <div class="input-effect">
                    <input class="effect-21 countrycode numbersOnly" id="phone" name="phone" value="{{ old('phone') }}" type="tel" required="required" />
                    <input type="hidden" id="country_code" name="country_code">
                    <span class="focus-border">
                      <i></i>
                    </span>
                    <span id="valid-msg" class="hide">✓ Valid</span>
                    <span id="error-msg" class="hide"></span>
                  </div>
                </div>

                <div class="col-12 col-md-6">
                  <div class="input-effect">
                    <input class="effect-21" type="text" placeholder="" name="invitationcode" id="invitationcode">
                    <label>Invitation Code(Optional)</label>
                    <span class="focus-border">
                      <i></i>
                    </span>
                  </div>
                </div>
              </div>
              <div class="ct-form-row">
                <div class="col-lg-12">
                  <input type="submit" id="register-btn" value="Register">
                </div>
              </div>
            </form>
          </div>
          <div id="login-form-wrapper" class="form-wrapper tab-pane fade show active" role="tabpanel">
            <div class="form-title d-flex justify-content-center mb-5">
              <div class="d-inline-flex align-items-center">
                <span class="icon-wrapper">
                  <i class="fa fa-sign-in icon" aria-hidden="true"></i>
                </span>
                <span class="d-inline-block ml-2 font-weight-bold">Please Login</span>
              </div>
            </div>

            <form enctype="multipart/form-data" class="login-form-validate" action="{{ URL::to('/process-login')}}" method="post">
              {{csrf_field()}}
              <div class="col-12 input-effect">
                <input class="effect-21 text-set" type="email" name="email" id="email" placeholder="" required="required">
                <label>Email</label>
                <span class="focus-border">
                  <i></i>
                </span>
              </div>
              <div class="col-12 input-effect">
                <input class="effect-21 login-field-validate" name="password" id="password1" type="password" placeholder="" required="required">
                <label>Password</label>
                <span class="focus-border">
                  <i></i>
                </span>
                <a href="javascript:;" toggle="#password1" class="field-icon toggle-password5 showHideIcon"><i class="fas fa-eye"></i></a>
              </div>
              <div class="row ct-form-row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                  <a href="{{ URL::to('/password/reset')}}">Forgot Password ?</a>
                </div>
              </div>
              <div class="col-12 mt-3">
                <input type="submit" id="login-btn" value="Login">
              </div>
              <div class="col-12 col-sm-12 text-center mt-2">
                <div class="social-btn d-flex">

                  @if($result['commonContent']['setting'][61]->value==1)
                  <!-- <a href="login/google" type="button" class="btn btn-google"><span><i class="fab fa-google-plus-g"></i>&nbsp; @lang('website.Google') </span></a> -->

                  <a href="login/google" class="btn btn-warning">
                    <span><i class="fab fa-google-plus-g"></i>&nbsp; @lang('website.Google') </span>
                  </a>

                  @endif
                  @if($result['commonContent']['setting'][2]->value==1)
                  <!--  <a href="login/facebook" type="button" class="btn btn-facebook"><span><i class="fab fa-facebook-f"></i>&nbsp;@lang('website.Facebook')</span></a> -->
                  <a href="login/facebook" class="btn btn-warning"><span><i class="fab fa-facebook-f"></i>&nbsp; @lang('website.Facebook') </span></a>
                  @endif
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<style>
  #login-signup-modal .modal-dialog {
    top: 0;
    left: 0;
    transform: translate(0%,0%)!important;
    position: relative;
    margin: 1.75rem auto;
  }

  #login-signup-modal .modal-content {
    max-height: none;
  }

  @media (min-width: 992px) {
    #login-signup-modal .modal-dialog {
      max-width: 600px;
    }
  }
  
  #login-signup-modal #login-signup-modal-nav {
    margin: 0 auto;
    align-items: center;
  }

  #login-signup-modal #login-signup-modal-nav .nav-link {
    white-space: nowrap;
    background-color: #000000;
    color: #ffff00;
    border-radius: 0px;
    text-transform: capitalize;
    padding: 5px 25px;
    font-weight: 500;
  }

  #login-signup-modal #login-signup-modal-nav .nav-link.active {
    background-color: #ffff00;
    color: #000000;
    padding: 10px 25px;
  }

  #login-signup-modal .form-wrapper .form-title {
    font-size: 20px;
  }

  #login-signup-modal .form-wrapper .form-title .icon-wrapper {
    padding: 10px;
    border-radius: 20px;
    background: #000;
    color: #ffff00;
    line-height: 14px;
    font-weight: 100;
    font-size: 14px;
  }

  #login-signup-modal .social-btn {
    grid-gap: 5px;
  }

  #login-signup-modal .social-btn .btn {
    min-width: auto;
    width: 100%;
    font-weight: 500;
  }

  #login-signup-modal #login-btn {
    height: 45px;
    width: 100%;
  }

  #login-signup-modal #register-btn {
    color: #ffff00;
  }
</style>

<script type="text/javascript">
  (function($) {
    let seconds = 10;

    setTimeout(() => {
      $('#login-signup-modal').modal('show')
    }, 1000 * seconds);
  })(jQuery)
</script>

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