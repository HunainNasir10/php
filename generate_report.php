<?php
include 'db.php';

if (isset($_GET['student_id'])) {
    $student_id = $_GET['student_id'];

    // Fetch grades for the student
    $stmt = $pdo->prepare("SELECT course_name, grade FROM grades WHERE student_id = ?");
    $stmt->execute([$student_id]);
    $grades = $stmt->fetchAll();

    // Fetch attendance for the student
    $stmt = $pdo->prepare("SELECT date, status FROM attendance WHERE student_id = ?");
    $stmt->execute([$student_id]);
    $attendance = $stmt->fetchAll();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Performance Report</title>
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
    <h2>Performance Report for Student ID: <?php echo $student_id; ?></h2>

    <h3>Grades</h3>
    <table>
        <tr>
            <th>Course</th>
            <th>Grade</th>
        </tr>
        <?php foreach ($grades as $grade): ?>
            <tr>
                <td><?php echo $grade['course_name']; ?></td>
                <td><?php echo $grade['grade']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <h3>Attendance</h3>
    <table>
        <tr>
            <th>Date</th>
            <th>Status</th>
        </tr>
        <?php foreach ($attendance as $attend): ?>
            <tr>
                <td><?php echo $attend['date']; ?></td>
                <td><?php echo $attend['status']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
