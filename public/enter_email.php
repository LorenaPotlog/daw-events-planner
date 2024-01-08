<?php
require __DIR__ . '/../src/bootstrap.php';
require __DIR__ . '/../src/enter_email.php';


?>
<?php view('header', ['title' => 'Password reset']) ?>
<form class="login-form" action="../src/enter_email.php" method="post">
    <h2 class="form-title">Reset password</h2>
    <div class="form-group">
        <label>Your email address</label>
        <input type="email" name="email">
    </div>
    <div class="form-group">
        <button type="submit" name="reset-password" class="login-btn">Submit</button>
    </div>
</form>
<?php view('footer') ?>