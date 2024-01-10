<?php

require __DIR__ . '/../src/bootstrap.php';
require_once 'users.php';

function get_all_users() {
    $conn = getDBConnection();

    $sql = 'SELECT id, email, role, verified FROM users';
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

if (is_post_request()) {
    if (isset($_POST['update_role'])) {
        $userId = $_POST['user_id'];
        $newRole = $_POST['new_role'];

        // Assuming you have a function to update the user role in the database
        update_user_role($userId, $newRole);
    }
}

// Function to update user role
function update_user_role($userId, $newRole) {
    $conn = getDBConnection();

    $sql = "UPDATE users SET role = '$newRole' WHERE id = $userId";
    $result = $conn->query($sql);

    $conn->close();
}

$users = get_all_users();
