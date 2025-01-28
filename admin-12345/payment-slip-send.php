<?php

error_reporting(0);

include("dbconnection.php");

include("include/header.php");

require_once 'dompdf/autoload.inc.php';

use Dompdf\Dompdf;

if($_SESSION['role']=="super-admin"){

if(isset($_POST['emailsend'])){

    $eemail = $_POST['fetchemail'];

    $paymentpdf = $_POST['paymentpdf'];

    $to ='anand24h@gmail.com';

    $from = 'payment-slip@iimsr.net.in';

    $fromName = 'Imperial Institute of Management Science & Research';

    $subject = 'Resend Payment Slip with Attachment by Imperial Institute of Management Science & Research';

    $file = "payment-folder/".$paymentpdf.'.pdf';

    //print_r($file);exit;

    $htmlContent = '<h3>Resend Payment Slip with Attachment by Imperial Institute of Management Science & Research</h3> <p>This email is sent from the Imperial Institute of Management Science & Research </p> <p> Customer Care Number : 8287434343 </p>' ;

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

    mail('anand24h@gmail.com', $subject, $message, $headers, $returnpath);

    $mail = @mail($to, $subject, $message, $headers, $returnpath);

    if($mail){

		$success = "<p class='OperationHas'>Thank You...! Payment slip send Successfully!</p>";

	}else{

		$success = "<p class='AlreadyRegistered'>Oops...! Payment slip send failed</p>";

	}

}

?>

<div class="content-wrapper">

    <section class="content-header">

        <h1>Payment Slip Send<small></small></h1>

        <ol class="breadcrumb">

            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>

            <li class="active">Payment Slip Send</li>

        </ol>

    </section>

    <section class="content">

        <div class="row">

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="overflow-x:auto; margin-bottom: 20px; height:530px;">

                <table class="table table-hover no-more-tables" id="tbllData" style="background-color: #fff;">

        			<tr>

        			    <th style="">Email</th>

        				<th style="min-width: 70px;">Name</th>

        				<th style="min-width: 50px;">Payment</th>

        				<th style="min-width: 50px;">Payment Mode</th>

        				<th style="min-width: 40px;">Transaction Id</th>

        				<th style="min-width: 100px;">Counselor Name</th>

        				<th style="min-width: 40px;">Payment PDF</th>

        				<th style="min-width: 100px;">Payment Updated</th>

        			</tr>

        			<?php

                        $query = mysqli_query($con, "SELECT * FROM `paymentslip` ORDER BY `id` desc");

                        $num = mysqli_num_rows($query);

                        while($row = mysqli_fetch_array($query)){

                     ?>	

    				<tr>

    				    <td>

    				        <form action="" method="post" class="vbimt-search-form">

        					    <button type="submit" name="emailsend" class="btn btn-block btn-primary btn-xs ActionButtonRa">Resend Payment Slip</button>

        					    <input type="hidden" name="fetchemail" value="<?php echo $row['email']; ?>"/>

        					    <input type="hidden" name="paymentpdf" value="<?php echo $row['PaymentPdf']; ?>"/>

    					    </form>

    					</td>	

    					<td><?php echo $row['name'];?></td>

    					<td><i class="fa fa-inr" aria-hidden="true"></i><?php echo $row['payment'];?></td>

    					<td><?php echo $row['paidt_hrough'];?></td>

    					<td><?php echo $row['transaction_id'];?></td>

    					<td><?php echo $row['sender_name'];?></td>

    					<td><?php echo $row['PaymentPdf'];?></td>	 	  

    					<td style="min-width: 140px;"><?php echo $row['created_datep'];?></td>	 	  

    				</tr>

    				<?php } ?>

    	        </table>

            </div>

        </div>

    </section>

</div>

<?php include("include/footer.php");?>

<?php }else {header("location: login.php");}?>