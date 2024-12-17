<?php
include_once('util/db_connectie.php');
function getProductDetails($id)
{
    $dbh = maakVerbinding();
    $query = 'SELECT name, price FROM Product WHERE name LIKE :id';
    $sth = $dbh->prepare($query);
    $sth->execute(array(':id' => '%' . $id . '%'));
    return $sth->fetch(PDO::FETCH_ASSOC);
}
