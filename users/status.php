<?php
error_reporting(0);
include('checklogin.php');
include("dbconnection.php");
include("include/head.php");
?>
<div class="container-scroller">
    <?php include('include/sidebar.php'); ?>
    <div class="container-fluid page-body-wrapper">
        <div id="theme-settings" class="settings-panel">
            <i class="settings-close mdi mdi-close"></i>
            <p class="settings-heading">SIDEBAR SKINS</p>
            <div class="sidebar-bg-options selected" id="sidebar-default-theme">
                <div class="img-ss rounded-circle bg-light border mr-3"></div> Default
            </div>
            <div class="sidebar-bg-options" id="sidebar-dark-theme">
                <div class="img-ss rounded-circle bg-dark border mr-3"></div> Dark
            </div>
            <p class="settings-heading mt-2">HEADER SKINS</p>
            <div class="color-tiles mx-0 px-4">
                <div class="tiles light"></div>
                <div class="tiles dark"></div>
            </div>
        </div>

        <?php include('include/header.php'); ?>
        <?php
        $enrol = $_SESSION['login'];
        $query = mysqli_query($con, "SELECT * FROM `register_here` where `enrolment` = '$enrol'");
        $row = mysqli_fetch_array($query);
        $hfghfg = $row['lateral_entry'];
        $total_fee = $row['total_fee'];
        $TotalGst = $row['TotalGst'];
        $OnlyFee = (int) $total_fee - (int) $TotalGst;
        if ($row['StudentStatus'] == 1) {
            ?>
            <div class="main-panel">
                <div class="content-wrapper pb-0">
                    <div class="row">
                        <div class="col-xl-3 col-lg-12 stretch-card grid-margin">
                            <div class="row">
                                <div class="col-xl-12 col-md-6 stretch-card grid-margin grid-margin-sm-0 pb-sm-3">
                                    <div class="card bg-warning">
                                        <div class="card-body px-3 py-4">
                                            <div class="d-flex justify-content-between align-items-start">
                                                <div class="color-card">
                                                    <p class="mb-0 color-card-head">Course Fee</p>
                                                    <h4 class="text-white"> <?php echo $OnlyFee; ?>/-<span
                                                            class="h5"></span>
                                                    </h4>
                                                </div>
                                                <i class="card-icon-indicator mdi mdi-basket bg-inverse-icon-warning"></i>
                                            </div>
                                            <h6 class="text-white">Total fee : <?php echo $row['total_fee']; ?>/-</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-md-6 stretch-card grid-margin grid-margin-sm-0 pb-sm-3">
                                    <div class="card bg-danger">
                                        <div class="card-body px-3 py-4">
                                            <div class="d-flex justify-content-between align-items-start">
                                                <div class="color-card">
                                                    <p class="mb-0 color-card-head">Due Fee</p>
                                                    <h4 class="text-white"> <?php echo $row['deu_fee']; ?>/-<span
                                                            class="h5"></span></h4>
                                                </div>
                                                <i
                                                    class="card-icon-indicator mdi mdi-cube-outline bg-inverse-icon-danger"></i>
                                            </div>
                                            <!--<h6 class="text-white">13.21% Since last month</h6>-->
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="col-xl-12 col-md-6 stretch-card grid-margin grid-margin-sm-0 pb-sm-3 pb-lg-0 pb-xl-3">
                                    <div class="card bg-primary">
                                        <div class="card-body px-3 py-4">
                                            <div class="d-flex justify-content-between align-items-start">
                                                <div class="color-card">
                                                    <p class="mb-0 color-card-head">Submit fee</p>
                                                    <h4 class="text-white"> Rs.<?php echo $row['submit_fee']; ?>/-<span
                                                            class="h5"></span></h4>
                                                </div>
                                                <i
                                                    class="card-icon-indicator mdi mdi-briefcase-outline bg-inverse-icon-primary"></i>
                                            </div>
                                            <!--<h6 class="text-white">67.98% Since last month</h6>-->
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-12 col-md-6 stretch-card grid-margin grid-margin-sm-0 pb-sm-3">
                                    <div class="card bg-success">
                                        <div class="card-body px-3 py-4">
                                            <div class="d-flex justify-content-between align-items-start">
                                                <div class="color-card">
                                                    <p class="mb-0 color-card-head">GST*</p>
                                                    <h4 class="text-white"><?php echo $row['TotalGst']; ?>/-</h4>
                                                </div>
                                                <i
                                                    class="card-icon-indicator mdi mdi-account-circle bg-inverse-icon-success"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-md-6 stretch-card grid-margin grid-margin-sm-0 pb-sm-3">
                                    <div class="card bg-danger">
                                        <div class="card-body px-3 py-4">
                                            <div class="d-flex justify-content-between align-items-start">
                                                <div class="color-card">
                                                    <p class="mb-0 color-card-head">Exam Fee</p>
                                                    <h4 class="text-white"> <?php echo $row['Examfee']; ?>/-<span
                                                            class="h5"></span></h4>
                                                </div>
                                                <i
                                                    class="card-icon-indicator mdi mdi-cube-outline bg-inverse-icon-danger"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-md-6 stretch-card grid-margin grid-margin-sm-0 pb-sm-3">
                                    <div class="card bg-warning">
                                        <div class="card-body px-3 py-4">
                                            <?php
                                            $enrol = $_SESSION['login'];
                                            $queryresult = mysqli_query($con, "SELECT * FROM `new_payment` WHERE `enrolment` = '$enrol'");
                                            while ($rowNot = mysqli_fetch_array($queryresult)) {
                                                ?>
                                                <div class="d-flex justify-content-between align-items-start">
                                                    <div class="color-card">
                                                        <p class="mb-0 color-card-head">Not Verify</p>
                                                        <h4 class="text-white"> <?php echo $rowNot['add_option_paymentt']; ?>
                                                            /-<span class="h5"></span></h4>
                                                    </div>
                                                    <i class="card-icon-indicator mdi mdi-basket bg-inverse-icon-warning"></i>
                                                </div>
                                                <h6 class="text-white">Transaction Id : <?php echo $rowNot['transaction_id']; ?>
                                                </h6>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-9 stretch-card grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h5><?php echo $row['course']; ?></h5>
                                            <p class="text-muted"> Branch : <?php echo $row['specilization']; ?> | Semester
                                                :
                                                <?php echo $row['semesters']; ?> | Lateral Entry :
                                                <?php echo $hfghfg; ?><!--<a class="text-muted font-weight-medium pl-2" href="#"><u>See Details</u></a>-->
                                            </p>
                                        </div>
                                        <!--<div class="col-sm-5 text-md-right">
                                        <button type="button" class="btn btn-icon-text mb-3 mb-sm-0 btn-inverse-primary font-weight-normal">
                                        <i class="mdi mdi-email btn-icon-prepend"></i>Download Report </button>
                                    </div>-->
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="card mb-3 mb-sm-0">
                                                <div class="card-body py-3 px-4">
                                                    <p class="m-0 survey-head">Father's Name :
                                                    <h5><?php echo $row['fathers_name']; ?></h5>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="card mb-3 mb-sm-0">
                                                <div class="card-body py-3 px-4">
                                                    <p class="m-0 survey-head">Mother's Name :
                                                    <h5><?php echo $row['mothers_name']; ?></h5>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="card mb-3 mb-sm-0">
                                                <div class="card-body py-3 px-4">
                                                    <p class="m-0 survey-head">
                                                        Date of Birth
                                                    <h5><?php echo $row['dob']; ?></h5>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="card mb-3 mb-sm-0">
                                                <div class="card-body py-3 px-4">
                                                    <p class="m-0 survey-head">
                                                        Mobile
                                                    <h5><?php echo $row['mobile_no']; ?></h5>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="card mb-3 mb-sm-0">
                                                <div class="card-body py-3 px-4">
                                                    <p class="m-0 survey-head">
                                                        Email
                                                    <h5><?php echo $row['email']; ?></h5>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div><br>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="card mb-3 mb-sm-0">
                                                <div class="card-body py-3 px-4">
                                                    <p class="m-0 survey-head">Login Password :
                                                    <h5><?php echo $row['Passwordu']; ?></h5>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="card mb-3 mb-sm-0">
                                                <div class="card-body py-3 px-4">
                                                    <p class="m-0 survey-head">Result Password :
                                                    <h5><?php echo $row['ResultPass']; ?></h5>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php include("include/footer.php"); ?>
        </div>
    </div>
</div>