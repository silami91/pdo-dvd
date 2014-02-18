<?php

namespace ITP;

class Auth{

	protected $pdo;
    protected $db;

    public function __construct()
    {
        $db = new DB();
        $pdo = new PDO("mysql:host=$db->host;dbname=$db->dbname", $db->user, $db->pass);
    }

	public function attempt($userName, $passWord)
	{
		$hashedPassword = sha1($passWord);
		$sql = "SELECT * 
				FROM users
				WHERE username = $userName
				AND password = $hashedPassword";
		$statement = $this->pdo->prepare($sql);
		$statement->execute();
		if(sizeof($statement->fetchAll(PDO::FETCH_OBJ)) == 1)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}