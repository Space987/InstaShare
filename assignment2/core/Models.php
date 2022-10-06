<?php
namespace assignment2\core;

class Models{
	protected static $_connection;

	public function __construct(){
		$username = 'root';
		$password = '';
		$server = 'localhost';
		$dbname = 'instashare';

		try{
			self::$_connection = new \PDO("mysql:host=$server;dbname=$dbname", 
				$username, $password);
			self::$_connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

		}catch(\Exception $e){
			exit(0);
		}


	}
}