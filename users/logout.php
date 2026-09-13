<?php
session_start();


session_unset();

session_destroy();

header('Location: /Brew-Cafe-main/home.php');
exit();
