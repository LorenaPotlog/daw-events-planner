<?php

require __DIR__ . '/../src/bootstrap.php';
require_once 'products.php';

if (is_post_request() && $_POST['delete_product'] == 'deleteProduct') {
    if(empty($_POST['productIDs'])){
        redirect_with_message(
            '../public/products.php',
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
        $_SESSION['alert'] = "Products successfully deleted!";
        unset($_POST['productIDs']);
        redirect_with_message(
            '../public/products.php',
            'The product has been succesfully deleted.'
        );
    } else {
        $_SESSION['alert'] = "You do not have rights to delete this!";
        echo "<script>alert('Deleted Products: You do not have rights to delete this!');</script>";
        redirect_with_message(
            '../public/products.php',
            'You do not have rights to delete this!', FLASH_ERROR);
    }
}
