<?php
include_once("util/head.php");
include_once("util/db_connectie.php");
include_once("components/header.php");
include_once("models/Profiel.php");
?>


<?php
$runningOrders = getRunningOrders($_SESSION['username']);
$groupedItems = [];
foreach ($runningOrders as $runningOrder) {
    $status = $runningOrder['status'] == 1 ? "In de oven" : "Aan het bezorgen";
    $groupedItems["<h2>OrderID: " . htmlspecialchars($runningOrder['order_id']) . "</h2><p>Geplaatst op: " . htmlspecialchars($runningOrder['datetime']) . '</p><p>Status uw bestelling: ' . $status . "</p>"][] = $runningOrder;
}
?>
<h1>Lopende orders:</h1>
<?php
foreach ($groupedItems as $type => $runningOrders) {
    echo $type;
    echo "<table>
    <tr>
        <th>Productnaam</th>
        <th>Aantal</th>
    </tr>";
    foreach ($runningOrders as $singleItem) {

        echo "<tr>";
        echo "<td>" . htmlspecialchars($singleItem['product_name']) .  "</td>";
        echo "<td>" . htmlspecialchars($singleItem['quantity']) .  "</td>";
        echo "</tr>";
    }
    echo "</table>";
}

?>



<?php
$completedHistoryItems = getCompletedHistoryItems($_SESSION['username']);
$groupedItems = [];
foreach ($completedHistoryItems as $completedHistoryItem) {
    $groupedItems["<h2>OrderID: " . htmlspecialchars($completedHistoryItem['order_id']) . "</h2><p>Geplaatst op: " . htmlspecialchars($completedHistoryItem['datetime']) . '</p>'][] = $completedHistoryItem;
}
?>
<h1>Afgehandelde orders:</h1>
<?php
foreach ($groupedItems as $type => $completedHistoryItems) {
    echo $type;
    echo "<table>
    <tr>
        <th>Productnaam</th>
        <th>Aantal</th>
    </tr>";
    foreach ($completedHistoryItems as $singleItem) {

        echo "<tr>";
        echo "<td>" . htmlspecialchars($singleItem['product_name']) .  "</td>";
        echo "<td>" . htmlspecialchars($singleItem['quantity']) .  "</td>";
        echo "</tr>";
    }
    echo "</table>";
}
include_once("components/footer.php");

?>