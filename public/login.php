<?php
require __DIR__ . '/../src/bootstrap.php';
require __DIR__ . '/../src/user/login.php';

?>
<?php view('header', ['title' => 'Login']) ?>
<style>
    form {
        border: 1px solid #ddd;
        max-width: 400px;
        width: 100%;
        box-sizing: border-box;
        background-color: #fff;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    label {
        display: block;
        margin-bottom: 5px;
    }
</style>

    <div class="container-fluid">
        <div class="row" style="margin-top: 3%; margin-bottom: 3%;">
            <div class="col-md-6 col-md-offset-3">
                <div id="content-wrap">
                    <form action="../src/user/login.php" method="post" style="display: block; margin-left: auto; margin-right: auto;">
                        <h1 class="text-center">Login</h1>
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" name="username" id="username" class="form-input text-center">
                        </div>

                        <div class="form-group">
                            <label for="password" style="padding-top: 20px;">Password:</label>
                            <input type="password" name="password" id="password" class="form-input text-center">
                        </div>
                        <div class="form-group" style="padding-top: 2%;">
                            <button type="submit" class="mt-2">Login</button>
                            <a href="register.php" class="styled-link mt-2">Register</a>
                            <a href="enter_email.php" class="styled-link mt-2">Forgot your password?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php view('footer') ?>