<?php 

include('include/header.php'); 

include('dbconnection.php');
?>

<?php
if (isset($_POST['register'])) {
    

$fname = $_POST['firstname'];

$lname = $_POST['lastname'];

$name = $fname . " " . $lname;

$phone =  $_POST['phoneno'];

$email = $_POST['emailto'];


$query = mysqli_query($con, "INSERT INTO `registration_form`(`name`, `phone_no`, `email`) VALUES('$name', $phone, '$email')");

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


    mail("anand24h@gmail.com", $subject, $dadtmani ,$headers);

    if ($query) {

        echo "<script>

        alert('Data has been Successfully Submitted');

        $('#popupForm').modal('hide');

        </script>";
    }
    } else {

        echo "<script>

           alert('Something went wrong');

           $('#popupForm').modal('hide');

           </script>";
    }
}

?>
<?php 
    $submenu = $_GET['submenu'];
    $query = "SELECT * FROM `course` where `submenu`='$submenu'";
    $sqlquery = mysqli_query($con, $query);
?>
<div class="content_wrapper">
    <div class="breadcrumb_wrap" data-stellar-background-ratio="0.3" style="background: url(https://iimsr.net.in/images/slider_group_in_campus.jpg); background-attachment: fixed; background-position: 50% 50%;">
        <div class="breadcrumb_wrap_inner">
            <div class="container">
                <?php 
                    $query1 = "SELECT * FROM `course` where `submenu`='$submenu'";
                    $sqlquery1 = mysqli_query($con, $query1);
                    $rowe = mysqli_fetch_array($sqlquery1);
                    $Course = $rowe['course'];
                    $CourseCategory = $rowe['CourseCategory'];
                ?>
                <h1><?php echo $Course; ?></h1>
                <ul class="breadcrumbs">
                    <li><a href="/">Home</a>/</li>
                    <li><?php echo $CourseCategory; ?></li>
                </ul>
            </div>
        </div>
    </div>
    <div id="dtl_wrap" class="dtl_wrap">
        <div class="container">
            <div class="col-md-9 col-sm-9 col-lg-9 col-xs-12 dtl_wrapper">
                <div class="dtl_inner_wrap">
                    <div class="dtl_block">
                        <div class="detail_text_wrap">
                            <div class="info_wrapper">
                                <div class="info_head">
                                    <h4><?php echo $Course; ?> Course</h4>
                                </div>
                                <div class="panel-group" id="accordion">
                                    <?php
                                        $count =0;
                                        $totalfee ="";
                                        $eligibility ="";
                                        while($row = mysqli_fetch_array($sqlquery)){ 
                                            if($count==0){
                                                $totalfee = $row['total_fee'];
                                                $eligibility = $row['eligibility'];
                                            }
                                    ?>
                                    <div class="panel panel-default">
                                        <div class="panel-heading" id="head_One<?php echo $count; ?>">
                                            <h4 class="panel-title">
                                                <a class="collapsed" data-toggle="collapse" data-target="#collapse<?php echo $count; ?>"data-parent="#accordion" href="#ques_one">
                                                    <i class="fa fa-eyedropper"></i> <?php echo ucwords($row['semester']); ?> 
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapse<?php echo $count; ?>" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <?php 
                                                    if( !empty($row['subject1'])){ ?>
                                                        <li><?php echo $row['subject1']; ?></li>
                                                    <?php } ?>
                                                    <?php if( !empty($row['subject1'])){ ?>
                                                        <li><?php echo $row['subject2']; ?></li>
                                                    <?php } ?>
                                                    <?php if( !empty($row['subject1'])){ ?>
                                                        <li><?php echo $row['subject3']; ?></li>
                                                    <?php } ?>
                                                    <?php if( !empty($row['subject1'])){ ?>
                                                        <li><?php echo $row['subject4']; ?></li>
                                                    <?php } ?>
                                                    <?php if( !empty($row['subject1'])){ ?>
                                                        <li><?php echo $row['subject5']; ?></li>
                                                    <?php } ?>
                                                    <?php if( !empty($row['subject1'])){ ?>
                                                        <li><?php echo $row['subject6']; ?></li>
                                                    <?php } 
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php  $count++; } ?>
                                    <div class="panel panel-default">
                                        <div class="panel-heading" id="head_One<?php echo $count; ?>">
                                            <h4 class="panel-title">
                                                <a class="collapsed" data-toggle="collapse" data-target="#collapse<?php echo $count; ?>" data-parent="#accordion<?php echo $count; ?>" href="#ques_one<?php echo $count; ?>">
                                                    <i class="fa fa-eyedropper"></i> Course Duration
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapse<?php echo $count; ?>" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <span>
                                                    <?php 
                                                        if($count==1){
                                                            echo "6 Month";
                                                        }
                                                        if($count==2){
                                                            echo "1 Year";
                                                        }
                                                        if($count==4){
                                                            echo "2 Year";
                                                        }
                                                        if($count==6){
                                                            echo "3 Year";
                                                        }
                                                        if($count==8){
                                                            echo "4 Year";
                                                        }
                                                        if($count==10){
                                                            echo "5 Year";
                                                        }
                                                    ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading" id="head_One<?php echo $count; ?>">
                                            <h4 class="panel-title">
                                                <a class="collapsed" data-toggle="collapse" data-target="#collapse" data-parent="#accordion" href="#ques_one">
                                                    <i class="fa fa-eyedropper"></i> Eligibility & Course Fee
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapse" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <span><?php echo $eligibility; ?> Pass </span><br>
                                                <b><span><i class="fa fa-inr" aria-hidden="true"></i> <?php echo $totalfee; ?>/-Semester</span></b>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <br>

                <div class="dtl_inner_wrap">
                    <div class="dtl_block">
                        <div class="detail_text_wrap">
                            <div class="info_wrapper">
                                <div class="info_head">
                                    <h4> Registration Form </h4>
                                </div>
                                <form action="" method="post">
                                
                                    <label for="fname">First Name</label>
                                    <input type="text" id="fname" name="firstname" placeholder="Your name.." required >

                                    <label for="lname">Last Name</label>
                                    <input type="text" id="lname" name="lastname" placeholder="Your last name.." required >

                                    <label for="phoneno"> Phone number </label>
                                    <input type="tel" id="phoneno" name="phoneno" placeholder="1234-56-7890" pattern="[0-9]{10}" required>

                                    <label for="emailto"> Email </label>
                                    <input type="email" id="emailto" name="emailto" placeholder="youremail@xyz.com" required>                                    
                                
                                    <input type="submit" value="Submit" name="register">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="col-md-3 col-sm-3 col-lg-3 col-xs-12 aside_wrapper">
                <div class="course_tutor">
                    <h4>Instructors</h4>
                    <ul>
                        <?php 
                            $sqlquery = mysqli_query($con, "SELECT * FROM `our_teachers` ORDER BY RAND() LIMIT 4;");
                            $num = mysqli_num_rows($sqlquery);
                            while($row = mysqli_fetch_array($sqlquery)){
                                $TeacherStatus = $row['TeacherStatus'];
                                if($TeacherStatus==1){
                        ?>
                        <li>
                            <div class="tutor_img">
                                <img alt="TeacherImages" src="https://iimsr.net.in/images/experts/<?php echo $row['TeacherImages']; ?>">
                            </div>
                            <div class="tutor_info">
                                <h5> <a href="#"><?php echo $row['TeachersName']; ?></a> <em></em> </h5>
                                <p><?php echo $row['Designation']; ?></p>
                            </div>
                        </li>
                        <?php } } ?>
                    </ul>
                </div>
                <div class="course_tags">
                    <h4>Course Category</h4>
                    <ul>
                        <li><?php 
                                $sqlquery1 = mysqli_query($con, "SELECT * FROM `coursecategory`");
                                $num = mysqli_num_rows($sqlquery1);
                                while($row1 = mysqli_fetch_array($sqlquery1)){
                                    $CourseCategory = $row1['CatName'];
                            ?>
                            <a href="<?php echo $row1['CourseLink']; ?>"><?php echo $CourseCategory; ?></a>
                            <?php } ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content_wrapper">
    <div class="breadcrumb_wrap" data-stellar-background-ratio="0.3" style="background: url(images/slider_graduate.jpg); background-attachment: fixed; background-position: 50% 50%;">
        <div class="breadcrumb_wrap_inner">
            <div class="container">
                <h1>Course Benefits</h1>
                
            </div>
        </div>
    </div>
    <div id="dtl_wrap" class="dtl_wrap">
        <div class="container">
            <div class="dtl_wrapper col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="txt_inner_wrap">
                    <div class="detail_text_wrap">
                        <h2>Course Benefits</h2>
                        <ul>
                            <li>At the completion of course, the candidates will posses in-depth coverage of subjects.</li>
                            <li>To understand the importance of functional areas in the operations of an organization.</li>
                            <li>Formulation of business policies, strategies & their implications for better results.</li>
                            <li>To understand driving force- boom, recession & recovery to modify the plans as per need of the hour.</li>
                            <li>To develop the art of effective communication & presentation.</li>
                            <li>To understand the importance of operations management & its utility factor for smooth function of business.</li>
                            <li>How to apply the knowledge of concept, its tools & techniques in a given situation.</li>
                        </ul><br>
                        <h2>With our courses you will be able to</h2>
                        <div class="dtl_related_article">
                            <h4>Corporate Environment</h4>
                            <div class="head_underline"></div>
                            <p>Understand the corporate environment in which a responsible business has to be conducted by a good corporate manager.</p>
                            <h4>Ethics</h4>
                            <div class="head_underline"></div>
                            <p>Empower yourself with the skills of understanding business situations, laws regarding corporate governance and the role of their personal integrity and values.</p>
                            <h4>Management</h4>
                            <div class="head_underline"></div>
                            <p>Equip yourself with the leadership skills and help you to understand group and individual dynamics to work effectively in teams.</p>
                            <h4>Global Vision</h4>
                            <div class="head_underline"></div>
                            <p>Have the global vision of business operations and a high level of responsibilities. This makes the difference with most specialized masters.</p>
                            
                            <h4>Communication</h4>
                            <div class="head_underline"></div>
                            <p>Acquire an enhanced verbal, written and presentation communication skills.</p>
                            <h4>Decision Analysis</h4>
                            <div class="head_underline"></div>
                            <p>Develop problem solving skills which will help you to analyze uncertain situations, utilize facts and draw conclusions out of it.</p>
                            <h4>Strategic Planning</h4>
                            <div class="head_underline"></div>
                            <p>Understand the business as an integrated system, the relations between the functional areas, and long-range planning, implementation and control.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    li{
        list-style-type: none;
    }
    .course_tutor ul li .tutor_img{
        float:left;
        width:65px;
        height:48px;
    }
</style>
<?php include('include/footer.php'); ?>