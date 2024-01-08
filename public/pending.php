<?php
require __DIR__ . '/../src/bootstrap.php';

?>

<?php view('header', ['title' => 'Email was sent successfully']); ?>

<form class="login-form" action="" method="post" style="text-align: center;">
    <?php display_all_flash_messages(); ?>
    <p>
                We sent an email to <b><?php echo $_GET['email'] ?></b> to help you recover your account.
    </p>
    <p>Please login into your email account and click on the link we sent to reset your password.</p>
</form>

<?php view('footer') ?>