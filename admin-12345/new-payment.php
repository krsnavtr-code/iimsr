<?php

error_reporting(0);

include('checklogin.php');

include("dbconnection.php");

include("include/header.php");

require_once 'dompdf/autoload.inc.php';

use Dompdf\Dompdf;


$success = $course = $session = $total_fee = $submit_fee = $deu_fee = "";


$firstvite =  mysqli_connect("localhost", "u483551267_iimsr_online", "rUadJmtlv:A3", "u483551267_iimsr_online");
if(mysqli_connect_errno()){
    die("Connection failed: " . mysqli_connect_error());
}

$vbimt =  mysqli_connect("localhost", "u483551267_iimsr_online", "rUadJmtlv:A3", "u483551267_iimsr_online");
if(mysqli_connect_errno()){

    echo "Connection Fail".mysqli_connect_error();

}



if($_SESSION['role']=="team-leader" || $_SESSION['role']=="super-admin"){

if(isset($_POST['newpayment'])){

	$cname = $_POST['name'];

	$father_name = $_POST['father_name'];

	$email = $_POST['email'];

	$session = $_POST['session'];

	$course = $_POST['course'];

	$enrolment = $_POST['enrolment'];

	$unique_id = $_POST['unique_id'];

	$total_fee = $_POST['total_fee'];

	$Paid_fee = $_POST['Paid_fee'];

	$deu_fee = $_POST['deu_fee'];

	$Pay_fee = $_POST['Pay_fee'];

	$fee_tax = $_POST['fee_tax'];

	$transaction_id = $_POST['transaction_id'];

	$mode_of_payment = $_POST['mode_of_payment'];

	$TL_option = $_POST['TL_option'];

	$add_option_paymentt = $_POST['add_option_paymentt'];

	$paymentdate = $_POST['paymentdate'];

	

	if(isset($_POST['PaymentSlipp'])){

	    $PaymentSlip = $_POST['PaymentSlipp'];

	}

	if(isset($_FILES['PaymentSlip'])){

    	$PaymentSlip = $_FILES['PaymentSlip']['name'];

        $temimag = $_FILES['PaymentSlip']['tmp_name'];

        move_uploaded_file($temimag,'PaymentSlip/'.$PaymentSlip);

	}

	$querry =  mysqli_query($con, "SELECT * FROM `paymentslip` WHERE `transaction_id` = '$transaction_id'");

    $numrows = mysqli_num_rows($querry);

    if($numrows==0){

    	$querry =  mysqli_query($con, "SELECT * FROM `new_payment` WHERE `transaction_id` = '$transaction_id'");

    	$numrows = mysqli_num_rows($querry);

        if($numrows==0){

            $firstvite =  mysqli_query($firstvite, "SELECT * FROM `new_payment` WHERE `transaction_id`='$transaction_id'");

            $firstvitenumrow = mysqli_num_rows($firstvite);

            if($firstvitenumrow==0){

                $vbimtquerry =  mysqli_query($vbimt, "SELECT * FROM `new_payment` WHERE `transaction_id`='$transaction_id'");

                $vbimtnumrow = mysqli_num_rows($vbimtquerry);

                if($vbimtnumrow==0){

                	$query = mysqli_query($con,"INSERT INTO `new_payment`(`name`, `father_name`, `email`, `session`, `course`, `enrolment`, `unique_id`, `total_fee`, `Paid_fee`, `deu_fee`, `transaction_id`, `mode_of_payment`, `TL_option`, `add_option_paymentt`, `Pay_fee`, `fee_tax`, `PaymentSlip`, `payment_date`) VALUES ('$cname', '$father_name', '$email', '$session', '$course', '$enrolment', '$unique_id', '$total_fee', '$Paid_fee', '$deu_fee', '$transaction_id', '$mode_of_payment', '$TL_option', '$add_option_paymentt', '$Pay_fee', '$fee_tax', '$PaymentSlip', '$paymentdate')");

                    if($query){

            			$success = "<p class='OperationHas'>Thank You...! New Payment Submit successfully</p>";

            		}

                }else{

            	    $success = "<p class='AlreadyRegistered'>Oops...! This Transaction Id already Inserted in VB record</p>";

            	}

            }else{

    	        $success = "<p class='AlreadyRegistered'>Oops...! This Transaction Id already Inserted in Firstvite record</p>";

        	}

    	}else{

    	    $success = "<p class='AlreadyRegistered'>Oops...! This Transaction Id already Inserted please insert different transaction id</p>";

    	}

    }else{

	    $success = "<p class='AlreadyRegistered'>Oops...! This Payment Slip already Deducted please different transaction id</p>";

	}

}

?>

<div class="content-wrapper">

    <section class="content-header">

        <h1>New Payment<small></small></h1>

        <ol class="breadcrumb">

            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>

            <li class="active">New Payment</li>

        </ol>

    </section>

    <section class="content">

        <div class="row">

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                <div class="box box-primary">

                    <?php

        				if (isset($_POST['newpayment'])){

        					echo $success;

        				}else {

        					echo $success;

        				}

        			?>

                    <div class="box-header with-border"></div>

                    <?php

        			    $unique_id="";

                        $eeemail="";

                        global $name;

                        global $father_name;

                        global $email;

                        global $unique_id;

                        global $coursssee;

                        global $first_payment_amount;

                        global $first_payment_details;

                        global $mode_of_payment;

                        global $id1;

                        global $dataell;

                        global $PaymentSlip;

                        

        			    if (isset($_POST['fetch'])) {

        			        $id1 = $_POST['inlineRadioOptions'];

        					$unique_id = $_POST['unique_id'];

        				    $queryll="";

        					if($id1=='unique_id'){

        						$queryl = mysqli_query($con, "select * from `add_payment_records` where `unique_id` ='$unique_id'");

        						while ($row = mysqli_fetch_array($queryl)){

        							$name = $row['name'];		  

        							$father_name = $row['father_name'];		  

        							$email = $row['email'];		  

        							$session = $row['session'];		  

        							$course = $row['course'];

        							$unique_id = $row['unique_id'];

        							$total_fee = $row['total_fee'];

        							$fee = $row['fee'];		

        							$tax = $row['tax'];		

        							$transaction_id = $row['transaction_id'];

        							$first_payment_amount =  $row['first_payment_amount'];

        							$first_payment_details =  $row['first_payment_details'];

        							$mode_of_payment =  $row['mode_of_payment'];

        							$PaymentSlip =  $row['PaymentSlip'];

        							

        						}

        					}

        					if($id1=='Enrolment'){

        					    $queryl = mysqli_query($con, "SELECT * FROM `register_here` WHERE `enrolment` ='$unique_id'");

        						while ($row = mysqli_fetch_array($queryl)){

        							$name = $row['name'];		  

        							$father_name = $row['fathers_name'];		  

        							$email = $row['email'];		  

        							$session = $row['session'];		  

        							$course = $row['course'];

        							$enrolment = $row['enrolment'];

        							$unique_id = $row['unique_id'];

        							$total_fee = $row['total_fee'];

        							$submit_fee = $row['submit_fee'];		

        							$deu_fee = $row['deu_fee'];		

        							$transaction_id = $row['transaction_id'];		

        							$mode_of_payment = $row['mode_of_payment'];

        						}	

        					}					

        				}

        		    ?>

                    <form action="" method="post" role="form" enctype="multipart/form-data">

                        <div class="box-body">

                            <div class="row">

                                <div class="col-sm-8 col-md-8 col-xs-12">

                                    <label for="exampleInputPassword1">Unique Id.</label>

                                    <div class="input-group">

                                        <span class="input-group-addon">

                                            Unique Id : <input type="checkbox" name="inlineRadioOptions" id="inlineRadio1" value="unique_id">

                                        </span>

                                        <span class="input-group-addon">

                                            Enrolment : <input type="checkbox" name="inlineRadioOptions" id="inlineRadio2" value="Enrolment">

                                        </span>

                                        <input type="password" name="unique_id" class="form-control is-valid" id="unique_id" placeholder="Please Enter Unique Id OR Enrolment No"value="<?php if (isset($_POST['fetch'])) { echo $_POST['unique_id']; } ?>">

                                    </div>

                                </div>

                                <div class="col-sm-4 col-md-4 col-xs-12">

                                    <button type="submit" name="fetch" class="btn btn-primary btn-block ButtonRadis">Submit</button>

                                </div>

                            </div>

                        </div>

                    </form>

                    <div class="box-header with-border"></div>

                    <form method="post" action="" name="paymnetsubmit" enctype="multipart/form-data">

                        <div class="box-body">

            				<div class="row">

                                <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">

            						<div class="row">

            							<div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">

            								<label>Name : </label>

            								<input type="hidden" name="unique_id" value="<?php echo $unique_id ; ?>">

            								<input type="hidden" name="PaymentSlipp" value="<?php echo $PaymentSlip ; ?>">

            								<input type="hidden" name="email" id="email" value="<?php echo $email; ?>">

            								<input type="text" class="form-control" id="cname" name="name" value="<?php echo $name; ?>" placeholder="Name" required>

            							</div>

            							<div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">

            								<label>Father's Name : </label>

            								<input type="text" class="form-control" id="father_name" name="father_name" value="<?php echo $father_name; ?>" placeholder="Fathers Name" required>

            							</div>

            							<div class="col-sm-4 col-md-4 col-lg-4 col-xs-12">

            								<label>E-mail : </label>

            								<input type="hidden" class="form-control" id="email" name="email" value="<?php //echo $email; ?>" placeholder="Email" required>

            							</div>-->

            						</div>

            						<div class="row">

            							<div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">

            								<label>Course : </label>

            								<input type="text" class="form-control" id="course" name="course" value="<?php echo $course; ?>" placeholder="Course" required>

            							</div>

            							<div class="col-sm-3 col-md-3 col-lg-3 col-xs-12">

            								<label>Session : </label>

            								<input type="text" class="form-control" id="session" name="session" value="<?php echo $session; ?>" placeholder="Session" required>

            							</div>

            						</div>

            						<div class="row">-->

            							<?php if($id1=='Enrolment'){

            								echo '<div class="col-sm-3 col-md-3 col-lg-3 col-xs-12">

            									<label>Enrolment : </label>

            									<input type="password" class="form-control" id="enrolment" name="enrolment" value="'.$enrolment.'" placeholder="enrolment" required>

            								</div>';

            								} 

            							?>

            							<?php if($id1=='unique_id'){

            								echo '<div class="col-sm-3 col-md-3 col-lg-3 col-xs-12">

            								<label>Unique Id : </label>

            								<input type="password" class="form-control" id="unique_id" name="unique_id" value="'.$unique_id.'" placeholder="Unique Id" required>

            							</div>';

            							} 

            							?>

            						</div>

            						<div class="row">

            							<div class="col-sm-3 col-md-3 col-lg-3 col-xs-12">

            								<label>Total  : </label>

            								<input type="text" class="form-control" id="total_fee" name="total_fee" value="<?php echo $total_fee; ?>" placeholder="Total Fee">

            							</div>

            							<div class="col-sm-3 col-md-3 col-lg-3 col-xs-12">

            								<label>Submit Fee : </label>

            								<input type="text" class="form-control" id="paid_fee" name="Paid_fee" value="<?php echo $submit_fee; ?>" placeholder="Paid Fee">

            							</div>

            							<div class="col-sm-3 col-md-3 col-lg-3 col-xs-12">

            								<label>Deu Fee : </label>

            								<input type="text" class="form-control" id="deu_fee" name="deu_fee" value="<?php echo $deu_fee; ?>" placeholder="Deu Fee">

            							</div>

            							<div class="col-sm-3 col-md-3 col-lg-3 col-xs-12">

            								<label style="color:#ff0000;">New Payment : </label>

            								<input type="text" class="form-control" id="add_option_paymentt" name="add_option_paymentt" value="<?php echo $first_payment_amount; ?>" placeholder="Add Option Paymentt" required>

            							</div>

            						</div>

            					    <?php if (!empty($fee)){ ?>

            						<div class="row">

            							<div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">

            								<label>Fee : </label>

            								<input type="text" name="Pay_fee" class="form-control" id="Pay_fee" placeholder="Fee" value="<?php echo $fee; ?>">

            							</div>

            							<div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">

            								<label>Tax* : </label>

            								<input type="text" name="fee_tax" class="form-control" id="fee_tax" placeholder="Fee Tax" value="<?php echo $tax; ?>">

            							</div>

            						</div>

            						<?php } ?>

            						<div id="formfiled"></div>

            						<div class="row">

                						<?php if($id1=='Enrolment' && $id1=='unique_id'){

                								echo '<div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">

                									<label>Transaction Id : </label>

                									<input type="text" class="form-control" id="transaction_id" maxlength="12" pattern="\d{12}" name="transaction_id" value="" placeholder="Transaction Id*" required>

                								</div>';

                							}elseif($id1=='unique_id'){

                								echo '<div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">

                									<label>Transaction Id : </label>

                									<input type="text" class="form-control" id="transaction_id" maxlength="12" pattern="\d{12}" name="transaction_id" value="'.$first_payment_details.'" placeholder="Transaction Id*" required>

                								</div>';

                							}else{

                								echo '<div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">

                									<label>Transaction Id : </label>

                									<input type="text" class="form-control" id="transaction_id" maxlength="12" pattern="\d{12}" name="transaction_id" value="" placeholder="Transaction Id*" required>

                								</div>';

                							}

                						?>

            							<div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">

            								<label>Mode of Payment : </label>

            							    <select name="mode_of_payment" onchange="selectsemester();" class="form-control titleclass country" id="mode_of_payment" required>

                    						    <?php if(isset($_POST['edit'])){ ?>

                    						    <option value="<?php echo $mode_of_payment; ?>" selected><?php echo $mode_of_payment; ?></option>

                    						    <?php } else{ ?>

                    						    <option value="" disable hidden>-Select Mode of Payment-</option>

                    						    <?php } ?>

                    						    <option value="Google Pay">Google Pay</option>

            									<option value="Phone Pay">Phone Pe</option>

            									<option value="Paytm">Paytm</option>

            									<option value="Firstvite QR Code">Firstvite QR Code</option>

            									<option value="Gateway">Gateway Payment</option>

            									<option value="IDFC AC">IDFC AC</option>

            									<option value="Firstvite ICICI AC">Firstvite ICICI AC</option>

            									<option value="SBI AC">SBI AC</option>

            									<option value="HDFC AC">HDFC AC</option>

            									<option value="BOB AC">BOB AC</option>

            									<option value="BOI AC">BOI AC</option>

            									<option value="Kotak AC">Kotak AC</option>

            									<option value="IndusInd AC">IndusInd AC</option>

            									<option value="Cash Deposit">Cash Deposit</option>

                    						    <?php if($mode_of_payment!=null){ ?>

                                                    <option selected="selected"><?php echo $mode_of_payment; ?></option>

                                                <?php } ?>

                    						</select>

            							</div>

            						</div>

            						<div class="row">

            							<div class="col-sm-4 col-md-4 col-lg-4 col-xs-12">

            								<label>Counselor Name : </label>

            								<select name="TL_option" class="form-control titleclass country" id="tloption" required>

            								    <option value="" selected disable>-Select Counselor Name-</option>

            									<option value="Ravi">Ravi </option>

            									<option value="Shobit">Shobit </option>

            									<option value="Prashant">Prashant</option>

            									<option value="Sanjay">Sanjay</option>

            									<option value="Arushi">Arushi</option>

            									<option value="Sonam">Sonam</option>

            									<option value="Arjun">Arjun</option>

            									<option value="Meghna">Meghna</option>

            									<option value="Ragini">Ragini</option>

            									<option value="Gayatri">Gayatri</option>

            									<option value="Anupam">Anupam</option>

            									<option value="Ganesh">Ganesh</option>

            									<option value="Shridhar">Shridhar</option>

            									<option value="Pankaj">Pankaj</option>

            								</select>

            							</div>

            							<div class="col-sm-4 col-md-4 col-lg-4 col-xs-12">

            							    <label>Payment Date : </label>

            							    <input name=paymentdate size=10 maxlength=10  onkeyup="this.value=this.value.replace(/^(\d\d)(\d)$/g,'$1/$2').replace(/^(\d\d\/\d\d)(\d+)$/g,'$1/$2').replace(/[^\d\/]/g,'')" class="form-control date-format" value="" placeholder="Payment Date" required>

            							</div>

            							<div class="col-sm-4 col-md-4 col-lg-4 col-xs-12">

            							    <?php if(empty($PaymentSlip)){

            							    echo '<label class="lableform" for="validationCustom02">Upload Current Payment Slip : </label>

            					            <input type="file" name="PaymentSlip" class="form-control" value="" style="margin: 0px 10px 0px 0px;" required>';

            							    }else{

            							        echo "<img src='PaymentSlip/$PaymentSlip' name='PaymentSlipp' alt='student image' style='width: 66px;height: 66px;'>";

            							    } ?>

            							</div>

            						</div>

            					</div>

            				</div>

                        </div>

                        <div class="box-footer">

                            <div class="row">

                                <div class="col-sm-9 col-md-9"></div>

                                <div class="col-sm-3 col-md-3 col-xs-12">

                                    <div class="form-group">

                                        <input type="submit" name="newpayment" id="newpayment" class="btn btn-primary btn-block btn-flat" value="Submit New Payment"/>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </section>

    <script>

    	$(document).ready(function() {

    		$('#add_option_paymentt').keyup(function(ev) {

    			var total = $('#add_option_paymentt').val() * 1;

    			var tot_price = total - (total * 0.18);

    			var fee_tax = 1 * 0.18;

    			var tttpp = total-tot_price;

    			var divobj = document.getElementById('Pay_fee');

    			var fee_tax = document.getElementById('fee_tax');

    			divobj.value = tot_price;

    			fee_tax.value = tttpp;

    		});

    	});

    </script>

    <script>

        function selectsemester(){

        	var gate = $('#mode_of_payment').val();

        	$("#mode_of_payment").click(function() {

        		var mode_of_payment = $('#mode_of_payment').val()

        		$.ajax({

        			type: "post",

        			url: "new-payment-gst.php",

        			data: {mode_of_payment:mode_of_payment},

        			success: function(data){

        				if(gate === "Gateway"){

        					$('#formfiled').html(data);

        					$('#totalfe').show();

        					$('#eligibity').show();

        				}if(gate != "Gateway"){

        					$('#formfiled').html(data);

        					$('#totalfe').hide();

        					$('#eligibity').hide(); 

        				}

        			}

        		});

        	});

        }

    </script>

</div>

<?php include("include/footer.php");?>

<?php }else {header("location: login.php");}?>