<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $student_id = $_POST['student_id'];
    $course_name = $_POST['course_name'];
    $grade = $_POST['grade'];

    $stmt = $pdo->prepare("INSERT INTO grades (student_id, course_name, grade) VALUES (?, ?, ?)");
    $stmt->execute([$student_id, $course_name, $grade]);

    echo "Grade added successfully.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Grade</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Add Grade</h2>
    <form method="POST">
        <input type="number" name="student_id" placeholder="Student ID" required><br>
        <input type="text" name="course_name" placeholder="Course Name" required><br>
        <input type="text" name="grade" placeholder="Grade (A, B, C, etc.)" required><br>
        <button type="submit">Add Grade</button>
    </form>
</body>
</html>
