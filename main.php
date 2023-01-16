<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbnme = "Login_Signup";

    $conn = mysqli_connect($host,$username,$password);

    $sql = "CREATE DATABASE $dbnme";

    mysqli_query($conn, $sql);

    $conn = mysqli_connect($host, $username, $password, $dbnme);

    $sql = "CREATE TABLE users(
        Email varchar(30) primary key,
        Username varchar(30),
        Password varchar(40),
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

    mysqli_query($conn, $sql);
?>