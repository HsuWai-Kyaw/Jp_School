<?php
require_once('server/db.php');
$errors = [];


if (isset($_GET['id'])) {
     $job_exp_id = $_GET['id'];
     $select = "SELECT * FROM job_exp WHERE job_exp_id=:job_exp_id";
     $selectstatement = $pdo->prepare($select);
     $selectstatement->bindParam(':job_exp_id', $job_exp_id, PDO::PARAM_STR);
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
if (isset($_POST['add_job'])) {
     $student_id = $_POST['student_id'];
     $job_s_year = $_POST['job_s_year'];
     $job_s_month = $_POST['job_s_month'];
     $job_e_year = $_POST['job_e_year'];
     $job_e_month = $_POST['job_e_month'];
     $company_name = $_POST['company_name'];
     $job_type_and_position = $_POST['job_type_and_position'];
     $income = $_POST['income'];

     if ($job_s_year == NULL || $job_s_month == NULL || $job_e_year == NULL || $job_e_month == NULL || $company_name == NULL || $job_type_and_position == NULL || $income == NULL) {
          $res = [
               'status' => 422,
               'message' => 'All fields are necessary'
          ];
          echo json_encode($res);
          return;
     }

     $insertqry = "INSERT INTO `job_exp`(`student_id`,`job_s_year`, `job_s_month`, `job_e_year`, `job_e_month`, `company_name`, `job_type_and_position`, `income`) VALUES (:student_id,:job_s_year, :job_s_month, :job_e_year, :job_e_month, :company_name, :job_type_and_position, :income)";
     $addstatement = $pdo->prepare($insertqry);
     $addstatement->bindParam(':student_id', $student_id, PDO::PARAM_STR);

     $addstatement->bindParam(
          ':job_s_year',
          $job_s_year,
          PDO::PARAM_STR
     );
     $addstatement->bindParam(
          ':job_s_month',
          $job_s_month,
          PDO::PARAM_STR
     );
     $addstatement->bindParam(
          ':job_e_year',
          $job_e_year,
          PDO::PARAM_STR
     );
     $addstatement->bindParam(
          ':job_e_month',
          $job_e_month,
          PDO::PARAM_STR
     );
     $addstatement->bindParam(':company_name', $company_name, PDO::PARAM_STR);
     $addstatement->bindParam(
          ':job_type_and_position',
          $job_type_and_position,
          PDO::PARAM_STR
     );
     $addstatement->bindParam(':income', $income, PDO::PARAM_STR);
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


if (isset($_POST['update_job'])) {

     $job_exp_id = $_POST['job_exp_id'];
     // $education_s_year = 2020;
     // $education_s_month = 4;
     // $education_e_year = 2023;
     // $education_e_month = 8;
     // $company_name = "ABC";
     // $job_type_and_position = "Sleep224";
     // $income = " TEa";
     $job_s_year = $_POST['job_s_year'] ?? null;
     $job_s_month = $_POST['job_s_month'] ?? null;
     $job_e_year = $_POST['job_e_year'] ?? null;
     $job_e_month = $_POST['job_e_month'] ?? null;
     $company_name = $_POST['company_name'] ?? null;
     $job_type_and_position = $_POST['job_type_and_position'] ?? null;
     $income = $_POST['income'] ?? null;
     if ($job_s_year == NULL || $job_s_month == NULL || $job_e_year == NULL || $job_e_month == NULL || $company_name == NULL || $job_type_and_position == NULL || $income == NULL) {
          $res = [
               'status' => 422,
               'message' => 'All fields are necessary'
          ];
          echo json_encode($res);
          return;
     }
     $updateqry = "UPDATE `job_exp` SET `job_s_year`=:job_s_year,`job_s_month`=:job_s_month,`job_e_year`=:job_e_year,`job_e_month`=:job_e_month,`company_name`=:company_name,`job_type_and_position`=:job_type_and_position,`income`=:income WHERE job_exp_id=:job_exp_id";
     $updatestatement = $pdo->prepare($updateqry);
     $updatestatement->bindParam(':job_exp_id', $job_exp_id, PDO::PARAM_STR);
     $updatestatement->bindParam(
          ':job_s_year',
          $job_s_year,
          PDO::PARAM_STR
     );
     $updatestatement->bindParam(
          ':job_s_month',
          $job_s_month,
          PDO::PARAM_STR
     );
     $updatestatement->bindParam(
          ':job_e_year',
          $job_e_year,
          PDO::PARAM_STR
     );
     $updatestatement->bindParam(
          ':job_e_month',
          $job_e_month,
          PDO::PARAM_STR
     );
     $updatestatement->bindParam(':company_name', $company_name, PDO::PARAM_STR);
     $updatestatement->bindParam(
          ':job_type_and_position',
          $job_type_and_position,
          PDO::PARAM_STR
     );
     $updatestatement->bindParam(':income', $income, PDO::PARAM_STR);

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
