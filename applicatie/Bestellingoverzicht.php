<?php
include_once("util/db_connectie.php");
include_once("models/Bestellingoverzicht.php");
include_once('components/header.php');

$runningOrders = getAllRunningOrders();
$options = [1, 2, 3];



$groupedItems = [];
foreach ($runningOrders as $runningOrder) {
    $groupedItems["<h2>OrderID: " . htmlspecialchars($runningOrder['order_id']) . "</h2><p>Geplaatst op: " . htmlspecialchars($runningOrder['datetime']) . "</p>"][] = $runningOrder;
}
?>
<h1>Lopende orders:</h1>
<form method="POST" action="http://localhost:8080/PRG/BestellingoverzichtPRG.php">
    <?php
    foreach ($groupedItems as $type => $runningOrders) {
        echo $type;
    ?>
        <table>
            <tr>
                <th>Productnaam</th>
                <th>Aantal</th>
                <th>Status</th>
            </tr>
            <?php
            foreach ($runningOrders as $singleItem) {
                $status = htmlspecialchars($singleItem['status']);
                echo "<tr>";
                echo "<td>" . htmlspecialchars($singleItem['product_name']) .  "</td>";
                echo "<td>" . htmlspecialchars($singleItem['quantity']) .  "</td>";
                echo "</tr>";
            }
            echo "</table>";
            echo "<label for=" . $singleItem['order_id'] . ">Status van bestelling:</label><br>";
            echo "<select id=" . $singleItem['order_id'] . " name=" .  $singleItem['order_id'] . ">";

            foreach ($options as $option) {
            ?>
                <option value=<?= $option ?>
                    <?php if ($option == $singleItem['status']) {
                        echo "selected";
                    } ?>> <?= $option ?>
                </option>
        <?php
            }
            echo "</select>";
        }
        ?>
        <button type="submit">Weizig</button>
</form>