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

	#[\assignment2\filters\Login]
	public function edit($user_id){
		if(isset($_POST['action'])){
			$profile = \assignment2\models\Profile;
			$profile->first_name = $_POST['first_name'];
			$profile->middle_name = $_POST['middle_name'];
			$profile->last_name = $_POST['last_name'];
			$profile->user_id = $profile->insert();
			$profile->update();
			header('location:/Profile/edit/' . $profile_id .'?message=Profile Updated');
		}else{
			$profile = new \assignment2\models\Profile();
	 		$profile_to_show = $profile->getUser($user_id);
			var_dump($_SESSION['user_id']);
			//$profile = $profile->get($profile_id);
			$this->view('Profile/edit', $profile_to_show);	
		}
	}

	public function display($profile_id){
		$profile = new \assignment2\models\Profile();
		$profile = $profile->get($profile_id);

		$publication = new \assignment2\models\publication();
		$publications = $publication->getAllProfile($profile_id);
		$this->view('Profile/display', ['profile'=>$profile, 'publication'=>$publications]);
	}	
}