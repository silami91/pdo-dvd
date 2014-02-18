<?php

class Query
{
	protected $pdo;
	protected $sql;

	public function getAll()
	{
		$statement = $this->pdo->prepare($this->sql);
		$statement->execute();
		return $statement->fetchAll(PDO::FETCH_OBJ);
	}
}