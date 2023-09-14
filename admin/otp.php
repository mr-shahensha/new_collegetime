<?php
include("config.php");
include "send_sms_function.php";
$edt = date('Y-m-d');
$mob=$_REQUEST['mob'];
$hash=$_REQUEST['hash'];
//otp.php?mob=7501573838

$response = array();
$err="";
	/*$sql99=mysqli_query($conn,"select * from main_signup where mob='$mob' or username='$mob'") or die (mysqli_error($conn));
	$count6=mysqli_num_rows($sql99);

	if($count6==0)
{

$response['error'] = true;
$response['message'] = "Not registered";
$response['mob'] = $mob;
$response['otp'] = "";
$response['hash'] = "";
$response['sms'] = "";
}
else
{
	while($row99=mysqli_fetch_array($sql99))
	{	
	$username1=$row99['username'];
	$mob1=$row99['mob'];
}}*/
	
	 
	 

$otp=substr(str_shuffle('1234567890123456789012345678901234567890') , 0 , 4 );
//$message="<#> Your One Time Password(OTP) code is: ".$otp."  for verification of your mobile ".$hash;

				/*	$query1 = "UPDATE ".$DBprefix."signup Set otp='$otp' where username='$username1' ";
					$result1 = mysqli_query($conn,$query1);	
				*/	
//send_sms($mob,$message);
		
		$message="Your verification code for upkar is: ".$otp." It will be valid for next 1 hour ".$hash;
$tid='1207162265212773246';
send_sms($mob,$message,$tid);
			$msg= "OTP Send Successfully ";
			
			$err = false;
			
$response['error'] = false;
$response['message'] = "OTP Send Successfully ";
$response['mob'] = $mob;
$response['otp'] = $otp;
$response['hash'] = $hash;
$response['sms'] = $message;
				
					

echo json_encode($response);