<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.phptutorial.net/app/css/style.css">
    <link rel="stylesheet" href="../css/main_style.css">
    <title><?= $title ?? 'Home' ?></title>
    <style>
        nav {
            background-color: #f8f9fa;
            width: 100%;
            position: fixed;
            top: 0;
            z-index: 1000;
        }

        ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
        }

        li {
            padding: 10px 20px;
        }

        a {
            text-decoration: none;
            color: #333;
        }

        li:hover {
            background-color: #ddd;
        }

        /* Submenu */
        ul ul {
            display: none;
            position: absolute;
            background-color: #f8f9fa;
            min-width: 150px;
        }

        ul li:hover > ul {
            display: block;
        }

        ul ul li {
            padding: 10px;
            display: block;
        }
    </style>
</head>
<body>
<!-- nav -->
<nav style="padding: 20px">
    <ul class="menu" style=" z-index: 1000" >
        <li>
            <div id="home">
                <a href="index.php">Home</a>
            </div>
            <ul>
                <li><a href="#welcome">Welcome</a></li>
                <li><a href="#technicalities">Technicalities</a></li>
                <li><a href="#db">DB & Diagrams</a></li>
            </ul>
        </li>

        <li>
            <div><a href="services.php">Services</a></div>
            <ul>
                <li><a href="services.php?name=wedding">Wedding</a></li>
                <li><a href="services.php?name=bachelor">Bachelor & Bachelorette</a></li>
            </ul>
        </li>
        <li>
            <div><a href="products.php">Shop</a></div>
        </li>
        <li>
            <div><a href="blog.php">Blog / Reviews</a></div>
        </li>

        <li>
            <div><a href="contact.php">Contact</a></div>
            <ul>
                <li><a href="book_consultation.php">Book a consultation</a></li>
            </ul>
        </li>
        <?php
        $username = current_user();
        if ($username!=null) :
            ?>
            <li>
                <div><a href="user_account.php"><?= $username ?></a></div>
            </li>
            <li>
                <div><a href="logout.php">Logout</a></div>
            </li>
        <?php else : ?>
            <li><a href="login.php">Login/Register</a></li>
        <?php endif; ?>
        <?php
        if (is_admin()) :
            ?>
            <li>
                <div><a href="admin_pannel.php">Admin pannel</a></div>
            </li>

        <?php endif; ?>
<!--        to move this-->
    </ul >
</nav>
<main style="padding: 100px">

