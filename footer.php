<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> -->

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.3/jspdf.umd.min.js"></script> -->
<!-- MDB -->
<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.js"></script> -->
<script src="./js/bootstrap.bundle.min.js"></script>
<script src="./js/script.js"></script>

<script>
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

     function confirmDelete(student_id) {
          if (confirm("Are you sure to delete this record?")) {
               window.location.href = "delete.php?id=" + student_id;
          }
     }

     // Function to disable the other checkbox in the same row
     function disableOtherCheckbox(event) {
          const clickedCheckbox = event.target;
          const row = clickedCheckbox.parentNode.parentNode; // Get the parent row of the clicked checkbox
          const checkboxes = row.querySelectorAll('input[type="checkbox"]');

          checkboxes.forEach(checkbox => {
               if (checkbox !== clickedCheckbox) {
                    checkbox.disabled = clickedCheckbox.checked;
               }
          });
     }

     // Add event listener to the parent element
     const familyTable = document.getElementById('family_table');

     familyTable.addEventListener('click', function(event) {
          if (event.target.matches('.stay') || event.target.matches('.away')) {
               disableOtherCheckbox(event);
          }
     });
</script>
</body>

</html>