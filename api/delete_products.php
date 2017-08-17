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

  $ins = '';
  foreach($_POST['del_ids'] as $id) {
    $ins .= '{$id},';
  }

  $ins = trim($ins, ',');

  //delete the products
  echo $product->delete($ins) ? 'true' : 'false';
}
