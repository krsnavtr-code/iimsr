<?php 
error_reporting(0);
include('checklogin.php');
include("dbconnection.php");
include("include/header.php");

require('distribute-configu.php');
require('razorpay-php/Razorpay.php');
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;
$success = true;
$error = "Payment Failed";

if (empty($_POST['razorpay_payment_id']) === false){
    $api = new Api($keyId, $keySecret);
    try {
        $attributes = array(
            'razorpay_order_id' => $_SESSION['razorpay_order_id'],
            'razorpay_payment_id' => $_POST['razorpay_payment_id'],
            'razorpay_signature' => $_POST['razorpay_signature']
        );
        $api->utility->verifyPaymentSignature($attributes);
    }
    catch(SignatureVerificationError $e){
        $success = false;
        $error = 'Razorpay Error : ' . $e->getMessage();
    }
}
if ($success === true){
    
    $nametitle = $_SESSION['nametitle'];
    $name = $_SESSION['name'];
    $name = $nametitle." ".$name;
    
    $mothertitle = $_SESSION['mothertitle'];
    $MotherName = $_SESSION['mothername'];
    $MotherName = $mothertitle." ".$MotherName;
    
    $fathertitle = $_SESSION['fathertitle'];
    $FatherName = $_SESSION['fathername'];
    $FatherName = $fathertitle." ".$FatherName;
    $Dob = $_SESSION['dob'];
    $MobileNo = $_SESSION['phone'];
    $email = $_SESSION['email'];
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
    $tota_withgst = $_SESSION['tota_withgst'];
    $Unique_id = $_SESSION['uniquecode'];
    $counselername = $_SESSION['counselername'];
    $lateralentry = $_SESSION['lateralentry'];
    
    $student_image = $_SESSION['student_image'];
    $student_signature = $_SESSION['student_signature'];
    $adhar_card = $_SESSION['adhar_card'];
    $marksheet = $_SESSION['marksheet'];

	$razorpay_order_id = $_SESSION['razorpay_order_id'];
	$razorpay_payment_id = $_POST['razorpay_payment_id'];
	$price = $_SESSION['price'];
	$email = $_SESSION['email'];

	$query = mysqli_query($con, "INSERT INTO `add_payment_records`(`name`, `father_name`, `date_of_birth`, `mother_name`, `mobile_no`, `email`, `address`, `unique_id`, `course`, `branch`, `semester`, `lateral_entry`, `session`, `discountyouwill`, `total_fee`, `discount_fee`, `TotalGst`, `CourseTotalFee`, `first_payment_amount`, `admission_counseler`, `marksheet`, `adhar_card`, `student_image`, `student_signature`, `order_id`, `razorpay_payment_id`, `price`, `status`) VALUES ('$name', '$FatherName', '$Dob', '$MotherName', '$MobileNo', '$email', '$PermanentAdd', '$Unique_id', '$CourseName', '$Branch', '$semester', '$lateralentry','$session', '$discountyouwill', '$tota_withgst', '$discount_fee', '$tax_gstfee', '$course_totalFee', '$price', '$counselername', '$marksheet', '$adhar_card', '$student_image', '$student_signature', '$razorpay_order_id', '$razorpay_payment_id', '$price', 'Success')");
    $html = "<h4 style='color:#fff'>Your payment was successful</4>
             <p style='color:#fff'>Dear : {$_SESSION['name']}</p>
             <p style='color:#fff'>Amount : {$_SESSION['price']}</p>
             <p style='color:#fff'>Order ID: {$_POST['razorpay_order_id']}</p>
             <p style='color:#fff'>Payment ID: {$_POST['razorpay_payment_id']}</p>";
}else{
    $html = "<p>Your payment failed</p><p style='color:#fff'>{$error}</p>";
}
?>
<body>
    <div class="page-heading header-text">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Payment</h1>
                    <span>We have over 20 years of experience in education field</span>
                </div>
            </div>
        </div>
    </div>
    <style>
        .left-border-pack {
            padding: 8px;
            border-left: 5px solid;
            margin-bottom: 10px !important;
            border-color: #247aae;
            color: #fff;
        }
        .SecurilyPayment{
            font-weight:700;
            color:#000;
            font-size: 18px !important;
            margin: -37px 0px -21px 10px !important;
        }
    </style>
    <div class="more-info about-info">
        <div class="contaner" style="margin-top: 28px;">
            <div class="row">
                <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2"></div>
                <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                    <div class="more-info-content">
                        <div class="section-heading">
                            <h4 class="left-border-pack SecurilyPayment">Payment<em></em></h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                            <div class="row p-3" style="margin-bottom:40px">
            				    <div class="col-sm-12 p-2" style="background:#286090;padding-bottom:25px;padding-bottom: 25px; padding-top: 15px;" align="center">
            				        <p style="color:#fff"><?php echo $html; ?></p>
            				    </div>
            				</div>
            			</div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2"></div>
            </div>
        </div>
    </div>
  <?php include("include/footer.php");?>