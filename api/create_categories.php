<?php

  if($_POST) {
    include_once '../config/core.php';
    include_once '../config/database.php';
    include_once '../objects/category.php';

    $datebase = new Database();
    $db = $database->getConnection();
    $category = new Category($db);

    $category->id = $_POST['id'];
    $category->name = $_POST['name'];
    $category->description = $_POST['description'];
    $category->created = $_POST['created'];
    $category->modified = $_POST['modified'];

    echo $category->create() ? 'true' : 'false';
  }
