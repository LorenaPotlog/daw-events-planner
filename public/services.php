<?php
require __DIR__ . '/../src/bootstrap.php';
require __DIR__ . '/../src/package/services.php';
require __DIR__ . '/../src/package/services_pdf.php';

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
        <?php include 'css/services.css' ?>
    </style>
    <div id="page-container">
        <div id="content-wrap">
            <?php if (is_admin()) : ?>
                <div class="admin-options">
                    <!-- Admin options -->
                    <button class="button" style="width: 20%"><a href='./insert_service.php'
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
                            <p style="margin-bottom: 5%"><strong>Max Guests:</strong> <?= $service['max_guests'] ?></p>


                            <?php if (is_admin()) : ?>
                                <!-- Form for delete button visible only to admins -->
                                <form method="POST" action="../src/package/delete_service.php">
                                    <input type="hidden" name="service_id" value="<?= $service['id'] ?>">
                                    <button type="submit" name="delete_service" class="delete-button">Delete</button>
                                </form>
                            <?php endif; ?>

                            <form method='POST' action="../src/package/services_pdf.php">
                                <input type="hidden" name="service_id" value="<?= $service['id'] ?>">
                                <button type="submit" name="generate_service_pdf" value="<?= $service['id'] ?>"
                                        style="width: 60%; position: absolute; bottom: 0;
            left: 5px;">More details (PDF)
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