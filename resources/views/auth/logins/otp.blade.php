@extends('web.layout')
@section('content')


<div class="container otp">
  <div class="row justify-content-center">
    <div class="col-lg-12">
    <?php  $session_email= Session::get('otp_email');
    ?>

       <div class="row justify-content-center">
        <div class="col-12 col-sm-12 col-md-6 justify-content-center customerror ">
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
                $(document).ready(function(){
                    $("#accordion-1").attr('style','display:none;');
                });
            </script>
          @endif
        </div>
      </div>


<div class="d-flex justify-content-center align-items-center">
  <div id="dialog">
  
    <h3>Enter Code</h3>
    <p>Please enter the 6-digit verification that we have sent to the email address you provided.</p>
      <div class="input-field otp-mobile-inputs">
   <form method="post" class="digit-group" data-group-name="digits" data-autosubmit="true" autocomplete="off" action="{{ URL::to('/checkotp')}}">
   {{csrf_field()}}
      <input type="number" maxLength="1" size="1" min="0" max="9"  pattern="[0-9]{1}"  id="digit-1" data-next="digit-2"  class="singleOtp numerals" />
      <input type="number" maxLength="1" size="1" min="0" max="9" pattern="[0-9]{1}" id="digit-2"  data-next="digit-3" data-previous="digit-1" class="singleOtp numerals" />
      <input type="number" maxLength="1" size="1" min="0" max="9" pattern="[0-9]{1}" id="digit-3" data-next="digit-4" data-previous="digit-2" class="singleOtp numerals" />
      <input type="number" maxLength="1" size="1" min="0" max="9" pattern="[0-9]{1}" id="digit-4" data-next="digit-5" data-previous="digit-3" class="singleOtp numerals" />
      <input type="number" maxLength="1" size="1" min="0" max="9" pattern="[0-9]{1}" id="digit-5" data-next="digit-6"  data-previous="digit-4" class="singleOtp numerals" />
      <input type="number" maxLength="1" size="1" min="0" max="9" pattern="[0-9]{1}" id="digit-6" class="singleOtp numerals" data-previous="digit-5" />
  <input type="hidden"  name="otp_code" id="otp_code_hidden" value=""/>
   <div class="text-center mt-3">
  <button class="btn btn-primary btn-embossed"><span>Verify</span></button>
</div>
    </form>
   
        </div>
    <div>
   <div class="text-center mt-3">
      <a  href="#" class="customotp btn btn-primary btn-embossed" onclick="resendotp('{{$session_email}}');"><span>I didn't get the verification code</span></a>
</div>
      <br />
    </div>
  </div>
</div>

      <div id="loader"></div>
</div>
</div>
</div>
<style type="text/css">


  .otp #dialog {
        box-sizing: border-box;
    border: solid 1px #ccc;
    margin: 0 auto 26px;

  padding: 43px 82px 46px;
    display: inline-block;
   box-shadow: 4px 6px 38px rgb(0 0 0 / 12%);
    background-color: #faf8f8;
    overflow: hidden;
    position: relative;
   max-width: 55%;
    border-radius: 20px;
}
     .otp #dialog h3 {
   margin: 0 0 18px;
    letter-spacing: -1.2px;
    font-size: 30px;
    line-height: 27px;
        display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-pack: justify;
    -ms-flex-pack: justify;
    justify-content: space-between;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    font-weight: 900;
    }

  #dialog p{
    margin-bottom: 20px;
    font-size: 17px;
    text-align: left;
  }
.input-field.otp-mobile-inputs {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;
}
      .input-field.otp-mobile-inputs input.singleOtp{
       width: 58px;
    height: 55px;
    border-radius: 10px;
    margin-right: 9px;
    background: #fff;
    border: 1px solid #cecece;
    padding: 0 10px;
    text-align: center;
      }

        .otp #form  input:focus {
          border-color: purple;
          box-shadow: 0 0 5px purple inset;
        }

        .otp #form  input::selection {
          background: transparent;
        }


@media screen and (min-device-width: 320px) and (max-device-width: 767px) { 
    .otp #dialog {
    box-sizing: border-box;
    border: solid 1px #ccc;
    margin: 0 auto 26px;
    padding: 43px 82px 46px;
    display: inline-block;
    box-shadow: 4px 6px 38px rgb(0 0 0 / 12%);
    background-color: #faf8f8;
    overflow: hidden;
    position: relative;
    max-width: 100%;
    border-radius: 10px;
}
.otp #dialog {
    box-sizing: border-box;
    border: solid 1px #ccc;
    margin: 0 auto 26px;
    padding: 41px 29px 30px;
    display: inline-block;
    box-shadow: 4px 6px 38px rgb(0 0 0 / 12%);
    background-color: #faf8f8;
    overflow: hidden;
    position: relative;
    max-width: 90%;
    border-radius: 30px;
    margin-top: 10px;
}
#dialog p {
 
    margin-bottom: 20px;
    font-size: 17px;
  
    line-height: 22px;
    text-align: center;
}
.input-field.otp-mobile-inputs input.singleOtp {
    width: 30px;
    height: 30px;
    border-radius: 6px;
    margin-right: 9px;
    background: #fff;
    border: 1px solid #cecece;
    padding: 0 4px;
    text-align: center;
    margin: 0px;
}
.otp #dialog h3 {

    margin: 0 0 18px;
    letter-spacing: -1.2px;
    font-size: 30px;
    line-height: 27px;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-pack: justify;
    -ms-flex-pack: justify;
    justify-content: space-between;
    -webkit-box-align: center;
    -ms-flex-align: center;

    font-weight: 900;
    justify-content: center;
}
}
@media screen and (min-device-width: 768px) and (max-device-width: 1093px) { 
.otp #dialog {
   
    margin: 0 auto 26px;
    padding: 43px 34px 46px;
 
    max-width: 90%;
        border-radius: 15px;
      }
  .otp #dialog h3 {
   
    justify-content: center;
}
#dialog p {
    
    font-size: 15px;
    text-align: center;
}
  }

</style>
<script>
 



  $(".singleOtp").on('keyup', function(e) {
      $(this).attr('maxlength', 1);
     var otp_single= $("#otp_code_hidden").val();
   
     $("#otp_code_hidden").val(otp_single+e.target.value);
    var parent = $($(this).parent());
    
    if(e.keyCode === 8 || e.keyCode === 37) {
      var prev = parent.find('input#' + $(this).data('previous'));
    
     console.log(otp_single);

      if(prev.length) {
        $(prev).select();
      }
    } else if((e.keyCode >= 48 && e.keyCode <= 57) || (e.keyCode >= 65 && e.keyCode <= 90) || (e.keyCode >= 96 && e.keyCode <= 105) || e.keyCode === 39) {
      var next = parent.find('input#' + $(this).data('next'));
      
      if(next.length) {
     
        if(e.target.value==''){
          return false;
        }else{
          $(next).select();
        }

      
      }
    }
  });


  function resendotp(email){
      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
     
      $.ajax({
       type:'POST',
       url:"{{ route('ResendOtpMail') }}",
       data:{email:email},
       success:function(data){
        if(data.error==false){

         var html=   '<div class="alert alert-success alert-dismissible fade show custome" role="alert"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span><span class="sr-only">@lang("website.Success"):</span>'+data.message+' <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
       }else{
         var html='<div class="alert alert-danger alert-dismissible fade show custome" role="alert"> <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span><span class="sr-only">@lang("website.Error"):</span>'+data.message+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';

       }

       $(".custome").remove();
       $(".customerror").append(html);
           }
        });
  
  

  }


  var spinner = $('#loader');
$(function() {
  $('.digit-group').submit(function(e) {
    spinner.show();
   
  });
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
  background: rgba(0,0,0,0.75) url(images/loading2.gif) no-repeat center center;
  z-index: 10000;
}
</style>


@endsection