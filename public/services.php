<?php

require __DIR__ . '/../src/bootstrap.php';
require __DIR__ . '/../src/services.php';
require __DIR__ . '/../src/services_pdf.php';

//TODO: only show download all if on services page?
?>

<?php view('header', ['title' => 'Our Services']); ?>
<?php

session_start();
?>
    <form method='POST' action="../src/services_pdf.php">
        <button type="submit" name="generate_services_pdf" value="" style='margin-top: 20px;'>Download all offers</button>
    </form>
<?php
if (is_user_logged_in() && is_admin()) {
    ?>
<!--    <button style='color: black; margin-top: 60px; border: 2px solid black; text-align: center; font-size: 14px; font-weight: bold; border-radius: 20px; background-color: #f0f0f0; display: inline-block;'>-->
<!--        <a href='#' style='color: black; text-decoration: underline;'>Add a new package</a></button>-->
    <?php
}
?>
    <form method="GET" action="">
        <label>Filter by Menu Type:</label>
        <select name="menu_type">
            <option value="">All</option>
            <option value="Vegetarian">Vegetarian</option>
            <option value="Non-Vegetarian">Non-Vegetarian</option>
        </select>
        <input type="submit" value="Filter">
    </form>

    <form method="GET" action="">
        <label>Sort by Price:</label>
        <select name="sort">
            <option value="ASC">Low to High</option>
            <option value="DESC">High to Low</option>
        </select>
        <input type="submit" value="Sort">
    </form>

    <div style="display: flex; flex-wrap: wrap; gap: 20px; margin-top: 20px;">
        <?php  $services = retrieveServices();
foreach ($services as $service) {
    ?>
    <div class="service" style="padding: 50px">
        <h2><?= $service['name'] ?></h2>
        <p><strong>Description:</strong> <?= $service['description'] ?></p>
        <p><strong>Price:</strong> $<?= $service['price'] ?></p>
        <p><strong>Menu Types:</strong> <?= $service['menu_types'] ?></p>
        <p><strong>Max Guests:</strong> <?= $service['max_guests'] ?></p>
        <?php if (!empty($service['image'])) : ?>
            <div class="photo">
                <img src="data:image/jpeg;base64,<?= base64_encode($service['image']) ?>" alt="Product Photo">
            </div>
        <?php endif; ?>
        <form method='POST' action="../src/services_pdf.php">
            <input type="hidden" name="service_id" value="<?= $service['id'] ?>">
            <button type="submit" name="generate_service_pdf" value="<?= $service['id'] ?>" style='margin-top: 20px;'>More details (PDF)</button>
        </form>
    </div>

 <?php
    }
?>

<?php view('footer') ?>