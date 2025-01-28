<?php
    error_reporting(0);
    include('checklogin.php');
    include("dbconnection.php");
    $sem = $_POST['seleboxx'];
    $enrolment = $_POST['enrolment'];
    $unique_id = $_POST['unique_id'];
?>
<div>
    <table style="width: 100%;background-color: #e708081f;">
	<?php
		$query = mysqli_query($con, "SELECT * FROM `new_payment` WHERE `enrolment` = '$enrolment' AND `unique_id` = '$unique_id'");
		while($row = mysqli_fetch_array($query)){
	?>
    
	    <tr id="selectBoxx" style="margin:8px 0px 8px 0px;">
			<td style="width:90%;border:none;">
				<table style="width:100%;text-align:center;">
					<tr><td style="text-align:center;color:#fb352b;line-height: 35px;font-size:20px;"><strong>Pending Payment</strong></td></tr>
				</table>
				<table style="width:100%;">
					<tr class="spacer">
						<td width="20%" style="padding: 0px 0px 0px 5px;font-size:14px;font-weight:blod;font-weight:bold;line-height:40px"><strong><span style="color:red;">Enrolment.</span> : </strong> <?php echo $row['enrolment']; ?></td>
						<td width="30%" style="padding: 0px 0px 0px 30px;font-size:14px;font-weight:blod;font-weight:bold;line-height:40px"><strong>Upload Date : </strong> <?php echo $row['timestamp']; ?></td>
						<td width="30%" style="padding: 0px 0px 0px 30px;font-size:14px;font-weight:blod;font-weight:bold;line-height:40px;color:red;"><strong>Payment Date : </strong><span style="color:#000;"><?php echo $row['payment_date']; ?></span></td>
					</tr>
				</table>
				<table style="width:100%;padding-left:50px;padding-right:50px;line-height:20px;">
					<tr class="spacer">
						<td width="35%" style="padding: 0px 0px 0px 5px;font-size:14px;font-weight:bold;line-height:30px"><strong> Name : </strong> <?php echo $row['name']; ?></td>
						<td width="35%" style="padding: 0px 0px 0px 30px;font-size:14px;font-weight:bold;line-height:30px"><strong> Unique Code :</strong> <?php echo strtoupper($row['unique_id']); ?></td>
					    <td width="30%" style="padding: 0px 0px 0px 5px;font-size:12px;line-height:40px;"><strong> Payment Mode : </strong> <span style="font-weight:800;"><?php echo $row['mode_of_payment']; ?></span></td>
					</tr>
				</table>
				<table style="width:100%">
					<tr>
						<td width="17%" style="padding: 0px 0px 0px 5px;font-size:12px;line-height:40px;color:#ff0000;"><strong> New Payment. : </strong><span style="color:#ff0000;font-weight:800;"><?php echo $row['add_option_paymentt']; ?></span></td>
						<td width="32%" style="padding: 0px 0px 0px 5px;font-size:12px;line-height:40px;"><strong> <span style="">Transaction Id.</span> : </strong><span style="font-weight:800;"><?php echo $row['transaction_id']; ?></span></td>
						<td width="32%" style="padding: 0px 0px 0px 5px;font-size:12px;line-height:40px;"><strong>Counselor Name : </strong> <span style="color:#ff0000;font-weight:800;"><?php echo $row['TL_option']; ?></span></td>
					</tr>
				</table>
			</td>
			<td style="width:10%;border:none;">
			    <table style="width:10%;">
					<tr>
						<td width="10%;" style="color:#ff0000;">
						    <a class="widget-user-image" data-rel="prettyPhoto[gallery1]" href="PaymentSlip/<?php echo $row['PaymentSlip'];?>">
    						    <img src="PaymentSlip/<?php echo $row['PaymentSlip'];?>" style="width:230px;height:180px;" alt="Payment slip">
						    </a>
					    </td>
					</tr>
				</table>
			</td>
		</tr>
	<?php } ?>
	</table>
</div>
<style>
    td, th {
    border: 1px solid #161515;
    padding: 10px;
}
</style>