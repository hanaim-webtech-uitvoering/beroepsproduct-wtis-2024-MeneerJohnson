<?php
include_once("util/db_connectie.php");
include_once("models/util.php");
include_once("models/BestellingSpecificaties.php");
include_once("util/head.php");

if (!getIsUserAdmin($_SESSION['username'])['isAdmin']) {
    header("Location: http://localhost:8080/");
    exit();
}

include_once ("application/BestellingSpecificaties.php");
