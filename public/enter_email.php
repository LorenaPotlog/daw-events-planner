<?php
require __DIR__ . '/../src/bootstrap.php';
require __DIR__ . '/../src/user/enter_email.php';
?>
<?php view('header', ['title' => 'Password reset']) ?>
    <style>
        <?php include 'css/new_pass.css' ?>
        form {
            margin :10% auto;
        }
    </style>
    <div id="page-container">
        <div id="content-wrap">
            <form class="login-form" action="../src/user/enter_email.php" method="post">
                <h2 class="form-title">Reset password</h2>
                <div class="form-group">
                    <label>Your email address</label>
                    <input type="email" name="email">
                </div>
                <div class="form-group">
                    <button type="submit" name="reset-password">Submit</button>
                </div>
            </form>
        </div>
    </div>

<?php view('footer') ?>