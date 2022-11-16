<!-- <div style="width: 100%; display:block;">
<h2>{{ trans('labels.WelcomeEamailTitle') }}</h2>
<p>
	<strong>{{ trans('labels.Hi') }} {{ $userData[0]->first_name }} {{ $userData[0]->last_name }}!</strong><br>
	{{ trans('labels.accountCreatedText') }}<br><br>
	<strong>{{ trans('labels.Sincerely') }},</strong><br>
	{{ trans('labels.regardsForThanks') }}
</p>
</div> -->

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>{{ trans('labels.WelcomeEamailTitle') }}</title>
	<style>
	table.example { background-image: url('https://winztime.com/images/back_mail.png');
	background-repeat: no-repeat;}

	table.second { background-image: url('https://winztime.com/images/back3.png');
	background-repeat: no-repeat;}

	table.third { background-image: url('https://winztime.com/images/back4.png');
	background-repeat: no-repeat;}
/* 	.bounce {
		bottom: 30px;
		left: 50%;
		width: 60px;
		height: 60px;
		margin-left: -30px;
		animation: bounce 2s infinite;
		-webkit-animation: bounce 2s infinite;
		-moz-animation: bounce 2s infinite;
		-o-animation: bounce 2s infinite;
	}
	
	@-webkit-keyframes bounce {
		0%,
		20%,
		50%,
		80%,
		100% {
			-webkit-transform: translateY(0);
		}
		40% {
			-webkit-transform: translateY(-30px);
		}
		60% {
			-webkit-transform: translateY(-15px);
		}
	}
	
	@-moz-keyframes bounce {
		0%,
		20%,
		50%,
		80%,
		100% {
			-moz-transform: translateY(0);
		}
		40% {
			-moz-transform: translateY(-30px);
		}
		60% {
			-moz-transform: translateY(-15px);
		}
	}
	
	@-o-keyframes bounce {
		0%,
		20%,
		50%,
		80%,
		100% {
			-o-transform: translateY(0);
		}
		40% {
			-o-transform: translateY(-30px);
		}
		60% {
			-o-transform: translateY(-15px);
		}
	}
	
	@keyframes bounce {
		0%,
		20%,
		50%,
		80%,
		100% {
			transform: translateY(0);
		}
		40% {
			transform: translateY(-30px);
		}
		60% {
			transform: translateY(-15px);
		}
		} */
	</style>
</head>

<body style="font-family: 'Poppins', sans-serif;">
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
								<td align="center" style="font-family: 'Poppins', sans-serif; font-size:35px; font-weight: bold; color:#2a3a4b;">Welcome to Winztime</td>
							</tr>
							<tr>
								<td height="30"></td>
							</tr>
							<!-- <tr>
								<td class="customposition"><img  src="https://winztime.com/web/assets/images/bannerBfr.webp"></td>
							</tr> -->
							<tr>
								<td align="center" style="font-family: 'Poppins', sans-seri; font-size:30px; color:#343434;">Hello <b style="font-size:30px;">{{ $userData[0]->first_name }} {{ $userData[0]->last_name }},</b></td>
							</tr>
							<tr>
								<td height="10"></td>
							</tr>
							<tr>
								<td align="center" style="font-family: 'Poppins', sans-serif; font-size:16px;padding: 0px 20px; color:#000000; line-height:24px; font-weight: 300;">
									Thank you for registering with Winztime. We welcome you to our world of opportunities where you will have chance to win Luxury Prizes with every purchase. 
								</td>
							</tr>
							<!-- <tr>
																<td> <img src="https://winztime.com/web/assets/images/bannerAftr.webp" style="position: absolute;
    top: 45px;
    right: 0;
    width: 120px;
    height: 240px;
    z-index: 1;"></td>
</tr> -->
<tr>
	<td height="35"></td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
	<td align="center">
		<table style: border-left: 1px solid #dbd9d9; border-right: 1px solid #dbd9d9;class="col-600" width="600" border="0" align="center" cellpadding="0" cellspacing="0">
			<tbody>
				<tr>
					<td align="center">
						<table class="col-600 " width="600" border="0" align="center" cellpadding="0" cellspacing="0">
							<tbody>
								<tr>
									<td align="center" valign="top" bgcolor="#f8f8f7">
										<table class="col-600" width="600"  border="0" align="center" cellpadding="0" cellspacing="0" style="position:relative; background-color:#f8f8f7; color: #ffffff; border-left: 1px solid #dbd9d9; border-right: 1px solid #dbd9d9;">
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
<!-- main -->
<tr>
	<td align="center">

		<table class="col-600" width="600" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-left:20px; margin-right:20px; background-color: #f8f8f7; border-left: 1px solid #dbd9d9; border-right: 1px solid #dbd9d9;">

			<tbody>

				<tr>
					<td align="center" style="line-height: 0px;">
						 <a href="https://winztime.com/"><img src="https://winztime.com/images/design3.jpg" class="img-fluid" style="width:500px;box-shadow: 1px 1px 13px 0px #e4e0e0; "></a></td>
					</tr>




				</tbody>
			</table>
		</td>
	</tr>

	<!-- main end -->
	<!-- START WHAT WE DO -->
	<tr>
		<td align="center">
			<table class="col-600" width="600" border="0" align="center" cellpadding="0" cellspacing="0" style="background-color: #f8f8f7; margin-left:20px; margin-right:20px;">
				<tbody>
					<tr>
						<td align="center"> </td>
					</tr>

					<!-- START About -->
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
															<table class="col-600 second" width="600" height="150" border="0" align="center" cellpadding="0" cellspacing="0" style="position:relative; background-color:#f8f8f; color: #ffffff;
															border-left: 1px solid #dbd9d9;
															border-right: 1px solid #dbd9d9;">
															<tbody>
															 <!-- <tr>
																<td> <img src="https://winztime.com/web/assets/images/bfr.webp" style="position: absolute; top: 0px; left: 0; width: 154px; height:400px;    z-index: 999;"></td>
															</tr> --> 
															<tr>
																<td height="30"> <img src=""></td>
															</tr> 
															<tr>
																<td align="center" style="line-height: 0px;">
																	<h2 style="font-family: 'Poppins', sans-serif;font-size: 32px;font-weight: bold; color: #343434">About Winztime</h2>
																</td>
															</tr>

															<tr>
																<td><p style="font-family: 'Poppins', sans-serif;font-size: 16px; padding: 0px 20px;color: #000000; font-weight: bold; line-height: 24px; font-weight: 300;"> We are a sports and gym accessories E-commerce store with a twist. The twist is to kick off with an incredible giveaway, astonishing surprises, and exclusive deals that are available 24/7. The best part of these giveaways and deals is to benefit the consumer and people who are less fortunate globally.</p>	</td>
															</tr>
															
															<tr>
																<td><p style="font-family: 'Poppins', sans-serif;font-size: 16px; padding: 0px 20px;color: #000000; font-weight: bold; line-height: 24px; font-weight: 300;">Shop with Winztime, donate our products to charity or refer a friend and increase your chances of winning with us.</p></td>
															</tr> 
															<tr>
																<td><p style="font-family: 'Poppins', sans-serif;font-size: 21px; padding: 0px 20px;color: #343434;line-height: 24px; font-weight: 300;text-align:center"><b>"The home of a perfect win." </p></td>
																</tr> 
																<tr>
																	<td height="40"></td>
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
				<!-- about end -->
				<!-- blank table -->

				<!-- blank table end -->
				<!-- OUR PARTERNER -->
				<tr>
					<td align="center ">
						<table  style="position:relative;"class="col-600" width="600" border="0" align="center" cellpadding="0" cellspacing="0">
							<tbody>
								<tr>
									<td align="center">
										<table class="col-600" width="600" border="0" align="center" cellpadding="0" cellspacing="0">
											<tbody>
												<tr>
													<td align="center" valign="top" bgcolor="#f8f8f7">
														<table class="col-600 third" width="600" height="150" border="0" align="center" cellpadding="0" cellspacing="0" style="background-color: #000000; border-left: 1px solid #dbd9d9; border-right: 1px solid #dbd9d9; position:relative;">
															<tbody>
																<tr>
																	<td height="30"></td>
																</tr> 
																<tr>
																	<td align="center" style="line-height: 0px;">
																		<h2 style="font-family: 'Poppins', sans-serif;font-size: 35px;font-weight: bold; color: #ffffff">Our Partners</h2>
																	</td>
																</tr>
																<tr>
																	<td height="50"></td>
																</tr>
															 <!-- <tr>
																<td><img src="https://winztime.com/images/circle2_mail.png"  style="position: absolute; top: 1px; right: 0; width: 90px; height:auto;    z-index: 999;"></td>
															</tr> -->
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
															<!-- <tr>
																<td><img src="https://winztime.com/images/circle_mail.png"  style="position: absolute; bottom: 1px; left: 0; width: 90px; height:auto;    z-index: 999;"></td>
															</tr> -->
															<tr>
																<td height="50"></td>
															</tr> 
															<!-- <tr>
								<td><img style="z-index: 1;
    position: absolute;
    top: 132px;
    right: 0;
    height: 330px;
    width: 116px;
   z-index: 999;

    " src="images/bfr.png"></td>
</tr>   -->
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
													<td height="20"></td>
												</tr>
												<tr>
													<td align="center" style="line-height: 0px;"><a href="https://winztime.com/"> <img style="display:block; line-height:0px; font-size:0px; border:0px;" src="https://winztime.com/images/footLogo.png" width="300" alt="logo"></a> </td>
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
<!-- end footer logo -->
<!-- start footer -->
<tr>
	<td align="center">
		<table align="center" width="100%" border="0" cellspacing="0" cellpadding="0" style=" border-left: 1px solid #dbd9d9; background-color:#f8f8f7; border-right: 1px solid #dbd9d9;">
			<tbody>
				
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
																<td align="center" style="font-family: 'Lato', sans-serif; font-size:14px; color:#757575; line-height:24px; font-weight: 300; padding:0px 20px;"> Winztime UAE has active campaigns which give you an opportunity to enter the raffle draw in UAE. This draw comes with luxury gifts and prizes. It only takes a few minutes to participate in our raffle draw, all you have to do is purchase any item from the campaign then get amazing prizes. </td>
															</tr> -->
															<tr>
																<td height="10"></td>
															</tr>
															<tr>
																<td align="center" style="font-family: 'Lato', sans-serif; font-size:16px; color:#343434; line-height:24px; font-weight: 300;"> Winztime. © {{ date('Y') }}. All rights reserved. </td>
															</tr>
															<tr>
																<td height="5"></td>
															</tr>
															<tr>
																<td align="center" style="font-family: 'Lato', sans-serif; font-size:16px; color:#343434; line-height:24px; font-weight: 300;"> <a href="https://winztime.com/page?name=Term-Services" style="color: #343434">Terms and Conditions</a> </td>
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