<?php

  if($_POST) {
    include_once '../config/core.php';
    include_once '../config/database.php';
    include_once '../objects/category.php';

    $databse = new Database();
    $db = $database->getConnection();
    $category = new Category($db);

    $category->id = $POST['categ_id'];
    $results = $category->readOne();

    echo $results;

  }
