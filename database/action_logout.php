<?php
require_once 'connection.php';

session_destroy();

session_start();

header('Location: ' . $_SERVER['HTTP_REFERER']);
?>