<?php
require __DIR__ . '/../src/bootstrap.php';
require __DIR__ . '/../src/enter_email.php';
?>
<?php view('header', ['title' => 'Password reset']) ?>

    <style>
        #page-container {
            position: relative;
        }


        form {
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            box-sizing: border-box;
            margin-left: 600px;
        }

        .form-title {
            text-align: center;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="password"], button {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }

        .login-btn {
            background-color: #9fa9a3;
            color: #fff;
            cursor: pointer;
        }

        .login-btn:hover {
            background-color: #c5d5c5;
        }
    </style>

    <div id="page-container">
        <div id="content-wrap">
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
        </div>
    </div>

<?php view('footer') ?>