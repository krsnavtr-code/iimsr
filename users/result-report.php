<?php 
    error_reporting(0);
    include('checklogin.php');
    include("dbconnection.php");
?>
<div class="container-scroller">
    <?php include('include/sidebar.php');?>
    <div class="container-fluid page-body-wrapper">
        <div id="theme-settings" class="settings-panel">
            <i class="settings-close mdi mdi-close"></i>
            <p class="settings-heading">SIDEBAR SKINS</p>
            <div class="sidebar-bg-options selected" id="sidebar-default-theme">
                <div class="img-ss rounded-circle bg-light border mr-3"></div> Default
            </div>
            <div class="sidebar-bg-options" id="sidebar-dark-theme">
                <div class="img-ss rounded-circle bg-dark border mr-3"></div> Dark
            </div>
            <p class="settings-heading mt-2">HEADER SKINS</p>
            <div class="color-tiles mx-0 px-4">
                <div class="tiles light"></div>
                <div class="tiles dark"></div>
            </div>
        </div>
        
        <?php include('include/header.php'); ?>
        
        <div class="main-panel">
            <div class="content-wrapper pb-0">
                <h4 class="card-title pl-4" style="text-align:center;">Download Mark card</h4>
                <div class="row">
                    <div class="col-xl-12 col-sm-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body px-0 overflow-auto">
                                <table class="table table-hover no-more-tables" style="100%;">
                					<tr>
                					    <th style="min-width: 150px;">Action</th>
                					    <th style="min-width: 150px;">Enrolment</th>
                					    <th style="min-width: 150px;">Semester</th>
                						<th style="min-width: 150px;">Name</th>
                						<th style="min-width: 150px;">Father Name</th>
                						<th style="min-width: 150px;">Course</th>
                					</tr>
                                        <?php
                                            $envl = $_SESSION['enrolment'];
                                            if(isset($_POST['search'])){
                                                $serach = $_POST['valueToSearch'];
                                                $query = mysqli_query($con,"SELECT * FROM `students_marks` WHERE CONCAT(`enrolment`,`course`) LIKE '%".$serach."%'");
                                            }
                                            else{
                                                $query = mysqli_query($con, "SELECT * FROM `students_marks` where `enrolment`='$envl'");
                                            }
                                            $num = mysqli_num_rows($query);
                                            while($row = mysqli_fetch_array($query)){
                                                $envl = $row['enrolment'];
                                                $sem = $row['semester'];
                                                $queryper = mysqli_query($con, "SELECT * FROM `register_here` where `enrolment`='$envl'");
                                                $prdata = mysqli_fetch_array($queryper);
                                                $queryjoin = mysqli_query($con,"SELECT sub.subject1,sub.subject2, sub.subject3,sub.subject4,sub.subject5, sub.subject6,sub.subject7,mark.subject1,mark.subject2,mark.subject3,mark.subject4,mark.subject5,mark.subject6,mark.subject7,mark.ResultStatus FROM `semester_subject` AS sub INNER JOIN `students_marks` AS mark ON sub.enrolment = mark.enrolment WHERE mark.enrolment = '$envl' AND mark.semester = '$sem'");
                                                $joineresut = mysqli_fetch_array($queryjoin);
                                            if($joineresut['ResultStatus']==1){
                                        ?>
                					<tr>
                					    <td>
                						    <button onclick="printresult(<?php echo "'".$row['enrolment']."'".","."'".$row['semester']."'".","."'".$prdata['course']."'"; ?>)" class="btn btn-warning btn-block PrintCrystelReport"> Print & Download Marks Card</button>
                						</td>
                						<td><b><?php echo strtoupper($row['enrolment']); ?></b></td>
                						<td><?php echo $row['semester']; ?></td>
                						<td><?php echo $prdata['name']; ?></td>
                						<td><?php echo $prdata['fathers_name']; ?></td>
                						<td><?php echo $prdata['course']; ?></td>
                					</tr>
                					<?php } } ?>
                		        </table>
                		        
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="row" style="display:none;">
            	    <div class="col-sm-12" id="dvContents">
            	        <div id="printdata"></div>
            	    </div>
            	</div>
            </div>
            <?php include("include/footer.php"); ?>
        </div>
    </div>
</div>
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
        var divContents = document.getElementById("dvContents").innerHTML;
        printWindow.document.write(divContents);
        printWindow.document.write('</body>');
        printWindow.document.write('</html>');
        printWindow.document.close();
        printWindow.print();
    }
</script>
<script type="text/javascript">
    function printresult(enrolment,semester,course){
        $.ajax({
            type: "post",
            url: "result-print.php",
            data: {enrolment:enrolment,semester:semester,course:course},
            success: function(data){
                $('#printdata').html(data);
                $("#printdata").printMee({
                    "path" : ["result-print.css"]
                });
            }
        });
    }
</script>
<style>
	.PrintCrystelReport{
	    border-radius:0px;
	}
</style>

