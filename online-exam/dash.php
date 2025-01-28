<?php
    include_once 'dbconnection.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" href="favicon.ico" type="image/icon" sizes="16x16">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title> Admin | Vidya Bharti Institute Of Management & Technology Online Examination</title>
<link  rel="stylesheet" href="css/bootstrap.min.css"/>
<link  rel="stylesheet" href="css/bootstrap-theme.min.css"/>
<link rel="stylesheet" href="css/main.css">
<link  rel="stylesheet" href="css/font.css">
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js"  type="text/javascript"></script>
<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>

<script>
$(function () {
    $(document).on( 'scroll', function(){
        console.log('scroll top : ' + $(window).scrollTop());
        if($(window).scrollTop()>=$(".logo").height())
        {
             $(".navbar").addClass("navbar-fixed-top");
        }

        if($(window).scrollTop()<$(".logo").height())
        {
             $(".navbar").removeClass("navbar-fixed-top");
        }
    });
});</script>
</head>
<style>
    .ex1 {
        width: 100%;
        height: 450px;
        overflow-x: auto;
    }
    .AdminHome{
        margin-top: 0px;
    }
    .BhartiInstitute{
        margin-top:15px;
    }
    .VidyaBharti{
        font-size:20px;
    }
    .OnlineExamination{
        color:#fff;
        font-size:20px;
        font-weight:700;
        margin: 0px 0px 0px -20px;
    }
    .EnterQuestion{
        border-radius:0px;
        margin: 7px 0px 0px 0px;
        border: #f0ad4e 1px solid;
    }
    .Questiontitle {
        font-size: 14px;
        font-weight: 700;
        padding: 0px 0px 0px 3px;
    }
    .VidyBhartiInsti{
        height: 50px;
        width: 184px;
        margin: -11px 0px 0px 0px;
    }
    .OnlineExamina{
        font-family: 'typo';
        font-size: 18px;
        color: #ffffff;
        margin: 15px;
    }
    .ViewwResult{
        border-radius:0px;
    }
</style>
<body  style="background:#eee;">
<body  style="background:#eee;">
<div class="header">
	<div class="row">
        <div class="col-sm-3 col-md-3 col-xs-12 VidyaBharti">
            <div class="logo"><img src="image/vbimt-logo.png" alt="vbimt-logo" class="VidyBhartiInsti"></div>
        </div>
        <div class="col-sm-4 col-md-4 col-xs-12 VidyaBharti">
            <div class="OnlineExamina"><span class="OnlineExamina">Online Examination</span></div>
        </div>
		<div class="col-md-5 col-sm-5 col-xs-5">
			<?php
			include_once 'dbconnection.php';
			session_start();
			if (!(isset($_SESSION['username'])) || ($_SESSION['key']) != '54585c506829293a2d4c3b68543b316e2e7a2d277858545a36362e5f39') {
				session_destroy();
				header("location:index.php");
			} else {
				$name     = $_SESSION['name'];
				$username = $_SESSION['username'];
				
				include_once 'dbconnection.php';
				echo '<span class="pull-right top title1" ><span style="color:white"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;Hello,</span> <span class="log log1" style="color:lightyellow">' . $name . '&nbsp;&nbsp;|&nbsp;&nbsp;<a href="logout.php?q=account.php" style="color:lightyellow"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Logout</button></a></span>';
			}
			?>
		</div>
	</div>
</div>
<nav class="navbar navbar-default title1">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="dash.php?q=0"><b>Dashboard</b></a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li <?php if (@$_GET['q'] == 0) echo 'class="active"'; ?>><a href="dash.php?q=0"><b>Home</b><span class="sr-only">(current)</span></a></li>
                <li <?php if (@$_GET['q'] == 1) echo 'class="active"';?>><a href="dash.php?q=1"><b>Student List</b></a></li>
                <li <?php if (@$_GET['q'] == 2) echo 'class="active"';?>><a href="dash.php?q=2"><b>Students Marks Details</b></a></li>
                <li <?php if (@$_GET['q'] == 4) echo 'class="active"'; ?>><a href="dash.php?q=4"><b>Add Subject & Question</b></a></li>
                <li <?php if (@$_GET['q'] == 5) echo 'class="active"'; ?>><a href="dash.php?q=5"><b>Remove Question</b></a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
<div class="row">
<div class="col-md-12">
<?php
if (@$_GET['q'] == 0) {
    $dfg = "SELECT * FROM `examvb_quiz` ORDER BY `date` ASC";
    $result = mysqli_query($con,$dfg);
    echo '<div class="panel"><table class="table table-striped title1"  style="vertical-align:middle">
            <tr><td style="vertical-align:middle"><b>S.N.</b></td><td style="vertical-align:middle"><b>Subject</b></td><td style="vertical-align:middle"><b>Semester</b></td><td style="vertical-align:middle"><b>Course</b></td><td style="vertical-align:middle"><b>Total question</b></td><td style="vertical-align:middle"><b>Marks</b></td><td style="vertical-align:middle"><b>Time limit</b></td><td style="vertical-align:middle"><b>Status</b></td><td style="vertical-align:middle"><b>Action</b></td></tr>';
    $c = 1;
    while ($row = mysqli_fetch_array($result)) {
        $title   = $row['title'];
        $total   = $row['total'];
        $correct = $row['correct'];
        $time    = $row['time'];
        $semsterq    = $row['semsterq'];
        $courseq    = $row['courseq'];
        $eid     = $row['eid'];
        $status  = $row['status'];
        if ($status == "enabled") {
            echo '<tr><td style="vertical-align:middle"><b>'.$c++.'</b></td><td style="vertical-align:middle"><b>'.$title.'</b></td><td style="vertical-align:middle"><b>'.$semsterq.'</b></td><td style="vertical-align:middle"><b>'.$courseq.'</b></td><td style="vertical-align:middle"><b>'.$total.'</b></td><td style="vertical-align:middle"><b>'.$correct * $total.'</b></td><td style="vertical-align:middle"><b>'.$time.'&nbsp;min</b></td><td style="vertical-align:middle">Enabled</td>
                    <td style="vertical-align:middle"><b><a href="update.php?deidquiz='.$eid.'" class="btn logb ViewwResult" style="color:#FFFFFF;background:#ff0000;font-size:12px;padding:5px;">&nbsp;<span><b>Disable</b></span></a></b></td></tr>';
        } else {
            echo '<tr><td style="vertical-align:middle"><b>'.$c++.'</b></td><td style="vertical-align:middle"><b>'.$title.'</b></td><td style="vertical-align:middle"><b>'.$semsterq.'</b></td><td style="vertical-align:middle"><b>'.$courseq.'</b></td><td style="vertical-align:middle"><b>'.$total.'</b></td><td style="vertical-align:middle"><b>'.$correct * $total.'</b></td><td style="vertical-align:middle"><b>'.$time.'&nbsp;min</b></td><td style="vertical-align:middle">Disabled</td>
                    <td style="vertical-align:middle"><b><a href="update.php?eeidquiz='.$eid.'" class="btn logb ViewwResult" style="color:#FFFFFF;background:darkgreen;font-size:12px;padding:5px;">&nbsp;<span><b>Enable</b></span></a></b></td></tr>';
            
        }
    }
}

if (@$_GET['q'] == 2) {
    if(isset($_GET['show'])){
        $show = $_GET['show'];
        $showfrom = (($show-1)*10) + 1;
        $showtill = $showfrom + 9;
    }else{
        $show = 1;
        $showfrom = 1;
        $showtill = 10;
    }
    //$examvb_rankhh = "SELECT * FROM `examvb_rank` ORDER BY `score` DESC";
    $examvb_rankhh = "SELECT * FROM `examvb_rank`";
    //print_r($examvb_rankhh);
    $q = mysqli_query($con, $examvb_rankhh);
        echo '<div class="panel title">
        <table class="table table-striped title1" >
        <tr><td style="vertical-align:middle"><b>S.No.</b></td><td style="vertical-align:middle"><b>Name</b></td><td style="vertical-align:middle"><b>Course</b></td><td style="vertical-align:middle"><b>Subject</b></td><td style="vertical-align:middle"><b>Semester</b></td><td style="vertical-align:middle"><b>Enrolment</b></td><td style="vertical-align:middle"><b>Exam Unique Code</b></td><td style="vertical-align:middle"><b>Marks</b></td></tr>';
    $c = $showfrom-1;
    $total = mysqli_num_rows($q);
    if($total >= $showfrom){
        $examvb_rank = "SELECT * FROM `examvb_rank` ORDER BY `score` DESC, `time` ASC LIMIT ".($showfrom-1).",10";
        //print_r($examvb_rank);
        $q = mysqli_query($con, $examvb_rank);

        while($row = mysqli_fetch_array($q)){
            $e = $row['exami_unique_code'];
            $s = $row['score'];
            $admit_card = "SELECT * FROM `admit_card` WHERE `exami_unique_code`='$e'";
            $q12 = mysqli_query($con, $admit_card);

            $name='';
            $enrol='';
            $exami_unique_code='';
            $course='';
            $semester='';

            while($row = mysqli_fetch_array($q12)){
                $name=$row['sname'];
                $enrol=$row['enrolment'];
                $exami_unique_code=$row['exami_unique_code'];
                $course=$row['course'];
                $semester=$row['semester'];

                $asemester = "SELECT * FROM `examvb_quiz` WHERE `semsterq`='$semester' AND `courseq`='$course'";
                $fggggg = mysqli_query($con, $asemester);

                while($row = mysqli_fetch_array($fggggg)){
                    $title=$row['title'];
                }
                //echo '<tr><td style="color:#99cc32"><b>'.$c.'</b></td><td style="vertical-align:middle">'.$name.'</td><td style="vertical-align:middle">'.$course.'</td><td style="vertical-align:middle">'.$semester.'</td><td style="vertical-align:middle">'.$enrol.'</td><td style="vertical-align:middle">'.$exami_unique_code.'</td><td style="vertical-align:middle">'.$s.'</td><td style="vertical-align:middle">';
            }

            $c++;
            echo '<tr><td style="color:#99cc32"><b>'.$c.'</b></td><td style="vertical-align:middle"><b>'.$name.'</b></td><td style="vertical-align:middle"><b>'.$course.'</b></td><td style="vertical-align:middle"><b>'.$title.'</b></td><td style="vertical-align:middle"><b>'.$semester.'</b></td><td style="vertical-align:middle"><b>'.$enrol.'</b></td><td style="vertical-align:middle"><b>'.$exami_unique_code.'</b></td><td style="vertical-align:middle"><b>'.$s.'</b></td><td style="vertical-align:middle">';
        }
    }else{
    }
            echo '</table></div>';
            echo '<div class="panel title"><table class="table table-striped title1"><tr>';

    $total = round($total/10) + 1;
    if(isset($_GET['show'])){
        $show = $_GET['show'];
    }else{
        $show = 1;
    }
    if($show == 1 && $total==1){
    }
    else if($show == 1 && $total!=1){
        $i = 1;
        while($i<=$total){
            echo '<td style="vertical-align:middle;text-align:center"><a style="font-size:14px;font-family:typo;font-weight:bold" href="dash.php?q=2&show='.$i.'">&nbsp;'.$i.'&nbsp;</a></td>';
            $i++;
        }
        echo '<td style="vertical-align:middle;text-align:center"><a style="font-size:14px;font-family:typo;font-weight:bold" href="dash.php?q=2&show='.($show+1).'">&nbsp;>>&nbsp;</a></td>';
    }else if($show != 1 && $show==$total){
        echo '<td style="vertical-align:middle;text-align:center"><a style="font-size:14px;font-family:typo;font-weight:bold" href="dash.php?q=2&show='.($show-1).'">&nbsp;<<&nbsp;</a></td>';

        $i = 1;
        while($i<=$total){
        echo '<td style="vertical-align:middle;text-align:center"><a style="font-size:14px;font-family:typo;font-weight:bold" href="dash.php?q=2&show='.$i.'">&nbsp;'.$i.'&nbsp;</a></td>';
        $i++;
        }
    }else{
        echo '<td style="vertical-align:middle;text-align:center"><a style="font-size:14px;font-family:typo;font-weight:bold" href="dash.php?q=2&show='.($show-1).'">&nbsp;<<&nbsp;</a></td>';
        $i = 1;
        while($i<=$total){
        echo '<td style="vertical-align:middle;text-align:center"><a style="font-size:14px;font-family:typo;font-weight:bold" href="dash.php?q=2&show='.$i.'">&nbsp;'.$i.'&nbsp;</a></td>';
        $i++;
        }
        echo '<td style="vertical-align:middle;text-align:center"><a style="font-size:14px;font-family:typo;font-weight:bold" href="dash.php?q=2&show='.($show+1).'">&nbsp;>>&nbsp;</a></td>';
    }
        echo '</tr></table></div>';
}
if (@$_GET['q'] == 1) {
    $cardadmit = "SELECT * FROM `admit_card` ORDER BY `enrolment`";
    $result = mysqli_query($con,$cardadmit) or die('Error');
        echo '<div class="panel ex1"><table class="table table-striped title1">
        <tr><td style="vertical-align:middle"><b>S.N.</b></td><td style="vertical-align:middle"><b>Name</b></td><td style="vertical-align:middle"><b>Enrolment</b></td><td style="vertical-align:middle"><b>Course</b></td><td style="vertical-align:middle"><b>Exam Unique Code</b></td><td style="vertical-align:middle"><b>Semester</b></td><td style="vertical-align:middle"><b>Session</b></td><td style="vertical-align:middle"><b></b></td><td style="vertical-align:middle"></td></tr>';
    $c = 1;
    while ($row = mysqli_fetch_array($result)){
        $name = $row['sname'];
        $enrolment = $row['enrolment'];
        $course = $row['course'];
        $session = $row['session'];
        $semester = $row['semester'];
        $exami_unique_code = $row['exami_unique_code'];

        echo '<tr><td style="vertical-align:middle">'.$c++.'</td><td style="vertical-align:middle"><b>'.$name.'</b></td><td style="vertical-align:middle"><b>'.$enrolment.'</b></td><td style="vertical-align:middle"><b>'.$course.'</b></td><td style="vertical-align:middle"><b>'.$exami_unique_code.'</b></td><td style="vertical-align:middle"><b>'.$semester.'</b></td><td style="vertical-align:middle"><b>'.$session.'</b></td></tr>';
    }
    $c = 0;
        echo '</table></div>';

}?>
    <!--add Question start-->
    <?php
    if(@$_GET['q']==4 && !(@$_GET['step'])){ ?>
        <div class="row">
            <span class="btn btn-primary btn-block" style="font-size:20px;"><b>Enter Subject Details</b></span><br /><br />
            <div class="col-sm-12 col-md-12 col-xs-12">
                <form class="form-horizontal title1" name="form" action="update.php?q=addquiz" method="POST">
                    <fieldset>
                        <!-- Text input-->
                        <div class="row form-group">
                            <div class="col-sm-6 col-md-6 col-xs-12 EnterQuestionDetails">
                                <lable class="Questiontitle">Select Course</lable>
                                <select name="courseq" class="form-control input-md EnterQuestion" required onkeyup="mycalculatenumber()" id="slectcourse" required>
                                    <option value="" disable selected>Please Select Course:</option>
                                    <?php
                                    $sqlquery = mysqli_query($con, "SELECT * FROM `course`  ORDER BY `course`");
                                    $num = mysqli_num_rows($sqlquery);

                                    $array = array();
                                    while($row = mysqli_fetch_array($sqlquery)){
                                        print_r($row);
                                        if(!in_array($row["course"], $array)){
                                            $array[] = $row["course"];
                                        }
                                    }
                                    foreach($array as $submitcourse){ ?>
                                        <option value="<?php echo $submitcourse; ?>"><?php echo $submitcourse; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-sm-6 col-md-6 col-xs-12 EnterQuestionDetails">
                                <lable class="Questiontitle">Select Subject</lable>
                                <select name="name" class="form-control input-md EnterQuestion" id="slectbranch" required>
                                    <?php if(isset($_POST['edit'])){ ?>
                                        <option value="<?php echo $roere['name']; ?>"><?php echo $roere['name']; ?></option>
                                    <?php }else{ ?>
                                        <option value="" disable hidden>Select Subject</option>
                                    <?php } ?>
                                    <?php if($braannch!=null){ ?>
                                        <option selected="selected"><?php echo $braannch; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <!-- Text input-->
                        <div class="row form-group">
                            <div class="col-sm-6 col-md-6 col-xs-12 EnterQuestionDetails">
                                <lable class="Questiontitle">Select Semester</lable>
                                <select class="form-control input-md EnterQuestion" id="selectBox" name="semsterq" required>
                                    <option value="" disable selected>Select Semester</option>
                                    <?php
                                    $query = mysqli_query($con,"select `semester` from `course`");
                                    $array = array();
                                    while($row = mysqli_fetch_array($query)){
                                        $string = str_replace(' ','',strtolower($row['semester']));
                                        if(!in_array($string,$array)){
                                            $array[] = $string;
                                        }
                                    }
                                    foreach($array as $semester){
                                        ?>
                                        <option value="<?php echo (ucfirst($semester)); ?>"><?php echo (ucfirst($semester)); ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-sm-6 col-md-6 col-xs-12 EnterQuestionDetails">
                                <lable class="Questiontitle">Enter total number of questions</lable>
                                <input id="total" name="total" placeholder="Enter total number of questions" class="form-control input-md EnterQuestion" type="number" required>
                            </div>
                        </div>
                        <!-- Text input-->
                        <div class="row form-group">
                            <div class="col-sm-6 col-md-6 col-xs-12 EnterQuestionDetails">
                                <lable class="Questiontitle">Enter time limit for Examination in minute</lable>
                                <input id="time" name="time" placeholder="Enter time limit for Examination in minute" class="form-control input-md EnterQuestion" min="1" type="number" required>
                            </div>
                            <div class="col-sm-6 col-md-6 col-xs-12 EnterQuestionDetails">
                                <lable class="Questiontitle">Enter marks on right answer</lable>
                                <input id="right" name="right" placeholder="Enter marks on right answer" class="form-control input-md EnterQuestion" min="0" type="number" required>
                            </div>
                        </div>
                        <!-- Text input-->
                        <div class="row form-group">
                            <div class="col-sm-9 col-md-9 col-xs-12"></div>
                            <div class="col-sm-3 col-md-3 col-xs-12">
                                <input type="submit" class="btn btn-primary btn-block EnterQuestion" value="Submit" class="btn btn-primary"/>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    <?php } ?>
    <!--add quiz end-->
<?php
if (@$_GET['q'] == 4 && (@$_GET['step']) == 2) {
    echo '
<div class="row">
    <span class="btn btn-primary btn-block title1" style="font-size:20px;margin-left:40%;"><b>Enter Question Details</b></span><br /><br />
<div class="col-md-3"></div><div class="col-md-6"><form class="form-horizontal title1" name="form" action="update.php?q=addqns&n=' . @$_GET['n'] . '&eid=' . @$_GET['eid'] . '&ch=4 "  method="POST">
    <fieldset>
    ';
    
    for ($i = 1; $i <= @$_GET['n']; $i++) {
        echo '<b>Question number&nbsp;' . $i . '&nbsp;:</><br /><!-- Text input-->
                <div class="form-group">
                    <label class="col-md-12 control-label" for="qns' . $i . ' "></label>  
                    <div class="col-md-12">
                        <textarea rows="3" cols="5" name="qns' . $i . '" class="form-control EnterQuestion" placeholder="Write question number ' . $i . ' here..."></textarea>  
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12 control-label" for="' . $i . '1"></label>  
                    <div class="col-md-12">
                        <input id="' . $i . '1" name="' . $i . '1" placeholder="Enter option a" class="form-control input-md EnterQuestion" type="text">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12 control-label" for="' . $i . '2"></label>  
                    <div class="col-md-12">
                        <input id="' . $i . '2" name="' . $i . '2" placeholder="Enter option b" class="form-control input-md EnterQuestion" type="text">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12 control-label" for="' . $i . '3"></label>  
                    <div class="col-md-12">
                        <input id="' . $i . '3" name="' . $i . '3" placeholder="Enter option c" class="form-control input-md EnterQuestion" type="text">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12 control-label" for="' . $i . '4"></label>  
                    <div class="col-md-12">
                        <input id="' . $i . '4" name="' . $i . '4" placeholder="Enter option d" class="form-control input-md EnterQuestion" type="text">
                    </div>
                </div>
                <br />
                <b>Correct answer</b>:<br />
                <select id="ans' . $i . '" name="ans' . $i . '" placeholder="Choose correct answer " class="form-control input-md EnterQuestion" >
                    <option value="a">Select answer for question ' . $i . '</option>
                    <option value="a">option a</option>
                    <option value="b">option b</option>
                    <option value="c">option c</option>
                    <option value="d">option d</option> 
                </select><br /><br />';
        }
    echo '<div class="form-group">
                <label class="col-md-12 control-label" for=""></label>
                <div class="col-md-12"> 
                    <input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary EnterQuestion"/>
                </div>
            </div>
        </fieldset>
    </form>
</div>';
    
    
    
}
if (@$_GET['q'] == 5) {
    $result = mysqli_query($con, "SELECT * FROM `examvb_quiz` ORDER BY `date` DESC") or die('Error');
    echo '<div class="panel"><table class="table table-striped title1">
<tr><td style="vertical-align:middle"><b>S.N.</b></td><td style="vertical-align:middle"><b>Subject</b></td><td style="vertical-align:middle"><b>Semester</b></td><td style="vertical-align:middle"><b>Course</b></td><td style="vertical-align:middle"><b>Total question</b></td><td style="vertical-align:middle"><b>Marks</b></td><td style="vertical-align:middle"><b>Time limit</b></td><td style="vertical-align:middle"><b>Action</b></td></tr>';
    $c = 1;
    while ($row = mysqli_fetch_array($result)) {
        $title = $row['title'];
        $total = $row['total'];
        $correct = $row['correct'];
        $time = $row['time'];
        $semsterq = $row['semsterq'];
        $courseq = $row['courseq'];
        $eid = $row['eid'];
        echo '<tr><td style="vertical-align:middle">'.$c++.'</td><td style="vertical-align:middle"><b>'.$title.'</b></td><td style="vertical-align:middle"><b>'.$semsterq.'</b></td><td style="vertical-align:middle"><b>'.$courseq.'</b></td><td style="vertical-align:middle"><b>'.$total.'</b></td><td style="vertical-align:middle"><b>'.$correct * $total.'</b></td><td style="vertical-align:middle"><b>'.$time.'&nbsp;min</b></td>
  <td style="vertical-align:middle"><b><a href="update.php?q=rmquiz&eid='.$eid.'" class="btn ViewwResult" style="margin:0px;background:red;color:white">&nbsp;<span class="title1"><b>Remove</b></span></a></b></td></tr>';
    }
    $c = 0;
    echo '</table></div>';
    
}
?>
</div>
</div>
</div>
    <script>
        $("#slectcourse").change(function() {
            var data = $("#slectcourse").val();

            $.ajax({
                url: "subject.php",
                type: 'post',
                data: {data:data},
                success: function(data){
                    $('#slectbranch').html(data);
                }});
        });


        $("#slectbranch").change(function(){
            var barnch = $("#slectbranch").val();
            if(barnch==="other"){
                $("#branchnameen").show();
            }
        });
    </script>
</body>
</html>
