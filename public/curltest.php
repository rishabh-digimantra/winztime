<?php 

phpinfo();
$apikey = "YThjMjA2MWYtNTBmYS00ZDA1LTliZjgtODZlM2I4ZTRkOGJlOjUyNDI5MGMxLTQ1MTQtNDk4My05ZWY1LTU5Yjc5MGIyODYyNw==";     // enter your API key here
            $ch = curl_init(); 
            // curl_setopt($ch, CURLOPT_URL, "https://api-gateway.sandbox.ngenius-payments.com/identity/auth/access-token"); 
            curl_setopt($ch, CURLOPT_URL, "https://api-gateway.ngenius-payments.com/identity/auth/access-token"); 
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                "accept: application/vnd.ni-identity.v1+json",
                "authorization: Basic ".$apikey,
                "content-type: application/vnd.ni-identity.v1+json"
              )); 
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);   
            curl_setopt($ch, CURLOPT_POST, 1); 
            // curl_setopt($ch, CURLOPT_POSTFIELDS,  "{\"realmName\":\"ni\"}"); 
            $output = json_decode(curl_exec($ch)); 
        print_r($output);die();
            $access_token = $output->access_token;

            ?>