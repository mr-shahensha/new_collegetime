<?php
function send_sms($mob,$message,$tid)
{

	$username = 'upkar';
    $apiKey = 'A3B16-74528';
    $apiRequest = 'Text';
    // Message details
    $numbers = $mob; // Multiple numbers separated by comma
    $sender = 'ONSIPL';
    $message = $message;
    // Route details
    $apiRoute = 'TRANS';
    // Prepare data for POST request
    $data = 'username='.$username.'&apikey='.$apiKey.'&apirequest='.$apiRequest.'&route='.$apiRoute.'&mobile='.$numbers.'&sender='.$sender."&message=".$message."&TemplateID=".$tid."&format=JSON";
    // Send the GET request with cURL
    $url = 'http://sms.onnetsolution.com/sms-panel/api/http/index.php?'.$data;
    $url = preg_replace("/ /", "%20", $url);
    $response = file_get_contents($url);
    //echo $response;
}


?>