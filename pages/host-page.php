<?php
    require_once '../database/session.php';
    if(isset($_SESSION['username'])) {
        include_once('../templates/header.php');
        include_once('../templates/place-form.php');
        include_once('../templates/footer.php');
    } else {
        header('Location: ../pages/login-page.php');
    }