<?php

	function login($email,$pass,$repeat_pass,$remember,$csrf){
		global $conn;
		$err_msg = array();
		$cookie_timeout = (60*60*24*7);

		if(empty($email)){
			$err_msg['nEmail'] = 'Upišite Vašu email adresu!';
		}
		else if(empty($pass)){
			$err_msg['nPass'] = 'Upišite Vašu lozinku!';
		}
		
		else if(empty($repeat_pass)){
			$err_msg['nRepeat_Pass'] = 'Ponovo upišite Vašu lozinku!';
		}
		if ($pass!==$repeat_pass)
			$err_msg['wRepeat_Pass'] = 'Upišite ispravnu lozinku!';
		else{
			if(empty($csrf) || $csrf != $_SESSION['csrf']){
				$err_msg['token'] = 'Krivi autentifikacijski token!';
			}
			else{
				try{
					$stmt = $conn->prepare('SELECT * FROM korisnici WHERE email = :email');
					$stmt->bindParam(':email',$email);
					$stmt->execute();
				}
				catch(PDOException $e){
					if(DEBUG === true){
						header('Location:../error/db_error.php?err_msg='.$e->getMessage());
					}
					else{
						header('Location:../error/db_error.php?err_msg');
					}
				}
				if($stmt->rowCount() == 0){
					$err_msg['wEmail'] = 'Email adresa ne postoji u bazi!';
				}
				else{
					$row = $stmt->fetch(PDO::FETCH_ASSOC);
					if(!password_verify($pass,$row['lozinka'])){
						$err_msg['wPass'] = 'Kriva lozinka!';
					}
					else{
						if($remember == 'true'){
							$cookie_token = substr(md5(uniqid(rand(),1)),0,32);
							$cookie_validity = time() + $cookie_timeout;
							setcookie('AUTH_TOKEN',$cookie_token,$cookie_validity,'/',NULL,NULL,1);
							try{
								$stmt = $conn->prepare('UPDATE korisnici SET token=:token WHERE email=:email');
								$stmt->bindParam(':token',$cookie_token);
								$stmt->bindParam(':email',$email);
								$stmt->execute();
							}
							catch(PDOException $e){
								if(DEBUG === true){
									header('Location:../error/db_error.php?err_msg='.$e->getMessage());
								}
								else{
									header('Location:../error/db_error.php?err_msg');
								}
							}
						}
					}
				}
			}
		}
		
		if(!empty($err_msg)){
			return json_encode($err_msg);
		}
		else{
			return $row;
		}
	}
	
	function logout($id,$name,$cookie_token,$csrf){
		if(isset($csrf) && $csrf == $_SESSION['csrf']){
			global $conn;
			$null = NULL;
			try{
				$stmt = $conn->prepare('UPDATE korisnici SET token=:token WHERE id=:id');
				$stmt->bindParam(':token',$null);
				$stmt->bindParam(':id',$id);
				$stmt->execute();
			}
			catch(PDOException $e){
				if(DEBUG === true){
					header('Location:../error/db_error.php?err_msg='.$e->getMessage());
				}
				else{
					header('Location:../error/db_error.php?err_msg');
				}
			}
			unset($_COOKIE['AUTH_TOKEN']);
			setcookie('AUTH_TOKEN','',time()-3600,'/');
			session_destroy();
			header('Location:../index.php');
		}
		else{
			header('Location:../index.php');
		}
	}


?>
