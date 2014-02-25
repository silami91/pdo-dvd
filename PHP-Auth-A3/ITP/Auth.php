<?php

namespace ITP\Auth;
use PDO;

class Auth
{

    protected $pdo;

    function __construct()
    {
        require_once __DIR__ . '/../db.php';
        $this->pdo = $pdo;
    }

    public function attempt($userName, $password)
    {
        $sql = "SELECT *
				FROM users
				WHERE username = ?
				AND password = sha1(?)";
        $statement = $this->pdo->prepare($sql);

        $statement->bindParam(1, $userName);
        $statement->bindParam(2, $password);


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

?>