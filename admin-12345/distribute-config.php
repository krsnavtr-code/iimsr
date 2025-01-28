<?php 
    include('dbconnection.php'); 

    /*--------------Test Key And Secret Key 24-June-2022------------*/
    /*$keyId = 'rzp_test_JO6Fjo0dOtStGW';
    $keySecret = 'IUkOuaTN9Rf0cfnzbpWgIFDb';*/
    
    /*--------------Live Key And Secret Key 24-June-2022------------*/
    $keyId = 'rzp_live_Mr7HT6WWM5kM1R';
    $keySecret = '1uAT6W7V1xXYbdTs2MmIX5wQ';
    
    $displayCurrency = 'INR';
    
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    
    if(mysqli_connect_errno()){
        echo "Connection Fail".mysqli_connect_error();
    }
?>
