<?php
    session_start();
    $db = mysqli_connect('localhost', 'root', '', 'GameReviewWebsite');

function emptyUsernameAlert()
{
    echo "
    <script>
         window.alert('Username field cannot be empty!');
         window.location.href='LoginSignUpModal.php';
    </script>
    ";
}

function emptyPasswordAlert()
{
    echo "
    <script>
        window.alert('Password field cannot be empty!');
        window.location.href='LoginSignUpModal.php';
    </script>
    ";
}

if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($username)) {
        emptyUsernameAlert();
        // echo "Username field cannot be empty!";
    }
    if (empty($password)) {
        emptyPasswordAlert();
        // echo "Password field cannot be empty!";
    }

    if ((!empty($username)) && (!empty($password))) {
        $query = "SELECT * FROM Users WHERE username='$username' AND user_pass='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
            $_SESSION['username'] = $username;
            header('Location: http://localhost:8080\AgileDev\GameBrowsingHomepage.php');
        } else {
            echo "Invalid username and password combination!";
        }
    }
}
