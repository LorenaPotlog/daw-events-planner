<?php
require __DIR__ . '/../src/bootstrap.php';
require __DIR__ . '/../src/services.php';
require __DIR__ . '/../src/services_pdf.php';
?>

<?php view('header', ['title' => 'Our Services']); ?>

    <style>
        #page-container {
            position: relative;
            min-height: 100vh;
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

        /* Style for the checkbox */
        .service input[type="checkbox"] {
            position: absolute;
            top: 10px; /* Adjust top position as needed */
            right: 10px; /* Adjust right position as needed */
        }

        .pdf-form {
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
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
    </style>

<?php if (is_seller() || is_admin()) : ?>
    <div class="admin-options">
        <!-- Admin options -->
<!--        <button class="custom-btn"><a href='./insert_service.php' style='text-decoration: none; color: white'>Add a new service</a></button>-->
    </div>
<?php endif; ?>

    <div id="page-container">
        <div id="content-wrap">
            <div class="pdf-form">
                <form method='POST' action="../src/services_pdf.php">
                    <button type="submit" name="generate_services_pdf" >Download all offers</button>
                </form>
            </div>

            <div class="service-list">
                <!-- Display services -->
                <?php
                $services = retrieveServices();
                foreach ($services as $service) : ?>
                    <div class="service">
                        <!-- Service details -->
                        <h2><?= $service['name'] ?></h2>
                        <?php if (!empty($service['image'])) : ?>
                            <div class="photo">
                                <img src="data:image/jpeg;base64,<?= base64_encode($service['image']) ?>" alt="Service Photo">
                            </div>
                        <?php endif; ?>
                        <div class="service-details">
                            <p><strong>Description:</strong> <?= $service['description'] ?></p>
                            <p><strong>Price:</strong> $<?= $service['price'] ?></p>
                            <p><strong>Menu Types:</strong> <?= $service['menu_types'] ?></p>
                            <p><strong>Max Guests:</strong> <?= $service['max_guests'] ?></p>
<!--                            --><?php //if (is_seller() || is_admin()) : ?>
<!--                                <input type='checkbox' name='serviceIDs[]' value='--><?//= $service['id'] ?><!--'>-->
<!--                            --><?php //endif; ?>
                            <form method='POST' action="../src/services_pdf.php">
                                <input type="hidden" name="service_id" value="<?= $service['id'] ?>">
                                <button type="submit" name="generate_service_pdf" value="<?= $service['id'] ?>" style='margin-top: 20px;'>More details (PDF)</button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

<?php view('footer') ?>