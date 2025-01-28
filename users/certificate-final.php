<?php
    include('checklogin.php');
    include("dbconnection.php");
?>
<!DOCTYPE html >
<html xmlns="">
<head>
    <meta charset="utf-8">
    <meta name="robots" content="Index, Follow" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">	
	<title>Result | Vidya Bharati Institute of Management & Technology</title>
	<link rel="stylesheet" type="text/css" href="css/csss.css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="js/vbimtlandingpage.js"></script>
</head>
<body style="background-color:#dbdbff;">
    <div class="container" style="background-color:#fff;">
        <div class="row" id="top-bar">
            <div class="col-sm-8 col-md-8 col-lg-8 col-xs-8">
                <a href="https://vbimtedu.org.in/"><img src="logo.png" alt="DZone" class="floatleft AdminPanelLogo" /></a>
            </div>	
            <div class="col-sm-4 col-md-4 col-lg-4 col-xs-4">
                <div class="topmeenu">
                    <a href="logout.php"><button type="button" class="btn btn-danger AdminLogoutBu">Logout</button></a>
                </div>
            </div>
        </div>
        <?php include('header/header.php');?>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                <div class="row">
                    <div class="col-sm-3 col-md-3 col-lg-3 col-xs-12"></div>
                    <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12 text-center">
                                <h4>Download Certificate</h4>
                                <?php
                    			    $enrol = $_SESSION['enrolment'];
                    			    $query = mysqli_query($con, "SELECT * FROM `register_here` where `enrolment` = '$enrol'");
                    			    $row = mysqli_fetch_array($query);
                    			    $CertificateLink = $row['CertificateLink'];
                    			    $CertificateLink = 'https://vbimtedu.org.in/users/'.$CertificateLink;
                    			?>
                                <?php 
                                    echo '<a href="'.$CertificateLink.'" class="btn btn-primary DownloadResu">Open Result link</a>';
                                    //session_destroy();
                                    /*sleep(1000);*/
                                ?>
                            </div>
                        </div>
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
                    <div class="col-sm-3 col-md-3 col-lg-3 col-xs-12"></div>
                </div>    
            </div>    
        </div>
        <br><br>
    <?php include('footer/footer.php'); ?>
</div>
<script>
    function send_otp() {
        var enrolment = $('#enrolment').val();
        var email = $('#email').val();
        $.ajax({
            url:"certisend_otp.php",
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
            url: "certificate_otp.php",
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
    .DownloadResu{
        display:none;
    }
    .otp_error{
        color: #ff0000;
        font-size: 17px;
        font-weight: 700;
        text-align: center;
    }
    .Otpp{
        text-align:center;
    }
    .modal-body {
        position: relative;
        padding: 25px;
    }
    .Submitotpp{
        border-radius:0px;
        margin-bottom:5px;
        border: 1px solid #060ef5;
    }
    .second_box{
        display:none;
    }
    .modal-content{
        height: 250px;
    }    
    .modal-header .close {
        margin-top: -17px;
        margin: -36px -26px -6px 7px;
        font-size: 40px;
        color: #ff0000;
    }
    .ViewDetails{
        border-radius:0px;
    }
    .DownloResult{
        width: 529px;
        margin: 141px 0px 0px 446px;
    }
    .DownloadResu{
        border-radius:0px;
    }
    .floatleft.AdminPanelLogo {
        width: 200px;
        height: auto;
    }
    .Testimonipass{
        font-weight:600;
    }
    .enrollmentngg{
        border-radius:0px;
        border:#160fe8 1px solid;
        margin:5px 0px 5px 0px;
    }
</style>
</body>