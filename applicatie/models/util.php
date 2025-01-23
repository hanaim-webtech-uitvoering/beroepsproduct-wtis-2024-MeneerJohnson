<?php
function getUserData($username)
{
    $query = "SELECT [username], [address], [first_name], [last_name]
              FROM [User]
              WHERE [username] = :username";
    $dbh = maakVerbinding();
    $sth = $dbh->prepare($query);
    $sth->execute(array(":username" => $username));
    return $sth->fetch(PDO::FETCH_ASSOC);
}

function getIsUserAdmin($username)
{
    $query = "SELECT COUNT([username]) AS isAdmin
              FROM [User]
              WHERE [username] = :username AND [role] = 'Personnel'";
    $dbh = maakVerbinding();
    $sth = $dbh->prepare($query);
    $sth->execute(array(":username" => $username));
    return $sth->fetch(PDO::FETCH_ASSOC);
}
