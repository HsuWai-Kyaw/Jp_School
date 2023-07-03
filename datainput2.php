<?php
require "server/db.php";

$errors = [];

if (isset($_GET['id'])) {

     $id = $_GET['id'];
}

// echo $id;

if (isset($_POST['submit'])) {

     $id = $_POST['id'];

     $education_s_date = $_POST['education_s_date'];
     $education_e_date = $_POST['education_e_date'];
     $school_name = $_POST['school_name'];
     $specialize_subject = $_POST['specialize_subject'];
     $skills = $_POST['skills'];

     $education_s_date_2 = $_POST['education_s_date_2'];
     $education_e_date_2 = $_POST['education_e_date_2'];
     $school_name_2 = $_POST['school_name_2'];
     $specialize_subject_2 = $_POST['specialize_subject_2'];
     $skills_2 = $_POST['skills_2'];

     $job_s_date = $_POST['job_s_date'];
     $job_e_date = $_POST['job_e_date'];
     $company_name = $_POST['company_name'];
     $job_type_and_position = $_POST['job_type_and_position'];
     $income = $_POST['income'];

     $job_s_date_2 = $_POST['job_s_date_2'];
     $job_e_date_2 = $_POST['job_e_date_2'];
     $company_name_2 = $_POST['company_name_2'];
     $job_type_and_position_2 = $_POST['job_type_and_position_2'];
     $income_2 = $_POST['income_2'];

     $family_member = $_POST['family_member'];
     $family_member_type = $_POST['family_member_type'];
     $family_member_age = $_POST['family_member_age'];
     $family_member_job = $_POST['family_member_job'];
     $living = $_POST['rdostay'];

     $family_member_2 = $_POST['family_member_2'];
     $family_member_type_2 = $_POST['family_member_type_2'];
     $family_member_age_2 = $_POST['family_member_age_2'];
     $family_member_job_2 = $_POST['family_member_job_2'];
     $living_2 = $_POST['rdostay_2'];

     $family_member_3 = $_POST['family_member_3'];
     $family_member_type_3 = $_POST['family_member_type_3'];
     $family_member_age_3 = $_POST['family_member_age_3'];
     $family_member_job_3 = $_POST['family_member_job_3'];
     $living_3 = $_POST['rdostay_3'];

     $relative = $_POST['rdorelative'];
     $jp_family_member = $_POST['jp_family_member'];
     $accept = $_POST['rdoaccept'];

     $sql2 = "INSERT INTO `associated`(`student_id`,`education_s_date`, `education_e_date`, `school_name`, `specialize_subject`, `skills`, `education_s_date_2`, `education_e_date_2`, `school_name_2`, `specialize_subject_2`, `skills_2`, `job_s_date`, `job_e_date`, `company_name`, `job_type_and_position`, `income`, `job_s_date_2`, `job_e_date_2`, `company_name_2`, `job_type_and_position_2`, `income_2`, `family_member`, `family_member_type`, `family_member_age`, `family_member_job`, `living`, `family_member_2`, `family_member_type_2`, `family_member_age_2`, `family_member_job_2`, `living_2`, `family_member_3`, `family_member_type_3`, `family_member_age_3`, `family_member_job_3`, `living_3`, `relative`, `jp_family_member`, `accept`) VALUES (:student_id,:education_s_date,:education_e_date,:school_name, :specialize_subject, :skills, :education_s_date_2, :education_e_date_2, :school_name_2, :specialize_subject_2, :skills_2, :job_s_date, :job_e_date, :company_name, :job_type_and_position, :income, :job_s_date_2, :job_e_date_2, :company_name_2, :job_type_and_position_2, :income_2, :family_member, :family_member_type, :family_member_age, :family_member_job, :living, :family_member_2, :family_member_type_2, :family_member_age_2, :family_member_job_2, :living_2, :family_member_3, :family_member_type_3, :family_member_age_3, :family_member_job_3, :living_3, :relative, :jp_family_member, :accept)";
     $statement2 = $pdo->prepare($sql2);
     $statement2->bindParam(":student_id", $id, PDO::PARAM_STR);

     $statement2->bindParam(":education_s_date", $education_s_date, PDO::PARAM_STR);
     $statement2->bindParam(":education_e_date", $education_e_date, PDO::PARAM_STR);
     $statement2->bindParam(":school_name", $school_name, PDO::PARAM_STR);
     $statement2->bindParam(":specialize_subject", $specialize_subject, PDO::PARAM_STR);
     $statement2->bindParam(":skills", $skills, PDO::PARAM_STR);
     $statement2->bindParam(":education_s_date_2", $education_s_date_2, PDO::PARAM_STR);
     $statement2->bindParam(":education_e_date_2", $education_e_date_2, PDO::PARAM_STR);
     $statement2->bindParam(":school_name_2", $school_name_2, PDO::PARAM_STR);
     $statement2->bindParam(":specialize_subject_2", $specialize_subject_2, PDO::PARAM_STR);
     $statement2->bindParam(":skills_2", $skills_2, PDO::PARAM_STR);
     $statement2->bindParam(":job_s_date", $job_s_date, PDO::PARAM_STR);
     $statement2->bindParam(":job_e_date", $job_e_date, PDO::PARAM_STR);
     $statement2->bindParam(":company_name", $company_name, PDO::PARAM_STR);
     $statement2->bindParam(":job_type_and_position", $job_type_and_position, PDO::PARAM_STR);
     $statement2->bindParam(":income", $income, PDO::PARAM_STR);
     $statement2->bindParam(":job_s_date_2", $job_s_date_2, PDO::PARAM_STR);
     $statement2->bindParam(":job_e_date_2", $job_e_date_2, PDO::PARAM_STR);
     $statement2->bindParam(":company_name_2", $company_name_2, PDO::PARAM_STR);
     $statement2->bindParam(":job_type_and_position_2", $job_type_and_position_2, PDO::PARAM_STR);
     $statement2->bindParam(":income_2", $income_2, PDO::PARAM_STR);
     $statement2->bindParam(":family_member", $family_member, PDO::PARAM_STR);
     $statement2->bindParam(":family_member_type", $family_member_type, PDO::PARAM_STR);
     $statement2->bindParam(":family_member_age", $family_member_age, PDO::PARAM_STR);
     $statement2->bindParam(":family_member_job", $family_member_job, PDO::PARAM_STR);
     $statement2->bindParam(":living", $living, PDO::PARAM_STR);
     $statement2->bindParam(":family_member_2", $family_member_2, PDO::PARAM_STR);
     $statement2->bindParam(":family_member_type_2", $family_member_type_2, PDO::PARAM_STR);
     $statement2->bindParam(":family_member_age_2", $family_member_age_2, PDO::PARAM_STR);
     $statement2->bindParam(":family_member_job_2", $family_member_job_2, PDO::PARAM_STR);
     $statement2->bindParam(":living_2", $living_2, PDO::PARAM_STR);
     $statement2->bindParam(":family_member_3", $family_member_3, PDO::PARAM_STR);
     $statement2->bindParam(":family_member_type_3", $family_member_type_3, PDO::PARAM_STR);
     $statement2->bindParam(":family_member_age_3", $family_member_age_3, PDO::PARAM_STR);
     $statement2->bindParam(":family_member_job_3", $family_member_job_3, PDO::PARAM_STR);
     $statement2->bindParam(":living_3", $living_3, PDO::PARAM_STR);
     $statement2->bindParam(":relative", $relative, PDO::PARAM_STR);
     $statement2->bindParam(":jp_family_member", $jp_family_member, PDO::PARAM_STR);
     $statement2->bindParam(":accept", $accept, PDO::PARAM_STR);

     $result = $statement2->execute();

     if ($result) {
          // echo "Data Stored";
          header("location:index.php");
     } else {
          $errors[] = "Error occurred while storing data";
     }
}

?>


<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/main.css">
<form action="datainput2.php" method="POST" enctype="multipart/form-data">
     <input type="hidden" name="id" value="<?php echo $id ?>">
     <div class="container shadow shadow">
          <b><span>学歴</span></b>
          <table class="table table-sm table-bordered border-dark">
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
                    <tr>
                         <td><input type="date" name="education_s_date" id=""></td>
                         <td><input type="date" name="education_e_date" id=""></td>
                         <td colspan="2"><input type="text" name="school_name" id=""></td>
                         <td colspan="2"><input type="text" name="specialize_subject" id=""></td>
                         <td><input type="text" name="skills" id=""></td>
                    </tr>
                    <tr>
                         <td><input type="date" name="education_s_date_2" id=""></td>
                         <td><input type="date" name="education_e_date_2" id=""></td>
                         <td colspan="2"><input type="text" name="school_name_2" id=""></td>
                         <td colspan="2"><input type="text" name="specialize_subject_2" id=""></td>
                         <td><input type="text" name="skills_2" id=""></td>
                    </tr>
                    <tr>
                         <td></td>
                         <td></td>
                         <td colspan="2"></td>
                         <td colspan="2"></td>
                         <td></td>
                    </tr>
               </tbody>
          </table>

          <b><span>職歴</span></b>
          <table class="table table-sm table-bordered border-dark">
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
                    <tr>
                         <td><input type="date" name="job_s_date" id=""></td>
                         <td><input type="date" name="job_e_date" id=""></td>
                         <td colspan="2"><input type="text" name="company_name" id=""></td>
                         <td colspan="2"><input type="text" name="job_type_and_position" id=""></td>
                         <td><input type="number" name="income" id="" max="10,000,000" min="10" style="width: 50px;">
                         </td>
                    </tr>
                    <tr>
                         <td><input type="date" name="job_s_date_2" id=""></td>
                         <td><input type="date" name="job_e_date_2" id=""></td>
                         <td colspan="2"><input type="text" name="company_name_2" id=""></td>
                         <td colspan="2"><input type="text" name="job_type_and_position_2" id=""></td>
                         <td><input type="number" name="income_2" id="" max="10,000,000" min="10" style="width: 50px;">
                         </td>
                    </tr>
               </tbody>
          </table>
          <span><b>家族</b></span>

          <table class="table table-sm table-bordered border-dark">
               <thead>
                    <tr>
                         <td colspan="2">家族氏名</td>
                         <td>続柄</td>
                         <td>年齢</td>
                         <td>職業</td>
                         <td>同居</td>
                         <td>別居</td>
                    </tr>

               </thead>
               <tbody>
                    <tr>
                         <td colspan="2"><input type="text" name="family_member" id=""></td>
                         <td><input type="text" name="family_member_type" id=""></td>
                         <td><input type="number" name="family_member_age" min="1" max="90" id=""></td>
                         <td><input type="text" name="family_member_job" id=""></td>

                         <td>
                              <input type="radio" name="rdostay" id="live_radio" value="living"
                                   onclick="handleRadioSelection(this)">
                         </td>
                         <td>
                              <input type="radio" name="rdostay" id="stay_apart_radio" value="stay_apart"
                                   onclick="handleRadioSelection(this)">
                         </td>
                    </tr>
                    <tr>
                         <td colspan="2"><input type="text" name="family_member_2" id=""></td>
                         <td><input type="text" name="family_member_type_2" id=""></td>
                         <td><input type="number" name="family_member_age_2" min="1" max="90" id=""></td>
                         <td><input type="text" name="family_member_job_2" id=""></td>

                         <td>
                              <input type="radio" name="rdostay_2" id="live_radio_2" value="living"
                                   onclick="handleRadioSelection(this)">
                         </td>
                         <td>
                              <input type="radio" name="rdostay_2" id="stay_apart_radio_2" value="stay_apart"
                                   onclick="handleRadioSelection(this)">
                         </td>


                    </tr>
                    <tr>
                         <td colspan="2"><input type="text" name="family_member_3" id=""></td>
                         <td><input type="text" name="family_member_type_3" id=""></td>
                         <td><input type="number" name="family_member_age_3" min="1" max="90" id=""></td>
                         <td><input type="text" name="family_member_job_3" id=""></td>
                         <td>
                              <input type="radio" name="rdostay_3" id="live_radio_3" value="living"
                                   onclick="handleRadioSelection(this)">
                         </td>
                         <td>
                              <input type="radio" name="rdostay_3" id="stay_apart_radio_3" value="stay_apart"
                                   onclick="handleRadioSelection(this)">
                         </td>
                    </tr>
                    <tr>
                         <td colspan="2">在日親戚？</td>
                         <td colspan="2">
                              <div class="d-flex justify-content-evenly pt-4">
                                   <div>
                                        <label for="yes">有</label>
                                        <input type="radio" name="rdorelative" value="有" style="width:10px;">
                                   </div>
                                   <div>
                                        <label for="no">無し</label>
                                        <input type="radio" name="rdorelative" value="無し" style="width:10px;">
                                   </div>
                              </div>
                         </td>
                         <td colspan="2">有るばい、誰？</td>
                         <td><input type="text" name="jp_family_member" id=""></td>
                    </tr>
                    <tr>
                         <td colspan="4">日本へ行くことに家族は？</td>
                         <td colspan="3">
                              <div class="d-flex justify-content-evenly pt-4">
                                   <div>
                                        <label for="yes">賛成</label>
                                        <input type="radio" name="rdoaccept" value="賛成" style="width:10px;">
                                   </div>
                                   <div>
                                        <label for="no">反対</label>
                                        <input type="radio" name="rdoaccept" value="反対" style="width:10px;">
                                   </div>
                              </div>
                         </td>
                    </tr>
               </tbody>
          </table>
          <input type="submit" value="Submit" name="submit" class="btn btn-info">
     </div>
</form>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script>
function handleRadioSelection(radio) {
     var liveRadio = document.getElementById("live_radio");
     var stayApartRadio = document.getElementById("stay_apart_radio");

     if (radio.value === "living") {
          stayApartRadio.checked = false;
     } else if (radio.value === "stay_apart") {
          liveRadio.checked = false;
     }
}

function handleRadioSelection(radio) {
     var liveRadio_2 = document.getElementById("live_radio_2");
     var stayApartRadio_2 = document.getElementById("stay_apart_radio_3");

     if (radio.value === "living") {
          stayApartRadio_2.checked = false;
     } else if (radio.value === "stay_apart") {
          liveRadio_2.checked = false;
     }
}

function handleRadioSelection(radio) {
     var liveRadio_3 = document.getElementById("live_radio");
     var stayApartRadio_3 = document.getElementById("stay_apart_radio");

     if (radio.value === "living") {
          stayApartRadio_3.checked = false;
     } else if (radio.value === "stay_apart") {
          liveRadio_3.checked = false;
     }
}
</script>
<!-- <script type="text/javascript">
     $(document).ready(function() {
          $(".district").change(function() {
               var district_id = $(this).val();

               $.ajax({
                    url: "input.php",
                    method: "POST",
                    data: {
                         district_id: district_id
                    },
                    success: function(data) {
                         $(".state").html(data);
                    }
               });
          });

     });
</script> -->
<!-- <script>
     /* if img click input file will be upload */
     img.onclick = () => file.click()
     file.addEventListener('change', function() {
          /* to get file  */
          let f = file.files[0]
          /* use url object for to get file url */
          img.src = URL.createObjectURL(f)
          console.log(f)
     })
</script> -->