<?php
include("../includes/auth_check.php");
?>

<!DOCTYPE html>
<html>
<head>
<title>User Home</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

<div class="flex justify-center items-center h-screen">
    <div class="bg-white p-8 rounded shadow text-center">
        
        <h1 class="text-2xl font-bold mb-4">Welcome To Home Page 👋</h1>

        <p class="mb-4">You are logged in successfully.</p>

        <a href="../auth/logout.php" 
           class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
           Logout
        </a>

    </div>
</div>

</body>
</html>