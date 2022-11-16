@extends('web.layout')
@section('content')
<!-- wishlist Content -->
<script src="web/assets/js/jquery.payform.min.js" charset="utf-8"></script>
<section class="lpoint-content my-4 main-section">
	<div class="">
		<div class="row">
			<div class="col-12 col-md-8 ">
				<div class="heading">
					<h2>Payment Options</h2>
					<hr>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12 col-md-8 ">
				<div>
					<div class="contFormWrp" @if(count($errors) > 0 || session()->has('success_card')) style="display: none;" @else style="display: none;" @endif >
						<!-- small>You can add more cards to your payment options at checkout.</small> -->
						<form novalidate name="updateMyProfile" class="align-items-center form-validate" enctype="multipart/form-data" action="{{ URL::to('addCardOption')}}" method="post">
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

							@if(session()->has('success_card') )
							<div class="alert alert-success alert-dismissible" id="success-alert" role="alert">
								{{ session()->get('success_card') }}
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							@endif

							<div class="addCardOption">
						<!-- 	<div class="form-group" id="card-number-field">
                        <label for="cardNumber">Card numberber</label>
                        <input type="text" class="form-control" id="cardNumber">
                    </div>
                   
                    <div class="form-group" id="credit_cards">
                        <img src="images/visa.jpg" id="visa" class="hide">
                        <img src="images/mastercard.jpg" id="mastercard"class="hide">
                        <img src="images/amex.jpg" id="amex"class="hide">
                    </div>	 -->
                    <div class="form-group">
                    	<div class="row">
                    		<div class="col-sm-12 text-right"><a href="javascript:;" class="addCardbtn backBtn"> <!-- « Back --> <i class="fas fa-arrow-left"></i></a></div>
                    		<div class="col-sm-12" id="card-number-field">
                    			<label for="cardnumber" class="col-form-label">Card Number</label>
                    			<div class="cardImgWrp2">
                    				<input type="text"  name="cardnumber" class="form-control field-validate" autocomplete="off" id="cardNumber">
                    				<div id="credit_cards">
                    					<!-- <img src="images/visa.jpg" id="visa" class="hide"> -->
                    					<p class="hide" id="visa"><i class="fab fa-cc-visa"  ></i></p>
                    					<p class="hide" id="mastercard"><i class="fab fa-cc-mastercard"  ></i></p>
                    					<p class="hide" id="amex"><i class="fab fa-cc-amex"  ></i></p>
                    					<!-- <img src="images/visa.jpg"  class="hide">
                    					<img src="images/mastercard.jpg" id="mastercard"class="hide">
                    					<img src="images/amex.jpg" id="amex"class="hide"> -->
                    				</div>
                    			</div>
                    		</div>
                    	</div>
                    </div>
                    <div class="form-group">
                    	<div class="row">
                    		<div class="col-sm-6">
                    			<label for="cardholder" class="col-form-label">Name on Card</label>
                    			<input type="text" name="cardholder" class="form-control field-validate" onkeypress="return /^[ A-Za-z-_@./]*$/
.test(event.key)" autocomplete="off" id="cardholder" placeholder="Name on Card">
                    		</div>
                    		<div class="col-sm-6">
									<label for="firstName" class="col-form-label">Expiry Date</label><sub class="expMM">MM/YY</sub><!-- 
									<input type="tel" required name="expirydate" class="" id="security_code" placeholder="MM/YY"> -->
									<input id="cc" type="text" name="expirydate" autocomplete="off" placeholder="MM/YY" class="masked form-control field-validate" pattern="(1[0-2]|0[1-9])\/(1[5-9]|2\d)" data-valid-example="05/18"/>
								</div>
                    	</div>
                    </div>
                    <!-- <div class="form-group">
                    	<div class="row">
                    		<div class="col-sm-6">
									<label for="firstName" class="col-form-label">Expiry Date</label><sub class="expMM">MM/YY</sub> --><!-- 
									<input type="tel" required name="expirydate" class="" id="security_code" placeholder="MM/YY"> -->
									<!-- <input id="cc" type="text" name="expirydate" placeholder="MM/YY" class="masked form-control" pattern="(1[0-2]|0[1-9])\/(1[5-9]|2\d)" data-valid-example="05/18"/>
								</div>
								<div class="col-sm-6">
									<label for="security_code" class="col-form-label">Security Code</label>
									<input type="tel" required name="securitycode" placeholder="Security Code" class="form-control field-validate" id="security_code">
								</div> 
							</div>
						</div>   -->
						<div class="row">  

							<!-- <div class="col-sm-offset-8 col-sm-2"><button type="submit" class="btn luciBtn saveCrdBtn">Save</button></div> -->
							<!-- <div class="col-sm-6"></div> -->
							<div class="col-sm-offset-6 col-sm-6 text-right"><button type="submit"  class="btn luciBtn">Save</button></div>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class='cardWrap' @if(count($errors) > 0 || session()->has('success_card')) style="display: block;" @endif>
			<table>
				<thead>
					<tr>
						<th>Name on Card</th>
						<th>Card Number</th>
						<th>Expiry Date</th>
						<!-- <th>Created At</th> -->
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($result['card'] as $card)
					<tr>
						<td>{{$card->cardholder}}</td>
						<td>{{$card->cardnumber}}</td>
						<td>{{$card->expirydate}}</td>
						<!-- <td>{{$card->created_at}}</td> -->
						<td>
							<ul class="cartDelBtn">
								<li><a href='{{ URL::to("/deletecard")}}/{{$card->id}}' ><i class="fas fa-trash-alt"></i></a></li>
							</ul>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			<button class="bluebtn btn addCardbtn" type="button">+ <i class="fas fa-credit-card"></i>Add a credit or debit card</button>
		</div>
	</div>
	<div class="col-md-4">
		<div class="lPoint-sidebar">
			<ul>
				<li class="first"><a href="profile" title="">Personal Details</a></li>
				<li><a href="levels" title="">Levels</a></li>
				<li><a href="wishlist" title="">Wish List</a></li>
				<li><a href="active-coupons" title="">Active Coupons</a></li>
				<li><a href="my-lpoints" title="">L-Points</a></li>
				<li><a href="payment-options" title="">Payment Options</a></li>
				<li><a href="address-book" title="">Address Book</a></li>
				<li><a href="refer-a-friend" title="">Invite A Friend To Earn</a></li>
				<li><a href="change-password" title="">Change Password</a></li>
				<li class="last"><a href="logout" title="">Logout</a></li>
			</ul>
		</div>
	</div>
</div>
</div>
</section>
<script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/masking-input.js" data-autoinit="true"></script>
<script type="text/javascript">
	$(function() {

		var owner = $('#owner');
		var cardNumber = $('#cardNumber');
		var cardNumberField = $('#card-number-field');
		var mastercard = $("#mastercard");
		var confirmButton = $('#confirm-purchase');
		var visa = $("#visa");
		var amex = $("#amex");


		cardNumber.payform('formatCardNumber');


		cardNumber.keyup(function() {

			amex.removeClass('show');
			visa.removeClass('show');
			mastercard.removeClass('show');

			if ($.payform.validateCardNumber(cardNumber.val()) == false) {
				cardNumberField.addClass('has-error');
			} else {
				cardNumberField.removeClass('has-error');
				cardNumberField.addClass('has-success');
			}

			if ($.payform.parseCardType(cardNumber.val()) == 'visa') {
				visa.addClass('show')
			} else if ($.payform.parseCardType(cardNumber.val()) == 'amex') {
				amex.addClass('show');
			} else if ($.payform.parseCardType(cardNumber.val()) == 'mastercard') {
				mastercard.addClass('show');
			}
		});

		confirmButton.click(function(e) {

			e.preventDefault();

			var isCardValid = $.payform.validateCardNumber(cardNumber.val());
			if (!isCardValid) {
				cardNumberField.addClass('has-error');
			} 
			else {
					
			}
		});
	});

	
</script>
@endsection
