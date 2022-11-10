

<?php
require 'vendor/autoload.php';

use AfricasTalking\SDK\AfricasTalking;
$username = 'SkyTrend'; // use 'sandbox' for development in the test environment
$apiKey   = 'a1ef12e925a3bb98216f5f2f9629058e1182ca588585ee954882c9017520e5d6'; // use your sandbox app API key for development in the test environment
$AT       = new AfricasTalking($username, $apiKey);

// Get one of the services
$sms      = $AT->sms();

// Use the service
$result   = $sms->send([
    'to'      => '+254746104716',
    'message' => 'Hello World!'
]);

print_r($result);















