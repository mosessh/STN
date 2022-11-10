<?php
header("refresh: 600"); 
ob_flush();
	flush();

$key = '4344075fc2a2e4c4bb8ba2d099dfa15486e3a1c8e997c89488b6bd8ef1dac685';
$secret='89a686a3014c435584ab9582aab47a6c716bab8c4ffd1de5aaa89ca376fad017';
require 'vendor/autoload.php';

use AfricasTalking\SDK\AfricasTalking;


class Method
{
    const GET = 0;
    const POST = 1;
    const PUT = 2;
    const DELETE = 3;
    
    public static function nameForEnumValue($value) {
        switch($value) {
            case 0: return "GET";
            case 1: return "POST";
            case 2: return "PUT";
            case 3: return "DELETE";
        }
    }
};

function print_debug_info($method, $endpoint, $headers) {
    print( "\n" );
    print( "Method: " . Method::nameForEnumValue($method) . "\n");
    print( "Endpoint: " . $endpoint . "\n" );
    //print_r($headers);
}

function build_headers($auth, $sign) {
    $headers = array();
    $headers[] = "Authorization: " . $auth;
    $headers[] = "Signature: " . $sign;
    $headers[] = "Content-Type: application/json";
    $headers[] = "OpenMesh-API-Version: 1";
    return $headers;
}

function invoke_curl($method, $endpoint, $headers, $json) {
  set_time_limit(0);              // making maximum execution time unlimited
    ob_implicit_flush(1);           // Send content immediately to the browser on every statement which produces output
    ob_end_flush(); 
    $api_server = 'https://api.cloudtrax.com';

    try {
        // get a curl handle then go to town on it

        $ch = curl_init($api_server . $endpoint);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    
        if ($method == Method::DELETE)
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        elseif ($method == Method::PUT) {
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
        }
        else if ($method == Method::POST) {
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
        }
        
        $result = curl_exec($ch);
        if ($result == FALSE) {
            if (curl_errno($ch) == 0)
                echo "@@@@ NOTE @@@@: nil HTTP return: This API call appears to be broken" . "\n";
            else
                throw new Exception(curl_error($ch), curl_errno($ch));    
        }
        else
            
 
 $datar=json_decode($result);

 
$down=$datar->connection_keeper_status; 
$clients=$datar->active_clients; 
$uptime=$datar->uptime_seconds; 
$checkin=$datar->last_checkin; 
  echo "status: \n" . $down . "\n";
     echo "no clients: \n" .$clients . "\n";
       echo "uptime : \n" . $uptime . "\n";
       
         $node="1547756";
      $time1 = preg_replace('/T/',':',$checkin);
       $time = preg_replace('/Z/','',$time1);
      
 echo "edit time: \n" . $time . "\n";  
 
 $conn = mysqli_connect("localhost", "u825147531_voucher", "6~Aa#:1;7O:", "u825147531_voucher"); 
 
  $sql ="INSERT INTO accesspoint (node, status, clients, uptime, checkin) VALUES('$node','$down','$clients','$uptime','$time') ";
 
 mysqli_query($conn, $sql);
 
  if($down =='disconnected'){
      
     

      $sql= "DELETE FROM 'accesspoint' WHERE 'status' = 'connected'";
 
 mysqli_query($conn, $sql);
       
        
     $username = 'Splynx'; // use 'sandbox' for development in the test environment
$apiKey   = 'b6811b50ca4e228ccb1d94c1be5e15f2bf4e51565ee3b4d5fb26ea74494b3c4a';// use your sandbox app API key for development in the test environment 
$AT       = new AfricasTalking($username, $apiKey);
$sms      = $AT->sms();
$message="Hello Datto Ap2 is Down please confirm status with datto Dashboard";
 $mobile='';
   
$result   = $sms->send([
    'to'      => $mobile,
    'message' =>''.$message.'',
    'from'  => 'SkyTrend'
]);
          
           
        
        
    }
 
 
 
 
         
    } 
    catch(Exception $e) {
        trigger_error( sprintf('Curl failed with error #%d: "%s"',
            $e->getCode(), $e->getMessage()), E_USER_ERROR);
    }
}

function call_api_server($method, $endpoint, $data) {

    global $key, $secret;
    
    $time = time();
    $nonce = rand();

    if ($method == Method::POST)
        assert( '$data != NULL /* @@@@ POST requires $data @@@@ */');
    elseif ($method == Method::GET || $method == Method::DELETE)
        assert( '$data == NULL /* @@@ GET and DELETE take no $data @@@ */');
        
    $path = $endpoint;
    // if present, concatenate encoded json to $endpoint for Signature:
    if ($data != NULL) {
    	$json = json_encode($data);
        $path .= $json;
    }

    $authorization = "key=" . $key . ",timestamp=" . $time . ",nonce=" . $nonce;
    $signature =  hash_hmac('sha256', $authorization . $path . $body, $secret);
    $headers = build_headers($authorization, $signature);
    
   // print_debug_info($method, $endpoint, $headers);
    
    invoke_curl($method, $endpoint, $headers, $json);
}


// 	=====================================================
//	EXAMPLE API ENDPOINT CALLS
// 	=====================================================

// -----------------1543917
// list all networks
// -----------------
call_api_server(Method::GET, "/node/1547756", NULL);


//

call_api_server(Method::GET, "/client/network/487882/block", NULL);

 

 
?>