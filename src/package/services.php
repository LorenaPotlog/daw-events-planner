<?php
require __DIR__ . '/../bootstrap.php';

function retrieveServices(): array
{
    $db = new mysqli('localhost', 'root', '', 'details');

    $filter_menu_type = $_GET['menu_type'] ?? '';
    $sort_order = $_GET['sort'] ?? 'ASC';

    $query = "SELECT * FROM package";

    // Apply filters if selected
    if (!empty($filter_menu_type)) {
        $query .= " WHERE menu_types = ?";
    }

    // Apply sorting
    $query .= " ORDER BY price " . $sort_order;

    // Prepare the statement
    if ($stmt = $db->prepare($query)) {
        // Bind parameter if filter_menu_type is not empty
        if (!empty($filter_menu_type)) {
            $stmt->bind_param("s", $filter_menu_type);
        }

        // Execute the statement
        $stmt->execute();

        // Get result set
        $result = $stmt->get_result();

        $services = [];

        if ($result->num_rows > 0) {
            // Fetch data and store in services array
            while ($row = $result->fetch_assoc()) {
                $service = [
                    'id' => htmlspecialchars($row["id"]),
                    'name' => htmlspecialchars($row["name"]),
                    'description' => htmlspecialchars($row["description"]),
                    'price' => htmlspecialchars($row["price"]),
                    'menu_types' => htmlspecialchars($row["menu_types"]),
                    'max_guests' => htmlspecialchars($row["max_guests"])
                    // Add other fields as needed
                ];

                $services[] = $service;
            }
        } else {
            echo "0 results";
        }

        // Close statement
        $stmt->close();
    } else {
        echo "Error in prepared statement";
    }

    $db->close();

    if (isset($_GET['name'])) {
        $nameFilter = $_GET['name'];
        $services = array_filter($services, function ($service) use ($nameFilter) {
            return stripos($service['name'], $nameFilter) !== false;
        });
    }

    return $services;
}

function retrieveServiceById($serviceId) {
    $db = new mysqli('localhost', 'root', '', 'details');

    $serviceId = intval($serviceId);

    $query = "SELECT * FROM package WHERE id = ?";
    $stmt = $db->prepare($query);

    if (!$stmt) {
        return null; // Or handle the error as required
    }

    $stmt->bind_param("i", $serviceId);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $service = [
                'id' => htmlspecialchars($row["id"]),
            'name' => htmlspecialchars($row["name"]),
            'description' => htmlspecialchars($row["description"]),
//            'price' => htmlspecialchars($row["price"]),
//            'quantity' => htmlspecialchars($row["menu_types"]),
//            'id' => htmlspecialchars($row["max_guests"]),
            'longDesc' => $row["longDesc"]
        ];

        $stmt->close();
        $db->close();

        return $service; // Return the retrieved product details
    } else {
        $stmt->close();
        $db->close();
        return null; // Product not found with the given ID
    }
}

function displayServices(): void
{
    $services = retrieveServices();
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
        </div>
        <?php
    }
}

function retrieveServicesWithLimit($limit, $offset): array
{
    $db = new mysqli('localhost', 'root', '', 'details');

    $filter_menu_type = $_GET['menu_type'] ?? '';
    $sort_order = $_GET['sort'] ?? 'ASC';

    $query = "SELECT * FROM package";

    // Apply filters if selected
    if (!empty($filter_menu_type)) {
        $query .= " WHERE menu_types = ?";
    }

    // Apply sorting
    $query .= " ORDER BY price " . $sort_order;

    // Add LIMIT and OFFSET for pagination
    $query .= " LIMIT ? OFFSET ?";

    // Prepare the statement
    if ($stmt = $db->prepare($query)) {
        // Bind parameters
        if (!empty($filter_menu_type)) {
            $stmt->bind_param("si", $filter_menu_type, $limit);
        } else {
            $stmt->bind_param("ii", $limit, $offset);
        }

        // Execute the statement
        $stmt->execute();

        // Get result set
        $result = $stmt->get_result();

        $services = [];

        if ($result->num_rows > 0) {
            // Fetch data and store in services array
            while ($row = $result->fetch_assoc()) {
                $service = [
                    'id' => htmlspecialchars($row["id"]),
                    'name' => htmlspecialchars($row["name"]),
                    'description' => htmlspecialchars($row["description"]),
                    'price' => htmlspecialchars($row["price"]),
                    'menu_types' => htmlspecialchars($row["menu_types"]),
                    'max_guests' => htmlspecialchars($row["max_guests"])
                    // Add other fields as needed
                ];

                $services[] = $service;
            }
        } else {
            echo "0 results";
        }

        // Close statement
        $stmt->close();
    } else {
        echo "Error in prepared statement";
    }

    if (isset($_GET['name'])) {
        $nameFilter = $_GET['name'];
        $services = array_filter($services, function ($service) use ($nameFilter) {
            return stripos($service['name'], $nameFilter) !== false;
        });
    }

    $db->close();

    return $services;
}

function countServices(): int
{
    $db = new mysqli('localhost', 'root', '', 'details');

    $filter_menu_type = $_GET['menu_type'] ?? '';

    $query = "SELECT COUNT(*) as count FROM package";

    // Apply filters if selected
    if (!empty($filter_menu_type)) {
        $query .= " WHERE menu_types = ?";
    }

    // Prepare the statement
    if ($stmt = $db->prepare($query)) {
        // Bind parameter if filter_menu_type is not empty
        if (!empty($filter_menu_type)) {
            $stmt->bind_param("s", $filter_menu_type);
        }

        // Execute the statement
        $stmt->execute();

        // Get result set
        $result = $stmt->get_result();

        $count = 0;

        if ($result->num_rows > 0) {
            // Fetch data and store the count
            $row = $result->fetch_assoc();
            $count = $row['count'];
        } else {
            echo "0 results";
        }

        // Close statement
        $stmt->close();
    } else {
        echo "Error in prepared statement";
    }

    $db->close();

    return $count;
}

function insertService($name, $description, $price, $menu_types, $max_guests, $long_description, $serviceImage): string
{
    $db = new mysqli('localhost', 'root', '', 'details');

    // Prepare the statement
    $stmt = $db->prepare("INSERT INTO package (name, description, price, menu_types, max_guests, longDesc, image) VALUES (?, ?, ?, ?, ?, ?, ?)");

    if (!$stmt) {
        return "Error in prepared statement: " . $db->error;
    }

    // Check if the image is uploaded
    if ($serviceImage) {
        // If image is uploaded, bind the image parameter
        $stmt->bind_param("ssissbs", $name, $description, $price, $menu_types, $max_guests, $long_description, $serviceImage);
    } else {
        // If image is not uploaded, set image parameter to NULL
        $nullValue = null;
        $stmt->bind_param("ssissb", $name, $description, $price, $menu_types, $max_guests, $long_description, $nullValue);
    }

    // Execute the statement
    $stmt->execute();

    // Check for errors
    if ($stmt->error) {
        return "Error executing statement: " . $stmt->error;
    }

    // Get the ID of the inserted service
    $serviceId = $stmt->insert_id;

    // Close statement
    $stmt->close();

    $db->close();

    return "Service successfully inserted into the database with ID: " . $serviceId;
}

