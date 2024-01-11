<?php
require __DIR__ . '/../src/bootstrap.php';
require __DIR__ . '/../src/login.php';

?>
<?php view('header', ['title' => 'Login']) ?>

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
            margin-bottom: 10px;
        }

        .styled-link:hover {
            background-color: #c5d5c5;
        }
    </style>

    <div id="page-container">
        <div id="content-wrap">
            <form action="../src/login.php" method="post">
                <h1>Login</h1>
                <div>
                    <label for="username">Username:</label>
                    <input type="text" name="username" id="username">
                </div>

                <div>
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password">
                </div>

                <button type="submit">Login</button>
                <a href="register.php" class="styled-link">Register</a>
                <a href="enter_email.php" class="styled-link">Forgot your password?</a>
            </form>
        </div>
    </div>
<?php view('footer') ?>