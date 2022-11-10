  <?php
require 'vendor/autoload.php';

use AfricasTalking\SDK\AfricasTalking;
   
 

$phone="+".$PhoneNumber;
$Amount=1;
$phone=+254746104716;
$username = 'Splynx'; // use 'sandbox' for development in the test environment
$apiKey   = 'b6811b50ca4e228ccb1d94c1be5e15f2bf4e51565ee3b4d5fb26ea74494b3c4a';// use your sandbox app API key for development in the test environment 
$AT       = new AfricasTalking($username, $apiKey);
$sms      = $AT->sms();
 $message="hello testing db";
 
   
$result   = $sms->send([
    'to'      => $phone,
    'message' =>''.$message.'',
    'from'  => 'SkyTrend'
]);