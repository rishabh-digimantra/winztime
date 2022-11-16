<!-- contact Content -->
<!-- <div class="container-fuild">
  <nav aria-label="breadcrumb">
      <div class="container">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ URL::to('/')}}">@lang('website.Home')</a></li>
            <li class="breadcrumb-item active" aria-current="page">@lang('website.Contact Us')</li>
          </ol>
      </div>
    </nav>
</div>  -->

<section class="contact-content main-section">
  <div class="container">
    <h1> @lang('website.Contact Us') </h1>
        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="form-start contFormWrp">
                  @if ($errors->any())
                      <div class="alert alert-danger">
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                  @endif  
                  @if(session()->has('success') )
                     <div class="alert alert-success">
                         {{ session()->get('success') }}
                     </div>
                  @endif

                  <form enctype="multipart/form-data" id="contactform" action="{{ URL::to('/processContactUs')}}" method="post"   onsubmit="return ValidateEmail();">
                    <input name="_token" value="{{ csrf_token() }}" type="hidden">
                      <!-- <label class="first-label" for="email">@lang('website.Full Name')</label> -->
                      <div class="form-group"> 
                        <input type="text" name="name" placeholder="Name" onkeypress="return /^[ A-Za-z-_@./#${}<>,?=;'|\!%*()&+-]*$/.test(event.key)" class="form-control" id="checkIt"  required="required" />
                        <div class="help-block error-content invalid-feedback nameerror" hidden>@lang('website.Please enter your name')</div>
                      
                      </div>
                      <!-- <label for="email">@lang('website.Email')</label> -->
                      <div class="form-group">       
                          <input type="email" name="email" placeholder="Email" class="form-control" required id="email_form" onblur="return ValidateEmail()"/>
                          <div class="help-block error-content invalid-feedback emailerror" hidden>@lang('website.Please enter your valid email address')</div>

                      </div> 
                      <div class="form-group">
                      <!-- <label for="email">@lang('website.Message')</label> -->
                      
                      <textarea rows="5" cols="56" name="message" id="messagecontact" placeholder="Message" class="form-control contact-us-field-validate" required></textarea>          
                      <div class="help-block error-content invalid-feedback messageerror" hidden>@lang('website.Please enter your message')</div>
                    </div>
                      <!-- <button type="button" onclick="contactuscontactfieldvalidate();" name="submitBtn" class="btn btn-secondary"><span>@lang('website.Submit') <i class="fas fa-location-arrow"></i></span></button>   -->              <button type="submit" class="btn btn-secondary"><span>@lang('website.Submit') <i class="fas fa-location-arrow"></i></span> 
                </button> 
                     
                    </form>

                </div>
          </div>     
        
          <div class="col-12 col-lg-4">
            <div class="">
                  <ul class="contact-info pl-0 mb-0"  >
                      <li> <i class="fas fa-mobile-alt"></i><span><a href="#">{{$result['commonContent']['setting'][11]->value}}</a></span> </li>
                      <!-- <li> <i class="fas fa-map-marker"></i><span><a href="#">@lang('website.Ecommerce')<br>Address</a></span> </li> -->
                      <li> <i class="fas fa-envelope"></i><span> <a href="mailto:{{$result['commonContent']['setting'][3]->value}}">{{$result['commonContent']['setting'][3]->value}}</a> </span> </li>
                      <!-- <li> <i class="fas fa-tty"></i><span> <a href="#" dir="ltr">{{$result['commonContent']['setting'][11]->value}}</a> </span> </li> -->
                 
                    </ul>         
                </div>
               
                <!-- <div id="map">
                  
                </div>
                <script>
                  var map;
                  function initMap() {
                    map = new google.maps.Map(document.getElementById('map'), {
                      center: {lat: -34.397, lng: 150.644},
                      zoom: 8
                    });
                  }
                </script>
                @if($result['commonContent']['setting'][62]->value)
                <script src="https://maps.googleapis.com/maps/api/js?key=".{{$result['commonContent']['setting'][62]->value}}."&callback=initMap"
                async defer></script>
                 @endif
                <p class="info">
                    @lang('website.Contact us text')
                </p>
          </div>  -->
        
        </div>
    
  </div> 
   <script type="text/javascript">
function ValidateEmail(mail) 
{
  
 if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test($("#email_form").val()))
  {
     $(".emailerror").attr("hidden");

  $(".emailerror").removeClass("active");
    return (true)
  }
    $(".emailerror").removeAttr("hidden");

  $(".emailerror").addClass("active");

    return false;  
}
                 
                </script>    
                <style type="text/css">
                  .help-block.error-content.invalid-feedback.emailerror.active{
                    display: block;
                  }
                </style> 
</section>