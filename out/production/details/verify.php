<?php

require __DIR__ . '/../src/bootstrap.php';

$db = getDBConnection();

if (isset($_GET['code'])) {
    $code = $_GET['code'];

    // Update user status to verified
    $sql = "UPDATE users SET verified = 1 WHERE MD5(email) = '$code'";

    if ($db->query($sql) === TRUE) {
        echo "Email verified successfully.";
    } else {
        echo "Error verifying email: " . $db->error;
    }
}

// Close database connection (same as before)
