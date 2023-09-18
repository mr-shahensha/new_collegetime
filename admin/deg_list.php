<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);
include "membersonly.inc.php";
$Members  = new isLogged(1);
$sl=$_REQUEST['sl'];

if($sl!=""){
	$pdo_obj  = new Init_Table();
	$pdo_obj->set_table("main_degree","sl");
	foreach($_REQUEST as $key=>$vl)
	{
	$pdo_obj->$key=$vl;	
	}
	$pdo_obj->delete(); 

}
	
      $fld1['sl']='0';
      $op1['sl']=">,";

      $list1  = new Init_Table();
      $list1->set_table("main_degree","sl");
      $row=$list1->search_custom($fld1,$op1,'',array('sl' => 'ASC'));
		$path1="";
			?>
							<table class="table">
							<tr>
							<td width="20%" align="center"><b>SL</b></td>
							<td width="40%" align="center"><b>Degree name</b> </td>
							<td width="40%" align="center"><b>Action</b> </td>
							</tr>
								<?php	
								$cnt=0;
                $pdo= new MainPDO();
								foreach ($row as $value) 
								{
									$cnt++;
									$sl=$value['sl'];
									?>
									<tr>
									<td align="center"><?php echo $cnt;?></td>
                  <td align="center"><?php echo $value['degnm'];?></td>
									<td align="center"> 
									<a class="btn btn-primary btn-sm" href="deg_edt.php?sl=<?php echo base64_encode($sl);?>">Edit
									</a>
									<button class="btn btn-sm btn-danger" onclick="cal_del(<?php echo $sl?>)">Delete</button>
									</td>
									</tr>
									<?php
								}
							?>

</table>
