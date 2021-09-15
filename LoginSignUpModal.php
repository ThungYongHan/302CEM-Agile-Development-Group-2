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
    <link rel="stylesheet" href="style.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Game Browsing Homepage</title>
</head>
<body>
    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Launch demo modal
  </button>
  
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

                            <div class="field">
                                <input type="text" placeholder="Email Address" required>
                            </div>
                            <div class="field">
                                <input type="password" placeholder="Password" required>
                            </div>
                            <div class="pass-link">
                                <a href="#">Forgot password?</a>
                            </div>
                            <div class="field btn">
                                <div class="btn-layer"></div>

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
                            <div class="field btn">
                                <div class="btn-layer"></div>
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

</body>
<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>