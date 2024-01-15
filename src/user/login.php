<?php
require_once __DIR__ . '/../bootstrap.php';

//try {
//    checkCSRFtoken();
//} catch (Exception $e) {
//    $errors['login'] = $e->getMessage();
//    $_SESSION['errors'] = $errors;
//    redirect_to('../../public/login.php');
//}

if (is_user_logged_in()) {
    redirect_to('index.php');
}

$inputs = [];
$errors = [];

if (is_post_request()) {
    $username = $_POST['username'];
    $password  = $_POST['password'];

    // if login fails
    try {
      login($username, $password);
    } catch (Exception $e) {
        $errors['login'] = $e->getMessage();
        $_SESSION['inputs'] = $_POST;
        $_SESSION['errors'] = $errors;
        redirect_to('../../public/login.php');
    }

    // login successfully
    redirect_to('../../public/index.php');

} else if (is_get_request()) {
    [$inputs, $errors] = session_flash('inputs', 'errors');
    if (!empty($errors)) {
        foreach ($errors as $errorKey => $errorMessage) {
            flash('flash_' . uniqid(), $errorMessage, FLASH_ERROR);
        }
    }
}
