<?php
require __DIR__ . '/../src/bootstrap.php';
require __DIR__ . '/../src/login.php';

?>
<?php view('header', ['title' => 'Login']) ?>

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

    <section>
        <button type="submit">Login</button>
        <a href="register.php">Register</a>
    </section>
</form>
<?php view('footer') ?>