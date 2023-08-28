<?php
foreach ($student as $key => $value) {
?>
     <tr>
          <td colspan="2">address</td>
          <td colspan="5">
               <textarea name="address" cols="30" rows="4"><?= $value['address'] ?? "" ?></textarea>
          </td>
     </tr>
     <tr>
          <td colspan="2">per address</td>
          <td colspan="5">
               <input type="text" name="per_address" value="<?= $value['per_address'] ?? "" ?>">
          </td>

     </tr>
     <tr>
          <td colspan="2">tel</td>
          <td colspan="5"><input type="tel" name="tel" value="<?= $value['tel'] ?? "" ?>"></td>
     </tr>
     <tr>
          <td colspan="2">start date</td>
          <?php
          // include "./utility/function.php";
          ?>
          <td colspan="5">
               <input type="date" name="start_date" value="<?= $value['start_date'] ?? "" ?>">
          </td>
     </tr>
     <tr>
          <td colspan="2">jp lan skill</td>

          <td colspan="5"><input type="text" name="jp_lan_skill" value="<?= $value['jp_lan_skill'] ?? "" ?>"></td>

     </tr>
     <tr>
          <td colspan="2">height(センチ)</td>
          <td colspan="2"><input type="number" name="height" value="<?= $value['height'] ?? "" ?>">センチ
          </td>
          <td colspan="2">weight(キロ)</td>
          <td><input type="number" name="weight" value="<?= $value['weight'] ?? "" ?>">キロ</td>
     </tr>
<?php
}
?>