<!-- <?php
// Database connection initialization (Replace with your connection code)


$db = new mysqli('localhost', 'root', '', 'details');

// Function to check if the user is a seller
function isSeller($db, $username)
{
    $query = "SELECT role FROM users WHERE username = ?";
    $stmt = $db->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($role);
    $stmt->fetch();
    $stmt->close();

    return ($role === 'seller');
}

// Function to check if the user is an admin
function isAdmin($db, $username)
{
    $query = "SELECT role FROM users WHERE username = ?";
    $stmt = $db->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($role);
    $stmt->fetch();
    $stmt->close();

    return ($role === 'admin');
}

// Function to check if the user is a customer
function isCustomer($db, $username)
{
    $query = "SELECT role FROM users WHERE username = ?";
    $stmt = $db->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($role);
    $stmt->fetch();
    $stmt->close();

    return ($role === 'customer');
}
?> -->