<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);
include "membersonly.inc.php";
$Members  = new isLogged(0);
$adtl  = new Init_Table();
$adtl->set_table("main_signup","sl");
$row=$adtl->all();

$user_array=array();

$sld=base64_decode($_REQUEST['sl']);


$adtl_m  = new Init_Table();
$adtl_m->set_table("main_menu","sl");
$row2=$adtl_m->search(array('sl'=>$sld));
$userr=$row2[0]['user'];
$user_array=explode(',',$userr);
?>
<div class="row">
<!-- /.box-header -->
<!-- form start -->
<div class="box-body">
<form class="form-inline form-bordered" action="menu_assigns.php" method="POST">
<div id="wizard">

<div class="row">
<div class="form-group col-md-12">
<label>
<b><font color="#ed2618"></font>Select Users : </b>
</label>
<select id="user" name="user[]"  class="form-control select2" style="width:100%" multiple="multiple">
<?php
foreach ($row as $value) 
{
$mnm=$value['name'];
$sl=$value['username'];
?>
<option value="<?php echo $sl;?>"<?php if(in_array($sl,$user_array)){echo 'selected';}?>><?php echo $mnm;?></option>
<?php
}

?>
</select>
<input type="hidden" id="sl" name="sl" class="form-control" value="<?php echo $sld;?>" style="width:100%">
</div>	
<div class="form-group col-md-12" style="text-align: center;">
<p>
<br>
<input type="submit" class="btn btn-success" value="Assign">
</p>
</div>
</div>	

</form>
</div>
<!-- /.box body -->
</div>
	
          <!-- /.box -->
	</div>  
	<script>
	$('.select2').select2();
	
	</script>