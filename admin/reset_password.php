<?php
 ini_set("display_errors", "1");
error_reporting(E_ALL);
include "membersonly.inc.php";
$Members  = new isLogged(1);
	
function array_except($array, $keys) 
{
  return array_diff_key($array, array_flip((array) $keys));   
}

	$page_name=base64_decode($_REQUEST['page_name']);
	$_REQUEST["username"]=base64_decode($_REQUEST['username']);
	$_REQUEST['password']="123";
	$_REQUEST['pass']=md5('123');

	$exception7=array('submit_form','page_name');
	$field1=array_except($_REQUEST,$exception7);
			$pdo_obj888  = new Init_Table();
			$pdo_obj888->set_table("main_signup","username");
			foreach($field1 as $key=>$vl)
			{
			$pdo_obj888->$key=$vl;	
			}
			$pdo_obj888->save();

			$msg="Password Reset Successfully...";
?>
<script type="text/javascript">
alert("<?php echo $msg;?>");
window.document.location="<?php echo $page_name;?>";
</script>