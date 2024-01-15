<?php
require_once __DIR__ . '/../bootstrap.php';
include 'services.php';

// Validate and sanitize data
if (is_post_request()) {
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
    $price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $menu_types = filter_input(INPUT_POST, 'menu_types', FILTER_SANITIZE_STRING);
    $max_guests = filter_input(INPUT_POST, 'max_guests', FILTER_SANITIZE_NUMBER_INT);
    $long_description = filter_input(INPUT_POST, 'long_description', FILTER_SANITIZE_STRING);

    // Check if an image is uploaded
    if (isset($_FILES['serviceImage']) && $_FILES['serviceImage']['error'] !== UPLOAD_ERR_NO_FILE) {
        $serviceImage = file_get_contents($_FILES['serviceImage']['tmp_name']);
    } else {
        $serviceImage = ''; // Default for no image
    }

    // Validate user input before inserting into the database
    $errors = [];

    if (empty($name)) {
        $errors[] = 'Service name is required.';
    }

    if (empty($description)) {
        $errors[] = 'Service description is required.';
    }

    if ($price === false || $price <= 0) {
        $errors[] = 'Invalid price. Please enter a valid positive number.';
    }

    $valid_menu_options = ['vegetarian', 'vegan', 'all', 'customizable'];
    if (empty($menu_types) || !in_array($menu_types, $valid_menu_options)) {
        $errors[] = 'Invalid menu type selected.';
    }

    if ($max_guests === false || $max_guests <= 0) {
        $errors[] = 'Invalid maximum guests value. Cannot be negative.';
    }

    if (!empty($errors)) {
        // Redirect with error messages
        redirect_with_message(
            '../../public/insert_service.php',
            implode('<br>', $errors),
            FLASH_ERROR
        );
    } else {
        // Insert the service into the database
        $result = insertService($name, $description, $price, $menu_types, $max_guests, $long_description, $serviceImage);

        if (str_contains($result, 'inserted into')) {
            // Redirect with success message
            redirect_with_message(
                '../../public/insert_service.php',
                'The service has been inserted.'
            );
        } else {
            redirect_with_message(
                '../../public/insert_service.php',
                $result,
                FLASH_ERROR
            );
        }
    }
}