<!DOCTYPE html>
<html lang="en">

<head>
  <title>Page Title</title>
  <!-- <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet'>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
  <?php include 'header.php';?>
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

    .covers{
      margin: 0 auto;
    }
  </style>
</head>
<body>
  <section id="game-review-container">
      <div class="py-4 review-list container">
      <h4 >Games List</h4>
        <hr />
        <?php
 $connect = mysqli_connect("localhost", "root", "", "GameReviewWebsite");
  $query = "SELECT * FROM games ORDER BY game_id ASC";
  $result = mysqli_query($connect, $query);
        echo '<table class="table text-light">';
        echo '<thead>';
            echo "<tr>";
                echo "<th>game_id</th>";
                echo "<th>user_id</th>";
                echo "<th>game_name</th>";
                echo "<th>game_desc</th>";
                echo "<th>game_publisher</th>";
                echo "<th>game_datetime</th>";
                echo "<th>game_year</th>";
                echo "<th>game_cover</th>";
            echo "</tr>";
            echo '</thead>';
  while($row = mysqli_fetch_array($result))
  {
    print'
     <tbody>
     <tr>
    <td> '. $row['game_id'] .'</td>
    <td> '. $row['user_id'] .'</td>
    <td>'. $row['game_name'] . '</td>
     <td>' . $row['game_desc'] . '</td>
    <td> '. $row['game_publisher'] . '</td>
    <td>'. $row['game_datetime'] . '</td>
    <td>'. $row['game_year'] . '</td>
    <td><img class="covers img-fluid img-thumbnail" src="data:image/png;base64,'.base64_encode($row['game_cover']).'" /></td>
    </tr>
    </tbody>';
  }
  echo "</table>";
  ?>

</div>
  </section>
  <section id="game-review-container">
      <div class="py-4 review-list container">
      <h4>Ratings and Review</h4>
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
$sql = "SELECT * FROM reviews";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
     
        echo '<table class="table text-light">'; 
        echo '<thead>';
            echo "<tr>";
               echo "<th>review_id</th>";
                echo "<th>user_id</th>";
                echo "<th>game_id</th>";
                echo "<th>user_review</th>";
                echo "<th>review_num</th>";
                echo "<th>review_datetime</th>";
            echo "</tr>";
            echo '</thead>';
        while($row = mysqli_fetch_array($result)){
          echo '<tbody>';
            echo "<tr>";
                echo "<td>" . $row['review_id'] . "</td>";
                echo "<td>" . $row['user_id'] . "</td>";
                echo "<td>" . $row['game_id'] . "</td>";
                echo "<td>" . $row['user_review'] . "</td>";
                echo "<td>" . $row['review_num'] . "</td>";
                echo "<td>" . $row['review_datetime'] . "</td>";
            echo "</tr>";
            echo '</tbody>';
        }
        echo "</table>";
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
  </section>
    <section id="reviewing">
      <fieldset disabled>
        <div class="py-4 review-container container">
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