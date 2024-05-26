<?php

$conn = mysqli_connect("localhost", "root", "", "dukundumurimo");

if (!isset($_GET['Food_Id'])) {
    header("Location: ./index.php");
}
$Food_Id = $_GET['Food_Id'];

$sql = mysqli_query($conn, " DELETE FROM import WHERE `Food_Id` = '{$Food_Id}' ");
if ($sql == true) {
    $sql = mysqli_query($conn, " DELETE FROM export WHERE `Food_Id` = '{$Food_Id}' ");
    if ($sql == true) {
        $sql = mysqli_query($conn, "DELETE FROM foods WHERE `Food_Id` = '{$Food_Id}' ");
        if ($sql == true) {
            header("Location: ./index.php");
        }
    } else {
        $sql = mysqli_query($conn, "DELETE FROM foods WHERE `Food_Id` = '{$Food_Id}' ");
        if ($sql == true) {
            header("Location: ./index.php");
        }
    }

} else {
    $sql = mysqli_query($conn, "DELETE FROM foods WHERE `Food_Id` = '{$Food_Id}' ");
    if ($sql == true) {
        header("Location: ./index.php");
    }
}


?>