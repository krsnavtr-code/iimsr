<?php 
    include('include/header.php');
    if(isset($_POST['reviewsubmit'])){
        $Email = $_POST['Email'];
        $Email = mysqli_real_escape_string($con, $Email);
        $query = mysqli_query($con,"INSERT INTO `subscribe`(`Email`) VALUES ('$Email')");
        if($query){
            echo "<script>alert('Thank You Submited Successfully');</script>";
        }else{
            echo "Some Thing Went Wrong";
        }
    }
    if(isset($_POST['saveesubmit'])){
        $name = $_POST['name'];
        $name = mysqli_real_escape_string($con, $name);
        $Email = $_POST['Email'];
        $Email = mysqli_real_escape_string($con, $Email);
        $message = $_POST['message'];
        $message = mysqli_real_escape_string($con, $message);
        $query = mysqli_query($con,"INSERT INTO `contact_equery`(`name`, `email`, `ctextarea`) VALUES ('$name', '$Email', '$message')");
        if($query){
            echo "<script>alert('Thank You Submited Successfully');</script>";
        }else{
            echo "Some Thing Went Wrong";
        }
    }
?>
<div class="content_wrapper">
    <div class="breadcrumb_wrap" data-stellar-background-ratio="0.3" style="background: url(images/slider_inclass.jpg); background-attachment: fixed; background-position: 50% 50%;">
        <div class="breadcrumb_wrap_inner">
            <div class="container">
                <h1>Contact Us</h1>
                <ul class="breadcrumbs">
                    <li><a href="/">Home</a> /</li>
                    <li>Contact Us</li>
                </ul>
            </div>
        </div>
    </div>
    <div id="contact_wrap" class="contact_wrap">
        <div class="container">
            <div class="col-md-6 col-sm-12 col-xs-12">
                <h3>Contact Info</h3>
                <p>Welcome to our Website. We are glad to have you around.</p>
                <div class="contact_info">
                    <div class="contact_info_inner">
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="icon_box"><i class="fa fa-phone"></i></div>
                            <div class="info_txt">
                                <h4>Email : </h4>
                                <p><a href="mailto: info@iimsr.net.in"> info@iimsr.net.in</a></p>
                                <!--<p>+91 8595113493</p>-->
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="icon_box"><i class="fa fa-envelope"></i></div>
                            <div class="info_txt">
                                <h4>Email : </h4>
                                <p><a href="mailto: info@iimsr.net.in"> info@iimsr.net.in</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="contact_info_inner">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="icon_box"><i class="fa fa-map-marker"></i></div>
                            <div class="info_txt">
                                <h4>Address : </h4>
                                <p>E-48, Sector 3, Noida Gautam Budh Nagar Uttar Pradesh-201301</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12">
                <h3>Send A Message</h3>
                <p>Your email address will not be published. Required fields are marked.</p>
                <div class="contact_form">
                    <form method="post" action="#">
                        <input class="form-control" placeholder="Your Name..." name="name" type="text">
                        <input class="form-control" placeholder="Email Addrress..." name="Email" type="text">
                        <textarea class="form-control" rows="7" placeholder="Message..." name="message"></textarea>
                        <button type="submit" name="saveesubmit" class="btn btn_contact">Submit <i class="fa fa-check"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="newsletter" class="newsletter" data-stellar-background-ratio="0.3" style="background: url(images/newsletter_bg.jpg); background-attachment: fixed; background-position: 50% 50%;">
        <div class="container">
            <h2>Subscribe to our newsletter</h2>
            <p>Signup to receive email updates about courses</p>
            <form method="post" name="submitform" action="">
                <input class="form-control" type="text" name="Email" placeholder="EMAIL ADDRESS" required="">
                <button type="submit" name="reviewsubmit" class="btn btn_getstart">subscribe <i class="fa fa-paper-plane"></i></button>
            </form>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d1751.81971957272!2d77.31639805800057!3d28.580587950979904!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sE-48%2C%20Sector%203%2C%20Noida%20Gautam%20Budh%20Nagar%20Uttar%20Pradesh-201301!5e0!3m2!1sen!2sin!4v1649158640503!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <div class="clearfix"></div>
</div>
<?php include('include/footer.php'); ?>