
<?php
include_once "DBconnection.php";
$id = $_GET['id'];
$sql = "DELETE FROM `item` WHERE `productID` =" . $id;
if ($conn->query($sql) === TRUE) {
 header('location: Admin.php');
}
