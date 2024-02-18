<?php
session_start();

//remove the id from our cart array
$key = array_search($_GET['id'], $_SESSION['cart']);
unset($_SESSION['cart'][$key]);

header('location: cart.php');
?>