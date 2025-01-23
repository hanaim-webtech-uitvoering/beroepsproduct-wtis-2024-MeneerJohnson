<?php
include_once("util/head.php");
include_once("util/db_connectie.php");
include_once("models/Profiel.php");
?>


<?php
if (!isset($_SESSION['username'])) {
    header("Location: http://localhost:8080");
    return;
}
$runningOrders = getRunningOrders($_SESSION['username']);
$groupedItems = [];
foreach ($runningOrders as $runningOrder) {
    $status = $runningOrder['status'] == 1 ? "In de oven" : "Aan het bezorgen";
    $groupedItems["<h2>OrderID: " . htmlspecialchars($runningOrder['order_id']) . "</h2><p>Geplaatst op: " . htmlspecialchars($runningOrder['datetime']) . '</p><p>Status uw bestelling: ' . $status . "</p>"][] = $runningOrder;
}


$completedHistoryItems = getCompletedHistoryItems($_SESSION['username']);
$groupedItems = [];
foreach ($completedHistoryItems as $completedHistoryItem) {
    $groupedItems["<h2>OrderID: " . htmlspecialchars($completedHistoryItem['order_id']) . "</h2><p>Geplaatst op: " . htmlspecialchars($completedHistoryItem['datetime']) . '</p>'][] = $completedHistoryItem;
}
include_once ("application/Profiel.php");
