<?php
session_start();
include("dbconnection.php");		
	$selebox = $_POST['selebox'];
	$selebox = strtolower($selebox);
	$coursename = $_POST['coursename'];
	$branch = $_POST['branch'];
    $query = mysqli_query($con,"select serial_no from `students_marks` where `semester`='$selebox' ORDER BY `serial_no` desc");
    $row=mysqli_fetch_array($query);
    $serialnumber = (int) $row['serial_no'];
    $updateserial = $serialnumber+1;
	echo $updateserial;

