<?php
  //show error reporting
  error_reporting(E_ALL);

  //set you default timezone.
  date_default_timezone_set('America/New_York');

  // pag is the current page, if there's notig set, default is page 1.
  $page = isset($_GET['page']) ? $_GET['page'] : 1;
