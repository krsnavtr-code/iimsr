<?php
error_reporting(0);
include('checklogin.php');
include("dbconnection.php");
include("include/header.php");
if($_SESSION['role'] == "send-course-detail" || $_SESSION['role']=="super-admin"){

?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>View Franchise Details<small></small></h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">View Franchise Details</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <form action="" method="post">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            				<input type="text" placeholder="Search : Enrolment , Courrse" class="form-control" name="valueToSearch">
        				</div>
        				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            				<input type="submit" placeholder="submit" name="search" class="btn btn-block btn-success btn-flat">
        				</div>
                    </div>
    			</form>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="overflow-x:auto; margin-bottom: 20px; height:530px;">
                <table class="table table-hover no-more-tables" id="tbllData" style="background-color: #fff;">
    				<tr>
    					<th style="">S.No.</th>
    					<th style="min-width: 200px;">Name</th>
    					<th style="min-width: 200px;">Mobile</th>
    					<th style="min-width: 200px;">Email</th>
    					<th style="min-width: 200px;">City</th>
    					<th style="min-width: 200px;">Subject</th>
    					<th style="min-width: 350px;">Enquiry</th>
    					<th style="min-width: 200px;">Date</th>
    				</tr>
                    <?php
                        $count = 1;
                        $query = mysqli_query($con, "SELECT * FROM `franchise_enquiry` ORDER BY `id` DESC");
                        $num = mysqli_num_rows($query);
                        if($num>0){
                            if(isset($_POST['search'])){
                                $serach = $_POST['valueToSearch'];
                                $query = mysqli_query($con,"SELECT * FROM `franchise_enquiry` WHERE CONCAT(`name`, `email`, `mobile`) LIKE '%".$serach."%'");
                            }
                        while($row = mysqli_fetch_array($query)){ 
                    ?>	  
					<tr>
						<td><?php echo $row['id'];?></td>
						<td><?php echo $row['name'];?></td>
						<td><?php echo $row['mobile'];?></td>
						<td><?php echo $row['email'];?></td>
						<td><?php echo $row['city'];?></td>
						<td><?php echo $row['subject'];?></td>
						<td><?php echo $row['enquiry'];?></td>		 	  
						<td><?php echo $row['created_datep'];?></td>		 	  
					</tr>
					<?php } } ?>
				</table>
            </div>
        </div>
    </section>
    <br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>
<?php include("include/footer.php");?>
<?php }else {header("location: login.php");}?>