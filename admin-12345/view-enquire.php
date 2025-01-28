<?php
error_reporting(0);
include('checklogin.php');
include("dbconnection.php");
include("include/header.php");
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;
if($_SESSION['role']=="super-admin"){

?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>View Enquire Data<small></small></h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">View Enquire Data</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <form action="" method="post">
                    <div class="row">
                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
            				<input type="text" placeholder="Search : Enrolment , Courrse" class="form-control" name="valueToSearch">
        				</div>
        				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            				<input type="submit" value="Search" name="search" class="btn btn-block btn-success btn-flat">
        				</div>
                    </div>
    			</form>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="overflow-x:auto;height:530px;">
                <table class="table table-hover no-more-tables" id="tbllData" style="background-color: #fff;">
    				<tr>
					    <th>Status</th>
					    <th>Delete</th>
					    <th style="min-width: 200px;">Date</th>
					    <th style="min-width: 150px;">Name</th>
						<th style="min-width: 150px;">Phone</th>
						<th style="min-width: 150px;">Email</th>
						<th style="min-width: 292px;">Course</th>
						<th>Other Course</th>
					</tr>
                    <?php
                        $query = mysqli_query($con, "SELECT * FROM `enquiries` ORDER BY `id` desc");
                        $num = mysqli_num_rows($query);
                        if($num>0){
                            if(isset($_POST['search'])){
                                $serach = $_POST['valueToSearch'];
                                $query = mysqli_query($con,"SELECT * FROM `enquiries` WHERE CONCAT(`name`, `phone`,`email`,`courses`) LIKE '%".$serach."%'");
                            }
                        while($row = mysqli_fetch_array($query)){
                    ?>	
                    <tr>
                        <td>
                            <a class="btn btn-primary btn-xs ActionButtonRa" href="approve.php?id=<?php echo $row['id']; ?>&action=update"><?php if($row['status']==0){ echo "Under Process"; }else{ echo"processed"; } ?></a>
                        </td>
                        <td>
                            <a class="btn btn-danger btn-xs ActionButtonRa" href="approve.php?id=<?php echo $row['id']; ?>&action=delete">Delete</a>
                        </td>
                        <td><?php echo $row['submit_time'];?></td>
                        <td><?php echo $row['name'];?></td>
                        <td><?php echo $row['phone'];?></td>
                        <td><?php echo $row['email'];?></td>
                        <td><?php echo $row['courses'];?></td>
                        <td><?php echo $row['other_course'];?></td>
                    </tr>
                    <?php } } ?>
                </table>
            </div>
        </div>
    </section>
</div>
<?php include("include/footer.php");?>
<?php }else {header("location: login.php");}?>