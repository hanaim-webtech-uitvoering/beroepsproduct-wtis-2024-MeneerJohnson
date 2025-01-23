<?php
include_once ("components/header.php");
?>

<form method="post" action="prg/RegistratiePRG.php">

    <?php
    foreach ($inputElements as $inputElement) {
        ?>
        <label for=<?= $inputElement ?>> <?= $inputElement ?></label><br>
        <input type='text' name=<?= $inputElement ?>  id= <?= $inputElement ?>><br>
        <?php
    }
    ?>
    <button type="submit">Registreer</button>
</form>
<?php
include_once("util/echoMessage.php");
include_once("components/footer.php");
