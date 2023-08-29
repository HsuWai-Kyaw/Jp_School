<?php
foreach ($student as $key => $value) {
?>
     <tr>
          <td colspan="2">志望動機</td>
          <td colspan=" 5"><input type="text" name="objective" value="<?= $value['objective'] ?? "" ?>"></td>
     </tr>
     <tr>
          <td colspan="2">集団生活経験</td>
          <td colspan="2">
               <div class="d-flex justify-content-evenly pt-4">
                    <div>
                         <label for="yes">有</label>
                         <input type="radio" name="rdoteamwork" value="有" <?= ($value['teamwork'] == '有') ? 'checked' : '' ?> style="width:20px;">
                    </div>
                    <div>
                         <label for="no">無し</label>
                         <input type="radio" name="rdoteamwork" value="無し" <?= ($value['teamwork'] == '無し') ? 'checked' : '' ?> style="width:20px;">
                    </div>
               </div>

          </td>
          <td colspan="2">家族の月収</td>
          <td><input type="number" name="family_income" value="<?= $value['family_income'] ?? "" ?>">チャット
          </td>
     </tr>
     <tr>
          <td colspan="4">日本でやりたい仕事、ビザの種類</td>
          <td colspan="3"><input type="text" name="type_of_visa" value="<?= $value['type_of_visa'] ?? "" ?>"></td>
     </tr>
     <tr>
          <td colspan="4">3年間の貯蓄目標</td>
          <td colspan="3">
               <input type="number" name="planning_money" value="<?= $value['planning_money'] ?? "" ?>">万
          </td>
     </tr>
     <tr>
          <td colspan="4">帰国後やりたい仕事</td>
          <td colspan="3"><input type="text" name="myanmar_job" value="<?= $value['myanmar_job'] ?? "" ?>"></td>
     </tr>
     <tr>
          <td colspan="4">日本国に在留資格申請したことあるか？</td>
          <td colspan="3">
               <div class="d-flex justify-content-evenly pt-4">
                    <div>
                         <label for="yes">有</label>
                         <input type="radio" name="rdoform" value="有" <?= ($value['form'] == '有') ? 'checked' : '' ?> style="width:20px;">
                    </div>
                    <div>
                         <label for="no">無し</label>
                         <input type="radio" name="rdoform" value="無し" <?= ($value['form'] == '無し') ? 'checked' : '' ?> style="width:20px;">
                    </div>
               </div>
          </td>
     </tr>
     <tr>
          <td colspan="4">あったら、どんな資格を申請したか？</td>
          <td colspan="3"><input type="text" name="old_visa" value="<?= $value['old_visa'] ?? "" ?>"></td>
     </tr>
<?php
}
?>