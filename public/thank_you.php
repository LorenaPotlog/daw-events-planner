<?php
require __DIR__ . '/../src/bootstrap.php';
?>

<?php view('header', ['title' => 'Email was sent successfully']); ?>
<meta charset="UTF-8">
<title>Email Success</title>
<!-- Add your CSS styles or link to external CSS files here -->
<style>
    /* Example CSS for styling the message */
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 20px;
    }

    .message-container {
        max-width: 600px;
        background-color: #fff;
        border-radius: 8px;
        padding:20px;
        margin: 180px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        text-align: center;
    }

    .success-message {
        color: #4caf50;
        font-weight: bold;
        font-size: 24px;
        margin-bottom: 20px;
    }

    /* Add any other custom styling as needed */
</style>

<div class="message-container">
    <p class="success-message">Thank you for your message!</p>
    <p>Please allow us 24h to get back to you and check your spam.</p>
    <!-- You can add additional content or links here -->
</div>
<?php view('footer') ?>