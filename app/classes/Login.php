<?php

namespace App\classes;
use App\classes\Database;
class Login{

	public function loginCheck($data){

		$username = $data['username'];
		$password = md5($data['password']);
		$sql = "SELECT * FROM `users` WHERE `username` = '$username' AND `password` = '$password'";
		$result = mysqli_query(Database::dbcon(),$sql);

		if($result){

			if(mysqli_num_rows($result) == 1){
				$row = mysqli_fetch_assoc($result);
				session_start();
				$_SESSION['user_id'] = $row['id'];
				$_SESSION['username'] = $row['username'];
				$_SESSION['name'] = $row['name'];
				header('Location: index.php');

			}else{

				$LoginError = '<div class= "alert alert-warning"</div>' . "Invalid UserName or Password!";
				return $LoginError;
			}
		}else{

			die();

		}

	}
}

?>