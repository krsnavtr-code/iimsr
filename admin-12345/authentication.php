<?php
include("dbconnection.php");
session_start();
$_SESSION['login'] = $_POST['enrolment'];
$_SESSION['dob'] = $_POST['dob'];

$query = "SELECT * FROM `student_enrolment` where`enrolment`=".$_SESSION['login']." and `dob` =".$_SESSION['dob'];
$result  = $con->query($query);
$row = mysqli_fetch_array($result);
$count = mysqli_num_rows($result);
if($count == 1) {
        // session_register("username");
         $_SESSION['login'] = $enrolment;
        header("location: indexxx.php");
      }else {
         $error = "Your Login Name or Password is invalid";
         echo $error;
      }
	 
?>