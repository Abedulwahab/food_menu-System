    <?php

    session_start();

    if(!isset($_SESSION['admin'])){
        header("Location: admin_login.php");
        exit();
    }

    include "db.php";

    if(isset($_POST['add'])){

        $meal_name = $_POST['meal_name'];
        $price = $_POST['price'];
        $category = $_POST['category'];
        $description = $_POST['description'];

        $image_name = $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];

        move_uploaded_file($tmp_name, "images/".$image_name);

        $image_path = "images/".$image_name;

        $sql = "insert into meals(meal_name, price, description, category, image)
                values('$meal_name', '$price', '$description', '$category', '$image_path')";

        mysqli_query($conn, $sql);

        header("Location: admin_dashboard.php");
        exit();
    }

    ?>

    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <title>Add Meal</title>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>

    <div class="form-page">

        <div class="form-box">

            <a href="admin_dashboard.php">
                <button type="button" class="btn">Back to Dashboard</button>
            </a>

            <br><br>

            <h1>Add Meal</h1>

            <form method="POST" enctype="multipart/form-data">

                <div class="input-group">
                    <label>Meal Name</label>
                    <input type="text" name="meal_name" autocomplete="off" required>
                </div>

                <div class="input-group">
                    <label>Price</label>
                    <input type="number" name="price" step="0.01" autocomplete="off" required>
                </div>

                <div class="input-group">
                    <label>Category</label>
                    <input type="text" name="category" autocomplete="off" placeholder="Pizza, Burger, Drinks..." required>
                </div>

                <div class="input-group">
                    <label>Description</label>
                    <textarea name="description" autocomplete="off" required></textarea>
                </div>

                <div class="input-group">
                    <label>Meal Image</label>
                    <input type="file" name="image" required>
                </div>

                <button class="btn" type="submit" name="add">Add Meal</button>

            </form>

        </div>

    </div>

    </body>
    </html>