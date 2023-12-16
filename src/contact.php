<?php
require __DIR__ . '/../src/bootstrap.php';

if (is_post_request()) {

        // Proceed with sending the email
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        $to = "proiectproiect61@gmail.com";
        $subject = "New Contact Form Submission from $name";
        $email_content = "Name: $name\nEmail: $email\n\nMessage:\n$message";
        $headers = "From: $email";

        $success = mail($to, $subject, $email_content, $headers);

        if ($success) {
            echo "Thank you! Your message has been sent.";
        } else {
            echo "Oops! Something went wrong, please try again later.";
        }
    }  else {
    echo "Access denied.";
}