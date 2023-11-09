<<<<<<< HEAD
<?php
use Courier\Courier;
use PHPMailer\PHPMailer\PHPMailer;
use vendor\ctrlaltdylan\courier\src;
//load composer autoloader
require 'vendor/autoload.php';


$courier = new Courier();

$courier->setRecipient('254726585782')->setBody('Hello World')->send();

=======
<?php
use Courier\Courier;
use PHPMailer\PHPMailer\PHPMailer;
use vendor\ctrlaltdylan\courier\src;
//load composer autoloader
require 'vendor/autoload.php';


$courier = new Courier();

$courier->setRecipient('254726585782')->setBody('Hello World')->send();

>>>>>>> 2019fb6bd2dd2ea15b95e71ca458d606c33ff2c1
?>