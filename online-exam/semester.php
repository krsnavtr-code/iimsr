<?php 
include("dbConnection.php");
$data = $_POST['data'];
$querydat = mysqli_query($con,"SELECT * FROM `course` WHERE `semester`='$data'");
$array = array();
?>
<option value="" disable>Select Subject</option>
<?php while($row = mysqli_fetch_array($querydat)){ 
  if(!in_array($row['semester'], $array)){
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