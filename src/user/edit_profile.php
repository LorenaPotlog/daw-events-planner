<?php
require_once __DIR__ . '/../bootstrap.php';
include 'users.php';

if (!is_user_logged_in()) { ?>
    <div class="message-box">
        <p>You need to be logged in to edit your profile.</p>
        <a href="login.php">Go to login</a>
    </div>
<?php } else {
    $user = get_user_by_id($_SESSION['user_id']);

    if (is_post_request()) {
        $email = $_POST['email'];
        $lastname = $_POST['lastname'];
        $firstname = $_POST['firstname'];

        if (isset($_FILES['photo']) && $_FILES['photo']['error'] !== UPLOAD_ERR_NO_FILE) {
            $photo = file_get_contents($_FILES['photo']['tmp_name']);
        } else $photo = $_SESSION['photo'];

        if (edit_user($_SESSION['user_id'], $email, $firstname, $lastname, $photo)) {
            redirect_with_message('../../public/edit_profile_success.php', 'Profile updated successfully.');
        } else {
            redirect_with_message('../../public/edit_profile.php', 'Error when updating profile', FLASH_ERROR);
        }
    }
}
?>