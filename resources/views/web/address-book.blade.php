@extends('web.layout')

@section('content')

<!-- wishlist Content -->

<section class="lpoint-content main-section">

  <div class="container">

    <div class="heading">

      <h2>Address Book</h2>

    </div>

    <div class="row">

      <div class="col-lg-8">

        <div class="addressWrap adresBokWrp">

          @if(count($result['address']) > 0)

          @foreach($result['address'] as $address)

          @if($address->default_address == 1)

          <h3>Default Address</h3>
          <form class="checkoutShipping" enctype="multipart/form-data" action="{{ URL::to('/checkout_shipping_new_address')}}" method="post">
            <input type="hidden" name="_token" value="{{ Session::token() }}" />
            <ul class="address_{{$address->id}} myAddress">

              <li>

                <address>

                  <input type="radio" name="selectedOption" value="{{$address->id}}" @isset(session('billing_address')->selectedOption) @if(session('billing_address')->selectedOption== $address->id ) checked @endif @endisset>

                  <b>{{$address->first_name}} {{$address->last_name}}</b>,

                  {{$address->buildingno}}, {{$address->address}},

                  {{$address->city}},

                  {{$address->country->countries_name ?? ''}},

                  <span dir="ltr">{{$address->DialCode}} {{$address->delivery_phone}}</span>

                  <!-- data-toggle="modal" -->

                  <strong><a href="javascript:;" id="Modaldelivery" onclick="editDeliveryInstruction({{$address->id}})" data-target="deliveryEditModal">Edit</a><a href="{{ URL::to('/deleteAddress', $address->id)}}">Delete</a><a href="javascript:;" id="Modaldelivery" onclick="showDeliveryInstruction({{$address->id}})" data-target="#deliveryModal">Add Delivery Instructions</a></strong>

                </address>

              </li>

            </ul>

            @endif

            @endforeach

            @if(count($result['address']) > 1)

            <h3>Other Addresses</h3>

            @foreach($result['address'] as $address)

            @if($address->default_address != 1)

            <ul class="address_{{$address->id}} myAddress">

              <li>

                <address>

                  <input type="radio" name="selectedOption" value="{{$address->id}}" @isset(session('billing_address')->selectedOption) @if(session('billing_address')->selectedOption==$address->id) checked @endif @endisset>

                  <b>{{$address->first_name}} {{$address->last_name}}</b>,

                  {{$address->buildingno}},

                  {{$address->address}},

                  {{$address->city}},

                  {{$address->country->countries_name ?? ''}},

                  <span dir="ltr">{{$address->DialCode}} {{$address->delivery_phone}}</span>

                  <strong><a href="javascript:;" id="Modaldelivery" onclick="editDeliveryInstruction({{$address->id}})" data-target="deliveryEditModal">Edit</a><a href="{{ URL::to('/deleteAddress', $address->id)}}">Delete</a><a href="javascript:;" id="Modaldelivery" onclick="showDeliveryInstruction({{$address->id}})" data-target="#deliveryModal">Add Delivery Instructions</a></strong>

                </address>

              </li>

            </ul>

            @endif

            @endforeach

            @endif

            @endif


            <div class="col-md-12">
              <a href="javascript:;" class="adresBokBtn" id="addAddress" data-toggle="modal" data-target="#addressModal"><strong>+ <i class="fas fa-home"></i>Add a new address </strong></a>
            </div>

            @if(count($result['address']) > 0)

            <div class="col-md-12 mt-4">
              <button type="submit" class="btn btn-secondary"><span>Use this address</span></button>
            </div>
            @endif
          </form>
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

<div class="modal fade" id="addressModal" role="dialog">

  <div class="modal-dialog modal-lg">



    <!-- Modal content-->

    <div class="modal-content">

      <div class="modal-header">

        <h4 class="modal-title">Add a new address</h4>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <i class="fas fa-times"></i>

        </button>



      </div>

      <div class="modal-body contact-section">

        <form class="contctForm contct-form-validate" enctype="multipart/form-data" action="{{ URL::to('/addAddress')}}" method="post">

          <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />

          <input type="hidden" name="zone_id" id="zone_id" value="-1" />



          <div class="form-row">

            <div class="form-group">

              <label for=""> @lang('website.First Name')</label>

              <input type="text" class="form-control contact-field-validate" name="first_name" aria-describedby="NameHelp1" placeholder="John" onkeypress="return /^[ A-Za-z-_@./#${}<>,?=;'|\!%*()&+-]*$/.test(event.key)">

              <!-- <span style="color:red;" class="help-block error-content" hidden>@lang('website.Please enter your first name')</span> -->

              <!-- <span style="color:red;" class="help-block error-content" hidden>@lang('website.Please enter your first name')</span> -->

            </div>

            <div class="form-group">

              <label for=""> @lang('website.Last Name')</label>

              <input type="text" class="form-control contact-field-validate" id="lastname" name="last_name" aria-describedby="NameHelp1" placeholder="Doe" onkeypress="return /^[ A-Za-z-_@./#${}<>,?=;'|\!%*()&+-]*$/.test(event.key)">

              <!-- <span style="color:red;" class="help-block error-content" hidden>@lang('website.Please enter your last name')</span> -->

            </div>

            <div class="form-group ">

              <label for="">Building Name, Floor, Apartment or Villa #</label>

              <input type="text" class="form-control contact-field-validate" name="buildingno" id="buildingno" placeholder="Princess Tower, 5th floor, Apt 5023">

              <!-- <span style="color:red;" class="help-block error-content" hidden>Please enter your building no</span> -->

            </div>

            <input type="hidden" class="form-control contact-field-validate" id="company" aria-describedby="companyHelp" placeholder="Enter Your Company Name" name="company" value="TEST TEST">

            <div class="form-group">

              <label for="">Street Name</label>

              <input type="text" class="form-control contact-field-validate" name="address" id="address" placeholder="Omar Ibn Al Khattab Street">

              <!-- <span style="color:red;" class="help-block error-content" hidden>Please enter your street</span> -->

            </div>
            <div class="form-group">

              <label for=""> @lang('website.Country')</label>

              <div class="input-group select-control">

                <select name="countries_id" id="entry_country_id" class="form-control contact-field-validate">
                  <option value="">Please select Country</option>
                  @if(!empty($result['countries']))
                  @foreach($result['countries'] as $single_country)

                  <option value="{{$single_country->countries_id}}" data-country="{{$single_country->countries_iso_code_2}}">{{$single_country->countries_name}}</option>
                  @endforeach
                  @endif
                </select>
              </div>

              <!-- <span style="color:red;" class="help-block error-content" hidden>@lang('website.Please select your country')</span> -->

            </div>


            <div class="form-group citydropdown d-none">

              <label for=""> @lang('website.City')</label>

              <select name="city" id="check_ship_city" class="form-control contact-field-validate">

                <option value="">Select City</option>

                <option value="Abu Dhabi">Abu Dhabi</option>

                <option value="Dubai">Dubai</option>

                <option value="Sharjah">Sharjah</option>

                <option value="Ajman">Ajman</option>

                <option value="Um Al Quwain">Umm Al Quwain</option>

                <option value="Ras Al Khaimah">Ras Al Khaimah</option>

                <option value="Fujairah">Fujairah</option>

              </select>

              <!-- <span style="color:red;" class="help-block error-content" hidden>@lang('website.Please enter your city')</span> -->

            </div>

            <div class="form-group citytext d-none">
              <label for=""> @lang('website.City')</label>
              <input name="city_text" value="" type="text" class="form-control " onkeypress="return /[a-z A-Z]/i.test(event.key)">

            </div>



            <input type="hidden" class="form-control" id="postcode" aria-describedby="zpcodeHelp" name="postcode" value="123123">

            <div class="form-group">
              <label for=""> Mobile </label>
              <input class="form-control contact-field-validate countrycode" id="phone" name="delivery_phone" type="tel" required="required">
              <input type="hidden" name="DialCode" value="">
              <!-- <label for=""> Mobile Phone</label>

              <div class="flagNumImg flagNumImg2">

              <input type="number" class="form-control contact-field-validate contact-number-validate new-number-validate" onblur="checkPhone();" id="delivery_phone" aria-describedby="numberHelp" placeholder="" name="delivery_phone">

                <span class="numValImg"><img src="{{asset('web/assets/images/uaeIcon2.png')}}"><small>+971</small></span>

                <input type="hidden" name="countryCodeUAE" value="+971">

              </div> -->

              <!-- <span style="color:red;" class="help-block error-content" hidden>@lang('website.Please enter your valid phone number')</span> -->
              <span id="valid-msg" class="hide">✓ Valid</span>
              <span id="error-msg" class="hide"></span>
            </div>

            <!-- <div class="form-group">

                <label for=""> Zip-Code</label>

                <input type="text" class="form-control" id="zipcode" aria-describedby="numberHelp" placeholder="please enter zipcode" name="zipcode" value="@if(!empty(session('shipping_address'))){{session('shipping_address')->zipcode}}@endif">

                <span style="color:red;" class="help-block error-content" hidden>@lang('website.Please enter your valid zipcode')</span>

              </div> -->



            <div class="form-group  col-12">

              <h4>Add Delivery Instructions:</h4>

              <!-- <label for="addresstype"  class="form-label"> Address Type</label> -->

              <ul>

                <li><input type="radio" selected checked name="addresstype" value="Home">Home (7am-10pm, all days)</li>

                <li><input type="radio" name="addresstype" value="Office">Office (7am-6pm, Weekdays)</li>

              </ul>

              <label class="switch">

                <input type="checkbox" name="default_address" value="1">

                <span class="slider"></span>

              </label>

              <small>Make this my default address</small>

            </div>

          </div>

          <div class="form-row">

            <div class="form-group">

              <button type="button" onclick="contactfieldvalidate();" class="btn btn-secondary"><span>Add Address</span></button>

            </div>

          </div>

        </form>

      </div>

    </div>

  </div>

</div>

<div class="modal fade" id="deliveryModal" role="dialog">

  <div class="modal-dialog modal-lg">



    <!-- Modal content-->

    <div class="modal-content">

      <div class="modal-header">

        <h4 class="modal-title">Add Delivery Instrustions</h4>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <i class="fas fa-times"></i>

        </button>

      </div>



      <div class="modal-body contact-section">

        <form class="contctForm form-validate" enctype="multipart/form-data" action="{{ URL::to('/addDeliveryIns')}}" method="post">

          <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />

          <div id="address-wrapper">

            <!-- to view the html here open OrderControlller and look forgetDeliveryInstruction -->

          </div>

          <div class="row">

            <div class="col-sm-12"><button type="submit" class="btn saveInst"><span>Save Instructions</span></button></div>

          </div>

        </form>

      </div>

    </div>

  </div>

</div>

<div class="modal fade" id="deliveryEditModal" role="dialog">



</div>
<script type="text/javascript">
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
    var reset = function() {
      input.classList.remove("error");
      errorMsg.innerHTML = "";
      $(".phone").val("")
      errorMsg.classList.add("hide");
      validMsg.classList.add("hide");
    };
    input.addEventListener('blur', function() {
      reset();
      var countryData = iti.getSelectedCountryData();
      $(".DialCode").val(countryData.dialCode);
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

    var addressDropdown = document.querySelector("#entry_country_id");
    addressDropdown.addEventListener('change', function() {

      var country_iso = $(this).find(':selected').attr('data-country')
      iti.setCountry(country_iso);
      input.focus();
      input.blur();
      getCity(this)
    });


  });
</script>
@endsection