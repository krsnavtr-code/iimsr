<?php
include_once 'dbconnection.php';
session_start();
if (isset($_SESSION['exami_unique_code'])) {
    session_destroy();
}
$ref = @$_GET['q'];
header("location:index.php");
?>