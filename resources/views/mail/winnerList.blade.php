<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Email Template</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        table.example {
            background-image: url('https://winztime.com/images/back_mail.png');
            background-repeat: no-repeat;
        }

        table.second {
            background-image: url('images/back1.jpg');
            background-repeat: no-repeat;
        }

        table.third {
            background-image: url('images/back2.jpg');
            background-repeat: no-repeat;
        }

        table.fourth {
            background-image: url('https://winztime.com/images/back3.png');
            background-repeat: no-repeat;
        }
    </style>
</head>

<body style="font-family: 'Rubik', sans-serif;">
    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
        <!-- START HEADER/BANNER -->
        <tbody>
            <tr>
                <td align="center">
                    <table class="col-600" width="600" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tbody>
                            <tr>
                                <td align="center">
                                    <table class="col-600" width="600" border="0" align="center" cellpadding="0" cellspacing="0">
                                        <tbody>
                                            <tr>
                                                <td align="center" valign="top" bgcolor="#000">
                                                    <table class="col-600" width="600" height="150" border="0" align="center" cellpadding="0" cellspacing="0">
                                                        <tbody>
                                                            <!-- <tr>
																<td height="10"></td>
															</tr> -->
                                                            <tr>
                                                                <td align="center" style="line-height: 0px;"> <a href="https://winztime.com/"><img style="display:block; line-height:0px; font-size:0px; border:0px;" src="https://winztime.com/images/footLogo.png" width="300" alt="logo"></a> </td>
                                                            </tr>

                                                        </tbody>
                                                    </table>

                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <!-- END HEADER/BANNER -->
            <!-- START 3 BOX SHOWCASE -->

            <tr>
                <td align="center">
                    <table class="col-600 example" width="600" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-left:20px; margin-right:20px; background-color: #f8f8f7; border-left: 1px solid #dbd9d9; border-right: 1px solid #dbd9d9; position: relative;">
                        <tbody>
                            <tr>
                                <td height="60"></td>
                            </tr>
                            <tr>
                                <td align="center" style="font-family: 'Rubik', sans-serif;"><span style="font-size:45px; background-color:#000000; color:#ffffff; font-style: italic; padding: 5px 12px;font-weight: 800;font-family: 'Rubik', sans-serif;">
                                        LUCKY DRAW</span>
                                </td>
                            </tr>
                            <tr>
                                <td height="10"></td>
                            </tr>
                            <tr>
                                <td align="center" style="font-family: 'Rubik', sans-serif;"><span style="font-size:40px; color:#000000; font-style: italic; padding: 10px 20px;font-weight: 800;font-family: 'Rubik', sans-serif;">
                                        WINNERS</span>
                                </td>
                            </tr>
                            <tr>
                                <td height="30"></td>
                            </tr>
                            <tr>
                                <td align="center" style="font-family: 'Rubik', sans-serif;font-size:16px;padding: 0px 50px; color:#636363; line-height:22px;">
                                    Hi <b>{{ @$name }}</b>, below are the results of lucky draw winners
                                </td>
                            </tr>

                            <tr>
                                <td height="20"></td>
                            </tr>




                        </tbody>
                    </table>
                </td>
            </tr>

            <!-- Mall Voucher1 -->
            @foreach($winner_campaign as $campaign)
            <tr>
                <td align="center ">
                    <table style="position:relative; border-left:1px solid #dbd9d9; border-right: 1px solid #dbd9d9" class="col-600 " width="600" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tbody>
                            <tr>
                                <td>
                                    <p style="font-family:'Rubik', sans-serif; text-align:center; 
								font-size:30px; color:#343434; line-height:24px; font-weight: 600;">
                                        Winner of {!! $campaign['getReward']['title'] !!}
                                    </p>
                                </td>
                            </tr>

                            <tr>

                                <td align="center">
                                    <table class="col-600" width="600" border="0" align="center" cellpadding="0" cellspacing="0">
                                        <tbody>
                                            <tr>
                                                <td align="center" valign="top" bgcolor="#ffffff">
                                                    <table class="col-600" width="595" height="150" border="0" align="center" cellpadding="0" cellspacing="0" style="position:relative;border: 2px solid #ff3838; border-radius:40px;">
                                                        <tbody>
                                                            <tr>
                                                                <td height="20"></td>
                                                            </tr>

                                                            <!-- <tr>
                                                                <td>
                                                                    <p style="font-family:'Rubik', sans-serif; text-align:center; font-size:20px; color:#ff3838; line-height:24px; font-weight: 600; margin:0px;">
                                                                        {{ $campaign['getReward']['title'] }}
                                                                    </p>
                                                                </td>
                                                            </tr> -->

                                                            <tr>
                                                                <td>
                                                                    <p style="font-family:'Rubik', sans-serif; text-align:center;font-size:20px; color:#343434; line-height:24px; font-weight: 600; margin:0px;">
                                                                        Winner: {{ $campaign['winner_name'] }}</p>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <p style="font-family:'Rubik', sans-serif; text-align:center;font-size:20px; color:#343434; line-height:24px; font-weight: 600; margin:0px;">
                                                                        Coupon no: {{ $campaign['winner_coupon_no'] }}</p>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td height="20"></td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </td>
            </tr>

            @endforeach
            <!--Mall Voucher1 end -->

            <!--Active Campaigns1 -->
            <tr>
                <td align="center">

                    <table class="col-600" width="600" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-left:20px; margin-right:20px; background-color: #ffffff; border-left: 1px solid #dbd9d9; border-right: 1px solid #dbd9d9;">
                        <tbody>

                            <tr>
                                <td height="60"></td>
                            </tr>

                        </tbody>
                    </table>
                </td>
            </tr>

            <tr>
                <td align="center">


                    <table class="col-600 fourth" width="600" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-left:20px; margin-right:20px; background-color:#ff3838; border-left: 1px solid #dbd9d9; border-right: 1px solid #dbd9d9;">

                        <tbody>

                            <tr>
                                <td height="60"></td>
                            </tr>


                            <tr>
                                <td align="center" style="font-family: 'Rubik', sans-serif;font-size:40px;padding: 0px 20px; color:#ffffff; line-height:24px; font-weight: 800; font-style: italic;">
                                    DIDN'T WIN?
                                </td>

                            </tr>
                            <tr>
                                <td height="20"></td>
                            </tr>
                            <tr>
                                <td align="center" style="font-family: 'Rubik', sans-serif;font-size:20px;padding: 0px 20px; color:#ffffff; line-height:24px; font-weight: 800; font-style: italic;">
                                    Check some of our other live campaigns
                                </td>

                            </tr>
                            <!-- <tr>
                                <td height="35"></td>
                            </tr> -->






                            <!--Active Campaigns1 end -->

                            @foreach($campaignList as $key => $cmpian)

                            @if($key == 0)
                            <tr>
                                <td align="center" style="line-height: 0px;">
                                    <a target="_blank" href="{{ url('/campaigns/detail') }}/{{ $cmpian['id'] }}"><img src="{{asset('images/'.$cmpian['getReward']['reward_image'])}}" class="img-fluid" style="width: 450px;" alt="empty"></a>
                                </td>
                            </tr>
                            <tr>
                                <td class="”button”" style="text-align: center;">
                                    <ul style="list-style: none; padding:0">
                                        <li style="color:#000000; padding:1px 0px"><a target="_blank" style="text-decoration: none;color: black;" href="{{ url('/campaigns/detail') }}/{{ $cmpian['id'] }}"> Buy A {{ $cmpian['getProducts']['ProductDescription']['products_name'] }} <b>AED {{ $cmpian['getProducts']['products_price'] }}</b></a> </li>
                                        <li style="color:#000000; padding: 0px">Get A Chance To Win</li>

                                        <li style="color:#000000; padding:1px 0px"><b>{!! ($cmpian['getReward']['title']) !!}</b></li>
                                        <li style="color:#000000; padding:1px 0px">Max Draw Date: {{ date('d/m/Y', strtotime($cmpian->end_date)) }}</li>
                                        <li style="color:#000000; padding:1px 0px">Or When The Campaign Is Sold Out. Whichever Is Earlier.
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <td height="35"></td>
                            </tr>

                        </tbody>
                    </table>
                </td>
            </tr>

            @else

            <tr>
                <td align="center">

                    <table class="col-600" width="600" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-left:20px; margin-right:20px; background-color: #f8f8f7; border-left: 1px solid #dbd9d9; border-right: 1px solid #dbd9d9;">
                        <tbody>

                            <tr>
                                <td height="60"></td>
                            </tr>
                            <!-- <tr>
                                <td height="35"></td>
                            </tr> -->
                            <tr>
                                <td align="center" style="line-height: 0px;">
                                    <a target="_blank" href="{{ url('/campaigns/detail') }}/{{ $cmpian['id'] }}"><img src="{{asset('images/'.$cmpian['getReward']['reward_image'])}}" style="width: 450px;" class="img-fluid" alt="empty"></a>
                                </td>
                            </tr>

                            <tr>
                                <td class="”button”" style="text-align: center;">
                                    <ul style="list-style: none; padding:0">


                                        <li style="color:#777777; padding:1px 0px"><a target="_blank" style="text-decoration: none;color: black;" href="{{ url('/campaigns/detail') }}/{{ $cmpian['id'] }}">Buy A {{ $cmpian['getProducts']['ProductDescription']['products_name'] }} <b>AED {{ $cmpian['getProducts']['products_price'] }}</b></a></li>

                                        <li style="color:#777777; padding: 0px">Get A Chance To Win</li>

                                        <li style="color:#000000; padding:1px 0px"><b>{!! ($cmpian['getReward']['title']) !!}</b></li>
                                        <!-- <li style="color:#000000; padding:1px 0px"><b>PRIZE 2: AED 1,000 Mall Voucher (Two Winners)</b></li> -->
                                        <li style="color:#777777; padding:1px 0px">Max Draw Date: {{ date('d/m/Y', strtotime($cmpian->end_date)) }}</li>
                                        <li style="color:#777777; padding:1px 0px">Or When The Campaign Is Sold Out. Whichever Is Earlier.
                                        </li>

                                    </ul>
                                </td>
                            </tr>

                            <tr>
                                <td height="35"></td>
                            </tr>



                        </tbody>
                    </table>
                </td>
            </tr>
            @endif



            @endforeach
            <!--Active Campaigns2 end -->


            <tr>
                <td align="center" style="line-height: 0px;">

                    <table class="col-600" width="600" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-left:20px; margin-right:20px; background-color: #f8f8f7; border-left: 1px solid #dbd9d9; border-right: 1px solid #dbd9d9;">

                        <tbody>

                            <tr>
                                <td align="center" valign="top" bgcolor="#f8f8f7">

                                    <p style="width: 280px; padding: 35px 50px;border-radius:15px; background-color:#ff0; font-weight:bold; font-family: 'Rubik', sans-serif;">
                                        <a href="https://winztime.com/" target="_blank" style="color:#000000; text-decoration:none; font-size: 20px;">Explore more
                                            campaigns</a>
                                    </p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>


            <tr>
                <td align="center">

                    <table class="col-600" width="600" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-left:20px; margin-right:20px; background-color: #f8f8f7; border-left: 1px solid #dbd9d9; border-right: 1px solid #dbd9d9;">

                        <tbody>

                            <tr>
                                <td align="center" valign="top" bgcolor="#f8f8f7">
                                    <table class="col-600 second" width="600" height="150" border="0" align="center" cellpadding="0" cellspacing="0" style="background-color: #000000; border-left: 1px solid #dbd9d9; border-right: 1px solid #dbd9d9; position:relative;">
                                        <tbody>
                                            <tr>
                                                <td height="30"></td>
                                            </tr>
                                            <tr>
                                                <td align="center" style="line-height: 0px;">
                                                    <h2 style="font-family: 'Rubik', sans-serif;font-size: 25px; font-weight: 800; font-style: italic;; color: #ffffff">Our Partners</h2>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td height="50"></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="line-height: 0px;"> <img style="display:block; line-height:0px; border:0px; 
    background: #ffffff;
    border-radius: 10px;
    padding: 12px 35px;
     
    box-shadow: 0px 3px 4px 0px #00000033;" src="https://winztime.com/images/partnerLogo1.jpg" width="200" alt="logo"> </td>
                                            </tr>
                                            <tr>
                                                <td height="30"></td>
                                            </tr>
                                            <tr>
                                                <td align="center" style="line-height: 0px; "> <img style="display:block; line-height:0px; border:0px;
    background: #ffffff;
    border-radius: 10px;
    padding: 12px 35px;
 
    box-shadow: 0px 3px 4px 0px #00000033;" src="https://winztime.com/images/partnerLogo3.jpg" width="200" alt="logo"> </td>
                                            </tr>
                                            <tr>
                                                <td height="30"></td>
                                            </tr>
                                            <tr>
                                                <td align="center" style="line-height: 0px;"> <img style="display:block; line-height:0px; border:0px; 
    background: #ffffff;
    border-radius: 10px;
    padding: 12px 35px;
     
    box-shadow: 0px 3px 4px 0px #00000033" src="https://winztime.com/images/part.png" width="200" alt="logo"> </td>
                                            </tr>

                                            <tr>
                                                <td height="50"></td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </td>
            </tr>


            <tr>

                <td align="center" height="">
                    <table class="col-600" width="600" border="0" align="center" cellpadding="0" cellspacing="0" style="border-left: 1px solid  #dbd9d9;border-right: 1px solid  #dbd9d9;">
                        <tbody>
                            <tr>
                                <td height="30"></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td align="center">
                    <table class="col-600" width="600" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tbody>
                            <tr>
                                <td align="center">
                                    <table class="col-600" width="600" border="0" align="center" cellpadding="0" cellspacing="0">
                                        <tbody>
                                            <tr>
                                                <td align="center" valign="top" bgcolor="#000">
                                                    <table class="col-600" width="600" height="150" border="0" align="center" cellpadding="0" cellspacing="0">
                                                        <tbody>
                                                            <!-- <tr>
																<td height="10"></td>
															</tr> -->
                                                            <tr>
                                                                <td align="center" style="line-height: 0px;"><a href="https://winztime.com/"> <img style="display:block; line-height:0px; font-size:0px; border:0px;" src="https://winztime.com/images/footLogo.png" width="300" alt="logo"></a> </td>
                                                            </tr>

                                                        </tbody>
                                                    </table>

                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>



            <tr>

                <td align="center" height=>
                    <table class="col-600" width="600" border="0" align="center" cellpadding="0" cellspacing="0" style="border-left: 1px solid  #dbd9d9;border-right: 1px solid  #dbd9d9;background-color:#f8f8f7">
                        <tbody>
                            <tr>
                                <td height="30"></td>
                            </tr>
                            <tr>
                                <td align="center" bgcolor="#ffffff" height="185" style="background-color:#f8f8f7;border-bottom: 1px solid #dbd9d9;">

                                    <table align="center" width="50%" border="0" cellspacing="0" cellpadding="0" style="background-color:#f8f8f7">
                                        <tbody>
                                            <tr>
                                                <td align="center" width="20%" style="vertical-align: top;">
                                                    <a href="https://instagram.com/winztimeuae" target="_blank"> <img src="https://winztime.com/images/admin_logo/instagram-icon.png"> </a>
                                                </td>
                                                <td align="center" class="margin" width="20%" style="vertical-align: top;">
                                                    <a href="https://www.facebook.com/Winztime-110445164590731" target="_blank"> <img src="https://winztime.com/images/admin_logo/facebook-icon.png"> </a>
                                                </td>
                                                <td align="center" class="margin" width="20%" style="vertical-align: top;">
                                                    <a href="https://youtube.com/channel/UCF_-XYC6abqSxypR4RW1gEg" target="_blank"> <img src="https://winztime.com/images/admin_logo/youtube-icon.png"> </a>
                                                </td>
                                                <td align="center" width="20%">
                                                    <a href="https://wa.me/+971552801120" target="_blank"> <img src="https://winztime.com/images/whatsapp.png"> </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table align="center" border="0" cellspacing="0" cellpadding="0" style="background-color:#f8f8f7">
                                        <tbody>
                                            <!-- <tr>
																<td height="10"></td>
															</tr>
															<tr>
																<td align="center" style="font-family: 'Rubik', sans-serif; font-size:14px; color:#757575; line-height:24px; font-weight: 300; padding:0px 20px;"> Winztime UAE has active campaigns which give you an opportunity to enter the raffle draw in UAE. This draw comes with luxury gifts and prizes. It only takes a few minutes to participate in our raffle draw, all you have to do is purchase any item from the campaign then get amazing prizes. </td>
															</tr> -->
                                            <tr>
                                                <td height="10"></td>
                                            </tr>
                                            <tr>
                                                <td align="center" style="font-family: 'Rubik', sans-serif; font-size:16px; color:#343434; line-height:24px; font-weight: 300;"> Winztime. © {{ date('Y') }}. All rights reserved. </td>
                                            </tr>
                                            <tr>
                                                <td height="10"></td>
                                            </tr>
                                            <tr>
                                                <td align="center" style="font-family: 'Rubik', sans-serif; font-size:16px; color:#343434; line-height:24px; font-weight: 300;"> <a href="#" style="color: #343434">Terms and Conditions</a> </td>
                                            </tr>
                                            <tr>
                                                <td height="20"></td>
                                            </tr>
                                            <!-- <tr>
																<td align="center" style="font-family: 'Rubik', sans-serif; font-size:20px; line-height:24px; font-weight: 300; color: #757575;">You deserve <img style="width:15px" src="https://ci5.googleusercontent.com/proxy/96kVqM39RYGYeZUxWfg5yVv1OiSdKpaUYfwuYpNA8SvmGinKbjoe1w8NXcttDwXLBHA5QGhdkIeKnzumikkUmWOQWZQSLQfSS8Sl8SMwel--1GK7chxGjIef32nNo0lGUUNyiu64zD1DU9ZgUapNQ_A3CftX2ZjXzI34XAAeX9Iz9zEs=s0-d-e1-ft#https://www.idealz.com/on/demandware.static/Sites-Idealz-ae-Site/-/default/dw7e9f334c/images/order/love_heart.png"> ! </td>
															</tr> -->
                                            <tr>
                                                <td height="30"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>




                        </tbody>
                    </table>
                </td>
            </tr>



        </tbody>
    </table>
</body>

</html>