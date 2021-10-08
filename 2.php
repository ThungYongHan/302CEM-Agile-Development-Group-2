<?php
$title = 'League of Legends';
include ("header.php");
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
      padding-top: 0px;
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
    }

    #floatingTextarea {
      max-width: 30%;
      height: 100px;
    }

    .review-container {
      padding-left: 25px;
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
    <img src="League_cover.jpg" style="width:450px;height:700px;">
    <!-- <div class="GameTitleYear"> -->
      <?php 
      $link = mysqli_connect("localhost", "root", "", "gamereviewwebsite");
 
      // Check connection
      if($link === false){
          die("ERROR: Could not connect. " . mysqli_connect_error());
      }
      
      //header('Content-Type:'.$row['mime']);
       
      // Attempt select query execution
      $sql = "SELECT * 
      FROM games
      LEFT JOIN users ON games.user_id = users.user_id
      WHERE game_id=2";
      $result=mysqli_query($link,$sql);
      // $resultCheck = mysqli_num_rows($result);

      
        while($row =mysqli_fetch_array($result)){
          echo '<div class="GameTitleYear">';
           echo '<h2>'.$row['game_name'].'</h2>';
           echo '<p class="text-small">'.$row['game_year'].'</p>';
           echo '</div>';
           echo '<div class="GameDescription">';
           echo '<p>'.$row['game_desc'].'</p>';
           echo '</div>';
           echo '<br />';
           echo ' <div class="PublisherUserInfo py-5">';
           echo '<ul>';
           echo '<li style="list-style-type:none;">Published By:'.$row['game_year'].'</li><br>';
           echo '<li style="list-style-type:none;">Added On:'. date('d/m/Y', strtotime($row['game_datetime'])).'</li><br>';
           echo '<li style="list-style-type:none;">Added By:'.$row['username'].'</li><br>';
         echo '</div>';
         echo '</div>';
        
      }
      
      ?>
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <!--</div>-->
 
  </section>

  <section id="game-review-container">
      <div class="review-list">
      <h4>Ratings and Reviews</h4>
        <hr />
     
<?php

/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "gamereviewwebsite");

 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt select query execution
$sql = "SELECT * 
FROM reviews 
LEFT JOIN users ON reviews.user_id = users.user_id
WHERE game_id=2";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){

        while($row = mysqli_fetch_array($result)){
            print '<div class="container-fluid">
                <div class="row g-1">
                
                <p class="text-light fw-bold fs-4">'.$row['username'].' <span class="fs-6"> on</span> <span class="fs-6" style="color:#5979f8"> '.date('d-m-Y',strtotime($row['review_datetime'])).'</span></p>';

            print '<div class="article-bg mx-auto p-3"> <span class="fs-6 badge bg-dark">';
            print $row['review_num']. ' <i style="color:#c9d3fc;" class="fa fa-star"></i></span><div class="divider p-1"></div>';

            print '<div class="reviews"><p class="fs-5">'.$row['user_review']."</div>";

            print '</div></div></div><br>';

        }

        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>
      </div>
      <fieldset disabled>
        <div class="review-container">
          <h4>Rate and write a review about the game</h4>
          <div class="rating-slider">
            <label for="game-rating">Rate the game</label>
            <br />
            <input type="range" class="form-range" value="0" min="0" max="5" step="1" id="game-rating"
              oninput="this.nextElementSibling.value = this.value">
            <output>0</output>
          </div>
          <div class="review">
            <label for="floatingTextarea">Review</label>
            <br />
            <textarea class="form-control" placeholder="Leave a review here" id="floatingTextarea"></textarea>
          </div>
          <br />
          <button type="submit" class="btn btn-outline-light">Submit</button>
          <br />
          <br />
        </div>
      </fieldset>
   
  </section>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
    crossorigin="anonymous"></script>
</body>

</html>