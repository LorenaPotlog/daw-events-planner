<?php require __DIR__ . '/../src/bootstrap.php'; ?>
    <meta charset="UTF-8">
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

<?php view('header', ['title' => 'Success']);
session_unset();
?>
<div class="message-box">
    <p>Profile updated successfully.</p>
    <p>Please <a href="login.php">login </a>again to see the updates on your profile</p>
</div>
<?php view('footer'); ?>
