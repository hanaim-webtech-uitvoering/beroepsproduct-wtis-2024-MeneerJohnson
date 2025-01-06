<?php
function changeOrdersStatus($orders)
{
    $dbh = maakVerbinding();
    $query = "UPDATE Pizza_Order
              SET [status] = :status
              WHERE [order_id] = :order_id";
    $sth = $dbh->prepare($query);
    foreach ($orders as $order) {
        $sth->execute(array(":status" => $order['status'], ":order_id" => $order['order_id']));
    }
}
