<?php
include_once("../util/head.php");
include_once("../models/Registreren.php");

$errors = '';

$username = ($_POST['username']);
$firstname = ($_POST['firstname']);
$lastname = ($_POST['lastname']);
$password = ($_POST['password']);
$adres = ($_POST['adres']);



if (empty($username) || empty($firstname) || empty($lastname) || empty($password)) {
    $errors .= 'Vul aub alle waarden in;';
}
if (strlen($password) < 7) {
    $errors .= 'Wachtwoord moet minimaal 7 karakters bevatten;';
}



if ($errors == '') {
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    try {
        if (!accountExisits($username)['doesExist']) {
            makeAccount($username, $firstname, $lastname, $adres, $hashedPassword);
            $_SESSION['username'] = $username;
            header("Location: http://localhost:8080");
        } else {
            header("Location: http://localhost:8080/Registratie.php?msg=Dit+account+bestaat+al");
        }
    } catch (error) {
        header("Location: http://localhost:8080/Registratie.php?msg=Er+ging+iets+fout,+probeer+het+later+opniew");
    }
} else {
    header("Location: http://localhost:8080/Registratie.php?msg=" . $errors);
}
