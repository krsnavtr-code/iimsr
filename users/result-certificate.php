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
                <h4 class="card-title pl-4" style="text-align:center;">Download Certificate</h4>
                <div class="row">
                    <div class="col-xl-12 col-sm-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body px-0">
                                <?php
                    			    $enrol = $_SESSION['enrolment'];
                    			    $query = mysqli_query($con, "SELECT * FROM `register_here` where `enrolment` = '$enrol'");
                    			    $row = mysqli_fetch_array($query);
                    			    $CertificateLink = $row['CertificateLink'];
                    			    $CertificateLink = 'https://iimsr.net.in/users/'.$CertificateLink;
                    			?>
                                <?php 
                                    echo '<center><a href="'.$CertificateLink.'" class="btn btn-primary DownloadResu">Open Result link</a></center>';
                                ?>
                                <div class="row">
                                    <div class="col-xl-4 col-sm-4"></div>
                                    <div class="col-xl-4 col-sm-4">
                                        <form method="post" action="" class="formbutton23">
                                            <div class="first_box">
                                                <input type="hidden" name="enrolment" id="enrolment" value="<?php echo $row['enrolment'];?>">
                                                <input type="hidden" name="email" id="email" class="form-control ViewDetails" value="<?php echo $row['email'];?>">
                                                <button type="button" onclick="send_otp()" class="btn-block btn btn-warning ViewDetails">Send OTP in your registered email id</button>
                							</div>
                						    <div class="second_box">
                						        <input type="hidden" name="enrolment" id="enrolment" value="<?php echo $row['enrolment'];?>">
                                                <input type="hidden" name="email" id="email" class="form-control ViewDetails" value="<?php echo $row['email'];?>">
                							    <input type="text" name="otp" class="form-control Submitotpp" placeholder="Submit Otp" id="otp" required>
                							    <p class="otp_error"></p>
                							    <button type="button" onclick="submit_otp()" class="btn-block btn btn-warning ViewDetails">Please Submit OTP</button>
                					        </div>
                					    </form>
                                    </div>
                                    <div class="col-xl-4 col-sm-4"></div>
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
<script>
    function send_otp() {
        var enrolment = $('#enrolment').val();
        var email = $('#email').val();
        $.ajax({
            url:"result-certificate-send.php",
            type:"post",
            data:{enrolment:enrolment,email:email},
            success:function(data){
                if(data=="success1") {
                    $('.second_box').show();
                    $('.first_box').hide();
                }
                if(data=="not_exist"){
                    $('.first_box').hide();
                }
            }
        });
    }
    function submit_otp(){
        var otp = $('#otp').val();
        var email = $('#email').val();
        var enrolment = $('#enrolment').val();
        $.ajax({
            url: "result-certificate-otp.php",
            type: "post",
            data: {otp:otp,enrolment:enrolment,email:email},
            success:function(data){
                if(data=="success1"){
                    //console.log(data);
                    $('.DownloadResu').show();
                    $('.second_box').hide();
                    $('.first_box').hide();
                }
                if(data=="not_exist"){
                    $('.otp_error').html('Please Enter valid OTP');
                }
            }
        });
    }
</script>
<script type="text/javascript">
    $scope.openModal = function(){
        $("#sentMessage").click();
        $('#largeModal').modal('show');
    };
</script>
<style>
    .second_box{
        display:none;
    }
    .DownloadResu{
        display:none;
    }
</style>