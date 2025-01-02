<?php
include_once("util/head.php");
include_once("util/util.php");
include_once('components/header.php');
$inputElements = array("username", "firstname", "lastname", "adres", "password");
if (isset($_SESSION['username'])) {
    header("Location: http://localhost:8080/");
}
?>



<form method="post" action="prg/RegistratiePRG.php">

    <?php
    foreach ($inputElements as $inputElement) {
        echo "<label for='" . $inputElement . "'>" . $inputElement . "</label><br>";
        echo "<input type='text' name='" . $inputElement . "' id='" . $inputElement . "'><br>";
    }
    ?>
    <button type="submit">Registreer</button>
</form>
<?php
include_once("util/echoMessage.php");
?>