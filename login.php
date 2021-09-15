<?php
    session_start();
    $db = mysqli_connect('localhost', 'root', '', 'GameReviewWebsite');
    
    if (isset($_POST['login_user'])) {
        $username = mysqli_real_escape_string($db, $_POST['username']);
        $password = mysqli_real_escape_string($db, $_POST['password']);

        if (empty($username)) {
            echo "Username field cannot be empty!";
        }
        if (empty($password)) {
            echo "Password field cannot be empty!";
        }

        $query = "SELECT * FROM Users WHERE username='$username' AND user_pass='$password'";
        $results = mysqli_query($db, $query);
            
        if (mysqli_num_rows($results) == 1) {
            $_SESSION['username'] = $username;
            header('Location: http://localhost:8080\AgileDev\GameBrowsingHomepage.php');
        } else {
            echo "Invalid username and password combination!";
        }
    }
