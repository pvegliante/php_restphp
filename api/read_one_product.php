<?php

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

  // read all proucts
  $product->id = $_POST['prod_id'];
  $results = $product->readOne();

  //output in json format
  echo $results;
