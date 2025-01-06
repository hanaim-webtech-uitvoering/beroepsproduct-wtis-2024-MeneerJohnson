<?php
include_once("../util/db_connectie.php");
include_once("../util/util.php");
include_once("../models/BestellingoverzichtPRG.php");
include_once("../models/Bestellingoverzicht.php");

if (!isAdmin()) {
    header("http://localhost:8080");
    exit();
}

$allRunningOrders = getAllRunningOrders();
$runningOrders = [];

foreach ($allRunningOrders as $runningOrder) {
    if (isset($_POST[$runningOrder['order_id']])) {
        array_push($runningOrders, ["order_id" => $runningOrder['order_id'], "status" => $_POST[$runningOrder['order_id']]]);
    }
}

changeOrdersStatus($runningOrders);

header("Location: http://Localhost:8080/Bestellingoverzicht.php?msg=Succesvol+geweizigd");
