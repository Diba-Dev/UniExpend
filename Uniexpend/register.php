<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $password = $_POST["password"];
    $confirm = $_POST["confirm_password"];

    if ($password !== $confirm) {
        echo "<script>alert('Passwords do not match.'); window.history.back();</script>";
        exit;
    }

    // Check if user already exists
    $check = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $check->bind_param("s", $email);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
        echo "<script>alert('Email already exists. Please login instead.'); window.history.back();</script>";
        exit;
    }

    // Insert new user
    $hashed = password_hash($password, PASSWORD_DEFAULT);
    $role = "user";

    $stmt = $conn->prepare("INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $username, $email, $hashed, $role);

    if ($stmt->execute()) {
        echo "<script>
                alert('Thank you for joining Uniexpend!');
                setTimeout(function() {
                    window.location.href = 'login.html';
                }, 100);
              </script>";
    } else {
        echo "<script>alert('Something went wrong.'); window.history.back();</script>";
    }
}
?>
