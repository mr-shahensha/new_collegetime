<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);
include "membersonly.inc.php";
$Members  = new isLogged(0);
$rmsl=$_POST['rmsl'];
$mnm=$_POST['mnm'];
$page=$_POST['page'];
$ordr=$_POST['ordr'];
$sl=$_POST['sl'];
$adtl  = new Init_Table();
$adtl->set_table("main_menu","sl");
if($rmsl=="" or $mnm=="" or $page=="" or $ordr=="" or $sl=="")
{
	?>
	<script>
	alert("Please Fill All The Field");
	history.go(-1);
	</script>
	<?php
}
else
{
	$adtl->rmsl=$rmsl;
	$adtl->mnm=$mnm;
	$adtl->page=$page;
	$adtl->ordr=$ordr;
	$adtl->sl=$sl;
	$adtl->save();
	?>
	<script>
	alert("Update Completed.");
	document.location="menu_setup.php";
	</script>
	<?php
}
