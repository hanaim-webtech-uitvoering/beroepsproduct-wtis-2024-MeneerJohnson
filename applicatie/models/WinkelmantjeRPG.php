<?php
function getNameOfMenuItems()
{
  $dbh = maakVerbinding();
  $query = "SELECT  [name]
              FROM [pizzeria].[dbo].[Product]";
  $sth = $dbh->prepare($query);
  $sth->execute();
  return $sth->fetchAll(PDO::FETCH_ASSOC);
}


function addOrder($username, $name, $address)
{
  $dbh = maakVerbinding();
  $query = "INSERT INTO Pizza_Order(client_username, client_name, personnel_username, [datetime], [status], [address])
            VALUES(:username, :name, 
            (SELECT TOP 1 username FROM [User]
             WHERE role = 'Personnel'
             ORDER BY NEWID()
             ), GETDATE(), 1, :address)";
  $sth = $dbh->prepare($query);
  $sth->execute(array(':username' => $username, ":name" => $name, ":address" => $address));
}
function addOrderProducts($products)
{
  $dbh = maakVerbinding();
  $query = "INSERT INTO Pizza_Order_Product(order_id, product_name, quantity)
            VALUES((SELECT TOP 1 order_id FROM Pizza_Order order by order_id desc), :productName, :quantity)";
  $sth = $dbh->prepare($query);
  foreach ($products as $product) {
    $sth->execute(array(":productName" => $product['name'], ":quantity" => $product['quantity']));
  }
}





