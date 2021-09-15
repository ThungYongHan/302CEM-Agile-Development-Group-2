<?php
$mysqli = new mysqli("localhost", "root", "", "GameReviewWebsite");

if ($mysqli -> connect_errno) {
    die("Connection failed: " . $mysqli->connect_error);
}
$sql = "CREATE TABLE IF NOT EXISTS Users (
user_id INT AUTO_INCREMENT PRIMARY KEY
)";

$sql1 = "CREATE TABLE IF NOT EXISTS Reviews (
review_id INT(6) AUTO_INCREMENT,
user_id INT,
user_review VARCHAR(256) NOT NULL,
review_num INT(6) NOT NULL,
review_datetime DATETIME(6) NOT NULL,
PRIMARY KEY (review_id),
CONSTRAINT FK_user_id FOREIGN KEY (user_id) 
REFERENCES Users(user_id)
)";

if ($mysqli->query($sql) === true) {
    echo "Users table created successfully";
} else {
    echo "Error creating table: " . $mysqli->error;
}

if ($mysqli->query($sql1) === true) {
    echo "Reviews table created successfully";
} else {
    echo "Error creating table: " . $mysqli->error;
}

$mysqli->close();
