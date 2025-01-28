<?php
session_start();
if(empty($_SESSION['login'])){
     $_SESSION["key"] = '54585c506829293a2d4c3b68543b316e2e7a2d277858545a36362e5f39';
   header('location:login.php');
}