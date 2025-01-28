<?php 
function numberTowords($num)
{ 
$ones = array( 
1 => "one", 
2 => "two", 
3 => "three", 
4 => "four", 
5 => "five", 
6 => "six", 
7 => "seven", 
8 => "eight", 
9 => "nine", 
); 
$allnumbertext =array();
foreach($num as $intnumb){
	if($intnumb==0){
	$allnumbertext[] ="Zero";	
	}
	if($intnumb==1){
	$allnumbertext[] ="One";	
	}
	elseif($intnumb==2){
	$allnumbertext[] ="Two";	
	}
	elseif($intnumb==3){
	$allnumbertext[] ="Three";	
	}
	elseif($intnumb==4){
	$allnumbertext[] ="Four";	
	}
	elseif($intnumb==5){
	$allnumbertext[] ="Five";	
	}
	elseif($intnumb==6){
	$allnumbertext[] ="Six";	
	}
	elseif($intnumb==7){
	$allnumbertext[] ="Seven";	
	}
	elseif($intnumb==8){
	$allnumbertext[] ="Eight";	
	}
	elseif($intnumb==9){
	$allnumbertext[] ="Nine";	
	}
}
foreach($allnumbertext as $text){
		echo $text." ";
	}
} 



?>