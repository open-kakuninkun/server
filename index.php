<?php
header('Access-Control-Allow-Origin: https://open-kakuninkun.github.io');
require_once 'vendor/autoload.php';
function checkIpFormat($ip) {
    if(filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)){
       return "IPv4";
    }
    else{
       if(filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)){
       return "IPv6";
       }else{return "不明";}
    }
}
if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    if(strpos($ipaddress, ',') != false) {
    $ip_list = explode(',', $ipaddress);
    $ipaddress = $ip_list[0];
    }
} else {
    $ipaddress = $_SERVER['REMOTE_ADDR'];
}
if(!empty($ipaddress)){
    $ip_format = checkIpFormat($ipaddress);
}
$environment = [
    "ip" => $ipaddress != null ? $ipaddress : "不明",
    "gateway_name" => gethostbyaddr($ipaddress) != false ? gethostbyaddr($ipaddress) : "不明", 
    "ip_format" => $ip_format != null ? $ip_format : "不明"
];
echo json_encode($environment);
?>
