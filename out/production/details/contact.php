<?php
require __DIR__ . 'bootstrap.php';
require_once '../phpmailer/mail_cod.php';


$siteKey     = '6LesZEgpAAAAABMhjfYhPEsDD-7TN3ZfJl18QqDQ';
$secretKey     = '6LesZEgpAAAAALwD4sgieWSCkBCd0wFBaQL1jKnL';

//TODO: fix mail to company + cleanup functions
if (is_post_request()) {

    // Proceed with sending the email
        $name = $_POST['name'];
        $email = $_POST['email'];
        $company_email = 'proiectproiect61@gmail.com';
        $client_message = "Hi $name,\n\nYour message is: {$_POST['message']}.\nWe will get back to you soon!";
        $company_message = "You got a new message from $name, $email: {$_POST['message']}.";
        $subject = "Thank you for your message!";
        $company_subject='You have a new message';

    if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])){
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secretKey.'&response='.$_POST['g-recaptcha-response']);
        $responseData = json_decode($verifyResponse);

        if($responseData->success) {
            $mail_to_customer = send_email($email, $subject, $client_message);
            $mail_to_company = send_email($company_email,$company_subject,$company_message,$email);
            if ($mail_to_customer && $mail_to_company) {
                echo "Thank you! Your message has been sent.";
                header('Location: ../public/thank_you.php');
            } else {
                echo "Oops! Something went wrong, please try again later.";
            }
        } else {
            echo 'Robot verification failed, please try again.';
        }
    } else {
        echo 'Please check on the reCAPTCHA box.';
    }

}