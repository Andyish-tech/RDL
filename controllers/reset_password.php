<?php
require_once '../config/db.php';

if (isset($_POST['reset'])) {
    $name = $_POST['admin_name'];
    $new = $_POST['new_password'];
    $confirm = $_POST['confirm_password'];

    if ($new !== $confirm) {
        echo "Passwords do not match.";
        exit;
    }

    // Check if admin exists
    $stmt = $conn->prepare("SELECT * FROM Admin WHERE AdminName = ?");
    $stmt->bind_param("s", $name);
    $stmt->execute();
    $res = $stmt->get_result();

    if ($res->num_rows === 1) {
        $hashed = password_hash($new, PASSWORD_DEFAULT);
        $update = $conn->prepare("UPDATE Admin SET Password = ? WHERE AdminName = ?");
        $update->bind_param("ss", $hashed, $name);
        if ($update->execute()) {
            echo "Password successfully reset. <a href='../views/login.php'>Login</a>";
        } else {
            echo "Failed to update password.";
        }
    } else {
        echo "Admin not found.";
    }
}
?>
