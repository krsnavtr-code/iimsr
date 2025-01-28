<?php
error_reporting(0);
include('checklogin.php');
include("dbconnection.php");
include("include/header.php");

/*if($_SESSION['role'] == "docs-verification" || $_SESSION['role']=="super-admin"){*/
if($_SESSION['role']=="super-admin"){

?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Result Marks Card<small></small></h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Result Marks Card</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <form action="" method="post">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            				<input type="text" placeholder="Search : Enrolment , Course" class="form-control" name="valueToSearch">
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
					    <th style="min-width: 150px;">Action</th>
					    <th style="min-width: 150px;">Enrolment</th>
						<th style="min-width: 150px;">Name</th>
						<th style="min-width: 150px;">Father's Name</th>
						<th style="min-width: 150px;">Course</th>
						<th style="min-width: 150px;">Semester</th>
					</tr>
					    <?php
    						$rowperpage = 30;
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
    					?>
                        <?php
                            if(isset($_POST['search'])){
                                $serach = $_POST['valueToSearch'];
                                $query = mysqli_query($con,"SELECT * FROM `students_marks` WHERE CONCAT(`enrolment`,`semester`) LIKE '%".$serach."%'");
                            }
                            else{
                                $query = mysqli_query($con, "SELECT * FROM `students_marks`");
                            }
                            $num = mysqli_num_rows($query);
    						$sql = "SELECT COUNT(*) AS cntrows FROM students_marks";
    						$result = mysqli_query($con,$sql);
    						$fetchresult = mysqli_fetch_array($result);
    						$allcount = $fetchresult['cntrows'];
    						$sql = "SELECT * FROM students_marks ORDER BY ID ASC limit $row,".$rowperpage;
    						$result = mysqli_query($con,$sql);
    						$sno = $row + 1;
                            while($row = mysqli_fetch_array($query)){
                                $envl = $row['enrolment'];
                                $sem = $row['semester'];
                                $queryper = mysqli_query($con, "SELECT * FROM `register_here` where `enrolment`='$envl'");
                                $prdata = mysqli_fetch_array($queryper);
                                $queryjoin = mysqli_query($con,"SELECT sub.subject1,sub.subject2, sub.subject3,sub.subject4,sub.subject5, sub.subject6,sub.subject7,mark.subject1,mark.subject2,mark.subject3,mark.subject4,mark.subject5,mark.subject6,mark.subject7,mark.DownloadResult, mark.ResultStatus FROM `semester_subject` AS sub INNER JOIN `students_marks` AS mark ON sub.enrolment = mark.enrolment WHERE mark.enrolment = '$envl' AND mark.semester = '$sem'");
                                $joineresut = mysqli_fetch_array($queryjoin);
                        ?>
					<tr>
					    <?php if($joineresut['DownloadResult']==1){ ?>
    					    <td>
    						    <button onclick="printresultt(<?php echo "'".$row['enrolment']."'".","."'".$row['semester']."'".","."'".$prdata['course']."'"; ?>)" class="btn btn-block btn-primary btn-flat ActionButtonRa"> Print Marks card</button>
    						</td>
						<?php }else{ ?>
						    <td>
						        <button class="btn btn-danger btn-block btn-flat ActionButtonRa"> Print Marks card</button>
						    </td>
						<?php } ?>
						<td><b><?php echo strtoupper($row['enrolment']); ?></b></td>
						<td><?php echo $prdata['name']; ?></td>
						<td><?php echo $prdata['fathers_name']; ?></td>
						<td><?php echo $prdata['course']; ?></td>
						<td><?php echo $row['semester']; ?></td>
					</tr>
					<?php } ?>
		        </table>
            </div>
            <div class="row">
				<div class="col-sm-4 col-md-4 col-lg-4 col-xs-12"></div>
				<div class="col-sm-4 col-md-4 col-lg-4 col-xs-12">
					<form method="post" action="" align="center">
						<div id="div_pagination">
							<input type="hidden" name="row" value="<?php echo $row; ?>">
							<input type="hidden" name="allcount" value="<?php echo $allcount; ?>">
							<input type="submit" class="btn btn-block btn-primary btn-xs ActionButtonRa" name="but_prev" value="Previous">
							<input type="submit" class="btn btn-block btn-warning btn-xs ActionButtonRa" name="but_next" value="Next">
						</div>
					</form>
				</div>
				<div class="col-sm-4 col-md-4 col-lg-4 col-xs-12"></div>
			</div>
			<div class="row">
        	    <div class="col-sm-12">
        	        <div id="printdataa"></div>
        	    </div>
        	</div>
        </div>
    </section>
<script type="text/javascript">
    function printresult() {
        var printWindow = window.open('', '', 'height=200,width=400');
        printWindow.document.write('<html><head><title>Table Contents</title>');
        var table_style = document.getElementById("table_style").innerHTML;
        printWindow.document.write('<style type = "text/css">');
        printWindow.document.write(table_style);
        printWindow.document.write('</style>');
        printWindow.document.write('</head>');
        printWindow.document.write('<body>');
        var divContents = document.getElementById("dvContentss").innerHTML;
        printWindow.document.write(divContents);
        printWindow.document.write('</body>');
        printWindow.document.write('</html>');
        printWindow.document.close();
        printWindow.print();
    }
</script>
<script type="text/javascript">
    function printresultt(enrolment,semester,course){
        $.ajax({
            type: "post",
            url: "result-marks-print.php",
            data: {enrolment:enrolment,semester:semester,course:course},
            success: function(data){
                $('#printdataa').html(data);
                $("#printdataa").printMe({
                    "path" : ["result-print.css"]
                });
            }
        });
    }
</script>
<style>
    table {
        font-family: arial, sans-serif;
    }
</style>
</div>
<?php include("include/footer.php");?>
<?php }else {header("location: login.php");}?>