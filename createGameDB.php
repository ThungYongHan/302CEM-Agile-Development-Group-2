<?php
$mysqli = new mysqli("localhost", "root", "", "GameReviewWebsite");

if ($mysqli -> connect_errno) {
    die("Connection failed: ".$mysqli ->connect_error);
}

$sqlGames = "CREATE TABLE IF NOT EXISTS Games(
    game_id INT(6) AUTO_INCREMENT,
    user_id INT,
    game_name VARCHAR(50) NOT NULL,
    game_desc VARCHAR(256) NOT NULL,
    game_publisher VARCHAR(50) NOT NULL,
    game_datetime DATETIME NOT NULL,
    game_year YEAR NOT NULL,
    game_cover BLOB NOT NULL,
    PRIMARY KEY (game_id),
    CONSTRAINT FK_user_id FOREIGN KEY (user_id) 
    REFERENCES Users(user_id)
)";

if ($mysqli -> query($sqlGames) === true){
    echo "Games table created successfully";
}else{
    echo "Error creating table: " . $mysqli->error;
}

$mysqli->close();
?>