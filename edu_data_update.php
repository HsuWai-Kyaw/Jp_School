<?php
require_once('server/db.php');
$errors = [];


if (isset($_GET['id'])) {
     $edu_id = $_GET['id'];
     // $id = $_POST['student_id'];
     $select = "SELECT * FROM edu WHERE edu_id=:edu_id";
     $selectstatement = $pdo->prepare($select);
     // $selectstatement->bindParam(':student_id', $id, PDO::PARAM_STR);
     $selectstatement->bindParam(':edu_id', $edu_id, PDO::PARAM_STR);
     $select_res = $selectstatement->execute();
     $select_res = $selectstatement->fetch();
     // print_r($select_res);
     // die();

     if ($select_res) {
          $res = [
               'status' => 200,
               'message' => 'Data Fetch Successfully',
               'data' => $select_res
          ];
          echo json_encode($res);
          return;
     } else {
          $res = [
               'status' => 404,
               'message' => 'ID not found!'
          ];
          echo json_encode($res);
          return;
     }
}
if (isset($_POST['save_student'])) {
     $student_id = $_POST['student_id'];
     $education_s_year = $_POST['education_s_year'];
     $education_s_month = $_POST['education_s_month'];
     $education_e_year = $_POST['education_e_year'];
     $education_e_month = $_POST['education_e_month'];
     $school_name = $_POST['school_name'];
     $specialized_subject = $_POST['specialized_subject'];
     $skills = $_POST['skills'];

     if ($education_s_year == NULL || $education_s_month == NULL || $education_e_year == NULL || $education_e_month == NULL || $school_name == NULL || $specialized_subject == NULL || $skills == NULL) {
          $res = [
               'status' => 422,
               'message' => 'All fields are necessary'
          ];
          echo json_encode($res);
          return;
     }

     $insertqry = "INSERT INTO `edu`(`student_id`,`education_s_year`, `education_s_month`, `education_e_year`, `education_e_month`, `school_name`, `specialized_subject`, `skills`) VALUES (:student_id,:education_s_year, :education_s_month, :education_e_year, :education_e_month, :school_name, :specialized_subject, :skills)";
     $addstatement = $pdo->prepare($insertqry);
     $addstatement->bindParam(':student_id', $student_id, PDO::PARAM_STR);

     $addstatement->bindParam(
          ':education_s_year',
          $education_s_year,
          PDO::PARAM_STR
     );
     $addstatement->bindParam(
          ':education_s_month',
          $education_s_month,
          PDO::PARAM_STR
     );
     $addstatement->bindParam(
          ':education_e_year',
          $education_e_year,
          PDO::PARAM_STR
     );
     $addstatement->bindParam(
          ':education_e_month',
          $education_e_month,
          PDO::PARAM_STR
     );
     $addstatement->bindParam(':school_name', $school_name, PDO::PARAM_STR);
     $addstatement->bindParam(
          ':specialized_subject',
          $specialized_subject,
          PDO::PARAM_STR
     );
     $addstatement->bindParam(':skills', $skills, PDO::PARAM_STR);
     $add = $addstatement->execute();


     if ($add) {
          $res = [
               'status' => 200,
               'message' => 'Record added Successfully'
          ];
          echo json_encode($res);
          return;
     } else {
          $res = [
               'status' => 500,
               'message' => 'New Record Not Created'
          ];
          echo json_encode($res);
          return;
     }
}


if (isset($_POST['update_student'])) {

     $edu_id = $_POST['edu_id'];
     // $education_s_year = 2020;
     // $education_s_month = 4;
     // $education_e_year = 2023;
     // $education_e_month = 8;
     // $school_name = "ABC";
     // $specialized_subject = "Sleep224";
     // $skills = " TEa";
     $education_s_year = $_POST['education_s_year'] ?? null;
     $education_s_month = $_POST['education_s_month'] ?? null;
     $education_e_year = $_POST['education_e_year'] ?? null;
     $education_e_month = $_POST['education_e_month'] ?? null;
     $school_name = $_POST['school_name'] ?? null;
     $specialized_subject = $_POST['specialized_subject'] ?? null;
     $skills = $_POST['skills'] ?? null;
     if ($education_s_year == NULL || $education_s_month == NULL || $education_e_year == NULL || $education_e_month == NULL || $school_name == NULL || $specialized_subject == NULL || $skills == NULL) {
          $res = [
               'status' => 422,
               'message' => 'All fields are necessary'
          ];
          echo json_encode($res);
          return;
     }
     $updateqry = "UPDATE `edu` SET `education_s_year`=:education_s_year,`education_s_month`=:education_s_month,`education_e_year`=:education_e_year,`education_e_month`=:education_e_month,`school_name`=:school_name,`specialized_subject`=:specialized_subject,`skills`=:skills WHERE edu_id=:edu_id";
     $updatestatement = $pdo->prepare($updateqry);
     $updatestatement->bindParam(':edu_id', $edu_id, PDO::PARAM_STR);
     $updatestatement->bindParam(
          ':education_s_year',
          $education_s_year,
          PDO::PARAM_STR
     );
     $updatestatement->bindParam(
          ':education_s_month',
          $education_s_month,
          PDO::PARAM_STR
     );
     $updatestatement->bindParam(
          ':education_e_year',
          $education_e_year,
          PDO::PARAM_STR
     );
     $updatestatement->bindParam(
          ':education_e_month',
          $education_e_month,
          PDO::PARAM_STR
     );
     $updatestatement->bindParam(':school_name', $school_name, PDO::PARAM_STR);
     $updatestatement->bindParam(
          ':specialized_subject',
          $specialized_subject,
          PDO::PARAM_STR
     );
     $updatestatement->bindParam(':skills', $skills, PDO::PARAM_STR);

     $updates = $updatestatement->execute();


     if ($updates) {
          $res = [
               'status' => 200,
               'message' => 'Updated Successfully 58477777777777777'
          ];
          echo json_encode($res);
          return;
     } else {
          $res = [
               'status' => 500,
               'message' => 'Not Updated'
          ];
          echo json_encode($res);
          return;
     }
}
if (isset($_POST['deleteStudent'])) {
}
