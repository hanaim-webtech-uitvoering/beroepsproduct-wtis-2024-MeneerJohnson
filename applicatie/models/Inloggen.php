<?php
include_once("../util/db_connectie.php");

function getHashedPassword($username)
{
    $query = "SELECT [password] AS hashedPassword FROM [User] WHERE [username] = :username";
    $dbh = maakVerbinding();
    $sth = $dbh->prepare($query);
    $sth->execute(array(":username" => $username));
    return $sth->fetch(PDO::FETCH_ASSOC);
}
