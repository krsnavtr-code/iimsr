<?php
error_reporting(0);
include('checklogin.php');
include("dbconnection.php");
include("include/header.php");
require('distribute-configu.php');
require('razorpay-php/Razorpay.php');
//session_start();

use Razorpay\Api\Api;
$api = new Api($keyId, $keySecret);

$nametitle = $_POST['nametitle'];
$_SESSION['nametitle'] = $nametitle;
$name = $_POST['name'];
$_SESSION['name'] = $name;
$name = $nametitle." ".$name;

$mothertitle = $_POST['mothertitle'];
$_SESSION['mothertitle'] = $mothertitle;
$MotherName = $_POST['mothername'];
$_SESSION['mothername'] = $MotherName;
$MotherName = $mothertitle." ".$MotherName;

$fathertitle = $_POST['fathertitle'];
$_SESSION['fathertitle'] = $fathertitle;
$FatherName = $_POST['fathername'];
$_SESSION['fathername'] = $FatherName;
$FatherName = $fathertitle." ".$FatherName;

$Dob = $_POST['dob'];
$_SESSION['dob'] = $Dob;

$MobileNo = $_POST['phone'];
$_SESSION['phone'] = $MobileNo;

$email = $_POST['email'];
$_SESSION['email'] = $email;

$PermanentAdd = $_POST['address'];
$_SESSION['address'] = $PermanentAdd;

$CourseName = $_POST['course'];
$_SESSION['course'] = $CourseName;

$Branch = $_POST['branch'];
$_SESSION['branch'] = $Branch;

$semester = $_POST['semester'];
$_SESSION['semester'] = $semester;

$semetserfeew = $_POST['semetserfeew'];
$_SESSION['semetserfeew'] = $semetserfeew;

$session = $_POST['session'];
$_SESSION['session'] = $session;

$course_totalFee = $_POST['course_totalFee'];
$_SESSION['course_totalFee'] = $course_totalFee;

$discountyouwill = $_POST['discountyouwill'];
$_SESSION['discountyouwill'] = $discountyouwill;

$discount_fee = $_POST['discount_fee'];
$_SESSION['discount_fee'] = $discount_fee;

$tax_gstfee = $_POST['tax_gstfee'];
$_SESSION['tax_gstfee'] = $tax_gstfee;

$tota_withgst = $_POST['tota_withgst'];
$_SESSION['tota_withgst'] = $tota_withgst;

$Unique_id = $_POST['uniquecode'];
$_SESSION['uniquecode'] = $Unique_id;

$counselername = $_POST['counselername'];
$_SESSION['counselername'] = $counselername;
$lateralentry = $_POST['lateralentry'];
$_SESSION['lateralentry'] = $lateralentry;

$passportphoto = $_FILES['student_image']['name'];
$_SESSION['student_image'] = $passportphoto;
$temimag = $_FILES['student_image']['tmp_name'];
move_uploaded_file($temimag,'admin-123/images/'.$passportphoto);

$Signature = $_FILES['student_signature']['name'];
$_SESSION['student_signature'] = $Signature;
$temimag = $_FILES['student_signature']['tmp_name'];
move_uploaded_file($temimag,'admin-123/images/'.$Signature);

$AdharCard = $_FILES['adhar_card']['name'];
$_SESSION['adhar_card'] = $AdharCard;
$temimag = $_FILES['adhar_card']['tmp_name'];
move_uploaded_file($temimag,'admin-123/images/'.$AdharCard);

$MarksCard = $_FILES['marksheet']['name'];
$_SESSION['marksheet'] = $MarksCard;
$temimag = $_FILES['marksheet']['tmp_name'];
move_uploaded_file($temimag,'admin-123/images/'.$MarksCard);

$price = $_POST['price'];
$_SESSION['price'] = $price;

$orderData = [
    'receipt'         => 3456,
    'amount'          => $price * 100,
    'currency'        => 'INR',
    'payment_capture' => 1 
];
$razorpayOrder = $api->order->create($orderData);
$razorpayOrderId = $razorpayOrder['id'];
$_SESSION['razorpay_order_id'] = $razorpayOrderId;
$displayAmount = $amount = $orderData['amount'];

if ($displayCurrency !== 'INR'){
    $url = "https://api.fixer.io/latest?symbols=$displayCurrency&base=INR";
    $exchange = json_decode(file_get_contents($url), true);
    $displayAmount = $exchange['rates'][$displayCurrency] * $amount / 100;
}

$data = [
    "key"               => $keyId,
    "amount"            => $amount,
    "name"              => "Imperial Institute of Management Science & Research",
    "description"       => "Focus On Comprehensive Learning",
    "image"             => "https://iimsr.net.in/razorpay-logo.png",
    "prefill"           => [
        "name"              => $name,
        "mothername"        => $MotherName,
        "fathername"        => $FatherName,
        "dob"               => $Dob,
        "phone"             => $MobileNo,
        "email"             => $email,
        "address"      => $PermanentAdd,
        "course"        => $CourseName,
        "branch"         => $Branch,
        "semester"        => $semester,
        "semetserfeew"        => $semetserfeew,
        "session"           => $Session,
        "course_totalFee"             => $course_totalFee,
        "discountyouwill"           => $discountyouwill,
        "discount_fee"        => $discount_fee,
        "tax_gstfee"     => $tax_gstfee,
        "tota_withgst"         => $tota_withgst,
        "fpaydetails"         => $fpaydetails,
        "modeofpayment"         => $modeofpayment,
        "uniquecode"         => $Unique_id,
        "counselername"         => $counselername,
        "lateralentry"         => $lateralentry,
        "student_image"         => $passportphoto,
        "student_signature"         => $Signature,
        "adhar_card"         => $AdharCard,
        "marksheet"         => $MarksCard,
        
    ],
    "notes"             => [
        "address"           => "iimsr",
        "merchant_order_id" => "12312321",
    ],
    "theme"             => [
        "color"             => "#F37254"
    ],
    "order_id"          => $razorpayOrderId,
];
//print_r($data);echo $data; exit;
if ($displayCurrency !== 'INR'){
    $data['display_currency']  = $displayCurrency;
    $data['display_amount']    = $displayAmount;
}
$json = json_encode($data);
?>
<div class="page-heading header-text">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Admission Form</h1>
                <span>We have over 20 years of experience in education field</span>
            </div>
        </div>
    </div>
</div>
<center>
<form action="distribute-verify.php" method="POST">
    <script
        src="https://checkout.razorpay.com/v1/checkout.js"
        data-key="<?php echo $data['key']?>"
        data-amount="<?php echo $data['amount']?>"
        data-currency="INR"
        data-image="<?php echo $data['image']?>"
        data-description="<?php echo $data['description']?>"
        data-prefill.name="<?php echo $data['prefill']['name']?>"
        data-prefill.mothername="<?php echo $data['prefill']['mothername']?>"
        data-prefill.fathername="<?php echo $data['prefill']['fathername']?>"
        data-prefill.dob="<?php echo $data['prefill']['dob']?>"
        data-prefill.phone="<?php echo $data['prefill']['phone']?>"
        data-prefill.email="<?php echo $data['prefill']['email']?>"
        data-prefill.address="<?php echo $data['prefill']['address']?>"
        data-prefill.course="<?php echo $data['prefill']['course']?>"
        data-prefill.branch="<?php echo $data['prefill']['branch']?>"
        data-prefill.semester="<?php echo $data['prefill']['semester']?>"
        data-prefill.semetserfeew="<?php echo $data['prefill']['semetserfeew']?>"
        data-prefill.session="<?php echo $data['prefill']['session']?>"
        data-prefill.course_totalFee="<?php echo $data['prefill']['course_totalFee']?>"
        data-prefill.discountyouwill="<?php echo $data['prefill']['discountyouwill']?>"
        data-prefill.discount_fee="<?php echo $data['prefill']['discount_fee']?>"
        data-prefill.tax_gstfee="<?php echo $data['prefill']['tax_gstfee']?>"
        data-prefill.tota_withgst="<?php echo $data['prefill']['tota_withgst']?>"
        data-prefill.uniquecode="<?php echo $data['prefill']['uniquecode']?>"
        data-prefill.counselername="<?php echo $data['prefill']['counselername']?>"
        data-prefill.lateralentry="<?php echo $data['prefill']['lateralentry']?>"
        data-prefill.student_image="<?php echo $data['prefill']['student_image']?>"
        data-prefill.student_signature="<?php echo $data['prefill']['student_signature']?>"
        data-prefill.adhar_card="<?php echo $data['prefill']['adhar_card']?>"
        data-prefill.marksheet="<?php echo $data['prefill']['marksheet']?>"
        data-notes.shopping_order_id="<?php echo $data['order_id']?>"
        data-order_id="<?php echo $data['order_id']?>"
        <?php if ($displayCurrency !== 'INR') { ?> data-display_amount="<?php echo $data['display_amount']?>" <?php } ?>
        <?php if ($displayCurrency !== 'INR') { ?> data-display_currency="<?php echo $data['display_currency']?>" <?php } ?>
        >
    </script>
    <!-- Any extra fields to be submitted with the form but not sent to Razorpay -->
    <input type="hidden" name="shopping_order_id" value="<?php echo $data['order_id']?>">
</form></center>
<style>
    .razorpay-payment-button{
        margin: 20px 0px 20px 0px;
        padding: 5px 20px 5px 20px;
        border-radius: 0px;
    }
</style>
<?php include("include/footer.php");?>
