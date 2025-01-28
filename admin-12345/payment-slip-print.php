<?php
error_reporting(0);
include('checklogin.php');
include("dbconnection.php");
include("functions.php");
require_once("qrcode.php");
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;

$name = $_POST['name'];
$fathers_name = $_POST['fathers_name'];
$email = $_POST['emailid'];
$course_name = $_POST['course_name'];
$enrollement = $_POST['enrollement'];
$payment = (int) $_POST['payment'];
$feeamountt = $_POST['feeamount'];
$feetaxx = $_POST['feetax'];
$examfee = $_POST['examfee'];
$paidt_hrough = $_POST['through'];
$transaction = $_POST['transaction'];
$PaymentPdf = $transaction;
$sender_name = $_POST['sendername'];
$unique_id = $_POST['unique_id'];
$date = $_POST['date'];
$query = mysqli_query($con, "SELECT * FROM `paymentslip` WHERE `transaction_id`='$transaction'");
$numrows = mysqli_num_rows($query);
if($numrows==0){
	$hitemailid = "SELECT * FROM `register_here` WHERE `enrolment`='$enrollement'";
	$queryresult = mysqli_query($con, $hitemailid); 
    $registerdata = mysqli_fetch_array($queryresult);
    $to = $registerdata['email'];
    $totalamount = (int) $registerdata['total_fee'];
    $deu_fee = $registerdata['deu_fee'];
    $feetax = $registerdata['feetax'];
	$deus = $deu_fee - $payment;
    $submit_fee = $registerdata['submit_fee']+$payment; 
	if(!empty($_POST['feetax'])){
        $feeamount = $deu_fee - $feeamountt;
        $feeamountsub = $registerdata['submit_fee']+$feeamountt;
        $taxtotal = $feetax + $feetaxx;
    }
	if($_POST['feetax']){
        if(!empty($_POST['feetax'])){ 
            mysqli_query($con, "UPDATE `register_here` SET `deu_fee`=$feeamount,`submit_fee`='$feeamountsub', `feetax`='$taxtotal' WHERE `enrolment`='$enrollement'");
    		mysqli_query($con, "UPDATE `paymentslip` SET `enrolment`='$enrollement' WHERE `email`='$email' && `course_name`='$course_name'");
    		mysqli_query($con, "INSERT INTO `delete_new_payment`(`name`, `course`, `enrolment`, `unique_id`, `total_fee`, `Paid_fee`, `deu_fee`, `transaction_id`, `mode_of_payment`, `TL_option`, `add_option_paymentt`, `comment_status`, `sir_status`, `payment_date`) VALUES ('$name', '$course_name', '$enrollement', '$unique_id', '$totalamount', '$submit_fee', '$deus', '$transaction', '$paidt_hrough', '$sender_name' ,'$payment', 1, 1, '$date')");
    		mysqli_query($con, "DELETE FROM `new_payment` WHERE `transaction_id`='$transaction'");
        }
    }else{
        mysqli_query($con, "UPDATE `register_here` SET `deu_fee`='$deus', `submit_fee`='$submit_fee' WHERE `enrolment`='$enrollement'");
		mysqli_query($con, "UPDATE `paymentslip` SET `enrolment`='$enrollement' WHERE `email`='$email' && `course_name`='$course_name'");
		mysqli_query($con, "INSERT INTO `delete_new_payment`(`name`, `course`, `enrolment`, `unique_id`, `total_fee`, `Paid_fee`, `deu_fee`, `transaction_id`, `mode_of_payment`, `TL_option`, `add_option_paymentt`, `comment_status`, `sir_status`, `payment_date`) VALUES ('$name', '$course_name', '$enrollement', '$unique_id', '$totalamount', '$submit_fee', '$deus', '$transaction', '$paidt_hrough', '$sender_name' ,'$payment', 1, 1, '$date')");
		mysqli_query($con, "DELETE FROM `new_payment` WHERE `transaction_id`='$transaction'");
	}
	$namejahsjs = $registerdata['name'];
	$paymentresult = mysqli_query($con, "SELECT `id` FROM `paymentslip`ORDER by `id` DESC");
	$paymentdata = mysqli_fetch_array($paymentresult);
	$id = $paymentdata['id'];
    if($id<1000){
        $voucherID = 1000;
        $paymentQuery = mysqli_query($con,"INSERT INTO `paymentslip`(`id`, `name`, `fathers_name`, `email`, `course_name`,`enrolment`, `payment`, `fee`, `tax`, `examfee`, `paidt_hrough`,`transaction_id`,`sender_name`, `unique_id`, `date`, `PaymentPdf`) VALUES 
        ('$voucherID', '$name', '$fathers_name', '$email', '$course_name', '$enrollement', '$payment', '$feeamountt', '$feetaxx', '$examfee', '$paidt_hrough', '$transaction', '$sender_name', '$unique_id', '$date', '$PaymentPdf')");
        if ($paymentQuery){
            echo 'Payment Slip inserting Successfully!';
        }else{
            echo 'Transaction Id already inserted';
        }   
    }else{
        $voucherID = $id+1;
        $paymentQuery = mysqli_query($con,"INSERT INTO `paymentslip`(`name`, `fathers_name`, `email`, `course_name`, `enrolment`, `payment`, `fee`, `tax`, `examfee`, `paidt_hrough`,`transaction_id`,`sender_name`, `unique_id`, `date`, `PaymentPdf`) VALUES 
        ('$name', '$fathers_name', '$email', '$course_name', '$enrollement', '$payment', '$feeamountt', '$feetaxx', '$examfee', '$paidt_hrough', '$transaction', '$sender_name', '$unique_id', '$date', '$PaymentPdf')");
        if ($paymentQuery){
            echo 'Payment Slip inserting Successfully!'; 
        }else{
            echo 'Transaction Id already inserted';
        }   
    }
    $text = $namejahsjs." Enrolment No: ".$enrollement;
    $qr = QRCode::getMinimumQRCode($text, QR_ERROR_CORRECT_LEVEL_L);
    $img = $qr->createImage(2, 2);
    ob_start();
    imagegif($img);
    imagedestroy($img);
    $img = ob_get_clean();
    $namemodify = strtoupper($registerdata['name']);
    $fathernamemodify = strtoupper($registerdata['fathers_name']);
    $qr = base64_encode($img);
    $top='images/iimsr-payment-slip.jpeg';
    $html ="<img src='$top' alt='leter' style='height: 450px; width: 100%;'/>
    <center>
        <table width='100%' style='margin-top:-360px;margin-right: 0px;margin-left:0px;border-collapse: collapse;color:#000;'align='center'>
            <tr><th colspan='3' style='padding:10px;font-size:18px;'><b>Institute : </b> Imperial Institute of Management Science & Research</th></tr>
            <tr><th colspan='3' style='padding:10px;font-size:18px;'><b>Course : </b>".$course_name."</th></tr>
            <tr>
                <td style='padding:10px;font-size:15px;'><b>Voucher No. : </b>".$voucherID."</td>
                <td style='padding:10px;font-size:15px;'><b>Dated : </b>".$date."</td>
                <td style='padding:10px;font-size:15px;'><b>Transaction ID : </b>".$transaction."</td>
            </tr>
            <tr>
                <td style='padding:10px;font-size:15px;'><b>Name : </b>".$name."</td>
                <td style='padding:10px;font-size:15px;'><b>Father's Name : </b>".$fathers_name."</td>
                <td style='padding:10px;font-size:15px;'><b>Mode of Payment. : </b>".$paidt_hrough."</td>
            </tr>
            <tr>
                <td style='padding:10px;font-size:15px;'><b>Amount Rs. : </b>".$payment."</td>
                <td style='padding:10px;font-size:15px;'><b>Fee Amount Rs. : </b>".$feeamountt."</td>
                <td style='padding:10px;font-size:15px;'><b>GST* Rs. : </b>".$feetaxx."</td>
            </tr>
            <tr>
                <td style='padding:10px;font-size:15px;'><b>Exam Fee. : </b>".$examfee."</td>
            </tr>
        </table>
        <table style='margin-top:-90px;text-align:center'>
            <tr>
                <td style='font-size:12px;text-align:center'>
                    *This is an online generated receipt, does not require signature.
                </td>
            </tr>
            <tr>
                <td style='font-size:12px;margin-left:0px;color:red; text-align:center'>
                   *18% GST will be applicable on all fees paid
                </td>
            </tr>
        </table>
    </center>";
    //echo $html;exit;
$filename = $PaymentPdf;
$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$pdfsave=$dompdf->output();
file_put_contents('payment-folder/'.$filename.'.pdf', $pdfsave);
}else{ echo 'Transactiona Id already inserted'; } ?>