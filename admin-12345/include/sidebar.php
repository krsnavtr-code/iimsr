<?php

    error_reporting(0);

    include('checklogin.php');

    include("dbconnection.php");

    // Include the MailSender utility
    require_once 'include/MailSender.php';

    require_once 'dompdf/autoload.inc.php';
    use Dompdf\Dompdf;

    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on'){

        $url = "https://";

    }else {

        $url = "http://";

    }

    $url.= $_SERVER['HTTP_HOST'];

    $url= $_SERVER['REQUEST_URI'];

?>

<?php

$name = $_SESSION['name'];

if(isset($_POST['appsubmit'])){

    $email = $_POST['email'];

    $randomNumber = ['order_id'];

    $Counselor = $_POST['Counselor'];

    //$randomNumber = rand(1000,9999);

    $limit = 6;

    $randomNumber = random_int(10 ** ($limit - 1), (10 ** $limit) - 1);

    $query =  mysqli_query($con, "SELECT * FROM `application_form` WHERE `order_id`='$randomNumber'");

    $numrows = mysqli_num_rows($query);

    if($numrows==0){

        $query = mysqli_query($con,"INSERT INTO `application_form`(`email`, `order_id`, `Counselor`) VALUES ('$email','$randomNumber', '$Counselor')");

        if($query){

            $to = "anand24h@gmail.com";

            $subject = 'Admissions Form with Attachment by Imperial Institute of Management Science & Research';

            $file = array('images/Admission-Form.pdf');

            $htmlContent = '<h3>Admissions Form with Attachment by Imperial Institute of Management Science & Research</h3> <p>This email is sent from the Imperial Institute of Management Science & Research</p> <p> Customer Care Number : 8287434343 </p>

            <strong>Unique Identification No : '.$randomNumber.'</strong> <br> <strong>E-mail : '.$email.'</strong>';      

            $message =  $htmlContent ;

            sendEmailWithPHPMailer($email, $subject, $message, $file);

            $mail = sendEmailWithPHPMailer($to, $subject, $message, $file);

        }

    }  

    if ($mail){

        echo "<script type='text/javascript'>alert('admission form sent successfully!');</script>";

    }else{

        echo "<script type='text/javascript'>alert('Unique Code already Inserted please send mail again');</script>";

    }

}

if(isset($_POST['prospesubmit'])){

    $name = strtoupper($_POST['name']);

    $email = $_POST['email'];

    $file = $_POST['prospectus'];

    $query = mysqli_query($con,"INSERT INTO `prospectus`(`name`, `email`, `prospectus`) VALUES ('$name', '$email', '$file')");

    if($query){

        $to = "anand24h@gmail.com";

        $subject = 'Prospectus with Attachment by Imperial Institute of Management Science & Research';

        $file = array('images/Prospectus.pdf');

        $htmlContent = "<a href='iimsr.net.in' style='text-decoration:none;'><p><span style='color:#0000fd;font-weight:700;font-size: 15px;'></span></p></a>

                <table>

                    <tr>

                        <td style='color: rgb(7, 55, 99);font-weight: 500;'>

                            <p> Dear, <span style='font-size: 12px;font-weight:500;'>$name</span></p>

                        </td>

                    </tr>

                    <tr>

                        <td style='color: rgb(7, 55, 99);font-weight: 600;'>Hope this mail finds you in the best of your health.</td>

                    </tr>

                    <tr>

                        <td style='margin-left:50px;color: rgb(7, 55, 99);'>

                            <p style='text-align:justify;color: rgb(7, 55, 99);font-weight: 600;'> As per our telephonic conversation, I am sending you the details of course, required documents and mode of payment . To proceed with the admission we require your documents for verification.</p>

                            <p style='text-align:justify;color: rgb(7, 55, 99);font-weight: 600;'> After document verification you need to pay the non - refundable registration fee of Rs: 10,000/- ( which will be adjusted in your total fee), then we will send you the admission confirmation letter along with enrolment number to proceed further with the examination process.</p>

                            <p style='text-align:justify;color: rgb(7, 55, 99);font-weight: 600;'> Please find below the details of Course Fee and Required Documents;</p>

                        </td>    

                    </tr>    

                    <tr>    

                        <td style='color: rgb(7, 55, 99);font-weight: 600;font-size: 14px;'><p><b>Documents Required:</b></p></td>

                    </tr>    

                    <tr>    

                        <td style='color: rgb(7, 55, 99);font-weight: 600;'>10th Certificate </td>

                    </tr>    

                    <tr>    

                        <td style='color: rgb(7, 55, 99);font-weight: 600;'>12th Certificate </td>

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

                        <td style='color: rgb(7, 55, 99);font-weight: 600;font-size: 14px;'><p><b>Payment Method:</b></p></td>

                    </tr>    

                    <tr>    

                        <td style='color: rgb(7, 55, 99);font-weight: 600;'>Account Name: <b>Imperial Institute of Management Science & Research</b></td>

                    </tr>    

                    <tr>    

                        <td style='color: rgb(7, 55, 99);font-weight: 600;'>Account Number: <b>602620110000330</b></td>

                    </tr>    

                    <tr>    

                        <td style='color: rgb(7, 55, 99);font-weight: 600;'>IFSC: <b>BKID0006026</b></td>

                    </tr>    

                    <tr>    

                        <td style='color: rgb(7, 55, 99);font-weight: 600;'>Bank Name: <b>Bank of India</b></td>

                    </tr>

                    <tr>    

                        <td style='color: #ff0000;font-weight: 600;'>N.B: Postal/ RTI/Online verification available.</td>

                    </tr>    

                    <tr>    

                        <td style='color: #ff0000;font-weight: 600;'>Please feel free to contact us for further detail.</td>

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

                        <td style='list-style:none;color: rgb(0, 0, 255);font-weight: 600;'><b>IIMSR </b></td>

                    </tr>    

                    <tr>    

                        <td style='list-style:none;color: rgb(0, 0, 255);font-weight: 600;'><b>Imperial Institute of Management Science & Research</b></td>

                    </tr>    

                    <tr>    

                        <td style='list-style:none;color: rgb(0, 0, 255);font-weight: 600;'><b>B 63,Sector 64, Noida, </b></td>

                    </tr>    

                    <tr>    

                        <td style='list-style:none;color: rgb(0, 0, 255);font-weight: 600;'><b> Customer Care Number: 8287434343 </b></td>

                    </tr>

                    <tr>    

                        <td style='list-style:none;color: rgb(0, 0, 255);font-weight: 600;'><b>Email:- prospectus@iimsr.net.in</b> - <b>Website:- www.iimsr.net.in/</b></td>

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
 

        $message =  $htmlContent ;

        sendEmailWithPHPMailer($email, $subject, $message, $file) ;

        $mail = sendEmailWithPHPMailer($to, $subject, $message, $file);

    }

    if ($mail){

        echo "<script type='text/javascript'>alert('Prospectus Sent Successfully!');</script>";

    }else{

        echo "<script type='text/javascript'>alert('Prospectus sending failed.');</script>";

    }

}

?>

<aside class="main-sidebar">

    <section class="sidebar">

        <div class="user-panel">

            <div class="pull-left image"><a href="index.php"><img src="dist/img/iimsr-logo.jpeg" class="img-circle Sidebarlogoi" alt="User Image"></a></div>

            <div class="pull-left info">

                <p>Hi.

                    <?php 

                        if($_SESSION['role']=='super-admin'){

                            echo 'Super Admin';

                        }elseif($_SESSION['role']=='pay-slip'){

                            echo 'Payment Slip';

                        }elseif($_SESSION['role']=='admit-card'){

                            echo 'Admit Card';

                        }elseif($_SESSION['role']=='add-course'){

                            echo 'Add New Course';

                        }elseif($_SESSION['role']=='online-exam'){

                            echo 'Online Examination';

                        }elseif($_SESSION['role']=='docs-verification'){

                            echo 'Document Verification';

                        }elseif($_SESSION['role']=='result-admin'){

                            echo 'Result Admin';

                        }elseif($_SESSION['role']=='application-form'){

                            echo 'Application Form';

                        }elseif($_SESSION['role']=='accountant'){

                            echo 'Accountant';

                        }elseif($_SESSION['role']=='team-leader'){

                            echo 'Team Leader';

                        }elseif($_SESSION['role']=='payment-noc'){

                            echo 'Check Payment Noc';

                        }elseif($_SESSION['role']=='alert-message'){

                            echo 'Alert Meessage Mail';

                        }elseif($_SESSION['role']=='distribute'){

                            echo 'Distribute';

                        }elseif($_SESSION['role']=='distribute_lucknow'){

                            echo 'Distribute Lucknow';

                        }elseif($_SESSION['role']== 'distribute, send-course-detail, send-sample, application-form'){
                            echo 'Multi-Distribute';
                        }

                    ?>

                </p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>

            </div>

        </div>

        <ul class="sidebar-menu" data-widget="tree">

            <?php //if($_SESSION['role'] == "distribute"){ ?>

            <li class="active treeview"><a href="index.php"><i class="fa fa-dashboard"></i> <span>Home</span></a></li>

            <?php if($_SESSION['role'] == "distribute" || $_SESSION['role']=="distribute, send-course-detail, send-sample, application-form" || $_SESSION['role'] == "distribute_lucknow" ){ ?>

            <li class="treeview">

                <?php if($_SESSION['role'] == "distribute" || $_SESSION['role']=="distribute, send-course-detail, send-sample, application-form"){ ?>
                    
                <a href="#"><i class="fa fa-pie-chart"></i><span>Distributer</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>


                <ul class="treeview-menu">
                   
                    <li><a href="distribute-new-admi.php"><i class="fa fa-circle-o"></i> Upload New Admission</a></li>

                    <li><a href="distribute-view-admi.php"><i class="fa fa-circle-o"></i> View New Admission</a></li>           

                </ul>
                <?php } ?>
                
                <a href="#"><i class="fa fa-folder"></i> <span> Sample Send Users </span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>

                <ul class="treeview-menu">
                    <li><a href="send-sample.php"><i class="fa fa-circle-o"></i> Send Sample  </a></li>

                </ul>
                
                <a href="#"><i class="fa fa-files-o"></i><span>Course Details</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>

                <ul class="treeview-menu">

                        <li><a href="send-course.php"><i class="fa fa-circle-o"></i> Send Course Details</a></li>
                </ul>

                
                
                <a href="#"><i class="fa fa-folder"></i> <span> Document Verification Users </span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>

                <ul class="treeview-menu">
                    <li><a href="send-document-verification.php"><i class="fa fa-circle-o"></i> Send Document Verification  </a></li>

                </ul>

                <a href="#"><i class="fa fa-folder"></i> <span> Fees Mail Send Users  </span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>

                <ul class="treeview-menu">
                    <li><a href="send-fees-mail.php"><i class="fa fa-circle-o"></i> Send Fees Mail  </a></li>

                </ul>

                <li><a data-toggle="modal" data-target="#modal-default"><i class="fa fa-circle-o text-aqua"></i> <span>Application Form</span></a></li>

                    

            </li>

            <?php }else{ ?>

            <li class="treeview">

                <a href="#"><i class="fa fa-files-o"></i><span>Registration</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>

                <ul class="treeview-menu">

                    <?php if($_SESSION['role']=="super-admin"){ ?>

                        <li><a href="new-admission.php"><i class="fa fa-circle-o"></i> Upload Admission</a></li>

                    <?php } ?>

                    <?php if($_SESSION['role']=="super-admin"){ ?>

                        <li><a href="new-payment.php"><i class="fa fa-circle-o"></i> Upload Payment</a></li>

                    <?php } ?>

				    <?php if($_SESSION['role']=="super-admin"){ ?>

                        <li><a href="new-registration.php"><i class="fa fa-circle-o"></i> Register Student</a></li>

                    <?php } ?>

				    <?php if($_SESSION['role']=="super-admin"){ ?>

                        <li><a href="view-all-marks.php"><i class="fa fa-circle-o"></i> View all Students Marks</a></li>

                    <?php } ?>

                </ul>

            </li>

            <li class="treeview">

                <a href="#"><i class="fa fa-pie-chart"></i><span>Exam Support</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>

                <ul class="treeview-menu">

                    <?php if($_SESSION['role']=="super-admin"){ ?>

                        <li><a href="send-admit-card.php"><i class="fa fa-circle-o"></i> Send Admit Card</a></li>

                        <li><a href="view-admit-card.php"><i class="fa fa-circle-o"></i> View Admit Card</a></li>

                    <?php } ?>

                </ul>

            </li>

            <li class="treeview">

                <a href="#"><i class="fa fa-laptop"></i><span>Admission Support</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>

                <ul class="treeview-menu">

                    <?php if($_SESSION['role']=="super-admin"){ ?>

                        <li><a href="add-new-course.php"><i class="fa fa-circle-o"></i> Add New Course</a></li>

                        <li><a href="view-all-course.php"><i class="fa fa-circle-o"></i> View All Courses</a></li>

                    <?php } ?>

                </ul>

            </li>

            <li class="treeview">

                <a href="#"><i class="fa fa-edit"></i> <span>Result</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>

                <ul class="treeview-menu">

                    <?php if($_SESSION['role']=="super-admin"){?>

                        <li><a href="result-submit.php"><i class="fa fa-circle-o"></i> Submit Result</a></li>

                        <li><a href="view-result.php"><i class="fa fa-circle-o"></i> View Result</a></li>

                        <hr class="hrsidebar">

                        <li><a href="result-marks-card.php"><i class="fa fa-circle-o"></i> Download Marks Card</a></li>

                        <li><a href="result-certificate.php"><i class="fa fa-circle-o"></i> Download Certificate</a></li>

                        <li><a href="result-cmm.php"><i class="fa fa-circle-o"></i> Download CMM</a></li>

                        <hr class="hrsidebar">

                        <li><a href="send-marks-card.php"><i class="fa fa-circle-o"></i> Send Marks Card</a></li>

                        <li><a href="send-Certificate.php"><i class="fa fa-circle-o"></i> Send Certificate</a></li>

                        <li><a href="send-cmm.php"><i class="fa fa-circle-o"></i> Send CMM</a></li>

                    <?php } ?>

                </ul>

            </li>

            <li class="treeview">

                <a href="#"><i class="fa fa-table"></i> <span>Online Examination</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>

                <ul class="treeview-menu">

                    <?php if($_SESSION['role']=="super-admin"){ ?>

                        <li><a href="dash.php?q=0"><i class="fa fa-circle-o"></i> Exam Home</a></li>

                    <?php } ?>

                    <?php if($_SESSION['role']=="super-admin"){ ?>

                        <li><a href="dash.php?q=1"><i class="fa fa-circle-o"></i> Exam Student</a></li>

                        <li><a href="dash.php?q=2"><i class="fa fa-circle-o"></i> Exam Student Marks</a></li>

                    <?php } ?>

                    <?php if($_SESSION['role']=="super-admin"){ ?>

                        <li><a href="dash.php?q=4"><i class="fa fa-circle-o"></i> Exam Add Question Subject</a></li>

                    <?php } ?>

                    <?php if($_SESSION['role']=="super-admin"){ ?>

                        <li><a href="dash.php?q=5"><i class="fa fa-circle-o"></i> Exam Remove Question</a></li>

                    <?php } ?>

                </ul>

            </li>

            <li class="treeview">

                <a href="#"><i class="fa fa-pie-chart"></i><span>Payment Details</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>

                <ul class="treeview-menu">

                    <?php if($_SESSION['role']=="super-admin"){ ?>

                        <li><a href="payment-verify.php"><i class="fa fa-circle-o"></i>1 - Payment Verify</a></li>

                    <?php } ?>  

                    <?php if($_SESSION['role']=="super-admin"){ ?>

                        <li><a href="payment-verify-final.php"><i class="fa fa-circle-o"></i>2 - Final Payment Verify</a></li>

                    <?php } ?>

                    <?php if($_SESSION['role']=="super-admin"){ ?>

                        <li><a href="payment-verified.php"><i class="fa fa-circle-o"></i>3 - Payment Verified</a></li>

                    <?php } ?>  

                    <hr class="hrsidebar">

                    <?php if($_SESSION['role']=="super-admin"){ ?>

                        <li><a href="payment-slip-send.php"><i class="fa fa-circle-o"></i> Payment Send</a></li>

                    <?php } ?>

                    <?php if($_SESSION['role']=="super-admin"){ ?>

                        <li><a href="view-payment-noc.php"><i class="fa fa-circle-o"></i>View Payment Noc</a></li>

                        <li><a href="payment-fee-check.php"><i class="fa fa-circle-o"></i>Payment Fee Check</a></li>

                        <li><a href="payment-invoice.php"><i class="fa fa-circle-o"></i>Send Payment Invoice</a></li>

                    <?php } ?>

                </ul>

            </li>

            <li class="treeview">

                <a href="#"><i class="fa fa-files-o"></i><span>Course Details</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>

                <ul class="treeview-menu">

                    <?php if($_SESSION['role'] == "super-admin" || $_SESSION['role']=="distribute"){ ?>

                        <li><a href="send-course.php"><i class="fa fa-circle-o"></i> Send Course Details</a></li>

                    <?php } ?>

                    <?php if($_SESSION['role'] == "super-admin"){ ?>

                        <li><a href="view-send-course.php"><i class="fa fa-circle-o"></i> View Send Course</a></li>

                    <?php } ?>

                    <?php if($_SESSION['role'] == "super-admin"){ ?>

                        <li><a href="admission-confirm.php"><i class="fa fa-circle-o"></i> Admission Confirmation</a></li>

                    <?php } ?>

                    <?php if($_SESSION['role'] == "super-admin"){ ?>

                        <li><a href="view-admission-confirm.php"><i class="fa fa-circle-o"></i> View Admission Confirmation</a></li>

                        <li><a href="view-enquire.php"><i class="fa fa-circle-o"></i> View Enquire Form </a></li>

                    <?php } ?>

                    <?php if($_SESSION['role'] == "super-admin"){ ?>

                        <li><a href="send-franchise-details.php"><i class="fa fa-circle-o"></i>Send Franchise Details </a></li>

                        <?php } ?>

                    <?php if($_SESSION['role'] == "super-admin"){ ?>

                        <li><a href="view-franchise-details.php"><i class="fa fa-circle-o"></i>View Franchise Details </a></li>

                    <?php } ?>

                    <?php if($_SESSION['role'] == "super-admin"){ ?>

                        <li><a href="distribute-portal.php"><i class="fa fa-circle-o"></i>Portal Distribute </a></li>

                    <?php } ?>

                    

                </ul>

            </li>

            <li class="treeview">

                <a href="#"><i class="fa fa-folder"></i> <span>All Details</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>

                <ul class="treeview-menu">

                    <?php if($_SESSION['role'] == "super-admin"){ ?>

                        <li><a href="view-gateway-payment.php"><i class="fa fa-circle-o"></i> View Gateway Payment</a></li>

                        <li><a href="view-all-logins1.php"><i class="fa fa-circle-o"></i> View All Login Access</a></li>

                        <li><a href="distribute-view-admi.php"><i class="fa fa-circle-o"></i> View Distributer Admission</a></li>

                    <?php } ?>

                </ul>

            </li>

            <li class="treeview">

                <a href="#"><i class="fa fa-folder"></i> <span> Sample Send Users </span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>

                <ul class="treeview-menu">

                    <?php if($_SESSION['role'] == "super-admin"){ ?>

                        <li><a href="view-sample-send.php"><i class="fa fa-circle-o"></i> View Sample Send </a></li>

                        <li><a href="send-sample.php"><i class="fa fa-circle-o"></i> Send Sample  </a></li>

                        
                    <?php } ?>

                </ul>

            </li>

            <li class="treeview">

                <a href="#"><i class="fa fa-folder"></i> <span> Doc Verification Send Users </span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>

                <ul class="treeview-menu">

                    <?php if($_SESSION['role'] == "super-admin"){ ?>

                    <li><a href="view-document-verification.php"><i class="fa fa-circle-o"></i> View Document Verification  </a></li>

                    <li><a href="send-document-verification.php"><i class="fa fa-circle-o"></i> Send Document Verification  </a></li>

                    <?php } ?>

                </ul>

            </li>

            <li class="treeview">

            <a href="#"><i class="fa fa-folder"></i> <span> Fees Mail Send Users  </span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>

                <ul class="treeview-menu">
                    <?php if($_SESSION['role'] == "super-admin"){ ?>

                    <li><a href="view-fees-mail.php"><i class="fa fa-circle-o"></i> Vies Fees Mail   </a></li>
                    <li><a href="send-fees-mail.php"><i class="fa fa-circle-o"></i> Send Fees Mail  </a></li>
                    

                    <?php } ?>

                </ul>
            </li>
            
            <?php } ?>

            <?php if($_SESSION['role'] == "super-admin"){ ?>

                <li><a data-toggle="modal" data-target="#modal-default"><i class="fa fa-circle-o text-aqua"></i> <span>Application Form</span></a></li>

            <?php } ?>

            <?php if($_SESSION['role'] == "super-admin"){ ?>

                <li><a data-toggle="modal" data-target="#modal-success"><i class="fa fa-circle-o text-aqua"></i> <span>Prospectus</span></a></li>

            <?php } ?>

            <li><a href="logout.php"><i class="fa fa-circle-o text-danger"></i> <span>Sign Out</span></a></li>

        </ul>

    </section>

</aside>

<div class="modal fade" id="modal-default">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                <span aria-hidden="true">&times;</span></button>

                <center><h4 class="modal-title">Application Form</h4></center>

                <p style="text-align:center; color:#0000fd;">Kindly Enter your credentials to access the Application form </p>

            </div>

            <div class="modal-body">

                <form class="form" action="" method="post">

                    <div class="form-group">

                        <div class="form-group center-block">

                            <input type="email" class="form-control" name="email" placeholder="Email*" value="" required>

                        </div>

                        <div class="form-group center-block">

                            <input type="text" class="form-control" name="Counselor" placeholder="Counselor Name" value="" required>

                            <input type="hidden" class="form-control" name="order_id">

                        </div>

                    </div>

                    <div class="form-group center-block">

                        <center><button type="submit" name="appsubmit" class="btn btn-block btn-warning btn-xs btn-flat" style="padding: 4px 30px 4px 30px;">Send Application</button></center>

                    </div>

                </form>

            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-default btn-xs pull-right" data-dismiss="modal">Close</button>

            </div>

        </div>

    </div>

</div>

<div class="modal modal-default fade" id="modal-success">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                <span aria-hidden="true">&times;</span></button>

                <center><h4 class="modal-title">Send Prospectus</h4></center>

                <p style="text-align:center; color:#0000fd;">Kindly Enter your credentials to access the Application form </p>

            </div>

            <div class="modal-body">

                <form class="form" action="" method="post">

                    <div class="form-group">

                        <div class="form-group center-block">

                            <input type="text" class="form-control" name="name" placeholder="Name*" value="" required>

                        </div>

                        <div class="form-group center-block">

                            <input type="email" class="form-control" name="email" placeholder="Email*" value="" required>

                        </div>

                        <div class="form-group center-block">

                            <input type="text" class="form-control" name="Counselor" placeholder="Counselor Name*" value="" required>

                            <input type="hidden" class="form-control ApplicationF" name="prospectus" value="images/prospectus.pdf">

                        </div>

                    </div>

                    <div class="form-group center-block">

                        <center><button type="submit" name="prospesubmit" class="btn btn-block btn-warning btn-xs btn-flat" style="padding: 4px 30px 4px 30px;">Send Prospectus</button></center>

                    </div>

                </form>

            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-default btn-xs pull-right" data-dismiss="modal">Close</button>

            </div>

        </div>

    </div>

</div>