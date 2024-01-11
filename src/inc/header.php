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

        body {
            background-color: #f5f5f5; /* Change this to the desired background color */
            color: #333; /* Text color for better readability */
            margin: 20px; /* Add space around the body content */
            justify-content: center; /* Horizontally center content */
            align-items: center; /* Vertically center content */
            min-height: 100vh; /* Ensure full viewport height */
        }

    </style>
</head>
<body>
<nav class="navbar navbar-inverse">
    <div class="container-fluid" style="font-size: 2rem">
        <!-- Brand and toggle get grouped for better mobile display -->
        <a class="navbar-brand" style="padding-right: 50px">
          <i class="fas fa-ring"> DETAILS</i> </a>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav">
                <li>
                    <a href="index.php" style="font-weight: bold">Home</a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Services <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="services.php?name=wedding">Wedding</a></li>
                        <li><a href="services.php?name=bachelor">Bachelor & Bachelorette</a></li>
                        <!-- Add more dropdown items if needed -->
                    </ul>
                </li>
                <li><a href="products.php">Shop</a></li>

                <li><a href="technicalities.php">Technicalities</a></li>


                <li><a href="blog.php">Blog / Reviews</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Contact <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="contact.php">Contact</a></li>
                        <li><a href="book_consultation.php">Book a consultation</a></li>
                        <!-- Add more dropdown items if needed -->
                    </ul>
                </li>
            </ul>

            <!-- Right-aligned items -->
            <ul class="nav navbar-nav navbar-right">
                <?php
                $username = current_user();
                if ($username != null) :
                    ?>
                    <li><a href="user_account.php"><?= $username ?></a></li>
                    <li><a href="logout.php">Logout</a></li>
                <?php else : ?>
                    <li><a href="login.php">Login/Register</a></li>
                <?php endif; ?>

                <?php
                if (is_admin()) :
                    ?>
                    <li><a href="admin_pannel.php">Admin Panel</a></li>
                <?php endif; ?>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<main>

