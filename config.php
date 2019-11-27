<?php
    $host     = "localhost";
    $user     = "root";
    $password = "";
    $database = "kth_ussd";
    $dblink = mysqli_connect("localhost", "root", "", "kth_ussd");
    /* If connection fails throw an error */
    if (mysqli_connect_errno()) {
    echo "Could  not connect to database: Error: ".mysqli_connect_error();
    exit();
}
?>