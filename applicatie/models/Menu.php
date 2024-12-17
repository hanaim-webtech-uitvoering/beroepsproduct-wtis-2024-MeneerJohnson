<?php
include_once("util/db_connectie.php");

function getMenuItems()
{
  $dbh = maakVerbinding();
  $query = "SELECT  [name]
      ,[price]
      ,[type_id]
  FROM [pizzeria].[dbo].[Product]";
  $sth = $dbh->prepare($query);
  $sth->execute();
  return $sth->fetchAll(PDO::FETCH_ASSOC);
}
