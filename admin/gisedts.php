<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);
include "membersonly.inc.php";
$Members  = new isLogged(1);


function array_except($array, $keys) 
{
  return array_diff_key($array, array_flip((array) $keys));   
}

$sl=$_REQUEST['sl'];
$fn=$_REQUEST['fn'];
$fv=rawurldecode($_REQUEST['fv']);
$div=$_REQUEST['div'];
$tblnm=$_REQUEST['tblnm'];

$cd='';
if($fv=="")
{
?>
<script>
alert('Please Fill Up!!!');
location.reload();
</script>
<?php 
}
else
{


$POSTR[$fn]=$fv;
$POSTR['sl']=$sl;


$exception=array();
$field=array_except($POSTR,$exception);
		$pdo_obj  = new Init_Table();
		$pdo_obj->set_table($tblnm,"sl");
		foreach($field as $key=>$vl)
		{
		$pdo_obj->$key=$vl;	
		}
	  $pdo_obj->save();			

//echo "UPDATE  $tblnm set $fn='$fv' where sl='$sl'";
//$sql =mysqli_query($conn,"UPDATE  $tblnm set $fn='$fv' where sl='$sl'") or die(mysqli_error($conn));

}
										
?>
<a onclick="sedt('<?php echo $sl;?>','<?php echo $fn;?>','<?php echo $fv;?>','<?php echo $div;?>','<?php echo $tblnm;?>')"><b><font size="" color="blue"><?php echo $fv;?></font></b></a>
