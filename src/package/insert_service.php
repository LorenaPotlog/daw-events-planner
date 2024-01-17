<?php
require_once __DIR__ . '/../bootstrap.php';
include 'services.php';

if (is_post_request()) {

    check_csrf_token();

    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
    $price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $menu_types = filter_input(INPUT_POST, 'menu_types', FILTER_SANITIZE_STRING);
    $max_guests = filter_input(INPUT_POST, 'max_guests', FILTER_SANITIZE_NUMBER_INT);
    $long_description = filter_input(INPUT_POST, 'long_description', FILTER_SANITIZE_STRING);
    $category = filter_input(INPUT_POST, 'category', FILTER_SANITIZE_STRING);

    $errors = [];

    $maxFileSize = 5 * 1024 * 1024; // 5mb max
    if (isset($_FILES['serviceImage']) && $_FILES['serviceImage']['error'] !== UPLOAD_ERR_NO_FILE) {
        $tmpFilePath = $_FILES['serviceImage']['tmp_name'];

        if ($_FILES['serviceImage']['size'] <= $maxFileSize) {
            $imageInfo = getimagesize($tmpFilePath);

            if ($imageInfo !== false) {
                $serviceImage = file_get_contents($tmpFilePath);
            } else {
                $errors[] = 'Invalid photo. Please choose another one or proceed with no photo.';
            }
        } else {
            $errors[] = 'File exceed limit';
        }
    } else {
        $serviceImage = '';
    }

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

    $valid_category = ['wedding', 'bachelor'];
    if (empty($category) || !in_array($category, $valid_category)) {
        $errors[] = 'Invalid category selected.';
    }

    if ($max_guests === false || $max_guests <= 0 || $max_guests > 10001) {
        $errors[] = 'Invalid maximum guests value, should be between 0 and 10000';
    }

    if (!empty($errors)) {
        redirect_with_message(
            '../../public/insert_service.php',
            implode('<br>', $errors),
            FLASH_ERROR
        );
    } else {
        $result = insertService($name, $description, $price, $menu_types, $max_guests, $long_description, $serviceImage, $category);

        if (str_contains($result, 'inserted into')) {
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