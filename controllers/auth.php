 <?php
session_start();
require_once '../config/db.php';

if (isset($_POST['login'])) {
    $name = $_POST['admin_name'];
    $pass = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM Admin WHERE AdminName=?");
    $stmt->bind_param("s", $name);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $admin = $result->fetch_assoc();
        if (password_verify($pass, $admin['Password'])) {
            $_SESSION['admin'] = $admin['AdminName'];
            header("Location: ../views/dashboard.php");
        } else {
            echo "Wrong password.";
        }
    } else {
        echo "Admin not found.";
    }
    if (password_verify($pass, $admin['Password'])) {
    $_SESSION['admin'] = $admin['AdminName'];
    $_SESSION['role'] = $admin['Role'];
    header("Location: ../views/dashboard.php");
}

}
?>
