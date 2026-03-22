<?php
include("../includes/auth_check.php");
include("../config/db.php");

$result = $conn->query("SELECT COUNT(*) as total FROM users");
$data = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

<div class="flex">

    <!-- Sidebar -->
    <div class="w-64 bg-gray-900 text-white min-h-screen p-5">
        <h2 class="text-2xl font-bold mb-6">Admin Panel</h2>

        <a href="dashboard.php" class="block py-2 px-3 hover:bg-gray-700 rounded">Dashboard</a>

        <?php if($_SESSION['role'] === 'admin'): ?>
            <a href="users.php" class="block py-2 px-3 hover:bg-gray-700 rounded">Manage Users</a>
        <?php endif; ?>

        <a href="../auth/logout.php" class="block py-2 px-3 mt-4 bg-red-600 hover:bg-red-700 rounded">Logout</a>
    </div>

    <!-- Main -->
    <div class="flex-1 p-10">
        <h1 class="text-3xl font-bold mb-6">Dashboard</h1>

        <div class="bg-white p-6 rounded shadow">
            <p class="text-lg">Total Users:</p>
            <p class="text-4xl font-bold text-blue-600"><?php echo $data['total']; ?></p>
        </div>
    </div>

</div>

</body>
</html>