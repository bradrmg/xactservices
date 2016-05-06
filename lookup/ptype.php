<?php
// Get the PHP helper library from twilio.com/docs/php/install
//require_once('/var/www/html/services/lookup/twilio-php-master/Services/Twilio.php'); // Loads the library
require '/var/www/html/services/lookup/twilio-php-master/Services/Twilio.php';

//DATABASE CONNECTION

//TOKEN + KEY 
//

//GET AND CLEAN/FORMAT the Phonenumeber
$rawphone = $_REQUEST['phone'];
$phone = "+1".$rawphone;



// Your Account Sid and Auth Token from twilio.com/user/account
$sid = "ACffe9e05faedce8a958779973a1a3b0e3";
$token = "56c180813c1aaf94a6dfd4ee5b8d8ad6";

$client = new Lookups_Services_Twilio($sid, $token);

try{
   
    $number = $client->phone_numbers->get($phone, array("Type" => "carrier"));
    $type = $number->carrier->type;
    $cname = $number->carrier->name;
    $error = $number->carrier->error_code;
    

    $result = array('type' => $type, 'carrier' => $cname, 'error' => $error);
    header('Content-type: application/json');
    echo json_encode($result);
    
} catch (Services_Twilio_RestException $e) {
     $e->getMessage();
     $error = "invalid phone number";
    
    
    $result = array('type' => $type, 'carrier' => $cname, 'error' => $error);
    header('Content-type: application/json');
    echo json_encode($result);
}



?>