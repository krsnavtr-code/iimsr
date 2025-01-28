<?php

error_reporting(0);

session_start();

include("dbconnection.php");

include("functions.php");

if(isset($_POST['login'])){

    $enrolment = strtoupper($_POST['enrolment']);

    $dob = $_POST['ResultPass'];

    $_SESSION['stuenrolment'] = $enrolment;

    $_SESSION['studob'] = $dob;

    $enro =  $_SESSION['stuenrolment'];

    $dob = $_SESSION['studob'];

    $query = mysqli_query($con, "SELECT * from `register_here` where `enrolment`='$enro' AND `ResultPass`='$dob'");

    $count = mysqli_num_rows($query);

    $result = mysqli_fetch_array($query);

}else{

    $enro =  $_SESSION['stuenrolment'];

    $dob = $_SESSION['studob'];

    $query = mysqli_query($con, "SELECT * from `register_here` where `enrolment`='$enro' AND `ResultPass`='$dob'");

    $count = mysqli_num_rows($query);

    $result = mysqli_fetch_array($query);

}

if($count ==1){

?>

<!DOCTYPE html >

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">	

	<title>Online Result | Imperial Institute of Management Science & Research</title>

	<meta charset="utf-8">

	<meta name="robots" content="Index, Follow" />

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" type="text/css" href="css/csss.css" />	

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <script src="js/vbimtlandingpage.js"></script>

    <script type="text/javascript">

        $(function () {

            $("#btnGet").click(function () {

                var selectedText = $("#ddlFruits").find("option:selected").text();

                var selectedValue = $("#ddlFruits").val();

                alert("Selected Text: " + selectedText + " Value: " + selectedValue);

            });

        });

    </script>

</head>

<body style="background-color:#fff; ">

	<div class="container vbimt-adminsec">

		<div id="top-bar">

            <div class="row">

                <div class="col-sm-3 col-md-3 col-xs-12"><a href="https://iimsr.net.in/"><img src="images/logo.jpeg" class="DFGD" alt="DZone" class="" /></a></div>

                <div class="col-sm-6 col-md-6 col-xs-12"></div>

                <div class="col-sm-3 col-md-3 col-xs-12"></div>

            </div>

           <div class="topmeenu">

               <a href="logout.php"><button type="button" class="btn btn-danger LogoutBTN">Logout</button></a>

           </div>

		</div>

        <div id="zone-bar">

            <ul class="nav nav nav-tabs" >

                <li class="active"><a href="result.php"><span>Result<em class="opener-world"></em></span></a></li>

            </ul>

        </div>

            <div id="feature-content">

                <div class="tab-pane fade in active">

                    <div id="feature" >

                        <h4 style="text-align:center;font-weight:700;font-size:13px;background-color: #393f1c17; color: #274239;padding: 10px;"><span style="color:#160fe8;"></span>Welcome To - Imperial Institute of Management Science & Research<span style="Color:red; font-size:16px; font-weight:600; float:right" class="Enrolmentt">Enrolment : <?php echo $enro; ?> </span></h4>

                        <h4 style="background-color: #393f1c17;padding: 10px;"><span style="Color:red; font-size:16px; font-weight:600;" class="EEnrolmentt">Enrolment : <?php echo $enro; ?> </span></h4>

                    </div>

                </div>

            </div>

            <?php if($result['status'] == 1){ ?>

            <div id="feature-content">

                <div id="result" class="">

                    <div id="feature">

                        <div style=" margin-bottom: 20px; ">

                        <div class="row">

                            <div class="col-sm-3 col-md-3 col-xs-12"></div>

                            <div class="col-sm-6 col-md-6 col-xs-12">

                                <form class="form-contentset" name="f1" action="" method="post">

                                    <h3>Select :

                                        <select class="selectorop" id="selectBox" name="semester" required>

                                            <option value="" disable selected>-Select Semester-</option>

                                            <?php

                                                $query = mysqli_query($con,"select `semester` from `semester_subject` WHERE `enrolment` = '$enro'");

                                                $array = array();

                                                while($row = mysqli_fetch_array($query)){

                                                    $string = str_replace(' ','',strtolower($row['semester']));

                                                    if(!in_array($string,$array)){

                                                        $array[] = $string;

                                                    }

                                                }

                                                foreach($array as $semester){

                                            ?>

                                                <option value="<?php echo $semester; ?>"><?php echo $semester; ?></option>

                                            <?php } ?>

                                        </select>

                                        <input type="submit" name="submit" class="btn btn-warning btnclass LogoutBTN">

                                    </h3>

                                </form>

                            </div>

                            <div class="col-sm-3 col-md-3 col-xs-12"></div>

                        </div>

                        <?php

                            if(isset($_POST['submit'])){

                            $sem = $_POST['semester'];

                            $sem = str_replace(' ','',$sem);

                            $sem = strtolower($sem);

                            $query = "SELECT r.name,r.dob, r.fathers_name,r.course,r.specilization, m.serial_no,m.year,r.courseslug,r.ResultPass,m.total_max_marks,m.semester,m.total_min_marks,m.certificate_grade,m.certificate_month,m.total_obt_marks,m.certificated_deliver_date,m.stu_result FROM `register_here` AS r INNER JOIN `students_marks` AS m ON r.enrolment = m.enrolment WHERE m.enrolment = '$enro' AND m.semester = '$sem' AND r.ResultPass='$dob'";

                            $query = mysqli_query($con,$query);

                            $num = mysqli_num_rows($query);



                            if($num>0){

                                $std = mysqli_fetch_array($query);

                                $newsem =  str_replace(' ','',$sem);

                                $newcourse = $newsem;

                                $newsemester = strtolower($newsem);

                                $query=mysqli_query($con,"SELECT * From `semester_subject` WHERE `enrolment` = '$enro' AND `semester` = '$newsemester'");

                                $mca = mysqli_fetch_array($query);



                                $semmark = strtolower($newsem);

                                $marksquery = mysqli_query($con,"SELECT * From `students_marks` WHERE `enrolment` = '$enro' AND `semester` = '$semmark'");

                                $rowmarks = mysqli_fetch_array($marksquery);

								$subcount = 0;

                        ?>

                        <?php if($rowmarks['ResultView'] == 1){ ?>

                        <div class="Marksheet ex2" align="">

                            <table style="padding:0px;">

                                <tbody>

                                <!--<tr><td align="center"><h3><b>Imperial Institute of Management Science & Research</b></h3></td></tr>-->

                                    <tr>

                                        <td valign="top">

                                            <table>

                                                <tbody>

                                                    <tr>

                                                        <td>

                                                            <table align="center" style="margin: 54px 26px 0px 55px;">

                                                                <tbody>

                                                                    <tr style="margin: 0px 0px 0px 0px;">

                                                                        <td style="padding:5px;min-width: 500px;font-size:12px;padding-bottom: 0px !important;"><b>Serial No. : </b>

                                                                            <span id=""><?php echo $std['serial_no']; ?></span>

                                                                        </td>

                                                                        <td style="padding: 5px 3px 0px 52px;font-size:12px;padding-bottom: 0px !important;" align="">

                                                                            <b>Enrolment No. : </b>

                                                                            <span id=""><?php echo $enro; ?></span>

                                                                        </td>

                                                                    </tr>

                                                                    <tr>

                                                                        <td style="padding: 0px 0px 0px 5px;min-width: 500px;font-size:12px;"><b>Name : </b>

                                                                            <span id=""><?php echo $std['name']; ?></span>

                                                                        </td style="padding:5px;" >

                                                                        <td align="" style="padding: 0px 0px 0px 51px;font-size:12px;"><b>Semester/Year : </b><span id="">

                                                                            <?php if($semmark=="semester1"){ ?>

                                                                             First

                                                                            <?php } ?>

                                                                            <?php if($semmark=="semester2"){ ?>

                                                                             Second

                                                                            <?php } ?>

                                                                            <?php if($semmark=="semester3"){ ?>

                                                                             Third

                                                                            <?php } ?>

                                                                            <?php if($semmark=="semester4"){ ?>

                                                                             Fourth

                                                                            <?php } ?>

                                                                            <?php if($semmark=="semester5"){ ?>

                                                                             Fifth

                                                                            <?php } ?>

                                                                            <?php if($semmark=="semester6"){ ?>

                                                                             Sixth

                                                                            <?php } ?>

                                                                            <?php if($semmark=="semester7"){ ?>

                                                                             Seventh

                                                                            <?php } ?>

                                                                            <?php if($semmark=="semester8"){ ?>

                                                                             Eight

                                                                            <?php } ?>

                                                                            </span>

                                                                        </td>

                                                                    </tr>

                                                                    <tr>

                                                                        <td style="padding: 0px 0px 0px 5px;min-width: 500px;font-size:12px;"><b>Father's Name : </b><span>

                                                                            <span id="">xxxxxx</span></span>

                                                                        </td>

                                                                        <td align="" style="padding: 0px 0px 0px 52px;font-size:12px;"><b>DOB : </b><span><span id="">xxxxxx</span></span></td>

                                                                    </tr>

                                                                </tbody>

                                                            </table>

                                                            <table style="width:100%;padding: 0px 0px 0px 5px;margin:-8px 0px 0px 0px;">

                                                                <tr class="spacer">

                                                                    <td width="75%" style="padding: 0px 0px 0px 5px;min-width: 500px;font-size:12px;">

                                                						<span style="margin: 0px 0px 0px 55px;"><b>Name of Examination: </b></span> 

                                                						<?php //echo $std['course'];

                                                							    if($std['course']=="Master Programme In Business Administration ( Marketing)"){

                                                								    echo "Master Programme In Business Administration";

                                                								}

                                                								elseif($std['course']=="Master Programme In Business Administration (NGO & Project Management)"){

                                                									echo "Master Programme In Business Administration";

                                                								}

                                                								elseif($std['course']=="Master Programme In Business Administration ( Hotel & Human Resources Management)"){

                                                									echo "Master Programme In Business Administration";

                                                								}

                                                								elseif($std['course']=="Master Programme in Business Administration (Agri & Food Busi.)"){

                                                									echo "Master Programme In Business Administration";

                                                								}

                                                								elseif($std['course']=="Master Programme In Business Administration (Agricultural Business Management)"){

                                                									echo "Master Programme In Business Administration";

                                                								}

                                                								elseif($std['course']=="Master Programme In Business Administration (Construction Management)"){

                                                									echo "Master Programme In Business Administration";

                                                								}

                                                								elseif($std['course']=="Master Programme in Business Administration (Digital Management)"){

                                                									echo "Master Programme In Business Administration";

                                                								}

                                                								elseif($std['course']=="Master Programme In Business Administration (ECommerce)"){

                                                									echo "Master Programme In Business Administration";

                                                								}

                                                								elseif($std['course']=="Master Programme In Business Administration (Finance & HR Management)"){

                                                									echo "Master Programme In Business Administration";

                                                								}

                                                								elseif($std['course']=="Master Programme In Business Administration (Finance & Marketing)"){

                                                									echo "Master Programme In Business Administration";

                                                								}

                                                								elseif($std['course']=="Master Programme In Business Administration (Finance Management)"){

                                                									echo "Master Programme In Business Administration";

                                                								}

                                                								elseif($std['course']=="Master Programme In Business Administration (General management)"){

                                                									echo "Master Programme In Business Administration";

                                                								}

                                                								elseif($std['course']=="Master Programme In Business Administration (H.R & supply Chain Management)"){

                                                									echo "Master Programme In Business Administration";

                                                								}

                                                								elseif($std['course']=="Master Programme In Business Administration (Hospital Administration)"){

                                                									echo "Master Programme In Business Administration";

                                                								}

                                                								elseif($std['course']=="Master Programme In Business Administration (Hotel Management)"){

                                                									echo "Master Programme In Business Administration";

                                                								}

                                                								elseif($std['course']=="Master Programme in Business Administration (Human Resources)"){

                                                									echo "Master Programme In Business Administration";

                                                								}

                                                								elseif($std['course']=="Master Programme In Business Administration (Information Technology)"){

                                                									echo "Master Programme In Business Administration";

                                                								}

                                                								elseif($std['course']=="Master Programme In Business Administration (international Business & Information Technology)"){

                                                									echo "Master Programme In Business Administration";

                                                								}

                                                								elseif($std['course']=="Master Programme In Business Administration (International Business)"){

                                                									echo "Master Programme In Business Administration";

                                                								}

                                                								elseif($std['course']=="Master Programme In Business Administration (Logistics,Supply chain & Marketing)"){

                                                									echo "Master Programme In Business Administration";

                                                								}

                                                								elseif($std['course']=="Master Programme in Business Administration (Marketing Management)"){

                                                									echo "Master Programme In Business Administration";

                                                								}

                                                								elseif($std['course']=="Master Programme In Business Administration (Materials Management)"){

                                                									echo "Master Programme In Business Administration";

                                                								}

                                                								elseif($std['course']=="Master Programme in Business Administration (Oil & Gas)"){

                                                									echo "Master Programme In Business Administration";

                                                								}

                                                								elseif($std['course']=="Master Programme in Business Administration (Operations & Supply Chain Management)"){

                                                									echo "Master Programme In Business Administration";

                                                								}

                                                								elseif($std['course']=="Master Programme in Business Administration (Petroleum Industry)"){

                                                									echo "Master Programme In Business Administration";

                                                								}

                                                								elseif($std['course']=="Master Programme in Business Administration (Pollution Control)"){

                                                									echo "Master Programme In Business Administration";

                                                								}

                                                								elseif($std['course']=="Master Programme In Business Administration (Production & Operation Management)"){

                                                									echo "Master Programme In Business Administration";

                                                								}

                                                								elseif($std['course']=="Master Programme In Business Administration (Project Management)"){

                                                									echo "Master Programme In Business Administration";

                                                								}

                                                								elseif($std['course']=="Master Programme In Business Administration (Quality Management)"){

                                                									echo "Master Programme In Business Administration";

                                                								}

                                                								elseif($std['course']=="Master Programme In Business Administration (Sales & Marketing)"){

                                                									echo "Master Programme In Business Administration";

                                                								}

                                                								elseif($std['course']=="Master Programme In Business Administration (Security Management)"){

                                                									echo "Master Programme In Business Administration";

                                                								}

                                                								elseif($std['course']=="Master Programme In Business Administration (Store Management & Material Management)"){

                                                									echo "Master Programme In Business Administration";

                                                								}

                                                								elseif($std['course']=="Master Programme In Business Administration (Store Management)"){

                                                									echo "Master Programme In Business Administration";

                                                								}

                                                								elseif($std['course']=="Master Programme In Business Administration (Supply Chain Management)"){

                                                									echo "Master Programme In Business Administration";

                                                								}

                                                								elseif($std['course']=="Master Programme In Business Administration in Dual Specializations (Logistics,Supply chain & Marke"){

                                                									echo "Master Programme In Business Administration";

                                                								}

                                                								elseif($std['course']=="Master Programme In Business Administration in Dual Specializations (Supply chain & logistics suppl"){

                                                									echo "Master Programme In Business Administration";

                                                								}

                                                								elseif($std['course']=="Master Programme In Business Administration In Dual Specializations (Construction Management & Gener"){

                                                									echo "Master Programme In Business Administration";

                                                								}

                                                								elseif($std['course']=="Master Programme In Business Administration In Dual Specializations (HR & finance management)"){

                                                									echo "Master Programme In Business Administration";

                                                								}

                                                								elseif($std['course']=="Master Programme In Business Administration In Dual Specializations (HR & Marketing management)"){

                                                									echo "Master Programme In Business Administration";

                                                								}

                                                								elseif($std['course']=="Master Programme In Business Administration In Dual Specializations (International Business & Market"){

                                                									echo "Master Programme In Business Administration";

                                                								}

                                                								elseif($std['course']=="Master Programme In Business Administration In Dual Specializations (Marketing & Tourism Management)"){

                                                									echo "Master Programme In Business Administration";

                                                								}

                                                								elseif($std['course']=="Master Programme In Business Administration In Dual Specializations (Material Management & Operation"){

                                                									echo "Master Programme In Business Administration";

                                                								}

                                                								elseif($std['course']=="Master Programme In Business Administration In Dual Specializations (supply,operation & Logistics"){

                                                									echo "Master Programme In Business Administration";

                                                								}

                                                								elseif($std['course']=="Master Programme In Business Administration(Marketing Mgmt & Production Operation Mgmt)"){

                                                									echo "Master Programme In Business Administration";

                                                								}

                                                								elseif($std['course']=="Diploma In Industrial Safety 3 Year"){

                                                									echo "Diploma In Industrial Safety";

                                                								}

                                                								elseif($std['course']=="Diploma In Industrial Safety 6 Month"){

                                                									echo "Diploma In Industrial Safety";

                                                								}

                                                								else{

                                                									echo $std['course'];

                                                								}

                                                							?>

                                                					</td>

                                                					<td width="25%" style="font-size:12px;line-height:30px;padding: 0px 0px 0px 7px;">

                                                					    <span><b>Branch: </b></span> 

                                                					    <?php echo $std['specilization']; ?>

                                                					</td>

                                                                </tr>

                                                            </table>

                                                        </td>

                                                    </tr>

                                                </tbody>

                                            </table>

                                            <tr>

                                                <td>

                                                    <?php

                                                        $enro =  $_SESSION['stuenrolment'];

                                                        $query12 = mysqli_query($con, "select * from `course` where `semester` = '$semmark'");

                                                        $row12 = mysqli_fetch_array($query12);

                                                        $totalmxm =  $row12['max_mark'];

                                                        $totalmnm =  $row12['min_mark'];

                                                        $query = mysqli_query($con, "select * from `students_marks` where `enrolment` = '$enro' AND `semester` = '$semmark'");

                                                        $row = mysqli_fetch_array($query);

        

                                                        $totalmaxm =  $row['total_max_marks'];

                                                        $totalminm =  $row['total_min_marks'];

                                                        $totalobt =  $row['total_obt_marks'];

														$subcount = 0;

                                                        $totamax = 0;

                                                        $totalmin=0;

                                                        $totalobtcal =0;

                                                    ?>

                                                    <table class="SubjectT" style="margin:0px 0px 22px 58px;">

                                                        <tbody>

                                                            <tr>

                                                                <td style="text-align: center;font-size:13px;line-height:15px;border:1px solid #000;min-width: 368px;"><b>Subject</b></td>

                                                                <td align="center" style="font-size:13px;line-height:15px;border:1px solid #000;min-width: 90px;"><b> Max. Marks </b></td>

                                                                <td align="center" style="font-size:13px;line-height:15px;border:1px solid #000;min-width: 90px;"><b> Min. Marks  </b></td>

                                                                <td align="center" style="font-size:13px;line-height:15px;border:1px solid #000;min-width: 90px;"><b> Marks Obt. </b></td>

                                                                <th align="center"style="min-width:118px;border:1px solid #000;text-align:center;font-size:10px;">Total<br> (In Words)</th>

                                                                <!--<td align="center" style="font-size:13px;line-height:15px;border:1px solid #000"><b> Result | </b></td>

                                                                <td align="center" style="font-size:13px;line-height:15px;border:1px solid #000"><b> Passing Month Year </b></td>-->

                                                            </tr>

                                                            <?php if(!empty($mca['subject1'])){

                                                                $totamax += 100;

                                                                $totalmin +=40;

                                                                $totalobtcal +=$rowmarks['subject1'];

                                                            ?>

                                                            <tr>

                                                                <td style="text-align: center;line-height:15px;border:1px solid #000;font-size:12px;">

                                                                    <span id=""><?php echo $mca['subject1']; ?></span></td>

                                                                <td align="center" style="line-height:15px;border:1px solid #000">

                                                                    <span id="">100</span></td>

                                                                <td align="center" style="line-height:15px;border:1px solid #000">

                                                                    <span id="">40</span></td>

                                                                <td align="center" style="line-height:15px;border:1px solid #000">

                                                                    <span id=""><?php echo $rowmarks['subject1']; ?></span></td>

                                                                <td align="center"style="line-height:30px;border:1px solid #000;font-size:12px;">

                                                                    <?php

                                                                    $array  = array_map('intval', str_split($row['subject1']));

                                                                     numberTowords($array);

                                                                     $subcount++;

                                                                    ?>

                                                                </td>    

                                                            </tr>

                                                            <?php } ?>

                                                            <?php if(!empty($mca['subject2'])){

                                                                $totamax += 100;

                                                                $totalmin +=40;

                                                                $totalobtcal +=$rowmarks['subject2'];

                                                            ?>

                                                            <tr>

                                                                <td style="text-align: center;line-height:15px;border:1px solid #000;font-size:12px;">

                                                                    <span id=""><?php echo $mca['subject2']; ?></span></td>

                                                                <td align="center"style="line-height:15px;border:1px solid #000">

                                                                    <span id="">100</span></td>

                                                                <td align="center"style="line-height:15px;border:1px solid #000">

                                                                    <span id="">40</span></td>

                                                                <td align="center"style="line-height:15px;border:1px solid #000">

                                                                    <span id=""><?php echo $rowmarks['subject2']; ?></span></td>

                                                                    

                                                                <td align="center"style="line-height:30px;border:1px solid #000;font-size:12px;">

                                                                    <?php

                                                                    $array  = array_map('intval', str_split($row['subject2']));

                                                                     numberTowords($array);

                                                                     $subcount++;

                                                                    ?>

                                                                </td>    

                                                                <!--<td align="center"style="line-height:15px;border:1px solid #000"><span id=""><?php //echo $rowmarks['stu_result']; ?></span></td>

                                                                <td align="center"style="line-height:15px;border:1px solid #000"><span id=""><?php //echo $row['pass_month_year']; ?></span></td>-->

                                                            </tr>

                                                            <?php } ?>

                                                            <?php if(!empty($mca['subject3'])){

                                                                $totamax += 100;

                                                                $totalmin +=40;

                                                                $totalobtcal +=$rowmarks['subject3'];

                                                            ?>

                                                            <tr>

                                                                <td style="text-align: center;line-height:15px;border:1px solid #000;font-size:12px;">

                                                                    <span id=""><?php echo $mca['subject3']; ?></span></td>

                                                                <td align="center"style="line-height:15px;border:1px solid #000">

                                                                    <span id="">100</span></td>

                                                                <td align="center"style="line-height:15px;border:1px solid #000">

                                                                    <span id="">40</span></td>

                                                                <td align="center"style="line-height:15px;border:1px solid #000">

                                                                    <span><span id=""><?php echo $rowmarks['subject3']; ?></span></td>

                                                                <td align="center"style="line-height:30px;border:1px solid #000;font-size:12px;">

                                                                    <?php

                                                                    $array  = array_map('intval', str_split($row['subject3']));

                                                                     numberTowords($array);

                                                                     $subcount++;

                                                                    ?>

                                                                </td>    

                                                            </tr>

                                                            <?php } ?>

                                                            <?php if(!empty($mca['subject4'])){

                                                                $totamax += 100;

                                                                $totalmin +=40;

                                                                $totalobtcal +=$rowmarks['subject4'];

                                                            ?>

                                                            <tr>

                                                                <td style="text-align: center;line-height:15px;border:1px solid #000;font-size:12px;">

                                                                    <span id=""><?php echo $mca['subject4']; ?></span></td>

                                                                <td align="center"style="line-height:15px;border:1px solid #000">

                                                                    <span id="">100</span></td>

                                                                <td align="center"style="line-height:15px;border:1px solid #000">

                                                                    <span id="">40</span></td>

                                                                <td align="center"style="line-height:15px;border:1px solid #000">

                                                                    <span id=""><?php echo $rowmarks['subject4']; ?></span></td>

                                                                <td align="center"style="line-height:30px;border:1px solid #000;font-size:12px;">

                                                                    <?php

                                                                    $array  = array_map('intval', str_split($row['subject4']));

                                                                     numberTowords($array);

                                                                     $subcount++;

                                                                    ?>

                                                                </td>    

                                                            </tr>

                                                            <?php } ?>

                                                            <?php if(!empty($mca['subject5'])){

                                                                $totamax += 100;

                                                                $totalmin +=40;

                                                                $totalobtcal +=$rowmarks['subject5'];

                                                            ?>

                                                            <tr>

                                                                <td style="text-align: center;line-height:15px;border:1px solid #000;font-size:12px;">

                                                                    <span id=""><?php echo $mca['subject5']; ?></span></td>

                                                                <td align="center"style="line-height:15px;border:1px solid #000">

                                                                    <span id="">100</span></td>

                                                                <td align="center"style="line-height:15px;border:1px solid #000">

                                                                    <span id="">40</span></td>

                                                                <td align="center"style="line-height:15px;border:1px solid #000">

                                                                    <span id=""><?php echo $rowmarks['subject5']; ?></span></td>

                                                                <td align="center"style="line-height:30px;border:1px solid #000;font-size:12px;">

                                                                    <?php

                                                                    $array  = array_map('intval', str_split($row['subject5']));

                                                                     numberTowords($array);

                                                                     $subcount++;

                                                                    ?>

                                                                </td>    

                                                            </tr>

                                                            <?php } ?>

                                                            <?php if(!empty($mca['subject6'])){

                                                                $totamax += 100;

                                                                $totalmin +=40;

                                                                $totalobtcal +=$rowmarks['subject6'];

                                                            ?>

                                                            <tr>

                                                                <td style="text-align: center;line-height:15px;border:1px solid #000;font-size:12px;">

                                                                    <span id=""><?php echo $mca['subject6']; ?></span></td>

                                                                <td align="center"style="line-height:15px;border:1px solid #000">

                                                                    <span id="">100</span></td>

                                                                <td align="center"style="line-height:15px;border:1px solid #000">

                                                                    <span id="">40</span></td>

                                                                <td align="center"style="line-height:15px;border:1px solid #000">

                                                                    <span id=""><?php echo $rowmarks['subject6']; ?></span></td>

                                                                <td align="center"style="line-height:30px;border:1px solid #000;font-size:12px;">

                                                                    <?php

                                                                    $array  = array_map('intval', str_split($row['subject6']));

                                                                     numberTowords($array);

                                                                     $subcount++;

                                                                    ?>

                                                                </td>    

                                                            </tr>

                                                            <?php } ?>

                                                            <tr>

                                                                <td align="center"style="padding:5px 60px;font-size:12px;line-height:15px;border:1px solid #000">

                                                                    <b>Total Obtain Mark</b>

                                                                </td>

                                                                <td align="center"style="line-height:15px;border:1px solid #000">

                                                                    <span id=""><b></b></span><?php echo $totamax; ?>

                                                                </td>

                                                                <td align="center"style="line-height:15px;border:1px solid #000">

                                                                    <span id=""><b></b></span><?php echo $totalmin; ?>

                                                                </td>

                                                                <td align="center"style="line-height:15px;border:1px solid #000">

                                                                    <span id=""><b></b></span><?php echo $totalobtcal; ?>

                                                                </td>

                                                                <td align="center"style="line-height:30px;border:1px solid #000;font-size:12px;">

                                                                    <?php

                                                                        $array  = array_map('intval', str_split($totalobtcal));

                                                                        numberTowords($array);

                                                                    ?>

                                                                </td>

                                                            </tr>

                                                        </tbody>

                                                    </table>

                                                </td>

                                            </tr>

                                            <!----------------------------------------------------------------------------------------------------->

                                            <?php 

                                				$queryresult= mysqli_query($con,"SELECT semester,total_obt_marks FROM `students_marks` WHERE enrolment = '$enro'");

                                				$datatotalobatp = array();

                                				$markarray = array();

                                				while($rowdata = mysqli_fetch_array($queryresult)){

                                					$datatotalobatp[] = $rowdata['semester'];

                                					$markarray[] = $rowdata['total_obt_marks'];

                                				}

                                			?>

                                            <table class="TableAllSem" style="margin-top:-4px;height:45px;border:1px solid #000;text-align:center;min-width:86.6%;margin-left: 58.1px;">

                                            	<tr>

                                            		<th style="text-align:center;width:;line-height:;border:1px solid #000;font-size:13px;">Semester</th>

                                            		<td style="text-align:center;width:;line-height:;border:1px solid #000;">1st</td>

                                            		<td style="text-align:center;width:;line-height:;border:1px solid #000;">2nd</td>

                                            		<td style="text-align:center;width:;line-height:;border:1px solid #000;">3rd</td>

                                            		<td style="text-align:center;width:;line-height:;border:1px solid #000;">4th</td>

                                            		<td style="text-align:center;width:;line-height:;border:1px solid #000;">5th</td>

                                            		<td style="text-align:center;width:;line-height:;border:1px solid #000;">6th</td>

                                            		<td style="text-align:center;width:;line-height:;border:1px solid #000;">7th</td>

                                            		<td style="text-align:center;width:;line-height:;border:1px solid #000;">8th</td>

                                            		<td style="text-align:center;width:;line-height:;border:1px solid #000;" rowspan="2"> <?php echo $row['pass_month_year']; ?><br><?php echo $rowmarks['stu_result']; ?></td>

                                            	</tr>

                                            	<tr>

                                            		<th style="text-align:center;width:;line-height:;border:1px solid #000;font-size:13px;">Marks</th>

                                                    <?php if($semmark=="semester1"){?>

                                                    <td style="text-align:center;width:;line-height:;border:1px solid #000;">

                                            			<?php 

                                            				if (in_array('semester1', $datatotalobatp)){

                                            					$a = array_search('semester1', array_values($datatotalobatp),true);

                                            					echo $markarray[$a];

                                            				}else{

                                            					echo "-";

                                            				}	

                                            			?>

                                            		</td>

                                            		<td style="text-align:center;width:;line-height:;border:1px solid #000;">

                                            		<?php echo "-"; ?>

                                            		</td>

                                            		<td style="text-align:center;width:;line-height:;border:1px solid #000;">

                                            		<?php echo "-"; ?>

                                            		</td>

                                            		<td style="text-align:center;width:;line-height:;border:1px solid #000;">

                                            		<?php echo "-"; ?>	

                                            		</td>

                                            		<td style="text-align:center;width:;line-height:;border:1px solid #000;">

                                            		<?php echo "-"; ?>

                                            		</td>

                                            		<td style="text-align:center;width:;line-height:;border:1px solid #000;">

                                            		<?php echo "-"; ?>

                                            		</td>

                                            		<td style="text-align:center;width:;line-height:;border:1px solid #000;">

                                            		<?php echo "-"; ?>

                                            		</td>

                                            		<td style="text-align:center;width:;line-height:;border:1px solid #000;">

                                            		<?php echo "-"; ?>

                                            		</td>

                                                    <?php } ?>

                                                    

                                                    <?php if($semmark=="semester2"){ ?>

                                                    <td style="text-align:center;width:;line-height:;border:1px solid #000;">

                                            			<?php 

                                            				if (in_array('semester1', $datatotalobatp)){

                                            					$a = array_search('semester1', array_values($datatotalobatp),true);

                                            					echo $markarray[$a];

                                            				}else{

                                            					echo "-";

                                            				}

                                            			?>

                                            		</td>

                                            		<td style="text-align:center;width:;line-height:;border:1px solid #000;">

                                            			<?php 

                                            				if (in_array('semester2', $datatotalobatp)){

                                            					$b = array_search('semester2', array_values($datatotalobatp),true);

                                            					echo $markarray[$b];

                                            				}else{

                                            					echo "-";

                                            				}

                                            			?>

                                            		</td>

                                            		<td style="text-align:center;width:;line-height:;border:1px solid #000;">

                                            		<?php echo "-"; ?>

                                            		</td>

                                            		<td style="text-align:center;width:;line-height:;border:1px solid #000;">

                                            		<?php echo "-"; ?>

                                            		</td>

                                            		<td style="text-align:center;width:;line-height:;border:1px solid #000;">

                                            		<?php echo "-"; ?>

                                            		</td>

                                            		<td style="text-align:center;width:;line-height:;border:1px solid #000;">

                                            		<?php echo "-"; ?>

                                            		</td>

                                            		<td style="text-align:center;width:;line-height:;border:1px solid #000;">

                                            		<?php echo "-"; ?>	

                                            		</td>

                                            		<td style="text-align:center;width:;line-height:;border:1px solid #000;">

                                            		<?php echo "-"; ?>

                                            		</td>

                                                    <?php } ?>

                                                    <?php if($semmark=="semester3"){ ?>

                                                    <td style="text-align:center;width:;line-height:;border:1px solid #000;">

                                            			<?php 

                                            				if (in_array('semester1', $datatotalobatp)){

                                            					$a = array_search('semester1', array_values($datatotalobatp),true);

                                            					echo $markarray[$a];

                                            				}else{

                                            					echo "-";

                                            				}

                                            			?>

                                            		</td>

                                            		<td style="text-align:center;width:;line-height:;border:1px solid #000;">

                                            			<?php 

                                            				if (in_array('semester2', $datatotalobatp)){

                                            					$b = array_search('semester2', array_values($datatotalobatp),true);

                                            					echo $markarray[$b];

                                            				}else{

                                            					echo "-";

                                            				}

                                            			?>

                                            		</td>

                                            		<td style="text-align:center;width:;line-height:;border:1px solid #000;">

                                            			<?php 

                                            				if (in_array('semester3', $datatotalobatp)){

                                            					$c = array_search('semester3', array_values($datatotalobatp));

                                            					echo $markarray[$c];

                                            				}else{

                                            					echo "-";

                                            				}

                                            			?>

                                            		</td>

                                            		<td style="text-align:center;width:;line-height:;border:1px solid #000;">

                                            		<?php 	echo "-"; ?>

                                            		</td>

                                            		<td style="text-align:center;width:;line-height:;border:1px solid #000;">

                                            		<?php echo "-"; ?>

                                            		</td>

                                            		<td style="text-align:center;width:;line-height:;border:1px solid #000;">

                                            		<?php echo "-"; ?>

                                            		</td>

                                            		<td style="text-align:center;width:;line-height:;border:1px solid #000;">

                                            		<?php echo "-"; ?>	

                                            		</td>

                                            		<td style="text-align:center;width:;line-height:;border:1px solid #000;">

                                            		<?php echo "-"; ?>

                                            		</td>

                                                    <?php } ?>

                                                    <?php if($semmark=="semester4"){ ?>

                                            		<td style="text-align:center;width:;line-height:;border:1px solid #000;">

                                            			<?php 

                                            				if (in_array('semester1', $datatotalobatp)){

                                            					$a = array_search('semester1', array_values($datatotalobatp),true);

                                            					

                                            					echo $markarray[$a];

                                            				}else{

                                            					echo "-";

                                            				}

                                            			?>

                                            		</td>

                                            		<td style="text-align:center;width:;line-height:;border:1px solid #000;">

                                            			<?php

                                            				if (in_array('semester2', $datatotalobatp)){

                                            					$b = array_search('semester2', array_values($datatotalobatp),true);

                                            					

                                            					echo $markarray[$b];

                                            				}else{

                                            					echo "-";

                                            				}

                                            			?>

                                            		</td>

                                            		<td style="text-align:center;width:;line-height:;border:1px solid #000;">

                                            			<?php

                                            				if (in_array('semester3', $datatotalobatp)){

                                            					$c = array_search('semester3', array_values($datatotalobatp));

                                            					echo $markarray[$c];

                                            				}else{

                                            					echo "-";

                                            				}

                                            			?>

                                            		</td>

                                            		<td style="text-align:center;width:;line-height:;border:1px solid #000;">

                                            			<?php 	

                                            				if (in_array('semester4', $datatotalobatp)){

                                            					$d = array_search('semester4', array_values($datatotalobatp));

                                            					echo $markarray[$d];

                                            				}else{

                                            					echo "-";

                                            				}

                                            			?>

                                            		</td>

                                            		<td style="text-align:center;width:;line-height:;border:1px solid #000;">

                                            		<?php echo "-"; ?>

                                            		</td>

                                            		<td style="text-align:center;width:;line-height:;border:1px solid #000;">

                                            		<?php echo "-"; ?>

                                            		</td>

                                            		<td style="text-align:center;width:;line-height:;border:1px solid #000;">

                                            		<?php echo "-"; ?>	

                                            		</td>

                                            		<td style="text-align:center;width:;line-height:;border:1px solid #000;">

                                            		<?php echo "-"; ?>

                                            		</td>

                                                    <?php } ?>

                                                    <?php if($semmark=="semester5"){ ?>

                                            		<td style="text-align:center;width:;line-height:;border:1px solid #000;">

                                            			<?php 

                                            				if (in_array('semester1', $datatotalobatp)){

                                            					$a = array_search('semester1', array_values($datatotalobatp),true);

                                            					

                                            					echo $markarray[$a];

                                            				}else{

                                            					echo "-";

                                            				}	

                                            			?>

                                            		</td>

                                            		<td style="text-align:center;width:;line-height:;border:1px solid #000;">

                                            			<?php 	

                                            				

                                            				if (in_array('semester2', $datatotalobatp)){

                                            					$b = array_search('semester2', array_values($datatotalobatp),true);

                                            					

                                            					echo $markarray[$b];

                                            				}else{

                                            					echo "-";

                                            				}

                                            			?>

                                            		</td>

                                            		<td style="text-align:center;width:;line-height:;border:1px solid #000;">

                                            			<?php 

                                            				

                                            				if (in_array('semester3', $datatotalobatp)){

                                            					$c = array_search('semester3', array_values($datatotalobatp));

                                            					echo $markarray[$c];

                                            				}else{

                                            					echo "-";

                                            				}

                                            			?>

                                            		</td>

                                            		<td style="text-align:center;width:;line-height:;border:1px solid #000;">

                                            			<?php 	

                                            				if (in_array('semester4', $datatotalobatp)){

                                            					$d = array_search('semester4', array_values($datatotalobatp));

                                            					echo $markarray[$d];

                                            				}else{

                                            					echo "-";

                                            				}

                                            			?>

                                            		</td>

                                            		<td style="text-align:center;width:;line-height:;border:1px solid #000;">

                                            			<?php 	

                                            				if (in_array('semester5', $datatotalobatp)){

                                            					$e = array_search('semester5', array_values($datatotalobatp));

                                            					echo $markarray[$e];

                                            				}else{

                                            					echo "-";

                                            				}

                                            			?>

                                            		</td>

                                            		<td style="text-align:center;width:;line-height:;border:1px solid #000;">

                                            		<?php echo "-"; ?>

                                            		</td>

                                            		<td style="text-align:center;width:;line-height:;border:1px solid #000;">

                                            		<?php echo "-"; ?>	

                                            		</td>

                                            		<td style="text-align:center;width:;line-height:;border:1px solid #000;">

                                            		<?php echo "-"; ?>

                                            		</td>

                                            	    <?php } ?>

                                            	    <?php if($semmark=="semester6"){ ?>

                                            		     

                                            		<td style="text-align:center;width:;line-height:;border:1px solid #000;">

                                            			<?php 

                                            				if (in_array('semester1', $datatotalobatp)){

                                            					$a = array_search('semester1', array_values($datatotalobatp),true);

                                            					

                                            					echo $markarray[$a];

                                            				}else{

                                            					echo "-";

                                            				}

                                            			?>

                                            		</td>

                                            		<td style="text-align:center;width:;line-height:;border:1px solid #000;">

                                            			<?php 

                                            				if (in_array('semester2', $datatotalobatp)){

                                            					$b = array_search('semester2', array_values($datatotalobatp),true);

                                            					echo $markarray[$b];

                                            				}else{

                                            					echo "-";

                                            				}

                                            			?>

                                            		</td>

                                            		<td style="text-align:center;width:;line-height:;border:1px solid #000;">

                                            			<?php 

                                            				if (in_array('semester3', $datatotalobatp)){

                                            					$c = array_search('semester3', array_values($datatotalobatp));

                                            					echo $markarray[$c];

                                            				}else{

                                            					echo "-";

                                            				}

                                            			?>

                                            		</td>

                                            		<td style="text-align:center;width:;line-height:;border:1px solid #000;">

                                            			<?php 	

                                            				if (in_array('semester4', $datatotalobatp)){

                                            					$d = array_search('semester4', array_values($datatotalobatp));

                                            					echo $markarray[$d];

                                            				}else{

                                            					echo "-";

                                            				}

                                            			?>

                                            		</td>

                                            		<td style="text-align:center;width:;line-height:;border:1px solid #000;">

                                            			<?php 	

                                            				if (in_array('semester5', $datatotalobatp)){

                                            					$e = array_search('semester5', array_values($datatotalobatp));

                                            					echo $markarray[$e];

                                            				}else{

                                            					echo "-";

                                            				}

                                            			?>

                                            		</td>

                                            		<td style="text-align:center;width:;line-height:;border:1px solid #000;">

                                            			<?php 	

                                            				if (in_array('semester6', $datatotalobatp)){

                                            					$f = array_search('semester6', array_values($datatotalobatp));

                                            					echo $markarray[$f];

                                            				}else{

                                            					echo "-";

                                            				}

                                            			?>

                                            		</td>

                                            		<td style="text-align:center;width:;line-height:;border:1px solid #000;">

                                            		<?php echo "-"; ?>	

                                            		</td>

                                            		<td style="text-align:center;width:;line-height:;border:1px solid #000;">

                                            		<?php echo "-"; ?>

                                            		</td>

                                            		<?php } ?>

                                            		<?php if($semmark=="semester7"){ ?>

                                            		<td style="text-align:center;width:;line-height:;border:1px solid #000;">

                                            			<?php 

                                            				if (in_array('semester1', $datatotalobatp)){

                                            					$a = array_search('semester1', array_values($datatotalobatp),true);

                                            					

                                            					echo $markarray[$a];

                                            				}else{

                                            					echo "-";

                                            				}

                                            			?>

                                            		</td>

                                            		<td style="text-align:center;width:;line-height:;border:1px solid #000;">

                                            			<?php 	

                                            				

                                            				if (in_array('semester2', $datatotalobatp)){

                                            					$b = array_search('semester2', array_values($datatotalobatp),true);

                                            					

                                            					echo $markarray[$b];

                                            				}else{

                                            					echo "-";

                                            				}

                                            			?>

                                            		</td>

                                            		<td style="text-align:center;width:;line-height:;border:1px solid #000;">

                                            			<?php 

                                            				

                                            				if (in_array('semester3', $datatotalobatp)){

                                            					$c = array_search('semester3', array_values($datatotalobatp));

                                            					echo $markarray[$c];

                                            				}else{

                                            					echo "-";

                                            				}

                                            			?>

                                            		</td>

                                            		<td style="text-align:center;width:;line-height:;border:1px solid #000;">

                                            			<?php 	

                                            				if (in_array('semester4', $datatotalobatp)){

                                            					$d = array_search('semester4', array_values($datatotalobatp));

                                            					echo $markarray[$d];

                                            				}else{

                                            					echo "-";

                                            				}

                                            			?>

                                            		</td>

                                            		<td style="text-align:center;width:;line-height:;border:1px solid #000;">

                                            			<?php 	

                                            				if (in_array('semester5', $datatotalobatp)){

                                            					$e = array_search('semester5', array_values($datatotalobatp));

                                            					echo $markarray[$e];

                                            				}else{

                                            					echo "-";

                                            				}

                                            			?>

                                            		</td>

                                            		<td style="text-align:center;width:;line-height:;border:1px solid #000;">

                                            			<?php 	

                                            				if(in_array('semester6', $datatotalobatp)){

                                            					$f = array_search('semester6', array_values($datatotalobatp));

                                            					echo $markarray[$f];

                                            				}else{

                                            					echo "-";

                                            				}

                                            			?>

                                            		</td>

                                            		<td style="text-align:center;width:;line-height:;border:1px solid #000;">

                                            			<?php 	

                                            				if (in_array('semester7', $datatotalobatp)){

                                            					$g = array_search('semester7', array_values($datatotalobatp));

                                            					echo $markarray[$g];

                                            				}else{

                                            					echo "-";

                                            				}

                                            			?>	

                                            		</td>

                                            		<td style="text-align:center;width:;line-height:;border:1px solid #000;">

                                            		<?php echo "-";	?>

                                            		</td>

                                            	    <?php } ?>

                                            	    <?php if($semmark=="semester8"){ ?>

                                            		<td style="text-align:center;width:;line-height:;border:1px solid #000;">

                                            			<?php 

                                            				if (in_array('semester1', $datatotalobatp)){

                                            					$a = array_search('semester1', array_values($datatotalobatp),true);

                                            					

                                            					echo $markarray[$a];

                                            				}else{

                                            					echo "-";

                                            				}	

                                            			?>

                                            		</td>

                                            		<td style="text-align:center;width:;line-height:;border:1px solid #000;">

                                            			<?php

                                            				if (in_array('semester2', $datatotalobatp)){

                                            					$b = array_search('semester2', array_values($datatotalobatp),true);

                                            					

                                            					echo $markarray[$b];

                                            				}else{

                                            					echo "-";

                                            				}	

                                            			?>

                                            		</td>

                                            		<td style="text-align:center;width:;line-height:;border:1px solid #000;">

                                            			<?php 

                                            				if (in_array('semester3', $datatotalobatp)){

                                            					$c = array_search('semester3', array_values($datatotalobatp));

                                            					echo $markarray[$c];

                                            				}else{

                                            					echo "-";

                                            				}

                                            			?>

                                            		</td>

                                            		<td style="text-align:center;width:;line-height:;border:1px solid #000;">

                                            			<?php 	

                                            				if (in_array('semester4', $datatotalobatp)){

                                            					$d = array_search('semester4', array_values($datatotalobatp));

                                            					echo $markarray[$d];

                                            				}else{

                                            					echo "-";

                                            				}

                                            			?>

                                            		</td>

                                            		<td style="text-align:center;width:;line-height:;border:1px solid #000;">

                                            			<?php 	

                                            				if (in_array('semester5', $datatotalobatp)){

                                            					$e = array_search('semester5', array_values($datatotalobatp));

                                            					echo $markarray[$e];

                                            				}else{

                                            					echo "-";

                                            				}

                                            			?>

                                            		</td>

                                            		<td style="text-align:center;width:;line-height:;border:1px solid #000;">

                                            			<?php 	

                                            				if (in_array('semester6', $datatotalobatp)){

                                            					$f = array_search('semester6', array_values($datatotalobatp));

                                            					echo $markarray[$f];

                                            				}else{

                                            					echo "-";

                                            				}

                                            			?>

                                            		</td>

                                            		<td style="text-align:center;width:;line-height:0px;border:1px solid #000;">

                                            			<?php 	

                                            				if (in_array('semester7', $datatotalobatp)){

                                            					$g = array_search('semester7', array_values($datatotalobatp));

                                            					echo $markarray[$g];

                                            				}else{

                                            					echo "-";

                                            				}

                                            			?>	

                                            		</td>

                                            		<td style="text-align:center;width:;line-height:;border:1px solid #000;">

                                            			<?php 	

                                            				if (in_array('semester8', $datatotalobatp)){

                                            					$h = array_search('semester8', array_values($datatotalobatp));

                                            					echo $markarray[$h];

                                            				}else{

                                            					echo "-";

                                            				}

                                            			?>

                                            		</td>

                                            		<?php } ?>

                                            	</tr>

                                            </table>

                                            <!----------------------------------------------------------------------------------------------------->

                                        </td>

                                    </tr>

                                </tbody>

                            </table>

                        </div>

                    <?php }else{

                            echo "<p class='sameuniqeiddd'>You have to get permission from Institute - $sem </p>";

                    } } } ?>

                </div>

            </div>

        </div>

    </div>

    <?php 

        } else{

            die('Record Not Found');

        }



        } else{ 

            die('Password wrong please submit correct password');

        } 

    ?>

    <hr>    

    <div class="row">

        <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">

            <p style="color:red; font-weight:bold;font-size:13px;" class="KindlyDesposit">Kindly deposit your fees in Imperial Institute of Management Science & Research account only, any fee deposited in any other account EXCEPT IIMSR will not be considered.<span style="color:#160fe8"> For any issue related to fees or examination please call @ +91 8595113493</span></p>

        </div>

    </div>

    <div class="row fdfdfd">

        <div class="col-sm-8 col-md-8 col-lg-8 col-xs-12" id="footer">

            <p style="color:red; font-weight:bold;font-size:13px;" class="KindlyDesposit">© Imperial Institute of Management Science & Research Advance System Integration.</p>

        </div>

        <div class="col-sm-4 col-md-4 col-lg-4 col-xs-12">

            <a href="https://iimsr.net.in/">Home</a> | <a href="https://iimsr.net.in/privacy-policy.php">Privacy policy</a> | <a href="https://iimsr.net.in/contact-us.php">Contact us</a>

        </div>

    </div>

</div>

<style>

    .sameuniqeiddd{

        text-align: center;

        font-size: 24px;

        font-weight: 600;

        color: #ff0000;

    }

    .EEnrolmentt{

        display:none;

    }

    .Enrolmentt{

        display:block;

    }

    .topmeenu {

        float: right;

        margin: 0px 0px 0px 0px;

    }

    .DFGD {

        margin: 4px 0px -40px 71px;

        width: 478px;

        height: 64px;

    }

    .vb_foot{

        background-color: #dbdbff;

        padding: 4px 0px 5px 8px;

    }

    .Marksheet {

        /*height: 622px;*/

        height: 500px;

        width:876px;

        margin: 0px 0px 0px 116px;

        overflow-x: auto !important;

        /*background: url(assets/images/vidya-bharatiinstitutee.jpeg)no-repeat;*/

    }

    .LogoutBTN{

        border-radius:0px;

    }

    .selectorop{

        border-radius:0px;

        font-size: 21px;

        padding: 2px 20px 5px 20px;

    }

    .vbimt-adminsec {

        background-color:#fff;

    }

    .fdfdfd{

        background-color: #393f1c17;

        padding: 10px 0px 0px 0px;

    }

    @media(max-width:992px){

        .DFGD {

            width: 217px !important;

            height: 28px !important;

            margin: 0px 0px -46px 83px !important;

        }

        .Enrolmentt{

            display:none !important;

        }

        .EEnrolmentt{

            display:block !important;

        }

        .selectorop {

            border-radius: 0px !important;

            font-size: 17px !important;

            padding: 5px 0px 5px 0px !important;

        }

        .LogoutBTN {

            border-radius: 0px !important;

            margin: 0px 0px 0px 0px !important;

        }

        .KindlyDesposit{

            text-align:justify !important;

            color: red !important;

            font-weight: bold !important;

            font-size: 12px !important;

        }

        .Marksheet {

            height: 622px !important;

            width:876px;

            margin: 0px 0px 0px 0px !important;

            overflow-x: auto !important;

            /* background: url(assets/images/vidya-bharatiinstitutee.jpeg)no-repeat !important; */

        }

        .TableAllSem{

            margin-left: 33.1px !important;

        }

        .ex2 {

            width: 100% !important;

            /*height: 622px !important;*/

            height: 422px !important;

            overflow-x: auto !important;

        }

        .SubjectT{

            margin: 0px 0px 22px 33px !important;

        }

        .TableAllSem{

            margin-top: -4px !important;

            height: 45px !important;

            border: 1px solid #000 !important;

            text-align: center !important;

            width: 757px !important;

            margin-bottom: 23px !important;

        }

    }

</style>

</body>

</html>

