<?php
error_reporting(0);
include('checklogin.php');
include("dbconnection.php");
include("include/header.php");
if($_SESSION['role']=="docs-verification" || $_SESSION['role']=="super-admin"){
if(isset($_POST['paymentinvoice'])){
    $enrolment = $_POST['enrolment'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $course = $_POST['course'];
	$invoice_Number = ['invoice_Number'];
    $limit = 12;
    $invoice_Number = random_int(10 ** ($limit - 1), (10 ** $limit) - 1);
    $payment = $_POST['payment'];
    $fee = $_POST['fee'];
    $fee_tax = $_POST['fee_tax'];
    $transaction_id = $_POST['transaction_id'];
    $payment_date = $_POST['payment_date'];
    
    $query = mysqli_query($con,"INSERT INTO `payment_invoice`(`enrolment`, `name`, `email`, `course`, `invoice_Number`, `payment`, `fee`, `fee_tax`, `transaction_id`, `payment_date`) VALUES 
	('$enrolment', '$name', '$email', '$course', '$invoice_Number', '$payment', '$fee', '$fee_tax', '$transaction_id', '$payment_date')");
    //print_r($query);
    if($query){
		$html = '<table width="100%" cellspacing="0" cellpadding="0">
				<tbody>
					<tr>
						<td width="100%" valign="top">
							<div>
								<table width="90%" border="0" cellspacing="0" cellpadding="20">
									<tbody>
										<tr>
											<td align="top">
												<table border="0" cellspacing="0" cellpadding="0" width="100%">
													<tbody>
														<tr>
															<td align="left" width="50%">
																<img src="iimsr.net.in/assets/images/logo.png" style="width: 155px; height: 43px;">
																<div>Phone Number : +91 9266585858</div>
																<div>Email Id: <a href="mailto:info@iimsr.net.in" target="_blank">info@iimsr.net.in</a></div>
															</td>
															<td width="50%" align="right">
																<font face="Arial, sans-serif">
																	<span style="font-size:20px">Invoice</span><br> 
																	<span style="font-size:12px"><b>GSTIN - </b> 09AASFV5622K1ZG </span> <br> &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
																	<span style="font-size:12px"><b>Invoice Number - </b>'.$invoice_Number.'</span> <br> &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
																	<span style="font-size:12px"><b>Transaction Id - </b>'.$transaction_id.'</span><br> 
																	<span style="font-size:12px"><b>Payment Date - </b>'.$payment_date.'</span>
																</font>
															</td>
														</tr>
													</tbody>
												</table>
												<hr>
												<table border="0" cellspacing="0" cellpadding="0" width="100%">
													<tbody>
														<tr>
															<td align="left" width="40%">
																<font face="Arial, sans-serif">
																	<span style="font-size:12px"><strong>Payment Detail</strong></span><br>
																	<span style="font-size:12px"><b>Enrolment -</b> '.$enrolment.'</span><br>
																	<span style="font-size:12px"><b>Name - </b>'.$name.'</span><br>
																	<span style="font-size:12px"><b>Course - </b>'.$course.'</span><br>
																</font>      
															</td>
															<td width="20%" align="right">
																<font face="Arial, sans-serif">
																	<span style="font-size:12px"><strong>Payment</strong></span><br>
																	<span style="font-size:12px">Rs. '.$payment.'</span> <br>
																</font>
															</td>
															<td width="20%" align="right">
																<font face="Arial, sans-serif">
																	<span style="font-size:12px"><strong>Fee</strong></span><br>
																	<span style="font-size:12px">Rs. '.$fee.'</span> <br>
																</font>
															</td>
															<td width="20%" align="right">
																<font face="Arial, sans-serif">
																	<span style="font-size:12px"><strong>18% GSTIN*</strong></span><br>
																	<span style="font-size:12px">Rs. '.$fee_tax.'</span> <br>
																</font>
															</td>
														</tr>
													</tbody>
												</table>
												<hr>
												<table border="0" cellspacing="0" cellpadding="0" width="100%">
													<tbody>
														<tr>
															<td align="left" width="50%">
																<span style="font-size:12px">Submit Fee:</span><br>
																<span style="font-size:12px">Payment Fee:</span><br>
															</td>
															<td width="50%" align="right">
																<font face="Arial, sans-serif">
																	<span style="font-size:12px"><strong>Rs. '.$fee.'</strong></span><br> 
																	<span style="font-size:12px"><strong>Rs. '.$payment.'</strong></span> <br>
																</font>
															</td>
														</tr>
													</tbody>
												</table>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</td>
					</tr>
				</tbody>
			</table>';
			//echo $html;
			$subject = "GST* Payment Invoice";
			$headers = array(
				"From: invoice@iimsr.net.in",
				"Reply-To: replyto@iimsr.net.in",
				"X-Mailer: PHP/" . PHP_VERSION,
				"Content-type: text/html; charset=iso-8859-1",
				"Cc: anand24h@gmail.com"
			);
			$headers = implode("\r\n", $headers);
			mail($email,$subject,$html,$headers);
        }
    if($query){
		$success = "<p class='OperationHas'>Thank You...! Payment Invoice Send Successfully</p>";
	}else{
		$success = "<p class='AlreadyRegistered'>Oops...! Something went wrong</p>";
	}

}    
?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Send Payment Invoice<small></small></h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Send Payment Invoice</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <form action="" method="post" role="form" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-sm-9 col-md-9 col-xs-9">
                                <input type="text" name="transaction_id" class="form-control" id="transaction_id" placeholder="Transaction Id"value="<?php if (isset($_POST['fetch'])) { echo $_POST['transaction_id']; } ?>" required>
                            </div>
                            <div class="col-sm-3 col-md-3 col-xs-3">
                                <button type="submit" name="fetch" class="btn btn-block btn-warning btn-flat">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <form action="" method="post" enctype="multipart/form-data">
				    <div class="box-body">
    				    <?php
                            global $name;
                            global $email;
                            global $enrolm;
                            global $course;
                            global $payment;
                            global $fee;
                            global $feetax;
                            global $transaction_id;	
                            global $payment_date;
							$enrolm=  "";
							$transaction_id = "";
                            
    				    if (isset($_POST['fetch'])) {
    						$_SESSION['transaction_id'] = $transaction_id;
    						$transaction_id = $_POST['transaction_id'];
							$query = mysqli_query($con, "select * from `paymentslip` where `transaction_id` = '$transaction_id'");
							
							while ($row = mysqli_fetch_array($query)){
								$name = $row['name'];		  
								$email = $row['email'];
								$enrolm = $row['enrolment'];
								$course = $row['course_name'];
								$payment = $row['payment'];
								$fee = $row['fee'];
								$feetax = $row['tax'];
								$transaction_id = $row['transaction_id'];
								$payment_date = $row['date'];
							}
    					} 
        					?>
    					<div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                                <div class="row">
                                    <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
                                        <div class="form-group">
                                            <input type="hidden" name="enrolment" id="enrolment" value="<?php echo $enrolm; ?>">
                                            <input type="text" name="name" class="form-control" id="name" placeholder="Name" value="<?php echo $name; ?>">
                                        </div>
                                    </div>
									<div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
									    <div class="form-group">
                                            <input type="text" name="email" class="form-control" id="email" placeholder="email" value="<?php echo $email; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
                                        <div class="form-group">
                                            <input type="text" name="course" class="form-control" id="course" placeholder="Course Name" value="<?php echo $course; ?>">
                                        </div>
                                    </div>
									<div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
									    <div class="form-group">
                                            <input type="text" name="transaction_id" class="form-control" placeholder="Transaction Id" value="<?php echo $transaction_id; ?>" required>
                                        </div>
                                    </div>
                                </div>
								<div class="row">
                                    <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
                                        <div class="form-group">
                                            <input type="text" name="payment" class="form-control" placeholder="Payment" value="<?php echo $payment; ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
                                        <div class="form-group">
                                            <input type="text" name="fee" class="form-control" placeholder="Fee" value="<?php echo $fee; ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
                                        <div class="form-group">
                                            <input type="text" name="fee_tax" class="form-control" placeholder="Fee Tax" value="<?php echo $feetax; ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
                                        <div class="form-group">
                                            <input type="text" name="payment_date" class="form-control" placeholder="Payment Date" value="<?php echo $payment_date; ?>" required>
                                        </div>
                                    </div>
                                </div>
								<div class="row">
									<div class="col-sm-4 col-md-4 col-lg-4 col-xs-12"></div>
									<div class="col-sm-4 col-md-4 col-lg-4 col-xs-12">
										<input type="submit" name="paymentinvoice" id="paymentinvoice" class="btn btn-block btn-primary btn-flat" value="Submit Invoice" />
									</div>
									<div class="col-sm-4 col-md-4 col-lg-4 col-xs-12"></div>
								</div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <br><br><br><br><br><br><br><br><br>
</div>
<?php include("include/footer.php");?>
<?php }else {header("location: login.php");}?>