<?php
error_reporting(0);
include('checklogin.php');
include("dbconnection.php");
include("include/header.php");
$name = $_SESSION['name'];
if($_SESSION['role'] == "send-course-detail" || $_SESSION['role']=="super-admin"){
    
    if(isset($_POST['applysubmit'])){
    	$name = ucfirst($_POST['Name']);
        $Email = $_POST['email'];
        $MobileNo = $_POST['mobile'];
        $limit = 8;
        $Uniqueid = random_int(10 ** ($limit - 1), (10 ** $limit) - 1);
        $Uniqueid = $Uniqu."".$Uniqueid;
        $Passwordu = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%&*_";
        $Passwordu = substr( str_shuffle( $Passwordu ), 0, 8 );
        
        $quy =  mysqli_query($con, "SELECT * FROM `franchise_detials` WHERE `Uniqueid`='$Uniqueid' || `Email`='$Email'");
        $numrows = mysqli_num_rows($quy);
        if($numrows==0){ 
           $query = mysqli_query($con,"INSERT INTO `admin`(`email`, `password`, `role`, `name`, `MobileNo`) VALUES ('$Email', '$Passwordu', 'distribute', '$name', '$MobileNo')");
            if($query){
                $dadtmani = "<a href='iimsr.net.in' style='text-decoration:none;'><p><span style='color:#0000fd;font-weight:700;font-size: 15px;'></span></p></a>
                <table style='padding: 20px;'>
                    <tr>
                        <td style='color: rgb(7, 55, 99);font-weight: 500;'>
                            <p> Dear, <span style='font-size: 12px;font-weight:500;'> $name</span></p>
                        </td>
                    </tr>
                    <tr>
                        <td style='color: rgb(7, 55, 99);font-weight: 600;'>Hope this mail finds you in the best of your health.</td>
                    </tr>
                    <tr>
                        <td style='color: rgb(7, 55, 99);font-weight: 600;'>Welcome to Imperial Institute of Management Science & Research! Your account is activated and login credentials are as below:</td>
                    </tr>
                    <tr>
                        <td style='margin-left:50px;color: rgb(7, 55, 99);'>
                            <p style='font-size: 13px;font-weight: 600;'>User ID :- <span style='font-size: 13px;color: rgb(0 0 255);'>$Email</span></p>
                            <p style='font-size: 13px;font-weight: 600;'>Password :- <span style='font-size: 13px;color: rgb(0 0 255);'>$Passwordu</span></p>
                        </td>
                    </tr>  
                    <tr>
                        <td style='color: rgb(7, 55, 99);font-weight: 700;'>Note: Do not share your account related information with anyone.</td>
                    </tr>
                    <tr>
                        <td style='color: rgb(7, 55, 99);font-weight: 700;'>Click here to login  :- <a href='https://iimsr.net.in/admin-12345'>Click here</a></td>
                    </tr>
                    <tr>    
                        <td style='color: #ff0000;font-weight: 600;'>Please feel free to contact us for further detail.</td>
                    </tr>
                    <tr>    
                        <td style='list-style:none;color: #0094de; font-weight: 700;font-size: 14px;'><p><b>With Regards:</b></p></td>
                    </tr>
                    <tr>    
                        <td style='list-style:none;'><b>Team - </b>IIMSR</td>
                    </tr>    
                    <tr>    
                        <td style='list-style:none;'>IIMSR</td>
                    </tr>    
                    <tr>    
                        <td style=''><b>E-48, Sector 3, Noida Gautam Budh Nagar Uttar Pradesh-201301</b></td>
                    </tr>    
                    <tr>    
                        <td style=''><b>For any query, please contact us at  : franchise@iimsr.net.in</b></td>
                    </tr>
                    <tr>    
                        <td style=''><b>Email:- franchise@iimsr.net.in</b> - <b>Website:- www.iimsr.net.in/</b></td>
                    </tr>
                </table>";
                $subject = "Congratulations..! $name You are part of Imperial Institute of Management Science & Research";
                $headers = array("From: franchise@iimsr.net.in",
                    "Reply-To: replyto@iimsr.net.in",
                    "X-Mailer: PHP/" . PHP_VERSION,
                    "Content-type: text/html; charset=iso-8859-1",
                    "Cc: anand24h@gmail.com"
                );
                $headers = implode("\r\n", $headers);
               mail($Email,$subject,$dadtmani,$headers);
            }
        }
        if($query){
    		$success = "<p class='OperationHas'>Thank You...! Details has been Submit Successfully!</p>";
    	}else{
    		$success = "<p class='AlreadyRegistered'>Oops...! Please Insert different Unique Id.</p>";
    	}
    }
?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Send distribute details<small></small></h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Send distribute details</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="box box-widget widget-user">
                    <!--<div class="widget-user-header bg-yellow"></div>-->
                    <div class="box-footer">
                        <form method="post" action="" enctype="multipart/form-data">
                            <?php
    							if (isset($_POST['applysubmit'])){
    								echo $success;
    							}else {
    								echo $success;
    							}
    						?>
                            <div class="row">
                                <div class="col-sm-3 col-md-3 col-lg-3 col-xs-12"></div>
                                <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                                            <label>Name:</label>
                                            <input type="text" name="Name" class="form-control" id="Name" value="" placeholder="Name" required>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                                            <label>Mobile No:</label>
                                            <input type="text" maxlength="10" class="form-control" id="mobile" pattern="\d{10}" name="mobile" title="Please enter exactly 10 digits" placeholder="Mobile No">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                                            <label>Email:</label>
                                            <input type="email" name="email" class="form-control" id="email" value="" placeholder="Email" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                                            <input type="submit" value="Send" name="applysubmit" class="btn btn-warning pull-right">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3 col-md-3 col-lg-3 col-xs-12"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br><br><br><br><br><br><br><br><br>
</div>
<?php include("include/footer.php");?>
<?php }else {header("location: login.php");}?>