<?php

require __DIR__ . '/../src/bootstrap.php';

$nameErr = "";

if (is_post_request()) {

    if (($_POST["firstname"])=='') {
        $nameErr = "Name is required";
    } else {
        $name = $_POST["firstname"];
        }

    $firstname = htmlspecialchars($_POST['firstname']);
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $errors = [];

    //de adaugat validari + data sanitization
    if (strlen($username) < 3) {
        $errors['username'] = 'Username should be at least 3 characters long.';
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
        $errors['email'] = 'Email not valid';
    }

    if (empty($errors)){
    if (register_user($firstname, $lastname, $email, $username, $password)) {
        redirect_with_message(
            '../public/login.php',
            'Your account has been created successfully. Please login here.'
        );
    }
    } else   {
        $_SESSION['inputs'] = $_POST;
        $_SESSION['errors'] = $errors;
        redirect_to('../public/register.php');
    }
}

[$inputs, $errors] = session_flash('inputs', 'errors');
if (!empty($errors)) {
    foreach ($errors as $errorKey => $errorMessage) {
            flash('flash_' . uniqid(),  $errorMessage, FLASH_ERROR);
        }
}

