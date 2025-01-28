<?php

error_reporting(0);

include('checklogin.php');

include("dbconnection.php");

include("include/header.php");

// Include the MailSender utility
require_once 'include/MailSender.php';

require_once 'dompdf/autoload.inc.php';

use Dompdf\Dompdf;

if ($_SESSION['role'] == "docs-verification" || $_SESSION['role'] == "super-admin" || $_SESSION['role'] == "distribute, send-course-detail, send-sample, application-form" || $_SESSION['role'] == "distribute_lucknow") {

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get form data
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $institute = $_POST['institute'];


        // print_r($_POST);
        // die();
        // Save form data to MySQL database
        // Use the existing database connection object
        $sql = "INSERT INTO sample_send (name, email, phone_no, institute) VALUES ('$name', '$email', '$phone', '$institute')";

        if ($con->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }



        // Email configuration 
        $to = $email;

        $subject = 'Sample Certificates with Attachments by Imperial Institute of Management Science & Research';


        // Attachment files 
        $files = [];
        // $files = ['pdf-folder/' . $institute];

        switch ($institute) {
            case 'iimsr':
                $files = [
                    'pdf-folder/sample_cirtificate.jpg',
                    'pdf-folder/sample_cmm.pdf',
                    'pdf-folder/sample_markscard.pdf',
                    'pdf-folder/sample_attestation.pdf',
                ];
                break;
            case 'andhra_university':
                $files = ['pdf-folder/andhra.pdf'];
                break;
            case 'jntu':
                $files = ['pdf-folder/jntu.pdf'];
                break;
            case 'ptu':
                $files = ['pdf-folder/ptu.jpg', 'pdf-folder/ptu1.jpg', 'pdf-folder/ptu2.jpg', 'pdf-folder/ptu3.jpg'];
                break;
            case 'osmania':
                $files = ['pdf-folder/osmania/MARRI-NIHAL-MARKSHEET1.jpg','pdf-folder/osmania/MARRI-NIHAL-MARKSHEET2.jpg', 'pdf-folder/osmania/MARRI-NIHAL-MARKSHEET5.jpg','pdf-folder/osmania/MARRI-NIHAL-MARKSHEET3.jpg','pdf-folder/osmania/MARRI-NIHAL-MARKSHEET4.jpg', 'pdf-folder/osmania/MARRI-NIHAL-MARKSHEET6.jpg', 'pdf-folder/osmania/MARRI-NIHAL-MAIN.jpg', 'pdf-folder/osmania/MARRI-NIHAL-CONSOLIDATE.jpg', 'pdf-folder/osmania/MARRI-NIHAL-PROVISIONAL.jpg'];
                break;
            case 'madurai_kamaraj':
                $files = ['pdf-folder/madurai.pdf'];
                break;
            case 'kanpur_university':
                $files = ['pdf-folder/kanpur1.jpg', 'pdf-folder/kanpur2.jpg'];
                break;
            case 'sabarmati_university':
                $files = ['pdf-folder/sabarmati.jpg', 'pdf-folder/sabarmati1.jpg', 'pdf-folder/sabarmati2.jpg', 'pdf-folder/sabarmati3.jpg'];
                break;
            case 'agra_university':
                $files = ['pdf-folder/AGRA-UNIV/RESHMI-K-R-CONSOLIDATE.jpg','pdf-folder/AGRA-UNIV/RESHMI K R MAIN.jpg', 'pdf-folder/AGRA-UNIV/RESHMI K R MARKSHEET 1.jpg','pdf-folder/RESHMI K R MARKSHEET 3.jpg', 'pdf-folder/AGRA-UNIV/RESHMI K R MIGRATION.jpg', 'pdf-folder/RESHMI K R MARKSHEET 2.jpg', 'pdf-folder/AGRA-UNIV/RESHMI K R PRINCIPAL.jpg', 'pdf-folder/AGRA-UNIV/RESHMI K R RECOMMENDATION.jpg', 'pdf-folder/AGRA-UNIV/RESHMI K R VERIFICATION LETTER.jpg', 'pdf-folder/AGRA-UNIV/RESHMI-K-R-CONSOLIDATE.jpg'];
                break;
            case 'anna_university':
                $files = ['pdf-folder/ANNA-UNIV/SAIRA ASLAM   MARKSHEET  1.jpg', 'pdf-folder/ANNA-UNIV/SAIRA ASLAM   MARKSHEET  2.jpg', 'pdf-folder/ANNA-UNIV/SAIRA ASLAM   MARKSHEET  3.jpg', 'pdf-folder/ANNA-UNIV/SAIRA ASLAM   MARKSHEET  4.jpg', 'pdf-folder/ANNA-UNIV/SAIRA ASLAM   MARKSHEET  5.jpg', 'pdf-folder/ANNA-UNIV/SAIRA ASLAM   MARKSHEET  6.jpg', 'pdf-folder/ANNA-UNIV/SAIRA ASLAM   MARKSHEET  7.jpg', 'pdf-folder/ANNA-UNIV/SAIRA ASLAM   MARKSHEET  8.jpg', 'pdf-folder/ANNA-UNIV/SAIRA ASLAM   CONSOLIDATE.jpg', 'pdf-folder/ANNA-UNIV/SAIRA ASLAM   HOD.jpg', 'pdf-folder/ANNA-UNIV/SAIRA ASLAM   MIGRATION.jpg', 'pdf-folder/ANNA-UNIV/SAIRA ASLAM   PROVISIONAL.jpg', 'pdf-folder/ANNA-UNIV/SAIRA ASLAM  MAIN.jpg', 'pdf-folder/ANNA-UNIV/SAIRA ASLAM  PRINCIPAL.jpg', 'pdf-folder/ANNA-UNIV/SAIRA ASLAM  RECOMMENDATION.jpg'];
                break;
            case 'annamalai_university':
                $files = ['pdf-folder/ANNAMALAI/ARUNDEV M S  MARKSHEET  1.jpg', 'pdf-folder/ANNAMALAI/ARUNDEV M S  MARKSHEET  2.jpg', 'pdf-folder/ANNAMALAI/ARUNDEV M S  MARKSHEET  3.jpg', 'pdf-folder/ANNAMALAI/ARUNDEV M S  MARKSHEET  4.jpg', 'pdf-folder/ANNAMALAI/ARUNDEV M S  MARKSHEET  5.jpg', 'pdf-folder/ANNAMALAI/ARUNDEV M S  MARKSHEET  6.jpg', 'pdf-folder/ANNAMALAI/ARUNDEV M S   MIGRATION.jpg', 'pdf-folder/ANNAMALAI/ARUNDEV M S   PROVISIONAL.jpg'];
                break;
            case 'gulaburga_university':
                $files = ['pdf-folder/GULBURGA-UNIV/MANIKANTA K MARKSHEET.jpg 1.jpg','pdf-folder/GULBURGA-UNIV/MANIKANTA K MARKSHEET.jpg 2.jpg', 'pdf-folder/GULBURGA-UNIV/MANIKANTA K MARKSHEET.jpg 3.jpg', 'pdf-folder/GULBURGA-UNIV/MANIKANTA K MARKSHEET.jpg 4.jpg', 'pdf-folder/GULBURGA-UNIV/MANIKANTA K MARKSHEET.jpg 5.jpg', 'pdf-folder/GULBURGA-UNIV/MANIKANTA K MARKSHEET.jpg 6.jpg', 'pdf-folder/GULBURGA-UNIV/MANIKANTA K MIGARATION.jpg', 'pdf-folder/GULBURGA-UNIV/MANIKANTA K PROVISIONAL.jpg',];
                break;
            case 'madras_university':
                $files = ['pdf-folder/MADRAS-UNIV/MOHAMMED SAJID T A MARKSHEET 1.jpg', 'pdf-folder/MADRAS-UNIV/MOHAMMED SAJID T A MARKSHEET 2.jpg', 'pdf-folder/MADRAS-UNIV/MOHAMMED SAJID T A MARKSHEET 3.jpg', 'pdf-folder/MADRAS-UNIV/MOHAMMED SAJID T A MARKSHEET 4.jpg', 'pdf-folder/MADRAS-UNIV/MOHAMMED SAJID T A MARKSHEET 5.jpg', 'pdf-folder/MADRAS-UNIV/MOHAMMED SAJID T A MARKSHEET 6.jpg', 'pdf-folder/MADRAS-UNIV/MOHAMMED SAJID T A PROVISIONAL.jpg', 'pdf-folder/MADRAS-UNIV/MOHAMMED SAJID T A CONSOLIDATE.jpg', 'pdf-folder/MADRAS-UNIV/MOHAMMED SAJID T A MAIN.jpg'];
                break;
            case 'manglore_university':
                $files = ['pdf-folder/MANGLORE-UNIVERSITY/MOIDEEN SHUHAIB K C   MARKSHEET  1.jpg', 'pdf-folder/MANGLORE-UNIVERSITY/MOIDEEN SHUHAIB K C   MARKSHEET  2.jpg', 'pdf-folder/MANGLORE-UNIVERSITY/MOIDEEN SHUHAIB K C   MARKSHEET  3.jpg', 'pdf-folder/MANGLORE-UNIVERSITY/MOIDEEN SHUHAIB K C   MARKSHEET  4.jpg', 'pdf-folder/MANGLORE-UNIVERSITY/MOIDEEN SHUHAIB K C   MARKSHEET  5.jpg', 'pdf-folder/MANGLORE-UNIVERSITY/MOIDEEN SHUHAIB K C   MARKSHEET  6.jpg', 'pdf-folder/MANGLORE-UNIVERSITY/MOIDEEN SHUHAIB K C   MIGRATION.jpg', 'pdf-folder/MANGLORE-UNIVERSITY/MOIDEEN SHUHAIB K C   PROVISIONAL.jpg',];
                break;
            case 'mku_university':
                $files = ['pdf-folder/MKU/SYAMALA MANDA   MARKSHEET  1.jpg', 'pdf-folder/MKU/SYAMALA MANDA   MARKSHEET  2.jpg', 'pdf-folder/MKU/SYAMALA MANDA   MARKSHEET  3.jpg', 'pdf-folder/MKU/SYAMALA MANDA   MAIN.jpg', 'pdf-folder/MKU/SYAMALA MANDA   MIGRATION.jpg', 'pdf-folder/MKU/SYAMALA MANDA   CONSOLIDATE.jpg', 'pdf-folder/MKU/SYAMALA MANDA   BONAFIDE.jpg','pdf-folder/MKU/SYAMALA MANDA   PROVISIONAL.jpg'];
                break;
            case 'mysore_university':
                $files = ['pdf-folder/MYSORE/MOHAMED HATHIM A P MARKSHEET 1.jpg', 'pdf-folder/MYSORE/MOHAMED HATHIM A P MARKSHEET 2.jpg', 'pdf-folder/MYSORE/MOHAMED HATHIM A P MARKSHEET 3.jpg', 'pdf-folder/MYSORE/MOHAMED HATHIM A P MARKSHEET 4.jpg', 'pdf-folder/MYSORE/MOHAMED HATHIM A P MARKSHEET 5.jpg', 'pdf-folder/MYSORE/MOHAMED HATHIM A P MARKSHEET 6.jpg', 'pdf-folder/MYSORE/MOHAMED HATHIM A P PROVISIONAL.jpg', 'pdf-folder/MYSORE/MOHAMED HATHIM A P MAIN.jpg', 'pdf-folder/MYSORE/MOHAMED HATHIM A P CONSOLIDATE.jpg',];
                break;
            case 'periyar_university':
                $files = ['pdf-folder/PERIYAR/NISSAM MUHAMMED  MARKSHEET  1.jpg', 'pdf-folder/PERIYAR/NISSAM MUHAMMED  MARKSHEET  2.jpg', 'pdf-folder/PERIYAR/NISSAM MUHAMMED  MARKSHEET  3.jpg', 'pdf-folder/PERIYAR/NISSAM MUHAMMED  MARKSHEET  4.jpg', 'pdf-folder/PERIYAR/NISSAM MUHAMMED  MARKSHEET  5.jpg', 'pdf-folder/PERIYAR/NISSAM MUHAMMED  MARKSHEET  6.jpg', 'pdf-folder/PERIYAR/NISSAM MUHAMMED   MIGRATION.jpg', 'pdf-folder/PERIYAR/NISSAM MUHAMMED   PROVISIONAL.jpg', 'pdf-folder/PERIYAR/NISSAM MUHAMMED   VERIFICATION.jpg', 'pdf-folder/PERIYAR/NISSAM MUHAMMED  RECOMMENDATION.jpg',];
                break;
            case 'pondichery_university':
                $files = ['pdf-folder/PONDICHERY-UNIV/HASEEB C K MARKSHEET 1.jpg', 'pdf-folder/PONDICHERY-UNIV/HASEEB C K MARKSHEET 2.jpg', 'pdf-folder/PONDICHERY-UNIV/HASEEB C K MARKSHEET 3.jpg', 'pdf-folder/PONDICHERY-UNIV/HASEEB C K MARKSHEET 4.jpg', 'pdf-folder/PONDICHERY-UNIV/HASEEB C K MARKSHEET 5.jpg', 'pdf-folder/PONDICHERY-UNIV/HASEEB C K MARKSHEET 6.jpg', 'pdf-folder/PONDICHERY-UNIV/HASEEB C K BONAFIDE.jpg', 'pdf-folder/PONDICHERY-UNIV/HASEEB C K CONSOLIDATE.jpg', 'pdf-folder/PONDICHERY-UNIV/HASEEB C K MAIN.jpg', 'pdf-folder/PONDICHERY-UNIV/HASEEB C K PROVISIONAL.jpg', 'pdf-folder/PONDICHERY-UNIV/HASEEB C K RECOMMENDATION.jpg',];
                break;
            case 'tamilnadu_university':
                $files = ['pdf-folder/TAMILNADU-TECHNICAL-BOARD/MITHUN MURALI MARKSHEET 1.jpg', 'pdf-folder/TAMILNADU-TECHNICAL-BOARD/MITHUN MURALI MARKSHEET 2.jpg', 'pdf-folder/TAMILNADU-TECHNICAL-BOARD/MITHUN MURALI MARKSHEET 3.jpg', 'pdf-folder/TAMILNADU-TECHNICAL-BOARD/MITHUN MURALI MARKSHEET 4.jpg', 'pdf-folder/TAMILNADU-TECHNICAL-BOARD/MITHUN MURALI MARKSHEET 5.jpg', 'pdf-folder/TAMILNADU-TECHNICAL-BOARD/MITHUN MURALI MARKSHEET 6.jpg', 'pdf-folder/TAMILNADU-TECHNICAL-BOARD/MITHUN MURALI  PRINCIPAL....jpg', 'pdf-folder/TAMILNADU-TECHNICAL-BOARD/MITHUN MURALI CONSOLIDATE.jpg', 'pdf-folder/TAMILNADU-TECHNICAL-BOARD/MITHUN MURALI PROVISIONAL.jpg', 'pdf-folder/TAMILNADU-TECHNICAL-BOARD/MITHUN MURALI VERIFICATION LETTER....jpg',];
                break;
            case 'vmu_university':
                $files = ['pdf-folder/VMU/SEELAM MANIKANTA REDDY  MARKSHEET  1.jpg', 'pdf-folder/VMU/SEELAM MANIKANTA REDDY  MARKSHEET  2.jpg', 'pdf-folder/VMU/SEELAM MANIKANTA REDDY  MARKSHEET  3.jpg', 'pdf-folder/VMU/SEELAM MANIKANTA REDDY  MARKSHEET  4.jpg', 'pdf-folder/VMU/SEELAM MANIKANTA REDDY  MARKSHEET  5.jpg', 'pdf-folder/VMU/SEELAM MANIKANTA REDDY  MARKSHEET  6.jpg', 'pdf-folder/VMU/SEELAM MANIKANTA REDDY  MAIN.jpg', 'pdf-folder/VMU/SEELAM MANIKANTA REDDY  MIGRATION.jpg', 'pdf-folder/VMU/SEELAM MANIKANTA REDDY  PROVISIONAL.jpg',];
                break;
            case 'vtu_university':
                $files = ['pdf-folder/VTU/AJAY KUMAR MARKSHEET 1.jpg', 'pdf-folder/VTU/AJAY KUMAR MARKSHEET 2.jpg', 'pdf-folder/VTU/AJAY KUMAR MARKSHEET 3.jpg', 'pdf-folder/VTU/AJAY KUMAR MARKSHEET 4.jpg', 'pdf-folder/VTU/AJAY KUMAR MARKSHEET 5.jpg', 'pdf-folder/VTU/AJAY KUMAR MARKSHEET 6.jpg', 'pdf-folder/VTU/AJAY KUMAR MARKSHEET 7.jpg', 'pdf-folder/VTU/AJAY KUMAR MARKSHEET 8.jpg', 'pdf-folder/VTU/AJAY KUMAR MIGRATION.jpg', 'pdf-folder/VTU/AJAY KUMAR PROVISIONAL.jpg',];
                break;
        }

        $htmlContent = ' 
        <h3> Dear, ' . $name . ' </h3> 
        <h3 style="color:blue;"> Hope this mail finds you in the best of your health.
        As per our telephonic conversation, I am sharing you the sample certificates (Not for Use) , please find the attachments. </h3> 
        <h4 style="color:red;"> Note: Any unethical and illegal use of the sample is strictly prohibited and liable to fetch a legal action. </h4>

        <h4 style="color:green;">Payment Method: <br>
        Account Name: Imperial Institute of Management Science & Research <br>
        Account Number: 602620110000330 <br>
        IFSC: BKID0006026 <br>
        N.B: Postal/ RTI/Online verification available. <br>
         Please feel free to contact us for further detail. </h4> 
        <h4 style="color:red;" > Please be responsible for your environment.
        Dont print this e-mail unless absolutely necessary
        With Regards:
        IIMSR Admin
        Imperial Institute of Management Science & Research
        B-63, Sector-64, Noida, Gautam Budha Nagar UP-201301
        Customer Care Number : 8287434343
        </h4>
        
        <table>

                    <tr>    

                        <td style="list-style:none;color: rgb(0, 0, 255);font-weight: 600;"><img src="iimsr.net.in/images/logo.jpeg" style="margin: 7px 0px -15px 0px;width: 255px; height: 70px;"></td>

                    </tr>

        </table>

        <p><b>Total Attachments:</b> ' . count($files) . '</p>';

        // Call function and pass the required arguments 
        $sendEmail = sendEmailWithPHPMailer($to, $subject, $htmlContent, $files);

        // Email sending status 
        if ($sendEmail) {
            echo '<h3 style="color:blue; margin-left: 3in;" >The email is sent successfully.</h3>';
        } else {
            echo '<h3 style="color:red; margin-left: 3in;">Oops! Something went wrong while sending the email.</h3>';
        }


    }

    ?>

    <div class="content-wrapper">

        <section class="content-header">

            <h1>Send Sample Card <small></small></h1>

            <ol class="breadcrumb">

                <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>

                <li class="active">Send Sample Card </li>


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

                                    if (isset($_POST['applysubmit'])) {

                                        echo $success;

                                    } else {

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
                                                <input type="text" class="form-control" placeholder="Name" id="name"
                                                    name="name" required>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6 col-md-6 col-xs-6">
                                            <div class="form-group FormGroupp">

                                                <label for="email">Email:</label><br>
                                                <input type="email" class="form-control" placeholder="Email" id="email"
                                                    name="email" required>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6 col-md-6 col-xs-6">
                                            <div class="form-group FormGroupp">

                                                <label for="phone">Phone:</label><br>
                                                <input type="tel" class="form-control" placeholder="Phone no" id="phone"
                                                    name="phone" pattern="[0-9]{10}" required>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6 col-md-6 col-xs-6">
                                            <div class="form-group FormGroupp">
                                                <label for="institute">Institute/University:</label><br>
                                                <select class="form-control" id="institute" name="institute" required>
                                                    <option value="" disabled selected>Select Institute/University</option>
                                                    <option value="iimsr">IIMSR</option>
                                                    <option value="andhra_university">Andhra University</option>
                                                    <option value="jntu">JNTU</option>
                                                    <option value="ptu">PTU</option>
                                                    <option value="osmania">Osmania</option>
                                                    <option value="madurai_kamaraj">Madurai Kamaraj</option>
                                                    <option value="kanpur_university">Kanpur University</option>
                                                    <option value="sabarmati_university">Sabarmati University</option>
                                                    <option value="agra_university">
                                                        AGRA UNIVERSITY</option>
                                                    <option value="anna_university">ANNA UNIVERSITY</option>
                                                    <option value="annamalai_university">ANNAMALAI</option>
                                                    <option value="gulaburga_university">GULBURGA UNIVERSITY</option>
                                                    <option value="madras_university">MADRAS UNIVERSITY</option>
                                                    <option value="manglore_university">MANGLORE UNIVERSITY</option>
                                                    <option value="mku_university">MKU</option>
                                                    <option value="mysore_university">MYSORE</option>
                                                    <option value="periyar_university">PERIYAR</option>
                                                    <option value="pondichery_university">PONDICHERY UNIVERSITY</option>
                                                    <option value="tamilnadu_university">TAMILNADU TECHNICAL BOARD</option>
                                                    <option value="vmu_university">VMU</option>
                                                    <option value="vtu_university">VTU</option>

                                                </select>
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

    <?php include("include/footer.php"); ?>

<?php } else {
    header("location: login.php");
} ?>