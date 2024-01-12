<?php
require __DIR__ . '/../src/bootstrap.php';
require_once 'products.php';
require('../fpdf/fpdf.php');

if (is_post_request()) {
    $products = [];
    foreach ($_POST['productIDs'] as $productID) {
        $product = retrieveProductById($productID);
        if ($product) {
            $products[] = $product;
        }
    }

    if (empty($products)) {
        $products = retrieveProducts();
    }

    generate_products_pdf($products);
}

function generate_products_pdf($products): void
{

    // Instantiate and use the FPDF class
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 16);

    // Add a title
    $pdf->Cell(0, 10, 'Product List', 0, 1, 'C');

    // Display product information in the PDF
    foreach ($products as $product) {
        $pdf->Cell(0, 10, 'Product: ' . $product['name'], 0, 1);
        $pdf->Cell(0, 10, 'Description: ' . $product['description'], 0, 1);
        $pdf->Cell(0, 10, 'Price: $' . $product['price'], 0, 1);
        $pdf->Cell(0, 10, 'Quantity: ' . $product['quantity'], 0, 1);
        // Add more details as needed

        $pdf->Ln(); // Move to the next line for the next product
    }

    // Output the PDF to the browser with a filename
    $pdf->Output('product_list.pdf', 'D');
}
