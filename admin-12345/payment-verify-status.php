<?php 
include('checklogin.php');
include("dbconnection.php");
$transaction_id = $_GET['transaction_id'];
$result = mysqli_query($con,"SELECT `comment_status` FROM `new_payment` WHERE `transaction_id` ='$transaction_id'");
$row = mysqli_fetch_array($result);
if($row['comment_status']==0){
    mysqli_query($con,"UPDATE `new_payment` SET `comment_status`='1' WHERE transaction_id ='$transaction_id'");   
}else{
    mysqli_query($con,"UPDATE `new_payment` SET `comment_status`='0' WHERE transaction_id ='$transaction_id'");
}
header("location:payment-verify.php");


