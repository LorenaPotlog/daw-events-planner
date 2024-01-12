<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'stylesheets.html' ?>
    <title><?= $title ?? 'Home' ?></title>
    <style>
        /* Customize the navbar */
        .navbar-inverse {
            background-color:#c5d5c5;
            border-color: #ddd;
            color: black;
            font-family: 'Ubuntu', cursive; /* Apply the custom font */
        }
        .navbar-inverse .navbar-nav > li > a {
            color: black;
            /*font-weight: bold;*/
            font-family: 'Ubuntu', cursive; /* Apply the custom font */

        }

        .navbar-inverse .navbar-nav > li > a:active,
        .navbar-inverse .navbar-nav > li > a:focus,
        .navbar-inverse .navbar-nav > li > a:hover,
        .navbar-inverse .navbar-nav > .active > a {
            color: #336699; /* Change to the desired dark blue color */
        }

        .navbar-brand {
            display: inline-block;
            vertical-align: middle;
        }
        .navbar-brand img {
            height: 20px; /* Set the height of your small picture */
            width: auto; /* Adjust the width proportionally */
            margin-right: 5px; /* Add space between the picture and text */
        }

        .navbar li{
            margin-left: 5px;
        }

        body {
            background-color: #f5f5f5; /* Change this to the desired background color */
            color: #333; /* Text color for better readability */
            margin: 20px; /* Add space around the body content */
            min-height: 100vh; /* Ensure full viewport height */
        }

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
                        <li><a href="services.php?name=wedding"><i class="fas fa-ring"></i> Wedding</a></li>
                        <li><a href="services.php?name=bachelor"><i class="fas fa-glass-cheers"></i> Bachelor & Bachelorette</a></li>
                        <!-- Add more dropdown items if needed -->
                    </ul>
                </li>
                <li><a href="products.php"><i class="fas fa-shopping-bag"></i> Shop</a></li>

                <li><a href="blog.php"><i class="fas fa-newspaper"></i> Blog</a></li>

                <li><a href="reviews.php"><i class="fas fa-pen"></i> Reviews</a></li>

                <li><a href="contact.php"><i class="fas fa-envelope"></i> Contact</a></li>

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
                        <li><a href="admin_pannel.php"><i class="fas fa-user-shield"></i> Admin panel</a></li>
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
<main>

