<?php
require 'server/db.php';
$errors = [];

if (isset($_GET['id'])) {
     $id = $_GET['id'];
}
// echo $id;
// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

     if (isset($_POST['submit'])) {
          $id = $_POST['id'];
          $education_s_year = $_POST['education_s_year'] ?? [];
          $education_s_month = $_POST['education_s_month'] ?? [];
          $education_e_year = $_POST['education_e_year'] ?? [];
          $education_e_month = $_POST['education_e_month'] ?? [];
          $school_name = $_POST['school_name'] ?? [];
          $specialized_subject = $_POST['specialized_subject'] ?? [];
          $skills = $_POST['skills'] ?? [];

          $job_s_year = $_POST['job_s_year'] ?? [];
          $job_s_month = $_POST['job_s_month'] ?? [];
          $job_e_year = $_POST['job_e_year'] ?? [];
          $job_e_month = $_POST['job_e_month'] ?? [];
          $company_name = $_POST['company_name'] ?? [];
          $job_type_and_position = $_POST['job_type_and_position'] ?? [];
          $income = $_POST['income'] ?? [];

          $cbtype = $_POST['cbtype'] ?? [];
          // print_r($cbtype);
          // die();

          $family_member = $_POST['family_member'] ?? [];

          $family_member_type = $_POST['family_member_type'] ?? [];
          $family_member_age = $_POST['family_member_age'] ?? [];
          $family_member_job = $_POST['family_member_job'] ?? [];

          $relative = $_POST['rdorelative'];
          $jp_family_member = $_POST['jp_family_member'];
          $accept = $_POST['rdoaccept'];

          // Prepare the SQL statement
          $esql =
               'INSERT INTO `edu`(`student_id`, `education_s_year`, `education_s_month`, `education_e_year`, `education_e_month`, `school_name`, `specialized_subject`, `skills`) VALUES (:student_id, :education_s_year, :education_s_month, :education_e_year, :education_e_month, :school_name, :specialized_subject, :skills)';
          $statement = $pdo->prepare($esql);

          $jsql = "INSERT INTO `job_exp`(`student_id`, `job_s_year`, `job_s_month`, `job_e_year`, `job_e_month`, `company_name`, `job_type_and_position`, `income`)
          VALUES (:student_id, :job_s_year, :job_s_month, :job_e_year, :job_e_month, :company_name, :job_type_and_position, :income)
          ";
          $statementj = $pdo->prepare($jsql);

          $fsql = "INSERT INTO family_info( student_id, family_member, family_member_type, family_member_age, family_member_job, cbtype, relative, jp_family_member, accept) VALUES (:student_id,:family_member,:family_member_type,:family_member_age,:family_member_job,:cbtype,:relative,:jp_family_member,:accept)";
          $statementf = $pdo->prepare($fsql);

          // Bind parameters
          $statement->bindParam(':student_id', $id, PDO::PARAM_STR);
          for ($i = 0; $i < count($education_s_year); $i++) {
               $statement->bindParam(
                    ':education_s_year',
                    $education_s_year[$i],
                    PDO::PARAM_STR
               );
               $statement->bindParam(
                    ':education_s_month',
                    $education_s_month[$i],
                    PDO::PARAM_STR
               );
               $statement->bindParam(
                    ':education_e_year',
                    $education_e_year[$i],
                    PDO::PARAM_STR
               );
               $statement->bindParam(
                    ':education_e_month',
                    $education_e_month[$i],
                    PDO::PARAM_STR
               );
               $statement->bindParam(':school_name', $school_name[$i], PDO::PARAM_STR);
               $statement->bindParam(
                    ':specialized_subject',
                    $specialized_subject[$i],
                    PDO::PARAM_STR
               );
               $statement->bindParam(':skills', $skills[$i], PDO::PARAM_STR);
               $statement->execute();
          }
          $statementj->bindParam(':student_id', $id, PDO::PARAM_STR);
          for ($i = 0; $i < count($job_s_year); $i++) {
               $statementj->bindParam(':job_s_year', $job_s_year[$i], PDO::PARAM_STR);
               $statementj->bindParam(':job_s_month', $job_s_month[$i], PDO::PARAM_STR);
               $statementj->bindParam(':job_e_year', $job_e_year[$i], PDO::PARAM_STR);
               $statementj->bindParam(':job_e_month', $job_e_month[$i], PDO::PARAM_STR);
               $statementj->bindParam(':company_name', $company_name[$i], PDO::PARAM_STR);
               $statementj->bindParam(
                    ':job_type_and_position',
                    $job_type_and_position[$i],
                    PDO::PARAM_STR
               );
               $statementj->bindParam(':income', $income[$i], PDO::PARAM_STR);
               $statementj->execute();
          }

          // print_r($family_member);
          // die();

          foreach ($cbtype as $i => $value) {
               $cbtype = $value;
               $fm = $family_member[$i];
               $fmt = $family_member_type[$i];
               $fma = $family_member_age[$i];
               $fmj = $family_member_job[$i];
               // echo $cbtype . "<br>";
               // echo $fm . "<br>";
               // echo $fmt . "<br>";
               // echo $fma . "<br>";
               // echo $fmj . "<br>";
               $statementf->bindParam(':student_id', $id, PDO::PARAM_STR);
               $statementf->bindParam(':family_member', $fm, PDO::PARAM_STR);
               $statementf->bindParam(':family_member_type', $fmt, PDO::PARAM_STR);
               $statementf->bindParam(':family_member_age', $fma, PDO::PARAM_STR);
               $statementf->bindParam(':family_member_job', $fmj, PDO::PARAM_STR);
               $statementf->bindParam(':cbtype', $cbtype, PDO::PARAM_STR);
               $statementf->bindParam(':relative', $relative, PDO::PARAM_STR);
               $statementf->bindParam(':jp_family_member', $jp_family_member, PDO::PARAM_STR);
               $statementf->bindParam(':accept', $accept, PDO::PARAM_STR);
               $statementf->execute();
          }

          if (empty($errors)) {
               echo 'Data Stored';
               header('Location: index.php');
               exit();
          }
     }
}
?>

<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/main.css">
<form action="datainput2.php" method="POST" enctype="multipart/form-data">
     <input type="hidden" name="id" value="<?php echo $id; ?>">
     <div class="container shadow shadow">
          <!-- education -->
          <b><span>学歴 edu</span></b>

          <table id="education_table" class="table table-sm table-bordered border-dark">
               <thead>
                    <tr>
                         <td>開始年</td>
                         <td>終了年</td>
                         <td colspan="2">学校名</td>
                         <td colspan="2">専門</td>
                         <td>免許・資</td>
                    </tr>
               </thead>
               <tbody>
                    <tr id="education_row_template">
                         <td>
                              <div class="flex">
                                   <input style="width: 30px;" type="text" name="education_s_year[]"
                                        class="education_s_year">年
                                   <input style="width: 30px;" type="text" name="education_s_month[]"
                                        class="education_s_month">月
                              </div>
                         </td>
                         <td>
                              <div class="flex">
                                   <input style="width: 30px;" type="text" name="education_e_year[]"
                                        class="education_e_year">年
                                   <input style="width: 30px;" type="text" name="education_e_month[]"
                                        class="education_e_month">月
                              </div>
                         </td>
                         <td colspan="2"><input type="text" name="school_name[]" class="school_name"></td>
                         <td colspan="2"><input type="text" name="specialized_subject[]" class="specialized_subject">
                         </td>
                         <td><input type="text" name="skills[]" class="skills"></td>
                    </tr>
               </tbody>
          </table>
          <p id="add_education_row">Add New Row</p>

          <!-- job-exp -->
          <b><span>職歴</span></b>
          <table id="job_table" class="table table-sm table-bordered border-dark">
               <thead>
                    <tr>
                         <td>開始年</td>
                         <td>終了年</td>
                         <td colspan="2">会社名</td>
                         <td colspan="2">仕事内容</td>
                         <td>給料</td>
                    </tr>

               </thead>
               <tbody>

                    <tr id="job_row_template">
                         <td>
                              <div class="flex">
                                   <input style="width: 30px;" type="text" name="job_s_year[]" class="job_s_year">年
                                   <input style="width: 30px;" type="text" name="job_s_month[]" class="job_s_month">月
                              </div>
                         </td>
                         <td>
                              <div class="flex">
                                   <input style="width: 30px;" type="text" name="job_e_year[]" class="job_e_year">年
                                   <input style="width: 30px;" type="text" name="job_e_month[]" class="job_e_month">月
                              </div>
                         </td>
                         <td colspan="2"><input type="text" name="company_name[]" class="company_name"></td>
                         <td colspan="2"><input type="text" name="job_type_and_position[]"
                                   class="job_type_and_position">
                         </td>
                         <td><input type="number" name="income[]" class="income" style="width: 50px;"></td>
                    </tr>

               </tbody>
          </table>
          <p id="add_job_row">Add New Row</p>

          <!-- family-member -->
          <span><b>家族</b></span>

          <table id="family_table" class="table table-sm table-bordered border-dark">
               <thead>
                    <tr>
                         <td colspan="2">name</td>
                         <td>type</td>
                         <td>age</td>
                         <td>job</td>
                         <td>stay</td>
                         <td>away</td>
                    </tr>

               </thead>
               <tbody>

                    <tr id="">
                         <td colspan="2"><input type="text" name="family_member[]" class="family_member"></td>
                         <td><input type="text" name="family_member_type[]" class="family_member_type">
                         </td>
                         <td><input type="number" name="family_member_age[]" class="family_member_age"
                                   style="width: 50px;"></td>
                         <td><input type="text" name="family_member_job[]" class="family_member_job"
                                   style="width: 50px;"></td>
                         </td>
                         <!-- <td>
                              <select name="cbtype[]" id="">
                                   <option value="stay">stay</option>
                                   <option value="away">away</option>
                              </select>
                         </td> -->

                         <td>
                              <input type="checkbox" value="stay" name="cbtype[]" class="stay"
                                   onclick="disableOtherCheckbox(event)">
                         </td>
                         <td>
                              <input type="checkbox" value="away" name="cbtype[]" class="away"
                                   onclick="disableOtherCheckbox(event)">
                         </td>

                    </tr>
               </tbody>
               <tfoot>
                    <tr>
                         <td colspan="2">ဂျပန်မှာဆွေမျိူးရှိသလား</td>
                         <td colspan="2">
                              <div class="d-flex justify-content-evenly pt-4">
                                   <div>
                                        <label for="yes">有</label>
                                        <input type="radio" name="rdorelative" id="" value="yes">ရှိ
                                   </div>
                                   <div>
                                        <label for="no">無し</label>
                                        <input type="radio" name="rdorelative" id="" value="no">မရှိ
                                   </div>
                              </div>
                         </td>
                         <td colspan="2">ရှိပါက တော်စပ်ပုံ</td>
                         <td><input type="text" class="jp_family_member" name="jp_family_member" id=""></td>
                    </tr>
                    <tr>
                         <td colspan="4">ဂျပန်သို့သွားရောက်ရန် မိသားစုသဘောထား</td>
                         <td colspan="3">
                              <div class="d-flex justify-content-evenly pt-4">
                                   <div>
                                        <label for="yes">有</label>
                                        <input type="radio" name="rdoaccept" id="" value="yes">သဘောတူ
                                   </div>
                                   <div>
                                        <label for="no">無し</label>
                                        <input type="radio" name="rdoaccept" id="" value="no">သဘောမတူ
                                   </div>
                              </div>
                         </td>
                    </tr>
               </tfoot>
          </table>
          <p id="add_family_row">Add New Row</p>


          <input type="submit" value="Submit" name="submit" class="btn btn-info">
     </div>
</form>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>

<script>
$(document).ready(function() {
     // e.preventDefault()
     // Add new education row
     $('#add_education_row').click(function() {
          $("#education_row_template").clone().appendTo("#education_table");

     });
     $('#add_job_row').click(function() {
          $("#job_row_template").clone().appendTo("#job_table");

     });
     $('#add_family_row').click(function() {
          $("#family_row_template").clone().appendTo("#family_table");

     });
});

// Function to disable the other checkbox in the same row
function disableOtherCheckbox(event) {
     const clickedCheckbox = event.target;
     const row = clickedCheckbox.parentNode.parentNode; // Get the parent row of the clicked checkbox
     const checkboxes = row.querySelectorAll('input[type="checkbox"]');

     checkboxes.forEach(checkbox => {
          if (checkbox !== clickedCheckbox) {
               checkbox.disabled = clickedCheckbox.checked;
          }
     });
}

// Add event listener to the parent element
const familyTable = document.getElementById('family_table');

familyTable.addEventListener('click', function(event) {
     if (event.target.matches('.stay') || event.target.matches('.away')) {
          disableOtherCheckbox(event);
     }
});

// Function to add a new row to the table
function addFamilyRow() {
     const familyTable = document.getElementById('family_table');
     const newRow = document.createElement('tr');
     newRow.innerHTML = `
     <td colspan="2"><input type="text" name="family_member[]" class="family_member"></td>
                         <td><input type="text" name="family_member_type[]" class="family_member_type">
                         </td>
                         <td><input type="number" name="family_member_age[]" class="family_member_age"
                                   style="width: 50px;"></td>
                         <td><input type="text" name="family_member_job[]" class="family_member_job"
                                   style="width: 50px;"></td>
                         </td>
                         <td>
                              <input type="checkbox" value="stay" name="cbtype[]" class="stay"
                                   onclick="disableOtherCheckbox(event)">
                         </td>
                         <td>
                              <input type="checkbox" value="away" name="cbtype[]" class="away"
                                   onclick="disableOtherCheckbox(event)">
                         </td>
       `;
     familyTable.appendChild(newRow);
}

// Add event listener to the "Add New Row" element
const addFamilyRowButton = document.getElementById('add_family_row');
addFamilyRowButton.addEventListener('click', addFamilyRow);
</script>