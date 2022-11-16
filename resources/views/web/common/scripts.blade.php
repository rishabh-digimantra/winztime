<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>

<!-- <script src="{!! asset('web/js/jquery.instagramFeed.min.js') !!}"></script> -->
@if(Request::path() == 'checkout')
<script src="https://js.braintreegateway.com/js/braintree-2.32.1.min.js"></script>
<script type="text/javascript">

//$.noConflict();
jQuery(document).ready(function(e) {

	braintree.setup(
		// Replace this with a client token from your server
		" <?php print session('braintree_token')?>",
		"dropin", {
		container: "payment-form"
	});
});</script>

<!-- <script src="{!! asset('web/js/stripe_card.js') !!}" data-rel-js></script> -->

<script type="application/javascript">
const ele = document.getElementById('messagecontact');
if (typeof(ele) != 'undefined' && ele != null) {
ele.addEventListener('keydown', function(e) {
    // Get the code of pressed key
    const keyCode = e.which || e.keyCode;

    // 13 represents the Enter key
    if (keyCode === 13 && !e.shiftKey) {
        // Don't generate a new line
        e.preventDefault();

        // Do something else such as send the message to back-end
        // ...
    }
});
}
  if (typeof(stripe) != 'undefined' && stripe != null) {
(function() {
  'use strict';

  var elements = stripe.elements({
    fonts: [
      {
        cssSrc: 'https://fonts.googleapis.com/css?family=Source+Code+Pro',
      },
    ],
    // Stripe's examples are localized to specific languages, but if
    // you wish to have Elements automatically detect your user's locale,
    // use `locale: 'auto'` instead.
    locale: window.__exampleLocale
  });


  // Floating labels
  var inputs = document.querySelectorAll('.cell.example.example2 .input');
  Array.prototype.forEach.call(inputs, function(input) {
    input.addEventListener('focus', function() {
      input.classList.add('focused');
    });
    input.addEventListener('blur', function() {
      input.classList.remove('focused');
    });
    input.addEventListener('keyup', function() {
      if (input.value.length === 0) {
        input.classList.add('empty');
      } else {
        input.classList.remove('empty');
      }
    });
  });

  var elementStyles = {
    base: {
      color: '#32325D',
      fontWeight: 500,
      fontFamily: 'Source Code Pro, Consolas, Menlo, monospace',
      fontSize: '16px',
      fontSmoothing: 'antialiased',

      '::placeholder': {
        color: '#CFD7DF',
      },
      ':-webkit-autofill': {
        color: '#e39f48',
      },
    },
    invalid: {
      color: '#E25950',

      '::placeholder': {
        color: '#FFCCA5',
      },
    },
  };

  var elementClasses = {
    focus: 'focused',
    empty: 'empty',
    invalid: 'invalid',
  };

  var cardNumber = elements.create('cardNumber', {
    style: elementStyles,
    classes: elementClasses,
  });
  cardNumber.mount('#example2-card-number');

  var cardExpiry = elements.create('cardExpiry', {
    style: elementStyles,
    classes: elementClasses,
  });
  cardExpiry.mount('#example2-card-expiry');

  var cardCvc = elements.create('cardCvc', {
    style: elementStyles,
    classes: elementClasses,
  });
  cardCvc.mount('#example2-card-cvc');

  registerElements([cardNumber, cardExpiry, cardCvc], 'example2');

})

();
}

</script>

<script type="text/javascript">
  jQuery(document).ready(function(){

    var input = document.querySelector(".phone"),
    errorMsg = document.querySelector("#error-msg"),
    validMsg = document.querySelector("#valid-msg");
    var errorMap = ["Invalid number", "Invalid country code", "Too short", "Too long", "Invalid number"];
    var iti = window.intlTelInput(input, {
      utilsScript: "{{asset('web/assets/js/utils.js')}}"
    });
    var reset = function() {
      input.classList.remove("error");
      errorMsg.innerHTML = "";
      errorMsg.classList.add("hide");
      validMsg.classList.add("hide");
    };
    input.addEventListener('blur', function() {
      reset();
      if (input.value.trim()) {
        if (iti.isValidNumber()) {
          validMsg.classList.remove("hide");
        } else {
          input.classList.add("error");
          var errorCode = iti.getValidationError();
          errorMsg.innerHTML = errorMap[errorCode];
          errorMsg.classList.remove("hide");
          jQuery('.phone').val("");
        }
      }
    });
      // on keyup / change flag: reset
      input.addEventListener('change', reset);
      input.addEventListener('keyup', reset);
  });
  
  //wishlit
  jQuery(document).on('click', '.wishlist', function(e){
    alert(8)
  var products_id = jQuery(this).attr('products_id');
    var campaign_id = jQuery(this).attr('campaign_id');
  var selector = jQuery(this);
  var user_count = jQuery('#wishlist-count').html();
  jQuery.ajax({
  beforeSend: function (xhr) { // Add this line
      xhr.setRequestHeader('X-CSRF-Token', jQuery('[name="_csrfToken"]').val());
  },
    url: '{{ URL::to("/likeMyProduct")}}',
    type: "POST",
    data: {"products_id":products_id,"campaign_id":campaign_id,"_token": "{{ csrf_token() }}"},

    success: function (res) {
      var obj = JSON.parse(res);
      var message = obj.message;
      // console.log(obj.success);
      if(obj.success==0){
      }else if(obj.success==2){
        jQuery(selector).addClass('active');
        // jQuery('.wishlist.active > img').attr('src','https://lucramania.com/web/assets/images/sec3Icon-red.png');
        // jQuery(selector).children('span').html(obj.total_likes);
        // jQuery('.total_wishlist').html(obj.total_wishlist);
        
      }else if(obj.success==1){
        // jQuery('.heart').attr('src','https://lucramania.com/web/assets/images/sec3Icon.png');
        jQuery(selector).removeClass('active');
        // jQuery('.wishlist > img').attr('src','https://lucramania.com/web/assets/images/sec3Icon.png');
        // jQuery(selector).children('span').html(obj.total_likes);
        // jQuery('.total_wishlist').html(obj.total_wishlist);
      }
      
      notificationWishlist(message);


    },
  });

  });
 
  window.onload = function(e){
	if(jQuery('#paypal_public_key').val() !== null && jQuery('#paypal_environment').val()){

	
    var paypal_public_key = jQuery('#paypal_public_key').val();
    var acount_type = jQuery('#paypal_environment').val();
  
    if(acount_type=='Test'){
      var paypal_environment = 'sandbox'
    }else if(acount_type=='Live'){
      var paypal_environment = 'production'
    }
  
       paypal.Button.render({
      env: paypal_environment, // sandbox | production
      style: {
              label: 'checkout',
              size:  'small',    // small | medium | large | responsive
              shape: 'pill',     // pill | rect
              color: 'gold'      // gold | blue | silver | black
          },
  
      // PayPal Client IDs - replace with your own
      // Create a PayPal app: https://developer.paypal.com/developer/applications/create
  
      client: {
        sandbox:     paypal_public_key,
        production:  paypal_public_key
      },
  
      // Show the buyer a 'Pay Now' button in the checkout flow
      commit: true,
  
      // payment() is called when the button is clicked
      payment: function(data, actions) {
        var payment_currency = document.getElementById('payment_currency').value;
        var total_price = '<?php echo number_format((float)$total_price+0, 2, '.', '');?>';
  
        // Make a call to the REST api to create the payment
        return actions.payment.create({
          payment: {
            transactions: [
              {
                amount: { total: total_price, currency: payment_currency }
              }
            ]
          }
        });
      },
  
      // onAuthorize() is called when the buyer approves the payment
      onAuthorize: function(data, actions) {
  
        // Make a call to the REST api to execute the payment
        return actions.payment.execute().then(function() {
             jQuery('#update_cart_form').prepend('<input type="hidden" name="nonce" value='+JSON.stringify(data)+'>');
          jQuery("#update_cart_form").submit();
        });
      }
  
    }, '#paypal_button');
  }
  };
  </script>
  
@endif
<script src="{!! asset('web/js/scripts.js') !!}"></script>
<script>
/////////////////// default code ///////////////////


///////////////// old code ///////////////////

//insta feeds

// jQuery(document).ready(function($){
//   jQuery('input[name="selectedCardOption"]').click(function(){
//       jQuery('.selectChecker').removeClass('active');
//       jQuery(this).closest('td').find('.selectChecker').addClass('active');
//   });
// 	jQuery.instagramFeed({
// 		'username': "{{ $result['commonContent']['settings']['instauserid']}}",
// 		'container': "#instagram-feed",
// 		'display_profile': false,
// 		'display_biography': true,
// 		'display_gallery': true,
// 		'callback': null,
// 		'styling': true,
// 		'items': 8,
// 		'items_per_row': 4,
// 		'margin': 1
// 	}); 
// }); 

// jQuery(document).ready(function($){

// jQuery(document).on('click', '.btnrating', function(){
// 	var previous_value = jQuery("#selected_rating").val();
	
// 	var selected_value = jQuery(this).attr("data-attr");
// 	jQuery"#selected_rating").val(selected_value);
	
// 	jQuery(".selected-rating").empty();
// 	jQuery(".selected-rating").html(selected_value);
	
// 	for (i = 1; i <= selected_value; ++i) {
// 		jQuery("#rating-star-"+i).toggleClass('btn-warning');
// 		jQuery("#rating-star-"+i).toggleClass('btn-default');
// 	}
	
// 	for (ix = 1; ix <= previous_value; ++ix) {
// 		jQuery("#rating-star-"+ix).toggleClass('btn-warning');
// 		jQuery("#rating-star-"+ix).toggleClass('btn-default');
// 	}
// })




// }); 



//review ajax
jQuery(".mailchimp-form").submit(function(e) {

e.preventDefault(); // avoid to execute the actual submit of the form.

var form = jQuery(this);
var url = form.attr('action');
  jQuery.ajax({
        headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},
        type: "GET",
        url: "{{url('/subscribeMail')}}",
        data: form.serialize(), // serializes the form's elements.
        success: function(data)
        {
			  jQuery('#newsletterModal').modal('hide');
			
          if(data == '1'){
              jQuery('.email').val('');
              notificationWishlist("@lang('website.mailchimp_subscribe')");
          }else if(data == '2'){
              notificationWishlist("@lang('website.mailchimp_already_subscribe')");
          }
          else{
              notificationWishlist("@lang('website.mailchimp_error')");
          }
        }
      });


});


jQuery(document).on('click', '.shipping_data', function(e){
    getZonesBilling();
  });
  
  function getZonesBilling() {
    var field_name = jQuery('.shipping_data:checked');
    var mehtod_name = jQuery(field_name).attr('method_name');
	var shipping_price = jQuery(field_name).attr('shipping_price');
    jQuery("#mehtod_name").val(mehtod_name);
    jQuery("#shipping_price").val(shipping_price);
  }
  

function notificationWishlist(param){
    jQuery('#notificationWishlist').html(param);
    jQuery('#notificationWishlist').show().css('opacity', '1');
    // jQuery('.cartBtn').addClass('added');
    setTimeout(function(){
        jQuery('#notificationWishlist').css('top', '-700px').css('right', '-1300px').css('opacity', '0');
        // jQuery('.cartBtn').removeClass('added');
      }, 2000);
    setTimeout(function(){
      jQuery('#notificationWishlist').css('top', '0').css('right', '0');
    }, 3000);
    
}

  jQuery(document).ready(function() {
                 jQuery("#success-alert").fadeTo(2000, 500).slideUp(500, function() {
                   jQuery("#success-alert").slideUp(500);
                 });
                 jQuery(".alert-success").fadeTo(2000, 500).slideUp(500, function() {
                   jQuery(".alert-success").slideUp(500);
                 });
               });
jQuery(document).ready(function() {
  setTimeout(function(){ $('.eapps-link').hide(); }, 1200);
	jQuery('#loader').hide();
  
});


jQuery(document).on('click','#allow-cookies', function(e){
	jQuery.ajax({
		headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},
		url: '{{ URL::to("/setcookie")}}',
		type: "get",
		success: function (res) {
			jQuery('.alert-cookie').removeClass('show');
			jQuery('.alert-cookie').addClass('hide');
		},
	});
});

	//default product cart
  jQuery(document).on('click', '.cart', function(e){
	var parent = jQuery(this);
	var products_id = jQuery(this).attr('products_id');
  var campaign_id = jQuery(this).attr('campaign_id');
	var message ;
  jQuery(function ($) {
	jQuery.ajax({

		url: '{{ URL::to("/addToCart")}}',
    headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},

		type: "POST",
		data: '&products_id='+products_id+'&campaign_id='+campaign_id,
		success: function (res) {
			if(res.status == 'exceed'){
				notificationWishlist("@lang('website.Ops! Product is available in stock But Not Active For Sale. Please contact to the admin')");
			}
			else{
				jQuery('.head-cart-content').html(res);
				jQuery(parent).removeClass('cart');
        jQuery(parent).addClass('added');
				jQuery(parent).attr('href','{{url('/viewcart')}}');
				// jQuery(parent).html("");

				jQuery.ajax({

					url: '{{ URL::to("/addToCartFixed")}}',
					headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},

					type: "POST",
					data: '&products_id='+products_id,
					success: function (res) {            
						jQuery('.head-cart-content-fixed').html(res);
					},
				});


				jQuery.ajax({

					url: '{{ URL::to("/addToCartResponsive")}}',
					headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},

					type: "POST",
					data: '&products_id='+products_id,
					success: function (res) {            
						jQuery('#resposive-header-cart').html(res);
					},
				});

				notificationWishlist("Product added successfully!");
			}

		},
	});
 });
});


  @if(!empty($result['detail']['product_data'][0]->products_type) and $result['detail']['product_data'][0]->products_type==1)
		getQuantity();
		cartPrice();
  @endif

  function cartPrice(){
    var i = 0;
    jQuery(".currentstock").each(function() {
      var value_price = jQuery('option:selected', this).attr('value_price');
      var attributes_value = jQuery('option:selected', this).attr('attributes_value');
      var prefix = jQuery('option:selected', this).attr('prefix');
      jQuery('#attributeid_' + i).val(value_price);
      jQuery('#attribute_sign_' + i++).val(prefix);

    });
  }

//ajax call for add option value
function getQuantity(){
	var attributeid = [];
	var i = 0;
	
	jQuery('.stock-cart').attr('hidden', true);

	jQuery(".currentstock").each(function() {
		var value_price = jQuery('option:selected', this).attr('value_price');
		var attributes_value = jQuery('option:selected', this).attr('attributes_value');
		jQuery('#function_' + i).val(value_price);
		jQuery('#attributeids_' + i++).val(attributes_value);
	});

	var formData = jQuery('#add-Product-form').serialize();
	jQuery.ajax({
		headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},
		url: '{{ URL::to("getquantity")}}',
		type: "POST",
		data: formData,
		dataType: "json",
		success: function (res) {
			var products_price = jQuery('#products_price').val();

			jQuery('#current_stocks').html(res.remainingStock);
			var min_level = 0;
			var max_level = 0;
			var inventory_ref_id = res.inventory_ref_id;
			

			if(res.minMaxLevel != '' && res.minMaxLevel > 0){
				min_level = res.minMax[0].min_level;
				max_level = res.minMax[0].max_level;
			}
			if(min_level != 0){
				jQuery('.qty').attr('value',min_level);
				jQuery('.qty').attr('min',min_level);
			}else{
				min_level = 1;
				jQuery('.qty').attr('value',min_level);
				jQuery('.qty').attr('min',min_level);

			}
			var final_pri = products_price * min_level;
			if(res.remainingStock>0){
				jQuery('#min_max_setting').html("&nbsp; @lang('website.Min Order Limit:')" + min_level);
				jQuery('.stock-cart').removeAttr('hidden');
				jQuery('.stock-out-cart').attr('hidden',true);
				var max_order = jQuery('#max_order').val();

				if(max_order.trim()!=0){
					if(max_order.trim()>=res.remainingStock){
						jQuery('.qty').attr('max',res.remainingStock);
					}else{
						jQuery('.qty').attr('max',max_order);
					}
				}else{
					jQuery('.qty').attr('max',res.remainingStock);
				}
			}else{
				jQuery('#min_max_setting').html("");
				jQuery('.stock-out-cart').removeAttr('hidden');
				jQuery('.stock-cart').attr('hidden',true);
				jQuery('.qty').attr('max',0);
				document.getElementById("myCheck").click();
			}

		},
	});
}
  
	// This button will increment the value
  jQuery(document).on('click', '.qtyplus', function(e){
		// Stop acting like a button
		e.preventDefault();
		// Get its current value
    var currentVal = parseInt(jQuery('.qty').val());
		var maximumVal =  jQuery('.qty').attr('max');
		// If is not undefined
		if (!isNaN(currentVal)) {
			if(maximumVal!=0){
				if(currentVal < maximumVal ){
					// Increment
					jQuery('.qty').val(currentVal + 1);
				}
			}

		} else {
      // Otherwise put a 0 there
      jQuery('.qty').val(0);
		}

		var qty = jQuery('.qty').val();
		var products_price = jQuery('#products_price').val();
		var total_price = parseFloat(qty) * parseFloat(products_price) * <?=session('currency_value')?>;
		jQuery('.total_price').html('<?=Session::get('symbol_left')?>'+total_price.toFixed(2)+'<?=Session::get('symbol_right')?>');
    updateCartAjax();
});


// This button will decrement the value till 0
jQuery(document).on('click', '.qtyminus', function(e){

    // Stop acting like a button
    e.preventDefault();

    // Get the field name
    //fieldName = jQuery(this).attr('field');
    var maximumVal =  jQuery('.qty').attr('max');
    var minimumVal =  jQuery('.qty').attr('min');

    // Get its current value
    var currentVal = parseInt(jQuery('.qty').val());
    // If it isn't undefined or its greater than 0
    if (!isNaN(currentVal) && currentVal > minimumVal) {
      // Decrement one
      jQuery('.qty').val(currentVal - 1);

    } else {
      // Otherwise put a 0 there
      jQuery('.qty').val(minimumVal);

    }

    var qty = jQuery('.qty').val();
    var products_price = jQuery('#products_price').val();
    var total_price = parseFloat(qty) * parseFloat(products_price) * <?=session('currency_value')?>;
    jQuery('.total_price').html('<?=Session::get('symbol_left')?>'+total_price.toFixed(2)+'<?=Session::get('symbol_right')?>');
    updateCartAjax();

});

//add-to-Cart with custom options
// jQuery(document).on('click', '.add-to-Cart', function(e){
// 	var formData = jQuery("#add-Product-form").serialize();
	
//  var url = jQuery('#checkout_url').val();
//  var message;
//  jQuery.ajax({
// 	 url: '{{ URL::to("/addToCart")}}',
// 	 headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},

// 	 type: "POST",
// 	 data: formData,

// 	 success: function (res) {
// 		 if(res['status'] == 'exceed'){
// 		   notificationWishlist("@lang('website.Ops! Product is available in stock But Not Active For Sale. Please contact to the admin')");
//       }
// 		 else {
// 			 jQuery('.head-cart-content').html(res);
// 			 jQuery(parent).addClass('active');

// 			 jQuery.ajax({

// 			url: '{{ URL::to("/addToCartFixed")}}',
// 			headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},

// 				type: "POST",
// 				data: '&products_id='+'',
// 				success: function (res) {            
// 					jQuery('.head-cart-content-fixed').html(res);
// 				},
// 			});
// 		   	 notificationWishlist("@lang('website.Product Added Successfully Thanks.Continue Shopping')");
// 			 //alert("Congrates!", "Product Added Successfully Thanks.Continue Shopping", "success",{button: false});

// 		 }

// 		 }
//  });
// });

var abc = jQuery('.cartItems').html();
if (abc > 0) {
  jQuery('.prcdChckt').addClass('added');
}

jQuery("body").delegate(".cartBtn", "click", function(){
   jQuery(this).addClass('added');
   jQuery('.prcdChckt').addClass('added');
   // jQuery('.header .logoBar .logoRight li.cart-header.dropdown.head-cart-content').append('<li><a href="https://lucramania.com/viewcart">Proceed to Checkout</a></li>');
   // jQuery('.cart-header').addClass('wow fadeIn animated');
    setTimeout(function(){
        jQuery('.cartBtn').removeClass('added');
      }, 2000);
});
function addToCart(p_id,p_price,cam_id){

 
  // var formData = jQuery("#add-Product-form").serialize();
  var checkout_url=$('#checkout_url').val();
 var qty=jQuery('#quantity_'+cam_id).val();
  var formData={products_id:p_id,products_price:p_price,checkout_url:checkout_url,quantity:qty,campaign_id:cam_id};
 var url = jQuery('#checkout_url').val();
 var message;
 jQuery.ajax({
   url: '{{ URL::to("/addToCart")}}',
   headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},

   type: "POST",
   data: formData,

   success: function (res) {
     if(res['status'] == 'exceed'){
       notificationWishlist("@lang('website.Ops! Product is available in stock But Not Active For Sale. Please contact to the admin')");
      }
     else {
       jQuery('.head-cart-content').html(res);
       
       jQuery(parent).addClass('active');

       jQuery.ajax({

      url: '{{ URL::to("/addToCartFixed")}}',
      headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},

        type: "POST",
        data: '&products_id='+'',
        success: function (res) {     
          jQuery(this).addClass('sak');       
          // jQuery('.head-cart-content-fixed').html(res);
          // jQuery(".cartItems").html(parseInt(jQuery(".cartItems").text())+1);
        },
      });
         notificationWishlist("Product added successfully!");
       //alert("Congrates!", "Product Added Successfully Thanks.Continue Shopping", "success",{button: false});

     }
     window.location.href = "/viewcart";
     }
 });
}





  
jQuery(document).ready(function() {
  @if(!empty($result['detail']['product_data'][0]->attributes))
    @foreach( $result['detail']['product_data'][0]->attributes as $key=>$attributes_data )
  @php
    $functionValue = 'attributeid_'.$key;
    $attribute_sign = 'attribute_sign_'.$key++;
  @endphp

  //{{ $functionValue }}();
	function {{ $functionValue }}(){
	    var value_price = jQuery('option:selected', ".{{$functionValue}}").attr('value_price');
	    jQuery("#{{ $functionValue }}").val(value_price);
	  }
	  //change_options
	jQuery(document).on('change', '.{{ $functionValue }}', function(e){

		    var {{ $functionValue }} = jQuery("#{{ $functionValue }}").val();

		    var old_sign = jQuery("#{{ $attribute_sign }}").val();

		    var value_price = jQuery('option:selected', this).attr('value_price');
		    var prefix = jQuery('option:selected', this).attr('prefix');
		    var current_price = jQuery('#products_price').val();
		    var {{ $attribute_sign }} = jQuery("#{{ $attribute_sign }}").val(prefix);

		    if(old_sign.trim()=='+'){
		      var current_price = current_price - {{ $functionValue }};
		    }

		    if(old_sign.trim()=='-'){
		      var current_price = parseFloat(current_price) + parseFloat({{ $functionValue }});
		    }

		    if(prefix.trim() == '+' ){
		      var total_price = parseFloat(current_price) + parseFloat(value_price);
		    }
		    if(prefix.trim() == '-' ){
		      total_price = current_price - value_price;
		    }

		    jQuery("#{{ $functionValue }}").val(value_price);
		    jQuery('#products_price').val(total_price);
		    var qty = jQuery('.qty').val();
		    var products_price = jQuery('#products_price').val();
		    var total_price = qty * products_price * <?=session('currency_value')?>;
		    jQuery('.total_price').html('<?=Session::get('symbol_left')?>'+total_price.toFixed(2)+'<?=Session::get('symbol_right')?>');

	});
	@endforeach
	getQuantity();
	calculateAttributePrice();
	function calculateAttributePrice(){
	  var products_price = jQuery('#products_price').val();
	  jQuery(".currentstock").each(function() {
	    var value_price  = jQuery('option:selected', this).attr('value_price');
	    var prefix = jQuery('option:selected', this).attr('prefix');

	    if(prefix.trim()=='+'){
	      products_price = parseFloat(products_price) + parseFloat(value_price);
	    }

	    if(prefix.trim()=='-'){
	      products_price = parseFloat(products_price) - parseFloat(value_price);
	    }

	  });
	  jQuery('#products_price').val(products_price);
	  jQuery('.total_price').html('<?=Session::get('symbol_left')?>'+products_price.toFixed(2)+'<?=Session::get('symbol_right')?>');
	}

	@endif

});

jQuery(".rating").click(function(e) {
  if(jQuery(this).prop('checked') == true){
    jQuery('#review_button').removeAttr('disabled');
  }
})


//review ajax
jQuery("#idForm").submit(function(e) {
  jQuery('#review-error').attr('hidden',true);

e.preventDefault(); // avoid to execute the actual submit of the form.

var form = jQuery(this);
var url = form.attr('action');
var reviews_text = jQuery('#reviews_text').val();
if(reviews_text != ''){
  jQuery('#review_button').attr('disabled', true);
  jQuery.ajax({
        headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},
        type: "POST",
        url: "{{url('/reviews')}}",
        data: form.serialize(), // serializes the form's elements.
        success: function(data)
        {
          if(data == 'done'){
              document.getElementById('idForm').reset();
              notificationWishlist("@lang('website.Thanks For Your Time And Considration For Providing FeedBack For This Product')");
          }else if(data == 'not_login'){
              notificationWishlist("@lang('website.In Order To Give FeedBack You Have Must Login First. Thanks')");

          }
          else{
              notificationWishlist("@lang('website.You Have Already Given The Comment. Thanks')");

          }
          jQuery('#review_button').attr('disabled', false);
        }
      });
}else{
  jQuery('#review-error').removeAttr('hidden');
}

});



//cart item price

jQuery(".qtyminuscart").click(function(e) {

  // Stop acting like a button
  e.preventDefault();
 
  // Get the field name
  fieldName = jQuery(this).attr('field');

  // Get its current value
  var currentVal = parseInt(jQuery(this).next('.qty').val());
 
  var minimumVal =  jQuery(this).next('.qty').attr('min');
  // If it isn't undefined or its greater than 0
  if (!isNaN(currentVal) && currentVal > minimumVal) {
    // Decrement one
    jQuery(this).next('.qty').val(currentVal - 1);

  } else {
    // Otherwise put a 0 there
    jQuery(this).next('.qty').val(minimumVal);

  }
  updateCartAjax("min");
});

jQuery('.qtypluscart').click(function(e){
		e.preventDefault();
		// Get the field name
		//fieldName = jQuery(this).attr('field');
		// Get its current value
    var currentVal = parseInt(jQuery(this).prev('.qty').val());   
   
		var maximumVal =  jQuery(this).prev('.qty').attr('max');
    
		//alert(maximum);
		// If is not undefined
		if (!isNaN(currentVal)) {
			if(maximumVal!=0){
				if(currentVal < maximumVal ){
					// Increment
					jQuery(this).prev('.qty').val(currentVal+1);
				}
			}
     

		} else {
			// Otherwise put a 0 there
			jQuery(this).prev('.qty').val(currentVal);
		}
    updateCartAjax("plus");
});

jQuery(".qtyminuscheckout").click(function(e) {

  // Stop acting like a button
  e.preventDefault();
  

  // Get the field name
  fieldName = jQuery(this).attr('field');

  // Get its current value
  var currentVal = parseInt(jQuery(this).next('.qty').val());
  var minimumVal =  jQuery(this).next('.qty').attr('min');
  // If it isn't undefined or its greater than 0
  if (!isNaN(currentVal) && currentVal > minimumVal) {
    // Decrement one
    jQuery(this).next('.qty').val(currentVal - 1);
  } else {
    // Otherwise put a 0 there
    jQuery(this).next('.qty').val(minimumVal);

  }


  updateCheckoutCartAjax("min");
});

jQuery('.qtypluscheckout').click(function(e){
    e.preventDefault();
    // Get the field name
    //fieldName = jQuery(this).attr('field');
    // Get its current value
    var currentVal = parseInt(jQuery(this).prev('.qty').val());   
    var maximumVal =  jQuery(this).prev('.qty').attr('max');


    //alert(maximum);
    // If is not undefined
    if (!isNaN(currentVal)) {
      if(maximumVal!=0){
        if(currentVal < maximumVal ){
          // Increment
          jQuery(this).prev('.qty').val(currentVal + 1);
        }
      }

    } else {
      // Otherwise put a 0 there
      jQuery(this).prev('.qty').val(0);
    }
    updateCheckoutCartAjax("plus");
});
	//update_cart
jQuery(document).on('click', '#update_cart', function(e){
	jQuery('#loader').css('display','block');
	jQuery("#update_cart_form").submit();
});


// jQuery(document).on('click', '#btn-plus', function(e){
  
// });
// jQuery(document).on('click', '#btn-minus ', function(e){
//   var cart = jQuery( "input[name ^='cart']" ).serializeArray();
//   var quantity = jQuery( "input[name ^='quantity']" ).serializeArray();
//   jQuery.ajax({
//       headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},
//       url: '{{ URL::to("/updateCartAjax")}}',
//       type: "POST",
//       data:{cart:cart,quantity:quantity},
//       success: function (res) {
//         jQuery('.respCart').html(res);
//       },
//     });
// });
	//apply_coupon_cart


  jQuery(document).on('submit', '#apply_coupon', function(e){
		jQuery('#coupon_code').remove('error');
		jQuery('#coupon_require_error').hide();
		jQuery('#loader').show();

		if(jQuery('#coupon_code').val().length > 0){
			var formData = jQuery(this).serialize();
			jQuery.ajax({
				headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},
				url: '{{ URL::to("/apply_coupon")}}',
				type: "POST",
				data: formData,
				success: function (res) {
					var obj = JSON.parse(res);
					var message = obj.message;
					jQuery('#loader').hide();
					if(obj.success==0){
						jQuery("#coupon_error").html(message).show();
						return false;
					}else if(obj.success==2){
						jQuery("#coupon_error").html(message).show();
						return false;
					}else if(obj.success==1){
						window.location.reload(true);
					}
				},
			});
		}else{
			jQuery('#loader').css('display','none');
			jQuery('#coupon_code').addClass('error');
			jQuery('#coupon_require_error').show();
			return false;
		}
		jQuery('#loader').hide();
		return false;
});
	//coupon_code
jQuery(document).on('keyup', '#coupon_code', function(e){
		jQuery("#coupon_error").hide();
		if(jQuery(this).val().length >0){
			jQuery('#coupon_code').removeClass('error');
			jQuery('#coupon_require_error').hide();
		}else{
			jQuery('#coupon_code').addClass('error');
			jQuery('#coupon_require_error').show();
		}

});


        jQuery('.form-control').change(function(){
          var abc = jQuery(this).val();
          if (jQuery(abc !== "")) {
            jQuery(this).closest(".form-group").removeClass('has-error');
          }
        });

//         jQuery(document).keypress(function (e) {
//   if(e.which == 13) 
//   return false;
// });

        // document.getElementsByClassName( ".form-control" ).addEventListener( "invalid",
        // function( event ) {
        //     event.preventDefault();
        // });


        jQuery(".toggle-password, .toggle-password2, .toggle-password3, .toggle-password4, .toggle-password5, .toggle-password6").click(function() {
          // alert('aa');
          // jQuery(this).text('Hide');
          jQuery(this).html('<i class="fas fa-eye-slash"></i>');
          var input = jQuery(jQuery(this).attr("toggle"));
          if (input.attr("type") == "password") {
            input.attr("type", "text");
          } else {
           // jQuery(this).text('Show');
           jQuery(this).html('<i class="fas fa-eye"></i>');
           input.attr("type", "password");
         }
       });

//         var holdStarter = null;

// // This is how many milliseconds to wait before recognizing a hold
// var holdDelay = 100;

// // This flag indicates the user is currently holding the mouse down
// var holdActive = false;

// // MouseDown
// if (jQuery('.toggle-password').mousedown(onMouseDown)) {
// jQuery('.toggle-password').mousedown(onMouseDown);
// function onMouseDown(){
//     // Do not take any immediate action - just set the holdStarter
//     //  to wait for the predetermined delay, and then begin a hold
//     holdStarter = setTimeout(function() {
//     holdStarter = null;
//     holdActive = true;
//     // begin hold-only operation here, if desired
//         jQuery('.toggle-password').text('hide');
//   }, holdDelay);
// }
// }
// else{
//   jQuery('.toggle-password').text('show');
// }


function checkPhone() {
    // var phone = document.forms["updateMyProfile"]["phone"].value;
    // var phoneNum = phone.replace(/[^\d]/g, '');

    // if (phoneNum.length == 9) {
    //     document.getElementsByClass("phone").className = 'form-control field-validate';
    //     return true;
    // } 
    // else{
    //     document.getElementById("phone").className = 'error form-control field-validate';
    //     return false;
    // }
    var error='';
    jQuery(".new-number-validate").each(function() {
      var phone = jQuery(this).val();
      var phoneNum = phone.replace(/[^\d]/g, '');
      if (phoneNum.length == 9) {
        jQuery(this).closest(".form-group").removeClass('new-has-error');
         jQuery(this).next(".error-content").attr('hidden', true);
         
      } 
      else{
        jQuery(this).closest(".form-group").addClass('new-has-error');
         jQuery(this).next(".error-content").removeAttr('hidden');
         error='has error';
      }
    });
    if(error=="has error"){
        return false;

      }
}


//validate form
// jQuery(document).on('submit', '.form-validate', function(e){
  function loginfieldvalidate()
  {

    var error = "";
    jQuery(".login-field-validate").each(function() {
    		if(this.value == '') {
    			jQuery(this).closest(".form-group").addClass('has-error');
    			jQuery(this).next(".error-content").removeAttr('hidden');
    			error = "has error";
    		}else{
    			jQuery(this).closest(".form-group").removeClass('has-error');
    			jQuery(this).next(".error-content").attr('hidden', true);
    		}
    });
    

    jQuery(".login-email-validate").each(function() {
    		var validEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
    		if(this.value != '' && validEmail.test(this.value)) {
    			jQuery(this).closest(".form-group").removeClass('has-error');
    			jQuery(this).next(".error-content").attr('hidden', true);
    		}else{
    			jQuery(this).closest(".form-group").addClass('has-error');
    			jQuery(this).next(".error-content").removeAttr('hidden');
    			error = "has error";
    		}
    });

    jQuery(".checkbox-validate").each(function() {

    		if(jQuery(this).prop('checked') == true){
    			jQuery(this).closest(".form-group").removeClass('has-error');
    			jQuery(this).closest('.checkbox-parent').children('.error-content').attr('hidden', true);
    		}else{
    			jQuery(this).closest(".form-group").addClass('has-error');
    			jQuery(this).closest('.checkbox-parent').children('.error-content').removeAttr('hidden');

    			error = "has error";
    		}

    	});



    	if(error=="has error"){
    		return false;

    	}else{
          jQuery( ".login-form-validate" ).submit();
      }
}
function alphaOnly(event) {
  var key = event.keyCode;
  return ((key >= 65 && key <= 90) || key == 8);
};

      
   

    // function CharLimit(input, maxChar) {
    // 	// alert('av');
    //     var len = jQuery(input).val().length;
    //     if (len > maxChar) {
    //         jQuery(input).val(jQuery(input).val().substring(0, maxChar));
    //     }
    // }
function profilefieldvalidate()
  {
    var error = "";
    jQuery(".profile-field-validate").each(function() {
        if(this.value == '') {
          jQuery(this).closest(".form-group").addClass('has-error');
          jQuery(this).next(".error-content").removeAttr('hidden');
          error = "has error";
        }else{
          jQuery(this).closest(".form-group").removeClass('has-error');
          jQuery(this).next(".error-content").attr('hidden', true);
        }
    });
    var check = 0;
    var password='';
    

    jQuery(".profile-number-validate").each(function() {
      var phone = jQuery(this).val();
      var phoneNum = phone.replace(/[^\d]/g, '');
      if (phoneNum.length == 9) {
        jQuery(this).closest(".form-group").removeClass('has-error');
        jQuery(this).next(".error-content").attr('hidden', true);
      } 
      else{
        jQuery(this).closest(".form-group").addClass('has-error');
        jQuery(this).next(".error-content").removeAttr('hidden');
        error = "has error";
      }
    });
      if( error=="has error" ){
        return false;
      } else {
        jQuery(".profile-form-validate").submit();
      }
}


  function openResCvv(cardid){
    // alert("cardid");
      jQuery('.selectChecker').hide();
    jQuery('.cvv_'+cardid).show();
}
function changepasswordfieldvalidate()
  {
    var error = "";
    jQuery(".change-prssword-field-validate").each(function() {
        if(this.value == '') {
          jQuery(this).closest(".form-group").addClass('has-error');
          jQuery(this).next(".error-content").removeAttr('hidden');
          error = "has error";
        }else{
          jQuery(this).closest(".form-group").removeClass('has-error');
          jQuery(this).next(".error-content").attr('hidden', true);
        }
    });
    jQuery(".c-password").each(function() {
       if(jQuery(this).val() == jQuery(".changepassword").val())
       {
          jQuery(this).closest(".form-group").removeClass('has-error');
          jQuery(this).next(".error-content").attr('hidden', true);
       }else{
        jQuery(this).closest(".form-group").addClass('has-error');
          jQuery(this).next(".error-content").removeAttr('hidden');
          error = "has error";
       }

    });

      if(error=="has error"){
        return false;

      }else{
          jQuery(".change-password-form123")[0].submit();
      }
}
function contactfieldvalidate()
  {
    var error = "";
    jQuery(".contact-field-validate").each(function() {
        if(this.value == '') {
          jQuery(this).closest(".form-group").addClass('has-error');
          jQuery(this).next(".error-content").removeAttr('hidden');
          error = "has error";
        }else{
          jQuery(this).closest(".form-group").removeClass('has-error');
          jQuery(this).next(".error-content").attr('hidden', true);
        }
    });
    jQuery(".contact-number-validate").each(function() {
      var phone = jQuery(this).val();
      var phoneNum = phone.replace(/[^\d]/g, '');
      if (phoneNum.length == 9) {
        jQuery(this).closest(".form-group").removeClass('has-error');
         jQuery(this).next(".error-content").attr('hidden', true);
         
      } 
      else{
        jQuery(this).closest(".form-group").addClass('has-error');
         jQuery(this).next(".error-content").removeAttr('hidden');
         error = "has error";
      }
    });

      if(error=="has error"){
        return false;

      }else{
          jQuery(".contct-form-validate").submit();
      }
}
function editcontactfieldvalidate()
  {
    var error = "";
    jQuery(".edit-contact-field-validate").each(function() {
        if(this.value == '') {
          jQuery(this).closest(".form-group").addClass('has-error');
          jQuery(this).next(".error-content").removeAttr('hidden');
          error = "has error";
        }else{
          jQuery(this).closest(".form-group").removeClass('has-error');
          jQuery(this).next(".error-content").attr('hidden', true);
        }
    });
    jQuery(".edit-contact-number-validate").each(function() {
      var phone = jQuery(this).val();
      var phoneNum = phone.replace(/[^\d]/g, '');
      if (phoneNum.length == 9) {
        jQuery(this).closest(".form-group").removeClass('has-error');
         jQuery(this).next(".error-content").attr('hidden', true);
         
      } 
      else{
        jQuery(this).closest(".form-group").addClass('has-error');
         jQuery(this).next(".error-content").removeAttr('hidden');
         error = "has error";
      }
    });

      if(error=="has error"){
        return false;

      }else{
          jQuery(".edit-contact-form-validate").submit();
      }
}

function getCity(element){
 var routename=  "{{ \Request::route()->getName()}}";
 var classname="";
 var formclass="";
if( ($("#addressModal").hasClass("show")) ){
   classname= "contact-field-validate";
   formclass= ".contct-form-validate";

}else{
   classname= "checkout-contact-field-validate";
   formclass= ".checkoutForm";
}
  if(element.value==231){
    $(formclass+" .citydropdown  ").removeClass("d-none");
    $(formclass+".citydropdown select ").addClass(classname);
       $(formclass+" .citydropdown select").val("")

        $(formclass+" .citytext input").removeClass(classname);
    $(formclass+" .citytext").addClass("d-none");
  }else{
     $(formclass+" .citytext input").val("")
    $(formclass+" .citytext ").removeClass("d-none");
    $(formclass+" .citydropdown").addClass("d-none");

    $(formclass+" .citytext input").addClass(classname);
        $(formclass+" .citydropdown select").removeClass(classname);
    
  }


}


function getCityedit(element){
  if(element.value==231){
    $(" #deliveryEditModal .citydropdown  ").removeClass("d-none");
    $("#deliveryEditModal .citydropdown   ").removeClass("d-none");
         $("#deliveryEditModal .citydropdown select,#deliveryEditModal .phone,#deliveryEditModal .citytext input").val("")
    $("#deliveryEditModal .citydropdown select   ").addClass("edit-contact-field-validate");
        $("#deliveryEditModal .citytext input").removeClass("edit-contact-field-validate");
    $("#deliveryEditModal .citytext").addClass("d-none");
      $(" #deliveryEditModal .citydropdown select").val("")
  }else{

      $("#deliveryEditModal .citytext input,#deliveryEditModal .phone,#deliveryEditModal .citydropdown select").val("")
    $("#deliveryEditModal .citytext ").removeClass("d-none");
    $("#deliveryEditModal .citydropdown").addClass("d-none");

    $("#deliveryEditModal .citytext input").addClass("edit-contact-field-validate");
        $("#deliveryEditModal .citydropdown select").removeClass("edit-contact-field-validate");
    
  }


}
function contactuscontactfieldvalidate()
  {
    var error = "";
    jQuery(".contact-us-field-validate").each(function() {
        if(this.value == '') {
          jQuery(this).closest(".form-group").addClass('has-error');
          jQuery(this).next(".error-content").removeAttr('hidden');
          error = "has error";
        }else{
          jQuery(this).closest(".form-group").removeClass('has-error');
          jQuery(this).next(".error-content").attr('hidden', true);
        }
    });
    jQuery(".contact-us-email").each(function() {
        var validEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
        if(this.value != '' && validEmail.test(this.value)) {
          jQuery(this).closest(".form-group").removeClass('has-error');
          jQuery(this).next(".error-content").attr('hidden', true);
        }else{
          jQuery(this).closest(".form-group").addClass('has-error');
          jQuery(this).next(".error-content").removeAttr('hidden');
          error = "has error";
        }
    });

      if(error=="has error"){
        return false;

      }else{
          jQuery("input[name=_token]").val('<?php echo csrf_token(); ?>');
          jQuery(".contact-us-form-validate").submit();
          // $.ajax({
          //   method: "POST",
          //   url: "some.php",
          //   data: { name: "John", location: "Boston" }
          // })
          //   .done(function( msg ) {
          //     alert( "Data Saved: " + msg );
          //   });
          notificationcontactus("Message sent successfully!");
          // jQuery('#contact-us')[0].reset();
      }
}

function notificationcontactus(param){

    jQuery('#notificationWishlist').html(param);
    jQuery('#notificationWishlist').show().css('opacity', '1');
    // jQuery('.cartBtn').addClass('added');
    setTimeout(function(){
        jQuery('#notificationWishlist').css('top', '-700px').css('left', '-1300px').css('opacity', '0');
        // jQuery('.cartBtn').removeClass('added');
      }, 2000);
    setTimeout(function(){
      jQuery('#notificationWishlist').css('top', '0').css('left', '0');
    }, 3000);
    
}
function checkoutcontactfieldvalidate()
  {
    var error = "";
    jQuery(".checkout-contact-field-validate").each(function() {
        if(this.value == '') {
          jQuery(this).closest(".form-group").addClass('has-error');
          jQuery(this).next(".error-content").removeAttr('hidden');
          error = "has error";
        }else{
          jQuery(this).closest(".form-group").removeClass('has-error');
          jQuery(this).next(".error-content").attr('hidden', true);
        }
    });
    jQuery(".checkout-contact-number-validate").each(function() {
      var phone = jQuery(this).val();
      var phoneNum = phone.replace(/[^\d]/g, '');
      if (phoneNum.length) {
        jQuery(this).closest(".form-group").removeClass('has-error');
         jQuery(this).next(".error-content").attr('hidden', true);
         
      } 
      else{
        jQuery(this).closest(".form-group").addClass('has-error');
         jQuery(this).next(".error-content").removeAttr('hidden');
         error = "has error";
      }
    });

      if(error=="has error"){
        return false;

      }else{
          jQuery(".checkout-address-form-validate")[0].submit();
      }
}
function checkoutcontactcardfieldvalidate()
  {
    var error = "";
    jQuery(".contact-card-number-validation").each(function() {
        if(this.value == '') {
          jQuery(this).closest(".form-group").addClass('has-error');
          jQuery(this).next(".error-content").removeAttr('hidden');
          error = "has error";
        }else{
          jQuery(this).closest(".form-group").removeClass('has-error');
          jQuery(this).next(".error-content").attr('hidden', true);
        }
    });
   

      if(error=="has error"){
        return false;

      }else{
          jQuery(".contact-card-number-form-validate")[0].submit();
      }
}
function forgetfieldvalidate()
  {
    var error = "";
    jQuery(".forget-field-validate").each(function() {
        if(this.value == '') {
          jQuery(this).closest(".form-group").addClass('has-error');
          jQuery(this).next(".error-content").removeAttr('hidden');
          error = "has error";
        }else{
          jQuery(this).closest(".form-group").removeClass('has-error');
          jQuery(this).next(".error-content").attr('hidden', true);
        }
    });
    jQuery(".forget-email").each(function() {
        var validEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
        if(this.value != '' && validEmail.test(this.value)) {
          jQuery(this).closest(".form-group").removeClass('has-error');
          jQuery(this).next(".error-content").attr('hidden', true);
        }else{
          jQuery(this).closest(".form-group").addClass('has-error');
          jQuery(this).next(".error-content").removeAttr('hidden');
          error = "has error";
        }
    });
      if(error=="has error"){
        return false;

      }else{
          jQuery(".forgot-pass-form-validate")[0].submit();
         notificationcontactus("Email sent successfully!");
          jQuery('.forgot-pass-form-validate')[0].reset();
      }
}

// function notificationcontactus(param){

//     jQuery('#notificationWishlist').html(param);
//     jQuery('#notificationWishlist').show().css('opacity', '1');
//     // jQuery('.cartBtn').addClass('added');
//     setTimeout(function(){
//         jQuery('#notificationWishlist').css('top', '-700px').css('left', '-1300px').css('opacity', '0');
//         // jQuery('.cartBtn').removeClass('added');
//       }, 2000);
//     setTimeout(function(){
//       jQuery('#notificationWishlist').css('top', '0').css('left', '0');
//     }, 3000);
    
// }


function  descriptionins()
{
  var error='';
  jQuery(".description_ins").each(function() {
        if(this.value == '') {
          jQuery(this).closest(".form-group").addClass('has-error');
          jQuery(this).next(".error-content").removeAttr('hidden');
          error = "has error";
        }else{
          jQuery(this).closest(".form-group").removeClass('has-error');
          jQuery(this).next(".error-content").attr('hidden', true);
        }
    });
  if(error=="has error"){
        return false;

      }else{
          jQuery( ".contctFormIns" ).submit();
      }
}

// });
// //focus form field
// jQuery(document).on('keyup focusout change', '.field-validate', function(e){
// 	if(this.value == '') {
// 		jQuery(this).closest(".form-group").addClass('has-error');
// 		jQuery(this).next(".error-content").removeAttr('hidden');
// 	}else{
// 		jQuery(this).closest(".form-group").removeClass('has-error');
// 		jQuery(this).next(".error-content").attr('hidden', true);
// 	}
// });
// //focus form field
// jQuery(document).on('keyup', '.number-validate', function(e){
// 	if(this.value == '' || isNaN(this.value)) {
// 		jQuery(this).closest(".form-group").addClass('has-error');
// 		jQuery(this).next(".error-content").removeAttr('hidden');
// 	}else{
// 		jQuery(this).closest(".form-group").removeClass('has-error');
// 		jQuery(this).next(".error-content").attr('hidden', true);
// 	}
// });
// //match password
// jQuery(document).on('keyup focusout', '.password', function(e){
// 	var regex = "^\\s+$";
// 	if(this.value.match(regex)) {
// 		jQuery(this).closest(".form-group").addClass('has-error');
// 		jQuery(this).next(".error-content").removeAttr('hidden');
// 	}else{
// 		jQuery(this).closest(".form-group").removeClass('has-error');
// 		jQuery(this).next(".error-content").attr('hidden', true);
// 	}
// });

// jQuery(document).on('keyup focusout', '.email-validate', function(e){

// 	var validEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;

// 	if(this.value != '' && validEmail.test(this.value)) {
// 		jQuery(this).closest(".form-group").removeClass('has-error');
// 		jQuery(this).next(".error-content").attr('hidden', true);
// 	}else{
// 		jQuery(this).closest(".form-group").addClass('has-error');
// 		jQuery(this).next(".error-content").removeAttr('hidden');
// 		error = "has error";
// 	}

// });
  jQuery(document).on('submit', '.form-validate', function(e){
var error = "";
jQuery(".field-validate").each(function() {
    if(this.value == '') {
      jQuery(this).closest(".form-group").addClass('has-error');
      jQuery(this).next(".error-content").removeAttr('hidden');
      error = "has error";
    }else{
      jQuery(this).closest(".form-group").removeClass('has-error');
      jQuery(this).next(".error-content").attr('hidden', true);
    }
});
var check = 0;
// jQuery(".password").each(function() {
//     var regex = "^\\s+$";
//     if(this.value.match(regex)) {
//       jQuery(this).closest(".form-group").addClass('has-error');
//       jQuery(this).next(".error-content").removeAttr('hidden');
//       error = "has error";
//     }else{
//       if(check == 1){
//          var res = passwordMatch();

//           if(res=='matched'){
//             jQuery('.password').closest(".form-group").removeClass('has-error');
//             jQuery('#re_password').closest('.re-password-content').children('.error-content-password').add('hidden');
//           }else if(res=='error'){
//             jQuery('.password').closest(".form-group").addClass('has-error');
//             jQuery('#re_password').closest('.re-password-content').children('.error-content-password').removeAttr('hidden');
//             error = "has error";
//           }
//         }else{
//           jQuery(this).closest(".form-group").removeClass('has-error');
//           jQuery(this).next(".error-content").attr('hidden', true);
//         }
//          check++;
//       }

// });


var phone = document.forms["updateMyProfile"]["phone"].value;
    var phoneNum = phone.replace(/[^\d]/g, '');

    if (phoneNum.length == 9) {
        document.getElementById("phone").className = 'form-control field-validate';
        return true;
    } 
    else{
        document.getElementById("phone").className = 'error form-control field-validate';
        return false;
    }

jQuery(".email-validate").each(function() {
    var validEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
    if(this.value != '' && validEmail.test(this.value)) {
      jQuery(this).closest(".form-group").removeClass('has-error');
      jQuery(this).next(".error-content").attr('hidden', true);
    }else{
      jQuery(this).closest(".form-group").addClass('has-error');
      jQuery(this).next(".error-content").removeAttr('hidden');
      error = "has error";
    }
});

jQuery(".checkbox-validate").each(function() {

    if(jQuery(this).prop('checked') == true){
      jQuery(this).closest(".form-group").removeClass('has-error');
      jQuery(this).closest('.checkbox-parent').children('.error-content').attr('hidden', true);
    }else{
      jQuery(this).closest(".form-group").addClass('has-error');
      jQuery(this).closest('.checkbox-parent').children('.error-content').removeAttr('hidden');

      error = "has error";
    }

  });



  if(error=="has error"){

    return false;

  }
});
function showDeliveryInstruction(location_id){
  jQuery.ajax({
    headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},
    url: '{{ URL::to("/get-delivery-instruction")}}',
    type: "POST",
    data: 'location_id='+location_id,
    success: function (result) {
      // console.log(result);
      jQuery("#address-wrapper").html(result);
      jQuery("#deliveryModal").modal('show');
      
    },
  });
}  
  
function editDeliveryInstruction(id){
  jQuery.ajax({
    headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},
    url: '{{ URL::to("/edit-location")}}',
    type: "POST",
    data: 'id='+id,
    success: function (result) {
      // console.log(result);
      jQuery("#deliveryEditModal").html(result);
      jQuery("#deliveryEditModal").modal('show');
      
    },
  });
} 
  $("#ediClos").click(function() {
  alert('3d21');
  $('#deliveryEditModal').modal('hide');
});
// paymentMethods();
// function paymentMethods(){ 
// 	jQuery('#loader').show();
// 	var payment_method = jQuery(".payment_method:checked").val();
// 	jQuery(".payment_btns").hide();

// 	jQuery("#"+payment_method+'_button').show();
// 	jQuery.ajax({
// 		headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},
// 		url: '{{ URL::to("/paymentComponent")}}',
// 		type: "POST",
// 		data: '&payment_method='+payment_method,
// 		success: function (res) {
// 			jQuery('#loader').hide();
// 		},
// 	});

// 	//midtrans transaction
// 	//jQuery(document).on('click', '#midtrans_button', function(e){

// 		if(payment_method == 'banktransfer'){
// 			jQuery('#payment_description').show();
// 		}else{
// 			jQuery('#payment_description').hide();
// 		}
		
// 		if(payment_method == 'midtrans'){
// 			jQuery('#loader').show();
// 			jQuery.ajax({
// 				headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},
// 				url: '{{ URL::to("/midtrans/transaction")}}',
// 				type: "get",
// 				success: function (res) {
// 					jQuery('#loader').hide();
// 					jQuery('#payment_error').hide();
					
// 					var data = JSON.parse(res);
// 					var success = data.status;
// 					var message = data.message;
// 					var token = data.token;

// 					if(success==1){
// 						//var url = data.data.authorization_url;
// 						//window.location.href = url;
//             fbq('track', 'Purchase', {currency: "AED", value: jQuery(".totalPrice").text()});
// 						jQuery('#midtransToken').val(token);
						

// 					}else{
// 						jQuery('#payment_error').show();
// 						jQuery('#payment_error-error-text').html(message);
// 					}

// 				},
// 			});
// 		}
		

// 	//});

// }
// paymentMethods();
var urlParams = new URLSearchParams(window.location.search);
// console.log(urlParams.has('ref'),'hhh');
jQuery('.payment-message').css('display','none');

var ref_bol = urlParams.has('ref')
if(ref_bol){
  jQuery('.overlayLoader').css('display','block');
  // console.log(urlParams.get('ref'));
  jQuery.ajax({

          url: '{{ URL::to("/getToNetwork")}}',
          headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},

          type: "POST",
          data: {"ref":urlParams.get('ref')},
          success: function (res) {          
          // console.log(urlParams.get('ref'));
          var arr = jQuery.parseJSON(res) ;
          console.log(arr[0].state);
          if(arr[0].state == "CAPTURED"){
          jQuery("#update_cart_form").submit();
        // jQuery('.overlayLoader').css('display','none');
          }
          else{
          jQuery('.payment-message').css('display','block');
          jQuery('.overlayLoader').css('display','none');
          }
          },
        });
}
// jQuery(document).on('click', '#card_label', function(e){
 
// console.log(jQuery(".totalPrice").text())
//      jQuery.ajax({

//           url: '{{ URL::to("/addToNetwork")}}',
//           headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},

//           type: "POST",
//           data: {"value":jQuery(".totalPrice").text(),"address":jQuery(".address").text(),city:jQuery(".city").text()},
//           success: function (res) {          
//           // alert();  
//           // alert(jQuery('#totalPrice'))
//           // jQuery("#totalPrice").text()
//           // alert(jQuery(this).attr('#totalPrice'));
//         //   var elmId = $("#totalPrice").attr("id");
//         // alert(elmId);
//         // var elmId = jQuery.session.get("billing_address");
//         // console.log(elmId)
//           // console.log(res);
//           window.location = res;
//             // jQuery('.head-cart-content-fixed').html(res);
//             // jQuery(".drctChk").addClass("showLess");
//           },
//         });


//    });
function paymentSuccess(result){
	jQuery('#payment_error').hide();
	// console.log(result);
	// console.log(result.status_code);
	result = result.replace(/'/g, "\\'");
	//jQuery('#update_cart_form').prepend('<input type="hidden" name="nonce" value='+JSON.stringify(result)+'>');
	jQuery("#loader").show();
	jQuery("#update_cart_form").submit();
}


//paystack transaction
jQuery(document).on('click', '#paystack_button', function(e){
	jQuery('#loader').show();
	jQuery.ajax({
		headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},
		url: '{{ URL::to("/paystack/transaction")}}',
		type: "get",
		success: function (res) {
			jQuery('#loader').hide();
			jQuery('#payment_error').hide();
			
			var data = JSON.parse(res);
			var success = data.status;
			var message = data.message;
			// console.log(message);
			if(success==true){
				var url = data.data.authorization_url;
				window.location.href = url;
			}else{
				jQuery('#payment_error').show();
				jQuery('#payment_error-error-text').html(message);
			}

		},
	});

});


var resposne = jQuery('#hyperpayresponse').val();
if(typeof resposne  !== "undefined"){
	if(resposne.trim() =='success'){
		jQuery('#loader').show();
		jQuery("#update_cart_form").submit();
	}else if(resposne.trim() =='error'){
		jQuery.ajax({
			headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},
			url: '{{ URL::to("/checkout/payment/changeresponsestatus")}}',
			type: "POST",
			async: false,
			success: function (res) {
			},
		});
		jQuery('#paymentError').css('display','block');
	}
}


//pay_instamojo
jQuery(document).on('click', '#pay_instamojo', function(e){
	var formData = jQuery("#instamojo_form").serialize();
	jQuery.ajax({
		headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},
		url: '{{ URL::to("/pay-instamojo")}}',
		type: "POST",
		data: formData,
		success: function (res) {
			var data = JSON.parse(res);

			var success = data.success;
			if(success==false){
				var phone = data.message.phone;
				var email = data.message.email;

				if(phone != null){
					var message = phone;
				}else if(email != null){
					var message = email;
				}else{
					var message = 'Something went wrong!';
				}

				jQuery('#insta_mojo_error').show();
				jQuery('#instamojo-error-text').html(message);

			}else{
				jQuery('#insta_mojo_error').hide();
				jQuery('#instamojoModel').modal('hide');
				jQuery('#update_cart_form').prepend('<input type="hidden" name="nonce" value='+JSON.stringify(data)+'>');
				jQuery("#update_cart_form").submit();
			}

		},
	});

});

function getZones() {
		jQuery(function ($) {
			jQuery('#loader').show();
			var country_id = jQuery('#entry_country_id').val();
			jQuery.ajax({
				beforeSend: function (xhr) { // Add this line
								xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
				 },
				url: '{{ URL::to("/ajaxZones")}}',
				type: "POST",
				//data: '&country_id='+country_id,
				 data: {'country_id': country_id,"_token": "{{ csrf_token() }}"},

				success: function (res) {
					var i;
					var showData = [];
					for (i = 0; i < res.length; ++i) {
						var j = i + 1;
						showData[i] = "<option value='"+res[i].zone_id+"'>"+res[i].zone_name+"</option>";
					}
					showData.push("<option value='-1'>@lang('website.Other')</option>");
					jQuery("#entry_zone_id").html(showData);
					jQuery('#loader').hide();
				},
			});
		});
};

function getBillingZones() {
	jQuery('#loader').show();
	var country_id = jQuery('#billing_countries_id').val();
	jQuery.ajax({
		headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},
		url: '{{ URL::to("/ajaxZones")}}',
		type: "POST",
		 data: {'country_id': country_id},

		success: function (res) {
			var i;
			var showData = [];
			for (i = 0; i < res.length; ++i) {
				var j = i + 1;
				showData[i] = "<option value='"+res[i].zone_id+"'>"+res[i].zone_name+"</option>";
			}
			showData.push("<option value='Other'>@lang('website.Other')</option>");
			jQuery("#billing_zone_id").html(showData);
			jQuery('#loader').hide();
		},
	});

};

//change password
jQuery(document).on('submit', '#updateMyPassword', function(e){
  //passowrd-error
  var confirm_password = jQuery("#confirm_password").val();
  var new_password = jQuery('#new_password').val();
  var current_password = jQuery('#current_password').val();
  jQuery('#passowrd-error').attr('hidden', true);
      
  if(confirm_password !='' && new_password != '' && current_password !=''){
    if(new_password.length < 6){
      message = "@lang('website.Please enter at least 6 characters')";
      jQuery('#passowrd-error').text(message);
      jQuery('#passowrd-error').removeAttr('hidden');
      return false;
    }

    if(confirm_password == new_password){
      return true;
    }else{
      message = "@lang('website.New and confirm password does not match')";
      jQuery('#passowrd-error').text(message);
      jQuery('#passowrd-error').removeAttr('hidden');
      return false;
    }
    
  }else{
    message = "@lang('website.Please fill all the input fields')";
    jQuery('#passowrd-error').text(message);
    jQuery('#passowrd-error').removeAttr('hidden');
    return false;
  }

});
</script>


<script type="application/javascript">
//header categories
jQuery('.categories-list').on('click', function(e){     
    var category = jQuery(this).attr('value');
    var slug = jQuery(this).attr('slug');
    jQuery('.header-selection').text(category);
    jQuery('.category-value').val(slug);
    jQuery('.dropdown-menu-right').removeClass('show');

});

categoriesLoad();

function categoriesLoad(){  
  var category = jQuery('.selected').attr('value');     
  var slug = jQuery('.selected').attr('slug');
  if ( category !== undefined) {    
      jQuery('.header-selection').text(category);
      jQuery('.category-value').val(slug);
      jQuery('.dropdown-menu-right').removeClass('show');
  }
    
}

@if(Request::path() == 'profile')
  jQuery(function() {
    jQuery('.datepicker').datepicker({
      changeMonth: true,
      changeYear: true,
	    maxDate: '0',
    });
  });
@endif


jQuery( document ).ready( function () {
	jQuery('#loader').hide();
	 OneSignal.push(function () {
	  OneSignal.registerForPushNotifications();
	  OneSignal.on('subscriptionChange', function (isSubscribed) {
	   if (isSubscribed) {
		OneSignal.getUserId(function (userId) {
		 device_id = userId;
		 //ajax request
		 jQuery.ajax({
			 headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},
			url: '{{ URL::to("/subscribeNotification")}}',
			type: "POST",
			data: '&device_id='+device_id,
			success: function (res) {},
		});

		 //$scope.oneSignalCookie();
		});
	   }
	  });

	 });
   jQuery("form#contact-us input[name ='_token']").val("{{csrf_token()}}");
	//load google map
@if(Request::path() == 'contact-us')
	initialize();
@endif

@if(Request::path() == 'checkout')
	getZonesBilling();
	paymentMethods();
@endif

//$.noConflict();
	//stripe_ajax
jQuery(document).on('click', '#stripe_ajax', function(e){
	jQuery('#loader').show();
	jQuery.ajax({
		headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},
		url: '{{ URL::to("/stripeForm")}}',
		type: "POST",
		success: function (res) {
			if(res.trim() == "already added"){
			}else{
				jQuery('.head-cart-content').html(res);
				jQuery(parent).removeClass('cart');
				jQuery(parent).addClass('active');
			}
			message = "@lang('website.Product is added')";
			notification(message);
			jQuery('#loader').hide();
		},
	});
});

// jQuery('.contFormWrp form input').blur(function () {
//   if (jQuery('input:number').is(":empty")) {
//     jQuery(this).addClass('warning');
//   }
// });
// document.querySelectorAll('input').forEach((input) => {
//   input.addEventListener('focusout', function(e) {
//     // this.classList.toggle('green', this.value.length > 0);
//      if(e.target.value == ''){
//      // Insert the new node before the reference node
//      jQuery(this).css('border-color' , '#a94442');
//    }else{ 
//      jQuery(this).css('border-color' , '#e2e2e2');
//    }
//   });
// });
// document.querySelectorAll('select').forEach((select) => {
//   select.addEventListener('focusout', function(e) {
//     // this.classList.toggle('green', this.value.length > 0);
//      if(e.target.value == ''){
//      // Insert the new node before the reference node
//      jQuery(this).css('border-color' , '#a94442');
//    }else{ 
//      jQuery(this).css('border-color' , '#e2e2e2');
//    }
//   });
// });
// document.querySelectorAll('textarea').forEach((textarea) => {
//   textarea.addEventListener('focusout', function(e) {
//     // this.classList.toggle('green', this.value.length > 0);
//      if(e.target.value == ''){
//      // Insert the new node before the reference node
//      jQuery(this).css('border-color' , '#a94442');
//    }else{ 
//      jQuery(this).css('border-color' , '#e2e2e2');
//    }
//   });
// });

// var abc = $('input, select, textarea').val()

// $("button").on("click",function(){
//     if($(".form-control").val() == null && attr('required')){
//         $(this).css("border","2px solid red");
//     } 
// });

// $( "button[type=submit]" ).click(function() {
//   $('form').find('input, select, textarea').each(function(){
//     if($('input, select, textarea').val() = "" && $(this).prop('required')){
//         $(this).css('border-color' , 'red');
//     } else {
//         $(this).css('border-color' , 'grey');
//     }
// });
// });




// document.addEventListener('invalid', (function () {
//     return function (e) {
//         e.preventDefault();
//         document.getElementsByClassName(".form-control").focus();
//     };
// })(), true);
// var nameInput = document.querySelector('#phone');
// nameInput.addEventListener('focusout', function(e) {
//    if(e.target.value == ''){
//      // Insert the new node before the reference node
//      jQuery(this).css('border-color' , '#a94442');
//    }else{ 
//      jQuery(this).css('border-color' , '#e2e2e2');
//    }
// });


jQuery(document).on('click', '.modal_show', function(e){
	var parent = jQuery(this);

	var products_id = jQuery(this).attr('products_id');
	var message ;
  jQuery(function ($) {
	jQuery.ajax({
	url: '{{ URL::to("/modal_show")}}',
    headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},

		type: "POST",
		data: '&products_id='+products_id,
		success: function (res) {
			jQuery("#products-detail").html(res);
			jQuery('#myModal').modal('show');

		},
	});
 });
});

	//commeents
jQuery(document).on('focusout','#order_comments', function(e){
	jQuery('#loader').show();
	var comments = jQuery('#order_comments').val();
	jQuery.ajax({
		headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},
		url: '{{ URL::to("/commentsOrder")}}',
		type: "POST",
		data: '&comments='+comments,
		async: false,
		success: function (res) {
			jQuery('#loader').hide();
		},
	});
});
		//hyperpayresponse
var resposne = jQuery('#hyperpayresponse').val();
// console.log(resposne);
if(typeof resposne  !== "undefined"){
	if(resposne.trim() =='success'){
		jQuery('#loader').show();
		jQuery("#update_cart_form").submit();
	}else if(resposne.trim() =='error'){
		jQuery.ajax({
			headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},
			url: '{{ URL::to("/checkout/payment/changeresponsestatus")}}',
			type: "POST",
			async: false,
			success: function (res) {
			},
		});
		jQuery('#paymentError').css('display','block');
	}
}

// 	//shipping_mehtods_form
// jQuery(document).on('submit', '#shipping_mehtods_form', function(e){
// 	jQuery('.error_shipping').hide();
// 	var checked = jQuery(".shipping_data:checked").length > 0;
// 	if (!checked){
// 		jQuery('.error_shipping').show();
// 		return false;
// 	}
// });

	//shipping_data




	//billling method
jQuery(document).on('click', '#same_billing_address', function(e){
		if(jQuery(this).prop('checked') == true){
			jQuery("#billing_firstname").val(jQuery("#firstname").val());
			jQuery("#billing_lastname").val(jQuery("#lastname").val());
			jQuery("#billing_company").val(jQuery("#company").val());
			jQuery("#billing_street").val(jQuery("#street").val());
			jQuery("#billing_city").val(jQuery("#city").val());
			jQuery("#billing_zip").val(jQuery("#postcode").val());
			jQuery("#billing_countries_id").val(jQuery("#entry_country_id").val());
			jQuery("#billing_zone_id").val(jQuery("#entry_zone_id").val());

			jQuery(".same_address").attr('readonly','readonly');
			jQuery(".same_address_select").attr('disabled','disabled');
		}else{
			jQuery(".same_address").removeAttr('readonly');
			jQuery(".same_address_select").removeAttr('disabled');
		}
});




//sortby
jQuery(document).on('change', '.sortby', function(e){
	jQuery('#loader').show();
	jQuery("#load_products_form").submit();
});

function validd() {
	var max = parseInt(document.detailform.quantity.max);
	var value = parseInt(document.detailform.quantity.value);

  if (value > max || value < 1) {

    jQuery('#alert-exceed').show();
     setTimeout(function() {
       jQuery('#alert-exceed').hide();
     }, 6000);
     document.detailform.quantity.focus();
     return false;
   }else{
		 var formData = jQuery("#add-Product-form").serialize();
	 	var url = jQuery('#checkout_url').val();
	 	var message;
	 	jQuery.ajax({
	 		url: '{{ URL::to("/addToCart")}}',
	 		headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},

	 		type: "POST",
	 		data: formData,

	 		success: function (res) {
	 			if(res.trim() == "already added"){
	 				//notification
	 				message = 'Product is added!';
	 			}else{
	 				jQuery('.head-cart-content').html(res);
	 				message = 'Product is added!';
	 				jQuery(parent).addClass('active');
	 			}
	 				if(url.trim()=='true'){
	 					window.location.href = '{{ URL::to("/checkout")}}';
	 				}else{
	 					if(res == 'exceed'){
							// swal("Something Happened To Stock", "@lang('website.Ops! Product is available in stock But Not Active For Sale. Please contact to the admin')", "error");
	 					}
	 					else {
							// swal("Congrates!", "Product Added Successfully Thanks.Continue Shopping", "success");

	 					}
	 				}
	 		},
	 	});
	 }
}

jQuery(document).on('click', '.add-to-Cart-from-detail', function(e){
	e.preventDefault();
			if(!validd()){ return false;}

});
//update-single-Cart with
jQuery(document).on('click', '.update-single-Cart', function(e){
	jQuery('#loader').show();
	var formData = jQuery("#add-Product-form").serialize();
	var url = jQuery('#checkout_url').val();
	var message;
	jQuery.ajax({
		headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},
		url: '{{ URL::to("/updatesinglecart")}}',
		type: "POST",
		data: formData,

		success: function (res) {
			if(res.trim() == "already added"){
				//notification
				message = 'Product is added!';
			}else{
				jQuery('.head-cart-content').html(res);
				message = 'Product is added!';
				jQuery(parent).addClass('active');
			}
				if(url.trim()=='true'){
					window.location.href = '{{ URL::to("/checkout")}}';
				}else{
					jQuery('#loader').css('display','none');
					//window.location.href = '{{ URL::to("/viewcart")}}';
					//message = "@lang('website.Product is added')";
					//notification(message);
				}
				jQuery('#loader').hide();
		},
	});
});

	
	// This button will increment the value




function cart_item_price(){

		var subtotal = 0;
		jQuery(".cart_item_price").each(function() {
			subtotal= parseFloat(subtotal) + parseFloat(jQuery(this).val()) * <?=session('currency_value')?>;
		});
		jQuery('#subtotal').html('<?=Session::get('symbol_left')?>'+subtotal+'<?=Session::get('symbol_right')?>');

		var discount = 0;
		jQuery(".discount_price_hidden").each(function() {
			discount =  parseFloat(discount) - parseFloat(jQuery(this).val());
		});

		jQuery('.discount_price').val(Math.abs(discount));

		jQuery('#discount').html('<?=Session::get('symbol_left')?>'+Math.abs(discount) * <?=session('currency_value')?>+'<?=Session::get('symbol_right')?>');

		//total value
		var total_price = parseFloat(subtotal) - parseFloat(discount) * <?=session('currency_value')?>;
		jQuery('#total_price').html('<?=Session::get('symbol_left')?>'+total_price+'<?=Session::get('symbol_right')?>');
};
	//default_address
jQuery(document).on('click', '.default_address', function(e){
		var address_id = jQuery(this).attr('address_id');
		jQuery.ajax({
			headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},
			url: '{{ URL::to("/myDefaultAddress")}}',
			type: "POST",
			data: '&address_id='+address_id,

			success: function (res) {
				 window.location = 'shipping-address?action=default';
			},

		});

});
	//deleteMyAddress
jQuery('.slide-toggle').on('click', function(event){
 jQuery('.color-panel').toggleClass('active');
});

// jQuery( function() {
// 	  var maximum_price = jQuery( ".maximum_price" ).val();
// 	  jQuery( "#slider-range" ).slider({
// 		range: true,
// 		min: 0,
// 		max: maximum_price,
// 		values: [ 0, maximum_price ],
// 		slide: function( event, ui ) {
// 			jQuery('#min_price').val(ui.values[ 0 ] );
// 			jQuery('#max_price').val(ui.values[ 1 ] );

// 			jQuery('#min_price_show').val( ui.values[ 0 ] );
// 			jQuery('#max_price_show').val( ui.values[ 1 ] );
// 		},
// 		create: function(event, ui){
// 			jQuery(this).slider('value',20);
// 		}
// 	   });
// 	   jQuery( "#min_price_show" ).val( jQuery( "#slider-range" ).slider( "values", 0 ) );
// 	   jQuery( "#max_price_show" ).val(jQuery( "#slider-range" ).slider( "values", 1 ) );
// 	   //jQuery( "#slider-range" ).slider( "option", "max", 50 );
// });
//tooltip enable
jQuery(function () {
  jQuery('[data-toggle="tooltip"]').tooltip()
});

function initialize(location){

		@if(!empty($result['commonContent']['setting'][9]->value) or $result['commonContent']['setting'][10]->value)
			var address = '{{$result['commonContent']['setting'][9]->value}}, {{$result['commonContent']['setting'][10]->value}}';
		@else
			var address = '';
		@endif

		var map = new google.maps.Map(document.getElementById('googleMap'), {
			mapTypeId: google.maps.MapTypeId.TERRAIN,
			zoom: 13
		});
		var geocoder = new google.maps.Geocoder();
		geocoder.geocode({
			'address': address
		},
		function(results, status) {
			if(status == google.maps.GeocoderStatus.OK) {
			 new google.maps.Marker({
				position: results[0].geometry.location,
				map: map
			 });
			 map.setCenter(results[0].geometry.location);
			}
		});
	   }
	//default product cart

});


//ready doument end
jQuery('.dropdown-menu').on('click', function(event){
	// The event won't be propagated up to the document NODE and
	// therefore delegated events won't be fired
			event.stopPropagation();
		});

	function delete_cart_product(cart_id){
		jQuery('#loader').show();
		var id = cart_id;
		jQuery.ajax({
			headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},
			url: '{{ URL::to("/deleteCart")}}',
			type: "GET",
			data: '&id='+id+'&type=header cart',
			success: function (res) {
				// window.location.reload(true);
			},
		});
		jQuery('#loader').hide();
};



function passwordMatch(){

	var password = jQuery('#password').val();
	var re_password = jQuery('#re_password').val();

	if(password == re_password){
		return 'matched';
	}else{
		return 'error';
	}
}




'use strict';
function showPreview(objFileInput) {
	if (objFileInput.files[0]) {
		var fileReader = new FileReader();
		fileReader.onload = function (e) {
			jQuery("#uploaded_image").html('<img src="'+e.target.result+'" width="150px" height="150px" class="upload-preview" />');
			jQuery("#uploaded_image").css('opacity','1.0');
			jQuery(".upload-choose-icon").css('opacity','0.8');
		}
		fileReader.readAsDataURL(objFileInput.files[0]);
	}
}

jQuery(document).ready(function() {
  /******************************
      BOTTOM SCROLL TOP BUTTON
   ******************************/

  // declare variable
  var scrollTop = jQuery(".floating-top");

  jQuery(window).scroll(function() {
    // declare variable
    var topPos = jQuery(this).scrollTop();

    // if user scrolls down - show scroll to top button
    if (topPos > 150) {
      jQuery(scrollTop).css("opacity", "1");

    } else {
      jQuery(scrollTop).css("opacity", "0");
    }
});
  //Click event to scroll to top
jQuery(scrollTop).click(function() {
    jQuery('html, body').animate({
      scrollTop: 0
    }, 800);
    return false;

  });
});

jQuery('body').on('mouseenter mouseleave','.dropdown.open',function(e){
  var _d=jQuery(e.target).closest('.dropdown');
  _d.addClass('show');
  setTimeout(function(){
    _d[_d.is(':hover')?'addClass':'removeClass']('show');

  },300);
  jQuery('.dropdown-menu', _d).attr('aria-expanded',_d.is(':hover'));
});

jQuery('.nav-index').on('show.bs.tab', function (e) {
	  e.target // newly activated tab
	  e.relatedTarget // previous active tab
	  jQuery('.overlay').show();
})

jQuery('.nav-index').on('hidden.bs.tab', function (e) {
	  e.target // newly activated tab
	  e.relatedTarget // previous active tab
	  jQuery('.overlay').hide();
})

function cancelOrder() {
	if (confirm("@lang('website.Are you sure you want to cancel this order?')")) {
		return true;
	} else {
		return false;
	}
}

function returnOrder() {
	if (confirm("@lang('website.Are you sure you want to return this order?')")) {
		return true;
	} else {
		return false;
	}
}



	@if(!empty($result['detail']['product_data'][0]->products_type) and $result['detail']['product_data'][0]->products_type==1)
		getQuantity();
		cartPrice();
	@endif

function cartPrice(){
	var i = 0;
	jQuery(".currentstock").each(function() {
		var value_price = jQuery('option:selected', this).attr('value_price');
		var attributes_value = jQuery('option:selected', this).attr('attributes_value');
		var prefix = jQuery('option:selected', this).attr('prefix');
		jQuery('#attributeid_' + i).val(value_price);
		jQuery('#attribute_sign_' + i++).val(prefix);

	});
}

//ajax call for add option value
function getQuantity(){
	var attributeid = [];
	var i = 0;
	
	jQuery('.stock-cart').attr('hidden', true);

	jQuery(".currentstock").each(function() {
		var value_price = jQuery('option:selected', this).attr('value_price');
		var attributes_value = jQuery('option:selected', this).attr('attributes_value');
		jQuery('#function_' + i).val(value_price);
		jQuery('#attributeids_' + i++).val(attributes_value);
	});

	var formData = jQuery('#add-Product-form').serialize();
	jQuery.ajax({
		headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},
		url: '{{ URL::to("getquantity")}}',
		type: "POST",
		data: formData,
		dataType: "json",
		success: function (res) {
			var products_price = jQuery('#products_price').val();

			jQuery('#current_stocks').html(res.remainingStock);
			var min_level = 0;
			var max_level = 0;
			var inventory_ref_id = res.inventory_ref_id;
			

			if(res.minMaxLevel != '' && res.minMaxLevel > 0){
				min_level = res.minMax[0].min_level;
				max_level = res.minMax[0].max_level;
			}
			if(min_level != 0){
				jQuery('.qty').attr('value',min_level);
				jQuery('.qty').attr('min',min_level);
			}else{
				min_level = 1;
				jQuery('.qty').attr('value',min_level);
				jQuery('.qty').attr('min',min_level);

			}
			var final_pri = products_price * min_level;
			if(res.remainingStock>0){
				//jQuery('.total_price').html('<?=Session::get('symbol_left')?>'+final_pri.toFixed(2)+'<?=Session::get('symbol_right')?>');
				jQuery('#min_max_setting').html("<b>@lang('website.Min Order Limit:')</b> &nbsp;" + min_level);
				jQuery('.stock-cart').removeAttr('hidden');
				jQuery('.stock-out-cart').attr('hidden',true);
				var max_order = jQuery('#max_order').val();

				if(max_order.trim()!=0){
					if(max_order.trim()>=res.remainingStock){
						jQuery('.qty').attr('max',res.remainingStock);
					}else{
						jQuery('.qty').attr('max',max_order);
					}
				}else{
					jQuery('.qty').attr('max',res.remainingStock);
				}

        jQuery('.variable-stock').text("@lang('website.In stock')");
			}else{
				jQuery('#min_max_setting').html("");
				jQuery('.stock-out-cart').removeAttr('hidden');
				jQuery('.stock-cart').attr('hidden',true);
				jQuery('.qty').attr('max',0);
				// jQuery('.qty').attr('value',0);
				//jQuery('.total_price').html('<?=Session::get('symbol_left')?>'+0+'<?=Session::get('symbol_right')?>');
				document.getElementById("myCheck").click();
        jQuery('.variable-stock').text("@lang('website.Out of Stock')");
        
			}

		},
	});
}


// function donationTicket() {

//  checker = jQuery('#totalCouponChecker').val();
//  total_tickets = jQuery('#totalcoupons').html();
//  total_products = jQuery('.total_products').html();
//  totalnoOfTickets = jQuery('.donationEach').html();
//  if (checker == 'added') {
//   total_tickets = total_tickets - total_products;
//   jQuery('#totalcoupons').html(total_tickets);
//   if (totalnoOfTickets == 3) {jQuery('.donationEach').html(2);} else {jQuery('.donationEach').html(1);}
  
//   jQuery('#totalCouponChecker').val('notAdded');
//  }else{
//   var totalnoOfTickets = parseInt(totalnoOfTickets);
//   jQuery('.donationEach').html(totalnoOfTickets+1);
//   totalnoOfTickets = jQuery('.donationEach').html();
//   jQuery('#totalcoupons').html(totalnoOfTickets*total_products);
//   jQuery('#totalCouponChecker').val('added');
//  }
// }

function updateCartAjax(type = "") {
  console.log(type)
  var cart = jQuery( "input[name ^='cart']" ).serializeArray();
  var quantity = jQuery(".qty").serializeArray();
  // console.log(quantity);
  jQuery('#loader').css('display','block');

  jQuery.ajax({
      headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},
      url: '{{ URL::to("/updateCartAjax")}}',
      type: "POST",
      data:{cart:cart,quantity:quantity,type:type},
      success: function (res) {
        if(res.error == 'true')
        {
          $('#response_cart_message').show();
          setTimeout(() => {
           location.reload();
          }, 1000);
        }
        else{
   // jQuery('.respCart').html(res);
        location.reload();
        if(jQuery('.total_products').text() <10){
     jQuery(".cartItems").css("width","12px")

    }  
     if(jQuery('.total_products').text() >10){
        jQuery(".cartItems").css("width","auto")
    }
      jQuery(".cartItems").html(jQuery('.total_products').text());
        }
     
      },
    });
}
function updateCheckoutCartAjax(type = "") {
  
  var cart = jQuery( "input[name ^='cart']" ).serializeArray();
  var org_price = jQuery(".org_price").text();
  var quantity = jQuery(".qty").serializeArray();
  var quantity_amount = jQuery(".qty").val();
  jQuery('#loader').css('display','block');
  
  var total_price = parseInt(org_price)*parseInt(quantity_amount);
  jQuery('meta[name="csrf-token"]').attr('content');
  jQuery.ajax({
      headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},
      url: '{{ URL::to("/updateCheckoutCartAjax")}}',
      type: "POST",
      data:{cart:cart,quantity:quantity,type:type},
      success: function (res) {
        if(res.error == 'true')
        {
          $('#response_cart_message').show();
          setTimeout(() => {
           location.reload();
          }, 1000);
        }
        else{
        // jQuery('.checkout-right').html(res);
        location.reload();
        // jQuery('.itemtotal').html(numberWithCommas(total_price));
        jQuery(".cartItems").html(jQuery('.total_products').text());
// 
        }
      },
    });
}

    jQuery(".addCardbtn").click(function() {
    jQuery(".contFormWrp").toggle();  
    jQuery(".cardWrap").toggle();  
  });


  function parseNumberCustom(number_string) {
    var new_number = parseInt(number_string.indexOf(',') >= 3 ? number_string.split(',')[0] : number_string.replace(/[^0-9\.]/g, ''));
    // console.log('Before==>' + number_string + ', After==>' + new_number);
}
function payWLpoitns() {
  userLpoint = jQuery('.userLpointAED').text();
  lpointChecker = jQuery('#lpointChecker').val();
  total_price = jQuery('.totalPrice').text();
  total_price = total_price.replace(/\,(\d\d)$/, ".$1").replace(',','');
  userLpoint = userLpoint.replace(/\,(\d\d)$/, ".$1").replace(',','');

  if (lpointChecker == 'uncheck') {
    total_price = parseInt(total_price)-parseInt(userLpoint);
    if (Math.sign(total_price) === -1) {jQuery('.totalPrice').text('0');} else {jQuery('.totalPrice').text(numberWithCommas(total_price));}
    // jQuery('.totalPrice').text(numberWithCommas(total_price));
    jQuery('#lpointChecker').val('added');
  }else{
    // total_price = parseInt(total_price)+parseInt(userLpoint);
    total_price = jQuery('#pPrice').val();
    jQuery('.totalPrice').text(numberWithCommas(total_price));
    jQuery('#lpointChecker').val('uncheck');
  }
}
function addZeros(number,zero) {
  var amnt = number
  let i ;
  for(i=0;i<zero;i++){
    amnt += '0' ;
  }

  var fa = parseFloat(amnt);

  return fa;
}
oldprice = jQuery('.totalPrice').text();

function numberWithCommas(x) {
    var ff = "/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g";
    return x.toString().replace(ff, ",");

}

jQuery('.moreless-button').click(function() {
  jQuery('.moretext').slideToggle();
  if (jQuery('.moreless-button').text() == "Read more") {
    jQuery(this).text("Read less")
  } else {
    jQuery(this).text("Read more")
  }
});


$(function(){
    var current = window.location.href;
 
    $('#topMenu li .nav-link').each(function(){

      
        // if the current path is like this link, make it active
      if (this.href === current) {
   
             $(this).addClass('active');
        }
    })

    $('.logoRightBar ul li a').each(function(){

      // console.log(this.href)
        // if the current path is like this link, make it active
      if (this.href === current) {
   
             $(this).addClass('active');
        }
    })
})


// function dynamiCountDown(end_date,append_id) {
//   // console.log(append)
//   setInterval(function() {
//     end_date = new Date(end_date).getTime();
//     var now = new Date().getTime();
//     distance = end_date - now;
//     $('#'+append_id).find('.countdown_timer').empty();
//     var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
//     var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
//     var seconds = Math.floor((distance % (1000 * 60)) / 1000);
//     html = '';
//     html += '<strong>'+hours+'</strong> hrs : <strong>'+minutes+'</strong> mins : <strong> '+seconds+'</strong> secs';
//     // console.log(html,$('#'+append_id).find('.countdown_timer'))
//     // $('#'+append_id).find('.countdown_timer').append(html)
//     return html;
//     }, 1000);
// }

</script>

