<?php

session_start();
include('db_connect.php');
$msg = false;
if(isset($_POST['user_email'])){
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];

    $query = "select * from user where email = '".$user_email."' AND password = '".$user_password."' limit 1";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result)==1) {
        header('Location: main.html');
    } else {
        $msg = "Incorrect Password";
    }
    
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style1.css">
    <title>Login & Registration</title>
</head>

<body>
    <div class="container">
        <div class="login form">
            <header>Login</header>
            <form action="#" method="post">
                <input type="email" name="user_email" placeholder="Enter your email" required>
                <input type="password" name="user_password" placeholder="Enter your password" required>
                <a href="#">Forgot password?</a>
                <input type="submit" class="button" value="Login">
            </form>
            <div class="signup">
                <span class="signup">Don't have an account?
         <a href="signup.php">Signup</a>
        </span>
        <?php
        echo('<h3>'.$msg.'</h3>');
        ?>
            </div>
        </div>
    </div>
</body>

</html>