<!DOCTYPE html>
<html>
<head>
  <title>Add Candidate</title>
  <link rel="stylesheet" type="text/css" href="../assets/style.css">
</head>
<body>
  <h2>Add Candidate</h2>
  <form action="../controllers/candidate.php" method="POST">
    <label>National ID:</label><input type="text" name="nid" required><br>
    <label>First Name:</label><input type="text" name="fname" required><br>
    <label>Last Name:</label><input type="text" name="lname" required><br>
    <label>Gender:</label>
    <select name="gender">
      <option>Male</option>
      <option>Female</option>
    </select><br>
    <label>Date of Birth:</label><input type="date" name="dob" required><br>
    <label>Exam Date:</label><input type="date" name="exam_date" required><br>
    <label>Phone Number:</label><input type="text" name="phone" required><br>
    <button type="submit" name="add_candidate">Add</button>
  </form>
</body>
</html>
