<?php
require_once __DIR__ . '/../bootstrap.php';

if (is_post_request()) {
    check_csrf_token();
    $rating = isset($_POST['rating']) ? filter_var($_POST['rating'], FILTER_VALIDATE_INT, ['options' => ['min_range' => 1, 'max_range' => 5]]) : null;
    $message = isset($_POST['message']) ? filter_var($_POST['message'], FILTER_SANITIZE_STRING) : null;

    if ($rating === false) {
        redirect_with_message('../../public/leave_review.php', 'Invalid rating. Please choose between 1-5 stars.', FLASH_ERROR);
        exit;
    }

    if ($message === null) {
        redirect_with_message('../../public/leave_review.php', 'Message cannot be null.', FLASH_ERROR);
        exit;
    }

    $user_id = $_SESSION['user_id'];

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