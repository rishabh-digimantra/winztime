@extends('web.layout')

@section('content')

<?php 



function sequenceNumber($id) {

  $slots = '00000';

  $len = strlen($id);

 

  if ($len >! 5) {

    $num = -1 * abs($len);



    $seq = substr_replace($slots,$id,$num);

    return $seq;

  }else{

    return $id;

  }

}



 ?>

<!-- wishlist Content -->

<!-- if(isset($result['products']['product_data'][0]->products_id)) -->



@if(!isset($result['tickets'][0]->id))

<section class="wishlist-content my-4 main-section">

	<div class="container">

	<div class="heading">

		<h2 class="">active coupons</h2>

	</div>

	<div class="row">

		<div class="col-lg-8">

			<div class="activeWrp">

				<div class="empty-wishlist">

					<figure>

						<img src="{{asset('web/assets/images/active-tickets.png')}}" alt="*">

					</figure>

					<h4>You currently have no active coupons</h4>

					<h4>You can view active coupons here after you make your purchase</h4>

					<a href="{{url('/')}}/#shopping" class="bluebtn btn"><span>Start shopping</span></a>

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

					<li><a href="refer-a-friend" title="">Invite A Friend To Earn</a></li>

					<li><a href="change-password" title="">Change Password</a></li>

					<li class="last"><a href="logout" title="">Logout</a></li>

				</ul>

			</div>

		</div>

	</div>

</div>

</section>

@else

<section class="wishlist-content my-4 main-section">

	<div class="container">

	<div class="heading">

		<h2 class="">active coupons</h2>

	</div>

<?php 

// echo "<pre>";

// print_r($result['tickets']);

 ?>

	<div class="row">

		<div class="col-lg-8">

			<div class="activeWrp">

				<!-- <div class="thankCoupon activeCoupInrWrp"> -->

					<?php 

						$OrignalTicChecker = 0;

						$orderTickChecker = 0;

					?>

					

					@foreach($result['tickets'] as $ticket_id)

					

						@if($orderTickChecker == 0) 

							<div class="thankCoupon activeCoupInrWrp">

						@else 

							<div class="thankCoupon activeCoupInrWrp2">

						@endif

						<!-- <div class="thankCoupon activeCoupInrWrp"> -->

							@foreach(App\Models\Web\Customer::getOrderProductTickets($ticket_id->orders_id,$ticket_id->products_id) as $ticket)

								@if($ticket->type == 'O')

									@if($OrignalTicChecker == 0)

										<div class="thankCoup thankOrgTick"> 

											<figcaption>

												<div class="descCoup">

													<ul>

														<li class="logo first"><img src="{{asset('/web/assets/images/logo_coupon.png')}}" alt="*"></li>

														<li class="coupActNum">Number of Coupons<strong>{{App\Models\Web\Customer::getOrderProductTicketsCount($ticket_id->orders_id,$ticket_id->products_id)}}</strong></li>

													</ul>

													<ul class="coupProImg">

														<?php $reward = App\Models\Web\Customer::getRewardInfo($ticket->reward_id); 

														// print_r($reward);

														?>

														<li><?php echo htmlspecialchars_decode($reward[0]->title);?></li>

														<li><figure><img src="{{asset('images/'.$reward[0]->reward_image)}}" alt="*"></figure></li>

													</ul>

												</div>

												<div class="closCoup">

													<h5>Purchased in: <strong>{{date('H:i A, d M Y', strtotime($ticket->created_at))}}</strong></h5>

													<h5 class="text-right">Coupon Number: <strong>Z-{{sequenceNumber($ticket->campaign_id)}}-{{sequenceNumber($ticket->ticket_number)}}-{{$ticket->type}}</strong></h5>

												</div>

											</figcaption>

										</div>

										<?php $OrignalTicChecker++; ?>

									@else

										<div class="thankCoup thankOrgTick thankCoupChild">

											<figcaption>

												<div class="closCoup">

													<h5>Purchased in: <strong>{{date('H:i A, d M Y', strtotime($ticket->created_at))}}</strong></h5>

													<h5 class="text-right">Coupon Number: <strong>Z-{{sequenceNumber($ticket->campaign_id)}}-{{sequenceNumber($ticket->ticket_number)}}-{{$ticket->type}}</strong></h5>

												</div>

											</figcaption>

										</div>

									@endif

								@elseif($ticket->type == 'D')

									<div class="thankCoup thankCoupChild">

										<figcaption>

											<div class="closCoup">

												<h5>Purchased in: <strong>{{date('H:i A, d M Y', strtotime($ticket->created_at))}}</strong></h5>

												<h5 class="text-right">Coupon Number: <strong>Z-{{sequenceNumber($ticket->campaign_id)}}-{{sequenceNumber($ticket->ticket_number)}}-{{$ticket->type}}</strong></h5>

											</div>

										</figcaption>

									</div>

								@else

									<div class="thankCoup thankCoupChild">

										<figcaption>

											<div class="closCoup">

												<h5>Purchased in: <strong>{{date('H:i A, d M Y', strtotime($ticket->created_at))}}</strong></h5>

												<h5 class="text-right">Coupon Number: <strong>Z-{{sequenceNumber($ticket->campaign_id)}}-{{sequenceNumber($ticket->ticket_number)}}-{{$ticket->type}}</strong></h5>

											</div>

										</figcaption>

									</div>

								@endif

							@endforeach

							<?php $OrignalTicChecker = 0;

							$orderTickChecker++; ?>

						</div>

					@endforeach

					

					<!-- <div class="thankCoup thankOrgTick">

						<figcaption>

							<div class="descCoup">

								<ul>

									<li class="logo">Lucramania.</li>

									<li class="coupActNum">Number of Coupons<strong>6</strong></li>

								</ul>

								<ul class="coupProImg">

									<li>Optimum Nutrition Mi</li>

									<li><figure><img src="https://lucramania.com/images/media/2020/10/0adHY01808.jpeg" alt="*"></figure></li>

								</ul>

							</div>

							<div class="closCoup">

								<h5>Purchased in: <strong>02:30 PM, 14 October 2020</strong></h5>

								<h5 class="text-right">Coupon Number: <strong>CC-00001-00001-O</strong></h5>

							</div>

						</figcaption>

					</div>

					<div class="thankCoup thankOrgTick thankCoupChild">

						<figcaption>

							<div class="closCoup">

								<h5>Purchased in: <strong>02:30 PM, 14 October 2020</strong></h5>

								<h5 class="text-right">Coupon Number: <strong>CC-00001-00002-O</strong></h5>

							</div>

						</figcaption>

					</div>

					<div class="thankCoup thankCoupChild">

						<figcaption>

							<div class="closCoup">

								<h5>Purchased in: <strong>02:30 PM, 14 October 2020</strong></h5>

								<h5 class="text-right">Coupon Number: <strong>CC-00001-00001-D</strong></h5>

							</div>

						</figcaption>

					</div>

					<div class="thankCoup thankCoupChild">

						<figcaption>

							<div class="closCoup">

								<h5>Purchased in: <strong>02:30 PM, 14 October 2020</strong></h5>

								<h5 class="text-right">Coupon Number: <strong>CC-00001-00002-D</strong></h5>

							</div>

						</figcaption>

					</div>

					<div class="thankCoup thankCoupChild">

						<figcaption>

							<div class="closCoup">

								<h5>Purchased in: <strong>02:30 PM, 14 October 2020</strong></h5>

								<h5 class="text-right">Coupon Number: <strong>CC-00001-00001-E</strong></h5>

							</div>

						</figcaption>

					</div>

					<div class="thankCoup thankCoupChild">

						<figcaption>

							<div class="closCoup">

								<h5>Purchased in: <strong>02:30 PM, 14 October 2020</strong></h5>

								<h5 class="text-right">Coupon Number: <strong>CC-00001-00002-E</strong></h5>

							</div>

						</figcaption>

					</div> -->

				

			</div>

		</div>

		<div class="col-lg-4">

			<div class="lPoint-sidebar">

				<ul>

					<li class="first"><a href="{{url('/')}}/profile" title="">Personal Details</a></li>

					<li><a href="{{url('/')}}/levels" title="">Levels</a></li>

					<li><a href="{{url('/')}}/wishlist" title="">Wish List</a></li>

					<li><a href="{{url('/')}}/active-coupons" title="">Active Coupons</a></li>

					<li><a href="{{url('/')}}/my-zpoints" title="">Z-Points</a></li>

					<li><a href="{{url('/')}}/address-book" title="">Address Book</a></li>

					<li><a href="{{url('/')}}/refer-a-friend" title="">Invite A Friend To Earn</a></li>

					<li><a href="{{url('/')}}/change-password" title="">Change Password</a></li>

					<li class="last"><a href="{{url('/')}}/logout" title="">Logout</a></li>

				</ul>

			</div>

		</div>

	</div>

</div>

</section>

		@endif



		@endsection

