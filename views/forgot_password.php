<!DOCTYPE html>
<html>
<head>
  <title>Reset Password</title>
  <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
  <h2>Reset Admin Password</h2>
  <form action="../controllers/reset_password.php" method="POST">
    <label>Admin Name:</label>
    <input type="text" name="admin_name" required><br>
    
    <label>New Password:</label>
    <input type="password" name="new_password" required><br>
    
    <label>Confirm Password:</label>
    <input type="password" name="confirm_password" required><br>
    
    <button type="submit" name="reset">Reset Password</button>
  </form>
</body>
</html>
