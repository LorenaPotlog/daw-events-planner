<?php
require_once __DIR__ . '/../bootstrap.php';
include 'services.php';

//de pus validari pt numere etc - altfel crapa
if (is_post_request()) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $menu_types = $_POST['menu_types'];
    $max_guests = $_POST['max_guests'];
    $long_description = $_POST['long_description'];

    // Handling multiple images upload
    if (isset($_FILES['serviceImages']) && !empty($_FILES['serviceImages']['name'][0])) {
        $serviceImages = [];
        foreach ($_FILES['serviceImages']['tmp_name'] as $key => $tmp_name) {
            $imageData = file_get_contents($tmp_name);
            $serviceImages[] = $imageData;
        }
    } else {
        // Handle case where serviceImages don't exist or weren't uploaded
        $serviceImages = 'null'; // Set a default value or handle the absence of images
    }

    $result = insertService($name, $description, $price, $menu_types, $max_guests, $long_description, $serviceImages);

    echo $result;
    if (strpos($result, 'inserted into') !== false) {
        // Redirect with success message
        redirect_with_message(
            '../../public/insert_service.php',
            'The service has been inserted.'
        );
    }  else {
        redirect_with_message(
            '../../public/insert_service.php',
            $result,
            FLASH_ERROR
        );
    }
}