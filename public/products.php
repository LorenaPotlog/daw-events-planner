<?php
require __DIR__ . '/../src/bootstrap.php';
require __DIR__ . '/../src/products.php';
require __DIR__ . '/../src/products_pdf.php';
require __DIR__ . '/../src/delete_product.php';
?>

<?php view('header', ['title' => 'Our Products']); ?>

    <style>
        #page-container {
            display: flex;
            flex-wrap: wrap;
        }

        #content-wrap {
            flex: 2; /* 2/3 of the page */
            padding: 20px;
        }

        .product-list {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .product-image {
            /*max-width: 100%;*/
            height: 300px;
            width: 350px /* Set a fixed height for the images */
            /*object-fit: cover; !* Maintain the aspect ratio and cover the container *!*/
        }

        .product {
            box-sizing: border-box;
            width: calc(25% - 15px); /* 4 columns with 15px margin in between */
            padding: 20px;
            border: 1px solid #ccc;
            margin-bottom: 20px;
            text-align: center;
            position: relative; /* Add relative positioning */
        }

        .product h2 {
            margin-top: 0;
        }

        .photo img {
            max-width: 100%;
            height: auto;
            margin-top: 10px;
        }

        .product-details {
            text-align: left;
        }

        /* Style for the checkbox */
        .product input[type="checkbox"] {
            position: absolute;
            top: 10px; /* Adjust top position as needed */
            right: 10px; /* Adjust right position as needed */
        }

        .pdf-form {
            flex-direction: column;
            align-items: flex-start;
            margin-left: 20px;
            margin-bottom: 30px;

        }

        .pdf-form button {
            display: block;
            padding: 10px 20px;
            margin-bottom: 20px;
            border-radius: 5px;
            text-decoration: none;
            color: #ffffff;
            background-color: #9fa9a3; /* New color */
            border: none;
            cursor: pointer;
            width: 100%; /* Make the button fill the container width */
        }

        .pdf-form ul {
            list-style: none;
            padding: 0;
            margin: 0;
            column-count: 3; /* Display in three columns */
            column-gap: 20px; /* Adjust the gap between columns as needed */
        }

        .pdf-form li {
            margin-bottom: 10px;
            break-inside: avoid; /* Avoid breaking inside the li element */
            display: flex;
            align-items: center;
            width: 40%;
        }

        .pdf-form li input[type="checkbox"] {
            margin-right: 10px;
        }

        .pdf-form li a {
            flex: 1;
            text-decoration: none;
            color: #333;
        }

        .pdf-form li input[type="number"] {
            width: 50px;
        }

        .custom-btn {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 10px;
            border-radius: 5px;
            text-decoration: none;
            color: #ffffff;
            background-color: #9fa9a3;
            border: none;
            cursor: pointer;
        }

        .custom-btn:hover {
            background-color: #23527c;
        }

        .styled-link {
            display: inline-block;
            background-color: #9fa9a3;
            color: white;
            text-align: center;
            padding: 10px 20px;
            text-decoration: none;
            cursor: pointer;
            margin-bottom: 10px;
            border-radius: 5px;
        }

        .styled-link:hover {
            background-color: #c5d5c5;
        }
    </style>

<?php if (is_seller() || is_admin()) : ?>
    <div class="admin-options">
        <!-- Admin options -->
        <button class="custom-btn"><a href='./insert_product.php' style='text-decoration: none; color: white'>Add New
                Products</a></button>
        <form method='POST' action="../src/delete_product.php" style="display: inline;">
            <button type='submit' name="delete_product" value="deleteProduct" class="custom-btn">Delete Selected
                Products
            </button>
            <?php endif ?>
            <a href="#scroll" class="styled-link">Calculate invoice <i class="fa fa-arrow-down" style="color: white"></i></a>

            <div id="Lorena" style="display: flex"
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
            <form method='POST' action="../src/products_pdf.php">
                <button type="submit" name="generate_pdf" value="generatePdf" class="custom-btn"
                        style="background-color: #9fa9a3; margin-bottom: 20px">Calculate invoice
                </button>
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