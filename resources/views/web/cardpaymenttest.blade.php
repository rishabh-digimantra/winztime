<!DOCTYPE html>
<html>
<head>
	<title></title>
	
</head>
<body>
	<?php 
	// ini_set("error_reporting", E_ALL);
	// 	// set post fields
	// 	$post = [
	// 	    'transaction_amount' => '100',
	// 	    'currency' => 'AED',
	// 	    'redirect_url' => 'https://lucramania.com/thankyou'
	// 	];

	// 	$ch = curl_init();
	// 	curl_setopt($ch, CURLOPT_URL,'https://foloosi.com/api/v1/api/initialize-setup');
	// 	curl_setopt($ch, CURLOPT_POST, 1);
	// 	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	// 	    'secret_key: test_$2y$10$i.xz.wZoyjKucWEmj1MHCu4LG4PpbtQBps4oYDSlej5hcfCGfi1j6',
 //            'Content-Type: application/json'
	// 	));
	// 	curl_setopt($ch, CURLOPT_POSTFIELDS,$post);
	// 	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	// 	curl_setopt($ch, CURLOPT_VERBOSE,true);
	// 	$result = curl_exec($ch);
	// 	// if(!$result){
	// 	//     die('Error: "' . curl_error($ch) . '" - Code: ' . curl_errno($ch));
	// 	// }
	// 	print_r(curl_error($ch));

	// 	curl_close($ch);
	// 	var_dump($result);
		// var_dump($server_output);
	?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://www.foloosi.com/js/foloosipay.v2.js"></script>
	<script type="text/javascript">
		$(document).ready(function () {
		  var customer_name = $('#customer_name').val();
		  var customer_email = $('#customer_email').val();
		  var customer_mobile = $('#customer_mobile').val();
		  $.ajax({
		    method: "POST",
		    url: "https://foloosi.com/api/v1/api/initialize-setup",
		    headers: { 'merchant_key': 'test_$2y$10$dTV.3fcJHbhKnzls4-v5lOPWoH.Gc36pcTbJJ9GpdtlPXPMuCfF.2'},
		    data: { 
		      transaction_amount: "100",
		      currency: "AED",
		      redirect_url:"https://lucramania.com/check-flopayment",
		      customer_name : customer_name, /*note : auto render in payment popup*/
		      customer_email : customer_email, /*note : auto render in payment popup*/
		      customer_mobile : customer_mobile
		      }
		  })
		    .done(function( msg ) {
		      console.log(msg['data']['reference_token']);
		      var options = {
		          // "reference_token" : "U0sjdGVzdF8kMnkkMTAkZFRWLjNmY0pIYmhLbnpsczQtdjVsT1BXb0guR2MzNnBjVGJKSjlHcGR0bFBYUE11Q2ZGLjIcVE4jRkxTQVBJNjA3NTY5NDY4MWEwOBxSVCMkMnkkMTAkdGdtZlFqVWIxU0pUYXN0ajJWR0JkdWQzOTFNd3oucDZ6UHg3d004OFlqMlRuNzk0VE1TYU8=", //which is get from step2
		          "reference_token" : msg['data']['reference_token'], //which is get from step2
		          "merchant_key" : "test_$2y$10$dTV.3fcJHbhKnzls4-v5lOPWoH.Gc36pcTbJJ9GpdtlPXPMuCfF.2"
		      }
		      var fp1 = new Foloosipay(options);
		      fp1.open();
		    });
	</script>
</body>
</html>