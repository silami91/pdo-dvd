<?php

require_once 'Query.php';

class GenreQuery extends Query {

	public function __construct($pdo)
	{
		$this->pdo = $pdo;
		$this->sql = "SELECT * FROM genres ORDER BY id";
	}

}