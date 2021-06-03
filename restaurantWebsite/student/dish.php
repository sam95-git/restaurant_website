<?php
define("TITLE", "Menu item| Sam's Dining");
include('includes/header.php');

//function to strip bad characters to prevent header injection from hackers
function strip_bad_chars($input)
{
    $output = preg_replace("/[^a-zA-Z0-9_-]/", "", $input);
    return $output;
}

//calculate a suggested tip'

function suggestedTip($price, $tip)
{
    $totalTip = $price * $tip;
    echo  $totalTip;
}

if (isset($_GET['item'])) {
    $menuItem = strip_bad_chars($_GET['item']);
    $dish = $menuItems[$menuItem];
}

?>

<hr>
<div id="dish">
    <h1><?php echo $dish['title']; ?><span class="price"><sup>$</sup><?php echo $dish['price']; ?>
        </span> </h1>
    <p><?php echo $dish['blurb']; ?></p>

    <br>

    <p><strong>Suggested Beverage: <?php echo $dish['drink']; ?></strong></p>
    <p>Suggested Tip: <?php suggestedTip($dish['price'], 0.20); ?> </p>
</div> <!-- dish-->

<hr>

<a href="menu.php" class="button previous">&laquo; Back to Menu</a>

<?php include('includes/footer.php'); ?>