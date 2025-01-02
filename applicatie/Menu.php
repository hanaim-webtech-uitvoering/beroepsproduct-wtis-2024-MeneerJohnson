<?php
include_once("util/db_connectie.php");
include_once("util/head.php");
include_once("components/header.php");
include_once("models/Menu.php");

$menuItems = getMenuItems();

include_once("util/echoMessage.php");

$groupedMenuItems = [];
foreach ($menuItems as $menuItem) {
    $groupedMenuItems[$menuItem['type_id']][] = $menuItem;
}
?>
<div>
    <form action="PRG/MenuPRG.php" method="post">

        <?php foreach ($groupedMenuItems as $type => $menuItems) { ?>
            <div>
                <h2><?php echo htmlspecialchars($type); ?></h2>
                <ul>
                    <?php foreach ($menuItems as $menuItem) { ?>
                        <li>
                            <strong><?php echo htmlspecialchars($menuItem['name']); ?></strong><br>
                            Price: €<?php echo htmlspecialchars($menuItem['price']); ?>
                            <input type="number" name=<?= str_replace(" ", "", $menuItem['name']) ?>> <!-- Aangezien de key van $_POST maar 1 woord kan zijn; replace alle spaties met niks -->
                        </li>
                    <?php } ?>
                </ul>

            </div>
        <?php } ?>
        <button type="submit" name="product">Toevoegen aan winkelwagen</button>
        <form>
</div>
<?php
include_once("components/footer.php");
