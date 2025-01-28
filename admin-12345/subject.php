<?php 
error_reporting(0);
include('checklogin.php');
include("dbconnection.php");
$data = $_POST['data'];
$querydat = mysqli_query($con,"SELECT * FROM `course` WHERE `course`='$data'");
$array = array();
?>
<option value="" disable>Select Subject</option>
<?php while($row = mysqli_fetch_array($querydat)){ 
  if(!in_array($row['subject1'], $array)){
      $array[] = $row["subject1"];
      $array[] = $row["subject2"];
      $array[] = $row["subject3"];
      $array[] = $row["subject4"];
      $array[] = $row["subject5"];
      $array[] = $row["subject6"];
      $array[] = $row["subject7"];
  }
}
?>
<?php foreach($array as $adataa){ 
    if(!empty($adataa)){
?>
 <option value="<?php echo $adataa;  ?>"><?php echo $adataa;  ?></option>
<?php 
}
}
?>
<!---------<option value="other">Other</option>--------------->