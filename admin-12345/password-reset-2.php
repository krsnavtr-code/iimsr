<?php
error_reporting(0);
include('checklogin.php');
include("dbconnection.php");
include("include/header.php");
if($_SESSION['role']=="super-admin"){
    if(isset($_POST['applysubmit'])){
    
    if(isset($_POST['email'])) {
        $email = $_POST['email'];
    }
    if(isset($_POST['role'])) {
        $role = $_POST['role'];
    }
    if(isset($_POST['activation_code'])) {
        $code = $_POST['activation_code'];
    }
    $query = mysqli_query($con,"SELECT * FROM `admin` WHERE `email`='$email' AND `role`='$role'"); 
    if(mysqli_num_rows ($query)==1){
        $code = rand(1000,9999);
        if($query){
            $to  = 'anand24h@gmail.com';
            $subject = "Password Reset Link";
            $subject = "Your Password Reset link send your registered mail id on role :$role - $code";
            $message = "Your Password Reset link is : https://iimsr.net.in/admin/password-reset-3.php?email=$email&code=$code";
            $mail = mail($to, $email, $subject, $message);
            
        }
        if($mail){
    		$success = "<p class='OperationHas'>Password Reset link successfully send your registered mail id</p>";
    	}else{
    		$success = "<p class='AlreadyRegistered'>Oops.....! Somthing Went Wrong</p>";
    	}
        $query2 = mysqli_query($con,"UPDATE `admin` SET `activation_code`='$code' WHERE `email`='$email' AND `role`='$role'"); 
    }else{
        $success = "<p class='AlreadyRegistered'>Oops.....! No user exist with this email id</p>";
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
                <form id="" class="form" action="password-reset-2.php" method="post">
                    <?php
            			if (isset($_POST['applysubmit'])){
            				echo $success;
            			}else {
            				echo $success;
            			}
            		?>
                    <div class="row" style="margin:0px 0px 0px 0px;">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                            <input type="text" class="form-control" placeholder="Please Enter Your Email ID" name="email" required>
                        </div>
                    </div>
                    <div class="row" style="margin:10px 0px 10px 0px;">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                	        <select name="role" class="form-control select2" required id="">
                                <option value="" disable>-Select role-</option>
                                <?php
                                    $querycourse = mysqli_query($con,'SELECT * FROM `admin`');
                                    $array = array();
                                    while($coursrow = mysqli_fetch_array($querycourse)){
                                        if(!in_array($coursrow['role'], $array)){
                                            $array[] = $coursrow['role'];
                                        }
                                    }
                                foreach($array as $dataa){ ?>
                                    <option value="<?php echo $dataa; ?>"><?php echo$dataa; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom:20px;">
                        <div class="col-sm-4 col-md-4 col-lg-4 col-xs-12"></div>
                        <div class="col-sm-4 col-md-4 col-lg-4 col-xs-12">
                            <input type="submit" class="btn btn-block btn-primary btn-xs ActionButtonRa" name="applysubmit" value="Send">
                        </div>
                        <div class="col-sm-4 col-md-4 col-lg-4 col-xs-12"></div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>
<?php include("include/footer.php");?>
<?php }else {header("location: login.php");}?>


















