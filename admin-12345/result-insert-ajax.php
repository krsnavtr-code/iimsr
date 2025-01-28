<?php
error_reporting(0);
include("dbconnection.php");
    if (!empty($_SERVER['HTTP_CLIENT_IP'])){
        $ip_address = $_SERVER['HTTP_CLIENT_IP'];
    }elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip_address = $_SERVER['REMOTE_ADDR'];
    }
    session_start();
		
	$obtainedmark1 = (int) $_POST['obtainedmark1'];
	$obtainedmark2 = (int) $_POST['obtainedmark2'];
	$obtainedmark3 = (int) $_POST['obtainedmark3'];
	$obtainedmark4 = (int) $_POST['obtainedmark4'];
	
	$obtainedmark5 = 0;
	if(isset($_POST['obtainedmark5'])){
        	$obtainedmark5 = (int) $_POST['obtainedmark5'];
    }
    
	$obtainedmark6 = 0;
    if(isset($_POST['obtainedmark6'])){
        	$obtainedmark6 = (int) $_POST['obtainedmark6'];
    }

	$obtainedmark7 =0;
	$seme = $_POST['seme'];
	$seme =  str_replace(' ','',$seme);
	$seme = strtolower($seme);
	$course_name = $_POST['coursename'];
	$totalmax = $_POST['totalmax'];
	$totalmin = $_POST['totalmin'];
	$totalobt = $_POST['totalobt'];
	$year = $_POST['year'];
	$pasyearr = $_POST['pasyearr'];
	$Newvar=substr($pasyearr,2);
	$result = $_POST['result'];
	$passmonthyear = $_POST['passmonthyear'];
	$certificatedeliver = $_POST['certificatedeliver'];
	$certificatemonth = $_POST['certificatemonth'];
	$certificategrade = $_POST['certificategrade'];
	$subjectname = $_POST['subjectname'];
	$name = $_POST['name'];
	$lateral_entry="";
	
	if(isset($_POST['lateral_entr'])){
	  $lateral_entry = $_POST['lateral_entr'];
	}
	$subject2 ="";
	if(isset($_POST['subject2'])){
	  $subject2 = $_POST['subject2']; 
	}
	$subject3 ="";
	if(isset($_POST['subject3'])){
	  $subject3 = $_POST['subject3']; 
	}
	$subject4 ="";
	if(isset($_POST['subject4'])){
	  $subject4 = $_POST['subject4']; 
	}
	$subject5 ="";
	if(isset($_POST['subject5'])){
	  $subject5 = $_POST['subject5']; 
	}
	$subject6 ="";
	if(isset($_POST['subject6'])){
	  $subject6 = $_POST['subject6']; 
	}
	
	$subject7 = "";
	if(isset($_POST['subject7'])){
	  $subject7 = $_POST['subject7'];  
	}

    $date = strtotime($year);
    $new_date = strtotime('+ 1 year', $date);
    $setdate=date('Y', $new_date);
    $passoutyear="";
    
if($seme=="Semester1"){
	$passoutmountyear="Jan ".$setdate;
	$passoutyear=$setdate;
}elseif($seme=="Semester2"){
	$passoutmountyear="June ".$setdate;
	$passoutyear=$setdate;
}if($seme=="Semester3"){
    if($lateral_entry!=null){
        $new_date = strtotime('+ 1 year', $date);
	    $passoutmountyear="Jan ".date('Y', $new_date);
    }else{
    	$new_date = strtotime('+ 2 year', $date);
    	$passoutmountyear="Jan ".date('Y', $new_date);
    }
	$passoutyear=date('Y', $new_date);
}elseif($seme=="Semester4"){
    if($lateral_entry!=null){
    	$new_date = strtotime('+ 1 year', $date);
    	$passoutmountyear="June ".date('Y', $new_date);
    }else{
        $new_date = strtotime('+ 2 year', $date);
	    $passoutmountyear="June ".date('Y', $new_date);
    }
	$passoutyear=date('Y', $new_date);
}if($seme=="Semester5"){
    if($lateral_entry!=null){
    	$new_date = strtotime('+ 2 year', $date);
    	$passoutmountyear="Jan ".date('Y', $new_date);
    }else{
       $new_date = strtotime('+ 3 year', $date);
	    $passoutmountyear="Jan ".date('Y', $new_date); 
    }
	$passoutyear=date('Y', $new_date);
}elseif($seme=="Semester6"){
     if($lateral_entry!=null){
    	$new_date = strtotime('+ 2 year', $date);
    	$passoutmountyear="June ".date('Y', $new_date);
     }else{
        $new_date = strtotime('+ 3 year', $date);
	    $passoutmountyear="June ".date('Y', $new_date);
     }
	$passoutyear=date('Y', $new_date);
}if($seme=="Semester7"){
    if($lateral_entry!=null){
    	$new_date = strtotime('+ 3 year', $date);
    	$passoutmountyear="Jan ".date('Y', $new_date);
    }else{
        $new_date = strtotime('+ 4 year', $date);
	    $passoutmountyear="Jan ".date('Y', $new_date); 
    }
	$passoutyear=date('Y', $new_date);
}elseif($seme=="Semester8"){
    if($lateral_entry!=null){
    	$new_date = strtotime('+ 3 year', $date);
    	$passoutmountyear="June ".date('Y', $new_date);
    }else{
        $new_date = strtotime('+ 4 year', $date);
	    $passoutmountyear="June ".date('Y', $new_date);  
    }
	$passoutyear=date('Y', $new_date);
}
    
    //echo $passoutyear;
	$branch = $_POST['branch'];
	$enrolment = $_POST['enrolment'];
	$serial = (int) $_POST['serial'];
	$queryresult =	mysqli_query($con,"SELECT * FROM `students_marks` WHERE `semester`='$seme' and `enrolment`='$enrolment'");
	
    $numrows = mysqli_num_rows($queryresult);
    //sleep(3);
    if($numrows==0){
        $query1=mysqli_query($con ,"INSERT INTO `students_marks`(`serial_no`, `semester`, `enrolment`, `year`, `course`, `branch`, `subject1`, `subject2`, `subject3`, `subject4`, `subject5`, `subject6`, `subject7`, `total_max_marks`, `total_min_marks`, `total_obt_marks`,
        `stu_result`, `pass_month_year`, `certificated_deliver_date`, `certificate_month`, `certificate_grade`) VALUES ('$serial', '$seme', '$enrolment', '$Newvar', '$course_name', '$branch', '$obtainedmark1', '$obtainedmark2', '$obtainedmark3', '$obtainedmark4', '$obtainedmark5', '$obtainedmark6', '$obtainedmark7', '$totalmax', '$totalmin', '$totalobt', '$result', '$passmonthyear', '$certificatedeliver', '$certificatemonth', '$certificategrade')");

    	 if($query1){
        	 $query=mysqli_query($con ,"INSERT INTO `semester_subject`(`course`, `semester`, `enrolment`, `subject1`, `subject2`, `subject3`, `subject4`, `subject5`, `subject6`, `subject7`,
        	`total_max_marks`, `total_min_marks`, `total_obt_marks`, `result`) VALUES ('$course_name','$seme','$enrolment','$subjectname','$subject2','$subject3','$subject4','$subject5','$subject6','$subject7','$totalmax','$totalmin','$totalobt','$result')");
    	  /*-----------------------------------------------------*/
    	    sleep(3);
    	    if($query){
                    $dadtmani = "<table style='border: #0b0ce4 1px solid;border-radius: 9px;padding: 10px 10px 10px 10px;'>
                            <tr>
                                <td>
                                    <tr style='border-radius: 83px 45px 45px 45px;padding: 18px 0px 32px 0px;'>
                                        <td style='padding: 5px 0px 5px 5px;width: 90px;'>Name</td>
                                        <td style='padding: 5px 5px 5px 5px;'>".$name."</td>
                                    </tr>
                                    <tr style='border-radius: 83px 45px 45px 45px;background-color: #0000001f;padding: 18px 0px 32px 0px;'>
                                        <td style='padding: 5px 0px 5px 5px;width: 90px;'>Course Name</td>
                                        <td style='padding: 5px 5px 5px 5px;'>".$course_name."</td>
                                    </tr> 
                                    <tr style='border-radius: 83px 45px 45px 45px;padding: 18px 0px 32px 0px;'>
                                        <td style='padding: 5px 0px 5px 5px;width: 90px;'>Enrolment No.</td>
                                        <td style='padding: 5px 0px 5px 5px;'>".$enrolment."</td>
                                    </tr> 
                                    <tr style='border-radius: 83px 45px 45px 45px;background-color: #0000001f;padding: 18px 0px 32px 0px;'>
                                        <td style='padding: 5px 0px 5px 5px;width: 90px;'>Semester</td>
                                        <td style='padding: 5px 0px 5px 5px;'>".$seme."</td>
                                    </tr>    
                                    <tr style='border-radius: 83px 45px 45px 45px;padding: 18px 0px 32px 0px;'>    
                                        <td style='padding: 5px 0px 5px 5px;width: 90px;color:#ff0000;font-weight:700;'>Logged In System IP</td>
                                        <td style='padding: 5px 0px 5px 5px;color:#ff0000;font-weight:700;'>".$ip_address."</td>
                                    </tr>
                                    <tr style='border-radius: 83px 45px 45px 45px;padding: 18px 0px 32px 0px;'>    
                                        <td style='padding: 5px 0px 5px 5px;width: 90px;color:#ff0000;font-weight:700;'>Year</td>
                                        <td style='padding: 5px 0px 5px 5px;color:#ff0000;font-weight:700;'>".$pasyearr."</td>
                                    </tr>
                                </td>
                            </tr>    
                        </table>
                        <a href='vbimt.org.in' style='text-decoration:none;'><p><span style='color:#0000fd;font-weight:700;text-align:justify;'>Your result submit in VBIMT has been done, we will update you shortly.</span> <span style='color:#fd0000;font-weight:700;'>Kindly deposit your fees in VIDYA BHARATI INSTITUTE OF MANAGEMENT & TECHNOLOGY account only, any fee deposited in any other account EXCEPT VBIMT will not be considered.</span></p></a>
                        <img src='vbimt.org.in/assets/images/logo.png' style='width: 255px; height: 70px;'>
                        <p>
                        <span style='color:#500050'>For Admission : </span><strong style='color:#000026'>9891030303</strong><br>
                        <span style='color:#500050'>For Verification &amp; Fee : </span><strong style='color:#000026'>9266585858</strong><br>
                        <span style='color:#500050'>Email: </span><strong style='color:#000026'><a href='mailto:registration@vbimt.org.in' rel='noreferrer' target='_blank'>subject@vbimt.org.in</a></strong><br>
                        <span style='color:#500050'>Website : </span><a href='http://vbimt.org.in' style='text-decoration:none' rel='noreferrer' target='_blank' data-saferedirecturl='https://www.google.com/url?q=http://vbimt.org.in&amp;source=gmail&amp;ust=1591852093685000&amp;usg=AFQjCNHDR5wbJRaaq0RfkyBNWK71E_kyOA'><strong>www.vbimt.org.in</strong></a> .
                        </p>";
                    //echo $dadtmani;exit;
                    $subject = "Result Submit Successfully & IP Address";
                    $headers = array("From: subject@vbimt.org.in",
                    "Reply-To: replyto@vbimt.org.in",
                    "X-Mailer: PHP/" . PHP_VERSION,
                    "Content-type: text/html; charset=iso-8859-1"
                );
                $headers = implode("\r\n", $headers);
                mail('anand24h@gmail.com',$subject,$dadtmani,$headers);
        }
    	  /*-----------------------------------------------------*/
    	  
    	  if($query){
    	    echo "Data has been submitted successfully";   
    	  }else{
    	      echo"some went wrong";
    	  }
    	}else{
    	    echo"marks are not valid";
        }
    }else{
        echo "This user's same semseter data already submitted "; 
    }
?>