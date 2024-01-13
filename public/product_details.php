<?php
require __DIR__ . '/../src/bootstrap.php';
require __DIR__ . '/../src/product/products.php';

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
    header("Location: products.php");
    exit();
}
?>

    <style>
        .product-details {
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: calc(33.33% - 20px); /* 1/3 of the page */
            box-sizing: border-box;
            text-align: center;
            margin-right: 20px;
            float: left;
        }

        .similar-products {
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: calc(66.66% - 20px); /* 2/3 of the page */
            box-sizing: border-box;
            text-align: center;
            float: left;
        }

        .photo img {
            max-width: 100%;
            height: auto;
        }

        .similar-products-box {
            width: 100%;
            padding-left: 20px;
        }

        .similar-products-box h2 {
            margin-bottom: 10px;
        }

        .similar-product {
            width: calc(33.33% - 20px); /* 1/3 of the similar-products div */
            margin: auto;
            text-align: center;
        }

        .similar-product img {
            max-width: 100%;
            height: auto;
            margin-bottom: 10px;
        }
        .product-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr); /* Create three columns with equal width */
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

    <div class="similar-products">
        <div class="similar-products-box">
            <h3>Looking for similar items?</h3>
            <div class="product-grid">
                <?php
                // TODO o functie pentru similar items
                $similarProducts = array_slice(retrieveProducts(), 0, 3);
                foreach ($similarProducts as $similarProduct) : ?>
                    <div class="similar-product">
                        <img src="data:image/jpeg;base64,<?= base64_encode($similarProduct['image']) ?>" alt="Similar Product Photo">
                        <a href="product_details.php?productId=<?= $similarProduct['id'] ?>" style="color:black">
                            <h2><?= $similarProduct['name'] ?></h2>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

<?php view('footer') ?>