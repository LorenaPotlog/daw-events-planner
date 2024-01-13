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
        #page-container {
            position: relative;
        }

        form {
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            box-sizing: border-box;
            margin-left: 600px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
        }

        caption {
            text-align: left;
            font-size: 1.5em;
            margin-bottom: 10px;
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

        input[type="submit"] {
            background-color: #9fa9a3;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #c5d5c5;
        }
    </style>


    <div id="page-container">
        <div id="content-wrap">
            <form action="../src/package/insert_service.php" method="post" enctype="multipart/form-data" style="text-align: center">
                <table style="align-self: center">
                    <caption><h3>Add New Service</h3></caption>
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
                        <td>Menu Types</td>
                        <td><input type="text" name="menu_types" maxlength="60" size="30"></td>
                    </tr>
                    <tr>
                        <td>Max Guests</td>
                        <td><input type="text" name="max_guests" maxlength="3" size="3"></td>
                    </tr>
                    <tr>
                        <td>Long Description</td>
                        <td><textarea name="long_description" maxlength="500"></textarea></td>
                    </tr>
                    <tr>
                        <td>Photos</td>
                        <td><input type="file" name="serviceImages[]" multiple></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" value="Insert Service"></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>

<?php view('footer') ?>