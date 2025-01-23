<?php
include_once ("components/header.php");
?>

<table>
    <tr>
        <th>Naam</th>
        <th>Prijs</th>
        <th>Aantal</th>
    </tr>
    <?php
    $totaleKosten = 0;
    foreach ($cartItems as $cardItem) {
        $totaleKosten += ($cardItem['price'] * $cardItem['amount']);
        echo '<tr><td>' . $cardItem['name'] . '</td><td> ' . $cardItem['price'] . ' </td><td> ' . $cardItem['amount'] . ' </td></tr>';
    }
    ?>
</table>
<?php
echo '<br>Totale kosten: $' . $totaleKosten;
?>
<br>
<form action="http://localhost:8080/PRG/WinkelmantjePRG.php" method="post">
    <label for="address">Address:</label>
    <input type="text" name="address" id="address" value=<?= $address ?>><br>
    <?php
    if (!isset($_SESSION['username'])) { ?>
        <label for="naam">Naam:</label>
        <input type="text" id="naam" name="naam">
        <br>
    <?php } else {
        ?>
        <input type="hidden" name="username" value=<?= $_SESSION['username'] ?>>
        <?php
    } ?>
    <button type="submit">Bestellen</button>
</form>
<?php
include_once("components/footer.php");
