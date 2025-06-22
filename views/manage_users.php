<?php
session_start();
if (!isset($_SESSION['admin']) || $_SESSION['role'] !== 'Admin') {
    header("Location: login.php");
    exit;
}
require_once '../config/db.php';

$result = $conn->query("SELECT AdminId, AdminName, Role FROM Admin");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Manage Users</title>
  <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
  <h2>Manage User Roles</h2>
  <table border="1" cellspacing="0" cellpadding="10" style="margin: auto; background: #fff;">
    <tr>
      <th>ID</th>
      <th>Username</th>
      <th>Role</th>
      <th>Change Role</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()): ?>
      <tr>
        <form action="../controllers/update_role.php" method="POST">
          <td><?= $row['AdminId'] ?></td>
          <td><?= htmlspecialchars($row['AdminName']) ?></td>
          <td><?= $row['Role'] ?></td>
          <td>
            <input type="hidden" name="admin_id" value="<?= $row['AdminId'] ?>">
            <select name="new_role">
              <option <?= $row['Role'] === 'Admin' ? 'selected' : '' ?>>Admin</option>
              <option <?= $row['Role'] === 'Manager' ? 'selected' : '' ?>>Manager</option>
              <option <?= $row['Role'] === 'Viewer' ? 'selected' : '' ?>>Viewer</option>
            </select>
            <button type="submit" name="update">Update</button>
          </td>
        </form>
      </tr>
    <?php endwhile; ?>
  </table>
</body>
</html>
