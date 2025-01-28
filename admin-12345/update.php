<?php

include('checklogin.php');
include("dbconnection.php");
//$username = $_SESSION['exami_unique_code'];
if (isset($_SESSION['key'])) {
    if (@$_GET['fdid'] && $_SESSION['key'] == '54585c506829293a2d4c3b68543b316e2e7a2d277858545a36362e5f39') {
        $id = @$_GET['fdid'];
        $result = mysqli_query($con, "DELETE FROM `feedback` WHERE id='$id' ") or die('Error');
        header("location:dash.php?q=3");
    }
}
if (isset($_SESSION['key'])) {
    if (@$_GET['deidquiz'] && $_SESSION['key'] == '54585c506829293a2d4c3b68543b316e2e7a2d277858545a36362e5f39') {
        $eid = @$_GET['deidquiz'];
        $r1 = mysqli_query($con, "UPDATE `examvb_quiz` SET status='disabled' WHERE eid='$eid' ") or die('Error');
        $q = mysqli_query($con, "SELECT * FROM `examvb_history` WHERE eid='$eid' AND status='ongoing' AND score_updated='false'");
        while($row = mysqli_fetch_array($q)){
            $user = $row['username'];
            $s = $row['score'];
            $r1 = mysqli_query($con, "UPDATE `examvb_history` SET status='finished',score_updated='true' WHERE eid='$eid' AND exami_unique_code='$user' ") or die('Error');
            $q1 = mysqli_query($con, "SELECT * FROM `examvb_rank` WHERE exami_unique_code='$user'") or die('Error161');
            $rowcount = mysqli_num_rows($q1);
            if ($rowcount == 0) {
                $q2 = mysqli_query($con, "INSERT INTO `examvb_rank` VALUES(NULL,'$user','$s',NOW())") or die('Error165');
            } else {
                while ($row = mysqli_fetch_array($q1)) {
                    $sun = $row['score'];
                }
                        
                $sun = $s + $sun;
                $q3 = mysqli_query($con, "UPDATE `examvb_rank` SET `score`=$sun ,time=NOW() WHERE exami_unique_code= '$username'") or die('Error174');
            }
        }
        header("location:dash.php?q=0");
    }
}
if (isset($_SESSION['key'])) {
    if (@$_GET['eeidquiz'] && $_SESSION['key'] == '54585c506829293a2d4c3b68543b316e2e7a2d277858545a36362e5f39') {
        $eid = @$_GET['eeidquiz'];
        $r1 = mysqli_query($con, "UPDATE examvb_quiz SET status='enabled' WHERE eid='$eid' ") or die('Error');
        header("location:dash.php?q=0");
    }
}
if (isset($_SESSION['key'])) {
    if (@$_GET['dusername'] && $_SESSION['key'] == '54585c506829293a2d4c3b68543b316e2e7a2d277858545a36362e5f39') {
        $dusername = @$_GET['dusername'];
        $r1 = mysqli_query($con, "DELETE FROM examvb_rank WHERE exami_unique_code='$dusername' ") or die('Error');
        $r2 = mysqli_query($con, "DELETE FROM examvb_history WHERE exami_unique_code='$dusername' ") or die('Error');
        $result = mysqli_query($con, "DELETE FROM examvb_user WHERE exami_unique_code='$dusername' ") or die('Error');
        header("location:dash.php?q=1");
    }
}
if (isset($_SESSION['key'])) {
    if (@$_GET['q'] == 'rmquiz' && $_SESSION['key'] == '54585c506829293a2d4c3b68543b316e2e7a2d277858545a36362e5f39') {
        $eid = @$_GET['eid'];
        $result = mysqli_query($con, "SELECT * FROM `examvb_questions` WHERE eid='$eid' ") or die('Error');
        while ($row = mysqli_fetch_array($result)) {
            $qid = $row['qid'];
            $r1 = mysqli_query($con, "DELETE FROM `examvb_options` WHERE qid='$qid'") or die('Error');
            $r2 = mysqli_query($con, "DELETE FROM `examvb_answer` WHERE qid='$qid' ") or die('Error');
        }
        
        $r3 = mysqli_query($con, "DELETE FROM examvb_questions WHERE eid='$eid' ") or die('Error');
        $r4 = mysqli_query($con, "DELETE FROM examvb_quiz WHERE eid='$eid' ") or die('Error');
        $r4 = mysqli_query($con, "DELETE FROM examvb_history WHERE eid='$eid' ") or die('Error');
        header("location:dash.php?q=5");
    }
}


if (isset($_SESSION['key'])) {
    if (@$_GET['q'] == 'addquiz' && $_SESSION['key'] == '54585c506829293a2d4c3b68543b316e2e7a2d277858545a36362e5f39') {
        $name = $_POST['name'];
        $name = ucwords(strtolower($name));
        $total = $_POST['total'];
        $correct = $_POST['right'];
        $wrong = $_POST['wrong'];
        $time = $_POST['time'];
        $semsterq = $_POST['semsterq'];
        $courseq = $_POST['courseq'];
        $status = "disabled";
        $id = uniqid();
        $cvbv = "INSERT INTO `examvb_quiz`(`eid`, `title`, `correct`, `wrong`, `total`, `time`, `semsterq`, `courseq`, `date`, `status`) VALUES ('$id','$name','$correct','$wrong','$total','$time','$semsterq','$courseq','NOW()','$status')";
        //echo $cvbv; exit;
        $q3 = mysqli_query($con,$cvbv);
        header("location:dash.php?q=4&step=2&eid=$id&n=$total");
    }
}
if (isset($_SESSION['key'])) {
    if (@$_GET['q'] == 'addqns' && $_SESSION['key'] == '54585c506829293a2d4c3b68543b316e2e7a2d277858545a36362e5f39') {
        $n   = @$_GET['n'];
        $eid = @$_GET['eid'];
        $ch  = @$_GET['ch'];
        for ($i = 1; $i <= $n; $i++) {
            $qid  = uniqid();
            $qns  = addslashes($_POST['qns' . $i]);
            $q3   = mysqli_query($con, "INSERT INTO `examvb_questions`(`eid`, `qid`, `qns`, `choice`, `sn`) VALUES ('$eid','$qid','$qns','$ch','$i')") or die();
            $oaid = uniqid();
            $obid = uniqid();
            $ocid = uniqid();
            $odid = uniqid();
            $a    = addslashes($_POST[$i . '1']);
            $b    = addslashes($_POST[$i . '2']);
            $c    = addslashes($_POST[$i . '3']);
            $d    = addslashes($_POST[$i . '4']);
            $qa = mysqli_query($con, "INSERT INTO `examvb_options`(`qid`, `option`, `optionid`) VALUES ('$qid','$a','$oaid')") or die('Error61');
            $qb = mysqli_query($con, "INSERT INTO `examvb_options`(`qid`, `option`, `optionid`) VALUES ('$qid','$b','$obid')") or die('Error62');
            $qb = mysqli_query($con, "INSERT INTO `examvb_options`(`qid`, `option`, `optionid`) VALUES ('$qid','$c','$ocid')") or die('Error63'.mysqli_error($con));
            $qd = mysqli_query($con, "INSERT INTO `examvb_options`(`qid`, `option`, `optionid`) VALUES ('$qid','$d','$odid')") or die('Error64');
            $e = $_POST['ans' . $i];
            switch ($e) {
                case 'a':
                    $ansid = $oaid;
                    break;
                
                case 'b':
                    $ansid = $obid;
                    break;
                
                case 'c':
                    $ansid = $ocid;
                    break;
                
                case 'd':
                    $ansid = $odid;
                    break;
                
                default:
                    $ansid = $oaid;
            }
            
            $qans = mysqli_query($con, "INSERT INTO `examvb_answer`(`qid`, `ansid`) VALUES ('$qid','$ansid')");
        }
        
        header("location:dash.php?q=0");
    }
}
if (@$_GET['q'] == 'quiz' && @$_GET['step'] == 2 && isset($_SESSION['6e447159425d2d']) && $_SESSION['6e447159425d2d'] == "6e447159425d2d" && isset($_POST['ans']) && (!isset($_GET['delanswer']))) {
    $eid   = @$_GET['eid'];
    $sn    = @$_GET['n'];
    $total = @$_GET['t'];
    $ans   = $_POST['ans'];
    $qid   = @$_GET['qid'];
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
            $q = mysqli_query($con, "SELECT * FROM examvb_user_answer WHERE eid='$_GET[eid]' AND exami_unique_code='$_SESSION[exami_unique_code]' AND qid='$qid' ") or die('Error115');
            while ($row = mysqli_fetch_array($q)) {
                $prevans = $row['ans'];
            }
            $q = mysqli_query($con, "SELECT * FROM examvb_answer WHERE qid='$qid' ");
            while ($row = mysqli_fetch_array($q)) {
                $ansid = $row['ansid'];
            }
            $q = mysqli_query($con, "SELECT * FROM examvb_user_answer WHERE exami_unique_code='$_SESSION[exami_unique_code]' AND eid='$_GET[eid]' AND qid='$qid' ") or die('Error1977');
            if (mysqli_num_rows($q) != 0) {
                $q = mysqli_query($con, "UPDATE examvb_user_answer SET ans='$ans' WHERE exami_unique_code='$_SESSION[exami_unique_code]' AND eid='$_GET[eid]' AND qid='$qid' ") or die('Error197');
            } else {
                $q = mysqli_query($con, "INSERT INTO `examvb_user_answer`(`qid`, `ans`, `correctans`, `eid`, `exami_unique_code`) VALUES ('$qid','$ans','$ansid','$_GET[eid]','$_SESSION[exami_unique_code]')");
            }
            
            $q = mysqli_query($con, "SELECT * FROM examvb_options WHERE qid='$qid' AND optionid='$ans'");
            while ($row = mysqli_fetch_array($q)) {
                $option = $row['option'];
            }
            
            
            if ($ans == $ansid) {
                $q = mysqli_query($con, "SELECT * FROM examvb_quiz WHERE eid='$eid' ");
                while ($row = mysqli_fetch_array($q)) {
                    $correct = $row['correct'];
                    $wrong   = $row['wrong'];
                }
                
                $q = mysqli_query($con, "SELECT * FROM examvb_history WHERE eid='$eid' AND exami_unique_code='$username' ") or die('Error115');
                while ($row = mysqli_fetch_array($q)) {
                    $s = $row['score'];
                    $r = $row['correct'];
                    $w = $row['wrong'];
                }
                
                if (isset($prevans) && $prevans == $ansid) {
                } else if (isset($prevans) && $prevans != $ansid) {
                    $r++;
                    $w--;
                    $s = $s + $correct + $wrong;
                    $q = mysqli_query($con, "UPDATE `examvb_history` SET `score`=$s,`level`='$sn',`correct`='$r',`wrong`='$w', date= NOW() WHERE exami_unique_code = '$username' AND eid = '$eid'") or die('Error13');
                } else {
                    $r++;
                    $s = $s + $correct;
                    $q = mysqli_query($con, "UPDATE `examvb_history` SET `score`=$s,`level`='$sn',`correct`='$r', date= NOW()  WHERE  exami_unique_code = '$username' AND eid = '$eid'") or die('Error14');
                }
            } else {
                $q = mysqli_query($con, "SELECT * FROM examvb_quiz WHERE eid='$eid' ") or die('Error129');
                while ($row = mysqli_fetch_array($q)) {
                    $wrong   = $row['wrong'];
                    $correct = $row['correct'];
                }
                
                $q = mysqli_query($con, "SELECT * FROM examvb_history WHERE eid='$eid' AND exami_unique_code='$username' ") or die('Error139');
                while ($row = mysqli_fetch_array($q)) {
                    $s = $row['score'];
                    $w = $row['wrong'];
                    $r = $row['correct'];
                }
                if (isset($prevans) && $prevans != $ansid) {
                } else if (isset($prevans) && $prevans == $ansid) {
                    $r--;
                    $w++;
                    $s = $s - $correct - $wrong;
                    $q = mysqli_query($con, "UPDATE `examvb_history` SET `score`=$s,`level`=$sn,`wrong`=$w,`correct`=$r, date= NOW()  WHERE  exami_unique_code = '$username' AND eid = '$eid'");
                } else {
                    $w++;
                    $s = $s - $wrong;
                    $q = mysqli_query($con, "UPDATE `examvb_history` SET `score`=$s,`level`=$sn,`wrong`=$w,date= NOW()  WHERE  exami_unique_code = '$username' AND eid = '$eid'");
                }
            }
            header("location:account.php?q=quiz&step=2&eid=$eid&n=$sn&t=$total");
            
        } else {
            unset($_SESSION['6e447159425d2d']);
            $q = mysqli_query($con, "UPDATE examvb_history SET status='finished' WHERE exami_unique_code='$_SESSION[exami_unique_code]' AND eid='$_GET[eid]' ");
            $q = mysqli_query($con, "SELECT * FROM examvb_history WHERE eid='$_GET[eid]' AND exami_unique_code='$_SESSION[exami_unique_code]'");
                while ($row = mysqli_fetch_array($q)) {
                    $s = $row['score'];
                    $scorestatus = $row['score_updated'];
                }
                if($scorestatus=="false"){
                    $q = mysqli_query($con, "UPDATE `examvb_history` SET `score_updated`='true' WHERE exami_unique_code='$_SESSION[exami_unique_code]' AND eid='$_GET[eid]' ");
                    $q = mysqli_query($con, "SELECT * FROM `examvb_rank` WHERE `exami_unique_code`='$username'");
                    $rowcount = mysqli_num_rows($q);
                    //if ($rowcount == 0) {
                    if($rowcount){
                        $q2 = mysqli_query($con, "INSERT INTO `examvb_rank`(`exami_unique_code`, `score`, `time`) VALUES ('$username','$s',NOW())");
                    } else {
                        while ($row = mysqli_fetch_array($q)) {
                            $sun = $row['score'];
                        }
                        
                        $sun = $s + $sun;
                        $q = mysqli_query($con, "UPDATE `examvb_rank` SET `score`='$sun' ,time=NOW() WHERE exami_unique_code='$username'");
                    }
                }
            header('location:account.php?q=result&eid=' . $_GET[eid]);
        }
    } else {
        unset($_SESSION['6e447159425d2d']);
        $q = mysqli_query($con, "UPDATE examvb_history SET status='finished' WHERE exami_unique_code='$_SESSION[exami_unique_code]' AND eid='$_GET[eid]' ");
        $q = mysqli_query($con, "SELECT * FROM history WHERE eid='$_GET[eid]' AND exami_unique_code='$_SESSION[exami_unique_code]'");
            while ($row = mysqli_fetch_array($q)) {
                $s = $row['score'];
                $scorestatus = $row['score_updated'];
            }
            if($scorestatus=="false"){
                $q = mysqli_query($con, "UPDATE examvb_history SET score_updated='true' WHERE exami_unique_code='$_SESSION[exami_unique_code]' AND eid='$_GET[eid]' ");
                $q = mysqli_query($con, "SELECT * FROM examvb_rank WHERE exami_unique_code='$username'");
                $rowcount = mysqli_num_rows($q);
                //if ($rowcount == 0) {
                if ($rowcount) {
                    $q2 = mysqli_query($con, "INSERT INTO `examvb_rank`(`exami_unique_code`, `score`, `time`) VALUES ('$username','$s',NOW())");
                } else {
                    while ($row = mysqli_fetch_array($q)) {
                        $sun = $row['score'];
                    }

                    $sun = $s + $sun;
                    $q = mysqli_query($con, "UPDATE `examvb_rank` SET `score`='$sun' ,time=NOW() WHERE exami_unique_code= '$username'");
                }
            }
        header('location:account.php?q=result&eid=' . $_GET[eid]);
    }
}

if (@$_GET['q'] == 'quiz' && @$_GET['step'] == 2 && isset($_SESSION['6e447159425d2d']) && $_SESSION['6e447159425d2d'] == "6e447159425d2d" && (!isset($_POST['ans'])) && (isset($_GET['delanswer'])) && $_GET['delanswer'] == "delanswer") {
    $eid   = @$_GET['eid'];
    $sn    = @$_GET['n'];
    $total = @$_GET['t'];
    $qid   = @$_GET['qid'];
    $q = mysqli_query($con, "SELECT * FROM `examvb_history` WHERE `exami_unique_code`='$username' AND eid='$_GET[eid]' ");
    if (mysqli_num_rows($q) > 0) {
        $q = mysqli_query($con, "SELECT * FROM `examvb_history` WHERE `exami_unique_code`='$_SESSION[exami_unique_code]' AND eid='$_GET[eid]' ");
        while ($row = mysqli_fetch_array($q)) {
            $time   = $row['timestamp'];
            $status = $row['status'];
        }
        
        $q = mysqli_query($con, "SELECT * FROM `examvb_quiz` WHERE `eid`='$_GET[eid]' ");
        while ($row = mysqli_fetch_array($q)) {
            $ttime   = $row['time'];
            $qstatus = $row['status'];
        }
        
        $remaining = (($ttime * 60) - ((time() - $time)));
        if ($status == "ongoing" && $remaining > 0 && $qstatus == "enabled") {
            $q = mysqli_query($con, "SELECT * FROM `examvb_answer` WHERE `qid`='$qid' ");
            while ($row = mysqli_fetch_array($q)) {
                $ansid = $row['ansid'];
            }
            $q = mysqli_query($con, "SELECT * FROM `examvb_user_answer` WHERE `eid`='$_GET[eid]' AND `exami_unique_code`='$_SESSION[exami_unique_code]' AND qid='$qid'");
            $row = mysqli_fetch_array($q);
            $ans = $row['ans'];
            $q = mysqli_query($con, "DELETE FROM `examvb_user_answer` WHERE `qid`='$qid' AND `exami_unique_code`='$_SESSION[exami_unique_code]' AND eid='$_GET[eid]'");
            if ($ans == $ansid) {
                $q = mysqli_query($con, "SELECT * FROM `examvb_quiz` WHERE `eid`='$eid' ");
                while ($row = mysqli_fetch_array($q)) {
                    $wrong   = $row['wrong'];
                    $correct = $row['correct'];
                }
                
                $q = mysqli_query($con, "SELECT * FROM `examvb_history` WHERE `eid`='$eid' AND `exami_unique_code`='$username'");
                while ($row = mysqli_fetch_array($q)) {
                    $s = $row['score'];
                    $w = $row['wrong'];
                    $r = $row['correct'];
                }
                $r--;
                $s = $s - $correct;
                $q = mysqli_query($con, "UPDATE `examvb_history` SET `score`=$s,`level`=$sn,`correct`=$r, date= NOW() WHERE `exami_unique_code`= '$username' AND `eid`= '$eid'");
            } else {
                $q = mysqli_query($con, "SELECT * FROM `examvb_quiz` WHERE `eid`='$eid' ");
                while ($row = mysqli_fetch_array($q)) {
                    $wrong   = $row['wrong'];
                    $correct = $row['correct'];
                }
                
                $q = mysqli_query($con, "SELECT * FROM `examvb_history` WHERE `eid`='$eid' AND exami_unique_code='$username' ");
                while ($row = mysqli_fetch_array($q)) {
                    $s = $row['score'];
                    $w = $row['wrong'];
                    $r = $row['correct'];
                }
                $w--;
                $s = $s + $wrong;
                $q = mysqli_query($con, "UPDATE `examvb_history` SET `score`=$s,`level`=$sn,`wrong`=$w, date= NOW() WHERE exami_unique_code = '$username' AND eid = '$eid'");
            }
            header('location:account.php?q=quiz&step=2&eid=' . $_GET[eid] . '&n=' . $_GET[n] . '&t=' . $total);
            
        } else {
            unset($_SESSION['6e447159425d2d']);
            $q = mysqli_query($con, "UPDATE `examvb_history` SET `status`='finished' WHERE `exami_unique_code`='$_SESSION[exami_unique_code]' AND eid='$_GET[eid]' ") or die('Error197');
            $q = mysqli_query($con, "SELECT * FROM `examvb_history` WHERE `eid`='$_GET[eid]' AND exami_unique_code='$_SESSION[exami_unique_code]'") or die('Error156');
                while ($row = mysqli_fetch_array($q)) {
                    $s = $row['score'];
                    $scorestatus = $row['score_updated'];
                }
                if($scorestatus=="false"){
                    $q = mysqli_query($con, "UPDATE `examvb_history` SET `score_updated`='true' WHERE `exami_unique_code`='$_SESSION[exami_unique_code]' AND eid='$_GET[eid]' ") or die('Error197');
                    $q = mysqli_query($con, "SELECT * FROM `examvb_rank` WHERE `exami_unique_code`='$username'") or die('Error161');
                    $rowcount = mysqli_num_rows($q);
                    //if ($rowcount == 0) {
                    if ($rowcount) {
                        $q2 = mysqli_query($con, "INSERT INTO `examvb_rank`(`exami_unique_code`, `score`, `time`) VALUES('$username','$s',NOW())") or die('Error165');
                    } else {
                        while ($row = mysqli_fetch_array($q)) {
                            $sun = $row['score'];
                        }
                        
                        $sun = $s + $sun;
                        $q = mysqli_query($con, "UPDATE `examvb_rank` SET `score`=$sun ,time=NOW() WHERE exami_unique_code= '$username'") or die('Error174');
                    }
                }
            header('location:account.php?q=result&eid=' . $_GET[eid]);
        }
    } else {
        unset($_SESSION['6e447159425d2d']);
        $q = mysqli_query($con, "UPDATE examvb_history SET status='finished' WHERE exami_unique_code='$_SESSION[exami_unique_code]' AND eid='$_GET[eid]' ") or die('Error197');
        $q = mysqli_query($con, "SELECT * FROM examvb_history WHERE eid='$_GET[eid]' AND exami_unique_code='$_SESSION[exami_unique_code]'") or die('Error156');
            while ($row = mysqli_fetch_array($q)) {
                $s = $row['score'];
                $scorestatus = $row['score_updated'];
            }
            if($scorestatus=="false"){
                $q = mysqli_query($con, "UPDATE `examvb_history` SET `score_updated`='true' WHERE `exami_unique_code`='$_SESSION[exami_unique_code]' AND eid='$_GET[eid]' ") or die('Error197');
                $q = mysqli_query($con, "SELECT * FROM `examvb_rank` WHERE exami_unique_code='$username'") or die('Error161');
                $rowcount = mysqli_num_rows($q);
                //if ($rowcount == 0) {
                if ($rowcount) {
                    $q2 = mysqli_query($con, "INSERT INTO `examvb_rank`(`exami_unique_code`, `score`, `time`) VALUES('$username','$s',NOW())") or die('Error165');
                } else {
                    while ($row = mysqli_fetch_array($q)) {
                        $sun = $row['score'];
                    }

                    $sun = $s + $sun;
                    $q = mysqli_query($con, "UPDATE `examvb_rank` SET `score`=$sun ,time=NOW() WHERE `exami_unique_code`= '$username'") or die('Error174');
                }
            }
        header('location:account.php?q=result&eid='.$_GET[eid]);
    }
}
?>
