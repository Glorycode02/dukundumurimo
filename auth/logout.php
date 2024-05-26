<?php
session_start();

if ($_SESSION['ManagerId']) {
    session_unset();
    session_destroy();
    header("Location: ./login.php");
}