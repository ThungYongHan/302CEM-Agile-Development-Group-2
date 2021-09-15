<?php
    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        header("location: http://localhost:8080/AgileDev/GameBrowsingHomepage.php");
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
<script>
function LogoutFunction() {
    if (confirm('Are you sure you want to log out?'))window.location.href="GameBrowsingHomepage.php?logout='1'";
}
</script>
    <nav class="navbar navbar-expand-md navbar-dark" style="background-color: #c0d3fc;">
        <div class="container">
          <a class="navbar-brand text-dark">Game Review Website</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <form class="container d-flex">
                <div class="input-group">
                  <span class="input-group-text btn btn-secondary" id="search">
                      <i class="fa fa-search"></i>
                    </span>
                  <input type="text" class="form-control me-3" placeholder="Search for games..." aria-label="Games" aria-describedby="search-func">
                </div>
                   <?php  if (isset($_SESSION['username'])) : ?>
                    <a class="navbar-brand text-dark">Welcome, <?php echo $_SESSION['username']; ?></a>
                     <button class="btn btn-secondary" type="button" id="logout" onclick="LogoutFunction()">LogOut</button>
                  <?php endif ?>
          </div>
        
        </div>
    </form>
      </nav>
</body>
<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>