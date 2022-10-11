<?php
namespace assignment2\controllers;

class Publication extends \assignment2\core\Controller{
	
	public function index(){
	 	//display a list of all onwers
	 	//instantiate an owner model object
	 	$publication = new \assignment2\models\Publication();
	 	//call the ->getAll() method to get all owners from the DB
	 	$publications = $publication->getAll();
	 	//pass the collection of owners to the view
	 	$this->view('Publication/index', $publications);
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


			$publication = new \assignment2\models\Publication();
			$publication->profile_id = $profile_id_profile;
			$publication->caption = $_POST['caption'];
			$publication->date_time = $_POST['date_time'];
			//$publication->publication_id = $publication_id;
			$publication->picture = $filename;

		
			$publication->insert();	
			header('location:/Publication/index');
		}else{
			$publication = new \assignment2\models\Publication();
			$this->view('Publication/add');
		}
	}


	public function details($publication_id){
		$publication = new \assignment2\models\Publication();
		$publication = $publication->get($publication_id);
		$comment = new \assignment2\models\Comment();
		$comment = $comment->getAll($publication_id);
	 	$this->view('Publication/details', ['publication'=>$publication, 'comment'=>$comment]);
	}
}