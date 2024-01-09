<?php
//function getDBConnection() {
//    $servername = "nnsgluut5mye50or.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306"; // Replace with your server name
//    $username = "f0vxhqmqtwqdl27i"; // Replace with your username
//    $password = "le4opdqp4c7ke9ao"; // Replace with your password
//    $database = "ma7qaz0cxsi0en6h"; // Replace with your database name
//
//    // Create connection
//    $conn = new mysqli($servername, $username, $password, $database);
//
//    // Check connection
//    if ($conn->connect_error) {
//        die("Connection failed: " . $conn->connect_error);
//    }
//
//    return $conn;
//}

function getDBConnection() {
    $servername = "localhost"; // Replace with your server name
    $username = "root"; // Replace with your username
    $password = ""; // Replace with your password
    $database = "auth"; // Replace with your database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}
