<?php
require __DIR__ . '/../src/bootstrap.php';
require __DIR__ . '/../src/products.php';

if (empty($_GET['productId'])) {
    // Handle the case where productId is missing
    // You might redirect the user to an error page or back to the products page
    header("Location: products.php");
    exit();
}

$productId = $_GET['productId'];
$product = retrieveProductById($productId);

if (!$product) {
    // Handle the case where the product with given ID doesn't exist
    // You might redirect the user to an error page or back to the products page
    header("Location: products.php");
    exit();
}

// Now $product contains details of the selected product
// You can use $product['name'], $product['description'], etc., to display its details
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details - <?= $product['name'] ?></title>
    <!-- Include CSS or stylesheets if needed -->
</head>
<body>
<!-- Display the product details -->
<h1><?= $product['name'] ?></h1>
<p>Description: <?= $product['description'] ?></p>
<p>Price: $<?= $product['price'] ?></p>
<p>Quantity: <?= $product['quantity'] ?></p>
<?php if (!empty($product['image'])) : ?>
    <div class="photo">
        <img src="data:image/jpeg;base64,<?= base64_encode($product['image']) ?>" alt="Product Photo">
    </div>
<?php endif; ?>

<!-- Include links, buttons, or additional content as needed -->
</body>
</html>