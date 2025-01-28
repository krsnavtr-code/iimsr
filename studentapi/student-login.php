<?php
include('dbconnection.php');
    if(isset($_POST["enrolment"]) && isset($_POST["mobile_no"])){
        $enrolment = $_POST["enrolment"];
        $mobile_no = $_POST["mobile_no"];
        $userQuery = "SELECT * FROM register_here where `enrolment` ='$enrolment' && `mobile_no` ='$mobile_no'";
        $result = mysqli_query($con,$userQuery);
        if($result->num_rows==0){
            $response["error"] = TRUE;
            $response["message"] ="user not found or Invalid login details.";
            echo json_encode($response);
            exit;
        }else{
            $user = mysqli_fetch_assoc($result);
            $response["error"] = FALSE;
            $response["message"] = "Successfully logged in.";
            $response["enrolment"] = $user;
            echo json_encode($response);
            exit;
        }
    }else {
        $response["error"] = TRUE;
        $response["message"] ="Invalid parameters";
        echo json_encode($response);
        exit;
    }
    /*$response = array();  
    if (isset($_POST['login'])){
        $enl = $_POST['enrolment'];
	    $mobile_no = $_POST['mobile_no'];
        $query =  mysqli_query($con, "SELECT * FROM register_here where `enrolment` ='$enl' and `mobile_no` ='$mobile_no'");
        print_r($query);
        $numrows = mysqli_num_rows($query);
        if ($result) {  
            $response["success_msg"] = 1;  
            $response["message"] = "Thank You successfully Insert Your Query.";  
            echo json_encode($response);  
        }else{  
            $response["success_msg "] = 0;  
            $response["message"] = "not insert because Oops! An error occurred."; 
            echo json_encode($response);  
       } 
   }  */


/*if (isset($_POST['login'])){
	$enl= $_POST['enrolment'];
	$mobile_no = $_POST['mobile_no'];
	$_SESSION['enrolment'] = $enl;
	$query = "SELECT * FROM register_here where `enrolment` ='$enl' and `mobile_no` ='$mobile_no'";
    $result  = $con->query($query);
    $row = mysqli_fetch_array($result);
    $count = mysqli_num_rows($result);	
    if($count == 1) {
         $_SESSION['login'] = $enl;
         $_SESSION['course'] = $row['course'];
        header("location: index.php");
      }else {
         $error = "Your Login Name or Password is invalid";
         echo $error;
      }
    }*/

/*if(isset($_GET['login'])){
    switch($_POST['login']){
        case 'login':
            $enrolment = $_POST['enrolment'];
            $mobile_no = $_POST['mobile_no']; 
            $query = "SELECT * FROM register_here where `enrolment` ='$enrolment' and `mobile_no` ='$mobile_no'";
            print_r($query);exit;
            $stmt  = $con->query($query);
            $stmt->bind_param($enrolment, $mobile_no);
            $stmt->execute();
            $stmt->store_result();
            if($stmt->num_rows > 0){
                $stmt->bind_result($enrolment, $mobile_no);
                $stmt->fetch();
                
                $user = array(
                    'enrolment'=>$enrolment, 
                    'mobile_no'=>$mobile_no,
                );
                $response['error'] = false; 
                $response['message'] = 'Login successfull'; 
                $response['user'] = $user; 
            }else{
                $response['error'] = false; 
                $response['message'] = 'Invalid username or password';
            }
           
        break;
    }
}*/




/*session_start();
include('dbconnection.php');
if (isset($_POST['login'])){
	
	$enl= $_POST['enrolment'];
	$mobile_no = $_POST['mobile_no'];
	$_SESSION['enrolment'] = $enl;
	$query = "SELECT * FROM register_here where `enrolment` ='$enl' and `mobile_no` ='$mobile_no'";
    $result  = $con->query($query);
    $row = mysqli_fetch_array($result);
    $count = mysqli_num_rows($result);	
    if($count == 1) {
         $_SESSION['login'] = $enl;
         $_SESSION['course'] = $row['course'];
        header("location: index.php");
      }else {
         $error = "Your Login Name or Password is invalid";
         echo $error;
      }
    }  */  
?> 