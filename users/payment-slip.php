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
                <h4 class="card-title pl-4" style="text-align:center;">Payment History</h4>
                <div class="row">
                    <div class="col-xl-12 col-sm-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body px-0 overflow-auto">
                                <p style="text-align:center;color:#ff0000;">*This is an online generated receipt, does
                                    not require signature</p>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="bg-light">
                                            <tr>
                                                <th>Transaction id</th>
                                                <th>Payment Mode</th>
                                                <th>Cash Rs </th>
                                                <th>Payment </th>
                                                <th>Exam Fee </th>
                                                <th>GST* Fee </th>
                                                <th>Verify/Not Verify </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $enrol = $_SESSION['login'];
                                            $queryresult = mysqli_query($con, "SELECT * FROM `new_payment` WHERE `enrolment` = '$enrol'");
                                            while ($rowNot = mysqli_fetch_array($queryresult)) {
                                                ?>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <!--<img src="../admin-123/PaymentSlip/<?php //echo $rowNot['PaymentSlip']; ?>" alt="image" />-->
                                                            <div class="table-user-name ml-3">
                                                                <p class="mb-0 font-weight-medium">
                                                                    <?php echo $rowNot['transaction_id']; ?>
                                                                </p>
                                                                <small> Payment Date :
                                                                    <?php echo $rowNot['payment_date']; ?></small>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><?php echo $rowNot['mode_of_payment']; ?></td>
                                                    <td><?php echo $rowNot['add_option_paymentt']; ?> /-</td>
                                                    <td><?php echo $rowNot['Pay_fee']; ?> /-</td>
                                                    <td><?php echo $rowNot['examfee']; ?> /-</td>
                                                    <td><?php echo $rowNot['fee_tax']; ?> /-</td>
                                                    <td>
                                                        <div class="badge badge-inverse-danger"> Note Verify/Pending</div>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                        <!--</table>
                                    <table class="table">-->
                                        <!--<thead class="bg-light">
                                            <tr>
                                                <th>Transaction id</th>
                                                <th>Payment Mode</th>
                                                <th>Cash Rs </th>
                                                <th>Payment </th>
                                                <th>Exam Fee </th>
                                                <th>GST* Fee </th>
                                                <th>Verify/Not Verify </th>
                                            </tr>
                                        </thead>-->
                                        <tbody>
                                            <?php
                                            $enrol = $_SESSION['login'];
                                            $queryresult = mysqli_query($con, "SELECT r.name, r.dob, r.fathers_name, r.course,p.id,p.name,p.enrolment,p.payment, p.paidt_hrough,p.transaction_id, p.fee, p.tax, p.examfee, p.date FROM `register_here` AS r INNER JOIN `paymentslip` AS p ON r.enrolment = p.enrolment WHERE p.enrolment = '$enrol'");
                                            while ($row = mysqli_fetch_array($queryresult)) {
                                                ?>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <!--<img src="../admin-123/PaymentSlip/<?php //echo $rowNot['PaymentSlip']; ?>" alt="image" />-->
                                                            <div class="table-user-name ml-3">
                                                                <p class="mb-0 font-weight-medium">
                                                                    <?php echo $row['transaction_id']; ?>
                                                                </p>
                                                                <small> Payment Date : <?php echo $row['date']; ?></small>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><?php echo $row['paidt_hrough']; ?></td>
                                                    <td><?php echo $row['payment']; ?> /-</td>
                                                    <td><?php echo $row['fee']; ?> /-</td>
                                                    <td><?php echo $row['examfee']; ?> /-</td>
                                                    <td><?php echo $row['tax']; ?> /-</td>
                                                    <td>
                                                        <div class="badge badge-inverse-success"> Complete </div>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-8 grid-margin stretch-card">
                        <div class="card card-calender"
                            style="background-image: url('assets/images/dashboard/ugc.jpeg');">
                            <div class="card-body">
                                <div class="row pt-4">
                                    <div class="col-sm-12">
                                        <h5 class="text-white" style="text-align:justify;line-height: 25px;">This mail
                                            is regarding to inform you that some counselors and team leader of Imperial
                                            Institute have been fired by us. They had cheated the institution, due to
                                            which they has been terminated. If you get any call from them regarding
                                            payment in any UPI like-: Google Pay, Paytm, or Phone Pay than please don't
                                            do this. You only have to pay to Imperial Institute account, Imperial
                                            Institute website. If you make the payment other account, you will be
                                            responsible for this. Institute will not be responsible for this. You have
                                            may be at a financial loss so please do not make any payments.</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 grid-margin stretch-card">
                        <!--datepicker-->
                        <div class="card">
                            <div class="card-body">
                                <div id="inline-datepicker" class="datepicker table-responsive"></div>
                            </div>
                        </div>
                        <!--datepicker ends-->
                    </div>
                </div>
            </div>
            <?php include("include/footer.php"); ?>
        </div>
    </div>
</div>