$(document).ready(function() {
     // e.preventDefault()
     // Add new education row
     $('#add_education_row').click(function() {
          $("#education_row_template").clone().appendTo("#education_table");

     });
     $('#add_job_row').click(function() {
          $("#job_row_template").clone().appendTo("#job_table");

     });
     $('#add_family_row').click(function() {
          $("#family_row_template").clone().appendTo("#family_table");

     });
});

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

// Function to add a new row to the table
function addFamilyRow() {
     const familyTable = document.getElementById('family_table');
     const newRow = document.createElement('tr');
     newRow.innerHTML = `
<td colspan="2"><input type="text" name="family_member[]" class="family_member"></td>
                    <td><input type="text" name="family_member_type[]" class="family_member_type">
                    </td>
                    <td><input type="number" name="family_member_age[]" class="family_member_age"
                              style="width: 50px;"></td>
                    <td><input type="text" name="family_member_job[]" class="family_member_job"
                              style="width: 50px;"></td>
                    </td>
                    <td>
                         <input type="checkbox" value="stay" name="cbtype[]" class="stay"
                              onclick="disableOtherCheckbox(event)">
                    </td>
                    <td>
                         <input type="checkbox" value="away" name="cbtype[]" class="away"
                              onclick="disableOtherCheckbox(event)">
                    </td>
  `;
     familyTable.appendChild(newRow);
}

// Add event listener to the "Add New Row" element
const addFamilyRowButton = document.getElementById('add_family_row');
addFamilyRowButton.addEventListener('click', addFamilyRow);