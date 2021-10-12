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

        $problem = false;
        $use = $_SESSION['username'];

        $extension = substr($game_cover, strlen($game_cover)-4, strlen($game_cover));
        $allowed_extensions = array(".jpg", ".png", ".jpeg");
        if (!in_array($extension, $allowed_extensions)) {
            echo "<script type='text/javascript'>
                    alert ('Invalid format for the image. Only jpg / jpeg / png format allowed.');
                </script>";
            $problem = true;
        } else {
            //$game_img = md5($game_cover).$extension;
            //move_uploaded_file($_FILES["gamecover"]["tmp_name"], "uploadedImg/".$game_img);
            $game_img = addslashes(file_get_contents($_FILES["gamecover"]["tmp_name"]));
        }

        if (!$problem) {
            $game_covertest = $game_cover;
            $extension = substr($game_covertest, strlen($game_covertest)-4, strlen($game_covertest));
            $allowed_extensions = array(".jpg", ".png", ".jpeg");
            $game_img = addslashes(file_get_contents($_FILES["gamecover"]["tmp_name"]));

            if (!in_array($extension, $allowed_extensions)) {
                echo "<script type='text/javascript'>
                    alert ('Invalid format for the image. Only jpg / jpeg / png format allowed.');
                </script>";
                $problem = true;
            } else {
                //$game_img = md5($game_cover).$extension;
                //move_uploaded_file($_FILES["gamecover"]["tmp_name"], "uploadedImg/".$game_img);
                $game_img = addslashes(file_get_contents($_FILES["gamecover"]["tmp_name"]));
            }

            date_default_timezone_set("Asia/Kuala_Lumpur");
            $game_datetime = date('Y-m-d H:i:s');
            $sql = "INSERT INTO games (user_id, game_name, game_desc, game_publisher, game_datetime, game_year, game_cover)
                        VALUES ((SELECT user_id FROM users WHERE username= '$use'), '$game_name', '$game_desc', 
                        '$game_publisher', '$game_datetime' , '$game_year', '$game_img')";

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
