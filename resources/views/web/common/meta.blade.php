	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport" />

	@if(!empty($result['commonContent']['setting'][86]->value))
	<link rel="icon" type="image/png" href="{{asset('').$result['commonContent']['setting'][86]->value}}">
	@endif
	<link rel="canonical" href="{{url()->full()}}" />
	@if(Request::url() === 'https://winztime.com')
	@if(!empty($result['commonContent']['setting'][72]->value))
	<title><?=stripslashes($result['commonContent']['setting'][72]->value)?></title>
	@else
	<title><?=stripslashes($result['commonContent']['setting'][18]->value)?></title>
	@endif
	<meta name="title"  content="<?=stripslashes($result['commonContent']['setting'][73]->value)?>"/>
	<meta name="description" content="<?=stripslashes($result['commonContent']['setting'][75]->value)?>"/>
	<meta name="keywords" content="<?=stripslashes($result['commonContent']['setting'][74]->value)?>"/>
	<meta property="og:type" content="website" />
	<meta property="og:title" content="<?=stripslashes($result['commonContent']['setting'][73]->value)?>" />
	<meta property="og:description" content="<?=stripslashes($result['commonContent']['setting'][75]->value)?>" />
	<meta property="og:url" content="https://winztime.com/" />
	<meta property="og:site_name" content="Winztime UAE" />
	<meta property="og:image" content="https://winztime.com/web/assets/images/cam2.jpg" />
	@endif
	@if(Request::url() === 'https://winztime.com/shop')
	<title>Buy Sports and Gym Accessories in Dubai | Winztime</title>
	<meta name="title"  content="Buy Sports and Gym Accessories in Dubai | Winztime"/>
	<meta name="description" content="Buy sports and gym accessories in Dubai from one of the best e-commerce stores, Winztime. Get a chance to win luxury prizes every time you shop here. Grab now!"/>
	<meta name="keywords" content="Buy Sports and Gym Accessories in Dubai , Winztime"/>
	<meta property="og:type" content="website" />
	<meta property="og:title" content="Buy Sports and Gym Accessories in Dubai | Winztime " />
	<meta property="og:description" content="Buy sports and gym accessories in Dubai from one of the best e-commerce stores, Winztime. Get a chance to win luxury prizes every time you shop here. Grab now! "/>
	<meta property="og:url" content=" https://winztime.com/shop " />
	<meta property="og:site_name" content=" Winztime UAE  " />
	<meta property="og:image" content=" https://winztime.com/images/media/2021/05/HvB3h30905.png " />
	@endif
	<?php   $url =  $_SERVER['REQUEST_URI']; 
	?> 
	@if($url === '/page?name=how-it-works' || $url ==='/page/how-it-works')
	<title> Chance to Win a Prize in Dubai | Winztime</title>
	<meta name="title"  content="Chance to Win a Prize in Dubai | Winztime"/>
	<meta name="description" content="Create an account, browse through products from the ongoing campaign and get a chance to win a prize in Dubai. Winning luxury items at Winztime in UAE is easy."/>
	<meta name="keywords" content="Chance to Win a Prize in Dubai,Winztime"/>
	<meta property="og:type" content="website" />
	<meta property="og:title" content="Chance to Win a Prize in Dubai | Winztime" />
	<meta property="og:description" content="Create an account, browse through products from the ongoing campaign and get a chance to win a prize in Dubai. Winning luxury items at Winztime in UAE is easy." />
	<meta property="og:url" content="https://winztime.com/page/how-it-works" />
	<meta property="og:site_name" content="Winztime UAE" />
	<meta property="og:image" content=" https://winztime.com/images/media/2021/07/tVllU05905.png " />
	@endif
	@if($url === '/login')
	<title>Login | Winztime UAE</title>
	<meta name="title"  content="Login | Winztime UAE"/>
	<meta name="description" content="Login to your account or get yourself registered at Winztime UAE now if you are a new member. Registered members will get extra Z points for shopping."/>
	<meta name="keywords" content="Login , Winztime UAE"/>
	<meta property="og:type" content="website" />
	<meta property="og:title" content=" Login | Winztime UAE " />
	<meta property="og:description" content=" Login to your account or get yourself registered at Winztime UAE now if you are a new member. Registered members will get extra Z points for shopping. " /> <meta property="og:url" content="https://winztime.com/login/" />
	<meta property="og:site_name" content="Winztime UAE" />
	<meta property="og:image" content="https://winztime.com/images/57.png" />
	@endif
	@if($url === '/viewcart')
	<title>Shop with Winztime | Win Luxury Prizes | Winztime UAE</title>
	<meta name="title"  content="Shop with Winztime | Win Luxury Prizes | Winztime UAE"/>
	<meta name="description" content="Explore products and get a chance to win luxury prizes at Winztime UAE. Shopping with Winztime is easy & rewarding. Select products, add to the cart and make the final payment."/>
	<meta name="keywords" content="Shop with Winztime ,Win Luxury Prizes , Winztime UAE"/>
	<meta property="og:type" content="website" />
	<meta property="og:title" content=" Shop with Winztime | Win Luxury Prizes | Winztime UAE " />
	<meta property="og:description" content=" Explore products and get a chance to win luxury prizes at Winztime UAE. Shopping with Winztime is easy & rewarding. Select products, add to the cart and make the final payment. " />
	<meta property="og:url" content="https://winztime.com/viewcart/" />
	<meta property="og:site_name" content="Winztime UAE" />
	<meta property="og:image" content="https://winztime.com/images/78.png" />
	@endif

	@if($url === '/page/z-points')

	<title>Z Points Winztime | Winztime UAE</title>
	<meta name="title"  content="Z Points Winztime | Winztime UAE"/>
	<meta name="description" content="On the shopping of 10 AED at Winztime UAE, you will get 1 Z point. Collect and use for shopping best-in-class gym accessories."/>
	<meta name="keywords" content="Z Points Winztime , Winztime UAE"/>
	<meta property="og:type" content="website" />
	<meta property="og:title" content=" Z Points Winztime | Winztime UAE " />
	<meta property="og:description" content=" On the shopping of 10 AED at Winztime UAE, you will get 1 Z point. Collect and use for shopping best-in-class gym accessories. " />
	<meta property="og:url" content="https://winztime.com/page/z-points/ " />
	<meta property="og:site_name" content=" Winztime UAE " />
	<meta property="og:image" content="https://winztime.com/images/39.png" />
	@endif
	@if($url === '/page/Privacy-Policy')

	<title>Winztime Privacy Policy | Winztime UAE</title>
	<meta name="title"  content="Winztime Privacy Policy | Winztime UAE"/>
	<meta name="description" content="Read Winztime privacy policy thoroughly before putting your information. It contains information on how Winztime UAE manages, collects, uses, and discloses your personal information."/>
	<meta name="keywords" content="Winztime Privacy Policy, Winztime UAE"/>
	<meta property="og:type" content="website"/>
	<meta property="og:title" content="Winztime Privacy Policy | Winztime UAE " />
	<meta property="og:description" content=" Read Winztime privacy policy thoroughly before putting your information. It contains information on how Winztime UAE manages, collects, uses, and discloses your personal information. " /> <meta property="og:url" content="https://winztime.com/page/Privacy-Policy/ " />
	<meta property="og:site_name" content="Winztime UAE" />
	<meta property="og:image" content="https://winztime.com/images/57.png" />
	@endif
	@if($url === '/page/Term-Services')
	<title>Winztime Terms & Conditions | Winztime UAE</title>
	<meta name="title"  content="Winztime Terms & Conditions | Winztime UAE"/>
	<meta name="description" content="Offers and deals at Winztime UAE are subject to change anytime. Regular customers will get loyalty points referred to as Z points. Read Winztime terms & conditions in detail to know more."/>
	<meta name="keywords" content="Winztime Terms & Conditions , Winztime UAE"/>
	<<meta property="og:type" content="website" />
	<meta property="og:title" content=" Winztime Terms & Conditions | Winztime UAE " />
	<meta property="og:description" content=" Offers and deals at Winztime UAE are subject to change anytime. Regular customers will get loyalty points referred to as Z points. Read Winztime terms & conditions in detail to know more. " /> 
	<meta property="og:url" content = "https://winztime.com/page/Term-Services/ " />
	<meta property="og:site_name" content="Winztime UAE" />
	<meta property="og:image" content="https://winztime.com/images/57.png" />
	@endif
	@if($url === '/forgotPassword')

	<title>Forgot Password | Winztime UAE</title>
	<meta name="title"  content="Forgot Password | Winztime UAE"/>
	<meta name="description" content="Forgot password? Enter your valid email address or mobile number to receive a password reset link. Let us know what issue you're facing? Winztime UAE is happy to help its valuable customers."/>
	<meta name="keywords" content="Forgot Password, Winztime UAE"/>
	<meta property="og:type" content="website" />
	<meta property="og:title" content=" Forgot Password | Winztime UAE " />
	<meta property="og:description" content=" Forgot password? Enter your valid email address or mobile number to receive a password reset link. Let us know what issue you're facing? Winztime UAE is happy to help its valuable customers. " /> <meta property="og:url" content = "https://winztime.com/forgotPassword/ " />
	<meta property="og:site_name" content="Winztime UAE" />
	<meta property="og:image" content="https://winztime.com/images/57.png" />
	@endif
	@if($url === '/contact')

	<title>Contact Winztime | Raffle Draw in UAE</title>
	<meta name="title"  content="Contact Winztime | Raffle Draw in UAE"/>
	<meta name="description" content="Win luxury prizes in Dubai with Winztime. Shop for the best-in-class gym and sports accessories and get a free entry to the raffle draw in UAE by doing charity."/>
	<meta name="keywords" content="Contact Winztime , Raffle Draw in UAE"/>
	<meta property="og:type" content="website" />

	<meta property="og:title" content="Contact Winztime | Raffle Draw in UAE " />

	<meta property="og:description" content="Win luxury prizes in Dubai with Winztime. Shop for the best-in-class gym and sports accessories and get a free entry to the raffle draw in UAE by doing charity. " />

	<meta property="og:url" content=" https://winztime.com/contact " />

	<meta property="og:site_name" content=" Winztime UAE  " />

	<meta property="og:image" content=" https://winztime.com/images/57.png" />
	@endif
	@if($url === '/page?name=charities' || $url ==='/page/charities')

	<title>Do Charities and Win Prizes in Dubai | Winztime</title>
	<meta name="title"  content="Do Charities and Win Prizes in Dubai | Winztime "/>
	<meta name="description" content="Do charities with Winztime UAE and get yourself rewarded for your generosity. Our charity partners are ‘Friends of Cancer Patients’ an organization, helping families dealing with cancer."/>
	<meta name="keywords" content="Do Charities and Win Prizes in Dubai , Winztime"/>
	<meta property="og:type" content="website" />
	<meta property="og:title" content="Do Charities and Win Prizes in Dubai , Winztime " />
	<meta property="og:description" content="Do charities with Winztime UAE and get yourself rewarded for your generosity. Our charity partners are ‘Friends of Cancer Patients’ an organization, helping families dealing with cancer. " /> 
	<meta property="og:url" content=" https://winztime.com/page/charities " />
	<meta property="og:site_name" content="Winztime UAE" />
	<meta property="og:image" content= "https://winztime.com/images/charityImg5.webp" />
	@endif
	@if($url === '/page?name=faqs' || $url ==='/page/faqs')

	<title>Frequently asked questions | Winztime UAE</title>
	<meta name="title"  content="Frequently asked questions| Winztime UAE"/>
	<meta name="description" content="We have answers to all your questions related to shopping and winning at Winztime UAE. Visit Frequently asked questions or ping any other query at info@winztime.com"/>
	<meta name="keywords" content="Frequently asked questions , Winztime UAE"/>
	<meta property="og:type" content="website" />

<meta property="og:title" content="Frequently asked questions | Winztime UAE " />

<meta property="og:description" content=" We have answers to all your questions related to shopping and winning at Winztime UAE. Visit Frequently asked questions or ping any other query at info@winztime.com " />

<meta property="og:url" content=" https://winztime.com/page/faqs " />

<meta property="og:site_name" content=" Winztime UAE " />

<meta property="og:image" content=" https://winztime.com/images/58.png " />
	@endif
	@if($url === '/page?name=about-us'  || $url ==='/page/about-us')
	<title>The Home of Perfect Win | Winztime</title>

	<meta name="title"  content="The Home of Perfect Win | Winztime"/>
	<meta name="description" content="Winztime, the home of perfect win, offers a shopping experience no one else can. You can get a ticket to win prizes including gadgets, Gold, cars etc in the raffle draw."/>
	<meta name="keywords" content="The Home of Perfect Win , Winztime "/>
	<meta property="og:type" content="website" />

	<meta property="og:title" content="The Home of Perfect Win , Winztime " />

	<meta property="og:description" content="Winztime, the home of perfect win, offers a shopping experience no one else can. You can get a ticket to win prizes including gadgets, Gold, cars etc in the raffle draw." />

	<meta property="og:url" content="https://winztime.com/page/about-us" />

	<meta property="og:site_name" content="Winztime UAE" />

	<meta property="og:image" content=" https://winztime.com/web/assets/images/win3.jpg " />
	@endif
	@if(Request::url() === 'https://winztime.com/campaigns/detail/11')
	<title>Buy skipping rope in Dubai | Skydiving voucher in Dubai</title>
	<meta name="title"  content="Buy skipping rope in Dubai | Skydiving voucher in Dubai"/>
	<meta name="description" content="Buy skipping rope in Dubai and get a chance to win a skydiving voucher in Dubai. Visit Winztime and get your skydiving voucher now."/>
	<meta name="keywords" content="Buy skipping rope in Dubai Skydiving voucher in Dubai"/>
	@endif
	@if(Request::url() === 'https://winztime.com/campaigns/detail/8')
	<title>Wrist band in Dubai | Win Samsung mobiles in Dubai</title>
	<meta name="title"  content="Wrist band in Dubai | Win Samsung mobiles in Dubai"/>
	<meta name="description" content="Want to Win Samsung mobiles in Dubai? Winztime gives you a chance of getting a Free Samsung Galaxy S21 on purchasing a wristband in Dubai. Hurry up and visit Winztime now."/>
	<meta name="keywords" content="Wrist band in Dubai Win Samsung mobiles in Dubai"/>
	@endif
	@if(Request::url() === 'https://winztime.com/campaigns/detail/9')
	<title>Buy gym bags in Dubai | Free gold in Dubai</title>
	<meta name="title"  content="Buy gym bags in Dubai | Free gold in Dubai"/>
	<meta name="description" content="Hurry before the stock runs out, Winztime UAE offers the best chance to win Free gold in Dubai, buy gym bags in Dubai and make your dream come true. Contact Now."/>
	<meta name="keywords" content="Buy gym bags in Dubai Free Gold in Dubai"/>
	@endif
@if(Request::url() === 'https://winztime.com/campaigns/detail/6')
	<title>Buy Purple Gym Towel Win Gucci Bag | Winztime UAE </title>
	<meta name="title"  content="Buy Purple Gym Towel Win Gucci Bag | Winztime UAE "/>
	<meta name="description" content="Shopping at Winztime UAE could win you more at paying nominal. Buy Purple Gym Towel win Gucci bag, if luck is on your side. You will get this offer only at Winztime. Shop now & win a ticket to draw! "/>
	<meta name="keywords" content="Buy Purple Gym Towel Win Gucci Bag, Winztime UAE "/>
	@endif
	@if(Request::url() === 'https://winztime.com/campaigns/detail/12')
	<title>Winztime Pencil Can win you iPhone 12 | Winztime UAE </title>
	<meta name="title"  content="Winztime Pencil Can win you iPhone 12 | Winztime UAE "/>
	<meta name="description" content="Ever think that a Winztime pencil can win you iPhone 12? Come, shop a pencil at Winztime in UAE and get yourself registered for the raffle draw that could win you iPhone and many more prizes.  "/>
	<meta name="keywords" content="Winztime Pencil Can win you iPhone 12 , Winztime UAE "/>
	@endif
	@if(Request::url() === 'https://winztime.com/campaigns/detail/13')
	<title>Buy Wrist Band Win Gold | Win Luxury Prizes  </title>
	<meta name="title"  content="Buy Wrist Band Win Gold | Win Luxury Prizes  "/>
	<meta name="description" content="Get a chance to win luxury prizes at Winztime UAE. Buy wrist band & win gold or buy a pencil to raise your chances of winning the iPhone 12. Visit Winztime now to know about more offers. "/>
	<meta name="keywords" content="Buy Wrist Band Win Gold | Win Luxury Prizes  "/>
	@endif
	@if(Request::url() === 'https://winztime.com/campaigns/detail/14')
	<title>Buy Anti Stress Win Mall Voucher | Winztime UAE   </title>
	<meta name="title"  content="Buy Anti Stress Win Mall Voucher | Winztime UAE  "/>
	<meta name="description" content="Relax the muscles of your hand, buy an anti-stress ball win mall voucher at Winztime UAE. They are soft, squeezable and, easy to catch. Check out our product range now and relax your mind too!  "/>
	<meta name="keywords" content="Buy Anti Stress Win Mall Voucher | Winztime UAE   "/>
	@endif
	@if(Request::url() === 'https://winztime.com/campaigns/detail/17')
	<title>BBuy Skipping Rope Win Gold PRIZE & Mall Voucher | Winztime UAE </title>
	<meta name="title"  content="Buy Skipping Rope Win Gold PRIZE & Mall Voucher | Winztime UAE  "/>
	<meta name="description" content="Win prizes by shopping or donating gym accessories. Buy skipping rope win gold prize & mall voucher at Winztime UAE now. Also, win Z points on every purchase to get extra benefits.  "/>
	<meta name="keywords" content="Buy Skipping Rope Win Gold PRIZE & Mall Voucher , Winztime UAE   "/>
	@endif
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<meta name="google-site-verification" content="0m0eXri9pFIjDOGKEBCruWVWu9XVdTvDzr_0UDpyc64" />
	<meta name="google-signin-client_id" content="237419119552-1236g8084gtgru94fo998a9et6ag1om5.apps.googleusercontent.com">
	<!-- Core CSS Files -->
	<link rel="stylesheet" type="text/css" href="{{asset('web/css').'/'.$result['commonContent']['setting'][81]->value}}.css">
	<script src="{!! asset('web/js/app.js') !!}" ></script>
	@if(Request::path() == 'checkout')
	<!--------- stripe js ------>
	<!-- <script src="https://js.stripe.com/v3/" defer></script> -->

	<!-- <link rel="stylesheet" type="text/css" href="{{asset('web/css/stripe.css') }}" data-rel-css="" /> -->

	<!------- paypal ---------->
	<script src="https://apis.google.com/js/platform.js" async defer></script>
	<script src="https://www.paypalobjects.com/api/checkout.js" defer></script>
	<script src="https://checkout.razorpay.com/v1/checkout.js" defer></script>

	@endif
	
	<!---- onesignal ------>	
	
	@if(!empty($result['commonContent']['setting'][76]->value))
	<?=stripslashes($result['commonContent']['setting'][76]->value)?>
	@endif
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="{{asset('web/assets/fontawesome/css/all.css')}}" rel="stylesheet" defer>

	<link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="{{asset('web/assets/css/default.css') }}" defer>	

	<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '923652165220372');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=923652165220372&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->

		<noscript>

			<img height="1" width="1" 

			src="https://www.facebook.com/tr?id=1709154436140161&ev=PageView

			&noscript=1"/>

		</noscript>


		<!-- End Facebook Pixel Code -->
		<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-FCHW1GKJLC"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
 
  gtag('config', 'G-FCHW1GKJLC');
</script>


	<meta name="facebook-domain-verification" content="7a9koqxea7utfalbozeq7mvgqavid6" />
<script type="application/ld+json">
        {
            "@context" : "https://schema.org",
            "@type" : "Organization",
            "name" : "Winztime UAE",
            "url" : "https://winztime.com/",
            "sameAs" : [
            "https://www.facebook.com/Winztime-110445164590731",
            "https://instagram.com/winztimeuae",
            "https://youtube.com/channel/UCF_-XYC6abqSxypR4RW1gEg"
            ]
        }
    </script>
</head>