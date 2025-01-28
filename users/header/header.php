<?php
$enro = $_SESSION['login'];
$course = $_SESSION['course'];
include("dbconnection.php");

if(isset($_SESSION['enrolment'])){
    $query = mysqli_query($con, "select * from register_here  where `enrolment`='$enro'");
    $result = mysqli_fetch_array($query);

    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   {
        $url = "https://"; 
    }
    else {
         $url = "http://";
    }
    $url.= $_SERVER['HTTP_HOST'];   
    $url= $_SERVER['REQUEST_URI']; 
}
?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="robots" content="Index, Follow" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="css/csss.css" />	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="js/vbimtlandingpage.js"></script>
</head>
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
            <div id="zone-bar" class="content">
                <label for="show-menu" class="show-menu meeeee">Show Menu</label>
                <input type="checkbox" id="show-menu" role="button">
                <ul id="meddnu">
                    <li class="<?php if($url=='/users/index.php'){ echo'active'; } ?>">
                        <a href="index.php" class="homeclass"><span>Home<em class="opener-technology"></em></span></a>
                    </li>
                    <li class="<?php if($url=='/users/status.php'){ echo'active'; } ?>">
                        <a href="status.php" class="homeclass1"><span>Status<em class="opener-science"></em></span></a>
                    </li>
                    <li class="<?php if($url=='/users/payment-slip.php'){ echo'active'; } ?>">
                        <a href="payment-slip.php" class="homeclass2"><span>Payment Slip<em class="opener-gaming"></em></span></a>
                    </li>
                    <li class="<?php if($url=='/users/admit-card.php'){ echo'active'; } ?>">
                        <a href="admit-card.php" class="homeclass3"><span>Admit Card<em class="opener-sports"></em></span></a>
                    </li>
                    <!--<li class="<?php //if($url=='/users/admission-letter.php'){ echo'active'; } ?>">
                        <a href="admission-letter.php" class="homeclass4"><span>Admission Letter<em class="opener-sports"></em></span></a>
                    </li>-->
                    <li class="<?php if($url=='/users/admission-confirmation.php'){ echo'active'; } ?>">
                        <a href="admission-confirmation.php" class="homeclass5"><span>Admission Confirmation<em class="opener-sports"></em></span></a>
                    </li>
                    
                    <li class="<?php if($url=='/users/testimonial.php'){ echo'active'; } ?>">
                        <a href="testimonial.php"><span>Your Review<em class="opener-sports"></em></span></a>
                    </li>
                    <li class="<?php if($url=='/users/ChangePassword.php'){ echo'active'; } ?>">
                        <a href="ChangePassword.php"><span>Change Password<em class="opener-gaming"></em></span></a>
                    </li>
                    <!--<li class="<?php// if($url=='/users/videos.php'){ echo'active'; } ?>">
                        <a href="#"><span>Videos<em class="opener-gaming"></em></span></a>
                    </li>-->
                    <!--<li class="<?php// if($url=='/users/examination-details.php'){ echo'active'; } ?>">
                        <a href="#"><span>Examination Details<em class="opener-sports"></em></span></a>
                    </li>-->
                </ul>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12 Users12ClWelcome">
            <div class="row">
                <div class="col-sm-4 col-md-4 col-lg-4 col-xs-12">
                    <h4 class="UsersClWelcome">WELCOME TO IIMSR</h4>
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4 col-xs-12">
                    <h4 class="UsersClDetails">Hi <?php echo $result['name']; ?></h4>
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4 col-xs-12">
                    <h4 class="UsersEnrolment">Enrolment :<?php echo $enro; ?></h4>
                </div>
            </div>
        </div>
    </div>
    <style>
        @media(max-width:992px){
            .floatleft.AdminPanelLogo {
                width: 172px !important;
                height: auto !important;
                margin: 5px 0px 0px 0px !important;
            }
        }
        /**-------------------------------------**/
        ul {
            list-style-type:none;
            margin:0;
            padding:0;
            position: absolute;
        	z-index: 9;
        }
        li {
            display:inline-block;
            float: left;
            margin-right: 1px;
        }
        li a {
            display:block;
            min-width:155px;
            height: 32px;
            text-align: center;
            line-height: 34px;
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            color: #fff;
            background: #2f3036;
            text-decoration: none;
        	text-transform: uppercase;
        	font-size:13px;
        	border-bottom: 1px dotted #547787;
            -webkit-transition: color 0.2s linear, background 0.2s linear;
            -moz-transition: color 0.2s linear, background 0.2s linear;
            -o-transition: color 0.2s linear, background 0.2s linear;
            transition: color 0.2s linear, background 0.2s linear;
        }
        li:hover a {
            background: #337ab7;
        	color:#fff !important;
        	text-decoration: none;
        }
        li:hover ul a {
            background: #2f3036;
            color: #2f3036;
            height: 40px;
            line-height: 40px;
        	font-size: 12px;
        	text-decoration: none;
        }
        li:hover ul a:hover {
            background: #337ab7;
            color: #000;
        	text-decoration: none;
        }
        li ul {
            display: none;
        }
        li ul li {
            display: block;
            float: none;
        }
        li ul li a {
            width: auto;
            min-width: 100px;
            padding: 0 20px;
            height: 30px !important;
            line-height: 30px !important;
        }
        ul li a:hover + .hicdden, .hicdden:hover {
            display: block;
        }
        .show-menu {
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            text-decoration: none;
            color: #fff;
            background: #2f3036;
            text-align: center;
            padding: 10px 0;
            display: none;
        }
        input[type=checkbox]{
            display: none;
        }
        input[type=checkbox]:checked ~ #meddnu{
            display: block;
        }
        @media screen and (max-width : 760px){
            ul {
                position: static;
                display: none;
            }
            li {
                margin-bottom: 1px;
            }
            ul li, li a {
                width: 100%;
        		background-color: #337ab7;
            }
            .show-menu {
                display:block;
            }
        }
        li a.homeclass {
            min-width: 62px;
        }
        li a.homeclass1 {
            min-width: 66px;
        }
        li a.homeclass2 {
            min-width: 108px;
        }
        li a.homeclass3 {
            min-width: 105px;
        }
        li a.homeclass4 {
            min-width: 146px;
        }
        li a.homeclass5 {
            min-width: 192px;
        }
        @media(max-width:992px){
        	.meeeee{
        		margin: 0px 0px 9px 0px !important;
        		/*width: 92px !important;*/
        		padding: 6px 0px 6px 0px !important;
        	}
        	.UsersEnrolment{
        	   margin-top: -22px !important; 
        	}
        }
        /**-------------------------------------**/
        .Users12ClWelcome {
            background-color: #dbdbff;
            margin: 34px 0px 3px 15px;
            padding: 0px 0px 0px 0px;
            width: 1138px;
        }
        .UsersClWelcome{
            text-align:center;
            font-weight: 700; 
            font-size:15px;
            background-color: #dbdbff; 
            padding: 10px;
            color:#160fe8;
            margin-top:3px;
        }
        .UsersEnrolment{
            text-align:center;
            font-weight: 700; 
            font-size:15px;
            background-color: #dbdbff; 
            padding: 10px;
            color:#ff0000;
            margin-top:3px;
        }
        .UsersClDetails{
            text-align:center;
            font-weight: 700; 
            font-size:15px;
            background-color: #dbdbff; 
            padding: 10px;
            color:#160fe8;
            margin-top:3px;
        }
        @media(max-width:992px){
            .Users12ClWelcome {
                background-color: #dbdbff !important;
                margin: 1px 0px 3px 15px !important;
                padding: 0px 0px 0px 0px !important;
                width: 369px !important;
            }
            .UsersClWelcome {
                margin: -7px 0px 0px 0px !important;
            }
            .UsersClDetails{
                text-align:center !important;
                font-weight: 700 !important;
                background-color: #dbdbff !important;
                padding: 10px !important;
                color:#160fe8 !important;
                margin-top:-11px !important;  
            }
            .content {
                margin: 0px 0px 0px 0px !important;
                width: 100% !important;
            }
            .exo-menu > li > a{
            	display:block;
                padding: 7px 2px;
                font-size: 11px;
             }
        	.modaall {
        		display: none;
        		position: fixed !important;
        		z-index: 99999 !important;
        		padding-top: 100px !important;
        		left: 0px !important;
        		top: 8px !important;
        		width: 100% !important;
        		height: 100% !important;
        		overflow: auto !important;
        	}
        	.modaall-content {
        		width: 91% !important;
        	}
        	.ApplicationLogo{
                height: 60px !important;
                margin: 0px 0px 9px 47px !important;
        	}
        }
        
    </style>
    <script>
        function myFunction() {
          var x = document.getElementById("myTopnav");
          if (x.className === "topnav") {
            x.className += " responsive";
          } else {
            x.className = "topnav";
          }
        }
    </script>
</html>
	