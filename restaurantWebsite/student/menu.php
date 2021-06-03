<?php
define("TITLE", "Menu | Sam's dining");
include('includes/header.php');
?>

<div id="menu-items">

    <h1>Our Delicious Menu</h1>
    <p>Like our team, our menu is small &mdash; but that doesn't stop us from providing delicious food </p>
    <p><em>Click any menu item below to know more about it.</em></p>

    <hr>
    <?php foreach ($menuItems as $dish => $item) { ?>
        <ul>
            <li><a href="dish.php?item=<?php echo $dish; ?>"><?php echo $item['title']; ?></a><?php echo $item['price'] . "-$"; ?></li>
        </ul>
    <?php } ?>

</div><!-- menu-items-->


<?php
include('includes/footer.php');
?>