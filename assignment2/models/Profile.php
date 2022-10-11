<?php
namespace assignment2\models;

class Profile extends \assignment2\core\Models{

	public function insert(){
		$SQL = "INSERT INTO profile(user_id, first_name, middle_name, last_name) VALUES (:user_id, :first_name, :middle_name, :last_name)";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['user_id'=>$this->user_id, 'first_name'=>$this->first_name, 'middle_name'=>$this->middle_name, 'last_name'=>$this->last_name]);
	}

	public function get($profile_id){
		$SQL = "SELECT * FROM profile WHERE profile_id=:profile_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['profile_id'=>$profile_id]);//pass any data for the query
		$STMT->setFetchMode(\PDO::FETCH_CLASS, "assignment2\\models\\Profile");
		return $STMT->fetch();
	}

	public function getUser($user_id){
		$SQL = "SELECT * FROM profile WHERE user_id=:user_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['user_id'=>$user_id]);//pass any data for the query
		$STMT->setFetchMode(\PDO::FETCH_CLASS, "assignment2\\models\\Profile");
		return $STMT->fetch();
	}

	public function update($profile_id){
        $SQL = "UPDATE profile SET first_name=:first_name, middle_name=:middle_name, last_name=:last_name WHERE profile_id=:profile_id";
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(['first_name'=>$this->first_name,
                        'middle_name'=>$this->middle_name,
                        'last_name'=>$this->last_name,
                        'profile_id'=>$this->profile_id]);
    }
}