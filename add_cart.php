<?php
session_start();


if (!in_array($_GET['id'], $_SESSION['cart'])) { //if product is not in cart
	array_push($_SESSION['cart'], $_GET['id']);//take id and put product in session cart
}
header('location: products.php');
?>