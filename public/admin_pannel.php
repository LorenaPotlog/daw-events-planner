<?php
require __DIR__ . '/../src/bootstrap.php';
require __DIR__ . '/../src/services.php';
?>

<?php view('header', ['title' => 'Our Services']); ?>

    <form method="post" action="../src/documents.php"> <!-- Submit the form to the document.php file -->
        <button type="submit" name="generatePDF" style='color: black; margin-top: 20px; border: 2px solid black; text-align: center; font-size: 14px; font-weight: bold; border-radius: 20px; background-color: #f0f0f0; display: inline-block;'>
            Generate PDF
        </button>
    </form>

<?php view('footer') ?>