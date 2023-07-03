<?php
require "server/db.php";

$errors = [];

if (isset($_GET['id'])) {
     $id = $_GET['id'];

     // Delete student data from the database
     $query = "DELETE FROM student WHERE student_id = :student_id";
     $stmt = $pdo->prepare($query);
     $stmt->bindParam(':student_id', $id, PDO::PARAM_STR);
     $stmt->execute();
     echo '<script>alert("Student Data Deleted.");</script>';
     // Redirect back to the student list page
     header("Location: index.php");
     exit();
} else {
     $errors[] = "Student ID not provided.";
}

if (!empty($errors)) {
     foreach ($errors as $error) {
          echo $error;
     }
}
