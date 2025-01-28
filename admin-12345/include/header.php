<?php 

    error_reporting(0);

    include("head.php");

    include('checklogin.php');

    include("dbconnection.php");

    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on'){

        $url = "https://";

    }else {

        $url = "http://";

    }

    $url.= $_SERVER['HTTP_HOST'];

    $url= $_SERVER['REQUEST_URI'];

    $name = $_SESSION['name'];

/*if(isset($_POST['appsubmit'])){

    $email = $_POST['email'];

    $randomNumber = ['order_id'];

    $Counselor = $_POST['Counselor'];

    $limit = 6;

    $randomNumber = random_int(10 ** ($limit - 1), (10 ** $limit) - 1);

    $query =  mysqli_query($con, "SELECT * FROM `application_form` WHERE `order_id`='$randomNumber'");

    $numrows = mysqli_num_rows($query);

    if($numrows==0){

        $query = mysqli_query($con,"INSERT INTO `application_form`(`email`, `order_id`, `Counselor`) VALUES ('$email','$randomNumber', '$Counselor')");

        if($query){

            $to = "anand24h@gmail.com";

            $from = 'application-form@iimsr.net.in';

            $fromName = 'Imperial Institute of Management Science & Research';

            $subject = 'Admissions Form with Attachment by Imperial Institute of Management Science & Research';

            $file = "images/Admission-Form.pdf";

            $htmlContent = '<h3>Admissions Form with Attachment by Imperial Institute of Management Science & Research</h3> <p>This email is sent from the Imperial Institute of Management Science & Research</p>

            <strong>Unique Identification No : '.$randomNumber.'</strong> <br> <strong>E-mail : '.$email.'</strong>';

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

            mail($email, $subject, $message, $headers, $returnpath);

            mail('anand24h@gmail.com', $subject, $message, $headers, $returnpath);

            $mail = @mail($to, $subject, $message, $headers, $returnpath);

        }

        if($mail){

            echo "<script type='text/javascript'>alert('admission form sent successfully!');</script>";

        }else{

            echo "<script type='text/javascript'>alert('Unique Code already Inserted please send mail again');</script>";

        }

    }

}*/

?>

<!------------------For Prospectus Start---------------------->

<?php

/*if(isset($_POST['prospesubmit'])){

    $name = strtoupper($_POST['name']);

    $email = $_POST['email'];

    $file = $_POST['prospectus'];

    $query = mysqli_query($con,"INSERT INTO `prospectus`(`name`, `email`, `prospectus`) VALUES ('$name', '$email', '$file')");

    if($query){

        $to = "anand24h@gmail.com";

        $from = 'prospectus@iimsr.net.in';

        $fromName = 'Imperial Institute of Management Science & Research';

        $subject = 'Prospectus with Attachment by Imperial Institute of Management Science & Research';

        $file = 'images/Prospectus.pdf';

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

							<img src='iimsr.net.in/admin/images/vbimtgreentree.jpg' style='margin-bottom: -40px;width: 96px; height: 72px;'>

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

                        <td style='list-style:none;color: rgb(0, 0, 255);font-weight: 600;'><b>Customer Care Number: info@iimsr.net.in</b></td>

                    </tr>

                    <tr>    

                        <td style='list-style:none;color: rgb(0, 0, 255);font-weight: 600;'><b>Email:- prospectus@iimsr.net.in</b> - <b>Website:- www.iimsr.net.in/</b></td>

                    </tr>

                </table>

                <table>

                    <tr>    

                        <td style='list-style:none;color: rgb(0, 0, 255);font-weight: 600;'><img src='iimsr.net.inimages/logo.jpeg' style='margin: 7px 0px -15px 0px;width: 255px; height: 70px;'></td>

                    </tr>

                </table>

                <table>

                    <tr style='min-width: 100%;'>

                        <td style='width: 100%;font-size: 13px;color: rgb(128,0,0);text-align:justify;font-weight: 600;'><p>'This e-mail message may contain confidential, proprietary or legally privileged information. It should not be used by anyone who is not the original intended recipient. If you have erroneously received this message, please delete it immediately and notify the sender. Any other use, retention, dissemination, forwarding, printing, modification or copying of this e-mail is strictly prohibited. Before opening any attachments please check them for viruses and defects.'</p></td>

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

        mail($email, $subject, $message, $headers, $returnpath);

        $mail = @mail($to, $subject, $message, $headers, $returnpath);

    }

    if ($mail){

        echo "<script type='text/javascript'>alert('Prospectus Sent Successfully!');</script>";

    }else{

        echo "<script type='text/javascript'>alert('Prospectus sending failed.');</script>";

    }

}*/

?>

<header class="main-header">

    <a href="#" class="logo MobileDesktop">

        <span class="logo-mini"><b></b></span>

        <span class="logo-lg"><b>Welcome</b></span>

    </a>

    <nav class="navbar navbar-static-top">

        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">

            <span class="sr-only">Toggle navigation</span>

        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">

                <li class="dropdown messages-menu">

                    <?php if($_SESSION['role']=="super-admin"){?>

                    <a href="view-new-admission.php" class="dropdown-toggle" data-toggle="dropdown">

                        <?php

                            $query2 = "select * from `add_payment_records` where `id` AND `new_status`='0'";

                            $res2 = mysqli_query($con, $query2);

                            $num2 = mysqli_num_rows($res2);

                        ?>

                        <i class="fa fa-envelope-o"></i><span class="label label-danger"><?php echo $num2; ?></span>

                    </a>

                    <?php } ?>

                    <ul class="dropdown-menu">

                        <li class="header">You have <span class="label label-danger"><?php echo $num2; ?></span> New Admission</li>

                        <?php if($_SESSION['role']=="super-admin"){?>

                        <li>

                            <ul class="menu">

                                <?php while($row = mysqli_fetch_array($res2)){?>

                                    <li><a href="view-new-admission.php"><i class="fa fa-user text-red"></i> <?php echo $row['name']; ?></a></li>

                                <?php } ?>

                            </ul>

                        </li>

                        <li class="footer"><a href="view-new-admission.php">See New Admission</a></li>

                        <?php } ?>

                    </ul>

                </li>

                <li class="dropdown notifications-menu">

                    <?php if($_SESSION['role']=="super-admin"){?>

                    <a href="payment-verify.php" class="dropdown-toggle" data-toggle="dropdown">

                        <?php

                            $query = "select * from new_payment where comment_id AND sir_status='0'";

                            $res = mysqli_query($con, $query);

                            $num = mysqli_num_rows($res);

                        ?>

                        <i class="fa fa-bell-o"></i><span class="label label-danger"><?php echo $num; ?></span>

                    </a>

                    <?php } ?>

                    <ul class="dropdown-menu">

                        <li class="header">You have <span class="label label-danger"><?php echo $num; ?></span> Pending Payment</li>

                        <?php if($_SESSION['role']=="super-admin"){?>

                        <li>

                            <ul class="menu">

                                <?php while($row = mysqli_fetch_array($res)){?>

                                    <li><a href="payment-verify.php"><i class="fa fa-user text-red"></i> Transaction Id : <?php echo $row['transaction_id']; ?></a></li>

                                <?php } ?>

                            </ul>

                        </li>

                        <li class="footer"><a href="payment-verify.php">See Pending Payment</a></li>

                        <?php } ?>

                    </ul>

                </li>

                <li class="dropdown user user-menu">

                    <a href="index.php" class="dropdown-toggle" data-toggle="dropdown">

                    <img src="dist/img/iimsr-logo.jpeg" class="user-image" alt="User Image">

                    <span class="hidden-xs">

                        Hi.<?php 

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

                            }elseif($_SESSION['role']=='distribute, send-course-detail, send-sample, application-form'){

                                echo 'Multi-Distribute ';

                            }elseif($_SESSION['role']=='distribute_lucknow'){

                                echo 'Distribute Lucknow';

                            }

                        ?>

                    </span>

                    </a>

                    <ul class="dropdown-menu">

                        <li class="user-header">

                            <img src="dist/img/iimsr-logo.jpeg" class="img-circle" alt="User Image">

                            <p>Hi.<?php 

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

                            }elseif($_SESSION['role']=='distribute, send-course-detail, send-sample, application-form'){

                                echo 'Multi-Distribute ';

                            } elseif($_SESSION['role']=='distribute_lucknow'){

                                echo 'Distribute Lucknow';

                            }

                        ?> <small> Since March. 2002</small></p>

                        </li>

                        <li class="user-footer">

                            <div class="pull-right"><a href="logout.php" class="btn btn-danger btn-flat">Sign out</a></div>

                        </li>

                    </ul>

                </li>

            </ul>

        </div>

    </nav>

</header>

<!--<div class="modal fade" id="modal-default">

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

</div>-->

<?php include("sidebar.php");?>