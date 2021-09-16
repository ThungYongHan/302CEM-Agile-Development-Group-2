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
game_id INT,
user_review VARCHAR(256) NOT NULL,
review_num INT(6) NOT NULL,
review_datetime DATETIME NOT NULL,
PRIMARY KEY (review_id),
CONSTRAINT FK_reviewuser_id FOREIGN KEY (user_id) 
REFERENCES Users(user_id),
CONSTRAINT FK_reviewgame_id FOREIGN KEY (game_id) 
REFERENCES Games(game_id)
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
('user1', 'user1@example.com', 'p455w0rd'),
('user2', 'user2@example.com', 'p455w0rd'),
('user3', 'user3@example.com', 'p455w0rd')";

$sqlInsertReviews = "INSERT INTO Reviews (FK_reviewuser_id, FK_reviewgame_id, user_review, review_num, review_datetime) VALUES 
(SELECT user_id FROM Users WHERE username ='user1', SELECT game_id FROM Games WHERE game_name ='Genshin Impact', 'Genshin Impact is a more traditional RPG with a load of cues taken from MMOs and grindy mobile games, its rewards feed into a complex system that is surprisingly engrossing.', '1', '2020-12-30'),
(SELECT user_id FROM Users WHERE username ='user2', SELECT game_id FROM Games WHERE game_name ='League of Legends', 'League of legends is one of the biggest games out there right now.', '1', '2020-12-30')";

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
