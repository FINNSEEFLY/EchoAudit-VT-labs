<?php
session_start();
if (!isset($_SESSION['userHistory'])) {
    $_SESSION['userHistory'] = [];
    $_SESSION['language'] = "Russian";
    $_SESSION['language_ini'] = parse_ini_file('lang/'.$_SESSION['language'].'.ini');
} else {
    if (isset($_POST['language'])) {
        $_SESSION['language'] = $_POST['language'];
        $_SESSION['language_ini'] = parse_ini_file('lang/'.$_SESSION['language'].'.ini');
    }
}
array_push($_SESSION['userHistory'], $_SERVER['REQUEST_URI']);
?>