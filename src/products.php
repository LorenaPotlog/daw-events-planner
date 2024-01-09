<?php
//require('../fpdf/fpdf.php');

function retrieveProductById($productId) {
    $db = getDBConnection(); // Get database connection

    $productId = intval($productId);

    $query = "SELECT * FROM products WHERE id = ?";
    $stmt = $db->prepare($query);

    if (!$stmt) {
        return null; // Or handle the error as required
    }

    $stmt->bind_param("i", $productId);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $product = [
            'name' => htmlspecialchars($row["name"]),
            'description' => htmlspecialchars($row["description"]),
            'price' => htmlspecialchars($row["price"]),
            'quantity' => htmlspecialchars($row["quantity"]),
            'id' => htmlspecialchars($row["id"]),
            'image' => $row["image"],
            'longDesc' => $row["longDesc"]
        ];

        $stmt->close();
        $db->close();

        return $product; // Return the retrieved product details
    } else {
        $stmt->close();
        $db->close();
        return null; // Product not found with the given ID
    }
}

function retrieveProducts() {
    $db = getDBConnection(); // Get database connection

    $query = "SELECT * FROM products";

    // Prepare the statement
    if ($stmt = $db->prepare($query)) {
        // Execute the statement
        $stmt->execute();

        // Get result set
        $result = $stmt->get_result();

        $products = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $product = [
                    'name' => htmlspecialchars($row["name"]),
                    'description' => htmlspecialchars($row["description"]),
                    'price' => htmlspecialchars($row["price"]),
                    'quantity' => htmlspecialchars($row["quantity"]),
                    'id' => htmlspecialchars($row["id"]),
                    'image' => $row["image"],
                    'longDesc' => $row["longDesc"]

                ];

//                if (!empty($row["photo"])) {
//                    $basePhotoURL = "resources/photos/";
//                    $photoName = $row["photo"];
//                    $fullPhotoURL = $basePhotoURL . $photoName;
//                    $product['photo'] = htmlspecialchars($fullPhotoURL);
//                }

                $products[] = $product;
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

    return $products;
}

function insertProduct($name, $description, $price, $quantity, $userID,$productImage) {
    $db = getDBConnection(); // Retrieve the database connection

    $name = htmlspecialchars(trim($name));
    $description = htmlspecialchars(trim($description));
    $price = floatval($price);
    $quantity = intval($quantity);
    $userID = intval($userID);

    if (empty($name) || empty($description) || empty($price) || empty($quantity)) {
        return "All fields are required.";
    }

    $query = "INSERT INTO products (name, description, price, quantity, user_id, image) VALUES (?, ?, ?, ?, ?,?)";
    $stmt = $db->prepare($query);

    if (!$stmt) {
        return "Error: Couldn't prepare the statement.";
    }

    $stmt->bind_param("ssdiis", $name, $description, $price, $quantity, $userID,$productImage);
    $stmt->execute();

    $affected_rows =  $stmt->affected_rows;
    if ($stmt->affected_rows > 0) {
        $stmt->close();
        $db->close();
        return $affected_rows . " product inserted into the database.";
    } else {
        $stmt->close();
        $db->close();
        return "An error has occurred. The item was not added.";
    }
}

function deleteProduct($productID) {
    $db = getDBConnection(); // Get database connection

//    // Sanitize the input
//    $productID = intval($productID);

    // Prepare the delete statement
    $query = "DELETE FROM products WHERE id = ?";
    $stmt = $db->prepare($query);

    if (!$stmt) {
        echo "Error: Couldn't prepare the statement.";
    }

    // Bind the productID parameter
    $stmt->bind_param("i", $productID);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        $stmt->close();
        $db->close();
        echo "Product with ID {$productID} deleted successfully.";
    } else {
        $stmt->close();
        $db->close();
    }
}

function hasProduct($productID, $userID) {
    $db = getDBConnection(); // Get database connection

    $productID = intval($productID);
    $userID = intval($userID);

    $query = "SELECT COUNT(*) as count FROM products WHERE id = ? AND user_id = ?";
    $stmt = $db->prepare($query);

    if (!$stmt) {
        return "Error: Couldn't prepare the statement.";
    }

    $stmt->bind_param("ii", $productID, $userID);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();

    $db->close();

    return $count > 0; // Returns true if the product exists for the user, otherwise false
}

//function generateProductsPdf($products)
//{
//
//    // Instantiate and use the FPDF class
//    $pdf = new FPDF();
//    $pdf->AddPage();
//    $pdf->SetFont('Arial', 'B', 16);
//
//    // Add a title
//    $pdf->Cell(0, 10, 'Product List', 0, 1, 'C');
//
//    // Display product information in the PDF
//    foreach ($products as $product) {
//        $pdf->Cell(0, 10, 'Product: ' . $product['name'], 0, 1);
//        $pdf->Cell(0, 10, 'Description: ' . $product['description'], 0, 1);
//        $pdf->Cell(0, 10, 'Price: $' . $product['price'], 0, 1);
//        $pdf->Cell(0, 10, 'Quantity: ' . $product['quantity'], 0, 1);
//        // Add more details as needed
//
//        $pdf->Ln(); // Move to the next line for the next product
//    }
//
//    // Output the PDF to the browser with a filename
//    $pdf->Output('product_list.pdf', 'D');
//}
//
//if (isset($_POST['generateProductsPdf'])) {
//    generateProductsPdf(retrieveProducts());
//}
//
