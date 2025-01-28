<?php

error_reporting(0);

include('checklogin.php');

include("dbconnection.php");

include("include/header.php");

require_once 'dompdf/autoload.inc.php';

use Dompdf\Dompdf;

if($_SESSION['role'] == "docs-verification" || $_SESSION['role']=="super-admin"){

if(isset($_POST['applysubmit'])){

    $enrolment = $_POST['enrolment'];

    $sname = strtoupper($_POST['sname']);

    $email = $_POST['email'];

    $dobs = $_POST['dobs'];

    $fathername = $_POST['fathername'];

    $coursename = $_POST['coursename'];

    $semestern = $_POST['semestern'];

    $session = $_POST['session'];

    $simage = $_POST['stuimage'];

    /*$ownerimage = $_POST['ownersign'];*/

    $dateofexami = $_POST['dateofexami'];

    $vbimtuniquecode = $_POST['vbimtuniquecode'];

    $query = mysqli_query($con,"INSERT INTO `admit_card`(`sname`, `enrolment`, `father_name`, `sdob`, `stuimage`, `course`, `session`, `semester`, `date_of_exami`, `exami_unique_code`) VALUES ('$sname', '$enrolment', '$fathername','$dobs', '$simage', '$coursename', '$session', '$semestern','$dateofexami','$vbimtuniquecode')");

    $fghfghfgh = 'images/'.$simage ;

    $top='images/finalimageheader.png';

    $tfop='images/finalimagefooter.png';

    if(empty($simage)){

        $html = "<img src='$top' alt='leter' style='height: 220px; width: 100%;'/>

            <center><table width='95%' style='margin-right: 80px;margin-left:73px;border-collapse: collapse;color:#000;'align='center'>

            <tr><th colspan='3' style='padding:10px;font-size:18px;'>Admit Card - 2022-23</th></tr>

            <tr>

                <td colspan='3' style='padding:10px;font-size:18px;'><b>Enrolment No. :</b> $enrolment</td>

                <td style='padding:10px;font-size:18px;'><b>Name :</b> $sname</td>

            </tr>

            <tr>

                <td style='padding:10px;font-size:18px;'><b>Fathers Name :</b> $fathername</td>

                <td style='padding:10px;font-size:18px;'><b>Date Of Birth :</b> $dobs</td>

                <td rowspan='4'><img src='$fghfghfgh' alt='Student image'></td>

            </tr>

            <tr>

                <td style='padding:10px;font-size:18px;'><b>Course Name :</b> $coursename</td>

                <td style='padding:10px;font-size:18px;'><b>Semester :</b> $semestern</td>

            </tr>

            <tr>

                <td style='padding:10px;font-size:18px;'><b>Date Of Examination :</b>$dateofexami</td>

                <td style='padding:10px;font-size:18px;'><b>Session :</b> $session</td>

            </tr>

            <tr>

                <td style='padding:10px;font-size:18px;' colspan='2'><b>Examination Code :</b> $vbimtuniquecode</td>

            </tr>

        </table></center><img src='$tfop' alt='leter' style='height: 110px; width: 100%;'/>";

    }else{

        $html = "<img src='$top' alt='leter' style='height:220px; width: 100%;'/>

        <center><table width='95%' style='margin-top:-84px;margin-right: 60px;margin-left:63px;border-collapse: collapse;color:#000;'align='center'>

        <tr><th colspan='3' style='padding:10px;font-size:18px;'>Admit Card - 2022-23</th></tr>

        <tr>

            <td style='padding:10px;font-size:18px;'><b>Enrolment No. :</b> $enrolment</td>

            <td style='padding:10px;font-size:18px;'><b>Name :</b> $sname</td>

        </tr>

        

        <tr>

            <td style='padding:10px;font-size:18px;'><b>Fathers Name :</b> $fathername</td>

            <td style='padding:10px;font-size:18px;'><b>Date Of Birth :</b> $dobs</td>

            <td rowspan='4'>

                <img src='$fghfghfgh' alt='Student image' style='width:136px;height:142px;margin-top: -26px;'><br>

            </td>

        </tr>

        <tr>

            <td style='padding:10px;font-size:18px;'><b>Course Name :</b> $coursename</td>

            <td style='padding:10px;font-size:18px;'><b>Semester :</b> $semestern </td>

        </tr>

        <tr>

            <td style='padding:10px;font-size:18px;'><b>Date Of Examination :</b>$dateofexami</td>

            <td style='padding:10px;font-size:18px;'><b>Session :</b> $session</td>

        </tr>

        <tr style='margin-top:20px;'>

            <td style='padding:10px;font-size:18px;' colspan='2'><b>Examination Code :</b> $vbimtuniquecode</td>

        </tr>

        </table></center>

        <h6 class='sdgfgf'style='margin: 11px 0px 0px 85px;font-size:16px;'>important notes !</h6>

        <ul class='sdfsdfdsfds' style='margin: 5px 0px 0px 69px;font-size:14px;'>

        	<li>Please login into your computer 15 minutes before time of examination.</li>

        	<li>You are not supposed to take help from any other means to answer the question.</li>

        	<li>Please make sure that your computer has stable internet connection.</li>

        	<li>The unique code mentioned in your admit card is the your ID to login examination portal.</li>

        	<li>Your result will come after 15 days in your students login.</li>

        </ul>

        

        <img src='$tfop' alt='leter' style='height: 110px; width: 100%;'/>";

    }

    //echo $html;exit;

    $filename = "admit-card";

    $dompdf = new Dompdf();

    $dompdf->loadHtml($html);

    $dompdf->setPaper('A4', 'landscape');

    $dompdf->render();

    $pdfsave=$dompdf->output();

    file_put_contents('pdf-folder/'.$filename.'.pdf', $pdfsave);

        if($query){

    		$success = "<p class='OperationHas'>Admit card Submit Successfully Please Follow Step-2</p>";

    	}else{

    		$success = "<p class='AlreadyRegistered'>Oops.....! Admit card inserting failed.</p>";

    	} 

    }

    if(isset($_POST['emailsend'])){

        $eemail=$_POST['fetchemail'];

        $to ='anand24h@gmail.com';

        $from = 'admit-card@iimsr.net.in';

        $fromName = 'Imperial Institute of Management Science & Research';

        $subject = 'Admit Card with Attachment by Imperial Institute of Management Science & Research';

        $file = "pdf-folder/admit-card.pdf";

        $htmlContent = '<h3>Admit Card with Attachment by Imperial Institute of Management Science & Research</h3> <p>This email is sent from the Imperial Institute of Management Science & Research</p> <p> Customer Care Number : 8287434343 </p>' ;

         /*<strong>Unique Identification No : '.$vbimtuniquecode.'</strong> <br> <strong>User Email : '.$email.'</strong>';*/

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

        $mail = @mail($to, $subject, $message, $headers, $returnpath);

    if($mail==1){

		$successs = "<p class='OperationHas'>Admit Card send Successfully!</p>";

	}else{

		$successs = "<p class='AlreadyRegistered'>Admit Card sending failed.</p>";

	}

}

if(isset($_POST["savedesktoppdf"])){

    $file = "pdf-folder/admit-card.pdf";

    $fullPath = "pdf-folder/admit-card.pdf";

    if (is_readable ($fullPath)) {

        $fsize = filesize($fullPath);

        $path_parts = pathinfo($fullPath);

        $ext = strtolower($path_parts["extension"]);

        switch ($ext) {

            case "pdf":

            header("Content-type: application/pdf");

            header("Content-Disposition: attachment; filename=\"".$file."\"");

            break;

            default;

            header("Content-type: application/octet-stream");

            header("Content-Disposition: filename=\"".$file."\"");

        }

        header("Content-length: $fsize");

        header("Cache-control: private");

        readfile($fullPath);

        exit;

    } else{

        die("Invalid request");

    }  

} 

?>

<div class="content-wrapper">

    <section class="content-header">

        <h1>Send Admit card<small></small></h1>

        <ol class="breadcrumb">

            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>

            <li class="active">Send Admit card</li>

        </ol>

    </section>

    <section class="content">

        <div class="row">

            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                <div class="box box-widget widget-user">

                    <div class="widget-user-header bg-yellow">

                        <form action="" method="post" role="form" enctype="multipart/form-data">

                            <div class="box-body">

                                <div class="row">

                                    <div class="col-sm-9 col-md-9 col-xs-8">

                                        <input type="text" name="enrolment" class="form-control" id="enrollmentn" placeholder="Enrollment No." value="<?php if (isset($_POST['fetch'])) { echo $_POST['enrolment']; } ?>" required>

                                    </div>

                                    <div class="col-sm-3 col-md-3 col-xs-4">

                                        <button type="submit" name="fetch" class="btn btn-primary btn-block btn-flat">Submit</button>

                                    </div>

                                </div>

                            </div>

                        </form>

                    </div>

                        <?php

                            global $name;

                            global $email;

                            global $fname;

                            global $dobb;

                            global $enrolm;

                            global $course;

                            global $special;

                            global $simage;

                            global $total_fee;

                            global $deu_fee;

                            global $submit_fee;

                            global $status_card;

                            $enrol="";	

                            $branch="";

                            

        			    if (isset($_POST['fetch'])) {

        					$_SESSION['enrolment'] = $enrol;

        					$enrol = $_POST['enrolment'];

        					$quuery =  mysqli_query($con, "select * from `register_here` where `enrolment` = '$enrol'");

        					$numrow = mysqli_num_rows($quuery);

        					while ($row = mysqli_fetch_array($quuery)){

        						if($row['status_card']==1){

            						$query = mysqli_query($con, "select * from `register_here` where `enrolment` = '$enrol'");

            						while ($row = mysqli_fetch_array($query)){

            						    $name = $row['name'];		  

            						    $email = $row['email'];		  

            							$fname = $row['fathers_name'];

            							$dobb = $row['dob'];

            							$enrolm = $row['enrolment'];

            							$course = $row['course'];

            							$special = $row['specilization'];		

            							$simage = $row['simage'];

            							$total_fee = $row['total_fee'];		

            							$deu_fee = $row['deu_fee'];		

            							$submit_fee = $row['submit_fee'];

            							$status_card = $row['status_card'];

            						}								

            					}else{

        							echo "<p class='sameuniqeiddd'>You have to get permission from admin</p>";

        						}

        					} 

        				} 

        				?>

        			<div class="widget-user-image">

                        <img class="img-circle AdmitcardIm" src="images/<?php echo $simage; ?>" alt="User Avatar">

                        <img src="images/vbimtsignature.jpeg" style="display:none;width:130px; height:68px;">

                        <!--<input type="hidden" name="stuimage" value="<?php //echo $simage; ?>">-->

                        <input type="hidden" name="ownersign">

                    </div>

                    <div class="box-footer">

                        <form action="" method="post" role="form" enctype="multipart/form-data">

                            <div class="row">

                                <div class="col-sm-12 col-md-12 col-xs-12">

                                    <?php

                            			if (isset($_POST['applysubmit'])){

                            				echo $success;

                            			}else {

                            				echo $success;

                            			}

                            		?>

                                </div>

                            </div>

                            <div class="box-body">	

                                <div class="row">

                                    <div class="col-sm-6 col-md-6 col-xs-6">

                                        <div class="form-group FormGroupp">

                                            <label for="exampleInputEmail1">Name</label>

                                            <input type="hidden" name="enrolment" class="form-control is-valid" id="enrollmentn" placeholder="Enrollment No."value="<?php if (isset($_POST['fetch'])) { echo $_POST['enrolment']; } ?>">

                        					<input type="text" name="sname" class="form-control" id="sname" value="<?php echo $name; ?>" placeholder="Name" required>

                        					<input type="hidden" name="email" class="form-control" value="<?php echo $email; ?>">

                                        </div>

                                    </div>

                                    <div class="col-sm-6 col-md-6 col-xs-6">

                                        <div class="form-group FormGroupp">

                                            <label for="exampleInputEmail1">Date Of Birth</label>

                                            <input type="text" name="dobs" class="form-control" id="dobs" value="<?php echo $dobb; ?>" placeholder="Date Of Birth" required>

                                        </div>

                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-sm-12 col-md-12 col-xs-12">

                                        <div class="form-group FormGroupp">

                                            <label for="exampleInputEmail1">Course Name</label>

                                            <input type="text" name="coursename" class="form-control" id="coursename" value="<?php echo $course; ?>" placeholder="Course Name" required>

                                        </div>

                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-sm-6 col-md-6 col-xs-6">

                                        <div class="form-group FormGroupp">

                                            <label for="exampleInputPassword1">Semester</label>

                                            <select class="form-control select2" id="selectBox" name="semestern" required>	

                                                <option disable>Select Semester </option>

                                                <option value="Semester1">Semester1</option>

                                                <option value="Semester2">Semester2</option>

                                                <option value="Semester3">Semester3</option>

                                                <option value="Semester4">Semester4</option>

                                                <option value="Semester5">Semester5</option>

                                                <option value="Semester6">Semester6</option>

                                                <option value="Semester7">Semester7</option>

                                                <option value="Semester8">Semester8</option>

                                            </select>

                                        </div>

                                    </div>

                                    <div class="col-sm-6 col-md-6 col-xs-6">

                                        <div class="form-group FormGroupp">

                                            <label for="exampleInputPassword1">Session</label>

                                            <input type="text" name="session" class="form-control" id="session" value="<?php if(isset($_POST['edit'])){ echo $roere['mobile_no']; }else{ echo $mobile_nno; } ?>" placeholder="Mobile No" required>

                                        </div>

                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-sm-12 col-md-12 col-xs-12">

                                        <div class="form-group FormGroupp">

                                            <label for="exampleInputPassword1">Exam Date</label>

                                            <input type="date" name="dateofexami" class="form-control" id="dateofexami" value="" placeholder="Date Of Examination" required>

                                        </div>

                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-sm-6 col-md-6 col-xs-6">

                                        <div class="form-group FormGroupp">

                                            <label for="exampleInputPassword1"></label>

                                            <input type="text" name="vbimtuniquecode" class="form-control" id="vbimtuniquecode"  readonly="readonly" value="<?php 

                                            function gen_random_string($length=6){

                                                $chars ="IIMSR1234567890";

                                                $final_rand ='';

                                                for($i=0;$i<$length; $i++)

                                                {

                                                    $final_rand .= $chars[ rand(0,strlen($chars)-1)];

                                                }

                                                return $final_rand;

                                            }

                                            echo gen_random_string()."\n"; ?>" required>

                                        </div>

                                    </div>

                                    <br>

                                    <div class="col-sm-6 col-md-6 col-xs-6">

                                        <div class="form-group FormGroupp">

                                            <label for="exampleInputPassword1"></label>

                                            <input type="submit" value="submit" name="applysubmit" class="btn btn-warning pull-right btn-block ButtonRadis">

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                <div class="box box-widget widget-user-2">

                    <div class="widget-user-header bg-yellow">

                        <h3>Admit Card</h3>

                        <h5 class="widget-user-desc">

                            <?php

                    			if (isset($_POST['emailsend'])){

                    				echo $successs;

                    			}else {

                    				echo $successs;

                    			}

                    		?>

                		</h5>

                    </div>

                    <div class="box-footer no-padding">

                        <form action="" method="post">

                            <ul class="nav nav-stacked">

                                <?php

                                    $query = mysqli_query($con, "SELECT * FROM `admit_card` ORDER BY `id` desc");

                                    $num = mysqli_num_rows($query);

                                    $row = mysqli_fetch_array($query);

                                 ?>	

                                <li>

                                    <a><?php echo $row['sname'];?> | <?php echo strtoupper($row['enrolment']);?> | <?php echo $row['session'];?> | <?php echo $row['semester'];?> 

                                        <span class="pull-right">

                                            <button type="submit" name="emailsend" class="badge bg-red">Email</button>

                                            <input type="hidden" name="fetchemail" value="<?php echo $email ; ?>"/>

                                            <input type="button" id="bt" class="badge bg-red" onclick="print('pdf-folder/admit-card.pdf')" value="Print" />

                                            <button type="submit" name="savedesktoppdf" class="badge bg-red">Save</button>

                                        </span>

                                    </a>

                                </li>

                            </ul>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </section>

</div>

<?php include("include/footer.php");?>

<?php }else {header("location: login.php");}?>