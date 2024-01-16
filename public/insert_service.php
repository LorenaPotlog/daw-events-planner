<?php
require __DIR__ . '/../src/bootstrap.php';
require __DIR__ . '/../src/user/register.php';

if (!is_user_logged_in() || !is_admin()) {
    header("Location: index.php");
    exit;
}

?>

<?php view('header', ['title' => 'Add New Service']); ?>

    <style>
        <?php include 'css/insert_service.css' ?>
    </style>

    <div id="page-container">
        <div id="content-wrap">
            <form action="../src/package/insert_service.php" method="post" enctype="multipart/form-data" style="text-align: center">
                <table style="align-self: center">
                    <h3 style="margin-bottom: 2%">Add New Service</h3>
                    <tr>
                        <td>Name</td>
                        <td><input type="text" name="name" maxlength="50" size="50"></td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td><input type="text" name="description" maxlength="255" size="50"></td>
                    </tr>
                    <tr>
                        <td>Price $</td>
                        <td><input type="text" name="price" maxlength="7" size="7"></td>
                    </tr>
                    <tr>
                        <td>Menus</td>
                        <td>
                            <select name="menu_types" style="width: 100%">
                                <option value="all">All</option>
                                <option value="vegetarian">Vegetarian</option>
                                <option value="vegan">Vegan</option>
                                <option value="customizable">Customizable</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Max Guests</td>
                        <td><input type="text" name="max_guests" maxlength="3" size="3"></td>
                    </tr>
                    <tr>
                        <td>Category</td>
                        <td>
                            <select name="category" style="width: 100%">
                                <option value="wedding">Wedding</option>
                                <option value="bachelor">Bachelor & Bachelorette</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td><textarea name="long_description" maxlength="500" style="width: 100%;"></textarea></td>
                    </tr>
                    <tr>
                        <td>Photo</td>
                        <td><input type="file" name="serviceImage"></td>
                    </tr>
                    <tr>
                        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                        <td colspan="2"><input type="submit" class="styled-link" value="Insert Service"></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>

<?php view('footer') ?>