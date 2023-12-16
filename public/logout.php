<?php
session_start();
$old_user = $_SESSION['valid_user'];
unset($_SESSION['valid_user']);
session_destroy();
?>
<?php require __DIR__ . '/../src/bootstrap.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Logout</title>
    <style>
        .message-box {
            padding: 20px;
            border: 2px solid pink;
            background-color: pink;
            color: black;
            text-align: center;
        }
    </style>
</head>
<body>
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
</body>
</html>