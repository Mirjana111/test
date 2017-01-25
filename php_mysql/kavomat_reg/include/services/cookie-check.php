<?php

if(isset($_SESSION['user_id'])){
	header('Location:dashboard.php');
}
else{
	if(isset($_COOKIE['AUTH_TOKEN']) && !empty($_COOKIE['AUTH_TOKEN'])){
		$cookie_token = $_COOKIE['AUTH_TOKEN'];
		try{
			$stmt = $conn->prepare('SELECT id,ime,token FROM korisnici WHERE token=:token');
			$stmt->bindParam(':token',$cookie_token);
			$stmt->execute();
		}
		catch(PDOException $e){
			if(DEBUG === true){
				header('Location:error/db_error.php?err_msg='.$e->getMessage());
			}
			else{
				header('Location:error/db_error.php?err_msg');
			}
		}
		
		if($stmt->rowCount() != 1){
			$null = NULL;
			unset($_COOKIE['AUTH_TOKEN']);
			setcookie('AUTH_TOKEN','',time()-3600,'/');
			$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
			foreach($rows as $row){
				try{
					$stmt1 = $conn->prepare('UPDATE korisnici SET token=:token WHERE id=:id');
					$stmt1->bindParam(':token',$null);
					$stmt1->bindParam(':id',$row['id']);
					$stmt1->execute();
				}
				catch(PDOException $e){
					if(DEBUG === true){
						header('Location:error/db_error.php?err_msg='.$e->getMessage());
					}
					else{
						header('Location:error/db_error.php?err_msg');
					}
				}
			}
		}
		else{
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			if($cookie_token == $row['token']){
				if(!isset($_SESSION['user_id']) && empty($_SESSION['user_id'])){
					$_SESSION['user_id'] = $row['id'];
					$_SESSION['user_name'] = $row['ime'];
					header('Location:dashboard.php');
				}
			}
		}
	}
}

?>