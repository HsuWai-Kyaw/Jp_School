<?php
foreach ($student as $key => $value) {
?>
     <tr>
          <th scope="col" colspan="6" class="topic"><b><span>
                         <center>
                              <h1>履歴書</h1>
                         </center>
                    </span></b></th>
          <td rowspan="3" class="student_photo">
               <input hidden name="oldphoto" value="<?php echo $value['photo'] ?>"></input>
               <img src="img/<?= $value['photo'] ?>" alt="" id="img" width="150px" height="150px">
               <input type="file" name="photo" accept="image/*" id="file" class="form-control file">

               <!-- <input class="file" type="file" name="photo" id="file"> -->
          </td>
     </tr>
<?php
}
?>