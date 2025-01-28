<?php
error_reporting(0);
session_start();
include('dbconnection.php');
if(isset($_POST['changepass'])){
    $oldpass = $_POST['opwd'];
    $useremail = $_SESSION['login'];
    $newpassword = $_POST['npwd'];
    $sql = mysqli_query($con, "SELECT `Passwordu` FROM `register_here` WHERE `Passwordu`='$oldpass' && `enrolment`='$useremail'");
    $num = mysqli_fetch_array($sql);
    if($num>0){
        $con = mysqli_query($con,"UPDATE `register_here` SET `Passwordu`='$newpassword' WHERE `enrolment`='$useremail'");
        $_SESSION['msg1']="Password Changed Successfully !!";
    }else{
        $_SESSION['msg1']="Old Password not match !!";
    }
}
?>

<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <meta name="robots" content="Index, Follow" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">	
	<title>Your Experience Imperial Institute of Management Science & Research</title>
	<link rel="stylesheet" type="text/css" href="css/csss.css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="js/vbimtlandingpage.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body style="background-color:#dbdbff;">
    <div class="container" style="background-color:#fff;">
        <div class="row" id="top-bar">
            <div class="col-sm-8 col-md-8 col-lg-8 col-xs-8">
                <a href="https://iimsr.net.in/"><img src="logo.jpeg" alt="DZone" class="floatleft AdminPanelLogo" /></a>
            </div>	
            <div class="col-sm-4 col-md-4 col-lg-4 col-xs-4">
                <div class="topmeenu">
                    <a href="logout.php"><button type="button" class="btn btn-danger AdminLogoutBu">Logout</button></a>
                </div>
                <div class="topm"></div>
            </div>
        </div>
        <?php include('header/header.php'); ?>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                <div class="row">
                    <div class="col-sm-3 col-md-3 col-lg-3 col-xs-12"></div>
                    <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
                        <div class="row">
                            <div class="col-lg-12 text-center">
                                <h4>Change your Password</h4>
                                <p style="color:red;"><?php echo $_SESSION['msg1'];?><?php echo $_SESSION['msg1']="";?></p>
                                <form name="chngpwd" action="" method="post" onSubmit="return valid();">
                                    <table align="center">
                                        <tr height="50">
                                            <td>Old Password :</td>
                                            <td><input type="password" name="opwd" id="opwd"></td>
                                        </tr>
                                        <tr height="50">
                                            <td>New Passowrd :</td>
                                            <td><input type="password" name="npwd" id="npwd"></td>
                                        </tr>
                                        <tr height="50">
                                            <td>Confirm Password :</td>
                                            <td><input type="password" name="cpwd" id="cpwd"></td>
                                        </tr>
                                        <tr>
                                            <td><a href="#"></a></td>
                                            <td><input type="submit" name="changepass" value="Change Passowrd" /></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                <div class="col-sm-3 col-md-3 col-lg-3 col-xs-12"></div>
            </div>    
        </div>    
    </div>
    <br><br>
    <style>
        .floatleft.AdminPanelLogo {
            width: 470px;
            height: auto;
        }
        .Testimonipass{
            font-weight:600;
        }
        .enrollmentngg{
            border-radius:0px;
            border:#160fe8 1px solid;
            margin:5px 0px 5px 0px;
        }
    </style>
    <?php include('footer/footer.php'); ?>
</div>
<script type="text/javascript">
    function valid(){
        if(document.chngpwd.opwd.value=="") {
            alert("Old Password Filed is Empty !!");
            document.chngpwd.opwd.focus();
            return false;
        }else if(document.chngpwd.npwd.value==""){
            alert("New Password Filed is Empty !!");
            document.chngpwd.npwd.focus();
            return false;
        }else if(document.chngpwd.cpwd.value=="") {
            alert("Confirm Password Filed is Empty !!");
            document.chngpwd.cpwd.focus();
            return false;
        }
        else if(document.chngpwd.npwd.value!= document.chngpwd.cpwd.value) {
            alert("Password and Confirm Password Field do not match  !!");
            document.chngpwd.cpwd.focus();
            return false;
        }
        return true;
    }
</script>
</body>
</html>