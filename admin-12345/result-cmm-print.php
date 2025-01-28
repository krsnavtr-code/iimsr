<style>
.cmm-image {
    background-image: url('pdf-folder/iimsr-cmm-lowres.jpeg'); /* Placeholder image */
    background-size: cover;
}
.cmm-image.loaded {
    background-image: url('pdf-folder/iimsr-cmm.jpeg'); /* High-resolution image */
}

</style>
<?php
error_reporting(0);
include('checklogin.php');
include("dbconnection.php");
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;
include("functions.php");
$enrollement = strtoupper($_POST['enrollement']);
$semester = $_POST['semester'];
$course = $_POST['course'];
$query = "SELECT r.name,r.dob, r.fathers_name,r.course,r.specilization,r.courseslug,m.serial_no,m.year,m.total_max_marks,m.semester,m.total_min_marks,m.certificate_grade,
m.certificate_month,m.total_obt_marks,m.certificated_deliver_date,m.stu_result FROM `register_here` AS r INNER JOIN `students_marks` AS m ON r.enrolment = m.enrolment 
WHERE m.enrolment = '$enrollement' AND m.semester = '$semester'";
$result = mysqli_query($con,$query);
$row = mysqli_fetch_array($result);
$row['certificated_deliver_date'];
$certificated_deliver_date = $row['certificated_deliver_date'];

?>
<!--<img style="width:100%;opacity: 0.6;" src="pdf-folder/CMM-final-live.jpeg" alt="DZone"/>-->
<!--<img style="width:100%;height:1030px; opacity: 0.9;" src="pdf-folder/VB-CMM.jpeg" alt="DZone"/>-->
<img class="cmm-image" id="cmmImage" style="width: 210mm; height: 297mm; opacity: 0.9;" src="pdf-folder/iimsr-cmm-lowres.jpeg" alt="DZone"/>
<!-- <img style=" width:210mm;height:297mm; opacity: 0.9;" src="pdf-folder/iimsr-cmm.jpeg" alt="DZone" />  -->
<!--<img style="width:100%;height:1100px; opacity: 0.9;" src="pdf-folder/VB-CMM.jpeg" alt="DZone"/>-->
<table style="width:92%;margin-top:-965px;margin-left: 36px;opacity: 0.9;z-index:9999999;line-height:20px">
     <tr>
		<td style="font-size:11px;"><strong style="position: relative;">Name : </strong><?php echo $row['name']; ?></td>
	</tr>
</table>
<table style="width:92%;margin-left: 36px;opacity: 0.9;">
     <tr>
		<td width="100%" style="font-size:11px;"><strong>Father Name : </strong><?php echo $row['fathers_name']; ?></td>
	</tr>
</table>
<table style="width:92%;margin-left: 36px;opacity: 0.9;">
    <tr>
		<td width="100%" style="font-size:11px;"><strong>Enrolment : </strong><?php echo $enrollement ?></td>
	</tr>
</table>
    <?php
        if (isset($_POST['enrollement'])){
        $queryresult= mysqli_query($con,"SELECT sub.subject1,sub.subject2,sub.subject3,sub.subject4,sub.subject5,sub.subject6,sub.subject7,sub.total_obt_marks,mark.serial_no,mark.semester,mark.year,mark.subject1,mark.subject2,mark.subject3,mark.subject4,mark.subject5,mark.subject6,mark.subject7,mark.stu_result,mark.pass_month_year FROM `semester_subject` AS sub INNER JOIN `students_marks` AS mark ON sub.enrolment = mark.enrolment WHERE mark.enrolment = '$enrollement' AND mark.semester= sub.semester ORDER BY `mark`.`semester` ASC ");
    ?>
    <?php
        $semdata=array();
        while($rowdata = mysqli_fetch_array($queryresult)){
            //print_r($rowdata);
            $semdata[]=array(
                "Subject1"=>$rowdata[0],
                "Subject_Mark_1"=>$rowdata['subject1'],
                "Subject2"=>$rowdata[1],
                "Subject_Mark_2"=>$rowdata['subject2'],
                "Subject3"=>$rowdata[2],
                "Subject_Mark_3"=>$rowdata['subject3'],
                "Subject4"=>$rowdata[3],
                "Subject_Mark_4"=>$rowdata['subject4'],
                "Subject5"=>$rowdata[4],
                "Subject_Mark_5"=>$rowdata['subject5'],
                "Subject6"=>$rowdata[5],
                "Subject_Mark_6"=>$rowdata['subject6'],
                "Subject7"=>$rowdata[6],
                "Subject_Mark_7"=>$rowdata['subject7'],
                "Semester"=>$rowdata['semester'],
                "Year"=>$rowdata['year'],
                "serial_no"=>$rowdata['serial_no'],
                "stu_result"=>$rowdata['stu_result'],
                "Pass_Month_Year"=>$rowdata['pass_month_year'],
                "total_mark_obtain"=>$rowdata['total_obt_marks']
            );
        }
      //  print_r($semdata);exit;
    ?>
<table style="width:92%;margin-left: 36px;margin-top:-4px;opacity: 0.9;">
    <tr>
		<td width="70%" style="font-size:11px;"><strong>Course Name : </strong>
		<?php //echo $row['course']; 
		if($row['course']=="Master Programme In Business Administration ( Marketing)"){
			echo "Master Programme In Business Administration";
		}
		elseif($row['course']=="Master Programme in Business Administration (Agri & Food Busi.)"){
			echo "Master Programme In Business Administration";
		}
		elseif($row['course']=="Master Programme In Business Administration (Agricultural Business Management)"){
			echo "Master Programme In Business Administration";
		}
		elseif($row['course']=="Master Programme In Business Administration (Construction Management)"){
			echo "Master Programme In Business Administration";
		}
		elseif($row['course']=="Master Programme in Business Administration (Digital Management)"){
			echo "Master Programme In Business Administration";
		}
		elseif($row['course']=="Master Programme In Business Administration (Finance & Marketing)"){
			echo "Master Programme In Business Administration";
		}
		elseif($row['course']=="Master Programme In Business Administration (Finance Management)"){
			echo "Master Programme In Business Administration";
		}
		elseif($row['course']=="Master Programme In Business Administration (Finance & HR Management)"){
			echo "Master Programme In Business Administration";
		}
		elseif($row['course']=="Master Programme In Business Administration (General management)"){
			echo "Master Programme In Business Administration";
		}
		elseif($row['course']=="Master Programme In Business Administration (Hotel Management)"){
			echo "Master Programme In Business Administration";
		}
		elseif($row['course']=="Master Programme in Business Administration (Human Resources)"){
			echo "Master Programme In Business Administration";
		}
		elseif($row['course']=="Master Programme In Business Administration (Information Technology)"){
			echo "Master Programme In Business Administration";
		}
		elseif($row['course']=="Master Programme In Business Administration (International Business)"){
			echo "Master Programme In Business Administration";
		}
		elseif($row['course']=="Master Programme In Business Administration (Logistics,Supply chain & Marketing)"){
			echo "Master Programme In Business Administration";
		}
		elseif($row['course']=="Master Programme in Business Administration (Marketing Management)"){
			echo "Master Programme In Business Administration";
		}
		elseif($row['course']=="Master Programme in Business Administration (Oil & Gas)"){
			echo "Master Programme In Business Administration";
		}
		elseif($row['course']=="Master Programme in Business Administration (Operations & Supply Chain Management)"){
			echo "Master Programme In Business Administration";
		}
		elseif($row['course']=="Master Programme in Business Administration (Petroleum Industry)"){
			echo "Master Programme In Business Administration";
		}
		elseif($row['course']=="Master Programme in Business Administration (Pollution Control)"){
			echo "Master Programme In Business Administration";
		}
		elseif($row['course']=="Master Programme In Business Administration (Production & Operation Management)"){
			echo "Master Programme In Business Administration";
		}
		elseif($row['course']=="Master Programme In Business Administration (Project Management)"){
			echo "Master Programme In Business Administration";
		}
		elseif($row['course']=="Master Programme In Business Administration (Quality Management)"){
			echo "Master Programme In Business Administration";
		}
		elseif($row['course']=="Master Programme In Business Administration (Security Management)"){
			echo "Master Programme In Business Administration";
		}
		elseif($row['course']=="Master Programme In Business Administration (Store Management)"){
			echo "Master Programme In Business Administration";
		}
		elseif($row['course']=="Master Programme In Business Administration (Supply Chain Management)"){
			echo "Master Programme In Business Administration";
		}
		elseif($row['course']=="Master Programme In Business Administration in Dual Specializations (Logistics,Supply chain & Marke"){
			echo "Master Programme In Business Administration";
		}
		elseif($row['course']=="Master Programme In Business Administration in Dual Specializations (Supply chain & logistics suppl"){
			echo "Master Programme In Business Administration";
		}
		elseif($row['course']=="Master Programme In Business Administration In Dual Specializations (HR & finance management)"){
			echo "Master Programme In Business Administration";
		}
		elseif($row['course']=="Master Programme In Business Administration In Dual Specializations (HR & Marketing management)"){
			echo "Master Programme In Business Administration";
		}
		elseif($row['course']=="Master Programme In Business Administration In Dual Specializations (Material Management & Operation"){
			echo "Master Programme In Business Administration";
		}
		elseif($row['course']=="Master Programme In Business Administration(Marketing Mgmt & Production Operation Mgmt)"){
			echo "Master Programme In Business Administration";
		}
		elseif($row['course']=="Master Programme In Business Administration In Dual Specializations (Construction Management & Gener"){
			echo "Master Programme In Business Administration";
		}
		elseif($row['course']=="Master Programme In Business Administration (ECommerce)"){
			echo "Master Programme In Business Administration";
		}
		elseif($row['course']=="Master Programme In Business Administration In Dual Specializations (International Business & Market"){
			echo "Master Programme In Business Administration";
		}
		elseif($row['course']=="Master Programme In Business Administration In Dual Specializations (Marketing & Tourism Management)"){
			echo "Master Programme In Business Administration";
		}
		elseif($row['course']=="Master Programme In Business Administration In Dual Specializations (supply,operation & Logistics"){
			echo "Master Programme In Business Administration";
		}
		elseif($row['course']=="Master Programme In Business Administration ( Hotel & Human Resources Management)"){
			echo "Master Programme In Business Administration";
		}
		elseif($row['course']=="Master Programme In Business Administration (NGO & Project Management)"){
			echo "Master Programme In Business Administration";
		}
		elseif($row['course']=="Master Programme In Business Administration (Hospital Administration)"){
			echo "Master Programme In Business Administration";
		}
		elseif($row['course']=="Master Programme In Business Administration (international Business & Information Technology)"){
			echo "Master Programme In Business Administration";
		}
		elseif($row['course']=="Master Programme In Business Administration (Logistics & Supply Chain Management)"){
			echo "Master Programme In Business Administration";
		}
		else{
			echo $row['course'];
		}
		?>
		</td>
		<td width="30%" style="font-size:11px;"><strong>Month & Year Of Final Exam : </strong><?php echo $semdata[sizeof($semdata)-1]['Pass_Month_Year']; ?></td>
	</tr>
</table>
<table style="width:45%;margin-top:13px;float:left;margin-right:18px;margin-left: 30px;opacity: 0.9;" align="center">
    <tr>
		<td width="38%"style="text-align:center;font-size: 11px;border:1px solid #000;"><strong>Subject Title <br><hr> Maximum Marks In Theory/Lab </strong></td>
		<td width="4%"style="border: 1px solid #000;"><p class="rotate"> <b>NET Marks</b> </p></td>
		<td width="3%"style="border: 1px solid #000;"><p class="rotate"> <b>EXT Marks</b> </p></td>
		<td width="3%"style="border: 1px solid #000;"><p class="rotate"> <b>Total</b> </p></td>
		<td width="1%"style="border: 1px solid #000;"><p class="rotate"> <b>Grade</b> </p></td>
	</tr>
</table>
<!--<table style="width:48.7%;">-->
<table style="width:45%;margin-top:13px;opacity: 0.9;">
    <tr>
		<td width="37%"style="text-align:center;font-size:11px;border: 1px solid #000;"><strong>Subject Title <br><hr> Maximum Marks In Theory/Lab </strong></td>
		<td width="4%"style="border: 1px solid #000;"><p class="rotate"> <b>NET Marks</b> </p></td>
		<td width="3%"style="border: 1px solid #000;"><p class="rotate"> <b>EXT Marks</b> </p></td>
		<td width="3%"style="border: 1px solid #000;"><p class="rotate"> <b>Total</b> </p></td>
		<td width="1%"style="border: 1px solid #000;"><p class="rotate"> <b>Grade</b> </p></td>
	</tr>
</table>
<?php 
    $count=0;
    for($vk=0;$vk<sizeof($semdata);$vk++){  
    if($count==0){
?>
<?php 
    if($semdata[$vk]['Semester']==['semester1']){
    }elseif($semdata[$vk]['Semester']==['semester3']){
    }elseif($semdata[$vk]['Semester']==['semester5']){
    }elseif($semdata[$vk]['Semester']==['semester7']){
    } 
?>
<table style="width:45%; float:left;margin-left: 30px;height: 128px;opacity: 0.9;" align="center">
    <tr>
        <th colspan="5"><?php echo ucwords($semdata[$vk]['Semester']); ?></th>
    </tr>
    <tr>
        <tr>
            <td width="38%" align="center" style="border: 1px solid #000;font-size: 8px;"><b><?php echo $semdata[$vk]['Subject1']; ?></b><br></td>
            <td width="4%" align="center"style="border: 1px solid #000;font-size: 11px;">100</td>
            <td width="3%" align="center"style="border: 1px solid #000;font-size: 11px;">40</td>
            <td width="3%" align="center"style="border: 1px solid #000;font-size: 11px;"><?php echo $semdata[$vk]['Subject_Mark_1']; ?></td>
            <td width="1%" align="center"style="border: 1px solid #000;font-size: 11px;">
               <?php if($semdata[$vk]['Subject_Mark_1']>=40 && $semdata[$vk]['Subject_Mark_1']<=50){
               echo "C";
                }elseif($semdata[$vk]['Subject_Mark_1']>=50 && $semdata[$vk]['Subject_Mark_1']<=60){
                echo "B";
                }elseif($semdata[$vk]['Subject_Mark_1']>=60 && $semdata[$vk]['Subject_Mark_1']<=70){
                echo "B+";
                }elseif($semdata[$vk]['Subject_Mark_1']>=70 && $semdata[$vk]['Subject_Mark_1']<=80){
                echo "A";
                }elseif($semdata[$vk]['Subject_Mark_1']>=80 && $semdata[$vk]['Subject_Mark_1']<=100){
                echo "A+";
                
                } ?>
            </td>
        </tr>
        <tr>
            <td width="38%" align="center" style="border: 1px solid #000;font-size: 8px;"><b><?php echo $semdata[$vk]['Subject2']; ?></b><br></td>
            <td width="4%" align="center"style="border: 1px solid #000;font-size: 11px;">100</td>
            <td width="3%" align="center"style="border: 1px solid #000;font-size: 11px;">40</td>
            <td width="3%" align="center"style="border: 1px solid #000;font-size: 11px;"><?php echo $semdata[$vk]['Subject_Mark_2']; ?></td>
            <td width="1%" align="center"style="border: 1px solid #000;font-size: 11px;">
                <?php if($semdata[$vk]['Subject_Mark_2']>=40 && $semdata[$vk]['Subject_Mark_2']<=50){
                echo "C";
                }elseif($semdata[$vk]['Subject_Mark_2']>=50 && $semdata[$vk]['Subject_Mark_2']<=60){
                echo "B";
                }elseif($semdata[$vk]['Subject_Mark_2']>=60 && $semdata[$vk]['Subject_Mark_2']<=70){
                echo "B+";
                }elseif($semdata[$vk]['Subject_Mark_2']>=70 && $semdata[$vk]['Subject_Mark_2']<=80){
                echo "A";
                }elseif($semdata[$vk]['Subject_Mark_2']>=80 && $semdata[$vk]['Subject_Mark_2']<=100){
                echo "A+";
                
                } ?>
            </td>
        </tr>
	<?php if($semdata[$vk]['Subject3'] || $semdata[$vk]['Subject4'] || $semdata[$vk]['Subject5'] || $semdata[$vk]['Subject6']) {?>
        <?php if($semdata[$vk]['Subject3']) {?>
        <?php if($semdata[$vk]['Subject3']) {?>
        <tr>
            <td width="38%" align="center" style="border: 1px solid #000;font-size: 8px;"><b><?php echo $semdata[$vk]['Subject3']; ?></b><br></td>
            <td width="4%" align="center"style="border: 1px solid #000;font-size: 11px;">100</td>
            <td width="3%" align="center"style="border: 1px solid #000;font-size: 11px;">40</td>
            <td width="3%" align="center"style="border: 1px solid #000;font-size: 11px;"><?php echo $semdata[$vk]['Subject_Mark_3']; ?></td>
            <td width="1%" align="center"style="border: 1px solid #000;font-size: 11px;">
                <?php if($semdata[$vk]['Subject_Mark_3']>=40 && $semdata[$vk]['Subject_Mark_3']<=50){
               echo "C";
                }elseif($semdata[$vk]['Subject_Mark_3']>=50 && $semdata[$vk]['Subject_Mark_3']<=60){
                echo "B";
                }elseif($semdata[$vk]['Subject_Mark_3']>=60 && $semdata[$vk]['Subject_Mark_3']<=70){
                echo "B+";
                }elseif($semdata[$vk]['Subject_Mark_3']>=70 && $semdata[$vk]['Subject_Mark_3']<=80){
                echo "A";
                }elseif($semdata[$vk]['Subject_Mark_3']>=80 && $semdata[$vk]['Subject_Mark_3']<=100){
                echo "A+";
                } ?>
            </td>
        </tr>
		<?php } ?>
		<?php //if(empty($semdata[$vk]['Subject4'])) {?>
		<?php //if($semdata[$vk]['Subject2'] == $semdata[$vk]['Subject3']) {?>
		<!--<tr>
            <th style="border: 1px solid #000;"></th>
            <th style="border: 1px solid #000;text-align:center;font-size: 10px;"align="center">300</th>
            <th style="border: 1px solid #000;text-align:center;font-size: 10px;"align="center">120</th>
            <th style="border: 1px solid #000;text-align:center;font-size: 10px;"align="center"><?php //echo $semdata[$vk]['total_mark_obtain']; ?></th>
            <th style="border: 1px solid #000;"></th>
        </tr>-->
        
        <?php //if($semdata[$vk]['Subject2'] AND $semdata[$vk]['Subject3']) {?>
		<!--<tr>
            <th style="border: 1px solid #000;"></th>
            <th style="border: 1px solid #000;text-align:center;font-size: 10px;"align="center">300</th>
            <th style="border: 1px solid #000;text-align:center;font-size: 10px;"align="center">120</th>
            <th style="border: 1px solid #000;text-align:center;font-size: 10px;"align="center"><?php //echo $semdata[$vk]['total_mark_obtain']; ?></th>
            <th style="border: 1px solid #000;"></th>
        </tr>-->
        
		<?php //if($semdata[$vk]['Subject3'] == $semdata[$vk]['Subject4']) {?>
		<!--<tr>
            <th style="border: 1px solid #000;"></th>
            <th style="border: 1px solid #000;text-align:center;font-size: 10px;"align="center">300</th>
            <th style="border: 1px solid #000;text-align:center;font-size: 10px;"align="center">120</th>
            <th style="border: 1px solid #000;text-align:center;font-size: 10px;"align="center"><?php //echo $semdata[$vk]['total_mark_obtain']; ?></th>
            <th style="border: 1px solid #000;"></th>
        </tr>-->
        
        <?php }else{?>
		<tr>
            <th style="border: 1px solid #000;"></th>
            <th style="border: 1px solid #000;text-align:center;font-size: 10px;"align="center">200</th>
            <th style="border: 1px solid #000;text-align:center;font-size: 10px;"align="center">80</th>
            <th style="border: 1px solid #000;text-align:center;font-size: 10px;"align="center"><?php echo $semdata[$vk]['total_mark_obtain']; ?></th>
            <th style="border: 1px solid #000;"></th>
        </tr>
        <?php }?>
		
		<?php if($semdata[$vk]['Subject4']) {?>
        <?php if($semdata[$vk]['Subject4']) {?>
        <tr>
            <td width="38%" align="center" style="border: 1px solid #000;font-size: 8px;"><b><?php echo $semdata[$vk]['Subject4']; ?></b><br></td>
            <td width="4%" align="center"style="border: 1px solid #000;font-size: 11px;">100</td>
            <td width="3%" align="center"style="border: 1px solid #000;font-size: 11px;">40</td>
            <td width="3%" align="center"style="border: 1px solid #000;font-size: 11px;"><?php echo $semdata[$vk]['Subject_Mark_4']; ?></td>
            <td width="1%" align="center"style="border: 1px solid #000;font-size: 11px;">
                <?php if($semdata[$vk]['Subject_Mark_4']>=40 && $semdata[$vk]['Subject_Mark_4']<=50){
               echo "C";
                }elseif($semdata[$vk]['Subject_Mark_4']>=50 && $semdata[$vk]['Subject_Mark_4']<=60){
                echo "B";
                }elseif($semdata[$vk]['Subject_Mark_4']>=60 && $semdata[$vk]['Subject_Mark_4']<=70){
                echo "B+";
                }elseif($semdata[$vk]['Subject_Mark_4']>=70 && $semdata[$vk]['Subject_Mark_4']<=80){
                echo "A";
                }elseif($semdata[$vk]['Subject_Mark_4']>=80 && $semdata[$vk]['Subject_Mark_4']<=100){
                echo "A+";
                } ?>
            </td>
        </tr>
		<?php } ?>
		<?php if(empty($semdata[$vk]['Subject5'])) {?>
		<?php if($semdata[$vk]['Subject3'] == $semdata[$vk]['Subject4']) {?>
		<tr>
            <th style="border: 1px solid #000;"></th>
            <th style="border: 1px solid #000;text-align:center;font-size: 10px;"align="center">400</th>
            <th style="border: 1px solid #000;text-align:center;font-size: 10px;"align="center">160</th>
            <th style="border: 1px solid #000;text-align:center;font-size: 10px;"align="center"><?php echo $semdata[$vk]['total_mark_obtain']; ?></th>
            <th style="border: 1px solid #000;"></th>
        </tr>
        <?php }if($semdata[$vk]['Subject3'] AND $semdata[$vk]['Subject4']) {?>
		<tr>
            <th style="border: 1px solid #000;"></th>
            <th style="border: 1px solid #000;text-align:center;font-size: 10px;"align="center">400</th>
            <th style="border: 1px solid #000;text-align:center;font-size: 10px;"align="center">160</th>
            <th style="border: 1px solid #000;text-align:center;font-size: 10px;"align="center"><?php echo $semdata[$vk]['total_mark_obtain']; ?></th>
            <th style="border: 1px solid #000;"></th>
        </tr>
        <?php }?>
        <?php } ?>
        <?php }else{?>
		<tr>
            <th style="border: 1px solid #000;"></th>
            <th style="border: 1px solid #000;text-align:center;font-size: 10px;"align="center">300</th>
            <th style="border: 1px solid #000;text-align:center;font-size: 10px;"align="center">120</th>
            <th style="border: 1px solid #000;text-align:center;font-size: 10px;"align="center"><?php echo $semdata[$vk]['total_mark_obtain']; ?></th>
            <th style="border: 1px solid #000;"></th>
        </tr>
        <?php }?>
		
        <?php if($semdata[$vk]['Subject5']) {?>
        <?php if($semdata[$vk]['Subject5']) {?>
        <tr>
            <td width="38%" align="center" style="border: 1px solid #000;font-size: 8px;"><b><?php echo $semdata[$vk]['Subject5']; ?></b><br></td>
            <td width="4%" align="center"style="border: 1px solid #000;font-size: 11px;">100</td>
            <td width="3%" align="center"style="border: 1px solid #000;font-size: 11px;">40</td>
            <td width="3%" align="center"style="border: 1px solid #000;font-size: 11px;"><?php echo $semdata[$vk]['Subject_Mark_5']; ?></td>
            <td width="1%" align="center"style="border: 1px solid #000;font-size: 11px;">
                <?php if($semdata[$vk]['Subject_Mark_5']>=40 && $semdata[$vk]['Subject_Mark_5']<=50){
               echo "C";
                }elseif($semdata[$vk]['Subject_Mark_5']>=50 && $semdata[$vk]['Subject_Mark_5']<=60){
                echo "B";
                }elseif($semdata[$vk]['Subject_Mark_5']>=60 && $semdata[$vk]['Subject_Mark_5']<=70){
                echo "B+";
                }elseif($semdata[$vk]['Subject_Mark_5']>=70 && $semdata[$vk]['Subject_Mark_5']<=80){
                echo "A";
                }elseif($semdata[$vk]['Subject_Mark_5']>=80 && $semdata[$vk]['Subject_Mark_5']<=100){
                echo "A+";
                } ?>
            </td>
        </tr>
		<?php } ?>
		<?php if(empty($semdata[$vk]['Subject6'])) {?>
		<?php if($semdata[$vk]['Subject4'] == $semdata[$vk]['Subject5']) {?>
		<tr>
            <th style="border: 1px solid #000;"></th>
            <th style="border: 1px solid #000;text-align:center;font-size: 10px;"align="center">500</th>
            <th style="border: 1px solid #000;text-align:center;font-size: 10px;"align="center">200</th>
            <th style="border: 1px solid #000;text-align:center;font-size: 10px;"align="center"><?php echo $semdata[$vk]['total_mark_obtain']; ?></th>
            <th style="border: 1px solid #000;"></th>
        </tr>
        <?php }if($semdata[$vk]['Subject4'] AND $semdata[$vk]['Subject5']) {?>
		<tr>
            <th style="border: 1px solid #000;"></th>
            <th style="border: 1px solid #000;text-align:center;font-size: 10px;"align="center">500</th>
            <th style="border: 1px solid #000;text-align:center;font-size: 10px;"align="center">200</th>
            <th style="border: 1px solid #000;text-align:center;font-size: 10px;"align="center"><?php echo $semdata[$vk]['total_mark_obtain']; ?></th>
            <th style="border: 1px solid #000;"></th>
        </tr>
        <?php }?>
		<?php if($semdata[$vk]['Subject5'] == $semdata[$vk]['Subject6']) {?>
		<tr>
            <th style="border: 1px solid #000;"></th>
            <th style="border: 1px solid #000;text-align:center;font-size: 10px;"align="center">500</th>
            <th style="border: 1px solid #000;text-align:center;font-size: 10px;"align="center">200</th>
            <th style="border: 1px solid #000;text-align:center;font-size: 10px;"align="center"><?php echo $semdata[$vk]['total_mark_obtain']; ?></th>
            <th style="border: 1px solid #000;"></th>
        </tr>
        <?php } } ?>
        <?php }?>
        <?php if($semdata[$vk]['Subject6']) {?>
        <tr>
            <td width="38%" align="center" style="border: 1px solid #000;font-size: 8px;"><b><?php echo $semdata[$vk]['Subject6']; ?></b><br></td>
            <td width="4%" align="center"style="border: 1px solid #000;font-size: 11px;"><?php if($semdata[$vk]['Subject6']){echo 100;}else{ echo "";}?></td>
            <td width="3%" align="center"style="border: 1px solid #000;font-size: 11px;"><?php if($semdata[$vk]['Subject6']){echo 40;}else{ echo "";}?></td>
            <td width="3%" align="center"style="border: 1px solid #000;font-size: 11px;"><?php if($semdata[$vk]['Subject_Mark_6']){echo $semdata[$vk]['Subject_Mark_6'];}else{ echo "";} ?></td>
            <td width="1%" align="center"style="border: 1px solid #000;font-size: 11px;">
                <?php if($semdata[$vk]['Subject_Mark_6']>=40 && $semdata[$vk]['Subject_Mark_6']<=50){
                 echo "C";
                }elseif($semdata[$vk]['Subject_Mark_6']>=50 && $semdata[$vk]['Subject_Mark_6']<=60){
                echo "B";
                }elseif($semdata[$vk]['Subject_Mark_6']>=60 && $semdata[$vk]['Subject_Mark_6']<=70){
                echo "B+";
                }elseif($semdata[$vk]['Subject_Mark_6']>=70 && $semdata[$vk]['Subject_Mark_6']<=80){
                echo "A";
                }elseif($semdata[$vk]['Subject_Mark_6']>=80 && $semdata[$vk]['Subject_Mark_6']<=100){
                echo "A+";
                } ?>
            </td>
        </tr>
        <tr>
            <th style="border: 1px solid #000;"></th>
            <th style="border: 1px solid #000;text-align:center;font-size: 10px;"align="center">600</th>
            <th style="border: 1px solid #000;text-align:center;font-size: 10px;"align="center">240</th>
            <th style="border: 1px solid #000;text-align:center;font-size: 10px;"align="center"><?php echo $semdata[$vk]['total_mark_obtain']; ?></th>
            <th style="border: 1px solid #000;"></th>
        </tr>
	<?php }  ?>
	<?php }else{?>
		<tr>
            <th style="border: 1px solid #000;"></th>
            <th style="border: 1px solid #000;text-align:center;font-size: 10px;"align="center">200</th>
            <th style="border: 1px solid #000;text-align:center;font-size: 10px;"align="center">80</th>
            <th style="border: 1px solid #000;text-align:center;font-size: 10px;"align="center"><?php echo $semdata[$vk]['total_mark_obtain']; ?></th>
            <th style="border: 1px solid #000;"></th>
        </tr>
	<?php }?>
    </tr>
</table>
<br>
<?php
    $count=1;
    }elseif($count==1){
        if($semdata[$vk]['Semester']=="semester2"){
        }
        elseif($semdata[$vk]['Semester']=="semester4"){
        }
        elseif($semdata[$vk]['Semester']=="semester6"){
        }
        elseif($semdata[$vk]['Semester']=="semester8"){
        }
?>
<table style="width:45%;margin-bottom: 9px;margin-top: -20px;height: 128px;margin-right: 30px;opacity: 0.9;" align="center">
    <tr>
       <th colspan="5"><?php echo ucwords($semdata[$vk]['Semester']); ?></th>
    </tr>
    <tr>
        <tr>
            <td width="38%" align="center" style="border: 1px solid #000;font-size: 8px;"><b><?php echo $semdata[$vk]['Subject1']; ?></b><br></td>
            <td width="4%" align="center"style="border: 1px solid #000;font-size: 11px;">100</td>
            <td width="3%" align="center"style="border: 1px solid #000;font-size: 11px;">40</td>
            <td width="3%" align="center"style="border: 1px solid #000;font-size: 11px;"><?php echo $semdata[$vk]['Subject_Mark_1']; ?></td>
            <td width="1%" align="center"style="border: 1px solid #000;font-size: 11px;">
                <?php if($semdata[$vk]['Subject_Mark_1']>=40 && $semdata[$vk]['Subject_Mark_1']<=50){
               echo "C";
                }elseif($semdata[$vk]['Subject_Mark_1']>=50 && $semdata[$vk]['Subject_Mark_1']<=60){
                echo "B";
                }elseif($semdata[$vk]['Subject_Mark_1']>=60 && $semdata[$vk]['Subject_Mark_1']<=70){
                echo "B+";
                }elseif($semdata[$vk]['Subject_Mark_1']>=70 && $semdata[$vk]['Subject_Mark_1']<=80){
                echo "A";
                }elseif($semdata[$vk]['Subject_Mark_1']>=80 && $semdata[$vk]['Subject_Mark_1']<=100){
                echo "A+";
                
                } ?>
            </td>
        </tr>
        <tr>
            <td width="38%" align="center"style="border: 1px solid #000;font-size: 8px;"><b><?php echo $semdata[$vk]['Subject2']; ?></b><br></td>
            <td width="4%" align="center"style="border: 1px solid #000;font-size: 11px;">100</td>
            <td width="3%" align="center"style="border: 1px solid #000;font-size: 11px;">40</td>
            <td width="3%" align="center"style="border: 1px solid #000;font-size: 11px;"><?php echo $semdata[$vk]['Subject_Mark_2']; ?></td>
            <td width="1%" align="center"style="border: 1px solid #000;font-size: 11px;">
                <?php
                if($semdata[$vk]['Subject_Mark_2']>=40 && $semdata[$vk]['Subject_Mark_2']<=50){
               echo "C";
                }elseif($semdata[$vk]['Subject_Mark_2']>=50 && $semdata[$vk]['Subject_Mark_2']<=60){
                echo "B";
                }elseif($semdata[$vk]['Subject_Mark_2']>=60 && $semdata[$vk]['Subject_Mark_2']<=70){
                echo "B+";
                }elseif($semdata[$vk]['Subject_Mark_2']>=70 && $semdata[$vk]['Subject_Mark_2']<=80){
                echo "A";
                }elseif($semdata[$vk]['Subject_Mark_2']>=80 && $semdata[$vk]['Subject_Mark_2']<=100){
                echo "A+";
                
                } ?>
            </td>
        </tr>
		<?php if($semdata[$vk]['Subject3'] || $semdata[$vk]['Subject4'] || $semdata[$vk]['Subject5'] || $semdata[$vk]['Subject6']) {?>
        <?php if($semdata[$vk]['Subject3']) {?>
        <?php if($semdata[$vk]['Subject3']) {?>
        <tr>
            <td width="38%" align="center" style="border: 1px solid #000;font-size: 8px;"><b><?php echo $semdata[$vk]['Subject3']; ?></b><br></td>
            <td width="4%" align="center"style="border: 1px solid #000;font-size: 11px;">100</td>
            <td width="3%" align="center"style="border: 1px solid #000;font-size: 11px;">40</td>
            <td width="3%" align="center"style="border: 1px solid #000;font-size: 11px;"><?php echo $semdata[$vk]['Subject_Mark_3']; ?></td>
            <td width="1%" align="center"style="border: 1px solid #000;font-size: 11px;">
                <?php if($semdata[$vk]['Subject_Mark_3']>=40 && $semdata[$vk]['Subject_Mark_3']<=50){
               echo "C";
                }elseif($semdata[$vk]['Subject_Mark_3']>=50 && $semdata[$vk]['Subject_Mark_3']<=60){
                echo "B";
                }elseif($semdata[$vk]['Subject_Mark_3']>=60 && $semdata[$vk]['Subject_Mark_3']<=70){
                echo "B+";
                }elseif($semdata[$vk]['Subject_Mark_3']>=70 && $semdata[$vk]['Subject_Mark_3']<=80){
                echo "A";
                }elseif($semdata[$vk]['Subject_Mark_3']>=80 && $semdata[$vk]['Subject_Mark_3']<=100){
                echo "A+";
                } ?>
            </td>
        </tr>
		<?php } ?>
		<?php // if(empty($semdata[$vk]['Subject4'])) {?>
		<?php //if($semdata[$vk]['Subject2'] == $semdata[$vk]['Subject3']) {?>
		<!--<tr>
            <th style="border: 1px solid #000;"></th>
            <th style="border: 1px solid #000;text-align:center;font-size: 10px;"align="center">300</th>
            <th style="border: 1px solid #000;text-align:center;font-size: 10px;"align="center">120</th>
            <th style="border: 1px solid #000;text-align:center;font-size: 10px;"align="center"><?php //echo $semdata[$vk]['total_mark_obtain']; ?></th>
            <th style="border: 1px solid #000;"></th>
        </tr>-->
        <?php //} ?>
        <?php //if($semdata[$vk]['Subject2'] AND $semdata[$vk]['Subject3']) {?>
		<!--<tr>
            <th style="border: 1px solid #000;"></th>
            <th style="border: 1px solid #000;text-align:center;font-size: 10px;"align="center">300</th>
            <th style="border: 1px solid #000;text-align:center;font-size: 10px;"align="center">120</th>
            <th style="border: 1px solid #000;text-align:center;font-size: 10px;"align="center"><?php //echo $semdata[$vk]['total_mark_obtain']; ?></th>
            <th style="border: 1px solid #000;"></th>
        </tr>-->
        <?php //}?>
        <?php //} ?>
        <?php }else{?>
		<tr>
            <th style="border: 1px solid #000;"></th>
            <th style="border: 1px solid #000;text-align:center;font-size: 10px;"align="center">200</th>
            <th style="border: 1px solid #000;text-align:center;font-size: 10px;"align="center">80</th>
            <th style="border: 1px solid #000;text-align:center;font-size: 10px;"align="center"><?php echo $semdata[$vk]['total_mark_obtain']; ?></th>
            <th style="border: 1px solid #000;"></th>
        </tr>
        <?php }?>
        <?php if($semdata[$vk]['Subject4']) {?>
        <?php if($semdata[$vk]['Subject4']) {?>
        <tr>
            <td width="38%" align="center" style="border: 1px solid #000;font-size: 8px;"><b><?php echo $semdata[$vk]['Subject4']; ?></b><br></td>
            <td width="4%" align="center"style="border: 1px solid #000;font-size: 11px;">100</td>
            <td width="3%" align="center"style="border: 1px solid #000;font-size: 11px;">40</td>
            <td width="3%" align="center"style="border: 1px solid #000;font-size: 11px;"><?php echo $semdata[$vk]['Subject_Mark_4']; ?></td>
            <td width="1%" align="center"style="border: 1px solid #000;font-size: 11px;">
                <?php if($semdata[$vk]['Subject_Mark_4']>=40 && $semdata[$vk]['Subject_Mark_4']<=50){
               echo "C";
                }elseif($semdata[$vk]['Subject_Mark_4']>=50 && $semdata[$vk]['Subject_Mark_4']<=60){
                echo "B";
                }elseif($semdata[$vk]['Subject_Mark_4']>=60 && $semdata[$vk]['Subject_Mark_4']<=70){
                echo "B+";
                }elseif($semdata[$vk]['Subject_Mark_4']>=70 && $semdata[$vk]['Subject_Mark_4']<=80){
                echo "A";
                }elseif($semdata[$vk]['Subject_Mark_4']>=80 && $semdata[$vk]['Subject_Mark_4']<=100){
                echo "A+";
                } ?>
            </td>
        </tr>
		<?php } ?>
		<?php if(empty($semdata[$vk]['Subject5'])) {?>
		<?php if($semdata[$vk]['Subject3'] == $semdata[$vk]['Subject4']) {?>
		<tr>
            <th style="border: 1px solid #000;"></th>
            <th style="border: 1px solid #000;text-align:center;font-size: 10px;"align="center">400</th>
            <th style="border: 1px solid #000;text-align:center;font-size: 10px;"align="center">160</th>
            <th style="border: 1px solid #000;text-align:center;font-size: 10px;"align="center"><?php echo $semdata[$vk]['total_mark_obtain']; ?></th>
            <th style="border: 1px solid #000;"></th>
        </tr>
        <?php }if($semdata[$vk]['Subject3'] AND $semdata[$vk]['Subject4']) {?>
		<tr>
            <th style="border: 1px solid #000;"></th>
            <th style="border: 1px solid #000;text-align:center;font-size: 10px;"align="center">400</th>
            <th style="border: 1px solid #000;text-align:center;font-size: 10px;"align="center">160</th>
            <th style="border: 1px solid #000;text-align:center;font-size: 10px;"align="center"><?php echo $semdata[$vk]['total_mark_obtain']; ?></th>
            <th style="border: 1px solid #000;"></th>
        </tr>
        <?php }?>
        <?php } ?>
        <?php }else{?>
		<tr>
            <th style="border: 1px solid #000;"></th>
            <th style="border: 1px solid #000;text-align:center;font-size: 10px;"align="center">300</th>
            <th style="border: 1px solid #000;text-align:center;font-size: 10px;"align="center">120</th>
            <th style="border: 1px solid #000;text-align:center;font-size: 10px;"align="center"><?php echo $semdata[$vk]['total_mark_obtain']; ?></th>
            <th style="border: 1px solid #000;"></th>
        </tr>
        <?php }?>
        <?php if($semdata[$vk]['Subject5']) {?>
        <?php if($semdata[$vk]['Subject5']) {?>
        <tr>
            <td width="38%" align="center" style="border: 1px solid #000;font-size: 8px;"><b><?php echo $semdata[$vk]['Subject5']; ?></b><br></td>
            <td width="4%" align="center"style="border: 1px solid #000;font-size: 11px;">100</td>
            <td width="3%" align="center"style="border: 1px solid #000;font-size: 11px;">40</td>
            <td width="3%" align="center"style="border: 1px solid #000;font-size: 11px;"><?php echo $semdata[$vk]['Subject_Mark_5']; ?></td>
            <td width="1%" align="center"style="border: 1px solid #000;font-size: 11px;">
                <?php if($semdata[$vk]['Subject_Mark_5']>=40 && $semdata[$vk]['Subject_Mark_5']<=50){
                 echo "C";
                }elseif($semdata[$vk]['Subject_Mark_5']>=50 && $semdata[$vk]['Subject_Mark_5']<=60){
                echo "B";
                }elseif($semdata[$vk]['Subject_Mark_5']>=60 && $semdata[$vk]['Subject_Mark_5']<=70){
                echo "B+";
                }elseif($semdata[$vk]['Subject_Mark_5']>=70 && $semdata[$vk]['Subject_Mark_5']<=80){
                echo "A";
                }elseif($semdata[$vk]['Subject_Mark_5']>=80 && $semdata[$vk]['Subject_Mark_5']<=100){
                echo "A+";
                } ?>
            </td>
        </tr>
		<?php } ?>
		<?php if(empty($semdata[$vk]['Subject6'])) {?>
		<?php if($semdata[$vk]['Subject4'] == $semdata[$vk]['Subject5']) {?>
		<tr>
            <th style="border: 1px solid #000;"></th>
            <th style="border: 1px solid #000;text-align:center;font-size: 10px;"align="center">500</th>
            <th style="border: 1px solid #000;text-align:center;font-size: 10px;"align="center">200</th>
            <th style="border: 1px solid #000;text-align:center;font-size: 10px;"align="center"><?php echo $semdata[$vk]['total_mark_obtain']; ?></th>
            <th style="border: 1px solid #000;"></th>
        </tr>
        <?php }if($semdata[$vk]['Subject4'] AND $semdata[$vk]['Subject5']) {?>
		<tr>
            <th style="border: 1px solid #000;"></th>
            <th style="border: 1px solid #000;text-align:center;font-size: 10px;"align="center">500</th>
            <th style="border: 1px solid #000;text-align:center;font-size: 10px;"align="center">200</th>
            <th style="border: 1px solid #000;text-align:center;font-size: 10px;"align="center"><?php echo $semdata[$vk]['total_mark_obtain']; ?></th>
            <th style="border: 1px solid #000;"></th>
        </tr>
        <?php }if($semdata[$vk]['Subject5'] == $semdata[$vk]['Subject6']) {?>
		<tr>
            <th style="border: 1px solid #000;"></th>
            <th style="border: 1px solid #000;text-align:center;font-size: 10px;"align="center">500</th>
            <th style="border: 1px solid #000;text-align:center;font-size: 10px;"align="center">200</th>
            <th style="border: 1px solid #000;text-align:center;font-size: 10px;"align="center"><?php echo $semdata[$vk]['total_mark_obtain']; ?></th>
            <th style="border: 1px solid #000;"></th>
        </tr>
        <?php } } ?>
        <?php } ?>
        <?php if($semdata[$vk]['Subject6']){?>
            <tr>
                <td width="38%" align="center" style="border: 1px solid #000;font-size: 8px;"><b><?php echo $semdata[$vk]['Subject6']; ?></b><br></td>
                <td width="4%" align="center"style="border: 1px solid #000;font-size: 11px;"><?php if($semdata[$vk]['Subject6']){echo 100;}else{ echo "";}?></td>
                <td width="3%" align="center"style="border: 1px solid #000;font-size: 11px;"><?php if($semdata[$vk]['Subject6']){echo 40;}else{ echo "";}?></td>
                <td width="3%" align="center"style="border: 1px solid #000;font-size: 11px;"><?php if($semdata[$vk]['Subject_Mark_6']){echo $semdata[$vk]['Subject_Mark_6'];}else{ echo "";} ?></td>
                <td width="1%" align="center"style="border: 1px solid #000;font-size: 11px;">
                    <?php if($semdata[$vk]['Subject_Mark_6']>=40 && $semdata[$vk]['Subject_Mark_6']<=50){
                     echo "C";
                    }elseif($semdata[$vk]['Subject_Mark_6']>=50 && $semdata[$vk]['Subject_Mark_6']<=60){
                    echo "B";
                    }elseif($semdata[$vk]['Subject_Mark_6']>=60 && $semdata[$vk]['Subject_Mark_6']<=70){
                    echo "B+";
                    }elseif($semdata[$vk]['Subject_Mark_6']>=70 && $semdata[$vk]['Subject_Mark_6']<=80){
                    echo "A";
                    }elseif($semdata[$vk]['Subject_Mark_6']>=80 && $semdata[$vk]['Subject_Mark_6']<=100){
                    echo "A+";
                    } ?>
                </td>
            </tr>
            <tr>
            <th style="border: 1px solid #000;"></th>
            <th style="border: 1px solid #000;text-align:center;font-size: 10px;"align="center">600</th>
            <th style="border: 1px solid #000;text-align:center;font-size: 10px;"align="center">240</th>
            <th style="border: 1px solid #000;text-align:center;font-size: 10px;"align="center"><?php echo $semdata[$vk]['total_mark_obtain']; ?></th>
            <th style="border: 1px solid #000;"></th>
        </tr>
		<?php } ?>
		<?php }else{ ?>
		<tr>
            <th style="border: 1px solid #000;"></th>
            <th style="border: 1px solid #000;text-align:center;font-size: 10px;"align="center">200</th>
            <th style="border: 1px solid #000;text-align:center;font-size: 10px;"align="center">80</th>
            <th style="border: 1px solid #000;text-align:center;font-size: 10px;"align="center"><?php echo $semdata[$vk]['total_mark_obtain']; ?></th>
            <th style="border: 1px solid #000;"></th>
        </tr>
	<?php }?>
    </tr>
</table>
<?php $count=0; } } ?>
<table >
    <tbody>
        <tr>
            <td>
                <strong><b style="position: absolute; left: 180px; bottom: 60px;"><?php echo $certificated_deliver_date; ?></b></strong>
            </td>
        </tr>
    </tbody>
</table>
<?php } ?> 
<style>
    .rotate {
        -webkit-transform: rotate(-90deg);
        -moz-transform: rotate(-90deg);
        -ms-transform: rotate(-90deg);
        -o-transform: rotate(-90deg);
        margin: 30px -8px 30px 0px;
        text-align: center;
        font-size: 10px;
    }
    hr {
        margin-top: 4px;
        margin-bottom: 4px;
        border: 0;
        border-top: 1px solid #00000038;
    }
    .gfhfghfghgfh {
        margin: -11px 19px 6px 210px;
    }
    th {
         text-align: center;
    }
</style>

<script>
const highResImage = new Image();
highResImage.src = 'pdf-folder/iimsr-cmm.jpeg';
highResImage.onload = () => {
    document.getElementById('cmmImage').src = highResImage.src;
    document.getElementById('cmmImage').classList.add('loaded');
};
</script>
