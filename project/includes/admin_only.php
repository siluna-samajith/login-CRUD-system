<?php
include("auth_check.php");

// 🔥 block non-admins completely
if ($_SESSION['role'] !== 'admin') {
    header("Location: ../user/home.php");
    exit();
}
?>