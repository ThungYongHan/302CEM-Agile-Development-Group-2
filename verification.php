<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>User Account Activation by Email Verification</title>
<!-- CSS -->
<link rel="stylesheet" href="assets/css/style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<!-- Google Font -->
<style>@import url('https://fonts.googleapis.com/css2?family=Lato&display=swap');</style>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
body{
    background-color: #000;
}
</style>
</head>
<body>
<?php
if ($_GET['key'] && $_GET['vkey']){
    $conn = mysqli_connect("localhost", "root", "", "GameReviewWebsite");
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL.";
    }

    $token = $_GET['vkey'];
    $username = $_GET['key'];
    $sql = "SELECT * FROM Users WHERE vkey = '".$token."' and username = '".$username."'";
    $query = mysqli_query($conn, $sql);
    
    $status = "Verified";
    if (mysqli_num_rows($query) > 0){
        $row = mysqli_fetch_array($query);

        if ($row['status'] == '0'){
            mysqli_query($conn, "UPDATE Users SET status = '".$status."' WHERE username = '".$username."'");
            $msg = "Congratulations! Your email has been verified.";
        }else{
            $msg = "You have already verified your account.";
        }

    }else{
        $msg = "This email has been not registered with us.";
    }
}else{
    $msg = "Something goes wrong. Please try again.";
}
?>
<div class="container mt-3">
    <div class="card">
        <div class="card-header text-center">
            User Account Activation
        </div>
        <div class="card-body text-center">
            <p><?php echo $msg;?></p>
            <button type="button" id= "homebtn" class="btn btn-outline-dark" >Home</button>
        </div>
    </div>
</div>
<script type="text/javascript">
    document.getElementById("homebtn").onclick = function () {
        window.location.href = "GameBrowsingHomepage.php";
    };
</script>
</body>