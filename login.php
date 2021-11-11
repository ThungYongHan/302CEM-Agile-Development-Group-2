<?php
session_start();

$db = mysqli_connect('localhost', 'root', '', 'GameReviewWebsite');
$username = mysqli_real_escape_string($db, $_POST['username']);
$password = mysqli_real_escape_string($db, $_POST['password']);
loginUser($username, $password);

function loginUser($username, $password)
{
    $db = mysqli_connect('localhost', 'root', '', 'GameReviewWebsite');
    if (isset($_POST['login_user'])) {
        if (empty($username)) {
            emptyUsernameAlert();
        }
        if (empty($password)) {
            emptyPasswordAlert();
        }

        if ((!empty($username)) && (!empty($password))) {
            $userquery = "SELECT * FROM Users 
                          WHERE username='$username' AND user_pass='$password' AND status='Verified'";

            $usernamequery = "SELECT * FROM Users WHERE username='$username'";
            $usernameeverifiedquery = "SELECT * FROM Users WHERE username='$username' AND status='Verified'";

            $userresults = mysqli_query($db, $userquery);
            $rolequery = "SELECT * FROM Users WHERE username='$username' AND user_role='user'";
            $roleresults = mysqli_query($db, $rolequery);

            $usernameresults = mysqli_query($db, $usernamequery);
            $verifyresults = mysqli_query($db, $usernameeverifiedquery);

            if (mysqli_num_rows($usernameresults) == 1 && mysqli_num_rows($verifyresults) != 1) {
                unverifiedEmailAlert();
            } elseif (mysqli_num_rows($usernameresults) == 1 && ((mysqli_num_rows($userresults) != 1))) {
                invalidPasswordAlert();
            } elseif (mysqli_num_rows($userresults) == 1) {
                if (mysqli_num_rows($roleresults) == 1) {
                    $_SESSION['username'] = $username;
                    header('Location:
                     http://localhost:8080/302CEM-Agile-Development-Group-2-master/GameBrowsingHomepage.php');
                } else {
                    $_SESSION['username'] = "admin";
                    adminLoginAlert();
                }
            } else {
                invalidLoginAlert();
            }
        }
    }
}

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

function unverifiedEmailAlert()
{
    echo
    "
    <script>
        window.alert('Please verify your email address before logging in!');
        window.location.href='GameBrowsingHomepage.php';
    </script>
    ";
}

function adminLoginAlert()
{
    echo
    "
    <script>
        window.alert('You are logging in as admin!');
        window.location.href='GameBrowsingHomepage_Admin.php';
    </script>
    ";
}
