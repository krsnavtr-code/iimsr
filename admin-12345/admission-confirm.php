<?php
error_reporting(0);
include('checklogin.php');
include("dbconnection.php");
include("include/header.php");
if($_SESSION['role'] == "docs-verification" || $_SESSION['role']=="super-admin"){
    global $name;
    global $email;
    global $enrolm;
    global $course;
    global $total_fee;
    global $submit_fee;
    $enrol="";	
    $branch="";
    
if (isset($_POST['fetch'])) {
	$_SESSION['enrolment'] = $enrol;
	$enrol = $_POST['enrolment'];
	$query = mysqli_query($con, "select * from `register_here` where `enrolment` = '$enrol'");
	while ($row = mysqli_fetch_array($query)){
	    //print_r($row);exit;
	    $name = $row['name'];		  
	    $email = $row['email'];
		$enrolm = $row['enrolment'];
		$course = $row['course'];		
		$total_fee =  $row['total_fee'];		
		$submit_fee =  $row['submit_fee'];		
	}								
}
if(isset($_POST['applysubmit'])){
    $name = strtoupper($_POST['name']);
    $course = $_POST['course'];
    $email = $_POST['email'];
    $enrolment = $_POST['enrolment'];
    $total_fee = $_POST['total_fee'];
    $query = mysqli_query($con,"INSERT INTO `admission_cofirm`(`enrolment`, `name`, `course`, `email`, `total_fee`) VALUES ('$enrolment', '$name', '$course', '$email', '$total_fee')");
    if($query){
        $html = "<table align='center'style='margin-top:-80px;'>
            <tr><td><h1 style='text-align:center;font-size:18px;'>Admission Confirmation</h1></td></tr>
            <tr><td>Dear <b>$name</b></td></tr>
            <tr><td>Sub: Admission Confirmation</td></tr>
            <tr><td>Hope this mail finds you in the best of your health.</td></tr>
            <tr>
                <td style='margin-left:50px;'><p style='text-align:justify;'>
                    Welcome to the Grand Family of IIMSR, we wish you good luck for your study with us, here in IIMSR we help you increase your expertise and learn the professional nuances of your respective field. We also encourage you to have clarity on any issue either related to subject or anything required for the smooth completion of your course in Imperial Institute of Management Science & Research</p>
                </td>    
            </tr>    
            <tr><td>Please find the below mentioned details of your fees & Course</td></tr>    
            <tr style='margin-top:20px !important;'><td>Course : <b>$course</b></td></tr>    
            <tr><td>Fee : <b>$total_fee</b></td></tr>    
            <tr><td>Exam Fee : <b>1000/Semester</b></td></tr>    
            <tr>    
                <td>Taxes* : <b>If Applicable</b></td>
            </tr>
            <tr>
               <td>For further help please contact : <b>Admin : info@iimsr.net.in</b></td>
            </tr>
            <tr style='margin-top:20px !important;'>    
                <td><b>Payment Detail : </b> </td>
            </tr>
            <tr>
               <td>Account Name : <b>Imperial Institute of Management Science & Research</b></td>
            </tr>    
            <tr>    
               <td>Account Number : <b>50200060190136</b></td>
            </tr>
            <tr>    
               <td>IFSC Code : <b>HDFC0000394</b></td>
            </tr>
            <tr>    
               <td>Bank Name : <b>HDFC Bank</b></td>
            </tr>
            <tr style='margin-top:20px !important;'>    
               <td style='color: #881616;font-size: 15px;text-align: justify;''>N.B: Postal/ RTI/Online verification available</td>
            </tr>
            <tr>    
               <td style='color: #881616;font-size: 15px;text-align: justify;''>Please feel free to contact us for further detail.</td>
            </tr>
            <tr style='margin-top:20px !important;'>
                <td>
                    <ul style='padding: 0px 8px 0px 0px;margin: 0px 0px 0px -16px !important;;'>
                        <li style='list-style:none;color:#3e3efe;'>Regards</li>
                        <li style='list-style:none;color:#3e3efe;'>IIMSR Admin</li>
                        <li style='list-style:none;color:#3e3efe;'>Imperial Institute of Management Science & Research</li>
                        <li style='list-style:none;color:#3e3efe;'>B-63, Sector 64, Noida, Gautam Budha Nagar UP-201301</li>
                        <li style='list-style:none;color:#3e3efe;'>Customer Care Number: 9891030303</li>
                    </ul>
                </td>
            </tr>
            <tr style='margin-top:20px !important;'>
                <td>
                    <ul style='padding: 0px 8px 0px 0px;margin: 0px 0px 0px -16px;'>
                        <li style='list-style:none;'>Email:info@iimsr.net.in</li>
                        <li style='list-style:none;'>www.iimsr.net.in</li>
                    </ul>
                </td>
            </tr>
            <tr><td style='color:green;text-align:justify;'>Please be responsible for your environment. Don't print this e-mail unless absolutely necessary </td></tr>
            <tr>    
               <td style='color: #881616;font-size: 15px;text-align: justify;'>'This e-mail message may contain confidential, proprietary or legally privileged information. It should not be used by anyone who is not the original intended recipient. If you have erroneously received this message, please delete it immediately and notify the sender. Any other use, retention, dissemination, forwarding, printing, modification or copying of this e-mail is strictly prohibited. Before opening any attachments please check them for viruses and defects.'</td>
            </tr>
        </table>";
        //echo $html;exit;
        $subject = "Admission Confirmation ";
        $headers = array("From: admission-confirmation@iimsr.net.in",
            "Reply-To: replyto@iimsr.net.in",
            "X-Mailer: PHP/" . PHP_VERSION,
            "Content-type: text/html; charset=iso-8859-1",
            "Cc: anand24h@gmail.com"
        );
    $headers = implode("\r\n", $headers);
    mail($email,$subject,$html,$headers);
    }
	if($query){
	    $success = "<p class='OperationHas'>Admission Confirmation mail send Successfully</p>";
	}else{
		$success = "<p class='AlreadyRegistered'>Ooops.....! somthing went wrong</p>";
	}
}
?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Admission Confirmation Mail<small></small></h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Admission Confirmation Mail</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <!--<div class="box box-widget widget-user">-->
                    <?php
        				if (isset($_POST['applysubmit'])){
        					echo $success;
        				}else {
        					echo $success;
        				}
        			?>
        			<form action="" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-sm-8 col-md-8 col-lg-8 col-xs-9">
                                <input type="text" name="enrolment" class="form-control" id="enrollmentn" placeholder="Enrollment No."value="<?php if (isset($_POST['fetch'])) { echo $_POST['enrolment']; } ?>" required>
                            </div>
                            <div class="col-sm-4 col-md-4 col-lg-3 col-xs-3">
                                <button type="submit" name="fetch" id="myBtnn" class="btn btn-primary btn-block fhdbhff">Submit</button>
                            </div>
                        </div>
                    </form>
        		    <form method="post" action="" enctype="multipart/form-data">
        		        <div class="row">
        		            <div class="col-sm-3 col-lg-3 col-xs-12">
        						<label>Name:</label>
        						<input type="text" name="name" class="form-control" id="email" value="<?php echo $name ; ?>" placeholder="Name" required>
        						<input type="hidden" name="enrolment" class="form-control" id="enrolment" value="<?php echo $enrolm ; ?>">
        					</div>
        					<div class="col-sm-4 col-lg-4 col-xs-12">
        						<label>Course:</label>
        						<input type="hidden" name="email" class="" id="emal" value="<?php echo $email ; ?>">
        						<input type="text" name="course" class="form-control" id="course" value="<?php echo $course ; ?>" placeholder="Course" required>
        					</div>
        					<div class="col-sm-3 col-lg-3 col-xs-12">
        						<label>Fee:</label>
        						<input type="text" name="total_fee" class="form-control" id="total_fee" value="<?php echo $total_fee ; ?>" placeholder="total_fee" required>
        					</div>
        					<div class="col-sm-2 col-lg-2 col-xs-12" style="margin-top:25px;">
        					     <input type="submit" value="submit" name="applysubmit" class="btn btn-warning pull-right btn-block" style="">
        					 </div>
        				</div>
        		   </form>
                <!--</div>-->
            </div>
        </div>
    </section>
    <br><br><br><br><br><br><br><br><br>
</div>

<?php include("include/footer.php");?>
<?php }else {header("location: login.php");}?>