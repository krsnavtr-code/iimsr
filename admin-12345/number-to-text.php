<?php 
include("dbconnection.php");
include('functions.php');
$totala = $_POST['totalincome'];
$array  = array_map('intval', str_split($totala));
numberTowords($array);
?>