<?php
session_start();
include("../config/db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($user = $result->fetch_assoc()) {
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role'] = $user['role'];
            if ($user['role'] === 'admin') {
                header("Location: ../admin/dashboard.php");
            } else {
                header("Location: ../user/home.php");
            }

            exit();
        } else {
            echo "Invalid password";
        }
    } else {
        echo "User not found";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center h-screen">

<form method="POST" class="bg-white p-8 rounded shadow w-80">

    <h2 class="text-2xl font-bold mb-6 text-center">Login</h2>

    <input type="email" name="email" placeholder="Email"
        class="w-full mb-3 p-2 border rounded" required>

    <input type="password" name="password" placeholder="Password"
        class="w-full mb-4 p-2 border rounded" required>

    <button class="w-full bg-blue-600 text-white p-2 rounded hover:bg-blue-700">
        Login
    </button>

</form>

</body>
</html>