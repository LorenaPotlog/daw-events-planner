<?php
require __DIR__ . '/../src/bootstrap.php';

?>


<?php view('header', ['title' => 'Book a consultation with us']); ?>
<h1>Book Your Time Slot</h1>

    <style>
        #page-container {
            position: relative;
            min-height: 62vh;
        }

        #content-wrap {
            padding-bottom: 2.5rem; /* Footer height */
        }
    </style>
    <div id="page-container">
        <div id="content-wrap">

<p>Welcome! Click <a href="https://www.picktime.com/a8fbc788-13ae-47b7-9abd-e324ad177323" style="font-weight: bolder">here</a> to book your time slot.</p>

<p>Or scan the QR code below or click the link to book your time slot.</p>
    <img src="../resources/slideshow/QR.jpg" alt="QR Code" style="width: 300px; height: 300px;">
        </div>
    </div>

<?php view('footer') ?>