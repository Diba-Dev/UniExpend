<?php
session_start();
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $stmt = $conn->prepare("SELECT id, username, password, role FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 1) {
        $stmt->bind_result($id, $username, $hashed, $role);
        $stmt->fetch();

        if (password_verify($password, $hashed)) {
            $_SESSION["loggedin"] = true;
            $_SESSION["username"] = $username;
            $_SESSION["role"] = $role;

            if ($role === "admin") {
                header("Location: admin_dashboard.php");
            } else {
                header("Location: blog.php");
            }
            exit;
        } else {
            echo "Wrong password.";
        }
    } else {
        echo "No user found.";
    }
}
?>
