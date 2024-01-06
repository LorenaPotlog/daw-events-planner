<?php
require __DIR__ . '/../src/bootstrap.php';
require __DIR__ . '/../src/services.php';

// Assuming you have a function to retrieve users from the database
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

$users = get_all_users();
?>

<?php view('header', ['title' => ' Users']); ?>

    <div>
        <h2>All Users</h2>
        <table>
            <thead>
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Role</th>
                <th>Verified</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?php echo $user['id']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td><?php echo $user['role']; ?></td>
                    <td><?php echo $user['verified']; ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

<?php view('footer') ?>