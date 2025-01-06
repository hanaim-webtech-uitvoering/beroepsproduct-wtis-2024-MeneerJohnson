<?php

function getAllRunningOrders()
{
    $dbh = maakVerbinding();
    $query = "SELECT pop.[order_id], pop.[product_name], pop.[quantity], po.[datetime], po.[status]
              FROM Pizza_Order AS po INNER JOIN Pizza_Order_Product AS pop ON po.order_id = pop.order_id
              WHERE NOT po.[status] = 3
			  ORDER BY order_id asc";
    $sth = $dbh->prepare($query);
    $sth->execute();
    return $sth->fetchAll(PDO::FETCH_ASSOC);
}
