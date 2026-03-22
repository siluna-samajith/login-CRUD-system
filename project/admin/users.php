<?php
include("../includes/admin_only.php");
include("../config/db.php");

$result = $conn->query("SELECT * FROM users");
?>

<!DOCTYPE html>
<html>
<head>
<title>Users</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 p-10">

<h2 class="text-2xl font-bold mb-4">Users</h2>

<a href="add_user.php" class="bg-blue-600 text-white px-4 py-2 rounded">Add User</a>

<table class="w-full mt-4 bg-white shadow rounded">
<tr class="bg-gray-200 text-left">
    <th class="p-3">ID</th>
    <th class="p-3">Name</th>
    <th class="p-3">Email</th>
    <th class="p-3">Role</th>
    <th class="p-3">Action</th>
</tr>

<?php while($row = $result->fetch_assoc()): ?>
<tr class="border-t">
    <td class="p-3"><?= $row['id'] ?></td>
    <td class="p-3"><?= $row['name'] ?></td>
    <td class="p-3"><?= $row['email'] ?></td>
    <td class="p-3"><?= $row['role'] ?></td>
    <td class="p-3">
        <a href="edit_user.php?id=<?= $row['id'] ?>" class="text-blue-600">Edit</a> |
        <a href="delete_user.php?id=<?= $row['id'] ?>" class="text-red-600">Delete</a>
    </td>
</tr>
<?php endwhile; ?>
</table>

</body>
</html>