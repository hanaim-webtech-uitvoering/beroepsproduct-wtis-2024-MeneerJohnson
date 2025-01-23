<?php
include_once("util/head.php");
include_once("util/util.php");
$inputElements = array("username", "firstname", "lastname", "adres", "password");
if (isset($_SESSION['username'])) {
    header("Location: http://localhost:8080/");
    exit();
}
include_once ("application/Registratie.php");