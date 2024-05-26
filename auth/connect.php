<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "dukundumurimo");


if (! $_SESSION['ManagerId']) {
    header("Location: ./login.php");
} else {
    header("Location: ../index.");
}

?>