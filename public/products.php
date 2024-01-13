<?php
require __DIR__ . '/../src/bootstrap.php';
require __DIR__ . '/../src/product/products.php';
require __DIR__ . '/../src/product/products_pdf.php';
require __DIR__ . '/../src/product/delete_product.php';
?>

<?php view('header', ['title' => 'Our Products']); ?>
    <style>
        <?php include 'css/products.css' ?>
</style>

<?php if (is_seller() || is_admin()) : ?>
    <div class="admin-options">
    <!-- Admin options -->
    <button class="button" style="width: 25%;"><a href='./insert_product.php' style='text-decoration: none; color: white'>Add New
            Products</a></button>
    <form method='POST' action="../src/product/delete_product.php" style="display: inline;">
    <button type='submit' name="delete_product" value="deleteProduct" class="button" style="width: 25%;">Delete Selected
        Products
    </button>
<?php endif ?>
    <a href="#scroll" class="styled-link" style="display:inline; width: 30%;">Calculate invoice <i class="fa fa-arrow-down" style="color: white"></i></a>

    <div style="display: flex"
    <div id="page-container" style="width: 50%">
        <div id="content-wrap">
            <div class="product-list">
                <!-- Display products -->
                <?php
                $products = retrieveProducts();
                foreach ($products as $product) : ?>
                    <div class="product">
                        <!-- Product details -->
                        <a href="product_details.php?productId=<?= $product['id'] ?>" style="color:black">
                            <h2><?= $product['name'] ?></h2>
                        </a>
                        <?php
                        $defaultImage = '../resources/photos/no-photo.jpg'; // Replace this with the path to your default image
                        if (!empty($product['image'])) {
                            $imageSource = "data:image/jpeg;base64," . base64_encode($product['image']);
                        } else {
                            $imageSource = $defaultImage;
                        } ?>

                        <div class="photo">
                            <img src="<?= $imageSource ?>" alt="Product Photo" class="product-image">
                        </div>

                        <div class="product-details">
                            <p><strong>Description:</strong> <?= $product['description'] ?></p>
                            <p><strong>Price:</strong> $<?= $product['price'] ?></p>
                            <p><strong>Quantity:</strong> <?= $product['quantity'] ?></p>
                            <p><strong>Product id:</strong> <?= $product['id'] ?></p>
                            <?php if (is_seller() || is_admin()) : ?>
                                <input type='checkbox' name='productIDs[]' value='<?= $product['id'] ?>'>
                            <?php endif; ?>
                        </div>

                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    </form>

    <div class="pdf-form" id="scroll">
        <!-- PDF generation form -->
        <form method='POST' action="../src/product/products_pdf.php">
            <button type="submit" name="generate_pdf" value="generatePdf" class="button">Calculate invoice</button>
            <ul>
                <?php foreach ($products as $product) : ?>
                    <li>
                        <input type='checkbox' name='productIDs[]' value='<?= $product['id'] ?>'>
                        <a><?= $product['name'] ?></a>
                        <input type="number" name="quantities[<?= $product['id'] ?>]" value="1" min="1"
                               max="<?= $product['quantity'] ?>">
                    </li>
                <?php endforeach; ?>
            </ul>
        </form>
    </div>
    </div>

<?php view('footer') ?>