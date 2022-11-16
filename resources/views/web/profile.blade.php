  @extends('web.layout')
  @section('content')
  <section class="">
    <!-- Profile Content -->
    <section class="profile-content main-section">
      <div class="container">
        <div class="heading">
          <h2>
            Personal Details
          </h2>
        </div>
        <div class="row">

          <!--  <div class="col-12 media-main">
       
     </div> -->

          <!-- <div class="col-12 col-lg-3">
           <div class="heading">
               <h2>
                   @lang('website.My Account')
               </h2>
               <hr >
             </div>

           <ul class="list-group">
               <li class="list-group-item">
                   <a class="nav-link" href="{{ URL::to('/profile')}}">
                       <i class="fas fa-user"></i>
                     @lang('website.Profile')
                   </a>
               </li>
               <li class="list-group-item">
                   <a class="nav-link" href="{{ URL::to('/wishlist')}}">
                       <i class="fas fa-heart"></i>
                    @lang('website.Wishlist')
                   </a>
               </li>
               <li class="list-group-item">
                   <a class="nav-link" href="{{ URL::to('/orders')}}">
                       <i class="fas fa-shopping-cart"></i>
                     @lang('website.Orders')
                   </a>
               </li>
               <li class="list-group-item">
                   <a class="nav-link" href="{{ URL::to('/shipping-address')}}">
                       <i class="fas fa-map-marker-alt"></i>
                    @lang('website.Shipping Address')
                   </a>
               </li>
                <li class="list-group-item">
                   <a class="nav-link" href="{{ URL::to('/refer-a-friend')}}">
                       <i class="fas fa-share-alt"></i>
                    Refer a friend
                   </a>
               </li>
               <li class="list-group-item">
                   <a class="nav-link" href="{{ URL::to('/logout')}}">
                       <i class="fas fa-power-off"></i>
                     @lang('website.Logout')
                   </a>
               </li>
               <li class="list-group-item">
                   <a class="nav-link" href="{{ URL::to('/change-password')}}">
                       <i class="fas fa-unlock-alt"></i>
                     @lang('website.Change Password')
                   </a>
               </li>
             </ul>
           </div> -->

          <div class="col-12 col-lg-8 ">
            <div class="contFormWrp">
              <div class="media">
                <div class="media-body">
                  <div class="row">
                    <div class="col-12 col-sm-8 col-md-12">
                      <h4>{{auth()->guard('customer')->user()->first_name}} {{auth()->guard('customer')->user()->last_name}}
                        <!-- <small>{{auth()->guard('customer')->user()->email}} </small></h4> -->
                    </div>
                  </div>
                </div>

              </div>
              <div class="">

                <!-- <hr > -->
              </div>
              <form name="updateMyProfile" class="align-items-center profile-form-validate" enctype="multipart/form-data" action="{{ URL::to('updateMyProfile')}}" method="post" id="updateProfile">
                @csrf
                <input type="hidden" id="user_id" value="{{ auth()->guard('customer')->user()->id }}">
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
                  {{ session()->get('error') }}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                @endif

                @if(Session::has('loginError'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                  <span class="sr-only">@lang('website.Error'):</span>
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

                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="inputName" class="col-form-label">@lang('website.First Name')</label>
                      <input type="text" autocomplete="off" name="customers_firstname" class="form-control profile-field-validate" id="inputName" value="{{ auth()->guard('customer')->user()->first_name }}" placeholder="John">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="lastName" class="col-form-label">@lang('website.Last Name')</label>
                      <input type="text" autocomplete="off" name="customers_lastname" placeholder="Dow" class="form-control profile-field-validate" id="lastName" value="{{ auth()->guard('customer')->user()->last_name }}">
                    </div>
                  </div>
                </div>
                <div class="row">

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="customers_status" class="col-form-label">Gender</label>
                      <select class="form-control" name="gender" id="exampleSelectGender1">
                        <option value="" selected disabled>Select gender</option>
                        <option value="0" @if(auth()->guard('customer')->user()->gender == 0) selected @endif >Male</option>
                        <option value="1" @if(auth()->guard('customer')->user()->gender == 1) selected @endif >Female</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="customers_status" class="col-form-label">Marital status</label>
                      <select class="form-control" id="marry_status" name="marry_status">
                        <option value="" selected disabled>Select status</option>
                        <option value="0" @if(auth()->guard('customer')->user()->marry_status == 0) selected @endif >Single</option>
                        <option value="1" @if(auth()->guard('customer')->user()->marry_status == 1) selected @endif >Married</option>

                      </select>
                    </div>
                  </div>

                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="Nationality" class="col-form-label">Nationality</label>
                      <select class="form-control" name="nationality">
                        <option value="" selected disabled>select your country</option>
                        @foreach($result['countries'] as $country)
                        @if($country == auth()->guard('customer')->user()->nationality) <option value="{{$country}}" selected="selected">{{$country}}</option> @else <option value="{{$country}}">{{$country}}</option> @endif

                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="Country of Residence" class="col-form-label">Country of Residence</label>
                      <select class="form-control" name="country_res">
                        <option value="" selected disabled>select your residence</option>
                        @foreach($result['countries'] as $country)
                        @if($country == auth()->guard('customer')->user()->country_res) <option value="{{$country}}" selected="selected">{{$country}}</option> @else <option value="{{$country}}">{{$country}}</option> @endif

                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <style type="text/css">
                    /* Chrome, Safari, Edge, Opera */
                    input::-webkit-outer-spin-button,
                    input::-webkit-inner-spin-button {
                      -webkit-appearance: none;
                      margin: 0;
                    }

                    /* Firefox */
                    input[type=number] {
                      -moz-appearance: textfield;
                    }
                  </style>
                  <?php
                  $str1 = substr(auth()->guard('customer')->user()->phone, 4);

                  ?>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="phone" class="col-form-label">Mobile Number</label>
                      <div>
                        <input class="form-control numbersOnly" id="phone" name="phone" value="{{ auth()->guard('customer')->user()->phone }}" type="tel" required="required" maxlength="15" />
                        <input type="hidden" id="country_code" name="country_code" value="{{ ltrim( auth()->guard('customer')->user()->country_code, '+' ) }}">
                        <span class="focus-border">
                          <i></i>
                        </span>
                        <span id="valid-msg" class="hide">✓ Valid</span>
                        <span id="error-msg" class="hide"></span>
                      </div>

                    </div>
                  </div>

                  <!-- <div class="col-12 input-effect">
                  <input class="effect-21 countrycode numbersOnly" id="phone" name="phone" value="{{ old('phone') }}" type="tel" required="required" />
                  <input type="hidden" id="country_code" name="country_code">
                  <span class="focus-border">
                    <i></i>
                  </span>
                  <span id="valid-msg" class="hide">✓ Valid</span>
                  <span id="error-msg" class="hide"></span>
                </div> -->

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="customers_telephone" class="col-form-label">Email</label>
                      <input name="email" type="email" value="{{ auth()->guard('customer')->user()->email }}" readonly="readonly" style="background-color: #e9ecef !important" class="form-control">
                    </div>
                  </div>



                  <div class="col-sm-12 ">
                    <div class="form-group">
                      <?php $dob = auth()->guard('customer')->user()->dob;
                      if (!empty($dob)) {
                        $explode = explode("/", $dob);
                        $month_db = $explode[0];
                        $day_db = $explode[1];
                        $year_db = $explode[2];
                      } else {
                        $month_db = "";
                        $day_db = "";
                        $year_db = "";
                      }


                      function daysInMonth($year, $month)
                      {
                        if (!empty($year) &&  !empty($month)) {
                          return date("t", mktime(0, 0, 0, $month, 1, $year));
                        } else {
                          return 0;
                        }
                      }
                      ?>

                      <label class="col-form-label">Date Of Birth*</label>
                      <div class="row">
                        <div class="col-sm-4">
                          <div class="form-group">
                            <select id="year" name="year" class="form-control profile-field-validate" required="required">
                              <option value="">Year</option>
                              <?php
                              $years = range(date("Y"), 1910);
                              foreach ($years as $single_year) {
                                if ($single_year == $year_db) {
                                  echo '<option value="' . $single_year . '" selected>' . $single_year . '</option>';
                                } else {
                                  echo '<option value="' . $single_year . '">' . $single_year . '</option>';
                                }
                              }


                              ?>


                            </select>
                          </div>
                        </div>

                        <div class="col-sm-4">
                          <div class="form-group">
                            <select id="month" name="month" class="form-control profile-field-validate" onchange="getDaysInMonth($(this).val(),$('#year').val())" required="required">
                              <option value="">Month</option>
                              <?php
                              for ($m = 1; $m <= 12; $m++) {
                                $month = date('F', mktime(0, 0, 0, $m, 1, date('Y')));
                                $month_option = $m;
                                if ($m < 10) {
                                  $month_option = "0" . $m;
                                }
                                if ($month_option == $month_db) {
                                  echo '<option value="' . $month_option . '" selected>' . $month . '</option>';
                                } else {
                                  echo '<option value="' . $month_option . '">' . $month . '</option>';
                                }
                              }
                              ?>
                            </select>
                          </div>
                        </div>

                        <div class="col-sm-4">
                          <div class="form-group">
                            <select id="day" name="day" class="form-control profile-field-validate" required="required" readonly>
                              <option value="">Day</option>
                              <?php
                              $days_in_month = daysInMonth($year_db, $month_db);
                              if ($days_in_month) {

                                for ($is = 1; $is <= $days_in_month; $is++) {
                                  $day_value = $is;
                                  if ($is < 10) {
                                    $day_value = "0" . $is;
                                  }
                                  if ($day_value == $day_db) {
                                    echo "<option value='" . $day_value . "' selected>" . $is . "</option>";
                                  } else {
                                    echo "<option value='" . $day_value . "'>" . $is . "</option>";
                                  }
                                }
                              }
                              ?>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>


                  </div>

                </div>

                <!-- <div class="form-group row">
                  <label for="inputPassword" class="col-sm-2 col-form-label">@lang('website.Gender')</label>
                  <div class="from-group  select-control col-sm-4 ">
                      <select class="form-control " name="gender" required id="exampleSelectGender1">
                        <option value="0" @if(auth()->guard('customer')->user()->gender == 0) selected @endif>@lang('website.Male')</option>
                        <option value="1"  @if(auth()->guard('customer')->user()->gender == 1) selected @endif>@lang('website.Female')</option>
                      </select> 
                  </div>
                  <label for="inputPassword" class="col-sm-2 col-form-label">@lang('website.DOB')</label>
                  <div class=" col-sm-4">
                      <div class="input-group date">
                        <input readonly name="customers_dob" type="text" data-provide="datepicker" class="form-control" placeholder="@lang('website.Date of Birth')" value="{{ auth()->guard('customer')->user()->dob }}" aria-label="date-picker" aria-describedby="date-picker-addon1">
                          
                          <div class="input-group-prepend">
                              <span class="input-group-text" id="date-picker-addon1"><i class="fas fa-calendar-alt"></i></span>
                            </div>
                        </div>
                  </div>
                </div> -->
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right"><button type="button" onclick="profilefieldvalidate();" class="btn luciBtn"><span>Save</span></button></div>
                </div>
              </form>

              <!-- ............the end..... -->
            </div>
          </div>
          <div class="col-lg-4">
            <div class="lPoint-sidebar">
              <ul>
                <li class="first"><a href="profile" title="">Personal Details</a></li>
                <li><a href="levels" title="">Levels</a></li>
                <li><a href="wishlist" title="">Wish List</a></li>
                <li><a href="active-coupons" title="">Active Coupons</a></li>
                <li><a href="my-zpoints" title="">Z-Points</a></li>
                <li><a href="address-book" title="">Address Book</a></li>
                <li class="referFrnd"><a href="refer-a-friend" title="">Invite A Friend To Earn</a></li>
                <li><a href="change-password" title="">Change Password</a></li>
                <li class="last"><a href="logout" title="">Logout</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
    </div>
  </section>
  <script type="text/javascript">
    function getDaysInMonth(month, year) {
      main_date_count = new Date(year, month, 0).getDate();
      month = parseInt(month) - 1;
      var current_date = new Date();
      var current_month = current_date.getMonth();
      var s_date = new Date(year, month, 0);

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
    $(document).ready(function() {
      var input = document.querySelector("#phone"),
          countryCode = document.getElementById('country_code')
        errorMsg = document.querySelector("#error-msg"),
        validMsg = document.querySelector("#valid-msg");
      var errorMap = ["Invalid number", "Invalid country code", "Too short", "Too long", "Invalid number"];
      var iti = window.intlTelInput(input, {
        utilsScript: "{{asset('web/assets/js/utils.js')}}",
        initialCountry: "auto",
        formatOnDisplay: false,
        geoIpLookup: function(callback) {
          $.get('https://ipinfo.io', function() {}, "jsonp").always(function(resp) {
            var countryCode = (resp && resp.country) ? resp.country : "us";
            callback(countryCode);
          });
        }
      });
      if ( input.value.startsWith('+') ) {
        iti.setNumber(input.value)
      } else if ( countryCode.value ) {
        iti.setNumber('+' + countryCode.value + input.value)
      }
      $(input).on("countrychange", function() {
        var countryData = iti.getSelectedCountryData();

        document.getElementById('country_code').value = countryData.dialCode;
        if (iti.isValidNumber()) {
          input.value = iti.getNumber().replace(new RegExp('^([\\+]+)' + countryData.dialCode), '')
        }
      });
      $(input).trigger('countrychange')
      var extension = iti.getExtension();
      var reset = function() {
        input.classList.remove("error");
        errorMsg.innerHTML = "";
        errorMsg.classList.add("hide");
        validMsg.classList.add("hide");
      };
      input.addEventListener('blur', function() {
        reset();
        if (!input.value.trim()) return;

        const countryData = iti.getSelectedCountryData();

        if (iti.isValidNumber()) {
          validMsg.classList.remove("hide");
          input.value = iti.getNumber().replace(new RegExp('^\\+' + countryData.dialCode), '')
        } else {
          input.classList.add("error");
          var errorCode = iti.getValidationError();
          errorMsg.innerHTML = errorMap[errorCode];
          errorMsg.classList.remove("hide");
        }
      });
      // on keyup / change flag: reset
      input.addEventListener('change', reset);
      input.addEventListener('keyup', reset);

      $(document).on('submit', '#updateProfile', function(event, ownEvent) {
        if (ownEvent) return;
        event.preventDefault();

        if ( ! iti.isValidNumber() ) {
          input.classList.add("error");
          var errorCode = iti.getValidationError();
          errorMsg.innerHTML = errorMap[errorCode];
          errorMsg.classList.remove("hide");

          return;
        }

        $(this).trigger('submit', true);
      })
    });
  </script>
  @endsection