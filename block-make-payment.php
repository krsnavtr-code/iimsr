<?php include('include/header.php'); ?>
<div class="content_wrapper">
    <div class="breadcrumb_wrap" data-stellar-background-ratio="0.3" style="background: url(images/slider_graduate.jpg); background-attachment: fixed; background-position: 50% 50%;">
        <div class="breadcrumb_wrap_inner">
            <div class="container">
                <h1>Make Your Payment</h1>
                <ul class="breadcrumbs">
                    <li><a href="/">Home</a> /</li>
                    <li>Make Your Payment</li>
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
                                <h2 class="YourPayment">Make Your Payment</h2>
                            </div>
                        </div>
                        <form method="post" name="fee" action="payment-request.php" id="customerdata">
                            <div class="row">
                                <div class="col-sm-6 col-md-6 col-lg-6 col-xs-6">
                                    <div class="form-group">
                                        <input type="text" name="billing_name" id="first_name" class="form-control input-sm Credentials" placeholder="First Name" required>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6 col-xs-6">
                                    <div class="form-group">
                                        <input type="text" name="last_name" id="last_name" class="form-control input-sm Credentials" placeholder="Last Name" required>
                                    </div>
                                </div>
                            </div>    
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                                    <div class="form-group">
                                        <input type="email" name="billing_email" id="email" class="form-control input-sm Credentials" placeholder="Email Address" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">    
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                                    <div class="form-group">
                                        <input type="text" name="billing_tel" id="phone" class="form-control input-sm Credentials" placeholder="Phone Number" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                                    <div class="form-group">
                                        <input type="number" class="form-control Credentials" name="amount" placeholder="Amount" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                                    <div class="form-group">
                                        <input type="submit" name="payment" value="Pay Now" class="btn btn-primary btn-block Credentials">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12"></div>
        </div>
    </div>
</div>
<?php include('include/footer.php'); ?>