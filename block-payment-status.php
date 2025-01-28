<?php include('include/header.php'); ?>
<div class="content_wrapper">
    <div class="breadcrumb_wrap" data-stellar-background-ratio="0.3" style="background: url(images/slider_graduate.jpg); background-attachment: fixed; background-position: 50% 50%;">
        <div class="breadcrumb_wrap_inner">
            <div class="container">
                <h1>Payment Status</h1>
                <ul class="breadcrumbs">
                    <li><a href="/">Home</a> /</li>
                    <li>Payment Status</li>
                </ul>
            </div>
        </div>
    </div>
    <div id="dtl_wrap" class="dtl_wrap">
        <div class="container">
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12"></div>
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 dtl_wrapper">
                <div class="txt_inner_wrap">
                    <div class="detail_text_wrap">
                        <div class="more-info-content">
                            <div class="Sectionding">
                                <h2 class="YourPayment">Your Payment Status</h2>
                            </div>
                        </div>
                        <?php $data = $_POST; ?>
                        <div class="row">
                            <div class="col-sm-2 col-md-2 col-lg-2 col-xs-12"></div>
                            <div class="col-sm-8 col-md-8 col-lg-8 col-xs-12">
                                <div class="row" style="margin-bottom:40px">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12 StatusPay" style="" align="center">
                                        <h4 style="color:#000;">Payment <?php echo $data['orderAmount']; ?> has been <?php echo $data['txStatus']; ?></h4>
                                        <p style="color:#000;">Your order id is : <?php echo $data['orderId']; ?></p>
                                        <p style="color:#000;">Reference id is : <?php echo $data['referenceId']; ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2 col-md-2 col-lg-2 col-xs-12"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12"></div>
        </div>
    </div>
</div>
<?php include('include/footer.php'); ?>