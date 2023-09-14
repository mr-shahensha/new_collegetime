<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);
include "membersonly.inc.php";
$Members  = new isLogged(1);
?>
 <?php
			
      $fld1['sl']='0';
      $op1['sl']=">,";

      $list1  = new Init_Table();
      $list1->set_table("main_degree","sl");
      $row=$list1->search_custom($fld1,$op1,'',array('sl' => 'ASC'));
		$path1="";
			?>
							<table class="table">
							<tr>
							<th width="30%">SL</th>
							<th width="40%">Test Type</th>
							<th width="30%">Action</th>
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
									<td><?php echo $cnt;?></td>
                  <td><?php echo $value['degnm'];?></td>
									<td>
									<a href="deg_edt.php?sl=<?php echo base64_encode($sl);?>"><input type="button" class="btn btn-primary btn-xs" value="Edit">
									</a>

									</td>
									</tr>
									<?php
								}
							?>

</table>