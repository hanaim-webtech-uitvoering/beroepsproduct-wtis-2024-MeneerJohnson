<?php
include_once("../util/db_connectie.php");


function makeAccount($username, $firstname, $lastname, $adres, $password)
{
    $dbh = maakVerbinding();
    $query = "INSERT INTO [User]([username], [password], [first_name], [last_name], [address], [role])
                VALUES(:username, :password, :firstname, :lastname, :address, 'Client')";
    $sth = $dbh->prepare($query);
    $sth->execute(array(":username" => $username, ":firstname" => $firstname, ":lastname" => $lastname, "address" => $adres, ":password" => $password));
}

function accountExisits($username)
{
    $dbh = maakVerbinding();
    $query = "SELECT count([username]) AS doesExist
              FROM [User]
              WHERE username = :username";
    $sth = $dbh->prepare($query);
    $sth->execute(array(":username" => $username));
    return $sth->fetch(PDO::FETCH_ASSOC);
}
