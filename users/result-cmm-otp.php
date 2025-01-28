<?php 
include('checklogin.php');
include("dbconnection.php");

$otp = $_POST['otp'];
$email = $_POST['email'];
$enrolment = $_SESSION['enrolment'];

$query = mysqli_query($con, "SELECT * FROM `register_here` WHERE `enrolment`='$enrolment' AND `CmmOtp`='$otp'");
$row = mysqli_num_rows($query);
if($row>0){
    $query = mysqli_query($con, "UPDATE `register_here` SET `CmmOtp`='' WHERE `enrolment`='$enrolment' AND `email`='$email'");
    echo "success1"; 
}else{
    echo "not_exist";
}
?>