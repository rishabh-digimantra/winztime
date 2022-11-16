@extends('web.layout')

@section('content')

<!-- wishlist Content -->

<section class="lpoint-content main-section">

	<div class="container">

		<div class="heading">

			<h2>Z-Points</h2>

		</div>

		<div class="row">

			<div class="col-lg-8">

				<div class="lpoint-wrapper">

				<!-- <figure> -->

					<!-- <img src="{{asset('web/assets/images/ipointIconImg.png')}}" alt="*"> -->

					<!-- <p>Available L-Points (worth AED 0) </p>

				</figure>

				<h6>worth AED 0</h6> -->

					<ul>

						<li><p>Earned through purchases</p><h5>{{number_format($result['lpointsorder_count'])}}</h5></li>

						<li><p>Earned through referrals</p><h5>{{$result['lpointsreffrel_count']}}</h5></li>

						<li class="totErn"><p>Total earned</p><h5><?php $total=$result['lpointsorder_count'] + $result['lpointsreffrel_count']; echo number_format($total) ?></h5></li>

						<li class="totSpnt"><p>Total spent</p><h5>

							{{$result['spentlpoints']}}</h5></li>

						<li><p>Available Z-Points</p><h5>{{auth()->guard('customer')->user()->redeem_points}}</h5></li>

						<li><p><strong>Available {{auth()->guard('customer')->user()->redeem_points}} Z-Points</strong></p><h5><strong>worth AED {{auth()->guard('customer')->user()->redeem_points/$result['commonContent']['setting'][128]->value}}</strong></h5></li>

					</ul>

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

						<!-- <li><a href="payment-options" title="">Payment Options</a></li> -->

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

@endsection

