<?php

error_reporting(0);

include('checklogin.php');

include("dbconnection.php");

include("include/header.php");

// Include the MailSender utility
require_once 'include/MailSender.php';

require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;

if($_SESSION['role'] == "send-course-detail" || $_SESSION['role']=="super-admin" || $_SESSION['role']=="distribute, send-course-detail, send-sample, application-form" || $_SESSION['role'] == "distribute_lucknow"){

    if(isset($_POST['applysubmit'])){

        $name = strtoupper($_POST['name']);

        $email = $_POST['email'];

        $mobile_no = $_POST['mobile_no'];

        $course = $_POST['course'];

        $total_fee = $_POST['total_fee'];

        $course_pdf = $_POST['course_pdf'];

        $counselor_name = $_POST['counselor_name'];

        $query = mysqli_query($con,"INSERT INTO `send_course_detail`(`name`, `email`, `mobile_no`, `course`, `total_fee`, `course_pdf`, `counselor_name`) VALUES ('$name', '$email', '$mobile_no', '$course', '$total_fee', '$course_pdf', '$counselor_name')");

        if($query){

            $subject = 'Course Detail with Attachment by Imperial Institute of Management Science & Research';

            $file = array('course-pdf/' . $course_pdf);

            $htmlContent = "<a href='iimsr.net.in' style='text-decoration:none;'><p><span style='color:#0000fd;font-weight:700;font-size: 15px;'></span></p></a>

                <table>

                    <tr>

                        <td style='color: rgb(7, 55, 99);font-weight: 500;'>

                            <p> Dear, <span style='font-size: 12px;font-weight:500;'> $name</span></p>

                        </td>

                    </tr>

                    <tr>

                        <td style='color: rgb(7, 55, 99);font-weight: 600;'>Hope this mail finds you in the best of your health.</td>

                    </tr>

                    <tr>

                        <td style='margin-left:50px;color: rgb(7, 55, 99);'>

                            <p style='text-align:justify;color: rgb(7, 55, 99);font-weight: 600;'> As per our telephonic conversation, I am sending you the details of course, required documents and mode of payment . To proceed with the admission we require your documents for verification.</p>

                            <p style='text-align:justify;color: rgb(7, 55, 99);font-weight: 600;'> After document verification you need to pay the non - refundable registration fee of Rs: 10,000/- ( which will be adjusted in your total fee), then we will send you the admission confirmation letter along with enrolment number to proceed further with the examination process.</p>

                            <p style='text-align:justify;color: rgb(7, 55, 99);font-weight: 600;'> Please find below the details of Course Fee and Required Documents</p>

                            

                            <p style='font-size: 14px;font-weight: 600;'>Fees:- <span style='font-size: 15px;color: rgb(0 0 255);'>$total_fee/Semester</span></p>

                            <p style='font-size: 14px;font-weight: 600;'>Course:- <span style='font-size: 15px;color: rgb(0 0 255);'>$course</span></p>

                        </td>    

                    </tr>    

                    <tr>    

                        <td style='color: rgb(7, 55, 99);font-weight: 600;font-size: 14px;'><p style='margin:18px 0px 0px 0px;font-weight:700;'>Documents Required:</p></td>

                    </tr>    

                    <tr>    

                        <td style='color: rgb(7, 55, 99);font-weight: 600;'>10th Certificate</td>

                    </tr>    

                    <tr>    

                        <td style='color: rgb(7, 55, 99);font-weight: 600;'>12th Certificate</td>

                    </tr>    

                    <tr>    

                        <td style='color: rgb(7, 55, 99);font-weight: 600;'>Graduation (Bachelor Degree only when applying for the master's course)</td>

                    </tr>    

                    <tr>    

                        <td style='color: rgb(7, 55, 99);font-weight: 600;'>Aadhar Card</td>

                    </tr>

                    <tr>

                       <td style='color: rgb(7, 55, 99);font-weight: 600;'>2 Photos & Scanned Signature</td>

                    </tr>

                    <tr>    

                        <td style='color: rgb(7, 55, 99);font-weight: 600;font-size: 14px;'><p style='margin:18px 0px 0px 0px;font-weight:700;'>Payment Method:</p></td>

                    </tr>    

                    <tr>    

                        <td style='color: rgb(7, 55, 99);font-weight: 600;'>Account Name: <b>Imperial Institute of Management Science & Research</b></td>

                    </tr>    

                    <tr>    

                        <td style='color: rgb(7, 55, 99);font-weight: 600;'>Account Number: <b> 602620110000330</b></td>

                    </tr>    

                    <tr>    

                        <td style='color: rgb(7, 55, 99);font-weight: 600;'>IFSC: BKID0006026</b></td>

                    </tr>    

                    <tr>    

                        <td style='color: rgb(7, 55, 99);font-weight: 600;>Bank Name: <b>Bank of India</b></td>

                    </tr>

                   

                   <tr>    

                        <td style='color:#ff0000;font-weight:600'>N.B: Postal/ RTI/Online verification available.</td>

                    </tr>    

                    <tr>    

                        <td style='color:#ff0000;font-weight:600;'>Please feel free to contact us for further detail.</td>

                    </tr>

                    <tr>    

						<td style='list-style:none;color: rgb(0, 0, 255);font-weight: 600;'>

							<img src='iimsr.net.in/images/logo.jpeg' style='margin-bottom: -40px;width: 96px; height: 72px;'>

							<p class='TREEVBIMT' style='margin-left:97px;font-size: 9pt;font-family: Calibri,sans-serif;color: green;font-style: italic;'>Please be responsible for your environment.</p>

							<p class='TREEBIMT' style='margin-top:-18px;font-size: 9pt;font-family: Calibri,sans-serif;color: green;font-style:italic;'>Don't print this e-mail unless absolutely necessary</p>

						</td>

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

                        <td style='list-style:none;color: rgb(0, 0, 255);font-weight: 600;'><b>B-63, Sector-64, Noida, Gautam Budha Nagar UP-201301 </b></td>

                    </tr>    

                    <tr>    

                        <td style='list-style:none;color: rgb(0, 0, 255);font-weight: 600;'><b>Customer Care Number : 8287434343</b></td>

                    </tr>

                    <tr>    

                        <td style='list-style:none;color: rgb(0, 0, 255);font-weight: 600;'><b>Email:- subject@iimsr.net.in</b> - <b>Website:- www.iimsr.net.in/</b></td>

                    </tr>

                </table>

                <table>

                    <tr>    

                        <td style='list-style:none;color: rgb(0, 0, 255);font-weight: 600;'><img src='iimsr.net.in/images/logo.jpeg' style='margin: 7px 0px -15px 0px;width: 255px; height: 70px;'></td>

                    </tr>

                </table>

                <table>

                    <tr style='min-width: 100%;'>

                        <td style='width: 100%;font-size: 13px;color: rgb(128,0,0);text-align:justify;font-weight: 600;'><p>'This e-mail message may contain confidential, proprietary or legally privileged information. It should not be used by anyone who is not the original intended recipient. If you have erroneously received this message, please delete it immediately and notify the sender. Any other use, retention, dissemination, forwarding, printing, modification or copying of this e-mail is strictly prohibited. Before opening any attachments please check them for viruses and defects.'</p></td>

                    </tr>

                </table>";

            $message = $htmlContent ;                


            // Call function and pass the required arguments 
            $mail = sendEmailWithPHPMailer($email, $subject, $message, $file);            

        if($mail){

    		$success = "<p class='OperationHas'>Thank You...! Course Detail Sent Successfully!</p>";

    	}else{

    		$success = "<p class='AlreadyRegistered'>Detail sending failed.please try again...!</p>";

    	}

    }

}

?>

<div class="content-wrapper">

    <section class="content-header">

        <h1>Send Course Details<small></small></h1>

        <ol class="breadcrumb">

            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>

            <li class="active">Send Course Details</li>

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

                                <div class="col-sm-4 col-md-4 col-lg-4 col-xs-12">

                                    <label>Name:</label>

                                    <input type="text" name="name" class="form-control" id="email" value="" placeholder="Name" required>

                                </div>

                                <div class="col-sm-4 col-md-4 col-lg-4 col-xs-12">

                                    <label>Email:</label>

                                    <input type="email" name="email" class="form-control" id="email" value="" placeholder="Email" required>

                                </div>

                                <div class="col-sm-4 col-md-4 col-lg-4 col-xs-12">

                                    <label>Mobile No:</label>

                                    <input type="text" maxlength="10" class="form-control" id="mobile_no" pattern="\d{10}" name="mobile_no" title="Please enter exactly 10 digits" placeholder="Mobile No">

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-sm-5 col-md-5 col-lg-5 col-xs-12">

                                    <label class="lableform" for="validationCustom02">Select Course</label>

                                    <select name="course" class="form-control select2 slectcourse" required id="">

                                        <option value="" disable>-Select Course-</option>

                                        <?php

                                            $querycourse = mysqli_query($con,'SELECT * FROM `course` ORDER BY `course`');

                                        ?>

                                        <?php

                                        $array = array();

                                        while($coursrow = mysqli_fetch_array($querycourse)){

                                            if(!in_array($coursrow['course'], $array)){

                                                $array[] = $coursrow['course'];

                                            }

                                        }

                                        foreach($array as $dataa){ ?>

                                            <option value="<?php echo$dataa; ?>"><?php echo$dataa; ?></option>

                                        <?php } ?>

                                    </select>

                                </div>

                                <div class="col-sm-3 col-md-3 col-lg-3 col-xs-12">

                                    <label class="lableform" for="validationCustom02">Course Fee</label>

                                    <select name="total_fee" class="form-control select2 slectfee" id="" required>

                                            <option value="" disable hidden>-Select Fee-</option>

                                        <?php $braannch ="";

                                        if($braannch!=null){ ?>

                                            <option selected="selected"><?php echo $braannch; ?></option>

                                        <?php } ?>

                                    </select>

                                </div>

                                <div class="col-sm-4 col-md-4 col-lg-4 col-xs-12">

                                    <label>Course Pdf</label>

                                    <select name="course_pdf" class="form-control select2 slectpdf" id="" required>

                                        <option value="" disable hidden>-Select Pdf-</option>

                                        <?php $braannchf="";

                                        if($braannchf!=null){ ?>

                                            <option selected="selected"><?php echo $braannchf; ?></option>

                                        <?php } ?>

                                    </select>

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-sm-3 col-md-3 col-lg-3 col-xs-12">

                                
                                    <label style="color:#ff0000;">Counselor Name:</label>

                                    <input type="text" name="counselor_name" class="form-control CounselorName" id="counselor_name" value="" placeholder="Counselor Name" required>

                                    <!-- <select class="form-control select2" name="counselor_name" id="counselor_name" style="width: 100%;" required>

                                        <option value="" selected disable>-Select Counselor Name-</option>

            							<option value="Ravi">Ravi </option>

    									<option value="Shobit">Shobit </option>

    									<option value="Prashant">Prashant</option>

    									<option value="Sanjay">Sanjay</option>

    									<option value="Arushi">Arushi</option>

    									<option value="Sonam">Sonam</option>

    									<option value="Arjun">Arjun</option>

    									<option value="Meghna">Meghna</option>

    									<option value="Ragini">Ragini</option>

    									<option value="Gayatri">Gayatri</option>

    									<option value="Anupam">Anupam</option>

    									<option value="Ganesh">Ganesh</option>

    									<option value="Shridhar">Shridhar</option>

    									<option value="Pankaj">Pankaj</option>

                                    </select> -->

                                </div>

                                <div class="col-sm-2 col-md-2 col-lg-2 col-xs-12" style="margin-top:25px;">

                                    <input type="submit" value="Send" name="applysubmit" class="btn btn-warning btn-flat pull-right btn-block" style="">

                                </div>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <br><br><br><br><br><br><br><br><br>

</div>

<script>

    $(".slectcourse").change(function() {

        var data = $(".slectcourse").val();

        $.ajax({

            url: "send-course-pdf.php",

            type: 'post',

            data: {data:data},

            success: function(data){

                $('.slectpdf').html(data);

            }

        });

    });

    $(".slectpdf").change(function(){

        var coursepdf = $(".slectpdf").val();

        if(coursepdf==="other"){

            $(".branchnameen").show();

        }

    });

</script>

<script>

    $(".slectcourse").change(function() {

        var data = $(".slectcourse").val();

        $.ajax({

            url: "send-course-fee.php",

            type: 'post',

            data: {data:data},

            success: function(data){

                $('.slectfee').html(data);

            }

        });

    });

    $(".slectfee").change(function(){

        var totalfee = $(".slectfee").val();

        if(totalfee==="other"){

            $(".branchnameen").show();

        }

    });

</script>

<?php include("include/footer.php");?>

<?php }else {header("location: login.php");}?>