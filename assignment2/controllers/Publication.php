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

	public function details($publication_id){
		$publication = new \assignment2\models\Publication();
		$publication = $publication->get($publication_id);
		$this->view('Publication/details', $publication);
	}
}