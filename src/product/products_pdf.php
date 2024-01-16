<?php
require_once __DIR__ . '/../bootstrap.php';
require_once __DIR__ . '/../../fpdf/fpdf.php';

require_once 'products.php';

if (is_post_request()) {
    check_csrf_token();
    $productIDs = $_POST['productIDs'] ?? [];
    $quantities = $_POST['quantities'];
    $products = [];


    foreach ($productIDs as $productID) {
        $product = retrieveProductById($productID);
        if ($product) {
            $products[] = $product;
        }
    }

    // check for negative quantities
    if (in_array(true, array_map(function($quantity) {
        return $quantity < 0;
    }, $quantities))) {
        redirect_with_message(
            '../../public/products.php',
            'Invalid quantity. Quantities cannot be negative.',
            FLASH_WARNING
        );
    }

    //check if quantity exceed db quantity
    foreach ($quantities as $productID => $quantity) {
        $product = retrieveProductById($productID);
        if ($product && $quantity > $product['quantity']) {
            redirect_with_message(
                '../../public/products.php',
                'Quantity for ' . $product['name'] . ' exceeds available quantity',
                FLASH_WARNING
            );
        }
    }

    //check if any product selected
    if (empty($products)) {
        redirect_with_message(
            '../../public/products.php',
            'No product selected',
            FLASH_WARNING
        );
    }

    generate_products_pdf($products, $quantities ?? []);
}

function generate_products_pdf($products, $quantities): void
{
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 12);

    $pdf->SetFillColor(200, 220, 255);
    $pdf->Cell(0, 10, 'Invoice (Trial)', 0, 1, 'C', true);

    $pdf->Ln(10);

    $pdf->SetFillColor(180, 200, 255); // Light blue header background
    $pdf->SetTextColor(0);
    $pdf->Cell(80, 10, 'Product', 1, 0, 'C', true);
    $pdf->Cell(40, 10, 'Price', 1, 0, 'C', true);
    $pdf->Cell(40, 10, 'Quantity', 1, 1, 'C', true);

    foreach ($products as $product) {
        $quantity = $quantities[$product['id']] ?? 0;
        $pdf->Cell(80, 10, $product['name'], 1, 0);
        $pdf->Cell(40, 10, '$' . $product['price'], 1, 0, 'R');
        $pdf->Cell(40, 10, $quantity, 1, 1, 'C');
    }

    $total = 0;
    foreach ($products as $product) {
        $quantity = $quantities[$product['id']] ?? 0;
        $subtotal = $product['price'] * $quantity;
        $total += $subtotal;
    }

    $pdf->SetFillColor(180, 200, 255);
    $pdf->Cell(120, 10, 'Total:', 1, 0, 'R', true);
    $pdf->Cell(40, 10, '$' . number_format($total, 2), 1, 1, 'C', true);

    date_default_timezone_set(date_default_timezone_get());
    $generatedOn = date('Y-m-d H:i:s');
    date_default_timezone_set('Europe/Bucharest');
    $generatedOnRomania = date('Y-m-d H:i:s');
    $pdf->Cell(0, 10, 'Generated on: ' . $generatedOn . ' (Local Time) ' . PHP_EOL . '/ ' . $generatedOnRomania . ' (Romania Time)', 0, 1);

    $pdf->Output('invoice.pdf', 'D');
}