<?php

    error_reporting(0);

    include('checklogin.php');

    include("dbconnection.php");	

    include("include/header.php");

if($_SESSION['role']=="docs-verification" || $_SESSION['role']=="super-admin"){

?>

<div class="content-wrapper">

    <section class="content-header">

        <h1>

            <?php if($_SESSION['role']=="docs-verification" || $_SESSION['role']=="super-admin"){ ?>

                <i class="fa fa-arrow-circle-right" aria-hidden="true"></i> <a href="new-admission.php">Upload New Admission</a>

            <?php } ?>

            <?php if($_SESSION['role']=="super-admin"){ ?>

                <i class="fa fa-arrow-circle-right" aria-hidden="true"></i> <a href="view-new-admission.php">View New Admission</a>

            <?php }  ?>

        </h1>

        <ol class="breadcrumb">

            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>

            <li class="active">View New Admission</li>

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

        <div class="table-responsive mailbox-messages" style="overflow-x:auto; margin-bottom: 7px; height:440px;">

            <table class="table table-hover table-striped">

                <tbody>

                    <tr>

                        <td class="mailbox-star">Action</td>

                        <td class="mailbox-star">Image</td>

                        <td class="mailbox-star">Marks</td>

                        <td class="mailbox-star">Adhar</td>

                        <td class="mailbox-star">Sign</td>

                        <td class="mailbox-name"style="min-width:90px;">Unique ID</td>

                        <td class="mailbox-name"style="min-width:60px;">LE</td>

                        <td class="mailbox-name"style="min-width:200px;">Name</td>

                        <td class="mailbox-subject"style="min-width:200px;">Fathers Name </td>

                        <td class="mailbox-attachment"style="min-width:200px;">Mothers Name</td>

                        <td class="mailbox-date">Mobile No</td>

                        <td class="mailbox-date">DOB</td>

                        <td class="mailbox-date">Email</td>

                        <td class="mailbox-date"style="min-width:100px;">Discount Fee</td>

                        <td class="mailbox-date"style="min-width:100px;">Total Fee </td>

                        <td class="mailbox-date"style="min-width:100px;">First Payment </td>

                        <td class="mailbox-date"style="min-width:150px;">Payment Mode</td>

                        <td class="mailbox-date"style="min-width:100px;">Transaction Id</td>

                        <td class="mailbox-date"style="min-width:250px;">Course</td>

                        <td class="mailbox-date"style="min-width:150px;">Branch</td>

                        <td class="mailbox-date"style="min-width:150px;">Semester</td>

                        <td class="mailbox-date"style="min-width:200px;">Session</td>

                        <td class="mailbox-date"style="min-width:200px;">Current Add</td>

                        <td class="mailbox-date"style="min-width:200px;">Address</td>

                        <td class="mailbox-date"style="min-width:200px;">Counseler</td>

                    </tr>

                    <?php

            			if (isset($_GET['pageno'])) {

            				$pageno = $_GET['pageno'];

            			} else {

            				$pageno = 1;

            			}

            			$no_of_records_per_page = 10;

            			$offset = ($pageno-1) * $no_of_records_per_page;

            			

            			$query = "SELECT COUNT(*) FROM register_here";

            			$result = mysqli_query($con,$query);

            			$total_rows = mysqli_fetch_array($result)[0];

            			$total_pages = ceil($total_rows / $no_of_records_per_page);

            

            			$query = mysqli_query($con, "SELECT * FROM `add_payment_records` ORDER BY `id` desc LIMIT $offset, $no_of_records_per_page");

            			$num = mysqli_num_rows($query);

            			if($num>0){

            				if(isset($_POST['search'])){

            					$serach = $_POST['valueToSearch'];

            					$query = mysqli_query($con,"SELECT * FROM `add_payment_records` WHERE CONCAT(`name`, `email`,`date_of_birth`,`unique_id`) LIKE '%".$serach."%'");

            				}

            				while($row = mysqli_fetch_array($query)) { 

            		?>

                    <tr>

                        <td>

                            <?php if($_SESSION['role']=="super-admin"){ ?>

    						    <form class="floatData" name="useredata" method="post" action="new-registration.php">

    							    <input type="hidden" name="enrollmen" value="<?php echo $row['enrolment'];?>">

    							    <input type="submit" name="edit" value="Edit" class="btn btn-warning btn-xs btn-block ActionButtonRa" style="">

    						    </form>

    						    <form class="floatData" name="deletedata" method="post" action="">

    							    <input type="hidden" name="enrollmen" value="<?php echo $row['enrolment'];?>">

    							    <input type="submit" name="delete" value="Delete" class="btn btn-danger btn-xs btn-block ActionButtonRa" style="" onclick="return confirm('Are You Sure Want To delete')">

    						    </form>

						    <?php } ?>

                        </td>

                        <td class="mailbox-star"><img class="img-circle ImageClass" src="images/<?php echo $row['student_image'];?>" alt=""></td>

                        <td class="mailbox-star"><img class="img-circle ImageClass" src="images/<?php echo $row['marksheet'];?>" alt=""></td>

                        <td class="mailbox-star"><img class="img-circle ImageClass" src="images/<?php echo $row['adhar_card'];?>" alt=""></td>

                        <td class="mailbox-star"><img class="img-circle ImageClass" src="images/<?php echo $row['student_signature'];?>" alt=""></td>

                        <td class="mailbox-name"><b><?php echo strtoupper($row['unique_id']);?></b></td>

                        <td class="mailbox-name"><b><?php echo $row['lateral_entry'];?></b></td>

                        <td class="mailbox-name"><?php echo $row['name'];?></td>

                        <td class="mailbox-subject"><?php echo $row['father_name'];?></td>

                        <td class="mailbox-attachment"><?php echo $row['mother_name'];?> </td>

                        <td class="mailbox-date"><?php echo $row['mobile_no'];?></td>

                        <td class="mailbox-date"><?php echo $row['date_of_birth'];?></td>

                        <td class="mailbox-date"><?php echo $row['email'];?></td>

                        <td class="mailbox-date"><i class="fa fa-inr"></i><?php echo $row['discount_fee'];?>/-</td>

                        <td class="mailbox-date"><i class="fa fa-inr"></i><?php echo $row['total_fee'];?>/-</td>

                        <td class="mailbox-date"><i class="fa fa-inr"></i><?php echo $row['first_payment_amount'];?>/-</td>

                        <td class="mailbox-date"><?php echo $row['mode_of_payment'];?></td>

                        <td class="mailbox-date"><?php echo $row['first_payment_details'];?></td>

                        <td class="mailbox-date"><?php echo $row['course'];?></td>

                        <td class="mailbox-date"><?php echo $row['branch'];?></td>

                        <td class="mailbox-date"><?php echo $row['semester'];?></td>

                        <td class="mailbox-date"><?php echo $row['session'];?></td>

                        <td class="mailbox-date"><?php echo $row['current_add'];?></td>

                        <td class="mailbox-date"><?php echo $row['address'];?></td>

                        <td class="mailbox-date"><?php echo $row['admission_counseler'];?></td>

                    </tr>

                    <?php } } ?>

                </tbody>

            </table>

            <div class="row">

    			<div class="col-sm-4 col-md-4 col-lg-4 col-xs-12"></div>

    			<div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">

    				<ul class="pagination">

    					<li><a class="paginationn" href="?pageno=1">First</a></li>

    					<li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">

    						<a class="paginationn" href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>

    					</li>

    					<li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">

    						<a class="paginationn" href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>

    					</li>

    					<li><a class="paginationn" href="?pageno=<?php echo $total_pages; ?>">Last</a></li>

    				</ul>

    			</div>

    			<div class="col-sm-2 col-md-2 col-lg-2 col-xs-12"></div>

    		</div>

        </div>

    </section>

</div>

<style>

    .bg-aqua, .callout.callout-info, .alert-info, .label-info, .modal-info .modal-body {

        background-color: #020202c7 !important;

    }

</style>

<?php include("include/footer.php");?>

<?php }else { header("location: login.php"); } ?>