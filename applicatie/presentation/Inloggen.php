<?php
include_once("util/head.php");
if (isset($_SESSION['username'])) {
    header("Location: localhost:8080");
    exit();
}
include_once ("application/Inloggen.php");
