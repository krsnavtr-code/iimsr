<?php include('include/header.php'); ?>
<div class="content_wrapper">
    <div class="breadcrumb_wrap" data-stellar-background-ratio="0.3" style="background: url(images/slider_group_in_campus.jpg); background-attachment: fixed; background-position: 50% 50%;">
        <div class="breadcrumb_wrap_inner">
            <div class="container">
                <h1>Tourism Management</h1>
                <ul class="breadcrumbs">
                    <li><a href="/">Home</a> /</li>
                    <li><a href="tourism-management.php">Tourism Management</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div id="dtl_wrap" class="dtl_wrap">
        <div class="container">
            <div class="col-md-9 col-sm-9 col-lg-9 col-xs-12 dtl_wrapper">
                <div class="dtl_inner_wrap">
                    <div class="dtl_block">
                        <div class="detail_text_wrap">
                            <div class="info_wrapper">
                                <h5>Category Tourism Management</h5>
                                <div class="panel-group" id="accordion">
                                    <?php 
                                        $sqlquery = mysqli_query($con, "SELECT * FROM `course`");
                                        $num = mysqli_num_rows($sqlquery);
                                        while($row = mysqli_fetch_array($sqlquery)){
                                            $Category_id = $row['CourseCategory'];
                                            $Course = $row['course'];
                                            $submenu = $row['submenu'];
                                            $total_fee = $row['total_fee'];
                                            $eligibility = $row['eligibility'];
                                        if($Category_id=='Tourism Management' && $total_fee && $eligibility){
                                    ?>
                                    <div class="panel panel-default">
                                        <div class="panel-heading" id="head_One">
                                            <h4 class="panel-title">
                                                <a href="course-info/<?php echo $submenu; ?>">
                                                    <i class="fa fa-eyedropper"></i> <?php echo $Course; ?>
                                                </a>
                                            </h4>
                                        </div>
                                    </div>
                                    <?php } } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="col-md-3 col-sm-3 col-lg-3 col-xs-12 aside_wrapper">
                <div class="course_tutor">
                    <h4>Instructors</h4>
                    <ul>
                        <?php 
                            $sqlquery = mysqli_query($con, "SELECT * FROM `our_teachers` ORDER BY RAND() LIMIT 4;");
                            $num = mysqli_num_rows($sqlquery);
                            while($row = mysqli_fetch_array($sqlquery)){
                                $TeacherStatus = $row['TeacherStatus'];
                                if($TeacherStatus==1){
                        ?>
                        <li>
                            <div class="tutor_img">
                                <img alt="TeacherImages" src="images/experts/<?php echo $row['TeacherImages']; ?>">
                            </div>
                            <div class="tutor_info">
                                <h5> <a href="#"><?php echo $row['TeachersName']; ?></a> <em></em> </h5>
                                <p><?php echo $row['Designation']; ?></p>
                            </div>
                        </li>
                        <?php } } ?>
                    </ul>
                </div>
                <div class="course_tags">
                    <h4>Course Category</h4>
                    <ul>
                        <li><?php 
                                $sqlquery = mysqli_query($con, "SELECT * FROM `coursecategory`");
                                $num = mysqli_num_rows($sqlquery);
                                while($row = mysqli_fetch_array($sqlquery)){
                                    $CourseCategory = $row['CatName'];
                            ?>
                            <a href="#"><?php echo $CourseCategory; ?></a>
                            <?php } ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('include/footer.php'); ?>