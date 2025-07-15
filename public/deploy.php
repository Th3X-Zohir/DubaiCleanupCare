<?php
     $secret = 'xyz123abc456'; // Your secure string
     $header = $_SERVER['HTTP_X_HUB_SIGNATURE_256'] ?? '';
     $payload = file_get_contents('php://input');
     $hash = 'sha256=' . hash_hmac('sha256', $payload, $secret);
     if (hash_equals($hash, $header)) {
         $output = [];
         $return_var = 0;
         exec('/usr/local/cpanel/bin/uapi Git deploy repository_root=/home/dubaicleanupcare/public_html 2>&1', $output, $return_var);
         if ($return_var === 0) {
             http_response_code(200);
             echo 'Deployment successful: ' . implode('\n', $output);
         } else {
             http_response_code(500);
             echo 'Deployment failed: ' . implode('\n', $output);
         }
     } else {
         http_response_code(403);
         echo 'Invalid signature';
     }
     ?>