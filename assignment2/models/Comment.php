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

	public function insert(){
		$SQL = "INSERT INTO comment(publication_id, profile_id, comment, date_time) VALUES (:publication_id, :profile_id, :comment, :date_time)";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['publication_id'=>$this->publication_id, 'profile_id'=>$this->profile_id, 'comment'=>$this->comment, 'date_time'=>$this->date_time]);
	}

	public function update(){
		$SQL = "UPDATE comment SET comment=:comment, date_time=:date_time WHERE comment_id=:comment_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['comment'=>$this->comment, 'date_time'=>$this->date_time, 'comment_id'=>$this->comment_id]);
	}

	public function get($comment_id){
		$SQL = "SELECT * FROM comment WHERE comment_id=:comment_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['comment_id'=>$comment_id]);//pass any data for the query
		$STMT->setFetchMode(\PDO::FETCH_CLASS, "assignment2\\models\\Comment");
		return $STMT->fetch();
	}

	public function delete(){
		$SQL = "DELETE FROM comment WHERE comment_id=:comment_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['comment_id'=>$this->comment_id]);
	}
}