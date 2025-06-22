<?php
session_start();
if (!isset($_SESSION['admin']) || $_SESSION['role'] !== 'Admin') {
    header("Location: ../views/login.php");
    exit;
}

require_once '../config/db.php';

if (isset($_POST['update'])) {
    $id = $_POST['admin_id'];
    $new_role = $_POST['new_role'];

    $stmt = $conn->prepare("UPDATE Admin SET Role = ? WHERE AdminId = ?");
    $stmt->bind_param("si", $new_role, $id);
    
    if ($stmt->execute()) {
        header("Location: ../views/manage_users.php");
    } else {
        echo "Failed to update role.";
    }
}
?>
