<?php

class ArtistMenu{

	public $type;
	public $artists;

	public function __construct($artist, $artists)
	{
		$this->type = $artist;
		$this->artists = $artists;
	}

	public function __toString()
	{
		$string = "<select name='$this->type'>";
		if(sizeof($this->artists) > 0)
		{
			foreach($this->artists as $artist)
			{
				$string = $string."<option value='$artist->id'>$artist->artist_name</option>";
			}
		}
		$string .="</select>";
		return $string;
	}

}