<?php
error_reporting(0);
include('checklogin.php');
include("dbconnection.php");
include("include/header.php");
if($_SESSION['role'] == "docs-verification" || $_SESSION['role']=="super-admin"){
?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>View Result<small></small></h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">View Result</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div style="margin-bottom:10px;"><input type="text" class="form-control" id="search_param" placeholder="Enrolment , Serial No , Course , Semester , Branch , Pass Month Year...! Live Search Data"/></div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="overflow-x:auto; margin-bottom: 20px; height:490px;">
                <table class="table table-hover no-more-tables" id="tbllData" style="background-color: #fff;">
                    <tbody id="tbl_body">
        				<tr>
                            <th>Action</th>
                            <th style="min-width: 150px;">Enrolment</th>
                            <th style="min-width: 150px;">Name</th>
                            <th style="min-width: 150px;">Course</th>
                            <th style="min-width: 150px;">Semester</th>
                            <th style="min-width: 150px;">Subject 1</th>
                            <th style="min-width: 150px;">Subject 2</th>
                            <th style="min-width: 150px;">Subject 3</th>
                            <th style="min-width: 150px;">Subject 4</th>
                            <th style="min-width: 150px;">Subject 5</th>
                            <th style="min-width: 150px;">Subject 6</th>
                            <th style="min-width: 150px;">Subject 7</th>
                            <th style="min-width: 100px;">Max Marks</th>
                            <th style="min-width: 100px;">Min Marks</th>
                            <th style="min-width: 100px;">Obt Marks</th>
                            <th style="min-width: 100px;">Stu Result</th>
                            <th style="min-width: 150px;">Father Name</th>
                            <th style="min-width: 150px;">DOB</th>
                            <th style="min-width: 150px;">Branch</th>
                            <th style="min-width: 150px;">Year</th>
                            <th style="min-width: 150px;">Serial No.</th>
                            <th style="min-width: 250px;">Pass Month Year</th>
                            <th style="min-width: 250px;">Certificated Deliver Date</th> 
                            <th style="min-width: 250px;">Certificate Month</th> 
                            <th style="min-width: 250px;">Certificate Grade</th> 
                        </tr>
                        <?php
                            $rowperpage = 40;
                            $row = 0;
                            if(isset($_POST['but_prev'])){
                                $row = $_POST['row'];
                                $row -= $rowperpage;
                                if( $row < 0 ){
                                    $row = 0;
                                }
                            }
                            if(isset($_POST['but_next'])){
                                $row = $_POST['row'];
                                $allcount = $_POST['allcount'];
                                $val = $row + $rowperpage;
                                if( $val < $allcount ){
                                    $row = $val;
                                }
                            }
                            if(isset($_POST['search'])){
                                $serach = $_POST['valueToSearch'];
                                $query = mysqli_query($con,"SELECT * FROM `students_marks` WHERE CONCAT(`enrolment`, `semester`, `serial_no`) LIKE '%".$serach."%' ORDER BY id DESC");
                            }else{
                                $query = mysqli_query($con, "SELECT * FROM `students_marks` ORDER BY id DESC");
                            }
                            $num = mysqli_num_rows($query);
                            $sql = "SELECT COUNT(*) AS cntrows FROM students_marks";
                            $result = mysqli_query($con,$sql);
                            $fetchresult = mysqli_fetch_array($result);
                            $allcount = $fetchresult['cntrows'];
                            $sql = "SELECT * FROM students_marks ORDER BY ID ASC limit $row,".$rowperpage;
                            $result = mysqli_query($con,$sql);
                            $sno = $row + 1;
                        while($rrow = mysqli_fetch_array($result)){
                            $envl = $rrow['enrolment'];
                            $sem = $rrow['semester'];
                            $totammax = 0;
                            $totammin = 0;
                            $totaobt = 0;
                            $queryper = mysqli_query($con, "SELECT * FROM `register_here` where `enrolment`='$envl'");
                            $prdata = mysqli_fetch_array($queryper);
                            $queryjoin = mysqli_query($con,"SELECT sub.subject1,sub.subject2, sub.subject3,sub.subject4,sub.subject5, sub.subject6,sub.subject7,mark.subject1,mark.subject2,mark.subject3,mark.subject4,mark.subject5,mark.subject6,mark.subject7 FROM `semester_subject` AS sub INNER JOIN `students_marks` AS mark ON sub.enrolment = mark.enrolment AND sub.semester = mark.semester WHERE mark.enrolment = '$envl' AND mark.semester = '$sem'");
                            $joineresut = mysqli_fetch_array($queryjoin);
                            if(!empty($joineresut['subject1'])){
                                $totammax += 100;
                                $totammin += 40;
                                $totaobt +=$joineresut['subject1'];
                            }if(!empty($joineresut['subject2'])){
                                $totammax += 100;
                                $totammin += 40;
                                $totaobt +=$joineresut['subject2'];
                            }if(!empty($joineresut['subject3'])){
                                $totammax += 100;
                                $totammin += 40;
                                $totaobt +=$joineresut['subject3'];
                            }if(!empty($joineresut['subject4'])){
                                $totammax += 100;
                                $totammin += 40;
                                $totaobt +=$joineresut['subject4'];
                            }if(!empty($joineresut['subject5'])){
                                $totammax += 100;
                                $totammin += 40;
                                $totaobt +=$joineresut['subject5'];
                            }if(!empty($joineresut['subject6'])){
                                $totammax += 100;
                                $totammin += 40;
                                $totaobt +=$joineresut['subject6'];
                            }if(!empty($joineresut['subject7'])){
                                $totammax += 100;
                                $totammin += 40;
                                $totaobt +=$joineresut['subject7'];
                            }
                        ?>
                        <tr>
                            <td style="min-width: 170px;">
                                <form name="useredata" method="post" action="edit-result.php">
                                    <input type="hidden" name="enrollmen" value="<?php echo $rrow['enrolment'];?>">
                                    <input type="hidden" name="semester" value="<?php echo $rrow['semester'];?>">
                                    <input type="submit" name="edit" value="Edit" class="btn btn-warning btn-xs EditDelete" style="float:left;">
                                </form>
                                <form name="deletedata" method="post" action="">
                                    <input type="hidden" name="enrollmen" value="<?php echo $rrow['enrolment'];?>">
                                    <input type="hidden" name="semester" value="<?php echo $rrow['semester'];?>">
                                    <input type="submit" name="delete" value="Delete" class="btn btn-danger btn-xs DeleteEdit" onclick="return confirm('Are You Sure Want To Delete This')">
                                </form>
                                <?php if($prdata['status']==1){ ?>
                                    <a href="view-result-update-.php?enrolment=<?php echo $row['enrolment']; ?>" class="btn btn-success btn-xs ApprPending">Approved</a>
                                <?php } else{ ?>
                                    <a href="view-result-update-.php?enrolment=<?php echo $row['enrolment']; ?>" class="btn btn-danger btn-xs ApprPending">Pending</a>
                                <?php } ?>
                            </td>
                            <td><b><?php echo $rrow['enrolment'];?></b></td> 
                            <td><?php echo $prdata['name']; ?></td>
                            <td><?php echo $prdata['course']; ?></td>
                            <td><?php echo $rrow['semester'];?></td>
                            <td style="min-width: 136px;"><?php echo $joineresut[0].": <span style='color:red'>".$joineresut['subject1']."</span>"; ?></td>
                            <td style="min-width: 136px;"><?php echo $joineresut[1].": <span style='color:red'>".$joineresut['subject2']."</span>"; ?></td>
                            <td style="min-width: 136px;"><?php echo $joineresut[2].": <span style='color:red'>".$joineresut['subject3']."</span>"; ?></td>
                            <td style="min-width: 136px;"><?php echo $joineresut[3].": <span style='color:red'>".$joineresut['subject4']."</span>"; ?></td>
                            <td style="min-width: 136px;"><?php echo $joineresut[4].": <span style='color:red'>".$joineresut['subject5']."</span>"; ?></td>
                            <td style="min-width: 136px;"><?php echo $joineresut[5].": <span style='color:red'>".$joineresut['subject6']."</span>"; ?></td>
                            <td style="min-width: 136px;"><?php echo $joineresut[6].": <span style='color:red'>".$joineresut['subject7']."</span>"; ?></td>
                            <td><?php echo $totammax; ?></td>
                            <td><?php echo $totammin; ?></td>
                            <td><?php echo $totaobt; ?></td>
                            <td><?php echo $rrow['stu_result'];?></td>
                            <td><?php echo $prdata['fathers_name']; ?></td>
                            <td><?php echo $prdata['dob']; ?></td>
                            <td><?php echo $prdata['specilization']; ?></td>
                            <td><?php echo $rrow['year'];?></td>
                            <td><?php echo $rrow['serial_no'];?></td>
                            <td><?php echo $rrow['pass_month_year'];?></td>	
                            <td><?php echo $rrow['certificated_deliver_date'];?></td>			 	  
                            <td><?php echo $rrow['certificate_month'];?></td>			 	  
                            <td><?php echo $rrow['certificate_grade'];?></td>
                        </tr>
                        <?php $sno ++; } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
			<div class="col-sm-4 col-md-4 col-lg-4 col-xs-12"></div>
			<div class="col-sm-4 col-md-4 col-lg-4 col-xs-12">
				<form method="post" action="" align="center">
					<div id="div_pagination">
						<input type="hidden" name="row" value="<?php echo $row; ?>">
						<input type="hidden" name="allcount" value="<?php echo $allcount; ?>">
						<input type="submit" class="btn btn-primary btn-xs btn-flat Previousnext" name="but_prev" value="Previous">
						<input type="submit" class="btn btn-warning btn-xs btn-flat Previousnext" name="but_next" value="Next">
					</div>
				</form>
			</div>
			<div class="col-sm-4 col-md-4 col-lg-4 col-xs-12"></div>
		</div>
    </section>
</div>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
<script>
    $(document).on("keyup", "#search_param", function () {
        var search_param = $("#search_param").val();
        $.ajax({
            url: 'view-result-search.php',
            type: 'POST',
            data: {search_param: search_param},
            success: function (data) {
                $("#tbl_body").html(data);
            }
        });
    });
</script>
<?php include("include/footer.php");?>
<?php }else {header("location: login.php");}?>