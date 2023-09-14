<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);
include "membersonly.inc.php";
$Members  = new isLogged(1);
function array_except($array, $keys) 
{
  return array_diff_key($array, array_flip((array) $keys));   
}
	$tbl=$_REQUEST['tbl'];
	$slq=$_REQUEST['sl'];
	$val9=$_REQUEST['val'];

	$_POST8['sl']=$slq;	
	$_POST8['stat']=$val9;	

	$exception7=array('submit_form','page_name');
	$field1=array_except($_POST8,$exception7);
			$pdo_obj888  = new Init_Table();
			$pdo_obj888->set_table($tbl,"sl");
			foreach($field1 as $key=>$vl)
			{
			$pdo_obj888->$key=$vl;	
			}
			$pdo_obj888->save();
?>
<script type="text/javascript">show();</script>