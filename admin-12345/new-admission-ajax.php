<?php
    error_reporting(0);
    include('checklogin.php');
    include("dbconnection.php");
?>
<div class="formVVVV" id="formButton">
    <div class="col-sm-2 col-md-2 col-lg-2 col-xs-12">
        <label class="TotalplusGST">Fee</label>
        <input type="text" name="tot_amount" class="form-control enrollmtngg" value="" id="tot_amount" placeholder="Fee" required>
    </div>
    <div class="col-sm-2 col-md-2 col-lg-2 col-xs-12">
        <label class="TotalplusGST">Tax*</label>
        <input type="text" name="tot_tax" class="form-control enrollmtngg" value="" id="tot_tax" placeholder="Tax*" required>
    </div>
</div>