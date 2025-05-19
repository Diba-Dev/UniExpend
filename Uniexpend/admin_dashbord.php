<?php
session_start();
if ($_SESSION["role"] !== "admin") {
    die("Access denied. Admins only.");
}

// Display and manage blog posts
?>
