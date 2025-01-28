<!DOCTYPE html>

<?php 
//    error_reporting(0);
    include("dbconnection.php");
	$url = basename($_SERVER['REQUEST_URI']);
	$metaqry = "SELECT * FROM `test_meta_data` WHERE `meta_url`='$url'";
	$metares = mysqli_query($con,$metaqry);
	$metarow = mysqli_num_rows($metares);
	$metadata = mysqli_fetch_assoc($metares);
	$meta_title='';
	$meta_description='';
	$meta_keywords='';
	if($metarow>0){
    	$meta_title = $metadata['meta_title'];
    	$meta_description = $metadata['meta_description'];
    	$meta_keywords = $metadata['meta_keywords'];
	}else{
    	$meta_title = 'Online Diploma,Technical & Management Courses';
    	$meta_description = 'Imperial Institute of Management Science & Research is one of the leading institutes in India that provides education from distance and online mode like BBA, BCA, MBA, MCA, B.Tech, Diploma.';
    	$meta_keywords = 'Online BCA Courses | Online MCA Courses | Online BBA Courses | Online MBA Courses | Best BE/B.Tech Courses | Diploma Distance Education | IIMSR Institute';
	}
?>
<html lang="zxx">
<head>
    <title><?php echo $meta_title;?></title>
	<meta charset="utf-8">
	<meta name="description" content="<?php echo $meta_description;?>">
	<meta name="keywords" content="<?php echo $meta_keywords;?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-site-verification" content="PQpx1DRoewSicVSw0GpfMHhfRlewEVih-Z9GAS6nnVM" />
    <link rel="icon" href="https://iimsr.net.in/images/logo/fevicon-logo.jpeg" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="https://iimsr.net.in/css/animate.css" />
    <link rel="stylesheet" type="text/css" href="https://iimsr.net.in/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="https://iimsr.net.in/css/bootstrap-select.css" />
    <link rel="stylesheet" type="text/css" href="https://iimsr.net.in/css/font-awesome.css" />
    <link rel="stylesheet" type="text/css" href="https://iimsr.net.in/css/fontello.css" />
    <link rel="stylesheet" type="text/css" href="https://iimsr.net.in/css/jquery.fancybox.css" />
    <link rel="stylesheet" type="text/css" href="https://iimsr.net.in/css/mob_menu.css" />
    <link rel="stylesheet" type="text/css" href="https://iimsr.net.in/css/rev/pe-icon-7-stroke.css" />
    <link rel="stylesheet" type="text/css" href="https://iimsr.net.in/css/rev/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="https://iimsr.net.in/css/rev/settings.css" />
    <link rel="stylesheet" type="text/css" href="https://iimsr.net.in/css/rev/layers.css" />
    <link rel="stylesheet" type="text/css" href="https://iimsr.net.in/css/rev/navigation.css" />
    <link rel="stylesheet" type="text/css" href="https://iimsr.net.in/css/rev/rev_responsive.css" />
    <link rel="stylesheet" type="text/css" href="https://iimsr.net.in/css/reset.css" />
    <link rel="stylesheet" type="text/css" href="https://iimsr.net.in/css/style.css" />
    <link rel="stylesheet" type="text/css" href="https://iimsr.net.in/css/external.css" />
    <link rel="stylesheet" type="text/css" href="https://iimsr.net.in/css/circularCountdown.css" />
    <link href='https://fonts.googleapis.com/css?family=Raleway:800,500%7CLato:400,300,400italic,700,700italic,300italic,900italic,900,100,100italic%7CRoboto:400,500,600' rel='stylesheet' type='text/css' />
</head>