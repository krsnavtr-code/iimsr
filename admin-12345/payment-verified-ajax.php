<?php
include("dbconnection.php");
if(isset($_POST['search_param'])){
    $search_param = mysqli_real_escape_string($con, $_POST['search_param']);
    $query = mysqli_query($con, "SELECT * FROM new_payment WHERE enrolment like '%$search_param%' or unique_id like '%$search_param%' ORDER BY comment_id DESC");
    $output = '';
?>
        <tr style="background-color: #294c67;color:#fff;">
		    <tr>
				<th style="min-width: 100px;color:#000;font-weight:700;text-align:center;">Payment</th>
				<th style="min-width: 120px;color:#000;font-weight:700;text-align:center;font-size:13px;">Transaction ID</th>
				<th style="min-width: 150px;color:#000;font-weight:700;text-align:center;">Verified/Unverified</th>
				<th style="min-width: 100px;text-align:center;">New Payment</th>
				<th style="min-width: 100px;text-align:center;">Payment Slip</th>
				<th style="min-width: 100px;text-align:center;">Submit Fee</th>
				<th style="min-width: 100px;text-align:center;">Paid Through</th>
			    <th style="min-width: 100px;text-align:center;">Enrolment</th>
			    <th style="min-width: 100px;text-align:center;">Unique Id.</th>
				<th style="min-width: 150px;text-align:center;">Client Name</th>
				<th style="min-width: 150px;text-align:center;">Team Leader</th>
			</tr>
		</tr>
        <?php 
            while($row = mysqli_fetch_array($query)){
                $transaction_idt = $row['transaction_id'];
                $transaction_idtt = substr($transaction_idt, 0, -5);
    			$enrolment = $row['enrolment'];
    			$Paid_fee = $row['Paid_fee'];
    			if($row['comment_status']==1 && $row['sir_status']==1){
    			$output .= '<tr>
    				<td style="color:#229c22;font-weight:700;text-align:center;">
    				    <form name="useredata" method="post" action="payment-slip.php">
    						<input type="hidden" name="unique_id" value="' . $row["unique_id"] . '">
    						<input type="hidden" name="enrolment" value="' . $row["enrolment"] . '">
    						<input type="hidden" name="transaction_id" value="' . $row["transaction_id"] . '">
    						<input type="submit" name="edit" value="Payment" class="btn btn-block btn-success btn-xs ActionButtonRa" style="">
    					</form>';
    			    $output .= '</td>
    				<td style="color:#229c22;font-weight:700;text-align:center;font-size:13px;">' . $row['transaction_id'] . '</td>
    				<td style="color:#229c22;font-weight:700;text-align:center;">Success</td>
    				<td style="text-align:center;font-weight:700;">&#8377;' . $row['add_option_paymentt'] . '</td>
    				<td style="text-align:center;"><a title="" data-rel="prettyPhoto[gallery1]" href="PaymentSlip/' .$row['PaymentSlip'] . '"><img src="PaymentSlip/' .$row['PaymentSlip'] . '" class="img-circle PaymentImages" alt=""></a></td>';
    				$output .= '<td style="text-align:center;font-weight:700;">';
    				if(!empty($row['Paid_fee'])){
    			        $output .= '&#8377;'. $row['Paid_fee'];
    			    }else{
    			        $output .= 'New Admission';
    			    }
    			    $output .= '</td>';
    				$output .= '<td style="text-align:center;">' . $row['mode_of_payment'] . '</td>';
    				$output .= '<td style="text-align:center;font-weight:700;">';
    				if(!empty($row['enrolment'])){
    			        $output .= $row['enrolment'];
    			    }else{
    			        $output .= 'New Admission';
    			    }
    			    $output .= '</td>';
    				$output .= '<td style="text-align:center;">' . $row['unique_id'] . '</td>
    				<td style="text-align:center;">' . $row['name'] . '</td>
    				<td style="text-align:center;">' . $row['TL_option'] . '</td>
    			</tr>';
    			} elseif($row['comment_status']==1){
    			$output .= '<tr>
    				<td style="color:#ff0000;font-weight:700;text-align:center;"><a href="#" class="label label-danger ActionButtonRa">Payment</a></td>';
    			    $output .= '</td>';
    				$output .= '<td style="color:#ff0000;font-weight:700;text-align:center;font-size:13px;">';
        				if($row['comment_status']==1){ 
        			        $output .= $transaction_idt;
        			    }else{
        			        $output .= $transaction_idtt;
        			    }xxxxx;
    			    $output .= '</td>';
    				$output .= '<td style="color:#ff0000;font-weight:700;text-align:center;">Pending</td>
    				<td style="text-align:center;font-weight:700;">&#8377;' . $row['add_option_paymentt'] . '</td>
    				<td style="text-align:center;"><a title="" data-rel="prettyPhoto[gallery1]" href="PaymentSlip/' .$row['PaymentSlip'] . '"><img src="PaymentSlip/' .$row['PaymentSlip'] . '" class="img-circle PaymentImages" alt=""></a></td>';
    				$output .= '<td style="text-align:center;font-weight:700;">';
    				if(!empty($row['Paid_fee'])){
    			        $output .= '&#8377;'. $row['Paid_fee'];
    			    }else{
    			        $output .= 'New Admission';
    			    }
    			    $output .= '</td>';
    				$output .= '<td style="text-align:center;">' . $row['mode_of_payment'] . '</td>';
    				$output .= '<td style="text-align:center;font-weight:700;">';
    				if(!empty($row['enrolment'])){
    			        $output .= $row['enrolment'];
    			    }else{
    			        $output .= 'New Admission';
    			    }
    			    $output .= '</td>';
    				$output .= '<td style="text-align:center;">' . $row['unique_id'] . '</td>
    				<td style="text-align:center;">' . $row['name'] . '</td>
    				<td style="text-align:center;">' . $row['TL_option'] . '</td>
    			</tr>';
            }
        }   
    /*}else{
        $output = '<tr><td colspan="4"> No result found. </td></tr>';
    }*/
    echo $output;
}
?>
<style>
    .DownloadRe12 {
        border-radius: 0px;
        margin-top: 5px;
        margin-right: 0px;
        margin-left: 0px;
    }
    .DownloadResultrr {
        border-radius: 0px;
        margin-top: 5px;
        margin-right: 4px;
        margin-left: 0px;
    }
</style>