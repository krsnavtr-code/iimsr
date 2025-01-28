<?php 
include('checklogin.php');
include("dbconnection.php");
$semester = $_GET['semester'];
$enrolment = $_GET['enrolment'];
$result = mysqli_query($con,"SELECT `ResultStatus` FROM `students_marks` WHERE `enrolment` ='$enrolment' AND `semester`='$semester'");
$row = mysqli_fetch_array($result);
if($row['ResultStatus']==0){
    mysqli_query($con,"UPDATE `students_marks` SET `ResultStatus`='1' WHERE enrolment ='$enrolment' AND `semester`='$semester'");   
}else{
    mysqli_query($con,"UPDATE `students_marks` SET `ResultStatus`='0' WHERE enrolment ='$enrolment' AND `semester`='$semester'");
}
header("location:view-all-marks.php");


