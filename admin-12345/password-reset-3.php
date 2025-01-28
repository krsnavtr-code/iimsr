<?php
error_reporting(0);
include('checklogin.php');
include("dbconnection.php");
include("include/header.php");
if($_SESSION['role']=="super-admin"){
if(isset($_POST['pass'])){
    $pass = $_POST['pass'];
    $acode = $_POST['code'];
    $query = mysqli_query($con,"SELECT * FROM `admin` WHERE `activation_code`='$acode'"); 
    if (mysqli_num_rows ($query)==1) {
        $query3 = mysqli_query($con,"UPDATE `admin` SET `password`='$pass' WHERE `activation_code`='$acode'"); 
    }
    if($query3){
		$success = "<p class='OperationHas'>Password Successefully Changed</p>";
	}else{
		$success = "<p class='AlreadyRegistered'>Oops.....! Somthing Went Wrong</p>";
	}
}
?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Reset Password<small></small></h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Reset Password</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="overflow-x:auto; margin-bottom: 20px; height:530px;">
                <?php
    				if (isset($_POST['pass'])){
    					echo $success;
    				}else {
    					echo $success;
    				}
    			?>
                <form action="resetpass.php" method="POST">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                            <lable class="resetpassword">Please Enter New Password</lable>
                            <input type="password" class="form-control Comprehensive" placeholder="Please Enter New Password" name="pass" />
                            <input type="hidden" name="code" value="<?php echo $_GET['code'];?>" />
                        </div>
                    </div>
                    <div class="row Comprehensimarg">
                        <div class="col-sm-3 col-md-3 col-lg-3 col-xs-12">
                            <input type="submit" class="btn btn-block btn-warning btn-xs ActionButtonRa" name="applysubmit" value="Send">
                        </div>
                        <div class="col-sm-5 col-md-5 col-lg-5 col-xs-12">
                            <input type="submit" class="btn btn-block btn-success btn-xs ActionButtonRa" name="submit" value="Change Password" />
                        </div>
                        <div class="col-sm-4 col-md-4 col-lg-4 col-xs-12">
                            <a href="https://vbimtedu.org.in/admin/login.php" class="btn btn-block btn-primary btn-xs ActionButtonRa">Login</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>
<?php include("include/footer.php");?>
<?php }else {header("location: login.php");}?>