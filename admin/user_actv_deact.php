<?php
 ini_set("display_errors", "1");
error_reporting(E_ALL);
include "membersonly.inc.php";
$Members  = new isLogged(1);
	
function array_except($array, $keys) 
{
  return array_diff_key($array, array_flip((array) $keys));   
}
$id=$_REQUEST['id'];
$sl=$_REQUEST['sl'];
$val9=$_REQUEST['val'];
$tbl=$_REQUEST['tbl'];


$_POST8['id']=$id;	
$_POST8['stat']=$val9;	
	$exception7=array('submit_form','page_name');
	$field1=array_except($_POST8,$exception7);
			$pdo_obj888  = new Init_Table();
			$pdo_obj888->set_table($tbl,"id");
			foreach($field1 as $key=>$vl)
			{
			$pdo_obj888->$key=$vl;	
			}
			$pdo_obj888->save();

	$_POST88['username']=$id;	
	$_POST88['actnum']=$val9;	
		$exception8=array('submit_form','page_name');
$field11=array_except($_POST88,$exception8);
		$pdo_obj88  = new Init_Table();
		$pdo_obj88->set_table("main_signup","username");
		foreach($field11 as $key=>$vl)
		{
		$pdo_obj88->$key=$vl;	
		}
		$pdo_obj88->save();
?>
<script type="text/javascript">show();</script>