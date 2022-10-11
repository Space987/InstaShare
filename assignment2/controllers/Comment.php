<?php
namespace assignment2\controllers;

class Comment extends \assignment2\core\Controller{
	
	#[\assignment2\filters\Login]
	public function edit($comment_id){
		$comment = new \assignment2\models\Comment();
		$comment = $comment->get($comment_id);
		$publication_id = $comment->publication_id;
		$profile_id_comment = $comment->profile_id;

		$user = new \assignment2\models\User();
		$user = $user->get($_SESSION['username']);
		$user_id_user = $user->user_id;

		$profile = new \assignment2\models\Profile();
		$profile = $profile->get($profile_id_comment);
		$profile_id_profile = $profile->profile_id;
		$user_id_profile = $profile->user_id;

		
			if($user_id_user == $user_id_profile && $profile_id_profile == $profile_id_comment){
				if(isset($_POST['action'])){
					$comment->comment = $_POST['comment'];
					$comment->date_time = $_POST['date_time'];

					$comment->update();

					header('location:/Publication/details/' . $publication_id .'?message=Comment Changed');
				}else{
					$publication = new \assignment2\models\Publication();
	 				$publication = $publication->get($publication_id);
					$this->view('Comment/edit', ['publication'=>$publication, 'comment'=>$comment]);	
					}
			}else{
				header('location:/Publication/details/' . $publication_id .'?error=Not your Comment');
			}	
		}		

	#[\assignment2\filters\Login]
	public function add($publication_id){
		if(isset($_POST['action'])){
			$user = new \assignment2\models\User();
			$user = $user->get($_SESSION['username']);
			$user_id_user = $user->user_id;
			
			$profile = new \assignment2\models\Profile();
			$profile = $profile->getUser($user_id_user);
			$profile_id_profile = $profile->profile_id;

			$comment = new \assignment2\models\Comment();
			$comment->comment = $_POST['comment'];
			$comment->date_time = $_POST['date_time'];

			$comment->publication_id = $publication_id;
			$comment->profile_id= $profile_id_profile;
			$comment->insert();	
			header('location:/Publication/details/' . $publication_id);
		}else{
			$publication = new \assignment2\models\Publication();
	 		$publication = $publication->get($publication_id);
			$this->view('Comment/add', ['publication'=>$publication]);
		}
	}

	#[\assignment2\filters\Login]
	public function delete($comment_id){
		$comment = new \assignment2\models\Comment();
		$comment = $comment->get($comment_id);
		$publication_id = $comment->publication_id;
		$profile_id_comment = $comment->profile_id;

		$user = new \assignment2\models\User();
		$user = $user->get($_SESSION['username']);
		$user_id_user = $user->user_id;

		$profile = new \assignment2\models\Profile();
		$profile = $profile->get($profile_id_comment);
		$profile_id_profile = $profile->profile_id;
		$user_id_profile = $profile->user_id;
		
		if($user_id_user == $user_id_profile && $profile_id_profile == $profile_id_comment){
			$comment->delete();
			header('location:/Publication/details/' . $publication_id .'?message=Comment Deleted');
		}else{
			header('location:/Publication/details/' . $publication_id . '?error=Not your Comment');
		}
	}
}