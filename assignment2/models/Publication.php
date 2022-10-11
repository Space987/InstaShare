<?php
namespace assignment2\models;

class Publication extends \assignment2\core\Models{

	//needs to connect to the DB - through the Model base class

	public function getAll(){
		//get all records from the owner table
		$SQL = "SELECT * FROM publication ORDER BY publication_id DESC";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute();//pass any data for the query
		$STMT->setFetchMode(\PDO::FETCH_CLASS, "assignment2\\models\\Publication");
		return $STMT->fetchAll();
	}

	public function get($publication_id){
		//get all records from the owner table
		$SQL = "SELECT * FROM publication WHERE publication_id=:publication_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['publication_id'=>$publication_id]);//pass any data for the query
		$STMT->setFetchMode(\PDO::FETCH_CLASS, "assignment2\\models\\Publication");
		return $STMT->fetch();
	}
}