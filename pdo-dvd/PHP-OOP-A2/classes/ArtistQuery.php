<?php

require_once 'Query.php';

class ArtistQuery extends Query {

	public function __construct($pdo)
	{
		$this->pdo = $pdo;
		$this->sql = "SELECT * FROM artists ORDER BY artist_name";
	}
}