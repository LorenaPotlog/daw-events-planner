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

    </style>
    <div id="page-container">
        <div id="content-wrap">
            <form class="login-form" action="../src/enter_email.php" method="post">
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