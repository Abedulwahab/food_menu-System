<?php

include "db.php";

$sql = "select * from meals order by id desc";

$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">
    <title>Food Menu</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="navbar">

    <h2>Food Menu</h2>

    <a href="admin_login.php">
        Admin Login
    </a>

</div>

<div class="hero">

    <h1>Delicious Food Menu</h1>

    <p>
        Fresh meals prepared with love
    </p>

    <input
        type="text"
        id="searchInput"
        placeholder="Search meals..."
    >

</div>

<div class="products-container">

<?php while($row = mysqli_fetch_assoc($result)) { ?>

<a class="product-link"
   href="meal_details.php?id=<?php echo $row['id']; ?>">

    <div class="product-card">

        <img src="<?php echo $row['image']; ?>">

        <div class="product-info">

            <span>
                <?php echo $row['category']; ?>
            </span>

            <h3>
                <?php echo $row['meal_name']; ?>
            </h3>

            <p>
                <?php echo $row['description']; ?>
            </p>

            <h4>
                $<?php echo $row['price']; ?>
            </h4>

        </div>

    </div>

</a>

<?php } ?>

</div>

<script src="script.js"></script>

</body>

</html>