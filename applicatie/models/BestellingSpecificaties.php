<?php

function getProductsWithOrderID($orderID)
{
    $dbh = maakVerbinding();
    $query = "SELECT PO.order_id, PO.client_name, PO.personnel_username, PO.[datetime], PO.[status], PO.[address], POP.product_name, POP.quantity
              FROM Pizza_Order PO INNER JOIN Pizza_Order_Product POP ON PO.order_id = POP.order_id
              WHERE PO.order_id = :orderID";
    $sth = $dbh->prepare($query);
    $sth->execute(array("orderID" => $orderID));
    return $sth->fetchAll(PDO::FETCH_ASSOC);
}
