<?php
include('../config/database.php');
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: ../public/login.php");
    exit();
}

echo "Welcome, " . $_SESSION['username'];
?>

<a href="manage_artworks.php">Manage Artworks</a>
<a href="manage_galleries.php">Manage Galleries</a>
<a href="manage_exhibitions.php">Manage Exhibitions</a>
