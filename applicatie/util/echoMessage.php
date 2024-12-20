<?php
//de explode is zodat er meerdere messages displayed kunnen worden; de message worden seperated met een ;

if (isset($_GET['msg'])) {
    $messages = explode(';', htmlspecialchars($_GET['msg']));
    foreach ($messages as $message) {
        echo '<b>';
        echo $message . "<br>";
        echo '</b>';
    }
}
