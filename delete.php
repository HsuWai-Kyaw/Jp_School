<?php
require "server/db.php";

$errors = [];

// if (isset($_GET['id'])) {
//      $id = $_GET['id'];

//      // Delete student data from the database
//      $query = "DELETE FROM student WHERE student_id = :student_id";
//      $stmt = $pdo->prepare($query);
//      $stmt->bindParam(':student_id', $id, PDO::PARAM_STR);
//      $stmt->execute();
//      echo '<script>alert("Student Data Deleted.");</script>';
//      // Redirect back to the student list page
//      header("Location: index.php");
//      exit();
// } else {
//      $errors[] = "Student ID not provided.";
// }

if (isset($_GET['id'])) {
     $id = $_GET['id'];

     // Delete student data from the database
     $query = "DELETE s, e, j, f FROM student s
     LEFT JOIN edu e ON s.student_id = e.student_id
     LEFT JOIN job_exp j ON s.student_id = j.student_id
     LEFT JOIN family_info f ON s.student_id = f.student_id
     WHERE s.student_id = :student_id";
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