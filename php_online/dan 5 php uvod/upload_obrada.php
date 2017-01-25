<?php
if(isset($_POST['posalji'])){
	$upload_path = 'uploads/';
	
	$name = $_FILES['datoteka']['name'];
	$tmp_name = $_FILES['datoteka']['tmp_name'];
	$error = $_FILES['datoteka']['error'];
	$size = $_FILES['datoteka']['size'];
	if($error == UPLOAD_ERR_OK & $size !=0){
		}
		else{
			if($error !=UPLOAD_ERR_OK){
		
		echo'Došlo je do pogreške prilikom uploada<br>';
		
		if($size ==0){
			echo 'Datoteka ima o bajta!';
		}
	}
}
else{
header('Location:upload_forma.php');
	
}


?>