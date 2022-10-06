<?php
namespace assignment2\models;

class User extends \assignment2\core\Models{

	//needs to connect to the DB - through the Model base class

	public function insert(){
		$SQL = "INSERT INTO user(username, password_hash) VALUES (:username, :password_hash)";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['username'=>$this->username, 'password_hash'=>$this->password_hash]);
		$user_id = self::$_connection->lastInsertId();
		return $user_id;
	}

	public function get($username){
		//get all records from the owner table
		$SQL = "SELECT * FROM user WHERE username LIKE :username";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['username'=>$username]);//pass any data for the query
		$STMT->setFetchMode(\PDO::FETCH_CLASS, "assignment2\\models\\User");
		return $STMT->fetch();
	}
}