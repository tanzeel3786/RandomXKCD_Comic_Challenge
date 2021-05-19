<?php 


include('RegisterController.php');
$user='';
//$email=$_POST['email'];
$email=$_POST['email'];
$password='';
$mobile='';


$data= array($user,$email,$password,$mobile);

session_start();

$_SESSION["user"]=$data;
//print_r($_SESSION["user"]);

$s=$obj->genrateOtp($con,$email,$mobile);
//$obj->snedOtp($con,$user_email,$user_mobile,$otp);

if($s)
{

echo "<script>window.location.href='otpmatch.php'</script>";

}





?>