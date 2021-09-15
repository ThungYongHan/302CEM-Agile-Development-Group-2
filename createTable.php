<?php
$mysqli = new mysqli("localhost", "root", "", "GameReviewWebsite");

if ($mysqli -> connect_errno) {
    die("Connection failed: " . $mysqli->connect_error);
}

$sqlUsers = "CREATE TABLE IF NOT EXISTS Users (
user_id INT(6) AUTO_INCREMENT,
username VARCHAR(256) NOT NULL,
user_email VARCHAR(256) NOT NULL,
user_pass VARCHAR(256) NOT NULL,
PRIMARY KEY (user_id)
)";

$sqlReviews = "CREATE TABLE IF NOT EXISTS Reviews (
review_id INT(6) AUTO_INCREMENT,
user_id INT,
user_review VARCHAR(256) NOT NULL,
review_num INT(6) NOT NULL,
review_datetime DATETIME NOT NULL,
PRIMARY KEY (review_id),
CONSTRAINT FK_reviewuser_id FOREIGN KEY (user_id) 
REFERENCES Users(user_id)
)";

$sqlGames = "CREATE TABLE IF NOT EXISTS Games (
game_id INT(6) AUTO_INCREMENT,
user_id INT,
game_name VARCHAR(50) NOT NULL,
game_desc VARCHAR(256) NOT NULL,
game_publisher VARCHAR(50) NOT NULL,
game_datetime DATETIME NOT NULL,
game_year YEAR NOT NULL,
game_cover BLOB NOT NULL,
PRIMARY KEY (game_id),
CONSTRAINT FK_gameuser_id FOREIGN KEY (user_id) 
REFERENCES Users(user_id)
)";

if ($mysqli->query($sqlUsers) === true) {
    echo "Users table created successfully";
} else {
    echo "Error creating Users table: " . $mysqli->error;
}
echo "<br>";

$sqlInsertUsers = "INSERT INTO Users (username, user_email, user_pass) VALUES 
('user1', 'p455w0rd', 'user1@example.com'),
('user2', 'p455w0rd', 'user2@example.com'),
('user3', 'p455w0rd', 'user3@example.com'),
('user4', 'p455w0rd', 'user4@example.com')";

if ($mysqli->query($sqlInsertUsers) === true) {
    echo "Users table data inserted successfully";
} else {
    echo "Error inserting Users table data: " . $mysqli->error;
}
echo "<br>";

if ($mysqli->query($sqlReviews) === true) {
    echo "Reviews table created successfully";
} else {
    echo "Error creating Reviews table: " . $mysqli->error;
}
echo "<br>";

if ($mysqli->query($sqlGames) === true) {
    echo "Games table created successfully";
} else {
    echo "Error creating Games table: " . $mysqli->error;
}
echo "<br>";

$mysqli->close();
