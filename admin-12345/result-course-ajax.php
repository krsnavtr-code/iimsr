<?php
error_reporting(0);
include('checklogin.php');
include("dbconnection.php");

$sem = $_POST['selebox'];
$course = $_POST['coursename'];
$branch = $_POST['branch'];
$year = $_POST['year'];
$pasyearr = $_POST['pasyearr'];
$enrolment = $_POST['enrolment'];
$lateral_entry = $_POST['lateral_entr'];
$passwordyear="";

$query = mysqli_query($con, "SELECT * FROM `course` WHERE `semester` = '$sem' AND `course` = '$course' AND `branch`='$branch'");
$row = mysqli_fetch_array($query);
$sem6 = "";
if(isset($row['subject6'])){
   $sem6 = $row['subject6']; 
}
$res = array("subject1" => $row['subject1'], "subject2" => $row['subject2'],"subject3" => $row['subject3'],
"subject4" => $row['subject4'], "subject5" => $row['subject5'], "subject6" => $sem6, "max_mark" => $row['max_mark'], "min_mark" => $row['min_mark']); 

$passoutmountyear="";
$passoutyear="";

$date = strtotime($year);
$new_date = strtotime('+ 1 year', $date);
$setdate=date('Y', $new_date);

if($sem=="Semester1"){
	$passoutmountyear="Jan ".$setdate;
	$passoutyear=$setdate;
}elseif($sem=="Semester2"){
	$passoutmountyear="June ".$setdate;
	$passoutyear=$setdate;
}if($sem=="Semester3"){
    if($lateral_entry!=null){
        $new_date = strtotime('+ 1 year', $date);
	    $passoutmountyear="Jan ".date('Y', $new_date);
    }else{
    	$new_date = strtotime('+ 2 year', $date);
    	$passoutmountyear="Jan ".date('Y', $new_date);
    }
	$passoutyear=date('Y', $new_date);
}elseif($sem=="Semester4"){
    if($lateral_entry!=null){
    	$new_date = strtotime('+ 1 year', $date);
    	$passoutmountyear="June ".date('Y', $new_date);
    }else{
        $new_date = strtotime('+ 2 year', $date);
	    $passoutmountyear="June ".date('Y', $new_date);
    }
	$passoutyear=date('Y', $new_date);
}if($sem=="Semester5"){
    if($lateral_entry!=null){
    	$new_date = strtotime('+ 2 year', $date);
    	$passoutmountyear="Jan ".date('Y', $new_date);
    }else{
       $new_date = strtotime('+ 3 year', $date);
	    $passoutmountyear="Jan ".date('Y', $new_date); 
    }
	$passoutyear=date('Y', $new_date);
}elseif($sem=="Semester6"){
     if($lateral_entry!=null){
    	$new_date = strtotime('+ 2 year', $date);
    	$passoutmountyear="June ".date('Y', $new_date);
     }else{
        $new_date = strtotime('+ 3 year', $date);
	    $passoutmountyear="June ".date('Y', $new_date);
     }
	$passoutyear=date('Y', $new_date);
}if($sem=="Semester7"){
    if($lateral_entry!=null){
    	$new_date = strtotime('+ 3 year', $date);
    	$passoutmountyear="Jan ".date('Y', $new_date);
    }else{
        $new_date = strtotime('+ 4 year', $date);
	    $passoutmountyear="Jan ".date('Y', $new_date); 
    }
	$passoutyear=date('Y', $new_date);
}elseif($sem=="Semester8"){
    if($lateral_entry!=null){
    	$new_date = strtotime('+ 3 year', $date);
    	$passoutmountyear="June ".date('Y', $new_date);
    }else{
        $new_date = strtotime('+ 4 year', $date);
	    $passoutmountyear="June ".date('Y', $new_date);  
    }
	$passoutyear=date('Y', $new_date);
}
/****************************************************/


if($course=="Advance Diploma In Business Administration" && $sem=="Semester2"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Advance Diploma In Civil Engineering" && $sem=="Semester2"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Advance Diploma In Computer Science Engineering" && $sem=="Semester2"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Advance Diploma in Electrical Engineering" && $sem=="Semester2"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Advance Diploma in H.R. Management" && $sem=="Semester2"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Advance Diploma In Hardware & Networking Technology" && $sem=="Semester2"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Bachelor Programme In Animation And Multimedia Technology" && $sem=="Semester6"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Bachelor Programme in Automobile Engineering" && $sem=="Semester8"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Bachelor Programme In Business Administration" && $sem=="Semester6"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Bachelor Programme In Chemical Engineering" && $sem=="Semester8"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Bachelor Programme in Civil Engineering" && $sem=="Semester8"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Bachelor Programme In Computer Applications" && $sem=="Semester6"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Bachelor Programme In Computer Science Engineering" && $sem=="Semester8"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Bachelor Programme In Electrical & Electronics Engineering" && $sem=="Semester8"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Bachelor Programme In Electrical Engineering" && $sem=="Semester8"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Bachelor Programme in Electronics & Communication Engineering" && $sem=="Semester8"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Bachelor Programme In Electronics & Telecommunication Engineering" && $sem=="Semester8"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Bachelor Programme in Electronics Engineering" && $sem=="Semester8"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Bachelor Programme In Fire & Safety Engineering" && $sem=="Semester8"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Bachelor Programme In Food & Nutrition" && $sem=="Semester8"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Bachelor Programme In Food Technology" && $sem=="Semester8"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Bachelor Programme in Information Technology" && $sem=="Semester8"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Bachelor Programme In Instrumentation Engineering" && $sem=="Semester8"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Bachelor Programme in Mechanical Engineering" && $sem=="Semester8"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Bachelor Programme In Metallurgical Engineering" && $sem=="Semester8"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Bachelor Programme In Polymer Engineering" && $sem=="Semester8"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Bachelor programme In Print Technology Management" && $sem=="Semester8"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Bachelor Programme In Textile Engineering" && $sem=="Semester8"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Certificate Programme In Civil Engineering" && $sem=="Semester1"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Certificate Programme In Librarian" && $sem=="Semester1"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Certificate Programme In Project Management" && $sem=="Semester2"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Diploma in Electrical Engineering" && $sem=="Semester6" || $sem=="Semester4"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
/*elseif($course=="Diploma in Electrical Engineering" && $sem=="Semester4"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}*/
elseif($course=="Diploma in Human Resource Management" && $sem=="Semester2"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Diploma In Industrial Safety" && $sem=="Semester2"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}

elseif($course=="Diploma In Industrial Safety 3 Year" && $sem=="Semester6"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Diploma In Industrial Safety 6 Month" && $sem=="Semester1"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}

elseif($course=="Diploma In Material Management 2 Year" && $sem=="Semester6"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Diploma In Operation Management" && $sem=="Semester4"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Diploma Programme In Automobile Engineering" && $sem=="Semester6"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Diploma Programme in Chemical Engineering" && $sem=="Semester6"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Diploma Programme In Civil Engineering" && $sem=="Semester6"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Diploma Programme In Computer Applications" && $sem=="Semester2"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Diploma Programme In Computer Science Engineering" && $sem=="Semester6"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Diploma Programme In Disaster Management" && $sem=="Semester4"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Diploma Programme In Electrical & Electronics Engineering" && $sem=="Semester6"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Diploma Programme in Electrical Engineering" && $sem=="Semester6"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Diploma Programme In Electronics & Communication Engineering" && $sem=="Semester6"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Diploma Programme In Electronics & Telecommunication" && $sem=="Semester6"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Diploma Programme In Electronics Engineering" && $sem=="Semester6"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Diploma Programme In Finance Management" && $sem=="Semester2"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Diploma Programme In Fire & Safety" && $sem=="Semester2"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Diploma Programme In Food & Safety" && $sem=="Semester6"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Diploma Programme In Hotel Management" && $sem=="Semester6"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Diploma Programme In HR" && $sem=="Semester2"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Diploma Programme In Industrial Electronics" && $sem=="Semester6"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Diploma Programme In Information Technology" && $sem=="Semester6"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Diploma Programme In Inventory Management" && $sem=="Semester1"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Diploma Programme In Logistic" && $sem=="Semester1"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Diploma Programme In Logistic Management" && $sem=="Semester2"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Diploma Programme In Mechanical Engineering" && $sem=="Semester6"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Diploma Programme In Mechanical Engineering" && $sem=="Semester4"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Diploma Programme in Metallurgical Engineering" && $sem=="Semester6"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Diploma Programme In Printing Technology" && $sem=="Semester6"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Diploma Programme In Project Management" && $sem=="Semester2"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Diploma Programme In Rural Development" && $sem=="Semester2"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Diploma Programme In Supply Chain Management" && $sem=="Semester6"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Diploma Programme In Textile" && $sem=="Semester4"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Diploma Programme In Tourism Management" && $sem=="Semester2"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Executive Master In Business Administration" && $sem=="Semester2"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Graduate Diploma In Automobile Engineering" && $sem=="Semester6"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Graduate Diploma In Civil Engineering" && $sem=="Semester6"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Graduate Diploma In Computer Science" && $sem=="Semester6"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Graduate Diploma In Electronics & Telecommunication" && $sem=="Semester6"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Graduate Diploma In Hotel Management" && $sem=="Semester6"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Graduate Diploma In Information Technology" && $sem=="Semester6"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Graduate Diploma In Mechanical Engineering" && $sem=="Semester6" || $sem=="Semester4"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Master Programme in Business Administration" && $sem=="Semester4"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Master Programme In Business Administration ( Marketing)" && $sem=="Semester4"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Master Programme in Business Administration (Agri & Food Busi.)" && $sem=="Semester4"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Master Programme In Business Administration (Agricultural Business Management)" && $sem=="Semester4"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Master Programme In Business Administration (Construction Management)" && $sem=="Semester4"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Master Programme in Business Administration (Digital Management)" && $sem=="Semester4"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Master Programme In Business Administration (Finance & Marketing)" && $sem=="Semester4"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Master Programme In Business Administration (Finance Management)" && $sem=="Semester4"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Master Programme In Business Administration (Finance & HR Management)" && $sem=="Semester4"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Master Programme In Business Administration (General management)" && $sem=="Semester4"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Master Programme In Business Administration (Hotel Management)" && $sem=="Semester4"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Master Programme in Business Administration (Human Resources)" && $sem=="Semester4"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Master Programme In Business Administration (Information Technology)" && $sem=="Semester4"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Master Programme in Business Administration (International Business)" && $sem=="Semester4"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Master Programme In Business Administration (Logistics,Supply chain & Marketing)" && $sem=="Semester4"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Master Programme in Business Administration (Marketing Management)" && $sem=="Semester4"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Master Programme in Business Administration (Oil & Gas)" && $sem=="Semester4"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Master Programme in Business Administration (Operations & Supply Chain Management)" && $sem=="Semester4"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Master Programme in Business Administration (Petroleum Industry)" && $sem=="Semester4"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Master Programme in Business Administration (Pollution Control)" && $sem=="Semester4"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Master Programme In Business Administration (Production & Operation Management)" && $sem=="Semester4"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Master Programme In Business Administration (Project Management)" && $sem=="Semester4"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Master Programme In Business Administration (Quality Management)" && $sem=="Semester4"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Master Programme In Business Administration (Security Management)" && $sem=="Semester4"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Master Programme In Business Administration (Supply Chain Management)" && $sem=="Semester4"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Master Programme In Business Administration in Dual Specializations (Logistics,Supply chain & Marke" && $sem=="Semester4"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Master Programme In Business Administration in Dual Specializations (Supply chain & logistics suppl" && $sem=="Semester4"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Master Programme In Business Administration In Dual Specializations (HR & finance management)" && $sem=="Semester4"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Master Programme In Business Administration In Dual Specializations (HR & Marketing management)" && $sem=="Semester4"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Master Programme In Business Administration In Dual Specializations (Construction Management & Gener" && $sem=="Semester4"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Master Programme In Business Administration In Dual Specializations (Material Management & Operation" && $sem=="Semester4"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Master Programme In Business Administration(Marketing Mgmt & Production Operation Mgmt)" && $sem=="Semester4"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Master Programme In Business Administration (ECommerce)" && $sem=="Semester4"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}

elseif($course=="Master Programme In Business Administration In Dual Specializations (International Business & Market" && $sem=="Semester4"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Master Programme In Business Administration In Dual Specializations (Marketing & Tourism Management)" && $sem=="Semester4"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Master Programme In Business Administration In Dual Specializations (supply,operation & Logistics" && $sem=="Semester4"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}

elseif($course=="Master Programme In Business Administration ( Hotel & Human Resources Management)" && $sem=="Semester4"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Master Programme In Business Administration (NGO & Project Management)" && $sem=="Semester4"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Master Programme In Business Administration (Hospital Administration)" && $sem=="Semester4"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Master Programme In Business Administration (international Business & Information Technology)" && $sem=="Semester4"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Master Programme In Business Management" && $sem=="Semester4"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Master programme in Computer Application" && $sem=="Semester6"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="P G Diploma In Business Management" && $sem=="Semester4"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="P G Diploma In Computer Application" && $sem=="Semester4"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="P G Diploma In Environment Management" && $sem=="Semester2"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="P G Diploma In Fire & Construction" && $sem=="Semester2"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="P G Diploma In Hospital & Health Management" && $sem=="Semester2"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="P G Diploma In Industrial And Environment Management" && $sem=="Semester2"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="P G Diploma In Industrial Safety" && $sem=="Semester2"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="P G Diploma In International Business" && $sem=="Semester4"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="P G Diploma in Project Management" && $sem=="Semester2"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="P G Diploma in Public Health" && $sem=="Semester2"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="P G Diploma In Rural Development" && $sem=="Semester2"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="P G Diploma In Security & Threat Control" && $sem=="Semester2"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Professional Diploma In Business Analytics" && $sem=="Semester2"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Professional Diploma in Digital Marketing" && $sem=="Semester2"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Professional Diploma In Fashion Designing" && $sem=="Semester2"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Professional Diploma In Financial Analytics" && $sem=="Semester2"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Professional Diploma In Financial Mathematics" && $sem=="Semester2"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Professional Diploma In Graphic Designing" && $sem=="Semester2"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Professional Diploma In Interior Designing" && $sem=="Semester2"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
elseif($course=="Professional Diploma In Tourism Management" && $sem=="Semester2"){
	$Sep = "Sep";
	$dfgf = "July";
	$fdgfdg = $passoutyear;
	$namfffe = $Sep." ".$fdgfdg;
}
else{
	$dfgf = "";
	$Sep = "";
}
/****************************************************/
/*echo json_encode($res);  */
$totalmax =0;
$totalmin = 0;
?>
<form action="" method="post" >
	<?php   //echo $passoutyear;
		if(!empty($row['subject1'])){
		$totalmax += 100; 
		$totalmin +=40;
	?>
	<div class="row" id="selectBox">
		<div class="col-sm-1 col-md-1 col-lg-1 col-xs-12"><label>S.No. :</label>
			<input type="text" value="1" class="form-control" id="sno1">
		</div>
		<div class="col-sm-3 col-md-3 col-lg-3 col-xs-12"><label>Subject Name :</label>
			<input type="text" value="<?php echo $row['subject1']; ?>" name="subjectname" class="form-control" id="subjectname">
		</div>
		<div class="col-sm-2 col-md-2 col-lg-2 col-xs-12"><label>Maximum Mark :</label>
			<input type="text" value="100" name="maximummark" class="form-control" id="maxmark1">
		</div>
		<div class="col-sm-2 col-md-2 col-lg-2 col-xs-12"><label>Minimum Mark :</label>
			<input type="text" value="40" name="minimummark" class="form-control" id="minmark1">
		</div>
		<div class="col-sm-2 col-md-2 col-lg-2 col-xs-12"><label>Obtained Mark :</label>
			<input type="text" value="" name="obtainedmark1"class="form-control" id="obtainedmark1" onkeyup="mycalculatenumber1()">
		</div>
		<div class="col-sm-2 col-md-2 col-lg-2 col-xs-12"><label>Total (In Word) :</label>
			<input type="total" class="form-control" id="total1">
		</div>
	</div>
	<?php } ?>
	<?php 
		if(!empty($row['subject2'])){ 
		$totalmax += 100; 
		$totalmin +=40;
	?>
	<div class="row" id="selectBox">
		<div class="col-sm-1 col-md-1 col-lg-1 col-xs-12">
			<input type="text" name="sno" class="form-control" id="sno2" value="2">
		</div>
		<div class="col-sm-3 col-md-3 col-lg-3 col-xs-12">
			<input type="text" value="<?php echo $row['subject2']; ?>" name="subjectname" class="form-control" id="subject2">
		</div>
		<div class="col-sm-2 col-md-2 col-lg-2 col-xs-12">
			<input type="text" value="100" name="maximummark" class="form-control" id="maxmark2">
		</div>
		<div class="col-sm-2 col-md-2 col-lg-2 col-xs-12">
			<input type="text" value="40" name="minimummark" class="form-control" id="minmark2" >
		</div>
		<div class="col-sm-2 col-md-2 col-lg-2 col-xs-12">
			<input type="text" name="obtainedmark2" class="form-control" id="obtainedmark2" onkeyup="mycalculatenumber2()">
		</div>
		<div class="col-sm-2 col-md-2 col-lg-2 col-xs-12">
			<input type="text" name="total" class="form-control"  id="total2">
		</div>				
	</div>
	<?php } ?>
	<?php 
		if(!empty($row['subject3'])){ 
		$totalmax += 100; 
		$totalmin +=40;
	?>
	<div class="row" id="selectBox">
		<div class="col-sm-1 col-md-1 col-lg-1 col-xs-12">
			<input type="text" name="sno" class="form-control" id="sno3" value="3">
		</div>
		<div class="col-sm-3 col-md-3 col-lg-3 col-xs-12">
			<input type="text" name="subjectname" value="<?php echo $row['subject3']; ?>" class="form-control" id="subject3">
		</div>
		<div class="col-sm-2 col-md-2 col-lg-2 col-xs-12">
			<input type="text" value="100" name="maximummark" class="form-control" id="maxmark3">
		</div>
		<div class="col-sm-2 col-md-2 col-lg-2 col-xs-12">
			<input type="text" value="40" name="minimummark" class="form-control" id="minmark3">
		</div>
		<div class="col-sm-2 col-md-2 col-lg-2 col-xs-12">
			<input type="text" name="obtainedmark" class="form-control" id="obtainedmark3" onkeyup="mycalculatenumber3()">
		</div>
		<div class="col-sm-2 col-md-2 col-lg-2 col-xs-12">
			<input type="total" name="total" class="form-control" id="total3">
		</div>				
	</div>
	<?php } ?>
	<?php 
		if(!empty($row['subject4'])){ 
		$totalmax += 100; 
		$totalmin +=40;
	?>
	<div class="row" id="selectBox">
		<div class="col-sm-1 col-md-1 col-lg-1 col-xs-12">
			<input type="text" class="form-control" id="sno4" value="4">
		</div>
		<div class="col-sm-3 col-md-3 col-lg-3 col-xs-12">
			<input type="text" name="subjectname" value="<?php echo $row['subject4']; ?>" class="form-control" id="subject4">
		</div>
		<div class="col-sm-2 col-md-2 col-lg-2 col-xs-12">
			<input type="text" value="100" name="maximummark" class="form-control" id="maxmark4">
		</div>
		<div class="col-sm-2 col-md-2 col-lg-2 col-xs-12">
			<input type="text" value="40" name="minimummark" class="form-control" id="minmark4">
		</div>
		<div class="col-sm-2 col-md-2 col-lg-2 col-xs-12">
			<input type="text" name="obtainedmark" class="form-control" id="obtainedmark4" onkeyup="mycalculatenumber4()">
		</div>
		<div class="col-sm-2 col-md-2 col-lg-2 col-xs-12">
			<input type="text" name="total" class="form-control" id="total4">
		</div>				
	</div>
	<?php } ?>
	<?php 
		if(!empty($row['subject5'])){ 
		$totalmax += 100; 
		$totalmin +=40;
	?>
	<div class="row" id="selectBox">
		<div class="col-sm-1 col-md-1 col-lg-1 col-xs-12">
			<input type="text" name="sno" class="form-control" id="sno5" value="5">
		</div>
		<div class="col-sm-3 col-md-3 col-lg-3 col-xs-12">
			<input type="text" name="subjectname" class="form-control" id="subject5" value="<?php echo $row['subject5']; ?>">
		</div>
		<div class="col-sm-2 col-md-2 col-lg-2 col-xs-12">
			<input type="text" value="100" name="maximummark" class="form-control" id="maxmark5">
		</div>
		<div class="col-sm-2 col-md-2 col-lg-2 col-xs-12">
			<input type="text" value="40" name="minimummark" class="form-control" id="minmark5">
		</div>
		<div class="col-sm-2 col-md-2 col-lg-2 col-xs-12">
			<input type="text" name="obtainedmark5" class="form-control" id="obtainedmark5" onkeyup="mycalculatenumber5()">
		</div>
		<div class="col-sm-2 col-md-2 col-lg-2 col-xs-12">
			<input type="text" name="total" class="form-control" id="total5">
		</div>				
	</div>
	<?php } ?>
	<?php 
		if(!empty($row['subject6'])){ 
		$totalmax += 100; 
		$totalmin +=40;
	?>
	<div class="row" id="selectBox">
		<div class="col-sm-1 col-md-1 col-lg-1 col-xs-12">
			<input type="text" name="sno" class="form-control" id="sno6" value="6">
		</div>
		<div class="col-sm-3 col-md-3 col-lg-3 col-xs-12">
			<input type="text" name="subjectname" class="form-control" id="subject6" value="<?php echo $row['subject6']; ?>">
		</div>
		<div class="col-sm-2 col-md-2 col-lg-2 col-xs-12">
			<input type="text" value="100" name="maximummark6" class="form-control" id="maxmark6">
		</div>
		<div class="col-sm-2 col-md-2 col-lg-2 col-xs-12">
			<input type="text" value="40" name="minimummark6" class="form-control" id="minmark6">
		</div>
		<div class="col-sm-2 col-md-2 col-lg-2 col-xs-12">
			<input type="text" name="obtainedmark6" class="form-control" id="obtainedmark6" onkeyup="mycalculatenumber6()">
		</div>
		<div class="col-sm-2 col-md-2 col-lg-2 col-xs-12">
			<input type="text" name="total" class="form-control" id="total6">
		</div>
	</div>
	<?php } ?>
   <div class="row">
	    <div class="col-sm-2 col-md-2 col-lg-2 col-xs-12"></div>
		<div class="col-sm-2 col-md-2 col-lg-2 col-xs-12"></div>
		<div class="col-sm-2 col-md-2 col-lg-2 col-xs-12"><label>Total Max Mark :</label>
			<input type="text" name="totalmax" class="form-control" id="totalmax" value="<?php echo $totalmax; ?>">
		</div>
		<div class="col-sm-2 col-md-2 col-lg-2 col-xs-12"><label>Total Min Mark :</label>
			<input type="text" name="totalmin" class="form-control" id="totalmin" value="<?php echo $totalmin; ?>">
		</div>
		<div class="col-sm-2 col-md-2 col-lg-2 col-xs-12"><label>Total Obt Mark :</label>
			<input type="text" name="totalobt" class="form-control" id="totalobt">
		</div>
		<div class="col-sm-2 col-md-2 col-lg-2 col-xs-12"><label>Total Obt Mark Word :</label>
			<input type="text" class="form-control" id="totalobtword">
		</div>		
   </div>
	<div class="row">
		<div class="col-sm-4 col-md-4 col-lg-4 col-xs-12"><label>Result :</label>
			<input type="text" name="result" class="form-control" id="result" value="Pass" required>
			<input type="hidden" name="result" class="form-control" id="fetch_r_date" required>
			<input type="hidden" name="result" class="form-control" id="fetch_selector_semeter" required>
		</div>
		<div class="col-sm-4 col-md-4 col-lg-4 col-xs-12"><label>Pass Month Year :</label>
			<input type="text" name="passmonthyear" class="form-control" id="passmonthyear" value="<?php echo $passoutmountyear; ?>" required>
		</div>			
		<div class="col-sm-4 col-md-4 col-lg-4 col-xs-12"><label>Year :</label>
			<input type="hidden" name="pasyearr" id="pasyearr" value="<?php echo $passoutyear; ?>">
			<input type="text" name="year" class="form-control" id="year" value="<?php echo $passoutyear; ?>" required>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-4 col-md-4 col-lg-4 col-xs-12"><label>Certificate Deliver Date :</label>
			<input type="text" name="certificatedeliver" class="form-control" value="<?php echo $namfffe; ?>" id="certificatedeliver">
		</div>
		<div class="col-sm-4 col-md-4 col-lg-4 col-xs-12"><label>Certificate Month :</label>
			<input type="text" name="certificatemonth" class="form-control" value="<?php echo $dfgf; ?>" id="certificatemonth">
		</div>			
		<div class="col-sm-4 col-md-4 col-lg-4 col-xs-12"><label>Certificate Grade :</label>
			<input type="text"  name="certificategrade" class="form-control" id="certificategrade">
		</div>
	</div>
	<div class="row">
		<div class="col-sm-3 col-md-3 col-lg-3 col-xs-12"></div>
		<div class="col-sm-3 col-md-3 col-lg-3 col-xs-12">
			<button type="button" name="submit" class="btn btn-block btn-success btn-flat" style="margin: 24px 10px 0px 0px;" onclick="OnSubmit()">Submit</button>
		</div>
		<div class="col-sm-3 col-md-3 col-lg-3 col-xs-12">
			<button type="button" class="btn btn-block btn-warning btn-flat" style="margin: 24px 10px 0px 0px;">Cancel</button>
		</div>
	</div>
</form>