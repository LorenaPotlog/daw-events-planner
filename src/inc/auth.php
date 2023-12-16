<?php
include 'db_connect.php';

function register_user(string $firstname, string $lastname, string $email, string $username, string $password): bool
{
    $conn = getDBConnection(); // Get database connection

    // Prepare SQL statement
    $sql = "INSERT INTO users (username, lastname, firstname, email, password) VALUES (?, ?, ?, ?, ?)";

    // Create a prepared statement
    $stmt = $conn->prepare($sql);

    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    // Bind parameters and execute the statement
    $stmt->bind_param("sssss", $username, $lastname, $firstname, $email, $hashedPassword);

    if (!$stmt->execute()) {
        return false;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
    return true;
}

function find_user_by_username(string $username): ?array
{
    $conn = getDBConnection();

    $sql = 'SELECT id, username, password, role FROM users WHERE username=?';
    $statement = $conn->prepare($sql);

    if (!$statement) {
        return null;
    }

    $statement->bind_param('s', $username);
    $statement->execute();
    $statement->store_result();

    if ($statement->num_rows === 0) {
        $statement->close();
        return null; // No user found
    }

    $statement->bind_result($fetchedId, $fetchedUsername, $fetchedPassword, $fetchedRole);
    $statement->fetch();

    $result = [
        'id' => $fetchedId,
        'username' => $fetchedUsername,
        'password' => $fetchedPassword,
        'role' => $fetchedRole
    ];

    $statement->close();

    return $result;
}
function login(string $username, string $password): bool
{
    $user = find_user_by_username($username);

    if ($user && password_verify($password, $user['password'])) {
        // set username, role, and ID in the session
        $_SESSION['valid_user'] = $user['username'];
        $_SESSION['role'] = $user['role'];
        $_SESSION['user_id'] = $user['id'];

        return true;
    }

    return false;
}

function is_user_logged_in(): bool
{
    return isset($_SESSION['valid_user']);
}

function is_admin(): bool
{
    return ($_SESSION['role'] === 'admin');
}

function is_seller(): bool
{
    return ($_SESSION['role'] === 'seller');
}

function require_login(): void
{
    if (!is_user_logged_in()) {
        redirect_to('login.php');
    }
}
function current_user()
{
    if (is_user_logged_in()) {
        return $_SESSION['valid_user'];
    }
    return null;
}
