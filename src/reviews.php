<?php
function retrieveReviews()
{
    $db = getDBConnection(); // Get database connection

    $query = "SELECT reviews.user_id, users.firstname, users.photo, reviews.message, reviews.stars FROM reviews
              JOIN users ON reviews.user_id = users.id";

    // Prepare the statement
    if ($stmt = $db->prepare($query)) {
        // Execute the statement
        $stmt->execute();

        // Get result set
        $result = $stmt->get_result();

        $reviews = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $review = [
                    'reviewer_id' => htmlspecialchars($row["user_id"]),
                    'reviewer_name' => htmlspecialchars($row["firstname"]),
                    'photo' => $row["photo"],
                    'review_text' => htmlspecialchars($row["message"]),
                    'stars' => $row["stars"],
                ];
                $reviews[] = $review;
            }
        } else {
            echo "0 results";
        }

        // Close statement
        $stmt->close();
    } else {
        echo "Error in prepared statement";
    }

    $db->close();

    return $reviews;
}

function retrieveReviewsByUserId($user_id)
{
    $db = getDBConnection(); // Get database connection

    // Prepare the statement
    $query = "SELECT reviews.user_id, users.firstname, users.photo, reviews.message, reviews.stars FROM reviews
              JOIN users ON reviews.user_id = users.id
              WHERE reviews.user_id = ?";

    if ($stmt = $db->prepare($query)) {
        // Bind the user_id parameter
        $stmt->bind_param('i', $user_id);

        // Execute the statement
        $stmt->execute();

        // Get result set
        $result = $stmt->get_result();

        $reviews = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $review = [
                    'reviewer_id' => htmlspecialchars($row["user_id"]),
                    'reviewer_name' => htmlspecialchars($row["firstname"]),
                    'photo' => $row["photo"],
                    'review_text' => htmlspecialchars($row["message"]),
                    'stars' => $row["stars"],
                ];
                $reviews[] = $review;
            }
        } else {
            echo "No results found for user with ID: " . $user_id;
        }

        // Close statement
        $stmt->close();
    } else {
        echo "Error in prepared statement";
    }

    $db->close();

    return $reviews;
}


function deleteReview($review_id, $user_id)
{
    $db = getDBConnection(); // Get database connection

    // Prepare the statement
    $query = "DELETE FROM reviews WHERE review_id = ? AND user_id = ?";

    if ($stmt = $db->prepare($query)) {
        // Bind the review_id and user_id parameters
        $stmt->bind_param('ii', $review_id, $user_id);

        // Execute the statement
        if ($stmt->execute()) {
            // Check if any rows were affected (review deleted)
            if ($stmt->affected_rows > 0) {
                return true;
            } else {
                echo "Review not found or you don't have permission to delete it.";
                return false;
            }
        } else {
            echo "Error deleting review: " . $stmt->error;
        }

        // Close statement
        $stmt->close();
    } else {
        echo "Error in prepared statement";
    }

    $db->close();

    return false;
}