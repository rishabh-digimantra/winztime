@extends('web.layout')

@section('content')

<!-- wishlist Content -->

<section class="lpoint-content my-4 main-section">

	<div class="container">

		<div class="heading">

			<h2>Current Level</h2>

		</div>

		<div class="row">

			<div class="col-lg-8">

				<div class="level-wrapper">

					<div class="nextLevel">

						@foreach($result['current'] as $level)

						<div class="levelBtmWrp">

							<div class="row">

								<div class="col-md-3">

									<figure>

										<img src="{{$level->badge}}" alt="*">

									</figure>

								</div>

								<div class="col-md-9">

									<figcaption>

										<h3>{{$level->name}}</h3>

										<p>You now earn @if($level->id == 1) {{$result['commonContent']['setting'][130]->value}} @elseif($level->id == 2) {{$result['commonContent']['setting'][131]->value}} @else {{$result['commonContent']['setting'][132]->value}} @endif Z-Points on every AED100 spent for a 12 month trailing period</p>

										<div class="progress-container">
											<div class="progress-bar" role="progressbar" aria-valuenow="{{auth()->guard('customer')->user()->redeem_points}}" aria-valuemin="{{$result['current'][0]->start_count}}" aria-valuemax="{{$result['current'][0]->end_count}}" style="width:{{$percentage}}%"></div>
										</div>


									</figcaption>

								</div>

							</div>

						</div>

						@endforeach

					</div>



					<div class="nextLevel">

						@if(count($result['rest']) > 0) 
						<h2>Next Levels</h2>
						@foreach($result['rest'] as $level)

						<div class="levelBtmWrp">

							<div class="row">

								<div class="col-md-3">

									<figure>
										<img src="{{$level->badge}}" alt="*">
									</figure>

								</div>

								<div class="col-md-9">

									<figcaption>

										<h3>{{$level->name}}</h3>

										<p>You now earn @if($level->id == 1) {{$result['commonContent']['setting'][130]->value}} @elseif($level->id == 2) {{$result['commonContent']['setting'][131]->value}} @else {{$result['commonContent']['setting'][132]->value}} @endif Z-Points on every AED100 spent for a 12 month trailing period</p>

										<!-- <div class="progress-container"><div class="progress-bar" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="1999" style="width: <?php echo 0; ?>%"></div></div> -->

									</figcaption>

								</div>

							</div>

						</div>

						@endforeach
						@endif

						@if(count($result['completed']) > 0)
						<h2>Completed Levels</h2>

						@foreach($result['completed'] as $level)


						<div class="levelBtmWrp">

							<div class="row">

								<div class="col-md-3">

									<figure>

										<img src="{{$level->badge}}" alt="*">

									</figure>

								</div>

								<div class="col-md-9">

									<figcaption>

										<h3>{{$level->name}}</h3>

										<p>You now earn @if($level->id == 1) {{$result['commonContent']['setting'][130]->value}} @elseif($level->id == 2) {{$result['commonContent']['setting'][131]->value}} @else {{$result['commonContent']['setting'][132]->value}} @endif Z-Points on every AED100 spent for a 12 month trailing period</p>

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