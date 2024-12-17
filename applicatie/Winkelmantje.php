<?php


include_once("util/head.php");
include_once("components/header.php");
include_once("models/Winkelmantje.php");

$errors = [];
$cartItems = [];

if (isset($_SESSION['winkelwagen'])) {
    $fetchedItems = [];
    foreach ($_SESSION['winkelwagen'] as $id) {
        array_push($fetchedItems, getProductDetails($id));
    }

    foreach ($fetchedItems as $fetchedItem) {
        if (!in_array(array("name" => $fetchedItem['name'], 'price' => $fetchedItem['price'], 'amount' => array_count_values(getNamesFromCartItems($fetchedItems))[$fetchedItem['name']]), $cartItems)) {
            array_push($cartItems, array("name" => $fetchedItem['name'], 'price' => $fetchedItem['price'], 'amount' => array_count_values(getNamesFromCartItems($fetchedItems))[$fetchedItem['name']]));
        }
    }
}
function getNamesFromCartItems($cartItems)
{
    $array = [];
    foreach ($cartItems as $cardItem) {
        array_push($array, $cardItem['name']);
    }
    return $array;
}

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
<button type="submit" action="betaal.php">Bestellen
</button>