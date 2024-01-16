<?php
require __DIR__ . '/../src/bootstrap.php';
?>

<?php view('header', ['title' => 'Email was sent successfully']); ?>

<div class="message-box">
    <p >Thank you for your message!</p>
    <p>Please allow us <b>24h</b> to get back to you and check your spam.</p>
</div>
<?php view('footer') ?>