<?php
require __DIR__ . '/../src/bootstrap.php';
require __DIR__ . '/../src/products.php';

view('header', ['title' => 'Our Product']);

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
        <style>
            .product-details {
                background-color: #fff;
                border: 1px solid #ddd;
                padding: 20px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                max-width: 400px;
                width: 100%;
                box-sizing: border-box;
                text-align: center;
                margin-bottom: 50px;
                margin-left: 600px;
            }

            h1 {
                margin-bottom: 10px;
            }

            p {
                margin: 5px 0;
            }

            .photo img {
                max-width: 100%;
                height: auto;
            }
        </style>

    <div class="product-details">
        <h1><?= $product['name'] ?></h1>
        <p>Description: <?= $product['description'] ?></p>
        <p>Price: $<?= $product['price'] ?></p>
        <p>Quantity: <?= $product['quantity'] ?></p>
        <?php if (!empty($product['image'])) : ?>
            <div class="photo">
                <img src="data:image/jpeg;base64,<?= base64_encode($product['image']) ?>" alt="Product Photo">
            </div>
        <?php endif; ?>
    </div>

<?php view('footer') ?>