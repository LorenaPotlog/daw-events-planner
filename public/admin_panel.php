<?php
require __DIR__ . '/../src/bootstrap.php';
require __DIR__ . '/../src/package/services.php';
require __DIR__ . '/../src/user/admin/admin_panel.php';

?>

<?php view('header', ['title' => ' Users']); ?>

    <div class="container-fluid">
        <h2 class="text-center">All Users</h2>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <table class="table table-bordered">
                    <thead>
                    <th>Id</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Verified</th>
                    <th>Role</th>
                    <th>Update role</th>
                    </thead>
                    <tbody>
                    <?php $users = get_all_users();
                    foreach ($users as $user): ?>
                        <tr>
                            <td><?php echo $user['id']; ?></td>
                            <td><?php echo $user['username']; ?></td>
                            <td><?php echo $user['email']; ?></td>
                            <td class="text-center">
                                <?php
                                if ($user['verified'] == 1) {
                                    echo '<i class="fa fa-check" />';
                                } else {
                                    echo '<i class="fa fa-times" />';
                                }
                                ?>

                                <?php
                                if ($user['verified'] != 1) {
                                    ?>
                                    <form method="POST" action="" style="padding-top: 10%;">
                                        <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                                        <button class="btn btn-primary btn-update btn-sm" type="submit" name="verify" style="background-color: #9fa9a3;">Verify</button>
                                    </form>
                                    <?php
                                }
                                ?>
                            </td>
                            <td><?php echo $user['role']; ?></td>
                            <td>
                                <form method="POST" action="">
                                    <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <select class="form-input text-center" name="new_role">
                                                    <option value="seller" <?php echo ($user['role'] === 'seller') ? 'selected' : ''; ?>>Seller</option>
                                                    <option value="admin" <?php echo ($user['role'] === 'admin') ? 'selected' : ''; ?>>Admin</option>
                                                    <option value="common" <?php echo ($user['role'] === 'common') ? 'selected' : ''; ?>>Common</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <button class="btn btn-primary btn-update" type="submit" name="update_role" style="background-color: #9fa9a3;">Update Role</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php view('footer') ?>