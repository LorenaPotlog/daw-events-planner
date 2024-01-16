<?php

require_once __DIR__ . '/../bootstrap.php';
require_once 'products.php';

if (is_post_request()) {
    check_csrf_token();
    if(empty($_POST['productIDs'])){
        redirect_with_message(
            '../../public/products.php',
            'No product selected', FLASH_WARNING
        );
    }
    $are_valid = true;
    if (is_seller()) {
        $userID = $_SESSION['user_id'];
        foreach ($_POST['productIDs'] as $productID) {
            if (!hasProduct($productID, $userID)) {

                $are_valid = false;
            }
        }
    }
    if ($are_valid) {
        foreach ($_POST['productIDs'] as $productID) {
            deleteProduct($productID);
        }
        unset($_POST['productIDs']);
        redirect_with_message(
            '../../public/products.php',
            'The product has been successfully deleted.'
        );
    } else {
        redirect_with_message(
            '../../public/products.php',
            'You do not have rights to delete this!', FLASH_ERROR);
    }
}
