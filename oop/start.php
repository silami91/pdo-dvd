<?php

require_once 'Book.php';

$phpOOS = new Book('PHP Object Oriented', 300);
$jsGoodParts = new Book('JS Good Parts', 145);

//echo Book::$createdCount;
echo Book::count();
