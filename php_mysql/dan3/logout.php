<?php

	require '../config/init.php';
	require 'functions/auth.php';
	
	$id = $_SESSION['user_id'];
	$name = $_SESSION['user_name'];
	
	if(isset($_COOKIE['AUTH_TOKEN'])){
		$cookie_token = $_COOKIE['AUTH_TOKEN'];
	}
	else{
		$cookie_token = false;
	}
	$csrf = $_GET['csrf'];
	
	if(isset($id)){
		logout($id,$name,$cookie_token,$csrf);
	}
	else{
		header('Location:../index.php');
	}
	

?>