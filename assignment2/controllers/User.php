<?php
namespace assignment2\controllers;

class User extends \assignment2\core\Controller{

	 public function index(){
		if(isset($_POST['action'])){
			$user = new \assignment2\models\User();
			$user = $user->get($_POST['username']);
			if(password_verify($_POST['password'], $user->password_hash)){
				$_SESSION['username'] = $user->username;
				$_SESSION['user_id'] = $user->user_id;
				header('location:/Publication/index/?message=Successfully logged in');
			}else{
				header('location:/User/index?error=Incorrect username or password');
			}

		}else{
			$this->view('User/index');
		}
 	 }

	 public function register(){
		 if(isset($_POST['action'])){
			if($_POST['password'] == "" || $_POST['username'] == "" || $_POST['password_confirmation'] == "" ){
				header('location:/User/register?error=All of the feilds must be filled');
			}else{
				if($_POST['password'] == $_POST['password_confirmation']){
			 		$user = new \assignment2\models\User();
			 		
			 		if($user->get($_POST['username'])){
			 			header('location:/User/register?error=The username already exists, Choose another');
			 		}else{
			 			$user->username = $_POST['username'];
			 			$user->password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
			 			$user_id = $user->insert();
			 			$_SESSION[$_POST['username']] = $user->username;
						$_SESSION['user_id'] = $user_id;
						header('location:/Profile/add');
			 		}
				}else{
					header('location:/User/register?error=The passwords do not match');
				}
			} 	 	
		 }else{
		 	$this->view('User/register');
		 }
	 }

	public function logout(){
		session_destroy();
		header('location:/Publication/index?message=You\'ve been successfully logged out');
	}
}