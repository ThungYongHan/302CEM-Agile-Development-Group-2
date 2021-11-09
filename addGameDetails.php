<?php
error_reporting(0);
session_start();

$conn = mysqli_connect("localhost", "root", "", "GameReviewWebsite");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL.";
}

$problem = false;
date_default_timezone_set("Asia/Kuala_Lumpur");

$user = $_SESSION['username'];
$game_name = mysqli_real_escape_string($conn, $_POST["gamename"]);
$game_desc = mysqli_real_escape_string($conn, $_POST["gamedescription"]);
$game_publisher = mysqli_real_escape_string($conn, $_POST["gamepublisher"]);
$game_datetime = date('Y-m-d H:i:s');
$game_year = $_POST["gameyear"];
$game_cover = addslashes(file_get_contents($_FILES["gamecover"]["tmp_name"]));

addGame($user, $game_name, $game_desc, $game_publisher, $game_datetime, $game_year, $game_cover);

function addGame($user, $game_name, $game_desc, $game_publisher, $game_datetime, $game_year, $game_cover)
{
    $conn = mysqli_connect("localhost", "root", "", "GameReviewWebsite");
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL.";
    }

    $sql1 = "SELECT game_id FROM games WHERE game_name = ?";

    if ($statement = mysqli_prepare($conn, $sql1)) {
        mysqli_stmt_bind_param($statement, "s", $param_gamename);

        $param_gamename = trim($game_name);

        if (mysqli_stmt_execute($statement)) {
            mysqli_stmt_store_result($statement);

            if (mysqli_stmt_num_rows($statement) == 1) {
                echo "<script type='text/javascript'>
                    alert ('The game already exists in the database!');
                    window.location.href='GameBrowsingHomepage.php';
                </script>";

                $problem = true;
            } else {
                $game_name = trim($game_name);
            }
        }
        mysqli_stmt_close($statement);
    }

    if ($_FILES["gamecover"]["size"] > 60000) {
        fileSizeAlert();
        $problem = true;
    } else {
        $game_cover = addslashes(file_get_contents($_FILES["gamecover"]["tmp_name"]));
    }
    if (!$problem) {
        $sql = "INSERT INTO games (user_id, game_name, game_desc, game_publisher, game_datetime, game_year, game_cover)
                        VALUES ((SELECT user_id FROM users WHERE username= '$user'), '$game_name', '$game_desc', 
                        '$game_publisher', '$game_datetime' , '$game_year', '$game_cover')";

        if (mysqli_query($conn, $sql)) {
            AddSuccessAlert();
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

function AddSuccessAlert()
{
    echo
    "
    <script>
        window.alert('Game added successfully.');
        window.location.href='GameBrowsingHomepage.php';
    </script>
    ";
}
