<?php
  error_reporting(0);
  session_start();
  $user = $_SESSION['username'];
  if (empty($user)) {
      include('header.php');
  } else {
      include('loggedinheader.php');
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no">
    <!-- Google Font -->
    <style>@import url('https://fonts.googleapis.com/css2?family=Lato&display=swap');</style>
     <!-- Required meta tags -->
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
 
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
 
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Game Browsing Homepage</title>
</head>
<body>
    <section id ="jumbotron-section">
      <div class="row">
        <div id="jumbo-image" class="container py-5 text-center text-dark" style="background-image: linear-gradient(to bottom,rgba(171, 196, 222, 0.55)50% ,rgba(255, 255, 255, 0.75) 75%),url(assets/images/GI.jpg)">
        <h1 class="display-5">Welcome to the Game Review Website</h1>
        <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
        <!-- <hr class="my-4"> -->
        <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
        <p class="lead">
          <a class="btn btn-outline-dark btn-lg" href="#" role="button">Learn more</a>
        </p>
      </div>
      </div>
    </section>

    <section id="review">
        <!-- This is the review section -->
        <div class="row">
            <div class="col-12">
                <div class="container py-5">
                <h3>Games on the shelf...</h3>
                <hr class="me-auto">
                  <!-- ========= card-style-1 start ========= -->
            <div class="row">

            <?php
 $connect = mysqli_connect("localhost", "root", "", "GameReviewWebsite");
  $query = "SELECT * FROM games ORDER BY game_id ASC";
  $result = mysqli_query($connect, $query);
  while($row = mysqli_fetch_array($result))
  {
   print'

  <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
  <div class="card-style-1 mb-30">
    <div class="card-meta">
    </div>
    <div class="card-image">
        <img src="data:image/jpg;base64,'.base64_encode($row['game_cover'] ).'"
          alt="placeholder" style="width: 252px; height: 383px;" />
    </div>
    <div class="card-content">
      <h4><a href="#0"> '.$row['game_name'].' </a></h4>
      <p>'.$row['game_desc'].'</p>
      <div class="d-flex justify-content-between align-items-center">
        <div class="btn-group">
          <button type="button" class="btn btn-sm btn-outline-light">View</button>
        </div>
      </div>
    </div>
  </div>
  <!-- end card-->
</div>
<!-- end col -->

   ';
  }
    ?>


              </div>
              <!-- end row -->
              <!-- ========= card-style-1 end ========= -->
                </div>
            </div>
        </div>
    </section>

</body>
<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>


