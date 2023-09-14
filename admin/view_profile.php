<?php
include "config.php";
include "SimpleImage.php";
date_default_timezone_set("Asia/Kolkata");
$dt=date('Y-m-d');
$edt=date('Y-m-d');
$edtm=date('Y-m-d H:i:s a');
$time=date('H:i:s a');
$cy=date('Y');
//$link="http://onnetsolution.in/upkar/";

$response = array();
$response1 = array();

$uid=$_REQUEST['uid'];
if($uid!=""){$uid1=" and id='$uid'";}else{$uid1="";}

		$ttyu89=mysqli_query($conn,"select * from main_user where sl>0  $uid1") or die (mysqli_error($conn));
while($ghu89=mysqli_fetch_array($ttyu89))
		{

	 $sl=$ghu89['sl'];/*user fnm*/
	 $fnm=$ghu89['fnm'];/*user fnm*/
	 $lnm=$ghu89['lnm'];/*user lnm*/
	 $unm=$ghu89['id'];/*user id*/
	 $i_path=$ghu89['path'];
	 $mob=$ghu89['mob'];
	 $dob=$ghu89['dob'];
	 if($dob!="0000-00-00"){
	 $dob=date('d-M-Y', strtotime($dob));
	}else{	 $dob="";}
	$addr=$ghu89['addr'];
	$addr2=$ghu89['addr2'];
	$st=$ghu89['st'];
	$pin=$ghu89['pin'];
	$gen=$ghu89['gen'];
	$email=$ghu89['email'];
	$bg=$ghu89['bg'];
	$cont1=$ghu89['cont1'];
	$cont2=$ghu89['cont2'];
	$cont3=$ghu89['cont3'];
	 

	 
	 
	 
	 	 $img_path="../".$i_path;/*user img*/
	
if($i_path!="")
{
if(file_exists($img_path))
{
	$img_path=$link.$i_path;
}
else{
$img_path=$link."pic/profile.jpg";
}
}
	 

	
$response['sl'] = $sl;
$response['id'] = $unm;
$response['fnm'] = $fnm;
$response['fnm'] = $fnm;
$response['lnm'] = $lnm;
$response['mob'] = $mob;
$response['dob'] = $dob;
$response['gen'] = $gen;
$response['email'] = $email;
$response['bg'] = $bg;
$response['addr'] = $addr;
$response['addr2'] = $addr2;

$response['pin'] = $pin;
$response['st'] = $st;
$response['cont1'] = $cont1;
$response['cont2'] = $cont2;
$response['cont3'] = $cont3;	 




$response['img_path'] = $img_path;
$response1[] = $response;


}

	

	$err = false;
	$message="Data Available"; 
	$myObj = new StdClass;	
	$myObj->error = $err;
	$myObj->message = $message;
$myObj->data = $response1;

	$myJSON = json_encode($myObj);
	echo $myJSON;   
		

	