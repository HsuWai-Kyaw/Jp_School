<?php
require "server/db.php";
require "header.php";

$errors = [];

if ($_SERVER['REQUEST_METHOD'] == "POST") {
     if (isset($_POST['submit'])) {
          // $id = $_POST['id'];
          $student_id = $_POST['student_id'];
          $photo = $_FILES['photo'];
          $pname = $_FILES['photo']['name'];
          $tmp_name = $_FILES['photo']['tmp_name'];
          move_uploaded_file($tmp_name, "img/$pname");
          $name = $_POST['student_name'];
          $kana_name = $_POST['kana_name'];
          $gender = $_POST['rdogender'];
          $dob = $_POST['dob'];

          $age = $_POST['age'];
          $country = $_POST['country'];
          $religion = $_POST['religion'];
          $district_id = $_POST['district_id'];
          $passport = $_POST['passport'];
          $address = $_POST['address'];
          $per_address = $_POST['per_address'];
          $tel = $_POST['tel'];
          $start_date = $_POST['start_date'];
          $jp_lan_skill = $_POST['jp_lan_skill'];
          $height = $_POST['height'];
          $weight = $_POST['weight'];
          $marriage = $_POST['rdomarriage'];
          $blood_type = $_POST['blood_type'];
          $eye_test = $_POST['eye_test'];
          $color_blind = $_POST['rdocolorblind'];
          $hand = $_POST['rdohand'];
          $cook = $_POST['rdocook'];
          $disease = $_POST['rdodisease'];
          $tattoo = $_POST['rdotattoo'];
          $smoke = $_POST['rdosmoke'];
          $drunk = $_POST['rdodrunk'];
          $languages = $_POST['languages'];
          $certificate = $_POST['certificate'];
          $objective = $_POST['objective'];
          $teamwork = $_POST['rdoteamwork'];
          $family_income = $_POST['family_income'];
          $type_of_visa = $_POST['type_of_visa'];
          $planning_money = $_POST['planning_money'];
          $myanmar_job = $_POST['myanmar_job'];
          $form = $_POST['rdoform'];
          $old_visa = $_POST['old_visa'];

          // Insert into the "state" table
          $state_name = $_POST['state_name'];
          $query = "INSERT INTO state (state_name, district_id) VALUES (:state_name, :district_id)";
          $stmt = $pdo->prepare($query);
          $stmt->bindValue(':state_name', $state_name);
          $stmt->bindValue(':district_id', $district_id);
          $stmt->execute();

          // Retrieve the last inserted ID for state_id
          $state_id = $pdo->lastInsertId();

          if (isset($_POST['district_id'])) {
               $nrc_type = $_POST['nrc_type'];
               $nrc_no = $_POST['nrc_no'];

               $sql = "INSERT INTO `nrc`(`nrc_type`, `state_id`, `nrc_no`) VALUES (:nrc_type, :state_id, :nrc_no)";
               $statement = $pdo->prepare($sql);
               $statement->bindParam(":nrc_type", $nrc_type, PDO::PARAM_STR);
               $statement->bindParam(":state_id", $state_id, PDO::PARAM_STR);
               $statement->bindParam(":nrc_no", $nrc_no, PDO::PARAM_STR);

               $res = $statement->execute();
          }

          // Retrieve the last inserted ID for nrc_id
          $nrc_id = $pdo->lastInsertId();

          $sql = "INSERT INTO `student`(`student_id`, `photo`, `name`, `kana_name`, `gender`, `dob`, `age`, `country`, `religion`, `nrc_id`, `passport`, `address`, `per_address`, `tel`, `start_date`, `jp_lan_skill`, `height`, `weight`, `marriage`, `blood_type`, `eye_test`, `color_blind`, `hand`, `cook`, `disease`, `tattoo`, `smoke`, `drunk`, `languages`, `certificate`, `objective`, `teamwork`, `family_income`, `type_of_visa`, `planning_money`, `myanmar_job`, `form`, `old_visa`)
          VALUES (:student_id, :photo, :student_name, :kana_name, :gender, :dob, :age, :country, :religion, :nrc_id, :passport, :address, :per_address, :tel, :start_date, :jp_lan_skill, :height, :weight, :marriage, :blood_type, :eye_test, :color_blind, :hand, :cook, :disease, :tattoo, :smoke, :drunk, :languages, :certificate, :objective, :teamwork, :family_income, :type_of_visa, :planning_money, :myanmar_job, :form, :old_visa)";

          $statement = $pdo->prepare($sql);

          $statement->bindParam(":student_id", $student_id, PDO::PARAM_STR);
          $statement->bindParam(":photo", $pname, PDO::PARAM_STR);
          $statement->bindParam(":student_name", $name, PDO::PARAM_STR);
          $statement->bindParam(":kana_name", $kana_name, PDO::PARAM_STR);
          $statement->bindParam(":gender", $gender, PDO::PARAM_STR);
          $statement->bindParam(":dob", $dob, PDO::PARAM_STR);
          $statement->bindParam(":age", $age, PDO::PARAM_STR);
          $statement->bindParam(":country", $country, PDO::PARAM_STR);
          $statement->bindParam(":religion", $religion, PDO::PARAM_STR);
          $statement->bindParam(":nrc_id", $nrc_id, PDO::PARAM_STR);
          $statement->bindParam(":passport", $passport, PDO::PARAM_STR);
          $statement->bindParam(":address", $address, PDO::PARAM_STR);
          $statement->bindParam(":per_address", $per_address, PDO::PARAM_STR);
          $statement->bindParam(":tel", $tel, PDO::PARAM_STR);
          $statement->bindParam(":start_date", $start_date, PDO::PARAM_STR);
          $statement->bindParam(":jp_lan_skill", $jp_lan_skill, PDO::PARAM_STR);
          $statement->bindParam(":height", $height, PDO::PARAM_STR);
          $statement->bindParam(":weight", $weight, PDO::PARAM_STR);
          $statement->bindParam(":marriage", $marriage, PDO::PARAM_STR);
          $statement->bindParam(":blood_type", $blood_type, PDO::PARAM_STR);
          $statement->bindParam(":eye_test", $eye_test, PDO::PARAM_STR);
          $statement->bindParam(":color_blind", $color_blind, PDO::PARAM_STR);
          $statement->bindParam(":hand", $hand, PDO::PARAM_STR);
          $statement->bindParam(":cook", $cook, PDO::PARAM_STR);
          $statement->bindParam(":disease", $disease, PDO::PARAM_STR);
          $statement->bindParam(":tattoo", $tattoo, PDO::PARAM_STR);
          $statement->bindParam(":smoke", $smoke, PDO::PARAM_STR);
          $statement->bindParam(":drunk", $drunk, PDO::PARAM_STR);
          $statement->bindParam(":languages", $languages, PDO::PARAM_STR);
          $statement->bindParam(":certificate", $certificate, PDO::PARAM_STR);
          $statement->bindParam(":objective", $objective, PDO::PARAM_STR);
          $statement->bindParam(":teamwork", $teamwork, PDO::PARAM_STR);
          $statement->bindParam(":family_income", $family_income, PDO::PARAM_STR);
          $statement->bindParam(":type_of_visa", $type_of_visa, PDO::PARAM_STR);
          $statement->bindParam(":planning_money", $planning_money, PDO::PARAM_STR);
          $statement->bindParam(":myanmar_job", $myanmar_job, PDO::PARAM_STR);
          $statement->bindParam(":form", $form, PDO::PARAM_STR);
          $statement->bindParam(":old_visa", $old_visa, PDO::PARAM_STR);

          $res = $statement->execute();

          if ($res) {
               // echo "Data Stored";
               header("location:datainput2.php?id=$student_id");
          } else {
               $errors[] = "Error occurred while storing data";
          }
     }
}
?>

<form action="datainput.php" method="POST" enctype="multipart/form-data">
     <div class="container shadow shadow">
          <table class="table table-sm table-bordered border-dark">
               <img src="logo.png" class="rounded mx-auto d-block w-100">

               <tr>
                    <th scope="col" colspan="6" class="topic"><b><span class="ft-1">
                                   <center>
                                        <h1>履歴書</h1>
                                   </center>
                              </span></b></th>
                    <td rowspan="3" class="student_photo"><img src="empty.jpg" alt="" id="img" class="w-[4000px]">
                         <input class="file" type="file" name="photo" id="file">
                    </td>
               </tr>
               <tr>

                    <td><b>
                              <h2>ID</h2>
                         </b></td>
                    <td colspan="5"><input type="text" name="student_id" id=""></td>
               </tr>
               <tr>

                    <td colspan="7"><b>
                              <h2>基本情報</h2>
                         </b></td>

               </tr>
               <tr>
                    <td colspan="2" for="student_name">名前</td>
                    <td colspan="3"><input type="text" name="student_name" id=""></td>
                    <td rowspan="2"><span>性別</span></td>
                    <td rowspan="2">
                         <div class="d-flex justify-content-evenly pt-4">
                              <div>
                                   <label for="male">男</label>
                                   <input type="radio" name="rdogender" id="male" value="男" style="width:20px;">
                              </div>
                              <div>
                                   <label for="female">女</label>
                                   <input type="radio" name="rdogender" id="female" value="女" style="width:20px;">
                              </div>
                         </div>

                    </td>
               </tr>
               <tr>
                    <td colspan="2">ふりがな</td>
                    <td colspan="3"><input type="text" name="kana_name" id=""></td>
               </tr>
               <tr>
                    <td colspan="2">生年月日</td>
                    <td colspan="2"><input type="date" name="dob" id=""></td>
                    <td colspan="2">年齢</td>
                    <td>(<input type="number" name="age" id="" style="width: 40px;" min="16" max="70">)歳</td>
               </tr>
               <tr>
                    <td colspan="2">国籍</td>
                    <td colspan="2"><input type="text" name="country" id=""></td>
                    <td colspan="2">信仰</td>
                    <td><input type="text" name="religion" id=""></td>
               </tr>


               <tr style="width: 250px;">
                    <td colspan="2">身分証明書</td>
                    <td colspan="2" style="width: 250px;">
                         <div class="d-flex">
                              <select name="district_id" class="district w-25">
                                   <option selected disabled>./</option>

                                   <?php
                                   $sql = "SELECT * FROM district";
                                   $statement = $pdo->prepare($sql);
                                   $statement->execute();
                                   $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                                   foreach ($result as $key => $value) {
                                        echo '<option value="' . $value['district_id'] . '">' . $value['district'] . '</option>';
                                   }
                                   ?>
                              </select>
                              <select name="state_name" class="state w-50" id="">
                                   <option selected disabled>state</option>
                                   <?php

                                   require "input.php";
                                   ?>
                              </select>

                              <select name="nrc_type" id="">
                                   <option value="(N)">(N)</option>
                              </select>
                              <input type="text" name="nrc_no" id="" placeholder="number">
                         </div>

                    </td>
                    <td colspan="2">パスポート番号</td>
                    <td><input type="text" name="passport" id=""></td>
               </tr>
               <tr>
                    <td colspan="2">連絡先</td>
                    <td colspan="5"><textarea name="address" id="" cols="120" rows="3"></textarea></td>
               </tr>
               <tr>
                    <td colspan="2">住所</td>
                    <td colspan="5"><textarea name="per_address" id="" cols="120" rows="3"></textarea></td>

               </tr>
               <tr>
                    <td colspan="2">電話番号</td>
                    <td colspan="5"><input type="tel" name="tel" id=""></td>
               </tr>
               <tr>
                    <td colspan="2">入学日</td>
                    <td colspan="5"><input type="date" name="start_date"></td>
               </tr>
               <tr>
                    <td colspan="2">日本語能力</td>

                    <td colspan="5"><input type="text" name="jp_lan_skill" id=""></td>

               </tr>
               <tr>
                    <td colspan="2">身長(センチ)</td>
                    <td colspan="2">(<input type="number" name="height" id="" min="" max="" style="width: 40px;">)センチ
                    </td>
                    <td colspan="2">体重(キロ)</td>
                    <td>(<input type="number" name="weight" min="20" max="" id="" style="width: 40px;">)キロ</td>
               </tr>
               <tr>
                    <td colspan="2">婚姻</td>
                    <td colspan="2">

                         <div class="d-flex justify-content-evenly pt-4">
                              <div>
                                   <label for="yes">有</label>
                                   <input type="radio" name="rdomarriage" id="yes" value="有" style="width:20px;">
                              </div>
                              <div>
                                   <label for="no">無し</label>
                                   <input type="radio" name="rdomarriage" id="no" value="無し" style="width:20px;">
                              </div>
                         </div>
                    </td>
                    <td colspan="2">血液</td>
                    <td><input type="text" name="blood_type" id=""></td>
               </tr>
               <tr>
                    <td colspan="2">視力</td>
                    <td colspan="2"><input type="text" name="eye_test" id=""></td>
                    <td colspan="2">色覚異常</td>
                    <td>

                         <div class="d-flex justify-content-evenly pt-4">
                              <div>
                                   <label for="yes">有</label>
                                   <input type="radio" name="rdocolorblind" id="yes" value="有" style="width:20px;">
                              </div>
                              <div>
                                   <label for="no">無し</label>
                                   <input type="radio" name="rdocolorblind" id="no" value="無し" style="width:20px;">
                              </div>
                         </div>
                    </td>
               </tr>
               <tr>
                    <td colspan="2">利き手</td>
                    <td colspan="2">
                         <div class="d-flex justify-content-evenly pt-4">
                              <div>
                                   <label for="left">右</label>
                                   <input type="radio" name="rdohand" id="left" value="右" style="width:20px;">
                              </div>
                              <div>
                                   <label for="right">左</label>
                                   <input type="radio" name="rdohand" id="right" value="左" style="width:20px;">
                              </div>
                         </div>

                    </td>
                    <td colspan="2">料理</td>
                    <td>
                         <div class="d-flex justify-content-evenly pt-4">
                              <div>
                                   <label for="yes">有</label>
                                   <input type="radio" name="rdocook" value="有" style="width:20px;">
                              </div>
                              <div>
                                   <label for="no">無し</label>
                                   <input type="radio" name="rdocook" value="無し" style="width:20px;">
                              </div>
                         </div>
                    </td>
               </tr>
               <tr>
                    <td colspan="2">病歴</td>
                    <td colspan="2">
                         <div class="d-flex justify-content-evenly pt-4">
                              <div>
                                   <label for="yes">有</label>
                                   <input type="radio" name="rdodisease" value="有" style="width:20px;">
                              </div>
                              <div>
                                   <label for="no">無し</label>
                                   <input type="radio" name="rdodisease" value="無し" style="width:20px;">
                              </div>
                         </div>
                    </td>
                    <td colspan="2">肌上入れ墨.手術</td>
                    <td>
                         <div class="d-flex justify-content-evenly pt-4">
                              <div>
                                   <label for="yes">有</label>
                                   <input type="radio" name="rdotattoo" value="有" style="width:20px;">
                              </div>
                              <div>
                                   <label for="no">無し</label>
                                   <input type="radio" name="rdotattoo" value="無し" style="width:20px;">
                              </div>
                         </div>
                    </td>
               </tr>
               <tr>
                    <td colspan="2">タバコを吸っているか？</td>
                    <td colspan="2">
                         <div class="d-flex justify-content-evenly pt-4">
                              <div>
                                   <label for="yes">有</label>
                                   <input type="radio" name="rdosmoke" value="有" style="width:20px;">
                              </div>
                              <div>
                                   <label for="no">無し</label>
                                   <input type="radio" name="rdosmoke" value="無し" style="width:20px;">
                              </div>
                         </div>
                    </td>
                    <td colspan="2">お酒を飲んでいるか？</td>
                    <td>
                         <div class="d-flex justify-content-evenly pt-4">
                              <div>
                                   <label for="yes">有</label>
                                   <input type="radio" name="rdodrunk" value="有" style="width:20px;">
                              </div>
                              <div>
                                   <label for="no">無し</label>
                                   <input type="radio" name="rdodrunk" value="無し" style="width:20px;">
                              </div>
                         </div>
                    </td>
               </tr>
               <tr>
                    <td colspan="2">得意科目</td>
                    <td colspan=" 5"><input type="text" name="languages" id=""></td>
               </tr>
               <tr>
                    <td colspan="2">受け取った証明書</td>
                    <td colspan=" 5"><input type="text" name="certificate" id=""></td>
               </tr>
               <tr>
                    <td colspan="2">志望動機</td>
                    <td colspan=" 5"><input type="text" name="objective" id=""></td>
               </tr>
               <tr>
                    <td colspan="2">集団生活経験</td>
                    <td colspan="2">
                         <div class="d-flex justify-content-evenly pt-4">
                              <div>
                                   <label for="yes">有</label>
                                   <input type="radio" name="rdoteamwork" value="有" style="width:20px;">
                              </div>
                              <div>
                                   <label for="no">無し</label>
                                   <input type="radio" name="rdoteamwork" value="無し" style="width:20px;">
                              </div>
                         </div>
                    </td>
                    <td colspan="2">家族の月収</td>
                    <td><input type="number" name="family_income" min="" max="" id="" style="width: 40px;">チャット
                    </td>
               </tr>
               <tr>
                    <td colspan="4">日本でやりたい仕事、ビザの種類</td>
                    <td colspan="3"><input type="text" name="type_of_visa" id=""></td>
               </tr>
               <tr>
                    <td colspan="4">3年間の貯蓄目標</td>
                    <td colspan="3"><input type="number" name="planning_money" id="" min="" max=""
                              style="width: 150px;">万
                    </td>
               </tr>
               <tr>
                    <td colspan="4">帰国後やりたい仕事</td>
                    <td colspan="3"><input type="text" name="myanmar_job" id=""></td>
               </tr>
               <tr>
                    <td colspan="4">日本国に在留資格申請したことあるか？</td>
                    <td colspan="3">
                         <div class="d-flex justify-content-evenly pt-4">
                              <div>
                                   <label for="yes">有</label>
                                   <input type="radio" name="rdoform" value="有" style="width:20px;">
                              </div>
                              <div>
                                   <label for="no">無し</label>
                                   <input type="radio" name="rdoform" value="無し" style="width:20px;">
                              </div>
                         </div>
                    </td>
               </tr>
               <tr>
                    <td colspan="4">あったら、どんな資格を申請したか？</td>
                    <td colspan="3"><input type="text" name="old_visa" id=""></td>
               </tr>

          </table>
          <input type="submit" value="Submit" name="submit" class="btn btn-info">

     </div>
</form>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> -->
<script src="./js/ajax.min.js"></script>
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