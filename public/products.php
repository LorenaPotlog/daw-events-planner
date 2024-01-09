<?php
require __DIR__ . '/../src/bootstrap.php';
require __DIR__ . '/../src/products.php';
require __DIR__ . '/../src/products_pdf.php';
require __DIR__ . '/../src/delete_product.php';

?>
<?php view('header', ['title' => 'Our Products']); ?>
    <style>
        /* Styles for buttons */
        .admin-options button,
        .pdf-form button {
            padding: 10px 20px;
            border: 2px solid black;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            margin-bottom: 10px;
        }

        .admin-options button {
            background-color: #f0f0f0;
            color: black;
            margin-right: 10px;
        }

        .pdf-form button {
            background-color: #4CAF50;
            color: white;
        }

        .pdf-form button:hover,
        .admin-options button:hover {
            opacity: 0.8;
        }
    </style>
    <div class="container">
        <?php if (is_seller() || is_admin()) : ?>
            <div class="admin-options">
                <!-- Admin options -->
                <button><a href='./insert_product.php' style='text-decoration: none; color: black;'>Add a new product</a></button>
                <form method='POST' action="../src/delete_product.php" style="display: inline;">
                    <button type='submit' name="delete_product" value="deleteProduct">Delete Selected Products</button>
                </form>
            </div>
        <?php endif; ?>

        <div class="product-list" style="float: left; width: 65%;">
            <!-- Display products -->
            <?php
            $products = retrieveProducts();
            foreach ($products as $product) : ?>
                <div class="product" style="padding: 20px; border: 1px solid #ccc; margin-bottom: 20px;">
                    <!-- Product details -->
                    <h2><a href="product_details.php?productId=<?= $product['id'] ?>"><?= $product['name'] ?></a></h2>
                    <p><strong>Description:</strong> <?= $product['description'] ?></p>
                    <p><strong>Price:</strong> $<?= $product['price'] ?></p>
                    <p><strong>Quantity:</strong> <?= $product['quantity'] ?></p>
                    <p><strong>Product id:</strong> <?= $product['id'] ?></p>
                    <?php if (is_seller() || is_admin()) : ?>
                        <input type='checkbox' name='productIDs[]' value='<?= $product['id'] ?>'>
                    <?php endif; ?>
                    <?php if (!empty($product['image'])) : ?>
                        <div class="photo">
                            <img src="data:image/jpeg;base64,<?= base64_encode($product['image']) ?>" alt="Product Photo">
                        </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="pdf-form">
            <!-- PDF generation form -->
            <form method='POST' action="../src/products_pdf.php">
                <button type="submit" name="generate_pdf" value="generatePdf">Calculate invoice</button>
                <ul>
                    <?php foreach ($products as $product) : ?>
                        <li>
                            <input type='checkbox' name='productIDs[]' value='<?= $product['id'] ?>'>
                            <a href="product_details.php?productId=<?= $product['id'] ?>">
                                <?= $product['name'] ?>
                            </a>
                            <input type="number" name="quantities[<?= $product['id'] ?>]" value="1" min="1" max="<?= $product['quantity'] ?>">
                        </li>
                    <?php endforeach; ?>
                </ul>
            </form>
        </div>
    </div>

<?php view('footer') ?>