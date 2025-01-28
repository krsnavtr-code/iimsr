<?php 
include('checklogin.php');
include("dbconnection.php");
$enrolment = $_GET['enrolment'];
$result = mysqli_query($con,"SELECT `status` FROM `register_here` WHERE `enrolment` ='$enrolment'");
$row = mysqli_fetch_array($result);
if($row['status']==0){
 mysqli_query($con,"UPDATE `register_here` SET `status`='1' WHERE enrolment ='$enrolment'");   
}else{
 mysqli_query($con,"UPDATE `register_here` SET `status`='0' WHERE enrolment ='$enrolment'");
}
header("location:view-result.php");


