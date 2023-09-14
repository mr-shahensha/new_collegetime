<?php
//Forcefully Update
$err = true;
$message="Please Update the Application to use it properly."; 
$myObj = new StdClass;	
$myObj->error = $err;
$myObj->message = $message;
$myJSON = json_encode($myObj);
echo $myJSON;
exit();
//Forcefully Update

function notify($title,$message,$reg_id)
{
	error_reporting(-1);
	ini_set('display_errors', 'On');

	require_once __DIR__ . '/firebase.php';
	require_once __DIR__ . '/push.php';

	$firebase = new Firebase();
	$push = new Push();

	$payload = array();
	$payload['app'] = 'UPKAR';

	$push->setTitle($title);
	$push->setMessage($message);
	$push->setImage('');
	$push->setIsBackground(FALSE);
	$push->setPayload($payload);


	$json = '';
	$response = '';

	$json = $push->getPush();
	$regId = $reg_id;
	$response = $firebase->send($regId, $json);
}
?>
