<?php
    error_reporting(0);
    include('checklogin.php');
    include("dbconnection.php");
?>
<div class="formVVVV" id="formButton">
	 <div class="row" style="Taxrow">
		<div class="col-sm-6 col-md-6 col-lg-6 col-xs-12" style="display:block" id='totalfe' style="display:none" id='totalfe'>
			<label> Fee :</label>
			<input type="text" name="Pay_fee" class="form-control enrollmentngg" id="Pay_fee" placeholder="Fee" value="<?php echo $fee; ?>">
		</div>
		<div class="col-sm-6 col-md-6 col-lg-6 col-xs-12" style="display:block" id='eligibity' style="display:none" id='eligibity'>
			<label> Tax :</label>
			<input type="text" name="fee_tax" class="form-control enrollmentngg" id="fee_tax" placeholder="Fee Tax" value="<?php echo $tax; ?>">
		</div>
	</div>
</div>