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
        <h1>View Send Course<small></small></h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">View Send Course</li>
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
    					<th style="">S.No.</th>
    					<th style="max-width: 90px;color:#ff0000;font-weight:700;">Counselor Name</th>
    					<th style="min-width: 80px;">Name</th>
    					<th style="min-width: 250px;">Email</th>
    					<th style="min-width: 100px;">Mobile</th>
    					<th style="min-width: 250px;">Course</th>
    					<th style="min-width: 100px;">Fee</th>
    					<th style="min-width: 250px;">Course PDF</th>
    					<th style="min-width: 250px;">Date</th>
    				</tr>
                    <?php
                        $count = 1;
                        $query = mysqli_query($con, "SELECT * FROM `send_course_detail` ORDER BY `id` DESC");
                        $num = mysqli_num_rows($query);
                        if($num>0){
                            if(isset($_POST['search'])){
                                $serach = $_POST['valueToSearch'];
                                $query = mysqli_query($con,"SELECT * FROM `send_course_detail` WHERE CONCAT(`name`, `email`, `mobile_no`, `course`, `counselor_name`) LIKE '%".$serach."%'");
                            }
                        while($row = mysqli_fetch_array($query)){
                    ?> 
					<tr>
						<td><?php echo $row['id'];?></td>
						<td style="color:#ff    0000;font-weight:700;"><?php echo $row['counselor_name'];?></td>
						<td><?php echo $row['name'];?></td>
						<td><?php echo $row['email'];?></td>
						<td><?php echo $row['mobile_no'];?></td>
						<td><?php echo $row['course'];?></td>
						<td><?php echo $row['total_fee'];?></td>
						<td><?php echo $row['course_pdf'];?></td>		 	  
						<td><?php echo $row['send_date_time'];?></td>		 	  
					</tr>
					<?php } } ?>
				</table>
            </div>
        </div>
    </section>
<script>
function exportData(){
    var table = document.getElementById("tblStocks");
    var rows =[];
    for(var i=0,row; row = table.rows[i];i++){
        column1 = row.cells[0].innerText;
        column2 = row.cells[1].innerText;
        column3 = row.cells[2].innerText;
        column4 = row.cells[3].innerText;
        column5 = row.cells[4].innerText;
        rows.push(
            [
                column1,
                column2,
                column3,
                column4,
                column5
            ]
        );
    }
    csvContent = "data:text/csv;charset=utf-8,";
    rows.forEach(function(rowArray){
        row = rowArray.join(",");
        csvContent += row + "\r\n";
    });
    var encodedUri = encodeURI(csvContent);
    var link = document.createElement("a");
    link.setAttribute("href", encodedUri);
    link.setAttribute("download", "Course_records.csv");
    document.body.appendChild(link);
    link.click();
}
</script>
</div>
<?php include("include/footer.php");?>
<?php }else {header("location: login.php");}?>