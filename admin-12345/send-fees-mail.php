
<?php

error_reporting(0);

include('checklogin.php');

include("dbconnection.php");

include("include/header.php");

// Include the MailSender utility
require_once 'include/MailSender.php';

require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;

if($_SESSION['role'] == "docs-verification" || $_SESSION['role']=="super-admin" || $_SESSION['role']=="distribute, send-course-detail, send-sample, application-form" || $_SESSION['role'] == "distribute_lucknow" ){

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get form data
        $name = $_POST['name'];
        $email = $_POST['email'];
        $course = $_POST['course'];
        $fee = $_POST['fee'];
        

        // print_r($_POST);
        // die();
    // Save form data to MySQL database
    // Use the existing database connection object
    $sql = "INSERT INTO send_fees_mail (name, email, course, fee  ) VALUES ('$name', '$email', '$course', '$fee' )";

    if ($con->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }

    


    // Email configuration 
    $to = $email; 
    
    $subject = ' Updated Fee for your course by Imperial Institute of Management Science & Research ';  
        
    $htmlContent = '        
        <h2 style="color:purple ;"> Dear, '. $name .' </h2> 
                        
        
        <h3 style="color:blue;"> Hope this mail finds you in the best of your health. As per our telephonic conversation, I am sending you the update fee for your course '. $course .'. We appreciate your decision to join our Institute for you career growth, We promise to help you in your educational and career journey. </h3> 

        <h3 style="color:blue;">  Please find below the details of Course Fee and Required Documents <br>
            
        Fees:- '. $fee . '
            
        </h3>

        <h4 style="color:blue;"> Documents Required: <br>
        10th Certificate <br>
        12th Certificate <br>
        Graduation (Bachelor Degree only when applying for the masters course) <br>
        Aadhar Card <br>
        2 Photos & Scanned Signature
        
        </h4>


        <h4 style="color:green;">Payment Method: <br>
        Account Name: Imperial Institute of Management Science & Research <br>
        Account Number: 602620110000330 <br>
        IFSC: BKID0006026 
        </h4>

        <h4> N.B: Postal/ RTI/Online verification available. <br>
        <span style="color:red;"> Please feel free to contact us for further detail. </span> </h4> 

        <h4> 
        <span style="color:blue;"> With Regards: IIMSR Admin </span>
        <table>

        <tr>    

            <td style="list-style:none;color: rgb(0, 0, 255);font-weight: 600;"><img src="iimsr.net.in/images/logo.jpeg" style="margin: 7px 0px -15px 0px;width: 255px; height: 70px;"></td>

        </tr>

        </table>
        Imperial Institute of Management Science & Research <br>
        B-63, Sector-64, Noida, Gautam Budha Nagar UP-201301 <br>
        Customer Care Number : 8287434343 <br>
        Email:- subject@iimsr.net.in  Website:- www.iimsr.net.in/
        </h4>          
        ';    
    
    // Call function and pass the required arguments 
    $sendEmail = sendEmailWithPHPMailer($to, $subject, $htmlContent); 
    
    // Email sending status 
    if($sendEmail){ 
        echo '<h3 style="color:blue; margin-left: 3in;" >The email is sent successfully.</h3>';
    } else {
        echo '<h3 style="color:red; margin-left: 3in;">Oops! Something went wrong while sending the email.</h3>';
    }


}

?>

<div class="content-wrapper">

    <section class="content-header">

        <h1> Send Fees Mail <small></small></h1>

        <ol class="breadcrumb">

            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>

            <li class="active"> Send Fees Mail </li>
            

        </ol>

    </section>

    <section class="content">

        <div class="row">

            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                <div class="box box-widget widget-user">
			

                    <div class="box-footer">

                        <form action="" method="post" role="form" enctype="multipart/form-data">

                            <!-- <div class="row">

                                <div class="col-sm-12 col-md-12 col-xs-12">

                                    <?php

                            			if (isset($_POST['applysubmit'])){

                            				echo $success;

                            			}else {

                            				echo $success;

                            			}

                            		?>

                                </div>

                            </div> -->

                            <div class="box-body">	
                                <div class="row">
                                    <div class="col-sm-6 col-md-6 col-xs-6">

                                        <div class="form-group FormGroupp">

                                            <label for="name">Name:</label><br>
                                            <input type="text" class="form-control" placeholder="Name" id="name" name="name" required>

                                        </div>
                                    </div>  
                                </div>

                                <div class="row">
                                    <div class="col-sm-6 col-md-6 col-xs-6">
                                        <div class="form-group FormGroupp">

                                        <label for="email">Email:</label><br>
                                        <input type="email" class="form-control" placeholder="Email" id="email" name="email" required>

                                        </div>
                                    </div>  
                                </div>

                                <div class="row">
                                    <div class="col-sm-5 col-md-5 col-lg-5 col-xs-12">

                                    <label class="lableform" for="validationCustom02">Select Course</label>
                                    <select name="course" class="form-control select2 slectcourse" required id="">
                                        <option value="" disable>-Select Course-</option>

                                        <?php
                                            $querycourse = mysqli_query($con,'SELECT * FROM `course` ORDER BY `course`');
                                        ?>

                                        <?php
                                        $array = array();
                                        while($coursrow = mysqli_fetch_array($querycourse)){
                                            if(!in_array($coursrow['course'], $array)){
                                                $array[] = $coursrow['course'];
                                            }
                                        }

                                        foreach($array as $dataa){ ?>
                                            <option value="<?php echo $dataa; ?>"><?php echo$dataa; ?></option>
                                        <?php } ?>

                                    </select>

                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-sm-6 col-md-6 col-xs-6">
                                        <div class="form-group FormGroupp">

                                        <label for="fee">Fee:</label><br>
                                        <input type="number" class="form-control" placeholder="Fee" id="fee" name="fee" required>

                                        </div>
                                    </div>  
                                </div>

                                

                                <div class="row">

                                    <br>

                                    <div class="col-sm-6 col-md-6 col-xs-6">

                                        <div class="form-group FormGroupp">

                                        <input type="submit" value="Submit">
                                            <!-- <input type="submit" value="Submit" name="applysubmit" class="btn btn-warning pull-right btn-block ButtonRadis"> -->

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

            

        </div>

    </section>

</div>

<?php include("include/footer.php");?>

<?php }else {header("location: login.php");} ?>