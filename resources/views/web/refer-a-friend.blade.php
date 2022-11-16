@extends('web.layout')

@section('content')

<section class="">

<!-- Profile Content -->

<section class="profile-content main-section">

  <div class="container">

           <div class="heading">

               <h2>

                   Invite A Friend To Earn

               </h2>

             </div>

    <div class="row">

       <div class="col-12 col-lg-8 ">

                 <div class="referWrap">

                 <figcaption>

                    <p>Invite a friend and earn <span>{{$result['commonContent']['setting'][129]->value}}</span> Z-Points when they make their first purchase</p>

                    <p>Your friend will also get <span>{{$result['commonContent']['setting'][129]->value}}</span> Z-Points</p>

                    <small>Tap to copy your invitation code</small>
                    <div id="alert"></div>    
                    

                    <div class="form-group" onclick="copyCode()"><input type="text" name="referral_code" readonly="readonly" value="{{substr(Auth::guard('customer')->user()->first_name, 0, 1)}}{{substr(Auth::guard('customer')->user()->last_name, 0, 1)}}-{{Auth::guard('customer')->user()->id}}" id="myInput"><i class="fas fa-copy"></i></div>

                    <p>Invite as many friends as you want and keep earning <br>Z-Points that you can use on all your purchases</p>

                    </figcaption>

                 </div>

         <!-- ............the end..... -->

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
   function copyCode() {

  /* Get the text field */

  var copyText = document.getElementById("myInput");



  /* Select the text field */

  copyText.select();

  copyText.setSelectionRange(0, 99999); /* For mobile devices */



  /* Copy the text inside the text field */

  document.execCommand("copy");
  $("#alert").html("<div class='alert alert-success alert-dismissible fade show' role='alert'><span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span><span class='sr-only'>@lang('website.Success'):</span>Copied!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");


  /* Alert the copied text */

  // alert("Copied the text: " + copyText.value);

}

 </script>

 @endsection

