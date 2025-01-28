<?php 
    error_reporting(0);
    include('checklogin.php');
    include("dbconnection.php");
	include("include/head.php");

?>
<div class="container-scroller">
    <?php include('include/sidebar.php');?>
    <div class="container-fluid page-body-wrapper">
        <div id="theme-settings" class="settings-panel">
            <i class="settings-close mdi mdi-close"></i>
            <p class="settings-heading">SIDEBAR SKINS</p>
            <div class="sidebar-bg-options selected" id="sidebar-default-theme">
                <div class="img-ss rounded-circle bg-light border mr-3"></div> Default
            </div>
            <div class="sidebar-bg-options" id="sidebar-dark-theme">
                <div class="img-ss rounded-circle bg-dark border mr-3"></div> Dark
            </div>
            <p class="settings-heading mt-2">HEADER SKINS</p>
            <div class="color-tiles mx-0 px-4">
                <div class="tiles light"></div>
                <div class="tiles dark"></div>
            </div>
        </div>
        <?php include('include/header.php'); ?>
        
        <div class="main-panel">
            <div class="content-wrapper pb-0">
                <div class="row">
                    <h4 class="card-title pl-4">Admission Confirmation</h4>
                    <div class="col-xl-12 col-sm-12 grid-margin stretch-card">
                        <div class="card AdmissonCofirma">
                            <div class="card-body px-0 overflow-auto">
                                <div class="table-responsive">
                                    <?php
                                        $enrol = $_SESSION['enrolment'];
                        	        	$query = mysqli_query($con, "select * from `admission_cofirm` WHERE `enrolment`='$enrol'");
                        				while($row = mysqli_fetch_array($query)){
                        				    $name = $row['name'];
                        				    $course = $row['course'];
                        				    $total_fee = $row['total_fee'];
                        				    $paid_fee = $row['email'];
                        		    ?>
                                    <table align='center'style='margin-top:0px;'>
                                        <tr>
                                            <td><b>Dear </b><span style="color:#160fe8;font-weight:700;"><?php echo $name; ?></span></td>
                                        </tr>
                                        <tr>
                                            <td><b>Sub : </b> Admission Confirmation</td>
                                        </tr>
                                        <tr>
                                            <td>Hope this mail finds you in the best of your health.</td>
                                        </tr>
                                        <tr>
                                            <td style='margin-left:50px;'><p style='text-align:justify;'>
                                                Welcome to the Grand Family of VBIMT, we wish you good luck for your study with us, here in VBIMT we help you increase your expertise and learn the professional nuances of your respective field. We also encourage you to have clarity on any issue either related to subject or anything required for the smooth completion of your course in Vidhya Bharati.</p>
                                            </td>    
                                        </tr>    
                                        <tr>    
                                            <td>Please find the below mentioned details of your fees & Course</td>
                                        </tr>    
                                        <tr style='margin-top:20px !important;'>    
                                            <td><b>Course : </b><span style="color:#160fe8;font-weight:700;"><?php echo $course; ?></span></td>
                                        </tr>    
                                        <tr>    
                                            <td><b>Fee : </b><span style="color:#ff0000;font-weight:700;"><i class="fa fa-inr" aria-hidden="true"></i> <?php echo $total_fee; ?>/-</span></td>
                                        </tr>    
                                        <tr>    
                                            <td><b>Exam Fee : </b><span style="color:#ff0000;font-weight:700;"><i class="fa fa-inr" aria-hidden="true"></i> 1000/Semester</span></td>
                                        </tr>    
                                        <tr>    
                                            <td>Taxes : <b>If Applicable</b></td>
                                        </tr>
                                        <tr>
                                           <td>For further help please contact : <span style="color:#160fe8;font-weight:700;">Shashi Bhushan : 9643583270</sapn></td>
                                        </tr>
                                        
                                        <tr style='margin-top:20px !important;'>    
                                            <td><b>Payment Detail :</b> </td>
                                        </tr>
                                        <tr>
                                           <td><b>Account Name : </b><span style="color:#160fe8;font-weight:700;">Vidya Bharati Institute of Management & Technology</span></td>
                                        </tr>    
                                        <tr>    
                                           <td><b>Account Number : </b><span style="color:#160fe8;font-weight:700;">10056424748</span></td>
                                        </tr>
                                        <tr>    
                                           <td><b>IFSC : </b><span style="color:#160fe8;font-weight:700;">IDFB0021413</span></td>
                                        </tr>
                                        
                                        <tr>    
                                           <td><b>Bank Name: </b><span style="color:#160fe8;font-weight:700;">IDFC Bank</span></td>
                                        </tr>
                                        <tr style="margin-top:20px !important;">    
                                           <td style="color: #881616;font-size: 15px;text-align: justify;">N.B: Postal/ RTI/Online verification available</td>
                                        </tr>
                                        <tr>    
                                           <td style="color: #881616;font-size: 15px;text-align: justify;">Please feel free to contact us for further detail.</td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 0px 8px 0px 0px;margin: 0px 0px 0px -16px !important;">
                                                <span style="list-style:none;color:#3e3efe;">Regards</span><br>
                                                <span style="list-style:none;color:#3e3efe;">VBIMT Admin</span><br>
                                                <span style="list-style:none;color:#3e3efe;">Vidya Bharati Institute of Management & Technology</span><br>
                                                <span style="list-style:none;color:#3e3efe;">B 63,Sector 64, Noida,</span><br>
                                                <span style="list-style:none;color:#3e3efe;">Customer Care Number: 9891030303</span><br>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 0px 8px 0px 0px;margin: 0px 0px 0px -16px !important;">
                                                <span style="list-style:none;font-weight:500;">Email:info@vbimt.org.in</span>
                                                <span style="list-style:none;font-weight:500;">www.vbimt.org.in</span>
                                            </td>
                                        </tr>
                                        <tr><td style='color:green;text-align:justify;'>Please be responsible for your environment. Don't print this e-mail unless absolutely necessary </td></tr>    
                                        
                                        <tr>    
                                           <td style="color: #881616;font-size: 15px;text-align: justify;font-style:italic;">"This e-mail message may contain confidential, proprietary or legally privileged information. It should not be used by anyone who is not the original intended recipient. If you have erroneously received this message, please delete it immediately and notify the sender. Any other use, retention, dissemination, forwarding, printing, modification or copying of this e-mail is strictly prohibited. Before opening any attachments please check them for viruses and defects."</td>
                                        </tr>
                                    </table>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include("include/footer.php"); ?>
        </div>
    </div>
</div>