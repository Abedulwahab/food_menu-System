<?php

session_start();

include "db.php";

if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "select * from admins 
            where username='$username' 
            and password='$password'";

    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){

        $_SESSION['admin'] = $username;

        header("Location: admin_dashboard.php");
        exit();

    }
    else{
        $error = "Wrong Username or Password";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="form-page">

    <div class="form-box">

        <h1>Admin Login</h1>

        <?php
        if(isset($error)){
            echo "<p class='error'>$error</p>";
        }
        ?>

        <form method="POST"  autocomplete="off">

            <div class="input-group">
                <label>Username</label>
                <input type="text" name="username" autocomplete="off" required>
            </div>

            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password" autocomplete="new-password" required>
            </div>

            <button class="btn" type="submit" name="login">
                Login
            </button>

        </form>

    </div>

</div>

</body>
</html>