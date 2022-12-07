<?php

session_start();

include('db_connect.php');
$msg = false;
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $user_re_password = $_POST['user_re_password'];

    if(!empty($user_email) && !empty($user_password)){
        if($user_password === $user_re_password){
            $query = "insert into user (email, password) VALUES ('$user_email', '$user_password')";
            mysqli_query($con, $query);
            header("Location: index.php");
        }
        else{
            $msg = "Password Not Match";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style2.css">
    <title>Login & Registration</title>
</head>

<body>
    <div class="container">
        <div class="registration form">
            <header>Signup</header>
            <form action="#" method="post">
                <input type="email" name="user_email" placeholder="Enter your email" required>
                <input type="password" name="user_password" placeholder="Create a password" required>
                <input type="password" name="user_re_password" placeholder="Confirm your password" required>
                <input type="submit" class="button" value="Signup">
            </form>
            <div class="login">
                <span class="login">Already have an account?
         <a href="index.php">Login</a>
        </span>
        <?php
        echo('<h3>'.$msg.'</h3>');
        ?>
            </div>
        </div>
    </div>
</body>

</html>