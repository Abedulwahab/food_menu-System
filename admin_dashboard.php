<?php

session_start();

if(!isset($_SESSION['admin'])){
    header("Location: admin_login.php");
    exit();
}

include "db.php";

$sql = "select * from meals order by id desc";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="dashboard">

    <div class="top-bar">

        <h1>Food Menu Dashboard</h1>

        <div class="top-buttons">

            <a href="add_meal.php">
                <button class="btn small-btn">Add Meal</button>
            </a>

            <a href="create_admin.php">
                <button class="btn small-btn">Create Admin</button>
            </a>

            <a href="menu.php">
                <button class="btn small-btn">View Menu</button>
            </a>
            <a href="show_admins.php">
    <button class="btn small-btn">Show Admins</button>
</a>

        </div>

    </div>

    <table class="meals-table">

        <tr>
            <th>Image</th>
            <th>Meal Name</th>
            <th>Price</th>
            <th>Category</th>
            <th>Action</th>
        </tr>

        <?php while($row = mysqli_fetch_assoc($result)) { ?>

        <tr>
            <td>
                <img src="<?php echo $row['image']; ?>">
            </td>

            <td><?php echo $row['meal_name']; ?></td>

            <td>$<?php echo $row['price']; ?></td>

            <td><?php echo $row['category']; ?></td>

            <td>
                <a href="delete_meal.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Delete this meal?');">
                    <button class="delete-btn">Delete</button>
                </a>
            </td>
        </tr>

        <?php } ?>

    </table>

</div>

</body>
</html>