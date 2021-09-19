<?php
  session_start();
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

<style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Lato', cursive;
  }
  
   ::selection {
      background: #000000;
      color: #fff;
  }
  
  .wrapper {
      overflow: hidden;
      max-width: 390px;
      background: #fff;
      padding: 30px;
      border-radius: 5px;
      box-shadow: 0px 15px 20px rgba(0, 0, 0, 0.1);
  }
  
  .wrapper .title-text {
      display: flex;
      width: 200%;
  }
  
  .wrapper .title {
      width: 50%;
      font-size: 75px;
      font-weight: 600;
      text-align: center;
      transition: all 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55);
  }
  
  .wrapper .slide-controls {
      position: relative;
      display: flex;
      height: 50px;
      width: 100%;
      overflow: hidden;
      margin: 30px 0 10px 0;
      justify-content: space-between;
      border: 1px solid lightgrey;
      border-radius: 5px;
  }
  
  .slide-controls .slide {
      height: 100%;
      width: 100%;
      color: #fff;
      font-size: 18px;
      font-weight: 500;
      text-align: center;
      line-height: 48px;
      cursor: pointer;
      z-index: 1;
      transition: all 0.6s ease;
  }
  
  .slide-controls label.signup {
      color: #000;
  }
  
  .slide-controls .slider-tab {
      position: absolute;
      height: 100%;
      width: 50%;
      left: 0;
      z-index: 0;
      border-radius: 5px;
      background: -webkit-linear-gradient(left, #1506eb, #41258b);
      transition: all 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55);
  }
  
  input[type="radio"] {
      display: none;
  }
  
  #signup:checked~.slider-tab {
      left: 50%;
  }
  
  #signup:checked~label.signup {
      color: #fff;
      cursor: default;
      user-select: none;
  }
  
  #signup:checked~label.login {
      color: #000;
  }
  
  #login:checked~label.signup {
      color: #000;
  }
  
  #login:checked~label.login {
      cursor: default;
      user-select: none;
  }
  
  .wrapper .form-container {
      width: 100%;
      overflow: hidden;
  }
  
  .form-container .form-inner {
      display: flex;
      width: 200%;
  }
  
  .form-container .form-inner form {
      width: 50%;
      transition: all 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55);
  }
  
  .form-inner form .field {
      height: 50px;
      width: 100%;
      margin-top: 20px;
  }
  
  .form-inner form .field input {
      height: 100%;
      width: 100%;
      outline: none;
      padding-left: 15px;
      border-radius: 5px;
      border: 1px solid lightgrey;
      border-bottom-width: 2px;
      font-size: 17px;
      transition: all 0.3s ease;
  }
  
  .form-inner form .field input:focus {
      border-color: #fc83bb;
      /* box-shadow: inset 0 0 3px #fb6aae; */
  }
  
  .form-inner form .field input::placeholder {
      color: #999;
      transition: all 0.3s ease;
  }
  
  form .field input:focus::placeholder {
      color: #b3b3b3;
  }
  
  .form-inner form .pass-link {
      margin-top: 5px;
  }
  
  .form-inner form .signup-link {
      text-align: center;
      margin-top: 30px;
  }
  
  .form-inner form .pass-link a,
  .form-inner form .signup-link a {
      color: #0a48f3fd;
      text-decoration: none;
  }
  
  .form-inner form .pass-link a:hover,
  .form-inner form .signup-link a:hover {
      text-decoration: underline;
  }
  
  form .btn2 {
      height: 50px;
      width: 100%;
      border-radius: 5px;
      position: relative;
      overflow: hidden;
  }
  
  form .btn2 .btn-layer2 {
      height: 100%;
      width: 300%;
      position: absolute;
      left: -100%;
      background: -webkit-linear-gradient(right, #3906f1, #5442fa, #2b0bb8, #390bdf);
      border-radius: 5px;
      transition: all 0.4s ease;
      ;
  }
  
  form .btn2:hover .btn-layer2 {
      left: 0;
  }
  
  form .btn2 input[type="submit"] {
      height: 100%;
      width: 100%;
      z-index: 1;
      position: relative;
      background: none;
      border: none;
      color: #fff;
      padding-left: 0;
      border-radius: 5px;
      font-size: 20px;
      font-weight: 500;
      cursor: pointer;
  }
</style>

</head>
<body>
    <!-- This is the navigation header -->
    
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
                <!-- <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"> -->
                 <button type="button" button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">Login</button>
          </div>
        
        </div>
    </form>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Game Review Login</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
  <!-- Login Modal -->
            <div class="wrapper">
                <div class="title-text">
                    <div class="title login">
                        Login
                    </div>
                    <div class="title signup">
                        SignUp
                    </div>
                </div>
                <div class="form-container">
                    <div class="slide-controls">
                        <input type="radio" name="slide" id="login" checked>
                        <input type="radio" name="slide" id="signup">
                        <label for="login" class="slide login">Login</label>
                        <label for="signup" class="slide signup">SignUp</label>
                        <div class="slider-tab"></div>
                    </div>
                    <div class="form-inner">
                        <form action="login.php" class="login">
                            <div class="field">
                                <input type="text" placeholder="Email Address" required>
                            </div>
                            <div class="field">
                                <input type="password" placeholder="Password" required>
                            </div>
                            <div class="field btn2">
                                <div class="btn-layer2"></div>
                                <input type="submit" value="Login">
                            </div>
                        </form>
                        <form action="#" class="signUp">
                            <div class="field">
                                <input type="text" placeholder="Email Address" required>
                            </div>
                            <div class="field">
                                <input type="password" placeholder="Password" required>
                            </div>
                            <div class="field">
                                <input type="password" placeholder="Confirm password" required>
                            </div>
                            <div class="field btn2">
                                <div class="btn-layer2"></div>
                                <input type="submit" value="SignUp">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <script>
                const loginText = document.querySelector(".title-text .login");
                const loginForm = document.querySelector("form.login");
                const loginBtn = document.querySelector("label.login");
                const signupBtn = document.querySelector("label.signup");
                const signupLink = document.querySelector("form .signup-link a");
                signupBtn.onclick = (() => {
                    loginForm.style.marginLeft = "-50%";
                    loginText.style.marginLeft = "-50%";
                });
                loginBtn.onclick = (() => {
                    loginForm.style.marginLeft = "0%";
                    loginText.style.marginLeft = "0%";
                });
                signupLink.onclick = (() => {
                    signUpBtn.click();
                    return false;
                });
            </script>
        </div>
    
      </div>
    </div>
  </div>
<!-- END OF MODAL -->

      </nav>
</body>
<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>