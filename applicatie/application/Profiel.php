<?php
include_once("components/header.php");
?>

<h1>Lopende orders:</h1>

<?php
foreach ($runningGroupedItems as $type => $runningOrders) {
?>
    <?= $type ?>
    <table>
        <tr>
            <th>Productnaam</th>
            <th>Aantal</th>
        </tr>
        <?php
        foreach ($runningOrders as $singleItem) {
        ?>
            <tr>
                <td> <?= htmlspecialchars($singleItem['product_name']) ?> </td>
                <td> <?= htmlspecialchars($singleItem['quantity']) ?> </td>
            </tr>
        <?php } ?>
    </table>
<?php
}
?>

<h1>Afgehandelde orders:</h1>
<?php
foreach ($groupedItems as $type => $completedHistoryItems) {
?>
    <?= $type ?>
    <table>
        <tr>
            <th>Productnaam</th>
            <th>Aantal</th>
        </tr>
        <?php
        foreach ($completedHistoryItems as $singleItem) {
        ?>
            <tr>
                <td> <?= htmlspecialchars($singleItem['product_name']) ?> </td>
                <td> <?= htmlspecialchars($singleItem['quantity']) ?> </td>
            </tr>
        <?php } ?>
    </table>
<?php
}
include_once("components/footer.php");
