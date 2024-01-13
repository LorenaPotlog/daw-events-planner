<?php

function get_user_by_id($user_id) {
    $connection = getDBConnection();

    $sql = 'SELECT id, email, role, verified, firstname, lastname, photo FROM users WHERE id = ?';

    // Using prepared statement to prevent SQL injection
    if ($statement = $connection->prepare($sql)) {
        $statement->bind_param('i', $user_id);  // 'i' represents integer type
        $statement->execute();

        $result = $statement->get_result();
        $user = $result->fetch_assoc();

        $statement->close();
    }

    $connection->close();

    return $user;
}

function edit_user($user_id, $email, $firstname, $lastname, $photo) {
    $connection = getDBConnection();

    $sql = 'UPDATE users SET email = ?, firstname = ?, lastname = ?, photo = ? WHERE id = ?';

    // Using prepared statement to prevent SQL injection
    if ($statement = $connection->prepare($sql)) {
        $statement->bind_param('ssssi', $email, $firstname, $lastname, $photo, $user_id);  // 's' represents string, 'i' represents integer type

        // Check if the query executed successfully
        if ($statement->execute()) {
            $statement->close();
            $connection->close();
            return true;  // Return true on success
        } else {
            // Handle the error if the query fails (you might want to log it)
            echo "Error: " . $statement->error;
        }
    }

    // Close the connection in case of an error
    $connection->close();
    return false;  // Return false if the query fails
}

function delete_user($userId) {
    $connection = getDBConnection();

    $sql = 'DELETE FROM users WHERE id = ?';
    if ($statement = $connection->prepare($sql)) {
        $statement->bind_param('i', $userId);

        if ($statement->execute()) {
            $statement->close();
            $connection->close();
            return true;
        } else {
            echo "Error: " . $statement->error;
            $connection->close();
            return false;
        }
    }
}

function get_all_users() {
    $connection = getDBConnection();

    $sql = 'SELECT id, email, role, username, verified FROM users';
    $result = $connection->query($sql);

    $users = [];
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $users[] = $row;
        }
        $result->free();
    }

    $connection->close();

    return $users;
}

function update_user_role($userId, $newRole) {
    $connection = getDBConnection();

    $sql = "UPDATE users SET role = ? WHERE id = ?";
    if ($statement = $connection->prepare($sql)) {
        $statement->bind_param('si', $newRole, $userId);

        if ($statement->execute()) {
            $statement->close();
            $connection->close();
            return true;
        } else {
            echo "Error: " . $statement->error;
            $connection->close();
            return false;
        }
    }
}

function verify_user($userId) {
    $connection = getDBConnection();

    $sql = "UPDATE users set verified = 1 WHERE id = ?";
    if ($statement = $connection->prepare($sql)) {
        $statement->bind_param('i', $userId);

        if ($statement->execute()) {
            $statement->close();
            $connection->close();
            return true;
        } else {
            echo "Error: " . $statement->error;
            $connection->close();
            return false;
        }
    }
}