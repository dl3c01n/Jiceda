<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
    $dbh = new PDO("mysql:host=$servername;dbname=Jiceda", $username, $password);
    // set the PDO error mode to exception
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
catch(PDOException $e)
    {
    }
?>