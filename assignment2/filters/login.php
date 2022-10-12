<?php
namespace assignment2\filters;

#[\Attribute]
class Login extends \assignment2\core\AccessFilter{

	public function execute(){
		if(!isset($_SESSION['user_id'])){
			header('location:/User/login?error=You must login to use these features!');
			return true;
		}

		$profile = new \assignment2\models\Profile();
		$profiles = $profile->getAll();
		$isvalid = false;

		foreach($profiles as $value){
			if($value->user_id == $_SESSION['user_id']){
				$isvalid = true;
			}
		}

		if($isvalid == false){
			header('location:/User/register?error=You must create your profile to use these features!');
			return true;
		}
		 return false;
		} 
}

?>