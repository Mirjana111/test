<?php
	require '../config/init.php';
	require 'functions/register.php';
	require 'services/xss.php';
	
	$email = _e($_POST['email']);
	$pass = _e($_POST['pass']);
	$repeat_pass = _e($_POST['repeat_pass']);
	$remember = _e($_POST['remember']);
	$csrf = _e($_POST['csrf']);
	
	$data = login($email,$pass,$repeat_pass,$remember,$csrf);
	
	if(is_array($data)){
		$_SESSION['user_id'] = $data['id'];
		$_SESSION['user_name'] = $data['ime'];
		print_r(1);
	}
	else{
		echo $data;
	}
?>

