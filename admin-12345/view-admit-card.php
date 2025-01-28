<?php
error_reporting(0);
include('checklogin.php');
include("dbconnection.php");
include("include/header.php");
if($_SESSION['role'] == "docs-verification" || $_SESSION['role']=="super-admin"){

?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>View Admit Card<small></small></h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">View Admit Card</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <form action="" method="post">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            				<input type="text" placeholder="Search : Enrolment , Courrse, Exam Unique Code" class="form-control" name="valueToSearch">
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
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <?php
        			$query = mysqli_query($con, "SELECT * FROM `admit_card`  ORDER BY `id` desc");
        			$num = mysqli_num_rows($query);
        			if($num>0){
        				if(isset($_POST['search'])){
        					$serach = $_POST['valueToSearch'];
        					$query = mysqli_query($con,"SELECT * FROM `admit_card` WHERE CONCAT(`sname`, `enrolment`,`course`,`semester`,`date_of_exami`,`exami_unique_code`) LIKE '%".$serach."%'");
        				}
        				while($row = mysqli_fetch_array($query)){ 
        		?>
                <div class="row">
                    <div class="col-sm-10 col-xs-10">
                        <div class="row">
                            <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
                                <div class="">Name : <b><?php echo $row['sname']; ?></b></div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
                                <div class="">Father's Name : <b><?php echo $row['father_name']; ?></b></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
                                <div class="">Date Of Birth : <b><?php echo $row['sdob']; ?></b></div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
                                <div class="">Semester : <b><?php echo $row['semester']; ?></b></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
                                <div class="">Course Name : <b><span style="font-size:12px;"><?php echo $row['course']; ?></span></b></div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
                                <div class="">Session : <b><?php echo $row['session']; ?></b></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
                                <div class="">Date Of Examination : <b><?php echo $row['date_of_exami']; ?></b></div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
                                <div class="">Examination Code : <b><?php echo $row['exami_unique_code']; ?></b></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2 col-xs-12">
                        <img src="images/<?php echo $row['stuimage']; ?>" alt="pic" style="width:84px; height:70px;"><br>
                        <img src="images/vbimtsignature.jpeg" alt="sign"style="width:84px; height:40px;">
                    </div>
                </div><hr class="hrrr">
                <?php } }?>
            </div>
        </div>
    </section>
</div>
<?php include("include/footer.php");?>
<?php }else {header("location: login.php");}?>