<?php
    $conn = mysqli_connect("localhost", "root", "", "GameReviewWebsite");
        if (mysqli_connect_errno()){
            echo "Failed to connect to MySQL.";
        }
        
        $problem = false;


        if ($_SERVER["REQUEST_METHOD"] == "POST"){

            if (!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["user_name"]))){
                echo "Username can only contain letters, numbers, and underscores.";
                $problem = true;

            }else{
                $sql = "SELECT user_id FROM Users WHERE username = ?";

                if ($statement = mysqli_prepare($conn, $sql)){
                    mysqli_stmt_bind_param($statement, "s", $param_username);

                    $param_username = trim($_POST["user_name"]);

                    if (mysqli_stmt_execute($statement)){
                        mysqli_stmt_store_result($statement);

                        if (mysqli_stmt_num_rows($statement) == 1){
                            echo "<script type='text/javascript'>
                                alert ('The username is already taken.');
                            </script>";
                            
                            $problem = true;

                        }else{
                            $username = trim($_POST["user_name"]);
                        }
                    } 
                    mysqli_stmt_close($statement);
                }
            }

            $email = test_input($_POST["user_email"]);
            if (filter_var($email, FILTER_VALIDATE_EMAIL)){
                $email = trim($_POST['user_email']);
            }else{
                echo "<script type='text/javascript'>
                    alert ('Invalid email format.');
                </script>";
                $problem = true;
            }

            if (strlen(trim($_POST["user_password"])) < 6){
                echo "<script type='text/javascript'>
                    alert ('Password must have atleast 6 characters.');
                </script>";
                $problem = true;
            }else{
                $password = trim($_POST["user_password"]);
            }
            
            $confirm_password = trim($_POST["confirm_password"]);
            if (empty($passwordErr) && ($password != $confirm_password)){
                echo "<script type='text/javascript'>
                alert ('Password did not match.');
                </script>";
                $problem = true;
            }
            
            if (!$problem){
                $sql = "INSERT INTO Users (username, user_email, user_pass) 
                    VALUES ('$username', '$email', '$password')";
                
                if(mysqli_query($conn, $sql)){
                    echo "<script type='text/javascript'>
                        alert ('Registered successfully!');
                        </script>";
                }
            }
            echo "<script>window.location.href='LoginSignUpModal.php';</script>";
            mysqli_close($conn);
        }    
        
        function test_input($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

?>