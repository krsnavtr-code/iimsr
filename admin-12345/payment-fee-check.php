<?php
error_reporting(0);
include('checklogin.php');
include("dbconnection.php");
include("include/header.php");
if($_SESSION['role']=="docs-verification" || $_SESSION['role']=="super-admin"){

?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Payment Fee Check<small></small></h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Payment Fee Check</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h2>comming soon</h2>
            </div>
        </div>
    </section>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>
<?php include("include/footer.php");?>
<?php }else {header("location: login.php");}?>