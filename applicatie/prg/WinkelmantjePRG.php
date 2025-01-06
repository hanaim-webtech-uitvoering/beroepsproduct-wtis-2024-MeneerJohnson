<?php
include_once("../util/db_connectie.php");
include_once("../util/head.php");
include_once("../models/WinkelmantjeRPG.php");
include_once("../models/util.php");

if (!isset($_SESSION['username']) || !isset($_POST['address'])) {
    header("Location: http://localhost:8080/Inloggen.php");
}

$namesOfProductsInCart = getProductsInCart(getNameOfMenuItems());
function getProductsInCart($existingProducts)
{
    $tempArray = [];
    foreach ($existingProducts as $existingProduct) {

        if (isset($_SESSION[$existingProduct['name']])) {
            array_push($tempArray, $existingProduct['name']);
        }
    }
    return $tempArray;
}

$products = [];
foreach ($namesOfProductsInCart as $nameOfProductInCart) {
    if (isset($_SESSION[$nameOfProductInCart])) {
        $product = ["name" => $nameOfProductInCart, "quantity" => $_SESSION[$nameOfProductInCart]];
        array_push($products, $product);
    }
}

if (count($products) > 0) {
    if (isset($_POST['naam'])) {
        $naam = $_POST['naam'];
        $address = $_POST['address'];
        addOrder(null, $naam, $address);
        addOrderProducts($products);
    } elseif (isset($_POST['username'])) {
        $address = $_POST['address'];
        $username = $_SESSION['username'];
        $userData = getUserData($username);
        $name = $userData['first_name'] . " " . $userData['last_name'];
        addOrder($username, $name, $address);
        addOrderProducts($products);
        session_destroy();
        session_start();
        $_SESSION['username'] = $username;
    }
    header("Location: http://localhost:8080?msg=Succesvol+geplaatst");
} else {
    header("Location: http://localhost:8080/Winkelmantje.php");
}
