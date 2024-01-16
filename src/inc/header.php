<?php
require_once 'auth.php';

$currentRoute = $_SERVER['REQUEST_URI'];

// 404 if not authorized roots
if (!isAuthorizedRoute($currentRoute)) {
    redirect_to('../../public/404.php');
    exit;
}

//check for cookies
if (!isset($_COOKIE['cookiesAccepted']) || $_COOKIE['cookiesAccepted'] !== 'true') {
    echo 'Please accept the cookies';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="This is a website for event organization">
    <meta name="keywords" content="event, wedding, party">
    <meta name="author" content="Lorena Potlog">
    <?php include 'stylesheets.html' ?>
    <title><?= $title ?? 'Home' ?></title>
    <style>
        <?php include 'css/reset.css' ?>
        <?php include 'css/nav.css' ?>
        <?php include 'css/general.css' ?>
    </style>
</head>
<body>
<nav class="navbar navbar-inverse">
    <div class="container-fluid" style="font-size: 2rem">
        <!-- Brand and toggle get grouped for better mobile display -->
        <a class="navbar-brand" href="index.php" style="padding-right: 50px">
            <i class="fas fa-ring"></i> DETAILS
        </a>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav">
                <li>
                    <a href="index.php" style="font-weight: bold"><i class="fas fa-home"></i> Home</a>
                </li>
                <li class="dropdown">
                    <a href="services.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fas fa-gift"></i> Services <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="services.php">All</a></li>
                        <li><a href="services.php?category=wedding"><i class="fas fa-ring"></i> Wedding</a></li>
                        <li><a href="services.php?category=bachelor"><i class="fas fa-glass-cheers"></i> Bachelor & Bachelorette</a></li>
                        <!-- Add more dropdown items if needed -->
                    </ul>
                </li>
                <li><a href="products.php"><i class="fas fa-shopping-bag"></i> Shop</a></li>

                <li><a href="blog.php"><i class="fas fa-newspaper"></i> Blog</a></li>

                <li><a href="reviews.php"><i class="fas fa-pen"></i> Reviews</a></li>

                <li><a href="contact.php"><i class="fas fa-envelope"></i> Contact</a></li>
                <li><a href="game.php"><i class="fas fa-gamepad"></i></a></li>


            </ul>

            <!-- Right-aligned items -->
            <ul class="nav navbar-nav navbar-right">
                <?php
                $username = current_user();
                if ($username != null) :
                    ?>
                    <li><a href="user_account.php"><i class="fas fa-user"></i> <?= $username ?></a></li>
                    <?php
                    if (is_admin()) :
                        ?>
                        <li><a href="admin_panel.php"><i class="fas fa-user-shield"></i> Admin panel</a></li>
                    <?php endif; ?>
                    <?php
                    if (is_admin()) :
                        ?>
                        <li><a href="technicalities.php"><i class="fas fa-cogs"></i> Technicalities</a></li>
                    <?php endif; ?>
                    <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                <?php else : ?>
                    <li><a href="login.php"><i class="fas fa-sign-in-alt"></i> Login</a></li>
                <?php endif; ?>

            </ul>
        </div>
    </div>
</nav>
<?php if (flash()): ?>
    <div class="popup-container">
        <div class="popup-content">
            <?php flash() ?>
        </div>
    </div>
<?php endif; ?>
<?php
$page_url = $_SERVER['REQUEST_URI'];

$connection = getDBConnection();
$selectQuery = $connection->prepare("SELECT view_count FROM page_views WHERE page_url = ?");
$selectQuery->bind_param("s", $page_url);
$selectQuery->execute();
$selectQuery->store_result();

if ($selectQuery->num_rows > 0) {
    $updateQuery = $connection->prepare("UPDATE page_views SET view_count = view_count + 1 WHERE page_url = ?");
    $updateQuery->bind_param("s", $page_url);
    $updateQuery->execute();
    $updateQuery->close();
} else {
    $insertQuery = $connection->prepare("INSERT INTO page_views (page_url, view_count) VALUES (?, 1)");
    $insertQuery->bind_param("s", $page_url);
    $insertQuery->execute();
    $insertQuery->close();
}

$selectQuery->close();

$query = "SELECT view_count, (SELECT SUM(view_count) FROM page_views) AS total_views FROM page_views WHERE page_url = ?;";
$selectQuery = $connection->prepare($query);
$selectQuery->bind_param("s", $page_url);
$selectQuery->execute();
$selectQuery->bind_result($view_count, $total_views);

if (is_admin()) {
    if ($selectQuery->fetch()) {
        echo "This page has been viewed $view_count times. Total views: $total_views";
    } else {
        echo "No view count available for this page.";
    }
}

$selectQuery->close();
$connection->close();
?>

<main>


