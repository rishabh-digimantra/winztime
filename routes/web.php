<?php
if(file_exists(storage_path('installed'))){
	$check = DB::table('settings')->where('id', 94)->first();
	if($check->value == 'Maintenance'){
		$middleware = ['installer','env'];
	}
	else{
		$middleware = ['installer','otp'];
	}
}
else{
	$middleware = ['installer','otp'];
}

// Route::get('stripe',function(){
// 	return view('stripe');
// });

Route::get('stripe', 'Web\StripeController@stripeForm')->name('stripe.get');
Route::any('store-place-order', 'Web\StripeController@storePlaceOrder')->name('store-card');
Route::post('payment-stripe', 'Web\StripeController@submit')->name('stripe.post');


Route::get('password/reset', 'Web\CustomersController@ForgotPasswordDefaut')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Web\CustomersController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/maintance','Web\IndexController@maintance');
Route::group(['namespace' => 'Web','middleware' => ['installer']], function () {
	Route::get('lang/{locale}', 'WebSettingController@lang');
Route::get('/login', 'CustomersController@login')->name('login');
Route::get('/otp', 'CustomersController@Otp')->name('otp');
Route::post('/process-login', 'CustomersController@processLogin');
Route::get('login/{social}', 'CustomersController@socialLogin');
Route::get('login/{social}/callback', 'CustomersController@handleSocialLoginCallback');
Route::post('/checkotp', 'CustomersController@Checkotp');
Route::get('/logout', 'CustomersController@logout')->middleware('Customer');
Route::get('/send_mail', 'AlertController@checkapiresponse');
Route::post('resend_otp_mail', 'CustomersController@ResendOtpMail')->name('ResendOtpMail');

});
Route::get('/404', 'Web\IndexController@notFound');
Route::group(['namespace' => 'Web','middleware' => $middleware], function () {
	Route::get('home', function() {
		 return view('home');
	});
	// route for to show payment form using get method
		
		Route::get('cron/cart_notification', 'CartController@cart_notification')->name('cart_notification');
		
	
		Route::get('pay', 'RazorpayController@pay')->name('pay');
    	Route::post('/paytm-callback', 'PaytmController@paytmCallback');
		Route::get('/store_paytm', 'PaytmController@store');
		// route for make payment request using post method
		Route::post('dopayment', 'RazorpayController@dopayment')->name('dopayment');

		Route::get('/','IndexController@index')->name('website.home');
		Route::post('/change_language', 'WebSettingController@changeLanguage');
		Route::post('/change_currency', 'WebSettingController@changeCurrency');
		Route::post('/addToCart', 'CartController@addToCart');
		Route::post('/addToCartFixed', 'CartController@addToCartFixed');
		Route::post('/addToCartResponsive', 'CartController@addToCartResponsive');
		Route::get('/campaigns/detail/{id}', 'IndexController@CampaignsDetail')->name('campaignDetail');
		Route::post('/modal_show', 'ProductsController@ModalShow');
		Route::post('/modal_show_products', 'ProductsController@ModalShowProduct');
		Route::post('/reviews', 'ProductsController@reviews');
		Route::get('/deleteCart', 'CartController@deleteCart');
		Route::get('/viewcart', 'CartController@viewcart');
		Route::get('/editcart/{id}/{slug}', 'CartController@editcart');
		Route::post('/updateCart', 'CartController@updateCart');
		Route::post('/updateCartAjax', 'CartController@updateCartAjax');
		Route::post('/updateCheckoutCartAjax', 'CartController@updateCheckoutCartAjax');
		Route::post('/updatesinglecart', 'CartController@updatesinglecart');
		Route::get('/cartButton', 'CartController@cartButton');

		Route::get('/profile', 'CustomersController@profile')->middleware('Customer');
		Route::get('/refer-a-friend', 'ReferController@index')->name('refer-a-friend')->middleware('Customer');
		Route::get('/refered', 'ReferController@saveReferal')->name('refered');
		Route::get('/change-password', 'CustomersController@changePassword')->middleware('Customer');
		
		Route::get('/wishlist', 'CustomersController@wishlist')->middleware('Customer');
		Route::get('/active-coupons', 'CustomersController@activecoupon')->middleware('Customer');
		Route::get('/payment-options', 'CustomersController@paymentOptions')->middleware('Customer');

		Route::get('/my-zpoints', 'CustomersController@lpoint')->middleware('Customer');
		Route::get('/levels', 'CustomersController@level')->middleware('Customer');
		Route::get('/address-book', 'CustomersController@getAddressBook')->middleware('Customer');

		Route::post('/updateMyProfile', 'CustomersController@updateMyProfile')->middleware('Customer');
		Route::post('/addCardOption', 'CustomersController@addCardOption')->middleware('Customer');
		Route::post('/updateMyPassword', 'CustomersController@updateMyPassword')->middleware('Customer');
		Route::get('UnlikeMyProduct/{id}', 'CustomersController@unlikeMyProduct')->middleware('Customer');
		Route::get('deletecard/{id}', 'CustomersController@deleteCard')->middleware('Customer');
		Route::post('likeMyProduct', 'CustomersController@likeMyProduct');
		Route::post('addToCompare', 'CustomersController@addToCompare');
		Route::get('compare', 'CustomersController@Compare')->middleware('Customer');
		Route::get('deletecompare/{id}', 'CustomersController@DeleteCompare')->middleware('Customer');
		Route::get('/orders', 'OrdersController@orders')->middleware('Customer');
		Route::get('/view-order/{id}', 'OrdersController@viewOrder')->middleware('Customer');
		Route::post('/updatestatus/', 'OrdersController@updatestatus')->middleware('Customer');
		Route::get('/shipping-address', 'ShippingAddressController@shippingAddress')->middleware('Customer');
		Route::post('/addMyAddress', 'ShippingAddressController@addMyAddress')->middleware('Customer');
		Route::post('/get-delivery-instruction', 'OrdersController@getDeliveryInstruction')->middleware('Customer'); 
		Route::post('/edit-location', 'OrdersController@editLocation')->middleware('Customer'); 
		Route::post('/addDeliveryIns', 'OrdersController@addDeliveryIns')->middleware('Customer');
		Route::post('/addAddress', 'ShippingAddressController@addAddress')->middleware('Customer');
		Route::post('/myDefaultAddress', 'ShippingAddressController@myDefaultAddress')->middleware('Customer');
		// Route::post('/update-address', 'ShippingAddressController@updateAddress')->middleware('Customer');
		Route::get('/delete-address/{id}', 'ShippingAddressController@deleteAddress')->middleware('Customer');
		Route::get('/deleteAddress/{id}', 'CustomersController@deleteAddress')->middleware('Customer');
		Route::post('/ajaxZones', 'ShippingAddressController@ajaxZones');
		//news section
		Route::get('/news', 'NewsController@news');
		Route::get('/news-detail/{slug}', 'NewsController@newsDetail');
		Route::post('/loadMoreNews', 'NewsController@loadMoreNews');
		Route::get('/page', 'IndexController@page');
		Route::get('/page/{slug}', 'IndexController@page');
		Route::get('/shop', 'ProductsController@shop');
		Route::post('/shop', 'ProductsController@shop');
		Route::get('/product-detail/{slug}', 'ProductsController@productDetail');
		Route::post('/filterProducts', 'ProductsController@filterProducts');
		Route::post('/getquantity', 'ProductsController@getquantity');

		Route::get('/guest_checkout', 'OrdersController@guest_checkout');
		

		Route::get('/edit-address/{id}', 'CustomersController@editAddress')->middleware('Customer');
		Route::post('/updateAddress', 'CustomersController@updateAddress')->middleware('Customer');
		Route::post('/update-AAddress', 'OrdersController@updateAAddress')->middleware('Customer');

		Route::get('/checkout', 'OrdersController@checkout')->middleware('Customer')->name('checkout');;
		Route::get('/check-flopayment', 'OrdersController@checkFloPayments')->middleware('Customer');
		Route::get('/checkout-cardpayment', 'OrdersController@cardpayment')->middleware('Customer');

		Route::post('/checkout_shipping_new_address', 'OrdersController@checkout_shipping_new_address')->middleware('Customer');
		Route::post('/checkout_shipping_address', 'OrdersController@checkout_shipping_address')->middleware('Customer');
		Route::post('/checkout_billing_address', 'OrdersController@checkout_billing_address')->middleware('Customer');
		Route::post('/checkout_payment_method', 'OrdersController@checkout_payment_method')->middleware('Customer');
		Route::post('/paymentComponent', 'OrdersController@paymentComponent')->middleware('Customer');
		Route::post('/place_order', 'OrdersController@place_order')->middleware('Customer');
		Route::get('/orders', 'OrdersController@orders')->middleware('Customer');
		Route::post('/updatestatus/', 'OrdersController@updatestatus')->middleware('Customer');
		Route::post('/myorders', 'OrdersController@myorders')->middleware('Customer');
		Route::get('/stripeForm', 'OrdersController@stripeForm')->middleware('Customer');
		Route::get('/view-order/{id}', 'OrdersController@viewOrder')->middleware('Customer');
		Route::post('/pay-instamojo', 'OrdersController@payIinstamojo')->middleware('Customer');
		Route::get('/thankyou/{order_id}', 'OrdersController@thankyou')->middleware('Customer');
		Route::get('/thankyou2', 'OrdersController@thankyou2')->middleware('Customer');

		//paystack
		Route::get('/paystack/transaction', 'OrdersController@paystackTransaction')->middleware('Customer');
		Route::get('/paystack/verify/transaction', 'OrdersController@authorizepaystackTransaction')->middleware('Customer');
		
		//paystack
		Route::get('/midtrans/transaction', 'MidtransController@midtransTransaction')->middleware('Customer');
		// Route::get('/midtrans/verify/transaction', 'OrdersController@authorize<idtransTransaction')->middleware('Customer');
		
		Route::get('/checkout/hyperpay', 'OrdersController@hyperpay')->middleware('Customer');
		Route::get('/checkout/hyperpay/checkpayment', 'OrdersController@checkpayment')->middleware('Customer');
		Route::post('/checkout/payment/changeresponsestatus', 'OrdersController@changeresponsestatus')->middleware('Customer');
		Route::post('/apply_coupon', 'CartController@apply_coupon');
		Route::get('/removeCoupon/{id}', 'CartController@removeCoupon')->middleware('Customer');

		Route::get('/signup', 'CustomersController@signup');
		Route::get('/logoutt', 'CustomersController@logout')->middleware('Customer');
		Route::post('/signupProcess', 'CustomersController@signupProcess');
		Route::get('/forgotPassword', 'CustomersController@forgotPassword');
		Route::get('/recoverPassword', 'CustomersController@recoverPassword');
		Route::post('/processPassword', 'CustomersController@processPassword');


	
		Route::post('/commentsOrder', 'OrdersController@commentsOrder');
		Route::post('/subscribeNotification/', 'CustomersController@subscribeNotification');
		Route::get('/contact', 'IndexController@contactus');
		Route::post('/processContactUs', 'IndexController@processContactUs');
		
		Route::get('/setcookie', 'IndexController@setcookie');
		Route::get('/newsletter', 'IndexController@newsletter');

		Route::get('/subscribeMail', 'IndexController@subscribeMail');
		Route::get('/setSession', 'IndexController@setSession');
	});

	Route::get('/test', 'Web\IndexController@test1');
	Route::post('/addToNetwork', 'Web\IndexController@network');
	Route::post('/getToNetwork', 'Web\IndexController@network_get');

	Route::get('winner-list','Common\WinnerController@sendWinnerListMail');
	Route::get('winner-list-mail','Common\WinnerController@sendWinnerListMail1');
    Route::get('remove_customer_basket','Web\CartController@RemoveCustomerBasket');
	
	// Route::get('winner-list',function(){
	// 	return view('mail.winnerList');
	// });

	Route::get('cron/campaigns/expire/{id?}', 'Common\WinnerController@campaignExpire');
	Route::get('cron/birthday-email', 'Common\WinnerController@BirthdayEmail');
	// Route::get('birthday-email',function(){
	// 	return view('mail.emailReminder');
	// });