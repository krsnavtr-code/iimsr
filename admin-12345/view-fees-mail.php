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

        <h1>View Fees Mail Users <small></small></h1>

        <ol class="breadcrumb">

            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>

            <li class="active">View Fees Mail Users </li>

        </ol>

    </section>

    <section class="content">

        <div class="row">

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                <form action="" method="post">

                    <div class="row">

                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">

            				<input type="text" placeholder="Search : Enrolment , Course" class="form-control" name="valueToSearch">

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

    					<th >S.No.</th>

    					<th style="min-width: 80px;">Name</th>

    					<th style="min-width: 250px;">Email</th>

    					<th style="min-width: 100px;"> Course </th>

                        <th style="min-width: 100px;"> Fee </th>

    					<th style="min-width: 250px;">Date</th>

    				</tr>

                    <?php

                        $count = 1;

                        $query = mysqli_query($con, "SELECT * FROM `send_fees_mail` ORDER BY `id` DESC");

                        $num = mysqli_num_rows($query);

                        if($num>0){

                            if(isset($_POST['search'])){

                                $serach = $_POST['valueToSearch'];

                                $query = mysqli_query($con,"SELECT * FROM `send_fees_mail` WHERE CONCAT(`name`, `email`, `course`, 'fee') LIKE '%".$serach."%'");

                            }

                        while($row = mysqli_fetch_array($query)){

                    ?> 

					<tr>

						<td><?php echo $count; ?></td>

						<td><?php echo $row['name'];?></td>

						<td><?php echo $row['email'];?></td>

						<td><?php echo $row['course'];?></td>

                        <td><?php echo $row['fee'];?></td>

						<td><?php echo $row['datetime'];?></td>		 	  

					</tr>

					<?php
                        $count++ ;
                        } 
                        } 
                     ?>

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