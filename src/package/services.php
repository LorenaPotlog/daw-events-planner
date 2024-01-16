<?php
require __DIR__ . '/../bootstrap.php';

function retrieveServices(): array
{
    $db = getDBConnection();

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

function retrieveServiceById($serviceId)
{
    $db = getDBConnection();

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
            'price' => htmlspecialchars($row["price"]),
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

function retrieveServicesWithLimit($limit, $offset, $category): array
{
    $db = getDBConnection();

    $query = "SELECT * FROM package";

    if (!empty($category)) {
        $query .= " WHERE category = ?";
    }

    $query .= " LIMIT ? OFFSET ?";

    $services = [];

    try {
        $stmt = $db->prepare($query);

        if (!empty($category)) {
            $stmt->bind_param('sii', $category, $limit, $offset);
        } else {
            $stmt->bind_param('ii', $limit, $offset);
        }

        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $service = [
                    'id' => htmlspecialchars($row["id"]),
                    'name' => htmlspecialchars($row["name"]),
                    'description' => htmlspecialchars($row["description"]),
                    'price' => htmlspecialchars($row["price"]),
                    'menu_types' => htmlspecialchars($row["menu_types"]),
                    'max_guests' => htmlspecialchars($row["max_guests"]),
                    'category' => htmlspecialchars($row["category"])
                ];

                $services[] = $service;
            }
        }

        $stmt->close();
    } catch (Exception $e) {
        // Handle exceptions (log or rethrow)
        throw new Exception("Error retrieving services: " . $e->getMessage());
    } finally {
        $db->close();
    }

    return $services;
}

function countServices( $category = ''): int
{
    $db = getDBConnection();

    $query = "SELECT COUNT(*) as count FROM package";

    $whereClause = '';

    if (!empty($category)) {
        $whereClause .= (!empty($whereClause) ? " AND" : "") . " category = ?";
    }

    if (!empty($whereClause)) {
        $query .= " WHERE" . $whereClause;
    }

    $count = 0;

    try {
        $stmt = $db->prepare($query);

        $paramCount = 0;

        if (!empty($category)) {
            $stmt->bind_param("s", $category);
            $paramCount++;
        }

        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $count = $row['count'];
        }

        $stmt->close();
    } catch (Exception $e) {
        // Handle exceptions (log or rethrow)
        throw new Exception("Error counting services: " . $e->getMessage());
    } finally {
        $db->close();
    }

    return $count;
}

function insertService($name, $description, $price, $menu_types, $max_guests, $long_description, $serviceImage, $category): string
{
    $db = getDBConnection();

    $stmt = $db->prepare("INSERT INTO package (name, description, price, menu_types, max_guests, longDesc, image, category) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

    if (!$stmt) {
        return "Error in prepared statement: " . $db->error;
    }

    $stmt->bind_param("ssissbss", $name, $description, $price, $menu_types, $max_guests, $long_description, $serviceImage, $category);
    $stmt->execute();

    $affected_rows = $stmt->affected_rows;
    if ($stmt->affected_rows > 0) {
        $stmt->close();
        $db->close();
        return $affected_rows . " package inserted into the database.";
    } else {
        $stmt->close();
        $db->close();
        return "An error has occurred. The package was not added.";
    }
}

