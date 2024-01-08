<?php
require __DIR__ . '/../src/bootstrap.php';
require __DIR__ . '/../src/products.php';
require __DIR__ . '/../src/documents.php';
require __DIR__ . '/../src/delete_product.php';

?>
<?php view('header', ['title' => 'Our Products']); ?>

<?php
    session_start();
    if (is_seller() || is_admin()) {
?>

        <button style='color: black; margin-top: 60px; border: 2px solid black; text-align: center; font-size: 14px; font-weight: bold; border-radius: 20px; background-color: #f0f0f0; display: inline-block;'>
            <a href='./insert_product.php' style='color: black; text-decoration: underline;'>Add a new product</a></button>

        <form method='POST' action="../src/delete_product.php">
            <button type='submit' name="delete_product" value="deleteProduct" style='margin-top: 20px;'>Delete Selected Products</button>
<!--        <form method='POST' action="../src/documents.php">-->
<!--        <button type="submit" name="generate_pdf" value="generatePdf" style='margin-top: 20px;'>Generate PDF</button>-->
<!--        </form>-->

<?php
}
?>

<?php

$products = retrieveProducts();

foreach ($products as $product) : ?>
<!--    <div class="product" style="padding: 50px">-->
        <h2><a href="product_details.php?productId=<?= $product['id'] ?>"><?= $product['name'] ?></a></h2>
        <p><strong>Description:</strong> <?= $product['description'] ?></p>
        <p><strong>Price:</strong> $<?= $product['price'] ?></p>
        <p><strong>Quantity:</strong> <?= $product['quantity'] ?></p>
        <p><strong>Product id:</strong> <?= $product['id'] ?></p>
            <!-- Checkbox for each product -->
            <input type='checkbox' name='productIDs[]' value='<?= $product['id'] ?>'>

        <?php if (!empty($product['image'])) : ?>
            <div class="photo">
                <img src="data:image/jpeg;base64,<?= base64_encode($product['image']) ?>" alt="Product Photo">
            </div>
        <?php endif; ?>
<!--    </div>-->
<?php endforeach; ?>

    </form>


<?php view('footer') ?>