<?php
include_once('util/db_connectie.php');

function placeOrder($products)
{
    $dbh = maakVerbinding();
    $query = "INSERT INTO ";
    $sth = $dbh->prepare($query);
    $sth->execute(array());
}
