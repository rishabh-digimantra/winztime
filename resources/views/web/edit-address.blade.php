@extends('web.layout')
@section('content')
<section class="">
  <!-- Profile Content -->
  <section class="profile-content main-section">
    <div class="">
     <div class="heading">
      <h2>
        Address Book
      </h2>
    </div>
    <div class="row">
     <div class="col-12 col-lg-8 ">
       <div class="contFormWrp">
         <form name="updateAddress" class="align-items-center"  enctype="multipart/form-data" action="{{ URL::to('/updateAddress')}}" method="post">
           @csrf
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

            @if(session()->has('error'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session()->get('error') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
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

            @if(Session::has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
              <span class="sr-only">@lang('website.Error'):</span>
              {!! session('loginError') !!}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            @endif

            @if(session()->has('success') )
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session()->get('success') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            @endif
          
          <input type="hidden" name="address_id" value="{{$address_Data[0]->id}}">
            <div class="form-group">
               <label for="firstName" class="ol-form-label">@lang('website.First Name')</label>
               <input type="text" required name="first_name" class="form-control" id="inputName" value="{{$address_Data[0]->first_name }}" placeholder="@lang('website.First Name')">
             </div>
             <div class="form-group">
               <label for="lastName" class="col-form-label">@lang('website.Last Name')</label>
               <input type="text" required name="last_name" placeholder="@lang('website.Last Name')" class="form-control field-validate" id="lastName" value="{{$address_Data[0]->last_name }}">
             </div>
           <div class="form-group">
            <label for="">Street name</label>
            <input type="text" required class="form-control field-validate" name="address" id="address" placeholder="@lang('website.Please enter your address')" value=" {{$address_Data[0]->address}}">
            <span style="color:red;" class="help-block error-content" hidden>Please enter your street</span>
          </div>
          <div class="form-group">
            <label for="">Building Name/no, Floor, Apartment or Villa no</label>
            <input type="text" required class="form-control field-validate" name="buildingno" id="buildingno" value="{{$address_Data[0]->buildingno}}">
            <span style="color:red;" class="help-block error-content" hidden>.Please enter your building no</span>
          </div>
          <div class="form-group">
            <label for=""> @lang('website.Country')</label>
              <input type="text" class="form-control field-validate" value="United Arab Emirates" name="country_name" id="entry_country_id" readonly="readonly">
            <span style="color:red;" class="help-block error-content" hidden>@lang('website.Please select your country')</span>
          </div>

          <div class="form-group">
            <label for=""> @lang('website.City')</label>
            <select name="city" id="check_ship_city" class="form-control field-validate" required="required">
              <option value="">Select City</option>
              <option value="Abu Dhabi" @if($address_Data[0]->city == "Abu Dhabi")selected="selected"@endif>Abu Dhabi</option>
              <option value="Dubai" @if($address_Data[0]->city == "Dubai")selected="selected"@endif>Dubai</option>
              <option value="Sharjah" @if($address_Data[0]->city == "Sharjah")selected="selected"@endif>Sharjah</option>
              <option value="Ajman" @if($address_Data[0]->city == "Ajman")selected="selected"@endif>Ajman</option>
              <option value="Um Al Quwain" @if($address_Data[0]->city == "Um Al Quwain")selected="selected"@endif>Umm Al Quwain</option>
              <option value="Ras Al Khaimah" @if($address_Data[0]->city == "Ras Al Khaimah")selected="selected"@endif>Ras Al Khaimah</option>
              <option value="Fujairah" @if($address_Data[0]->city == "Fujairah")selected="selected"@endif>Fujairah</option>
            </select>
            <span style="color:red;" class="help-block error-content" hidden>@lang('website.Please enter your city')</span>
          </div>

          <div class="form-group">
            <label for=""> @lang('website.Phone')</label>
            <input required type="text" class="form-control" id="delivery_phone" aria-describedby="numberHelp" placeholder="@lang('website.Enter Your Phone Number')" name="delivery_phone" value="{{$address_Data[0]->delivery_phone}}">
            <span style="color:red;" class="help-block error-content" hidden>@lang('website.Please enter your valid phone number')</span>
          </div>
          <div class="form-group">
            <label for=""> Zip-Code</label>
            <input required type="text" class="form-control" id="zipcode" aria-describedby="numberHelp" placeholder="please enter zipcode" name="zipcode" value="{{$address_Data[0]->zipcode}}">
            <span style="color:red;" class="help-block error-content" hidden>@lang('website.Please enter your valid zipcode')</span>
          </div>
          <div class="form-group">
            <h3> Add Delivery Instructions:</h3>
            <ul>
              <li><input type="radio"  name="addresstype" value="Home" @isset($address_Data[0]->addresstype_home) checked="checked" @endisset>Home(7am-9pm, all days)</li>
              <li><input type="radio"  name="addresstype" value="Office" @isset($address_Data[0]->addresstype_office) checked="checked" @endisset>Office(9am-6pm, Weekdays)</li>
            </ul>
            <label class="switch">
              <input type="checkbox" name="default_address" value="1" @if($address_Data[0]->default_address == 1) checked="checked" @endif>
              <span class="slider"></span>
            </label>
            <small>Make this my default address</small>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group">
            <button type="submit"  class="btn btn-secondary">Edit Address</button>
          </div>
      </form>

      <!-- ............the end..... -->
    </div>
  </div>
  <div class="col-md-4">
    <div class="lPoint-sidebar">
      <ul>
        <li class="first"><a href="profile" title="">Personal Details</a></li>
        <li><a href="levels" title="">Levels</a></li>
        <li><a href="wishlist" title="">Wishlist</a></li>
        <li><a href="active-coupons" title="">Active Coupons</a></li>
        <li><a href="my-lpoints" title="">lPoints</a></li>
        <li><a href="payment-options" title="">Payment Options</a></li>
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
@endsection
