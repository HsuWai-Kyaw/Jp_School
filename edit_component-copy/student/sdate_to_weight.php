<?php
foreach ($student as $key => $value) {
?>
     <tr>
          <td colspan="2">連絡先</td>
          <td colspan="5">
               <textarea name="address" cols="30" rows="4"><?= $value['address'] ?? "" ?></textarea>
          </td>
     </tr>
     <tr>
          <td colspan="2">住所</td>
          <td colspan="5">
               <input type="text" name="per_address" value="<?= $value['per_address'] ?? "" ?>">
          </td>

     </tr>
     <tr>
          <td colspan="2">電話番号</td>
          <td colspan="5"><input type="tel" name="tel" value="<?= $value['tel'] ?? "" ?>"></td>
     </tr>
     <tr>
          <td colspan="2">入学日</td>
          <?php
          // include "./utility/function.php";
          ?>
          <td colspan="5">
               <input type="date" name="start_date" value="<?= $value['start_date'] ?? "" ?>">
          </td>
     </tr>
     <tr>
          <td colspan="2">日本語能力</td>

          <td colspan="5"><input type="text" name="jp_lan_skill" value="<?= $value['jp_lan_skill'] ?? "" ?>"></td>

     </tr>
     <tr>
          <td colspan="2">身長(センチ)</td>
          <td colspan="2"><input type="number" name="height" value="<?= $value['height'] ?? "" ?>">センチ
          </td>
          <td colspan="2">体重(キロ)</td>
          <td><input type="number" name="weight" value="<?= $value['weight'] ?? "" ?>">キロ</td>
     </tr>
<?php
}
?>