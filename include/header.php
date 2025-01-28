<?php
//error_reporting(0);
session_start();
include('head.php');
//include('dbconnection.php');
if (isset($_POST['login'])) {
    $enl = $_POST['enrolment'];
    $dob = $_POST['ResultPass'];
    $_SESSION['enrolment'] = $enl;
    $query = "SELECT * FROM `register_here` where `enrolment` ='$enl' AND `ResultPass` ='$dob'";
    $result = $con->query($query);
    $row = mysqli_fetch_array($result);
    $count = mysqli_num_rows($result);
    if ($count == 1) {
        $_SESSION['login'] = $enl;
        $_SESSION['course'] = $row['course'];
        header("location: index.php");
    } else {
        $error = "Your Login Name or Password is invalid";
        echo $error;
    }
}
?>

<body id="home" class="cms_index4">
    <header>
        <nav>
            <div class="container">
                <div id="navbar" class="navbar navbar-default">
                    <div class="col-md-5 col-sm-5 col-lg-5 col-xs-5 navbar-header ">
                        <a class="navbar-brand trigger" href="/" title="LearnMate"><img alt="Logo"
                                src="https://iimsr.net.in/images/logo/logo.jpeg"></a>
                    </div>
                    <div class="col-md-7 col-sm-7 col-lg-7 col-xs-7 pull-xs-right">
                        <div id="dl-menu" class="dl-menuwrapper">
                            <button class="dl-trigger visible-sm visible-xs"><i class="fa fa-bars"></i></button>
                            <ul class="dl-menu">
                                <li><a href="/">Home</a></li>
                                <li><a href="about-us.php">About Us</a></li>
                                <li><a class="trigger" href="#">Courses <i class="fa fa-angle-down"></i></a>
                                    <ul class="dl-submenu">
                                        <li><a href="https://iimsr.net.in/design.php">Design</a></li>
                                        <li><a href="https://iimsr.net.in/digital-marketing.php">Digital Marketing</a>
                                        </li>
                                        <li><a href="https://iimsr.net.in/software-engi.php">After 10th/10+2</a></li>
                                        <li><a href="https://iimsr.net.in/technical-software.php">Technical &
                                                Software</a></li>
                                        <li><a href="https://iimsr.net.in/management.php">Management</a></li>
                                        <li><a href="https://iimsr.net.in/finance-management.php">Finance Management</a>
                                        </li>
                                        <li><a href="https://iimsr.net.in/tourism-management.php">Tourism Management</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a class="trigger" href="contact-us.php" target="_blank">Contact us</a></li>
                                <li><a class="trigger btn btn-primary OnlineClass" target="_blank" href="#">Online
                                        Classes</a></li>
                            </ul>
                        </div>
                        <div class="main_menu_wrap">
                            <ul class="main_menu">
                                <li><a class="trigger" href="/">Home</a></li>
                                <li><a class="trigger" href="about-us.php">About Us</a></li>
                                <li><a class="trigger" href="#">Courses <i class="fa fa-angle-down"></i></a>
                                    <ul class="submenu">
                                        <li><a href="https://iimsr.net.in/design.php">Design</a></li>
                                        <li><a href="https://iimsr.net.in/digital-marketing.php">Digital Marketing</a>
                                        </li>
                                        <li><a href="https://iimsr.net.in/software-engi.php">After 10th/10+2</a></li>
                                        <li><a href="https://iimsr.net.in/technical-software.php">Technical &
                                                Software</a></li>
                                        <li><a href="https://iimsr.net.in/management.php">Management</a></li>
                                        <li><a href="https://iimsr.net.in/finance-management.php">Finance Management</a>
                                        </li>
                                        <li><a href="https://iimsr.net.in/tourism-management.php">Tourism Management</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a class="trigger" href="contact-us.php">Contact us</a></li>
                                <li><a class="trigger btn btn-primary OnlineClass" id="OnlineClas" href="#">Online
                                        Classes</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <div class="container">
        <div class="contai">
            <button id="myBtn" class="btn btn-primary btn-block OnlineResult">Result</button>
            <button data-toggle="modal" data-target="#myModal" type="button"
                class="btn btn-primary btn-block OnlineLogins">Logins</button>
            <a href="#videolectures"><button class="btn btn-primary btn-block OnlineVideo">Video Lectures</button></a>
            <a href="#pptlectures"><button class="btn btn-primary btn-block OnlinePPT">PPT Lectures</button></a>
            <a href="prospectus/Prospectus.pdf" target="_blank"><button
                    class="btn btn-primary btn-block OnlineProspectus">IIMSR Prospectus</button></a>
            <a href="online-exam/login.php" target="_blank"><button class="btn btn-primary btn-block OnlineExam">Online
                    Examination</button></a>
            <button id="mynewBtn" class="btn btn-primary btn-block OnlineImportant">Important Dates</button>
            <button id="GstCompliance" class="btn btn-primary btn-block OnlineGST">GST* Compliance</button>
        </div>
    </div>
    <div id="OnlineClasses" class="onlinemodal">
        <div class="onlinemodal-content">
            <span class="onlineclose">×</span>
            <div class="row">
                <div class="col-sm-2 col-md-2 col-lg-2 col-xs-12"></div>
                <div class="col-sm-8 col-md-8 col-lg-8 col-xs-12">
                    <h5 class="ClassOnli">Information for online classes : </h5>
                </div>
                <div class="col-sm-2 col-md-2 col-lg-2 col-xs-12"></div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-12 col-md-12 col-xs-12">
                    <span class="IimsrClass">
                        <p class="ImportanceNoti">Dear Students, please participate in online classes as attendance
                            ratio is going low. For further clarifications please contact.</p>
                        <p class="Classmess"><i class="fa fa-spinner fa-spin" aria-hidden="true"></i> E-mail :
                            info@iimsr.net.in</p>
                        <hr>
                        <h4>Timing : </h4>
                        <p class="ImportanceNoti"><i class="fa fa-spinner fa-spin" aria-hidden="true"></i>
                            Weekdays(Monday to Friday): 6 pm to 8 pm</p>
                        <p class="ImportanceNoti"><i class="fa fa-spinner fa-spin" aria-hidden="true"></i>
                            Weekends(Saturday/Sunday): 2 pm to 4 pm</p>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div id="mynewModal" class="newmodal">
        <div class="nemodal-content">
            <span class="newclose">&times;</span>
            <div class="row">
                <div class="col-sm-2 col-md-2 col-lg-2 col-xs-12"></div>
                <div class="col-sm-8 col-md-8 col-lg-8 col-xs-12">
                    <h5 class="ExamDated">Exam Dates for : 2024-25</h5>
                </div>
                <div class="col-sm-2 col-md-2 col-lg-2 col-xs-12"></div>
            </div>
            <hr class='IIMsrClass'>
            <div class="row">
                <div class="col-sm-12 col-md-12 col-xs-12">
                    <ul>
                        <li class="importnot"><span style='font-size:16px;color:#000;'>&#8594;</span> Last Date of
                            issuance of Admit Card <span class="importdates">'8th May 2024'</span> </li>
                        <li class="importnot"><span style='font-size:16px;color:#000;'>&#8594;</span> Starting Date of
                            Examination for Technical Courses <span class="importdates">'10th May 2024'</span> </li>
                        <li class="importnot"><span style='font-size:16px;color:#000;'>&#8594;</span> Starting Date of
                            Examination for Management Courses <span class="importdates">'12th May 2024'</span> </li>
                        <li class="importnot"><span style='font-size:16px;color:#000;'>&#8594;</span> Starting Date of
                            Examination of Courses other than Management & Technical <span class="importdates">'15th May
                                2024'</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div id="ComplianceGst" class="gstmodal">
        <div class="gstmodal-content">
            <span class="gstclose">×</span>
            <div class="row">
                <div class="col-sm-2 col-md-2 col-lg-2 col-xs-12"></div>
                <div class="col-sm-8 col-md-8 col-lg-8 col-xs-12">
                    <h5 style="text-align:center;" class="Gstimportant">Important Notice</h5>
                </div>
                <div class="col-sm-2 col-md-2 col-lg-2 col-xs-12"></div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-12 col-md-12 col-xs-12">
                    <span class="Compliancevbimt">Dear students of IIMSR, please understand that GST is mandatory for
                        all students and no negotiations will be done on this part as this is govt tax. We expect
                        everything free from govt starting from Hospital/Education/Social security but when it comes to
                        tax we intend to avoid that and then claim our country is poor because of politicians and get
                        rid of our responsibilities. So please be a part in the growth story of India by paying suitable
                        taxes.</span>
                </div>
            </div>
        </div>
    </div>
    <!----GST Compliance----->
    <div id="myreModal" class="modaal">
        <div class="modaal-content">
            <div class="modaal-header">
                <a class="vbimt-popup" href="/"><img class="Resultll1" src="https://iimsr.net.in/images/logo/logo.jpeg"
                        style=""></a>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div style="text-align:center; "></div>
            <center>
                <h2> Result </h2>
            </center>
            <p class="KindlyLog">Kindly Enter your credentials to access the Result </p>
            <form class="form" action="result.php" method="post">
                <div class="form-group">
                    <input type="text" class="form-control Credentials" name="enrolment" placeholder="Enrolment*"
                        value="" required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control Credentials" name="ResultPass" id="ResultPass"
                        placeholder="Password" value="" required>
                </div>
                <div class="form-group center-block">
                    <center><button type="submit" name="login" class="btn btn-info btn-block Credentials"
                            style="padding: 4px 30px 4px 30px;">Submit</button></center>
                </div>
            </form>
        </div>
    </div>
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-content">
            <div class="modal-header">
                <a href="/"><img class="LoginsPopup" src="https://iimsr.net.in/images/logo/logo.jpeg"></a>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-6 col-xs-6">
                        <span>
                            <a href="admin-12345/login.php" target="_block">
                                <img class="vbi-openmodel" style="width:100px;height:100px; margin-left: -15px;"
                                    src="https://iimsr.net.in/images/OP.png" alt="vbimt login">
                                <br>Admin Login
                            </a>
                        </span>
                        <span>
                            <a href="/" target="_block">
                                <img class="vbi-openmodel" style="width:100px;height:100px;"
                                    src="https://iimsr.net.in/images/outputbooks-256.png" alt="vbimt login">
                                <br>Books Login
                            </a>
                        </span>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6 col-xs-6">
                        <span>
                            <a href="users/login.php" target="_block">
                                <img class="vbi-openmodel" style="width:100px;height:100px;"
                                    src="https://iimsr.net.in/images/user-login-icon-29.png" alt="vbimt login">
                                <br>Student Login
                            </a>
                        </span>
                        <span>
                            <a href="video-class/video-class/index.php" target="_block">
                                <img class="vbi-openmodel" style="width:100px;height:100px;"
                                    src="https://iimsr.net.in/images/vbimt-videoclass.png" alt="vbimt login">
                                <br>Video Class Login
                            </a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!----Online Classes Compliance--->
    <script>
        var onlinemodal = document.getElementById("OnlineClasses");
        var btn = document.getElementById("OnlineClas");
        var span = document.getElementsByClassName("onlineclose")[0];
        btn.onclick = function () {
            onlinemodal.style.display = "block";
        }
        span.onclick = function () {
            onlinemodal.style.display = "none";
        }
        window.onclick = function (event) {
            if (event.target == onlinemodal) {
                onlinemodal.style.display = "none";
            }
        }
    </script>
    <!----Online Classes Compliance---->
    <script>
        var gstmodal = document.getElementById("ComplianceGst");
        var btn = document.getElementById("GstCompliance");
        var span = document.getElementsByClassName("gstclose")[0];
        btn.onclick = function () {
            gstmodal.style.display = "block";
        }
        span.onclick = function () {
            gstmodal.style.display = "none";
        }
        window.onclick = function (event) {
            if (event.target == gstmodal) {
                gstmodal.style.display = "none";
            }
        }
    </script>
    <!----GST Compliance--------->
    <script>
        var newmodal = document.getElementById("mynewModal");
        var btn = document.getElementById("mynewBtn");
        var span = document.getElementsByClassName("newclose")[0];
        btn.onclick = function () {
            newmodal.style.display = "block";
        }
        span.onclick = function () {
            newmodal.style.display = "none";
        }
        window.onclick = function (event) {
            if (event.target == newmodal) {
                newmodal.style.display = "none";
            }
        }
    </script>
    <script>
        var modal = document.getElementById("myreModal");
        var btn = document.getElementById("myBtn");
        var span = document.getElementsByClassName("close")[0];
        btn.onclick = function () {
            modal.style.display = "block";
        }
        span.onclick = function () {
            modal.style.display = "none";
        }
        window.onclick = function (event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
        function closesfsdf() {
            $(".navbar-collapse").removeClass("show");
        }
    </script>
    <style>
        .ExamDated {
            text-align: center;
            font-size: 18px;
            font-weight: 700;
        }

        .IIMsrClass {
            border-bottom: 1px solid #b9b2b2;
            border-left: 0;
            border-right: 0;
            border-top: 0;
            margin: 8px;
        }
    </style>