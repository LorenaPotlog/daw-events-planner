<?php
require __DIR__ . '/../src/bootstrap.php';
require __DIR__ . '/../src/package/services.php';
require __DIR__ . '/../src/package/services_pdf.php';

$servicesPerPage = 3;

$pageNumber = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;

$category = $_GET['category'] ?? null;

if(!($category == 'wedding' || $category == 'bachelor' || $category == null) ){
    redirect_to('services.php');
}

$offset = ($pageNumber - 1) * $servicesPerPage;

try {
    $services = retrieveServicesWithLimit($servicesPerPage, $offset, $category);
} catch (Exception $e) {
    redirect_with_message('index.php','Error');
}

try {
    $totalServices = countServices($category);
} catch (Exception $e) {
    redirect_with_message('index.php','Error');
}

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
                    <button class="button" style="width: 20%">
                        <a href='./insert_service.php' style='text-decoration: none; color: white'>Add New Packages</a></button>
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
                            <input type="hidden" name="category" value="<?= $service['category'] ?>">
                            <p style="margin-bottom: 5%"><strong>Max Guests:</strong> <?= $service['max_guests'] ?></p>

                            <?php if (is_admin()) : ?>
                                <form method="POST" action="../src/package/delete_service.php">
                                    <input type="hidden" name="service_id" value="<?= $service['id'] ?>">
                                    <input type="hidden" name="csrf_token"
                                           value="<?php echo $_SESSION['csrf_token']; ?>">
                                    <button type="submit" name="delete_service" class="delete-button">Delete</button>
                                </form>
                            <?php endif; ?>

                            <form method='POST' action="../src/package/services_pdf.php">
                                <input type="hidden" name="service_id" value="<?= $service['id'] ?>">
                                <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
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
                    <a href="?page=<?= $i ?>&name=<?= $category ?>" <?= ($i == $pageNumber) ? 'class="active"' : '' ?>><?= $i ?></a>
                <?php endfor; ?>

                <?php if ($pageNumber < $totalPages) : ?>
                    <a href="?page=<?= $pageNumber + 1 ?>&category=<?= $category ?>">Next</a>
                <?php endif; ?>
            </div>
        </div>
    </div>

<?php view('footer') ?>