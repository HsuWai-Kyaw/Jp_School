<?php
foreach ($student as $key => $value) {
?>
<tr>
     <td colspan="2">dob</td>
     <td colspan="2"><input type="date" name="dob" value="<?= $value['dob'] ?? "" ?>""></td>


     <td colspan=" 2">age</td>
     <td><input type="number" name="age" value="<?= $value['age'] ?? "" ?>">歳</td>
</tr>
<tr>
     <td colspan="2">country</td>
     <td colspan="2"><input type="text" name="country" value="<?= $value['country'] ?>"></td>
     <td colspan="2">religion</td>
     <td><input type="text" name="religion" value="<?= $value['religion'] ?? "" ?>"></td>
</tr>
<?php
}
?>