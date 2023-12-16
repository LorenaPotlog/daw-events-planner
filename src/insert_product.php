<?php require __DIR__ . '/../src/bootstrap.php'; ?>
<?php require __DIR__ . '/products.php'; ?>

<?php

// Handling form submission
if (is_post_request()) {
    $name = $_POST['name'];
    $user_id = $_SESSION['user_id'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    $result = insertProduct($name,$description,$price,$quantity,$user_id);
    echo $result;
    if (strpos($result, 'inserted into') !== false) {
        // Redirect with success message
        redirect_with_message(
            '../public/insert_product.php',
            'The product has been inserted.'
        );
    }  else {
        redirect_with_message(
            '../public/insert_product.php',
            $result,
            FLASH_ERROR
        );
    }
}
?>
