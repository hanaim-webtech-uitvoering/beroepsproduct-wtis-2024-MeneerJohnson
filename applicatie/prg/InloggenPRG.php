<?php
include_once("../models/Inloggen.php");
include_once("../util/head.php");
include_once("../util/db_connectie.php");

if (!isset($_POST['username']) || !isset($_POST['password']) || isset($_SESSION['username'])) {
    header("Location: http://localhost:8080/Inloggen.php");
}
$password = $_POST['password'];
$username = $_POST['username'];

$hashedPassword = getHashedPassword($username)['hashedPassword'];
if (password_verify($password, $hashedPassword)) {
    $_SESSION['username'] = $username;
    header("Location: http://localhost:8080");
} else {
    header("Location: http://localhost:8080/Inloggen.php?msg=Inloggegevens+zijn+incorrect;");
}
