<?php
require __DIR__ . '/../src/bootstrap.php';
require __DIR__ . '/../src/user/register.php';
?>

<?php view('header', ['title' => 'Register']); ?>
<style>
    form {
        background-color: #fff;
        border: 1px solid #ddd;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        max-width: 400px;
        width: 100%;
        box-sizing: border-box;
        margin-left: auto;
        margin-right: auto;
        margin-bottom: 3%;
    }
</style>
    <div id="page-container">
        <div id="content-wrap">
            <form action="../src/user/register.php" method="post">
                <h2>Sign Up</h2>

                <div>
                    <label for="firstname">First name:</label>
                    <input type="text" name="firstname" id="firstname" class="form-input text-center">
                </div>
                <div>
                    <label for="lastname">Last name:</label>
                    <input type="text" name="lastname" id="lastname" class="form-input text-center">
                </div>
                <div>
                    <label for="username">Username:</label>
                    <input type="text" name="username" id="username" class="form-input text-center">
                </div>
                <div>
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" class="form-input text-center">
                </div>
                <div>
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" class="form-input text-center">
                </div>
                <div>
                    <label for="password2">Password Again:</label>
                    <input type="password" name="password2" id="password2" class="form-input text-center">
                </div>

                <div class="checkbox-group">
                    <label for="agree" style="text-align: center">I agree with the <a>terms of services.</a></label>
                    <input type="checkbox" name="agree" id="agree" value="yes" class="form-input text-center">
                </div>

                <button type="submit" name="register">Register</button>
                <a href="login.php" class="styled-link" style="color: white">Already a member? Login here</a>
            </form>
        </div>
    </div>

<?php view('footer') ?>