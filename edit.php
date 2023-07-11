<?php
require "server/db.php";

$errors = [];
if (isset($_GET['id'])) {

     $id = $_GET['id'];
}

$sql = "SELECT * FROM student WHERE student_id = :student_id";
$statement = $pdo->prepare($sql);
$statement->bindParam(":student_id", $id, PDO::PARAM_STR);
$statement->execute();

$result = $statement->fetchAll(PDO::FETCH_ASSOC);
// echo "<pre>";
// print_r($result);
// echo "</pre>";

// die();
?>

<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/main.css">


<form action="edit.php" method="POST" enctype="multipart/form-data">
     <div class="container shadow shadow table-primary">
          <table class="table table-sm table-bordered border-dark">
               <img src="logo.png" class="rounded mx-auto d-block w-100">

               <?php
               foreach ($result as $key => $value) { ?>
                    <tr>
                         <th scope="col" colspan="6" class="topic"><b><span>
                                        <center>履歴書</center>
                                   </span></b></th>
                         <td rowspan="3" class="student_photo"><img src="img/<?= $value['photo'] ?>" alt="" id="img" width="150px" height="150px">

                              <input class="file" type="file" name="photo" id="file">
                         </td>
                    </tr>
                    <tr>

                         <td><b>ID</b></td>
                         <td colspan="5"><input type="text" value="<?= $value['student_id'] ?? "" ?>"></td>
                    </tr>
                    <tr>

                         <td colspan="7"><b>Own Info</b></td>

                    </tr>
                    <tr>
                         <td colspan="2" for="student_name">အမည်</td>
                         <td colspan="3"><input type="text" value="<?= $value['name'] ?? "" ?>"></td>
                         <td rowspan="2"><span>လိင်အမျိူးအစား</span></td>
                         <td rowspan="2">
                              <?php

                              ?>
                              <input type="radio" value="<?= $value['gender'] ?? "" ?>">
                         </td>
                    </tr>
                    <tr>
                         <td colspan="2">ဂျပန်ခနလိုပေါင်းခြင်း</td>
                         <td colspan="3"><input type="text" value="<?= $value['kana_name'] ?? "" ?>"></td>
                    </tr>
                    <tr>
                         <td colspan="2">မွေးသကရစ်</td>
                         <td colspan="2"><input type="date" value="<?= $value['dob'] ?? "" ?>" id=""></td>
                         <td colspan="2">အသက်</td>
                         <td><input type="number" value="<?= $value['age'] ?? "" ?>" id="">နှစ်</td>
                    </tr>
                    <tr>
                         <td colspan="2">နိုင်ငံ</td>
                         <td colspan="2"><input type="text" value="<?= $value['country'] ?? "" ?>" id=""></td>
                         <td colspan="2">ကိုးကွယ်သည့်ဘာသာ</td>
                         <td><input type="text" value="<?= $value['religion'] ?? "" ?>" id=""></td>
                    </tr>


                    <tr style="width: 250px;">
                         <td colspan="2">နိုင်ငံသားစီစစ်ရေးကဒ်နံပါတ်</td>
                         <td colspan="2" style="width: 250px;">

                              <?php
                              $nrc = "SELECT * FROM nrc n WHERE n.nrc_id = " . $value['nrc_id'];

                              $statement = $pdo->prepare($nrc);
                              $statement->execute();

                              $result = $statement->fetch();
                              print_r($result['state_id']);
                              print_r($result['nrc_type']);
                              print_r($result['nrc_no']);

                              $nrc2 = "SELECT * FROM state s, nrc n WHERE s.nrc_id =" . $value['nrc_id'];
                              $st = $pdo->prepare($nrc2);
                              $st->execute();
                              $res = $st->fetch();
                              print_r($res['state_name']);
                              die();

                              ?>
                              <input type="text" value="<?= $result['state_id'] ?? "" ?>">
                              <input type="text" value="<?= $result['nrc_type'] ?? "" ?>">
                              <input type="text" value="<?= $result['nrc_no'] ?? "" ?>">

                         </td>
                         <td colspan="2">Passport no.</td>
                         <td><input type="text" value="<?= $value['passport'] ?? "" ?>" id=""></td>
                    </tr>
                    <tr>
                         <td colspan="2">ဆက်သွယ်ရမည့်လိပ်စာ</td>
                         <td colspan="5"><textarea name="address"><?= $value['address'] ?? "" ?></textarea>

                         </td>
                    </tr>
                    <tr>
                         <td colspan="2">အမြဲတမ်းနေရပ်လိပ်စာ</td>
                         <td colspan="5"><textarea name="per_address"><?= $value['per_address'] ?? "" ?></textarea></td>

                    </tr>
                    <tr>
                         <td colspan="2">TEL</td>
                         <td colspan="5"><input type="number" name="tel" value="<?= $value['tel'] ?? "" ?>"></td>
                    </tr>
                    <tr>
                         <td colspan="2">သင်တန်းစတက်သည့်နေ့</td>
                         <td colspan="5"><input type="date" name="start_date" value="<?= $value['start_date'] ?? "" ?>"></td>
                    </tr>
                    <tr>
                         <td colspan="2">ဂျပန်စာအရည်အချင်းအဆင့်</td>

                         <td colspan="5"><input type="date" name="jp_lan_skill" value="<?= $value['jp_lan_skill'] ?? "" ?>">
                         </td>

                    </tr>
                    <tr>
                         <td colspan="2">အရပ်အမြင့်</td>
                         <td colspan="2"><input type="number" name="height" value="<?= $value['height'] ?>">cm
                         </td>
                         <td colspan="2">ကိုယ်အလေးချိန်</td>
                         <td><input type="number" name="weight" value="<?= $value['weight'] ?>">Kg</td>
                    </tr>
                    <tr>
                         <td colspan="2">အိမ်ထောင်ရေး</td>


                         <td colspan="2">
                              <?= $value['marriage'] ?>
                         </td>
                         <td colspan="2">သွေးအုပ်စု</td>
                         <td><?= $value['blood_type'] ?></td>
                    </tr>
                    <tr>
                         <td colspan="2">အမြင်အာရုံ</td>
                         <td colspan="2"><?= $value['eye_test'] ?></td>
                         <td colspan="2">color blind</td>
                         <td>
                              <?= $value['color_blind'] ?>
                         </td>
                    </tr>
                    <tr>
                         <td colspan="2">သန်သည့်လက်</td>
                         <td colspan="2">
                              <?= $value['hand'] ?>
                         </td>
                         <td colspan="2">ဟင်းချက်တတ်ခြင်း</td>
                         <td>
                              <?= $value['cook'] ?>
                         </td>
                    </tr>
                    <tr>
                         <td colspan="2">ဖြစ်ခဲ့ဖူးသည့်ရောဂါ</td>
                         <td colspan="2">
                              <?= $value['disease'] ?>
                         </td>
                         <td colspan="2">တက်တူးရှိလား</td>
                         <td>
                              <?= $value['tattoo'] ?>
                         </td>
                    </tr>
                    <tr>
                         <td colspan="2">ဆေးလိပ်သောက်တတ်လား</td>
                         <td colspan="2">
                              <?= $value['smoke'] ?>
                         </td>
                         <td colspan="2">အရက်သောက်တတ်လား</td>
                         <td>
                              <?= $value['drunk'] ?>
                         </td>
                    </tr>
                    <tr>
                         <td colspan="2">ကျွမ်းကျင်သည့်ဘာသာစကား</td>
                         <td colspan=" 5"><?= $value['languages'] ?></td>
                    </tr>
                    <tr>
                         <td colspan="2">ရရှိထားသည့်လက်မှတ်များ</td>
                         <td colspan=" 5"><?= $value['certificate'] ?></td>
                    </tr>
                    <tr>
                         <td colspan="2">ရည်မှန်းချက်</td>
                         <td colspan=" 5"><?= $value['objective'] ?></td>
                    </tr>
                    <tr>
                         <td colspan="2">အဖွဲ့လိုက်လုပ်ဆောင်မှု</td>
                         <td colspan="2">
                              <?= $value['teamwork'] ?>
                         </td>
                         <td colspan="2">မိသားစုဝင်ငွေ</td>
                         <td><?= $value['family_income'] ?>ကျပ်
                         </td>
                    </tr>
                    <tr>
                         <td colspan="4">ဂျပန်သို့သွားရောက်လုပ်ကိုင်လိုသည့်အလုပ်အမျိူးအစား၊ဗီဇာအမျိူးအစား</td>
                         <td colspan="3"><?= $value['type_of_visa'] ?></td>
                    </tr>
                    <tr>
                         <td colspan="4">သုံးနှစ်အတွင်းစုဆောင်းရန် စီစဉ်ထားသောပိုက်ဆံ</td>
                         <td colspan="3">
                              <?= $value['planning_money'] ?>သောင်း </td>
                    </tr>
                    <tr>
                         <td colspan="4">မြန်မာနိုင်ငံပြန်လာပြီးလုပ်မည့်အလုပ်</td>
                         <td colspan="3"><?= $value['myanmar_job'] ?></td>
                    </tr>
                    <tr>
                         <td colspan="4">ဂျပန်သို့သွားရောက်ရန်လျှောက်ထားခြင်းရှိ/မရှိ</td>
                         <td colspan="3">
                              <?= $value['form'] ?>
                         </td>
                    </tr>
                    <tr>
                         <td colspan="4">လျှောက်ထားဖူးခြင်းရှိပါက မည်သို့သောဗီဇာအမျိူးအစားဖြစ်ပါသလဲ?</td>
                         <td colspan="3"><?= $value['old_visa'] ?></td>
                    </tr>

               <?php } ?>
          </table>

     </div>

     <div class="container shadow shadow">
          <b><span>ပညာရေးသမိုင်း</span></b>
          <table class="table table-sm table-bordered border-dark">
               <?php


               $sql = "SELECT * FROM associated WHERE student_id = :student_id";
               $statement = $pdo->prepare($sql);
               $statement->bindParam(":student_id", $id, PDO::PARAM_STR);
               $statement->execute();

               $result = $statement->fetchAll(PDO::FETCH_ASSOC);

               foreach ($result as $key => $value) { ?>
                    <thead>
                         <tr>
                              <td>စတင်သည့်ခုနှစ်</td>
                              <td>ပြီးသည့်ခုနှစ်</td>
                              <td colspan="2">ကျောင်းအမည်</td>
                              <td colspan="2">အထူးပြုဘာသာရပ်</td>
                              <td>အရည်အချင်း</td>
                         </tr>

                    </thead>
                    <tbody>
                         <tr>
                              <td><?= $value['education_s_date'] ?></td>
                              <td><?= $value['education_e_date'] ?></td>
                              <td colspan="2"><?= $value['school_name'] ?></td>
                              <td colspan="2"><?= $value['specialize_subject'] ?></td>
                              <td><?= $value['skills'] ?></td>
                         </tr>
                         <tr>
                              <td><?= $value['education_s_date_2'] ?></td>
                              <td><?= $value['education_e_date_2'] ?></td>
                              <td colspan="2"><?= $value['school_name_2'] ?></td>
                              <td colspan="2"><?= $value['specialize_subject_2'] ?></td>
                              <td><?= $value['skills_2'] ?></td>
                         </tr>
                         <tr>
                              <td></td>
                              <td></td>
                              <td colspan="2"></td>
                              <td colspan="2"></td>
                              <td></td>
                         </tr>
                    </tbody>
               <?php
               }
               ?>
          </table>

          <b><span>အလုပ်အတွေ့အကြုံ</span></b>
          <table class="table table-sm table-bordered border-dark">
               <thead>
                    <tr>
                         <td>စတင်သည့်ခုနှစ်</td>
                         <td>ပြီးသည့်ခုနှစ်</td>
                         <td colspan="2">companyအမည်</td>
                         <td colspan="2">အလုပ်အမျိူးအစားနှင့်ရာထူး</td>
                         <td>လစာ</td>
                    </tr>

               </thead>
               <tbody>
                    <tr>
                         <td><?= $value['job_s_date'] ?></td>
                         <td><?= $value['job_e_date'] ?></td>
                         <td colspan="2"><?= $value['company_name'] ?></td>
                         <td colspan="2"><?= $value['job_type_and_position'] ?></td>
                         <td><?= $value['income'] ?>
                         </td>
                    </tr>
                    <tr>
                         <td><?= $value['job_s_date_2'] ?></td>
                         <td><?= $value['job_e_date_2'] ?></td>
                         <td colspan="2"><?= $value['company_name_2'] ?></td>
                         <td colspan="2"><?= $value['job_type_and_position_2'] ?></td>
                         <td><?= $value['income_2'] ?>
                         </td>
                    </tr>
               </tbody>
          </table>
          <b><span>မိသားစုဝင်အချက်အလက်</span></b>

          <table class="table table-sm table-bordered border-dark">
               <thead>
                    <tr>
                         <td colspan="2">မိသားစုဝင်နာမည်</td>
                         <td>တော်စပ်ပုံ</td>
                         <td>အသက်</td>
                         <td>အလုပ်အကိုင်</td>
                         <td>အတူနေ</td>
                         <td>ခွဲနေ</td>
                    </tr>

               </thead>
               <tbody>
                    <tr>
                         <td colspan="2"><?= $value['family_member'] ?></td>
                         <td><?= $value['family_member_type'] ?></td>
                         <td><?= $value['family_member_age'] ?></td>
                         <td><?= $value['family_member_job'] ?></td>
                         <td><?= $value['living'] ?>
                         </td>
                         <td>
                         </td>
                    </tr>
                    <tr>
                         <td colspan="2"><?= $value['family_member_2'] ?></td>
                         <td><?= $value['family_member_type_2'] ?></td>
                         <td><?= $value['family_member_age_2'] ?></td>
                         <td><?= $value['family_member_job_2'] ?></td>
                         <td><?= $value['living_2'] ?>
                         </td>
                         <td>
                         </td>
                    </tr>
                    <tr>
                         <td colspan="2"><?= $value['family_member_3'] ?></td>
                         <td><?= $value['family_member_type_3'] ?></td>
                         <td><?= $value['family_member_age_3'] ?></td>
                         <td><?= $value['family_member_job_3'] ?></td>
                         <td><?= $value['living_3'] ?>
                         </td>
                         <td>
                         </td>
                    </tr>
                    <tr>
                         <td colspan="2">ဂျပန်မှာဆွေမျိူးရှိသလား</td>
                         <td colspan="2">
                              <?= $value['relative'] ?>
                         </td>
                         <td colspan="2">ရှိပါက တော်စပ်ပုံ</td>
                         <td><?= $value['jp_family_member'] ?></td>
                    </tr>
                    <tr>
                         <td colspan="4">ဂျပန်သို့သွားရောက်ရန် မိသားစုသဘောထား</td>
                         <td colspan="3">
                              <?= $value['accept'] ?>
                         </td>
                    </tr>
               </tbody>
          </table>


     </div>
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
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
</script>
<script>
     /* if img click input file will be upload */
     img.onclick = () => file.click()
     file.addEventListener('change', function() {
          /* to get file  */
          let f = file.files[0]
          /* use url object for to get file url */
          img.src = URL.createObjectURL(f)
          console.log(f)
     })
</script>