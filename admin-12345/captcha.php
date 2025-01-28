<?php
	session_start(); 
	$captcha = rand(100000,999999);
	$_SESSION["captcha"] = $captcha;  
	$height = 34; 
	$width = 320;   
	$image_p = imagecreate($width, $height); 
	$black = imagecolorallocate($image_p, 255, 152, 0);
	$white = imagecolorallocate($image_p, 255, 255, 255);
	$font_size = 12; 
	imagestring($image_p, $font_size, 150, 10, $captcha, $white); 

	imagejpeg($image_p, null, 65); 
	header("Cache-Control: no-store, no-cache, must-revalidate"); 
	header('Content-type: images/png'); 

?>