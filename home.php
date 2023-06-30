<?php
require "server/db.php";


// print_r($result);
// die();

if (isset($_POST['submit'])) {
     $keyword = $_POST['search'];
     $sql = "SELECT * FROM `student` WHERE `name` LIKE :keyword;";
     $q = $pdo->prepare($sql);
     $q->bindValue(':keyword', '%' . $keyword . '%');
     $q->execute();
     $result = $q->fetchAll(PDO::FETCH_ASSOC);
    
} else {
     $sql = "SELECT `student_id`, `name`, `tel`, `jp_lan_skill` FROM `student`";
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
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                         data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                         aria-expanded="false" aria-label="Toggle navigation">
                         <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                         <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                              <li class="nav-item">
                                   <a class="nav-link active" aria-current="page" href="home.php">Home</a>
                              </li>
                              <li class="nav-item">
                                   <a class="nav-link" href="index.php">Index</a>
                              </li>


                         </ul>
                         <form action="home.php" class="d-flex" method="POST" role="search">
                              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
                                   name="search">
                              <button class="btn btn-outline-success" type="submit" name="submit">Search</button>
                         </form>
                    </div>
               </div>
          </nav>
     </div>

     <table class="table w-75 mt-5 m-5">
          <thead>
               <tr>
                    <th scope="col">No</th>
                    <th scope="col">Student ID</th>
                    <th scope="col" colspan="2">Student Name</th>
                    <th scope="col">Telephone</th>
                    <th scope="col">Language Level</th>
                    <th scope="col">Action</th>
               </tr>
          </thead>
          <tbody>
               <?php foreach ($result as $key => $value) { ?>
               <!-- print_r($value['name']); -->
               <tr>
                    <th><?= ++$key ?></th>
                    <td scope="row" colspan="2"><?= $value['student_id'] ?></td>
                    <td scope="row"><?= $value['name'] ?></td>
                    <td scope="row"><?= $value['tel'] ?></td>
                    <td scope="row"><?= $value['jp_lan_skill'] ?></td>
                    <td scope="row"><a href="cv.php?id=<?= $value['student_id'] ?>">Detail</a></td>

               </tr>
               <?php  } ?>

          </tbody>
     </table>

     <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>