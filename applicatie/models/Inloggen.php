<?php

function getHashedPassword($username)
{
    $query = "SELECT [password] AS hashedPassword FROM [User] WHERE [username] = :username";
    $dbh = maakVerbinding();
    $sth = $dbh->prepare($query);
    $sth->execute(array(":username" => $username));
    return $sth->fetch(PDO::FETCH_ASSOC);
}

function addLoginAttempt($username, $password, $ip)
{
    $query = "INSERT INTO [LoginAttempt]([ip], [datetime], [username], [password])
              VALUES(:ip, CURRENT_TIMESTAMP, :username, :password)";
    $dbh = maakVerbinding();
    $sth = $dbh->prepare($query);
    $sth->execute(array(":username" => $username, ":password" => $password, ":ip" => $ip));
}

function getLoginAttempts($ip)
{
    $query = "SELECT count([ip]) AS attempts FROM [LoginAttempt]
              WHERE DATEDIFF(hour, [datetime], CURRENT_TIMESTAMP) < 1 AND [ip] = :ip";
    $dbh = maakVerbinding();
    $sth = $dbh->prepare($query);
    $sth->execute(array(":ip" => $ip));
    return $sth->fetch(PDO::FETCH_ASSOC);
}
