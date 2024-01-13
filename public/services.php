<?php
require __DIR__ . '/../src/bootstrap.php';
require __DIR__ . '/../src/services.php';
require __DIR__ . '/../src/services_pdf.php';

// Define the number of services to display per page
$servicesPerPage = 3;

// Get the current page number from the URL, default to 1 if not set
$pageNumber = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;

// Calculate the offset for the services retrieval based on the page number
$offset = ($pageNumber - 1) * $servicesPerPage;

// Retrieve a limited number of services based on the page number and services per page
$services = retrieveServicesWithLimit($servicesPerPage, $offset);

// Calculate the total number of services for pagination
$totalServices = countServices(); // You need to implement a countServices function

// Calculate the total number of pages
$totalPages = ceil($totalServices / $servicesPerPage);
?>

<?php view('header', ['title' => 'Our Services']); ?>

    <style>
        #page-container {
            position: relative;
        }

        .service-list {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 20px;
        }

        .service {
            box-sizing: border-box;
            width: calc(33.33% - 20px); /* 3 columns with 20px margin in between */
            padding: 50px;
            border: 1px solid #ccc;
            margin-bottom: 20px;
            text-align: center;
            position: relative;
        }

        .delete-button {
            position: absolute;
            bottom: 5px;
            right: 5px;
            background-color: rgba(231, 76, 60, 0.8); /* Use rgba with the desired transparency (0.8 in this case) */
            color: #fff;
            border: none;
            padding: 5px 10px;
            border-radius: 3px;
            cursor: pointer;
            width: 30%;
        }

        .service h2 {
            margin-top: 0;
        }

        .photo img {
            max-width: 100%;
            height: auto;
            margin-top: 10px;
        }

        .service-details {
            text-align: left;
        }

        .pdf-form {
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .admin-options {
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .pdf-form ul {
            list-style: none;
            padding: 0;
            margin: 0; /* Remove default margin for the list */
        }

        .pdf-form li {
            margin-bottom: 10px;
            display: flex;
            align-items: center;
        }

        .pdf-form li input[type="checkbox"] {
            margin-right: 10px;
        }

        .pdf-form li a {
            flex: 1; /* Make the name take remaining space */
            text-decoration: none;
            color: #333; /* Adjust text color as needed */
        }

        .pdf-form li input[type="number"] {
            width: 50px;
            /* You can add additional styling if needed */
        }

        .pagination {
            margin-top: 20px;
            display: flex;
            justify-content: center;
        }

        .pagination a {
            padding: 10px;
            margin: 0 5px;
            border: 1px solid #ccc;
            text-decoration: none;
            color: #333;
            border-radius: 5px;
        }

        .pagination a.active {
            background-color: #9fa9a3;
            color: #fff;
        }

        .pagination a:hover {
            background-color: #23527c;
            color: #fff;
        }
    </style>
    <div id="page-container">
        <div id="content-wrap">
            <?php if (is_admin()) : ?>
                <div class="admin-options">
                    <!-- Admin options -->
                    <button class="button"><a href='./insert_service.php'
                                                  style='text-decoration: none; color: white'>Add New
                            Packages</a></button>
                </div>
            <?php endif; ?>

            <div class="service-list">
                <!-- Display services -->
                <?php foreach ($services as $service) : ?>
                    <div class="service">
                        <!-- Service details -->
                        <h2><?= $service['name'] ?></h2>
                        <?php if (!empty($service['image'])) : ?>
                            <div class="photo">
                                <img src="data:image/jpeg;base64,<?= base64_encode($service['image']) ?>"
                                     alt="Service Photo">
                            </div>
                        <?php endif; ?>
                        <div class="service-details">
                            <p><strong>Description:</strong> <?= $service['description'] ?></p>
                            <p><strong>Price:</strong> $<?= $service['price'] ?></p>
                            <p><strong>Menu Types:</strong> <?= $service['menu_types'] ?></p>
                            <p><strong>Max Guests:</strong> <?= $service['max_guests'] ?></p>
                            <!--                            --><?php //if (is_seller() || is_admin()) : ?>
                            <!--                                <input type='checkbox' name='serviceIDs[]' value='-->
                            <? //= $service['id'] ?><!--'>-->
                            <!--                            --><?php //endif; ?>
                            <?php if (is_admin()) : ?>
                                <!-- Form for delete button visible only to admins -->
                                <form method="POST" action="../src/delete_service.php">
                                    <input type="hidden" name="service_id" value="<?= $service['id'] ?>">
                                    <button type="submit" name="delete_service" class="delete-button">Delete</button>
                                </form>
                            <?php endif; ?>

                            <form method='POST' action="../src/services_pdf.php">
                                <input type="hidden" name="service_id" value="<?= $service['id'] ?>">
                                <button type="submit" name="generate_service_pdf" value="<?= $service['id'] ?>"
                                        style='margin-top: 20px;'>More details (PDF)
                                </button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="pagination">
                <?php if ($pageNumber > 1) : ?>
                    <a href="?page=<?= $pageNumber - 1 ?>">Previous</a>
                <?php endif; ?>

                <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                    <a href="?page=<?= $i ?>" <?= ($i == $pageNumber) ? 'class="active"' : '' ?>><?= $i ?></a>
                <?php endfor; ?>

                <?php if ($pageNumber < $totalPages) : ?>
                    <a href="?page=<?= $pageNumber + 1 ?>">Next</a>
                <?php endif; ?>
            </div>
        </div>
    </div>

<?php view('footer') ?>