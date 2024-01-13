<?php
require __DIR__ . '../bootstrap.php';
require_once 'services.php';
require('../../fpdf/fpdf.php');

if (is_post_request()) {
    $services = [];
    $serviceId = $_POST['service_id'];
    if($serviceId){
        $service = retrieveServiceById($serviceId);
        if ($service) {
            $services[] = $service;
        }
    }

    if (empty($services)) {
        $services = retrieveServices();
    }

    generate_services_pdf($services);
}

function generate_services_pdf($services): void

{
    // Instantiate and use the FPDF class
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 16);

    // Add a title
    $pdf->Cell(0, 10, 'Our offer', 0, 1, 'C');

    // Display product information in the PDF
    foreach ($services as $service) {
        $pdf->Cell(0, 10, 'Service: ' . $service['name'], 0, 1);
        $pdf->Cell(0, 10, 'Description: ' . $service['description'], 0, 1);
        $pdf->Cell(0, 10, 'Price: $' . $service['price'], 0, 1);
        $pdf->Cell(0, 10, 'More info: ' . $service['longDesc'], 0, 1);

        // Add more details as needed

        $pdf->Ln(); // Move to the next line for the next product
    }

    // Output the PDF to the browser with a filename
    $pdf->Output('service_list.pdf', 'D');
}
