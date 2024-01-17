<?php
require __DIR__ . '/../bootstrap.php';
require_once __DIR__ . '/../../fpdf/fpdf.php';
require_once 'services.php';

if (is_post_request()) {
    check_csrf_token();
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
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 16);

    $pdf->Cell(0, 10, 'Our offer', 0, 1, 'C');

    foreach ($services as $service) {
        $pdf->Cell(0, 10, 'Service: ' . $service['name'], 0, 1);
        $pdf->Cell(0, 10, 'Description: ' . $service['description'], 0, 1);
        $pdf->Cell(0, 10, 'Price: $' . $service['price'], 0, 1);
        $wrappedText = wordwrap($service['longDesc'], 60, "\n", true);
        $pdf->MultiCell(0, 10, 'More info: ' . $wrappedText);


        $pdf->Ln();
    }

    $pdf->Output('service_list.pdf', 'D');
}
