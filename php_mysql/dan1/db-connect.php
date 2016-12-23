<?php

try
{
	$conn = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=UTF8',DB_USER,DB_PASS);
	$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
	if(DEBUG === true){
		header('Location:error/db_error.php?err_msg='.$e->getMessage());
	}
	else{
		header('Location:error/db_error.php?err_msg');
	}
}

?>