<?php
$secret = 'xyz123abc456'; // Your secure string
$header = $_SERVER['HTTP_X_HUB_SIGNATURE_256'] ?? '';
$payload = file_get_contents('php://input');
$hash = 'sha256=' . hash_hmac('sha256', $payload, $secret);
if (hash_equals($hash, $header)) {
    shell_exec('cd /home/dubaicleanupcare/public_html && /bin/git fetch origin main && /bin/git reset --hard origin/main && /bin/chmod -R 755 /home/dubaicleanupcare/public_html && /bin/chown -R dubaicleanupcare:dubaicleanupcare /home/dubaicleanupcare/public_html && /usr/local/bin/php /home/dubaicleanupcare/public_html/artisan optimize:clear && /usr/local/bin/php /home/dubaicleanupcare/public_html/artisan config:cache && /usr/local/bin/php /home/dubaicleanupcare/public_html/artisan route:cache && /usr/local/bin/php /home/dubaicleanupcare/public_html/artisan view:cache');
    http_response_code(200);
    echo 'Deployment successful';
} else {
    http_response_code(403);
    echo 'Invalid signature';
}
?>