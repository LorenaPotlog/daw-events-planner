<?php require __DIR__ . '../bootstrap.php'; ?>
<?php require __DIR__ . '/products.php'; ?>

<?php

// Handling form submission
if (is_post_request()) {
    $name = $_POST['name'];
    $user_id = $_SESSION['user_id'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    if(isset($_FILES['productImage']) && $_FILES['productImage']['error'] !== UPLOAD_ERR_NO_FILE) {
        $productImage = file_get_contents($_FILES['productImage']['tmp_name']);
    } else {
        // Handle case where productImage doesn't exist or wasn't uploaded
        $productImage = ''; // Set a default value or handle the absence of the image
    }
    $result = insertProduct($name,$description,$price,$quantity,$user_id,$productImage);

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
