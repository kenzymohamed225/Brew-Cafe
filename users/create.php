<?php

require_once '../connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {

    unset($_POST['submit']);
    if (isset($_POST['confirm-password'])) {
        unset($_POST['confirm-password']);
    }

    $db = new Connect();

    $isCreated = $db->insert($_POST, 'users');

    if ($isCreated) {
        header("Location: /Brew-Cafe-main/users/login.php");
        exit();
    } else {
        echo "Registration failed! Please try again.";
    }
} else {
    header("Location: /Brew-Cafe-main/users/register.php");
    exit();
}
?>