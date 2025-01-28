<?php

    error_reporting(0);

    include('checklogin.php');

    include("dbconnection.php");	

    include("include/header.php");

if($_SESSION['role']=="alert-message" || $_SESSION['role']=="super-admin"){

if(isset($_POST['sendmail'])){

	$name =strtoupper($_POST['name']);

	$email = $_POST['email'];

	$enrolment =strtoupper($_POST['enrolment']);

	$Passwordu = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%&*_";

    $Passwordu = substr( str_shuffle( $Passwordu ), 0, 6 );

	$sqlfff = mysqli_query($con, "UPDATE `register_here` SET `Passwordu`='$Passwordu' WHERE `enrolment`='$enrolment'");

    if($sqlfff){

        $dadtmani = "<table style='border: #0b0ce4 2px solid;border-radius: 9px;padding: 10px 10px 10px 10px;'>

        <tr>

            <td>

                <tr style='border-radius: 83px 45px 45px 45px;padding: 18px 0px 32px 0px;'>

                    <td style='padding: 10px 0px 10px 10px; width: 132px;'>Name</td>

                    <td style='padding: 10px 0px 10px 10px;'>".$name."</td>

                </tr>

                <tr style='border-radius: 83px 45px 45px 45px;background-color: #0000001f;padding: 18px 0px 32px 0px;'>    

                    <td style='padding: 10px 0px 10px 10px; width: 132px;'>Email</td>

                    <td style='padding: 10px 0px 10px 10px;width: 232px;'>".$email."</td>

                </tr>

                <tr style='border-radius: 83px 45px 45px 45px;padding: 18px 0px 32px 0px;'>    

                    <td style='padding: 10px 0px 10px 10px; width: 132px;'>Enrollment:</td>

                    <td style='padding: 10px 0px 10px 10px;'>".$enrolment."</td>

                </tr>  

                <tr style='border-radius: 83px 45px 45px 45px;background-color: #0000001f;padding: 18px 0px 32px 0px;'>    

                    <td style='padding: 10px 0px 10px 10px; width: 132px;'>Login Password:</td>

                    <td style='padding: 10px 0px 10px 10px;'>".$Passwordu."</td>

                </tr>

            </td>

        </tr>

    </table>

    <a href='iimsr.net.in' style='text-decoration:none;'><p><span style='color:#0000fd;font-weight:700;text-align:justify;'>Your re-registration in IIMSR has been done, we will update you shortly.</span> <span style='color:#fd0000;font-weight:700;'>Kindly deposit your fees in Imperial Institute of Management Science & Research account only, any fee deposited in any other account EXCEPT IIMSR will not be considered.</span></p></a>

    <img src='iimsr.net.in/assets/images/logo.png' style='width: 255px; height: 70px;'>

    <p>

    <span style='color:#500050'>For Admission : </span><strong style='color:#000026'>9891030303</strong><br>

    <span style='color:#500050'>For Verification &amp; Fee : </span><strong style='color:#000026'>9266585858</strong><br>

    <span style='color:#500050'>Email: </span><strong style='color:#000026'><a href='mailto:credentials@iimsr.net.in' rel='noreferrer' target='_blank'>credentials@iimsr.net.in</a></strong><br>

    <span style='color:#500050'>Website : </span><a href='https://www.iimsr.net.in' style='text-decoration:none' rel='noreferrer' target='_blank' data-saferedirecturl='https://www.google.com/url?q=http://iimsr.net.in&amp;source=gmail&amp;ust=1591852093685000&amp;usg=AFQjCNHDR5wbJRaaq0RfkyBNWK71E_kyOA'><strong>www.iimsr.net.in</strong></a> .

    </p>";

        $subject = "Login Password";

        $headers = array("From: credentials@iimsr.net.in",

            "Reply-To: replyto@iimsr.net.in",

            "X-Mailer: PHP/" . PHP_VERSION,

            "Content-type: text/html; charset=iso-8859-1",

            "Cc: anand24h@gmail.com"

        );

        $headers = implode("\r\n", $headers);

       mail($email,$subject,$dadtmani,$headers);

    }

    if($sqlfff){

	    $success1 = "<p class='OperationHas'>Thank You...! Password Mail send successfully</p>";

	}else{

		$success1 = "<p class='AlreadyRegistered'>Ooops...! Password Mail sending failed</p>";

	} 

}

/**--------------------------result mail-----------------------**/

if(isset($_POST['resultpass'])){

	$name =strtoupper($_POST['name']);

	$email = $_POST['email'];

	$enrolment =strtoupper($_POST['enrolment']);

	$ResultPass = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%&*_";

    $ResultPass = substr( str_shuffle( $ResultPass ), 0, 6 );

	$sqlfff = mysqli_query($con, "UPDATE `register_here` SET `ResultPass`='$ResultPass' WHERE `enrolment`='$enrolment'");

    if($sqlfff){

        $dadtmani = "<table style='border: #0b0ce4 2px solid;border-radius: 9px;padding: 10px 10px 10px 10px;'>

        <tr>

            <td>

                <tr style='border-radius: 83px 45px 45px 45px;padding: 18px 0px 32px 0px;'>

                    <td style='padding: 10px 0px 10px 10px; width: 132px;'>Name</td>

                    <td style='padding: 10px 0px 10px 10px;'>".$name."</td>

                </tr>

                <tr style='border-radius: 83px 45px 45px 45px;background-color: #0000001f;padding: 18px 0px 32px 0px;'>    

                    <td style='padding: 10px 0px 10px 10px; width: 132px;'>Email</td>

                    <td style='padding: 10px 0px 10px 10px;width: 232px;'>".$email."</td>

                </tr>

                <tr style='border-radius: 83px 45px 45px 45px;padding: 18px 0px 32px 0px;'>    

                    <td style='padding: 10px 0px 10px 10px; width: 132px;'>Enrollment:</td>

                    <td style='padding: 10px 0px 10px 10px;'>".$enrolment."</td>

                </tr>  

                <tr style='border-radius: 83px 45px 45px 45px;background-color: #0000001f;padding: 18px 0px 32px 0px;'>    

                    <td style='padding: 10px 0px 10px 10px; width: 132px;'>Result Password:</td>

                    <td style='padding: 10px 0px 10px 10px;'>".$ResultPass."</td>

                </tr>

            </td>

        </tr>    

    </table>

    <a href='iimsr.net.in' style='text-decoration:none;'><p><span style='color:#0000fd;font-weight:700;text-align:justify;'>Your re-registration in IIMSR has been done, we will update you shortly.</span> <span style='color:#fd0000;font-weight:700;'>Kindly deposit your fees in Imperial Institute of Management Science & Research account only, any fee deposited in any other account EXCEPT IIMSR will not be considered.</span></p></a>

    <img src='iimsr.net.in/assets/images/logo.png' style='width: 255px; height: 70px;'>

    <p>

    <span style='color:#500050'>For Admission : </span><strong style='color:#000026'>9891030303</strong><br>

    <span style='color:#500050'>For Verification &amp; Fee : </span><strong style='color:#000026'>9266585858</strong><br>

    <span style='color:#500050'>Email: </span><strong style='color:#000026'><a href='mailto:credentials@iimsr.net.in' rel='noreferrer' target='_blank'>credentials@iimsr.net.in</a></strong><br>

    <span style='color:#500050'>Website : </span><a href='https://www.iimsr.net.in' style='text-decoration:none' rel='noreferrer' target='_blank' data-saferedirecturl='https://www.google.com/url?q=http://iimsr.net.in&amp;source=gmail&amp;ust=1591852093685000&amp;usg=AFQjCNHDR5wbJRaaq0RfkyBNWK71E_kyOA'><strong>www.iimsr.net.in</strong></a> .

    </p>";

        $subject = "Result Password";

        $headers = array("From: credentials@iimsr.net.in",

            "Reply-To: replyto@iimsr.net.in",

            "X-Mailer: PHP/" . PHP_VERSION,

            "Content-type: text/html; charset=iso-8859-1",

            "Cc: anand24h@gmail.com"

        );

        $headers = implode("\r\n", $headers);

       mail($email,$subject,$dadtmani,$headers);

    }

    if($sqlfff){

	    $success2 = "<p class='OperationHas'>Thank You...! Result Password send successfully</p>";

	}else{

		$success2 = "<p class='AlreadyRegistered'>Ooops...! Password Mail sending failed</p>";

	} 

}

/**--------------------------awaire mail-----------------------**/

if(isset($_POST['alertmessage'])){

	$name =strtoupper($_POST['name']);

	$email = $_POST['email'];

	$alertMail = 1;

	$enrolment =strtoupper($_POST['enrolment']);

	$sqlfff = mysqli_query($con, "INSERT INTO `alert_mail`(`Name`, `Email`, `Enrolment`) VALUES ('$name','$email','$enrolment')");

	$sqlfff = mysqli_query($con, "UPDATE `register_here` SET `alertMail`='$alertMail' WHERE `enrolment`='$enrolment'");

    $dadtmani = "<table style='border: #0b0ce4 2px solid;border-radius: 9px;padding: 10px 10px 10px 10px;'>

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

                <h2>Important Notice!</h2>

                <p style='text-align:justify;color: rgb(7, 55, 99);font-weight: 600;'>This mail is regarding inform you that some counselors and team leaders of Imperial Institute of Management Science & Research have been fired by us. They cheated the institution, due to which they have been terminated. If you get a call and they ask you for payment in a UPI like Google Pay, Paytm, or Phone Pay then it is advised that please do not make any payment. You only have to pay to the Imperial Institute of Management Science & Research account, Imperial Institute of Management Science & Research website, and FirstVITE eLearning Pvt Ltd account.</p>

                <p style='text-align:justify;color: rgb(7, 55, 99);font-weight: 600;'><b>Note:</b> If you receive a call to transfer your admission from Imperial Institute of Management Science & Research to another Institute, then immediately call at Institutes IVR no (9891030303) or the Institute's admin team (9266585858) to check the status. 'If you do not inform to institute, then you will be responsible for this. You may be at a financial loss.'</p>

            </td>    

        </tr>    

    </table>

    <a href='iimsr.net.in' style='text-decoration:none;'><p><span style='color:#fd0000;font-weight:700;'>Kindly deposit your fees in Imperial Institute of Management Science & Research and FIRSTVITE E-LEARNING PVT LTD. account only, any fee deposited in any other account EXCEPT IIMSR will not be considered.</span></p></a>

    <img src='iimsr.net.in/assets/images/logo.png' style='width: 255px; height: 70px;'>

    <p>

    <span style='color:#500050'>For Admission : </span><strong style='color:#000026'>info@iimsr.net.in</strong><br>

    <span style='color:#500050'>For Verification &amp; Fee : </span><strong style='color:#000026'>info@iimsr.net.in</strong><br>

    <span style='color:#500050'>Email: </span><strong style='color:#000026'><a href='mailto:alert@iimsr.net.in' rel='noreferrer' target='_blank'>alert@iimsr.net.in</a></strong><br>

    <span style='color:#500050'>Website : </span><a href='https://www.iimsr.net.in' style='text-decoration:none' rel='noreferrer' target='_blank' data-saferedirecturl='https://www.google.com/url?q=https://www.iimsr.net.in&amp;source=gmail&amp;ust=1591852093685000&amp;usg=AFQjCNHDR5wbJRaaq0RfkyBNWK71E_kyOA'><strong>www.iimsr.net.in</strong></a> .

    </p>";

        $subject = "Alert!.. Message from Vidya Bharati Institute of Management & Technology";

        $headers = array("From: alert@iimsr.net.in",

            "Reply-To: replyto@iimsr.net.in",

            "X-Mailer: PHP/" . PHP_VERSION,

            "Content-type: text/html; charset=iso-8859-1",

            "Cc: alert@iimsr.net.in"

        );

        $headers = implode("\r\n", $headers);

        mail($email,$subject,$dadtmani,$headers);

    if($sqlfff){

	    $success3 = "<p class='OperationHas'>Thank You...! alert message send successfully</p>";

	}else{

		$success3 = "<p class='AlreadyRegistered'>Ooops...! alert message Mail sending failed</p>";

	} 

}

?>

<div class="content-wrapper">

    <section class="content-header">

        <h1>

            <?php if($_SESSION['role']=="docs-verification" || $_SESSION['role']=="super-admin"){ ?>

                <i class="fa fa-arrow-circle-right" aria-hidden="true"></i> <a href="view-complete-course.php">View Complete Course</a>

            <?php } ?>

            <?php if($_SESSION['role']=="super-admin"){ ?>

                <i class="fa fa-arrow-circle-right" aria-hidden="true"></i> <a href="view-new-registration.php">View All Students</a>

            <?php } ?>

            <?php if($_SESSION['role']=="super-admin"){ ?>

                <i class="fa fa-arrow-circle-right" aria-hidden="true"></i> <a href="new-registration.php">Register Student</a>

            <?php } ?>

            <?php

    			if (isset($_POST['resultpass'])){

    				echo $success1;

    			}else {

    				echo $success1;

    			}

    			if (isset($_POST['sendmail'])){

    				echo $success2;

    			}else {

    				echo $success2;

    			}

    			if (isset($_POST['alertmessage'])){

    				echo $success3;

    			}else {

    				echo $success3;

    			}

    		?>

        </h1>

        <ol class="breadcrumb">

            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>

            <li class="active">View Complete Course</li>

        </ol>

    </section>

    <section class="content">

        <div class="row">

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                <form action="" method="post">

                    <div class="row">

                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">

            				<input type="text" placeholder="Search : Name, Enrolment, Email, Dob, Unique Id" class="form-control" name="valueToSearch">

        				</div>

        				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">

            				<input type="submit" value="Search" name="search" class="btn btn-block btn-success btn-flat">

        				</div>

                    </div>

    			</form>

            </div>

        </div>

        <br>

        <div class="table-responsive mailbox-messages" style="overflow-x:auto; margin-bottom: 7px; height:440px;">

            <table class="table table-hover table-striped">

                <tbody>

                    <tr>

                        <td class="mailbox-star">Action</td>

                        <td class="mailbox-star">Action</td>

                        <td class="mailbox-star">Action</td>

                        <td class="mailbox-star">Action</td>

                        <td class="mailbox-star">Image</td>

                        <td class="mailbox-star">Marks</td>

                        <td class="mailbox-star">Adhar</td>

                        <td class="mailbox-star">Sign</td>

                        <td class="mailbox-name"style="min-width:90px;">Enrolment</td>

                        <td class="mailbox-name"style="min-width:90px;">Unique ID</td>

                        <td class="mailbox-name"style="min-width:60px;">LE</td>

                        <td class="mailbox-name"style="min-width:200px;">Name</td>

                        <td class="mailbox-subject"style="min-width:200px;">Fathers Name </td>

                        <td class="mailbox-attachment"style="min-width:200px;">Mothers Name</td>

                        <td class="mailbox-date">Mobile No</td>

                        <td class="mailbox-date">DOB</td>

                        <td class="mailbox-date">Email</td>

                        <td class="mailbox-date"style="min-width:100px;">Discount Fee</td>

                        <td class="mailbox-date"style="min-width:100px;">Total Fee </td>

                        <td class="mailbox-date"style="min-width:100px;">Deu Fee </td>

                        <td class="mailbox-date"style="min-width:100px;">Submit Fee</td>

                        <td class="mailbox-date">Password </td>

                        <td class="mailbox-date"style="min-width:100px;">Result Pass </td>

                        <td class="mailbox-date"style="min-width:250px;">Course </td>

                        <td class="mailbox-date"style="min-width:150px;">Branch </td>

                        <td class="mailbox-date">Semesters </td>

                        <td class="mailbox-date"style="min-width:150px;">Joining Date</td>

                        <td class="mailbox-date"style="min-width:300px;">Address</td>

                    </tr>

                    <?php

                		/*if (isset($_GET['pageno'])) {

                			$pageno = $_GET['pageno'];

                		} else {

                			$pageno = 1;

                		}

                		$no_of_records_per_page = 40;

                		$offset = ($pageno-1) * $no_of_records_per_page;

                		$query = "SELECT COUNT(*) FROM register_here";

                		$result = mysqli_query($con,$query);

                		$total_rows = mysqli_fetch_array($result)[0];

                		$total_pages = ceil($total_rows / $no_of_records_per_page);

                		$query = mysqli_query($con, "SELECT * FROM `register_here` ORDER BY id desc LIMIT $offset, $no_of_records_per_page");*/

                		

                		$query = mysqli_query($con, "SELECT * FROM `register_here` ORDER BY id desc");

                		$num = mysqli_num_rows($query);

                		if($num>0){

                			if(isset($_POST['search'])){

                				$serach = $_POST['valueToSearch'];

                				$query = mysqli_query($con,"SELECT * FROM `register_here` WHERE CONCAT(`name`, `enrolment`, `email`, `dob`, `unique_id`) LIKE '%".$serach."%'");

                			}

                			while($row = mysqli_fetch_array($query)) { 

                				$completeadd = $row['complete_add'];

                				if($row['lateral_entry']){

                				    $Let = '<p class="yess">Yes</p>';

                				}else{

                				    $Let = '<p class="yessNo">No</p>';

                				}

        				if($row['CompleteCourse']==0){

                	?>

                    <tr>

                        <td>

                            <?php if($_SESSION['role']=="super-admin"){ ?>

						    <form class="floatData" name="useredata" method="post" action="new-registration.php">

							    <input type="hidden" name="enrollmen" value="<?php echo $row['enrolment'];?>">

							    <input type="submit" name="edit" value="Edit" class="btn btn-warning btn-xs btn-flat btn-block ActionButtonRa" style="">

						    </form>

						    <?php } ?>

						    <?php if($_SESSION['role']=="super-admin"){ ?>

						    <form class="floatData" name="deletedata" method="post" action="">

							    <input type="hidden" name="enrollmen" value="<?php echo $row['enrolment'];?>">

							    <input type="submit" name="delete" value="Delete" class="btn btn-danger btn-xs btn-flat btn-block ActionButtonRa" style="" onclick="return confirm('Are You Sure Want To delete')">

						    </form>

						    <?php } ?>

						    

                        </td>

                        <td>

						    <?php if($_SESSION['role']=="super-admin"){ ?>

					        <?php if(!empty($row['Passwordu'])){ ?>

    						    <form class="floatData" name="deletedata" method="post" action="">

    							    <input type="submit" name="sendmail" value="Resend Login Password" class="btn btn-success btn-xs btn-flat btn-block ActionButtonRa" />

    							    <input type="hidden" name="name" value="<?php echo $row['name'];?>">

    							    <input type="hidden" name="enrolment" value="<?php echo $row['enrolment'];?>">

    							    <input type="hidden" name="email" value="<?php echo $row['email'];?>">

    						    </form>

						    <?php } elseif(empty($row['Passwordu'])){ ?>

    						    <form class="floatData" name="deletedata" method="post" action="">

    							    <input type="submit" name="sendmail" value="Send Login Password" class="btn btn-danger btn-xs btn-flat btn-block ActionButtonRa" />

    							    <input type="hidden" name="name" value="<?php echo $row['name'];?>">

    							    <input type="hidden" name="enrolment" value="<?php echo $row['enrolment'];?>">

    							    <input type="hidden" name="email" value="<?php echo $row['email'];?>">

    						    </form>

						    <?php } ?> 

                            <?php if(!empty($row['ResultPass'])){ ?>

    						    <form class="floatData" name="deletedata" method="post" action="">

    							    <input type="submit" name="resultpass" value="Resend Result Password" class="btn btn-success btn-xs btn-flat btn-block ActionButtonRa" />

    							    <input type="hidden" name="name" value="<?php echo $row['name'];?>">

    							    <input type="hidden" name="enrolment" value="<?php echo $row['enrolment'];?>">

    							    <input type="hidden" name="email" value="<?php echo $row['email'];?>">

    						    </form>

						    <?php } elseif(empty($row['ResultPass'])){ ?>

    						    <form class="floatData" name="deletedata" method="post" action="">

    							    <input type="submit" name="resultpass" value="Send Result Password" class="btn btn-danger btn-xs btn-flat btn-block ActionButtonRa" />

    							    <input type="hidden" name="name" value="<?php echo $row['name'];?>">

    							    <input type="hidden" name="enrolment" value="<?php echo $row['enrolment'];?>">

    							    <input type="hidden" name="email" value="<?php echo $row['email'];?>">

    						    </form>

						    <?php } } ?>

                        </td>

                        <td>

						    <?php if($_SESSION['role']=="super-admin" || $_SESSION['role']=="alert-message"){ ?>

                            <?php if($row['alertMail']==0){ ?>

						        <form class="floatData" name="deletedata" method="post" action="">

    							    <input type="submit" name="alertmessage" value="Send Alert Message" class="btn btn-danger btn-xs btn-flat btn-block ActionButtonRa" />

    							    <input type="hidden" name="name" value="<?php echo $row['name'];?>">

    							    <input type="hidden" name="enrolment" value="<?php echo $row['enrolment'];?>">

    							    <input type="hidden" name="email" value="<?php echo $row['email'];?>">

    						    </form>

    						   <?php } elseif($row['alertMail']==1){ ?> 

    						   <form class="floatData" name="deletedata" method="post" action="">

    							    <input type="submit" name="alertmessage" value="Resend Alert Message" class="btn btn-success btn-xs btn-flat btn-block ActionButtonRa" />

    							    <input type="hidden" name="name" value="<?php echo $row['name'];?>">

    							    <input type="hidden" name="enrolment" value="<?php echo $row['enrolment'];?>">

    							    <input type="hidden" name="email" value="<?php echo $row['email'];?>">

    						    </form>

						    <?php } } ?>

						    <?php if($_SESSION['role']=="super-admin"){ ?>

    						    <?php if($row['status_card']==1){ ?>

    						        <a href="verify-admit-card.php?enrolment=<?php echo $row["enrolment"]; ?>" class="btn btn-success btn-xs btn-flat btn-block ActionButtonRa">Enable Admit Card</a>

        						<?php } else{ ?>

        						    <a href="verify-admit-card.php?enrolment=<?php echo $row["enrolment"]; ?>" class="btn btn-danger btn-xs btn-flat btn-block ActionButtonRa">Disable Admit Card</a>

    						    <?php } ?>

						    <?php } ?>

                        </td>

                        <td>

                            <?php if($row['StudentStatus']==1){ ?>

						        <a href="student-status.php?enrolment=<?php echo $row["enrolment"]; ?>" class="btn btn-success btn-xs btn-flat btn-block ActionButtonRa">Login Enable</a>

						    <?php } else{ ?>

						        <a href="student-status.php?enrolment=<?php echo $row["enrolment"]; ?>" class="btn btn-danger btn-xs btn-flat btn-block ActionButtonRa">login Disable</a>

						    <?php } ?>

                        </td>

                        <td class="mailbox-star"><img class="img-circle ImageClass" src="images/<?php echo $row['simage'];?>" alt=""></td>

                        <td class="mailbox-star"><img class="img-circle ImageClass" src="images/<?php echo $row['marksheet'];?>" alt=""></td>

                        <td class="mailbox-star"><img class="img-circle ImageClass" src="images/<?php echo $row['adharcard'];?>" alt=""></td>

                        <td class="mailbox-star"><img class="img-circle ImageClass" src="images/<?php echo $row['signature'];?>" alt=""></td>

                        <td class="mailbox-name"><b><?php echo strtoupper($row['enrolment']);?></b></td>

                        <td class="mailbox-name"><b><?php echo strtoupper($row['unique_id']);?></b></td>

                        <td class="mailbox-name"><b><?php echo $Let;?></b></td>

                        <td class="mailbox-name"><?php echo $row['name'];?></td>

                        <td class="mailbox-subject"><?php echo $row['fathers_name'];?></td>

                        <td class="mailbox-attachment"><?php echo $row['mothers_name'];?> </td>

                        <td class="mailbox-date"><?php echo $row['mobile_no'];?></td>

                        <td class="mailbox-date"><?php echo $row['dob'];?></td>

                        <td class="mailbox-date"><?php echo $row['email'];?></td>

                        <td class="mailbox-date"><i class="fa fa-inr"></i><?php echo $row['discount_fee'];?>/-</td>

                        <td class="mailbox-date"><i class="fa fa-inr"></i><?php echo $row['total_fee'];?>/-</td>

                        <td class="mailbox-date"><i class="fa fa-inr"></i><?php echo $row['deu_fee'];?>/-</td>

                        <td class="mailbox-date"><i class="fa fa-inr"></i><?php echo $row['submit_fee'];?>/-</td>

                        <td class="mailbox-date"><?php echo $row['Passwordu'];?></td>

                        <td class="mailbox-date"><?php echo $row['ResultPass'];?></td>

                        <td class="mailbox-date"><?php echo $row['course'];?></td>

                        <td class="mailbox-date"><?php echo $row['specilization'];?></td>

                        <td class="mailbox-date"><?php echo $row['semesters'];?></td>

                        <td class="mailbox-date"><?php echo $row['r_date'];?></td>

                        <td class="mailbox-date"><?php echo $completeadd;?></td>

                    </tr>

                    <?php } } } ?>

                </tbody>

            </table>

            <div class="row">

    			<div class="col-sm-4 col-md-4 col-lg-4 col-xs-12"></div>

    			<div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">

    				<ul class="pagination">

    					<li><a class="paginationn" href="?pageno=1">First</a></li>

    					<li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">

    						<a class="paginationn" href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>

    					</li>

    					<li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">

    						<a class="paginationn" href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>

    					</li>

    					<li><a class="paginationn" href="?pageno=<?php echo $total_pages; ?>">Last</a></li>

    				</ul>

    			</div>

    			<div class="col-sm-2 col-md-2 col-lg-2 col-xs-12"></div>

    		</div>

        </div>

    </section>

	<?php 

		if(isset($_POST['delete'])){

		    $enroll = $_POST['enrollmen'];

		    mysqli_query($con, "DELETE FROM `register_here` WHERE `enrolment`='$enroll'");

		}

	?>

</div>

<style>

    .bg-aqua, .callout.callout-info, .alert-info, .label-info, .modal-info .modal-body {

        background-color: #020202c7 !important;

    }

</style>

<?php include("include/footer.php");?>

<?php }else { header("location: login.php"); } ?>