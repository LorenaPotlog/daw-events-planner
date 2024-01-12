<?php
/**
 * Connect to the database and returns an instance of PDO class
 * or false if the connection fails
 *
 * @return mysqli
 */
function db(): mysqli
{

        $mysqli = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

        if ($mysqli->connect_error) {
            // Handle connection error (e.g., log, error message, etc.)
            die("Connection failed: " . $mysqli->connect_error);
        }

    return $mysqli;
}

