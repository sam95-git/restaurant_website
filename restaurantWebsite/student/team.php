<?php
define('TITLE', "Team | Sam's Fine Dining");
include('includes/header.php');
?>

<div id="team-members" class="cf">

    <h1>Our Team at sam's</h1>
    <p>We're small, but mighty, Sam's fine dining has been a family-owned and run business since the 90's and we're proud of it! when
        you get these three together , you never know what can happen. But you can count on one thing:
        <strong>The best food you've ever had. Ever.</strong>
    </p>

    <hr>
    <?php
    foreach ($teamMembers as $member) { ?>

        <div class="member">
            <img src="img/<?php echo $member['img']; ?>.png" alt="<?php echo $member['name']; ?>">
            <h2><?php echo $member['name']; ?></h2>
            <p><?php echo $member['bio']; ?></p>
        </div><!-- member -->

    <?php   } ?>

</div> <!-- team-members -->

<hr>

<?php include('includes/footer.php'); ?>