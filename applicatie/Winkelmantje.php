<?php
include_once("util/head.php");
include_once("components/header.php");
include_once("models/Winkelmantje.php");

$errors = [];
$namesOfProductsInCart = getProductsInCart(getNameOfMenuItems());
$cartItems = getAllDetailsOfCartItem($namesOfProductsInCart);

function getProductsInCart($existingProducts)
{
    $tempArray = [];
    foreach ($existingProducts as $existingProduct) {

        if (isset($_SESSION[$existingProduct['name']])) {
            array_push($tempArray, $existingProduct['name']);
        }
    }
    return $tempArray;
}

function getAllDetailsOfCartItem($namesOfProductsInCart)
{
    $tempArray = [];
    foreach ($namesOfProductsInCart as $nameOfProductInCart) {
        $temp = ['name' => $nameOfProductInCart, 'amount' => $_SESSION[$nameOfProductInCart], 'price' => getProductPrice($nameOfProductInCart)['price']];
        array_push($tempArray, $temp);
    }
    return $tempArray;
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
<form action="http://localhost/WinkelmantjePRG.php" method="post">
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