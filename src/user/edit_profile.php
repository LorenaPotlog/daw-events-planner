<?php
require_once __DIR__ . '/../bootstrap.php';
include 'users.php';

$user = get_user_by_id($_SESSION['user_id']);

if (is_post_request()) {
    check_csrf_token();
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING);
    $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);

    if ($email === false) {
        redirect_with_message(
            '../../public/edit_profile.php',
            'Invalid email format.',
            FLASH_ERROR
        );
        exit;
    }

    if (empty($firstname) || empty($lastname)) {
        redirect_with_message(
            '../../public/edit_profile.php',
            'First name and last name are required.',
            FLASH_ERROR
        );
        exit;
    }

    if (isset($_FILES['photo']) && $_FILES['photo']['error'] !== UPLOAD_ERR_NO_FILE) {
        $allowedFileTypes = ['image/jpeg', 'image/png', 'image/gif'];

        if (!in_array($_FILES['photo']['type'], $allowedFileTypes)) {
            redirect_with_message(
                '../../public/edit_profile.php',
                'Invalid file format. Please upload a valid image file.',
                FLASH_ERROR
            );
            exit;
        }

    } else {
        $photo = $_SESSION['photo'];
    }

    if (edit_user($_SESSION['user_id'], $email, $firstname, $lastname, $photo)) {
        redirect_with_message('../../public/edit_profile_success.php', 'Profile updated successfully.');
    } else {
        redirect_with_message('../../public/edit_profile.php', 'Error when updating profile', FLASH_ERROR);
    }
}
