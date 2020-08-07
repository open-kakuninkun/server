<?php
header('Access-Control-Allow-Origin: https://open-kakuninkun.github.io');
require_once 'vendor/autoload.php';
if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    if(strpos($ipaddress, ',') != false) {
    $ip_list = explode(',', $ipaddress);
    $ipaddress = $ip_list[0];
    }
} else {
    $ipaddress = $_SERVER['REMOTE_ADDR'];
}
$environment = [
    "ip" => $ipaddress,
    "gateway_name" => gethostbyaddr($ipaddress)
];
echo json_encode($environment);
?>
