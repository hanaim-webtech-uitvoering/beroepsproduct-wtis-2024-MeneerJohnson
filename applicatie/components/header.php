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
        ?>
    </ol>
</header>