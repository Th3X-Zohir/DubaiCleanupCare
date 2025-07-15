<?php
$secret = 'xyz123abc456'; // Your secure string
$header = $_SERVER['HTTP_X_HUB_SIGNATURE_256'] ?? '';
$payload = file_get_contents('php://input');
$hash = 'sha256=' . hash_hmac('sha256', $payload, $secret);
if (hash_equals($hash, $header)) {
    file_put_contents('/home/dubaicleanupcare/public_html/.deploy_trigger', 'triggered');
    http_response_code(200);
    echo 'Deployment triggered';
} else {
    http_response_code(403);
    echo 'Invalid signature';
}
?>