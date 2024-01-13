<?php
require_once __DIR__ . '/../bootstrap.php';


if (is_post_request()) {
    $rating = isset($_POST['rating']) ? intval($_POST['rating']) : null;
    $message = isset($_POST['message']) ? htmlspecialchars($_POST['message']) : null;

    $user_id = $_SESSION['user_id'];

    //validate the data

    $db = getDBConnection();

    $sql = "INSERT INTO reviews (user_id, stars, message) VALUES (?, ?, ?)";
    $stmt = $db->prepare($sql);
    $stmt->bind_param('iis', $user_id, $rating, $message);

    if ($stmt->execute()) {
        redirect_with_message('../../public/leave_review.php', 'Review submitted successfully!');
    } else {
        redirect_with_message('../../public/leave_review.php', 'We cannot process your review. Please try again', FLASH_ERROR);
    }

    $stmt->close();
    $db->close();
}
