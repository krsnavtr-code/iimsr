<?php  
error_reporting(0);
session_start();
include('include/head.php');
include('dbconnection.php');
if (isset($_POST['login'])){
    $enl = $_POST['enrolment'];
    $dob = $_POST['dob'];
    $_SESSION['enrolment'] = $enl;
    $query = "SELECT * FROM `register_here` where `enrolment` ='$enl' and `dob` ='$dob'";
    $result  = $con->query($query);
    $row = mysqli_fetch_array($result);
    $count = mysqli_num_rows($result);
    if($count == 1) {
        $_SESSION['login'] = $enl;
        $_SESSION['course'] = $row['course'];
        header("location: index.php");
    }else {
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
                    <a class="navbar-brand trigger" href="/" title="LearnMate"><img alt="Logo" src="https://iimsr.net.in/images/logo/logo.jpeg"></a>
                </div>
                <div class="col-md-7 col-sm-7 col-lg-7 col-xs-7 pull-xs-right">
                    <div id="dl-menu" class="dl-menuwrapper">
                        <button class="dl-trigger visible-sm visible-xs"><i class="fa fa-bars"></i></button>
                        <ul class="dl-menu">
                            <li><a href="/">Home</a></li>
                            <li><a href="https://iimsr.net.in/about-us.php">About Us</a></li>
                            <li><a class="trigger" href="#">Courses <i class="fa fa-angle-down"></i></a>
                                <ul class="dl-submenu">
                                    <li><a href="https://iimsr.net.in/design.php">Design</a></li>
                                    <li><a href="https://iimsr.net.in/digital-marketing.php">Digital Marketing</a></li>
                                    <li><a href="https://iimsr.net.in/software-engi.php">After 10th/10+2</a></li>
                                    <li><a href="https://iimsr.net.in/technical-software.php">Technical & Software</a></li>
                                    <li><a href="https://iimsr.net.in/management.php">Management</a></li>
                                    <li><a href="https://iimsr.net.in/finance-management.php">Finance Management</a></li>
                                    <li><a href="https://iimsr.net.in/tourism-management.php">Tourism Management</a></li>
                                </ul>
                            </li>
                            <li><a class="trigger" href="https://iimsr.net.in/contact-us.php">Contact us</a></li>
                            <li><a class="trigger btn btn-primary OnlineClass" href="#">Online Classes</a></li>
                        </ul>
                    </div>
                    <div class="main_menu_wrap">
                        <ul class="main_menu">
                            <li><a class="trigger" href="/">Home</a></li>
                            <li><a class="trigger" href="https://iimsr.net.in/about-us.php">About Us</a></li>
                            <li><a class="trigger" href="#">Courses <i class="fa fa-angle-down"></i></a>
                                <ul class="submenu">
                                    <li><a href="https://iimsr.net.in/design.php">Design</a></li>
                                    <li><a href="https://iimsr.net.in/digital-marketing.php">Digital Marketing</a></li>
                                    <li><a href="https://iimsr.net.in/software-engi.php">After 10th/10+2</a></li>
                                    <li><a href="https://iimsr.net.in/technical-software.php">Technical & Software</a></li>
                                    <li><a href="https://iimsr.net.in/management.php">Management</a></li>
                                    <li><a href="https://iimsr.net.in/finance-management.php">Finance Management</a></li>
                                    <li><a href="https://iimsr.net.in/tourism-management.php">Tourism Management</a></li>
                                </ul>
                            </li>
                            <li><a class="trigger" href="https://iimsr.net.in/contact-us.php">Contact us</a></li>
                            <li><a class="trigger btn btn-primary OnlineClass" id="OnlineClas" href="#">Online Classes</a></li>
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
        <button data-toggle="modal" data-target="#myModal" type="button" class="btn btn-primary btn-block OnlineLogins">Logins</button>
        <a href="#videolectures"><button class="btn btn-primary btn-block OnlineVideo">Video Lectures</button></a>
        <a href="#pptlectures"><button class="btn btn-primary btn-block OnlinePPT">PPT Lectures</button></a>
        <a href="prospectus/Prospectus.pdf" target="_blank"><button class="btn btn-primary btn-block OnlineProspectus">IIMSR Prospectus</button></a>
        <a href="/online-exam"><button class="btn btn-primary btn-block OnlineExam">Online Examination</button></a>
        <button id="mynewBtn" class="btn btn-primary btn-block OnlineImportant">Important Dates</button>
        <button id="GstCompliance" class="btn btn-primary btn-block OnlineGST">GST* Compliance</button>
    </div>
</div>
<div class="container">
      <div class="row">
    	  <div class="col-sm-12">
    		 <h2 class="h2 font-weight-bold text-uppercase text-center my-5">Our Services</h2>
    	  </div>
      </div>
      <div class="row">
    	<div class="col-sm-12">
    	  <div class="carousel box-carousel d-none d-sm-block">
    		  <div class="box">
    			<a href="https://www.digitalus.com/" ><i class="fa fa-3x fa-laptop" aria-hidden="true"></i><br>Web Design</a>
    		  </div>
    		  <div class="box">
    			<a href="https://www.solodev.com/product/host.stml" ><i class="fa fa-3x fa-cloud" aria-hidden="true"></i><br>Cloud Hosting</a>
    		  </div>
    		  <div class="box">
    			<a href="https://www.solodev.com/" ><i class="fa fa-3x fa-users" aria-hidden="true"></i><br>WXP</a>
    		  </div>
    		  <div class="box">
    			<a href="https://www.solodev.com/product/engage.stml" ><i class="fa fa-3x fa-line-chart" aria-hidden="true"></i><br>Marketing</a>
    		  </div>
    		  <div class="box">
    			<a href="https://www.solodev.com/product/engage.stml"><i class="fa fa-3x fa-code" aria-hidden="true"></i><br>SEO</a>
    		  </div>
    		<div class="box">
    			<a href="https://www.digitalus.com/" ><i class="fa fa-3x fa-laptop" aria-hidden="true"></i><br>Web Design</a>
    		  </div>
    		  <div class="box">
    			<a href="https://www.solodev.com/product/host.stml" ><i class="fa fa-3x fa-cloud" aria-hidden="true"></i><br>Cloud Hosting</a>
    		  </div>
    		  <div class="box">
    			<a href="https://www.solodev.com/" ><i class="fa fa-3x fa-users" aria-hidden="true"></i><br>WXP</a>
    		  </div>
    		  <div class="box">
    			<a href="https://www.solodev.com/product/engage.stml" ><i class="fa fa-3x fa-line-chart" aria-hidden="true"></i><br>Marketing</a>
    		  </div>
    		  <div class="box">
    			<a href="https://www.solodev.com/product/engage.stml"><i class="fa fa-3x fa-code" aria-hidden="true"></i><br>SEO</a>
    		  </div>
    		</div><!-- carousel-->
    	</div><!--col-->
    </div><!--row-->
</div>
<div id="OnlineClasses" class="onlinemodal">
    <div class="onlinemodal-content">
        <span class="onlineclose">×</span>
        <div class="row">
            <div class="col-sm-2 col-md-2 col-lg-2 col-xs-12"></div>
            <div class="col-sm-8 col-md-8 col-lg-8 col-xs-12"><h5 class="ClassOnli">Information for online classes : </h5></div>
            <div class="col-sm-2 col-md-2 col-lg-2 col-xs-12"></div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-xs-12">
                <span class="IimsrClass">
                    <p class="ImportanceNoti">Dear Students, please participate in online classes as attendance ratio is going low. For further clarifications please contact.</p>
                    <p class="Classmess"><i class="fa fa-spinner fa-spin" aria-hidden="true"></i> E-mail : info@iimsr.net.in</p>
                    <hr>
                    <h4>Timing : </h4>
                    <p class="ImportanceNoti"><i class="fa fa-spinner fa-spin" aria-hidden="true"></i> Weekdays(Monday to Friday): 6 pm to 8 pm</p>
                    <p class="ImportanceNoti"><i class="fa fa-spinner fa-spin" aria-hidden="true"></i> Weekends(Saturday/Sunday): 2 pm to 4 pm</p>
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
            <div class="col-sm-8 col-md-8 col-lg-8 col-xs-12"><h5 style="text-align:center;">Exam Dates for: 2022-23</h5></div>
            <div class="col-sm-2 col-md-2 col-lg-2 col-xs-12"></div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-xs-12">
                <ul>
                    <li class="importnot"><span style='font-size:16px;color:#000;'>&#8594;</span> Last Date of issuance of Admit Card <span class="importdates">'10th March 2022'</span> </li>
                    <li class="importnot"><span style='font-size:16px;color:#000;'>&#8594;</span> Starting Date of Examination for Technical Courses <span class="importdates">'15th March 2022'</span> </li>
                    <li class="importnot"><span style='font-size:16px;color:#000;'>&#8594;</span> Starting Date of Examination for Management Courses <span class="importdates">'17th March 2022'</span> </li>
                    <li class="importnot"><span style='font-size:16px;color:#000;'>&#8594;</span> Starting Date of Examination of Courses other than Management & Technical <span class="importdates">'20th March 2022'</span></li>
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
            <div class="col-sm-8 col-md-8 col-lg-8 col-xs-12"><h5 style="text-align:center;" class="Gstimportant">Important Notice</h5></div>
            <div class="col-sm-2 col-md-2 col-lg-2 col-xs-12"></div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-xs-12">
                <span class="Compliancevbimt">Dear students of IIMSR, please understand that GST is mandatory for all students and no negotiations will be done on this part as this is govt tax. We expect everything free from govt starting from Hospital/Education/Social security but when it comes to tax we intend to avoid that and then claim our country is poor because of politicians and get rid of our responsibilities. So please be a part in the growth story of India by paying suitable taxes.</span>
            </div>
        </div>
    </div>
</div>
<!----GST Compliance----->
<div id="myreModal" class="modaal">
    <div class="modaal-content">
        <div class="modaal-header">
            <a class="vbimt-popup" href="/"><img src="https://iimsr.net.in/images/logo/logo.jpeg" style="height:60px;margin: 0px 0px 0px 0px;"></a>
            <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        <div style="text-align:center; "></div>
        <center><h2> Result </h2></center>
        <p class="KindlyLog">Kindly Enter your credentials to access the Result </p>
        <form class="form" action="result.php" method="post">
            <div class="form-group">
                <input type="text" class="form-control Credentials" name="enrolment" placeholder="Enrolment*" value="" required>
            </div>
            <div class="form-group">
                <input type="dob" class="form-control Credentials" name="dob" id="dob" placeholder="Date of Birth" value="" required>
            </div>
            <div class="form-group center-block">
                <center><button type="submit" name="login" class="btn btn-info btn-block Credentials" style="padding: 4px 30px 4px 30px;">Submit</button></center>
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
                <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
                    <span>
                        <a href="/admin" target="_block">
                            <img class="vbi-openmodel" style="width:100px;height:100px; margin-left: -15px;" src="https://iimsr.net.in/images/OP.png" alt="vbimt login">
                            <br>Admin Login
                        </a>
                    </span>
                    <span>
                        <a href="/"  target="_block">
                        <img class="vbi-openmodel" style="width:100px;height:100px;" src="https://iimsr.net.in/images/outputbooks-256.png" alt="vbimt login">
                        <br>Books Login
                        </a>
                    </span>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
                    <span>
                        <a href="/users"  target="_block">
                            <img class="vbi-openmodel" style="width:100px;height:100px;" src="https://iimsr.net.in/images/user-login-icon-29.png" alt="vbimt login">
                            <br>Student Login
                        </a>
                    </span>
                    <span>
                        <a href="/"  target="_block">
                            <img class="vbi-openmodel" style="width:100px;height:100px;" src="https://iimsr.net.in/images/vbimt-videoclass.png" alt="vbimt login">
                            <br>Video Class Login
                        </a>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var thumbs1 = document.getElementById("thumbnail-slider");
    var thumbs2 = document.getElementById("thumbs2");
    var closeBtn = document.getElementById("closeBtn");
    var slides = thumbs1.getElementsByTagName("li");
    for (var i = 0; i < slides.length; i++) {
        slides[i].index = i;
        slides[i].onclick = function (e) {
            var li = this;
            var clickedEnlargeBtn = false;
            if (e.offsetX > 220 && e.offsetY < 25) clickedEnlargeBtn = true;
            if (li.className.indexOf("active") != -1 || clickedEnlargeBtn) {
                thumbs2.style.display = "block";
                mcThumbs2.init(li.index);
            }
        };
    }

    thumbs2.onclick = closeBtn.onclick = function (e) {
        thumbs2.style.display = "none";
    };
</script>
<style>
.box {
  width: 227px;
  height: 227px;
  background-color: #f6f6f6;
}  
.box a {
  color: #461e52;
  display: block;
  width: 100%;
  height: 100%;
  font-size: 22px;
  font-weight: 700;
  padding: 30% 30px 0 30px;
  text-align: center;
  transition: none;
  line-height: 1;
  font-family: 'Open Sans Condensed', Arial, Verdana, sans-serif;
}
.box:hover{
  background-color: #461e52;
}
.box:hover a{
 color:#fff;
 text-decoration:none;
}
.mission-next-arrow {
  position: absolute;
  background: url(https://raw.githubusercontent.com/solodev/icon-box-slider/master/nextarrow2.png) no-repeat center;
  background-size: contain;
  top: 50%;
  transform: translateY(-50%);
  right: -36px;
  height: 17px;
  width: 10px;
  border:none;
}
.mission-next-arrow:hover {
  cursor: pointer;	
}
.mission-prev-arrow {
  background: url(https://raw.githubusercontent.com/solodev/icon-box-slider/master/prevarrow2.png) no-repeat center;
  background-size: contain;
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  left: -36px;
  height: 17px;
  width: 10px;
  border:none;
} 
.mission-prev-arrow:hover {
  cursor: pointer;	
}
.box a.more-links {
  color: #fff;
  padding: 70px 110px 0 20px;
  background: #a89269 url(https://raw.githubusercontent.com/solodev/icon-box-slider/master/rightarrow.png) no-repeat 155px 170px;
}

</style>
<script>
$( document ).ready(function() {
   	$('.box-carousel').slick({
		dots: false,
		arrows: true,
		slidesToShow: 5,
		slidesToScroll: 1,
		prevArrow: "<button type='button' class='mission-prev-arrow'></button>",
		nextArrow: "<button type='button' class='mission-next-arrow'></button>"
	});

});

</script>
<!----Online Classes Compliance--->
<script>
	var onlinemodal = document.getElementById("OnlineClasses");
	var btn = document.getElementById("OnlineClas");
	var span = document.getElementsByClassName("onlineclose")[0];
	btn.onclick = function() {
	  onlinemodal.style.display = "block";
	}
	span.onclick = function() {
	  onlinemodal.style.display = "none";
	}
	window.onclick = function(event) {
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
	btn.onclick = function() {
	  gstmodal.style.display = "block";
	}
	span.onclick = function() {
	  gstmodal.style.display = "none";
	}
	window.onclick = function(event) {
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
	btn.onclick = function() {
	  newmodal.style.display = "block";
	}
	span.onclick = function() {
	  newmodal.style.display = "none";
	}
	window.onclick = function(event) {
	  if (event.target == newmodal) {
		newmodal.style.display = "none";
	  }
	}
</script>
<script>
    var modal = document.getElementById("myreModal");
    var btn = document.getElementById("myBtn");
    var span = document.getElementsByClassName("close")[0];
    btn.onclick = function() {
        modal.style.display = "block";
    }
    span.onclick = function() {
        modal.style.display = "none";
    }
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    function closesfsdf(){
        $(".navbar-collapse").removeClass("show");
    }
</script>