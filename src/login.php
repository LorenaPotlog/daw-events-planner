<?php
require __DIR__ . '/../src/bootstrap.php';

if (is_user_logged_in()) {
    redirect_to('../index.php');
}

$inputs = [];
$errors = [];

if (is_post_request()) {
    $username = $_POST['username'];
    $password  = $_POST['password'];
    // if login fails
    if (!login($username,$password)) {

        $errors['login'] = 'Invalid username or password';

        redirect_with('login.php', [
            'errors' => $errors,
            'inputs' => $inputs
        ]);
    }

    // login successfully
    redirect_to('../public/index.php');

} else if (is_get_request()) {
    [$errors, $inputs] = session_flash('errors', 'inputs');
}