<?php
// autoloads classes 
spl_autoload_register(function ($class_name) {
  if (file_exists('./classes/' . $class_name . '.php')) {
    require_once ('./classes/' . $class_name . '.php');
  } else if (file_exists('./controllers/' . $class_name . '.php')) {
    require_once ('./controllers/' . $class_name . '.php');
  } else if (file_exists('./models/' . $class_name . '.php')) {
    require_once ('./models/' . $class_name . '.php');
  } else if (file_exists('./views/' . $class_name . '.php')) {
    require_once ('./views/' . $class_name . '.php');
  }
});

$router = new Router(new Request);

$router->get('/', function(){
  echo "ola";
});

$router->get('/home', function () {
  echo "home";
});

