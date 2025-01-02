<?php
include_once("../util/head.php");
include_once("../util/db_connectie.php");
include_once("../models/Menu.php");
include_once("../util/util.php");

$menuItems = getMenuItems();
$itemsNaam = getElementsFromArrayWithIndex($menuItems, 'name');
$menuItemsWithAmount = [];

foreach ($itemsNaam as $itemNaam) { //Hierbij zetten we alle valide postitems met het aantal in een array
    $postItem = htmlspecialchars($_POST[str_replace(" ", '', $itemNaam)]);
    if (isset($postItem)) {
        if (!is_numeric($postItem) || htmlspecialchars($postItem) < 1) {
        } else {
            $itemObject = ["naam" => $itemNaam, "aantal" => (int)$postItem];
            array_push($menuItemsWithAmount, $itemObject);
        }
    }
}


if (count($menuItemsWithAmount) > 0) { //check of er valide items zaten in de $_post
    foreach ($menuItemsWithAmount as $menuItemWithAmount) {
        if (isset($_SESSION[$menuItemWithAmount['naam']])) {
            $_SESSION[$menuItemWithAmount["naam"]] += $menuItemWithAmount["aantal"];
        } else {
            $_SESSION[$menuItemWithAmount['naam']] = $menuItemWithAmount['aantal'];
        }
    }
    header("Location: http://localhost:8080/Menu.php?msg=Succesvol+toegevoegd");
}
