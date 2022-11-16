@extends('web.layout')
@section('content')
<!-- wishlist Content -->
<section class="lpoint-content my-4 main-section">
	<div class="container">
		<div class="heading">
			<h2>Current Level</h2>
		</div>
		<div class="row">
			<div class="col-md-8">
				<div class="level-wrapper">
					<div class="nextLevel">
						<div class="levelBtmWrp">
							<div class="row">
								<div class="col-md-3">
									<figure>
										<img src="{{asset('web/assets/images/silverImg.png')}}" alt="*">
									</figure>
								</div>
								<div class="col-md-9">
									<p style="float: right;"><strong>Available L-Points: {{auth()->guard('customer')->user()->redeem_points}}</strong></p>
									<figcaption>
										<h3>{{$result['current'][0]->name}}</h3>
										<p>You now earn @if($result['current'][0]->id == 1) {{$result['commonContent']['setting'][130]->value}} @elseif($result['current'][0]->id == 2) {{$result['commonContent']['setting'][131]->value}} @else {{$result['commonContent']['setting'][132]->value}} @endif L-Points on every AED100 spent for a 12 month trailing period</p>

										@if(auth()->guard('customer')->user()->redeem_points < 1999)
											<div class="progress-container"><div class="progress-bar" role="progressbar" aria-valuenow="{{auth()->guard('customer')->user()->redeem_points}}" aria-valuemin="{{$result['current'][0]->start_count}}" aria-valuemax="{{$result['current'][0]->end_count}}" style="width:{{round((auth()->guard('customer')->user()->redeem_points / $result['current'][0]->end_count) * 100)}}%" ></div></div>
										@elseif (auth()->guard('customer')->user()->redeem_points > 1999 && auth()->guard('customer')->user()->redeem_points < 3999) 
											<?php 
												$subractedcount = $result['current'][0]->end_count - $result['current'][0]->start_count;
												$totalredeem =  auth()->guard('customer')->user()->redeem_points - $subractedcount;
											 ?>
											<div class="progress-container"><div class="progress-bar" role="progressbar" aria-valuenow="{{auth()->guard('customer')->user()->redeem_points}}" aria-valuemin="{{$result['current'][0]->start_count}}" aria-valuemax="{{$result['current'][0]->end_count}}" style="width:{{round(($totalredeem / $subractedcount) * 100)}}%" ></div></div>
											
										@else
											<?php 
												$subractedcount = $result['current'][0]->end_count - $result['current'][0]->start_count;
												$totalredeem =  auth()->guard('customer')->user()->redeem_points - $subractedcount;
											 ?>
											<div class="progress-container"><div class="progress-bar" role="progressbar" aria-valuenow="{{auth()->guard('customer')->user()->redeem_points}}" aria-valuemin="{{$result['current'][0]->start_count}}" aria-valuemax="{{$result['current'][0]->end_count}}" style="width:{{round(($totalredeem / $subractedcount) * 100)}}%" ></div></div>
										@endif
										
									</figcaption>
								</div>
							</div>
						</div>
					</div>
				
					<div class="nextLevel">
						@if(isset($result['rest'][0]->id)) <h2>Next Levels</h2> @endif						
						@foreach($result['rest'] as $level)
						<div class="levelBtmWrp">
							<div class="row">
								<div class="col-md-3">
									<figure>
										@if($level->id == 1) <img src="{{asset('web/assets/images/silverImg.png')}}" alt="*">  @elseif($level->id == 2) <img src="{{asset('web/assets/images/goldImg.png')}}" alt="*"> @else <img src="{{asset('web/assets/images/platiniumImg.png')}}" alt="*">@endif
									</figure>
								</div>
								<div class="col-md-9">
									<figcaption>
										<h3>{{$level->name}}</h3>
										<p>You now earn @if($level->id == 1) {{$result['commonContent']['setting'][130]->value}} @elseif($level->id == 2) {{$result['commonContent']['setting'][131]->value}} @else {{$result['commonContent']['setting'][132]->value}} @endif L-Points on every AED100 spent for a 12 month trailing period</p>
										<!-- <div class="progress-container"><div class="progress-bar" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="1999" style="width: <?php echo 0; ?>%"></div></div> -->
									</figcaption>
								</div>
							</div>
						</div>
						@endforeach
						@if(!empty($result['completed']))
						<h2>Completed Levels</h2>
						@foreach($result['completed'] as $level)
						<div class="levelBtmWrp">
							<div class="row">
								<div class="col-md-3">
									<figure>
										@if($level->id == 1) <img src="{{asset('web/assets/images/silverImg.png')}}" alt="*">  @elseif($level->id == 2) <img src="{{asset('web/assets/images/goldImg.png')}}" alt="*"> @else <img src="{{asset('web/assets/images/platiniumImg.png')}}" alt="*">@endif
									</figure>
								</div>
								<div class="col-md-9">
									<figcaption>
										<h3>{{$level->name}}</h3>
										<p>You now earn @if($level->id == 1) {{$result['commonContent']['setting'][130]->value}} @elseif($level->id == 2) {{$result['commonContent']['setting'][131]->value}} @else {{$result['commonContent']['setting'][132]->value}} @endif L-Points on every AED100 spent for a 12 month trailing period</p>
										<!-- <div class="progress-container"><div class="progress-bar" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="1999" style="width: <?php echo 0; ?>%"></div></div> -->
									</figcaption>
								</div>
							</div>
						</div>
						@endforeach
						@endif
					</div>
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
