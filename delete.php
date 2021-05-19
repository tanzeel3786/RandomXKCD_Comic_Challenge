<?php 
$con=mysqli_connect("localhost","u957374009_bigdata","Bhardwaj21@","u957374009_bigdata");
$email=$_POST['email'];
$p=$_POST['mobile'];


        $sql = mysqli_query($con,"DELETE FROM user WHERE user_email = '$email'"); 


    
    

   ?>