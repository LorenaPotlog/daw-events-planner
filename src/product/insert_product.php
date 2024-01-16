<?php
require_once __DIR__ . '/../bootstrap.php';
require __DIR__ . '/products.php';

if (is_post_request()) {

    check_csrf_token();

    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $user_id = $_SESSION['user_id'];
    $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
    $price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $quantity = filter_input(INPUT_POST, 'quantity', FILTER_SANITIZE_NUMBER_INT);


    if (isset($_FILES['productImage']) && $_FILES['productImage']['error'] !== UPLOAD_ERR_NO_FILE) {
        $productImage = file_get_contents($_FILES['productImage']['tmp_name']);
    } else {
        $productImage = ''; // Default for no image
    }

    $errors = [];

    if (empty($name)) {
        $errors[] = 'Product name is required.';
    }

    if (empty($description)) {
        $errors[] = 'Product description is required.';
    }

    if ($price === false || $price <= 0) {
        $errors[] = 'Invalid price. Please enter a valid positive number.';
    }

    if ($quantity === false || $quantity <= 0) {
        $errors[] = 'Invalid quantity. Please enter a valid positive integer.';
    }

    $existingProduct = retrieveProductByName($name);
    if ($existingProduct) {
        $errors[] = 'A product with the same name already exists.';
    }

    if (!empty($errors)) {
        // Redirect with error messages
        redirect_with_message(
            '../../public/insert_product.php',
            implode('<br>', $errors),
            FLASH_ERROR
        );
    } else {

        $result = insertProduct($name, $description, $price, $quantity, $user_id, $productImage);

        if (str_contains($result, 'inserted into')) {
            // Redirect with success message
            redirect_with_message(
                '../../public/insert_product.php',
                'The product has been inserted.'
            );
        } else {
            // Redirect with error message
            redirect_with_message(
                '../../public/insert_product.php',
                $result,
                FLASH_ERROR
            );
        }
    }
}
