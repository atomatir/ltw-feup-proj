<?php

class User{
  public $descrip;
  public $birthday;
  public $password;
  public $email;
  public $phone_number;
  public $created_at;
  public $last_login;
  public $last_name;
  public $first_name;

  function __construct()
  {
    $this->created_at = time();
  }

  function updateLogin(){
    $this->last_login = time(); 
  }
}