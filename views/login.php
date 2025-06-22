<!DOCTYPE html>
<html>
<head>
  <title>Admin Login</title>
  <link rel="stylesheet" type="text/css" href="../assets/style.css">
</head>
<body>
  <h2>Admin Login</h2>
  <form action="../controllers/auth.php" method="POST">
    <label>Admin Name:</label>
    <input type="text" name="admin_name" required><br><br>
    <label>Password:</label>
    <input type="password" name="password" required><br><br>
    <button type="submit" name="login">Login</button>
    <p><a href="forgot_password.php">Forgot Password?</a></p>

  </form>
</body>
</html>
