<?php
error_reporting(0);
include('checklogin.php');
include("dbconnection.php");
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;
include("functions.php");
require_once("qrcode.php");

$enrollement = strtoupper($_POST['enrollement']);
$semester = $_POST['semester'];
$course = $_POST['course'];
$specilization = $_POST['branch'];

$querypass = mysqli_query($con,"SELECT `stu_result`, `year`, `pass_month_year`, `certificated_deliver_date`,`certificate_month`, `certificate_grade` FROM `students_marks` WHERE `enrolment`='$enrollement' AND `semester`='$semester' AND `course`='$course' AND `branch`='$specilization'");
$qerydata  =  mysqli_fetch_array($querypass);
$query = "SELECT * FROM `register_here` where `enrolment`='$enrollement'";
$result = mysqli_query($con,$query);
$row = mysqli_fetch_array($result);
$alreadygrade = $qerydata['certificate_grade'];
$lateral_entry = $row['lateral_entry'];
//echo $lateral_entry;
?>
<?php
    if($course=="Advance Diploma In Business Administration" && $semester=="semester2"){
    	$certelseificategrad = $qerydata['certificate_grade']/1200*100;
    }
    elseif($course=="Advance Diploma In Mechanical Engineering" && $semester=="semester2"){
    	$certelseificategrad = $qerydata['certificate_grade']/1200*100;
    }
    elseif($course=="Advance Diploma In Civil Engineering" && $semester=="semester2"){
    	$certelseificategrad = $qerydata['certificate_grade']/1200*100;
    }
    elseif($course=="Advance Diploma In Computer Science Engineering" && $semester=="semester2"){
    	$certelseificategrad = $qerydata['certificate_grade']/1200*100;
    }
    elseif($course=="Advance Diploma in Electrical Engineering" && $semester=="semester2"){
    	$certelseificategrad = $qerydata['certificate_grade']/1200*100;
    }
    elseif($course=="Advance Diploma in H.R. Management" && $semester=="semester2"){
    	$certelseificategrad = $qerydata['certificate_grade']/1200*100;
    }
    elseif($course=="Advance Diploma In Hardware & Networking Technology" && $semester=="semester2"){
    	$certelseificategrad = $qerydata['certificate_grade']/1200*100;
    }
    elseif($course=="Bachelor Programme In Animation & Multimedia Technology" && $semester=="semester8"){
    	$certelseificategrad = $qerydata['certificate_grade']/4100*100;
    }
    elseif($course=="Bachelor Programme In Business Management" && $semester=="semester6"){
    	$certelseificategrad = $qerydata['certificate_grade']/3000*100;
    }
    elseif($course=="Bachelor Programme in Automobile Engineering" && $semester=="semester8"){
    	$certelseificategrad = $qerydata['certificate_grade']/4000*100;
    }
    elseif($course=="Bachelor Programme In Biotechnology" && $semester=="semester8"){
    	$certelseificategrad = $qerydata['certificate_grade']/4400*100;
    }
    elseif($course=="Bachelor Programme In Business Administration" && $semester=="semester6"){
    	$certelseificategrad = $qerydata['certificate_grade']/3000*100;
    }
    elseif($course=="Bachelor Programme in Business Administration" && $semester=="semester6"){
    	$certelseificategrad = $qerydata['certificate_grade']/3000*100;
    }
    elseif($course=="Bachelor Programme In Chemical Engineering" && $semester=="semester8"){
    	$certelseificategrad = $qerydata['certificate_grade']/4000*100;
    }
    elseif($course=="Bachelor Programme in Civil Engineering" && $semester=="semester8"){
        if(!empty($row['lateral_entry'])){
        	$certelseificategrad = $qerydata['certificate_grade']/3000*100;
        }else{
            $certelseificategrad = $qerydata['certificate_grade']/4000*100;
        }
    }
    elseif($course=="Bachelor Programme In Computer Applications" && $semester=="semester6"){
    	$certelseificategrad = $qerydata['certificate_grade']/2800*100;
    }
    elseif($course=="Bachelor Programme In Computer Science Engineering" && $semester=="semester8"){
    	$certelseificategrad = $qerydata['certificate_grade']/4000*100;
    }
    elseif($course=="Bachelor programme In Computer Science Engineering" && $semester=="semester8"){
    	$certelseificategrad = $qerydata['certificate_grade']/4000*100;
    }
    elseif($course=="Bachelor Programme In Electrical & Electronics Engineering" && $semester=="semester8"){
    	$certelseificategrad = $qerydata['certificate_grade']/4000*100;
    }
    elseif($course=="Bachelor Programme In Electrical & Electronics Engineering" && $semester=="semester6"){
    	$certelseificategrad = $qerydata['certificate_grade']/3000*100;
    }
    elseif($course=="Bachelor Programme In Electrical Engineering" && $semester=="semester8"){
    	$certelseificategrad = $qerydata['certificate_grade']/4000*100;
    }
    elseif($course=="Bachelor Programme in Electronics & Communication Engineering" && $semester=="semester8"){
        if(!empty($row['lateral_entry'])){
        	$certelseificategrad = $qerydata['certificate_grade']/3000*100;
        }else{
            $certelseificategrad = $qerydata['certificate_grade']/4000*100;
        }
    }
    elseif($course=="Bachelor Programme In Electronics & Telecommunication Engineering" && $semester=="semester8"){
        if(!empty($row['lateral_entry'])){
        	$certelseificategrad = $qerydata['certificate_grade']/3400*100;
        }else{
            $certelseificategrad = $qerydata['certificate_grade']/4600*100;
        }
    }
    elseif($course=="Bachelor Programme in Electronics Engineering" && $semester=="semester8"){
    	$certelseificategrad = $qerydata['certificate_grade']/4000*100;
    }
    elseif($course=="Bachelor Programme In Fire & Safety Engineering" && $semester=="semester8"){
    	$certelseificategrad = $qerydata['certificate_grade']/4600*100;
    }
    elseif($course=="Bachelor Programme In Food & Nutrition" && $semester=="semester8"){
    	$certelseificategrad = $qerydata['certificate_grade']/3700*100;
    }
    elseif($course=="Bachelor Programme In Food Technology" && $semester=="semester8"){
    	$certelseificategrad = $qerydata['certificate_grade']/2400*100;
    }
    elseif($course=="Bachelor Programme in Information Technology" && $semester=="semester8"){
    	$certelseificategrad = $qerydata['certificate_grade']/4000*100;
    }
    elseif($course=="Bachelor Programme In Instrumentation Engineering" && $semester=="semester8"){
    	$certelseificategrad = $qerydata['certificate_grade']/4000*100;
    }
    elseif($course=="Bachelor Programme In Mechatronics Engineering" && $semester=="semester8"){
        if(!empty($row['lateral_entry'])){
        	$certelseificategrad = $qerydata['certificate_grade']/3400*100;
        }else{
            $certelseificategrad = $qerydata['certificate_grade']/4600*100;
        }
    }
    elseif($course=="Bachelor Programme in Mechanical Engineering" && $semester=="semester8"){
        if(!empty($row['lateral_entry'])){
        	$certelseificategrad = $qerydata['certificate_grade']/3000*100;
        }else{
            $certelseificategrad = $qerydata['certificate_grade']/4000*100;
        }
    }
    elseif($course=="Bachelor Programme In Metallurgical Engineering" && $semester=="semester8"){
    	$certelseificategrad = $qerydata['certificate_grade']/4000*100;
    }
    elseif($course=="Bachelor Programme In Polymer Engineering" && $semester=="semester8"){
    	$certelseificategrad = $qerydata['certificate_grade']/4600*100;
    }
    elseif($course=="Bachelor programme In Print Technology Management" && $semester=="semester8"){
    	$certelseificategrad = $qerydata['certificate_grade']/4000*100;
    }
    elseif($course=="Bachelor Programme In Textile Engineering" && $semester=="semester8"){
    	$certelseificategrad = $qerydata['certificate_grade']/4100*100;
    }
    elseif($course=="Bachelor Programme In Electronics & Instrumentation Engineering" && $semester=="semester8"){
        if(!empty($row['lateral_entry'])){
        	$certelseificategrad = $qerydata['certificate_grade']/2800*100;
        }else{
            $certelseificategrad = $qerydata['certificate_grade']/3800*100;
        }
    }
    elseif($course=="Certelseificate Programme In Civil Engineering" && $semester=="semester1"){
    	$certelseificategrad = $qerydata['certificate_grade']/600*100;
    }
    elseif($course=="Certelseificate Programme In Librarian" && $semester=="semester1"){
    	$certelseificategrad = $qerydata['certificate_grade']/500*100;
    }
    elseif($course=="Certelseificate Programme In Project Management" && $semester=="semester2"){
    	$certelseificategrad = $qerydata['certificate_grade']/900*100;
    }
    
    elseif($course=="Diploma Programme In Mining Engineering" && $semester=="semester6"){
    	$certelseificategrad = $qerydata['certificate_grade']/2400*100;
    }
    elseif($course=="Diploma in Electrical Engineering" && $semester=="semester6"){
    	$certelseificategrad = $qerydata['certificate_grade']/2400*100;
    }
    elseif($course=="Diploma in Human Resource Management" && $semester=="semester2"){
    	$certelseificategrad = $qerydata['certificate_grade']/1100*100;
    }
    elseif($course=="Diploma In Industrial Safety" && $semester=="semester2"){
    	$certelseificategrad = $qerydata['certificate_grade']/900*100;
    }
    elseif($course=="Diploma In Material Management 2 Year" && $semester=="semester4"){
    	$certelseificategrad = $qerydata['certificate_grade']/2000*100;
    }
    elseif($course=="Diploma In Operation Management" && $semester=="semester4"){
    	$certelseificategrad = $qerydata['certificate_grade']/1000*100;
    }
    elseif($course=="Diploma Programme In Automobile Engineering" && $semester=="semester6"){
    	$certelseificategrad = $qerydata['certificate_grade']/2400*100;
    }
    elseif($course=="Diploma Programme in Chemical Engineering" && $semester=="semester8"){
    	$certelseificategrad = $qerydata['certificate_grade']/3800*100;
    }
    elseif($course=="Diploma Programme In Business Management" && $semester=="semester6"){
    	$certelseificategrad = $qerydata['certificate_grade']/3000*100;
    }
    
    elseif($course=="Diploma Programme In Civil Engineering" && $semester=="semester6"){
        if(!empty($row['lateral_entry'])){
        	$certelseificategrad = $qerydata['certificate_grade']/1600*100;
        }else{
            $certelseificategrad = $qerydata['certificate_grade']/2400*100;
        }
    }
    
    elseif($course=="Diploma Programme In Computer Applications" && $semester=="semester2"){
    	$certelseificategrad = $qerydata['certificate_grade']/1100*100;
    }
    elseif($course=="Diploma Programme In Computer Science Engineering" && $semester=="semester6"){
    	$certelseificategrad = $qerydata['certificate_grade']/2400*100;
    }
    elseif($course=="Diploma Programme In Disaster Management" && $semester=="semester4"){
    	$certelseificategrad = $qerydata['certificate_grade']/1300*100;
    }
    /*elseif($course=="Diploma Programme In Electrical & Electronics Engineering" && $semester=="semester6"){
    	$certelseificategrad = $qerydata['certificate_grade']/2400*100;
    }*/
    elseif($course=="Diploma Programme In Electrical & Electronics Engineering" && $semester=="semester6"){
        if(!empty($row['lateral_entry'])){
        	$certelseificategrad = $qerydata['certificate_grade']/1600*100;
        }else{
            $certelseificategrad = $qerydata['certificate_grade']/2400*100;
        }
    }
    elseif($course=="Diploma Programme in Electrical Engineering" && $semester=="semester6"){
    	$certelseificategrad = $qerydata['certificate_grade']/2400*100;
    }
    elseif($course=="Diploma Programme In Electronics & Communication Engineering" && $semester=="semester6"){
    	$certelseificategrad = $qerydata['certificate_grade']/2400*100;
    }
    elseif($course=="Diploma Programme In Electronics & Telecommunication" && $semester=="semester6"){
    	$certelseificategrad = $qerydata['certificate_grade']/1700*100;
    }
    elseif($course=="Diploma Programme In Electronics Engineering" && $semester=="semester6"){
    	$certelseificategrad = $qerydata['certificate_grade']/2400*100;
    }
    elseif($course=="Diploma Programme In Environmental Engineering" && $semester=="semester6"){
    	$certelseificategrad = $qerydata['certificate_grade']/3000*100;
    }
    elseif($course=="Diploma Programme In Finance Management" && $semester=="semester6"){
    	$certelseificategrad = $qerydata['certificate_grade']/3400*100;
    }
    elseif($course=="Diploma Programme In Finance Management" && $semester=="semester2"){
    	$certelseificategrad = $qerydata['certificate_grade']/1000*100;
    }
    elseif($course=="Diploma Programme In Fire & Safety" && $semester=="semester2"){
    	$certelseificategrad = $qerydata['certificate_grade']/1000*100;
    }
    elseif($course=="Diploma Programme In Food & Safety" && $semester=="semester6"){
    	$certelseificategrad = $qerydata['certificate_grade']/2800*100;
    }
    elseif($course=="Diploma Programme In Hotel Management" && $semester=="semester6"){
    	$certelseificategrad = $qerydata['certificate_grade']/3400*100;
    }
    elseif($course=="Diploma Programme In HR" && $semester=="semester2"){
    	$certelseificategrad = $qerydata['certificate_grade']/1200*100;
    }
    elseif($course=="Diploma Programme In Industrial Electronics" && $semester=="semester6"){
    	$certelseificategrad = $qerydata['certificate_grade']/2400*100;
    }
    elseif($course=="Diploma Programme In Information Technology" && $semester=="semester6"){
    	$certelseificategrad = $qerydata['certificate_grade']/2400*100;
    }
    elseif($course=="Diploma Programme In Inventory Management" && $semester=="semester1"){
    	$certelseificategrad = $qerydata['certificate_grade']/400*100;
    }
    elseif($course=="Diploma Programme In Logistic" && $semester=="semester1"){
    	$certelseificategrad = $qerydata['certificate_grade']/700*100;
    }
    elseif($course=="Diploma Programme In Logistic Management" && $semester=="semester2"){
    	$certelseificategrad = $qerydata['certificate_grade']/900*100;
    }
    elseif($course=="Diploma Programme in Human Resource Management" && $semester=="semester6"){
        if(!empty($row['lateral_entry'])){
        	$certelseificategrad = $qerydata['certificate_grade']/1900*100;
        }else{
            $certelseificategrad = $qerydata['certificate_grade']/2900*100;
        }
    }
    elseif($course=="Diploma Programme In Human Resource Management" && $semester=="semester6"){
        if(!empty($row['lateral_entry'])){
        	$certelseificategrad = $qerydata['certificate_grade']/1900*100;
        }else{
            $certelseificategrad = $qerydata['certificate_grade']/2900*100;
        }
    }
    elseif($course=="Diploma Programme In Mechanical Engineering" && $semester=="semester6"){
        if(!empty($row['lateral_entry'])){
        	$certelseificategrad = $qerydata['certificate_grade']/1600*100;
        }else{
            $certelseificategrad = $qerydata['certificate_grade']/2400*100;
        }
    }
    elseif($course=="Diploma Programme In Marketing Management" && $semester=="semester6"){
        if(!empty($row['lateral_entry'])){
        	$certelseificategrad = $qerydata['certificate_grade']/1600*100;
        }else{
            $certelseificategrad = $qerydata['certificate_grade']/2400*100;
        }
    }
    elseif($course=="Diploma Programme in Metallurgical Engineering" && $semester=="semester6"){
    	$certelseificategrad = $qerydata['certificate_grade']/2400*100;
    }
    elseif($course=="Diploma Programme In Printing Technology" && $semester=="semester6"){
    	$certelseificategrad = $qerydata['certificate_grade']/3000*100;
    }
    elseif($course=="Diploma Programme In Project Management" && $semester=="semester2"){
    	$certelseificategrad = $qerydata['certificate_grade']/800*100;
    }
    elseif($course=="Diploma Programme In Rural Development" && $semester=="semester2"){
    	$certelseificategrad = $qerydata['certificate_grade']/600*100;
    }
    elseif($course=="Diploma Programme In Supply Chain Management" && $semester=="semester6"){
    	$certelseificategrad = $qerydata['certificate_grade']/3100*100;
    }
    elseif($course=="Diploma Programme In Textile" && $semester=="semester6"){
        if(!empty($row['lateral_entry'])){
        	$certelseificategrad = $qerydata['certificate_grade']/1500*100;
        }else{
            $certelseificategrad = $qerydata['certificate_grade']/2300*100;
        }
    }
    elseif($course=="Diploma Programme In Tourism Management" && $semester=="semester2"){
    	$certelseificategrad = $qerydata['certificate_grade']/1000*100;
    }
    elseif($course=="Diploma Progrmme in Instrumentation Engineering" && $semester=="semester6"){
    	$certelseificategrad = $qerydata['certificate_grade']/3000*100;
    }
    elseif($course=="Diploma Programme In Logistics Management" && $semester=="semester6"){
    	$certelseificategrad = $qerydata['certificate_grade']/3600*100;
    }
    elseif($course=="Executive Master In Business Administration" && $semester=="semester2"){
    	$certelseificategrad = $qerydata['certificate_grade']/1200*100;
    }
    elseif($course=="Graduate Diploma In Automobile Engineering" && $semester=="semester6"){
    	$certelseificategrad = $qerydata['certificate_grade']/2700*100;
    }
    elseif($course=="Graduate Diploma In Civil Engineering" && $semester=="semester6"){
    	$certelseificategrad = $qerydata['certificate_grade']/2700*100;
    }
    elseif($course=="Graduate Diploma In Computer Science" && $semester=="semester6"){
    	$certelseificategrad = $qerydata['certificate_grade']/3000*100;
    }
    elseif($course=="Graduate Diploma In Electronics & Telecommunication" && $semester=="semester6"){
    	$certelseificategrad = $qerydata['certificate_grade']/2700*100;
    }
    elseif($course=="Graduate Diploma In Hotel Management" && $semester=="semester6"){
    	$certelseificategrad = $qerydata['certificate_grade']/3400*100;
    }
    elseif($course=="Graduate Diploma In Information Technology" && $semester=="semester6"){
    	$certelseificategrad = $qerydata['certificate_grade']/3600*100;
    }
    elseif($course=="Graduate Diploma In Mechanical Engineering" && $semester=="semester6"){
    	$certelseificategrad = $qerydata['certificate_grade']/3000*100;
    }
    elseif($course=="Master Programme in Business Administration" && $semester=="semester4"){
    	$certelseificategrad = $qerydata['certificate_grade']/2400*100;
    }
    elseif($course=="Master Programme In Business Administration ( Marketing)" && $semester=="semester4"){
    	$certelseificategrad = $qerydata['certificate_grade']/2400*100;
    }
    elseif($course=="Master Programme in Business Administration (Agri & Food Busi.)" && $semester=="semester4"){
    	$certelseificategrad = $qerydata['certificate_grade']/2000*100;
    }
    elseif($course=="Master Programme In Business Administration (Agricultural Business Management)" && $semester=="semester4"){
    	$certelseificategrad = $qerydata['certificate_grade']/2400*100;
    }
    elseif($course=="Master Programme In Business Administration (Construction Management)" && $semester=="semester4"){
    	$certelseificategrad = $qerydata['certificate_grade']/2000*100;
    }
    elseif($course=="Master Programme In Business Administration (International Business and Marketing)" && $semester=="semester4"){
    	$certelseificategrad = $qerydata['certificate_grade']/2000*100;
    }
    elseif($course=="Master Programme In Business Administration (Industrial Management))" && $semester=="semester4"){
    	$certelseificategrad = $qerydata['certificate_grade']/2000*100;
    }
    elseif($course=="Master Programme in Business Administration (Digital Management)" && $semester=="semester4"){
    	$certelseificategrad = $qerydata['certificate_grade']/2400*100;
    }
    elseif($course=="Master Programme In Business Administration (Finance & Marketing)" && $semester=="semester4"){
    	$certelseificategrad = $qerydata['certificate_grade']/2000*100;
    }
    elseif($course=="Master Programme In Business Administration (Finance Management)" && $semester=="semester4"){
    	$certelseificategrad = $qerydata['certificate_grade']/1600*100;
    }
    elseif($course=="Master Programme In Business Administration (Finance & HR Management)" && $semester=="semester4"){
    	$certelseificategrad = $qerydata['certificate_grade']/2000*100;
    }
    elseif($course=="Master Programme In Business Administration (General management)" && $semester=="semester4"){
    	$certelseificategrad = $qerydata['certificate_grade']/2400*100;
    }
    elseif($course=="Master Programme In Business Administration (Materials Management)" && $semester=="semester4"){
    	$certelseificategrad = $qerydata['certificate_grade']/2000*100;
    }
    elseif($course=="Master Programme In Business Administration (H.R & supply Chain Management)" && $semester=="semester4"){
    	$certelseificategrad = $qerydata['certificate_grade']/2000*100;
    }
    elseif($course=="Master Programme In Business Administration (Hotel Management)" && $semester=="semester4"){
    	$certelseificategrad = $qerydata['certificate_grade']/2000*100;
    }
    elseif($course=="Master Programme in Business Administration (Human Resources)" && $semester=="semester4"){
    	$certelseificategrad = $qerydata['certificate_grade']/1600*100;
    }
    elseif($course=="Master Programme In Business Administration (information Technology & Operations Management)" && $semester=="semester4"){
    	$certelseificategrad = $qerydata['certificate_grade']/2400*100;
    }
    elseif($course=="Master Programme In Business Administration (Information Technology)" && $semester=="semester4"){
    	$certelseificategrad = $qerydata['certificate_grade']/2400*100;
    }
    elseif($course=="Master Programme In Business Administration In Dual Specializations (Supply,Operation and Logistics" && $semester=="semester4"){
    	$certelseificategrad = $qerydata['certificate_grade']/2400*100;
    }
    elseif($course=="Master Programme In Business Administration (International Business)" && $semester=="semester4"){
    	$certelseificategrad = $qerydata['certificate_grade']/2000*100;
    }
    elseif($course=="Master Programme In Business Administration (Logistics,Supply chain & Marketing)" && $semester=="semester4"){
    	$certelseificategrad = $qerydata['certificate_grade']/2000*100;
    }
    elseif($course=="Master Programme in Business Administration (Marketing Management)" && $semester=="semester4"){
    	$certelseificategrad = $qerydata['certificate_grade']/1600*100;
    }
    elseif($course=="Master Programme in Business Administration (Oil & Gas)" && $semester=="semester4"){
    	$certelseificategrad = $qerydata['certificate_grade']/1900*100;
    }
    elseif($course=="Master Programme in Business Administration (Operations & Supply Chain Management)" && $semester=="semester4"){
    	$certelseificategrad = $qerydata['certificate_grade']/1800*100;
    }
    elseif($course=="Master Programme in Business Administration (Petroleum Industry)" && $semester=="semester4"){
    	$certelseificategrad = $qerydata['certificate_grade']/2000*100;
    }
    elseif($course=="Master Programme in Business Administration (Pollution Control)" && $semester=="semester4"){
    	$certelseificategrad = $qerydata['certificate_grade']/2400*100;
    }
    elseif($course=="Master Programme In Business Administration (Production & Operation Management)" && $semester=="semester4"){
    	$certelseificategrad = $qerydata['certificate_grade']/2000*100;
    }
    elseif($course=="Master Programme In Business Administration (Project Management)" && $semester=="semester4"){
    	$certelseificategrad = $qerydata['certificate_grade']/2000*100;
    }
    elseif($course=="Master Programme In Business Administration (Quality Management)" && $semester=="semester4"){
    	$certelseificategrad = $qerydata['certificate_grade']/2400*100;
    }
    elseif($course=="Master Programme In Business Administration (Security Management)" && $semester=="semester4"){
    	$certelseificategrad = $qerydata['certificate_grade']/2300*100;
    }
    elseif($course=="Master Programme In Business Administration (Store Management)" && $semester=="semester4"){
    	$certelseificategrad = $qerydata['certificate_grade']/2000*100;
    }
    elseif($course=="Master Programme In Business Administration (Sales & Marketing)" && $semester=="semester4"){
    	$certelseificategrad = $qerydata['certificate_grade']/2000*100;
    }
    elseif($course=="Master Programme In Business Administration (Supply Chain Management)" && $semester=="semester4"){
    	$certelseificategrad = $qerydata['certificate_grade']/2400*100;
    }
    elseif($course=="Master Programme In Business Administration in Dual Specializations (Logistics,Supply chain & Marke" && $semester=="semester4"){
    	$certelseificategrad = $qerydata['certificate_grade']/2000*100;
    }
    elseif($course=="Master Programme In Business Administration in Dual Specializations (Supply chain & logistics suppl" && $semester=="semester4"){
    	$certelseificategrad = $qerydata['certificate_grade']/2400*100;
    }
    elseif($course=="Master Programme In Business Administration In Dual Specializations (HR & finance management)" && $semester=="semester4"){
    	$certelseificategrad = $qerydata['certificate_grade']/2000*100;
    }
    elseif($course=="Master Programme In Business Administration In Dual Specializations (HR & Marketing management)" && $semester=="semester4"){
    	$certelseificategrad = $qerydata['certificate_grade']/2000*100;
    }
    elseif($course=="Master Programme In Business Administration In Dual Specializations (Marketing & Tourism Management)" && $semester=="semester4"){
    	$certelseificategrad = $qerydata['certificate_grade']/2400*100;
    }
    elseif($course=="Master Programme In Business Administration In Dual Specializations (Material Management & Operation" && $semester=="semester4"){
    	$certelseificategrad = $qerydata['certificate_grade']/2000*100;
    }
    elseif($course=="Master Programme In Business Administration(Marketing Mgmt & Production Operation Mgmt)" && $semester=="semester4"){
    	$certelseificategrad = $qerydata['certificate_grade']/1600*100;
    }
    elseif($course=="Master Programme In Business Administration In Dual Specializations (Construction Management & Gener" && $semester=="semester4"){
    	$certelseificategrad = $qerydata['certificate_grade']/2200*100;
    }
    elseif($course=="Master Programme In Business Administration (ECommerce)" && $semester=="semester4"){
    	$certelseificategrad = $qerydata['certificate_grade']/2200*100;
    }
    elseif($course=="Master Programme In Business Administration In Dual Specializations (International Business & Market" && $semester=="semester4"){
    	$certelseificategrad = $qerydata['certificate_grade']/2200*100;
    }
    elseif($course=="Master Programme In Business Administration In Dual Specializations (supply,operation & Logistics" && $semester=="semester4"){
    	$certelseificategrad = $qerydata['certificate_grade']/2400*100;
    }
    elseif($course=="Master Programme In Business Administration ( Hotel & Human Resources Management)" && $semester=="semester4"){
    	$certelseificategrad = $qerydata['certificate_grade']/2000*100;
    }
    elseif($course=="Master Programme In Business Administration (NGO & Project Management)" && $semester=="semester4"){
    	$certelseificategrad = $qerydata['certificate_grade']/2000*100;
    }
    elseif($course=="Master Programme In Business Administration (Hospital Administration)" && $semester=="semester4"){
    	$certelseificategrad = $qerydata['certificate_grade']/2400*100;
    }
    elseif($course=="Master Programme In Business Administration (international Business & information Technology)" && $semester=="semester4"){
    	$certelseificategrad = $qerydata['certificate_grade']/2400*100;
    }
    elseif($course=="Master Programme In Business Administration (Store Management & Material Management)" && $semester=="semester4"){
    	$certelseificategrad = $qerydata['certificate_grade']/2000*100;
    }
    elseif($course=="Master Programme In Business Administration (Logistics & Supply Chain Management)" && $semester=="semester4"){
    	$certelseificategrad = $qerydata['certificate_grade']/2000*100;
    }
    elseif($course=="Master Programme In Business Administration (finance & Supply Chain Management)" && $semester=="semester4"){
    	$certelseificategrad = $qerydata['certificate_grade']/1600*100;
    }
    elseif($course=="Master Programme In Business Administration (Marketing Management & Operation Management)" && $semester=="semester4"){
    	$certelseificategrad = $qerydata['certificate_grade']/2000*100;
    }
    elseif($course=="Master Programme In Business Management" && $semester=="semester4"){
    	$certelseificategrad = $qerydata['certificate_grade']/1900*100;
    }
    elseif($course=="Master programme in Computer Application" && $semester=="semester6"){
    	$certelseificategrad = $qerydata['certificate_grade']/3000*100;
    }
    elseif($course=="Master Programme In Civil Engineering" && $semester=="semester4"){
    	$certelseificategrad = $qerydata['certificate_grade']/1600*100;
    }
    elseif($course=="P G Diploma In Business Management" && $semester=="semester4"){
    	$certelseificategrad = $qerydata['certificate_grade']/2300*100;
    }
    elseif($course=="P G Diploma In Computer Application" && $semester=="semester4"){
    	$certelseificategrad = $qerydata['certificate_grade']/1900*100;
    }
    elseif($course=="P G Diploma In Environment Management" && $semester=="semester2"){
    	$certelseificategrad = $qerydata['certificate_grade']/1200*100;
    }
    elseif($course=="P G Diploma In Fire & Construction" && $semester=="semester2"){
    	$certelseificategrad = $qerydata['certificate_grade']/1000*100;
    }
    elseif($course=="P G Diploma In Hospital & Health Management" && $semester=="semester2"){
    	$certelseificategrad = $qerydata['certificate_grade']/700*100;
    }
    elseif($course=="P G Diploma In Industrial And Environment Management" && $semester=="semester2"){
    	$certelseificategrad = $qerydata['certificate_grade']/3000*100;
    }
    elseif($course=="P G Diploma In Industrial Safety" && $semester=="semester2"){
    	$certelseificategrad = $qerydata['certificate_grade']/1200*100;
    }
    elseif($course=="P G Diploma In International Business" && $semester=="semester4"){
    	$certelseificategrad = $qerydata['certificate_grade']/2100*100;
    }
    elseif($course=="P G Diploma in Project Management" && $semester=="semester2"){
    	$certelseificategrad = $qerydata['certificate_grade']/800*100;
    }
    elseif($course=="P G Diploma in Public Health" && $semester=="semester2"){
    	$certelseificategrad = $qerydata['certificate_grade']/700*100;
    }
    elseif($course=="P G Diploma In Rural Development" && $semester=="semester2"){
    	$certelseificategrad = $qerydata['certificate_grade']/1200*100;
    }
    elseif($course=="P G Diploma In Security & Threat Control" && $semester=="semester2"){
    	$certelseificategrad = $qerydata['certificate_grade']/1000*100;
    }
    elseif($course=="P G Diploma In Information Technology Management" && $semester=="semester4"){
    	$certelseificategrad = $qerydata['certificate_grade']/1800*100;
    }
    elseif($course=="PG Diploma in Business Administration" && $semester=="semester2"){
    	$certelseificategrad = $qerydata['certificate_grade']/1000*100;
    }
    elseif($course=="Professional Diploma In Business Analytics" && $semester=="semester2"){
    	$certelseificategrad = $qerydata['certificate_grade']/700*100;
    }
    elseif($course=="Professional Diploma in Digital Marketing" && $semester=="semester2"){
    	$certelseificategrad = $qerydata['certificate_grade']/1100*100;
    }
    elseif($course=="Professional Diploma In Financial Mathematics" && $semester=="semester2"){
    	$certelseificategrad = $qerydata['certificate_grade']/700*100;
    }
    elseif($course=="Professional Diploma In Graphic Designing" && $semester=="semester2"){
    	$certelseificategrad = $qerydata['certificate_grade']/1200*100;
    }
    elseif($course=="Professional Diploma In Interior Designing" && $semester=="semester2"){
    	$certelseificategrad = $qerydata['certificate_grade']/1100*100;
    }
    elseif($course=="Master Programme In Electrical & Electronics Engineering" && $semester=="semester4"){
    	$certelseificategrad = $qerydata['certificate_grade']/2000*100;
    }
    elseif($course=="Master Programme in Electronics and Instrumentation Engineering" && $semester=="semester4"){
    	$certelseificategrad = $qerydata['certificate_grade']/2000*100;
    }
    elseif($course=="Master Programme in Electronics Engineering" && $semester=="semester4"){
    	$certelseificategrad = $qerydata['certificate_grade']/2000*100;
    }
    elseif($course=="Master Programme in Food & Nutrition Engineering" && $semester=="semester4"){
    	$certelseificategrad = $qerydata['certificate_grade']/2000*100;
    }
    elseif($course=="Master Programme In Mechanical Engineering" && $semester=="semester4"){
    	$certelseificategrad = $qerydata['certificate_grade']/2000*100;
    }
    elseif($course=="Professional Diploma In Tourism Management" && $semester=="semester2"){
    	$certelseificategrad = $qerydata['certificate_grade']/1000*100;
    }
    elseif($course=="P G Diploma In Electronics & Communication Engineering" && $semester=="semester4"){
    	$certelseificategrad = $qerydata['certificate_grade']/1800*100;
    }
    elseif($course=="P G Diploma in Finance" && $semester=="semester2"){
    	$certelseificategrad = $qerydata['certificate_grade']/1200*100;
    }
    elseif($course=="P G Diploma In HR" && $semester=="semester2"){
    	$certelseificategrad = $qerydata['certificate_grade']/1200*100;
    }
    elseif($course=="P G Diploma In Industrial & Environment Management" && $semester=="semester4"){
    	$certelseificategrad = $qerydata['certificate_grade']/1900*100;
    }
    elseif($course=="P G Diploma In Marketing Management" && $semester=="semester4"){
    	$certelseificategrad = $qerydata['certificate_grade']/2200*100;
    }
    elseif($course=="PG Diploma in Logistics and Supply Chain Management" && $semester=="semester4"){
    	$certelseificategrad = $qerydata['certificate_grade']/2200*100;
    }
    elseif($course=="Professional Diploma In Fashion Designing" && $semester=="semester2"){
    	$certelseificategrad = $qerydata['certificate_grade']/1200*100;
    }
    elseif($course=="Professional Diploma In Financial Analytics" && $semester=="semester2"){
    	$certelseificategrad = $qerydata['certificate_grade']/1000*100;
    }
    elseif($course=="Master Programme in Information Technology Engineering" && $semester=="semester4"){
    	$certelseificategrad = $qerydata['certificate_grade']/1600*100;
    }
    else{
    	echo'';
    }
    $text = "Enrolment No:".$enrollement." Status: ".$qerydata['stu_result'];
    $qr = QRCode::getMinimumQRCode($text, QR_ERROR_CORRECT_LEVEL_L);
    $img = $qr->createImage(4, 4);
    ob_start();
    imagegif($img);
    imagedestroy($img);
    $img = ob_get_clean();
?>

<style>

.cmm-image {
    background-image: url('pdf-folder/iimsr-certificate-lowres.jpeg'); /* Placeholder image */
    background-size: cover;
}
.cmm-image.loaded {
    background-image: url('pdf-folder/iimsr-certificate.jpeg'); /* High-resolution image */
}

</style>
<!--<img style="opacity: 0.6;" src="pdf-folder/certificate-live.jpeg" alt="DZone"/>-->
<!--<img style="opacity: 0.6;width:100%;height:1018px;" src="pdf-folder/Certificate1234.jpeg" alt="DZone"/>-->

<!-- <img style="width:210mm;height:297mm;" src="pdf-folder/iimsr-certificate.jpeg" alt="DZone"/> -->
<img class="cmm-image" id="cmmImage" style="width: 210mm; height: 297mm;" src="pdf-folder/iimsr-certificate-lowres.jpeg" alt="DZone"/>
<table style="width:97%;margin-top:-655px;opacity: 0.9;z-index:9999999;line-height:20px;position:absolute; ">
    <tr>
        <td>
            <table style=" margin-top: -421px; margin-left: 40px;">
                <tr>
        			<td width="100%" style="font-size:21px;font-weight:bold;color:red;padding-left:565px"><?php echo $enrollement ?></td>
        		</tr>
            </table>
            <table style="margin-top: 400px;  margin-left: 30px;">
                <tr>
        			<td width="100%" style="padding-left: 198px;line-height:50px;font-size:21px"><?php echo $row['name']; ?></td>
        		</tr>
        	</table>
        	<table style="margin-top:-2px;margin-left:24px;">
                <tr>
        			<td width="100%" style="padding-left: 184px;line-height:50px;font-size:21px"><?php echo $row['fathers_name']; ?></td>
        		</tr>
        	</table>
        	<table style="margin-top:-8px;margin-left:35px;" height="110px">
                <tr>
        			<td width="100%" style="padding-left: 294px;line-height:57px;font-size:21px">
					    <?php 
    						if($course=="Master Programme In Business Administration ( Marketing)"){
    							echo "Master Programme";
    						}
    						elseif($course=="Master Programme in Business Administration"){
    							echo "Master Programme";
    						}
    						elseif($course=="Master Programme in Food & Nutrition Engineering"){
    							echo "Master Programme";
    						}
    						elseif($course=="Master Programme In Mechanical Engineering"){
    							echo "Master Programme";
    						}
    						elseif($course=="Master programme in Computer Application"){
    							echo "Master Programme";
    						}
    						elseif($course=="Master Programme In Business Management"){
    							echo "Master Programme";
    						}
    						elseif($course=="Master Programme In Electrical & Electronics Engineering"){
    							echo "Master Programme";
    						}
    						elseif($course=="Master Programme In Civil Engineering"){
    							echo "Master Programme";
    						}
    						elseif($course=="Master Programme in Electronics Engineering"){
    							echo "Master Programme";
    						}
    						elseif($course=="Master Programme in Business Administration (Agri & Food Busi.)"){
    							echo "Master Programme";
    						}
    						elseif($course=="Master Programme In Business Administration (International Business and Marketing)"){
    							echo "Master Programme In Business Administration";
    						}
    						elseif($course=="Master Programme In Business Administration (Agricultural Business Management)"){
    							echo "Master Programme";
    						}
    						elseif($course=="Master Programme In Business Administration (Construction Management)"){
    							echo "Master Programme";
    						}
    						elseif($course=="Master Programme in Business Administration (Digital Management)"){
    							echo "Master Programme";
    						}
    						elseif($course=="Master Programme In Business Administration (Finance & Marketing)"){
    							echo "Master Programme";
    						}
    						elseif($course=="Master Programme In Business Administration (Finance Management)"){
    							echo "Master Programme";
    						}
    						elseif($course=="Master Programme In Business Administration (Finance & HR Management)"){
    							echo "Master Programme";
    						}
    						elseif($course=="Master Programme In Business Administration (General management)"){
    							echo "Master Programme";
    						}
    						elseif($course=="Master Programme In Business Administration (Hotel Management)"){
    							echo "Master Programme";
    						}
    						elseif($course=="Master Programme in Electronics and Instrumentation Engineering"){
    							echo "Master Programme";
    						}
    						elseif($course=="Master Programme in Business Administration (Human Resources)"){
    							echo "Master Programme";
    						}
    						elseif($course=="Master Programme in Information Technology Engineering"){
    							echo "Master Programme";
    						}
    						elseif($course=="Master Programme In Business Administration (Information Technology)"){
    							echo "Master Programme";
    						}
    						elseif($course=="Master Programme In Business Administration (International Business)"){
    							echo "Master Programme";
    						}
    						elseif($course=="Master Programme In Business Administration (H.R & supply Chain Management)"){
    							echo "Master Programme";
    						}
    						elseif($course=="Master Programme In Business Administration (Marketing Management & Operation Management)"){
    							echo "Master Programme";
    						}
    						elseif($course=="Master Programme In Business Administration (Materials Management)"){
    							echo "Master Programme";
    						}
    						elseif($course=="Master Programme in Business Administration (Marketing Management)"){
    							echo "Master Programme";
    						}
    						elseif($course=="Master Programme in Business Administration (Oil & Gas)"){
    							echo "Master Programme";
    						}
    						elseif($course=="Master Programme in Business Administration (Operations & Supply Chain Management)"){
    							echo "Master Programme";
    						}
    						elseif($course=="Master Programme in Business Administration (Petroleum Industry)"){
    							echo "Master Programme";
    						}
    						elseif($course=="Master Programme in Business Administration (Pollution Control)"){
    							echo "Master Programme";
    						}
    						elseif($course=="Master Programme In Business Administration (Production & Operation Management)"){
    							echo "Master Programme";
    						}
    						elseif($course=="Master Programme In Business Administration (Quality Management)"){
    							echo "Master Programme";
    						}
    						elseif($course=="Master Programme In Business Administration (Project Management)"){
    							echo "Master Programme";
    						}
    						elseif($course=="Master Programme In Business Administration (Security Management)"){
    							echo "Master Programme";
    						}
    						elseif($course=="Master Programme In Business Administration (Store Management)"){
    							echo "Master Programme";
    						}
    						elseif($course=="Master Programme In Business Administration (Sales & Marketing)"){
    							echo "Master Programme";
    						}
    						elseif($course=="Master Programme In Business Administration (Supply Chain Management)"){
    							echo "Master Programme";
    						}
    						elseif($course=="Master Programme In Business Administration (finance & Supply Chain Management)"){
    							echo "Master Programme";
    						}
    						elseif($course=="Master Programme In Business Administration in Dual Specializations (Logistics,Supply chain & Marke"){
    							echo "Master Programme";
    						}
    						elseif($course=="Master Programme In Business Administration In Dual Specializations (Marketing & Tourism Management)"){
    							echo "Master Programme";
    						}
    						elseif($course=="Master Programme In Business Administration in Dual Specializations (Supply chain & logistics suppl"){
    							echo "Master Programme";
    						}
    						elseif($course=="Master Programme In Business Administration In Dual Specializations (HR & finance management)"){
    							echo "Master Programme";
    						}
    						elseif($course=="Master Programme In Business Administration In Dual Specializations (HR & Marketing management)"){
    							echo "Master Programme";
    						}
    						elseif($course=="Master Programme In Business Administration In Dual Specializations (Material Management & Operation"){
    							echo "Master Programme";
    						}
    						elseif($course=="Master Programme In Business Administration In Dual Specializations (Construction Management & Gener"){
    							echo "Master Programme";
    						}
    						elseif($course=="Master Programme In Business Administration (information Technology & Operations Management)"){
    							echo "Master Programme";
    						}
    						elseif($course=="Master Programme In Business Administration (ECommerce)"){
    							echo "Master Programme";
    						}
    						elseif($course=="Master Programme In Business Administration(Marketing Mgmt & Production Operation Mgmt)"){
    							echo "Master Programme";
    						}
    						elseif($course=="Master Programme In Business Administration In Dual Specializations (International Business & Market"){
    							echo "Master Programme";
    						}
    						elseif($course=="Master Programme In Business Administration In Dual Specializations (supply,operation & Logistics"){
    							echo "Master Programme";
    						}
    						elseif($course=="Master Programme In Business Administration In Dual Specializations (Supply,Operation and Logistics"){
    							echo "Master Programme";
    						}
    						elseif($course=="Master Programme In Business Administration ( Hotel & Human Resources Management)"){
    							echo "Master Programme";
    						}
    						elseif($course=="Master Programme In Business Administration (NGO & Project Management)"){
    							echo "Master Programme";
    						}
    						elseif($course=="Master Programme In Business Administration (Hospital Administration)"){
    							echo "Master Programme";
    						}
    						elseif($course=="Master Programme In Business Administration (international Business & information Technology)"){
    							echo "Master Programme";
    						}
    						elseif($course=="Master Programme In Business Administration (Store Management & Material Management)"){
    							echo "Master Programme";
    						}
    						elseif($course=="Master Programme In Business Administration (Industrial Management)"){
    							echo "Master Programme";
    						}
    						elseif($course=="Master Programme In Business Administration (Logistics & Supply Chain Management)"){
    							echo "Master Programme";
    						}
    						elseif($course=="Advance Diploma In Hardware & Networking Technology"){
    							echo "Advance Diploma Programme";
    						}
    						elseif($course=="Advance Diploma In Business Administration"){
    							echo "Advance Diploma Programme";
    						}
    						elseif($course=="Advance Diploma In Civil Engineering"){
    							echo "Advance Diploma Programme";
    						}
    						elseif($course=="Advance Diploma In Computer Science Engineering"){
    							echo "Advance Diploma Programme";
    						}
    						elseif($course=="Advance Diploma in Electrical Engineering"){
    							echo "Advance Diploma Programme";
    						}
    						elseif($course=="Advance Diploma in H.R. Management"){
    							echo "Advance Diploma Programme";
    						}
    						elseif($course=="Advance Diploma In Hardware & Networking Technology"){
    							echo "Advance Diploma Programme";
    						}
    						elseif($course=="Advance Diploma In Mechanical Engineering"){
    							echo "Advance Diploma Programme";
    						}
    						elseif($course=="Bachelor Programme in Automobile Engineering"){
    							echo "Bachelor Programme";
    						}
    						elseif($course=="Bachelor Programme In Biotechnology"){
    							echo "Bachelor Programme";
    						}
    						elseif($course=="Bachelor Programme In Business Administration"){
    							echo "Bachelor Programme";
    						}
    						elseif($course=="Bachelor Programme in Business Administration"){
    							echo "Bachelor Programme";
    						}
    						elseif($course=="Bachelor Programme In Business Management"){
    							echo "Bachelor Programme";
    						}
    						elseif($course=="Bachelor Programme In Chemical Engineering"){
    							echo "Bachelor Programme";
    						}
    						elseif($course=="Bachelor Programme in Civil Engineering"){
    							echo "Bachelor Programme";
    						}
    						elseif($course=="Bachelor Programme In Computer Applications"){
    							echo "Bachelor Programme";
    						}
    						elseif($course=="Bachelor Programme In Computer Science Engineering"){
    							echo "Bachelor Programme";
    						}
    						elseif($course=="Bachelor programme In Computer Science Engineering"){
    							echo "Bachelor Programme";
    						}
    						elseif($course=="Bachelor Programme In Electrical & Electronics Engineering"){
    							echo "Bachelor Programme";
    						}
    						elseif($course=="Bachelor Programme In Electrical Engineering"){
    							echo "Bachelor Programme";
    						}
    						elseif($course=="Bachelor Programme In Electronics & Instrumentation Engineering"){
    							echo "Bachelor Programme";
    						}
    						elseif($course=="Bachelor Programme in Electronics & Communication Engineering"){
    							echo "Bachelor Programme";
    						}
    						elseif($course=="Bachelor Programme In Electronics & Telecommunication Engineering"){
    							echo "Bachelor Programme";
    						}
    						elseif($course=="Bachelor Programme in Electronics Engineering"){
    							echo "Bachelor Programme";
    						}
    						elseif($course=="Bachelor Programme In Fire & Safety Engineering"){
    							echo "Bachelor Programme";
    						}
    						elseif($course=="Bachelor Programme In Food & Nutrition"){
    							echo "Bachelor Programme";
    						}
    						elseif($course=="Bachelor Programme In Food Technology"){
    							echo "Bachelor Programme";
    						}
    						elseif($course=="Bachelor Programme in Information Technology"){
    							echo "Bachelor Programme";
    						}
    						elseif($course=="Bachelor Programme In Instrumentation Engineering"){
    							echo "Bachelor Programme";
    						}
    						elseif($course=="Bachelor Programme In Interior Design"){
    							echo "Bachelor Programme";
    						}
    						elseif($course=="Bachelor Programme In Material Science and Engineering"){
    							echo "Bachelor Programme";
    						}
    						elseif($course=="Bachelor Programme in Mechanical Engineering"){
    							echo "Bachelor Programme";
    						}
    						elseif($course=="Bachelor Programme In Mechatronics Engineering"){
    							echo "Bachelor Programme";
    						}
    						elseif($course=="Bachelor Programme In Metallurgical Engineering"){
    							echo "Bachelor Programme";
    						}
    						elseif($course=="Bachelor Programme In Polymer Engineering"){
    							echo "Bachelor Programme";
    						}
    						elseif($course=="Bachelor Programme In Print Technology Management"){
    							echo "Bachelor Programme";
    						}
    						elseif($course=="Bachelor Programme In Textile Engineering"){
    							echo "Bachelor Programme";
    						}
    						elseif($course=="Certificate Programme In Civil Engineering"){
    							echo "Certificate Programme In Civil Engineering";
    						}
    						elseif($course=="Certificate Programme In Librarian"){
    							echo "Certificate Programme In Librarian";
    						}
    						elseif($course=="Certificate Programme In Project Management"){
    							echo "Certificate Programme In Project Management";
    						}
    						elseif($course=="Diploma in Electrical Engineering"){
    							echo "Diploma Programme";
    						}
    						elseif($course=="Diploma in Human Resource Management"){
    							echo "Diploma Programme";
    						}
    						elseif($course=="Diploma In Industrial Safety"){
    							echo "Diploma Programme";
    						}
    						elseif($course=="Diploma In Industrial Safety 3 Year"){
    							echo "Diploma Programme";
    						}
    						elseif($course=="Diploma In Industrial Safety 6 Month"){
    							echo "Diploma Programme";
    						}
    						elseif($course=="Diploma In Material Management 2 Year"){
    							echo "Diploma Programme";
    						}
    						elseif($course=="Diploma In Operation Management"){
    							echo "Diploma Programme";
    						}
    						elseif($course=="Diploma Programme In Automobile Engineering"){
    							echo "Diploma Programme";
    						}
    						elseif($course=="Diploma Programme in Chemical Engineering"){
    							echo "Diploma Programme";
    						}
    						elseif($course=="Diploma Programme In Civil Engineering"){
    							echo "Diploma Programme";
    						}
    						elseif($course=="Diploma Programme In Computer Applications"){
    							echo "Diploma Programme";
    						}
    						elseif($course=="Diploma Programme In Computer Science Engineering"){
    							echo "Diploma Programme";
    						}
    						elseif($course=="Diploma Programme In Human Resource Management"){
    							echo "Diploma Programme";
    						}
    						elseif($course=="Diploma Programme In Disaster Management"){
    							echo "Diploma Programme";
    						}
    						elseif($course=="Diploma Programme In Electrical & Electronics Engineering"){
    							echo "Diploma Programme";
    						}
    						elseif($course=="Diploma Programme in Electrical Engineering"){
    							echo "Diploma Programme";
    						}
    						elseif($course=="Diploma Programme In Electronics & Communication Engineering"){
    							echo "Diploma Programme";
    						}
    						elseif($course=="Diploma Programme In Electronics & Telecommunication"){
    							echo "Diploma Programme";
    						}
    						elseif($course=="Diploma Programme In Electronics Engineering"){
    							echo "Diploma Programme";
    						}
    						elseif($course=="Diploma Programme In Environmental Engineering"){
    							echo "Diploma Programme";
    						}
    						elseif($course=="Diploma Programme In Finance Management"){
    							echo "Diploma Programme";
    						}
    						elseif($course=="Diploma Programme In Fire & Safety"){
    							echo "Diploma Programme";
    						}
    						elseif($course=="Diploma Programme In Food & Safety"){
    							echo "Diploma Programme";
    						}
    						elseif($course=="Diploma Programme In Hospital Management"){
    							echo "Diploma Programme";
    						}
    						elseif($course=="Diploma Programme In Hotel Management"){
    							echo "Diploma Programme";
    						}
    						elseif($course=="Diploma Programme In HR"){
    							echo "Diploma Programme";
    						}
    						elseif($course=="Diploma Programme in Human Resource Management"){
    							echo "Diploma Programme";
    						}
    						elseif($course=="Diploma Programme In Industrial Electronics"){
    							echo "Diploma Programme";
    						}
    						elseif($course=="Diploma Programme In Information Technology"){
    							echo "Diploma Programme";
    						}
    						elseif($course=="Diploma Programme In Inventory Management"){
    							echo "Diploma Programme";
    						}
    						elseif($course=="Diploma Programme In Logistic"){
    							echo "Diploma Programme";
    						}
    						elseif($course=="Diploma Programme In Logistic Management"){
    							echo "Diploma Programme";
    						}
    						elseif($course=="Diploma Programme In Logistics Management"){
    							echo "Diploma Programme";
    						}
    						elseif($course=="Diploma Programme In Marketing Management"){
    							echo "Diploma Programme";
    						}
    						elseif($course=="Diploma Programme In Mechanical Engineering"){
    							echo "Diploma Programme";
    						}
    						elseif($course=="Diploma Programme In Mechatronics Engineering"){
    							echo "Diploma Programme";
    						}
    						elseif($course=="Diploma Programme in Metallurgical Engineering"){
    							echo "Diploma Programme";
    						}
    						elseif($course=="Diploma Programme In Mining Engineering"){
    							echo "Diploma Programme";
    						}
    						elseif($course=="Diploma Programme In Printing Technology"){
    							echo "Diploma Programme";
    						}
    						elseif($course=="Diploma Programme In Project Management"){
    							echo "Diploma Programme";
    						}
    						elseif($course=="Diploma Programme In Business Management"){
    							echo "Diploma Programme";
    						}
    						elseif($course=="Diploma Programme In Rural Development"){
    							echo "Diploma Programme";
    						}
    						elseif($course=="Diploma Programme In Supply Chain Management"){
    							echo "Diploma Programme";
    						}
    						elseif($course=="Diploma Programme In Textile"){
    							echo "Diploma Programme";
    						}
    						elseif($course=="Diploma Programme In Tourism Management"){
    							echo "Diploma Programme";
    						}
    						elseif($course=="Diploma Progrmme in Instrumentation Engineering"){
    							echo "Diploma Programme";
    						}
    						elseif($course=="Executive Master In Business Administration"){
    							echo "Executive Master Programme";
    						}
    						elseif($course=="Graduate Diploma In Automobile Engineering"){
    							echo "Graduate Diploma Programme";
    						}
    						elseif($course=="Graduate Diploma In Civil Engineering"){
    							echo "Graduate Diploma Programme";
    						}
    						elseif($course=="Graduate Diploma In Computer Science"){
    							echo "Graduate Diploma Programme";
    						}
    						elseif($course=="Graduate Diploma In Electronics & Telecommunication"){
    							echo "Graduate Diploma Programme";
    						}
    						elseif($course=="Graduate Diploma In Hotel Management"){
    							echo "Graduate Diploma Programme";
    						}
    						elseif($course=="Graduate Diploma In Information Technology"){
    							echo "Graduate Diploma Programme";
    						}
    						elseif($course=="Graduate Diploma In Mechanical Engineering"){
    							echo "Graduate Diploma Programme";
    						}
    						elseif($course=="P G Diploma In Business Management"){
    							echo "P G Diploma Programme";
    						}
    						elseif($course=="P G Diploma In Computer Application"){
    							echo "P G Diploma Programme";
    						}
    						elseif($course=="P G Diploma In Electronics & Communication Engineering"){
    							echo "P G Diploma Programme";
    						}
    						elseif($course=="P G Diploma In Environment Management"){
    							echo "P G Diploma Programme";
    						}
    						elseif($course=="P G Diploma in Finance"){
    							echo "P G Diploma Programme";
    						}
    						elseif($course=="P G Diploma In Fire & Construction"){
    							echo "P G Diploma Programme";
    						}
    						elseif($course=="P G Diploma In Hospital & Health Management"){
    							echo "P G Diploma Programme";
    						}
    						elseif($course=="P G Diploma In HR"){
    							echo "P G Diploma Programme";
    						}
    						elseif($course=="P G Diploma In Industrial & Environment Management"){
    							echo "P G Diploma Programme";
    						}
    						elseif($course=="P G Diploma In Industrial Safety"){
    							echo "P G Diploma Programme";
    						}
    						elseif($course=="P G Diploma In Information Technology Management"){
    							echo "P G Diploma Programme";
    						}
    						elseif($course=="P G Diploma In International Business"){
    							echo "P G Diploma Programme";
    						}
    						elseif($course=="P G Diploma In Marketing Management"){
    							echo "P G Diploma Programme";
    						}
    						elseif($course=="P G Diploma in Project Management"){
    							echo "P G Diploma Programme";
    						}
    						elseif($course=="P G Diploma in Public Health"){
    							echo "P G Diploma Programme";
    						}
    						elseif($course=="P G Diploma In Rural Development"){
    							echo "P G Diploma Programme";
    						}
    						elseif($course=="P G Diploma In Security & Threat Control"){
    							echo "P G Diploma Programme";
    						}
    						elseif($course=="PG Diploma in Business Administration"){
    							echo "P G Diploma Programme";
    						}
    						elseif($course=="PG Diploma in Logistics and Supply Chain Management"){
    							echo "P G Diploma Programme";
    						}
    						elseif($course=="Professional Diploma In Business Analytics"){
    							echo "Professional Diploma Programme";
    						}
    						elseif($course=="Professional Diploma in Digital Marketing"){
    							echo "Professional Diploma Programme";
    						}
    						elseif($course=="Professional Diploma In Fashion Designing"){
    							echo "Professional Diploma Programme";
    						}
    						elseif($course=="Professional Diploma In Financial Analytics"){
    							echo "Professional Diploma Programme";
    						}
    						elseif($course=="Professional Diploma In Financial Mathematics"){
    							echo "Professional Diploma Programme";
    						}
    						elseif($course=="Professional Diploma In Graphic Designing"){
    							echo "Professional Diploma Programme";
    						}
    						elseif($course=="Professional Diploma In Interior Designing"){
    							echo "Professional Diploma Programme";
    						}
    						elseif($course=="Professional Diploma In Tourism Management"){
    							echo "Professional Diploma Programme";
    						}
    						else{
    							echo $course;
    						}
    					?>
    				</td>
        		</tr>
        		<tr>
					<td width="50%" style="padding-left:132px;padding-top:10px;line-height:40px;font-size:21px"><?php 
    					if($row['specilization']=="Supply Chain Management or Operation Management and Logistics Management"){
                            echo "SCM, Operation Management & Logistics Management";
                        }elseif($row['specilization']=="Hardware & Networking Technology"){
    							echo "Hardware & Networking";
    					}else{
    					    echo "<b>Branch : </b>" . $row['specilization']; 
                        }
    					?>
					</td>
				</tr>
        		<tr><td width="100%" style="padding-left: 340px;line-height:50px"></td></tr>
        		<tr><td width="100%" style="padding-left: 340px;line-height:50px"></td></tr>
            </table>
            <table style="margin-top: 50px; margin-left: 39px;">
                <tr>
        			<td width="50%" style="padding-left: 230px;line-height:48px;font-size:21px"><?php echo $qerydata['certificate_month']; ?></td>
        			<td width="25%" style="padding-left: 86px;line-height:53px;font-size:21px"><?php echo $qerydata['year']; ?></td>
        			<td width="25%" style="padding-left: 95px;line-height:40px;font-size:21px">
					<?php 
					if(is_numeric($alreadygrade)){
					//echo 'test';
						if($course=="Advance Diploma In Business Administration" && $semester=="semester2"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}elseif($course=="Advance Diploma In Civil Engineering" && $semester=="semester2"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}elseif($course=="Advance Diploma In Computer Science Engineering" && $semester=="semester2"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}elseif($course=="Advance Diploma in Electrical Engineering" && $semester=="semester2"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}elseif($course=="Advance Diploma in H.R. Management" && $semester=="semester2"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}elseif($course=="Advance Diploma In Hardware & Networking Technology" && $semester=="semester2"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}elseif($course=="Bachelor Programme In Animation & Multimedia Technology" && $semester=="semester8"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}elseif($course=="Bachelor Programme in Automobile Engineering" && $semester=="semester8"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}
						elseif($course=="Bachelor Programme In Business Management" && $semester=="semester6"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}
						elseif($course=="Bachelor Programme In Biotechnology" && $semester=="semester8"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}
						elseif($course=="Bachelor Programme in Business Administration" && $semester=="semester6"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}
						elseif($course=="P G Diploma In Industrial & Environment Management" && $semester=="semester4"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}
						elseif($course=="Bachelor Programme In Business Administration" && $semester=="semester6"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}
						if($course=="Bachelor Programme In Chemical Engineering" && $semester=="semester8"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}elseif($course=="Bachelor Programme in Civil Engineering" && $semester=="semester8"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}elseif($course=="Bachelor Programme In Computer Applications" && $semester=="semester6"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}elseif($course=="Bachelor Programme In Computer Science Engineering" && $semester=="semester8"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}
						elseif($course=="Bachelor programme In Computer Science Engineering" && $semester=="semester8"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}
						elseif($course=="Bachelor Programme In Electrical & Electronics Engineering" && $semester=="semester8"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}
						elseif($course=="Bachelor Programme In Electrical & Electronics Engineering" && $semester=="semester6"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}
						elseif($course=="Bachelor Programme In Electrical Engineering" && $semester=="semester8"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}
						elseif($course=="Bachelor Programme in Electronics & Communication Engineering" && $semester=="semester8"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}
						elseif($course=="Bachelor Programme In Mechatronics Engineering" && $semester=="semester8"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}
						elseif($course=="Bachelor Programme In Electronics & Telecommunication Engineering" && $semester=="semester8"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}elseif($course=="Bachelor Programme in Electronics Engineering" && $semester=="semester8"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}elseif($course=="Bachelor Programme In Fire & Safety Engineering" && $semester=="semester8"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}elseif($course=="Bachelor Programme In Food & Nutrition" && $semester=="semester8"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}elseif($course=="Bachelor Programme In Food Technology" && $semester=="semester8"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}elseif($course=="Bachelor Programme in Information Technology" && $semester=="semester8"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}elseif($course=="Bachelor Programme In Instrumentation Engineering" && $semester=="semester8"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}elseif($course=="Bachelor Programme in Mechanical Engineering" && $semester=="semester8"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}elseif($course=="Bachelor Programme In Metallurgical Engineering" && $semester=="semester8"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}elseif($course=="Bachelor Programme In Polymer Engineering" && $semester=="semester8"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}elseif($course=="Bachelor programme In Print Technology Management" && $semester=="semester8"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}
						elseif($course=="Bachelor Programme In Textile Engineering" && $semester=="semester8"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}
						
						elseif($course=="Bachelor Programme In Electronics & Instrumentation Engineering" && $semester=="semester8"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}
						
						elseif($course=="Certificate Programme In Civil Engineering" && $semester=="semester1"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}elseif($course=="Certificate Programme In Librarian" && $semester=="semester1"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}elseif($course=="Certificate Programme In Project Management" && $semester=="semester2"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}elseif($course=="Diploma Programme In Mining Engineering" && $semester=="semester6"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}
						
						elseif($course=="Diploma in Electrical Engineering" && $semester=="semester6"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}elseif($course=="Diploma in Human Resource Management" && $semester=="semester2"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}
						elseif($course=="Diploma In Industrial Safety" && $semester=="semester2"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}
						elseif($course=="Diploma Programme In Business Management" && $semester=="semester6"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}
						elseif($course=="Diploma In Material Management 2 Year" && $semester=="semester4"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}elseif($course=="Diploma In Operation Management" && $semester=="semester4"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}elseif($course=="Diploma Programme In Automobile Engineering" && $semester=="semester6"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}elseif($course=="Diploma Programme in Chemical Engineering" && $semester=="semester8"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}elseif($course=="Diploma Programme In Civil Engineering" && $semester=="semester6"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}elseif($course=="Diploma Programme In Computer Applications" && $semester=="semester2"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}elseif($course=="Diploma Programme In Computer Science Engineering" && $semester=="semester6"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}elseif($course=="Diploma Programme In Disaster Management" && $semester=="semester4"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}elseif($course=="Diploma Programme In Electrical & Electronics Engineering" && $semester=="semester6"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}elseif($course=="Diploma Programme in Electrical Engineering" && $semester=="semester6"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}elseif($course=="Diploma Programme In Electronics & Communication Engineering" && $semester=="semester6"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}elseif($course=="Diploma Programme In Electronics & Telecommunication" && $semester=="semester6"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}elseif($course=="Diploma Programme In Electronics Engineering" && $semester=="semester6"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}elseif($course=="Diploma Programme In Environmental Engineering" && $semester=="semester6"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}elseif($course=="Diploma Programme In Finance Management" && $semester=="semester6"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}
						elseif($course=="Diploma Programme In Finance Management" && $semester=="semester2"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}
						elseif($course=="Diploma Programme In Fire & Safety" && $semester=="semester2"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}
						elseif($course=="Diploma Programme In Food & Safety" && $semester=="semester6"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}
						elseif($course=="Diploma Programme In Marketing Management" && $semester=="semester6"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}
						elseif($course=="Diploma Programme In Hotel Management" && $semester=="semester6"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}elseif($course=="Diploma Programme In HR" && $semester=="semester2"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}
						elseif($course=="Diploma Programme In Industrial Electronics" && $semester=="semester6"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}
						elseif($course=="Diploma Programme In Human Resource Management" && $semester=="semester6"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}
						elseif($course=="Diploma Programme in Human Resource Management" && $semester=="semester6"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}
						elseif($course=="Diploma Programme In Information Technology" && $semester=="semester6"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}elseif($course=="Diploma Programme In Inventory Management" && $semester=="semester1"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}elseif($course=="Diploma Programme In Logistic" && $semester=="semester1"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}elseif($course=="Diploma Programme In Logistic Management" && $semester=="semester2"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}
						elseif($course=="Diploma Programme In Mechanical Engineering" && $semester=="semester6"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}
						elseif($course=="P G Diploma In HR" && $semester=="semester2"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}
						elseif($course=="Diploma Programme in Metallurgical Engineering" && $semester=="semester6"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}elseif($course=="Diploma Programme In Printing Technology" && $semester=="semester6"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}elseif($course=="Diploma Programme In Project Management" && $semester=="semester2"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}elseif($course=="Diploma Programme In Rural Development" && $semester=="semester2"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}elseif($course=="Diploma Programme In Supply Chain Management" && $semester=="semester6"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}elseif($course=="Diploma Programme In Textile" && $semester=="semester6"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}elseif($course=="Diploma Programme In Tourism Management" && $semester=="semester2"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}
						elseif($course=="Diploma Progrmme in Instrumentation Engineering" && $semester=="semester6"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}
						elseif($course=="Diploma Programme In Logistics Management" && $semester=="semester6"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}
						elseif($course=="Executive Master In Business Administration" && $semester=="semester2"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}elseif($course=="Graduate Diploma In Automobile Engineering" && $semester=="semester6"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}elseif($course=="Graduate Diploma In Civil Engineering" && $semester=="semester6"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}elseif($course=="Graduate Diploma In Computer Science" && $semester=="semester6"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}elseif($course=="Graduate Diploma In Electronics & Telecommunication" && $semester=="semester6"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}elseif($course=="Graduate Diploma In Hotel Management" && $semester=="semester6"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}
						elseif($course=="Graduate Diploma In Information Technology" && $semester=="semester6"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}
						
						elseif($course=="Graduate Diploma In Mechanical Engineering" && $semester=="semester6"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}
						elseif($course=="Master Programme In Civil Engineering" && $semester=="semester4"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}
						elseif($course=="Master Programme in Business Administration" && $semester=="semester4"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}
						elseif($course=="Master Programme In Business Administration ( Marketing)" && $semester=="semester4"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}
						elseif($course=="Master Programme in Business Administration (Agri & Food Busi.)" && $semester=="semester4"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}
						elseif($course=="Master Programme In Business Administration (International Business and Marketing)" && $semester=="semester4"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}
						elseif($course=="Master Programme In Business Administration (Agricultural Business Management)" && $semester=="semester4"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}
						elseif($course=="Master Programme In Business Administration (information Technology & Operations Management)" && $semester=="semester4"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}
						elseif($course=="Master Programme In Business Administration (Materials Management)" && $semester=="semester4"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}
						elseif($course=="Master Programme In Business Administration (H.R & supply Chain Management)" && $semester=="semester4"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}
						elseif($course=="Master Programme In Business Administration (Construction Management)" && $semester=="semester4"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}elseif($course=="Master Programme in Business Administration (Digital Management)" && $semester=="semester4"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}elseif($course=="Master Programme In Business Administration (Finance & Marketing)" && $semester=="semester4"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}elseif($course=="Master Programme In Business Administration (Finance Management)" && $semester=="semester4"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}elseif($course=="Master Programme In Business Administration (General management)" && $semester=="semester4"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}elseif($course=="Master Programme In Business Administration (Hotel Management)" && $semester=="semester4"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}elseif($course=="Master Programme in Business Administration (Human Resources)" && $semester=="semester4"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}elseif($course=="Master Programme In Business Administration (Information Technology)" && $semester=="semester4"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}elseif($course=="Master Programme In Business Administration (International Business)" && $semester=="semester4"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}elseif($course=="Master Programme In Business Administration (Logistics,Supply chain & Marketing)" && $semester=="semester4"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}elseif($course=="Master Programme in Business Administration (Marketing Management)" && $semester=="semester4"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}elseif($course=="Master Programme in Business Administration (Oil & Gas)" && $semester=="semester4"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}
						if($course=="Master Programme in Business Administration (Operations & Supply Chain Management)" && $semester=="semester4"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}elseif($course=="Master Programme in Business Administration (Petroleum Industry)" && $semester=="semester4"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}elseif($course=="Master Programme in Business Administration (Pollution Control)" && $semester=="semester4"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}elseif($course=="Master Programme In Business Administration (Production & Operation Management)" && $semester=="semester4"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}elseif($course=="Master Programme In Business Administration (Project Management)" && $semester=="semester4"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}elseif($course=="Master Programme In Business Administration (Quality Management)" && $semester=="semester4"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}
						elseif($course=="Master Programme In Business Administration (Security Management)" && $semester=="semester4"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}
						elseif($course=="Master Programme In Business Administration In Dual Specializations (Supply,Operation and Logistics" && $semester=="semester4"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}
						elseif($course=="Master Programme In Business Administration (Store Management)" && $semester=="semester4"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}
						elseif($course=="Master Programme In Business Administration (finance & Supply Chain Management)" && $semester=="semester4"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}
						elseif($course=="Master Programme in Information Technology Engineering" && $semester=="semester4"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}
						elseif($course=="Master Programme In Business Administration (Sales & Marketing)" && $semester=="semester4"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}
						elseif($course=="Master Programme In Business Administration (Industrial Management)" && $semester=="semester4"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}
						elseif($course=="Master Programme In Business Administration (Supply Chain Management)" && $semester=="semester4"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}elseif($course=="Master Programme In Business Administration in Dual Specializations (Logistics,Supply chain & Marke" && $semester=="semester4"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}
						elseif($course=="Master Programme In Business Administration in Dual Specializations (Supply chain & logistics suppl" && $semester=="semester4"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}
						elseif($course=="Master Programme In Business Administration (Marketing Management & Operation Management)" && $semester=="semester4"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}
						elseif($course=="Master Programme In Business Administration In Dual Specializations (HR & finance management)" && $semester=="semester4"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}elseif($course=="Master Programme In Business Administration In Dual Specializations (HR & Marketing management)" && $semester=="semester4"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}elseif($course=="Master Programme In Business Administration In Dual Specializations (Marketing & Tourism Management)" && $semester=="semester4"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}elseif($course=="Master Programme In Business Administration In Dual Specializations (Material Management & Operation" && $semester=="semester4"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}elseif($course=="Master Programme In Business Administration(Marketing Mgmt & Production Operation Mgmt)" && $semester=="semester4"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}elseif($course=="Master Programme In Business Administration In Dual Specializations (Construction Management & Gener" && $semester=="semester4"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}elseif($course=="Master Programme In Business Administration (ECommerce)" && $semester=="semester4"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}elseif($course=="Master Programme In Business Administration In Dual Specializations (International Business & Market" && $semester=="semester4"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}elseif($course=="Master Programme In Business Administration In Dual Specializations (supply,operation & Logistics" && $semester=="semester4"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}elseif($course=="Master Programme In Business Administration ( Hotel & Human Resources Management)" && $semester=="semester4"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}
						elseif($course=="Master Programme In Business Administration (Finance & HR Management)" && $semester=="semester4"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}
						elseif($course=="Master Programme In Business Administration (Hospital Administration)" && $semester=="semester4"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}
						elseif($course=="Master Programme In Electrical & Electronics Engineering" && $semester=="semester4"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}
						elseif($course=="Master Programme in Electronics and Instrumentation Engineering" && $semester=="semester4"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}
						elseif($course=="Master Programme In Mechanical Engineering" && $semester=="semester4"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}
						elseif($course=="Master Programme in Electronics Engineering" && $semester=="semester4"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}
						elseif($course=="Master Programme In Business Administration (NGO & Project Management)" && $semester=="semester4"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}
						elseif($course=="Master Programme In Business Administration (international Business & information Technology)" && $semester=="semester4"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}
						
						elseif($course=="Master Programme In Business Administration (Store Management & Material Management)" && $semester=="semester4"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}
						elseif($course=="Master Programme In Business Administration (Logistics & Supply Chain Management)" && $semester=="semester4"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}
						elseif($course=="Master Programme In Business Management" && $semester=="semester4"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}elseif($course=="Master programme in Computer Application" && $semester=="semester6"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}elseif($course=="P G Diploma In Business Management" && $semester=="semester4"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}elseif($course=="P G Diploma In Computer Application" && $semester=="semester4"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}
						elseif($course=="P G Diploma In Electronics & Communication Engineering" && $semester=="semester4"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}
						elseif($course=="PG Diploma in Business Administration" && $semester=="semester2"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}
						elseif($course=="P G Diploma In Environment Management" && $semester=="semester2"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}elseif($course=="P G Diploma In Fire & Construction" && $semester=="semester2"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}elseif($course=="P G Diploma In Hospital & Health Management" && $semester=="semester2"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}elseif($course=="P G Diploma In Industrial And Environment Management" && $semester=="semester2"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}elseif($course=="P G Diploma In Industrial Safety" && $semester=="semester2"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}elseif($course=="P G Diploma In International Business" && $semester=="semester4"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}elseif($course=="P G Diploma in Project Management" && $semester=="semester2"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}elseif($course=="P G Diploma in Public Health" && $semester=="semester2"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}elseif($course=="P G Diploma In Rural Development" && $semester=="semester2"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}elseif($course=="P G Diploma In Security & Threat Control" && $semester=="semester2"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}elseif($course=="P G Diploma In Marketing Management" && $semester=="semester4"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}elseif($course=="P G Diploma In Information Technology Management" && $semester=="semester4"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}elseif($course=="P G Diploma in Finance" && $semester=="semester2"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}elseif($course=="Professional Diploma In Business Analytics" && $semester=="semester2"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}elseif($course=="Professional Diploma in Digital Marketing" && $semester=="semester2"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}elseif($course=="Professional Diploma In Financial Mathematics" && $semester=="semester2"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}elseif($course=="Professional Diploma In Graphic Designing" && $semester=="semester2"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}elseif($course=="Professional Diploma In Fashion Designing" && $semester=="semester2"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}elseif($course=="Professional Diploma In Financial Analytics" && $semester=="semester2"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}elseif($course=="Professional Diploma In Interior Designing" && $semester=="semester2"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						}elseif($course=="Professional Diploma In Tourism Management" && $semester=="semester2"){
							if($certelseificategrad>=70){
								 echo 'A+';
							}elseif($certelseificategrad>=60 && $certelseificategrad<=70){
								 echo 'A';
							}elseif($certelseificategrad>=40 && $certelseificategrad<=60){
								 echo 'B';
							}else{
							   echo 'Poor';
							}
						} else{ echo ''; }
					} else{
						echo $alreadygrade ;
					}	
					?>
					</td>
        		</tr>
            </table>
            <table style="margin-top:66px;margin-left:24px;">
                <tr>
        			<td style="padding-left: 440px;"><img src="data:image/gif;base64,<?php echo base64_encode($img);?>"></td>
        		</tr>
            </table>
            <table style="margin-top:47px;margin-left:20px;">
                <tr>
        			<td style="padding-left: 15px;font-size:21px"><?php echo $qerydata['certificated_deliver_date']; ?></td>
        		</tr>
            </table>
        </td>
    </tr>
</table>

<script>
	certificate
const highResImage = new Image();
highResImage.src = 'pdf-folder/iimsr-certificate.jpeg';
highResImage.onload = () => {
    document.getElementById('cmmImage').src = highResImage.src;
    document.getElementById('cmmImage').classList.add('loaded');
};

</script>
