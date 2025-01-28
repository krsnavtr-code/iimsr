<?php include('include/header.php'); ?>
<?php 
    $submenu = $_GET['submenu'];
    $query = "SELECT * FROM `course` where `submenu`='$submenu'";
    $sqlquery = mysqli_query($con, $query);
?>
<div class="content_wrapper">
    <div class="breadcrumb_wrap" data-stellar-background-ratio="0.3" style="background: url(https://iimsr.net.in/images/slider_group_in_campus.jpg); background-attachment: fixed; background-position: 50% 50%;">
        <div class="breadcrumb_wrap_inner">
            <div class="container">
                <?php 
                    $query1 = "SELECT * FROM `course` where `submenu`='$submenu'";
                    $sqlquery1 = mysqli_query($con, $query1);
                    $rowe = mysqli_fetch_array($sqlquery1);
                    $Course = $rowe['course'];
                    $CourseCategory = $rowe['CourseCategory'];
                ?>
                <h1><?php echo $Course; ?></h1>
                <ul class="breadcrumbs">
                    <li><a href="/">Home</a>/<a href="all-course.php"> Our Course</a></li>
                    <li><?php echo $CourseCategory; ?></li>
                </ul>
            </div>
        </div>
    </div>
    <div id="dtl_wrap" class="dtl_wrap">
        <div class="container">
            <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 dtl_wrapper">
                <div class="dtl_inner_wrap">
                    <div class="dtl_block">
                        <div class="detail_text_wrap">
                            <div class="info_wrapper">
                                <div class="info_head"><h4>Our Courses</h4></div>
                                <div class="panel-group" id="accordion">
                                    <?php 
                                        $sqlquery = mysqli_query($con, "SELECT * FROM `course` ORDER BY `course`");
                                        $num = mysqli_num_rows($sqlquery);
                                        $array = array();
                                        while($row = mysqli_fetch_array($sqlquery)){
                                            if(!in_array($row['course'], $array)){
                                                $array[] = $row['course'];  
                                            }
                                        }
                                        foreach($array as $submitcourse){
                                    ?>
                                    <div class="panel panel-default">
                                        <?php 
                                            $updateurl = strtolower($submitcourse); 
                                            $updateurl = str_replace("&","and",$updateurl);
                                            $updateurl = str_replace(" ","-",$updateurl);
                                        ?>
                                        <ul>
                                            <div class="panel-heading">
                                                <a href="https://iimsr.net.in/course-info.php?submenu=<?php echo $updateurl; ?>"><li><h4 class="panel-title"><i class="fa fa-eyedropper"></i> <?php echo $submitcourse; ?></h4></li></a>
                                            </div>
                                        </ul>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .dtl_inner_wrap {
        border: none;
        padding: 20px 0;
    }
    li{
        list-style: none !important;
    }
    .detail_text_wrap ul, .detail_text_wrap ol {
        padding: 0 0 0 0px;
    }
    .course_tutor ul li .tutor_img{
        float:left;
        width:65px;
        height:48px;
    }
</style>
<?php include('include/footer.php'); ?>