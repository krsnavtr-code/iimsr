<?php
error_reporting(0);
include('checklogin.php');
include("dbconnection.php");
include("include/header.php");
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;
if($_SESSION['role']=="pay-slip" || $_SESSION['role']=="super-admin"){

?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Payment Slip<small></small></h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Payment Slip</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="box box-widget widget-user">
                    <?php 
            			if(isset($_POST['edit'])){
            			   $unique_id = $_POST['unique_id'];
            			   $enrolment = $_POST['enrolment'];
            			   $transaction_id = $_POST['transaction_id'];
            			   $resultt = mysqli_query($con,"SELECT * FROM `new_payment` WHERE `unique_id`='$unique_id' AND `enrolment`='$enrolment' AND `transaction_id`='$transaction_id'");
            			   $alladata= array();
            			   $roere = mysqli_fetch_array($resultt);
            			   $name = $roere['name'];
            			   $father_name = $roere['father_name'];
            			   $email = $roere['email'];
            			   $unique_id = $roere['unique_id'];
            			   $enrolment = $roere['enrolment'];
            			   $course = $roere['course'];
            			   $add_option_paymentt = $roere['add_option_paymentt'];
            			   $mode_of_payment = $roere['mode_of_payment'];
            			   $transaction_id = $roere['transaction_id'];
            			   $payment_date = $roere['payment_date'];
            			   $TL_option = $roere['TL_option'];
            			   $PaymentSlip = $roere['PaymentSlip'];
            			}
            		?>
            		<?php 
            		    $qquery = mysqli_query($con, "SELECT * FROM `new_payment` WHERE `sir_status`='1'");
            			$numn = mysqli_num_rows($qquery);
            			$rooww = mysqli_fetch_array($qquery);
            		?> 
                    <div class="box-footer">
                        <form name="payment-slip" action="" method="post" id="slip">
            			    <div class="row">
            			         <div class="col-sm-3">
                        	         <div class="form-group">
                        	             <label>Name</label>
                        	            <input type="text" name="name" class="form-control" value="<?php if(isset($_POST['edit'])){ echo $roere['name']; } ?>" id="name" placeholder="name">
                        	         </div>
                        	     </div>
                        	     <div class="col-sm-3">
                        	         <div class="form-group">
                        	             <label>Father's Name</label>
                        	             <input type="text" name="fathers_name" placeholder="Fathers Name" class="form-control" value="<?php if(isset($_POST['edit'])){ echo $roere['father_name']; } ?>" id="fathers_name">
                        	             <input type="hidden" name="course_name" class="form-control" value="<?php if(isset($_POST['edit'])){ echo $roere['course']; } ?>" id="course_name">
                        	             <input type="text" name="paymentslipim" value="<?php echo $PaymentSlip; ?>" style="margin: 0px 10px 0px 0px;display:none;">
                        	         </div>
                        	     </div>
            					 <div class="col-sm-3">
                        	         <div class="form-group">
                        	             <label>Enrolment No.</label>
                        	             <input type="text" name="enrollment" class="form-control" value="<?php if(isset($_POST['edit'])){ echo $roere['enrolment']; } ?>"id="enrollment" placeholder="enrolment">
                        	         </div>
                        	     </div>
            					 <div class="col-sm-3">
                        	         <div class="form-group">
                        	             <label>Unique Id.</label>
                        	             <input type="text" name="unique_id" class="form-control" value="<?php if(isset($_POST['edit'])){ echo $roere['unique_id']; } ?>" id="unique_id">
                        	         </div>
                        	     </div>
                        	     
                        	     <div class="col-sm-5 col-md-5 col-lg-5 col-xs-12">
                			         <div class="form-group">
                			            <label>Total Payment</label>
                			            <input type="text" name="payment" class="form-control" value="<?php if(isset($_POST['edit'])){ echo $roere['add_option_paymentt']; } ?>" id="payment" placeholder="Total Payment">
                			            <input type="hidden" name="emailid" value="<?php if(isset($_POST['edit'])){ echo $roere['email']; } ?>" id="emailid">
                			         </div>
                			    </div>
                                <div class="col-sm-3 col-md-3 col-lg-3 col-xs-12">
                                    <div class="form-group">
                                        <label>Fee Amount</label>
                                        <input type="text" name="feeamount" class="form-control" value="<?php if(isset($_POST['edit'])){ echo $roere['Pay_fee']; } ?>" id="feeamount" placeholder="Fee">
                                    </div>
                                </div>
                                <div class="col-sm-2 col-md-2 col-lg-2 col-xs-12">
                                    <div class="form-group">
                                        <label>Fee Tax*</label>
                                        <input type="text" name="feetax" class="form-control" value="<?php if(isset($_POST['edit'])){ echo $roere['fee_tax']; } ?>" id="feetax" placeholder="Tax*">
                                    </div>
                                </div>
                                <div class="col-sm-2 col-md-2 col-lg-2 col-xs-12">
                                    <div class="form-group">
                                        <label>Exam Fee</label>
                                        <input type="text" name="examfee" class="form-control" value="" id="examfee" placeholder="Exam Fee">
                                    </div>
                                </div>
                                
                			     <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                			         <div class="form-group">
                			             <label>Transaction ID</label>
                			            <input type="text" name="transaction" class="form-control" value="<?php if(isset($_POST['edit'])){ echo $roere['transaction_id']; } ?>" id="transaction" placeholder="Transaction ID" required>
                			         </div>
                			     </div>
                			     <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                			         <div class="form-group">
                			             <label>Mode of payment</label>
                			            <input type="text" name="through" class="form-control" value="<?php if(isset($_POST['edit'])){ echo $roere['mode_of_payment']; } ?>" id="through" placeholder="ex. A/C SBI">
                			         </div>
                			     </div>
                			     <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                			         <div class="form-group">
                			             <label>Date</label>
            							 <input name="date" size=10 maxlength=10  onkeyup="this.value=this.value.replace(/^(\d\d)(\d)$/g,'$1/$2').replace(/^(\d\d\/\d\d)(\d+)$/g,'$1/$2').replace(/[^\d\/]/g,'')" class="form-control date-format" id="date" value="<?php if(isset($_POST['edit'])){ echo $roere['payment_date']; } ?>" placeholder="Payment Date" required>
                			         </div>
                			     </div>
                			     <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                			         <div class="form-group">
                			             <label>Counselor Name</label>
                			             <input type="hidden" class="" name="formButton" id="formButton">
                			            <input type="text" name="sendername" value="<?php if(isset($_POST['edit'])){ echo $roere['TL_option']; } ?>" class="form-control" id="sendername" placeholder="Counselor Name" required>
                			         </div>
                			     </div>
            					 <?php if($rooww['sir_status']==1){ ?>
                			     <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                			         <label></label>
                			         <button onclick="printfunction()" class="btn btn-primary btn-block ActionButtonRa">Submit Payment Slip</button>
                			     </div>
                			     <?php } ?>
            			    </div>
            			</form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br><br><br><br><br><br><br><br><br>
    <script type="text/javascript">
    	function printfunction(){
    	    var name = $('#name').val();
    	    var fathers_name = $('#fathers_name').val();
    	    var emailid = $('#emailid').val();
    	    var course_name = $('#course_name').val();
    	    var enrollment = $('#enrollment').val();
    	    var payment = $('#payment').val();
            var feeamount = $('#feeamount').val();
            var feetax = $('#feetax').val();
    	    var examfee = $('#examfee').val();
    	    var date = $('#date').val();
    	    var through = $('#through').val();
    	    var transaction = $('#transaction').val();
    	    var sendername = $('#sendername').val();
    	    var unique_id = $('#unique_id').val();
    	    var paymentslipim = $('#paymentslipim').val();
    	    var formButton=$('#formButton').val();
            $.ajax({
                type: "post",
                url: "payment-slip-print.php",
                data: {name:name,fathers_name:fathers_name,emailid:emailid,course_name:course_name,enrollement:enrollment,payment:payment,feeamount:feeamount,feetax:feetax,
                date:date,through:through,transaction:transaction,sendername:sendername,unique_id:unique_id,formButton:formButton,examfee:examfee,paymentslipim:paymentslipim},
                success: function(data){
                    alert(data);  
                    window.location.replace('payment-verified.php') ; 
                    $('#printdata').html(data);
                    $("#printdata").printMe({
                        "path" : ["print.css"]
                    });
                }
            });
            location.replace("verified-transaction-id.php")
    	}
    </script>
    <script>
        let print = (doc) => {
        	let objFra = document.createElement('iframe');
            objFra.style.visibility = 'hidden';
            objFra.src = doc;
            document.body.appendChild(objFra);
            objFra.contentWindow.focus();
            objFra.contentWindow.print();
        }
    </script>
</div>
<?php include("include/footer.php");?>
<?php }else {header("location: login.php");}?>