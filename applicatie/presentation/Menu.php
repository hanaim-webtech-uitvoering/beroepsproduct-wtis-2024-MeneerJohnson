<?php
include_once("util/db_connectie.php");
include_once("util/head.php");
include_once("components/header.php");
include_once("models/Menu.php");

$menuItems = getMenuItems();

include_once("util/echoMessage.php");

$groupedMenuItems = [];
foreach ($menuItems as $menuItem) {
    $groupedMenuItems[$menuItem['type_id']][] = $menuItem;
}

include_once("application/Menu.php");
?>
