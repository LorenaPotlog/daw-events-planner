<?php
require __DIR__ . '/../src/bootstrap.php';
require __DIR__ . '/../src/user/register.php';

if (!is_user_logged_in() || (!is_seller() && !is_admin() )) {
    header("Location: index.php");
    exit;
}

?>

<?php view('header', ['title' => 'Add new product']);?>
    <style>
        <?php include 'css/insert_product.css' ?>
    </style>
    <div id="page-container">
        <div id="content-wrap">
    <form action="../src/product/insert_product.php" method="post" enctype="multipart/form-data" style="text-align: center">
        <table style="align-self: center">
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
                <td>Photo</td>
                <td><input type="file" name="productImage"></td>
            </tr>
            <tr>
                <td colspan="2"><input class="styled-link" type="submit" value="Insert product"></td>
            </tr>
        </table>
    </form>
        </div>
    </div>
<?php view('footer') ?>