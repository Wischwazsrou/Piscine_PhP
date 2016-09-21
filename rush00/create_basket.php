<?php

session_start();
include('include/header.php');
?>
<h1>Basket</h1>

<?php
$_SESSION['basket'][] = $_GET['product'];
// $_SESSION["login"]["basket"] = $basket;
var_dump($_SESSION);
//	header('Location: http://e3r7p10.42.fr:8080/');
echo "product added to basket";
?>
