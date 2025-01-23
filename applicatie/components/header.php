<?php
include_once("util/head.php");
include_once("models/util.php");
$headerItems = array("Menu", "Winkelmantje");
?>
<header>
    <ol>
        <?php
        foreach ($headerItems as $headerItem) {
            echo ("
        <li>
        <a href='" . $headerItem . ".php'>" . $headerItem . "</a>
        </li>");
        }
        if (isset($_SESSION['username'])) {
            if (getIsUserAdmin($_SESSION['username'])['isAdmin']) {
        ?>
                <li><a href="http://localhost:8080/Bestellingoverzicht.php">Overzicht</a></li>
                <li><a href="http://localhost:8080/BestellingSpecificaties.php">Specificaties</a></li>

            <?php
            }
            ?>
            <?php echo "Hallo, " . htmlspecialchars($_SESSION['username']); ?>
            <br><a href="http://localhost:8080/Profiel.php">Profiel</a>
            <br><a href="http://localhost:8080/loguit.php">Loguit</a>
        <?php
        } else {
        ?><li><a href='http://localhost:8080/Inloggen.php'>Inloggen</a></li>
            <li><a href="http://localhost:8080/Registratie.php">Registreren</a></li>
        <?php
        }
        ?>
    </ol>
</header>