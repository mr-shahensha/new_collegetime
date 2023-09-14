<?php
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
