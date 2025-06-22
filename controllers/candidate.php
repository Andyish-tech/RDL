<?php
require_once '../config/db.php';

if (isset($_POST['add_candidate'])) {
    $id = $_POST['nid'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $exam = $_POST['exam_date'];
    $phone = $_POST['phone'];

    $stmt = $conn->prepare("INSERT INTO Candidate VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $id, $fname, $lname, $gender, $dob, $exam, $phone);
    if ($stmt->execute()) {
        echo "Candidate added!";
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
