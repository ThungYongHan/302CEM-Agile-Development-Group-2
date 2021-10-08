<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/phpmailer/phpmailer/src/PHPMailerAutoload.php';
require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';
require 'vendor/phpmailer/phpmailer/src/class.phpmailer.php';
require 'vendor/phpmailer/phpmailer/src/class.smtp.php';


$conn = mysqli_connect("localhost", "root", "", "GameReviewWebsite");
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL.";
    }

$user_name = $_POST["user_name"];
$user_email = $_POST["user_email"];
$user_pass = $_POST["user_password"];
$user_confirm_pass = $_POST["confirm_password"];
userRegistration($user_name, $user_email, $user_pass, $user_confirm_pass);

function userRegistration($user_name, $user_email, $user_pass, $user_confirm_pass){
    $conn = mysqli_connect("localhost", "root", "", "GameReviewWebsite");
        if (mysqli_connect_errno()){
            echo "Failed to connect to MySQL.";
        }
        
        $problem = false;


        if ($_SERVER["REQUEST_METHOD"] == "POST"){

            if (!preg_match('/^[a-zA-Z0-9_]+$/', trim($user_name))){
                echo "Username can only contain letters, numbers, and underscores.";
                $problem = true;

            }else{
                $sql = "SELECT user_id FROM Users WHERE username = ?";

                if ($statement = mysqli_prepare($conn, $sql)){
                    mysqli_stmt_bind_param($statement, "s", $param_username);

                    $param_username = trim($user_name);

                    if (mysqli_stmt_execute($statement)){
                        mysqli_stmt_store_result($statement);

                        if (mysqli_stmt_num_rows($statement) == 1){
                            echo "<script type='text/javascript'>
                                alert ('The username is already taken.');
                            </script>";
                            
                            $problem = true;

                        }else{
                            $username = trim($user_name);
                        }
                    } 
                    mysqli_stmt_close($statement);
                }
            }
            
            $email = test_input($user_email);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
                echo "<script type='text/javascript'>
                    alert ('Invalid email format.');
                </script>";
                $problem = true;

            }else{
                $sql = "SELECT user_id FROM Users WHERE user_email = ?";

                if ($statement = mysqli_prepare($conn, $sql)){
                    mysqli_stmt_bind_param($statement, "s", $param_user_email);

                    $param_user_email = trim($email);

                    if (mysqli_stmt_execute($statement)){
                        mysqli_stmt_store_result($statement);

                        if (mysqli_stmt_num_rows($statement) == 1){
                            echo "<script type='text/javascript'>
                                alert ('The email is registered.');
                            </script>";
                            
                            $problem = true;

                        }else{
                            $email = trim($email);
                        }
                    } 
                    mysqli_stmt_close($statement);
                }
            }


            if (strlen(trim($user_pass)) < 6){
                echo "<script type='text/javascript'>
                    alert ('Password must have atleast 6 characters.');
                </script>";
                $problem = true;
            }else{
                $password = trim($user_pass);
            }
            
            $confirm_password = trim($user_confirm_pass);
            if (empty($passwordErr) && ($password != $confirm_password)){
                echo "<script type='text/javascript'>
                alert ('Password did not match.');
                </script>";
                $problem = true;
            }
            
            if (!$problem){
                $token = md5(time().$username);
                $sql = "INSERT INTO Users (username, user_email, user_pass, vkey) 
                    VALUES ('$username', '$email', '$password', '$token')";
                
                if(mysqli_query($conn, $sql)){
                    //Send confirmation email
                    $link = "<a href='http://localhost:8080/302CEM-Agile-Development-Group-2-master/verification.php?key=".$username."&vkey=".$token."'>Confirm Account</a>";                    


                    $mail = new PHPMailer();
                    $mail->CharSet = "utf-8";
                    $mail->isSMTP();
                    $mail->SMTPAuth = true;
                    //$mail->SMTPDebug = SMTP::DEBUG_CONNECTION;
                    $mail->Username = "gamereviewwebsite302CEM@gmail.com";
                    $mail->Password = "p455w0rd302CEM";
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                    $mail->Host = "smtp.gmail.com";
                    $mail->Port = "465";
                    $mail->From = "gamereviewwebsite302CEM@gmail.com";
                    $mail->FromName = "Game Review Website Group 2";
                    $mail->addAddress($email, $username);
                    $mail->Subject = "Account Verification";
                    $mail->isHTML(true);
                    $mail->Body = 'Click On This Link to Verify Account '.$link.'';

                    if ($mail->Send()){
                        echo "<script type='text/javascript'>
                        alert ('Registered successfully! A verification email is sent to the email provided!');
                    </script>";
                        
                    }else{
                        echo "<script type='text/javascript'>
                        alert ('Mailer error: ".$mail->ErrorInfo."');
                    </script>";
                    }
                    
                }
            }
            
            echo "<script>window.location.href='GameBrowsingHomepage.php';</script>";
            mysqli_close($conn);
        }    
        
        

}

function test_input($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

?>