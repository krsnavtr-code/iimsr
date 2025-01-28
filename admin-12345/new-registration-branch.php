<?php 
include("dbconnection.php");
$data = $_POST['data'];
$querydat = mysqli_query($con,"SELECT branch FROM `course` WHERE `course`='$data'"); 
$array = array();
?>
<option value="" disable>--Select Course--</option>
<?php while($row = mysqli_fetch_array($querydat)){ 
  if(!in_array($row['branch'], $array)){
    $array[] = $row['branch'];  
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
<option value="other">Other</option>