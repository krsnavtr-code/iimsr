<?php
error_reporting(0);
include('checklogin.php');
include("dbconnection.php");
include("include/header.php");
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;
/*if($_SESSION['role'] == "docs-verification" || $_SESSION['role']=="super-admin"){*/
if($_SESSION['role']=="super-admin"){

?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Result Certificate<small></small></h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Result Certificate</li>
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
				    <th style="min-width: 150px;">Action</th>
				    <th style="min-width: 150px;">Enrolment</th>
					<th style="min-width: 150px;">Name</th>
					<th style="min-width: 150px;">Father Name</th>
					<th style="min-width: 150px;">Course</th>
					<th style="min-width: 150px;">Branch</th>
				</tr>
				<?php
				  if(isset($_POST['search'])){
					$serach = $_POST['valueToSearch'];
					$query = mysqli_query($con,"SELECT * FROM `students_marks` WHERE CONCAT(`enrolment`,`course`,`branch`) LIKE '%".$serach."%'");
					}else{
					    $query = mysqli_query($con, "SELECT * FROM `students_marks`");
					}
				    $array = array();
					while($row = mysqli_fetch_array($query)){
					  $envl = $row['enrolment'];
					  $sem = $row['semester'];
					  $sem = $row['branch'];
					  $queryper = mysqli_query($con, "SELECT * FROM `register_here` where `enrolment`='$envl'");
					  $prdata = mysqli_fetch_array($queryper);
				    if(!empty($row['certificate_month'] && $row['certificated_deliver_date'])){
						
					?>	
					<tr>
					    <?php //if($row['DownloadResult']==1){ ?>
					    <td>
						    <button onclick="printcfunction(<?php echo "'".$row['enrolment']."'".","."'".$row['semester']."'".","."'".$prdata['course']."'".","."'".$row['branch']."'"; ?>)" class="btn btn-block btn-success btn-xs ActionButtonRa"> Print Certificate</button>
						</td>
						<?php //}else{ ?>
						    <!--<td>
						        <button class="btn btn-block btn-danger btn-xs ActionButtonRa"> Print Certificate</button>
						    </td>-->
						<?php //} ?>
						<td><b><?php echo strtoupper($row['enrolment']);?></b></td>
						<td><?php echo $prdata['name']; ?></td>
						<td><?php echo $prdata['fathers_name']; ?></td>
						<td><?php echo $prdata['course']; ?></td>
						<td><?php echo $row['branch']; ?></td>
					</tr>
					<?php } } ?>
			   </table>
			   <div class="row">
                    <div class="col-sm-12">
                        <div id="printdata"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script type="text/javascript">
    	function printcfunction(enrollement,semester,course,branch){
    	     $.ajax({
    			 type: "post",
    			 url: "result-certificate-print.php",
    			 data: {enrollement:enrollement,semester:semester,course:course,branch:branch},
    			 success: function(data){
    			   
    			 $('#printdata').html(data);
    			 $("#printdata").printMe({
    				"path" : ["result-print.css"]
    			});
    			}
    		});
    	}
   </script>
</div>
<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
    }
</style>
<?php include("include/footer.php");?>
<?php }else {header("location: login.php");}?>