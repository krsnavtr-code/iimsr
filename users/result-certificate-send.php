<?php 
include('checklogin.php');
include("dbconnection.php");

$email = $_POST['email'];
$enrolment = $_SESSION['enrolment'];
$query = mysqli_query($con, "SELECT * FROM `register_here` WHERE `enrolment`='$enrolment'");
$row = mysqli_num_rows($query);
if($row > 0){
    $CertificateOtp = rand(100000,999999);
    $query = mysqli_query($con, "UPDATE `register_here` SET `CertificateOtp`='$CertificateOtp' WHERE `enrolment`='$enrolment'");
    $_SESSION['enrolment'] = $enrolment;
    $dadtmani = "<table style='border: #0b0ce4 2px solid;border-radius: 9px;padding: 10px 10px 10px 10px;'>
    <tr>
        <td>
            <tr style='border-radius: 83px 45px 45px 45px;background-color: #0000001f;padding: 18px 0px 32px 0px;'>
                <td style='padding: 10px 0px 10px 10px; width: 132px;'>Email</td>
                <td style='padding: 10px 0px 10px 10px;width: 232px;'>".$email."</td>
            </tr>
            <tr style='border-radius: 83px 45px 45px 45px;padding: 18px 0px 32px 0px;'>    
                <td style='padding: 10px 0px 10px 10px; width: 132px;'>Enrollment:</td>
                <td style='padding: 10px 0px 10px 10px;'>".$enrolment."</td>
            </tr>  
            <tr style='border-radius: 83px 45px 45px 45px;background-color: #0000001f;padding: 18px 0px 32px 0px;'>
                <td style='padding: 10px 0px 10px 10px; width: 132px;'>One Time Password:</td>
                <td style='padding: 10px 0px 10px 10px;'>".$CertificateOtp."</td>
            </tr>
        </td>
    </tr>    
    </table>
    <a href='iimsr.net.in' style='text-decoration:none;'><p><span style='color:#0000fd;font-weight:700;text-align:justify;'>Your re-registration in IIMSR has been done, we will update you shortly.</span> <span style='color:#fd0000;font-weight:700;'>Kindly deposit your fees in Imperial Institute of Management Science & Research account only, any fee deposited in any other account EXCEPT IIMSR will not be considered.</span></p></a>
    <img src='iimsr.net.in/assets/images/logo.png' style='width: 255px; height: 70px;'>
    <p>
    <span style='color:#500050'>For Admission : </span><strong style='color:#000026'>9891030303</strong><br>
    <span style='color:#500050'>For Verification &amp; Fee : </span><strong style='color:#000026'>9266585858</strong><br>
    <span style='color:#500050'>Email: </span><strong style='color:#000026'><a href='mailto:download-result@iimsr.net.in' rel='noreferrer' target='_blank'>download-result@iimsr.net.in</a></strong><br>
    <span style='color:#500050'>Website : </span><a href='https://iimsr.net.in' style='text-decoration:none' rel='noreferrer' target='_blank' data-saferedirecturl='https://www.google.com/url?q=https://iimsr.net.in&amp;source=gmail&amp;ust=1591852093685000&amp;usg=AFQjCNHDR5wbJRaaq0RfkyBNWK71E_kyOA'><strong>www.iimsr.net.in</strong></a> .
    </p>";
    $subject = "Certificate Download OTP";
    $headers = array("From: download-result@iimsr.net.in",
        "Reply-To: replyto@iimsr.net.in",
        "X-Mailer: PHP/" . PHP_VERSION,
        "Content-type: text/html; charset=iso-8859-1",
        "Cc: anand24h@gmail.com"
    );
    $headers = implode("\r\n", $headers);
    mail($email,$subject,$dadtmani,$headers);
    echo "success1";
}else{
    echo "not_exist";
}
?>