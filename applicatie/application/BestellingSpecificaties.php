<?php
include_once ("components/header.php");
?>

<form action="http://localhost:8080/BestellingSpecificaties.php" method="get">
    <label for="order_id">Bestellingnummer:</label><br>
    <input id="order_id" name="order_id" type="number">
    <button type="submit">Zoek</button>
</form>
<?php
if (isset($_GET['order_id']) && is_numeric($_GET['order_id'])) {
    $orderID = intval($_GET['order_id']);
    $order = getProductsWithOrderID($orderID);
?>
    <table>
        <tr>
            <th>Bestellingnummer</th>
            <th>Naam</th>
            <th>Personeel</th>
            <th>Bestelling Tijd</th>
            <th>Status</th>
            <th>Address</th>
        </tr>
        <tr>
            <td><?= $order[0]['order_id'] ?></td>
            <td><?= $order[0]['client_name'] ?></td>
            <td><?= $order[0]['personnel_username'] ?></td>
            <td><?= $order[0]['datetime'] ?></td>
            <td><?= $order[0]['status'] ?></td>
            <td><?= $order[0]['address'] ?></td>
        </tr>
        <tr>
            <th>Product</th>
            <th>Aantal</th>
        </tr>
        <?php
        foreach ($order as $product) {
            ?>
            <tr>
                <td><?= $product['product_name'] ?></td>
                <td><?= $product['quantity'] ?></td>
            </tr>
        <?php } ?>
    </table>
    <?php
}
include_once ("components/footer.php");
?>