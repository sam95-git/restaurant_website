<?php
define("TITLE", "Contact| Sam's fine dining");

include('includes/header.php');
?>

<div id="contact ">
    <hr>
    <h1>Get in touch with us!</h1>
    <?php
    //function to prevent header injection
    function has_header_injection($str)
    {
        return preg_replace("/[\r\n]/", "", $str);
    }

    if (isset($_POST['contact_submit'])) {

        $name = trim($_POST['name']);
        $email = trim($_POST['email']);
        $msg = trim($_POST['message']);

        //check for header injection in email and name.
        if (has_header_injection($name) || has_header_injection($email)) {
            die(); //if there is header injection in name or email field kill the script
        }

        //check for empty fields
        if (!$name || !$email || !$msg) {
            echo '<h4 class="error">All fields required.</h4><a href="contact.php" class="button block">Go back and try again</a>';
            exit();
        }
        //add the recipient email to a variable
        $to = "sabari.mathi05@gmail.com";
        //create a subject
        $subject = "$name send you a message via your contact form";

        // construct the message
        $message = "Name: $name\r\n";
        $message .= "Email: $email\r\n";
        $message .= "Message\r\n$msg";

        //check if subscribe checkbox is checked
        if (isset($_POST['subscribe']) && $_POST['subscribe'] == 'Subscribe') {

            //add a new line to the message
            $message .= "\r\n\r\nPlease add $email to the mailing list.\r\n";
        }
        $message = wordwrap($message, 72);

        //set the mail headers into a variable.
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
        $headers .= "Form: $name <$email>\r\n";
        $headers .= "X-Priority: 1\r\n";
        $headers .= "X-MSMail-Priority: High\r\n\r\n";
        //sent the mail
        mail($to, $subject, $message, $headers);
    ?>
        <!-- show success message after email has sent-->
        <h5>Thanks for contacting Sam's</h5>
        <p>please allow 24 hrs for a response</p>
        <p><a href="/final" class="button block">&laquo; Go to home page</a></p>

    <?php } else { ?>

        <form action="" method="POST">
            <label for="name">Your Name:</label>
            <input type="text" name="name" id="name">

            <label for="email">Your Email:</label>
            <input type="email" name="email" id="email">

            <label for="message">Your Message:</label>
            <textarea name="message" id="message"></textarea>

            <input type="checkbox" name="subscribe" id="subscribe" value="Subscribe">
            <label for="subscribe">Subscribe to newsletter</label>

            <input type="submit" class="button next" value="Send Message" name="contact_submit">

        </form>
    <?php } ?>

</div> <!-- contact -->


<?php
include('includes/footer.php');
?>