<?php

/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "GameReviewWebsite");


// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

error_reporting(0);
session_start();
$title = $_POST['game_name'];
$id = $_GET['game_id'];
$user = $_SESSION['username'];
if (empty($user)) {
    include('header.php');
} else {
    include('loggedinheader.php');
}

$sql = "SELECT * 
      FROM games
      LEFT JOIN users ON games.user_id = users.user_id
      WHERE game_id = $id";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Page Title</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        div {
            padding-right: 10px;
        }

        body {
            font-family: "Lato";
            background-color: #14181c;
            color: white;
        }

        .game-detail-container {
            padding-top: 20px;
            width: 100%;
            height: auto;
        }

        img {
            float: left;
            margin-right: 25px;
            margin-left: 25px;
        }

        .GameDescription {
            color: #93a3b3;
            padding-top: 25px;
            font-size: 20px;
            text-align: justify;
        }

        .GameTitleYear {
            padding-top: 0;
        }

        .PublisherUserInfo {
            color: #99AABB;
            font-size: 20px;
            line-height: 0.8;
            padding-top: 220px;

        }

        div.a {
            line-height: 80%;
        }

        .rating-slider {
            width: 100%;
            padding-left: 0px;
            
        }

        #game-rating {
            max-width: 30%;
        }

        .review {
            width: 100%;
            padding-left: 0px;
            font-size: 20px

        }

        #floatingTextarea {
            max-width: 30%;
            height: 100px;
            font-size: 20px;
        }

        .review-container {
            padding-left: 25px;
            font-size: 20px
        }

        .review-list {
            padding-left: 25px;
        }

        .article-bg{
            background-color: #5979f8;
            border: none;
            border-radius: 5px;
        }

        .divider{
            border-bottom-width: 2px;
            border-bottom-style: dotted;
        }

        .reviews{
            padding-top:0.5em;
        }

        

       
        

    </style>
</head>

<body>
<section class="game-detail-container">

    <!-- <div class="GameTitleYear"> -->
    <?php
    //header('Content-Type:'.$row['mime']);

    // Attempt select query execution

    $result=mysqli_query($link,$sql);
    // $resultCheck = mysqli_num_rows($result);
    while($row =mysqli_fetch_array($result)){
        echo '<img src="data:image/jpg;base64,'.base64_encode($row['game_cover']).'"
          alt="game_cover" style="width: 252px; height: 383px;" />';
        echo '<div class="GameTitleYear">';
        echo '<h2>'.$row['game_name'].'</h2>';
        echo '<p class="text-small">'.$row['game_year'].'</p>';
        echo '</div>';
        echo '<div class="GameDescription">';
        echo '<p>'.$row['game_desc'].'</p>';
        echo '</div>';
        echo '<br />';
        echo '<div class="PublisherUserInfo py-5">';
        echo '<ul>';
        echo '<li style="list-style-type:none;">Published By:'.$row['game_year'].'</li><br>';
        echo '<li style="list-style-type:none;">Added On:'. date('d/m/Y', strtotime($row['game_datetime'])).'</li><br>';
        echo '<li style="list-style-type:none;">Added By:'.$row['username'].'</li><br>';
        echo '</div>';
        echo '</div>';

    }

    ?>

    <!--</div>-->

</section>

<article id="game-review-container">
    <div class="review-list">
        <h4>Ratings and Reviews</h4>
        <hr />

        <?php

        // Attempt select query execution
        $game_no = $_GET['game_id'];

        $sql = "SELECT * 
        FROM reviews 
        LEFT JOIN users ON reviews.user_id = users.user_id
        WHERE game_id=$game_no";


        $result = mysqli_query($link, $sql);
        while($row = mysqli_fetch_assoc($result)){
            print '<div class="container-fluid">
                <div class="row g-1">
                
                <p class="text-light fw-bold fs-4">'.$row['username'].' <span class="fs-6"> on</span> <span class="fs-6" style="color:#5979f8"> '.date('d-m-Y',strtotime($row['review_datetime'])).'</span>
                <span class="fs-6"> at </span><span class="fs-6" style="color:#5979f8">'.date('h:ia',strtotime($row['review_datetime'])).'</span></p>';

            print '<div class="article-bg mx-auto p-3"> <span class="fs-6 badge bg-dark">';
            print $row['review_num']. ' <i style="color:#c9d3fc;" class="fa fa-star"></i></span><div class="divider p-1"></div>';

            print '<div class="reviews"><p class="fs-5">'.$row['user_review']."</div>";

            print '</div></div></div><br>';

        }
        //                include ('testing.php');
        // Free result set

        mysqli_free_result($result);
        //            else{
        //                echo "No records matching your query were found.";
        //
        //        else{
        //            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        //        }
        ?>
        <?php
        session_start();

        $user = $_SESSION['username'];
        if (empty($user)) {
            echo '<h5 class="row text-white-50">Please login to review.</h5>';
        }
        else{
            print '<form method="post" action="">
        <div class="review-container">
            <h4 class="row">Rate and write a review about the game</h4>
            <hr>
            <div class="rating-slider">
                <label for="game-rating">Rate the game</label>
                <br />
                <input type="range" class="form-range" value="0" min="0" max="5" step="1" id="game-rating"  
                       oninput="this.nextElementSibling.value = this.value" name="review_num">
                <output>0</output>
            </div>
            <div class="review">
                <label for="floatingTextarea">Review</label>
                <br />
                <textarea class="form-control" placeholder="Leave a review here" id="floatingTextarea" name="user_review" required></textarea>
            </div>
            <br />
            <button type="submit" class="btn btn-outline-light"  name="Submit" >Submit</button>';
            print '<br />
            <br />
        </div>
    </form>';
        }

        function addReviewSuccessAlert()
        {
            print "
            <script>
            window.alert('Review added and will display!');
            window.location.href='GameBrowsingHomepage.php';
            </script>";

        }

        function reviewExistsAlert(){
            print"
            <script>
            window.alert('The review has been existed.')
            </script>";
            exit();
        }

        if(isset($_POST["Submit"])){
            $review_num = $_POST['review_num'];
            $user_review= mysqli_escape_string($link,$_POST['user_review']);
            date_default_timezone_set("Asia/Kuala_Lumpur");
            $review_datetime = date('Y-m-d H:i:s');


            $check=mysqli_query($link,"SELECT * FROM reviews WHERE user_review='$user_review' AND review_num='$review_num'");
            $checkrows=mysqli_num_rows($check);

            if($checkrows>0){
                reviewExistsAlert();
            }else{
                $sql = "INSERT INTO reviews
                (user_id,game_id,review_num,user_review,review_datetime) 
                VALUES ((SELECT user_id FROM users WHERE username= '$user'),
                (SELECT game_id FROM games WHERE game_id= '$id'),'$review_num','$user_review','$review_datetime')";

//                addReviewSuccessAlert();

                mysqli_query($link,$sql);
                addReviewSuccessAlert();
//                header("Location:/302CEM-Agile-Development-Group-2-master/GameBrowsingHomepage.php");

            }


        }

        mysqli_close($link);

        ?>
    </div>


</article>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
        crossorigin="anonymous"></script>
</body>

</html>