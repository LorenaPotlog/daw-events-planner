<?php
require __DIR__ . '/../src/bootstrap.php';
require __DIR__ . '/../src/contact.php';

?>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>


<?php view('header', ['title' => 'Contact us']); ?>
    <style>
        #page-container {
            position: relative;
            min-height: 66vh;
        }
        #content-wrap {
            padding-bottom: 2.5rem; /* Footer height */
        }
    </style>
    <div id="page-container">
        <div id="content-wrap">
    <form method="post" action="../src/contact.php">
        <h2>Contact us</h2>

        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" required><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>

        <label for="message">Message:</label><br>
        <textarea id="message" name="message" required></textarea><br>

        <div class="form-input">
            <!-- Google reCAPTCHA box -->
            <div class="g-recaptcha" data-sitekey="<?php echo $siteKey; ?>"></div>
        </div>

        <input type="submit" value="Submit">
    </form>
        </div></div>

<?php view('footer') ?>