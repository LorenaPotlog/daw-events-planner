<?php
require_once __DIR__ . '/../bootstrap.php';


if (is_post_request()) {
    // Process the form submission
    $rating = isset($_POST['rating']) ? intval($_POST['rating']) : null;
    $message = isset($_POST['message']) ? htmlspecialchars($_POST['message']) : null;

    // Get the user ID from the session
    $user_id = $_SESSION['user_id'];

    // Validate the data (add your validation logic here)

    // Insert the review into the database
    $db = getDBConnection();
    $sql = "INSERT INTO reviews (user_id, stars, message) VALUES (?, ?, ?)";
    $stmt = $db->prepare($sql);
    $stmt->bind_param('iis', $user_id, $rating, $message);

    // Execute the statement
    if ($stmt->execute()) {
        // Redirect to the desired page with a success message
        redirect_with_message('../../public/leave_review.php', 'Review submitted successfully!');
    } else {
        // Handle the error (you might want to log it or display an error message)
        echo "Error: " . $stmt->error;
    }

    // Close the statement and database connection
    $stmt->close();
    $db->close();
}
?>