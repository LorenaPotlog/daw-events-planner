<?php
require __DIR__ . '/../src/bootstrap.php';
require __DIR__ . '/../src/contact.php';

?>

<?php view('header', ['title' => 'Our Services']); ?>
<?php

session_start();
if (is_user_logged_in() && is_admin()) {
    ?>
    <button style='color: black; margin-top: 60px; border: 2px solid black; text-align: center; font-size: 14px; font-weight: bold; border-radius: 20px; background-color: #f0f0f0; display: inline-block;'>
        <a href='./insert_package.php' style='color: black; text-decoration: underline;'>Add a new package</a></button>
    <?php
}
?>
    <form method="GET" action="">
        <label>Filter by Menu Type:</label>
        <select name="menu_type">
            <option value="">All</option>
            <option value="Vegetarian">Vegetarian</option>
            <option value="Non-Vegetarian">Non-Vegetarian</option>
        </select>
        <input type="submit" value="Filter">
    </form>

    <form method="GET" action="">
        <label>Sort by Price:</label>
        <select name="sort">
            <option value="ASC">Low to High</option>
            <option value="DESC">High to Low</option>
        </select>
        <input type="submit" value="Sort">
    </form>


    <div style="display: flex; flex-wrap: wrap; gap: 20px; margin-top: 20px;">
        <?php displayServices(); ?>
    </div>
<?php view('footer') ?>