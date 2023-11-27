
<?php

require "vendor/autoload.php";
require __DIR__ . '/vendor/autoload.php';
use Twilio\Rest\Client;

$dotenv = new Symfony\Component\Dotenv\Dotenv(__DIR__);
$dotenv->load('.env');
// $accountSid = getenv('TWILIO_ACCOUNT_SID');
// $authToken = getenv('TWILIO_AUTH_TOKEN');
$accountSid ="AC437a44a5e6e89a4a174115facfaeeafb";
$authToken = "d47602f256dc14aee2e626ff3ed9827c";
$twilioNumber = "+17124300592"; // Your Twilio phone number
$recipientNumber = "+254726585782"; // Recipient's phone number
$message = "You have Successfully Applied for Emgwen NGCDF Student Bursary for financial Year 2023 - 2024.";

$client = new Client($accountSid, $authToken);

try {
  $message = $client->messages->create(
    $recipientNumber,
    array(
      'from' => $twilioNumber,
      'body' => $message
    )
  );
  echo "SMS message sent successfully!";
} catch (Exception $e) {
  echo "Error sending SMS: " . $e->getMessage();
}

?>
