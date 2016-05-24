<?php

require '/var/www/html/services/lookup/twilio-php-master/Services/Twilio.php';


$sid = "ACffe9e05faedce8a958779973a1a3b0e3";
$token = "56c180813c1aaf94a6dfd4ee5b8d8ad6";

$client = new Services_Twilio($sid, $token);
$numbers = $client->account->available_phone_numbers->getList('US', 'Local', array(
        //"InRegion" => "AR"
        "Contains" => "801"
    ));
foreach($numbers->available_phone_numbers as $number) {
    //echo $number->phone_number;
     //$reslut = json_decode($number);
    echo "<pre>";
        print_r($number);
    echo "</pre>";
}


?>