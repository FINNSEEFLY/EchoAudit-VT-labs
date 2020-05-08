<?php
session_start();
if (!isset($_SESSION['userHistory'])) {
    $_SESSION['userHistory'] = [];
}
array_push($_SESSION['userHistory'],$_SERVER['REQUEST_URI']);


?>