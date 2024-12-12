<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $student_id = $_POST['student_id'];
    $date = $_POST['date'];
    $status = $_POST['status'];

    // Insert attendance record into the database
    $stmt = $pdo->prepare("INSERT INTO attendance (student_id, date, status) VALUES (?, ?, ?)");
    $stmt->execute([$student_id, $date, $status]);

    echo "Attendance recorded successfully.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mark Attendance</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Mark Attendance</h2>
    <form method="POST">
        <input type="number" name="student_id" placeholder="Student ID" required><br>
        <input type="date" name="date" placeholder="Date" required><br>
        <select name="status" required>
            <option value="Present">Present</option>
            <option value="Absent">Absent</option>
            <option value="Late">Late</option>
        </select><br>
        <button type="submit">Submit Attendance</button>
    </form>
</body>
</html>
