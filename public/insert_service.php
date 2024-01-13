<?php
require __DIR__ . '/../src/bootstrap.php';
require __DIR__ . '/../src/user/register.php';
?>

<?php
view('header', ['title' => 'Add New Service']);

// Check if the user is logged in
if (!is_user_logged_in()) {
    echo "<div style='color: black; padding: 20px; border: 2px solid black; text-align: center; font-size: 18px; font-weight: bold;'>You need to be logged in to access this page. <a href='./authenticate.php' style='color: black;'>Please log in.</a></div>";
    exit;
}

// Check if the user has roles
if (!is_admin()) {
    echo "<div style='background-color: pink; color: white; padding: 20px; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); border: 2px solid red; text-align: center; font-size: 18px; font-weight: bold;'>You do not have permission to access this page. <a href='index.php' style='color: black;'>Go back to HOME</a></div>";
    exit();
}
?>

    <style>

        form {
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
            box-sizing: border-box;
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 5%;
        }

        table {
            width: 100%;
        }

        td {
            padding: 10px;
        }

        input[type="text"], input[type="file"], input[type="submit"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

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
                        <td><input type="text" name="menu_types" maxlength="60" size="30"></td>
                    </tr>
                    <tr>
                        <td>Max Guests</td>
                        <td><input type="text" name="max_guests" maxlength="3" size="3"></td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td><textarea name="long_description" maxlength="500"></textarea></td>
                    </tr>
                    <tr>
                        <td>Photos</td>
                        <td><input type="file" name="serviceImages[]" multiple></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" class="styled-link" value="Insert Service"></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>

<?php view('footer') ?>