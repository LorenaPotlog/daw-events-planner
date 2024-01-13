<?php

function get_user_by_id($user_id) {
    $conn = getDBConnection();

    $sql = 'SELECT id, email, role, verified, firstname, lastname, photo FROM users WHERE id = ?';

    // Using prepared statement to prevent SQL injection
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param('i', $user_id);  // 'i' represents integer type
        $stmt->execute();

        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        $stmt->close();
    }

    $conn->close();

    return $user;
}

function edit_user($user_id, $email, $firstname, $lastname, $photo) {
    $conn = getDBConnection();

    $sql = 'UPDATE users SET email = ?, firstname = ?, lastname = ?, photo = ? WHERE id = ?';

    // Using prepared statement to prevent SQL injection
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param('ssssi', $email, $firstname, $lastname, $photo, $user_id);  // 's' represents string, 'i' represents integer type

        // Check if the query executed successfully
        if ($stmt->execute()) {
            $stmt->close();
            $conn->close();
            return true;  // Return true on success
        } else {
            // Handle the error if the query fails (you might want to log it)
            echo "Error: " . $stmt->error;
        }
    }

    // Close the connection in case of an error
    $conn->close();
    return false;  // Return false if the query fails
}

function get_all_users() {
    $conn = getDBConnection();

    $sql = 'SELECT id, email, role, username, verified FROM users';
    $result = $conn->query($sql);

    $users = [];
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $users[] = $row;
        }
        $result->free();
    }

    $conn->close();

    return $users;
}

function update_user_role($userId, $newRole) {
    $conn = getDBConnection();

    $sql = "UPDATE users SET role = '$newRole' WHERE id = $userId";
    $result = $conn->query($sql);

    $conn->close();
}

function verify_user($userId) {
    $conn = getDBConnection();

    $sql = "UPDATE users set verified = 1 WHERE id = $userId";
    $result = $conn->query($sql);

    $conn->close();
}