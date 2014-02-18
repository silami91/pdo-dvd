<?php

class Product {

  public $title;
  public $price;


  public function __construct($title = 'NA')
  {
    $this->title = $title;
  }

  public function __toString()
  {
    return $this->title;
  }

  public function isValid()
  {
    if ($this->title) {
      return true;
    }

    return false;
  }


}