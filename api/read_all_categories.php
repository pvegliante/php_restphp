<?php

  if($_POST) {
    include_once '../config/core.php';
    include_once '../config/database.php';
    include_once '../objects/category.php';

    $databse = new Database();
    $db = $database->getConnection();
    $category = new Category($db);

    $results = $category->readAll();

    echo $results;

  }
