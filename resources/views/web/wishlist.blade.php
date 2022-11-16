@extends('web.layout')
@section('content')
<!-- wishlist Content -->
@if(!isset($result['products']['product_data'][0]->products_id))
<section class="wishlist-content my-4 main-section">
	<div class="container">
		<div class="heading">
			<h2 class="">wish list</h2>
		</div>
		<div class="row">
			<div class="col-lg-8">
				<div class="activeWrp">
					<div class="empty-wishlist">
						<figure>
							<img src="{{asset('web/assets/images/empty-wishlist.png')}}" alt="*">
						</figure>
						<h4>You currently have 0 items in your wish list</h4>
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
			<h2>wish list</h2>
		</div>
		<div class="row">
			<div class="col-lg-8 ">
				<div class="contFormWrp">
					<div class="wishlist-products">
						<table>
							<thead>
								<tr>
									<th>Product</th>
									<th>Price</th>
									<th>Reward</th>
								</tr>
							</thead>
							<tbody>
								@foreach($result['products']['product_data'] as $key=>$products)
								<?php

								if (!empty($products->discount_price)) {
									$discount_price = $products->discount_price * session('currency_value');
								}
								$orignal_price = $products->products_price * session('currency_value');
								if (!empty($products->discount_price)) {

									if (($orignal_price + 0) > 0) {
										$discounted_price = $orignal_price - $discount_price;
										$discount_percentage = $discounted_price / $orignal_price * 100;
									} else {
										$discount_percentage = 0;
										$discounted_price = 0;
									}
								}
								?>
								<tr>
									<td>
										<!-- <h3>Buy</h3> -->
										<figure class="productImg"><img src="{{asset('').$products->image_path}}" alt="*"></figure>{{$products->products_name}}
									</td>
									<!-- <td></td> -->
									<td>@if(!empty($products->discount_price))
										<span><b>{{Session::get('symbol_left')}}&nbsp;{{$discount_price+0}}&nbsp;{{Session::get('symbol_right')}}</b></span>
										<del> {{Session::get('symbol_left')}}{{$orignal_price+0}}{{Session::get('symbol_right')}}</del>
										@else
										<span><b>{{Session::get('symbol_left')}}&nbsp;{{$orignal_price+0}}&nbsp;{{Session::get('symbol_right')}}</b></span>
										@endif
										<br>
										<ul class="cartDelBtn">

											<li class="anchorSwap">
												@if(!in_array($products->products_id,$result['cartArray']))
												<a href="javascript:;" class="cart" title="Add to cart" products_id="{{$products->products_id}}" campaign_id="{{$products->campaign_id}}">
													<i class="fas fa-shopping-cart"></i></a>
												@else
												<a href="viewcart" title="Added" class="added"><i class="fas fa-shopping-cart"></i></a>
												@endif
											</li>

											<li><a href="{{ URL::to("/UnlikeMyProduct")}}/{{$products->products_id}}"><i class="fas fa-trash-alt"></i></a></li>

										</ul>
									</td>
									<td>
										<!-- <h3>Win</h3> -->
										<?php $rewardData = App\Models\Web\Customer::getRewardByProduct($products->products_id); ?>
										<figure class="productImg"><img src="{{asset('images/'.$rewardData[0]->reward_image)}}" alt="*"></figure>
										{!! $rewardData[0]->title !!}
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>

			</div>
			<div class="col-lg-4">
				<div class="lPoint-sidebar">
					<ul>
						<li class="first"><a href="profile" title="">Personal Details</a></li>
						<li><a href="levels" title="">Levels</a></li>
						<li><a href="wishlist" title="">Wish list</a></li>
						<li><a href="active-coupons" title="">Active Coupons</a></li>
						<li><a href="my-zpoints" title="">Z-Points</a></li>
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
@endif
@endsection