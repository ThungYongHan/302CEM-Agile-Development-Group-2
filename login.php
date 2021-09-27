<?php
session_start();

$db = mysqli_connect('localhost', 'root', '', 'GameReviewWebsite');
function emptyUsernameAlert()
{
    echo
    "
    <script>
         window.alert('Username field cannot be empty!');
         window.location.href='GameBrowsingHomepage.php';
    </script>
    ";
}

function emptyPasswordAlert()
{
    echo
    "
    <script>
        window.alert('Password field cannot be empty!');
        window.location.href='GameBrowsingHomepage.php';
    </script>
    ";
}

function invalidLoginAlert()
{
    echo
    "
    <script>
        window.alert('Invalid username and password combination!');
        window.location.href='GameBrowsingHomepage.php';
    </script>
    ";
}

function invalidPasswordAlert()
{
    echo
    "
    <script>
        window.alert('Username is found in database but the password is incorrect!');
        window.location.href='GameBrowsingHomepage.php';
    </script>
    ";
}


if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($username)) {
        emptyUsernameAlert();
    }
    if (empty($password)) {
        emptyPasswordAlert();
    }

    if ((!empty($username)) && (!empty($password))) {
        $query = "SELECT * FROM Users WHERE username='$username' AND user_pass='$password'";
        $usernamequery = "SELECT * FROM Users WHERE username='$username'";

        $results = mysqli_query($db, $query);
        $usernameresults = mysqli_query($db, $usernamequery);
        
        if (mysqli_num_rows($usernameresults) == 1 && mysqli_num_rows($results) != 1) {
            invalidPasswordAlert();
        } elseif (mysqli_num_rows($results) == 1) {
            $_SESSION['username'] = $username;
            header('Location: http://localhost:8080/302CEM-Agile-Development-Group-2-master/GameBrowsingHomepage.php');
        } else {
            invalidLoginAlert();
        }
    }
}
