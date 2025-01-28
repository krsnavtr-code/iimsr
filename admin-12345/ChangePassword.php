<?php
error_reporting(0);
include('checklogin.php');
include("dbconnection.php");
include("include/header.php");
if($_SESSION['role']=="super-admin"){
if(isset($_POST['changepass'])){
    $oldpass = $_POST['opwd'];
    $useremail = $_SESSION['login'];
    $role = $_SESSION['role'];
    $newpassword = $_POST['npwd'];
    $role = $_POST['role'];
    $adminid = $_SESSION['adminid'];
    $adminid = $_POST['adminid'];
    $sql = mysqli_query($con, "SELECT `password` FROM `admin` WHERE `password`='$oldpass' && `id`='$adminid'");
    $num = mysqli_fetch_array($sql);
    if($num>0){
        $con = mysqli_query($con, "UPDATE `admin` SET `password`='$newpassword' WHERE `id`='$adminid'");
        $_SESSION['msg1']="Password Changed Successfully !!";
        sleep(5);
        header( "Location: view-all-logins1.php" );
    }else{
        $_SESSION['msg1']="Old Password not match !!";
    }
}
if(isset($_POST['UpdatePassword'])){
    $role = $_POST['role'];
    $password = $_POST['password'];
    $adminid = $_POST['adminid'];
    $resultt = mysqli_query($con,"SELECT * FROM `admin` WHERE `id`='$adminid'");
    $roere = mysqli_fetch_array($resultt);
    $password = $roere['password'];
    $email = $roere['email'];
    $role = $roere['role'];
    $adminid = $roere['id'];
    
}
?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Change Password -- <a style="color:#000;font-size:14px;" href="view-all-logins1.php">view all logins</a></h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Change Password</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="overflow-x:auto; margin-bottom: 20px; height:530px;">
                <center><h4>Change your Password</h4></center>
                <center><p style="color:red;"><?php echo $_SESSION['msg1'];?><?php echo $_SESSION['msg1']="";?></p></center>
                <form name="chngpwd" action="" method="post" onSubmit="return valid();">
                    <table align="center">
                        <tr height="50">
                            <td>Old Password :</td>
                            <td>
                                <input type="text" value="<?php if(isset($_POST['UpdatePassword'])){ echo $password; } ?>" name="opwd" id="opwd">
                                <input type="hidden" value="<?php if(isset($_POST['UpdatePassword'])){ echo $email; } ?>" name="email" id="email">
                                <input type="hidden" value="<?php if(isset($_POST['UpdatePassword'])){ echo $role; } ?>" name="role" id="role">
                                <input type="hidden" value="<?php if(isset($_POST['UpdatePassword'])){ echo $adminid; } ?>" name="adminid" id="adminid">
                            </td>
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
    </section>
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
<?php include("include/footer.php");?>
<?php }else {header("location: login.php");}?>