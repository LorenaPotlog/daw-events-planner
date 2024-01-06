<?php
require __DIR__ . '/../src/bootstrap.php';
require_once '../phpmailer/mail_cod.php';


$siteKey     = '6LesZEgpAAAAABMhjfYhPEsDD-7TN3ZfJl18QqDQ';
$secretKey     = '6LesZEgpAAAAALwD4sgieWSCkBCd0wFBaQL1jKnL';

if (is_post_request()) {

    // Proceed with sending the email
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = 'Your message is: '.$_POST['message'].' - We will get back to you soon!';
        $subject = "Thank you for your message!";

    if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])){
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secretKey.'&response='.$_POST['g-recaptcha-response']);
        $responseData = json_decode($verifyResponse);

        if($responseData->success) {
            $result = send_email($email, $subject, $message);
            if ($result) {
                echo "Thank you! Your message has been sent.";
            } else {
                echo "Oops! Something went wrong, please try again later.";
            }
        } else {
            echo 'Robot verification failed, please try again.';
        }
    } else {
        echo 'Please check on the reCAPTCHA box.';
    }

    }  else {
    echo "Access denied.";
}