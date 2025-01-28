<?php
    error_reporting(0);
    include('checklogin.php');
    include("dbconnection.php");
    $sem = $_POST['selectBoxxx'];
    $enrolment = $_POST['enrolment'];
    $unique_id = $_POST['unique_id'];
?>
<div class="row">
	<?php
		$query = mysqli_query($con, "SELECT * FROM `new_payment` WHERE `enrolment` = '$enrolment' AND `unique_id` = '$unique_id'");
		while($row = mysqli_fetch_array($query)){
	?>
    <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12" id="selectBoxxx">
	    <img src="PaymentSlip/<?php echo $row['PaymentSlip'];?>" alt="student image" style="width: 150px;height: 150px;">
    </div>
	<?php } ?>
</div>
