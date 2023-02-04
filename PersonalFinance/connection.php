<?php

    $server   = "localhost";
    $username = "root";
    $password = "";
    $database = "personalFinance";

    $connection = mysqli_connect($server, $username, $password, $database) or die("Database Connection Failed");
?>