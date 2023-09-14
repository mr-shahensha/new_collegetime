<?php
 ini_set("display_errors", "1");
error_reporting(E_ALL);
include "membersonly.inc.php";
$Members  = new isLogged(1);
	
function array_except($array, $keys) {
  return array_diff_key($array, array_flip((array) $keys));   
}


$sl=$_REQUEST['sl'];
$tbl=$_REQUEST['tbl'];

$_POST1["sl"]=$sl;


$exception=array('submit_form','table_name','page_name');
$field=array_except($_POST1,$exception);
		$pdo_obj  = new Init_Table();
		$pdo_obj->set_table($tbl,"sl");
		foreach($field as $key=>$vl)
		{
		$pdo_obj->$key=$vl;	
		}
 
		    $pdo_obj->delete(); 
         	$msg="Data Deleted Successfully...";


?>
<script>
show();
</script>




