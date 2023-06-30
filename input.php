<?php
include "server/db.php";
include "nrc.php";
// print_r($nrcDataList);
// die();

if (isset($_POST['district_id'])) {
     // echo "Hey";
     $district_id = $_POST['district_id'];
     $sql = "SELECT * FROM state s WHERE s.district_id = :district_id";

     $statement = $pdo->prepare($sql);
     $statement->bindParam(":district_id", $district_id, PDO::PARAM_STR);
     $statement->execute();

     $result = $statement->fetchAll(PDO::FETCH_ASSOC);

     // foreach ($result as $key => $value) {
     // print_r($value);

     foreach ($nrcDataList as $key => $value) {
          //     print_r($value);
          foreach ($value as $res) {
               $arr = [
                    "code" => $key,
                    "location" => $res
               ];

               // echo "<pre>";
               if ($arr['code'] == $district_id) {
                    // print_r($arr);
                    // print_r($arr['code'] . "=>" . $arr['location'] . "<br>");
                    echo '<option value="' . $arr['location'] . '">' . $arr['location']  . '</option>';
                    // }
               }
               echo "</pre>";
          }
     }
}
