<?php
include("../includes/admin_only.php");
include("../config/db.php");

$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $role = $_POST['role'];

    $stmt = $conn->prepare("UPDATE users SET name=?, role=? WHERE id=?");
    $stmt->bind_param("ssi", $name, $role, $id);
    $stmt->execute();

    header("Location: users.php");
}

$result = $conn->query("SELECT * FROM users WHERE id=$id");
$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit User</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">

<div class="bg-white p-8 rounded shadow w-96">

    <h2 class="text-2xl font-bold mb-6 text-center">Edit User</h2>

    <form method="POST" class="space-y-4">

        <input name="name" value="<?= $user['name'] ?>"
            class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>

        <input value="<?= $user['email'] ?>" disabled
            class="w-full p-2 border bg-gray-100 rounded">

        <select name="role"
            class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            <option value="user" <?= $user['role'] == 'user' ? 'selected' : '' ?>>User</option>
            <option value="admin" <?= $user['role'] == 'admin' ? 'selected' : '' ?>>Admin</option>
        </select>

        <button class="w-full bg-green-600 text-white p-2 rounded hover:bg-green-700">
            Update User
        </button>

    </form>

    <a href="users.php" class="block text-center mt-4 text-gray-600 hover:underline">
        ← Back to Users
    </a>

</div>

</body>
</html>