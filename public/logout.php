<?php
session_start();
$old_user = $_SESSION['valid_user'];
session_unset();
session_destroy();
?>
<?php require __DIR__ . '/../src/bootstrap.php'; ?>
    <title>Logout</title>
    <style>

        .message-box {
            border: 2px solid pink;
            background-color: rgba(197, 213, 197, 0.6);
            color: black;
            text-align: center;
            margin:150px 150px 0 150px;
            padding: 20px;
            font-size: 2rem;
        }
    </style>
<?php view('header', ['title' => 'Logout']); ?>
<div class="message-box">
    <?php if (!empty($old_user)) : ?>
        Logged out.<br />
    <?php else : ?>
        You were not logged in, and so have not been logged out.<br />
    <?php endif; ?>
    <a href="login.php">Back to login</a>
</div>
<?php view('footer'); ?>