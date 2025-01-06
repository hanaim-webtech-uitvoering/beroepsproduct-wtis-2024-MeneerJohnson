<?php

function getCompletedHistoryItems($username)
{
    $dbh = maakVerbinding();
    $query = "SELECT pop.order_id, pop.[product_name], pop.[quantity], po.[datetime]
              FROM Pizza_Order AS po INNER JOIN Pizza_Order_Product AS pop ON po.order_id = pop.order_id
              WHERE po.client_username = :username AND po.[status] = 3
				ORDER BY order_id asc";
    $sth = $dbh->prepare($query);
    $sth->execute(array(":username" => $username));
    return $sth->fetchAll(PDO::FETCH_ASSOC);
}

function getRunningOrders($username)
{
    $dbh = maakVerbinding();
    $query = "SELECT pop.order_id, pop.[product_name], pop.[quantity], po.[datetime], po.[status]
              FROM Pizza_Order AS po INNER JOIN Pizza_Order_Product AS pop ON po.order_id = pop.order_id
              WHERE po.client_username = :username AND NOT po.[status] = 3
			  ORDER BY order_id asc";
    $sth = $dbh->prepare($query);
    $sth->execute(array(":username" => $username));
    return $sth->fetchAll(PDO::FETCH_ASSOC);
}
