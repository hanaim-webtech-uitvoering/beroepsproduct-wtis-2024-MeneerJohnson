<?php
include_once("util/head.php");
include_once("components/header.php");
include_once("models/Menu.php");

$menuItems = getMenuItems();


$groupedMenuItems = [];
foreach ($menuItems as $menuItem) {
    $groupedMenuItems[$menuItem['type_id']][] = $menuItem;
}

if (isset($_POST['product'])) {
    if (!isset($_SESSION['winkelwagen'])) {
        $_SESSION['winkelwagen'] = [];
    }
    array_push($_SESSION['winkelwagen'], $_POST['product']);
}





?>

<div>
    <?php foreach ($groupedMenuItems as $type => $menuItems) { ?>
        <div>
            <h2><?php echo htmlspecialchars($type); ?></h2>
            <ul>
                <?php foreach ($menuItems as $menuItem) { ?>
                    <li>
                        <form action="Menu.php" method="post">
                            <button type="submit" value=<?= $menuItem['name'] ?> name="product">
                                <strong><?php echo htmlspecialchars($menuItem['name']); ?></strong><br>
                                Price: €<?php echo htmlspecialchars($menuItem['price']); ?>
                            </button>
                            <form>
                    </li>
                <?php } ?>
            </ul>
        </div>
    <?php } ?>
</div>



<!-- 
 <?php
    foreach ($menuItems as $menuItem) {
        echo ("<section><p>" . $menuItem['name'] . "<br>" . $menuItem['price'] . "</p></section>");
    }


    ?> -->



<?php
include_once("components/footer.php");
