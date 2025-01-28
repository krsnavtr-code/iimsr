<?php 
include('checklogin.php');
include("dbconnection.php");
$semester = $_GET['semester'];
$enrolment = $_GET['enrolment'];
$result = mysqli_query($con,"SELECT `ResultCertificate` FROM `students_marks` WHERE `enrolment` ='$enrolment' AND `semester`='$semester'");
$row = mysqli_fetch_array($result);
if($row['ResultCertificate']==0){
    mysqli_query($con,"UPDATE `students_marks` SET `ResultCertificate`='1' WHERE enrolment ='$enrolment' AND `semester`='$semester'");   
}else{
    mysqli_query($con,"UPDATE `students_marks` SET `ResultCertificate`='0' WHERE enrolment ='$enrolment' AND `semester`='$semester'");
}
header("location:view-all-marks.php");


