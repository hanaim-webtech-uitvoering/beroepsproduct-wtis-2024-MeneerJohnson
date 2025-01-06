<?php
function getProductPrice($id)
{
  $dbh = maakVerbinding();
  $query = 'SELECT price FROM Product WHERE name LIKE :id';
  $sth = $dbh->prepare($query);
  $sth->execute(array(':id' => '%' . $id . '%'));
  return $sth->fetch(PDO::FETCH_ASSOC);
}
function getNameOfMenuItems()
{
  $dbh = maakVerbinding();
  $query = "SELECT  [name]
  FROM [pizzeria].[dbo].[Product]";
  $sth = $dbh->prepare($query);
  $sth->execute();
  return $sth->fetchAll(PDO::FETCH_ASSOC);
}
