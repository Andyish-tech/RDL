<?php
require_once '../config/db.php';

if (isset($_POST['add_grade'])) {
    $nid = $_POST['nid'];
    $category = $_POST['category'];
    $marks = (int)$_POST['marks'];
    $decision = $marks >= 12 ? 'Pass' : 'Fail';

    $stmt = $conn->prepare("INSERT INTO Grade (CandidateNationalId, LicenseExamCategory, ObtainedMarks, Decision)
                            VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssis", $nid, $category, $marks, $decision);
    if ($stmt->execute()) {
        echo "Grade recorded.";
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
