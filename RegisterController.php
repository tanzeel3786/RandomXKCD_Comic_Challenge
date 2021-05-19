<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
$con=mysqli_connect("localhost","u957374009_bigdata","Bhardwaj21@","u957374009_bigdata");

class userRegister
{

//function matchingRecord($con,)
//{

//$pre_stmt = $con->prepare("SELECT * FROM `restaurant_product_list` WHERE `rplist_uniq`=?");
		//$pre_stmt->bind_param("s",$rplist_uniq);
        //$pre_stmt->execute() or die($con->error);
        //$result = $pre_stmt->get_result();
        //$rows = array();
        //if($result-> num_rows > 0)
        //{
        	    
            
           // return $rows;
       // }
        // return "No_data";


	//}

public function AllItem($con)

{

    $result = mysqli_query($con,"SELECT * FROM user");

while($row=mysqli_fetch_assoc($result)) {

            $resultset[] = $row;

        }       

        if(!empty($resultset))

            return $resultset;









}






//}




  function cheekEmail($con,$user_email,$user_mobile)
{
//$sql=mysqli_query($con,"SELECT user_id from user WHERE user_email='$user_email' OR user_mob='$user_mobile'");
  $sql=mysqli_query($con,"SELECT user_id from user WHERE user_email='$user_email'");
$row=mysqli_num_rows($sql);
if($row>0)
{
   $msg=1;
} 
else{

   $msg=0;
  }



return $msg;





}



function regUser($con,$s_uniqueid,$user_name,$user_email,$user_mobile,$user_password)
       {
                
      
        date_default_timezone_set("America/New_York");
        $new_d=date("y-m-d h:i:s");
        $user_uniq=uniqid();
    $msg=mysqli_query($con,"insert into user(s_uniqueid,user_uniq,user_fname,user_email,user_pass,user_mob,user_date) values('s_uniqueid','$user_uniq','$user_name','$user_email','$user_password','$user_mobile','$new_d')");


   //$msg=mysqli_query($con,"INSERT INTO inventory_staff_authority(s_uniqueid,staff_uniq_id,sa_authorities,sa_date)values('1223', '$staff_uniq','$sa_authorities','$new_d')"); 

if($msg)
  {
     
     return 0;
  }
  else
  {
    return "not insert";
  }
  
    
            
       }













public function genrateOtp($con,$user_email,$user_mobile)
{

  

//$otp='102';
$otp=rand(10,9999);
$sql=mysqli_query($con,"SELECT f_id from forget_password WHERE user_email='$user_email'");
$row=mysqli_num_rows($sql);
if($row)
{
  $msg=mysqli_query($con,"update forget_password set otp='$otp' where user_email='$user_email'");
 
}
else
{

$msg=mysqli_query($con,"INSERT INTO forget_password(s_uniqueid,user_email,user_mob,otp) values('001','$user_email','$user_mobile','$otp')");
}

if ($msg) {


//$this->send_transactional_msg($user_mobile,$otp);
$this->snedOtp($con,$user_email,$user_mobile,$otp);

 return 1;
  # code...
}
else
{
  return 0;
}
}



public function snedOtp($con,$user_email,$user_mobile,$otp)
{



require 'vendor/autoload.php';

$mail = new PHPMailer(true);

//$s="ananddicha@gmail.com";
$_get['email']=$user_email;
$_get['OTP']=$otp;
$_get['mobile']=$user_mobile;
$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPDebug = 0;
$mail->Host = 'smtp.hostinger.in';
$mail->Port = 587;
$mail->SMTPAuth = true;
$mail->Username = '';
$mail->Password = '';
$mail->setFrom('noreply@vaishalibeauti.tech', 'My Name');
$mail->addReplyTo('noreply@vaishalibeauti.tech', 'anand bhardwaj');
$mail->addAddress($_get['email'], 'anand Eng');
$mail->Subject = 'welcome to comics center';
//$mail->msgHTML(file_get_contents('message.html'), __DIR__);

$mail->Body = <<<EOT
Email: {$_get['email'] }
<br/>
Mobile : {$_get['mobile'] }
<br/>


your OTP is : {$_get['OTP'] }
EOT;
//$mail->addAttachment('test.txt');
if (!$mail->send()) {
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    //echo "send";
    //echo "<script>window.location.href='../thank.php'</script>";	
}




}



public function sendcomics($user_email,$msg,$comics)
{



require 'vendor/autoload.php';

$mail = new PHPMailer(true);

//$s="ananddicha@gmail.com";
$_get['email']=$user_email;
$_get['msg']=$msg;
$_get['comics']=$comics;
$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPDebug = 0;
$mail->Host = 'smtp.hostinger.in';
$mail->Port = 587;
$mail->SMTPAuth = true;
$mail->Username = '';
$mail->Password = '';
$mail->setFrom('noreply@vaishalibeauti.tech', 'My Name');
$mail->addReplyTo('noreply@vaishalibeauti.tech', 'anand bhardwaj');
$mail->addAddress($_get['email'], 'anand bhardwaj');
$mail->IsHTML(true);
$mail->AddEmbeddedImage("images/found.jpg", 'my-attach',"images/found.jpg");
$mail->addAttachment("images/found.jpg", "filename");
$mail->Subject = 'welcome to comics center';
//$mail->msgHTML(file_get_contents("anu.html"), __DIR__);
$mail->Body = <<<EOT

'<img alt="PHPMailer" src="cid:my-attach">';
EOT;

//$mail->addAttachment('test.txt');
if (!$mail->send()) {
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    //echo "send";
    //echo "<script>window.location.href='../thank.php'</script>";	
}

}




function matchOtp($con,$user_mobile,$otp)
{

$sql= mysqli_query($con,"SELECT * FROM forget_password WHERE user_email='$user_mobile' AND otp='$otp' ");
$num=mysqli_fetch_array($sql);
if ($num) {


  return 1;
  # code...
}
else
{
return 0;
}







}


}

$obj=new userRegister();

//print_r( $obj->genrateOtp($con,'anand@gmail.com','8115646235'));

//$s=$obj->genrateOtp($con,'anand@gmail.com','8115646235');

//echo $obj->matchOtp($con,$s[0],$s[2]);

?>