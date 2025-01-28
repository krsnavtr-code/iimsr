<?php

error_reporting(0);

include('checklogin.php');

include("dbconnection.php");

include("include/header.php");

if($_SESSION['role']=="super-admin"){

if(isset($_POST['submit'])){

    $title = $_POST['title'];

	$name =strtoupper($_POST['name']);

	$name = $title." ".$name;

	$ftitle = $_POST['fathertitle'];

	$fname =strtoupper($_POST['fathername']);

	$fname = $ftitle." ".$fname;

	$mname =strtoupper($_POST['mothername']);

    $mtitle = $_POST['mothertitle'];

    $mname = $mtitle." ".$mname;

	$mobile = $_POST['mobile'];

	$dob = $_POST['dob'];

	$email = $_POST['email'];

	$enrol = strtoupper($_POST['enrolment']);

	$course = $_POST['course'];

    if(!empty($_POST['branchname'])){

	    $specilization =  $_POST['branchname'];

	}else{

	    $specilization = $_POST['specilization'];

	}

	$semesters = $_POST['semesters'];

	$lateral_entry = $_POST['lateralentry'];

	$Examfee = $_POST['Examfee'];

	$CourseTotalFee = $_POST['CourseTotalFee'];

	$discountyouwill = $_POST['discountyouwill'];

	$discount_fee = $_POST['discount_fee'];

	$TotalGst = $_POST['TotalGst'];

	$totalfee = $_POST['totalfee'];

	$totalfee = (int) str_replace(',','',$totalfee);

	$deufee = (int) $_POST['duefee'];	

	$submitfee = $_POST['submitfee'];	

	$unique_id = $_POST['unique_id'];	

	$submitfee = (int) str_replace(',','',$submitfee);	

	$enrool = $_POST['enrollid'];

	$date = $_POST['date'];

	$sessionn = $_POST['session'];

	$address = $_POST['caddress'];

	$simage = $_POST['student_image'];

	$student_signature = $_POST['student_signature'];

	$adhar_card = $_POST['adhar_card'];

	$marksheet = $_POST['marksheet'];

	$paindungfee = $deufee;

	$ResultPdf ='result-report.php';

	$CertificateLink ='certificate-report.php';

	$CmmLink = 'degree-report.php';

	

	$Passwordu = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%&*_";

    $Passwordu = substr( str_shuffle( $Passwordu ), 0, 6 );

    

    $updatesta = mysqli_query($con,"SELECT `new_status` FROM `add_payment_records` WHERE `unique_id` ='$unique_id'");

    $statusupd = mysqli_fetch_array($updatesta);



    if(!empty($_POST['enrollid'])){

        $sql = mysqli_query($con, "UPDATE `register_here` SET `name`='$name',`fathers_name`='$fname',`mothers_name`='$mname',`mobile_no`='$mobile',`dob`='$dob',`email`='$email',`enrolment`='$enrol',`course`='$course',`specilization`='$specilization',`semesters`='$semesters',`lateral_entry`='$lateral_entry',`r_date`='$date',`session`='$sessionn', `complete_add`='$address', `discount_fee`='$discount_fee', `CourseTotalFee`='$CourseTotalFee', `total_fee`='$totalfee',`deu_fee`='$deufee',`submit_fee`='$submitfee', `unique_id`='$unique_id', `simage`='$simage', `marksheet`='$marksheet', `adharcard`='$adhar_card', `signature`='$student_signature' WHERE `id`='$enrool'");

    }else{

        $query =  mysqli_query($con, "SELECT * FROM `register_here` WHERE `enrolment`='$enrol'");

        $numrows = mysqli_num_rows($query);

        if($numrows==0){

            $sql = mysqli_query($con, "INSERT INTO `register_here`(`name`, `fathers_name`, `mothers_name`, `mobile_no`, `dob`, `email`, `enrolment`, `course`, `specilization`, `semesters`, `lateral_entry`, `r_date`, `session`, `complete_add`, `CourseFee`, `discou_prov`, `discou_fee`, `TotalGst`, `total_fee`, `deu_fee`, `submit_fee`, `Examfee`, `unique_id`, `simage`, `marksheet`, `adharcard`, `signature`, `Passwordu`, `ResultPdf`, `CertificateLink`, `CmmLink`) VALUES ('$name','$fname','$mname','$mobile','$dob','$email','$enrol','$course','$specilization','$semesters', '$lateral_entry', '$date', '$sessionn', '$address', '$CourseTotalFee', '$discountyouwill', '$discount_fee', '$TotalGst','$totalfee','$deufee','$submitfee','$Examfee','$unique_id','$simage','$marksheet','$adhar_card','$student_signature','$Passwordu', '$ResultPdf', '$CertificateLink', '$CmmLink')");

            if($statusupd['new_status']==0){

                mysqli_query($con,"UPDATE `add_payment_records` SET `new_status`='1' WHERE unique_id ='$unique_id'");   

            }else{

                mysqli_query($con,"UPDATE `add_payment_records` SET `new_status`='0' WHERE unique_id ='$unique_id'");

            }

        if($sql){

            $dadtmani = "<table style='border: #0b0ce4 1px solid;border-radius: 9px;padding: 10px 10px 10px 10px;'>

            <tr>

                <td>

                    <tr style='border-radius: 83px 45px 45px 45px;background-color: #0000001f;padding: 18px 0px 32px 0px;'>

                        <td style='padding: 10px 0px 10px 10px; width: 132px;'>Name : </td>

                        <td style='padding: 10px 0px 10px 10px;'>".$name."</td>

                    </tr> 

                    <tr style='border-radius: 83px 45px 45px 45px;padding: 18px 0px 32px 0px;'>

                        <td style='padding: 10px 0px 10px 10px; width: 132px;'>Father Name : </td>

                        <td style='padding: 10px 0px 10px 10px;'>".$fname."</td>

                    </tr> 

                    <tr style='border-radius: 83px 45px 45px 45px;background-color: #0000001f;padding: 18px 0px 32px 0px;'>

                        <td style='padding: 10px 0px 10px 10px; width: 132px;'>Mother Name : </td>

                        <td style='padding: 10px 0px 10px 10px;'>".$mname."</td>

                    </tr>    

                    <tr style='border-radius: 83px 45px 45px 45px;padding: 18px 0px 32px 0px;'>    

                        <td style='padding: 10px 0px 10px 10px; width: 132px;'>Mobile No. : </td>

                        <td style='padding: 10px 0px 10px 10px;'>".$mobile."</td>

                    </tr>    

                    <tr style='border-radius: 83px 45px 45px 45px;background-color: #0000001f;padding: 18px 0px 32px 0px;'>    

                        <td style='padding: 10px 0px 10px 10px; width: 132px;'>Email : </td>

                        <td style='padding: 10px 0px 10px 10px;'>".$email."</td>

                    </tr>

                    <tr style='border-radius: 83px 45px 45px 45px;padding: 18px 0px 32px 0px;'>    

                        <td style='padding: 10px 0px 10px 10px; width: 132px;'>D.O.B : </td>

                        <td style='padding: 10px 0px 10px 10px;'>".$dob."</td>

                    </tr>

                    <tr style='border-radius: 83px 45px 45px 45px;background-color: #0000001f;padding: 18px 0px 32px 0px;'>    

                        <td style='padding: 10px 0px 10px 10px; width: 132px;'>Enrollment : </td>

                        <td style='padding: 10px 0px 10px 10px;'>".$enrol."</td>

                    </tr>  

                    <tr style='border-radius: 83px 45px 45px 45px;padding: 18px 0px 32px 0px;'>    

                        <td style='padding: 10px 0px 10px 10px; width: 132px;'>Login Password : </td>

                        <td style='padding: 10px 0px 10px 10px;'>".$Passwordu."</td>

                    </tr>

                    <tr style='border-radius: 83px 45px 45px 45px;background-color: #0000001f;padding: 18px 0px 32px 0px;'>    

                        <td style='padding: 10px 0px 10px 10px; width: 132px;'>Course : </td>

                        <td style='padding: 10px 0px 10px 10px;'>".$course."</td>

                    </tr>    

                    <tr style='border-radius: 83px 45px 45px 45px;padding: 18px 0px 32px 0px;'>    

                        <td style='padding: 10px 0px 10px 10px; width: 132px;'>Branch : </td>

                        <td style='padding: 10px 0px 10px 10px;'>".$specilization."</td>

                    </tr>

                    <tr style='border-radius: 83px 45px 45px 45px;background-color: #0000001f;padding: 18px 0px 32px 0px;'>    

                        <td style='padding: 10px 0px 10px 10px; width: 132px;'>Total Fee : </td>

                        <td style='padding: 10px 0px 10px 10px;font-weight:700;'>".$totalfee."</td>

                    </tr>    

                    <tr style='border-radius: 83px 45px 45px 45px;padding: 18px 0px 32px 0px;'>    

                        <td style='padding: 10px 0px 10px 10px; width: 132px;'>Paid Fee : </td>

                        <td style='padding: 10px 0px 10px 10px;font-weight:700;'>".$submitfee."</td>

                    </tr>

                    <tr style='border-radius: 83px 45px 45px 45px;background-color: #0000001f;padding: 18px 0px 32px 0px;'>    

                        <td style='padding: 10px 0px 10px 10px; width: 132px;color:#ff0000;'>Pending Fee : </td>

                        <td style='padding: 10px 0px 10px 10px;font-weight:700;color:#ff0000;'>".$paindungfee."</td>

                    </tr>

                </td>

            </tr>    

        </table>

        <a href='iimsr.net.in' style='text-decoration:none;'><p><span style='color:#0000fd;font-weight:700;text-align:justify;'>Your re-registration in IIMSR has been done, we will update you shortly.</span> <span style='color:#fd0000;font-weight:700;'>Kindly deposit your fees in Imperial Institute of Management Science & Research account only, any fee deposited in any other account EXCEPT IIMSR will not be considered.</span></p></a>

        <img src='iimsr.net.in/assets/images/logo.png' style='width: 255px; height: 70px;'>

        <p>

        <span style='color:#500050'>For Admission : </span><strong style='color:#000026'>9891030303</strong><br>

        <span style='color:#500050'>For Verification &amp; Fee : </span><strong style='color:#000026'> 8287434343 </strong><br>

        <span style='color:#500050'>Email : </span><strong style='color:#000026'><a href='mailto:registration@iimsr.net.in' rel='noreferrer' target='_blank'>registration@iimsr.net.in</a></strong><br>

        <span style='color:#500050'>Website : </span><a href='https://iimsr.net.in' style='text-decoration:none' rel='noreferrer' target='_blank' data-saferedirecturl='https://www.google.com/url?q=http://iimsr.net.in&amp;source=gmail&amp;ust=1591852093685000&amp;usg=AFQjCNHDR5wbJRaaq0RfkyBNWK71E_kyOA'><strong>www.iimsr.net.in</strong></a> .

        </p>";

            $subject = "User Registration Details.";

            $headers = array("From: registration@iimsr.net.in",

                "Reply-To: replyto@iimsr.net.in",

                "X-Mailer: PHP/" . PHP_VERSION,

                "Content-type: text/html; charset=iso-8859-1",

                "Cc: registration@iimsr.net.in"

            );

            $headers = implode("\r\n", $headers);

           mail($email,$subject,$dadtmani,$headers);

          }

       }

	}

	if($sql){

		$success = "<p class='OperationHas'>Thank You...! Enrolment number generate successfully</p>";

	}else{

		$success = "<p class='AlreadyRegistered'>Ooops...! Same User Enrolment already registered please insert different Enrolment</p>";

	}

}

if(isset($_POST['edit'])){

    $enroll = $_POST['enrollmen'];

    $resultt = mysqli_query($con,"SELECT * FROM `register_here` WHERE `enrolment`='$enroll'");

    $alladata= array();

    $roere = mysqli_fetch_array($resultt);

    $name = $roere['name'];

    $parts = explode(' ', $name);

    $fullcname = "";

    $namecount =0;

    foreach($parts as $part){

      if($namecount ==0){

           $nametitle = $part; 

      }else{

          $fullcname .= $part." ";

      }

      $namecount++;

    }

    $fathername = $roere['fathers_name'];

    $fatherparts = explode(' ', $fathername);

    $fathernamecount =0;

    $fathrefullcname="";

    foreach($fatherparts as $fathrepart){

      if($fathernamecount ==0){

           $faththernametitle = $fathrepart; 

      }else{

          $fathrefullcname .= $fathrepart." ";

      }

      $fathernamecount++;

    }

    $mothername = $roere['mothers_name'];

    $motherparts = explode(' ', $mothername);

    $mothernamecount =0;

    $motherfullcname = "";

    foreach($motherparts as $motherpart){

      if($mothernamecount ==0){

           $mothernametitle = $motherpart; 

      }else{

          $motherfullcname .= $motherpart." ";

      }

      $mothernamecount++;

    }

}

?>

<div class="content-wrapper">

    <section class="content-header">

        <h1>

            <? if($_SESSION['role']=="super-admin") ?>

                <i class="fa fa-arrow-circle-right" aria-hidden="true"></i> <a href="new-registration.php">Register Student</a>

            <?php  ?>

            <? if($_SESSION['role']=="super-admin") ?>

                <i class="fa fa-arrow-circle-right" aria-hidden="true"></i> <a href="view-new-registration.php">View All Students</a>

            <?php  ?>

            <? if($_SESSION['role']=="super-admin") ?>

                <i class="fa fa-arrow-circle-right" aria-hidden="true"></i> <a href="view-complete-course.php">View Complete Course</a>

            <?php  ?>

        </h1>

        <ol class="breadcrumb">

            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>

            <li class="active">New registration</li>

        </ol>

    </section>

    <section class="content">

        <div class="row">

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                <div class="box box-primary">

                    <?php

        				if (isset($_POST['submit'])){

        					echo $success;

        				}else {

        					echo $success;

        				}

        			?>

                    <div class="box-header with-border"></div>

                    <form action="" method="post" role="form" enctype="multipart/form-data">

                        <div class="box-body">

                            <div class="row">

                                <div class="col-sm-9 col-md-9 col-xs-9">

                                    <input type="text" name="unique_id" class="form-control" id="unique_id" placeholder="Please Enter Unique Identification Number"value="<?php if (isset($_POST['fetch'])) { echo $_POST['unique_id']; } ?>" required>

                                </div>

                                <div class="col-sm-3 col-md-3 col-xs-3">

                                    <button type="submit" name="fetch" class="btn btn-primary btn-block ButtonRadis">Submit</button>

                                </div>

                            </div>

                        </div>

                    </form>

                    <div class="box-header with-border"></div>

        		    <?php

                        global $name;

                        global $father_name;

                        global $date_of_birth;

                        global $mother_name;

                        global $mobile_nno;

                        global $eemail;

                        global $adddress;

                        global $unique_id;

                        global $coursssee;

                        global $semester;

                        global $lateral_entry;

                        global $braannch;

                        global $session;

                        global $tttotal_fee;

                        global $first_payment_amount;

                        global $marksheet;

                        global $adhar_card;

                        global $student_image;

                        global $student_signature;

                        $unique_id="";

                        

    				    if (!empty(isset($_POST['fetch']))){

    					    $_SESSION['unique_id'] = $unique_id;

    						$unique_id = $_POST['unique_id'];

    						$query =  mysqli_query($con, "SELECT nad.id, nad.unique_id, nad.email, af.id, af.email, af.order_id FROM `add_payment_records` AS nad INNER JOIN `application_form` AS af ON nad.unique_id = af.order_id WHERE nad.unique_id = '$unique_id'");

							$numrow = mysqli_num_rows($query);

							if($numrow==1){

        						$query =  mysqli_query($con, "SELECT * FROM `paymentslip` WHERE `unique_id`='$unique_id'");

								$numroww = mysqli_num_rows($query);

								if($numroww==1){

            						$query =  mysqli_query($con, "SELECT * FROM `register_here` WHERE `unique_id`='$unique_id'");

									$numrowe = mysqli_num_rows($query);

									if($numrowe==0){

                						$query = mysqli_query($con, "select * from `add_payment_records` where `unique_id` = '$unique_id'");

                						while ($row = mysqli_fetch_array($query)){

                						    $name = $row['name'];		  

                						    $father_name = $row['father_name'];

                						    $date_of_birth = $row['date_of_birth'];

                						    $mother_name = $row['mother_name'];

                						    $mobile_nno = $row['mobile_no'];

                						    $eemail = $row['email'];

                						    $adddress = $row['address'];

                							$unique_id = $row['unique_id'];

                							$coursssee = $row['course'];		

                							$semester = $row['semester'];

                							$lateral_entry = $row['lateral_entry'];

                							$braannch = $row['branch'];		

                							$session = $row['session'];		

                							$tttotal_fee = $row['total_fee'];		

                							$discount_fee = $row['discount_fee'];

                							$discountyouwill = $row['discountyouwill'];	

                							$TotalGst = $row['TotalGst'];		

                							$CourseTotalFee = $row['CourseTotalFee'];

                							$Examfee = $row['Examfee'];

                							

                							$first_payment_amount =  $row['first_payment_amount'];

                							$marksheet =  $row['marksheet'];

                							$adhar_card =  $row['adhar_card'];

                							$student_image =  $row['student_image'];

                							$student_signature =  $row['student_signature'];

                							$PaymentSlip =  $row['PaymentSlip'];

                							$finalverify =  $row['finalverify'];

            						    }								

            					    }else{

										echo "<p class='sameuniqeid'>Ooops...! This Unique id already registered please insert different Unique Id</p>";

            						}

								}else{

									echo "<p class='sameuniqeid'>Ooops...! Get the payment reciept deducted before registering</p>";

        						}

    				        }else{

								echo "<p class='sameuniqeid'>Ooops...! Unique Id not match </p>";

    						}

    					}

            			   $paarts = explode(' ', $name);

            			   $fulllcname = "";

            			   $namecount =0;

            			   foreach($paarts as $paart){

            			      if($namecount ==0){

            			           $naametitle = $paart; 

            			      }else{

            			          $fulllcname .= $paart." ";

            			      }

            			      $namecount++;

            			   }

            			   $father_namee = explode(' ', $father_name);

            			   $fulllccname = "";

            			   $namecount =0;

            			   foreach($father_namee as $paarrt){

            			      if($namecount ==0){

            			           $fnametitle = $paarrt; 

            			      }else{

            			          $fulllccname .= $paarrt." ";

            			      }

            			      $namecount++;

            			   }

            			   $mother_naame = explode(' ', $mother_name);

            			   $fullllcname = "";

            			   $namecount =0;

        			        foreach($mother_naame as $mpaart){

            			      if($namecount ==0){

            			           $mnametitle = $mpaart; 

            			      }else{

            			          $fullllcname .= $mpaart." ";

            			      }

            			      $namecount++;

                            }

				    ?>

                    <form action="" method="post" role="form" enctype="multipart/form-data">

                        <div class="box-body">

                            <div class="row">

                                <div class="col-sm-1 col-md-1 col-xs-3">

                                    <div class="form-group">

                                        <label for="exampleInputEmail1">Title</label>

                                        <select name="title" class="form-control select2" id="title" style="width: 100%;">

                                            <?php if(isset($_POST['edit'])){ ?>

                    					    <option value="<?php echo $nametitle; ?>" selected><?php echo $nametitle; ?></option>

                    					    <?php } else{ ?>

                    					    <option value="" disable hidden>-Title-</option>

                    					    <?php } ?>

                    					    <option value="Mr.">Mr.</option>

                    					    <option value="Mrs.">Mrs.</option>

                    					    <option value="Ms.">Ms.</option>

                    					    <?php if($naametitle!=null){ ?>

                                                <option selected="selected"><?php echo $naametitle; ?></option>

                                            <?php } ?>

                                        </select>

                                    </div>

                                </div>

                                <div class="col-sm-3 col-md-3 col-xs-9">

                                    <div class="form-group">

                                        <label for="exampleInputEmail1">Name</label>

                                        <input type="hidden" name="unique_id" class="form-control" value="<?php echo $unique_id ;?>" id="unique_id">

                    					<input type="hidden" name="enrollid" class="form-control" value="<?php if(isset($_POST['edit'])){ echo $roere['id']; } ?>">

                    					<input type="text" name="name" class="form-control" id="name" value="<?php if(isset($_POST['edit'])){ echo $fullcname; }else{ echo $fulllcname; } ?>" placeholder="Name" required>

                                    </div>

                                </div>

                                <div class="col-sm-1 col-md-1 col-xs-3">

                                    <div class="form-group">

                                        <label for="exampleInputEmail1">Title</label>

                                        <select name="fatitle" class="form-control select2" id="fatitle" style="width: 100%;">

                                            <?php if(isset($_POST['edit'])){ ?> 

                    					        <option value="<?php echo $faththernametitle; ?>" selected><?php echo $faththernametitle; ?></option>

                    					    <?php } else { ?>

                    					        <option value="" disable hidden>-Title-</option>

                    					    <?php } ?>

                    					    <option value="Mr.">Mr.</option>

                    					    <option value="Late">Late</option>

                    					    <?php if($fnametitle!=null){ ?>

                                                <option selected="selected"><?php echo $fnametitle; ?></option>

                                            <?php } ?>

                                        </select>

                                    </div>

                                </div>

                                <div class="col-sm-3 col-md-3 col-xs-9">

                                    <div class="form-group">

                                        <label for="exampleInputEmail1">Father's Name</label>

                                        <input type="text" name="fathername" class="form-control" id="fathername" value="<?php if(isset($_POST['edit'])){ echo $fathrefullcname; } else {echo $fulllccname;} ?>" placeholder="Father's Name" required>

                                    </div>

                                </div>

                                <div class="col-sm-1 col-md-1 col-xs-3">

                                    <div class="form-group">

                                        <label for="exampleInputEmail1">Title</label>

                                        <select name="mothertitle" class="form-control select2" id="mothertitle" style="width: 100%;">

                                            <?php if(isset($_POST['edit'])){ ?> 

                    					    <option value="<?php echo $mothernametitle; ?>" selected><?php echo $mothernametitle; ?></option>

                    					    <?php } else { ?>

                    					    <option value="" disable hidden>-Title-</option>

                    					    <?php } ?>

                    					    <option value="Mrs.">Mrs.</option>

                    					    <option value="Late">Late</option>

                                            <?php if($mnametitle!=null){ ?>

                                                <option selected="selected"><?php echo $mnametitle; ?></option>

                                            <?php } ?>

                                        </select>

                                    </div>

                                </div>

                                <div class="col-sm-3 col-md-3 col-xs-9">

                                    <div class="form-group">

                                        <label for="exampleInputEmail1">Mother's Name</label>

                                        <input type="text" name="mothername" class="form-control" id="mothername" value="<?php if(isset($_POST['edit'])){ echo $motherfullcname; }else{echo $fullllcname; } ?>" placeholder="Mother's Name" required>

                                    </div>

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-sm-2 col-md-2 col-xs-6">

                                    <div class="form-group">

                                        <label for="exampleInputPassword1">DOB</label>

                                        <input type="text" name="dob" class="form-control" id="dob" value="<?php if(isset($_POST['edit'])){ echo $roere['dob']; }else{echo $date_of_birth; } ?>" placeholder="Date Of Birth" required>

                                    </div>

                                </div>

                                <div class="col-sm-2 col-md-2 col-xs-6">

                                    <div class="form-group">

                                        <label for="exampleInputPassword1">Mobile</label>

                                        <input type="text" name="mobile" class="form-control" id="mobile" value="<?php if(isset($_POST['edit'])){ echo $roere['mobile_no']; }else{ echo $mobile_nno; } ?>" placeholder="Mobile No" required>

                                    </div>

                                </div>

                                <div class="col-sm-3 col-md-3 col-xs-12">

                                    <div class="form-group">

                                        <label for="exampleInputPassword1">Email</label>

                                        <input type="email" name="email" class="form-control" id="email" value="<?php if(isset($_POST['edit'])){ echo $roere['email']; }else{ echo $eemail; } ?>" placeholder="Email" required>

                                    </div>

                                </div>

                                <div class="col-sm-5 col-md-5 col-xs-12">

                                    <div class="form-group">

                                        <label for="exampleInputPassword1">Parmanent Address</label>

                                        <input type="text" name="caddress" class="form-control" id="caddress" value="<?php if(isset($_POST['edit'])){ echo $roere['complete_add']; }else{echo $adddress; } ?>" placeholder="Address" required>

                                    </div>

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-sm-6 col-md-6 col-xs-12">

                                    <div class="form-group">

                                        <label for="exampleInputPassword1">Course</label>

                                        <select name="course" class="form-control select2" required onkeyup="mycalculatenumber()" style="width: 100%;" id="slectcourse" required>

                                            <?php if(isset($_POST['edit'])){ ?>

                        					       <option value="<?php echo $roere['course']; ?>"><?php echo $roere['course']; ?></option> 

                        					  <?php }else{ ?>

                        					       <option value="" disable>--Select Course--</option>

                        					   <?php } ?>

                        					   <?php 

                        						  $querycourse = mysqli_query($con,'SELECT * FROM `course` ORDER BY `course`');

                        						?>

                        					    <?php

                            					    $array = array();

                            					    while($coursrow=mysqli_fetch_array($querycourse)){ 

                            					        if(!in_array($coursrow['course'], $array)){

                                                            $array[] = $coursrow['course'];  

                                                        } 

                            					    }

                            					    foreach($array as $dataa){

                        					    ?>

                        					    <option value="<?php echo$dataa; ?>"><?php echo$dataa; ?></option>
                                                
                        					   <?php } ?>
                                               <option value="other" > Other </option>

                        					    <?php if($coursssee!=null){ ?>

                        					        <option selected="selected"><?php echo $coursssee; ?></option>

                        					    <?php } ?>

                                        </select>

                                    </div>

                                </div>

                                <div class="col-sm-3 col-md-3 col-xs-12">

                                    <div class="form-group">

                                        <label for="exampleInputPassword1">Branch</label>

                                        <select name="specilization" class="form-control select2" id="slectbranch" style="width: 100%;" required>

                                            <?php if(isset($_POST['edit'])){ ?>

                                                <option value="<?php echo $roere['specilization']; ?>"><?php echo $roere['specilization']; ?></option> 

                                            <?php }else{ ?>

                                                <option value="" disable hidden>--Select branch--</option> 
                                                

                                            <?php } ?>

                                            <?php if($braannch!=null){ ?>

                                                <option selected="selected"><?php echo $braannch; ?></option>

                                            <?php } ?>

                                        </select>

                                    </div>

                                </div>

                                <?php if(!isset($_POST['edit'])){ ?>

                				<div class="col-sm-3 col-md-3 col-xs-12" id="branchnameen" style="display:none;">

                					<label>Branch Name:</label>

                					<input type="text" name="branchname" class="form-control" id="branchname" value="">

                				</div>

                				<?php } ?>

                                <div class="col-sm-3 col-md-3 col-xs-12">

                                    <div class="form-group">

                                        <label for="exampleInputPassword1">Semester</label>

                                        <input type="text" name="semesters" class="form-control" id="semesters" value="<?php if(isset($_POST['edit'])){ echo $roere['semesters']; }else{ echo $semester; } ?>" placeholder="Semester" required>

                                    </div>

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-sm-3 col-md-3 col-xs-6">

                                    <div class="form-group">

                                        <label for="exampleInputPassword1">Session</label>

                                        <input type="text" name="session" class="form-control" id="session" placeholder="Session" value="<?php if(isset($_POST['edit'])){ echo $roere['session']; }else{ echo $session; } ?>" required>

                                    </div>

                                </div>

                                <div class="col-sm-4 col-md-4 col-xs-6">

                                    <div class="form-group">

                                        <label for="exampleInputPassword1">Joining Date</label>

                                        <input type="text" name="date" class="form-control" id="date" placeholder="mm/dd/yyyy" value="<?php 

                        					if(isset($_POST['edit'])){ echo $roere['r_date']; }

                        					if(!empty(isset($_POST['fetch']))){

                        						$subsession = substr($session, 0, -5); 

                        						$moonth = rand(1, 7); 

                        						$daay = rand(1, 31);

                        						if($daay==10){

                        							echo "0" .$moonth . "/" . 10 . "/" . $subsession;

                        						}

                        						elseif($daay==11){

                        							echo "0" .$moonth . "/" . 11 . "/" . $subsession;

                        						}

                        						elseif($daay==12){

                        							echo "0" .$moonth . "/" . 12 . "/" . $subsession;

                        						}

                        						elseif($daay==13){

                        							echo "0" .$moonth . "/" . 13 . "/" . $subsession;

                        						}

                        						elseif($daay==14){

                        							echo "0" .$moonth . "/" . 14 . "/" . $subsession;

                        						}

                        						elseif($daay==15){

                        							echo "0" .$moonth . "/" . 15 . "/" . $subsession;

                        						}

                        						elseif($daay==16){

                        							echo "0" .$moonth . "/" . 16 . "/" . $subsession;

                        						}

                        						elseif($daay==17){

                        							echo "0" .$moonth . "/" . 17 . "/" . $subsession;

                        						}

                        						elseif($daay==18){

                        							echo "0" .$moonth . "/" . 18 . "/" . $subsession;

                        						}

                        						elseif($daay==19){

                        							echo "0" .$moonth . "/" . 19 . "/" . $subsession;

                        						}

                        						elseif($daay==20){

                        							echo "0" .$moonth . "/" . 20 . "/" . $subsession;

                        						}

                        						elseif($daay==21){

                        							echo "0" .$moonth . "/" . 21 . "/" . $subsession;

                        						}

                        						elseif($daay==22){

                        							echo "0" .$moonth . "/" . 22 . "/" . $subsession;

                        						}

                        						elseif($daay==23){

                        							echo "0" .$moonth . "/" . 23 . "/" . $subsession;

                        						}

                        						elseif($daay==24){

                        							echo "0" .$moonth . "/" . 24 . "/" . $subsession;

                        						}

                        						elseif($daay==25){

                        							echo "0" .$moonth . "/" . 25 . "/" . $subsession;

                        						}

                        						elseif($daay==26){

                        							echo "0" .$moonth . "/" . 26 . "/" . $subsession;

                        						}

                        						elseif($daay==27){

                        							echo "0" .$moonth . "/" . 27 . "/" . $subsession;

                        						}

                        						elseif($daay==28){

                        							echo "0" .$moonth . "/" . 28 . "/" . $subsession;

                        						}

                        						elseif($daay==29){

                        							echo "0" .$moonth . "/" . 29 . "/" . $subsession;

                        						}

                        						elseif($daay==30){

                        							echo "0" .$moonth . "/" . 30 . "/" . $subsession;

                        						}

                        						elseif($daay==31){

                        							echo "0" .$moonth . "/" . 31 . "/" . $subsession;

                        						}else{

                        							$randomDate = "0" . $moonth. "/" . "0" . $daay . "/" . $subsession;

                        							echo $randomDate;

                        						}

                        					}

                    						?>" required>

                                    </div>

                                </div>

                                <div class="col-sm-3 col-md-3 col-xs-12">

                                    <div class="form-group">

                                        <label for="exampleInputPassword1">Enrolment No.</label>

                                        <div class="input-group">

                                            <span class="input-group-addon">

                                                <input type="checkbox" onclick="generateEnrol()" required>

                                            </span>

                                            <input type="text" name="enrolment" class="form-control" id="enrolment" value="<?php if(isset($_POST['edit'])){ echo $roere['enrolment']; } ?>" placeholder="Enrolment No." required>

                                      </div>

                                    </div>

                                </div>

                                <div class="col-sm-2 col-md-2 col-xs-12">

                                    <div class="form-group">

                                        <label for="exampleInputPassword1">Exam Fee</label>

                                        <input type="text" name="Examfee" class="form-control" id="Examfee" value="<?php if(isset($_POST['edit'])){ echo $roere['Examfee']; } ?>" placeholder="Exam fee" readonly>

                                    </div>

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-sm-2 col-md-2 col-xs-12">

                                    <div class="form-group">

                                        <label for="exampleInputPassword1">Course Total Fee</label>

                                        <input type="text" name="CourseTotalFee" class="form-control" id="CourseTotalFee" value="<?php if(isset($_POST['edit'])){ echo $roere['CourseTotalFee']; }else{ echo $CourseTotalFee; } ?>" placeholder="Course Total Fee*" required readonly>

                                    </div>

                                </div>

                                <div class="col-sm-2 col-md-2 col-xs-12">

                                    <div class="form-group">

                                        <label for="exampleInputPassword1">After <?php echo $discountyouwill; ?>% Discount :</label>

                                        <input type="text" name="discountyouwill" class="form-control" id="discountyouwill" value="<?php if(isset($_POST['edit'])){ echo $roere['discountyouwill']; }else{ echo $discountyouwill; } ?>" placeholder="Course Total Fee*" required readonly>

                                    </div>

                                </div>

                                <div class="col-sm-2 col-md-2 col-xs-12">

                                    <div class="form-group">

                                        <label for="exampleInputPassword1">with 18% GST* Fee</label>

                                        <input type="hidden" name="TotalGst" id="TotalGst" value="<?php echo $TotalGst; ?>">

            							<input type="hidden" name="discount_fee" id="discount_fee" value="<?php echo $discount_fee; ?>">

            							<input type="text" name="totalfee" class="form-control" id="totalfee" value="<?php if(isset($_POST['edit'])){ echo $roere['totalfee']; }else{ echo $tttotal_fee; } ?>" placeholder="After Discount with 18% GST* Fee" required readonly>

                                    </div>

                                </div>

                                <div class="col-sm-2 col-md-2 col-xs-12">

                                    <div class="form-group">

                                        <label for="exampleInputPassword1">Submit Fee</label>

                                        <input type="text" name="submitfee" class="form-control" id="submitfee" value="<?php if(isset($_POST['edit'])){ echo $roere['submit_fee']; }else{ echo $first_payment_amount; } ?>" placeholder="Submit Fee" required readonly>

                                    </div>

                                </div>

                                <div class="col-sm-2 col-md-2 col-xs-12">

                                    <div class="form-group">

                                        <label for="exampleInputPassword1">Deu Fee</label>

                                        <input type="text" name="duefee" class="form-control" id="duefee" placeholder="Due Fee" value="<?php

            							if($tttotal_fee !=null &&  $first_payment_amount!=null){

                							$fetchdue = $tttotal_fee - $first_payment_amount;

                							echo $fetchdue;

            							}

            							if(isset($_POST['edit'])){ echo $roere['deu_fee']; }

            							?>" readonly>

                                    </div>

                                </div>

                                <div class="col-sm-2 col-md-2 col-xs-12">

                                    <div class="form-group">

                                        <label for="exampleInputPassword1">Lateral Entry</label>

                                        <input type="text" name="lateralentry" class="form-control" id="inlineRadio1" value="<?php if(isset($_POST['edit'])){ echo $roere['lateral_entry']; }else{ echo $lateral_entry; } ?>" style="margin: 0px 10px 0px 0px;">

                                    </div>

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-sm-3 col-md-3 col-xs-3">

                                    <div class="form-group">

                                        <label>Photo :</label>

                    				     <img src="images/<?php echo $student_image; ?>" name="student_image" alt="student image" style="width: 66px;height: 66px;">

                    				     <input type="text" name="student_image" class="form-control" value="<?php echo $student_image; ?>" style="margin: 0px 10px 0px 0px;display:none;">

                    				     <input type="text" name="student_signature" class="form-control" value="<?php echo $student_signature; ?>" style="margin: 0px 10px 0px 0px;display:none;">

                    				     <input type="text" name="adhar_card" class="form-control" value="<?php echo $adhar_card; ?>" style="margin: 0px 10px 0px 0px;display:none;">

                    				     <input type="text" name="marksheet" class="form-control" value="<?php echo $marksheet; ?>" style="margin: 0px 10px 0px 0px;display:none;">

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="box-footer">

                            <div class="row">

                                <div class="col-sm-9 col-md-9 col-xs-9"></div>

                                <div class="col-sm-3 col-md-3 col-xs-12">

                                    <div class="form-group">

                                        <input type="submit" value="submit" name="submit" class="btn btn-warning pull-right btn-block ButtonRadis">

                                    </div>

                                </div>

                            </div>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </section>

    <script>

        $("#slectcourse").change(function() {

            var data = $("#slectcourse").val();

            $.ajax({

                url: "new-registration-branch.php",

                type: 'post',

                data: {data:data},

                success: function(data){

                    $('#slectbranch').html(data);

                }

            });

        });

        $("#slectbranch").change(function(){

            var barnch = $("#slectbranch").val();

            if(barnch==="other"){

                $("#branchnameen").show();   

            }

        });

        

        $("#submitfee").keyup(function(){

            var totalfee = $('#totalfee').val();

            totalfee = parseInt(totalfee.replace(',',''));

            var submitfee = $('#submitfee').val();

            submitfee =parseInt(submitfee.replace(',',''));

            // $('h1').text( $('h1').text().replace(/\$/g, '€') );

            var remainfee = parseInt(totalfee) - parseInt(submitfee);

            $('#duefee').val(remainfee);

        });

        //$("#date").keyup(function(){

        function generateEnrol(){

            var min= 0

            var max = 0

            var joiningdate = $("#date").val();

            var Xmas = new Date(joiningdate);

            var year = Xmas.getFullYear();

            if(year==2000){

                min = 210;

                max = 3100;

            }

            if(year==2001){

                min = 3200;

                max = 4200;

            }

            if(year==2002){

                min = 5300;

                max = 6400;

            }

            if(year==2003){

                min = 6500;

                max = 7600;

            }

            if(year==2004){

                min = 7700;

                max = 8800;

            }

            if(year==2005){

                min = 8900;

                max = 10000;

            }

            if(year==2006){

                min = 10100;

                max = 11200;

            }

            if(year==2007){

                min = 12300;

                max = 13400;

            }

            if(year==2008){

                min = 14500;

                max = 16600;

            }

            if(year==2009){

                min = 17800;

                max = 18900;

            }

            if(year==2010){

                min = 19000;

                max = 20100;

            }

            if(year==2011){

                min = 21200;

                max = 22300;

            }

            if(year==2012){

                min = 23400;

                max = 24500;

            }

            if(year==2013){

                min = 25600;

                max = 26700;

            }

            if(year==2014){

                min = 27700;

                max = 28900;

            }

            if(year==2015){

                min = 29000;

                max = 30100;

            }

            if(year==2016){

                min = 30200;

                max = 31300;

            }

            if(year==2017){

                min = 32400;

                max = 33500;

            }

            if(year==2018){

                min = 34600;

                max = 35700;

            }

            if(year==2019){

                min = 36800;

                max = 37900;

            }

            if(year==2020){

                min = 39100;

                max = 40000;

            }

            if(year==2021){

                min = 41000;

                max = 42000;

            }

            if(year==2022){

                min = 43000;

                max = 44000;

            }

            var lasttwo =  year.toString().substr(-2);

            var first = "IM/";

            console.log(Math.floor(Math.random() * (max - min + 1) + min));

            var random = Math.floor(Math.random() * (max - min + 1) + min);

            var enrollment = first+random+"/"+lasttwo;

            $("#enrolment").val(enrollment);

        }

        //});

    </script>

</div>

<?php include("include/footer.php");?>

<?php }else {header("location: login.php");}?>