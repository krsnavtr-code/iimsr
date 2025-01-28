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

        <div class="main-panel">
            <div class="content-wrapper pb-0">
                <div class="row">
                    <div class="col-xl-12 col-sm-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body px-0 overflow-auto">
                                <h4 class="card-title pl-4">Admit Card</h4>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="bg-light">
                                            <tr>
                                                <th>Name</th>
                                                <th>Course</th>
                                                <th>Session</th>
                                                <th>Exam Date</th>
                                                <th>Unique Code</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $enrol = $_SESSION['login'];
                                            $query = mysqli_query($con, "select * from `admit_card` WHERE `enrolment`='$enrol'");
                                            while ($row = mysqli_fetch_array($query)) {
                                                ?>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <!--<img src="assets/images/faces/face1.jpg" alt="image" />-->
                                                            <div class="table-user-name ml-3">
                                                                <p class="mb-0 font-weight-medium">
                                                                    <?php echo $row['sname']; ?>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <!--<img src="assets/images/faces/face1.jpg" alt="image" />-->
                                                            <div class="table-user-name ml-3">
                                                                <p class="mb-0 font-weight-medium">
                                                                    <?php echo $row['course']; ?>
                                                                </p>
                                                                <small><?php echo $row['semester']; ?></small>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><?php echo $row['session']; ?></td>
                                                    <td><?php echo $row['date_of_exami']; ?></td>
                                                    <td><?php echo $row['exami_unique_code']; ?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include("include/footer.php"); ?>
        </div>
    </div>
</div>