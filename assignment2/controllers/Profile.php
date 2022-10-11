<?php
namespace assignment2\controllers;

class Profile extends \assignment2\core\Controller{
		
	public function add(){
		if(isset($_POST['action'])){
			$profile = new \assignment2\models\Profile();
			$profile->user_id = $_SESSION['user_id'];
			$profile->first_name = $_POST['first_name'];
			$profile->middle_name = $_POST['middle_name'];
			$profile->last_name = $_POST['last_name'];
			$profile->insert();
			header('location:/User/index');
		}else{
			$this->view('Profile/index');
		}
	}

	public function editProfile($profile_id){
		$profile = new \assignment2\models\Profile();
		$profile = $profile->get($profile_id);//need this
		if(isset($_POST['action'])){
			$profile->first_name = $_POST['first_name'];
			$profile->middle_name = $_POST['middle_name'];
			$profile->last_name = $_POST['last_name'];

			$profile->update();

			header('location:/Profile/editProfile');
		}else{
			$this->view('Profile/editProfile', $profile);	

		}
	}



}