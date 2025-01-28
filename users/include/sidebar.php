<?php
// error_reporting(0);
// include('head.php');
// include('checklogin.php');
// include("dbconnection.php");
?>
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="text-center sidebar-brand-wrapper d-flex align-items-center">
        <a class="sidebar-brand brand-logo" href="index.php"><img src="https://iimsr.net.in/users/logo.jpeg"
                class="Bomdata" alt="logo" /></a>
        <a class="sidebar-brand brand-logo-mini pl-4 pt-3" href="index.php"><img
                src="https://iimsr.net.in/users/logo.jpeg" class="UsersPanell" alt="logo" /></a>
    </div>
    <ul class="nav">
        <?php
        //$enrol = $_SESSION['login'];
        
        $query = mysqli_query($con, "SELECT * FROM `register_here` where `enrolment` = '$enrol'");
        $row = mysqli_fetch_array($query);
        ?>
        <li class="nav-item nav-profile">
            <a class="nav-link">
                <div class="nav-profile-image">
                    <img src="../admin-12345/images/<?php echo $row['simage']; ?>" alt="profile" />
                    <span class="login-status online"></span>
                </div>
                <div class="nav-profile-text d-flex flex-column pr-3">
                    <span class="font-weight-medium mb-2"><?php //echo $row['name']; ?></span>
                    <span class="font-weight-normal"><?php echo $row['enrolment']; ?></span>
                </div>
                <span class="badge badge-danger text-white ml-3 rounded"></span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php">
                <i class="mdi mdi-home menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <?php if ($row['StudentStatus'] == 1) { ?>
                <a class="nav-link" href="status.php">
                    <i class="mdi mdi-crosshairs-gps menu-icon"></i>
                    <span class="menu-title">Status</span>
                </a>
            <?php } else { ?>
                <a class="nav-link" href="#" data-toggle="modal" data-target="#myModal">
                    <i class="mdi mdi-crosshairs-gps menu-icon"></i>
                    <span class="menu-title">Status</span>
                </a>
            <?php } ?>
        </li>
        <li class="nav-item">
            <?php if ($row['StudentStatus'] == 1) { ?>
                <a class="nav-link" href="payment-slip.php">
                    <i class="mdi mdi-contacts menu-icon"></i>
                    <span class="menu-title">Payment Slip</span>
                </a>
            <?php } else { ?>
                <a class="nav-link" href="#" data-toggle="modal" data-target="#myModal">
                    <i class="mdi mdi-crosshairs-gps menu-icon"></i>
                    <span class="menu-title">Payment Slip</span>
                </a>
            <?php } ?>
        </li>
        <li class="nav-item">
            <?php if ($row['StudentStatus'] == 1) { ?>
                <a class="nav-link" href="admit-card.php">
                    <i class="mdi mdi-format-list-bulleted menu-icon"></i>
                    <span class="menu-title">Admit Card</span>
                </a>
            <?php } else { ?>
                <a class="nav-link" href="#" data-toggle="modal" data-target="#myModal">
                    <i class="mdi mdi-crosshairs-gps menu-icon"></i>
                    <span class="menu-title">Admit Card</span>
                </a>
            <?php } ?>
        </li>
        <li class="nav-item">
            <?php if ($row['StudentStatus'] == 1) { ?>
                <a class="nav-link" href="admission-confirmation.php">
                    <i class="mdi mdi-chart-bar menu-icon"></i>
                    <span class="menu-title">Admission Confirmation</span>
                </a>
            <?php } else { ?>
                <a class="nav-link" href="#" data-toggle="modal" data-target="#myModal">
                    <i class="mdi mdi-crosshairs-gps menu-icon"></i>
                    <span class="menu-title">Admission Confirmation</span>
                </a>
            <?php } ?>
        </li>
        <li class="nav-item">
            <?php if ($row['StudentStatus'] == 1) { ?>
                <a class="nav-link" href="testimonial.php">
                    <i class="mdi mdi-table-large menu-icon"></i>
                    <span class="menu-title">Testimonial</span>
                </a>
            <?php } else { ?>
                <a class="nav-link" href="#" data-toggle="modal" data-target="#myModal">
                    <i class="mdi mdi-crosshairs-gps menu-icon"></i>
                    <span class="menu-title">Testimonial</span>
                </a>
            <?php } ?>
        </li>
        <li class="nav-item">
            <span class="nav-link" href="ChangePassword.php">
                <i class="mdi mdi-key menu-icon"></i>
                <span class="menu-title">Change Password</span>
            </span>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="mdi mdi-crosshairs-gps menu-icon"></i>
                <span class="menu-title">Downloads</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <?php if ($row['StudentStatus'] == 1) { ?>
                            <a class="nav-link" href="result-marks-card.php">Downloads Marks card</a>
                        <?php } else { ?>
                            <a class="nav-link" href="#" data-toggle="modal" data-target="#myModal">
                                <span class="menu-title">Downloads Marks card</span>
                            </a>
                        <?php } ?>
                    </li>
                    <li class="nav-item">
                        <?php if ($row['StudentStatus'] == 1) { ?>
                            <a class="nav-link" href="result-certificate.php">Downloads Certificate</a>
                        <?php } else { ?>
                            <a class="nav-link" href="#" data-toggle="modal" data-target="#myModal">
                                <span class="menu-title">Downloads Certificate</span>
                            </a>
                        <?php } ?>
                    </li>
                    <li class="nav-item">
                        <?php if ($row['StudentStatus'] == 1) { ?>
                            <a class="nav-link" href="result-cmm.php">Downloads CMM</a>
                        <?php } else { ?>
                            <a class="nav-link" href="#" data-toggle="modal" data-target="#myModal">
                                <span class="menu-title">Downloads CMM</span>
                            </a>
                        <?php } ?>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item sidebar-actions">
            <div class="nav-link">
                <ul class="pl-0">
                    <a class="dropdown-item" href="logout.php">
                        <li>Sign Out</li>
                    </a>
                </ul>
            </div>
        </li>
    </ul>
</nav>
<!-- <div class="modal fade ModelFad" id="myModal" role="dialog">
    <div class="modal-dialog ModelDial">
        <div class="modal-content ModelConte">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body ContactUst">
                <h3>Important Notice...!</h3>
                <p>Your login account has been closed due to payment please contact the institute </p>
                <p style="text-align:right;">Thank you</p>
            </div>
            <div class="modal-footer"></div>
        </div>
    </div>
</div> -->