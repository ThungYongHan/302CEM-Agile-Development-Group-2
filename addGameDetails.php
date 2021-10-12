<?php
  error_reporting(0);
  session_start();

$conn = mysqli_connect("localhost", "root", "", "GameReviewWebsite");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL.";
}

$game_name = mysqli_real_escape_string($conn, $_POST["gamename"]);
$game_desc = mysqli_real_escape_string($conn, $_POST["gamedescription"]);
$game_publisher = mysqli_real_escape_string($conn, $_POST["gamepublisher"]);
$game_cover = $_FILES["gamecover"]["name"];
$game_year = $_POST["gameyear"];

addGame($game_name, $game_desc, $game_publisher, $game_cover, $game_year);

function addGame($game_name, $game_desc, $game_publisher, $game_cover, $game_year)
{
    if (isset($_POST['add_game'])) {
        $conn = mysqli_connect("localhost", "root", "", "GameReviewWebsite");
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL.";
        }
    
        $problem = false;

        //if ($_SERVER["REQUEST METHOD"] == "POST") {
        if (!preg_match('/^[a-zA-Z0-9_]+$/', trim($game_name))) {
            echo "<script type='text/javascript'>
                    alert ('Game name can only contain letters, numbers, and underscores.');
                </script>";
                 
            $problem = true;
        } else {
            $name = $game_name;
        }

        if (!preg_match('/^[a-zA-Z0-9_]+$/', trim($game_publisher))) {
            echo "<script type='text/javascript'>
                    alert ('Game publisher can only contain letters, numbers, and underscores.');
                </script>";
            $problem = true;
        } else {
            $publisher = $game_publisher;
        }
            
        if (!preg_match('/^[a-zA-Z0-9_]+$/', trim($game_desc))) {
            echo "<script type='text/javascript'>
                    alert ('Game description can only contain letters, numbers, and underscores.');
                </script>";
            $problem = true;
        } else {
            $description = $game_desc;
        }

        $extension = substr($game_cover, strlen($game_cover)-4, strlen($game_cover));
        $allowed_extensions = array(".jpg", ".png", ".jpeg");
        if (!in_array($extension, $allowed_extensions)) {
            echo "<script type='text/javascript'>
                    alert ('Invalid format for the image. Only jpg / jpeg / png format allowed.');
                </script>";
            $problem = true;
        } else {
            $game_img = md5($game_cover).$extension;
            move_uploaded_file($_FILES["gamecover"]["tmp_name"], "uploadedImg/".$game_img);
        }

        if (!$problem) {
            date_default_timezone_set("Asia/Kuala_Lumpur");
            $game_datetime = date('Y-m-d H:i:s');
            $sql = "INSERT INTO games ( user_id, game_name, game_desc, game_publisher, game_datetime, game_year, game_cover)
                        VALUES ((SELECT user_id from users WHERE username= {$_SESSION['username']}), $name,
                        $description, $publisher, $game_datetime, $game_year, $game_img)";
            if (mysqli_query($conn, $sql)) {
                echo "<script type='text/javascript'>
                        alert ('Game added successfully!');
                        </script>";
                header("Location: GameBrowsingHomepage.php");
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "testmessage";
        }
        //if}
    }
}
