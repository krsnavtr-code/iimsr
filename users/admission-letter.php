<?php 
include('checklogin.php');
include("dbconnection.php");
?>

<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <meta name="robots" content="Index, Follow" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">	
	<title>Admission Letter Imperial Institute of Management Science & Research</title>
	<link rel="stylesheet" type="text/css" href="css/csss.css" />	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="js/vbimtlandingpage.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body style="background-color:#dbdbff;">
	<div class="container" style="background-color:#fff;">
		<div class="row" id="top-bar">
    	    <div class="col-sm-8 col-md-8 col-lg-8 col-xs-8">
    			<a href="https://iimsr.net.in/"><img src="logo.jpeg" alt="DZone" class="floatleft AdminPanelLogo" /></a>
    		</div>	
		<div class="col-sm-4 col-md-4 col-lg-4 col-xs-4">
            <div class="topmeenu">
                <a href="logout.php"><button type="button" class="btn btn-danger AdminLogoutBu">Logout</button></a>
        	</div>
            <div class="topm"></div>
	    </div>
	</div>
		<style>
            .AdminLogoutBu {
                border-radius: 0px !important;
                padding: 7px 13px 7px 13px !important;
            }
		    .floatleft {
                width: 262px;
                height: 72px;
            }
		    .admitcard{
                margin-right: 32px;
                margin-left: 32px;
                border:1px #000 solid;
                padding: 40px 20px 50px 20px;
            }
            .vbimt_name{
                padding:7px;
                border:1px #000 solid;
                margin: 5px 9px 5px 11px;
            }
            .vbimt_fname{
                padding:7px;
                border:1px #000 solid;
                margin:5px 0px 5px 0px;
            }
            .vbimt_cname{
                padding:7px;
                border:1px #000 solid;
                margin: 5px 10px 5px 10px;
            }
            .vbimt_ename{
                padding:7px;
                border:1px #000 solid;
                margin:5px 9px 5px 9px;
            }
            .vbimt_ecname{
                padding:7px;
                border:1px #000 solid;
                margin:5px 0px 5px 0px;
            }
            .vbimt_sename{
                padding:7px;
                border:1px #000 solid;
                margin:5px 0px 5px 0px;
            }
            .ddrrgfffg{
                width: 92.8%;
                padding:7px;
                border:1px #000 solid;
                margin:5px 0px 5px 11px;
            }
            .gdgdgdg{
                font-size:14px;
                font-weight:700;
                margin-top:-13px;
            }
            .ex1 {
              width: 100%;
              height: 480px;
              overflow-x: auto;
            }
             .floatleft.AdminPanelLogo {
                width: 470px;
                height: auto;
            }
            .AdminLogoutBu {
                border-radius: 0px !important;
                padding: 7px 13px 7px 13px !important;
            }
            
            .Kindlydeposit{
                color:red; 
                font-weight:bold;
                font-size:14px;
                text-align:justify;
            }
            @media(max-width:992px){
                .Kindlydeposit{
                    color:red !important;
                    font-weight:bold !important;
                    font-size:10px !important;
                }
                .admitcard {
                    margin-right: 0px !important;
                    margin-left: 0px !important;
                    border: 1px #9594ec solid !important;
                    padding: 15px !important;
                }
                .gdgdgdg {
                    margin-top: 2px !important;
                }
                
            }
            td, th {
                border: none !important;
                padding: 10px;
            }
		</style>
		<?php include('header/header.php'); ?>
			
			<div class="ex1">
    		    <div class="admitcard">
                    <div id="feature" ><h4 class="gdgdgdg" style="text-align:center;"><b>Admission Letter</b></h4></div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                            <?php
                                $enrol = $_SESSION['enrolment'];
                	        	$query = mysqli_query($con, "select * from `admission_letter` WHERE `enrolment_no`='$enrol'");
                				while($row = mysqli_fetch_array($query)){
                				    $name = $row['name'];
                				    $course = $row['course'];
                				    $enrolment_no = $row['enrolment_no'];
                				    $total_fee = $row['total_fee'];
                				    $paid_fee = $row['paid_fee'];
                		    ?>
                            <table align='center'style='margin-top:25px;'>
                                <tr>
                                    <td><b>Dear : </b> <b><span style="color:#160fe8;"><?php echo $name ;?></span></b></td>
                                </tr>
                                <tr>
                                    <td><b>Sub : </b> Admission Letter</td>
                                </tr>
                                <tr>
                                    <td style='margin-left:50px;'><p style='text-align:justify;'>
                                        It is our pleasure to welcome you as a student and future leader in global economy to <b>Imperial Institute of Management Science & Research</b>. <br>
                                        We would like to inform you that you have enrolled with IIMSR for the course <b><span style="color:#160fe8;"><?php echo $course;?></span></b> and for all further communications your enrolment no.
                                        would be <b><span style="color:#160fe8;"><?php echo $enrolment_no;?></span></b> We encourage you to begin your studies with us. Our primary role is to facilitate global education standards and further the globalization objectives of Higher Education.<br>
                                        As part of this mandate, we support the students of IIMSR, by providing them with services and programs. <br>
                                        As well as we impart educational standards that enhances the skills and expertise of all our students, strengthening their contributions to the globalization of<br>
                                        the larger community.</p>
                                    </td>    
                                </tr>    
                                <tr>    
                                    <td>The following are the details of the fees as provided to you</td>
                                </tr>    
                                <tr>    
                                    <td><b>Total Fees: Rs. <span style="color:#ff0000;"><i class="fa fa-inr" aria-hidden="true"></i> <?php echo $total_fee;?>/-</span></b></td>
                                </tr>    
                                <tr>    
                                    <td><b>Fee Paid till date: Rs. <span style="color:#ff0000;"><i class="fa fa-inr" aria-hidden="true"></i> <?php echo $paid_fee;?>/-</span></b></td>
                                </tr>    
                                <tr>    
                                    <td>PDC (if any): N/A</td>
                                </tr>    
                                <tr>    
                                    <td style='color:#ff0000;'>*18% GST will be applied on the total fee paid.</td>
                                </tr>
                                <tr>
                                   <td>We thank you for choosing us to provide you the education best suited for the corporate world.</td>
                                </tr>    
                                <tr>    
                                   <td>For further details reach us @ 8595113493</td>
                                </tr>
                                <tr style='margin-top:20px !important;'>
                                    <td>
                                        <span style='list-style:none;'>With Regards</span><br>
                                        <span style='list-style:none;'>Admin</span>
                                        <span style='list-style:none;'>IIMSR</span>
                                    </td>
                                </tr>
                            </table>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php include('footer/footer.php'); ?>
    </div>
</body>
</html>