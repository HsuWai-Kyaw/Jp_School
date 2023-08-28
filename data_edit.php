<?php
require "server/db.php";
require "header.php";
$errors = [];

if (isset($_GET['id'])) {

     $id = $_GET['id'];
}
$sql = "SELECT * FROM student WHERE student_id = :student_id";
$statement = $pdo->prepare($sql);
$statement->bindParam(":student_id", $id, PDO::PARAM_STR);
$statement->execute();
$student = $statement->fetchAll(PDO::FETCH_ASSOC);
// print_r($student);
// die();


?>

<form action="data_update.php" method="POST" enctype="multipart/form-data">
     <div class="container shadow shadow table-primary">
          <table class="table table-sm table-bordered border-dark">
               <img src="logo.png" class="rounded mx-auto d-block w-100">

               <?php
               // foreach ($student as $key => $value) {
               // print_r($value['passport']);
               // print_r($value['start_date']);
               // print_r($value['address']);
               // die();

               include "./edit_component-copy/student/photo.php";
               include "./edit_component-copy/student/student_id.php";
               include "./edit_component-copy/student/name_kananame_gender.php";
               include "./edit_component-copy/student/dob_age_country_religion.php";
               include "./edit_component-copy/student/nrc_passport.php";
               include "./edit_component-copy/student/sdate_to_weight.php";
               include "./edit_component-copy/student/marraige_to_certificate.php";
               include "./edit_component-copy/student/objective_to_old_visa.php";

               ?>

          </table>
          <input type="submit" value="Edit" name="edit" class="btn btn-success">
     </div>
</form>
<div class="container shadow shadow">
     <?php
     include "edu.php";
     include "job.php";
     include "family.php";
     // include "family_extend.php";
     ?>

</div>
<div class="float-right">

     <!-- <input type="submit" class="btn btn-primary" name="edit" > -->
     <button type="button" class="btn btn-info bg-light" name="cancel">
          <a href="index.php">Cancel</a>
     </button>


</div>

<script>
     img.onclick = () => file.click()
     file.addEventListener('change', function() {
          /* to get file  */
          let f = file.files[0]
          /* use url object for to get file url */
          img.src = URL.createObjectURL(f)
          console.log(f)
     })
</script>
<?php
require "footer.php";
?>