<?php
if (!isset($_SESSION["email"]) && !isset($_SESSION['password'])) {
    header("Location: login.php");
    exit();
}
