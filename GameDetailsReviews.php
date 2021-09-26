<!DOCTYPE html>
<html lang="en">

<head>
  <title>Page Title</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet'>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <?php include 'header.php';
  ?>
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
  </style>
</head>

<body>

  <section class="game-detail-container">
    <img src="Minecraft_cover.png" style="width:450px;height:700px;">
    <div class="GameTitleYear">
      <font size="+5">Minecraft</font>
      <font size="+2">2011</font>
    </div>

    <div class="GameDescription">
      Minecraft is a video game in which players create and break apart various kinds of blocks in three-dimensional
      worlds.
      The game’s two main modes are Survival and Creative. In Survival, players must find their own building supplies
      and
      food. They also interact with blocklike mobs, or moving creatures. (Creepers and zombies are some of the dangerous
      ones.) In Creative, players are given supplies and do not have to eat to survive. They also can break all kinds of
      blocks immediately. Minecraft is a video game in which players create and break apart various kinds of blocks in
      three-dimensional worlds.
      The game’s two main modes are Survival and Creative. In Survival, players must find their own building supplies
      and
      food. They also interact with blocklike mobs, or moving creatures. (Creepers and zombies are some of the dangerous
      ones.) In Creative, players are given supplies and do not have to eat to survive. They also can break all kinds of
      blocks immediately.Minecraft is a video game in which players create and break apart various kinds of blocks in
      three-dimensional worlds.
      The game’s two main modes are Survival and Creative. In Survival, players must find their own building supplies
      and
      food. They also interact with blocklike mobs, or moving creatures. (Creepers and zombies are some of the dangerous
      ones.) 
      <br />
      <br />
      <div class="PublisherUserInfo">
        Published By: Mojang Studios <br><br>
        Added On: 13/09/2021 <br><br>
        Added By: Thung Yong Han
      </div>
    </div>
    <br />
  </section>
  <section>
    <div class="game-review-container">
      <div class="review-list">
        <h4>Ratings and Reviews</h4>
        <hr />
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
    </div>
  </section>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
    crossorigin="anonymous"></script>
</body>
</html>