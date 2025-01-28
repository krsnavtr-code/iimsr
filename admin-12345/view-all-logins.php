<?php
error_reporting(0);
include('checklogin.php');
include("dbconnection.php");
include("include/header.php");
if($_SESSION['role']=="super-admin"){
?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>View All Login Access<small></small></h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">View All Login Access</li>
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
                <table class="table table-hover no-more-tables" style="background-color: #fff;">
    				<tr>
        				<th style="min-width: 100px;">E-mail</th>
        				<th style="min-width: 100px;">Password</th>
        				<th style="min-width: 100px;">Role</th>
        				<th style="min-width: 100px;">Activation Code</th>
        				<th style="min-width: 150px;">Date</th>
        				<th style="min-width: 150px;">Change Password</th>
        			</tr>
                    <?php
                        $count = 1;
                        $query = mysqli_query($con, "SELECT * FROM `admin` ORDER BY `id` ASC");
                        $num = mysqli_num_rows($query);
                        if($num>0){
                            if(isset($_POST['search'])){
                                $serach = $_POST['valueToSearch'];
                                $query = mysqli_query($con,"SELECT * FROM `admin` WHERE CONCAT(`email`, `role`) LIKE '%".$serach."%'");
                            }
                        while($row = mysqli_fetch_array($query)){ 
                    ?>
                    <tr>
                        <td><?php echo $row['email'];?></td>
                        <td><?php echo $row['password'];?></td>
                        <td><?php echo $row['role'];?></td>
                        <td><b><?php echo $row['activation_code'];?></b></td>
                        <td><?php echo $row['timestamp'];?></td>
                        <td><a href="password-reset-2.php" class="btn btn-block btn-primary btn-xs ActionButtonRa">Reset Password</a></td>			 	  
                    </tr>
                    <?php } } ?>
                </table>
            </div>
        </div>
    </section>
</div>
<?php include("include/footer.php");?>
<?php }else {header("location: login.php");}?>