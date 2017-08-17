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

  // set new values
  $product->name = $_POST['name'];
  $product->price = $_POST['price'];
  $product->description = $_POST['description'];
  $product->category_id = $_POST['category_id'];
  $product->id = $_POST['id'];

  // create the product
  echo $product->update() ? 'true' : 'false';
}
