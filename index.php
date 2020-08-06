<?php
require_once 'vendor/autoload.php';
$environment = [
    "ip" => $_SERVER['HTTP_X_FORWARDED_FOR'],
    "gateway_name" => gethostbyaddr($_SERVER['HTTP_X_FORWARDED_FOR']),
    "request_method" => $_SERVER['REQUEST_METHOD']
];
echo json_encode($environment);
?>
