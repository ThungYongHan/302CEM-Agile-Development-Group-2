<?php
error_reporting(0);
session_start();
$title = "Game Browsing Homepage";
$user = $_SESSION['username']="admin";
if (empty($user)) {
    include('header_Admin.php');
} else {
    include('loggedinheader.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Game Browsing Homepage</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lato&display=swap');
        h3 {
            display: inline-block;
        }
    </style>
    <style>
        * {
            margin: 0;
            padding: 0;
        }
        input,
        textarea {
            width: 50%;
            margin-bottom: 3vh;
            border-radius: 1vh;
            font-size: 8vw;
        }
        form.testform {
            background: rgb(130, 117, 189);
            padding: 50px 50px;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
<section id ="jumbotron-section">
    <div class="row">
        <div id="jumbo-image" class="container py-5 text-center text-dark" style="background-image: linear-gradient(to bottom,rgba(171, 196, 222, 0.55)50% ,rgba(255, 255, 255, 0.75) 75%),url(images/GI.jpg)">
            <h1 class="display-5">Welcome to the Game Review Website</h1>
            <p class="lead">We review games for gamers of all sorts.</p>
            <p class="lead">
                <a class="btn btn-outline-dark btn-lg" href="#" role="button">Start browsing<span>🎮</span></a>
            </p>
        </div>
    </div>
</section>

<section id="games_on_the_shelf">
    <div class="row">
        <div class="col-12">
            <div class="container py-5">
                <h3>Games On The Shelf</h3>
                <?php
                if (!empty($user)) {
                    ?>
                    <button type="button" button class="btn btn-secondary ms-3 mb-3" data-bs-toggle="modal" data-bs-target="#addGameModal">Add Game</button>
                    <?php
                }
                ?>
                <hr class="me-auto">
                <div class="row">
                    <div class="modal fade" id="addGameModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form method="POST" class="testform" action="addGameDetails.php" enctype="multipart/form-data">
                                    <h2 style="color:black;">Add Game</h2>
                                    <div class="mb-3">
                                        <label for="GameName" class="form-label">Game Name</label>
                                        <input type="text" class="form-control" id="gamename" name="gamename" aria-describedby="gameHelp" required/>
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Game Description</label>
                                        <textarea
                                                class="form-control"
                                                id="exampleFormControlTextarea1"
                                                rows="3"
                                                name="gamedescription"
                                                required
                                        ></textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label for="publisher" class="form-label">Game Publisher</label>
                                        <input type="text" class="form-control" id="gamepublisher" name="gamepublisher" aria-describedby="gameHelp" required/>
                                    </div>

                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Game Cover Image</label>
                                        <input class="form-control" type="file" accept="image/*" id="formFile" name="gamecover" required/>
                                    </div>

                                    <label for="customRange" class="form-label">Year Published</label>
                                    <input type="range" class="form-range" min="1980" max="2021" id="customRange" name="gameyear" required/>
                                    <p>Year: <span id="demo"></span></p><br>
                                    <script>
                                        var slider = document.getElementById("customRange");
                                        var output = document.getElementById("demo");
                                        output.innerHTML = slider.value;
                                        slider.oninput = function() {
                                            output.innerHTML = this.value;
                                        }
                                    </script>
                                    <button type="submit" name="add_game" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php
                    $connect = mysqli_connect("localhost", "root", "", "GameReviewWebsite");
                    $query = "SELECT * FROM games ORDER BY game_id ASC";
                    $result = mysqli_query($connect, $query);

                    $row['game_id'] = $_GET['game_id'];
                    while ($row = mysqli_fetch_array($result)) {
                        print'
  <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
  <div class="card-style-1 mb-30">
    <div class="card-meta">
    </div>
    <div class="card-image">
        <img src="data:image/jpg;base64,'.base64_encode($row['game_cover']).'"
          alt="placeholder" style="width: 252px; height: 383px;" />
    </div>
    <div class="card-content">
      <h4> '.$row['game_name'].' </h4>
      <p>'.$row['game_desc'].'</p>
      <div class="d-flex justify-content-between align-items-center">
        <div class="btn-group">
          <button type="button" class="btn btn-primary" onclick="document.location=\'GameDetailsReviews_Admin.php?game_id='.$row['game_id'].'\'">View</button>
        </div>
      </div>
    </div>
  </div>
</div>
   ';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>


