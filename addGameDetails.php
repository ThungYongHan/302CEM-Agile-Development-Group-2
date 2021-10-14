<?php
  error_reporting(0);
  session_start();

$conn = mysqli_connect("localhost", "root", "", "GameReviewWebsite");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL.";
}

$problem = false;

$game_name = mysqli_real_escape_string($conn, $_POST["gamename"]);
$game_desc = mysqli_real_escape_string($conn, $_POST["gamedescription"]);
$game_publisher = mysqli_real_escape_string($conn, $_POST["gamepublisher"]);
$game_year = $_POST["gameyear"];
$user = $_SESSION['username'];

addGame($game_name, $game_desc, $game_publisher, $game_year, $user);

function addGame($game_name, $game_desc, $game_publisher, $game_year, $user)
{
    $conn = mysqli_connect("localhost", "root", "", "GameReviewWebsite");
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL.";
    }
    $game_img = addslashes(file_get_contents($_FILES["gamecover"]["tmp_name"]));
    if ($_FILES["gamecover"]["size"] > 60000) {
        fileSizeAlert();
        $problem = true;
    } else {
        $game_img = addslashes(file_get_contents($_FILES["gamecover"]["tmp_name"]));
    }
    if (!$problem) {
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $game_datetime = date('Y-m-d H:i:s');
        $sql = "INSERT INTO games (user_id, game_name, game_desc, game_publisher, game_datetime, game_year, game_cover)
                        VALUES ((SELECT user_id FROM users WHERE username= '$user'), '$game_name', '$game_desc', 
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
    }
}
          
function fileSizeAlert()
{
    echo
    "
    <script>
        window.alert('Uploaded game cover image file size is over the 60kb limit.');
        window.location.href='GameBrowsingHomepage.php';
    </script>
    ";
}
