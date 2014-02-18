<?php

class GenreMenu{

	public $type;
	public $genres;

	public function __construct($genre, $genres)
	{
		$this->type = $genre;
		$this->genres = $genres;
	}

	public function __toString()
	{
		$string = "<select name='$this->type'>";
		if(sizeof($this->genres) > 0)
		{
			foreach($this->genres as $genre)
			{
				$string = $string."<option value='$genre->id'>$genre->genre</option>";
			}
		}
		$string .="</select>";
		return $string;
	}

}