<?php

/**
 * Send an SMS message by using Infobip API PHP Client.
 *
 * For your convenience, environment variables are already pre-populated with your account data
 * like authentication, base URL and phone number.
 *
 * Please find detailed information in the readme file.
 */

require '../../vend/autoload.php';

use Infobip\Api\SmsApi;
use Infobip\Configuration;
use Infobip\Model\SmsAdvancedTextualRequest;
use Infobip\Model\SmsDestination;
use Infobip\Model\SmsTextualMessage;

$BASE_URL = "https://rgprv1.api.infobip.com";
$API_KEY = "57fcebae940bef43513636ac91dfc114-e1132411-3cdf-4130-b633-3d6ad998bff3";

$SENDER = "InfoSMS";
$RECIPIENT = "254726585782";
$MESSAGE_TEXT = "This is a sample message";

$configuration = new Configuration(host: $BASE_URL, apiKey: $API_KEY);

$sendSmsApi = new SmsApi(config: $configuration);

$destination = new SmsDestination(
    to: $RECIPIENT
);

$message = new SmsTextualMessage(destinations: [$destination], from: $SENDER, text: $MESSAGE_TEXT);

$request = new SmsAdvancedTextualRequest(messages: [$message]);

try {
    $smsResponse = $sendSmsApi->sendSmsMessage($request);

    echo $smsResponse->getBulkId() . PHP_EOL;

    foreach ($smsResponse->getMessages() ?? [] as $message) {
        echo sprintf('Message ID: %s, status: %s', $message->getMessageId(), $message->getStatus()?->getName()) . PHP_EOL;
    }
} catch (Throwable $apiException) {
    echo("HTTP Code: " . $apiException->getCode() . "\n");
}
