<?php
require "server/db.php";
$errors = [];
$sql = "SELECT * FROM job_exp WHERE student_id = :student_id";
$statement = $pdo->prepare($sql);
$statement->bindParam(":student_id", $id, PDO::PARAM_STR);
$statement->execute();
$student = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- Add Student -->
<div class="modal fade" id="jobAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
          <div class="modal-content">
               <div class="modal-header">
                    <h1 class="modal-title fs-5">New Record</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <form id="jobAdd">
                    <div class="modal-body">
                         <div id="errorMessage" class="alert alert-warning d-none"></div>

                         <input type="text" name="student_id" value="<?= $id ?>" class="form-control" readonly>

                         <div class="mb-3">
                              <label for="job_s_year">開始年</label>
                              <input type="text" name="job_s_year" class="form-control">
                         </div>
                         <div class="mb-3">
                              <label for="job_s_month">開始月</label>
                              <input type="text" name="job_s_month" class="form-control">
                         </div>
                         <div class="mb-3">
                              <label for="job_e_year">終了年</label>
                              <input type="text" name="job_e_year" class="form-control">
                         </div>
                         <div class="mb-3">
                              <label for="job_e_month">終了月</label>
                              <input type="text" name="job_e_month" class="form-control">
                         </div>
                         <div class="mb-3">
                              <label for="company_name">会社名 </label>
                              <input type="text" name="company_name" class="form-control">
                         </div>
                         <div class="mb-3">
                              <label for="job_type_and_position">仕事内容 </label>
                              <input type="text" name="job_type_and_position" class="form-control">
                         </div>
                         <div class="mb-3">
                              <label for="income">給料 </label>
                              <input type="text" name="income" class="form-control">
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
<div class="modal fade" id="jobEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
          <div class="modal-content">
               <div class="modal-header">
                    <h5 class="modal-title">Edit 職歴</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <form id="updateJob">
                    <div class="modal-body">
                         <div id="errorMessageUpdate" class="alert alert-warning d-none"></div>

                         <input type="text" name="job_exp_id" id="job_exp_id" hidden>

                         <div class="mb-3">
                              <label for="job_s_year">開始年</label>
                              <input type="text" name="job_s_year" id="job_s_year" class="form-control">
                         </div>
                         <div class="mb-3">
                              <label for="job_s_month">開始月</label>
                              <input type="text" name="job_s_month" id="job_s_month" class="form-control">
                         </div>
                         <div class="mb-3">
                              <label for="job_e_year">終了年</label>
                              <input type="text" name="job_e_year" id="job_e_year" class="form-control">
                         </div>
                         <div class="mb-3">
                              <label for="job_e_month">終了月</label>
                              <input type="text" name="job_e_month" id="job_e_month" class="form-control">
                         </div>
                         <div class="mb-3">
                              <label for="company_name">会社名 </label>
                              <input type="text" name="company_name" id="company_name" class="form-control">
                         </div>
                         <div class="mb-3">
                              <label for="job_type_and_position">仕事内容 </label>
                              <input type="text" name="job_type_and_position" id="job_type_and_position" class="form-control">
                         </div>
                         <div class="mb-3">
                              <label for="income">給料 </label>
                              <input type="text" name="income" id="income" class="form-control">
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
                         <h4>職歴

                              <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#jobAddModal">
                                   Add +
                              </button>
                         </h4>
                    </div>

                    <table id="myjobTable" class="table table-bordered table-striped">
                         <thead>
                              <tr>
                                   <td>開始年</td>
                                   <td> 終了年</td>
                                   <td>会社名</td>
                                   <td>仕事内容 </td>
                                   <td>給料</td>
                                   <!-- <td>id</td> -->
                                   <td>Action</td>
                              </tr>

                         </thead>
                         <tbody>
                              <?php foreach ($student as $result) {
                                   // print_r($row);
                              ?>


                                   <tr>
                                        <td>
                                             <input type="text" name="job_s_year" value=" <?= $result['job_s_year'] ?? "" ?>" style="width: 50px;">
                                             年
                                             <input type="text" name="job_s_month" value="<?= $result['job_s_month'] ?>" style="width: 50px;">
                                             月

                                        </td>
                                        <td>
                                             <input type="text" name="job_e_year" value="<?= $result['job_e_year'] ?? "" ?>" style="width: 50px;">
                                             年
                                             <input type="text" name="job_e_month" value="<?= $result['job_e_month'] ?? "" ?>" style="width: 50px;">
                                             月
                                        </td>
                                        <td><input type="text" name="company_name" value="<?= $result['company_name'] ?? "" ?>">
                                        </td>
                                        <td><input type="text" name="job_type_and_position" value="<?= $result['job_type_and_position'] ?? "" ?>">
                                        </td>
                                        <td><input type="text" name="income" value="<?= $result['income'] ?? "" ?>">
                                        </td>
                                        <!-- <td>
                                             <input type="text" name="job_exp_id" value="<?= $result['job_exp_id'] ?>">
                                        </td> -->
                                        <td>

                                             <button type="button" data-bs-toggle="modal" data-bs-target="#jobEditModal" value="<?= $result['job_exp_id']; ?>" class="editJob btn btn-warning">Edit</button>
                                             <button type="button" value="<?= $result['job_exp_id']; ?>" class="deleteStudent btn btn-danger d-none">Delete</button>

                                        </td>
                                   </tr>

                              <?php } ?>

                         </tbody>
                    </table>
               </div>
          </div>
     </div>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<script>
     $(document).on('submit', '#jobAdd', function(e) {
          e.preventDefault();
          // alert('G');
          var formData = new FormData(this)
          // alert(formData);
          formData.append('add_job', true);
          location.reload();
          // console.log('formData :>> ', formData);

          $.ajax({
               type: "POST",
               url: "job_data_update.php",
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
                         $('#jobAddModal').modal('hide');
                         $('#jobAdd')[0].reset();

                         alertify.set('notifier', 'position', 'top-right');
                         alertify.success(res.message);

                         $('#myjobTable').load(location.href + " #myjobTable");

                    } else if (res.status == 500) {
                         alert(res.message);
                    }
               }
          });
     });
     $(document).on('click', '.editJob', function() {

          var job_exp_id = $(this).val();
          // alert(job_exp_id);
          $.ajax({
               type: "GET",
               url: "job_data_update.php?id=" + job_exp_id,
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
                         $('#job_exp_id').val(res.data.job_exp_id);
                         $('#job_s_year').val(res.data.job_s_year);
                         $('#job_s_month').val(res.data.job_s_month);
                         $('#job_e_year').val(res.data.job_e_year);
                         $('#job_e_month').val(res.data.job_e_month);
                         $('#company_name').val(res.data.company_name);
                         $('#job_type_and_position').val(res.data.job_type_and_position);
                         $('#income').val(res.data.income);

                         $('#jobEditModal').modal('show');
                    }
               }
          });
     });

     $(document).on('submit', '#updateJob', function(e) {
          e.preventDefault();

          var formData = new FormData(this);
          // const values = [...formData.entries()];
          // console.log(values);

          formData.append("update_job", true);

          $.ajax({
               type: "POST",
               url: "job_data_update.php",
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

                         $('#jobEditModal').modal('hide');
                         $('#updateJob')[0].reset();


                         $('#myjobTable').load(location.href + " #myjobTable");
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
     //                url: "edu_data_update.php?job_exp_id = " + id,

     //                success: function(response) {

     //                }
     //           });
     //      }
     // });
</script>