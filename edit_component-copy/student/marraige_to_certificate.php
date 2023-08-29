<?php
foreach ($student as $key => $value) {
?>
     <tr>
          <td colspan="2">婚姻</td>
          <td colspan="2">
               <div class="d-flex justify-content-evenly pt-4">
                    <div>
                         <label for="yes">有</label>
                         <input type="radio" name="rdomarriage" id="yes" value="有" <?= ($value['marriage'] == '有') ? 'checked' : '' ?>>
                    </div>
                    <div>
                         <label for="no">無し</label>
                         <input type="radio" name="rdomarriage" id="no" value="無し" <?= ($value['marriage'] == '無し') ? 'checked' : '' ?>>
                    </div>
               </div>
          </td>
          <td colspan="2">血液</td>
          <td><input type="text" name="blood_type" value="<?= $value['blood_type'] ?>"></td>
     </tr>
     <tr>
          <td colspan="2">視力</td>
          <td colspan="2"><input type="text" name="eye_test" value="<?= $value['eye_test'] ?>"></td>
          <td colspan="2">色覚異常</td>
          <td>
               <div class="d-flex justify-content-evenly pt-4">
                    <div>
                         <label for="color_yes">有</label>
                         <input type="radio" name="rdocolorblind" id="color_yes" value="有" <?= ($value['color_blind'] == '有') ? 'checked' : '' ?>>
                    </div>
                    <div>
                         <label for="color_no">無し</label>
                         <input type="radio" name="rdocolorblind" id="color_no" value="無し" <?= ($value['color_blind'] == '無し') ? 'checked' : '' ?>>
                    </div>
               </div>
          </td>
     </tr>
     <tr>
          <td colspan="2">利き手</td>
          <td colspan="2">
               <div class="d-flex justify-content-evenly pt-4">
                    <div>
                         <label for="hand_right">右</label>
                         <input type="radio" name="rdohand" id="hand_right" value="右" <?= ($value['hand'] == '右') ? 'checked' : '' ?>>
                    </div>
                    <div>
                         <label for="hand_left">左</label>
                         <input type="radio" name="rdohand" id="hand_left" value="左" <?= ($value['hand'] == '左') ? 'checked' : '' ?>>
                    </div>
               </div>
          </td>
          <td colspan="2">料理</td>
          <td>
               <div class="d-flex justify-content-evenly pt-4">
                    <div>
                         <label for="cook_yes">有</label>
                         <input type="radio" name="rdocook" id="cook_yes" value="有" <?= ($value['cook'] == '有') ? 'checked' : '' ?>>
                    </div>
                    <div>
                         <label for="cook_no">無し</label>
                         <input type="radio" name="rdocook" id="cook_no" value="無し" <?= ($value['cook'] == '無し') ? 'checked' : '' ?>>
                    </div>
               </div>
          </td>
     </tr>
     <tr>
          <td colspan="2">病歴</td>
          <td colspan="2">
               <div class="d-flex justify-content-evenly pt-4">
                    <div>
                         <label for="disease_yes">有</label>
                         <input type="radio" name="rdodisease" id="disease_yes" value="有" <?= ($value['disease'] == '有') ? 'checked' : '' ?>>
                    </div>
                    <div>
                         <label for="disease_no">無し</label>
                         <input type="radio" name="rdodisease" id="disease_no" value="無し" <?= ($value['disease'] == '無し') ? 'checked' : '' ?>>
                    </div>
               </div>
          </td>
          <td colspan="2">肌上入れ墨.手術</td>
          <td>
               <div class="d-flex justify-content-evenly pt-4">
                    <div>
                         <label for="tattoo_yes">有</label>
                         <input type="radio" name="rdotattoo" id="tattoo_yes" value="有" <?= ($value['tattoo'] == '有') ? 'checked' : '' ?>>
                    </div>
                    <div>
                         <label for="tattoo_no">無し</label>
                         <input type="radio" name="rdotattoo" id="tattoo_no" value="無し" <?= ($value['tattoo'] == '無し') ? 'checked' : '' ?>>
                    </div>
               </div>
          </td>
     </tr>
     <tr>
          <td colspan="2">タバコを吸っているか？</td>
          <td colspan="2">
               <div class="d-flex justify-content-evenly pt-4">
                    <div>
                         <label for="smoke_yes">有</label>
                         <input type="radio" name="rdosmoke" id="smoke_yes" value="有" <?= ($value['smoke'] == '有') ? 'checked' : '' ?>>
                    </div>
                    <div>
                         <label for="smoke_no">無し</label>
                         <input type="radio" name="rdosmoke" id="smoke_no" value="無し" <?= ($value['smoke'] == '無し') ? 'checked' : '' ?>>
                    </div>
               </div>
          </td>
          <td colspan="2">お酒を飲んでいるか？</td>
          <td>
               <div class="d-flex justify-content-evenly pt-4">
                    <div>
                         <label for="drunk_yes">有</label>
                         <input type="radio" name="rdodrunk" id="drunk_yes" value="有" <?= ($value['drunk'] == '有') ? 'checked' : '' ?>>
                    </div>
                    <div>
                         <label for="drunk_no">無し</label>
                         <input type="radio" name="rdodrunk" id="drunk_no" value="無し" <?= ($value['drunk'] == '無し') ? 'checked' : '' ?>>
                    </div>
               </div>
          </td>
     </tr>
     <tr>
          <td colspan="2">得意科目</td>
          <td colspan="5"><input type="text" name="languages" value="<?= $value['languages'] ?? '' ?>"></td>
     </tr>
     <tr>
          <td colspan="2">受け取った証明書</td>
          <td colspan="5"><input type="text" name="certificate" value="<?= $value['certificate'] ?? '' ?>"></td>
     </tr>
<?php
}
?>