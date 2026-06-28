<?php

include "db.php";

$id = $_GET['id'];

$sql = "select * from meals where id = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Meal Details</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="details-page">

    <div class="details-image">
        <img src="<?php echo $row['image']; ?>">
    </div>

    <div class="details-info">

        <span><?php echo $row['category']; ?></span>

        <h1><?php echo $row['meal_name']; ?></h1>

        <p><?php echo $row['description']; ?></p>

        <h2>$<?php echo $row['price']; ?></h2>

        <a href="menu.php">
            <button class="btn small-btn">Back to Menu</button>
        </a>

    </div>

</div>

</body>
</html>