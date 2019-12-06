<?php
require_once 'session.php';

session_destroy();

session_start();

header('Location: ' . $_SERVER['HTTP_REFERER']);
?>