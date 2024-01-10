<?php
require __DIR__ . '/../src/bootstrap.php';
require __DIR__ . '/../src/services.php';
require __DIR__ . '/../src/admin_pannel.php';

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
                <tr>
                <?php $users = get_all_users();
                foreach ($users as $user): ?>
                    <tr>
                        <td><?php echo $user['id']; ?></td>
                        <td><?php echo $user['email']; ?></td>
                        <td><?php echo $user['role']; ?></td>
                        <td><?php echo $user['verified']; ?></td>
                    </tr>
                    <td>
                        <form method="POST" action="">
                            <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                            <select name="new_role">
                                <option value="seller" <?php echo ($user['role'] === 'seller') ? 'selected' : ''; ?>>Seller</option>
                                <option value="admin" <?php echo ($user['role'] === 'admin') ? 'selected' : ''; ?>>Admin</option>
                                <option value="common" <?php echo ($user['role'] === 'common') ? 'selected' : ''; ?>>Common</option>
                                <!-- Add more options as needed -->
                            </select>
                            <button type="submit" name="update_role">Update Role</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

<?php view('footer') ?>