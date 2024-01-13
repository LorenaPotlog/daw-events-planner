<?php

require_once 'users.php';

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
