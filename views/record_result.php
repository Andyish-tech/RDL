<!DOCTYPE html>
<html>
<head>
  <title>Record Exam Result</title>
  <link rel="stylesheet" type="text/css" href="../assets/style.css">
</head><?php
session_start();
if (!isset($_SESSION['admin']) || ($_SESSION['role'] === 'Viewer')) {
    header("Location: login.php");
    exit;
}
?>
<body>
  <h2>Record Result</h2>
  <form action="../controllers/grade.php" method="POST">
    <label>Candidate National ID:</label><input type="text" name="nid" required><br>
    <label>License Category:</label><input type="text" name="category" required><br>
    <label>Marks (out of 20):</label><input type="number" name="marks" min="0" max="20" required><br>
    <button type="submit" name="add_grade">Submit Result</button>
  </form>
</body>
</html>
