<?php



$headerItems = array("Menu", "Profiel", "Winkelmantje", "Registratie");
?>

<header>
    <ol>
        <?php
        foreach ($headerItems as $headerItem) {
            echo ("
    <li>
        <a href='" . $headerItem . ".php'>" . $headerItem . "</a>
    </li>
        ");
        }
        if (isset($_SESSION['username'])) {
            echo "Hallo, " .  htmlspecialchars($_SESSION['username']);
            echo '<br><a href="http://localhost:8080/loguit.php">Loguit</a>';
        } else {
            echo "<a href='http://localhost:8080/Inloggen.php'>Inloggen</a>";
        }
        ?>
    </ol>
</header>