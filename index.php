<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Standard Meta -->
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <!-- Site Properties -->
    <title>Bootstrap 4 Login Form</title>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
</head>
<body>
        <div class="container">
        <form class="form-horizontal" role="form" method="POST" action="registerFunction.php">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <h2>Please subscribe with email for comices</h2>
                    <hr>
                </div>
            </div>


            


            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="form-group has-danger">
                        <label class="sr-only" for="email">Email</label>
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-mobile"></i></div>
                            <input type="email" name="email" class="form-control" id="email"
                                   placeholder="enter email" required autofocus>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-control-feedback">
                        <span class="text-danger align-middle" id="msg">
                            
                        </span>
                    </div>
                </div>
            </div>
            
            
            <div class="row" style="padding-top: 1rem">
                <div class="col-md-3"></div>
                <div class="col-md-6">

                    <button type="submit" class="btn btn-success" name="submit" id="reg"><i class="fa fa-sign-in"></i>subscribe</button>
                     <button type="button" class="btn btn-success" name="submit" id="un"><i class="fa fa-sign-in"></i>Unsubscribe</button>
                    
                </div>
            </div>
        </form>
    </div>
</body>
</html>

<script type="text/javascript">
    

$(document).ready(function() {





     $("body").on("blur","#email",function(e)
{
        var mobile='';
        var email=$("#email").val(); 
        //alert(email);
        
    
    jQuery.ajax({
    url: "cheek.php",
    data:{email:email,mobile:mobile},
    type: "POST",
    success:function(data){

        

        //alert(data);

        if(data==1)
        {
                var msg='<i class="fa fa-close"></i>you are all ready Register';
            $("#msg").html(msg);
            $("#un").show();
            $("#reg").hide('hide');
        }
        else
        {

            $("#msg").html("avilable");
            $("#reg").show('show');
             $("#un").hide();
        }


        
    },
    error:function (){}
    }); 
            
            
          
    });  

 }); 
 $("#un").on("click",function(e)
{
        var mobile='';
        var email=$("#email").val(); 
        //alert(email);
        
    
    jQuery.ajax({
    url: "delete.php",
    data:{email:email,mobile:mobile},
    type: "POST",
    success:function(data){

        

        //alert(data);

           
            $("#reg").show('show');
             $("#un").hide();
             $("#msg").hide();


        
    },
    error:function (){}
    }); 
            
    });  



  </script>