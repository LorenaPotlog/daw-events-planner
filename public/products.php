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

    <div style="display: flex"
    <div id="page-container" style="width: 50%">
        <div id="content-wrap">
            <form method="GET" action="#">
                <label for="sort">Sort by Price:</label>
                <select name="sort" id="sort">
                    <option value="asc" <?= ($_GET['sort'] ?? '') === 'asc' ? 'selected' : '' ?>>Ascending</option>
                    <option value="desc" <?= ($_GET['sort'] ?? '') === 'desc' ? 'selected' : '' ?>>Descending</option>
                </select>
                <button type="submit" style="width: 10%">Apply</button>
                <a href="#scroll" class="styled-link" style="display:inline; width: 30%; background-color: darkslategrey">Calculate invoice <i class="fa fa-arrow-down" style="color: white"></i></a>
            </form>

            <?php if (is_seller() || is_admin()) : ?>
            <div class="admin-options">
                <button class="button" style="width: 25%;"><a href='./insert_product.php' style='text-decoration: none; color: white'>Add New
                        Products</a></button>
                <form method='POST' action="../src/product/delete_product.php" style="display: inline;">
                    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                    <button type='submit' name="delete_product" value="deleteProduct" class="button" style="width: 25%;">Delete Selected
                        Products
                    </button>
                    <?php endif ?>
            <div class="product-list">

                <!-- Display products -->
                <?php
                $sortOrder = isset($_GET['sort']) && ($_GET['sort'] === 'asc' || $_GET['sort'] === 'desc') ? $_GET['sort'] : 'asc';
                $products = retrieveProducts($sortOrder);
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
                            <img src="<?= $imageSource ?>" alt="Product Photo" id="product-image">
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
            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
        </form>
    </div>
    </div>

<?php view('footer') ?>