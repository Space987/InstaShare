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

	public function update(){
		$SQL = "UPDATE publication SET picture=:picture, caption=:caption, date_time=:date_time WHERE publication_id=:publication_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['picture'=>$this->picture, 'caption'=>$this->caption, 'date_time'=>$this->date_time, 'publication_id'=>$this->publication_id]);
	}

	public function get($publication_id){
		//get all records from the owner table
		$SQL = "SELECT * FROM publication WHERE publication_id=:publication_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['publication_id'=>$publication_id]);//pass any data for the query
		$STMT->setFetchMode(\PDO::FETCH_CLASS, "assignment2\\models\\Publication");
		return $STMT->fetch();
	}

	public function deleteComments(){
		$SQL = "DELETE FROM comment WHERE publication_id=:publication_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['publication_id'=>$this->publication_id]);
	
	}

	public function delete(){
		$SQL = "DELETE FROM publication WHERE publication_id=:publication_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['publication_id'=>$this->publication_id]);
	}

	public function insert(){
		$SQL = "INSERT INTO publication (profile_id, picture, caption, date_time) VALUES (:profile_id, :picture, :caption, :date_time)";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['profile_id'=>$this->profile_id, 'picture'=>$this->picture, 'caption'=>$this->caption, 'date_time'=>$this->date_time]);
	}
}