<?php
/*include('api.php');*/
//error_reporting(0);
include('checklogin.php');
include("dbconnection.php");


$nametitle = $_POST['nametitle'];
$_SESSION['nametitle'] = $nametitle;
$name = $_POST['name'];
$_SESSION['name'] = $name;

$customerName = $nametitle." ".$name;
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
$customerPhone = $_POST['mobile'];
$_SESSION['mobile'] = $customerPhone;
$customerEmail = $_POST['email'];
$_SESSION['email'] = $customerEmail;
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
move_uploaded_file($temimag,'images/'.$passportphoto);

$Signature = $_FILES['student_signature']['name'];
$_SESSION['student_image'] = $Signature;
$temimag = $_FILES['student_signature']['tmp_name'];
move_uploaded_file($temimag,'images/'.$Signature);

$AdharCard = $_FILES['adhar_card']['name'];
$_SESSION['student_image'] = $AdharCard;
$temimag = $_FILES['adhar_card']['tmp_name'];
move_uploaded_file($temimag,'images/'.$AdharCard);

$MarksCard = $_FILES['marksheet']['name'];
$_SESSION['marksheet'] = $MarksCard;
$temimag = $_FILES['marksheet']['tmp_name'];
move_uploaded_file($temimag,'images/'.$MarksCard);

$orderAmount = $_POST['price'];
$today = date("Ymd");
$rand = strtoupper(substr(uniqid(sha1(time())),0,4));
$orderId = $today . $rand;
?>
<body onload="document.frm1.submit()">
<?php
$mode = "PROD"; //<------------ Change to TEST for test server Test-->
//api key live - 344347e52f013c18fb9f7a88043443
//Secret key live - 991d122f6c7267c2428eafa7cdeb8272e27c00d9

//api key test - 10834f444929e2ee49185eb9d43801
//Secret key test - 1518fde101269cc44747ad1d39f99aa3c643a3bd

$secretKey = "991d122f6c7267c2428eafa7cdeb8272e27c00d9";
$postData = array(
    "appId" => '344347e52f013c18fb9f7a88043443',
    "orderId" => $orderId,
    "orderAmount" => $orderAmount,
    "orderCurrency" =>'INR',
    "orderNote" => 'test order',
    "customerName" => $customerName,
    "customerPhone" => $customerPhone,
    "customerEmail" =>$customerEmail,
    "returnUrl" => 'https://iimsr.net.in/admin-12345/payment-status.php',
    "notifyUrl" => 'https://iimsr.net.in/admin-12345/payment-status.php',
);

ksort($postData);
$signatureData = "";
foreach ($postData as $key => $value){
    $signatureData .= $key.$value;
}
$signature = hash_hmac('sha256', $signatureData, $secretKey,true);
$signature = base64_encode($signature);
//print_r($signature);exit;
if ($mode == "PROD") {
    $url = "https://www.cashfree.com/checkout/post/submit";
} else {
    $url = "https://test.cashfree.com/billpay/checkout/post/submit";
}
$query = mysqli_query($con, "INSERT INTO `new_admission`(`Uniqueid`, `name`, `Fathername`, `Dob`, `Mothername`, `Mobile`, `email`, `course`, `branch`, `semester`, `Lentry`, `session`, `discountyouwill`, `Totalfee`, `Discountfee`, `TotalGst`, `CourseTotalFee`, `Counselor`, `Photo`, `Sign`, `Adhar`, `Markscard`, `Address`, `orderId`, `orderAmount`, `referenceId`, `txStatus`, `Status`) VALUES 
                            ('$Unique_id', '$customerName', '$FatherName', '$Dob', '$MotherName', '$customerPhone', '$customerEmail', '$CourseName', '$Branch', '$semester', '$lateralentry', '$session', '$discountyouwill', '$tota_withgst', '$discount_fee', '$tax_gstfee', '$course_totalFee', '$counselername', '$passportphoto', '$Signature', '$AdharCard', '$MarksCard', '$PermanentAdd', '$orderId', '$orderAmount', '$referenceId', '$txStatus', 0)");
?>

<form action="<?php echo $url; ?>" name="frm1" method="post">
<p>Please wait.......</p>
<input type="hidden" name="signature" value='<?php echo $signature; ?>'/>
<input type="hidden" name="orderNote" value='<?php echo $postData['orderNote']; ?>'/>
<input type="hidden" name="orderCurrency" value='<?php echo $postData['orderCurrency']; ?>'/>
<input type="hidden" name="customerName" value='<?php echo $postData['customerName']; ?>'/>
<input type="hidden" name="customerEmail" value='<?php echo $postData['customerEmail']; ?>'/>
<input type="hidden" name="customerPhone" value='<?php echo $postData['customerPhone']; ?>'/>
<input type="hidden" name="orderAmount" value='<?php echo $postData['orderAmount']; ?>'/>
<input type ="hidden" name="notifyUrl" value='<?php echo $postData['notifyUrl']; ?>'/>
<input type ="hidden" name="returnUrl" value='<?php echo $postData['returnUrl']; ?>'/>
<input type="hidden" name="appId" value='<?php echo $postData['appId']; ?>'/>
<input type="hidden" name="orderId" value='<?php echo $postData['orderId']; ?>'/>
</form>
</body>