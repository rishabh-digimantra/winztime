 <section class="page-area pro-content main-section">
  <div class="col-md-8 col-md-offset-2">
   <ul class="nav nav-tabs">
    @if(count($errors) > 0)
    <li><a data-toggle="tab" href="#login"  class="login_popup_btn active" >Login</a></li>
    <li><a data-toggle="tab" href="#register" class="register_popup_btn">Register</a></li>
    @else
    <li><a data-toggle="tab" href="#login"  class="login_popup_btn active" >Login</a></li>
    <li><a data-toggle="tab" href="#register" class="register_popup_btn ">Register</a></li>
    @endif
  </ul>
  <div class="tab-content">
    @if(count($errors) > 0)
    <div id="login" class="tab-pane fade in ">
      @else
      <div id="login" class="tab-pane fade in  active ">
        @endif
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
       <span class="">@lang('website.success'):</span>
       {!! session('success') !!}
       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    @endif
    <div class="registration-process">
     <form enctype="multipart/form-data" class="login-form-validate"  action="{{ URL::to('/process-login')}}" method="post">
      {{csrf_field()}}
      <div class="">
       <div> <label for="inlineFormInputGroup">@lang('website.Email')</label></div>
       <div class="form-group mb-3 ">
        <input type="email" name="email" id="email" placeholder="johndow@lucramania.com" class="form-control login-field-validate login-email-validate">
        <span class="help-block" hidden>@lang('website.Please enter your valid email address')</span>
      </div>
    </div>
    <div class="">
      <div> <label for="inlineFormInputGroup">@lang('website.Password')</label></div>
      <div class="form-group mb-3">
        <input type="password" name="password" id="password" placeholder="Please enter password" class="form-control login-field-validate ">
        <a href="javascript:;" toggle="#password" class="field-icon toggle-password4">Show</a>
      </div>
    </div>
    <div class="form-group mb-3">
      <div class="row">
        <div class="col-md-6">
          <div class="checkbox rememberMe">
            <label><input type="checkbox" value="">Remember me</label>
          </div>
        </div>
        <div class="col-md-6">
          <a href="{{ URL::to('/forgotPassword')}}" class="forgotPass right btn-link">@lang('website.Forgot Password')</a>
        </div>
      </div>
    </div>
    <div>
      <button type="button" onclick="loginfieldvalidate();" class="btn btn-secondary">@lang('website.Login')</button>

    </div>
  </form>
</div>
</div>
@if(count($errors) > 0)
<div id="register" class="tab-pane fade active show">
  @else
  <div id="register" class="tab-pane fade ">
    @endif
    <div class="registration-process">
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

  <form name="signup" enctype="multipart/form-data" class="signup-form-validate" action="{{ URL::to('/signupProcess')}}" method="post">
   {{csrf_field()}}
   <div class="row">
    <div class="col-md-6">
      <div class="form-group mb-3">
        <div> <label for="inlineFormInputGroup">@lang('website.First Name')</label></div>
        <div class="">
          <input name="firstNamenew" type="text" class="form-control signup-field-validate signup-fname-validate" onkeypress="return /[a-z]/i.test(event.key)" id="firstName" placeholder="John" value="{{ old('firstName') }}">
          <span class="help-block" hidden>@lang('website.Please enter your first name')</span>
        </div>

      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group mb-3">
        <div> <label for="inlineFormInputGroup">@lang('website.Last Name')</label></div>
        <div class="">                    
          <input  name="lastName" type="text" class="form-control signup-field-validate signup-lname-validate" onkeypress="return /[a-z]/i.test(event.key)" id="lastName" placeholder="Dow" value="{{ old('lastName') }}">
          <span class="help-block" hidden>@lang('website.Please enter your last name')</span>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      @if(Session::has('error'))
      <div class="form-group mb-3 has-error">
        <!-- <div class="col-12"> --><div> <label for="inlineFormInputGroup"><!-- <strong style="color: red;">*</strong> -->@lang('website.Email Adrress')</label></div>
        <div class="">
          <input  name="email" type="email" class="form-control signup-field-validate signup-email-validate" id="inlineFormInputGroup" placeholder="johndow@lucramania.com" value="{{ old('email') }}">
          <span class="help-block" hidden>@lang('website.Please enter your valid email address')</span>
        </div>
      </div>
      @else
      <div class="form-group mb-3">
        <div> <label for="inlineFormInputGroup">@lang('website.Email Adrress')</label></div>
        <div class="">
          <input  name="email" type="email" class="form-control signup-field-validate signup-email-validate" id="inlineFormInputGroup" placeholder="johndow@lucramania.com" value="{{ old('email') }}">
          <span class="help-block" hidden>@lang('website.Please enter your valid email address')</span>
        </div>
      </div>
      @endif
    </div>
    <div class="col-md-6">
      <div class="form-group mb-3">
        <div> <label for="inlineFormInputGroup">@lang('Phone')</label></div>
        <div class="">
          <div class="flagNumImg">
            <input  name="phone" type="number" class="form-control signup-field-validate signup-number-validate new-number-validate"  
            pattern="^(?:\+971|00971|0)?(?:50|51|52|55|56|2|3|4|6|7|9)\d{7}$" onblur="checkPhone();"  id="inlineFormInputGroup" placeholder="" value="{{ old('phone') }}">

            <span class="numValImg"><img src="{{asset('web/assets/images/uaeIcon2.png')}}"><small>+971</small></span>
            <input type="hidden" name="countryCodeUAE" value="+971">
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="">
        <div> <label for="inlineFormInputGroup">@lang('website.Password')</label></div>
        <div class="form-group mb-3">
          <input type="password" class="form-control signup-field-validate signup-password regPass" name="password" id="password" placeholder="Enter your password">
          <a href="javascript:;" toggle=".regPass" class="field-icon toggle-password5">Show</a>

        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="">
        <div> <label for="inlineFormInputGroup"><!-- <strong style="color: red;">*</strong> -->@lang('website.Confirm Password')</label></div>
        <div class="form-group mb-3">
          <input type="password" class="form-control signup-field-validate signup-re_password" id="re_password" name="re_password" placeholder="Re-enter your password">
          <a href="javascript:;" toggle="#re_password" class="field-icon toggle-password6">Show</a>
        </div>
      </div>
    </div>
    <div class="col-md-12">
      <div class="form-group mb-3">
        <div> <label for="invitationcode">Invitation Code</label></div>
        <div class="">
          <input  name="invitationcode" type="text" class="form-control " id="invitationcode" placeholder="Invitation Code (Optional)" value="{{ old('invitationcode') }}">
        </div>
      </div>
    </div>
  </div>
  <div class="form-group mb-3">
    <div class="input-group col-12" style="text-transform: none;">
     <input style="margin:4px;"class="form-controlt checkbox-validate field-validate" checked="checked" type="checkbox">
     @lang('website.Creating an account means you are okay with our')  @if(!empty($result['commonContent']['pages'][9]->slug))<a href="{{ URL::to('/page?name='.$result['commonContent']['pages'][9]->slug)}}">@endif @lang('website.Terms and Services')@if(!empty($result['commonContent']['pages'][9]->slug))</a>@endif, @if(!empty($result['commonContent']['pages'][9]->slug))<a href="{{ URL::to('/page?name='.$result['commonContent']['pages'][9]->slug)}}">@endif @lang('website.Privacy Policy')@if(!empty($result['commonContent']['pages'][9]->slug))</a> @endif and @if(!empty($result['commonContent']['pages'][9]->slug))<a href="{{ URL::to('/page?name='.$result['commonContent']['pages'][9]->slug)}}">@endif @lang('website.Refund Policy') @if(!empty($result['commonContent']['pages'][9]->slug))</a>@endif
     <span class="help-block" hidden>@lang('website.Please accept our terms and conditions')</span>
   </div>
 </div>
 <div>
  <button type="button" onclick="signupfieldvalidate();" class="btn btn-light swipe-to-top">@lang('website.Create an Account')</button>
</div>
</form>
</div>
</div>
</div>
</div>
</section>