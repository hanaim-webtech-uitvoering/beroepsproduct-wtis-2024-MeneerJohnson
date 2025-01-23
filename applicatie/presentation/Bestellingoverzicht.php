<?php
include_once("util/db_connectie.php");
include_once("models/Bestellingoverzicht.php");
include_once("models/util.php");
include_once("util/head.php");

if (!getIsUserAdmin($_SESSION['username'])['isAdmin']) {
    header("Location: http://localhost:8080/");
    return;
}

$runningOrders = getAllRunningOrders();
$options = [1, 2, 3];
$groupedItems = [];
foreach ($runningOrders as $runningOrder) {
    $groupedItems["<h2>OrderID: " . htmlspecialchars($runningOrder['order_id']) . "</h2><p>Geplaatst op: " . htmlspecialchars($runningOrder['datetime']) . "</p>"][] = $runningOrder;
}
include_once ("application/Bestellingoverzicht.php");