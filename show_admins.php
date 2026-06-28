<?php

session_start();

if(!isset($_SESSION['admin'])){
    header("Location: admin_login.php");
    exit();
}

include "db.php";

$sql = "select * from admins order by id desc";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Show Admins</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="dashboard">

    <div class="top-bar">

        <h1>Admin Accounts</h1>

        <div class="top-buttons">

            <a href="admin_dashboard.php">
                <button class="btn small-btn">Back Dashboard</button>
            </a>

            <a href="create_admin.php">
                <button class="btn small-btn">Create Admin</button>
            </a>

        </div>

    </div>

    <table class="meals-table">

        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Password</th>
        </tr>

        <?php while($row = mysqli_fetch_assoc($result)) { ?>

        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['username']; ?></td>
            <td><?php echo $row['password']; ?></td>
        </tr>

        <?php } ?>

    </table>

</div>

</body>
</html>