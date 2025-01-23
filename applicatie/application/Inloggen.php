<?php
include_once("components/header.php");
?>

<Form method="POST" action="http://localhost:8080/PRG/InloggenPRG.php">
    <label for="username">Username:</label><br><input type="text" name="username" id="username"><br>
    <label for="password">Wachtwoord:</label><br><input type="password" id="password" name="password"><br>
    <button type="submit">Log in</button>
</Form>
<b>
    <?php
    include_once("util/echoMessage.php");
    ?>
</b>
<?php
include_once("components/footer.php");
