<?php 
error_reporting(0);
include('checklogin.php');
include("dbconnection.php");
$enrolment = $_GET['enrolment'];
$result = mysqli_query($con,"SELECT `StudentStatus` FROM `register_here` WHERE `enrolment` ='$enrolment'");
$row = mysqli_fetch_array($result);
if($row['StudentStatus']==0){
    mysqli_query($con,"UPDATE `register_here` SET `StudentStatus`='1' WHERE enrolment ='$enrolment'");   
}else{
    mysqli_query($con,"UPDATE `register_here` SET `StudentStatus`='0' WHERE enrolment ='$enrolment'");
}
header("location:view-new-registration.php");


