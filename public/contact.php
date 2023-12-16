<?php
require __DIR__ . '/../src/bootstrap.php';
require __DIR__ . '/../src/contact.php';

?>

<?php view('header', ['title' => 'Contact us']); ?>
    <form method="post" action="../src/contact.php">
        <h2>Contact us</h2>

        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" required><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>

        <label for="message">Message:</label><br>
        <textarea id="message" name="message" required></textarea><br>

        <!-- Your reCAPTCHA here -->
<!--        <div class="g-recaptcha" data-sitekey="YOUR_SITE_KEY"></div><br>-->

        <input type="submit" value="Submit">
    </form>

<?php view('footer') ?>