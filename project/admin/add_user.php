<?php
include("../includes/admin_only.php");
include("../config/db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];

    $stmt = $conn->prepare("INSERT INTO users (name,email,password,role) VALUES (?,?,?,?)");
    $stmt->bind_param("ssss", $name, $email, $password, $role);
    $stmt->execute();

    header("Location: users.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Add User</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">

<div class="bg-white p-8 rounded shadow w-96">

    <h2 class="text-2xl font-bold mb-6 text-center">Add User</h2>

    <form method="POST" class="space-y-4">

        <input name="name" placeholder="Name"
            class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>

        <input name="email" type="email" placeholder="Email"
            class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>

        <input name="password" type="password" placeholder="Password"
            class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>

        <select name="role"
            class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            <option value="user">User</option>
            <option value="admin">Admin</option>
        </select>

        <button class="w-full bg-blue-600 text-white p-2 rounded hover:bg-blue-700">
            Add User
        </button>

    </form>

    <a href="users.php" class="block text-center mt-4 text-gray-600 hover:underline">
        ← Back to Users
    </a>

</div>

</body>
</html>