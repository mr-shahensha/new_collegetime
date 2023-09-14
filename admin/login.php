<?PHP
require_once("include.class.php");
if(isset($_POST["username"]) )
{
$rememberMe="";	
$username11 = $_POST["username"];
$password1 = md5($_POST["password"]);

$fld1['username']=$username11;
$op1['username']="=, or ";
$fld1['mob']=$username11;
$op1['mob']="=, ";
$list1  = new Init_Table();
$list1->set_table("main_signup","sl");
$group=$list1->search_custom($fld1,$op1,'',array('sl' => 'DESC'));
foreach($group as $key=>$ptp)
{
$username1=$ptp['username'];
}




$SIP=$_SERVER ['REMOTE_ADDR'];
$dttm=date('Y-m-d H:i:s A');
if(isset($_POST["rememberMe"]))
{
$rememberMe = $_POST["rememberMe"];
}
$SIP=$_SERVER [ 'REMOTE_ADDR' ];	
if ($rememberMe == "rememberMe"){
	$rememberMe = "1";
}else{

	$rememberMe = "0";
}

$test  = new Init_Table();
$test->set_table("main_signup","username");
$test->username = $username1;		
$test->find();
if($test->variables!="")
{
if ($test->actnum == "0" && ($test->userlevel <=5 or $test->userlevel>=10)){
if ($test->numloginfail <= 5){	
if ($test->pass == $password1){	

$test->set_table("main_signup","username");
$test->username = $username1;
$test->lastlogin = date('Y-m-d H:i:s A');
$test->numloginfail = '0';
$test->Save();

session_start();
session_unset();
$_SESSION["pass"] = $password1;
$_SESSION["id"] = $username1;	
$_SESSION["lastlog"] = date('Y-m-d H:i:s A');

$test->set_table("main_log","sl");
$test->username = $username1;
$test->ip = $SIP;
$test->intime = $dttm;
$test->laccessed = $dttm;
$test->Create();
if($rememberMe=="1")
{
setcookie("rememberCookieUname",$username1,(time()+604800));
setcookie("rememberCookiePassword",md5($password1),(time()+604800));
}
header("Location: index.php");
	
	
}
else
{

    ?>
<script>
	alert("Password Missmatched.....");
		window.document.location="login.php";
	
	</script>	
	<?php
//die(header("location:login.php"));
}		
}
else
{

    ?>
<script>
	alert("Account Under Attack.....");
		window.document.location="login.php";

	</script>	
	<?php
//die(header("location:login.php"));
}		
}
else
{

    ?>
<script>
	alert("Account Not Activated.....");
		window.document.location="login.php";

	</script>	
	<?php
//die(header("location:login.php"));
}	
	
}
else
{
    ?>
<script>
	alert("Data Not Found.....");
		window.document.location="login.php";

	</script>	
	<?php
//die(header("location:login.php"));

}

	
}
else
{
	$cdtl  = new Init_Table();
		$cdtl->set_table("main_cname","sl");
		$cdtl->sl = "1";	
		$cdtl->find();	
?>
<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Welcome To <?php echo $cdtl->cn;?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
<center>
<img src="pic/logo-icon.png" class="img-circle" style="height:100px; width:100px;"  alt="">
</center>

  <div class="login-logo">
    <a href="index2.html"><b><?php /* echo $cdtl->cn;*/?></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form action="login.php" method="post">
      <div class="form-group has-feedback">
        <input type="text" name="username" class="form-control" placeholder="User Name">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

   
    <!-- /.social-auth-links -->

    <a href="registration.php">NEW LAB REGISTRATION</a><br>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html> 

               
<?php
}
?>
