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
vkey VARCHAR(50) NOT NULL,
user_role VARCHAR(256) NOT NULL,
status VARCHAR(10) NOT NULL DEFAULT '0',
PRIMARY KEY (user_id)
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
CONSTRAINT FK_gameuser_id FOREIGN KEY (user_id) REFERENCES Users(user_id) ON UPDATE CASCADE ON DELETE CASCADE
)";

$sqlReviews = "CREATE TABLE IF NOT EXISTS Reviews (
review_id INT(6) AUTO_INCREMENT,
user_id INT,
game_id INT,
user_review VARCHAR(256) NOT NULL,
review_num INT(6) NOT NULL,
review_datetime DATETIME NOT NULL,
PRIMARY KEY (review_id),
CONSTRAINT FK_reviewuser_id FOREIGN KEY (user_id) REFERENCES Users(user_id) ON UPDATE CASCADE ON DELETE CASCADE,
CONSTRAINT FK_reviewgame_id FOREIGN KEY (game_id) REFERENCES Games(game_id) ON UPDATE CASCADE ON DELETE CASCADE
)";

$sqlInsertUsers = "INSERT INTO Users (username, user_email, user_pass, user_role, status) VALUES 
('user1', 'user1@example.com', 'p455w0rd', 'user', 'Verified'),
('user2', 'user2@example.com', 'p455w0rd', 'user', 'Verified'),
('user3', 'user3@example.com', 'p455w0rd', 'user', 'Verified'),
('admin', 'admin@example.com', 'p455w0rd', 'admin', 'Verified')";

$sqlInsertGames = "INSERT INTO Games (user_id, game_name, game_desc, game_publisher, game_datetime, game_year, game_cover) VALUES 
((SELECT user_id FROM Users WHERE username ='user1'), 'Genshin Impact', 'Genshin Impact is an open-world action role-playing game that allows the player to control one of four characters in a party. Switching between characters can be done quickly during combat, allowing the player to use different combinations of skills.', 'miHoYo', '2021-09-01 09:00:00', '2017', LOAD_FILE('C:/xampp/htdocs/302CEM-Agile-Development-Group-2-master/images/Genshin_cover.jpg')),
((SELECT user_id FROM Users WHERE username='user2'), 'League of Legends','League of Legends features a team-based competitive game mode based on strategy and outplaying opponents. Players work with their team to break the enemy Nexus before the enemy team breaks theirs.','Riot Games', '2021-08-01 08:00:00', '2009', LOAD_FILE('C:/xampp/htdocs/302CEM-Agile-Development-Group-2-master/images/League_cover.jpg')),
((SELECT user_id FROM Users WHERE username='user3'), 'Fast & Furious Crossroads', 'Fast & Furious Crossroads is a racing and action role-playing video game based on the Fast & Furious film franchise.  Gear up for an epic new chapter in the Fast & Furious saga with high-speed heists, cinematic nonstop action, and adrenaline-fueled stunts.','Bandai Namco', '2021-07-01 07:00:00', '2020', LOAD_FILE('C:/xampp/htdocs/302CEM-Agile-Development-Group-2-master/images/Furious_cover.jpg')),
((SELECT user_id FROM Users WHERE username='user1'), 'Minecraft', 'Explore infinite worlds and build everything from the simplest of homes to the grandest of castles in Minecraft. Play in creative mode with unlimited resources or mine deep into the world in survival mode, crafting weapons to fend off mobs.','Mojang Studios', '2021-06-01 06:00:00', '2011', LOAD_FILE('C:/xampp/htdocs/302CEM-Agile-Development-Group-2-master/images/Minecraft_cover.jpeg')),
((SELECT user_id FROM Users WHERE username='user2'), 'Dawn of Fear', 'Dawn of Fear is a survival horror with 3rd person camera that tells the story of Alex, a young man with a past marked by tragedy. The player will have to solve puzzles, collect clues and objects, and survive.','Brok3nsite', '2021-05-01 05:00:00', '2020', LOAD_FILE('C:/xampp/htdocs/302CEM-Agile-Development-Group-2-master/images/Dawn_cover.jpg'))";

$sqlInsertReviews = "INSERT INTO Reviews (user_id, game_id, user_review, review_num, review_datetime) VALUES
((SELECT user_id FROM Users WHERE username ='user1'), (SELECT game_id FROM Games WHERE game_name ='Genshin Impact'), 'If you are looking for a fun game that you can just sit back and relax with, then Genshin Impact is excellent for that. The game’s world is pleasant to drink in and the combat is a nice balance of being involved, while not becoming overly complicated.', 5, '2021-09-01 09:00:00'),
((SELECT user_id FROM Users WHERE username ='user2'), (SELECT game_id FROM Games WHERE game_name ='Genshin Impact'), 'Genshin Impact is a video-game that has come to stay. Its free-to-play ARPG proposal is the answer to the wishes of thousands of users who dreamed of an Anime experience this ambitious. ', 5, '2021-09-01 09:00:00'),
((SELECT user_id FROM Users WHERE username ='user3'), (SELECT game_id FROM Games WHERE game_name ='Genshin Impact'), 'Genshin Impact is a remarkable game in many respects, boasting vibrant visuals, a rich, sprawling world, deep systems, and finely-tuned action.', 5, '2021-09-01 09:00:00'),
((SELECT user_id FROM Users WHERE username ='user1'), (SELECT game_id FROM Games WHERE game_name ='League of Legends'), 'League of Legends is a fantastic game with something for players of all skill ranges to enjoy. Although it is better to play with friends, you are not left to your own devices if you tend to keep to yourself. ', 5, '2021-08-01 08:00:00'),
((SELECT user_id FROM Users WHERE username ='user2'), (SELECT game_id FROM Games WHERE game_name ='League of Legends'), 'League of Legends is a fairly well polished game in that it optimizes team game play and coordination.', 4, '2021-08-01 08:00:00'),
((SELECT user_id FROM Users WHERE username ='user3'), (SELECT game_id FROM Games WHERE game_name ='League of Legends'), 'The only saving grace of this game is that it is free to play. Besides that there is nothing positive to say about this game. Riot does nothing about the toxicity of player base.', 2, '2021-08-01 08:00:00'),
((SELECT user_id FROM Users WHERE username ='user1'), (SELECT game_id FROM Games WHERE game_name ='Fast & Furious Crossroads'), 'Fast and Furious Crossroads is a disappointing game from an experienced studio like Slightly Mad. Low production values, an absurd driving model and a very short story make it very hard to suggest anyone playing it.', 1, '2021-01-01 01:00:00'),
((SELECT user_id FROM Users WHERE username ='user2'), (SELECT game_id FROM Games WHERE game_name ='Fast & Furious Crossroads'), 'Short, shallow, and surprisingly simple, Fast & Furious Crossroads is a disappointment in almost every department.', 2, '2021-01-01 01:00:00'),
((SELECT user_id FROM Users WHERE username ='user3'), (SELECT game_id FROM Games WHERE game_name ='Fast & Furious Crossroads'), 'Crucially, the driving itself just is not fun, resulting in a bland experience interchangeable with any other street racing franchise.', 1, '2021-01-01 01:00:00'),
((SELECT user_id FROM Users WHERE username ='user1'), (SELECT game_id FROM Games WHERE game_name ='Minecraft'), 'Minecraft is possibly one of the best video games I have ever played, it challenges you to build, craft and fight after you become stranded on an almost infinite terrain named by you.', 5, '2021-06-01 06:00:00'),
((SELECT user_id FROM Users WHERE username ='user2'), (SELECT game_id FROM Games WHERE game_name ='Minecraft'), 'It is very simple in design, yet with this simplicity, you can create a world bigger than our own.', 4, '2021-06-01 06:00:00'),
((SELECT user_id FROM Users WHERE username ='user3'), (SELECT game_id FROM Games WHERE game_name ='Minecraft'), 'It is a masterpiece. Once you start the game you cannot put it back down,the infinite random world makes a different experience everytime you play it.', 5, '2021-06-01 06:00:00'),
((SELECT user_id FROM Users WHERE username ='user1'), (SELECT game_id FROM Games WHERE game_name ='Dawn of Fear'), 'Dawn of Fear tries to bring back the nostalgia of classic survival horror but fails in almost every way.', 2, '2021-02-01 02:00:00'),
((SELECT user_id FROM Users WHERE username ='user2'), (SELECT game_id FROM Games WHERE game_name ='Dawn of Fear'), 'Dawn of Fear is a poor attempt to recreate the magic of a survival horror classic, with too many problems to gain any sense of enjoyment.', 2, '2021-02-01 02:00:00'),
((SELECT user_id FROM Users WHERE username ='user3'), (SELECT game_id FROM Games WHERE game_name ='Dawn of Fear'), 'Dawn of Fear in a true old school survival horror but is literally devastated by too many technical flaws.', 1, '2021-02-01 02:00:00')";

if ($mysqli->query($sqlUsers) === true) {
    echo "Users table created successfully";
} else {
    echo "Error creating Users table: " . $mysqli->error;
}
echo "<br>";

if ($mysqli->query($sqlGames) === true) {
    echo "Games table created successfully";
} else {
    echo "Error creating Games table: " . $mysqli->error;
}
echo "<br>";

if ($mysqli->query($sqlReviews) === true) {
    echo "Reviews table created successfully";
} else {
    echo "Error creating Reviews table: " . $mysqli->error;
}
echo "<br>";

if ($mysqli->query($sqlInsertUsers) === true) {
    echo "Users table data inserted successfully";
} else {
    echo "Error inserting Users table data: " . $mysqli->error;
}
echo "<br>";

if ($mysqli->query($sqlInsertGames) === true) {
    echo "Games table data inserted successfully";
} else {
    echo "Error inserting Games table data: " . $mysqli->error;
}
echo "<br>";

if ($mysqli->query($sqlInsertReviews) === true) {
    echo "Reviews table data inserted successfully";
} else {
    echo "Error inserting Reviews table data: " . $mysqli->error;
}
echo "<br>";

$mysqli->close(); 
