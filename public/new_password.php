<?php
require __DIR__ . '/../src/bootstrap.php';
require __DIR__ . '/../src/enter_email.php';

//TODO: find a better way to get token
?>
<?php view('header', ['title' => 'Password reset']) ?>

<form class="login-form" action="../src/enter_email.php" method="post">
    <input type="hidden" name="token" value="<?php echo htmlspecialchars($_GET['token']); ?>">
    <h2 class="form-title">New password</h2>
    <div class="form-group">
        <label>New password</label>
        <input type="password" name="new_pass">
    </div>
    <div class="form-group">
        <label>Confirm new password</label>
        <input type="password" name="new_pass_c">
    </div>
    <div class="form-group">
        <button type="submit" name="new_password" class="login-btn">Submit</button>
    </div>
</form>
<?php view('footer') ?>