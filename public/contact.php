<?php
require __DIR__ . '/../src/bootstrap.php';
require __DIR__ . '/../src/contact.php';

?>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>


<?php view('header', ['title' => 'Contact us']); ?>
    <style>
        #page-container {
            position: relative;
            margin-bottom: 50px;
            margin-left: 600px;
            width: 100%;
        }

    </style>

    <div id="page-container">
        <h3 style="margin-left: 180px; font-family: 'Ubuntu', cursive;">Contact us</h3>
            <div style="text-align: left; margin-left: 0; padding: 15px; width: 30%; background-color: rgba(227, 224, 204, 0.3); ">
                <form method="post" action="../src/contact.php">
                    <label for="name" style="font-family: 'Ubuntu', cursive;">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" required
                           style="background-color:rgba(197, 213, 197, 0.6);  font-family: 'Ubuntu', cursive;"><br>

                    <label for="email" style="font-family: 'Ubuntu', cursive;">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" required
                           style="background-color: rgba(197, 213, 197, 0.6);  font-family: 'Ubuntu', cursive;"><br>

                    <label for="message" style="font-family: 'Ubuntu', cursive;">How can we help you?</label>
                    <textarea class="form-control" id="message" name="message" required
                              style="background-color:rgba(197, 213, 197, 0.6);  font-family: 'Ubuntu', cursive;"></textarea><br>

                    <div class="form-input">
                        <!-- Google reCAPTCHA box -->
                        <div class="g-recaptcha" data-sitekey="<?php echo $siteKey; ?>"></div>
                    </div>

                    <button type="submit" class="btn btn-primary"
                            style="background-color: rgba(197, 213, 197, 0.6); color: black; font-family: 'Ubuntu', cursive;">
                        Tell us about your event
                    </button>
                </form>
            </div>
    </div>

<?php view('footer') ?>