<?php
use Courier\Courier;
use PHPMailer\PHPMailer\PHPMailer;
use vendor\ctrlaltdylan\courier\src;
//load composer autoloader
require 'vendor/autoload.php';


$courier = new Courier();

$courier->setRecipient('254726585782')->setBody('Hello World')->send();

?>