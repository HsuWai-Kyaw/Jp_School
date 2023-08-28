<?php
foreach ($student as $key => $value) {
?>
<tr>
     <td colspan="2" for="student_name">name</td>
     <td colspan="3"><input type="text" name="name" value="<?= $value['name'] ?? "" ?>"></td>
     <td rowspan="2"><span>gender</span></td>
     <td rowspan="2">
          <!-- <?= $value['gender'] ?> -->
          <div class="d-flex justify-content-evenly pt-4">
               <div>
                    <label for="male">男</label>
                    <input type="radio" name="rdogender" id="male" value="男"
                         <?= ($value['gender'] == '男') ? 'checked' : '' ?> style="width:10px;">
               </div>
               <div>
                    <label for="female">女</label>
                    <input type="radio" name="rdogender" id="female" value="女"
                         <?= ($value['gender'] == '女') ? 'checked' : '' ?> style="width:10px;">
               </div>
          </div>
     </td>
</tr>
<tr>
     <td colspan="2">kana name</td>
     <td colspan="3"><input type="text" name="kana_name" value="<?= $value['kana_name'] ?? "" ?>"></td>
</tr>
<?php
}
?>