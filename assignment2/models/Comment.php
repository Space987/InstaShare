<?php
namespace assignment2\models;

class Comment extends \assignment2\core\Models{

	public function getAll($publication_id){
		$SQL = "SELECT * FROM comment WHERE publication_id = :publication_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['publication_id'=>$publication_id]);
		$STMT->setFetchMode(\PDO::FETCH_CLASS, "assignment2\\models\\Comment");
		return $STMT->fetchAll();
	}
}