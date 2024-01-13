<?php
require __DIR__ . '/../src/bootstrap.php';
require __DIR__ . '/../src/contact.php';

?>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<?php view('header', ['title' => 'Contact us']); ?>

<div class="container-fluid" style="margin-bottom: 5%">
    <div class="row">
        <div class="col-md-6">
            <h3 class="text-center" style=" ">Contact us</h3>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <form method="post" action="../src/contact.php">
                            <label for="name" style=" ">Name:</label>
                            <input type="text" class="form-input" id="name" name="name" required><br>

                            <label for="email" style=" ">Email:</label>
                            <input type="email" class="form-input" id="email" name="email" required
                                   ><br>

                            <label for="message">How can we help you?</label>
                            <textarea class="form-input" id="message" name="message" required
                                      ></textarea><br>

                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-10">
                                        <div  style="padding: 4%;">
                                            <!-- Google reCAPTCHA box -->
                                            <div class="g-recaptcha"
                                                 data-sitekey="<?php echo $siteKey; ?>"></div>
                                        </div>
                                    </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="button">
                                    Tell us about your event
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php view('footer') ?>

