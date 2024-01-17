<?php
include 'db_connect.php';

/**
 * @throws Exception
 */
function register_user(string $firstname, string $lastname, string $email, string $username, string $password): bool
{
    $conn = getDBConnection();

    $existingEmailUser = find_user_by_email($email);
    if ($existingEmailUser !== null) {
        throw new Exception("Email already registered. Please login.");
    }

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

    if (!send_activation_email($email)) {
        return false;
    }

    $stmt->close();
    $conn->close();
    return true;
}

function send_activation_email(string $email): bool
{
    $verificationCode = md5($email);
    $verificationLink = "http://daw-events-planner-ed298d55c5bd.herokuapp.com/src/user/verify.php?code=$verificationCode";
    $subject = "Verify Your Email Address";
    $message = "Click the link below to verify your email address:\n$verificationLink";

    $mailed = send_email($email, $subject, $message);

    if (!$mailed) {
        return false;
    }

    return true;
}

function find_user_by_username(string $username): ?array
{
    $conn = getDBConnection();

    $sql = 'SELECT id, username, password, role, verified, email, lastname, firstname, photo FROM users WHERE username=?';
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

    $statement->bind_result($fetchedId, $fetchedUsername, $fetchedPassword, $fetchedRole,
        $fetchedVerified, $fetchedEmail, $fetchedLastname, $fetchedFirstname, $fetchedPhoto);
    $statement->fetch();

    $result = [
        'id' => $fetchedId,
        'username' => $fetchedUsername,
        'password' => $fetchedPassword,
        'role' => $fetchedRole,
        'verified' => $fetchedVerified,
        'email' => $fetchedEmail,
        'lastname' => $fetchedLastname,
        'firstname' => $fetchedFirstname,
        'photo' => $fetchedPhoto
    ];

    $statement->close();

    return $result;
}

function find_user_by_email(string $email): ?array
{
    $conn = getDBConnection();

    $sql = 'SELECT id, username, password, role FROM users WHERE email=?';
    $statement = $conn->prepare($sql);

    if (!$statement) {
        return null;
    }

    $statement->bind_param('s', $email);
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

/**
 * @throws Exception
 */
function login(string $username, string $password): void
{
    $user = find_user_by_username($username);

    if (!$user) {
        throw new Exception("Wrong username");
    }

    if ($user['verified'] == 0) {
        throw new Exception("Email not verified");
    }

    if (!password_verify($password, $user['password'])) {
        throw new Exception("Wrong password");
    }

    $_SESSION['valid_user'] = $user['username'];
    $_SESSION['role'] = $user['role'];
    $_SESSION['user_id'] = $user['id'];

    // Additional details
    $_SESSION['email'] = $user['email'];
    $_SESSION['lastname'] = $user['lastname'];
    $_SESSION['firstname'] = $user['firstname'];
    $_SESSION['photo'] = $user['photo'];
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

function current_user()
{
    if (is_user_logged_in()) {
        return $_SESSION['valid_user'];
    }
    return null;
}


function isAuthorizedRoute($currentRoute)
{
    // List of authorized routes
    $authorizedRoutes = [
        '/details/public/' => '/public/',
        '/details/public/index.php' => '/public/index.php',
        '/details/public/login.php' => '/public/login.php',
        '/details/public/admin_panel.php' => '/public/admin_panel.php',
        '/details/public/blog.php' => '/public/blog.php',
        '/details/public/contact.php' => '/public/contact.php',
        '/details/public/edit_profile.php' => '/public/edit_profile.php',
        '/details/public/edit_profile_success.php' => '/public/edit_profile_success.php',
        '/details/public/password_reset_success.php' => '/public/password_reset_success.php',
        '/details/public/enter_email.php' => '/public/enter_email.php',
        '/details/public/insert_product.php' => '/public/insert_product.php',
        '/details/public/insert_service.php' => '/public/insert_service.php',
        '/details/public/leave_review.php' => '/public/leave_review.php',
        '/details/public/logout.php' => '/public/logout.php',
        '/details/public/new_password.php' => '/public/new_password.php',
        '/details/public/pending.php' => '/public/pending.php',
        '/details/public/product_details.php' => '/public/product_details.php',
        '/details/public/products.php' => '/public/products.php',
        '/details/public/register.php' => '/public/register.php',
        '/details/public/registration_success.php' => '/public/registration_success.php',
        '/details/public/reviews.php' => '/public/reviews.php',
        '/details/public/services.php' => '/public/services.php',
        '/details/public/technicalities.php' => '/public/technicalities.php',
        '/details/public/thank_you.php' => '/public/thank_you.php',
        '/details/public/user_account.php' => '/public/user_account.php',
        '/details/public/game.php' => '/public/game.php',
    ];

    if (in_array($currentRoute, $authorizedRoutes)) {
        return true;
    }

    $parsedUrl = parse_url($currentRoute);
    $path = $parsedUrl['path'];
    $query = $parsedUrl['query'] ?? '';

    return in_array($path, $authorizedRoutes) && !empty($query);
}