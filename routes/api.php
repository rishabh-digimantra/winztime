<?php

Route::group(['namespace' => 'Api\V1', 'prefix' => 'customer'], function () {
   Route::post('register', 'RegisterController@saveUser');
   Route::post('checkEmail', 'RegisterController@checkEmail');
   Route::post('login', 'RegisterController@login');

   Route::post('verify_account', 'RegisterController@VerifyAccount');
   Route::post('social_login', 'RegisterController@Sociallogin');
   Route::post('apple_login', 'RegisterController@AppleLogin');


   Route::post('contact_us', 'CommonController@ContactUs');
   Route::post('forgot_password', 'RegisterController@ForgotEmail');
   Route::post('resend_otp', 'RegisterController@resendOtp');
   Route::post('otp_verify', 'RegisterController@Otpverify');
   Route::post('change_forgot_password', 'RegisterController@ChangeForgotPassword');
   Route::post('share_campaigns', 'CommonController@shareCampaign');
   Route::get('countries', 'CommonController@Countries');
   Route::get('slider_images', 'CommonController@SliderImages');
   Route::get('static_content/{id}', 'CommonController@StaticContent');

   // Route::get('active_campaigns', 'CampaignController@getActiveCampaigns');
   // Route::get('get_products', 'ProductController@getAllProducts');
   Route::get('winner_list', 'CampaignController@CampaignWinners');
   // Route::get('get_levels', 'RegisterController@GetLevels');
   Route::get('api_version', 'CampaignController@api_version');

});

Route::group(['namespace' => 'Api\V1', 'prefix' => 'customer', 'middleware' => ['jwt.verify']], function () {
   Route::get('campaign_details', 'CampaignController@GetCampaignDetails');
   Route::post('change_password', 'RegisterController@ChangePassword');
   Route::post('get_user_details', 'RegisterController@GetUserDetails');
   Route::get('get_levels', 'RegisterController@GetLevels');
   Route::get('get_coupons_list', 'CampaignController@GetCouponsList');
   // Route::get('winner_list', 'CampaignController@CampaignWinners');
   Route::get('get_products', 'ProductController@getAllProducts');
   Route::get('my-zpoints', 'RegisterController@MyZpoints');
   Route::post('add_to_cart', 'ProductController@Addtocart');
   Route::post('addAddress', 'AddressController@addAddress');
   Route::get('get_address_book', 'AddressController@getAddressBook');
   Route::delete('deleteAddress/{id}', 'AddressController@deleteAddress');
   Route::post('likeMyProduct', 'ProductController@likeMyProduct');
   Route::get('refer_friend', 'CommonController@Referafriend');
   Route::match(['GET','POST'],'active_campaigns', 'CampaignController@getActiveCampaigns');
   Route::get('my_wishlist', 'ProductController@Wishlistlist');
   Route::get('view_cart', 'ProductController@viewcart');
   Route::post('delete_cart', 'ProductController@delete_cart');
   Route::post('checkout', 'ProductController@checkout');
   Route::post('amount_to_pay', 'ProductController@AmountTopay');
   Route::post('apply_coupon', 'ProductController@ApplyCoupon');
   Route::post('place_order', 'ProductController@PlaceOrder');
   Route::post('logout', 'RegisterController@logout');
});