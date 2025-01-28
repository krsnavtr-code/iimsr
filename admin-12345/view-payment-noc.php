<?php
error_reporting(0);
include('checklogin.php');
include("dbconnection.php");
include("include/header.php");
if($_SESSION['role']=="docs-verification" || $_SESSION['role']=="super-admin"){

?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Payment Noc<small></small></h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Payment Noc</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="overflow-x:auto; margin-bottom: 20px;">
                <form action="" method="post">
                    <div class="row">
                        <div class="col-sm-9 col-md-9 col-lg-9 col-xs-12">
                            <label class="enrolmentt">Enrolment No. :</label>
                            <input type="text" name="enrolment" class="form-control"  id="enrolment" placeholder="Enrolment No." value="<?php if (isset($_POST['fetch'])) { echo$_POST['enrolment']; } ?>">
                        </div>
                        <div class="col-sm-3 col-md-3 col-lg-3 col-xs-12">
                            <button name="fetch" class="btn btn-block btn-warning btn-flat" style="margin: 24px 10px 0px 0px;">Submit</button>
                            </h4>
                        </div>
                    </div>
                </form>
				<form action="" method="post" style="margin-bottom:20px;">
                    <div class="row">
						<?php
							global $name;
							global $fname;
							global $dobb;
							global $enrolm;
							global $course;
							global $special;
							global $deu_fee;
							global $total_fee;
							global $submit_fee;
							global $feetax;
							global $unique_id;
							$enrol="";
							$branch="";
						if (isset($_POST['fetch'])) {
							$_SESSION['enrolment'] = $enrol;
							$enrol = $_POST['enrolment'];
							$query = mysqli_query($con, "select * from register_here where `enrolment` = '$enrol'");
							while ($row = mysqli_fetch_array($query)){
								$name = $row['name'];		  
								$fname = $row['fathers_name'];
								$dobb =  $row['dob'];
								$enrolm = $row['enrolment'];
								$course = $row['course'];
								$special =  $row['specilization'];
								$total_fee =  $row['total_fee'];
								$deu_fee =  $row['deu_fee'];
								$submit_fee =  $row['submit_fee'];
								$feetax =  $row['feetax'];
								$unique_id =  $row['unique_id'];
						    }								
					    }
						?>
					</div>
					<div class="row">
                        <div class="col-sm-12 col-md-12 col-xs-12">
                            <label>Course :</label>
                            <input type="text" name="coursename" class="form-control" id="coursename" placeholder="Course" value="<?php echo $course; ?>">
                        </div>
                    </div>
					<div class="row">
					    <div class="col-sm-3 col-md-3 col-lg-3 col-xs-12">
							<label>Name :</label>
							<input type="text" name="name" class="form-control" id="name" placeholder="Name" value="<?php echo $name; ?>">
							<input type="hidden" name="fathername" id="fathername" value="<?php echo $fname; ?>">
							<input type="hidden" name="enrolment" id="enrolment" value="<?php echo $enrol; ?>">
							<input type="hidden" name="unique_id" id="unique_id" value="<?php echo $unique_id; ?>">
							<input type="hidden" name="text" id="dob" value="<?php echo $dobb; ?>">	
							<input type="hidden" name="branch" id="branch" value="<?php echo $special; ?>">
						</div>
                        <div class="col-sm-3 col-md-3 col-lg-3 col-xs-12">
                        	<label>Total Fee :</label>
                        	<input type="text" name="coursename" class="form-control" id="totalfee" placeholder="Total Fee" value="<?php echo $total_fee; ?>">
                        </div>
                        <div class="col-sm-2 col-md-2 col-lg-2 col-xs-12">
                        	<label>Submit Fee :</label>
                        	<input type="text" name="branch" class="form-control" id="submitfee" placeholder="Submit Fee" value="<?php echo $submit_fee; ?>">
                        </div>
						<div class="col-sm-2 col-md-2 col-lg-2 col-xs-12">
                        	<label>Due Fee :</label>
                        	<input type="text" name="branch" class="form-control" id="duefee" placeholder="Due Fee" value="<?php echo $deu_fee; ?>">
                        </div>
						<div class="col-sm-2 col-md-2 col-lg-2 col-xs-12">
                        	<label>Fee Tax :</label>
                        	<input type="text" name="branch" class="form-control" id="feetax" placeholder="Fee Tax" value="<?php echo $feetax; ?>">
                        </div>
					</div><br>
					<div class="row">
                        <div class="col-sm-12 col-md-12 col-xs-12">
                            <div class="input-group">
                                <div class="row">
                                    <div class="col-sm-6 col-md-6 col-xs-12">
                                        <span class="input-group-addon">
                                            Complete Payment : <input type="checkbox" name="fetch" id="selectBox" value="Complete Payment" onchange="changeFunc();">
                                        </span>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-xs-12">
                                        <span class="input-group-addon">
                                            Pending Payment and Slip : <input type="checkbox" name="fetch" id="selectBoxx" value="Pending Payment" onchange="PaymentSlipNot();">
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
				</form>
				<div id="formfiled"></div>
        	    <div id="Paymentslipnot"></div>
            </div>
        </div>
    </section>
</div>
<script>
    function changeFunc() {
    	var selectBox = $('#selectBox').val();
    	var enrolment = $('#enrolment').val();
    	$.ajax({
    		type: "post",
    		url: "noc.php",
    		data: {selectBox:selectBox,enrolment:enrolment},
    		success: function(data){
    			$('#formfiled').html(data);
    		}
    	});
    }
</script>
<script>
    function PaymentSlipNot() {
    	var selectBoxx = $('#selectBoxx').val();
    	var enrolment = $('#enrolment').val();
    	var unique_id = $('#unique_id').val();
    	$.ajax({
    		type: "post",
    		url: "PaymentSlipNot.php",
    		data: {selectBoxx:selectBoxx,enrolment:enrolment,unique_id:unique_id},
    		success: function(data){
    			$('#Paymentslipnot').html(data);
    		}
    	});
    }
</script>
<style>
    .input-group {
        display: contents;
    }
</style>
<?php include("include/footer.php");?>
<?php }else {header("location: login.php");}?>