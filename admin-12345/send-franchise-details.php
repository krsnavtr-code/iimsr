<?php
error_reporting(0);
include('checklogin.php');
include("dbconnection.php");
include("include/header.php");
if($_SESSION['role'] == "send-course-detail" || $_SESSION['role']=="super-admin"){
    if(isset($_POST['applysubmit'])){
        $name = strtoupper($_POST['name']);
        $mobile = $_POST['mobile'];
        $email = $_POST['email'];
        $city = $_POST['city'];
        $subject = $_POST['subject'];
        $query = mysqli_query($con,"INSERT INTO `franchise_enquiry`(`name`, `mobile`, `email`, `city`, `subject`) VALUES ('$name', '$mobile', '$email', '$city', '$subject')");
        if($query){
            $htmlContent = "<a href='iimsr.net.in' style='text-decoration:none;'><p><span style='color:#0000fd;font-weight:700;font-size: 15px;'></span></p></a>
                <table>
                    <tr>
                        <td style='color: rgb(7, 55, 99);font-weight: 500;'>
                            <p> Hi, <span style='font-size: 12px;font-weight:500;'> $name</span></p>
                        </td>
                    </tr>
                    <tr>
                        <td style='color: rgb(7, 55, 99);font-weight: 600;'>Hope you are doing good.</td>
                    </tr>
                    <tr>
                        <td style='margin-left:50px;color: rgb(7, 55, 99);'>
                            <p style='text-align:justify;color: rgb(7, 55, 99);font-weight: 600;'> As per our communication, I am pleased to send you the franchise details of Imperial Institute of Management Science & Research, kindly find the attachment.</p>
                        </td>    
                    </tr>    
                    <tr>    
                        <td style='color: rgb(7, 55, 99);font-weight: 600;font-size: 14px;'><p><b>Documents Required:</b></p></td>
                    </tr>    
                    <tr>    
                        <td style='color: rgb(7, 55, 99);font-weight: 600;'>Aadhar Card</td>
                    </tr>    
                    <tr>    
                        <td style='color: rgb(7, 55, 99);font-weight: 600;'>Pan Card</td>
                    </tr>    
                    <tr>    
                        <td style='color: rgb(7, 55, 99);font-weight: 600;'>GST*</td>
                    </tr>    
                    <tr>    
                        <td style='color: rgb(7, 55, 99);font-weight: 600;'>Office Photo</td>
                    </tr>
                    <tr>
                       <td style='color: rgb(7, 55, 99);font-weight: 600;'>Proprietor/Director Photo</td>
                    </tr>
                    <tr>    
                        <td style='color: rgb(7, 55, 99);font-weight: 600;'><p><b>Bank Account Details</b></p></td>
                    </tr>
                    <tr>    
                        <td style='list-style:none;color: rgb(0, 0, 255);font-weight: 600;font-size: 14px;'><p><b>With Regards:</b></p></td>
                    </tr>    
                    <tr>    
                        <td style='list-style:none;color: rgb(0, 0, 255);font-weight: 600;'><b>IIMSR Admin</b></td>
                    </tr>    
                    <tr>    
                        <td style='list-style:none;color: rgb(0, 0, 255);font-weight: 600;'><b>Imperial Institute of Management Science & Research</b></td>
                    </tr>    
                    <tr>    
                        <td style='list-style:none;color: rgb(0, 0, 255);font-weight: 600;'><b>B 63,Sector 64, Noida </b></td>
                    </tr>    
                    <tr>    
                        <td style='list-style:none;color: rgb(0, 0, 255);font-weight: 600;'><b>Customer Care Number: 9891030303</b></td>
                    </tr>
                    <tr>    
                        <td style='list-style:none;color: rgb(0, 0, 255);font-weight: 600;'><b>Email:- franchise@iimsr.net.in</b> - <b>Website:- www.iimsr.net.in/</b></td>
                    </tr>
                </table>
                <table>
                    <tr>    
                        <td style='list-style:none;color: rgb(0, 0, 255);font-weight: 600;'><img src='iimsr.net.in/assets/images/logo.png' style='margin: 7px 0px -15px 0px;width: 255px; height: 70px;'></td>
                    </tr>
                </table>";
                //echo $message;
            $to = "anand24h@yahoo.com";
            $from = 'franchise@iimsr.net.in';
            $fromName = 'Imperial Institute of Management Science & Research';
            $subject = 'Franchise Detail with Attachment by Imperial Institute of Management Science & Research';
            $file = "course-pdf/vbimt-franchise.pdf";
            $htmlContent = "<a href='iimsr.net.in' style='text-decoration:none;'><p><span style='color:#0000fd;font-weight:700;font-size: 15px;'></span></p></a>
                <table>
                    <tr>
                        <td style='color: rgb(7, 55, 99);font-weight: 500;'>
                            <p> Hi, <span style='font-size: 12px;font-weight:500;'> $name</span></p>
                        </td>
                    </tr>
                    <tr>
                        <td style='color: rgb(7, 55, 99);font-weight: 600;'>Hope you are doing good.</td>
                    </tr>
                    <tr>
                        <td style='margin-left:50px;color: rgb(7, 55, 99);'>
                            <p style='text-align:justify;color: rgb(7, 55, 99);font-weight: 600;'> As per our communication, I am pleased to send you the franchise details of Imperial Institute of Management Science & Research of, kindly find the attachment.</p>
                        </td>    
                    </tr>    
                    <tr>    
                        <td style='color: rgb(7, 55, 99);font-weight: 600;font-size: 14px;'><p><b>Documents Required:</b></p></td>
                    </tr>    
                    <tr>    
                        <td style='color: rgb(7, 55, 99);font-weight: 600;'>Aadhar Card</td>
                    </tr>    
                    <tr>    
                        <td style='color: rgb(7, 55, 99);font-weight: 600;'>Pan Card</td>
                    </tr>    
                    <tr>    
                        <td style='color: rgb(7, 55, 99);font-weight: 600;'>GST*</td>
                    </tr>    
                    <tr>    
                        <td style='color: rgb(7, 55, 99);font-weight: 600;'>Office Photo</td>
                    </tr>
                    <tr>
                       <td style='color: rgb(7, 55, 99);font-weight: 600;'>Proprietor/Director Photo</td>
                    </tr>
                    <tr>    
                        <td style='color: rgb(7, 55, 99);font-weight: 600;'><p><b>Bank Account Details</b></p></td>
                    </tr>
                    <tr>    
                        <td style='list-style:none;color: rgb(0, 0, 255);font-weight: 600;font-size: 14px;'><p><b>With Regards:</b></p></td>
                    </tr>    
                    <tr>    
                        <td style='list-style:none;color: rgb(0, 0, 255);font-weight: 600;'><b>IIMSR Admin</b></td>
                    </tr>    
                    <tr>    
                        <td style='list-style:none;color: rgb(0, 0, 255);font-weight: 600;'><b>Imperial Institute of Management Science & Research</b></td>
                    </tr>    
                    <tr>    
                        <td style='list-style:none;color: rgb(0, 0, 255);font-weight: 600;'><b>B 63,Sector 64, Noida </b></td>
                    </tr>    
                    <tr>    
                        <td style='list-style:none;color: rgb(0, 0, 255);font-weight: 600;'><b>Customer Care Number: 9891030303</b></td>
                    </tr>
                    <tr>    
                        <td style='list-style:none;color: rgb(0, 0, 255);font-weight: 600;'><b>Email:- franchise@iimsr.net.in</b> - <b>Website:- www.iimsr.net.in/</b></td>
                    </tr>
                </table>
                <table>
                    <tr>    
                        <td style='list-style:none;color: rgb(0, 0, 255);font-weight: 600;'><img src='iimsr.net.in/assets/images/logo.png' style='margin: 7px 0px -15px 0px;width: 255px; height: 70px;'></td>
                    </tr>
                </table>";
            $headers = "From: $fromName"." <".$from.">";
            $semi_rand = md5(time());
            $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";
            $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\"";
            $message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" . "Content-Transfer-Encoding: 7bit\n\n" . $htmlContent . "\n\n";
            if(!empty($file) > 0){
                if(is_file($file)){
                    $message .= "--{$mime_boundary}\n";
                    $fp =    @fopen($file,"rb");
                    $data =  @fread($fp,filesize($file));

                    @fclose($fp);
                    $data = chunk_split(base64_encode($data));
                    $message .= "Content-Type: application/octet-stream; name=\"".basename($file)."\"\n" . "Content-Description: ".basename($file)."\n" . "Content-Disposition: attachment;\n" . " filename=\"".basename($file)."\"; size=".filesize($file).";\n" . "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";
                }
            }
            $message .= "--{$mime_boundary}--";
            $returnpath = "-f" . $from;
            mail($to, $subject, $message, $headers, $returnpath);
            $mail = @mail($email, $subject, $message, $headers, $returnpath);
       
        if($mail){
    		$success = "<p class='OperationHas'>Thank You...! Franchise Detail Sent Successfully!</p>";
    	}else{
    		$success = "<p class='AlreadyRegistered'>Franchise Detail sending failed.</p>";
    	}
    }
}
?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Send Franchise Details<small></small></h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Send Franchise Details</li>
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
                                <div class="col-sm-2 col-md-2 col-lg-2 col-xs-12"></div>
                                <div class="col-sm-8 col-md-8 col-lg-8 col-xs-12">
                                    <div class="row">
                                        <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
                                            <label>Name:</label>
                                            <input type="text" name="name" class="form-control" id="name" value="" placeholder="Name" required>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
                                            <label>Mobile No:</label>
                                            <input type="text" maxlength="10" class="form-control" id="mobile" pattern="\d{10}" name="mobile" title="Please enter exactly 10 digits" placeholder="Mobile No">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
                                            <label>Email:</label>
                                            <input type="email" name="email" class="form-control" id="email" value="" placeholder="Email" required>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
                                            <label>City:</label>
                                            <input type="text" name="city" class="form-control" id="city" value="" placeholder="City" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                                            <label style="">Subject:</label>
                                            <input type="text" name="subject" class="form-control" id="subject" value="" placeholder="Subject" required>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                                            <input type="submit" value="Send" name="applysubmit" class="btn btn-warning pull-right btn-block">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2 col-md-2 col-lg-2 col-xs-12"></div>
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