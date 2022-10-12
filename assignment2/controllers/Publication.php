<?php
namespace assignment2\controllers;

class Publication extends \assignment2\core\Controller{
	
	public function index(){
	 	$publication = new \assignment2\models\Publication();
	 	$publications = $publication->getAll();

	 	$profile = new \assignment2\models\Profile();
	 	$profiles = $profile->getAll();
	 	$this->view('Publication/index', ['publication'=>$publications, 'profile'=>$profiles]);
	 }

	 public function search(){
	 	$publication = new \assignment2\models\Publication();
	 	$profile = new \assignment2\models\Profile();

		$search_val = $_GET['searchbar'];

		$publications = $publication->getAllSimilar($search_val);
		$profiles = $profile->getAllSimilar($search_val);
		$this->view('Publication/index', ['publication'=>$publications, 'profile'=>$profiles]);
	 }

	#[\assignment2\filters\Login]
	public function edit($publication_id){
		$publication = new \assignment2\models\Publication();
		$publication = $publication->get($publication_id);
		$profile_id_publication = $publication->profile_id;

		$user = new \assignment2\models\User();
		$user = $user->get($_SESSION['username']);
		$user_id_user = $user->user_id;

		$profile = new \assignment2\models\Profile();
		$profile = $profile->get($profile_id_publication);
		$profile_id_profile = $profile->profile_id;
		$user_id_profile = $profile->user_id;

		if($user_id_user == $user_id_profile && $profile_id_profile == $profile_id_publication){
				if(isset($_POST['action'])){
					$filename = $this->saveFile($_FILES['profile_pic']);

					if($filename){
						unlink("images/$publication->picture");
						$publication->picture = $filename;
					}

					$publication->caption = $_POST['caption'];
					$publication->date_time = $_POST['date_time'];

					$publication->update();

					header('location:/Publication/details/' . $publication_id .'?message=Publication Changed');
				}else{
					$publication = new \assignment2\models\Publication();
	 				$publication = $publication->get($publication_id);
					$this->view('Publication/edit', ['publication'=>$publication]);	
					}
			}else{
				header('location:/Publication/details/' . $publication_id .'?error=Not your Publication');
			}	
		}		

	public function details($publication_id){
		$publication = new \assignment2\models\Publication();
		$publication = $publication->get($publication_id);
		$comment = new \assignment2\models\Comment();
		$comment = $comment->getAll($publication_id);
	 	$this->view('Publication/details', ['publication'=>$publication, 'comment'=>$comment]);
	}

	#[\assignment2\filters\Login]
	public function delete($publication_id){
		$publication = new \assignment2\models\Publication();
		$publication = $publication->get($publication_id);
		$profile_id_publication = $publication->profile_id;

		$user = new \assignment2\models\User();
		$user = $user->get($_SESSION['username']);
		$user_id_user = $user->user_id;

		$profile = new \assignment2\models\Profile();
		$profile = $profile->get($profile_id_publication);
		$profile_id_profile = $profile->profile_id;
		$user_id_profile = $profile->user_id;

		if($user_id_user == $user_id_profile && $profile_id_profile == $profile_id_publication){
			$publication->deleteComments();
			$publication->delete();
			header('location:/Publication/index?message=Publication Deleted');
		}else{
			header('location:/Publication/details/' . $publication_id . '?error=Not your Publication');
		}
	}

	#[\assignment2\filters\Login]
	public function add(){
		if(isset($_POST['action'])){
			$user = new \assignment2\models\User();
			$user = $user->get($_SESSION['username']);
			$user_id_user = $user->user_id;
			
			$profile = new \assignment2\models\Profile();
			$profile = $profile->getUser($user_id_user);
			$profile_id_profile = $profile->profile_id;

			$filename = $this->saveFile($_FILES['profile_pic']);


			if($_POST['caption'] == "" || $_POST['date_time'] == "" ||  $_FILES['profile_pic'] ['size'] == 0){
				header('location:/Publication/add?error=All of the feilds must be filled');
			}else{

				$publication = new \assignment2\models\Publication();
				$publication->profile_id = $profile_id_profile;
				$publication->caption = $_POST['caption'];
				$publication->date_time = $_POST['date_time'];
				$publication->picture = $filename;

				$publication->insert();	
				header('location:/Publication/index?message=Publication Created');
			}
		}else{
			$publication = new \assignment2\models\Publication();
			$this->view('Publication/add');
		}
	}
}