<?php

require_once 'users.php';

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

if (is_post_request()) {
    if (isset($_POST['update_role'])) {
        $userId = $_POST['user_id'];
        $newRole = $_POST['new_role'];

        update_user_role($userId, $newRole);
    } else if (isset($_POST['verify'])) {
        $userId = $_POST['user_id'];

        verify_user($userId);
    }
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

$users = get_all_users();