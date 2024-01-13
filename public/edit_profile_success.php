<?php require __DIR__ . '/../src/bootstrap.php'; ?>
    <meta charset="UTF-8">
    <title>Logout</title>

<?php view('header', ['title' => 'Success']);
session_unset();
?>
<div class="message-box">
    <p>Profile updated successfully.</p>
    <p>Please <a href="login.php">login </a>again to see the updates on your profile</p>
</div>
<?php view('footer'); ?>
