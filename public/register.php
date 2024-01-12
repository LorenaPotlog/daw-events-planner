<?php
require __DIR__ . '/../src/bootstrap.php';
require __DIR__ . '/../src/register.php';
?>

<?php view('header', ['title' => 'Register']); ?>

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

        h1 {
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="checkbox"],
        button {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }


        button {
            background-color: #9fa9a3;
            color: #fff;
            cursor: pointer;
            margin-bottom: 10px;

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
            <form action="../src/register.php" method="post">
                <h1>Sign Up</h1>

                <div>
                    <label for="firstname">First name:</label>
                    <input type="text" name="firstname" id="firstname">
                </div>
                <div>
                    <label for="lastname">Last name:</label>
                    <input type="text" name="lastname" id="lastname">
                </div>
                <div>
                    <label for="username">Username:</label>
                    <input type="text" name="username" id="username">
                </div>
                <div>
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email">
                </div>
                <div>
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password">
                </div>
                <div>
                    <label for="password2">Password Again:</label>
                    <input type="password" name="password2" id="password2">
                </div>

                <div class="checkbox-group">
                    <label for="agree" style="text-align: center">I agree with the <a>terms of services.</a></label>
                    <input type="checkbox" name="agree" id="agree" value="yes">
                </div>

                <button type="submit" name="register">Register</button>
                <a href="login.php" class="styled-link" style="color: white">Already a member? Login here</a>
            </form>
        </div>
    </div>

<?php view('footer') ?>