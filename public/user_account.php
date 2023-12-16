<?php
session_start();

// Retrieve user details from the session or database (assuming it's stored in $_SESSION)
$username = $_SESSION['valid_user'];
$role = $_SESSION['role'];
$user_id = $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Details</title>
</head>
<body>
<h1>Welcome, <?= $username ?>!</h1>
<p>Your role is: <?= $role ?></p>
<p>Your ID is: <?= $user_id ?></p>

<!-- You can add links to edit profile, log out, or other user actions -->
<a href="edit_profile.php">Edit Profile</a>
<a href="logout.php">Logout</a>

<!-- Add more HTML or content as needed -->
</body>
</html>