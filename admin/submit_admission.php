<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);
include "membersonly.inc.php";
$Members  = new isLogged(1);

$sl=$_REQUEST['sl'];
$fld1['sl']=$sl;
$op1['sl']="=,";

$list1  = new Init_Table();
$list1->set_table("main_apply","sl");
$row=$list1->search_custom($fld1,$op1,'',array('sl' => 'ASC'));
foreach ($row as $value) 
{ }
$value['nm'];

$pdo_obj  = new Init_Table();
$pdo_obj->set_table("main_student", "sl");
foreach ($field as $key => $vl) {
    $pdo_obj->$key = $vl;
}

$pdo_obj->create();
$msg = "Data Submited Successfully...";

?>
	<script>
		alert("<?php echo $msg; ?>");
		window.document.location = "<?php echo "acapls.php"; ?>";
	</script>







