<?
include("membersonly.inc.php");
date_default_timezone_set('Asia/Kolkata');
$dt=date('Y-m-d');
$edtm=date('d-m-Y H:i:s');
$blno=$_POST['blno'];
$invto=$_POST['invto'];
$pinv=$_POST['pinv'];
$pinvdt=$_POST['pinvdt'];
$blnoto=$_POST['blnoto'];
$invdt=$_POST['invdt'];
$invdet=$_POST['invdet'];
$saddr=$_POST['saddr'];

$cl=$_POST['cl'];
$dy=$_POST['dy'];
$blnodet=$_POST['blnodet'];
$sac=$_POST['sac'];
$saddr1=$_POST['saddr1'];
$invdet1=$_POST['invdet1'];
$sman=$_POST['sman'];
$blnodet1=$_POST['blnodet1'];
$ccr=$_POST['ccr'];
$invdet2=$_POST['invdet2'];
$blnodet2=$_POST['blnodet2'];
$saddr2=$_POST['saddr2'];
$ttamm=$_POST['itval'];
$vat=$_POST['vat'];
$vatamm=$_POST['tvat'];
$inet=$_POST['inet'];
$rtype=$_POST['rtype'];
$roff=$_POST['roff'];
$pf=$_POST['pf'];
$vno=$_POST['vno'];
$pc=$_POST['pc'];
$tp=$_POST['tp'];
$iamm=$_POST['iamm'];
$nrtn=$_POST['nrtn'];

if($vatamm<=0)
{
    $err="Please Select Vat %";
}

  

if($invto=="CASH")
{
	$nm="CASH";
}
else
{
	$query6="select * from  main_ship where sl='$invto'";
			$result5 = mysql_query($query6);
			while($row=mysql_fetch_array($result5))
			{
            $nm=$row['spn'];
			}
	
}
 $query1 = "SELECT sum(tamm) as tamm1 FROM main_billdtls where blno='$blno'";
   $result1 = mysql_query($query1);
while ($R1 = mySql_fetch_array ($result1))
{
$gttl=$R1['tamm1'];

}

if($gttl==0){
    $err="Please Add Some Product First";
}

if($err=="")
{
$query21 = "update main_billing set pmode='$ccr',invto='$invto',pinv='$pinv',pinvdt='$pinvdt',blnoto='$blnoto',invdt='$invdt',invdet='$invdet',cl='$cl',blnodet='$blnodet',sman='$sman',ttamm='$ttamm',vat='$vat',vatamm='$vatamm',inet='$inet',rtype='$rtype',roff='$roff',pf='$pf',iamm='$iamm',pc='$pc',tp='$tp',vno='$vno',nrtn='$nrtn',nm='$nm',saddr='$saddr',saddr1='$saddr1',saddr2='$saddr2' where blno='$blno'";
$result21 = mysql_query($query21)or die(mysql_error()); 

$query21 = "update ".$DBprefix."drcr set cid='$invto',dt='$invdt',amm='$iamm' where cbill='$blno' and dldgr='4' and cldgr='-2'";
$result21 = mysql_query($query21);



$sln=0;
 $query = "SELECT * FROM main_billdtls where blno='$blno'";
   $result = mysql_query($query);
  
while ($row = mySql_fetch_array ($result))
{
$sl=$row['sl'];	
$pnm=$row['pnm'];
$psl=$row['psl'];
$t=$row['t'];	
$l=$row['l'];
$w=$row['w'];
$p=$row['p'];
$srate=$row['srate'];
$pcs=$row['pcs'];
$asqmt=$row['asqmt'];
$rsmm=$row['rsmm'];
$rad=$row['rad'];
$tamm=$row['tamm'];
$refno=$row['refno'];
$manu=$row['manu'];
$del=$row['stat'];
$rtmm1=$rsmm/$t;
$rtmm=number_format($rtmm1,2);
$volout=(($l/1000)*($w/1000)*$t*$pcs);



$query21 = "update main_stock set dt='$invdt' where psl='$psl' and blno='$blno'";
$result21 = mysql_query($query21)or die(mysql_error()); 



}


 $err="Update Successfully. Thank You...";
}
?>
<Script language="JavaScript">
alert('<?=$err;?>');
document.location="invwise1.php";
</script>
<?





