<?php
include_once('components/header.php');
?>
<form method="POST" action="http://localhost:8080/PRG/BestellingoverzichtPRG.php">
    <?php
    foreach ($groupedItems as $type => $runningOrders) {
        echo $type;
    ?>
        <table>
            <tr>
                <th>Productnaam</th>
                <th>Aantal</th>
            </tr>
            <?php
            foreach ($runningOrders as $singleItem) {
                $status = htmlspecialchars($singleItem['status']);
            ?>
                <tr>
                    <td> <?= htmlspecialchars($singleItem['product_name']) ?></td>
                    <td> <?= htmlspecialchars($singleItem['quantity']) ?> </td>
                </tr>
            <?php
            }
            ?>
        </table>
        <br>
        <b>
            <label for=<?= $singleItem['order_id'] ?>>Status van bestelling:</label>
            <select id=<?= $singleItem['order_id'] ?> name=<?= $singleItem['order_id'] ?>>
        </b>
        <?php
        foreach ($options as $option) {
        ?>
            <option value=<?= $option ?>
                <?php if ($option == $singleItem['status']) {
                    echo "selected";
                } ?>> <?= $option ?>
            </option>
        <?php
        }
        ?>
        </select>
        <button type="submit">Weizig</button>

    <?php
    }

    ?>
</form>

<?php
include_once ("components/footer.php");