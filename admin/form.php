<?php

 ini_set("display_errors", "1");
error_reporting(E_ALL);
if(isset($_REQUEST['pnm']))
{
$page_title=base64_decode($_REQUEST['pnm']);
}
else
{
	$page_title="Dashboard";
}
include "membersonly.inc.php";
$Members  = new isLogged(1);
include "header.php";


$fsl=base64_decode($_REQUEST['vl']);
$form=new form_class;
		$pdo_obj  = new Init_Table();
		$pdo_obj->set_table("main_form","sl");
		$pdo_obj->sl = $fsl;	
		$pdo_obj->find();
		$form_title=$pdo_obj->lbl;
$form->NAME=$pdo_obj->NAME;
$form->METHOD=$pdo_obj->METHOD;
$form->ACTION=$pdo_obj->ACTION;
$form->debug="trigger_error";
$form->ResubmitConfirmMessage=
		"Are you sure you want to submit this form again?";
$form->OutputPasswordValues=1;
$form->OptionsSeparator="<br />\n";
$form->ShowAllErrors=1;
$form->InvalidCLASS='invalid';
$form->ErrorMessagePrefix="- ";
$form->ErrorMessageSuffix="";

	$form->AddInput(array(
		"TYPE"=>"hidden",
		"NAME"=>"table_name",
		"VALUE"=>$pdo_obj->tbl_nm
	));
	$form->AddInput(array(
		"TYPE"=>"submit",
		"NAME"=>"submit_form",
		"ID"=>"submit_form",
		"VALUE"=>"Submit",
		"CLASS"=>"btn btn-primary"
	));


		$fsla['fsl']=$fsl;
		$pdo_obj->set_table("main_fields","sl");
		$fields=$pdo_obj->search($fsla,array('forder' => 'ASC'));
		//print_r($fields);
		foreach($fields as $field) 
		{
			$farr=array();
			$exception=array('sl','fsl','ctyp','isShown','script','inreport','tr','forder');
			$field=array_except($field,$exception);
			foreach($field as $key=>$field_option) 
		{
			if($field_option!=0 or $field_option!="")
			{
			
			$farr[$key]=$field_option;
			}
		}
			
			$form->AddInput($farr);	
		}
function array_except($array, $keys) {
  return array_diff_key($array, array_flip((array) $keys));   
} 


?>
   <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $Members->User_Details->name;?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
	  <?php echo include "left_bar.php";?>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $page_title;?>
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><?php echo $page_title;?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
	<div class="row">
	<div class="col-12">
<div class="card">
                  <div class="card-header">
                    <h3 class="card-title"><?php echo $form_title;?></h3>
                  </div>
				  
                  <div class="card-body">
				  <?php 
				  $form->StartLayoutCapture();
				  ?>
				 <table class="table table-hover table-outline table-vcenter text-nowrap card-table">
				 <?php 
				 $tr=1;
				 while($tr>0)
				 {
				$fsla['tr']=$tr;
				 $rc=$pdo_obj->search($fsla,array('forder' => 'ASC'));
				 $tr+=1;
				 if(count($rc)==0)
				 {
					 $tr=0;
				 }
				 else
				 {
					 ?>
				<tr>
				<td>
				<table class="table table-hover table-outline table-vcenter text-nowrap card-table">
				<tr>
				<?php
				foreach($rc As $fl)
				{
					$fnm=$fl['NAME'];
					$isShown=$fl['isShown'];
					$larr["FOR"]=$fnm;
				?>
				<td>
                       <div class="form-group">
                        <label class="form-label"><?php if($isShown==1){$form->AddLabelPart($larr); }?></label>
                        <?php $form->AddInputPart($fnm); ?>
                      </div>
                </td>

<?php				
				}
                 ?>         
				 
				 </tr>
				 </table>
                          </td>
						  </tr>	

<?php						  
					 
				 }
				 }
		?>
<tr>
<td>
<?php		
$form->AddInputPart("submit_form");
				 ?>
					</td>
</tr>					
						  
						  
						  </table>
						  
	
<?php
$form->AddInputPart("table_name");
 	$form->EndLayoutCapture();
$form->DisplayOutput();
?>					  
</div>
</div>

               



</div>
	
	
	</div>
    </section>
    <!-- /.content -->
   </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    
    <strong>Copyright &copy; 2019-2020 </strong> All rights reserved. Designed & Developed By <a href="http://onnetsolution.com">Onnet Solution Infotech Pvt. Ltd.</a>.
  </footer>


  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
