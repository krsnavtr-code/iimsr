<?php
error_reporting(0);
include('checklogin.php');
include("dbconnection.php");
include("include/header.php");
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;
if($_SESSION['role']=="super-admin" || $_SESSION['role']=="pay-slip"){
if(isset($_POST['emailsend'])){
    $eemail = $_POST['fetchemail'];
    $paymentpdf = $_POST['paymentpdf'];
    $to ='payment-slip@iimsr.net.in';
    $from = 'payment-slip@iimsr.net.in';
    $fromName = 'Imperial Institute of Management Science & Research';
    $subject = 'Payment Slip with Attachment by Imperial Institute of Management Science & Research';
    $file = "payment-folder/".$paymentpdf.'.pdf';
    $htmlContent = '<h3>Payment Slip with Attachment by Imperial Institute of Management Science & Research</h3> <p>This email is sent from the Imperial Institute of Management Science & Research</p>';
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
    mail('payment-slip@iimsr.net.in', $subject, $message, $headers, $returnpath);
    $mail = @mail($to, $subject, $message, $headers, $returnpath);
    if($mail){
		$success = "<p class='OperationHas'>Thank You...! Payment slip send Successfully!</p>";
	}else{
		$success = "<p class='AlreadyRegistered'>Oops...! Payment slip send failed</p>";
	}
}
if(isset($_POST["savedesktoppdf"])){
    $paymentpdf = $_POST['paymentpdf'];
    $file = "payment-folder/".$paymentpdf.'.pdf';
    $fullPath = "payment-folder/".$paymentpdf.'.pdf';
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
    } else {
        die("Invalid request"); 
    }   
}
?>
?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Payment Verify<small></small></h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Payment Verify</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="overflow-x:auto; margin-bottom: 20px; height:130px;">
                <?php
					if (isset($_POST['emailsend'])){
						echo $success;
					}else {
						echo $success;
					}
				?>
                <table class="table table-hover no-more-tables table table bordered table-striped" style="background-color: #fff;" id="tbllData">
		            <form action="" method="post" class="vbimt-search-form">
            			<tr>
            				<th style="min-width: 60px;">Name</th>
            				<th style="min-width: 50px;">Payment</th>
            				<th style="min-width: 50px;">Payment Mode</th>
            				<th style="min-width: 50px;">Transaction Id</th>
            				<th style="min-width: 50px;">Counselor Name</th>
            				<th style="">Email</th>
            				<th style="">Save</th>
            			</tr>
            			<?php
                            $query = mysqli_query($con, "SELECT * FROM `paymentslip` ORDER BY `id` desc");
                            $num = mysqli_num_rows($query);
                            $row = mysqli_fetch_array($query);
                         ?>	
        				<tr>
        					<td><?php echo $row['name'];?></td>
        					<td>&#8377;<?php echo $row['payment'];?></td>
        					<td><?php echo $row['paidt_hrough'];?></td>
        					<td><?php echo $row['transaction_id'];?></td>
        					<td><?php echo $row['sender_name'];?></td>
        					<td>
        					    <button type="submit" name="emailsend" class="btn btn-block btn-warning btn-xs ActionButtonRa">Email</button>
        					    <input type="hidden" name="fetchemail" value="<?php echo $row['email']; ?>"/>
        					    <input type="hidden" name="paymentpdf" value="<?php echo $row['PaymentPdf']; ?>"/>
        					</td>
        					<td><button type="submit" name="savedesktoppdf" class="btn btn-block btn-success btn-xs ActionButtonRa">Save</button></td>		 	  
        				</tr>
                    </form>
    	        </table>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="overflow-x:auto; margin-bottom: 20px; height:530px;">
                <div style="margin-bottom:10px;"><input type="text" class="form-control" id="search_param" placeholder="Enrolment , Unique Code...! Live Search Data"/></div>
                <table class="table table-hover no-more-tables" style="100%;background-color: #fff;">
				    <tbody id="tbl_body">
    					<tr>
    						<th style="min-width: 100px;color:#000;font-weight:700;text-align:center;">Payment</th>
    						<th style="min-width: 120px;color:#000;font-weight:700;text-align:center;font-size:13px;">Transaction ID</th>
    						<th style="min-width: 150px;color:#000;font-weight:700;text-align:center;">Success/Pending</th>
    						<th style="min-width: 150px;text-align:center;">New Payment</th>
    						<th style="min-width: 100px;text-align:center;">Payment Slip</th>
    						<th style="min-width: 100px;text-align:center;">Submit Fee</th>
    						<th style="min-width: 100px;text-align:center;">Paid Through</th>
    					    <th style="min-width: 100px;text-align:center;">Enrolment</th>
    					    <th style="min-width: 100px;text-align:center;">Unique Id.</th>
    						<th style="min-width: 150px;text-align:center;">Client Name</th>
    						<th style="min-width: 150px;text-align:center;">Team Leader</th>
    						<th style="min-width: 150px;text-align:center;">Updated Time</th>
    					</tr>
    				    <?php
    						$query = mysqli_query($con, "SELECT * FROM `new_payment` ORDER BY `comment_id` DESC");
    						$num = mysqli_num_rows($query);
    						while($row = mysqli_fetch_array($query)) { 
    						$transaction_idt = $row['transaction_id'];
    						$enrolment = $row['enrolment'];
    						$Paid_fee = $row['Paid_fee'];
    						if($row['comment_status']==1 && $row['sir_status']==1){
    					?>	
    					<tr>
    						<td style="color:#229c22;font-weight:700;text-align:center;">
    							<form name="useredata" method="post" action="payment-slip.php">
    								<input type="hidden" name="unique_id" value="<?php echo $row['unique_id'];?>">
    								<input type="hidden" name="enrolment" value="<?php echo $row['enrolment'];?>">
    								<input type="hidden" name="transaction_id" value="<?php echo $row['transaction_id'];?>">
    								<input type="submit" name="edit" value="Payment" class="btn btn-block btn-success btn-xs ActionButtonRa" style="">
    							</form>
    						</td>
    						<td style="color:#229c22;font-weight:700;text-align:center;font-size:13px;"><?php echo $row['transaction_id'];?></td>	 	  
    						<td style="color:#229c22;font-weight:700;text-align:center;">Success</td>
    						<td style="text-align:center;font-weight:700;">&#8377;<?php echo $row['add_option_paymentt'];?>/-</td>
    						<td style="text-align:center;">
    						    <a title="" data-rel="prettyPhoto[gallery1]" href="PaymentSlip/<?php echo $row['PaymentSlip'];?>"><img src="PaymentSlip/<?php echo $row['PaymentSlip'];?>" class="img-circle PaymentImages" alt=""></a>
    					    </td>
    						<td style="text-align:center;font-weight:700;">
        					    <?php if(!empty($Paid_fee)){
        						    echo "&#8377;$Paid_fee/";
        						}else{
        						    echo "New Admission";
        						} ?>
    					    </td>			 	  
    						<td style="text-align:center;"><?php echo $row['mode_of_payment'];?></td>
    						<td style="text-align:center;">
        					    <?php if(!empty($enrolment)){
        						    echo "$enrolment";
        						}else{
        						    echo "<p style='font-weight:700;'>New Admission</p>";
        						} ?>
    					    </td>
    						<td style="text-align:center;"><?php echo $row['unique_id'];?></td> 
    						<td style="text-align:center;"><?php echo $row['name'];?></td>
    						<td style="text-align:center;"><?php echo $row['TL_option'];?></td>								
    					</tr>
    					<?php } elseif($row['comment_status']==1){ ?>
    					<tr>
    						<td style="color:#ff0000;font-weight:700;text-align:center;"><a href="#" class="label label-danger ActionButtonRa">Payment</a></td>
    						<!--<td style="color:#ff0000;font-weight:700;text-align:center;font-size:13px;"><?php //if($row['comment_status']==1){ echo $transaction_idt; }else { echo substr($transaction_idt, 0, 4); }?>xxxxx</td>-->	 	  
    						<td style="color:#ff0000;font-weight:700;text-align:center;font-size:13px;"><?php if($row['sir_status']==1){ echo $transaction_idt; }else { echo substr($transaction_idt, 0, 4); }?>xxxxx</td>	 	  
    						<td style="color:#ff0000;font-weight:700;text-align:center;">Pending</td>
    						<td style="text-align:center;font-weight:700;">&#8377;<?php echo $row['add_option_paymentt'];?>/-</td>
    						<td style="text-align:center;">
    						    <a title="" data-rel="prettyPhoto[gallery1]" href="PaymentSlip/<?php echo $row['PaymentSlip'];?>"><img src="PaymentSlip/<?php echo $row['PaymentSlip'];?>" class="img-circle PaymentImages" alt=""></a>
    					    </td>
    						<td style="text-align:center;font-weight:700;">
        					    <?php if(!empty($Paid_fee)){
        						    echo "&#8377;$Paid_fee/";
        						}else{
        						    echo "New Admission";
        						} ?>
    					    </td>		 	  
    						<td style="text-align:center;"><?php echo $row['mode_of_payment'];?></td>
    						<td style="text-align:center;">
        					    <?php if(!empty($enrolment)){
        						    echo "$enrolment";
        						}else{
        						    echo "<p style='font-weight:700;'>New Admission</p>";
        						} ?>
    					    </td>
    						<td style="text-align:center;"><?php echo $row['unique_id'];?></td>
    						<td style="text-align:center;"><?php echo $row['name'];?></td>
    						<td style="text-align:center;"><?php echo $row['TL_option'];?></td>	 	  
    						<td style="text-align:center;"><?php echo $row['timestamp'];?></td>	 	  
    					</tr>
    				    <?php } } ?>
    			    <tbody>
			   </table>
            </div>
        </div>
    </section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $(document).on("keyup", "#search_param", function () {
        var search_param = $("#search_param").val();
        $.ajax({
            url: 'payment-verified-ajax.php',
            type: 'POST',
            data: {search_param: search_param},
            success: function (data) {
                console.log(data);
                $("#tbl_body").html(data);
            }
        });
    });
</script>  
<script>
    function leadExport() {
      var popup = document.getElementById("myPopup");
      popup.classList.toggle("show");
    }
</script>
</div>
<?php include("include/footer.php");?>
<?php }else {header("location: login.php");}?>