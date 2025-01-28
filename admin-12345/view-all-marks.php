<?php
    error_reporting(0);
    include('checklogin.php');
    include("dbconnection.php");	
    include("include/header.php");
if($_SESSION['role']=="alert-message" || $_SESSION['role']=="super-admin" || $_SESSION['role'] == "docs-verification" ){

?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>View all Students Marks </h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">View all Students Marks</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    			<div style="margin-bottom:10px;"><input type="text" class="form-control enrollmentngg" id="search_param" placeholder="Enrolment , Serial No , Course , Semester , Branch , Pass Month Year...! Live Search Data"/></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="box box-info">
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table no-margin">
                                <tbody id="tbl_body">
                                <thead>
                                    <tr>
                                        <!--<th>Action</th>-->
                                        <th>Action</th>
                                        <th>Action</th>
                                        <th>Action</th>
                                        <th>Fee Details</th>
                					    <th>Enrolment</th>
                					    <th>Name</th>
                					    <th>Course</th>
                					    <th>Subject 1</th>
                						<th>Subject 2</th>
                						<th>Subject 3</th>
                						<th>Subject 4</th>
                						<th>Subject 5</th>
                						<th>Subject 6</th>
                						<th>Subject 7</th>
                						<th>Max Marks</th>
                						<th>Min Marks</th>
                						<th>Obt Marks</th>
                						<th>Stu Result</th>
                						<th>Father Name</th>
                						<th>DOB</th>
                						<th>Branch</th>
                						<th>Year</th>
                						<th>Serial No.</th>
                						<th>Month Year</th>
                						<th>Deliver Date</th> 
                						<th>Month</th> 
                						<th>Grade</th>
                                    </tr>
                                </thead>
                                <?php
            						$rowperpage = 10;
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
                						$query = mysqli_query($con,"SELECT * FROM `students_marks` WHERE CONCAT(`enrolment`,`course`,'serial_no') LIKE '%".$serach."%' ORDER BY id DESC");
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
        							$queryjoin = mysqli_query($con,"SELECT sub.subject1,sub.subject2, sub.subject3,sub.subject4,sub.subject5, sub.subject6,sub.subject7,mark.subject1,mark.subject2,mark.subject3,mark.subject4,mark.subject5,mark.subject6,mark.subject7,mark.ResultStatus FROM `semester_subject` AS sub INNER JOIN `students_marks` AS mark ON sub.enrolment = mark.enrolment AND sub.semester = mark.semester WHERE mark.enrolment = '$envl' AND mark.semester = '$sem'");
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
                                    <!--<td>
        								<form name="useredata" method="post" action="edit-result.php">
        									<input type="hidden" name="enrollmen" value="<?php //echo $rrow['enrolment'];?>">
        									<input type="hidden" name="semester" value="<?php //echo $rrow['semester'];?>">
        									<input type="submit" name="edit" value="Edit" class="btn btn-success btn-xs btn-flat btn-block MarginTops" style="">
        								</form>
        								<form name="deletedata" method="post" action="">
        									<input type="hidden" name="enrollmen" value="<?php //echo $rrow['enrolment'];?>">
        									<input type="hidden" name="semester" value="<?php //echo $rrow['semester'];?>">
        									<input type="submit" name="delete" value="Delete" class="btn btn-danger btn-xs btn-flat btn-block MarginTops" style="" onclick="return confirm('Are You Sure Want To Delete This')">
        								</form>
    								</td>-->
                                    <td>
                                        <?php if($prdata['status']==1){ ?>
                                            <a href="status-update.php?enrolment=<?php echo $row['enrolment']; ?>" class="btn btn-success btn-xs btn-flat btn-block MarginTops">1 - Approved</a>
                                        <?php } else{ ?>
                                            <a href="status-update.php?enrolment=<?php echo $row['enrolment']; ?>" class="btn btn-danger btn-xs btn-flat btn-block MarginTops">1 - Pending</a>
                                        <?php  } ?>
                                        <?php if($rrow['ResultStatus']==1){ ?>
                                            <a href="ResultActive.php?enrolment=<?php echo $row["enrolment"]; ?>&&semester=<?php echo $rrow['semester'];?>" class="btn btn-success btn-xs btn-flat btn-block MarginTops">2 - Enable Download Marks Card</a>
                                        <?php } else{ ?>
                                            <a href="ResultActive.php?enrolment=<?php echo $row["enrolment"]; ?>&&semester=<?php echo $rrow['semester'];?>" class="btn btn-danger btn-xs btn-flat btn-block MarginTops">2 - Disable Download Marks Card</a>
                                       <?php } ?>
                                    </td>
                                    <td>
                                       <?php if($rrow['ResultCertificate']==1){ ?>
                                            <a href="ResultCertificate.php?enrolment=<?php echo $row["enrolment"]; ?>&&semester=<?php echo $rrow['semester'];?>" class="btn btn-success btn-xs btn-flat btn-block MarginTops">3 - Enable Download Cerificate</a>
                                        <?php } else{ ?>
                                            <a href="ResultCertificate.php?enrolment=<?php echo $row["enrolment"]; ?>&&semester=<?php echo $rrow['semester'];?>" class="btn btn-danger btn-xs btn-flat btn-block MarginTops">3 - Disable Download Cerificate</a>
                                       <?php } ?>
                                       <?php if($rrow['ResultCmm']==1){ ?>
                                            <a href="ResultCmm.php?enrolment=<?php echo $row["enrolment"]; ?>&&semester=<?php echo $rrow['semester'];?>" class="btn btn-success btn-xs btn-flat btn-block MarginTops">4 - Enable Download CMM</a>
                                        <?php } else{ ?>
                                            <a href="ResultCmm.php?enrolment=<?php echo $row["enrolment"]; ?>&&semester=<?php echo $rrow['semester'];?>" class="btn btn-danger btn-xs btn-flat btn-block MarginTops">4 - Disable Download CMM</a>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <?php if($rrow['ResultView']==1){ ?>
            						        <a href="ResultStatus.php?enrolment=<?php echo $row["enrolment"]; ?>&&semester=<?php echo $rrow['semester'];?>" class="btn btn-success btn-xs btn-flat btn-block MarginTops">5 - Enable View Result</a>
            						    <?php } else{ ?>
            						        <a href="ResultStatus.php?enrolment=<?php echo $row["enrolment"]; ?>&&semester=<?php echo $rrow['semester'];?>" class="btn btn-danger btn-xs btn-flat btn-block MarginTops">5 - Disable View Result</a>
            						    <?php } ?>
            						    <?php if($rrow['DownloadResult']==1){ ?>
            						        <a href="DownloadResult.php?enrolment=<?php echo $row["enrolment"]; ?>&&semester=<?php echo $rrow['semester'];?>" class="btn btn-success btn-xs btn-flat btn-block MarginTops">6 - Download Marks Card</a>
            						    <?php } else{ ?>
            						        <a href="DownloadResult.php?enrolment=<?php echo $row["enrolment"]; ?>&&semester=<?php echo $rrow['semester'];?>" class="btn btn-danger btn-xs btn-flat btn-block MarginTops">6 - Download Marks Card</a>
            						    <?php } ?>
        							</td>
        							<td style="min-width:200px;">
        							    <span style="color:#007ae3;font-size:15px;font-weight:700">Semester : <?php echo $rrow['semester'];?></span><br>
        							    <span style="color:#000;font-size:15px;font-weight:700">Total Fee : <i class="fa fa-inr" aria-hidden="true"></i><?php echo $prdata['total_fee'];?>/-</span><br>
        							    <span style="color:green;font-size:15px;font-weight:700">Submit Fee : <i class="fa fa-inr" aria-hidden="true"></i><?php echo $prdata['submit_fee'];?>/-</span><br>
        							    <span style="color:#ff0000;font-size:15px;font-weight:700">Deu Fee : <i class="fa fa-inr" aria-hidden="true"></i><?php echo $prdata['deu_fee'];?>/-</span><br>
        							    <span style="color:#ff0000;font-size:15px;font-weight:700">GST Fee* : <i class="fa fa-inr" aria-hidden="true"></i><?php echo $prdata['feetax'];?>/-</span>
        						    </td> 
        						    <td><b><?php echo $rrow['enrolment'];?></b></td>
        							<td><?php echo $prdata['name']; ?></td>
        							<td><?php echo $prdata['course']; ?></td>
        							<td style="min-width: 136px;"><?php echo $joineresut[0].": <span style='color:red'>".$joineresut['subject1']."</span>"; ?></td>
        							<td style="min-width: 136px;"><?php echo $joineresut[1].": <span style='color:red'>".$joineresut['subject2']."</span>"; ?></td>
        							<td style="min-width: 136px;"><?php echo $joineresut[2].": <span style='color:red'>".$joineresut['subject3']."</span>"; ?></td>
        							<td style="min-width: 136px;"><?php echo $joineresut[3].": <span style='color:red'>".$joineresut['subject4']."</span>"; ?></td>
        							<td style="min-width: 136px;"><?php echo $joineresut[4].": <span style='color:red'>".$joineresut['subject5']."</span>"; ?></td>
        							<td style="min-width: 136px;"><?php echo $joineresut[5].": <span style='color:red'>".$joineresut['subject6']."</span>"; ?></td>
        							<td style="min-width: 136px;"><?php echo $joineresut[6].": <span style='color:red'>".$joineresut['subject7']."</span>"; ?></td>
        							<td style="min-width: 100px;"><?php echo $totammax; ?></td>
        							<td style="min-width: 100px;"><?php echo $totammin; ?></td>
        							<td style="min-width: 100px;"><?php echo $totaobt; ?></td>
        							<td style="min-width: 100px;"><?php echo $rrow['stu_result'];?></td>
        							<td style="min-width: 100px;"><?php echo $prdata['fathers_name']; ?></td>
        							<td style="min-width: 100px;"><?php echo $prdata['dob']; ?></td>
        							<td style="min-width: 100px;"><?php echo $prdata['specilization']; ?></td>
        							<td style="min-width: 100px;"><?php echo $rrow['year'];?></td>
        							<td style="min-width: 100px;"><?php echo $rrow['serial_no'];?></td>
        							<td style="min-width: 150px;"><?php echo $rrow['pass_month_year'];?></td>	
        							<td style="min-width: 180px;"><?php echo $rrow['certificated_deliver_date'];?></td>			 	  
        							<td style="min-width: 150px;"><?php echo $rrow['certificate_month'];?></td>			 	  
        							<td style="min-width: 150px;"><?php echo $rrow['certificate_grade'];?></td>
                                </tr>
                                <?php $sno ++; } ?>
                                </tbody>
                            </table>
                            <div class="row">
            					<div class="col-sm-4 col-md-4 col-lg-4 col-xs-12"></div>
            					<div class="col-sm-4 col-md-4 col-lg-4 col-xs-12">
            						<form method="post" action="" align="center">
            							<div id="div_pagination">
            								<input type="hidden" name="row" value="<?php echo $row; ?>">
            								<input type="hidden" name="allcount" value="<?php echo $allcount; ?>">
            								<input type="submit" class="btn btn-primary btn-xs btn-flat" name="but_prev" value="Previous">
            								<input type="submit" class="btn btn-warning btn-xs btn-flat" name="but_next" value="Next">
            							</div>
            						</form>
            					</div>
            					<div class="col-sm-4 col-md-4 col-lg-4 col-xs-12"></div>
            				</div>
                        </div>
                    </div>
                    <!--<div class="box-footer clearfix">
                        <a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a>
                        <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a>
                    </div>-->
                </div>
            </div>
        </div>
    </section>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $(document).on("keyup", "#search_param", function () {
        var search_param = $("#search_param").val();
        $.ajax({
            url: 'view-all-marks-ajax.php',
            type: 'POST',
            data: {search_param: search_param},
            success: function (data) {
                $("#tbl_body").html(data);
            }
        });
    });
</script>
<style>
    .Checkalldetails {
        padding: 7px 10px 7px 15px;
        font-size: 80%;
        font-weight: 700;
        margin: 0px 0px 0px 1px;
        line-height: 1;
        color: #fff;
        /*padding: 10px 10px 10px 15px;
        font-size: 80%;
        font-weight: 700;
        margin: 0px 0px 0px 1px;
        line-height: 1;
        color: #fff;*/
    }
</style>
<?php include("include/footer.php");?>
<?php }else { header("location: login.php"); } ?>