<?php

nameSpace ITP\SongQuery;

use PDO;

class SongQuery{

    protected $pdo;
    protected $sql;
    protected $selectQuery;
    protected $joinQuery;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
        $this->selectQuery = "SELECT title, price ";
        $this->joinQuery = "";
    }

    public function withArtists()
    {
        $this->selectQuery.=', artist_name';
        $this->joinQuery.=' INNER JOIN artists ON songs.artist_id = artists.id';
        $this->sql = $this->selectQuery.' FROM songs '.$this->joinQuery;
        return $this;
    }

    public function withGenre()
    {
        $this->selectQuery.=', genre';
        $this->joinQuery.=' INNER JOIN genres ON songs.genre_id = genres.id';
        $this->sql = $this->selectQuery.' FROM songs'.$this->joinQuery;
        return $this;
    }

    public function orderBy($orderChoice)
    {
        $this->sql.=' ORDER BY '.$orderChoice;
        return $this;
    }

    public function all()
    {
        $statement = $this->pdo->prepare($this->sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_OBJ);
    }
}