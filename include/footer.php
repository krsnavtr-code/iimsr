<?php 

include("dbconnection.php");

if(isset($_POST['enquiry'])){

    $fname = $_POST['fname'];

    $fname = mysqli_real_escape_string($con, $fname);

    $lname = $_POST['lname'];

    $lname = mysqli_real_escape_string($con, $lname);

    $name = $fname." ".$lname;

    $name = mysqli_real_escape_string($con, $name);

    $phone =(int) $_POST['phone'];

    $phone = mysqli_real_escape_string($con, $phone);

    $email = $_POST['email'];

    $email = mysqli_real_escape_string($con, $email);

    $course = $_POST['course'];

    $course = mysqli_real_escape_string($con, $course);

    $coursewant = $_POST['coursewant'];

    $coursewant = mysqli_real_escape_string($con, $coursewant);

    $query = mysqli_query($con,"INSERT INTO `enquiries`(`name`, `phone`, `email`, `courses`, `other_course`) VALUES('$name', $phone, '$email','$course','$coursewant')");

    if($query){

        $dadtmani = "<table style='border:#000 0px solid;'>

            <tr>

                <td style=''>

                    <tr>

                        <td style='border:#000 1px solid;'>Name</td>

                        <td style='border:#000 1px solid;'>".$name."</td>

                    </tr> 

                    <tr>

                        <td style='border:#000 1px solid;'>Mobile No</td>

                        <td style='border:#000 1px solid;'>".$phone."</td>

                    </tr> 

                    <tr>

                        <td style='border:#000 1px solid;'>Email</td>

                        <td style='border:#000 1px solid;'>".$email."</td>

                    </tr>    

                    <tr>    

                        <td style='border:#000 1px solid;'>Course</td>

                        <td style='border:#000 1px solid;'>".$course."</td>

                    </tr>    

                    <tr>    

                        <td style='border:#000 1px solid;'>Other Course</td>

                        <td style='border:#000 1px solid;'>".$coursewant."</td>

                    </tr>

                </td>

            </tr>

        </table>

        <img src='https://iimsr.net.in/images/logo.jpeg' style='width: 250px; height: 70px;'>

        <p>

        <span style='color:#500050'>For Admission : </span><strong style='color:#000026'>info@iimsr.net.in</strong><br>

        <span style='color:#500050'>For Verification &amp; Fee : </span><strong style='color:#000026'>info@iimsr.net.in</strong><br>

        <span style='color:#500050'>Email: </span><strong style='color:#000026'><a href='mailto:info@iimsr.net.in' rel='noreferrer' target='_blank'>info@iimsr.net.in</a></strong><br>

        <span style='color:#500050'>Website : </span><a href='https://iimsr.net.in' style='text-decoration:none' rel='noreferrer' target='_blank' data-saferedirecturl='https://www.google.com/url?q=https://iimsr.net.in&amp;source=gmail&amp;ust=1591852093685000&amp;usg=AFQjCNHDR5wbJRaaq0RfkyBNWK71E_kyOA'><strong>www.iimsr.net.in</strong></a> .

        </p>";

        $subject = "your enquiry has been submited. ";

        $headers = array("From: iimsrquery@iimsr.net.in",

            "Reply-To: replyto@iimsr.net.in",

            "X-Mailer: PHP/" . PHP_VERSION,

            "Content-type: text/html; charset=iso-8859-1",

            "Cc: anand24h@gmail.com"

        );
       

        $headers = implode("\r\n", $headers);

        mail('anand24h@gmail.com', $subject, $dadtmani, $headers);

        if($query){

    		echo"<script> alert('Thank You...! Your Query Submitted successfully'); </script>";

    	}else{

    		echo"<script> alert('Oops...! Something went wrong');</script>";

    	}

    }

} 

?>

<footer class="footer">

    <div class="container">

        <div class="row">

            <div class="footer_link_wrapper">

                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">

                    <ul class="footer_list">

                        <li>

                            <div class="footer_logo"><img alt="Footer Logo" src="https://iimsr.net.in/images/logo/logo.jpeg"></div>

                            <div class="footer_txt"><p style="text-align:justify;">People need skills, and it is the vision of this institute to provide skills, at affordable rates, to the many previously disadvantaged individuals in India. To capacitate and produce a competent workforce that will compete favourably in the job market.</p></div>

                            <div class="footer_email"><i class="fa fa-envelope"></i> <a href="mailto:abcxyz@abc.com">info@iimsr.net.in</a></div>

                            <!--<div class="footer_phone"><i class="fa fa-phone"></i> +91 8595113493</div>-->

                            <div class="social_links">

                                <a href="#" target="_blank" rel="external nofollow" title="Share it"><i class="fa fa-facebook"></i></a>

                                <a href="#" target="_blank" rel="external nofollow" title="Tweet it"><i class="fa fa-twitter"></i></a>

                                <a href="#" target="_blank" rel="external nofollow" title="Linked it"><i class="fa fa-linkedin"></i></a>

                            </div>

                        </li>

                    </ul>

                </div>

                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">

                    <ul class="footer_list">

                        <li>

                            <h3>Course Category</h3>

                            <ul class="foot_letnews_list">

                                <?php 

                					$get_cat = "SELECT * FROM CourseCategory ORDER BY RAND() LIMIT 3";

                					$cat_run = mysqli_query($con, $get_cat);

                					while($cat_row = mysqli_fetch_array($cat_run)){

                						$status = $cat_row['CatStatus'];

                					    if($status == 1){

                				?>

                                <li>

                                    <div class="foot_letnews_img"><a href="<?php echo $cat_row['CourseLink']; ?>"><img alt="" src="https://iimsr.net.in/images/course-category/<?php echo $cat_row['CatImage']; ?>"></a></div>

                                    <div class="foot_letnews_info">

                                        <a href="<?php echo $cat_row['CourseLink']; ?>"><h4 style="color:#fff;"><?php echo substr($cat_row['Catdescri'],0, 30); ?></h4></a>

                                        <a href="<?php echo $cat_row['CourseLink']; ?>"><em><?php echo $cat_row['CatName']; ?></em></a>

                                    </div>

                                </li>

                                <?php } } ?>

                            </ul>

                        </li>

                    </ul>

                </div>

                <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">

                    <ul class="footer_list">

                        <li>

                            <h3>IIMSR Info</h3>

                            <ul class="footer_sublist">

                                <li><a href="https://iimsr.net.in/all-course.php" title="About">All Courses</a></li>

                                <li><a href="https://iimsr.net.in/about-us.php" title="About">About</a></li>

                                <li><a href="https://iimsr.net.in/security.php" title="Courses">Security</a></li>

                                <li><a href="https://iimsr.net.in/overview.php" title="Blog">Overview</a></li>

                                <li><a href="https://iimsr.net.in/quality-policy.php" title="Gallery">Quality Policy</a></li>

                                <li><a href="https://iimsr.net.in/career.php" title="career">Career at IIMSR</a></li>

                                <li><a href="https://iimsr.net.in/contact-us.php" title="Contact">Contact us</a></li>

                                <li><a href="https://iimsr.net.in/why-iimsr.php" title="Become a Teacher">Why IIMSR</a></li>

                            </ul>

                        </li>

                    </ul>

                </div>

                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 padd_rnone">

                    <div class="foot_gallery">

                        <h3>Why Choose Us</h3>

                        <ul class="footer_sublist">

                            <li><a href="https://iimsr.net.in/course-benefits.php" title="About">Course Benefits</a></li>

                            <li><a href="https://iimsr.net.in/case-study-focus.php" title="Courses">Case Study Focus</a></li>

                            <li><a href="https://iimsr.net.in/education-methodology.php" title="Blog">Education Methodology</a></li>

                            <li><a href="https://iimsr.net.in/pedagogy.php" title="Gallery">Pedagogy</a></li>

                            <li><a href="https://iimsr.net.in/accreditation-recognition-certifications.php" title="career">Accreditation Recognition Certifications</a></li>

                            <li><a href="https://iimsr.net.in/contact-us.php" title="Contact">Franchise Enquiry</a></li>

                            <!--<li><a href="https://iimsr.net.in/block-make-payment.php"><button class="btn btn-warning btn-block" id="myBtn" style="border-radius: 0px;" target="_blank">Make Payment</button></a></li>-->

                        </ul>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="copyright">

        <div class="container">

            <div class="row">

                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 coppyright_txt"> <a target="_blank" href="https://iimsr.net.in">Copyright @2013 by iimsr.net.in All Rights Reserved.IIMSR</a> </div>

                <div class="time_available col-lg-3 col-md-3 col-sm-6 col-xs-6"><i class="fa fa-clock-o"></i> Mon - Sat &nbsp;&nbsp;(9:30am - 6pm) &nbsp;&nbsp;&nbsp;&nbsp;</div>

                <div class="social col-lg-3 col-md-3 col-sm-6 col-xs-6">

                    <ul class="pull-right">

                        <li><a href="https://iimsr.net.in/faqs.php">FAQ's</a></li>

                        <li><a href="https://iimsr.net.in/terms-of-uses.php">Terms and Condition</a></li>

                        <li><a href="https://iimsr.net.in/privacy-policy.php">Privacy Policy</a></li>

                    </ul>

                </div>

            </div>

        </div>

    </div>

</footer>

<?php

if( !isset($_SESSION['timeset'])){

if(empty($_POST['phone'] ) ){ ?>

<div class="container">

    <div class="row">

        <div id="ac-wrapper" class="PopupForm">

            <div id="popup" class="PopupFor">

                <center>

                    <form action="/" method="post" class="Formont" name="enquiryform" onsubmit="return validateForm()">

                        <img src="https://iimsr.net.in/images/logo/logo.jpeg" class="Logoclass" style="height:50px;">

                        <h2 class="PopupFormm">Please find your subject</h2>

                        <div class="row">

                            <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">

                                <input type="text" name="fname" id="name" class="form-control QueryFormm" style="border: #2037bf61 1px solid;" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" placeholder="First Name" required>

                            </div>

                        </div>

                        <div class="row">    

                            <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">

                                <input type="text" name="lname" class="form-control QueryFormm" id="name" style="border: #2037bf61 1px solid;" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" placeholder="Last Name" required>

                            </div>

                        </div>

                        <input type="text" maxlength="10" class="form-control QueryFormm" id="phone" pattern="\d{10}" name="phone" style="border: #2037bf61 1px solid;" title="Please enter exactly 10 digits" placeholder="Phone Number">

                        <input type="email" class="form-control QueryFormm" id="email" placeholder="Your Email" name="email" style="border: #2037bf61 1px solid;" required>

                        <select name="course" class="form-control QueryFormm" id="selectBox" onchange="changeFunc();" style="border: #2037bf61 1px solid;">

                            <option value="" disable selected>Please Select Course:</option>

                            <?php 

                                $sqlquery = mysqli_query($con, "SELECT * FROM `course`");

                                $num = mysqli_num_rows($sqlquery);

                                $array = array();

                                while($row = mysqli_fetch_array($sqlquery)){

                                    if(!in_array($row['course'], $array)){

                                        $array[] = $row['course'];  

                                    }

                                }

                                foreach($array as $submitcourse){

                            ?>

                                <option value="<?php echo $submitcourse; ?>"><?php echo $submitcourse; ?></option>

                            <?php } ?>

                            <option value="other">Other</option>

                        </select>

                        <input type="text" name="coursewant" placeholder="Course Interested In" class="form-control QueryFormm" style="display: none;border: #2037bf61 1px solid;margin-top: 3px;" id="textboxes">

                        <div class="row">

                            <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">

                                <button type="submit" name="submit" class="btn btn-primary btn-block cancelForm" value="" onClick="PopUp()" />Close</button>

                            </div>

                            <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">

                                <button type="submit" name="enquiry" class="btn btn-primary btn-block SubmitForm" style="margin-top: 0px;">Submit</button>

                            </div>    

                        </div>    

                    </form>

                </center>

            </div>

        </div>

    </div>

</div>

<?php } } ?>

<script>

   function PopUp(){

        document.getElementById('ac-wrapper').style.display="none"; 

    }

</script>

<script>

   $(document).ready(function(){

        $("#popupForm").modal('show');

        $('header').css('posistion','inherit');

    });

    function closeForm(){

        $("#popupForm").modal('hide');

    }

    function validateForm() {

      var x = document.forms["enquiryform"]["naame"].value;

      if (x == "") {

        alert("Name must be filled out");

        return false;

      }

      

      var y = document.forms["enquiryform"]["phone"].value;

      if (y == "") {

        alert("Phone number must be filled out");

        return false;

      }

      var z = document.forms["enquiryform"]["course"].value;

      if (z == "") {

        alert("Course name must be filled out");

        return false;

      }

    }

</script>

<div class="offcanvas_overlay"></div>

<script type="text/javascript" src="https://iimsr.net.in/js/jquery-3.1.0.min.js"></script>

<script type="text/javascript" src="https://iimsr.net.in/js/modernizr.custom.js"></script>

<script type="text/javascript" src="https://iimsr.net.in/js/jquery.dlmenu.js"></script>

<script type="text/javascript" src="https://iimsr.net.in/js/bootstrap.min.js"></script>

<script type="text/javascript" src="https://iimsr.net.in/js/bootstrap-select.js"></script>

<script type="text/javascript" src="https://iimsr.net.in/js/jquery-plugin-collection.js"></script>

<script type="text/javascript" src="https://iimsr.net.in/js/jquery.backstretch_video.min.js"></script>

<script type="text/javascript" src="https://iimsr.net.in/js/owl-carousel.js"></script>

<script type="text/javascript" src="https://iimsr.net.in/js/rev/jquery.themepunch.tools.min.js"></script>

<script type="text/javascript" src="https://iimsr.net.in/js/rev/jquery.themepunch.revolution.min.js"></script>

<script type="text/javascript" src="https://iimsr.net.in/js/rev/revolution.extension.actions.min.js"></script>

<script type="text/javascript" src="https://iimsr.net.in/js/rev/revolution.extension.carousel.min.js"></script>

<script type="text/javascript" src="https://iimsr.net.in/js/rev/revolution.extension.kenburn.min.js"></script>

<script type="text/javascript" src="https://iimsr.net.in/js/rev/revolution.extension.layeranimation.min.js"></script>

<script type="text/javascript" src="https://iimsr.net.in/js/rev/revolution.extension.migration.min.js"></script>

<script type="text/javascript" src="https://iimsr.net.in/js/rev/revolution.extension.navigation.min.js"></script>

<script type="text/javascript" src="https://iimsr.net.in/js/rev/revolution.extension.parallax.min.js"></script>

<script type="text/javascript" src="https://iimsr.net.in/js/rev/revolution.extension.slideanims.min.js"></script>

<script type="text/javascript" src="https://iimsr.net.in/js/rev/revolution.extension.video.min.js"></script>

<script type="text/javascript" src="https://iimsr.net.in/js/timecircles.js"></script>

<script type="text/javascript" src="https://iimsr.net.in/js/main.js"></script>

<script type="text/javascript" src="https://iimsr.net.in/js/js-functions.js"></script>

<script type="text/javascript" src="https://iimsr.net.in/js/rev_slider.js"></script>

</body>

</html>