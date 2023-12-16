<?php
require __DIR__ . '/../src/bootstrap.php';
require __DIR__ . '/../src/register.php';
?>

<?php view('header', ['title' => 'Add new product']);
// Check if user is logged in
if (!is_user_logged_in()) {
    echo "<div style='color: black; padding: 20px; border: 2px solid black; text-align: center; font-size: 18px; font-weight: bold;'>You need to be logged in to access this page. <a href='./authenticate.php' style='color: black;'>Please log in.</a></div>";
    exit;
}

// Check if user has roles
if (!is_seller() && !is_admin()) {
    echo "<div style='background-color: pink; color: white; padding: 20px; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); border: 2px solid red; text-align: center; font-size: 18px; font-weight: bold;'>You do not have permission to access this page. <a href='index.php' style='color: black;'>Go back to HOME</a></div>";
    exit();
} ?>
<form action="../src/insert_product.php" method="post" style="padding: 100px">
    <table >
        <caption><h3>Add New Product</h3></caption>
        <tr>
            <td>Name</td>
            <td><input type="text" name="name" maxlength="13" size="13"></td>
        </tr>
        <tr>
            <td>Description</td>
            <td><input type="text" name="description" maxlength="30" size="30"></td>
        </tr>
        <tr>
            <td>Price $</td>
            <td><input type="text" name="price" maxlength="7" size="7"></td>
        </tr>
        <tr>
            <td>Quantity</td>
            <td><input type="text" name="quantity" maxlength="60" size="30"></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="Register"></td>
        </tr>
    </table>
</form>
<?php view('footer') ?>