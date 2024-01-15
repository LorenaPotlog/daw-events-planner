<?php
require_once __DIR__ . '/../bootstrap.php';
include 'users.php';

$user = get_user_by_id($_SESSION['user_id']);

if (is_post_request()) {
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING);
    $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);

    // Validate email
    if ($email === false) {
        redirect_with_message(
            '../../public/edit_profile.php',
            'Invalid email format.',
            FLASH_ERROR
        );
        exit;
    }

    // Validate first name and last name
    if (empty($firstname) || empty($lastname)) {
        redirect_with_message(
            '../../public/edit_profile.php',
            'First name and last name are required.',
            FLASH_ERROR
        );
        exit;
    }

    // Validate photo if uploaded
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] !== UPLOAD_ERR_NO_FILE) {
        // Add further validation for the photo if needed
        $allowedFileTypes = ['image/jpeg', 'image/png', 'image/gif'];

        if (!in_array($_FILES['photo']['type'], $allowedFileTypes)) {
            redirect_with_message(
                '../../public/edit_profile.php',
                'Invalid file format. Please upload a valid image file.',
                FLASH_ERROR
            );
            exit;
        }

        // Additional validation logic for file size, etc., can be added here
    } else {
        $photo = $_SESSION['photo'];
    }

    // Update the user profile
    if (edit_user($_SESSION['user_id'], $email, $firstname, $lastname, $photo)) {
        redirect_with_message('../../public/edit_profile_success.php', 'Profile updated successfully.');
    } else {
        redirect_with_message('../../public/edit_profile.php', 'Error when updating profile', FLASH_ERROR);
    }
}
?>