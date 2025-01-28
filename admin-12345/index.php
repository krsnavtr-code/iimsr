<?php
error_reporting(0);
include('checklogin.php');
include("dbconnection.php");
if (isset($_SESSION['email'])){	
include("include/header.php");
?>
<div class="content-wrapper">
    <section class="content-header">
        <h1> <small></small></h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-aqua">
                    <?php if($_SESSION['role']=="super-admin"){?>
                    <div class="inner">
                        <?php 
                            $query = mysqli_query($con, "SELECT * FROM `add_payment_records` ORDER BY `id` DESC");
        				    $num = mysqli_num_rows($query);
                        ?>
                        
                        <h3> <?php echo $num; ?></h3>
                        <p>New Admission</p>
                    </div>
                    <div class="icon"><i class="ion ion-bag"></i></div>
                    <a href="view-new-admission.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    <?php } ?>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-yellow">
                    <?php if($_SESSION['role']=="super-admin"){?>
                    <div class="inner">
                        <?php 
                            $query = mysqli_query($con, "SELECT * FROM `register_here` ORDER BY `id` DESC");
        				    $num = mysqli_num_rows($query);
                        ?>
                        <h3> <?php echo $num; ?></h3>
                        <p>Total Registrations</p>
                    </div>
                    <div class="icon"><i class="ion ion-person-add"></i></div>
                    <a href="view-new-registration.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    <?php } ?>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-red">
                    <div class="inner">
                        <?php
                            $query1 = "select * from add_payment_records where new_status='0'";
                            $res1 = mysqli_query($con, $query1);
                            $num1 = mysqli_num_rows($res1);
                        ?>
                        <h3><?php echo $num1; ?></h3>
                        <p>Pending Admission</p>
                    </div>
                    <?php if($_SESSION['role']=="super-admin"){?>
                        <div class="icon"><i class="ion ion-stats-bars"></i></div>
                        <a href="view-new-admission.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    <?php } ?>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-red">
                    <div class="inner">
                        <?php
                            $query = "select * from new_payment where comment_id AND sir_status='0'";
                            $res = mysqli_query($con, $query);
                            $num = mysqli_num_rows($res);
                        ?>
                        <h3><?php echo $num; ?></h3>
                        <p>Pending Payment</p>
                    </div>
                    <?php if($_SESSION['role']=="super-admin"){?>
                        <div class="icon"><i class="ion ion-pie-graph"></i></div>
                        <a href="payment-verify.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
</div>
<?php include("include/footer.php");?>
<?php }else { header("location: login.php"); } ?>