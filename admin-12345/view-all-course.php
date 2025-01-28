<?php

error_reporting(0);

include('checklogin.php');

// include("dbconnection.php");

// include("include/header.php");

if($_SESSION['role']=="add-course" || $_SESSION['role']=="super-admin"){



?>

<div class="content-wrapper">

    <section class="content-header">

        <h1>View All Courses<small></small></h1>

        <ol class="breadcrumb">

            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>

            <li class="active">View All Courses</li>

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

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="overflow-x:auto; margin-bottom: 20px; height:440px;">

                <table class="table table-hover no-more-tables" id="tbllData" style="background-color: #fff;">

    				<tr>

					    <th>Action</th>

						<th style="min-width: 150px;">Course</th>

						<th style="min-width: 150px;">Branch</th>

						<th style="min-width: 150px;">Semester</th>

						<th style="min-width: 150px;">Total Fee</th>

						<th style="min-width: 150px;">Eligibility</th>

						<th style="min-width: 150px;">subject 1</th>

						<th style="min-width: 150px;">subject 2</th>

						<th style="min-width: 150px;">subject 3</th>

						<th style="min-width: 150px;">subject 4</th>

						<th style="min-width: 150px;">subject 5</th>

						<th style="min-width: 150px;">subject 6</th>

						<th style="min-width: 150px;">subject 7</th>

						<th style="min-width: 150px;">Max Mark</th>

						<th style="min-width: 150px;">Min Mark</th>

					</tr>

					<?php

                        if(isset($_POST['search'])){

    						$serach = $_POST['valueToSearch'];

    						$query = mysqli_query($con,"SELECT * FROM `course` WHERE CONCAT(`course`) LIKE '%".$serach."%'");

    					}else{

    					    $query = mysqli_query($con, "SELECT * FROM `course` ORDER BY `course`");

    					}

    				    $num = mysqli_num_rows($query);

    					while($row = mysqli_fetch_array($query)){

					?>

					<tr>

					    <td style="min-width: 154px !important;">

					        <form name="useredata" method="post" action="newcourseregister.php">

							    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

							    <input type="submit" name="edit" value="Edit" class="btn btn-warning btn-xs btn-flat" style="margin:5px;float: left;">

						    </form>

						    <form name="deletedata" method="post" action="">

							    <input type="hidden" name="id" value="<?php echo $row['id'];?>">

							    <input type="submit" name="delete" value="Delete" class="btn btn-danger btn-xs btn-flat" style="margin:5px" onclick="return confirm('Are you sure you want to delete ?');">

						    </form>

					    </td>

						<td><?php echo $row['course']; ?></td>

						<td><?php echo $row['branch']; ?></td>

						<td><?php echo $row['semester']; ?></td>

						<th style="min-width: 150px;"><?php echo $row['total_fee']; ?></th>

					    <th style="min-width: 150px;"><?php echo $row['eligibility']; ?></th>

						<td><?php echo $row['subject1']; ?></td>

						<td><?php echo $row['subject2']; ?></td>

						<td><?php echo $row['subject3']; ?></td>

						<td><?php echo $row['subject4']; ?></td>

						<td><?php echo $row['subject5']; ?></td>

						<td><?php echo $row['subject6']; ?></td>

						<td><?php echo $row['subject7']; ?></td>

						<td><?php echo $row['max_mark']; ?></td>

						<td><?php echo $row['min_mark']; ?></td>			 	  

					</tr>

					<?php } ?>

				</table>

				<?php

            		if(isset($_POST['delete'])){

                        $id = (int) $_POST['id'];

                        $resu = mysqli_query($con, "DELETE FROM `course` WHERE `id`=$id");

                    }

        		?>

            </div>

        </div>

    </section>

</div>

<?php include("include/footer.php");?>

<?php }else {header("location: login.php");}?>