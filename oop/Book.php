<?php

require_once 'Product.php';

class Book extends Product {

  // public, protected, private
  public $pages;
  public $authors;
  protected $listedAt;

  protected static $createdCount = 0;

  public function __construct($title, $pages)
  {
    static::$createdCount++;
    $this->listedAt = time();
    $this->pages = $pages;
    parent::__construct($title);
  }


  public static function count()
  {
    return static::$createdCount;
  }
}