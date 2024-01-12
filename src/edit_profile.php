<?php
require __DIR__ . '/../src/bootstrap.php';
include 'users.php';

// Check if the user is logged in
if (!is_user_logged_in()) { ?>
    <div class="message-box">
        <p>You need to be logged in to edit your profile.</p>
        <a href="login.php">Go to login</a>
    </div>
<?php } else {
    // Assuming you have functions like retrieveUserById, updateUser, etc.
    $user = get_user_by_id($_SESSION['user_id']);

    // Process form submission if the user updates their profile
    if (is_post_request()) {
        $email = $_POST['email'];
        $lastname = $_POST['lastname'];
        $firstname = $_POST['firstname'];

        if ( isset($_FILES['photo']) && $_FILES['photo']['error'] !== UPLOAD_ERR_NO_FILE) {
            $photo = file_get_contents($_FILES['photo']['tmp_name']);
        } else $photo = $_SESSION['photo'];

        // Update user data in the database
        if (edit_user($_SESSION['user_id'], $email, $firstname, $lastname, $photo)) {
            redirect_with_message('../public/edit_profile_success.php', 'Profile updated successfully.');

        } else echo "Error";

        // Redirect to a success page or show a success message
    }
}
?>