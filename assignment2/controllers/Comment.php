<?php
namespace assignment2\controllers;

class Comment extends \assignment2\core\Controller{
	
	public function index($publication_id){
		$publication = new \assignment2\models\Publication();
	 	$publication = $publication->get($publication_id);
	 	$comment = new \app\models\comment();
	 	$comments = $comment->getAll($publication_id);
	 	$this->view('Animal/index', ['publication'=>$publication, 'comments'=>$comments]);
	}
}