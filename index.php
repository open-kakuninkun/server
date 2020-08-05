<?php
require_once 'vendor/autoload.php';

$environment = [
    "ip" => $_SERVER['REMOTE_ADDR'],
    "gateway_name" => $_SERVER['REMOTE_HOST'],
    "request_method" => $_SERVER['REQUEST_METHOD']
]
?>
