<?php

require_once __DIR__ . '/../bootstrap.php';
require_once __DIR__ . '/../../phpmailer/mail_cod.php';

$nameErr = "";

///redirect user to login if email already exists
///

function isValidEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function isValidPassword($password): bool
{
    return strlen($password) >= 6;
}

function isUsernameAlreadyTaken($username): bool
{
    return find_user_by_username($username) !== null;
}

function validateRegistration($firstname, $lastname, $username, $email, $password, $password2, $acceptedTermsOfService): array
{

    $errors = [];

    if (empty($firstname)) {
        $errors[] = 'First name is required.';
    }

    if (empty($lastname)) {
        $errors[] = 'Last name is required.';
    }

    if (empty($username)) {
        $errors[] = 'Username is required.';
    }

    if (isUsernameAlreadyTaken($username)) {
        $errors[] = 'Username already taken. Please choose a different one.';
    }

    if (empty($email) || !isValidEmail($email)) {
        $errors[] = 'Email should have a valid format.';
    }

    if (empty($password) || !isValidPassword($password)) {
        $errors[] = 'Password should have at least 6 characters.';
    }

    if ($password !== $password2) {
        $errors[] = 'Passwords do not match.';
    }

//    if (!$acceptedTermsOfService) {
//        $errors[] = 'Please agree with the terms of services.';
//    }

    return $errors;
}

if (is_post_request()) {

    if (($_POST["firstname"])=='') {
        $nameErr = "Name is required";
    } else {
        $name = $_POST["firstname"];
    }

    $firstname = htmlspecialchars($_POST['firstname']);
    $lastname = htmlspecialchars($_POST['lastname']);
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $password2 = htmlspecialchars($_POST['password2']);
    $acceptedTermsOfService = $_POST['agree'] === 'on';

    $errors = validateRegistration($firstname, $lastname, $username, $email, $password, $password2, $acceptedTermsOfService);

    if (empty($errors)) {
        try {
            if (register_user($firstname, $lastname, $email, $username, $password)) {
                flash('flash_' . uniqid(),  'Registration is successful!', FLASH_SUCCESS);
                unset($_SESSION['inputs']);
            }
        } catch (Exception $e) {
            $errors[] = $e->getMessage();
        }
    }

    $_SESSION['inputs'] = $_POST;
    $_SESSION['errors'] = $errors;
    header('Location: ../../public/register.php');
    exit();
}
[$inputs, $errors] = session_flash('inputs', 'errors');
if (!empty($errors)) {
    foreach ($errors as $errorKey => $errorMessage) {
        flash('flash_' . uniqid(),  $errorMessage, FLASH_ERROR);
    }
}