<?php

    // set up the usernames and passwords in an array
$all = array (
array('username'=>'abedReg','password'=>'123Reg','page'=>'ProjectWeb.html'),
array('username'=>'housseinInf','password'=>'123Inf','page'=>'GetInfo.php')
);
    //check if the form has been submitted
if ( isset($_POST['us']) && isset($_POST['ps']) ){
	//get the submitted usernames and password 
    $x = $_POST['us'];
	$y = $_POST['ps'];	
	
	// Check the array for a match
	$valid=false;
	foreach ($all as $all){
		if($all['username']==$x && $all['password']==$y){
			$valid=true;
			$page=$all['page'];
			break;
		}
	}
	
	// If no match is found, redirect to the approriate page
	if($valid){
		header('Location: '.$page);
		exit();
	}// If no match is found, display an error message
	else{
		echo 'Invalid Username or Password';
	}
}


?>