<?php
include('checklogin.php');
include("dbconnection.php");
include("functions.php");
require_once("qrcode.php");

$enrollement = strtoupper($_POST['enrolment']);
$semester = $_POST['semester'];
$course = $_POST['course'];

$query = "SELECT r.name,r.dob, r.fathers_name, r.course,r.specilization,r.courseslug,m.serial_no,m.year,m.total_max_marks,m.semester,m.total_min_marks,m.certificate_grade,
m.certificate_month,m.pass_month_year,total_obt_marks,m.certificated_deliver_date,m.stu_result FROM `register_here` AS r INNER JOIN `students_marks` AS m ON r.enrolment = m.enrolment WHERE m.enrolment = '$enrollement'";

$serieal = mysqli_query($con, "SELECT serial_no,pass_month_year,year from `students_marks` where `enrolment`='$enrollement' AND `semester`='$semester'");
$serail =  mysqli_fetch_array($serieal);
$seriealnumber =$serail['serial_no']; 
$yearhsag = $serail['year']; 
$result = mysqli_query($con,$query);
$row = mysqli_fetch_array($result);
$date = $serail['pass_month_year'];
$statusfg = $row['stu_result'];
$namejahsjs = $row['name'];
$text = $namejahsjs." Enrolment No: ".$enrollement." Status: ".$statusfg;
$qr = QRCode::getMinimumQRCode($text, QR_ERROR_CORRECT_LEVEL_L);
$img = $qr->createImage(2, 2);
ob_start();
imagegif($img);
imagedestroy($img);
$img = ob_get_clean();

?>
<img style="width:100%;height:750px; opacity: 0.6;" src="images/iimsr-Marks-Card-ok.jpeg" alt="DZone"/>
<table style="width:97%;margin-top:-700px;margin-left:19px;opacity: 0.9;padding-left:10px;padding-right:10px;z-index:9999999;line-height:20px">
    <tr>
        <td>
            <table style="margin-top:-1px">
                <tr>
                    <td style="width: 65px; height: 65px;opacity: 0.9;z-index: 99999999;float:right;margin-left:990px;margin-right: 40px;">
                        <img src="data:image/gif;base64,<?php echo base64_encode($img);?>" style="opacity: 0.6;" alt="DZone"/>
                    </td>
                </tr>
            </table>
            <table style="width:100%;margin-top:21px;margin-right:0px;" align="right">
                <tr>
                    <td style="padding-left: 748px;line-height: 28px;"><span style="font-size:24px;font-weight:bold">20<?php echo $yearhsag; ?></span></td>
                    <td style="line-height: 29px;padding-right: 55px;"><span style="font-size:20px;color:#8b0000">S.No.: <?php echo $seriealnumber; ?></span></td>
                </tr>
            </table>
            <table style="width:100%;margin-top:47px">
                <tr class="spacer">
        			<td width="75%" style="font-size:14px;font-weight:blod;font-weight:bold;line-height:30px"><span style="margin-left:0px;font-size:15px">Name:  </span> <?php echo strtoupper($row['name']); ?></td>
        			<td width="25%" style="font-size:14px;font-weight:bold;font-weight:bold;line-height:30px"><span style="font-size:15px">Enrolment No.: </span><?php echo $enrollement ?></td>
        		</tr>
        	</table>
            <table style="width:100%;padding-right:50px;line-height:25px;margin-top:-1px">	
        		<tr class="spacer">
        			<td width="75%" style="font-size:14px;font-weight:bold;line-height:30px"><span style="margin-left:0px;font-size:15px">Father's/Husband's Name: </span><?php echo strtoupper($row['fathers_name']); ?></td>
        			<td width="25%" style="font-size:14px;line-height:30px">
        			    <span style="font-size:15px;font-weight:bold;">Semester: </span>
        			    <?php 
        			    if($semester=="semester1"){
        			        echo "First";
        			    }
        			    if($semester=="semester2"){
        			        echo "Second";
        			    }
        			    if($semester=="semester3"){
        			        echo "Third";
        			    }
        			    if($semester=="semester4"){
        			        echo "Fourth";
        			    }
        			    if($semester=="semester5"){
        			        echo "Fifth";
        			    }
        			    if($semester=="semester6"){
        			        echo "Sixth";
        			    }
        			    if($semester=="semester7"){
        			        echo "Seventh";
        			    }
        			    if($semester=="semester8"){
        			        echo "Eight";
        			    }
        			     ?> 
        			    
        			    </td>
        		</tr>
        	</table>
            <table style="width:100%;">	 		
        		<tr class="spacer">
        			<td width="75%" style="font-size:14px;line-height:30px;font-weight:bold">
						<span style="margin-left:0px;font-size:15px;font-weight:bold">Name of Examination: </span>
						<?php
						    if($course=="Master Programme In Business Administration (NGO & Project Management)"){
								echo "Master Programme In Business Administration";
							}
							if($course=="Master Programme In Business Administration ( Hotel & Human Resources Management)"){
								echo "Master Programme In Business Administration";
							}
							if($course=="Master Programme In Business Administration ( Marketing)"){
								echo "Master Programme In Business Administration";
							}
							elseif($course=="Master Programme in Business Administration (Agri & Food Busi.)"){
								echo "Master Programme In Business Administration";
							}
							elseif($course=="Master Programme In Business Administration (Construction Management)"){
								echo "Master Programme In Business Administration";
							}
							elseif($course=="Master Programme in Business Administration (Digital Management)"){
								echo "Master Programme In Business Administration";
							}
							elseif($course=="Master Programme In Business Administration (ECommerce)"){
								echo "Master Programme In Business Administration";
							}
							elseif($course=="Master Programme In Business Administration (Finance & HR Management)"){
								echo "Master Programme In Business Administration";
							}
							elseif($course=="Master Programme In Business Administration (Finance & Marketing)"){
								echo "Master Programme In Business Administration";
							}
							elseif($course=="Master Programme In Business Administration (Finance Management)"){
								echo "Master Programme In Business Administration";
							}
							elseif($course=="Master Programme In Business Administration (General management)"){
								echo "Master Programme In Business Administration";
							}
							elseif($course=="Master Programme In Business Administration (Hospital Administration)"){
								echo "Master Programme In Business Administration";
							}
							elseif($course=="Master Programme In Business Administration (Hotel Management)"){
								echo "Master Programme In Business Administration";
							}
							elseif($course=="Master Programme in Business Administration (Human Resources)"){
								echo "Master Programme In Business Administration";
							}
							elseif($course=="Master Programme In Business Administration (Information Technology)"){
								echo "Master Programme In Business Administration";
							}
							elseif($course=="Master Programme In Business Administration (international Business & information Technology)"){
								echo "Master Programme In Business Administration";
							}
							elseif($course=="Master Programme In Business Administration (International Business)"){
								echo "Master Programme In Business Administration";
							}
							elseif($course=="Master Programme In Business Administration (Logistics,Supply chain & Marketing)"){
								echo "Master Programme In Business Administration";
							}
							elseif($course=="Master Programme in Business Administration (Marketing Management)"){
								echo "Master Programme In Business Administration";
							}
							elseif($course=="Master Programme in Business Administration (Oil & Gas)"){
								echo "Master Programme In Business Administration";
							}
							elseif($course=="Master Programme in Business Administration (Operations & Supply Chain Management)"){
								echo "Master Programme In Business Administration";
							}
							elseif($course=="Master Programme in Business Administration (Petroleum Industry)"){
								echo "Master Programme In Business Administration";
							}
							elseif($course=="Master Programme in Business Administration (Pollution Control)"){
								echo "Master Programme In Business Administration";
							}
							elseif($course=="Master Programme In Business Administration (Production & Operation Management)"){
								echo "Master Programme In Business Administration";
							}
							elseif($course=="Master Programme In Business Administration (Project Management)"){
								echo "Master Programme In Business Administration";
							}
							elseif($course=="Master Programme In Business Administration (Quality Management)"){
								echo "Master Programme In Business Administration";
							}
							elseif($course=="Master Programme In Business Administration (Sales & Marketing)"){
								echo "Master Programme In Business Administration";
							}
							elseif($course=="Master Programme In Business Administration (Security Management)"){
								echo "Master Programme In Business Administration";
							}
							elseif($course=="Master Programme In Business Administration (Store Management)"){
								echo "Master Programme In Business Administration";
							}
							elseif($course=="Master Programme In Business Administration (Supply Chain Management)"){
								echo "Master Programme In Business Administration";
							}
							elseif($course=="Master Programme In Business Administration in Dual Specializations (Logistics,Supply chain & Marke"){
								echo "Master Programme In Business Administration";
							}
							elseif($course=="Master Programme In Business Administration in Dual Specializations (Supply chain & logistics suppl"){
								echo "Master Programme In Business Administration";
							}
							elseif($course=="Master Programme In Business Administration In Dual Specializations (Construction Management & Gener"){
								echo "Master Programme In Business Administration";
							}
							elseif($course=="Master Programme In Business Administration In Dual Specializations (HR & finance management)"){
								echo "Master Programme In Business Administration";
							}
							elseif($course=="Master Programme In Business Administration In Dual Specializations (HR & Marketing management)"){
								echo "Master Programme In Business Administration";
							}
							elseif($course=="Master Programme In Business Administration In Dual Specializations (International Business & Market"){
								echo "Master Programme In Business Administration";
							}
							elseif($course=="Master Programme In Business Administration In Dual Specializations (Marketing & Tourism Management)"){
								echo "Master Programme In Business Administration";
							}
							elseif($course=="Master Programme In Business Administration In Dual Specializations (Material Management & Operation"){
								echo "Master Programme In Business Administration";
							}
							elseif($course=="Master Programme In Business Administration In Dual Specializations (supply,operation & Logistics"){
								echo "Master Programme In Business Administration";
							}
							elseif($course=="Master Programme In Business Administration(Marketing Mgmt & Production Operation Mgmt)"){
								echo "Master Programme In Business Administration";
							}else{
								echo $course;
							}
						?>
					</td>
					<td width="25%" style="font-size:14px;line-height:30px;font-weight:bold">
					    <span style="font-size:15px;font-weight:bold">D.O.B.: </span> <?php echo $row['dob']; ?>
					</td>
        		</tr>
        	</table>
            <table bordercolor="black"style="margin-top:-1px;height:192px;border:1px solid #000;text-align:center;width:97%;margin-left: 0px;">
                <?php $queryresult= mysqli_query($con,"SELECT sub.subject1,sub.subject2, sub.subject3,sub.subject4,sub.subject5, sub.subject6,sub.subject7,mark.subject1,mark.subject2,mark.subject3,mark.subject4,mark.subject5,mark.subject6,mark.subject7,mark.stu_result FROM `semester_subject` AS sub INNER JOIN `students_marks` AS mark ON sub.enrolment = mark.enrolment and sub.semester = mark.semester WHERE mark.enrolment = '$enrollement' AND mark.semester = '$semester'");
                    $rowdata = mysqli_fetch_array($queryresult);
                    $subcount = 0;
                    $totalmax = 0;
                    $totalmin = 0;
                    $totalobt= 0;
                    ?>
                    <?php if(!empty($rowdata[0])){ 
                    $totalmax += 100;
                    $totalmin += 40;
                    $totalobt += $rowdata['subject1'];
                
                ?>
                <tr>
                    <th style="border:1px solid #000;text-align:center">S.NO.</th>
                    <th style="min-width:405px;border:1px solid #000;padding-left:10px;text-align:center">Subject</th>
                    <th style="max-width:115px;border:1px solid #000;text-align:center">Maximum<br> Marks</th>
                    <th style="max-width:115px;border:1px solid #000;text-align:center">Pass<br> Marks</th>
                    <th style="max-width:115px;border:1px solid #000;text-align:center">Secured<br> Marks</th>
                    <th style="min-width:270px;border:1px solid #000;text-align:center">Total<br> (In Words)</th>
                </tr>
                        
                
                <tr>
                    <td style="line-height:15px;border:1px solid #000">1</td>
                    <td style="padding-left:15px;text-align:left;line-height:15px;border:1px solid #000">
                    <?php 
                    $subj = $rowdata[0];
                    $nesub = wordwrap($subj, 40, "<br />\n");
                    echo $nesub;
                    ?>
                    </td>
                    <td style="line-height:30px;border:1px solid #000">100</td>
                    <td style="line-height:30px;border:1px solid #000">40</td>
                    <td style="line-height:30px;border:1px solid #000;"><?php echo $rowdata['subject1']; ?></td>
                    <td style="line-height:30px;border:1px solid #000">
                    <?php
                    $array  = array_map('intval', str_split($rowdata['subject1']));
                     numberTowords($array);
                     $subcount++;
                    ?>
                    </td> 
                </tr>
                <?php } ?>
                <?php if(!empty($rowdata[1])){
                $totalmax += 100;
                $totalmin += 40;
                $totalobt += $rowdata['subject2'];
                ?>
                <tr>
                   <td style="line-height:15px;border:1px solid #000">2</td>
                    <td style="padding-left:15px;text-align:left;line-height:30px;border:1px solid #000"><?php echo $rowdata[1]; ?></td>
                    <td style="line-height:30px;border:1px solid #000">100</td>
                    <td style="line-height:30px;border:1px solid #000">40</td>
                    <td style="line-height:30px;border:1px solid #000;"><?php echo $rowdata['subject2']; ?></td>
                    <td style="line-height:30px;border:1px solid #000"><?php
                    $array  = array_map('intval', str_split($rowdata['subject2']));
                     numberTowords($array);
                     $subcount++;
                    ?></td> 
                </tr>
                <?php } ?>
                <?php if(!empty($rowdata[2])){
                $totalmax += 100;
                $totalmin += 40;
                $totalobt += $rowdata['subject3'];
                ?>
                <tr>
                   <td style="line-height:15px;border:1px solid #000">3</td>
                    <td style="padding-left:15px;text-align:left;line-height:30px;border:1px solid #000"><?php echo $rowdata[2]; ?></td>
                    <td style="line-height:30px;border:1px solid #000">100</td>
                    <td style="line-height:30px;border:1px solid #000">40</td>
                    <td style="line-height:30px;border:1px solid #000;"><?php echo $rowdata['subject3']; ?></td>
                    <td style="line-height:30px;border:1px solid #000"><?php
                    $array  = array_map('intval', str_split($rowdata['subject3']));
                     numberTowords($array);
                     $subcount++;
                    ?></td> 
                </tr>
                <?php } ?>
                <?php if(!empty($rowdata[3])){ 
                $totalmax += 100;
                $totalmin += 40;
                $totalobt += $rowdata['subject4'];
                ?>
                <tr>
                   <td style="line-height:30px;border:1px solid #000">4</td>
                    <td style="padding-left:15px;text-align:left;line-height:30px;border:1px solid #000"><?php echo $rowdata[3]; ?></td>
                    <td style="border:1px solid #000">100</td>
                    <td style="line-height:30px;border:1px solid #000">40</td>
                    <td style="line-height:30px;border:1px solid #000;"><?php echo $rowdata['subject4']; ?></td>
                    <td style="line-height:30px;border:1px solid #000"><?php
                    $array  = array_map('intval', str_split($rowdata['subject4']));
                     numberTowords($array);
                     $subcount++;
                    ?></td> 
                </tr>
                <?php } ?>
                <?php if(!empty($rowdata[4])){ 
                $totalmax += 100;
                $totalmin += 40;
                $totalobt += $rowdata['subject5'];
                ?>
                <tr>
                   <td style="border:1px solid #000">5</td>
                    <td style="padding-left:15px;text-align:left;line-height:30px;border:1px solid #000"><?php echo $rowdata[4]; ?></td>
                    <td style="line-height:30px;border:1px solid #000">100</td>
                    <td style="line-height:30px;border:1px solid #000">40</td>
                    <td style="line-height:30px;border:1px solid #000;"><?php echo $rowdata['subject5']; ?></td>
                    <td style="line-height:30px;border:1px solid #000"><?php
                    $array  = array_map('intval', str_split($rowdata['subject5']));
                     numberTowords($array);
                     $subcount++;
                    ?></td> 
                </tr>
                 <?php } ?>
                <?php if(!empty($rowdata[5])){ 
                $totalmax += 100;
                $totalmin += 40;
                $totalobt += $rowdata['subject6'];
                ?>
                <tr>
                   <td style="line-height:15px;border:1px solid #000">6</td>
                    <td style="padding-left:15px;text-align:left;line-height:15px;border:1px solid #000"><?php echo $rowdata[5]; ?></td>
                    <td style="line-height:30px;border:1px solid #000">100</td>
                    <td style="line-height:30px;border:1px solid #000">40</td>
                    <td style="line-height:30px;border:1px solid #000;"><?php echo $rowdata['subject6']; ?></td>
                    <td style="line-height:30px;border:1px solid #000"><?php
                    $array  = array_map('intval', str_split($rowdata['subject6']));
                     numberTowords($array);
                     $subcount++;
                    ?>
                    </td> 
                </tr>
                <?php } ?>
            <?php if($subcount == 4){ ?>
            <tr>
                <td style="border:1px solid #000"></td>
                <td style="border:1px solid #000">Total</td>
                <td style="line-height:30px;border:1px solid #000"><?php echo$totalmax; ?></td>
                <td style="line-height:30px;border:1px solid #000"><?php echo$totalmin; ?></td>
                <td style="line-height:30px;border:1px solid #000"><?php echo$totalobt; ?></td>
                <td style="line-height:30px;border:1px solid #000"><?php
                $array  = array_map('intval', str_split($totalobt));
                 numberTowords($array);
                ?>
                </td>
            </tr>
            <?php } ?>    
            <?php if($subcount == 5){ ?>
            <tr style="margin-top:70px !important">
                <td style="border:1px solid #000"></td>
                <td style="border:1px solid #000">Total</td>
                <td style="line-height:30px;border:1px solid #000"><?php echo$totalmax; ?></td>
                <td style="line-height:30px;border:1px solid #000"><?php echo$totalmin; ?></td>
                <td style="line-height:30px;border:1px solid #000"><?php echo$totalobt; ?></td>
                <td style="line-height:30px;border:1px solid #000"><?php
                $array  = array_map('intval', str_split($totalobt));
                 numberTowords($array);
                ?>
                </td>
            </tr>
            
            <?php } ?>
            <?php if($subcount == 6){ ?>
            <tr>
                <td style="border:1px solid #000"></td>
                <td style="border:1px solid #000;text-align:right">Total</td>
                <td style="line-height:30px;border:1px solid #000"><?php echo$totalmax; ?></td>
                <td style="line-height:30px;border:1px solid #000"><?php echo$totalmin; ?></td>
                <td style="line-height:30px;border:1px solid #000"><?php echo$totalobt; ?></td>
                <td style="line-height:30px;border:1px solid #000"><?php
                $array  = array_map('intval', str_split($totalobt));
                 numberTowords($array);
                ?>
                </td>
            </tr>
            <?php } ?>
            </table>
                <?php 
                	$queryresult= mysqli_query($con,"SELECT semester,total_obt_marks FROM `students_marks` WHERE enrolment = '$enrollement'");
                	$datatotalobatp = array();
                	$markarray = array();
                	while($rowdata = mysqli_fetch_array($queryresult)){			
                		$datatotalobatp[] = $rowdata['semester'];
                		$markarray[] = $rowdata['total_obt_marks'];
                	}
                ?>
            <table style="margin-top:17px;margin-bottom: 0px;height:60px;border:1px solid #000;text-align:center;width:97%;margin-left: 0.1px;">
            	<tr>
            		<th style="text-align:center;width:256px;line-height:30px;border:1px solid #000;">Semester</th>
            		<td style="text-align:center;width:256px;line-height:30px;border:1px solid #000;">1st</td>
            		<td style="text-align:center;width:256px;line-height:30px;border:1px solid #000;">2nd</td>
            		<td style="text-align:center;width:256px;line-height:30px;border:1px solid #000;">3rd</td>
            		<td style="text-align:center;width:256px;line-height:30px;border:1px solid #000;">4th</td>
            		<td style="text-align:center;width:256px;line-height:30px;border:1px solid #000;">5th</td>
            		<td style="text-align:center;width:256px;line-height:30px;border:1px solid #000;">6th</td>
            		<td style="text-align:center;width:256px;line-height:30px;border:1px solid #000;">7th</td>
            		<td style="text-align:center;width:256px;line-height:30px;border:1px solid #000;">8th</td>
            		<td style="text-align:center;width:256px;line-height:30px;border:1px solid #000;" rowspan="2"> <?php echo $statusfg; ?><br><?php echo $date; ?></td>
            	</tr>
            	<tr>
            		<th style="text-align:center;width:256px;line-height:30px;border:1px solid #000;">Marks</th>
                    <?php if($semester=="semester1"){?>
                    <td style="text-align:center;width:256px;line-height:30px;border:1px solid #000;">
            			<?php 
            				if (in_array('semester1', $datatotalobatp)){
            					$a = array_search('semester1', array_values($datatotalobatp),true);
            					echo $markarray[$a];
            				}else{
            					echo "L.E";
            				}	
            			?>
            		</td>
            		<td style="text-align:center;width:256px;line-height:30px;border:1px solid #000;">
            		<?php echo "-"; ?>
            		</td>
            		<td style="text-align:center;width:256px;line-height:30px;border:1px solid #000;">
            		<?php echo "-"; ?>
            		</td>
            		<td style="text-align:center;width:256px;line-height:30px;border:1px solid #000;">
            		<?php echo "-"; ?>
            		</td>
            		<td style="text-align:center;width:256px;line-height:30px;border:1px solid #000;">
            		<?php echo "-"; ?>
            		</td>
            		<td style="text-align:center;width:256px;line-height:30px;border:1px solid #000;">
            		<?php echo "-"; ?>
            		</td>
            		<td style="text-align:center;width:256px;line-height:30px;border:1px solid #000;">
            		<?php echo "-"; ?>	
            		</td>
            		<td style="text-align:center;width:256px;line-height:30px;border:1px solid #000;">
            		<?php echo "-"; ?>
            		</td>
                    <?php } ?>
                    <?php if($semester=="semester2"){ ?>
                    <td style="text-align:center;width:256px;line-height:30px;border:1px solid #000;">
            			<?php 
            				if (in_array('semester1', $datatotalobatp)){
            					$a = array_search('semester1', array_values($datatotalobatp),true);
            					
            					echo $markarray[$a];
            				}else{
            					echo "L.E";
            				}
            			?>
            		</td>
            		<td style="text-align:center;width:256px;line-height:30px;border:1px solid #000;">
            			<?php 
            				if (in_array('semester2', $datatotalobatp)){
            					$b = array_search('semester2', array_values($datatotalobatp),true);
            					echo $markarray[$b];
            				}else{
            					echo "L.E";
            				}
            			?>
            		</td>
            		<td style="text-align:center;width:256px;line-height:30px;border:1px solid #000;">
            		<?php echo "-"; ?>
            		</td>
            		<td style="text-align:center;width:256px;line-height:30px;border:1px solid #000;">
            		<?php echo "-"; ?>
            		</td>
            		<td style="text-align:center;width:256px;line-height:30px;border:1px solid #000;">
            		<?php echo "-"; ?>
            		</td>
            		<td style="text-align:center;width:256px;line-height:30px;border:1px solid #000;">
            		<?php echo "-"; ?>
            		</td>
            		<td style="text-align:center;width:256px;line-height:30px;border:1px solid #000;">
            		<?php echo "-"; ?>	
            		</td>
            		<td style="text-align:center;width:256px;line-height:30px;border:1px solid #000;">
            		<?php echo "-"; ?>
            		</td>
                    <?php } ?>
                    <?php if($semester=="semester3"){ ?>
                    <td style="text-align:center;width:256px;line-height:30px;border:1px solid #000;">
            			<?php 
            				if (in_array('semester1', $datatotalobatp)){
            					$a = array_search('semester1', array_values($datatotalobatp),true);
            					echo $markarray[$a];
            				}else{
            					echo "L.E";
            				}
            			?>
            		</td>
            		<td style="text-align:center;width:256px;line-height:30px;border:1px solid #000;">
            			<?php 
            				if (in_array('semester2', $datatotalobatp)){
            					$b = array_search('semester2', array_values($datatotalobatp),true);
            					echo $markarray[$b];
            				}else{
            					echo "L.E";
            				}
            			?>
            		</td>
            		<td style="text-align:center;width:256px;line-height:30px;border:1px solid #000;">
            			<?php 
            				if (in_array('semester3', $datatotalobatp)){
            					$c = array_search('semester3', array_values($datatotalobatp));
            					echo $markarray[$c];
            				}else{
            					echo "L.E";
            				}
            			?>
            		</td>
            		<td style="text-align:center;width:256px;line-height:30px;border:1px solid #000;">
            		<?php echo "-"; ?>
            		</td>
            		<td style="text-align:center;width:256px;line-height:30px;border:1px solid #000;">
            		<?php echo "-"; ?>
            		</td>
            		<td style="text-align:center;width:256px;line-height:30px;border:1px solid #000;">
            		<?php echo "-"; ?>
            		</td>
            		<td style="text-align:center;width:256px;line-height:30px;border:1px solid #000;">
            		<?php echo "-"; ?>	
            		</td>
            		<td style="text-align:center;width:256px;line-height:30px;border:1px solid #000;">
            		<?php echo "-"; ?>
            		</td>
                    <?php } ?>
                    <?php if($semester=="semester4"){ ?>
            		<td style="text-align:center;width:256px;line-height:30px;border:1px solid #000;">
            			<?php 
            				if (in_array('semester1', $datatotalobatp)){
            					$a = array_search('semester1', array_values($datatotalobatp),true);
            					echo $markarray[$a];
            				}else{
            					echo "L.E";
            				}
            			?>
            		</td>
            		<td style="text-align:center;width:256px;line-height:30px;border:1px solid #000;">
            			<?php 
            				if (in_array('semester2', $datatotalobatp)){
            					$b = array_search('semester2', array_values($datatotalobatp),true);
            					echo $markarray[$b];
            				}else{
            					echo "L.E";
            				}
            			?>
            		</td>
            		<td style="text-align:center;width:256px;line-height:30px;border:1px solid #000;">
            			<?php 
            				if (in_array('semester3', $datatotalobatp)){
            					$c = array_search('semester3', array_values($datatotalobatp));
            					echo $markarray[$c];
            				}else{
            					echo "L.E";
            				}
            			?>
            		</td>
            		<td style="text-align:center;width:256px;line-height:30px;border:1px solid #000;">
            			<?php 	
            				if (in_array('semester4', $datatotalobatp)){
            					$d = array_search('semester4', array_values($datatotalobatp));
            					echo $markarray[$d];
            				}else{
            					echo "L.E";
            				}
            			?>
            		</td>
            		<td style="text-align:center;width:256px;line-height:30px;border:1px solid #000;">
            		<?php echo "-"; ?>
            		</td>
            		<td style="text-align:center;width:256px;line-height:30px;border:1px solid #000;">
            		<?php echo "-"; ?>
            		</td>
            		<td style="text-align:center;width:256px;line-height:30px;border:1px solid #000;">
            		<?php echo "-"; ?>	
            		</td>
            		<td style="text-align:center;width:256px;line-height:30px;border:1px solid #000;">
            		<?php echo "-"; ?>
            		</td>
                    <?php } ?>
                    <?php if($semester=="semester5"){ ?>
            		<td style="text-align:center;width:256px;line-height:30px;border:1px solid #000;">
            			<?php 
            				if (in_array('semester1', $datatotalobatp)){
            					$a = array_search('semester1', array_values($datatotalobatp),true);
            					echo $markarray[$a];
            				}else{
            					echo "L.E";
            				}	
            			?>
            		</td>
            		<td style="text-align:center;width:256px;line-height:30px;border:1px solid #000;">
            			<?php 
            				if (in_array('semester2', $datatotalobatp)){
            					$b = array_search('semester2', array_values($datatotalobatp),true);
            					echo $markarray[$b];
            				}else{
            					echo "L.E";
            				}
            			?>
            		</td>
            		<td style="text-align:center;width:256px;line-height:30px;border:1px solid #000;">
            			<?php 
            				if (in_array('semester3', $datatotalobatp)){
            					$c = array_search('semester3', array_values($datatotalobatp));
            					echo $markarray[$c];
            				}else{
            					echo "L.E";
            				}
            			?>
            		</td>
            		<td style="text-align:center;width:256px;line-height:30px;border:1px solid #000;">
            			<?php 	
            				if (in_array('semester4', $datatotalobatp)){
            					$d = array_search('semester4', array_values($datatotalobatp));
            					echo $markarray[$d];
            				}else{
            					echo "L.E";
            				}
            			?>
            		</td>
            		<td style="text-align:center;width:256px;line-height:30px;border:1px solid #000;">
            			<?php 	
            				if (in_array('semester5', $datatotalobatp)){
            					$e = array_search('semester5', array_values($datatotalobatp));
            					echo $markarray[$e];
            				}else{
            					echo "L.E";
            				}
            			?>
            		</td>
            		<td style="text-align:center;width:256px;line-height:30px;border:1px solid #000;">
            		<?php echo "-"; ?>
            		</td>
            		<td style="text-align:center;width:256px;line-height:30px;border:1px solid #000;">
            		<?php echo "-"; ?>	
            		</td>
            		<td style="text-align:center;width:256px;line-height:30px;border:1px solid #000;">
            		<?php echo "-"; ?>
            		</td>
            	    <?php } ?>
            	    <?php if($semester=="semester6"){ ?>
            		     
            		<td style="text-align:center;width:256px;line-height:30px;border:1px solid #000;">
            			<?php 
            				if (in_array('semester1', $datatotalobatp)){
            					$a = array_search('semester1', array_values($datatotalobatp),true);
            					echo $markarray[$a];
            				}else{
            					echo "L.E";
            				}
            			?>
            		</td>
            		<td style="text-align:center;width:256px;line-height:30px;border:1px solid #000;">
            			<?php 
            				if (in_array('semester2', $datatotalobatp)){
            					$b = array_search('semester2', array_values($datatotalobatp),true);
            					echo $markarray[$b];
            				}else{
            					echo "L.E";
            				}
            				
            			?>
            		</td>
            		<td style="text-align:center;width:256px;line-height:30px;border:1px solid #000;">
            			<?php 
            				if (in_array('semester3', $datatotalobatp)){
            					$c = array_search('semester3', array_values($datatotalobatp));
            					echo $markarray[$c];
            				}else{
            					echo "L.E";
            				}
            				
            			?>
            		</td>
            		<td style="text-align:center;width:256px;line-height:30px;border:1px solid #000;">
            			<?php 	
            				if (in_array('semester4', $datatotalobatp)){
            					$d = array_search('semester4', array_values($datatotalobatp));
            					echo $markarray[$d];
            				}else{
            					echo "L.E";
            				}
            			?>
            		</td>
            		<td style="text-align:center;width:256px;line-height:30px;border:1px solid #000;">
            			<?php 	
            				if (in_array('semester5', $datatotalobatp)){
            					$e = array_search('semester5', array_values($datatotalobatp));
            					echo $markarray[$e];
            				}else{
            					echo "L.E";
            				}
            			?>
            		</td>
            		<td style="text-align:center;width:256px;line-height:30px;border:1px solid #000;">
            			<?php 	
            				if (in_array('semester6', $datatotalobatp)){
            					$f = array_search('semester6', array_values($datatotalobatp));
            					echo $markarray[$f];
            				}else{
            					echo "L.E";
            				}
            			?>
            		</td>
            		<td style="text-align:center;width:256px;line-height:30px;border:1px solid #000;">
            		<?php echo "-"; ?>	
            		</td>
            		<td style="text-align:center;width:256px;line-height:30px;border:1px solid #000;">
            		<?php echo "-"; ?>
            		</td>
            		<?php } ?>
            		<?php if($semester=="semester7"){ ?>
            		<td style="text-align:center;width:256px;line-height:30px;border:1px solid #000;">
            			<?php 
            				if (in_array('semester1', $datatotalobatp)){
            					$a = array_search('semester1', array_values($datatotalobatp),true);
            					echo $markarray[$a];
            				}else{
            					echo "L.E";
            				}
            			?>
            		</td>
            		<td style="text-align:center;width:256px;line-height:30px;border:1px solid #000;">
            			<?php 	
            				
            				if (in_array('semester2', $datatotalobatp)){
            					$b = array_search('semester2', array_values($datatotalobatp),true);
            					echo $markarray[$b];
            				}else{
            					echo "L.E";
            				}
            			?>
            		</td>
            		<td style="text-align:center;width:256px;line-height:30px;border:1px solid #000;">
            			<?php 
            				
            				if (in_array('semester3', $datatotalobatp)){
            					$c = array_search('semester3', array_values($datatotalobatp));
            					echo $markarray[$c];
            				}else{
            					echo "L.E";
            				}
            			?>
            		</td>
            		<td style="text-align:center;width:256px;line-height:30px;border:1px solid #000;">
            			<?php 	
            				if (in_array('semester4', $datatotalobatp)){
            					$d = array_search('semester4', array_values($datatotalobatp));
            					echo $markarray[$d];
            				}else{
            					echo "L.E";
            				}
            			?>
            		</td>
            		<td style="text-align:center;width:256px;line-height:30px;border:1px solid #000;">
            			<?php 	
            				if (in_array('semester5', $datatotalobatp)){
            					$e = array_search('semester5', array_values($datatotalobatp));
            					echo $markarray[$e];
            				}else{
            					echo "L.E";
            				}
            			?>
            		</td>
            		<td style="text-align:center;width:256px;line-height:30px;border:1px solid #000;">
            			<?php 	
            				if (in_array('semester6', $datatotalobatp)){
            					$f = array_search('semester6', array_values($datatotalobatp));
            					echo $markarray[$f];
            				}else{
            					echo "L.E";
            				}
            			?>
            		</td>
            		<td style="text-align:center;width:256px;line-height:30px;border:1px solid #000;">
            			<?php 	
            				if (in_array('semester7', $datatotalobatp)){
            					$g = array_search('semester7', array_values($datatotalobatp));
            					echo $markarray[$g];
            				}else{
            					echo "L.E";
            				}
            			?>	
            		</td>
            		<td style="text-align:center;width:256px;line-height:30px;border:1px solid #000;">
            		<?php echo "-";	?>
            		</td>
            	    <?php } ?>
            	    <?php if($semester=="semester8"){ ?>
            		<td style="text-align:center;width:256px;line-height:30px;border:1px solid #000;">
            			<?php 
            				if (in_array('semester1', $datatotalobatp)){
            					$a = array_search('semester1', array_values($datatotalobatp),true);
            					echo $markarray[$a];
            				}else{
            					echo "L.E";
            				}	
            			?>
            		</td>
            		<td style="text-align:center;width:256px;line-height:30px;border:1px solid #000;">
            			<?php 	
            				
            				if (in_array('semester2', $datatotalobatp)){
            					$b = array_search('semester2', array_values($datatotalobatp),true);
            					echo $markarray[$b];
            				}else{
            					echo "L.E";
            				}	
            			?>
            		</td>
            		<td style="text-align:center;width:256px;line-height:30px;border:1px solid #000;">
            			<?php 
            				
            				if (in_array('semester3', $datatotalobatp)){
            					$c = array_search('semester3', array_values($datatotalobatp));
            					echo $markarray[$c];
            				}else{
            					echo "L.E";
            				}
            			?>
            		</td>
            		<td style="text-align:center;width:256px;line-height:30px;border:1px solid #000;">
            			<?php 	
            				if (in_array('semester4', $datatotalobatp)){
            					$d = array_search('semester4', array_values($datatotalobatp));
            					echo $markarray[$d];
            				}else{
            					echo "L.E";
            				}
            			?>
            		</td>
            		<td style="text-align:center;width:256px;line-height:30px;border:1px solid #000;">
            			<?php 	
            				if (in_array('semester5', $datatotalobatp)){
            					$e = array_search('semester5', array_values($datatotalobatp));
            					echo $markarray[$e];
            				}else{
            					echo "L.E";
            				}
            			?>
            		</td>
            		<td style="text-align:center;width:256px;line-height:30px;border:1px solid #000;">
            			<?php 	
            				if (in_array('semester6', $datatotalobatp)){
            					$f = array_search('semester6', array_values($datatotalobatp));
            					echo $markarray[$f];
            				}else{
            					echo "L.E";
            				}
            			?>
            		</td>
            		<td style="text-align:center;width:256px;line-height:30px;border:1px solid #000;">
            			<?php 	
            				if (in_array('semester7', $datatotalobatp)){
            					$g = array_search('semester7', array_values($datatotalobatp));
            					echo $markarray[$g];
            				}else{
            					echo "L.E";
            				}
            			?>	
            		</td>
            		<td style="text-align:center;width:256px;line-height:30px;border:1px solid #000;">
            			<?php 	
            				if (in_array('semester8', $datatotalobatp)){
            					$h = array_search('semester8', array_values($datatotalobatp));
            					echo $markarray[$h];
            				}else{
            					echo "L.E";
            				}
            			?>
            		</td>
            		<?php } ?>
            	</tr>
            </table>
        </td>
    </tr>
</table>
<img style="width:100%;height:755px;opacity: 0.6;" src="images/iimsr-marks-back-ok.jpeg" alt="DZone"/>
<style>
    table, th, td {
        /*border: 1px solid black;*/
        border-collapse: collapse;
    }
</style>