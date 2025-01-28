<?php
//error_reporting(0);
//include('checklogin.php');
include("dbconnection.php");
include("include/header.php");
//if($_SESSION['role']=="super-admin" || $_SESSION['role']=="distribute"){

?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Payment Status</h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Payment Status</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border"></div>
                    <?php
                        $nametitle = $_SESSION['nametitle'];
                        $name = $_SESSION['customerName'];
                        $customerName = $nametitle." ".$name;
                        $mothertitle = $_SESSION['mothertitle'];
                        $MotherName = $_SESSION['mothername'];
                        $MotherName = $mothertitle." ".$MotherName;
                        $fathertitle = $_SESSION['fathertitle'];
                        $FatherName = $_SESSION['fathername'];
                        $FatherName = $fathertitle." ".$FatherName;
                        $Dob = $_SESSION['dob'];
                        $customerPhone = $_SESSION['mobile'];
                        //echo $customerPhone;exit;
                        $customerEmail = $_SESSION['email'];
                        $PermanentAdd = $_SESSION['address'];
                        $CourseName = $_SESSION['course'];
                        $Branch = $_SESSION['branch'];
                        $semester = $_SESSION['semester'];
                        $semetserfeew = $_SESSION['semetserfeew'];
                        $session = $_SESSION['session'];
                        $course_totalFee = $_SESSION['course_totalFee'];
                        $discountyouwill = $_SESSION['discountyouwill'];
                        $discount_fee = $_SESSION['discount_fee'];
                        $tax_gstfee = $_SESSION['tax_gstfee'];
                        $tota_withgst = $_SESSION['tota_withgst'];;
                        $Unique_id = $_SESSION['uniquecode'];
                        $counselername = $_SESSION['counselername'];
                        $lateralentry = $_SESSION['lateralentry'];
                        
                        $passportphoto = $_FILES['student_image']['name'];
                        $passportphoto = $_SESSION['student_image'];
                        $temimag = $_FILES['student_image']['tmp_name'];
                        move_uploaded_file($temimag,'images/'.$passportphoto);
                        
                        $Signature = $_FILES['student_signature']['name'];
                        $Signature = $_SESSION['student_signature'];
                        $temimag = $_FILES['student_signature']['tmp_name'];
                        move_uploaded_file($temimag,'images/'.$Signature);
                        
                        $AdharCard = $_FILES['adhar_card']['name'];
                        $AdharCard = $_SESSION['adhar_card'];
                        $temimag = $_FILES['adhar_card']['tmp_name'];
                        move_uploaded_file($temimag,'images/'.$AdharCard);
                        
                        $MarksCard = $_FILES['marksheet']['name'];
                        $MarksCard = $_SESSION['marksheet'];
                        $temimag = $_FILES['marksheet']['tmp_name'];
                        move_uploaded_file($temimag,'images/'.$MarksCard);
                        
                        $secretKey = "1518fde101269cc44747ad1d39f99aa3c643a3bd";
                        $orderId = $_POST["orderId"];
                        $orderAmount = $_POST["orderAmount"];
                        $referenceId = $_POST["referenceId"];
                        $txStatus = $_POST["txStatus"];
                        $paymentMode = $_POST["paymentMode"];
                        $txMsg = $_POST["txMsg"];
                        $txTime = $_POST["txTime"];
                        $signature = $_POST["signature"];
                        $data = $orderId.$orderAmount.$referenceId.$txStatus.$paymentMode.$txMsg.$txTime;
                        $hash_hmac = hash_hmac('sha256', $data, $secretkey, true) ;
                        $computedSignature = base64_encode($hash_hmac);
                        if ($signature == $computedSignature) {
                        //if($txStatus == "SUCCESS"){
                            $query = mysqli_query($con, "INSERT INTO `new_admission`(`Uniqueid`, `name`, `Fathername`, `Dob`, `Mothername`, `Mobile`, `email`, `course`, `branch`, `semester`, `Lentry`, `session`, `discountyouwill`, `Totalfee`, `Discountfee`, `TotalGst`, `CourseTotalFee`, `Counselor`, `Photo`, `Sign`, `Adhar`, `Markscard`, `Address`, `orderId`, `orderAmount`, `referenceId`, `txStatus`, `Status`) VALUES 
                            ('$Unique_id', '$customerName', '$FatherName', '$Dob', '$MotherName', '$customerPhone', '$customerEmail', '$CourseName', '$Branch', '$semester', '$lateralentry', '$session', '$discountyouwill', '$tota_withgst', '$discount_fee', '$tax_gstfee', '$course_totalFee', '$counselername', '$passportphoto', '$Signature', '$AdharCard', '$MarksCard', '$PermanentAdd', '$orderId', '$orderAmount', '$referenceId', '$txStatus', 0)");
                            /*$query = mysqli_query($con, "INSERT INTO `add_payment_records`(`name`, `father_name`, `date_of_birth`, `mother_name`, `mobile_no`, `email`, `address`, `unique_id`, `course`, `branch`, `semester`, `lateral_entry`, `session`, `discountyouwill`, `total_fee`, `discount_fee`, `TotalGst`, `CourseTotalFee`, `first_payment_amount`, `admission_counseler`, `marksheet`, `adhar_card`, `student_image`, `student_signature`) VALUES ('$name', '$FatherName', '$Dob', '$MotherName', '$MobileNo', '$email', '$PermanentAdd', '$Unique_id', '$CourseName', '$Branch', '$semester', '$lateralentry','$session', '$discountyouwill', '$tota_withgst', '$discount_fee', '$tax_gstfee', '$course_totalFee', '$amount', '$counselername', '$MarksCard', '$AdharCard', '$passportphoto', '$Signature')");*/
                        $data = $_POST; 
                        ?>
                    <div class="row">
                        <div class="col-sm-2 col-md-2 col-lg-2 col-xs-12"></div>
                        <div class="col-sm-8 col-md-8 col-lg-8 col-xs-12">
                            <div class="row" style="margin-bottom:40px">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12 StatusPay" style="" align="center">
                                    <h4 style="color:#000;">Payment <?php echo $data['orderAmount']; ?> has been <?php echo $data['txStatus']; ?></h4>
                                    <p style="color:#000;">Your order id is : <?php echo $data['orderId']; ?></p>
                                    <p style="color:#000;">Reference id is : <?php echo $data['referenceId']; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2 col-md-2 col-lg-2 col-xs-12"></div>
                    </div>
                    <?php   
                	  	} else { ?>
                	    <div class="row">
                            <div class="col-sm-2 col-md-2 col-lg-2 col-xs-12"></div>
                            <div class="col-sm-8 col-md-8 col-lg-8 col-xs-12">
                                <div class="row" style="margin-bottom:40px">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12 StatusPay" style="" align="center">
                                        <h4 style="color:#000;">Payment <?php echo $data['orderAmount']; ?> has been <?php echo $data['txStatus']; ?></h4>
                                        <p style="color:#000;">Your order id is : <?php echo $data['orderId']; ?></p>
                                        <p style="color:#000;">Reference id is : <?php echo $data['referenceId']; ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2 col-md-2 col-lg-2 col-xs-12"></div>
                        </div>
                	<?php } ?>
                </div>
            </div>
        </div>
    </section>
</div>
<?php include("include/footer.php");?>
<?php //}else {header("location: login.php");}?>