<?php
include("dbconnection.php");
if(isset($_POST['search_param'])){
    $search_param = mysqli_real_escape_string($con, $_POST['search_param']);
    $query = mysqli_query($con, "SELECT * FROM students_marks where enrolment like '%$search_param%' or semester like '%$search_param%' or serial_no like '%$search_param%' or year like '%$search_param%' or course like '%$search_param%' or branch like '%$search_param%' or subject1 like '%$search_param%' or subject2 like '%$search_param%' or subject3 like '%$search_param%' or subject4 like '%$search_param%' or subject5 like '%$search_param%' or subject6 like '%$search_param%' or subject7 like '%$search_param%' or total_max_marks like '%$search_param%' or total_min_marks like '%$search_param%' or stu_result like '%$search_param%' or pass_month_year like '%$search_param%' or certificated_deliver_date like '%$search_param%' or certificate_month like '%$search_param%' or certificate_grade like '%$search_param%' order by id limit 20");
    $output = '';
    if ($query->num_rows > 0) {?>
        <tr>
		    <th>Action</th>
		    <th style="min-width: 150px;">Enrolment</th>
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
			<th style="min-width: 150px;">Branch</th>
			<th style="min-width: 150px;">Year</th>
			<th style="min-width: 150px;">Serial No.</th>
			<th style="min-width: 250px;">Pass Month Year</th>
			<th style="min-width: 250px;">Certificated Deliver Date</th> 
			<th style="min-width: 250px;">Certificate Month</th> 
			<th style="min-width: 250px;">Certificate Grade</th> 
		</tr>
        <?php while($row = mysqli_fetch_array($query)){
			$output .= '<tr>
				<td style="min-width: 120px;">
					<form name="useredata" method="post" action="edit-result.php">
						<input type="hidden" name="enrollmen" value="' . $row["enrolment"] . '">
						<input type="hidden" name="semester" value="' . $row["semester"] . '">
						<input type="submit" name="edit" value="Edit" class="btn btn-warning btn-xs EditDelete" style="float: left;">
					</form>
    				<form name="deletedata" method="post" action="">
    					<input type="hidden" name="enrollmen" value="' . $row['enrolment'] . '">
    					<input type="hidden" name="semester" value="' . $row['semester'] . '">
    					<input type="submit" name="delete" value="Delete" class="btn btn-danger btn-xs DeleteEdit" onclick="return confirm("Are You Sure Want To Delete This")">
    				</form>
				</td>
				<td>' . $row['enrolment'] . '</td>
				<td>' . $row['course'] . '</td>
				<td>' . $row['semester'] . '</td>
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
			</tr>';
        }
    }else{
        $output = '<tr><td colspan="4"> No result found. </td></tr>';
    }
    echo $output;
}
?>