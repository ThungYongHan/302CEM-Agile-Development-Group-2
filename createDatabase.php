<?php
$servername = "localhost";
$username = "username";
$password = "password";

$mysqli = new mysqli("localhost", "root", "");
if ($mysqli -> connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$sql = "CREATE DATABASE GameReviewWebsite";
if ($mysqli->query($sql) === true) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $mysqli->error;
}

$mysqli->close();
