<?php
require __DIR__ . '/../src/bootstrap.php';
require __DIR__ . '/../src/login.php';

?>
<?php view('header', ['title' => 'Login']) ?>

    <style>

        form {
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            box-sizing: border-box;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="password"],
        input[type="file"],
        input[type="submit"] {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }

        button {
            display: block;
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
            background-color: #9fa9a3;
            color: #fff;
            cursor: pointer;
            margin-top: 10px;
        }

        button:hover {
            background-color: #c5d5c5;
        }

        .styled-link {
            display: block;
            background-color: #9fa9a3;
            color: white;
            text-align: center;
            padding: 8px;
            text-decoration: none;
            cursor: pointer;
            border: 1px solid black;
            margin-top: 4%;
        }

        .styled-link:hover {
            background-color: #c5d5c5;
        }

    </style>

    <div class="container-fluid">
        <div class="row" style="margin-top: 3%; margin-bottom: 3%;">
            <div class="col-md-6 col-md-offset-3">
                <div id="content-wrap">
                    <form action="../src/login.php" method="post" style="display: block; margin-left: auto; margin-right: auto;">
                        <h1 class="text-center">Login</h1>
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" name="username" id="username" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="password" style="padding-top: 20px">Password:</label>
                            <input type="password" name="password" id="password" class="form-control">
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