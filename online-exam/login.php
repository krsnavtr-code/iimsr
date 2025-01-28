<?php
include_once 'dbconnection.php';
session_start();
if(isset($_SESSION["exami_unique_code"])) {
    //session_destroy();
}

$ref = @$_GET['q'];
$exami_unique_code = $_POST['exami_unique_code'];
$enrolment = $_POST['enrolment'];

$exami_unique_code = stripslashes($exami_unique_code);
$exami_unique_code = addslashes($exami_unique_code);
$enrolment = stripslashes($enrolment);
$enrolment = addslashes($enrolment);
$enrolment = $enrolment;
/*$loginsql="SELECT `sname` FROM `wrong_table` WHERE `exami_unique_code` = '$exami_unique_code' AND `enrolment` = '$enrolment'";*/
$loginsql="SELECT `sname` FROM `admit_card` WHERE `exami_unique_code` = '$exami_unique_code' AND `enrolment` = '$enrolment'";
$result = mysqli_query($con,$loginsql) or die('Error');
$count = mysqli_num_rows($result);
if($count == 1) {
    while ($row = mysqli_fetch_array($result)) {
        $name = $row['sname'];
    }
    $_SESSION["sname"] = $name;
    $_SESSION["exami_unique_code"] = $exami_unique_code;
    header("location:account.php?q=1");
} else
   header("location:$ref?w=Wrong Username or Password");


?>