<?php
require_once __DIR__ . '/../../phpmailer/mail_cod.php';
require_once '../inc/db_connect.php';
session_start();

$errors = [];
if (isset($_POST['new_password'])) {
    $db = getDBConnection(); // Retrieve the database connection

    $new_pass = mysqli_real_escape_string($db, $_POST['new_pass']);
    $new_pass_c = mysqli_real_escape_string($db, $_POST['new_pass_c']);

    $token = htmlspecialchars($_GET['token']);

    // Grab to token that came from the email link

    if (empty($new_pass) || empty($new_pass_c)) echo "Password is required, this it your token:".$token;
    if ($new_pass !== $new_pass_c) echo "Password do not match" ;

    if (count($errors) == 0) {
        // select email address of user from the password_reset table
        $sql = "SELECT email FROM password_reset WHERE token='$token' LIMIT 1";
        $results = mysqli_query($db, $sql);
        $email = mysqli_fetch_assoc($results)['email'];

        if ($email) {
            $new_hashed_pass = password_hash( $new_pass, PASSWORD_BCRYPT);
            $sql = "UPDATE users SET password='$new_hashed_pass' WHERE email='$email'";
            $results = mysqli_query($db, $sql);
            echo "Done";
        }
    } else echo 'error';
}

