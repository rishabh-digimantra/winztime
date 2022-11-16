<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Email Template</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600;700&display=swap" rel="stylesheet">
	<style>
table.example { background-image: url('https://winztime.com/images/back_mail.png');
	background-repeat: no-repeat;}
table.second { background-image: url("{{asset('web/assets/images/cart_template/back1.jpg')}}");
	background-repeat: no-repeat;}
	table.third { background-image: url("{{asset('web/assets/images/cart_template/back2.jpg')}}");
	background-repeat: no-repeat;}

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
															<td align="center" style="line-height: 0px;"> <a href="https://winztime.com/"><img style="display:block; line-height:0px; font-size:0px; border:0px;" src="https://winztime.com/images/footLogo.png" width="300" alt="logo"> </a></td>
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
								<td height="50"></td>
							</tr>
							
								<tr>
								<td align="center" style="font-family: 'Rubik', sans-serif;font-size:25px;padding: 0px 20px; color:#000000; line-height:24px; font-weight: 800; font-style: italic;">
									We noticed something is left in your cart
								</td>
							</tr>
								<tr>
								<td>
								<P style="font-family:'Rubik', sans-serif; text-align:center; 
								font-size:16px; color:#000000; line-height:24px; font-weight: 400;font-style: italic;">
								Would you like to complete your purchase?</P>
								 </td>
							</tr>
							
						
							
<tr>
	<td height="35"></td>
</tr>

<?php

							foreach ($cusData as $cus_key => $cus_value) {
								$img_id=$cus_value->products_image->image;
								$products_img=DB::table('image_categories')
								->select('path')
								->where('image_id', '=', $img_id)
								->first();


								$explode_date = explode(" ",$cus_value->camping_data->end_date ?? '');

								?>
<tr>
								<td align="center" style="line-height: 0px;">
												<a href="{{url('/')}}/viewcart">	<img src="{{asset($products_img->path)}}" class="img-fluid"></a>
								</td>
							</tr>
								
							<tr>
								<td class=”button” style="text-align: center;">
                    <ul style="list-style: none; padding:0">
                    	<li style="color:#777777; padding:1px 0px"> Buy A <b><a  style="color:#000000; padding:1px 0px;text-decoration: none;" href="{{url('/')}}/viewcart">{{$cus_value->products_description->products_name}}</a></b></li>
                      <li style="color:#777777; padding: 0px">Get A Chance To Win</li>
                      
                      <li style="color:#000000; padding:1px 0px"><b>{{strip_tags($cus_value->camping_data->title ?? '')}}</b></li>
                                @if(isset($cus_value->camping_data->show_date))
                                @if($cus_value->camping_data->show_date == 1)

                      <li style="color:#777777; padding:1px 0px">Max Draw Date: {{$explode_date[0] ?? ''}}</li>
                      <li style="color:#777777; padding:1px 0px">Or When The Campaign Is Sold Out. Whichever Is Earlier. 
                      	@endif
                      		@endif
										</li>
                    </ul>
                  </td>
                </tr>
                <?php
							}

							?>
                <tr>
	<td height="35"></td>
</tr>
</tbody>
</table>
</td>
</tr>

			<!-- winner start -->
					<tr>
				<td align="center ">
					<table  style="position:relative;"class="col-600 " width="600" border="0" align="center" cellpadding="0" cellspacing="0">
						<tbody>
							<tr>
								<td align="center">
									<table class="col-600" width="600" border="0" align="center" cellpadding="0" cellspacing="0">
										<tbody>
											<tr>
												<td align="center" valign="top" bgcolor="#f8f8f7">
													<table class="col-600 third" width="600" height="150" border="0" align="center" cellpadding="0" cellspacing="0" style=" border-left: 1px solid #dbd9d9; border-right: 1px solid #dbd9d9; position:relative;">
														<tbody>
															 <tr>
								<td height="100"></td>
							</tr>
											
												
							<tr>
								<td align="center" style="font-family: 'Rubik', sans-serif;font-size:25px;padding: 0px 20px; color:#000000; line-height:24px;  font-weight: 800; font-style: italic;">
									Our recent winners
								 </td>
							</tr>
														 <tr>
																<td height="50"></td>
															</tr>
															
															
														
<tr style="float: left; width: 50%;">
<td align="center"style="line-height: 0px;margin: 0 auto;display: block;"> <img style="display:block; line-height:0px; border:0px;background: #ffffff;
border-radius: 10px;padding: 12Śpx 35px; box-shadow: 0px 3px 4px 0px #00000033" src="{{asset('web/assets/images/cart_template/image1.jpg')}}" width="200" alt="logo"> </td>
</tr>

<tr style="float: right;width: 50%;">
<td align="center" style="line-height: 0px;margin: 0 auto;display: block;"> <img style="display:block; line-height:0px; border:0px; background: #ffffff;border-radius: 10px;padding: 12Śpx 35px;box-shadow: 0px 3px 4px 0px #00000033" src="{{asset('web/assets/images/cart_template/image2.jpg')}}" width="200" alt="logo"> </td>
</tr>

 <tr><td height="50"></td></tr> 

<tr style="float: left; width: 50%;">
<td align="center"style="line-height: 0px;margin: 0 auto;display: block;"> <img style="display:block; line-height:0px; border:0px;background: #ffffff;
border-radius: 10px;padding: 12Śpx 35px; box-shadow: 0px 3px 4px 0px #00000033" src="{{asset('web/assets/images/cart_template/image3.jpg')}}" width="200" alt="logo"> </td>
</tr>

<tr style="float: right;width: 50%;">
<td align="center" style="line-height: 0px;margin: 0 auto;display: block;"> <img style="display:block; line-height:0px; border:0px; background: #ffffff;border-radius: 10px;padding: 12Śpx 35px;box-shadow: 0px 3px 4px 0px #00000033" src="{{asset('web/assets/images/cart_template/image4.jpg')}}" width="200" alt="logo"> </td>
</tr>

<tr>
	<td height="100"></td>
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
						</tbody>
					</table>
				</td>
			</tr>
			<!-- winner end -->
			<tr>
				<td align="center">

					<table class="col-600" width="600" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-left:20px; margin-right:20px; background-color: #f8f8f7; border-left: 1px solid #dbd9d9; border-right: 1px solid #dbd9d9;">

						<tbody>

							<tr>
								<td height="60"></td>
							</tr>
											
												
							<tr>
								<td align="center" style="font-family: 'Rubik', sans-serif;font-size:25px;padding: 0px 20px; color:#000000; line-height:24px; font-weight: 800; font-style: italic;">
								Have a Question? Here is how it works.
								 </td>
							
							</tr>
							
								
							<tr>
								<td align="center" style="line-height: 0px;">
												<a href="https://winztime.com/">	<img src="{{asset('web/assets/images/cart_template/design3.jpg')}}" class="img-fluid" style="width:400px;"></a>
								</td>
							</tr>
							<tr>
								<td height="60"></td>
							</tr>											
							
						</tbody>
					</table>
				</td>
			</tr>
		
			<!--image end -->
			<!-- START WHAT WE DO -->
			<tr>
				<td align="center">
					<table class="col-600" width="600" border="0" align="center" cellpadding="0" cellspacing="0" style="background-color: #f8f8f7; margin-left:20px; margin-right:20px;">
						<tbody>
							<tr>
								<td align="center"> </td>
							</tr>
							
			<!-- OUR PARTERNER -->
			<tr>
				<td align="center ">
					<table  style="position:relative;"class="col-600 " width="600" border="0" align="center" cellpadding="0" cellspacing="0">
						<tbody>
							<tr>
								<td align="center">
									<table class="col-600" width="600" border="0" align="center" cellpadding="0" cellspacing="0">
										<tbody>
											<tr>
												<td align="center" valign="top" bgcolor="#f8f8f7">
													<table class="col-600 second"  width="600" height="150" border="0" align="center" cellpadding="0" cellspacing="0" style="background-color: #000000; border-left: 1px solid #dbd9d9; border-right: 1px solid #dbd9d9; position:relative;">
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
     
    box-shadow: 0px 3px 4px 0px #00000033" src="{{asset('web/assets/images/cart_template/part.png')}}" width="200" alt="logo"> </td>
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
						</tbody>
					</table>
				</td>
			</tr>
			<!-- OUT PARTERNER END -->
			<!-- blank table -->
			  <tr>
				<td align="center">
					<table style: border-left: 1px solid #dbd9d9; border-right: 1px solid #dbd9d9;class="col-600" width="600" border="0" align="center" cellpadding="0" cellspacing="0">
						<tbody>
							<tr>
								<td align="center">
									<table class="col-600" width="600" border="0" align="center" cellpadding="0" cellspacing="0">
										<tbody>
											<tr>
												<td align="center" valign="top" bgcolor="#f8f8f7">
													<table class="col-600" width="600" height="50" border="0" align="center" cellpadding="0" cellspacing="0" style="position:relative; background-color:#ffffff; color: #ffffff; border-left: 1px solid #dbd9d9; border-right: 1px solid #dbd9d9;">
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
			  <!-- blank table end -->
			<!-- footer logo -->
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
																	<table class="col-600" width="600" height="100" border="0" align="center" cellpadding="0" cellspacing="0">
																		<tbody>
																			<tr>
																				<td height="40"></td>
																			</tr>
																			<tr>
																<td align="center" style="line-height: 0px;"> <a href="https://winztime.com/"><img style="display:block; line-height:0px; font-size:0px; border:0px;" src="https://winztime.com/images/footLogo.png" width="300" alt="logo"> </a></td>
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
										</tbody>
									</table>
								</td>
							</tr>
			<!-- end footer logo -->
			<!-- start footer -->
							<tr>
								<td align="center">
									<table align="center" width="100%" border="0" cellspacing="0" cellpadding="0" style=" border-left: 1px solid #dbd9d9; background-color:#f8f8f7; border-right: 1px solid #dbd9d9;">
										<tbody>
											<tr>
												<td height="50"></td>
											</tr>
											<tr>
												<td align="center" bgcolor="#ffffff" height="185" style="background-color:#f8f8f7;border-bottom: 1px solid #dbd9d9;">
													<table class="col-600" width="600" border="0" align="center" cellpadding="0" cellspacing="0" style="background-color:#f8f8f7">
														<tbody>
															<tr> </tr>
														</tbody>
													</table>
												<table align="center" width="50%" border="0" cellspacing="0" cellpadding="0" style="background-color:#f8f8f7">
							<tbody >
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
				</td>
			</tr>
			<!-- END FOOTER -->
		</tbody>
	</table>
</body>

</html>