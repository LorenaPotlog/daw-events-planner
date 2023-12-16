<?php
require('../fpdf/fpdf.php');

//function generateDoc()
//{
//    // Instantiate and use the FPDF class
//    $pdf = new FPDF();
//
//    // Add a new page
//    $pdf->AddPage();
//
//    // Set the font for the text
//    $pdf->SetFont('Arial', 'B', 18);
//
//    // Prints a cell with given text
//    $pdf->Cell(60, 20, 'Hello GeeksforGeeks!');
//
//    // Output the PDF to the browser with a filename
//    $pdf->Output('output.pdf', 'D');
//}
//
//// Call the PDF generation function only if the form is submitted
//if (isset($_POST['generatePDF'])) {
//    generateDoc();
//}

function generate_products_pdf($products)
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

if (isset($_POST['generate_products_pdf'])) {
    generate_products_pdf(retrieveProducts());
}


?>