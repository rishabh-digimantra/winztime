@extends('web.layout')
@section('content')

<!-- <div class="container-fuild">
  <nav aria-label="breadcrumb">
    <div class="container">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ URL::to('/')}}">@lang('website.Home')</a></li>
        <li class="breadcrumb-item"><a href="{{ URL::to('/profile')}}">@lang('website.Profile')</a></li>
        <li class="breadcrumb-item active" aria-current="page">@lang('website.Change Password')</li>
      </ol>
    </div>
  </nav>
</div>  -->

<!-- page Content -->
<section class="page-area main-section">
  <div class="container">
  <div class="heading"> 
         <h2>@lang('website.Change Password')</h2>
      <div class="row">
         
      
        <div class="col-12 col-sm-12 col-lg-8">
                <div class="tab-content contFormWrp changePassWrp" id="registerTabContent">
                  @if(session()->has('success') )
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session()->get('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                  @endif



                  @if(session()->has('error') )
                  
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session()->get('error') }}
                    </div>
                  @endif              

                
                  
                  <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
                      <div class="registration-process">
                      <form name="updateMyPassword" class="change-password-form123" id="updateMyPassword" enctype="multipart/form-data" action="{{ URL::to('/updateMyPassword')}}" method="post">
                        @csrf
                         @if(session()->has('error') )
                        <div class="form-group mb-3 has-error">
                          <label for="current_password">@lang('website.Current Password')</label>
                          <div class="input-group col-12">                          
                            <input name="current_password" type="password" class="form-control change-prssword-field-validate current_password" id="current_password" placeholder="Current password">
                            <!-- <span class="help-block error-content" hidden>@lang('website.Please enter current password')</span> -->
                            <a href="javascript:;" toggle="#current_password" class="field-icon toggle-password showHideIconChangePass"><i class="fas fa-eye"></i></a>
                          </div>
                        </div>
                        @else
                        <div class="form-group mb-3">
                          <label for="current_password">@lang('website.Current Password')</label>
                          <div class="input-group col-12">                          
                            <input name="current_password" type="password" class="form-control change-prssword-field-validate current_password" id="current_password" placeholder="Current password">
                            <!-- <span class="help-block error-content" hidden>@lang('website.Please enter current password')</span> -->
                            <a href="javascript:;" toggle="#current_password" class="field-icon toggle-password showHideIconChangePass"><i class="fas fa-eye"></i></a>
                          </div>
                        </div>
                        @endif
                        
                        <div class="form-group mb-3">
                         <label for="password">@lang('website.New Password')</label>
                          <div class="input-group col-12">                             
                            <input name="new_password" type="password" class="form-control changepassword change-prssword-field-validate password" id="new_password" placeholder="New password">
                            <!-- <span class="help-block error-content" hidden>@lang('website.Please enter your password and should be at least 6 characters long')</span> -->
                            <a href="javascript:;" toggle="#new_password" class="field-icon toggle-password2 showHideIconChangePass"><i class="fas fa-eye"></i></a>
                          </div>
                        </div>

                        <div class="form-group mb-3">
                          <label for="confirm_password">@lang('website.Confirm Password')</label>
                          <div class="input-group col-12">                             
                            <input name="confirm_password" type="password" class="form-control c-password change-prssword-field-validate re_password" id="confirm_password" placeholder="Confirm new password">
                            <!-- <span class="help-block error-content" hidden>@lang('website.Please enter your password and should be at least 6 characters long')</span> -->
                            <a href="javascript:;" toggle="#confirm_password" class="field-icon toggle-password3 showHideIconChangePass"><i class="fas fa-eye"></i></a>
                          </div>
                        </div>

                       
                              <button type="button" onclick="changepasswordfieldvalidate();" class="btn btn-secondary"><span>Save</span></button>            
                      </form>
                      </div>
                      
                  </div>
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
          <li><a href="refer-a-friend" title="">Invite A Friend To Earn</a></li>
          <li><a href="change-password" title="">Change Password</a></li>
          <li class="last"><a href="logout" title="">Logout</a></li>
					</ul>
				</div>
			</div>

      </div>
  </div>
</div>
</section>
<style>
#registerTabContent .alert.show {
 
    font-size: 15px;
}
</style>

 @endsection
