<?php
include_once("../models/Registreren.php");

$errors = '';

$username = htmlspecialchars($_POST['username']);
$firstname = htmlspecialchars($_POST['firstname']);
$lastname = htmlspecialchars($_POST['lastname']);
$password = htmlspecialchars($_POST['password']);
$adres = htmlspecialchars($_POST['adres']);



if (empty($username) || empty($firstname) || empty($lastname) || empty($password)) {
    $errors += 'Vul aub alle waarden in;';
}
if (strlen($password) < 7) {
    $errors += 'Wachtwoord moet minimaal 7 karakters bevatten;';
};
if (!str_contains($password, '1')) {
    $errors += 'Wachtwoord moet minimaal een van de volgende karakters bevatten;';
} // voeg hier meer shit aan toe


var_dump($errors);

if ($errors == '') {
    try {
        makeAccount($username, $firstname, $lastname, $adres, $password);
    } catch (error) {
        header("Location: localhost:8080/Registreren.php?msg=Er+ging+iets+fout,+probeer+het+later+opniew");
    }
    $_SESSION['username'] = $username;
    header("Location: localhost:8080");
} else {
    header("Location: localhost:8080/Registreren.php?msg=" . $errors);
}
