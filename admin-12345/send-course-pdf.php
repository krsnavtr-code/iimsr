<?php
include("dbconnection.php");
$data = $_POST['data'];
$querydat = mysqli_query($con,"SELECT `course_pdf` FROM `course` WHERE `course`='$data'");
//print_r($querydat);
$array = array();
?>
<?php while($row = mysqli_fetch_array($querydat)){
    if(!in_array($row['course_pdf'],$array)){
        $array[] = $row['course_pdf'];
    }
}
?>
<?php foreach($array as $adataa){
    if(!empty($adataa)){ ?>
        <option hidden value="<?php echo $adataa; ?>"><?php echo $adataa; ?></option>
<?php }
} ?>
<option value="other">Other</option>