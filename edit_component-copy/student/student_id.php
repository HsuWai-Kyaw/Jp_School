<?php
foreach ($student as $key => $value) {
?>
<tr>

     <td><b>
               <h2>ID</h2>
          </b></td>
     <td colspan="5"><input type="text" name="student_id" value="<?= $value['student_id'] ?>" readonly></td>
</tr>

<tr>

     <td colspan="7"><b>
               <h2>基本情報</h2>
          </b></td>

</tr>
<?php
}
?>