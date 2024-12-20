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
