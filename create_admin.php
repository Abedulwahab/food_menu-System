<?php

session_start();

if(!isset($_SESSION['admin'])){
    header("Location: admin_login.php");
    exit();
}

include "db.php";

if(isset($_POST['create'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "insert into admins(username,password)
            values('$username','$password')";

    mysqli_query($conn, $sql);

    header("Location: admin_dashboard.php");
    exit();
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Create Admin</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="form-page">

    <div class="form-box">

        <a href="admin_dashboard.php">
            <button type="button" class="btn">Back to Dashboard</button>
        </a>

        <br><br>

        <h1>Create Admin</h1>

        <form method="POST">

            <div class="input-group">
                <label>Username</label>
                <input type="text" name="username" autocomplete="off" required>
            </div>

            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password" autocomplete="new-password" required>
            </div>

            <button class="btn" type="submit" name="create">
                Create Admin
            </button>

        </form>

    </div>

</div>

</body>
</html>