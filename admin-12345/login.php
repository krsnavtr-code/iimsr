<?php 
session_start();
error_reporting(0);
include("dbconnection.php"); 
if (isset($_POST['login'])){
	$email = $_POST['email'];
	$captcha = $_POST['captcha'];
	$password = $_POST['password'];
	$_SESSION['email'] = $email;
	    $query = "SELECT * FROM admin where `email` ='$email' and `password` ='$password'";
        $result  = $con->query($query);
        $row = mysqli_fetch_array($result);
        $count = mysqli_num_rows($result);	
        if($count == 1) {
            $_SESSION['login'] = $email;
            $_SESSION['password'] = $password;
            $_SESSION["key"] = '54585c506829293a2d4c3b68543b316e2e7a2d277858545a36362e5f39';
            $_SESSION['id'] = $row['id'];
            $_SESSION['role'] = $row['role'];
            $_SESSION['name'] = $row['name'];
            
            if($_SESSION['role'] == 'super-admin'){
                header("location: index.php");
            }
            if($_SESSION['role'] == 'super-admin'){
                header("location: new-registration.php");
            }
            if($_SESSION['role'] == 'distribute' || $_SESSION['role']=="distribute, send-course-detail, send-sample, application-form" ){
                header("location: distribute-new-admi.php");
            }
            if($_SESSION['role'] == 'super-admin'){
                header("location: new-admission.php");
            }
            if($_SESSION['role'] == 'super-admin'){
                header("location: new-paymnet.php");
            }
            if($_SESSION['role'] == 'online-exam'){
                header("location: dash.php?q=0");
            }
            if($_SESSION['role'] == 'online-exam'){
                header("location: dash.php?q=1");
            }
            if($_SESSION['role'] == 'online-exam'){
                header("location: dash.php?q=2");
            }
            if($_SESSION['role'] == 'online-exam'){
                header("location: dash.php?q=4");
            }
            if($_SESSION['role'] == 'online-exam'){
                header("location: dash.php?q=5");
            }
            if($_SESSION['role'] == 'pay-slip'){
                header("location: payment-verified.php");
            }
            if($_SESSION['role'] == 'docs-verification'){
                header("location: new-admission.php");
            }
            if($_SESSION['role'] == 'team-leader'){
                header("location: new-payment.php");
            }
            if($_SESSION['role'] == 'add-course'){
                header("location: add-new-course.php");
            }
            if($_SESSION['role'] == 'send-course-detail'){
                header("location: send-course.php");
            }
            if($_SESSION['role'] == 'accountant'){
                header("location: payment-verify.php");
            }
            if($_SESSION['role'] == 'super-admin'){
                header("location: index.php");
            }
            if($_SESSION['role'] == 'distribute_lucknow'){
                header("location: index.php");
            }
        }else{
            $msg = "Username or Password is invalid please try again!";
        }
	
} 
if(isset($_POST['forgotpass'])){
    $updatesta = mysqli_query($con,"SELECT * FROM `admin` WHERE `role` ='super-admin'");
    $statusupd = mysqli_fetch_array($updatesta);
    $password = $statusupd['password'];
    $email = $statusupd['email'];
        $html = "<table align='center'style='margin-top:-80px;'>
                <tr><td><h1 style='text-align:center;font-size:18px;'>IM</h1></td></tr>
                <tr style='margin-top:20px !important;'>    
                    <td><b>Login Credentials : </b> </td>
                </tr>
                <tr>
                   <td>Username : <b>$email</b></td>
                </tr>    
                <tr>    
                   <td>Password : <b>$password</b></td>
                </tr>
            </table>";
            //echo $html;exit;
            $subject = "Super Admin Login Credentials ";
            $headers = array("From: info@iimsr.net.in",
                "Reply-To: replyto@iimsr.net.in",
                "X-Mailer: PHP/" . PHP_VERSION,
                "Content-type: text/html; charset=iso-8859-1",
                "Cc: anand24h@gmail.com"
            );
        $headers = implode("\r\n", $headers);
        mail($email,$subject,$html,$headers);
	if(!empty($email)){
	    $success = "<p class='OperationHas'>Password send Successfully</p>";
	}else{
		$success = "<p class='AlreadyRegistered'>Ooops.....! somthing went wrong</p>";
	}
}
?> 
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login | Imperial Institute of Management Science & Research | Log in</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <!--<div class="login-logo">
        <a href="index.php"><b>Imperial Institute of Management Science & Research</b> Institute</a>
    </div>-->
    <div class="login-box-body">
        <!--<h5>Imperial Institute of Management Science & Research</h5>-->
        <p class="login-box-msg">Sign in to start your session</p>
            <?php
    			if (isset($_POST['forgotpass'])){
    				echo $success;
    			}else {
    				echo $success;
    			}
    		?>
        <form action="" method="post">
            <div class="form-group has-feedback MrgningBot">
                <div class="input-group">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                    <span class="input-group-addon">
                        <i class="fa fa-envelope" aria-hidden="false"></i>
                    </span>
                </div>
            </div>
            <div class="form-group has-feedback MrgningBot">
                <div class="input-group">    
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                    <span class="input-group-addon">
                        <a><i class="fa fa-eye" aria-hidden="false" onclick="passwordeyes()"></i></a>
                    </span>
                </div>
            </div>
            <div class="form-group has-feedback MrgningBot">
                <input type="text" class="form-control" name="captcha" placeholder="Captcha">
            </div>
            <div class="form-group has-feedback Captchaa">
                <a href="<?php echo $_SERVER['PHP_SELF']; ?>"><img src="captcha.php" class="captchaimg"></a>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <input type="submit" name="login" class="btn btn-primary btn-block btn-flat ForgotPass" value="Sign In" />
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <input type="submit" name="forgotpass" class="btn btn-danger btn-block btn-flat" value="Forgot Password" />
                </div>
            </div>
        </form>
    </div>
</div>
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="plugins/iCheck/icheck.min.js"></script>
<style>
    @media(max-width:992px){
       .captchaimg{
            width: 283px;
        } 
    }
    .ForgotPass{
        margin:3px 0px 3px 0px;
    }
    .Captchaa{
        margin-bottom:3px;   
    }
    .MrgningBot{
        margin-bottom:5px;   
    }
    p.OperationHas {
        color: green;
        text-align: center;
        font-size: 16px;
        margin-top: -18px;
    }
    p.AlreadyRegistered {
        color: #ff0000;
        text-align: center;
        font-size: 16px;
        margin-top: -18px;
    }
</style>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%'
        });
    });
</script>
<script>
    function passwordeyes() {
        var x = document.getElementById("password").type;
        if(x=="password")
            document.getElementById("password").type="text";
        else
            document.getElementById("password").type="password";
    }
</script>
</body>
</html>
