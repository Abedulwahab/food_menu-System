<?php

$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "food_menu_db"
);

if(!$conn){
    die("Connection Failed : " . mysqli_connect_error());
}

?>