<?php
include('util/db_connectie.php');
include_once("util/head.php");
include_once("models/Winkelmantje.php");
include_once("models/util.php");


$errors = [];
$namesOfProductsInCart = getProductsInCart(getNameOfMenuItems());
$cartItems = getAllDetailsOfCartItem($namesOfProductsInCart);

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

function getAllDetailsOfCartItem($namesOfProductsInCart)
{
    $tempArray = [];
    foreach ($namesOfProductsInCart as $nameOfProductInCart) {
        $temp = ['name' => $nameOfProductInCart, 'amount' => $_SESSION[$nameOfProductInCart], 'price' => getProductPrice($nameOfProductInCart)['price']];
        array_push($tempArray, $temp);
    }
    return $tempArray;
}
$address = "";
if (isset($_SESSION['username'])) {
    $address = getUserData($_SESSION['username'])['address'];
}
include_once ("application/Winkelmantje.php");