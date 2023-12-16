<?php
require __DIR__ . '/../src/bootstrap.php';
require __DIR__ . '/../src/products.php';
require __DIR__ . '/../src/documents.php';

?>
<?php view('header', ['title' => 'Our Products']); ?>
  <?php
session_start();
if (is_seller() || is_admin()) {
    ?>
  <button style='color: black; margin-top: 60px; border: 2px solid black; text-align: center; font-size: 14px; font-weight: bold; border-radius: 20px; background-color: #f0f0f0; display: inline-block;'>
        <a href='./insert_product.php' style='color: black; text-decoration: underline;'>Add a new product</a></button>
        <form method='POST'>
        <button type='submit' name='deleteProduct' style='margin-top: 20px;'>Delete Selected Products</button>
    <?php
}
?>

    <form method="post" action="">
        <button type="submit" name="generate_products_pdf" style='color: black; margin-top: 20px; border: 2px solid black; text-align: center; font-size: 14px; font-weight: bold; border-radius: 20px; background-color: #f0f0f0; display: inline-block;'>
            Generate PDF
        </button>
    </form>

<?php
if (is_post_request() && !empty($_POST['productIDs'])) {
    $are_valid = true;
    if (is_seller()) {
        $userID=$_SESSION['user_id'];
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
            './products.php',
            'The product has been succesfully deleted.'
        );
    } else {
        $_SESSION['alert'] = "You do not have rights to delete this!";
        echo "<script>alert('Deleted Products: You do not have rights to delete this!');</script>";
    }
}
?>

<?php

$products = retrieveProducts();

foreach ($products as $product) : ?>
    <div class="product" style="padding: 50px">
        <h2><?= $product['name'] ?></h2>
        <p><strong>Description:</strong> <?= $product['description'] ?></p>
        <p><strong>Price:</strong> $<?= $product['price'] ?></p>
        <p><strong>Quantity:</strong> <?= $product['quantity'] ?></p>
        <p><strong>Product id:</strong> <?= $product['id'] ?></p>
        <!-- Checkbox for each product -->
        <input type='checkbox' name='productIDs[]' value='<?= $product['id'] ?>'>

        <?php if (!empty($product['photo'])) : ?>
            <div class="photo">
                <img src="<?= $product['photo'] ?>" alt="Package Photo">
            </div>
        <?php endif; ?>
    </div>
<?php endforeach; ?>
    </form>
<?php view('footer') ?>