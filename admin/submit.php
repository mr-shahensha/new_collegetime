<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);
include "membersonly.inc.php";
$Members  = new isLogged(1);
	
function array_except($array, $keys) {
  return array_diff_key($array, array_flip((array) $keys));   
}
$_POST["eby"]=$Members->User_Details->username;
$_POST["edt"]=date('Y-m-d');
$_POST["edtm"]=date('Y-m-d H:i:s A');
$tbl_nm=$_POST['table_name'];


if($tbl_nm=="main_form")
{
$exec=$_POST['exec'];	
$exec_data="";
$exe=$exec[0];	
 $exec1=explode(',',$exe);
for($i=0;$i<count($exec1);$i++)
{
$exe2=explode('(',$exec1[$i]);	
$exe3=$exe2[1];
$exe4=explode(')',$exe3);	
$exe1=$exe4[0];

if($exec_data=="")
{
$exec_data=$exe1;
}
else
{
$exec_data=$exec_data.",".$exe1;
}
}
$_POST["exec"]=$exec_data;
}

if($tbl_nm=="main_signup")
{
  $_POST["mpass"]=md5($_POST["password"]);  
}
$exception=array('submit_form','table_name','cpass','old_pass','page_name');
$field=array_except($_POST,$exception);
//print_r($_POST);
		$pdo_obj  = new Init_Table();
		$pdo_obj->set_table($tbl_nm,"sl");
		foreach($field as $key=>$vl)
		{
		$pdo_obj->$key=$vl;	
		}
		if(isset($_POST["sl"]) )
			{
				if($tbl_nm=="main_signup")
					{
						$pdo_obj->save(); 
						$msg="Data Updated Successfully...";
						
					}
					else
					{
						$pdo_obj->save(); 
						$msg="Data Updated Successfully...";
					}
			}
			else
			{
				$pdo_obj->create();
				$msg="Data Submited Successfully...";
					if($tbl_nm=="main_form")
	{
	    $tbl="main_".$_POST['alias'];
	    $qr="CREATE TABLE ".$tbl." ( `sl` DOUBLE NOT NULL AUTO_INCREMENT , `eby` VARCHAR(300) NOT NULL , `edt` DATE NOT NULL , `edtm` VARCHAR(100) NOT NULL , PRIMARY KEY (`sl`)) ENGINE = MyISAM;";
	    $qdtl  = new ONS_PDO();
	    $qdtl->conn->exec($qr);
	    
	}
			}
?>
	<script>
	alert("<?php echo $msg;?>");
history.go(-1);
	</script>
