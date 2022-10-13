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
	public function edit(){

		$profile = new \assignment2\models\Profile;
		$profile_id = new \assignment2\models\Profile;
		$profiles = $profile->getAll(); 

		foreach($profiles as $item){
			if($item->user_id == $_SESSION['user_id']){
				$profile_id = $item->profile_id;
				break;
			}
		} 

		$profile = $profile->get($profile_id);
		if(isset($_POST['action'])){
			$profile->first_name = $_POST['first_name'];
			$profile->middle_name = $_POST['middle_name'];
			$profile->last_name = $_POST['last_name'];
			$profile->update();
			header('location:/Profile/edit?message=Profile Updated');
		}else{
			$profile = new \assignment2\models\Profile;
			$profile_to_show = new \assignment2\models\Profile;
			$profiles = $profile->getAll(); 

			foreach($profiles as $item){
				if($item->user_id == $_SESSION['user_id']){
					$profile_to_show = $profile->get($item->profile_id);
					$this->view('Profile/edit', ['profile'=>$profile_to_show], ['publication'=>$publications]);
					break;
				} 
			}
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