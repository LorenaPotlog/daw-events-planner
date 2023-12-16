<?php
require __DIR__ . '/../src/bootstrap.php';
require __DIR__ . '/../src/services.php';

?>

<?php view('header', ['title' => 'Your account']); ?>

<?php
session_start();

// Retrieve user details from the session or database (assuming it's stored in $_SESSION)
$username = $_SESSION['valid_user'];
$role = $_SESSION['role'];
$user_id = $_SESSION['user_id'];
?>
<div style="border: 2px pink; font-weight: bolder; font-size: large; padding-top: 120px; position: absolute;">
    <p>Your role is: <?= $role ?></p>
    <p>Your ID is: <?= $user_id ?></p>
    <a href="edit_profile.php">Edit Profile</a>
    <a href="logout.php">Logout</a>
</div>

<?php view('footer') ?>