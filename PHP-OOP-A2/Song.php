<?php

class Song{
	private $id;
	private $title;
	private $artist_id;
	private $genre_id;
	private $price;
	private $play_count;
	private $pdo;

	public function __construct($pdo)
	{
		$this->pdo = $pdo;
	}

	public function SetTitle($title)
	{
		$this->title = $title;
	}

	public function SetArtistId($artistID)
	{
		$this->artist_id = $artistID;
	}

	public function SetGenreId($genreID)
	{
		$this->genre_id = $genreID;
	}

	public function SetPrice($price)
	{
		$this->price = $price;
	}

	public function Save()
	{
		$sql = "INSERT INTO songs (title, artist_id, genre_id, price)";
		$sql .= "VALUES ('$this->title', $this->artist_id, $this->genre_id, $this->price);";
		$statement = $this->pdo->prepare($sql);
		return $statement->execute();
	}

	public function GetTitle()
	{
		return $this->title;
	}

	public function GetID()
	{
		return $this->id;
	}
}