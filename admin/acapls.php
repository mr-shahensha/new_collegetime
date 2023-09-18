<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);
if (isset($_REQUEST['pnm'])) {
    $page_title = base64_decode($_REQUEST['pnm']);
} else {
    $page_title = "Degree Entry";
}
include "membersonly.inc.php";
$Members  = new isLogged(1);
include "header.php";
function searchForId($id, $array, $chkfld, $sendfld)
{

    foreach ($array as $val) {
        if ($val[$chkfld] == $id) {
            return $val[$sendfld];
        }
    }
    return 'root';
}
?>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="dist/img/avatar.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?php echo $Members->User_Details->name; ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <?php echo include "left_bar.php"; ?>
    </section>
    <!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?php echo $page_title; ?>
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><?php echo $page_title; ?></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"><?php echo $page_title; ?> List</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body" id="shows">
                        <?php

                        $fld1['stat'] = '1';
                        $op1['stat'] = "=,";

                        $list1  = new Init_Table();
                        $list1->set_table("main_apply", "sl");
                        $row = $list1->search_custom($fld1, $op1, '', array('sl' => 'ASC'));
                        $path1 = "";
                        ?>
                        <table class="table">
                            <tr>
                                <td width="5%" align="center"><b>SL</b></td>
                                <td width="10%" align="center"><b>Name</b> </td>
                                <td width="5%" align="center"><b>Age</b> </td>
                                <td width="10%" align="center"><b>Date of Birth</b> </td>
                                <td width="10%" align="center"><b>Number</b> </td>
                                <td width="10%" align="center"><b>Email</b> </td>
                                <td width="15%" align="center"><b>Preivous School</b> </td>
                                <td width="15%" align="center"><b>Madhyamik Marks</b> </td>
                                <td width="10%" align="center"><b>Applied Stream</b> </td>
                                <!-- <td width="10%" align="center"><b>Action</b> </td> -->
                            </tr>
                            <?php
                            $cnt = 0;
                            $pdo = new MainPDO();
                            foreach ($row as $value) {
                                $cnt++;
                                $sl = $value['sl'];
                            ?>
                                <tr>
                                    <td align="center"><?php echo $cnt; ?></td>
                                    <td align="center"><?php echo $value['nm']; ?></td>
                                    <td align="center"><?php echo $value['age']; ?></td>
                                    <td align="center"><?php echo $value['dob']; ?></td>
                                    <td align="center"><?php echo $value['num']; ?></td>
                                    <td align="center"><?php echo $value['eml']; ?></td>
                                    <td align="center"><?php echo $value['prvsc']; ?></td>
                                    <td align="center"><?php echo $value['mMarks']; ?></td>
                                    <td align="center"><?php echo $value['strm']; ?></td>

                                    <!-- <td align="center">
                                        <button class="btn btn-success btn-xs" onclick="ac('0','<?php echo $sl;?>')">Accept</button>
                                        <button class="btn btn-danger btn-xs" onclick="ac('1','<?php echo $sl;?>')">Reject</button>

                                    </td> -->
                                </tr>
                            <?php
                            }
                            ?>

                        </table>

                    </div>
                    <!-- /.box body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<footer class="main-footer">

    <strong>Copyright &copy; 2019-2020 </strong> All rights reserved. Designed & Developed By <a href="http://onnetsolution.com">Onnet Solution Infotech Pvt. Ltd.</a>.
</footer>


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
<!-- Select2 -->
<script src="bower_components/select2/dist/js/select2.full.min.js"></script>
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

<link rel="stylesheet" href="chosen.css">
<script src="chosen.jquery.js" type="text/javascript"></script>
<script src="prism.js" type="text/javascript" charset="utf-8"></script>


</body>

</html>