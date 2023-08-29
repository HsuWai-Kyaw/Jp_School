<?php
require "server/db.php";
$errors = [];
$sql = "SELECT * FROM family_info WHERE student_id = :student_id";
$statement = $pdo->prepare($sql);
$statement->bindParam(":student_id", $id, PDO::PARAM_STR);
$statement->execute();
$student = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- Add Student -->
<div class="modal fade" id="familyAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
          <div class="modal-content">
               <div class="modal-header">
                    <h1 class="modal-title fs-5">New Record</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <form id="familyAdd">
                    <div class="modal-body">
                         <div id="errorMessage" class="alert alert-warning d-none"></div>

                         <!-- <input type="text" name="family_info_id" id="family_info_id"> -->
                         <input type="text" name="student_id" value="<?= $id ?>" class="form-control" readonly>

                         <div class="mb-3">
                              <label for="family_member">家族氏名</label>
                              <input type="text" name="family_member" class="form-control">
                         </div>
                         <div class="mb-3">
                              <label for="family_member_type"> 続柄</label>
                              <input type="text" name="family_member_type" class="form-control">
                         </div>
                         <div class="mb-3">
                              <label for="family_member_age">年齢</label>
                              <input type="text" name="family_member_age" class="form-control">
                         </div>
                         <div class="mb-3">
                              <label for="family_member_job">職業</label>
                              <input type="text" name="family_member_job" class="form-control">
                         </div>
                         <div class="mb-3">
                              <label for="cbtype">同居</label>

                              <input type="checkbox" value="stay" name="cbtype" class="stay" onclick="disableOtherCheckbox(event)">
                              <label for="cbtype">別居</label>

                              <input type="checkbox" value="away" name="cbtype" class="away" onclick="disableOtherCheckbox(event)">

                         </div>
                    </div>
                    <div class="modal-footer">
                         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                         <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
               </form>
          </div>
     </div>
</div>


<!-- Edit Student -->
<div class="modal fade" id="familyEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
          <div class="modal-content">
               <div class="modal-header">
                    <h5 class="modal-title">Edit 家族</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <form id="updateFamily">
                    <div class="modal-body">
                         <div id="errorMessageUpdate" class="alert alert-warning d-none"></div>

                         <input type="text" name="family_info_id" id="family_info_id" hidden>

                         <div class="mb-3">
                              <label for="family_member">家族氏名</label>
                              <input type="text" name="family_member" id="family_member" class="form-control">
                         </div>
                         <div class="mb-3">
                              <label for="family_member_type"> 続柄</label>
                              <input type="text" name="family_member_type" id="family_member_type" class="form-control">
                         </div>
                         <div class="mb-3">
                              <label for="family_member_age">年齢</label>
                              <input type="text" name="family_member_age" id="family_member_age" class="form-control">
                         </div>
                         <div class="mb-3">
                              <label for="family_member_job">職業</label>
                              <input type="text" name="family_member_job" id="family_member_job" class="form-control">
                         </div>

                         <div class="mb-3">
                              <label for="cbtype">同居</label>
                              <input type="checkbox" value="stay" id="cbtype" name="cbtype" class="stay" onclick="disableOtherCheckbox(event)">

                              <label for="cbtype">別居</label>
                              <input type="checkbox" value="away" id="cbtype" name="cbtype" class="away" onclick="disableOtherCheckbox(event)">

                         </div>

                    </div>
                    <div class="modal-footer">
                         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                         <button type="submit" class=" btn btn-primary">Update Student</button>
                    </div>
               </form>
          </div>
     </div>
</div>

<div class="container">
     <div class="row">
          <div class="col-md-12">
               <div class="card">
                    <div class="card-header">
                         <h4>家族

                              <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#familyAddModal">
                                   Add +
                              </button>
                         </h4>
                    </div>

                    <table id="myfamilyTable" class="table table-bordered table-striped">
                         <thead>
                              <tr>
                                   <td>家族氏名</td>
                                   <td> 続柄</td>
                                   <td>年齢</td>
                                   <td>職業</td>
                                   <td>同居</td>
                                   <td>別居</td>
                                   <!-- <td>id</td> -->
                                   <td>Action</td>
                              </tr>

                         </thead>
                         <tbody>
                              <?php foreach ($student as $result) {
                                   // print_r($row);
                              ?>


                                   <tr id="">
                                        <td><input type="text" name="family_member" class="family_member" value="<?= $result['family_member'] ?? "" ?>"></td>
                                        <td><input type="text" name="family_member_type" class="family_member_type" value="<?= $result['family_member_type'] ?? "" ?>">
                                        </td>
                                        <td><input type="number" name="family_member_age" class="family_member_age" value="<?= $result['family_member_age'] ?? "" ?>" style="width: 50px;">
                                        </td>
                                        <td><input type="text" name="family_member_job" class="family_member_job" value="<?= $result['family_member_job'] ?? "" ?>" style="width: 50px;">
                                        </td>

                                        <td><?= $result['cbtype'] === "stay" ? "&#10003;" : "" ?></td>
                                        <td><?= $result['cbtype'] === "away" ? "&#10003;" : "" ?></td>

                                        <td>
                                             <button type="button" data-bs-toggle="modal" data-bs-target="#familyEditModal" value="<?= $result['family_info_id']; ?>" class="editFamily btn btn-warning">Edit</button>
                                             <button type="button" value="<?= $result['family_info_id']; ?>" class="deleteStudent btn btn-danger d-none">Delete</button>

                                        </td>
                                   </tr>

                              <?php } ?>

                         </tbody>
                         <tfoot>

                              <tr>
                                   <td colspan="2">在日親戚？ </td>
                                   <td colspan="">
                                        <?= $result['relative'] ?>
                                   </td>
                                   <td colspan="2">有るばい、誰？ </td>
                                   <td colspan="2"><?= $result['jp_family_member'] ?></td>
                              </tr>
                              <tr>
                                   <td colspan="3">日本へ行くことに家族は？ </td>
                                   <td colspan="4">
                                        <?= $result['accept'] ?>
                                   </td>
                              </tr>

                         </tfoot>
                    </table>
               </div>
          </div>
     </div>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<script>
     $(document).on('submit', '#familyAdd', function(e) {
          e.preventDefault();
          // alert('G');
          var formData = new FormData(this)
          // const values = [...formData.entries()];
          // console.log(values);

          // alert(formData);
          // console.log('formData :>> ', formData);
          formData.append('add_family', true);
          location.reload();

          $.ajax({
               type: "POST",
               url: "family_data_update.php",
               data: formData,
               processData: false,
               contentType: false,
               success: function(response) {
                    var res = jQuery.parseJSON(response);
                    if (res.status == 422) {
                         $('#errorMessage').removeClass('d-none');
                         $('#errorMessage').text(res.message);
                    } else if (res.status == 200) {

                         $('#errorMessage').addClass('d-none');
                         $('#familyAddModal').modal('hide');
                         $('#familyAdd')[0].reset();

                         alertify.set('notifier', 'position', 'top-right');
                         alertify.success(res.message);

                         $('#myfamilyTable').load(location.href + " #myfamilyTable");

                    } else if (res.status == 500) {
                         alert(res.message);
                    }
               }
          });
     });
     $(document).on('click', '.editFamily', function() {

          var family_info_id = $(this).val();
          // alert(family_info_id);
          $.ajax({
               type: "GET",
               url: "family_data_update.php?id=" + family_info_id,
               success: function(response) {
                    // console.log('====================================');
                    // console.log(response);
                    // console.log('====================================');
                    // var res = jQuery.parseJSON('{ "name": "John" }');
                    var res = jQuery.parseJSON(response);
                    // console.log(res);

                    if (res.status == 404) {
                         alert(res.message);
                    } else if (res.status === 200) {
                         // $('#student_id').val(res.data.id);
                         $('#family_info_id').val(res.data.family_info_id);
                         $('#family_member').val(res.data.family_member);
                         $('#family_member_type').val(res.data.family_member_type);
                         $('#family_member_age').val(res.data.family_member_age);
                         $('#family_member_job').val(res.data.family_member_job);

                         let res223 = $('#cbtype').val(res.data.cbtype);
                         // console.log('====================================');
                         // console.log(res223.val());
                         // console.log('====================================');
                         if (res223.val() === 'away') {
                              $('.away').attr('checked', true);
                              $('.stay').removeAttr('checked', true);

                         } else {
                              $('.away').removeAttr('checked', true);

                              $('.stay').attr('checked', true);
                         }

                         $('#familyEditModal').modal('show');
                    }
               }
          });
     });

     $(document).on('submit', '#updateFamily', function(e) {
          e.preventDefault();

          var formData = new FormData(this);
          // const values = [...formData.entries()];
          // console.log(values);

          formData.append("update_family", true);

          $.ajax({
               type: "POST",
               url: "family_data_update.php",
               data: formData,
               processData: false,
               contentType: false,
               success: function(response) {
                    console.log('====================================');
                    console.log(response);
                    console.log('====================================');
                    var res = jQuery.parseJSON(response);

                    if (res.status == 422) {
                         $('#errorMessageUpdate').removeClass('d-none');
                         $('#errorMessageUpdate').text(res.message);

                    } else if (res.status == 200) {

                         $('#errorMessageUpdate').addClass('d-none');

                         alertify.set('notifier', 'position', 'top-right');
                         alertify.success(res.message);

                         $('#familyEditModal').modal('hide');
                         $('#updateFamily')[0].reset();

                         $('#myfamilyTable').load(location.href + " #myfamilyTable");
                         window.location.reload();

                    } else if (res.status == 500) {
                         alert(res.message);
                    }
               }
          });
     });

     // $(document).on('click', '.deleteStudent', function(e) {
     //      e.preventDefault();
     //      if (confirm('Sure?')) {
     //           var id = $(this).val();
     //           $.ajax({
     //                type: "GET",
     //                url: "edu_data_update.php?family_info_id = " + id,

     //                success: function(response) {

     //                }
     //           });
     //      }
     // });
</script>