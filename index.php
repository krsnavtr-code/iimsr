<?php

include('include/header.php');

include('dbconnection.php');

if (isset($_POST['enquiry'])) {

    $fname = $_POST['fname'];

    $lname = $_POST['lname'];

    $name = $fname . " " . $lname;

    $phone = (int) $_POST['phone'];

    $email = $_POST['email'];

    $course = $_POST['course'];

    $coursewant = $_POST['coursewant'];

    $query = mysqli_query($con, "INSERT INTO `enquiries`(`name`, `phone`, `email`, `courses`,`other_course`) VALUES('$name',$phone,'$email','$course','$coursewant')");

    if ($query) {

        $dadtmani = "<table style='border:#000 0px solid;'>

            <tr>

                <td  style=''>

                    <tr>

                        <td style='border:#000 1px solid;'>Name</td>

                        <td style='border:#000 1px solid;'>" . $name . "</td>

                    </tr> 

                    <tr>

                        <td style='border:#000 1px solid;'>Mobile No</td>

                        <td style='border:#000 1px solid;'>" . $phone . "</td>

                    </tr> 

                    <tr>

                        <td style='border:#000 1px solid;'>Email</td>

                        <td style='border:#000 1px solid;'>" . $email . "</td>

                    </tr>    

                    <tr>    

                        <td style='border:#000 1px solid;'>Course</td>

                        <td style='border:#000 1px solid;'>" . $course . "</td>

                    </tr>    

                    <tr>    

                        <td style='border:#000 1px solid;'>Other Course</td>

                        <td style='border:#000 1px solid;'>" . $coursewant . "</td>

                    </tr>

                </td>

            </tr>

        </table>

        <img src='https://iimsr.net.in/images/logo.jpeg' style='width: 250px; height: 70px;'>

        <p>

        <span style='color:#500050'>For Admission : </span><strong style='color:#000026'>8595113493</strong><br>

        <span style='color:#500050'>For Verification &amp; Fee : </span><strong style='color:#000026'>8595113493</strong><br>

        <span style='color:#500050'>Email: </span><strong style='color:#000026'><a href='mailto:info@iimsr.net.in' rel='noreferrer' target='_blank'>info@iimsr.net.in</a></strong><br>

        <span style='color:#500050'>Website : </span><a href='https://iimsr.net.in' style='text-decoration:none' rel='noreferrer' target='_blank' data-saferedirecturl='https://www.google.com/url?q=https://iimsr.net.in&amp;source=gmail&amp;ust=1591852093685000&amp;usg=AFQjCNHDR5wbJRaaq0RfkyBNWK71E_kyOA'><strong>www.iimsr.net.in</strong></a> .

        </p>";

        $subject = "Hi " . $name . " your enquiry has been submited";

        $headers = array(
            "From: iimsrquery@iimsr.net.in",

            "Reply-To: replyto@iimsr.net.in",

            "X-Mailer: PHP/" . PHP_VERSION,

            "Content-type: text/html; charset=iso-8859-1",

            "Cc: anand24h@gmail.com"

        );

        $headers = implode("\r\n", $headers);

        if (mail("anand24h@gmail.com", $subject, $dadtmani,$headers)) {

            if ($query) {

                echo "<script>

               alert('Data has been Successfully Submitted');

               $('#popupForm').modal('hide');

               </script>";
            }
        } else {

            echo "<script>

               alert('some thing went wrong');

               $('#popupForm').modal('hide');

               </script>";
        }
    }
}

?>

<div class="content_wrapper">

    <div id="slider" class="main_slider">

        <div class="example">

            <div class="content">

                <div id="rev_slider_104_1_wrapper" class="rev_slider_wrapper fullscreen-container" data-alias="scroll-effect76" style="background-color:#111;padding:0px;">

                    <div id="rev_slider_104_1" class="rev_slider fullscreenbanner" style="display:none;" data-version="5.0.7">

                        <ul>

                            <li data-index="rs-309" data-transition="slideoverhorizontal" data-slotamount="default" data-easein="Power4.easeInOut" data-easeout="Power4.easeInOut" data-masterspeed="1000" data-thumb="images/slider-images/Finance-and-Banking.jpg" data-rotate="0" data-fstransition="fade" data-fsmasterspeed="1500" data-fsslotamount="7" data-saveperformance="off" data-title="Education" data-description="">

                                <img src="images/slider-images/Finance-and-Banking.jpg" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="10" class="rev-slidebg" data-no-retina>

                                <div class="tp-caption tp-shape tp-shapewrapper rs-parallaxlevel-0" id="slide-309-layer-11" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-start="0" data-y="['bottom','bottom','bottom','bottom']" data-voffset="['0','0','0','0']" data-width="full" data-height="['725','725','725','875']" data-whitespace="nowrap" data-responsive="off" data-transform_idle="o:1;" data-style_hover="cursor:default;" data-transform_in="opacity:0;s:1500;e:Power2.easeInOut;" data-transform_out="opacity:0;s:1000;s:1000;" data-basealign="slide" data-responsive_offset="off" style="z-index: 5; background-color: rgba(0, 0, 0, 0.50); border-color: rgba(0, 0, 0, 0); background: rgba(0,0,0,0.45);"></div>

                                <div class="tp-caption BigBold-Title tp-resizeme rs-parallaxlevel-0" id="slide-309-layer-1" data-x="['center','center','center','center']" data-hoffset="['50','50','30','17']" data-height="none" data-y="['top','top','top','top']" data-voffset="['100','110','180','160']" data-fontsize="['110','100','70','60']" data-lineheight="['100','90','60','60']" data-width="['none','none','none','400']" data-whitespace="['nowrap','nowrap','nowrap','normal']" data-transform_idle="o:1;" data-mask_in="x:0px;y:[100%];" data-start="500" data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:1500;e:Power3.easeInOut;" data-mask_out="x:inherit;y:inherit;" data-splitin="none" data-splitout="none" data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" data-basealign="slide" data-responsive_offset="off" style="z-index: 6; white-space: nowrap;">A Better Education</div>

                                <div class="tp-caption BigBold-SubTitle rs-parallaxlevel-0" id="slide-309-layer-4" data-x="['center','center','center','center']" data-hoffset="['55','55','33','20']" data-whitespace="normal" data-y="['25','25','25','25']" data-voffset="['40','1','74','58']" data-fontsize="['19','19','19','16']" data-lineheight="['27','27','27','22']" data-width="['410','410','410','280']" data-height="['60','100','100','100']" data-transform_idle="o:1;" data-start="650" data-splitin="none" data-splitout="none" data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:1500;e:Power3.easeInOut;" data-basealign="slide" data-responsive_offset="off" data-transform_out="y:50px;opacity:0;s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" data-responsive="off" style="z-index: 7; min-width: 410px; max-width: 410px; max-width: 60px; white-space: normal;">A Better Education for a Better World, Learn something new today.</div>

                                <div class="tp-caption BigBold-SubTitle rs-parallaxlevel-0" id="slide-309-layer-4" data-x="['center','center','center','center']" data-hoffset="['55','55','33','20']" data-whitespace="normal" data-y="['25','25','25','25']" data-voffset="['40','1','74','58']" data-fontsize="['19','19','19','16']" data-lineheight="['27','27','27','22']" data-width="['410','410','410','280']" data-height="['60','100','100','100']" data-transform_idle="o:1;" data-start="650" data-splitin="none" data-splitout="none" data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:1500;e:Power3.easeInOut;" data-basealign="slide" data-responsive_offset="off" data-transform_out="y:50px;opacity:0;s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" data-responsive="off" style="z-index: 7; min-width: 410px; max-width: 410px; max-width: 60px; white-space: normal;">

                                    <!--<div class="clock">

                                        <div class="face"></div>

                                        <div class="glass">

                                            <div class="pendulum">

                                                <div class="stem"><span class="Foradmissionc">For Admission : info@iimsr.net.in</span><br><span class="Foradmissionc">For Verification : info@iimsr.net.in</span><br><span class="Foradmissionc">Email : info@iimsr.net.in</span></div>

                                                <div class="ball"></div>

                                            </div>

                                            <div class="ball-shadow"></div>

                                        </div>

                                    </div>-->

                                </div>

                            </li>

                            <li data-index="rs-310" data-transition="slideoverhorizontal" data-slotamount="default" data-easein="Power4.easeInOut" data-easeout="Power4.easeInOut" data-masterspeed="1000" data-thumb="images/slider-images/Finance-Banner-6.jpg" data-rotate="0" data-saveperformance="off" data-title="Instructor" data-description="">

                                <img src="images/slider-images/Finance-Banner-6.jpg" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="10" class="rev-slidebg" data-no-retina>

                                <div class="tp-caption tp-shape tp-shapewrapper rs-parallaxlevel-0" id="slide-310-layer-11" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-start="0" data-y="['bottom','bottom','bottom','bottom']" data-voffset="['0','0','0','0']" data-width="full" data-height="['725','725','725','875']" data-whitespace="nowrap" data-responsive="off" data-transform_idle="o:1;" data-style_hover="cursor:default;" data-transform_in="opacity:0;s:1500;e:Power2.easeInOut;" data-transform_out="opacity:0;s:1000;s:1000;" data-basealign="slide" data-responsive_offset="off" style="z-index: 5; background-color: rgba(0, 0, 0, 0.50); border-color: rgba(0, 0, 0, 0); background: rgba(0,0,0,0.45);"></div>

                                <div class="tp-caption BigBold-Title tp-resizeme rs-parallaxlevel-0" id="slide-310-layer-1" data-x="['center','center','center','center']" data-hoffset="['50','50','30','17']" data-height="none" data-y="['top','top','top','top']" data-voffset="['110','110','180','160']" data-fontsize="['100','100','70','60']" data-lineheight="['100','90','60','60']" data-width="['none','none','none','400']" data-whitespace="['nowrap','nowrap','nowrap','normal']" data-transform_idle="o:1;" data-mask_in="x:0px;y:[100%];" data-start="500" data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:1500;e:Power3.easeInOut;" data-mask_out="x:inherit;y:inherit;" data-splitin="none" data-splitout="none" data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" data-basealign="slide" data-responsive_offset="off" style="z-index: 6; white-space: nowrap;">we are ready to help you</div>

                                <div class="tp-caption BigBold-SubTitle rs-parallaxlevel-0" id="slide-310-layer-4" data-x="['center','center','center','center']" data-hoffset="['55','55','33','20']" data-whitespace="normal" data-y="['25','25','25','25']" data-voffset="['40','1','74','58']" data-fontsize="['19','19','19','16']" data-lineheight="['27','27','27','22']" data-width="['410','410','410','280']" data-height="['60','100','100','100']" data-transform_idle="o:1;" data-start="650" data-splitin="none" data-splitout="none" data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:1500;e:Power3.easeInOut;" data-basealign="slide" data-responsive_offset="off" data-transform_out="y:50px;opacity:0;s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" data-responsive="off" style="z-index: 7; min-width: 410px; max-width: 410px;max-width: 60px; white-space: normal;">Focus on Comprehensive Learning </div>

                                <div class="tp-caption BigBold-SubTitle rs-parallaxlevel-0" id="slide-310-layer-4" data-x="['center','center','center','center']" data-hoffset="['55','55','33','20']" data-whitespace="normal" data-y="['25','25','25','25']" data-voffset="['40','1','74','58']" data-fontsize="['19','19','19','16']" data-lineheight="['27','27','27','22']" data-width="['410','410','410','280']" data-height="['60','100','100','100']" data-transform_idle="o:1;" data-start="650" data-splitin="none" data-splitout="none" data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:1500;e:Power3.easeInOut;" data-basealign="slide" data-responsive_offset="off" data-transform_out="y:50px;opacity:0;s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" data-responsive="off" style="z-index: 7; min-width: 410px; max-width: 410px;max-width: 60px; white-space: normal;">

                                    <!--<div class="clock">

                                        <div class="face"></div>

                                        <div class="glass">

                                            <div class="pendulum">

                                                <div class="stem">

                                                    <span class="Foradmissionc">For Admission : info@iimsr.net.in</span><br><span class="Foradmissionc">For Verification : info@iimsr.net.in</span><br><span class="Foradmissionc">Email : info@iimsr.net.in</span>

                                                </div>

                                                <div class="ball"></div>

                                            </div>

                                            <div class="ball-shadow"></div>

                                        </div>

                                    </div>-->

                                </div>

                            </li>

                            <li data-index="rs-311" data-transition="slideoverhorizontal" data-slotamount="default" data-easein="Power4.easeInOut" data-easeout="Power4.easeInOut" data-masterspeed="1000" data-thumb="images/slider-images/professions-finance-banner.jpg" data-rotate="0" data-saveperformance="off" data-title="Learning" data-description="">

                                <img src="images/slider-images/professions-finance-banner.jpg" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="10" class="rev-slidebg" data-no-retina>

                                <div class="tp-caption tp-shape tp-shapewrapper rs-parallaxlevel-0" id="slide-311-layer-11" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-start="0" data-y="['bottom','bottom','bottom','bottom']" data-voffset="['0','0','0','0']" data-width="full" data-height="['725','725','725','875']" data-whitespace="nowrap" data-responsive="off" data-transform_idle="o:1;" data-style_hover="cursor:default;" data-transform_in="opacity:0;s:1500;e:Power2.easeInOut;" data-transform_out="opacity:0;s:1000;s:1000;" data-basealign="slide" data-responsive_offset="off" style="z-index: 5; background-color: rgba(0, 0, 0, 0.50); border-color: rgba(0, 0, 0, 0); background: rgba(0,0,0,0.45);"></div>

                                <div class="tp-caption BigBold-Title tp-resizeme rs-parallaxlevel-0" id="slide-311-layer-1" data-x="['center','center','center','center']" data-hoffset="['50','50','30','17']" data-height="none" data-y="['top','top','top','top']" data-voffset="['110','110','180','160']" data-fontsize="['100','100','70','60']" data-lineheight="['100','90','60','60']" data-width="['none','none','none','400']" data-whitespace="['nowrap','nowrap','nowrap','normal']" data-transform_idle="o:1;" data-mask_in="x:0px;y:[100%];" data-start="500" data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:1500;e:Power3.easeInOut;" data-mask_out="x:inherit;y:inherit;" data-splitin="none" data-splitout="none" data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" data-basealign="slide" data-responsive_offset="off" style="z-index: 6;white-space: nowrap;">Online study material</div>

                                <div class="tp-caption BigBold-SubTitle rs-parallaxlevel-0" id="slide-311-layer-4" data-x="['center','center','center','center']" data-hoffset="['55','55','33','20']" data-whitespace="normal" data-y="['25','25','25','25']" data-voffset="['40','1','74','58']" data-fontsize="['19','19','19','16']" data-lineheight="['27','27','27','22']" data-width="['410','410','410','280']" data-height="['60','100','100','100']" data-transform_idle="o:1;" data-start="650" data-splitin="none" data-splitout="none" data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:1500;e:Power3.easeInOut;" data-basealign="slide" data-responsive_offset="off" data-transform_out="y:50px;opacity:0;s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" data-responsive="off" style="z-index: 7; min-width: 410px; max-width: 520px; max-width: 60px; white-space: normal;">Online Video Lectures | Learning Management Systems</div>

                                <div class="tp-caption BigBold-SubTitle rs-parallaxlevel-0" id="slide-311-layer-4" data-x="['center','center','center','center']" data-hoffset="['55','55','33','20']" data-whitespace="normal" data-y="['25','25','25','25']" data-voffset="['40','1','74','58']" data-fontsize="['19','19','19','16']" data-lineheight="['27','27','27','22']" data-width="['410','410','410','280']" data-height="['60','100','100','100']" data-transform_idle="o:1;" data-start="650" data-splitin="none" data-splitout="none" data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:1500;e:Power3.easeInOut;" data-basealign="slide" data-responsive_offset="off" data-transform_out="y:50px;opacity:0;s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" data-responsive="off" style="z-index: 7; min-width: 410px; max-width: 520px; max-width: 60px; white-space: normal;">

                                    <!--<div class="clock">

                                        <div class="face"></div>

                                        <div class="glass">

                                            <div class="pendulum">

                                                <div class="stem"><span class="Foradmissionc">For Admission : info@iimsr.net.in</span><br><span class="Foradmissionc">For Verification : info@iimsr.net.in</span><br><span class="Foradmissionc">Email : info@iimsr.net.in</span></div>

                                                <div class="ball"></div>

                                            </div>

                                            <div class="ball-shadow"></div>

                                        </div>

                                    </div>-->

                                </div>

                            </li>

                        </ul>

                        <div class="tp-static-layers"></div>

                        <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div id="features" class="features">

        <div class="container">

            <div class="row">

                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                    <div class="feature_block_wrap">

                        <div class="teacher LearnMore">

                            <div class="feature_block">

                                <div class="feature_icon"><i class="icon-group"></i></div>

                                <div class="feature_txt">

                                    <h4>LEARN ANYTHING ONLINE </h4>

                                    <p>We have various creative online courses and classes which are taught by experts to help you learn new skills.</p>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                    <div class="feature_block_wrap">

                        <div class="courses">

                            <div class="feature_block">

                                <div class="feature_icon"><i class="icon-earth"></i></div>

                                <div class="feature_txt">

                                    <h4>Strong Fundamentals</h4>

                                    <p>Our courses are structured in a way to help students to understand the basic concepts related to their courses because we strongly believe in providing quality education.</p>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                    <div class="feature_block_wrap">

                        <div class="certificate">

                            <div class="feature_block">

                                <div class="feature_icon"><i class="icon-certificate"></i></div>

                                <div class="feature_txt">

                                    <h4>Certification</h4>

                                    <p>We offer a vast range of online courses with certification in various fields. These include courses in the field of marketing, technical & management, etc.</p>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="find_course">

        <div class="container">

            <div class="row">

                <div class="find_course_inner">

                    <div class="col-md-8 col-sm-8 col-lg-8 col-xs-12 findcoursetxt">

                        <div class="find_course_txt">

                            <div class="head_part">

                                <h2 class="EducationHead">Offering the best in education to the world</h2>

                                <p class="EducationW">Sign-up today to join over 6 million learners already on IIMSR Worldwide and more than 500+ online courses available.</p>

                            </div>

                            <ul class="course_list">

                                <li class="fundamentals">

                                    <div class="icon"><i class="fa fa-anchor"></i></div>

                                    <div class="course_info">

                                        <h4>Strong Fundamentals</h4>

                                        <p class="EducationW">Our courses are structured in a way to help students to understand the basic concepts related to their courses because we strongly believe in providing quality education.</p>

                                    </div>

                                </li>

                                <li class="even expert">

                                    <div class="icon"><i class="fa fa-user-plus"></i></div>

                                    <div class="course_info">

                                        <h4>Great Instructor</h4>

                                        <p class="EducationW">Our talented team of instructors have come together with a goal to help students or working professionals grow in their careers.</p>

                                    </div>

                                </li>

                                <li class="online second_last">

                                    <div class="icon"><i class="fa fa-desktop"></i></div>

                                    <div class="course_info">

                                        <h4>TALK TO OUR EXPERTS</h4>

                                        <p class="EducationW">If you have any queries or just need an expert's help then reach out to us and consult with our experts anytime.</p>

                                    </div>

                                </li>

                                <li class="even last event">

                                    <div class="icon"><i class="fa fa-street-view"></i></div>

                                    <div class="course_info">

                                        <h4>Contact Details</h4>

                                        <p class="EducationW">

                                            <span><b>For Admission : </b>info@iimsr.net.in</span><br>

                                            <span><b>For Verification : </b>info@iimsr.net.in</span><br>

                                            <span><b>Email : </b>info@iimsr.net.in</span>

                                        </p>

                                    </div>

                                </li>

                            </ul>

                        </div>

                    </div>

                    <div class="col-md-4 col-sm-4 col-lg-4 col-xs-12">

                        <div class="row find_course_form_inner">

                            <h2>Find Course now!</h2>

                            <form action="/" id="form_find_course" method="post" class="Formont" name="enquiryform">

                                <div class="find_course_form">

                                    <input type="text" name="fname" id="name" class="QueryFormm" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" placeholder="First Name" required>

                                    <input type="text" name="lname" id="name" class="QueryFormm" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" placeholder="Last Name" required>

                                    <input type="text" name="phone" id="phone" maxlength="10" class="QueryFormm" pattern="\d{10}" title="Please enter exactly 10 digits" placeholder="Phone Number">

                                    <input type="email" name="email" id="email" class="QueryFormm" placeholder="Your Email" required>

                                    <select name="course" id="selectBox" class="Selectboxx" onchange="changeFunc();">

                                        <option value="" disable selected>Please Select Course:</option>

                                        <?php

                                        $sqlquery = mysqli_query($con, "SELECT * FROM `course`");

                                        $num = mysqli_num_rows($sqlquery);

                                        $array = array();

                                        while ($row = mysqli_fetch_array($sqlquery)) {

                                            if (!in_array($row['course'], $array)) {

                                                $array[] = $row['course'];
                                            }
                                        }

                                        foreach ($array as $submitcourse) {

                                        ?>

                                            <option value="<?php echo $submitcourse; ?>"><?php echo $submitcourse; ?></option>

                                        <?php } ?>

                                        <option value="other">Other</option>

                                    </select>

                                    <input type="text" name="coursewant" placeholder="Course Interested In" class="form-control QueryFormm" style="display: none;border: #2037bf61 1px solid;margin-top: 3px;" id="textboxes">

                                </div>

                                <div class="find_course_form_btn_wrap">

                                    <button type="submit" name="enquiry" class="btn btn-primary btn-block SubmitForm" style="margin-top: 0px;">Submit Query</button>

                                </div>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div id="courses" class="courses">

        <div class="container">

            <div class="head_part">

                <h2>Popular Courses</h2>

                <p>We have over 20 years of experience in education field</p>

            </div>

            <div class="course_wrapper">

                <div class="row">

                    <?php

                    $get_cat = "SELECT * FROM CourseCategory";

                    $cat_run = mysqli_query($con, $get_cat);

                    while ($cat_row = mysqli_fetch_array($cat_run)) {

                        $status = $cat_row['CatStatus'];

                        if ($status == 1) {

                    ?>

                            <div class="col-md-4 col-sm-4 col-lg-4 col-xs-12">

                                <div class="course_block">

                                    <div class="img_wrap">

                                        <a href="<?php echo $cat_row['CourseLink']; ?>"><img alt="Science" class="CategoryImage" src="images/course-category/<?php echo $cat_row['CatImage']; ?>"></a>

                                        <div class="course_img_hoverlay_btn"><a href="#" title="View More" class="fa fa-eye"></a></div>

                                    </div>

                                    <div class="science">

                                        <div class="icon"><i class="fa fa-line-chart"></i></div>

                                        <div class="course_info">

                                            <a href="<?php echo $cat_row['CourseLink']; ?>">
                                                <h4><?php echo $cat_row['CatName']; ?></h4>
                                            </a>

                                            <p><?php echo substr($cat_row['Catdescri'], 0, 70); ?>...</p>

                                        </div>

                                    </div>

                                    <div class="science course_count_wrap">

                                        <div class="ViewPrograa"><a href="<?php echo $cat_row['CourseLink']; ?>"><span class="ViewPrograa"> View Programme </span></a></div>

                                    </div>

                                </div>

                            </div>

                    <?php }
                    } ?>

                </div>

            </div>

        </div>

    </div>

    <div id="overview" class="overview">

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 overview_img"></div>

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 overview_inner">

            <h2>We make the most of all our students.</h2>

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 overview_m_padd">

                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 overview_info instructor ">

                    <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">

                        <div class="icon"><i class="fa fa-graduation-cap"></i></div>

                        <h5>Professional Instructor</h5>

                        <p>We have a team of well-experienced & highly qualified instructors who encourage students to excel in their field.</p>

                    </div>

                    <figure><img alt="Professional Instructor" src="images/instructor.png"></figure>

                </div>

                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 overview_info course ">

                    <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">

                        <div class="icon"><i class="fa fa-laptop"></i></div>

                        <h5>Online Courses</h5>

                        <p>Our online courses provide you an affordable way to advance your skills & knowledge. We provide online courses so you can learn something new even if you do not have much time.</p>

                    </div>

                    <figure><img alt="Online Courses" src="images/online_courses.png"></figure>

                </div>

                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 overview_info book">

                    <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">

                        <div class="icon"><i class="fa fa-book"></i></div>

                        <h5>Strong Fundamentals</h5>

                        <p>Our courses are structured in a way to help students to understand the basic concepts related to their courses because we strongly believe in providing quality education.</p>

                    </div>

                    <figure><img alt="Books &amp; Library" src="images/library.png"></figure>

                </div>

            </div>

        </div>

    </div>

    <div id="count" class="count" data-stellar-background-ratio="0.3" style="background: url(images/slider_inclass1.jpg); background-attachment: fixed; background-position: 50% 50%;">

        <div class="count_wrapper">

            <div class="container">

                <div class="row">

                    <div class="head_part">

                        <h2>Happy Milistones</h2>

                        <p>We Have Powerful Milistones With Fun Fact Effects.</p>

                    </div>

                    <div class="col-sm-3 col-md-3 col-lg-3 col-xs-6">

                        <div class="funfact expert text-center mb-sm-30">

                            <div class="icon"><i class="fa fa-user"></i></div>

                            <div class="counts">

                                <h2 class="animate-number" data-animation-duration="2000" data-value="50">0</h2>

                                <h4 class="title">Top Instructor</h4>

                            </div>

                        </div>

                    </div>

                    <div class="col-sm-3 col-md-3 col-lg-3 col-xs-6">

                        <div class="funfact online text-center mb-sm-30">

                            <div class="icon"><i class="fa fa-book"></i></div>

                            <div class="counts">

                                <h2 class="animate-number" data-animation-duration="2000" data-value="500">0</h2>

                                <h4 class="title">Online Courses</h4>

                            </div>

                        </div>

                    </div>

                    <div class="col-sm-3 col-md-3 col-lg-3 col-xs-6">

                        <div class="funfact student second_one text-center mb-sm-30">

                            <div class="icon"><i class="fa fa-users"></i></div>

                            <div class="counts">

                                <h2 class="animate-number" data-animation-duration="2000" data-value="1500">0</h2>

                                <h4 class="title">Students</h4>

                            </div>

                        </div>

                    </div>

                    <div class="col-sm-3 col-md-3 col-lg-3 col-xs-6">

                        <div class="funfact placed last text-center mb-sm-30">

                            <div class="icon"><i class="fa fa-map-marker"></i></div>

                            <div class="counts">

                                <h2 class="animate-number" data-animation-duration="2000" data-value="1300">0</h2>

                                <h4 class="title">student Placed</h4>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div id="dtl_wrap" class="dtl_wrap">

        <div class="container">

            <div class="row">

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 dtl_wrapper">

                    <div class="txt_inner_wrap">

                        <div class="detail_text_wrap">

                            <h2 CLass="">Welcome To IIMSR</h2>

                            <p>Imperial Institute of Management Science & Research is an Globus Certificate of Registration (ISO) 9001:2015 certified institution at higher studies. IIMSR a distance educator of management & technology is an institute having motive to groom students to understand administer & manage the everchanging global business dynamics. Our focus is on making sure that our student receives an education that is not just of high quality but relevant to today’s industry & highly competitive global market place. Our program combine highly researched curriculum integrated with industry relevant concepts & practices.</p>

                        </div>

                        <div class="detail_text_wrap">

                            <h2 CLass="">IIMSR ADVANTAGES</h2>

                            <p>Brings together worldwide accepted courses which are registered with Government of Karnataka (India). It is an Globus Certificate of Registration (ISO) 9001:2015 certified for being a Quality Training Provider in Business & Technical Courses.</p>

                            <p>IIMSR is one of the country’s leading educational autonomous institutes with international standards. The institute offers weekend class to its management students at its center to ensure better understanding of subjects by removing their F.A.Qs .</p>

                            <p>The weekend classes can be given in the last quarter of every session subject to sufficient number of students opted for. Students can opt to undertake written examination at the center or through case based system. They have any circumstances. The result will appear on the net. The institute reserves 15% seats to SC, ST, OBC, Handicapped, Armed forces personnel, Kashmiri Migrants & War Widow’s Children in each stream for admission. A 10% discount on fee is also permissible to them subject to verification of their relevant documentary proof.</p>

                            <p>The institute also offers scholarship of 50% fee waiver to meritorious & poor students & decision to this effect strictly rests on the management. The IIMSRplacement cell also helps its students in getting right placement.</p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div id="videolectures" class="blog Blogclass Lecturess">

        <div class="container">

            <div class="row">

                <div class="head_part">

                    <h2>Video Lectures</h2>

                </div>

                <div class="dtl_wrapper">

                    <div class="col-sm-4 col-md-4 col-lg-4 col-xs-12">

                        <div class="dtl_block">

                            <div class="dtl_img"><video width="100%" height="" controls="true" poster="" id="video">
                                    <source type="video/mp4" src="video-class/indian-financial-systems.mp4">
                                </video></div>

                            <div class="blog_auther_info">

                                <div class="blog_auther"><span>Indian Financial Systems </span></div>

                            </div>

                        </div>

                    </div>

                    <div class="col-sm-4 col-md-4 col-lg-4 col-xs-12">

                        <div class="dtl_block">

                            <div class="dtl_img"><video width="100%" controls="true" poster="" id="video">
                                    <source type="video/mp4" src="video-class/webdesign.mp4">
                                </video></div>

                            <div class="blog_auther_info">

                                <div class="blog_auther"><span>Web Design</span></div>

                            </div>

                        </div>

                    </div>

                    <div class="col-sm-4 col-md-4 col-lg-4 col-xs-12">

                        <div class="dtl_block">

                            <div class="dtl_img"><video width="100%" controls="true" poster="" id="video">
                                    <source type="video/mp4" src="video-class/CLanguage.mp4">
                                </video></div>

                            <div class="blog_auther_info">

                                <div class="blog_auther"><span>C Language </span></div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div id="pptlectures" class="blog Blogclass Lecturess">

        <div class="container">

            <div class="head_part">

                <h2>PPT Lectures</h2>

                <p></p>

            </div>

            <div class="dtl_wrapper">

                <div class="row">

                    <div class="col-sm-4 col-md-4 col-lg-4 col-xs-12">

                        <div class="dtl_block">

                            <div class="dtl_img"><img alt="Blog Image" class="PPTImages" src="ppt-lectures-pdf/basics-of-accounting.png"></div>

                            <div class="blog_auther_info">

                                <div class="blog_auther"><span>Basics Of Accounting</span></div>

                            </div>

                        </div>

                    </div>

                    <div class="col-sm-4 col-md-4 col-lg-4 col-xs-12">

                        <div class="dtl_block">

                            <div class="dtl_img"><img alt="Blog Image" class="PPTImages" src="ppt-lectures-pdf/introduction-of-bca.png"></div>

                            <div class="blog_auther_info">

                                <div class="blog_auther"><span>Introduction Of BCA </span></div>

                            </div>

                        </div>

                    </div>

                    <div class="col-sm-4 col-md-4 col-lg-4 col-xs-12">

                        <div class="dtl_block">

                            <div class="dtl_img"><img alt="Blog Image" class="PPTImages" src="ppt-lectures-pdf/digitalMarketing.png"></div>

                            <div class="blog_auther_info">

                                <div class="blog_auther"><span>Digital Marketing </span></div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="dtl_wrapper">

                <div class="row">

                    <div class="col-sm-4 col-md-4 col-lg-4 col-xs-12">

                        <div class="dtl_block">

                            <div class="dtl_img"><img alt="Blog Image" class="PPTImages" src="ppt-lectures-pdf/mba-common-bc-pptspecian.png"></div>

                            <div class="blog_auther_info">

                                <div class="blog_auther"><span>Basic Communication</span></div>

                            </div>

                        </div>

                    </div>

                    <div class="col-sm-4 col-md-4 col-lg-4 col-xs-12">

                        <div class="dtl_block">

                            <div class="dtl_img"><img alt="Blog Image" class="PPTImages" src="ppt-lectures-pdf/Managment-accounting.png"></div>

                            <div class="blog_auther_info">

                                <div class="blog_auther"><span>Management Accounting</span></div>

                            </div>

                        </div>

                    </div>

                    <div class="col-sm-4 col-md-4 col-lg-4 col-xs-12">

                        <div class="dtl_block">

                            <div class="dtl_img"><img alt="Blog Image" class="PPTImages" src="ppt-lectures-pdf/developingmanagmentskills.png"> </div>

                            <div class="blog_auther_info">

                                <div class="blog_auther"><span>Develop Managemnt Skills</span></div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div id="course_categories" class="course_categories" data-stellar-background-ratio="0.3" style="background: url(images/course_cat_bg.jpg); background-attachment: fixed; background-position: 50% 50%;">

        <div class="container">

            <div class="head_part">

                <div class="row">

                    <h2>Popular Course Categories</h2>

                    <p>Having over 1500+ students worldwide and more than 500+ online courses available.</p>

                </div>

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                    <div class="tab-content">

                        <div class="tab-pane active" id="edu_n_teach">

                            <div class="tabpanel_txtblock fadeInLeft animated">

                                <h2>Design <small>Available Courses : <span>03</span></small></h2>

                                <p>Web Designing is a skilled field in IT sector. The diploma is designed in such a manner to offer sufficient knowledge and expertise to work on different software...</p>

                            </div>

                        </div>

                        <div class="tab-pane" id="sci_n_techno">

                            <div class="tabpanel_txtblock fadeInLeft animated">

                                <h2>Digital Marketing <small>Available Courses : <span>01</span></small></h2>

                                <p>Digital Marketing course incorporates SEO (search engine enhancement), SEM (search engine marketing), SMM (web-based media marketing), Email Marketing Content...</p>

                            </div>

                        </div>

                        <div class="tab-pane" id="hel_n_psycho">

                            <div class="tabpanel_txtblock fadeInLeft animated">

                                <h2>After 10th/10+2 <small>Available Courses : <span>36</span></small></h2>

                                <p>The duration of the course of Diploma in Automobile Engineering is 3 years as it is a Diploma Level program. In this course, the applicants will gain academic....</p>

                            </div>

                        </div>

                        <div class="tab-pane" id="bus_n_manage">

                            <div class="tabpanel_txtblock fadeInLeft animated">

                                <h2>Technical Software <small>Available Courses : <span>30</span></small></h2>

                                <p>Civil engineering is a professional engineering discipline that deals with the design, construction, and maintenance of the physical and naturally built environment.</p>

                            </div>

                        </div>

                        <div class="tab-pane" id="art_n_media">

                            <div class="tabpanel_txtblock fadeInLeft animated">

                                <h2>Management <small>Available Courses : <span>57</span></small></h2>

                                <p>Management is the administration of an organization, whether it is a business, a non-profit organization, or a government body. It is the art and science of managing resources...</p>

                            </div>

                        </div>

                        <div class="tab-pane" id="food_n_drink">

                            <div class="tabpanel_txtblock fadeInLeft animated">

                                <h2>Finance Management <small>Available Courses : <span>04</span></small></h2>

                                <p>Financial management may be defined as the area or function in an organization which is concerned with profitability, expenses, cash and credit, so that the "organization may have the means.</p>

                            </div>

                        </div>

                        <div class="tab-pane" id="food_n_tour">

                            <div class="tabpanel_txtblock fadeInLeft animated">

                                <h2>Tourism Management <small>Available Courses : <span>03</span></small></h2>

                                <p>Tourism Management is the leading scholarly journal focuses on the management, including planning and policy, of travel and tourism. The journal takes an ...</p>

                            </div>

                        </div>

                        <div class="tab-pane" id="sec_n_tour">

                            <div class="tabpanel_txtblock fadeInLeft animated">

                                <h2>Security Management <small>Available Courses : <span>03</span></small></h2>

                                <p>Security management is the identification of an organization's assets, followed by the development, documentation, and implementation of policies and procedures for protecting assets...</p>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                    <div class="nav_tabs_wrap">

                        <ul class="nav nav-tabs">

                            <li class="edu active">

                                <a href="#edu_n_teach" data-toggle="tab">

                                    <div class="nav_tab_inner">

                                        <i class="icon-group"></i><span>Design</span>

                                    </div>

                                </a>

                            </li>

                            <li class="sci even">

                                <a href="#sci_n_techno" data-toggle="tab">

                                    <div class="nav_tab_inner">

                                        <i class="fa fa-desktop"></i><span>Digital Marketing</span>

                                    </div>

                                </a>

                            </li>

                            <li class="hel">

                                <a href="#hel_n_psycho" data-toggle="tab">

                                    <div class="nav_tab_inner">

                                        <i class="icon-fav-book"></i><span>After 10th/10+2</span>

                                    </div>

                                </a>

                            </li>

                            <li class="bus even">

                                <a href="#bus_n_manage" data-toggle="tab">

                                    <div class="nav_tab_inner">

                                        <i class="fa fa-bar-chart"></i><span>Technical & Software</span>

                                    </div>

                                </a>

                            </li>

                            <li class="art">

                                <a href="#art_n_media" data-toggle="tab">

                                    <div class="nav_tab_inner">

                                        <i class="fa fa-users"></i><span>Management</span>

                                    </div>

                                </a>

                            </li>

                            <li class="foo even">

                                <a href="#food_n_drink" data-toggle="tab">

                                    <div class="nav_tab_inner">

                                        <i class="fa fa-credit-card"></i><span>Finance Management</span>

                                    </div>

                                </a>

                            </li>

                            <li class="tou even">

                                <a href="#food_n_tour" data-toggle="tab">

                                    <div class="nav_tab_inner">

                                        <i class="fa fa-plane"></i><span>Tourism Management</span>

                                    </div>

                                </a>

                            </li>

                            <li class="sesu even">

                                <a href="#sec_n_tour" data-toggle="tab">

                                    <div class="nav_tab_inner">

                                        <i class="fa fa-shield"></i><span>Security Management</span>

                                    </div>

                                </a>

                            </li>

                        </ul>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!--<div id="team" class="team">

        <div class="container">

            <div class="head_part">

                <h2>Professional Instructor</h2>

            </div>

            

        </div>

    </div>-->

    <div id="newsletter" class="newsletter" data-stellar-background-ratio="0.3" style="background: url(images/newsletter_bg.jpg); background-attachment: fixed; background-position: 50% 50%;">

        <div class="container">

            <img src="images/logo/coursespecial.jpeg" alt="Barry John">

        </div>

    </div>

</div>

<style>
    @-webkit-keyframes swing {

        from {

            -webkit-transform: rotate(15deg);

        }

        to {

            -webkit-transform: rotate(-15deg);

        }

    }

    @-webkit-keyframes shadow {

        from {

            box-shadow: 3px 2px 5px #999;

        }

        to {

            box-shadow: -3px 2px 3px #999;

        }

    }

    @-webkit-keyframes ball-shadow {

        from {

            -webkit-transform: rotate(-15deg) scalex(1.5) skew(60deg) translate(-60px, 0);

            box-shadow: 30px 0 30px #777;

        }

        to {

            -webkit-transform: rotate(-10deg) scalex(2) skew(60deg) translate(-40px, 0);

            box-shadow: 3px 0 50px #888;

        }

    }

    .stem {

        background: #663d0a;

        height: 6em;

        padding: 18px;

        width: 30em;

        border-top-right-radius: 0em;

        border-top-left-radius: 0em;

        border-bottom-left-radius: 0em;

        border-bottom-right-radius: 0em;

        -webkit-animation-name: shadow;

        -webkit-animation-duration: 2s;

        -webkit-animation-iteration-count: infinite;

        -webkit-animation-timing-function: ease-in-out;

        -webkit-animation-direction: alternate;

    }

    .ball-shadow {

        -webkit-transform: rotate(-5deg) scalex(2) skew(80deg);

        right: 20%;

        bottom: 10%;

        height: .75em;

        width: .75em;

        display: block;

        background: transparent;

        border-radius: 1em;

        -webkit-animation-name: ball-shadow;

        -webkit-animation-duration: 2s;

        -webkit-animation-iteration-count: infinite;

        -webkit-animation-timing-function: ease-in-out;

        -webkit-animation-direction: alternate;

    }

    .clock {

        width: 15em;

        padding: 1em 0em;

        margin: -264px auto;

    }

    .glass {

        width: 100%;

    }

    .pendulum {

        width: 3em;

        margin: 97px 0px;

        -webkit-animation-name: swing;

        -webkit-animation-duration: 3s;

        -webkit-animation-iteration-count: infinite;

        -webkit-animation-timing-function: ease-in-out;

        -webkit-animation-direction: alternate;

        -webkit-transform-origin: 50% 0%;

    }

    .find_course {

        padding: 0 0 80px;

        border-top: 15px solid #098be2 !important;

        background-color: #ddd !important;

    }

    .find_course_inner {

        background-color: #fff !important;

        display: inline-block;

        position: relative;

    }

    .course_list li .course_info {

        margin: 0 0 0 25px;

        padding: 0 0 0 15px;

    }

    @media(max-width:992px) {

        .find_course_inner .col-xs-12 {

            padding: 0;

            width: 100% !important;

            float: none;

            margin: 0 auto;

        }

        .find_course_form_inner h2 {

            font-size: 16px !important;

            padding: 30px 30px 31px !important;

        }

        .cms_index4 .find_course_form_inner h2:after {

            border-left: 190px solid transparent;

            border-right: 190px solid transparent;

            margin-left: -165px !important;

        }

        .pendulum {

            width: 3em !important;

            margin: 41px -35px !important;

        }

        .stem {

            background: #663d0a !important;

            height: 9em !important;

            padding: 18px !important;

            width: 20em !important;

        }

    }
</style>

<?php include('include/footer.php'); ?>