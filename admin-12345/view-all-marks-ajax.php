<?php
include("dbconnection.php");
if(isset($_POST['search_param'])){
    $search_param = mysqli_real_escape_string($con, $_POST['search_param']);
    $query = mysqli_query($con, "SELECT * FROM students_marks where enrolment like '%$search_param%' or semester like '%$search_param%' or serial_no like '%$search_param%' or year like '%$search_param%' or course like '%$search_param%' or branch like '%$search_param%' or subject1 like '%$search_param%' or subject2 like '%$search_param%' or subject3 like '%$search_param%' or subject4 like '%$search_param%' or subject5 like '%$search_param%' or subject6 like '%$search_param%' or subject7 like '%$search_param%' or total_max_marks like '%$search_param%' or total_min_marks like '%$search_param%' or stu_result like '%$search_param%' or pass_month_year like '%$search_param%' or certificated_deliver_date like '%$search_param%' or certificate_month like '%$search_param%' or certificate_grade like '%$search_param%' order by id limit 10");
    $output = '';
    if ($query->num_rows > 0) {?>
        <!--<tr>
		    <th style="min-width: 150px;">Action</th>
		    <th style="min-width: 150px;">Action</th>
		    <th style="min-width: 150px;">Action</th>
		    <th style="min-width: 200px;">Fee Details</th>
		    <th style="min-width: 150px;">Enrolment</th>
		    <th style="min-width: 150px;">Name</th>
		    <th style="min-width: 150px;">Course</th>
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
			<th style="min-width: 150px;">Branch</th>
			<th style="min-width: 150px;">Year</th>
			<th style="min-width: 150px;">Serial No.</th>
			<th style="min-width: 250px;">Pass Month Year</th>
			<th style="min-width: 250px;">Certificate Deliver Date</th> 
			<th style="min-width: 250px;">Certificate Month</th> 
			<th style="min-width: 250px;">Certificate Grade</th> 
		</tr>-->
        <?php 
            while($row = mysqli_fetch_array($query)){
            $queryper = mysqli_query($con, "SELECT * FROM `register_here` where `enrolment`='$row[enrolment]'");
			$prdata = mysqli_fetch_array($queryper);
			$output .= '<tr>
				<td>';
				    if($row["status"]==1){
				        $output .= '<a href="status-update.php?enrolment='.$row["enrolment"].'" class="btn btn-success btn-xs btn-flat btn-block Checkalldetails">1 - Approved</a>';
				    }else{
				        $output .= '<a href="status-update.php?enrolment='.$row["enrolment"].'" class="btn btn-danger btn-xs btn-flat btn-block Checkalldetails">1 - Pending</a>';
				    }
				    if($row["ResultStatus"]==1){
				        $output .= '<a href="result-markscard-update.php?enrolment='.$row["enrolment"].'&&semester='.$row['semester'].'" class="btn btn-success btn-xs btn flat btn-block Checkalldetails">2 - Enable Download Marks Card</a>';
				    }else{
				        $output .= '<a href="result-markscard-update.php?enrolment='.$row["enrolment"].'&&semester='.$row['semester'].'" class="btn btn-danger btn-xs btn flat btn-block Checkalldetails">2 - Disable Download Marks Card</a>';
				    }
			   $output .= '</td>
				<td>';
				    if($row["ResultCertificate"]==1){
				        $output .= '<a href="result-certificate-update.php?enrolment='.$row["enrolment"].'&&semester='.$row['semester'].'" class="btn btn-success btn-xs btn-flat btn-block Checkalldetails">3 - Enable Download Certificate</a>';
				    }else{
				        $output .= '<a href="result-certificate-update.php?enrolment='.$row["enrolment"].'&&semester='.$row['semester'].'" class="btn btn-danger btn-xs btn-flat btn-block Checkalldetails">3 - Disable Download Certificate</a>';
				    }
				    if($row["ResultCmm"]==1){
				        $output .= '<a href="result-cmm-update.php?enrolment='.$row["enrolment"].'&&semester='.$row['semester'].'" class="btn btn-success btn-xs btn-flat btn-block Checkalldetails">4 - Enable Download CMM</a>';
				    }else{
				        $output .= '<a href="result-cmm-update.php?enrolment='.$row["enrolment"].'&&semester='.$row['semester'].'" class="btn btn-danger btn-xs btn-flat btn-block Checkalldetails">4 - Disable Download CMM</a>';
				    }
			    $output .= '</td>
				<td>';
				    if($row["ResultView"]==1){
				        $output .= '<a href="result-view-update.php?enrolment='.$row["enrolment"].'&&semester='.$row['semester'].'" class="btn btn-success btn-xs btn-flat btn-block Checkalldetails">5 - Enable View Result</a>';
				    }else{
				        $output .= '<a href="result-view-update.php?enrolment='.$row["enrolment"].'&&semester='.$row['semester'].'" class="btn btn-danger btn-xs btn-flat btn-block Checkalldetails">5 - Disable View Result</a>';
				    }
				    if($row["DownloadResult"]==1){
				        $output .= '<a href="DownloadResult.php?enrolment='.$row["enrolment"].'&&semester='.$row['semester'].'" class="btn btn-success btn-xs btn-flat btn-block Checkalldetails">6 - Download Marks Card</a>';
				    }else{
				        $output .= '<a href="DownloadResult.php?enrolment='.$row["enrolment"].'&&semester='.$row['semester'].'" class="btn btn-danger btn-xs btn-flat btn-block Checkalldetails">6 - Download Marks Card</a>';
				    }
			    $output .= '</td>
				<td>
				    <span style="color:#007ae3;font-size:15px;font-weight:700">Semester : ' . $row['semester'] . '</span><br>
				    <span style="color:#000;font-size:15px;font-weight:700">Total Fee : ₹' . $prdata['total_fee'] . '/-</span><br>
				    <span style="color:green;font-size:15px;font-weight:700">Submit Fee : ₹' . $prdata['submit_fee'] . '/-</span><br>
				    <span style="color:#ff0000;font-size:15px;font-weight:700">Deu Fee : ₹' . $prdata['deu_fee'] . '/-</span>
				    <span style="color:#ff0000;font-size:15px;font-weight:700">GST Fee* : ₹' . $prdata['feetax'] . '/-</span>
				</td>
				<td>' . $row['enrolment'] . '</td>
				<td>' . $prdata['name'] . '</td>
				<td>' . $row['course'] . '</td>
				<td>' . $row['subject1'] . '</td>
				<td>' . $row['subject2'] . '</td>
				<td>' . $row['subject3'] . '</td>
				<td>' . $row['subject4'] . '</td>
				<td>' . $row['subject5'] . '</td>
				<td>' . $row['subject6'] . '</td>
				<td>' . $row['subject7'] . '</td>
				<td>' . $row['total_max_marks'] . '</td>
				<td>' . $row['total_min_marks'] . '</td>
				<td>' . $row['total_obt_marks'] . '</td>
				<td>' . $row['stu_result'] . '</td>
                <td>' . $row['branch'] . '</td>
                <td>' . $row['year'] . '</td>
                <td>' . $row['serial_no'] . '</td>
                <td>' . $row['pass_month_year'] . '</td>
                <td>' . $row['certificated_deliver_date'] . '</td>
                <td>' . $row['certificate_month'] . '</td>
                <td>' . $row['certificate_grade'] . '</td>
			</tr><hr style="color:#000;">';
        }
    }else{
        $output = '<tr><td colspan="4"> No result found. </td></tr>';
    }
    echo $output;
}
?>
<style>
    .Checkalldetails {
        padding: 2px 10px 3px 15px;
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