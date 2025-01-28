<?php
error_reporting(0);
include('checklogin.php');
include("dbconnection.php");
include("include/header.php");
if($_SESSION['role']=="accountant" || $_SESSION['role']=="super-admin"){

?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Payment Verify<small></small></h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Payment Verify</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <form action="" method="post">
                    <div class="row">
                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
            				<input type="text" placeholder="Search : enrolment, unique_id, transaction_id, mode_of_payment" class="form-control" name="valueToSearch">
        				</div>
        				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            				<input type="submit" Value="Search" name="search" class="btn btn-block btn-success btn-flat">
        				</div>
                    </div>
    			</form>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="overflow-x:auto; margin-bottom: 20px; height:480px;">
                <table class="table table-hover no-more-tables" style="100%;background-color: #fff;">
        			<tr>
        				<th style="min-width: 100px;text-align:center;font-size:13px;">Success/Pending</th>
        				<th style="min-width: 150px;color:#ff0000;font-weight:700;text-align:center;font-size:13px;">Transaction ID</th>
        				<th style="min-width: 100px;text-align:center;font-size:13px;color:#000;font-weight:700;">New Payment</th>
        				<th style="min-width: 100px;text-align:center;font-size:13px;">Payment Mode</th>
        				<th style="min-width: 100px;text-align:center;font-size:13px;">Payment Date</th>
        				<th style="min-width: 100px;text-align:center;font-size:13px;">Payment Slip</th>
        				<th style="min-width: 80px;text-align:center;font-size:13px;">Total Fee</th>
        				<th style="min-width: 80px;text-align:center;font-size:13px;">Submit Fee</th>
        				<th style="min-width: 80px;text-align:center;font-size:13px;">Deu Fee</th>
        			    <th style="min-width: 100px;text-align:center;font-size:13px;">Name</th>
        				<th style="min-width: 100px;text-align:center;font-size:13px;">Enrolment</th>
        			    <th style="min-width: 80px;text-align:center;font-size:13px;">Unique Id</th>
        			    <th style="min-width: 80px;text-align:center;font-size:13px;">Email</th>
        				<th style="min-width: 100px;text-align:center;font-size:13px;">Counselor</th>
        				<th style="min-width: 100px;text-align:center;font-size:13px;">Created Date</th>
        			</tr>
    			    <?php
    				$query = mysqli_query($con, "SELECT * FROM `new_payment` ORDER BY `comment_id` DESC");
    				$num = mysqli_num_rows($query);
    				if($num>0){
    					if(isset($_POST['search'])){
    						$serach = $_POST['valueToSearch'];
    						$query = mysqli_query($con,"SELECT * FROM `new_payment` WHERE CONCAT(`enrolment`, `unique_id`, `transaction_id`, `mode_of_payment`, `TL_option`, `email`) LIKE '%".$serach."%'");
    					}
    					while($row = mysqli_fetch_array($query)) { 
    				        $Paid_fee = $row['Paid_fee'];
    				        $Deufee = $row['deu_fee'];
    				        $Enrolment = $row['enrolment'];
    				        $email = $row['email'];
    					?>
                        <?php if($row['comment_status']==1){ ?>
    					<tr>
    						<td style="text-align:center;"><a href="payment-verify-status.php?transaction_id=<?php echo $row['transaction_id']; ?>" class="label label-success">Success</a></td>
    						<td style="color:#0a960a;font-weight:700;text-align:center;"><?php echo $row['transaction_id'];?></td>
    						<td style="text-align:center;color:#000;font-weight:700;">&#8377;<?php echo $row['add_option_paymentt'];?>/</td>
    						<td style="text-align:center;"><?php echo $row['mode_of_payment'];?></td>
    						<td style="text-align:center;font-weight:700;font-size:15px;"><?php echo $row['payment_date'];?></td>
    						<td style="text-align:center;">
    						    <a title="" class="widget-user-image" data-rel="prettyPhoto[gallery1]" href="PaymentSlip/<?php echo $row['PaymentSlip'];?>">
    						    <img class="img-circle PaymentImages" src="PaymentSlip/<?php echo $row['PaymentSlip'];?>" alt="User Avatar"></a>
						    </td>
    						<td style="text-align:center;color:#000;font-weight:700;">&#8377;<?php echo $row['total_fee'];?>/</td>			 	  
    						<td style="text-align:center;color:green;font-weight:700;">
    						    <?php if(!empty($Paid_fee)){
    							    echo "&#8377;$Paid_fee/";
    							}else{
    							    echo "New Admission";
    							} ?>
    					    </td>
    						<td style="text-align:center;color:#ff0000;font-weight:700;">
    						    <?php if(!empty($Deufee)){
    							    echo "&#8377;$Deufee/";
    							}else{
    							    echo "New Admission";
    							} ?>
    						</td>
    						<td style="text-align:center;"><?php echo $row['name'];?></td>
    						<td style="text-align:center;color:#000;font-weight:700;">
    						    <?php if(!empty($Enrolment)){
    							    echo "$Enrolment";
    							}else{
    							    echo "<p style='font-weight:700;'>New Admission</p>";
    							} ?>
    						</td>
    						<td style="text-align:center;color:#000;font-weight:700;"><?php echo $row['unique_id'];?></td>			 	  
    						<td style="text-align:center;color:#000;"><?php echo $email;?></td>			 	  
    						<td style="text-align:center;"><?php echo $row['TL_option'];?></td>
    						<td style="text-align:center;"><?php echo $row['timestamp'];?></td>
    					</tr>
                        <?php } else{ ?>
    					<tr>
    						<td style="text-align:center;">
    						<a href="payment-verify-status.php?transaction_id=<?php echo $row['transaction_id']; ?>" class="label label-danger">Pending</a></td>			 	  
    						<td style="color:red;font-weight:700;text-align:center;"><?php echo $row['transaction_id'];?></td>
    						<td style="text-align:center;color:#000;font-weight:700;">&#8377;<?php echo $row['add_option_paymentt'];?>/-</td>
    						<td style="text-align:center;"><?php echo $row['mode_of_payment'];?></td>
    						<td style="text-align:center;font-weight:700;font-size:15px;"><?php echo $row['payment_date'];?></td>
    						<td style="text-align:center;">
    						    <a title="" class="widget-user-image" data-rel="prettyPhoto[gallery1]" href="PaymentSlip/<?php echo $row['PaymentSlip'];?>">
    						    <img class="img-circle PaymentImages" src="PaymentSlip/<?php echo $row['PaymentSlip'];?>" alt="User Avatar"></a>
						    </td>
    						<td style="text-align:center;font-weight:700;">&#8377;<?php echo $row['total_fee'];?>/-</td>			 	  
    						<td style="text-align:center;font-weight:700;">
    						    <?php if(!empty($Paid_fee)){
    							    echo "&#8377;$Paid_fee/";
    							}else{
    							    echo "New Admission";
    							} ?>
    					    </td>
    						<td style="text-align:center;font-weight:700;">
    						    <?php if(!empty($Deufee)){
    							    echo "&#8377;$Deufee/";
    							}else{
    							    echo "New Admission";
    							} ?>
    						</td>
    						<td style="text-align:center;"><?php echo $row['name'];?></td>
    						<td style="text-align:center;font-weight:700;">
    						    <?php if(!empty($Enrolment)){
    							    echo "$Enrolment";
    							}else{
    							    echo "<p style='font-weight:700;'>New Admission</p>";
    							} ?>
    						</td>
    						<td style="text-align:center;color:#000;font-weight:700;"><?php echo $row['unique_id'];?></td>
    						<td style="text-align:center;color:#000;"><?php echo $email;?></td>	
    						<td style="text-align:center;"><?php echo $row['TL_option'];?></td>
    						<td style="text-align:center;"><?php echo $row['timestamp'];?></td>
    					</tr>
                        <?php } ?>
    				<?php } } ?>
    		   </table>
            </div>
        </div>
    </section>
</div>
<?php include("include/footer.php");?>
<?php }else {header("location: login.php");}?>