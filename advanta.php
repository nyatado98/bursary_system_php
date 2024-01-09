<?php
require "vendor/autoload.php";
require __DIR__ . '/vendor/autoload.php';

use \Savannabits\Advantasms\Advantasms;
$apiKey = "bd3ef4f7a573e95e2eac35309dc0f8ca";
$partnerId = "2832";
$shortcode = "JOSSES";
$mobile = "254726585782";
//instantiate
$sms = new Advantasms($apiKey,$partnerId,$shortcode);

//Send and receive response
$response = $sms->to($mobile)->message("Your message right here...")->send();

echo "Successfully";
//Schedule sms to be sent at a specific time
// $time = "2020-10-01 18:00"; // Y-m-d H:i
// $response = $sms->to($mobile)->message("Your message right here")->schedule($time);

?>