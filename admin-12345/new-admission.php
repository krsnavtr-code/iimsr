<?php

error_reporting(0);

include('checklogin.php');

include("dbconnection.php");

include("include/header.php");

if($_SESSION['role']=="docs-verification" || $_SESSION['role']=="super-admin"){

    

if(isset($_POST['newadmission'])){

    $title = $_POST['nametitle'];

	$name =strtoupper($_POST['name']);

	$name = $title." ".$name;

    $ftitle = $_POST['fathertitle'];

	$fathername =strtoupper($_POST['fathername']);

	$fathername = $ftitle." ".$fathername;

    $dob = $_POST['dob'];

    $mtitle = $_POST['mothertitle'];

	$mothername =strtoupper($_POST['mothername']);

	$mothername = $mtitle." ".$mothername;

    $mobile = $_POST['mobile'];

    $email = $_POST['email'];

    $address = strtoupper($_POST['address']);

    $vbimttuniquecode = $_POST['vbimttuniquecode'];

    $course = $_POST['course'];

    $branch = $_POST['branch'];

    $semester = $_POST['semester'];

    $lateral_entry = $_POST['lateralentry'];

    $session = $_POST['session'];

    

    $discountyouwill = $_POST['discountyouwill'];

    $Examfee = $_POST['semetserfeew'];

    

    $CourseTotalFee = $_POST['course_totalFee'];

    $discount_fee = $_POST['discount_fee'];

    

    $tax_gstfee = $_POST['tax_gstfee'];

    $tota_withgst = $_POST['tota_withgst'];

    

    $fpayamount = $_POST['fpayamount'];

    $fee = $_POST['tot_amount'];

    $tax = $_POST['tot_tax'];

    $fpaydetails = $_POST['fpaydetails'];

    $modeofpayment = $_POST['modeofpayment'];

    $currenttimedate = date('Y-m-d H:i:s');

    $enrollid = $_POST['enrollid'];

    $nameofcounseler = strtoupper($_POST['nameofcounseler']);

    

    $marksheet = $_FILES['marksheet']['name'];

    $temimag = $_FILES['marksheet']['tmp_name'];

    move_uploaded_file($temimag,'images/'.$marksheet);

    

    $PaymentSlip = $_FILES['PaymentSlip']['name'];

    $temimag = $_FILES['PaymentSlip']['tmp_name'];

    move_uploaded_file($temimag,'PaymentSlip/'.$PaymentSlip);

    

    $adhar_card = $_FILES['adhar_card']['name'];

    $temimag = $_FILES['adhar_card']['tmp_name'];

    move_uploaded_file($temimag,'images/'.$adhar_card);

    

    $student_image = $_FILES['student_image']['name'];

    $temimag = $_FILES['student_image']['tmp_name'];

    move_uploaded_file($temimag,'images/'.$student_image);

    

    $student_signature = $_FILES['student_signature']['name'];

    $temimag = $_FILES['student_signature']['tmp_name'];

    move_uploaded_file($temimag,'images/'.$student_signature);

    

    $finalverify = $_FILES['finalverify']['name'];

    $temimag = $_FILES['finalverify']['tmp_name'];

    move_uploaded_file($temimag,'images/'.$finalverify);

    

    if(!empty($_POST['enrollid'])){

        $query = mysqli_query($con, "UPDATE `add_payment_records` SET `name`='$name',`father_name`='$fathername',`date_of_birth`='$dob',`mother_name`='$mothername',`mobile_no`='$mobile',`email`='$email',`address`='$address',`unique_id`='$vbimttuniquecode',`course`='$course',`branch`='$branch',`semester`='$semester', `lateral_entry`='$lateral_entry', `session`='$session',`total_fee`='$CourseTotalFee', `discount_fee`='$discount_fee', `first_payment_amount`='$fpayamount',`fee`='$fee',`tax`='$tax',`first_payment_details`='$fpaydetails',`mode_of_payment`='$modeofpayment',`admission_counseler`='$nameofcounseler',`marksheet`='$marksheet',`adhar_card`='$adhar_card',`student_image`='$student_image',`student_signature`='$student_signature' WHERE `id`='$enrollid'");

    }else{

        $quy =  mysqli_query($con, "SELECT * FROM `add_payment_records` WHERE `unique_id`='$vbimttuniquecode'");

	    $numrows = mysqli_num_rows($quy);

        if($numrows==0){

            $query = mysqli_query($con,"INSERT INTO `add_payment_records`(`name`, `father_name`, `date_of_birth`, `mother_name`, `mobile_no`, `email`, `address`, `unique_id`, 

            `course`, `branch`, `semester`, `lateral_entry`, `session`, `discountyouwill`, `total_fee`, `discount_fee`, `TotalGst`, `CourseTotalFee`, `Examfee`, `first_payment_amount`, `fee`, `tax`, `first_payment_details`, `mode_of_payment`, `admission_counseler`, `marksheet` ,`adhar_card`, `student_image`, `student_signature`, `finalverify`, `PaymentSlip`, `current_add`) VALUE 

            ('$name', '$fathername', '$dob', '$mothername', '$mobile', '$email', '$address', '$vbimttuniquecode', '$course', '$branch','$semester', '$lateral_entry', 

            '$session', '$discountyouwill', '$tota_withgst', '$discount_fee', '$tax_gstfee', '$CourseTotalFee', '$Examfee', '$fpayamount', '$fee', '$tax', '$fpaydetails', '$modeofpayment', '$nameofcounseler', '$marksheet', '$adhar_card', '$student_image', '$student_signature', '$finalverify', '$PaymentSlip', '$currenttimedate')");

        }

    }

    if($query){

		$success = "<p class='OperationHas'>Thank You...! New Admission has been Submit Successfully</p>";

	}else{

		$success = "<p class='AlreadyRegistered'>Ooops...! Please Insert different Unique Id.</p>";

	}

}

?>

<?php

    if(isset($_POST['edit'])){

        $unique_id = $_POST['unique_id'];

        $resultt = mysqli_query($con,"SELECT * FROM `add_payment_records` WHERE `unique_id`='$unique_id'");

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

        $fathername = $roere['father_name'];

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

        $mothername = $roere['mother_name'];

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

            <?php if($_SESSION['role']=="docs-verification" || $_SESSION['role']=="super-admin"){ ?>

                <i class="fa fa-arrow-circle-right" aria-hidden="true"></i> <a href="new-admission.php">Upload New Admission</a>

            <?php } ?>

            <?php if($_SESSION['role']=="super-admin"){ ?>

                <i class="fa fa-arrow-circle-right" aria-hidden="true"></i> <a href="view-new-admission.php">View New Admission</a>

            <?php } ?>

        </h1>

        <ol class="breadcrumb">

            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>

            <li class="active">New Admission</li>

        </ol>

    </section>

    <section class="content">

        <div class="row">

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                <div class="box box-primary">

                    <?php

    					if (isset($_POST['newadmission'])){

    						echo $success;

    					}else {

    						echo $success;

    					}

    				?>

                    <div class="box-header with-border"></div>

                    <form action="" method="post" role="form" enctype="multipart/form-data">

                        <div class="box-body">

                            <div class="row">

                                <div class="col-sm-1 col-md-1 col-xs-3">

                                    <div class="form-group">

                                        <label for="exampleInputEmail1">Title</label>

                                        <select name="nametitle" class="form-control select2" style="width: 100%;" id="title" required>

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

                                        <input type="hidden" name="enrollid" class="form-control" value="<?php if(isset($_POST['edit'])){ echo $roere['id']; } ?>">

                                        <input type="text" class="form-control" name="name" value="<?php if(isset($_POST['edit'])){ echo $fullcname; }?>" placeholder="Name" required>

                                    </div>

                                </div>

                                <div class="col-sm-1 col-md-1 col-xs-3">

                                    <div class="form-group">

                                        <label for="exampleInputEmail1">Title</label>

                                        <select name="fathertitle" class="form-control select2" style="width: 100%;" id="title" required>

                                            <?php if(isset($_POST['edit'])){ ?> 

                						        <option value="<?php echo $faththernametitle; ?>" selected><?php  if(isset($_POST['edit'])){  echo $faththernametitle; } ?></option>

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

                                        <input type="text" class="form-control" name="fathername" value="<?php if(isset($_POST['edit'])){ echo $fathrefullcname; }?>" placeholder="Father's Name" required>

                                    </div>

                                </div>

                                <div class="col-sm-1 col-md-1 col-xs-3">

                                    <div class="form-group">

                                        <label for="exampleInputEmail1">Title</label>

                                        <select name="mothertitle" class="form-control select2" id="title" required>

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

                                        <input type="text" class="form-control" name="mothername" style="border: #2037bf61 1px solid;" value="<?php if(isset($_POST['edit'])){ echo $motherfullcname; } ?>" placeholder="Mother's Name" required>

                                    </div>

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-sm-2 col-md-2 col-xs-6">

                                    <div class="form-group">

                                        <label for="exampleInputPassword1">Date Of Birth</label>

                                        <input name=dob size=10 maxlength=10  onkeyup="this.value=this.value.replace(/^(\d\d)(\d)$/g,'$1/$2').replace(/^(\d\d\/\d\d)(\d+)$/g,'$1/$2').replace(/[^\d\/]/g,'')" class="form-control date-format" value="<?php  if(isset($_POST['edit'])){  echo $roere['date_of_birth']; }?>" placeholder="Date Of Birth" required>

                                    </div>

                                </div>

                                <div class="col-sm-2 col-md-2 col-xs-6">

                                    <div class="form-group">

                                        <label for="exampleInputPassword1">Mobile</label>

                                        <input type="text" maxlength="10" class="form-control" id="phone" pattern="\d{10}" value="<?php  if(isset($_POST['edit'])){ echo $roere['mobile_no']; } ?>" name="mobile" title="Please enter exactly 10 digits" placeholder="Phone Number" required>

                                    </div>

                                </div>

                                <div class="col-sm-3 col-md-3 col-xs-12">

                                    <div class="form-group">

                                        <label for="exampleInputPassword1">Email</label>

                                        <input type="email" class="form-control" name="email" value="<?php  if(isset($_POST['edit'])){  echo $roere['email'];} ?>" placeholder="E-mail" required>

                                    </div>

                                </div>

                                <div class="col-sm-5 col-md-5 col-xs-12">

                                    <div class="form-group">

                                        <label for="exampleInputPassword1">Parmanent Address</label>

                                        <input type="text" class="form-control" name="address" value="<?php  if(isset($_POST['edit'])){  echo $roere['address'];} ?>" placeholder="Address" required>

                                    </div>

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-sm-6 col-md-6 col-xs-12">

                                    <div class="form-group">

                                        <label for="exampleInputPassword1">Course</label>

                                        <select name="course" class="form-control select2" required onkeyup="mycalculatenumber()" id="slectcourse" style="width: 100%;" required>

                                            <?php if(isset($_POST['edit'])){ ?>

                						       <option value="<?php echo $roere['course']; ?>"><?php  if(isset($_POST['edit'])){  echo $roere['course']; } ?></option> 

                						    <?php }else{ ?>

                						       <option value="" disable>-Select Course-</option>

                						    <?php } ?>

                                            <?php $querycourse = mysqli_query($con,'SELECT * FROM `course` ORDER BY `course`'); ?>

                                            <?php

                                                $array = array();

                                                while($coursrow=mysqli_fetch_array($querycourse)){ 

                                                    if(!in_array($coursrow['course'], $array)){

                                                        $array[] = $coursrow['course'];  

                                                    } 

                                                }

                                                foreach($array as $dataa){ 

                                            ?>

                						    <option value="<?php echo $dataa; ?>"><?php echo $dataa; ?></option>

                						   <?php } ?>
                                           <option value="Other"> Other </option>

                                        </select>

                                    </div>

                                </div>

                                <div class="col-sm-3 col-md-3 col-xs-12">

                                    <div class="form-group">

                                        <label for="exampleInputPassword1">Branch</label>

                                        <select name="branch" class="form-control select2" id="slectbranch" style="width: 100%;" required>

                                            <?php if(isset($_POST['edit'])){ ?>

                                                <option value="<?php echo $roere['branch']; ?>"><?php echo $roere['branch']; ?></option> 

                                            <?php }else{ ?>

                                                <option value="" disable hidden>-Select branch-</option> 

                                            <?php } ?>

                                            <?php if($braannch!=null){ ?>

                                                <option selected="selected"><?php echo $braannch; ?></option>

                                            <?php } ?>

                                        </select>

                                    </div>

                                </div>

                                <div class="col-sm-3 col-md-3 col-xs-12">

                                    <div class="form-group">

                                        <label for="exampleInputPassword1">Semester</label>

                                        <select name="semester" onchange="Semesterget(event)" class="form-control select2" style="width: 100%;">

                                            <?php if(isset($_POST['edit'])){ ?>

                                                <option value="<?php echo $roere['semester']; ?>"><?php echo $roere['semester']; ?></option> 

                                            <?php }else{ ?>

                                                <option value="" style="font-size:10px;" disable hidden>-Select Semester-</option> 

                                            <?php } ?>

                                            <option value="1">1</option>

                                            <option value="2">2</option>

                                            <option value="3">3</option>

                                            <option value="4">4</option>

                                            <option value="5">5</option>

                                            <option value="6">6</option>

                                            <option value="7">7</option>

                                            <option value="8">8</option>

                                        </select>

                                    </div>

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-sm-4 col-md-4 col-xs-6">

                                    <div class="form-group">

                                        <label for="exampleInputPassword1">Semester Fee</label>

                                        <input type="text" class="form-control" id="semetserfeew" name="semetserfeew" value="<?php if(isset($_POST['edit'])){ echo $roere['semetserfee']; } ?>" placeholder="Semetser Fee" readonly required>

                                    </div>

                                </div>

                                <div class="col-sm-3 col-md-3 col-xs-6">

                                    <div class="form-group">

                                        <label for="exampleInputPassword1">Session</label>

                                        <input type="text" class="form-control" name="session" value="<?php if(isset($_POST['edit'])){ echo $roere['session']; } ?>" placeholder="Session" required>

                                    </div>

                                </div>

                                <div class="col-sm-3 col-md-3 col-xs-12">

                                    <div class="form-group">

                                        <label for="exampleInputPassword1">Enrolment No.</label>

                                        <select name="discountyouwill" onchange="getComboA(this)" id="discountyouwill" class="form-control select2" style="width: 100%;">

                                            <option value="" disable>-Select Discount-</option>

                							<option value="0.50">50% Discount</option>

                							<option value="0.45">45% Discount</option>

                							<option value="0.40">40% Discount</option>

                							<option value="0.35">35% Discount</option>

                							<option value="0.30">30% Discount</option>

                							<option value="0.25">25% Discount</option>

                							<option value="0.20">20% Discount</option>

                							<option value="0.15">15% Discount</option>

                							<option value="0.10">10% Discount</option>

                							<option value="0.05">5% Discount</option>

                							<option value="0">0% Discount</option>

                                        </select>

                                    </div>

                                </div>

                                <div class="col-sm-2 col-md-2 col-xs-12">

                                    <div class="form-group">

                                        <label for="exampleInputPassword1">Course Total Fee</label>

                                        <input type="text" class="form-control" id="course_totalFee" name="course_totalFee" value="<?php if(isset($_POST['edit'])){ echo $roere['total_fee']; } ?>" placeholder="Total Payment" required>

                                    </div>

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-sm-2 col-md-2 col-xs-12">

                                    <div class="form-group">

                                        <label for="exampleInputPassword1">After Discount Fee</label>

                                        <input type="text" class="form-control" id="discount_fee" name="discount_fee" value="<?php if(isset($_POST['edit'])){ echo $roere['discount_fee']; } ?>" placeholder="After Discount Fee" readonly required>

                                    </div>

                                </div>

                                <div class="col-sm-2 col-md-2 col-xs-12">

                                    <div class="form-group">

                                        <label for="exampleInputPassword1">18% GST* Fee </label>

                                        <input type="text" class="form-control" id="tax_gstfee" name="tax_gstfee" value="<?php if(isset($_POST['edit'])){ echo $roere['with_gstfee']; } ?>" placeholder="Total Payable fee with GST*" readonly required>

                                    </div>

                                </div>

                                <div class="col-sm-2 col-md-2 col-xs-12">

                                    <div class="form-group">

                                        <label for="exampleInputPassword1">Total Fee With 18% GST*</label>

                                        <input type="text" class="form-control" id="tota_withgst" name="tota_withgst" value="<?php  if(isset($_POST['edit'])){ echo $roere['with_gstfee']; } ?>" placeholder="Total Payable fee with GST*" readonly required>

                                    </div>

                                </div>

                                <div class="col-sm-2 col-md-2 col-xs-12">

                                    <div class="form-group">

                                        <label for="exampleInputPassword1">First Payment</label>

                                        <input type="text" class="form-control" id="fpayamount" name="fpayamount" value="<?php  if(isset($_POST['edit'])){  echo $roere['first_payment_amount']; }?>" placeholder="First Payment" required>

                                    </div>

                                </div>

                                <div class="col-sm-2 col-md-2 col-xs-12">

                                    <div class="form-group">

                                        <label for="exampleInputPassword1">Transaction Id*</label>

                                        <input type="text" class="form-control" name="fpaydetails" value="<?php  if(isset($_POST['edit'])){  echo $roere['first_payment_details']; } ?>" placeholder="Transaction Id*" required>

                                    </div>

                                </div>

                                <div class="col-sm-2 col-md-2 col-xs-12">

                                    <div class="form-group">

                                        <label for="exampleInputPassword1">Mode Of Payment</label>

                                        <select name="modeofpayment" id="modeofpayment" class="form-control select2" style="width: 100%;">

                                            <option value="" disable>-Select Mode of Payment-</option>

                							<option value="Google Pay">Google Pay</option>

                							<option value="Phone Pay">Phone Pe</option>

                							<option value="Paytm">Paytm</option>

                							<option value="QR Code">QR Code</option>

                							<option value="Gateway">Gateway Payment</option>

                							<option value="IDFC AC">IDFC AC</option>

                							<option value="ICICI AC">ICICI AC</option>

                							<option value="SBI AC">SBI AC</option>

                							<option value="HDFC AC">HDFC AC</option>

                							<option value="BOB AC">BOB AC</option>

                							<option value="BOI AC">BOI AC</option>

                							<option value="Cash Deposit">Cash Deposit</option>

                                        </select>

                                    </div>

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-sm-3 col-md-3 col-xs-6">

                                    <div class="form-group">

                                        <label for="exampleInputPassword1">Marksheet</label>

                                        <input type="file" name="marksheet" class="form-control" value="<?php if(isset($_POST['edit'])){ echo $roere['marksheet']; } ?>" style="margin: 0px 10px 0px 0px;">

                                    </div>

                                </div>

                                <div class="col-sm-3 col-md-3 col-xs-6">

                                    <div class="form-group">

                                        <label for="exampleInputPassword1">Adhar card</label>

                                        <input type="file" name="adhar_card" class="form-control" value="<?php if(isset($_POST['edit'])){ echo $roere['adhar_card']; } ?>" style="margin: 0px 10px 0px 0px;">

                                    </div>

                                </div>

                                <div class="col-sm-3 col-md-3 col-xs-6">

                                    <div class="form-group">

                                        <label for="exampleInputPassword1">Passport Photo</label>

                                        <input type="file" name="student_image" class="form-control" value="<?php if(isset($_POST['edit'])){ echo $roere['student_image']; } ?>" style="margin: 0px 10px 0px 0px;">

                                    </div>

                                </div>

                                <div class="col-sm-3 col-md-3 col-xs-6">

                                    <div class="form-group">

                                        <label for="exampleInputPassword1">Signature</label>

                                        <input type="file" name="student_signature" class="form-control" value="<?php if(isset($_POST['edit'])){ echo $roere['student_signature']; } ?>" style="margin: 0px 10px 0px 0px;">

                                    </div>

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-sm-3 col-md-3 col-xs-6">

                                    <div class="form-group">

                                        <label for="exampleInputPassword1">Final Verify</label>

                                        <input type="file" name="finalverify" class="form-control" value="<?php if(isset($_POST['edit'])){ echo $roere['finalverify']; } ?>" style="margin: 0px 10px 0px 0px;">

                                    </div>

                                </div>

                                <div class="col-sm-3 col-md-3 col-xs-6">

                                    <div class="form-group">

                                        <label for="exampleInputPassword1">Payment Slip</label>

                                        <input type="file" name="PaymentSlip" class="form-control" value="<?php if(isset($_POST['edit'])){ echo $roere['PaymentSlip']; } ?>" style="margin: 0px 10px 0px 0px;">

                                    </div>

                                </div>

                                <div class="col-sm-3 col-md-3 col-xs-6">

                                    <div class="form-group">

                                        <label for="exampleInputPassword1">UId Number</label>

                                        <input type="text" name="vbimttuniquecode" class="form-control" placeholder="Unique Number" value="<?php if(isset($_POST['edit'])){  echo $roere['unique_id']; } ?>" required>

                                    </div>

                                </div>

                                <div class="col-sm-3 col-md-3 col-xs-6">

                                    <div class="form-group">

                                        <label for="exampleInputPassword1">Counseler Name</label>

                                        <select class="form-control select2" name="nameofcounseler" id="nameofcounseler" style="width: 100%;" required>

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

                                        </select>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="box-footer">

                            <div class="row">

                                <div class="col-sm-4 col-md-4 col-xs-6">

                                    <div class="nput-group">

                                        <span class="input-group-addon">

                                            <label for="exampleInputPassword1">For GST*</label>

                                            <input type="checkbox" name="formButton" id="formButton">

                                        </span>

                                    </div>

                                </div>

                                <div class="col-sm-4 col-md-4 col-xs-6">

                                    <div class="nput-group">

                                        <span class="input-group-addon">

                                            <label for="exampleInputPassword1">Lateral entry</label>

                                            <input type="checkbox" name="lateralentry" id="inlineRadio1" value="Lateral Entry">

                                        </span>

                                    </div>

                                </div>

                                <div class="col-sm-4 col-md-4 col-xs-12">

                                    <div class="form-group">

                                        <input type="submit" value="submit" name="newadmission" class="btn btn-warning pull-right btn-block ButtonRadis">

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

		$(document).ready(function() {

            $('#fpayamount').keyup(function(ev) {

                var total = $('#fpayamount').val() * 1;

                var tot_price = total - (total * 0.18);

                var tot_tax = 1 * 0.18;

				var tttpp = total-tot_price;

                var divobj = document.getElementById('tot_amount');

                var tot_tax = document.getElementById('tot_tax');

                divobj.value = tot_price;

                tot_tax.value = tttpp;

            });

        });

	</script>

	<script>

		$(document).ready(function() {

			$("#formButton").click(function() {

				var formButton = $('#formButton').val()

				$.ajax({

					type: "post",

					url: "new-admission-ajax.php",

					data: {formButton:formButton},

					success: function(data){

						$('#formfiled').html(data);

					}

				});

			});

		});

	</script>

    <script>

        $("#slectcourse").change(function() {

            var data = $("#slectcourse").val();

            $.ajax({

                url: "new-admission-branch.php",

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

    </script>

    <script>

        function Semesterget(event) {

            if (event.target.value === "1") {

                document.getElementById("semetserfeew").value = 1000;

            } else if (event.target.value === "2") {

                document.getElementById("semetserfeew").value = 2000;

            } else if (event.target.value === "3") {

                document.getElementById("semetserfeew").value = 3000;

            }else if (event.target.value === "4") {

                document.getElementById("semetserfeew").value = 4000;

            }else if (event.target.value === "5") {

                document.getElementById("semetserfeew").value = 5000;

            }else if (event.target.value === "6") {

                document.getElementById("semetserfeew").value = 6000;

            }else if (event.target.value === "7") {

                document.getElementById("semetserfeew").value = 7000;

            }else if (event.target.value === "8") {

                document.getElementById("semetserfeew").value = 8000;

            }

        };

    </script>

    <script>

        function getComboA(selectObject){

        	var gate = $('#discountyouwill').val();

        	$("#discountyouwill").click(function() {

        		var discountyouwill = $('#discountyouwill').val()

        		$(document).ready(function() {

                    $('#course_totalFee').keyup(function(ev) {

                    var total = $('#course_totalFee').val() * 1;

                    var tot_price = total - (total * gate);

                    var tot_tax = 0.18 * 1;

    				var tttpp = tot_tax * tot_price;

    				var tttp = tttpp + tot_price;

                    var divobj = document.getElementById('discount_fee');

                    var withgst = document.getElementById('tota_withgst');

                    var tot_tax = document.getElementById('tax_gstfee');

                        divobj.value = tot_price;

                        tot_tax.value = tttpp;

                        withgst.value = tttp;

                    });

                });

        	});

        }

    </script>

</div>

<style>

    .form-group {

        margin-bottom: 0px;

    }

</style>

<?php include("include/footer.php");?>

<?php }else {header("location: login.php");}?>