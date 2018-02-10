<?php
include_once('dbconnection.php');
session_start();
$error = " ";
if(isset($_REQUEST['sub']))
{

$uname=$_POST['uname'];
$pwd=$_POST['pwd'];	

$select="select *from admin where name='$uname' and pwd='$pwd' ";
$res=mysqli_query($con,$select);
$logindetails=mysqli_fetch_array($res);

$id=$logindetails['sno'];
$dbunam=$logindetails['name'];
$dbpwd=$logindetails['pwd'];

$_SESSION['id']=$id;

if($uname==$dbunam && $pwd==$dbpwd)
{
header('Location:welcome.php');
}
else
{
$error = "Enter Valid Details For Login";
}


}
?>
  <body style="background:#cdcdcd;background-image: url(../img/splash_screen_bg.jpg); background-attachment: fixed;">
  
<div class="container-fluid">
<div class="row">
  <div class="col-md-4 mx-auto pt-5">
    <div class="p-2" style="box-shadow: 0 0 11px 5px rgba(0, 0, 0, 0.08);background-color:#fff;">
	<img src="../img/wedobest_logo.png" class="img-fluid mx-auto d-block pt-3" style="height:8em;">
<form  METHOD=post class="p-3">
<label style="color:#f00;"><?php echo $error; ?></label>
<div class="form-group">
    <label for="USERNAME ">USERNAME: </label>
<input class="form-control" id="USERNAME" type=text name=uname required />
</div>
<div class="form-group">
    <label for="PASSWORD ">PASSWORD: </label>
<input type=password name=pwd id="PASSWORD" class="form-control" required  />
</div>
<div class="form-group text-center">
<input class="btn btn-primary w-50 " type=submit name=sub />
</div>
</form>
</div>
</div>
</div>
</div>
