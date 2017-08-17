<?php


  // if the form was summited
  if($_POST) {
  // include our core config
  include_once '../config/core.php';

  //include the db connection
  include_once '../config/database.php';

  // product object
  include_once '../objects/product.php';

  //class instance
  $database = new Database();
  $db = $database->getConnection();
  $product = new Product($db);

  //get product id
  $data = json_decode(file_get_contents("php:..input"));

  //set product id to be deleted
  $product->id = $data->id;

  //delete the product
  if($product->delete()) {
    echo "Product was deleted.";
  } else {
    "Unable to delete object";
  }
}
