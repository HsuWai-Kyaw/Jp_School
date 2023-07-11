<?php
require "server/db.php";

// print_r($result);
// die();

if (isset($_POST['submit'])) {
     $keyword = $_POST['search'];
     $sql = "SELECT * FROM `student` WHERE `student_id` LIKE :keyword;";
     $q = $pdo->prepare($sql);
     $q->bindValue(':keyword', '%' . $keyword . '%');
     $q->execute();
     $result = $q->fetchAll(PDO::FETCH_ASSOC);
} else {
     $sql = "SELECT `student_id`, `name`, `tel`, `jp_lan_skill` FROM `student` ORDER BY student_id DESC";
     $statement = $pdo->prepare($sql);
     $statement->execute();
     $result = $statement->fetchAll(PDO::FETCH_ASSOC);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
     <link rel="stylesheet" href="css/bootstrap.min.css">
     <link rel="stylesheet" href="css/main.css">
</head>

<body>
     <div class="header w-auto shadow m-auto p-3">
          <nav class="navbar navbar-expand-lg bg-body-tertiary">
               <div class="container-fluid">
                    <a class="navbar-brand" href="#">Student List</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                         <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                         <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                              <li class="nav-item">
                                   <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                              </li>
                              <li class="nav-item">
                                   <a class="nav-link" href="datainput.php">Add New +</a>
                              </li>

                         </ul>
                         <form action="index.php" class="d-flex" method="POST" role="search">
                              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
                              <button class="btn btn-outline-success" type="submit" name="submit">Search</button>
                         </form>
                    </div>
               </div>
          </nav>
     </div>


     <div class="col-10">
          <table class="table m-3 align-middle mb-0 bg-white">
               <thead>
                    <tr>
                         <th><input type="checkbox" name="selectedStudents[]" value="<?= $value['student_id'] ?>"></th>
                         <th scope="col">No</th>
                         <th scope="col">Student ID</th>
                         <th scope="col" colspan="2">Student Name</th>
                         <th scope="col">Telephone</th>
                         <th scope="col">Language Level</th>
                         <th scope="col">Action</th>
                    </tr>
               </thead>
               <?php
               // $record_per_page = 5;
               // $page = "";

               // if (isset($_GET['page'])) {
               //      $page = $_GET['page'];
               // } else {
               //      $page = 1;
               // }
               // $start_page = ($page - 1) * $record_per_page;
               // $u_query = "SELECT * FROM student LIMIT :start_page, :record_per_page";
               // $statement = $pdo->prepare($u_query);
               // $statement->bindParam(":start_page", $start_page, PDO::PARAM_INT);
               // $statement->bindParam(":record_per_page", $record_per_page, PDO::PARAM_INT);
               // $statement->execute();

               // $result = $statement->fetchAll(PDO::FETCH_ASSOC);
               ?>
               <tbody>
                    <?php foreach ($result as $key => $value) { ?>

                         <!-- print_r($value['name']); -->
                         <tr>
                              <td><input type="checkbox" name="selectedStudents[]" value="<?= $value['student_id'] ?>"></td>
                              <th><?= ++$key ?></th>
                              <td scope="row" colspan="2"><?= $value['student_id'] ?></td>
                              <td scope="row"><?= $value['name'] ?></td>
                              <td scope="row"><?= $value['tel'] ?></td>
                              <td scope="row"><?= $value['jp_lan_skill'] ?></td>
                              <td scope="row"><a href="cv.php?id=<?= $value['student_id'] ?>">Detail</a></td>
                              <td scope="row"><a href="delete.php?id=<?= $value['student_id']; ?>">Delete</a>

                              </td>

                         </tr>
                    <?php  } ?>

               </tbody>
          </table>

     </div>

     <!-- <div class="pagination m-auto" style="width: fit-content;">
          <?php
          $p_query = "SELECT * FROM student ORDER BY student_id DESC";
          $p_result = $pdo->prepare($p_query);
          $p_result->execute();

          $total_records = $p_result->rowCount();
          //     print_r($total_records);
          //     die();

          $total_pages = ceil($total_records / $record_per_page);
          for ($i = 1; $i < $total_pages; $i++) {
               echo "<a class='px-3 py-1 border text-center mx-2' href='dashboard.php?page=" . $i . "'> " . $i . "</a>";
          }
          ?>
     </div> -->


     <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.3/jspdf.umd.min.js"></script>
     <script src="js/bootstrap.bundle.min.js"></script>
     <script>
          function confirmDelete(student_id) {
               if (confirm("Are you sure to delete this record?")) {
                    window.location.href = "delete.php?id=" + student_id;
               }
          }
     </script>
</body>

</html>