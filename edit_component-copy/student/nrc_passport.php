<tr style="width: 250px;">
     <td colspan="2">nrc</td>
     <td colspan="2" style="width: 250px;">
          <?php

               $nrc = "SELECT d.district, s.state_name, n.nrc_type, n.nrc_no
                              FROM state s
                              JOIN district d ON d.district_id = s.district_id
                              JOIN nrc n ON n.state_id = s.state_id
                              JOIN student st ON st.nrc_id = n.nrc_id
                              WHERE st.nrc_id = " . $value['nrc_id'];

               $statement = $pdo->prepare($nrc);
               $statement->execute();

               $result = $statement->fetch();
               // print_r($result);

               // print_r($result['district']);
               // print_r($result['state_name']);
               // print_r($result['nrc_type']);
               // print_r($result['nrc_no']);
               // die();

               ?>
          <select name="district_id" class="district" style="width:100px;">
               <option selected> <?php
                                        echo ($result['district'])
                                        ?></option>
               <?php
                    $sql = "SELECT * FROM district";
                    $statement = $pdo->prepare($sql);
                    $statement->execute();
                    $districts = $statement->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($districts as $key => $value) {
                         echo '<option value="' . $value['district_id'] . '">' . $value['district'] ?? "" . '</option>';
                    }
                    ?>
          </select>
          <select name="state_name" class="state" style="width:100px;">
               <option selected>
                    <?php print_r($result['state_name']) ?>
               </option>
               <?php
                    // if (isset($result['state_name'])) {
                    //      echo '<option selected>' . $result['state_name'] . '</option>';
                    // } else {
                    //      echo '<option selected disabled>Select State</option>';
                    // }

                    require "./input.php";
                    ?>
          </select>

          <select name="nrc_type" id="">
               <option value="(N)">(N)</option>
          </select>

          <input type="text" name="nrc_no" placeholder="number" style="width:100px;"
               value="<?= $result['nrc_no'] ?? "" ?>">

     </td>
     <?php
foreach ($student as $key => $value) {
?>
     <td colspan="2">passport</td>
     <td>
          <input type="text" name="passport" style="width:100px;" value="<?= $value['passport'] ?? "" ?>">
     </td>

</tr>
<?php
}
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
     $(".district").change(function() {
          var district_id = $(this).val();

          $.ajax({
               url: "input.php",
               method: "POST",
               data: {
                    district_id: district_id
               },
               success: function(data) {
                    $(".state").html(data);
               }
          });
     });

});
/* if img click input file will be upload */
img.onclick = () => file.click()
file.addEventListener('change', function() {
     /* to get file  */
     let f = file.files[0]
     /* use url object for to get file url */
     img.src = URL.createObjectURL(f)
     console.log(f)
})
</script>