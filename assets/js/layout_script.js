
function add_1Row() {
    // Get the table reference
    var table = document.getElementById("centerTable").getElementsByTagName('tbody')[0];

    // Find the index of the row containing the "Add Row" button
    var rowIndex = -1;
    var rows = table.rows;
    for (var i = 0; i < rows.length; i++) {
        if (rows[i].querySelector('.aad_row')) {
            rowIndex = i;
            break;
        }
    }

    // Create a new row
    var newRow = table.insertRow(rowIndex);

    // Add the first cell with the same content as in the existing rows
    var firstCell = newRow.insertCell(0);
    firstCell.textContent = "Center Stone";

    // Define an array of options for select elements
    var selectOptions = [
        ["Origin", "Origin 1", "Origin 2", "Origin 3"],
        ["Category", "Category 1", "Category 2", "Category 3"],
        ["Name", "Name 1", "Name 2", "Name 3"],
        ["Cut", "Cut 1", "Cut 2", "Cut 3"],
        ["Quality", "Quality 1", "Quality 2", "Quality 3"]
    ];

    // Add cells with select elements to the new row
    for (var i = 0; i < selectOptions.length; i++) {
        var cell = newRow.insertCell(i + 1);
        var select = document.createElement("select");

        for (var j = 0; j < selectOptions[i].length; j++) {
            var option = document.createElement("option");
            option.value = selectOptions[i][j];
            option.text = selectOptions[i][j];
            select.appendChild(option);
        }

        cell.appendChild(select);
    }
}

function remove_1Row() {
    var table = document.getElementById("centerTable").getElementsByTagName('tbody')[0];

    // Find the index of the row containing the "Add Row" button
    var rowIndex = -1;
    var rows = table.rows;
    for (var i = 0; i < rows.length; i++) {
        if (rows[i].querySelector('.aad_row')) {
            rowIndex = i;
            break;
        }
    }

    // Ensure there's at least one row to remove
    if (rowIndex > 1) {
        table.deleteRow(rowIndex - 1);
    }
}

//natural table add row_1 with tr in table




   function add_Row() {
    var table = document.getElementById("sidestonesizeTable").getElementsByTagName('tbody')[0];
    var newRow = table.insertRow(table.rows.length - 1); // Insert before the last row

    // Copy the content of the first row to the new row
    for (var i = 0; i < table.rows[0].cells.length; i++) {
      var newCell = newRow.insertCell(i);
      if (i === 0) {
        newCell.innerHTML = table.rows[0].cells[i].innerHTML; // Copy the structure of the first cell
        var selects = newCell.querySelectorAll('select');
        selects.forEach(function(select) {
          select.selectedIndex = 0; // Set the default option for each select element
        });
      } else {
        newCell.innerHTML = table.rows[0].cells[i].innerHTML; // Copy the content of other cells
      }
    }
  }

  function remove_Row() {
    var table = document.getElementById("sidestonesizeTable").getElementsByTagName('tbody')[0];
    if (table.rows.length > 2) { // Ensure there are at least two rows (including the add/remove row buttons)
      table.deleteRow(table.rows.length - 2); // Remove the second-to-last row
    }
  }

  //small size stone table

 function addRow_1() {
    var table = document.getElementById("smallstonesizeTable").getElementsByTagName('tbody')[0];
    var newRow = table.insertRow(table.rows.length - 1); // Insert before the last row

    // Copy the content of the first row to the new row
    for (var i = 0; i < table.rows[0].cells.length; i++) {
      var newCell = newRow.insertCell(i);
      if (i === 0) {
        newCell.innerHTML = table.rows[0].cells[i].innerHTML; // Copy the structure of the first cell
        var selects = newCell.querySelectorAll('select');
        selects.forEach(function(select) {
          select.selectedIndex = 0; // Set the default option for each select element
        });
      } else {
        newCell.innerHTML = table.rows[0].cells[i].innerHTML; // Copy the content of other cells
      }
    }

  function removeRow_1() {
    var table = document.getElementById("smallstonesizeTable").getElementsByTagName('tbody')[0];
    if (table.rows.length > 2) { // Ensure there are at least two rows (including the add/remove row buttons)
      table.deleteRow(table.rows.length - 2); // Remove the second-to-last row
    }
  }