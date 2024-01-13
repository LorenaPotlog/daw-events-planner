<?php require __DIR__ . '/../src/bootstrap.php';
require __DIR__ . '/../src/reviews.php';
?>

<?php view('header', ['title' => 'Your account']); ?>

<?php
session_start();

// Retrieve user details from the session or database (assuming it's stored in $_SESSION)
$username = $_SESSION['valid_user'];
$role = $_SESSION['role'];
$user_id = $_SESSION['user_id'];
$email = $_SESSION['email']; // Add this line
$lastname = $_SESSION['lastname']; // Add this line
$firstname = $_SESSION['firstname'];
$photo = $_SESSION['photo'];

// Add this line
?>

    <style>
        <?php include 'css/account.css' ?>
    </style>

    <div style="text-align: center;position: relative;">

        <?php
        $defaultImage = '../resources/photos/no-photo2.png'; // Replace this with the path to your default image
        if (!empty($photo)) {
            $imageSource = "data:image/jpeg;base64," . base64_encode($photo);
        } else {
            $imageSource = $defaultImage;
        } ?>
        <img src="<?= $imageSource ?>" alt="Profile Photo" class="profile-picture">

        <div class="account-details-box">
            <p>Your account details:</p>
            <table class="details-table">
                <tr>
                    <td>Role:</td>
                    <td class="right"><?= $role ?></td>
                </tr>
                <tr>
                    <td>ID:</td>
                    <td class="right"><?= $user_id ?></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td class="right"><?= $email ?></td>
                </tr>
                <tr>
                    <td>Lastname:</td>
                    <td class="right"><?= $lastname ?></td>
                </tr>
                <tr>
                    <td>Firstname:</td>
                    <td class="right"><?= $firstname ?></td>
                </tr>

            </table>
        </div>

        <a href="edit_profile.php" class="styled-link">Edit Profile</a>
        <a href="reviews.php?userId=<?= $user_id ?>" class="styled-link">My Reviews</a>

    </div>

<?php view('footer') ?>