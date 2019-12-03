<?php
// autoloads classes 
spl_autoload_register(function ($class_name) {
  if (file_exists('./classes/' . $class_name . '.php')) {
    require_once('./classes/' . $class_name . '.php');
  }
});

include_once './templates/header.php';
include_once './templates/list-advert.php';
include_once './templates/footer.php';

