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
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
// print_r($result);
// die();

?>

<form action="cv.php" method="POST" enctype="multipart/form-data">
     <div class="container shadow shadow table-primary">
          <table class="table table-sm table-bordered border-dark">
               <img src="logo.png" class="rounded mx-auto d-block w-100">

               <?php
               foreach ($result as $key => $value) { ?>
                    <tr>
                         <th scope="col" colspan="6" class="topic"><b><span>
                                        <center>
                                             <h1>履歴書</h1>
                                        </center>
                                   </span></b></th>
                         <td rowspan="3" class="student_photo"><img src="img/<?= $value['photo'] ?>" alt="" id="img" class="w-100 h-100">

                              <input class=" file" type="file" name="photo" id="file">
                         </td>
                    </tr>
                    <tr>

                         <td><b>
                                   <h2>ID</h2>
                              </b></td>
                         <td colspan="5"><?= $value['student_id'] ?></td>
                    </tr>
                    <tr>
                         <td colspan="7"><b>
                                   <h2>基本情報</h2>
                              </b></td>
                    </tr>
                    <tr>
                         <td colspan="2" for="student_name">名前</td>
                         <td colspan="3"><?= $value['name'] ?></td>
                         <td rowspan="2"><span>性別</span></td>
                         <td rowspan="2">
                              <?= $value['gender'] ?>
                         </td>
                    </tr>
                    <tr>
                         <td colspan="2">ふりがな</td>
                         <td colspan="3"><?= $value['kana_name'] ?></td>
                    </tr>
                    <tr>
                         <td colspan="2">生年月日</td>
                         <?php
                         require "./utility/function.php";
                         ?>
                         <td colspan="2"><?= $date ?></td>


                         <td colspan="2">年齢</td>
                         <td><?= $value['age'] ?>歳</td>
                    </tr>
                    <tr>
                         <td colspan="2">国籍</td>
                         <td colspan="2"><?= $value['country'] ?></td>
                         <td colspan="2">信仰</td>
                         <td><?= $value['religion'] ?></td>
                    </tr>


                    <tr style="width: 250px;">
                         <td colspan="2">身分証明書</td>
                         <td colspan="2" style="width: 250px;">
                              <?php
                              $nrc = "SELECT d.district, s.state_name, n.nrc_type, n.nrc_no
        FROM state s
        JOIN district d ON d.district_id = s.district_id
        JOIN nrc n ON n.state_id = s.state_id
        JOIN student st ON st.nrc_id = n.nrc_id
        WHERE st.nrc_id = :nrc_id";

                              $statement = $pdo->prepare($nrc);
                              $statement->bindParam(':nrc_id', $value['nrc_id'], PDO::PARAM_INT);
                              $statement->execute();

                              $result = $statement->fetch();
                              print_r($result['district']);
                              print_r($result['state_name']);
                              print_r($result['nrc_type']);
                              print_r($result['nrc_no']);
                              // die();
                              ?>

                         </td>
                         <td colspan="2">パスポート番号</td>
                         <td><?= $value['passport'] ?></td>
                    </tr>
                    <tr>
                         <td colspan="2">連絡先</td>
                         <td colspan="5"><?= $value['address'] ?></td>
                    </tr>
                    <tr>
                         <td colspan="2">住所</td>
                         <td colspan="5"><?= $value['per_address'] ?></td>

                    </tr>
                    <tr>
                         <td colspan="2">電話番号</td>
                         <td colspan="5"><?= $value['tel'] ?></td>
                    </tr>
                    <tr>
                         <td colspan="2">入学日</td>
                         <?php
                         require "./utility/function.php";
                         ?>
                         <td colspan="5"><?= $sdate ?></td>
                    </tr>
                    <tr>
                         <td colspan="2">日本語能力</td>

                         <td colspan="5"><?= $value['jp_lan_skill'] ?></td>

                    </tr>
                    <tr>
                         <td colspan="2">身長(センチ)</td>
                         <td colspan="2">(<?= $value['height'] ?>)センチ
                         </td>
                         <td colspan="2">体重(キロ)</td>
                         <td>(<?= $value['weight'] ?>)キロ</td>
                    </tr>
                    <tr>
                         <td colspan="2">婚姻</td>
                         <td colspan="2">
                              <?= $value['marriage'] ?>
                         </td>
                         <td colspan="2">血液</td>
                         <td><?= $value['blood_type'] ?></td>
                    </tr>
                    <tr>
                         <td colspan="2">視力</td>
                         <td colspan="2"><?= $value['eye_test'] ?></td>
                         <td colspan="2">色覚異常</td>
                         <td>
                              <?= $value['color_blind'] ?>
                         </td>
                    </tr>
                    <tr>
                         <td colspan="2">利き手</td>
                         <td colspan="2">
                              <?= $value['hand'] ?>
                         </td>
                         <td colspan="2">料理</td>
                         <td>
                              <?= $value['cook'] ?>
                         </td>
                    </tr>
                    <tr>
                         <td colspan="2">病歴</td>
                         <td colspan="2">
                              <?= $value['disease'] ?>
                         </td>
                         <td colspan="2">肌上入れ墨.手術</td>
                         <td>
                              <?= $value['tattoo'] ?>
                         </td>
                    </tr>
                    <tr>
                         <td colspan="2">タバコを吸っているか？</td>
                         <td colspan="2">
                              <?= $value['smoke'] ?>
                         </td>
                         <td colspan="2">お酒を飲んでいるか？</td>
                         <td>
                              <?= $value['drunk'] ?>
                         </td>
                    </tr>
                    <tr>
                         <td colspan="2">得意科目</td>
                         <td colspan=" 5"><?= $value['languages'] ?></td>
                    </tr>
                    <tr>
                         <td colspan="2">受け取った証明書</td>
                         <td colspan=" 5"><?= $value['certificate'] ?></td>
                    </tr>
                    <tr>
                         <td colspan="2">志望動機</td>
                         <td colspan=" 5"><?= $value['objective'] ?></td>
                    </tr>
                    <tr>
                         <td colspan="2">集団生活経験</td>
                         <td colspan="2">
                              <?= $value['teamwork'] ?>
                         </td>
                         <td colspan="2">家族の月収</td>
                         <td><?= $value['family_income'] ?>チャット
                         </td>
                    </tr>
                    <tr>
                         <td colspan="4">日本でやりたい仕事、ビザの種類</td>
                         <td colspan="3"><?= $value['type_of_visa'] ?></td>
                    </tr>
                    <tr>
                         <td colspan="4">3年間の貯蓄目標</td>
                         <td colspan="3">
                              (<?= $value['planning_money'] ?>)万 </td>
                    </tr>
                    <tr>
                         <td colspan="4">帰国後やりたい仕事</td>
                         <td colspan="3"><?= $value['myanmar_job'] ?></td>
                    </tr>
                    <tr>
                         <td colspan="4">日本国に在留資格申請したことあるか？</td>
                         <td colspan="3">
                              <?= $value['form'] ?>
                         </td>
                    </tr>
                    <tr>
                         <td colspan="4">あったら、どんな資格を申請したか？</td>
                         <td colspan="3"><?= $value['old_visa'] ?></td>
                    </tr>

               <?php } ?>
          </table>


     </div>

     <div class="container shadow shadow">
          <b><span>学歴</span></b>
          <table class="table table-sm table-bordered border-dark">
               <?php

               $sql = "SELECT * FROM edu WHERE student_id = :student_id";
               $statement = $pdo->prepare($sql);
               $statement->bindParam(":student_id", $id, PDO::PARAM_STR);
               $statement->execute();
               $result = $statement->fetchAll(PDO::FETCH_ASSOC);


               // die();
               ?>
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

                    <?php foreach ($result as $row) { ?>
                         <tr>
                              <td><?= $row['education_s_year'] ?> 年 <?= $row['education_s_month'] ?> 月</td>
                              <td><?= $row['education_e_year'] ?> 年 <?= $row['education_e_month'] ?> 月</td>
                              <td colspan="2"><?= $row['school_name'] ?></td>
                              <td colspan="2"><?= $row['specialized_subject'] ?></td>
                              <td><?= $row['skills'] ?></td>
                         </tr>
                    <?php } ?>

               </tbody>

          </table>

          <b><span>職歴</span></b>
          <table class="table table-sm table-bordered border-dark">
               <?php

               $sql = "SELECT * FROM job_exp WHERE student_id = :student_id";
               $statement = $pdo->prepare($sql);
               $statement->bindParam(":student_id", $id, PDO::PARAM_STR);
               $statement->execute();
               $result = $statement->fetchAll(PDO::FETCH_ASSOC);


               // die();
               ?>
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
                    <?php foreach ($result as $row) { ?>
                         <tr>
                              <td><?= $row['job_s_year'] ?> 年 <?= $row['job_s_month'] ?> 月</td>
                              <td><?= $row['job_e_year'] ?> 年 <?= $row['job_e_month'] ?> 月</td>
                              <td colspan="2"><?= $row['company_name'] ?></td>
                              <td colspan="2"><?= $row['job_type_and_position'] ?></td>
                              <td><?= $row['income'] ?></td>
                         </tr>
                    <?php } ?>
               </tbody>
          </table>


          <span><b>家族</b></span>

          <table class="table table-sm table-bordered border-dark">
               <?php

               $sql = "SELECT * FROM family_info WHERE student_id = :student_id";
               $statement = $pdo->prepare($sql);
               $statement->bindParam(":student_id", $id, PDO::PARAM_STR);
               $statement->execute();
               $result = $statement->fetchAll(PDO::FETCH_ASSOC);


               // die();
               ?>
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
                    <?php foreach ($result as $row) { ?>

                         <tr>
                              <td colspan="2"><?= $row['family_member'] ?></td>
                              <td><?= $row['family_member_type'] ?></td>
                              <td><?= $row['family_member_age'] ?></td>
                              <td><?= $row['family_member_job'] ?></td>
                              <td><?= $row['cbtype'] === "stay" ? "&#10003;" : "" ?></td>
                              <td><?= $row['cbtype'] === "away" ? "&#10003;" : "" ?></td>


                         </tr>

                    <?php } ?>

               <tfoot>
                    <tr>
                         <td colspan="2">在日親戚？</td>
                         <td colspan="2">
                              <?= $row['relative'] ?>
                         </td>
                         <td colspan="2">有るばい、誰？</td>
                         <td><?= $row['jp_family_member'] ?></td>
                    </tr>
                    <tr>
                         <td colspan="4">日本へ行くことに家族は？</td>
                         <td colspan="3">
                              <?= $row['accept'] ?>
                         </td>
                    </tr>
               </tfoot>
               </tbody>
          </table>

     </div>
</form>


<button class="btn btn-light" name="back"><a href="index.php">Back</a></button>

<?php
require "footer.php";

?>