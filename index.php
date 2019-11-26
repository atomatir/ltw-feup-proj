<?php

include_once './templates/head.php';
include_once './templates/home-form.php';
include_once './templates/footer.php';


// autoloads classes 
spl_autoload_register(function ($class_name) {
  if (file_exists('./classes/' . $class_name . '.php')) {
    require_once('./classes/' . $class_name . '.php');
  }
});
