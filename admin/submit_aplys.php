<?php
 ini_set("display_errors", "1");
error_reporting(E_ALL);
include "membersonly.inc.php";

$val=$_REQUEST['val'];
$sl=$_REQUEST['sl'];

$_POST5['sl']=$sl;
$_POST5['stat']=$val;

$pdo_obj  = new Init_Table();
$pdo_obj->set_table("main_apply", "sl");
foreach ($_POST5 as $key => $vl) {
    $pdo_obj->$key = $vl;
}
if($val==1){
    $text='Reject';
}
if($val==0){
    $text='Accept';
}

$pdo_obj->save();
?>


	<script>
		alert("<?php echo $text."ed sucessfully"; ?>");
		window.document.location = "<?php echo 'apls.php'; ?>";
	</script>

