<?php

  if($_POST) {
  include_once '../config/core.php';

  include_once '../config/database.php';

  include_once '../objects/category.php';

  $database = new Database();
  $db = $database->getConnection();
  $product = new Category($db);

  $data = json_decode(file_get_contents("php:..input"));

  $product->id = $data->id;

  if($category->delete()) {
    echo "Category was deleted.";
  } else {
    "Unable to delete object";
  }
}
