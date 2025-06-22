<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin Dashboard</title>
  <link rel="stylesheet" type="text/css" href="../assets/style.css">
  <style>
    .dashboard {
      max-width: 900px;
      margin: 50px auto;
      background: #fff;
      padding: 40px;
      border-radius: 12px;
      box-shadow: 0 0 15px rgba(0,0,0,0.15);
      text-align: center;
    }

    .dashboard h2 {
      margin-bottom: 30px;
    }

    .dashboard .actions {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 30px;
    }

    .action-card {
      background: #f9f9f9;
      padding: 25px;
      border-radius: 10px;
      width: 200px;
      box-shadow: 0 4px 6px rgba(0,0,0,0.05);
      transition: transform 0.2s ease;
    }

    .action-card:hover {
      transform: translateY(-5px);
    }

    .action-card a {
      display: block;
      font-size: 16px;
      color: #007BFF;
      margin-top: 10px;
      text-decoration: none;
    }

    .logout {
      margin-top: 30px;
    }
  </style>
</head>

<?php if ($_SESSION['role'] === 'Admin'): ?>
  <div class="action-card">
    <strong>Users</strong>
    <a href="manage_users.php">Manage User Roles</a>
  </div>
<?php endif; ?>


<?php if ($_SESSION['role'] === 'Admin'): ?>
    <div class="action-card">
      <strong>Admin Actions</strong>
      <a href="add_candidate.php">Add Candidate</a>
    </div>
<?php endif; ?>

<?php if ($_SESSION['role'] !== 'Viewer'): ?>
    <div class="action-card">
      <strong>Exam</strong>
      <a href="record_result.php">Record Exam Result</a>
    </div>
<?php endif; ?>

<div class="action-card">
  <strong>Reports</strong>
  <a href="view_report.php">View Reports</a>
</div>

<body>
  <div class="dashboard">
    <h2>Welcome, <?php echo $_SESSION['admin']; ?> 👋</h2>
    <div class="actions">
      <div class="action-card">
        <strong>Candidate</strong>
        <a href="add_candidate.php">Add Candidate</a>
      </div>
      <div class="action-card">
        <strong>Results</strong>
        <a href="record_result.php">Record Exam Result</a>
      </div>
      <div class="action-card">
        <strong>Reports</strong>
        <a href="view_report.php">View Reports</a>
      </div>
    </div>
    <div class="logout">
      <a href="logout.php">🔓 Logout</a>
    </div>
  </div>
</body>
</html>
