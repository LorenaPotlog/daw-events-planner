<?php
require __DIR__ . '/../src/bootstrap.php';
require_once 'products.php';
require('../fpdf/fpdf.php');

if (is_post_request()) {
    $productIDs = $_POST['productIDs'] ?? [];

    if (!empty($productIDs)) {
        $products = [];
        foreach ($productIDs as $productID) {
            $product = retrieveProductById($productID);
            if ($product) {
                $products[] = $product;
            }
        }
    }

    if (empty($products)) {
        $products = retrieveProducts();
    }

    generate_products_pdf($products, $_POST['quantities'] ?? []);
}

function generate_products_pdf($products, $quantities): void
{
    // Instantiate and use the FPDF class
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 12);

    // Title
    $pdf->SetFillColor(200, 220, 255);
    $pdf->Cell(0, 10, 'Invoice (Trial)', 0, 1, 'C', true);

    // Move the table down in the page
    $pdf->Ln(10);

    // Table header with styled cells
    $pdf->SetFillColor(180, 200, 255); // Light blue header background
    $pdf->SetTextColor(0);
    $pdf->Cell(80, 10, 'Product', 1, 0, 'C', true);
    $pdf->Cell(40, 10, 'Price', 1, 0, 'C', true);
    $pdf->Cell(40, 10, 'Quantity', 1, 1, 'C', true);

    // Display product information in a table format with styled cells
    foreach ($products as $product) {
        $quantity = $quantities[$product['id']] ?? 0;
        $pdf->Cell(80, 10, $product['name'], 1, 0);
        $pdf->Cell(40, 10, '$' . $product['price'], 1, 0, 'R');
        $pdf->Cell(40, 10, $quantity, 1, 1, 'C');
    }

    // Calculate and display the total considering quantities
    $total = 0;
    foreach ($products as $product) {
        $quantity = $quantities[$product['id']] ?? 0;
        $subtotal = $product['price'] * $quantity;
        $total += $subtotal;
    }

    // Add a row for total with background color
    $pdf->SetFillColor(180, 200, 255);
    $pdf->Cell(120, 10, 'Total:', 1, 0, 'R', true);
    $pdf->Cell(40, 10, '$' . number_format($total, 2), 1, 1, 'C', true);

    // Add "Generated on" timestamp
    date_default_timezone_set(date_default_timezone_get());
    $generatedOn = date('Y-m-d H:i:s');
    date_default_timezone_set('Europe/Bucharest');
    $generatedOnRomania = date('Y-m-d H:i:s');
    $pdf->Cell(0, 10, 'Generated on: ' . $generatedOn . ' (Local Time) ' . PHP_EOL . '/ ' . $generatedOnRomania . ' (Romania Time)', 0, 1);

    // Output the PDF to the browser with a filename
    $pdf->Output('invoice.pdf', 'D');
}