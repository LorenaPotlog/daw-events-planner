<?php
$link = mysqli_connect("localhost", "root", "", "details");

if (!$link) {
    echo "Error: Unable to connect to MySQL.";
    exit;
}

if (mysqli_connect_errno()) {
    echo 'Error: Could not connect to database. Please try
     again later.';
    exit;
    }


// $query="SELECT * FROM user";

// echo $query;


// foreach ($link->query($query) as $row) {
//     print $row['surname'] . "\t";
// }

// mysqli_close($link);
