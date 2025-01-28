<?php
error_reporting(0);
include("dbconnection.php");
include("include/header.php");
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;
if($_SESSION['role']=="super-admin"){

if(isset($_POST['emailsend'])){
    $eemail = $_POST['fetchemail'];
    $SendMarkspdf = $_POST['SendMarkspdf'];
    $semesterpdf = $_POST['semesterpdf'];
    $enrolment = $_POST['enrolment'];
    $to ='mahadeepsingh15@gmail.com';
    $from = 'documents@iimsr.net.in';
    $fromName = 'Imperial Institute of Management Science & Research';
    $subject = $semesterpdf.' Marks Card with Attachment by Imperial Institute of Management Science & Research';
    /*$file = "documents/".$SendMarkspdf.'.pdf';*/
    $file = "documents/".$SendMarkspdf;
    //print_r($file);exit;
    $htmlContent = '<h3>'.$semesterpdf.' Marks Card with Attachment by Imperial Institute of Management Science & Research</h3> <p>This email is sent from the Imperial Institute of Management Science & Research </p>';
    $headers = "From: $fromName"." <".$from.">";
    $semi_rand = md5(time());
    $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";
    $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\"";
    $message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" . "Content-Transfer-Encoding: 7bit\n\n" . $htmlContent . "\n\n";
    if(!empty($file) > 0){
        if(is_file($file)){
            $message .= "--{$mime_boundary}\n";
            $fp =    @fopen($file,"rb");
            $data =  @fread($fp,filesize($file));
            @fclose($fp);
            $data = chunk_split(base64_encode($data));
            $message .= "Content-Type: application/octet-stream; name=\"".basename($file)."\"\n" . "Content-Description: ".basename($file)."\n" . "Content-Disposition: attachment;\n" . " filename=\"".basename($file)."\"; size=".filesize($file).";\n" . "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";
        }
    }
    $message .= "--{$mime_boundary}--";
    $returnpath = "-f" . $from;
    mail($eemail, $subject, $message, $headers, $returnpath);
    mail('mahadeepsingh15@gmail.com', $subject, $message, $headers, $returnpath);
    $mail = @mail($to, $subject, $message, $headers, $returnpath);
    if($mail){
		$success = "<p class='OperationHas'>Thank You...! $enrolment - $semesterpdf Marks Card send Successfully!</p>";
	}else{
		$success = "<p class='AlreadyRegistered'>Oops...! Marks Card send failed</p>";
	}
}
?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Send Marks Card<small></small>
        <?php
			if (isset($_POST['emailsend'])){
				echo $success;
			}else {
				echo $success;
			}
		?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Send Marks Card</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="overflow-x:auto; margin-bottom: 20px; height:530px;">
    	        <table class="table table-hover no-more-tables" style="background-color: #fff;">
					<tr>
					    <th style="min-width: 150px;">Action</th>
					    <th style="min-width: 150px;">Enrolment</th>
					    <th style="min-width: 150px;">Semester</th>
						<th style="min-width: 150px;">Name</th>
						<th style="min-width: 150px;">Course</th>
					</tr>
					    <?php
    						$rowperpage = 30;
    						$row = 0;
    						if(isset($_POST['but_prev'])){
    							$row = $_POST['row'];
    							$row -= $rowperpage;
    							if( $row < 0 ){
    								$row = 0;
    							}
    						}
    						if(isset($_POST['but_next'])){
    							$row = $_POST['row'];
    							$allcount = $_POST['allcount'];
    							$val = $row + $rowperpage;
    							if( $val < $allcount ){
    								$row = $val;
    							}
    						}
    					?>
                        <?php
                            if(isset($_POST['search'])){
                                $serach = $_POST['valueToSearch'];
                                $query = mysqli_query($con,"SELECT * FROM `students_marks` WHERE CONCAT(`enrolment`,`semester`) LIKE '%".$serach."%'");
                            }
                            else{
                                $query = mysqli_query($con, "SELECT * FROM `students_marks`");
                            }
                            $num = mysqli_num_rows($query);
    						$sql = "SELECT COUNT(*) AS cntrows FROM students_marks";
    						$result = mysqli_query($con,$sql);
    						$fetchresult = mysqli_fetch_array($result);
    						$allcount = $fetchresult['cntrows'];
    						$sql = "SELECT * FROM students_marks ORDER BY ID ASC limit $row,".$rowperpage;
    						$result = mysqli_query($con,$sql);
    						$sno = $row + 1;
                            while($row = mysqli_fetch_array($query)){
                                $envl = $row['enrolment'];
                                $sem = $row['semester'];
                                
                                if($row['semester']=='semester1'){
                                    $Semest = "Semester 1";
                                }elseif($row['semester']=='semester2'){
                                    $Semest = "Semester 2";
                                }elseif($row['semester']=='semester3'){
                                    $Semest = "Semester 3";
                                }elseif($row['semester']=='semester4'){
                                    $Semest = "Semester 4";
                                }elseif($row['semester']=='semester5'){
                                    $Semest = "Semester 5";
                                }elseif($row['semester']=='semester6'){
                                    $Semest = "Semester 6";
                                }elseif($row['semester']=='semester7'){
                                    $Semest = "Semester 7";
                                }elseif($row['semester']=='semester8'){
                                    $Semest = "Semester 8";
                                }else{
                                    $Semest = $row['semester'];
                                }
                                $queryper = mysqli_query($con, "SELECT * FROM `register_here` where `enrolment`='$envl'");
                                $prdata = mysqli_fetch_array($queryper);
                                $queryjoin = mysqli_query($con,"SELECT sub.subject1,sub.subject2, sub.subject3,sub.subject4,sub.subject5, sub.subject6,sub.subject7,mark.subject1,mark.subject2,mark.subject3,mark.subject4,mark.subject5,mark.subject6,mark.subject7,mark.DownloadResult, mark.ResultStatus, marks.SendMarksCard FROM `semester_subject` AS sub INNER JOIN `students_marks` AS mark ON sub.enrolment = mark.enrolment WHERE mark.enrolment = '$envl' AND mark.semester = '$sem'");
                                $joineresut = mysqli_fetch_array($queryjoin);
                        ?>
					<tr>
					    <td>
						    <form action="" method="post" class="vbimt-search-form">
        					    <button type="submit" name="emailsend" class="btn btn-success btn-xs btn-block ActionButtonRa">Send <?php echo $Semest; ?> Marks Card</button>
        					    <input type="hidden" name="fetchemail" value="<?php echo $prdata['email']; ?>"/>
        					    <input type="hidden" name="semesterpdf" value="<?php echo $Semest; ?>"/>
        					    <input type="hidden" name="enrolment" value="<?php echo strtoupper($row['enrolment']); ?>"/>
        					    <input type="hidden" name="SendMarkspdf" value="<?php echo $row['SendMarksCard']; ?>"/>
    					    </form>
						</td>
						<td><b><?php echo strtoupper($row['enrolment']); ?></b></td>
						<td><?php echo $Semest; ?></td>
						<td><?php echo $prdata['name']; ?></td>
						<td><?php echo $prdata['course']; ?></td>
					</tr>
					<?php } ?>
		        </table>
            </div>
        </div>
    </section>
</div>
<script type="text/javascript">
    function printresultt(enrolment,semester,course){
        $.ajax({
            type: "post",
            url: "send-marks-card-ajax.php",
            data: {enrolment:enrolment,semester:semester,course:course},
            success: function(data){
                $('#printdataa').html(data);
                $("#printdataa").printMe({
                    "path" : ["result-print.css"]
                });
            }
        });
    }
</script>
<style>
    th {
        text-align: center;
    }
    td {
        text-align: center;
    }
</style>
<?php include("include/footer.php");?>
<?php }else {header("location: login.php");}?>