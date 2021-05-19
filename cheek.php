<?php

include('RegisterController.php');



$user_email=$_POST['email'];
//$s=$obj->cheekEmail($con,$user_email


$user_mobile=$_POST['mobile'];

$s=$obj->cheekEmail($con,$user_email,$user_mobile);

echo $s;


?>