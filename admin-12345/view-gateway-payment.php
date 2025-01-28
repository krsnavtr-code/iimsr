<?php
error_reporting(0);
include('checklogin.php');
include("dbconnection.php");
include("include/header.php");
if($_SESSION['role']=="super-admin"){

?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>View Gateway Payment<small></small></h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">View Gateway Payment</li>
        </ol>
    </section>
    <section class="content">
        
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="overflow-x:auto; margin-bottom: 20px; height:530px;">
                <table class="table table-hover no-more-tables" id="tbllData" style="background-color: #fff;">
    				<tr>
					    <th style="min-width: 100px;text-align:center;">Order Id</th>
						<th style="min-width: 100px;text-align:center;">Payment Id</th>
						<th style="min-width: 100px;text-align:center;">Amount</th>
						<th style="min-width: 150px;text-align:center;">Email</th>
						<th style="min-width: 150px;text-align:center;">Status</th>
						<th style="min-width: 150px;text-align:center;">Order Time</th>
					</tr>
                    <?php
                        $query = mysqli_query($con, "SELECT * FROM `order_payment`");
                        $num = mysqli_num_rows($query);
                        while($row = mysqli_fetch_array($query)) { 
                    ?>	
					<tr>
					    <td style="text-align:center;"><?php echo $row['order_id'];?></td>
					    <td style="text-align:center;"><?php echo $row['razorpay_payment_id'];?></td>
					    <td style="text-align:center;"><?php echo $row['price'];?></td>			 	  
						<td style="text-align:center;"><?php echo $row['email'];?></td>
						<td style="text-align:center;"><?php echo $row['status'];?></td>
						<td style="text-align:center;"><?php echo $row['order_time'];?></td>	 	  
					</tr>	
					<?php }  ?>
				</table>
            </div>
        </div>
    </section>
</div>
<?php include("include/footer.php");?>
<?php }else {header("location: login.php");}?>