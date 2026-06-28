<?php

session_start();

if(!isset($_SESSION['admin'])){
    header("Location: admin_login.php");
    exit();
}

include "db.php";

$id = $_GET['id'];

$sql = "delete from meals where id = $id";

mysqli_query($conn, $sql);

header("Location: admin_dashboard.php");
exit();

?>