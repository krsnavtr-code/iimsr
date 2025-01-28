<?php

session_start();
if (isset($_SESSION['login'])) {
    header('location:index.php');
}
// error_reporting(0);
include("dbconnection.php");
// $enro = $_SESSION['enrolment'];
if (isset($_POST['login'])) {
    $enl = $_POST['enrolment'];
    $Passwordu = $_POST['Passwordu'];
    // $_SESSION['enrolment'] = $enl;
    $query = "SELECT * FROM register_here where `enrolment` ='$enl' and `Passwordu` ='$Passwordu'";
    $result = $con->query($query);
    $row = mysqli_fetch_array($result);
    $count = mysqli_num_rows($result);
    if ($count == 1) {
        $_SESSION['login'] = $enl;
        $_SESSION['Passwordu'] = $Passwordu;
        header("location: index.php");
    } else {
        $error = "Your Login Name or Password is invalid";
        echo $error;
    }
}
?>
<?php include('include/head.php'); ?>
<div class="container">
    <div class="row TopMargin">
        <div class="col-sm-4 col-md-4 col-lg-4 col-xs-12"></div>
        <div class="col-sm-4 col-md-4 col-lg-4 col-xs-12 LoginForm">
            <div style="text-align:center;"></div>
            <h3 style="text-align:center; color:#fff;"> Student Login</h3>
            <p style="text-align:center; color:#fff;">Kindly Enter your credentials to access the student section</p>
            <form class="form" action="" method="post">
                <div class="form-group">
                    <input type="text" class="form-control Comprehensive" name="enrolment" placeholder="Enrolment*"
                        value="" required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control Comprehensive" name="Passwordu" id="Passwordu"
                        placeholder="Password" value="" required>
                </div>
                <div class="form-group center-block">
                    <center>
                        <input type="submit" name="login" class="btn btn-warning btn-block" value="Login" />
                    </center>
                </div>
                <div class="form-group"></div>
            </form>
        </div>
        <div class="col-sm-4 col-md-4 col-lg-4 col-xs-12"></div>
    </div>
</div>
<script type="text/javascript">
    /*if (screen.width <= 699) {
        document.location = "https://play.google.com/store/apps/details?id=com.vbimt.studentlogin";
    }*/
</script>
<style>
    .Comprehensive {
        border-radius: 0px;
    }

    .TopMargin {
        margin-top: 150px;
    }

    .LoginForm {
        background-color: #03930ee3;
        padding: 48px;
    }
</style>
</body>

</html>