<?php
include_once "DBconnection.php";
$id = $_GET['id'];
$price = $_GET['price'];
$sql = "UPDATE `item` SET `price`= " . $price . " WHERE `productID` =" . $id;
if ($conn->query($sql) === TRUE) {
    header('location: Admin.php');
}