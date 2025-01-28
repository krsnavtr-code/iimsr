<?php 
    include("dbconnection.php");
    $data = $_POST['course'];
    echo $data;
    $querydat = mysqli_query($con,"SELECT `branch` FROM `course` WHERE `course`='$data'"); 
    $array = array();
?>
<?php 
    while($row = mysqli_fetch_array($querydat)){ 
      if(!in_array($row['branch'], $array)){
        $array[] = $row['branch'];  
      }
    }
?>
   <option value="" disable selected>--Select Branch--</option>
    <?php foreach($array as $adataa){ 
        if(!empty($adataa)){
    ?>
    <option value="<?php echo $adataa;  ?>"><?php echo $adataa;  ?></option>
    <?php } } ?>
<option value="other branch">Other</option>

