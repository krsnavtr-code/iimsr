<?php 
    error_reporting(0);
    include('checklogin.php');
    include("dbconnection.php");
	include("include/head.php");

?>
<?php 
    if(isset($_POST['reviewsubmit'])){
        $name = $_POST['name'];
        $company = $_POST['company'];
        $session = $_POST['session'];
        $comment = $_POST['comment'];
        
        $student_image = $_FILES['student_image']['name'];
        $temimag = $_FILES['student_image']['tmp_name'];
        move_uploaded_file($temimag,'images/'.$student_image);
        
        $query = mysqli_query($con,"INSERT INTO `testimonial`(`name`, `company`, `session`, `comment`, `simage`) VALUES ('$name', '$company', '$session', '$comment', '$student_image')");
        
        if($query){
    		$successs = "<p class='OperationHas'>Your Review has been Submited Successfully!</p>";
    	}else{
    		$successs = "<p class='AlreadyRegistered'>Some Thing Went Wrong.</p>";
    	}
    }
?>
<div class="container-scroller">
    <?php include('include/sidebar.php');?>
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
                    <h4 class="card-title pl-4">Testimonial</h4>
                    <div class="col-xl-12 col-sm-12 grid-margin stretch-card">
                        <div class="card AdmissonCofirma">
                            <div class="card-body px-0 overflow-auto">
                                <div class="table-responsive">
                                    <?php
                            			if (isset($_POST['reviewsubmit'])){
                            				echo $successs;
                            			}else {
                            				echo $successs;
                            			}
                            		?>
                                    <form action="" method="post" class="forms-sample" enctype="multipart/form-data" name="applyform">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Name</label>
                                            <input type="text" class="form-control" name="name" id="exampleInputName1" placeholder="Name" />
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail3">Company name</label>
                                            <input type="text" class="form-control" name="name" id="exampleInputName1" placeholder="Name" />
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword4">Session</label>
                                            <input type="text" class="form-control" name="session" id="exampleInputName1" placeholder="Session" />
                                        </div>
                                        <div class="form-group">
                                            <label>Passport Size Photo</label>
                                            <input type="file" name="student_image" placeholder="Passport Size Photo" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleTextarea1">Textarea</label>
                                            <textarea class="form-control" name="comment" placeholder="Your Review"  id="exampleTextarea1"rows="4"></textarea>
                                        </div>
                                        <div class="row vbimt-applyform">
                                            <div class="col-sm-8 col-md-8 col-lg-8 col-xs-12"></div>
                                            <div class="col-sm-4 col-md-4 col-lg-4 col-xs-12">
                                                <button type="submit" name="reviewsubmit" class="btn-block btn btn-primary mr-2">Submit</button>
                                            </div>
                                        </div>
                                    </form>
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