<?php
include_once 'dbconnection.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" href="favicon.ico" type="image/icon" sizes="16x16">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Imperial Institute of Management Science & Research</title>
<link  rel="stylesheet" href="css/bootstrap.min.css"/>
<link  rel="stylesheet" href="css/bootstrap-theme.min.css"/>
<link rel="stylesheet" href="css/main.css">
<link  rel="stylesheet" href="css/font.css">
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js"  type="text/javascript"></script>
<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>

</head>
<body>
    <style>
        @media(max-width:992px){
            .ex2 {
                width: 100% !important;
                height: auto !important;
                overflow-x: auto !important;
            }
            .HeaderOnline{
                height: 106px !important;
            }
            .OnlineExamina{
               margin: -10px 0px 0px 0px !important;
            }
            .timerrbutton{
                margin-left: 10px !important;
                margin-bottom: 10px !important;
                border-radius: 0px !important;
            }
            
        }
        .ImportantNoticee{
            border-color: #030358;
            margin: 3px 0px 3px 0px;
            padding: 12px;
            border-radius: 0px;
        }
        .ImportantNoticeee{
            border-color: #030358;
            margin: -8px 0px 0px 0px;
            padding: 12px;
            border-radius: 0px;
        }
        .timerrbutton{
            border-radius: 0px !important;
        }
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
            width: 395px;
            margin: -11px 0px 0px 0px;
        }
        .OnlineExamina{
            font-family: 'typo';
            font-size: 18px;
            color: #ffffff;
            margin-top: 9px;
            float: right;
            
        }
        .ViewwResult{
            border-radius:0px;
        }
        .NotesImportant {
            color:#fff;
            background-color: #235005;
            padding: 7px 10px 7px 10px;
        }
        ul.NoticeImpo {
            border: #030358 1px solid;
            margin: -29px 0px 0px 0px;
            padding: 30px 0px 30px 0px;
        }
        .SessionNameShow {
            font-size: 11px;
            color: #fff;
        }
        .DevelopedBy{
            margin:10px 0px 0px 0px;
        }
    </style>
    <div class="header HeaderOnline">
        <div class="container">
            <div class="row">
                <div class="col-sm-3 col-md-3 col-xs-12 VidyaBharti">
                    <div class="logo"><img src="image/logo.jpeg" alt="vbimt-logo" class="VidyBhartiInsti"></div>
                </div>
                <div class="col-sm-4 col-md-4 col-xs-12 VidyaBharti">
                    <div class="OnlineExamina"><span class="OnlineExamina">Online Examination</span></div>
                </div>
                <div class="col-md-5 col-sm-5 col-xs-12">
                    <?php
                        include_once 'dbconnection.php';
                        session_start();
                        if (!(isset($_SESSION['exami_unique_code']))){
                            header("location:index.php");
                        }else{
                            $name = $_SESSION['sname'];
                            $username = $_SESSION['exami_unique_code'];
    
                            include_once 'dbconnection.php';
                            echo '<span class="pull-right top title1" ><span style="color:white"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;Hello,</span> <span class="log log1" style="color:lightyellow"><span class="SessionNameShow">'.$name.'&nbsp;&nbsp;</span>|&nbsp;&nbsp;<a href="logout.php?q=account.php" style="color:lightyellow;font-size: 12px;"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Logout</button></a></span>';
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="bg">
        <nav class="navbar navbar-default title1">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li <?php if (@$_GET['q'] == 1) echo 'class="active"'; ?> ><a href="account.php?q=1"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>&nbsp<b>Home</b><span class="sr-only">(current)</span></a></li>
                        <li <?php if (@$_GET['q'] == 2) echo 'class="active"'; ?>><a href="account.php?q=2"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>&nbsp;<b>Exam Overview</b></a></li>
                        <li <?php if (@$_GET['q'] == 3) echo 'class="active"'; ?>><a href="account.php?q=3"><span class="glyphicon glyphicon-stats" aria-hidden="true"></span>&nbsp;<b>Exam Review</b></a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-xs-12">
                    <?php
                        if (@$_GET['q'] == 1) {
                            $username = $_SESSION['exami_unique_code'];

                            //$jhsdfbhf = "SELECT * FROM `examvb_quiz` WHERE `status`='enabled' ORDER BY `date` DESC";

                            $jhsdfbhf ="SELECT equiz.`eid`, equiz.`title`, equiz.`correct`, equiz.`wrong`, `equiz`.`total`, `equiz`.`time`, 
                            equiz.`semsterq`,equiz.`courseq`, equiz.`date`, equiz.`id`, equiz.`status` FROM `examvb_quiz` as equiz 
                            INNER JOIN `admit_card` as adcard ON adcard.semester=equiz.`semsterq` AND equiz.`courseq`= adcard.`course` 
                            WHERE adcard.`exami_unique_code`='$username' AND equiz.`status` = 'enabled'  ORDER BY  equiz.`date` DESC";

                            $result = mysqli_query($con,$jhsdfbhf);
                            echo '<div class="panel ex2 ImportantNoticeee">
                            <table class="table table-striped title1" style="vertical-align:middle">
                            <tr>
                                <td style="vertical-align:middle"><b>S.N.</b></td>
                                <td style="vertical-align:middle"><b>Semester</b></td>
                                <td style="vertical-align:middle"><b>Total question</b></td>
                                <td style="vertical-align:middle"><b>Correct Answer</b></td>
                                <td style="vertical-align:middle"><b>Wrong Answer</b></td>
                                <td style="vertical-align:middle"><b>Total Marks</b></td>
                                <td style="vertical-align:middle"><b>Time limit</b></td>
                                <td style="vertical-align:middle"><b>Semester</b></td>
                                <td style="vertical-align:middle"><b>Course</b></td>
                                <td style="vertical-align:middle"><b>Action</b></td>
                            </tr>';
                            $c = 1;
                            while ($row = mysqli_fetch_array($result)){
                                $title   = $row['title'];
                                $total   = $row['total'];
                                $correct = $row['correct'];
                                $wrong   = $row['wrong'];
                                $time    = $row['time'];
                                $semsterq    = $row['semsterq'];
                                $courseq    = $row['courseq'];
                                $eid     = $row['eid'];
                                $skfsjdf = "SELECT `score` FROM `examvb_history` WHERE `eid`='$eid' AND `exami_unique_code`='$username'";
                                //print_r($skfsjdf);
                                $q12 = mysqli_query($con,$skfsjdf) or die('Error98');
                                $rowcount = mysqli_num_rows($q12);
                                if($rowcount == 0){
                                    echo '<tr>
                                    <td style="vertical-align:middle">'.$c++.'</td>
                                    <td style="vertical-align:middle">'.$semsterq.'</td>
                                    <td style="vertical-align:middle">'.$total.'</td>
                                    <td style="vertical-align:middle">+'.$correct.'</td>
                                    <td style="vertical-align:middle">-'.$wrong.'</td>
                                    <td style="vertical-align:middle">'.$correct * $total.'</td>
                                    <td style="vertical-align:middle">'.$time.'&nbsp;min</td>
                                    <td style="vertical-align:middle">'.$semsterq.'</td>
                                    <td style="vertical-align:middle">'.$courseq.'</td>
                                    <td style="vertical-align:middle"><b><a href="account.php?q=quiz&step=2&eid='.$eid.'&n=1&t='.$total.'&start=start" class="btn" style="color:#FFFFFF;background:darkgreen;font-size:12px;padding:7px;padding-left:10px;padding-right:10px"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span>&nbsp;<span><b>Start</b></span></a></b></td>
                                    </tr>';
                                }else{
                                    //$fgdf = "SELECT * FROM `examvb_history` WHERE `username`='$_SESSION[username]' AND `eid`='$eid'";
                                    $fgdf = "SELECT * FROM `examvb_history` WHERE `exami_unique_code`='$username' AND `eid`='$eid'";
                                    //print_r($fgdf);
                                    $q = mysqli_query($con,$fgdf) or die('Error197');
                                    while ($row = mysqli_fetch_array($q)){
                                        $timec  = $row['timestamp'];
                                        $status = $row['status'];
                                    }
                                    $rtyt = "SELECT * FROM `examvb_quiz` WHERE `eid`='$eid'";
                                     //print_r($rtyt);
                                    $q = mysqli_query($con,$rtyt);
                                    while ($row = mysqli_fetch_array($q)){
                                        $ttimec  = $row['time'];
                                        $qstatus = $row['status'];
                                    }
                                    $remaining = (($ttimec * 60) - ((time() - $timec)));
                                    if($remaining > 0 && $qstatus == "enabled" && $status == "ongoing"){
                                        echo '<tr style="color:darkgreen"><td style="vertical-align:middle">'.$c++.'</td><td style="vertical-align:middle">'.$semsterq.'&nbsp;<span title="This quiz is already solve by you" class="glyphicon glyphicon-ok" aria-hidden="true"></span></td><td style="vertical-align:middle">'.$total.'</td><td style="vertical-align:middle">+'.$correct.'</td><td style="vertical-align:middle">-'.$wrong.'</td><td style="vertical-align:middle">'.$correct * $total.'</td><td style="vertical-align:middle">'.$time.'&nbsp;min</td>
                                        <td style="vertical-align:middle"><b><a href="account.php?q=quiz&step=2&eid='.$eid.'&n=1&t='.$total.'&start=start" class="btn ViewwResult" style="margin:0px;background:darkorange;color:white">&nbsp;<span class="title1"><b>Continue</b></span></a></b></td></tr>';
                                    }else{
                                        echo '<tr style="color:darkgreen"><td style="vertical-align:middle">'.$c++.'</td><td style="vertical-align:middle">'.$semsterq.'&nbsp;<span title="This quiz is already solve by you" class="glyphicon glyphicon-ok" aria-hidden="true"></span></td><td style="vertical-align:middle">'.$total.'</td><td style="vertical-align:middle">+'.$correct.'</td><td style="vertical-align:middle">-'.$wrong.'</td><td style="vertical-align:middle">'.$correct * $total.'</td><td style="vertical-align:middle">'.$time.'&nbsp;min</td>
                                        <td style="vertical-align:middle"><b><a href="account.php?q=result&eid='.$eid.'" class="btn ViewwResult" style="margin:0px;background:darkred;color:white">&nbsp;<span class="title1"><b>View Result</b></span></a></b></td></tr>';
                                    }
                                }
                            }
                            $c = 0;
                            echo '</table></div><div class="panel ImportantNoticee" style="padding-top:1px;padding-left:10%;padding-right:10%;word-wrap:break-word"><h3 align="center" style="font-family:calibri" class="NotesImportant">:: Important Note! ::</h3><br /><ul type="circle" class="NoticeImpo"><font style="font-size: 14px;font-family: Roboto, Helvetica, sans-serif;">';
                            echo'<ul>
                                    <li>You are allowed to start the test whenever you want to. The timer would start only when you start the test. However remember that admin has full rights to disable the test at any time. So it is recommended to start the test at the prescribed time.</li>
                                    <li>You can see the history of test taken and scores in the <b style="color:red;font-size:16px;">"History"</b> section.</li>
                                    <li>To start the test, click on <b style="color:red; font-size:16px;">"Start"</b>.</li>
                                    <li>Once the test is started the timer would run irrespective of your logged in or logged our status. So it is recommended not to logout before test completion.</li>
                                    <li>To mark an answer you need to select it and press the <b style="color:red; font-size:16px;">"Lock"</b> button. Upon locking, the selected answer would be displayed and the question will be marked <b style="color:green; font-size:16px;">"green"</b>
                                    To delete an answer press <span style="color:darkred:font-size:16px" class="glyphicon glyphicon-remove"></span>.</li>
                                    <li>Use the navigation buttons to navigate through different questions.</li>
                                    <li>The marks for correct and incorrect answer are listed above in the table.</li>
                                </ul>';
                            echo '</font></ul></div>';
                        }
                    ?>
                    <?php
                        if(@$_GET['q'] == 'quiz' && @$_GET['step'] == 2 && isset($_SESSION['6e447159425d2d']) && $_SESSION['6e447159425d2d'] == "6e447159425d2d" && @$_GET['endquiz'] == 'end') {
                            unset($_SESSION['6e447159425d2d']);
                            $xcvcnv = "UPDATE examvb_history SET status='finished' WHERE exami_unique_code='$_SESSION[exami_unique_code]' AND eid='$_GET[eid]' ";
                            $q = mysqli_query($con,$xcvcnv) or die('Error197');
                                $xxxdcfv = "SELECT * FROM examvb_history WHERE eid='$_GET[eid]' AND exami_unique_code='$_SESSION[exami_unique_code]'";
                                $q = mysqli_query($con, $xxxdcfv) or die('Error156');

                                while ($row = mysqli_fetch_array($q)){
                                    $s = $row['score'];
                                    $scorestatus = $row['score_updated'];
                                }
                                 if($scorestatus=="false"){
                                    $ggbhgb ="UPDATE examvb_history SET score_updated='true' WHERE exami_unique_code='$_SESSION[exami_unique_code]' AND eid='$_GET[eid]' ";
                                    $q = mysqli_query($con, $ggbhgb) or die('Error197');
                                    $tryryt = "SELECT * FROM examvb_rank WHERE exami_unique_code='$username'";
                                    $q = mysqli_query($con, $tryryt) or die('Error161');
                                    $rowcount = mysqli_num_rows($q);

                                    if($rowcount == 0){
                                        $nvbjfhyt = "INSERT INTO `examvb_rank`(`exami_unique_code`, `score`, `time`) VALUES ('$username','$s',NOW())";
                                        $q2 = mysqli_query($con, $nvbjfhyt) or die('Error165');
                                    }else{

                                        while ($row = mysqli_fetch_array($q)) {
                                            $sun = $row['score'];
                                        }

                                        $sun = $s + $sun;
                                        $cvcbcvfg = "UPDATE `examvb_rank` SET `score`=$sun ,time=NOW() WHERE exami_unique_code= '$username'";
                                        $q = mysqli_query($con, $cvcbcvfg) or die('Error174');
                                    }
                                }
                                //header('location:account.php?q=result&eid='.$_GET['eid']);
                        }

                        if (@$_GET['q'] == 'quiz' && @$_GET['step'] == 2 && isset($_GET['start']) && $_GET['start'] == "start" && (!isset($_SESSION['6e447159425d2d']))) {

                            $plmnb = "SELECT * FROM examvb_history WHERE exami_unique_code='$username' AND eid='$_GET[eid]' ";
                            $q = mysqli_query($con, $plmnb) or die('Error197');

                            if (mysqli_num_rows($q) > 0) {
                                $utyhgb = "SELECT * FROM examvb_history WHERE exami_unique_code='$_SESSION[exami_unique_code]' AND eid='$_GET[eid]'";
                                
                                $q = mysqli_query($con, $utyhgb) or die('Error197');

                                while ($row = mysqli_fetch_array($q)) {
                                    $timel  = $row['timestamp'];
                                    $status = $row['status'];
                                }

                                $pkoiju = "SELECT * FROM examvb_quiz WHERE eid='$_GET[eid]'";
                                $q = mysqli_query($con, $pkoiju) or die('Error197');
                                while ($row = mysqli_fetch_array($q)) {
                                    $ttimel  = $row['time'];
                                    $qstatus = $row['status'];
                                }

                                $remaining = (($ttimel * 60) - ((time() - $timel)));
                                if ($status == "ongoing" && $remaining > 0 && $qstatus == "enabled") {
                                    $_SESSION['6e447159425d2d'] = "6e447159425d2d";
                                    header('location:account.php?q=quiz&step=2&eid='.$_GET[eid].'&n='.$_GET[n].'&t='.$_GET[t]);

                                } else {
                                        $q = mysqli_query($con, "UPDATE examvb_history SET status='finished' WHERE exami_unique_code='$_SESSION[exami_unique_code]' AND eid='$_GET[eid]' ") or die('Error197');
                                        $q = mysqli_query($con, "SELECT * FROM examvb_history WHERE eid='$_GET[eid]' AND exami_unique_code='$_SESSION[exami_unique_code]'") or die('Error156');
                                        while ($row = mysqli_fetch_array($q)) {
                                            $s = $row['score'];
                                            $scorestatus = $row['score_updated'];
                                        }
                                         if($scorestatus=="false"){
                                            $q = mysqli_query($con, "UPDATE examvb_history SET score_updated='true' WHERE exami_unique_code='$_SESSION[exami_unique_code]' AND eid='$_GET[eid]' ") or die('Error197');
                                            $q = mysqli_query($con, "SELECT * FROM examvb_rank WHERE exami_unique_code='$username'") or die('Error161');
                                            $rowcount = mysqli_num_rows($q);
                                            if ($rowcount == 0) {
                                                $q2 = mysqli_query($con, "INSERT INTO `examvb_rank`(`exami_unique_code`, `score`, `time`) VALUES ('$username','$s',NOW())") or die('Error165');
                                            } else {
                                                while ($row = mysqli_fetch_array($q)) {
                                                    $sun = $row['score'];
                                                }

                                                $sun = $s + $sun;
                                                $q = mysqli_query($con, "UPDATE `examvb_rank` SET `score`=$sun ,time=NOW() WHERE exami_unique_code= '$username'") or die('Error174');
                                            }
                                        }
                                    header('location:account.php?q=result&eid='.$_GET['eid']);
                                }

                            } else {
                                $time = time();
                                $fgf = "INSERT INTO `examvb_history`(`exami_unique_code`, `eid`, `score`, `level`, `correct`, `wrong`, `date`, `timestamp`, `status`, `score_updated`) VALUES ('$username','$_GET[eid]' ,'0','0','0','0',NOW(),'$time','ongoing','false')";
                                $q = mysqli_query($con,$fgf) or die('Error137');
                                $_SESSION['6e447159425d2d'] = "6e447159425d2d";
                                //header('location:account.php?q=quiz&step=2&eid='.$_GET['eid'].'&n='.$_GET['n'].'&t='.$_GET['t']);
                            }
                        }


                        if (@$_GET['q'] == 'quiz' && @$_GET['step'] == 2 && isset($_SESSION['6e447159425d2d']) && $_SESSION['6e447159425d2d'] == "6e447159425d2d") {
                            $q = mysqli_query($con, "SELECT * FROM examvb_history WHERE exami_unique_code='$username' AND eid='$_GET[eid]' ") or die('Error197');

                            if (mysqli_num_rows($q) > 0) {
                                $q = mysqli_query($con, "SELECT * FROM examvb_history WHERE exami_unique_code='$_SESSION[exami_unique_code]' AND eid='$_GET[eid]' ") or die('Error197');
                                while ($row = mysqli_fetch_array($q)) {
                                    $time   = $row['timestamp'];
                                    $status = $row['status'];
                                }
                                $q = mysqli_query($con, "SELECT * FROM examvb_quiz WHERE eid='$_GET[eid]' ") or die('Error197');
                                while ($row = mysqli_fetch_array($q)) {
                                    $ttime   = $row['time'];
                                    $qstatus = $row['status'];
                                }
                                $remaining = (($ttime * 60) - ((time() - $time)));
                                if ($status == "ongoing" && $remaining > 0 && $qstatus == "enabled") {
                                    $q = mysqli_query($con, "SELECT * FROM examvb_history WHERE exami_unique_code='$_SESSION[exami_unique_code]' AND eid='$_GET[eid]' ") or die('Error197');
                                    while ($row = mysqli_fetch_array($q)) {
                                        $time = $row['timestamp'];
                                    }
                                    $q = mysqli_query($con, "SELECT * FROM examvb_quiz WHERE eid='$_GET[eid]' ") or die('Error197');
                                    while ($row = mysqli_fetch_array($q)) {
                                        $ttime = $row['time'];
                                    }
                                    $remaining = (($ttime * 60) - ((time() - $time)));
                                    echo '<script>
                                            var seconds = ' . $remaining . ' ;
                                            function end(){
                                              data = prompt("Are you sure to end this Examination? Remember, once finished, you wont be able to continue anymore and final results will be displayed. If you want to continue then enter \\"yes\\" in the textbox below and press enter");
                                              if(data=="yes"){
                                                window.location ="account.php?q=quiz&step=2&eid=' . $_GET['eid'] . '&n=' . $_GET['n'] . '&t=' . @$_GET['total'] . '&endquiz=end";
                                              }
                                            }
                                            function enable(){
                                              document.getElementById("sbutton").removeAttribute("disabled");
                                            }
                                            function frmreset(){
                                              document.getElementById("sbutton").setAttribute("disabled","true");
                                              document.getElementById("qform").reset();
                                            }
                                                function secondPassed() {
                                                    var minutes = Math.round((seconds - 30)/60);
                                                    var remainingSeconds = seconds % 60;
                                                    if (remainingSeconds < 10) {
                                                        remainingSeconds = "0" + remainingSeconds; 
                                                    }
                                                    document.getElementById(\'countdown\').innerHTML = minutes + ":" +    remainingSeconds;
                                                    if (seconds <= 0) {
                                                        clearInterval(countdownTimer);
                                                        document.getElementById(\'countdown\').innerHTML = "Time Out...";
                                                        window.location ="account.php?q=quiz&step=2&eid=' . $_GET['eid'] . '&n=' . $_GET['n'] . '&t=' . @$_GET['total'] . '&endquiz=end";
                                                    } else {    
                                                        seconds--;
                                                    }
                                                }
                                            var countdownTimer = setInterval(\'secondPassed()\', 1000);
                                       </script>';
                                    echo '<font size="3" style="margin-left:10px;font-family:\'typo\' font-size:13px; font-weight:bold;color:darkred">Time Left : </font><span class="timer btn btn-default timerrbutton" style="margin-left:10px;"><font style="font-family:\'typo\';font-size:13px;font-weight:bold;color:darkblue" id="countdown"></font></span><span class="timer btn btn-primary timerrbutton" style="margin-left:14px" onclick="end()"><span class=" glyphicon glyphicon-off"></span>&nbsp;&nbsp;<font style="font-size:12px;font-weight:bold">Finish Exam</font></span>';
                                    $eid   = @$_GET['eid'];
                                    $sn    = @$_GET['n'];
                                    $total = @$_GET['t'];
                                    //$qid   = @$_GET['qid'];

                                    $q = mysqli_query($con, "SELECT * FROM examvb_questions WHERE eid='$eid' AND sn='$sn'");
                                        echo '<div class="panel" style="margin-right:5px;margin-left:5px;margin-top:10px;border-color: #3073ae;border-radius:0px">';

                                    while ($row = mysqli_fetch_array($q)) {
                                        $qns = stripslashes($row['qns']);
                                        //print_r($qns);
                                        $qid = $row['qid'];
                                        echo '<b><pre style="border-color:#2d6ba2;border-radius: 0px;background-color:white"><div style="font-size:16px;font-weight:bold;font-family:calibri;margin:10px">'.$sn.' : '.$qns.'</div></pre></b>';
                                    }

                                        echo '<form id="qform" action="update.php?q=quiz&step=2&eid='.$eid.'&n='.$sn.'&t='.$total.'&qid='.$qid.'" method="POST"  class="form-horizontal"><br />';
                                        $sqloption="SELECT * FROM examvb_user_answer WHERE qid='$qid' AND exami_unique_code='$_SESSION[exami_unique_code]' AND eid='$_GET[eid]'";
                                        //echo $sqloption;
                                        $q = mysqli_query($con, "SELECT * FROM examvb_user_answer WHERE qid='$qid' AND exami_unique_code='$_SESSION[exami_unique_code]' AND eid='$_GET[eid]'") or die("Error222");
                                    if (mysqli_num_rows($q) > 0) {
                                        $row = mysqli_fetch_array($q);
                                        $ans = $row['ans'];
                                        $q = mysqli_query($con, "SELECT * FROM examvb_options WHERE qid='$qid' AND optionid='$ans'") or die("Error222");
                                        $row = mysqli_fetch_array($q);
                                        $ans = $row['option'];
                                    } else {
                                        $ans = "";
                                    }
                                    if (strlen($ans) > 0) {
                                        echo "<font style=\"color:green;font-size:12px;font-weight:bold\">Selected answer: </font><font style=\"color:#565252;font-size:12px;\">" . $ans . "</font>&nbsp;&nbsp;<a href=update.php?q=quiz&step=2&eid=$eid&n=$sn&t=$total&qid=$qid&delanswer=delanswer><span class=\"glyphicon glyphicon-remove\" style=\"font-size:12px;color:darkred\"></span></a><br /><br />";
                                    }
                                        echo '<div class="funkyradio">';
                                    $q = mysqli_query($con, "SELECT * FROM `examvb_options` WHERE `qid`='$qid' ");
                                    while($row = mysqli_fetch_array($q)){
                                        $option = stripslashes($row['option']);
                                        $optionid = $row['optionid'];
                                        echo '<div class="funkyradio-success"><input type="radio" id="'.$optionid.'" name="ans" value="'.$optionid.'" onclick="enable()"><label for="'.$optionid.'" style="width:50%"><div style="color:black;font-size:12px;word-wrap:break-word">&nbsp;&nbsp;'.$option.'</div></label></div>';
                                    }
                                    echo '</div>';
                                    if($_GET['t'] > $_GET['n'] && $_GET['n'] != 1){
                                        echo '<br /><a href="account.php?q=quiz&step=2&eid=' . $eid . '&n=' . ($sn - 1) . '&t=' . $total . '" class="btn btn-primary" style="height:30px"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"  style="font-size:12px"></span></a>&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-default" disabled="true" id="sbutton" style="border-radius:0px;border-color: #3072ab;height:30px"><span class="glyphicon glyphicon-lock" style="font-size:12px" aria-hidden="true"></span><font style="border-radius:0px;font-size:12px;font-weight:bold"> Lock </font></button>&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-default" onclick="frmreset()" style="border-radius:0px;border-color: #3072ab;height:30px"></span><font style="font-size:12px;font-weight:bold">Reset</font></button>&nbsp;&nbsp;&nbsp;&nbsp;<a href="account.php?q=quiz&step=2&eid=' . $eid . '&n=' . ($sn + 1) . '&t=' . $total . '" class="btn btn-primary" style="height:30px"><span class="glyphicon glyphicon-arrow-right" aria-hidden="true"  style="font-size:12px"></span></a></form><br><br>';
                                    }else if ($_GET['t'] == $_GET['n']){
                                        echo '<br /><a href="account.php?q=quiz&step=2&eid=' . $eid . '&n=' . ($sn - 1) . '&t=' . $total . '" class="btn btn-primary" style="height:30px"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"  style="font-size:12px"></span></a>&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-default" disabled="true" id="sbutton" style="border-radius:0px;border-color: #3072ab;height:30px"><span class="glyphicon glyphicon-lock" style="font-size:12px" aria-hidden="true"></span><font style="border-radius:0px;font-size:12px;font-weight:bold"> Lock </font></button>&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-default" onclick="frmreset()" style="border-radius:0px;border-color: #3072ab;height:30px"></span><font style="font-size:12px;font-weight:bold">Reset</font></button>&nbsp;&nbsp;&nbsp;&nbsp;</form><br><br>';
                                    }else if($_GET['t'] > $_GET['n'] && $_GET['n'] == 1){
                                        echo '<br />&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-default" disabled="true" id="sbutton" style="height:30px"><span class="glyphicon glyphicon-lock" style="font-size:12px" aria-hidden="true"></span><font style="font-size:12px;font-weight:bold"> Lock<font></button>&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-default" onclick="frmreset()" style="border-radius:0px;border-color: #3072ab;height:30px"></span><font style="border-radius:0px;font-size:12px;font-weight:bold">Reset</font></button>&nbsp;&nbsp;&nbsp;&nbsp;<a href="account.php?q=quiz&step=2&eid=' . $eid . '&n=' . ($sn + 1) . '&t=' . $total . '" class="btn btn-primary" style="border-radius:0px;border-color: #3072ab;height:30px"><span class="glyphicon glyphicon-arrow-right" aria-hidden="true"  style="font-size:12px">Next</span></a></form><br><br>';
                                    }else{
                                    }
                                        echo '</div>';
                                        echo '<div class="panel ex2" style="text-align:center;margin-right:5px;margin-left:5px;margin-top:10px;margin-bottom:5px;border-radius:0px;background-color: #35383f;">';
                                    $q = mysqli_query($con, "SELECT * FROM examvb_questions WHERE eid='$_GET[eid]'") or die("Error222");
                                    $i = 1;
                                    while ($row = mysqli_fetch_array($q)) {
                                        $ques[$row['qid']] = $i;
                                        $i++;
                                    }
                                    $q = mysqli_query($con, "SELECT * FROM examvb_user_answer WHERE eid='$_GET[eid]' AND exami_unique_code='$_SESSION[exami_unique_code]'") or die("Error222a");
                                    $i = 1;
                                    while ($row = mysqli_fetch_array($q)) {
                                        if (isset($ques[$row['qid']])) {
                                            $quesans[$ques[$row['qid']]] = true;
                                        }
                                    }
                                    for($i = 1; $i <= $total; $i++){
                                            echo '<a href="account.php?q=quiz&step=2&eid=' . $eid . '&n=' . $i . '&t=' . $total . '"  style="margin:5px;padding:5px;background-color:';
                                        if ($quesans[$i]) {
                                            echo "darkgreen";
                                        }else{
                                            echo "darkred";
                                        }
                                            echo ';color:white;font-size:14px;font-family:calibri;border-radius:4px">&nbsp;' . $i . '&nbsp;</a>';
                                    }
                                }else{
                                    unset($_SESSION['6e447159425d2d']);
                                    $q = mysqli_query($con, "UPDATE examvb_history SET status='finished' WHERE exami_unique_code='$_SESSION[exami_unique_code]' AND eid='$_GET[eid]' ") or die('Error197');
                                    $q = mysqli_query($con, "SELECT * FROM examvb_history WHERE eid='$_GET[eid]' AND exami_unique_code='$_SESSION[exami_unique_code]'") or die('Error156');
                                        while ($row = mysqli_fetch_array($q)) {
                                            $s = $row['score'];
                                            $scorestatus = $row['score_updated'];
                                        }
                                         if($scorestatus=="false"){
                                            $q = mysqli_query($con, "UPDATE examvb_history SET score_updated='true' WHERE exami_unique_code='$_SESSION[exami_unique_code]' AND eid='$_GET[eid]' ") or die('Error197');
                                            $q = mysqli_query($con, "SELECT * FROM examvb_rank WHERE exami_unique_code='$username'") or die('Error161');
                                            $rowcount = mysqli_num_rows($q);
                                            if($rowcount == 0){
                                                $q2 = mysqli_query($con, "INSERT INTO `examvb_rank`(`exami_unique_code`, `score`, `time`) VALUES ('$username','$s',NOW())") or die('Error165');
                                            }else{
                                                while ($row = mysqli_fetch_array($q)) {
                                                    $sun = $row['score'];
                                                }
                                                $sun = $s + $sun;
                                                $q = mysqli_query($con, "UPDATE `examvb_rank` SET `score`=$sun ,time=NOW() WHERE exami_unique_code= '$username'") or die('Error174');
                                            }
                                        }
                                    header('location:account.php?q=result&eid=' . $_GET['eid']);
                                }
                            }else{
                                unset($_SESSION['6e447159425d2d']);
                                $q = mysqli_query($con, "UPDATE examvb_history SET status='finished' WHERE exami_unique_code='$_SESSION[exami_unique_code]' AND eid='$_GET[eid]' ") or die('Error197');
                                $q = mysqli_query($con, "SELECT * FROM examvb_history WHERE eid='$_GET[eid]' AND exami_unique_code='$_SESSION[exami_unique_code]'") or die('Error156');
                                    while ($row = mysqli_fetch_array($q)) {
                                        $s = $row['score'];
                                        $scorestatus = $row['score_updated'];
                                    }
                                    if($scorestatus=="false"){
                                        $q = mysqli_query($con, "UPDATE examvb_history SET score_updated='true' WHERE username='$_SESSION[exami_unique_code]' AND eid='$_GET[eid]' ") or die('Error197');
                                        $q = mysqli_query($con, "SELECT * FROM examvb_rank WHERE exami_unique_code='$username'") or die('Error161');
                                        $rowcount = mysqli_num_rows($q);
                                        if ($rowcount == 0) {
                                            $q2 = mysqli_query($con, "INSERT INTO `examvb_rank`(`exami_unique_code`, `score`, `time`) VALUES ('$username','$s',NOW())") or die('Error165');
                                        } else {
                                            while ($row = mysqli_fetch_array($q)) {
                                                $sun = $row['score'];
                                            }
                                            $sun = $s + $sun;
                                            $q = mysqli_query($con, "UPDATE `examvb_rank` SET `score`=$sun ,time=NOW() WHERE exami_unique_code= '$username'") or die('Error174');
                                        }
                                    }
                                header('location:account.php?q=result&eid=' . $_GET['eid']);
                            }
                        }
                        if (@$_GET['q'] == 'result' && @$_GET['eid']){
                            $eid = @$_GET['eid'];
                            $q = mysqli_query($con, "SELECT * FROM `examvb_quiz` WHERE `eid`='$eid' ") or die('Error157');
                            while ($row = mysqli_fetch_array($q)) {
                                $total = $row['total'];
                            }
                            $q = mysqli_query($con, "SELECT * FROM `examvb_history` WHERE `eid`='$eid' AND `exami_unique_code`='$username' ") or die('Error157');

                            while ($row = mysqli_fetch_array($q)) {
                                $s = $row['score'];
                                $w = $row['wrong'];
                                $r = $row['correct'];
                                $status = $row['status'];
                            }
                            if ($status == "finished"){
                                /*
                                echo '<div class="panel">
                                <center><h1 class="title" style="color:#660033;font-size: 20px;">Result</h1><center><br /><table class="table table-striped title1" style="font-size:20px;font-weight:1000;">';
                                echo '<tr style="color:darkblue;font-size: 14px;"><td style="vertical-align:middle;">Total Questions</td><td style="vertical-align:middle">'.$total.'</td></tr>
                                <tr style="color:darkgreen;font-size: 14px;"><td style="vertical-align:middle">Correct Answer&nbsp;<span class="glyphicon glyphicon-ok-arrow" aria-hidden="true"></span></td><td style="vertical-align:middle">' . $r . '</td></tr> 
                                <tr style="color:red;font-size: 14px;"><td style="vertical-align:middle">Wrong Answer&nbsp;<span class="glyphicon glyphicon-remove-arrow" aria-hidden="true"></span></td><td style="vertical-align:middle">' . $w . '</td></tr>
                                <tr style="color:orange;font-size: 14px;"><td style="vertical-align:middle">Unattempted&nbsp;<span class="glyphicon glyphicon-ban-arrow" aria-hidden="true"></span></td><td style="vertical-align:middle">' . ($total - $r - $w) . '</td></tr>
                                <tr style="color:darkblue;font-size: 14px;"><td style="vertical-align:middle">Score&nbsp;<span class="glyphicon glyphicon-star" aria-hidden="true"></span></td><td style="vertical-align:middle">' . $s . '</td></tr>';
                                $q = mysqli_query($con, "SELECT * FROM examvb_rank WHERE  exami_unique_code='$username' ") or die('Error157');
                                while ($row = mysqli_fetch_array($q)) {
                                    $s = $row['score'];
                                    echo '<tr style="color:#990000;font-size: 14px;"><td style="vertical-align:middle">Overall Score&nbsp;<span class="glyphicon glyphicon-stats" aria-hidden="true"></span></td><td style="vertical-align:middle">' . $s . '</td></tr>';
                                }*/
                                
                                    echo '<tr></tr></table></div><div class="panel ex2"><br /><h3 align="center" style="font-family:calibri">:: Examination Analysis ::</h3><br /><ol class="ex2" style="font-size:16px;font-weight:bold;font-family:calibri;margin-top:20px">';
                                $q = mysqli_query($con, "SELECT * FROM examvb_questions WHERE eid='$_GET[eid]'") or die('Error197');
                                while ($row = mysqli_fetch_array($q)) {
                                    
                                    $question = $row['qns'];
                                    $qid      = $row['qid'];
                                    $q2 = mysqli_query($con, "SELECT * FROM examvb_user_answer WHERE eid='$_GET[eid]' AND qid='$qid' AND exami_unique_code='$_SESSION[exami_unique_code]'") or die('Error197');
                                    if(mysqli_num_rows($q2) > 0){
                                        $row1         = mysqli_fetch_array($q2);
                                        $ansid        = $row1['ans'];
                                        $correctansid = $row1['correctans'];
                                        $q3 = mysqli_query($con, "SELECT * FROM examvb_options WHERE optionid='$ansid'") or die('Error197');
                                        $q4 = mysqli_query($con, "SELECT * FROM examvb_options WHERE optionid='$correctansid'") or die('Error197');
                                        $row2       = mysqli_fetch_array($q3);
                                        $row3       = mysqli_fetch_array($q4);
                                        $ans        = $row2['option'];
                                        $correctans = $row3['option'];
                                    }else{
                                        $q3 = mysqli_query($con, "SELECT * FROM examvb_answer WHERE qid='$qid'") or die('Error197');
                                        $row1         = mysqli_fetch_array($q3);
                                        $correctansid = $row1['ansid'];
                                        $q4 = mysqli_query($con, "SELECT * FROM examvb_options WHERE optionid='$correctansid'") or die('Error197');
                                        $row2       = mysqli_fetch_array($q4);
                                        $correctans = $row2['option'];
                                        $ans        = "Unanswered";
                                    }
                                    if ($correctans == $ans && $ans != "Unanswered") {
                                        echo '<li><div style="font-size:16px;font-weight:bold;font-family:calibri;margin-top:20px;background-color:lightgreen;padding:10px;word-wrap:break-word;border:2px solid darkgreen;border-radius:0px;">' . $question . ' <span class="glyphicon glyphicon-ok" style="color:darkgreen"></span></div><br />';
                                        echo '<font style="font-size:14px;color:darkgreen"><b>Your Answer: </b></font><font style="font-size:14px;">' . $ans . '</font><br />';
                                        echo '<font style="font-size:14px;color:darkgreen"><b>Correct Answer: </b></font><font style="font-size:14px;">' . $correctans . '</font><br />';
                                    }
                                    else if ($ans == "Unanswered") {
                                        echo '<li><div style="font-size:16px;font-weight:bold;font-family:calibri;margin-top:20px;background-color:#f7f576;padding:10px;word-wrap:break-word;border:2px solid #b75a0e;border-radius:0px;">' . $question . ' </div><br />';
                                        echo '<font style="font-size:14px;color:darkgreen"><b>Correct Answer: </b></font><font style="font-size:14px;">' . $correctans . '</font><br />';
                                    }
                                    else {
                                        echo '<li><div style="font-size:16px;font-weight:bold;font-family:calibri;margin-top:20px;background-color:#f99595;padding:10px;word-wrap:break-word;border:2px solid darkred;border-radius:0px;">' . $question . ' <span class="glyphicon glyphicon-remove" style="color:red"></span></div><br />';
                                        echo '<font style="font-size:14px;color:darkgreen"><b>Your Answer: </b></font><font style="font-size:14px;">' . $ans . '</font><br />';
                                        echo '<font style="font-size:14px;color:red"><b>Correct Answer: </b></font><font style="font-size:14px;">' . $correctans . '</font><br />';

                                    }
                                        echo "<br /></li>";
                                }
                                        echo '</ol>';
                                        echo "</div>";
                            } else {
                                die("Thats a 404 Error bro. You are trying to access a wrong page");
                            }
                        }
                        if (@$_GET['q'] == 2){
                            $q = mysqli_query($con, "SELECT * FROM `examvb_history` WHERE `exami_unique_code`='$username' AND `status`='finished' ORDER BY `date` DESC ") or die('Error197');
                                echo '<div class="panel title ex2">
                                <table class="table table-striped title1" >
                                <tr><td style="vertical-align:middle"><b>S.N.</b></td><td style="vertical-align:middle"><b>Semester</b></td><td style="vertical-align:middle"><b>Total Questions</b></td><td style="vertical-align:middle"><b>Right</b></td><td style="vertical-align:middle"><b>Wrong<b></td><td style="vertical-align:middle"><b>Unattempted<b></td><td style="vertical-align:middle"><b>Action<b></td></tr>';
                            $c = 0;
                            while ($row = mysqli_fetch_array($q)) {
                                $eid = $row['eid'];
                                $s   = $row['score'];
                                $w   = $row['wrong'];
                                $r   = $row['correct'];
                                $vbc = "SELECT * FROM `examvb_quiz` WHERE `eid`='$eid'";
                                $q23 = mysqli_query($con,$vbc) or die('Error208');
                                while ($row = mysqli_fetch_array($q23)) {
                                    $title = $row['title'];
                                    $semsterq = $row['semsterq'];
                                    $total = $row['total'];
                                }
                                $c++;
                                echo '<tr><td style="vertical-align:middle"><b>'.$c.'</b></td><td style="vertical-align:middle"><b>'.$semsterq.'</b></td><td style="vertical-align:middle"><b>'.$total.'</b></td><td style="vertical-align:middle"><b>'.$r.'</b></td><td style="vertical-align:middle"><b>'.$w.'</b></td><td style="vertical-align:middle"><b>'.($total - $r - $w).'</b></td><td style="vertical-align:middle"><b><a href="account.php?q=result&eid='.$eid.'" class="btn ViewwResult" style="margin:0px;background:darkred;color:white">&nbsp;<span class="title1"><b>View Result</b></td></tr>';
                            }
                                echo '</table></div>';
                        }

                        if (@$_GET['q'] == 3) {
                            if(isset($_GET['show'])){
                                $show = $_GET['show'];
                                $showfrom = (($show-1)*10) + 1;
                                $showtill = $showfrom + 9;
                            }else{
                                $show = 1;
                                $showfrom = 1;
                                $showtill = 10;
                            }
                            $asdfn = "SELECT * FROM `examvb_rank` WHERE `exami_unique_code`='$username'";
                            $q = mysqli_query($con, $asdfn);
                                echo '<div class="panel title ex2">
                                <table class="table table-striped title1" >
                                <tr><td style="vertical-align:middle"><b>S.No.</b></td><td style="vertical-align:middle"><b>Name</b></td><td style="vertical-align:middle"><b>Course</b></td><td style="vertical-align:middle"><b>Semester</b></td><td style="vertical-align:middle"><b>Enrolment</b></td><td style="vertical-align:middle"><b>Exam Unique Code</b></td></tr>';
                            $c = $showfrom-1;
                            $total = mysqli_num_rows($q);
                            if($total >= $showfrom){
                                //$fhfghf = "SELECT * FROM `examvb_rank` ORDER BY `score` DESC, `time` ASC LIMIT ".($showfrom-1).",10";

                                $fhfghf = "SELECT * FROM `examvb_rank` WHERE `exami_unique_code`='$username' ORDER BY `score` DESC, `time` ASC LIMIT ".($showfrom-1).",10";
                                $q = mysqli_query($con, $fhfghf);
                                while($row = mysqli_fetch_array($q)){
                                    $e = $row['exami_unique_code'];
                                    $s = $row['score'];
                                    //$q12 = mysqli_query($con, "SELECT * FROM `admit_card` WHERE `exami_unique_code`='$e'");

                                    $cvvbpp = "SELECT * FROM `admit_card` WHERE `exami_unique_code`='$e'";
                                    $q12 = mysqli_query($con, $cvvbpp);
                                    while($row = mysqli_fetch_array($q12)){
                                        $name = $row['sname'];
                                        $course = $row['course'];
                                        $enrolment = $row['enrolment'];
                                        $semeste = $row['semester'];
                                        $unique_code = $row['exami_unique_code'];
                                        echo '<tr><td style="color:#99cc32"><b>'.$c.'</b></td><td style="vertical-align:middle"><b>'.$name.'</b></td><td style="vertical-align:middle"><b>'.$course.'</b></td><td style="vertical-align:middle"><b>'.$semeste.'</b></td><td style="vertical-align:middle"><b>'.$enrolment.'</b></td><td style="vertical-align:middle"><b>'.$unique_code.'</b></td><td style="vertical-align:middle">';
                                    }
                                    $c++;
                                    //echo '<tr><td style="color:#99cc32"><b>' . $c . '</b></td><td style="vertical-align:middle">' . $name . '</td><td style="vertical-align:middle">' . $course . '</td><td style="vertical-align:middle">' . $enrolment . '</td><td style="vertical-align:middle">' . $s . '</td><td style="vertical-align:middle">';
                                }
                            }else{
                            }
                                echo '</table></div>';
                                echo '<div class="panel title"><table class="table table-striped title1" ><tr>';
                            $total = round($total/10) + 1;
                            if(isset($_GET['show'])){
                                $show = $_GET['show'];
                            }else{
                                $show = 1;
                            }
                            if($show == 1 && $total==1){
                            }else if($show == 1 && $total!=1){
                                $i = 1;
                                while($i<=$total){
                                    echo '<td style="vertical-align:middle;text-align:center"><a style="font-size:14px;font-family:typo;font-weight:bold" href="account.php?q=3&show='.$i.'">&nbsp;'.$i.'&nbsp;</a></td>';
                                    $i++;
                                }
                                    echo '<td style="vertical-align:middle;text-align:center"><a style="font-size:14px;font-family:typo;font-weight:bold" href="account.php?q=3&show='.($show+1).'">&nbsp;>>&nbsp;</a></td>';
                            }else if($show != 1 && $show==$total){
                                    echo '<td style="vertical-align:middle;text-align:center"><a style="font-size:14px;font-family:typo;font-weight:bold" href="account.php?q=3&show='.($show-1).'">&nbsp;<<&nbsp;</a></td>';
                                $i = 1;
                                while($i<=$total){
                                    echo '<td style="vertical-align:middle;text-align:center"><a style="font-size:14px;font-family:typo;font-weight:bold" href="account.php?q=3&show='.$i.'">&nbsp;'.$i.'&nbsp;</a></td>';
                                    $i++;
                                }
                            }else{
                                    echo '<td style="vertical-align:middle;text-align:center"><a style="font-size:14px;font-family:typo;font-weight:bold" href="account.php?q=3&show='.($show-1).'">&nbsp;<<&nbsp;</a></td>';
                                $i = 1;
                                while($i<=$total){
                                    echo '<td style="vertical-align:middle;text-align:center"><a style="font-size:14px;font-family:typo;font-weight:bold" href="account.php?q=3&show='.$i.'">&nbsp;'.$i.'&nbsp;</a></td>';
                                    $i++;
                                }
                                    echo '<td style="vertical-align:middle;text-align:center"><a style="font-size:14px;font-family:typo;font-weight:bold" href="account.php?q=3&show='.($show+1).'">&nbsp;>>&nbsp;</a></td>';
                            }
                                    echo '</tr></table></div>';
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="sol-sm-2 col-md-2 col-xs-12 box DevelopedBy"></div>
                <div class="col-sm-6 col-md-6 col-xs-12 box DevelopedBy">
                    <span href="#" data-target="#login" style="color:lightyellow;font-size:13px;">Developed by : Imperial Institute of Management Science & Research<br><br></span>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
