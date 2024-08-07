document.addEventListener("DOMContentLoaded", function () {
  const toggleButtons = document.querySelectorAll(".toggle-button");

  toggleButtons.forEach(function (button) {
    button.addEventListener("click", function () {
      const targetId = button.getAttribute("data-target");
      const targetContent = document.querySelector(`[data-toggle="${targetId}"]`);

      if (targetContent) {
        // Toggle the visibility by toggling the "hidden" style
        if (targetContent.style.display === "none") {
          targetContent.style.display = "flex";
          button.innerHTML = '<i class="fa fa-caret-up"></i>'; // Change arrow to up
        } else {
          targetContent.style.display = "none";
          button.innerHTML = '<i class="fa fa-caret-down"></i>'; // Change arrow to down
        }
      }
    });
  });
});

//row create for shape

var selector = '.color_type';
$(selector).on('click', function(){
    // Toggle 'active' class on the clicked color_type
    $(this).toggleClass('active');

    // Find the associated checkbox and toggle its checked state
    var checkbox = $(this).siblings('input[type="checkbox"]');
    checkbox.prop('checked', !checkbox.prop('checked'));
});
//color letter active

var selector = '.shape_image';
$(selector).on('click', function(){
    // Toggle 'active' class on the clicked shape_image
    $(this).toggleClass('active');

    // Find the associated checkbox and toggle its checked state
    var checkbox = $(this).siblings('input[type="checkbox"]');
    checkbox.prop('checked', !checkbox.prop('checked'));
});
//select shape

var selector = '.round_vv';

$(selector).on('click', function(){
    // Toggle 'active' class on the clicked round_vv
    $(this).toggleClass('active');

    // Find the associated checkbox and toggle its checked state
    var checkbox = $(this).siblings('input[type="checkbox"]');
    checkbox.prop('checked', !checkbox.prop('checked'));
});

// select clarity show

var selector = '.colortone_type';
$(selector).on('click', function(){
    // Toggle 'active' class on the clicked colortone_type
    $(this).toggleClass('active');

    // Find the associated checkbox and toggle its checked state
    var checkbox = $(this).children('input[type="checkbox"]');
    checkbox.prop('checked', !checkbox.prop('checked'));
});
var selector = '.colortone span';
$(selector).on('click', function(){
//$(selector).addClass('active');
$(this).toggleClass('active');
});
//color fancy  active

var selector = '.intencity span';
$(selector).on('click', function(){
//$(selector).addClass('active');
$(this).toggleClass('active');
});

var selector = '.intencity_type';
$(selector).on('click', function(){
    // Toggle 'active' class on the clicked intencity_type
    $(this).toggleClass('active');

    // Find the associated checkbox and toggle its checked state
    var checkbox = $(this).children('input[type="checkbox"]');
    checkbox.prop('checked', !checkbox.prop('checked'));
});
//intencity  active


var selector = '.certi span';
$(selector).on('click', function(){
//$(selector).addClass('active');
$(this).toggleClass('active');
});


var selector = '.gia';
$(selector).on('click', function(){
    // Toggle 'active' class on the clicked intencity_type
    $(this).toggleClass('active');

    // Find the associated checkbox and toggle its checked state
    var checkbox = $(this).children('input[type="checkbox"]');
    checkbox.prop('checked', !checkbox.prop('checked'));
});
//gia span active

var selector ='.product_shap';
$(selector).on('click', function(){
  $(this).toggleClass('active');
});
//center stone active

function activateCheckbox(checkbox) {
  var parentDiv = checkbox.parentElement;
  if (checkbox.checked) {
      parentDiv.classList.add('active');
  } else {
      parentDiv.classList.remove('active');
  }
}

//advance search certificate with checkbox

$(document).ready(function(){
    $('#sort').click(function(event){
        event.stopPropagation();
         $("#input_range").slideToggle("slow");
    });
    $("#input_range").on("click", function (event) {
        event.stopPropagation();
    });
});

$(document).on("click", function () {
    $("#input_range").hide();
});


$(function()
{
$('.slider').on('input change', function(){
          $(this).next($('.slider_label')).html(this.value);
        });
      $('.slider_label').each(function(){
          var value = $(this).prev().attr('value');
          $(this).html(value);
        });  
})
    
 //sort toggle   
   
function initializeImageZoomForClass(className, options) {
    const containers = document.getElementsByClassName(className);
    for (let i = 0; i < containers.length; i++) {
        new ImageZoom(containers[i], options);
    }
}

var options2 = {
    fillContainer: true,
    offset: { vertical: 0, horizontal: 10 }
};

// Initialize ImageZoom for all elements with the class "img-zoom-container"
initializeImageZoomForClass("img-zoom-container", options2);
//zoom effect



 // Get all the checkboxes by class
var checkboxes = document.querySelectorAll('.myCheckbox');
// Add click event listeners to each checkbox
checkboxes.forEach(function(checkbox) {
  checkbox.addEventListener('click', function() {
    var targetId = checkbox.getAttribute('data-target');
    var targetElement = document.getElementById(targetId);

    if (checkbox.checked) {
      targetElement.style.display = 'inline';
    } else {
      targetElement.style.display = 'none';
    }
  });
});

//breadcrumb for checkbox
 const shapes = document.querySelectorAll('.shbr');
    shapes.forEach(shbr => {
        shbr.addEventListener('click', function() {
            const target = this.getAttribute('data-target');
            const associatedLi = document.getElementById(target);
            const otherBreadcrumbs = document.querySelectorAll('#breadcrumb li[id]:not([id="' + target + '"])');

            // Toggle the display of the breadcrumb span
            associatedLi.style.display = (associatedLi.style.display === 'none') ? 'inline' : 'none';
            
        });
    });

//breadcrums list

// Get all the tbl-tr elements
const tblTrElements = document.querySelectorAll('.tbl-tr');

// Add event listeners to each tbl-tr element
tblTrElements.forEach(tblTr => {
    tblTr.addEventListener('mouseover', () => showPopup(tblTr));
    tblTr.addEventListener('mouseout', () => hidePopup(tblTr));
});

function showPopup(tblTr) {
    const popup = tblTr.querySelector('.tbl-popup');
    popup.style.display = 'block';
}

function hidePopup(tblTr) {
    const popup = tblTr.querySelector('.tbl-popup');
    popup.style.display = 'none';
}

$(document).ready(function () {
  // Add hover event handler to table rows
  $('table tbody tr').hover(
    function () {
      // Show the popup when hovering over a row
      $(this).find('.tbl-popup').show();
    },
    function () {
      // Hide the popup when moving the mouse away
      $(this).find('.tbl-popup').hide();
    }
  );
});

//product search 

$(document).ready(function() {
  // Add click event handler to all "fa fa-times" icons
  $("ul#breadcrumb li i.fa.fa-times").click(function() {
    // Hide the parent list item when the icon is clicked
    $(this).parent().hide();
  });
});


$(document).ready(function() {
  // Add click event handler to all "fa fa-times" icons
  $(".close-icon").click(function() {
    // Find the parent li element
    var parentListItem = $(this).closest("li");

    // Find the checkbox inside the label and uncheck it
    parentListItem.find(".myCheckbox").prop("checked", false);

    // Hide the parent li element
    parentListItem.hide();
  });
});

//breadcrumb hide

$(document).ready(function() {
  // Add a click event listener to the "Clear All" button
  $(".clear_all").click(function() {
    // Hide all breadcrumb items
    $("#breadcrumb li").hide('4000');
  });
});

$(document).ready(function() {
  // Function to toggle the visibility of the "Clear All" button
  function toggleClearAllButton() {
    var breadcrumbItemsCount = $("#breadcrumb li").length;

    if (breadcrumbItemsCount > 1) {
      $(".clear_all").show();
    } else {
      $(".clear_all").hide();
    }
  }

  toggleClearAllButton();

  // Example of adding a breadcrumb item
  $("#breadcrumb").append('<li>New Breadcrumb Item</li>');
  toggleClearAllButton();

  // Example of removing a breadcrumb item
  $("#breadcrumb li:last").remove();
  toggleClearAllButton();
});
// hide on click breadcrumb

$(document).ready(function() {
  // Add a click event listener to the "Clear All" button
  $("#filter").click(function() {
    // Hide all breadcrumb items
    $(".filter_dis").toggle();
  });
});

//for filter breadcrumb


$(document).ready(function (){
$('.sum_info').click(function (){
  $('.summary_info').slideToggle('slow')
});
});

//summary info

        const listItems = document.querySelectorAll('.engraving_font ul li');

        // Add a click event listener to each list item
        listItems.forEach(item => {
            item.addEventListener('click', () => {
                // Remove the "active" class from all items
                listItems.forEach(item => {
                    item.classList.remove('active');
                });

                // Add the "active" class to the clicked item
                item.classList.add('active');
            });
        });

//engraving li font
  function changeFont(fontFamily) {
  const engravingFont = document.querySelector('.engraving_font');
    engravingFont.style.fontFamily = fontFamily;
        }

         // Function to change the font (you can implement this)
        function changeFont(font) {
            // Implement font change logic here
        }

        // Function to update the displayed text
        function updateText() {
            const engravingText = document.getElementById('engravingText').value;
            const engravedText = document.getElementById('engravedText');
            
            // Update the displayed text below the image
            engravedText.textContent  = engravingText;
        }

        // Function to add a symbol to the displayed text
        function addSymbol(symbol) {
            const engravingText = document.getElementById('engravingText');
            engravingText.value += symbol;
            updateText(); // Update the displayed text
        }

//engraving text

 function toggleIcon() {
            var icon = document.getElementById("toggleIcon");
            if (icon.classList.contains("fa-angle-double-down")) {
                icon.classList.remove("fa-angle-double-down");
                icon.classList.add("fa-angle-double-up");
            } else {
                icon.classList.remove("fa-angle-double-up");
                icon.classList.add("fa-angle-double-down");
            }
        }

function toggleDown() {
            var icon = document.getElementById("toggleDown");
            if (icon.classList.contains("fa-angle-double-down")) {
                icon.classList.remove("fa-angle-double-down");
                icon.classList.add("fa-angle-double-up");
            } else {
                icon.classList.remove("fa-angle-double-up");
                icon.classList.add("fa-angle-double-down");
            }
        }               

$(document).ready(function (){
  $('.risize_btn').click(function (){
    $('.ring_container').slideToggle('slow')

  });
});  

function updateButtonText() {
  var selectedSize = document.querySelector('input[name="Ring Size"]:checked');
  if (selectedSize) {
    var selectedSizeValue = selectedSize.value;
    document.getElementById('selectSizeBtn').textContent = 'Selected Size: ' + selectedSizeValue;
  } else {
    document.getElementById('selectSizeBtn').textContent = 'Select Your Size';
  }
}

// Add event listeners to radio buttons to call the updateButtonText function when a radio button is clicked
var radioButtons = document.querySelectorAll('input[name="Ring Size"]');
radioButtons.forEach(function (radioButton) {
  radioButton.addEventListener('click', updateButtonText);
});

//select ring size

function resizeImage(imageId, operation) {
  const image = document.getElementById(imageId);
  const currentWidth = image.offsetWidth;

  if (operation === 'plus') {
    // Increase the image width
    const newWidth = currentWidth + 10; 
    image.style.width = newWidth + 'px';
  } else if (operation === 'minus') {
    // Decrease the image width
    const newWidth = currentWidth - 10; 
    if (newWidth > 0) {
      image.style.width = newWidth + 'px';
    }
  }
}

// image resizer for card
 var stars = document.querySelectorAll('.score i');
    stars.forEach(function(star, index) {
        star.addEventListener('mouseenter', function() {
            star.classList.remove('fa-star-o');
            star.classList.add('fa-star');
        });

        star.addEventListener('mouseleave', function() {
            if (!star.classList.contains('selected')) {
                star.classList.remove('fa-star');
                star.classList.add('fa-star-o');
            }
        });

        star.addEventListener('click', function() {
            star.classList.toggle('selected');
        });
    });
//star rating
$(document).ready(function (){
  $('.wri_re').click(function (){
  $('.write_review').slideToggle('slow')
  })
});

//review toggle
$(document).ready(function(){
   var changebox = $(".changebox");
   
   var firstclone = changebox.children(":first").clone();
   changebox.append(firstclone);
   
   var fsstr = changebox.parent().css("font-size");
   fsstr = fsstr.slice(0,fsstr.indexOf("p"));
   var fs = parseInt(fsstr);
   
   changebox.css("height",changebox.parent().css("font-size") );
   ChangeSize(0);
   setInterval(Next,2000);
   
   function Next(){
      if( typeof Next.i == 'undefined' ) {
        Next.i = 0;
      }
     Next.i++;
      if(Next.i == changebox.children("span").length){
         Next.i = 1;
         changebox.scrollTop(0);
      }
      changebox.animate({scrollTop: (fs*Next.i)+Next.i*5+3},500);
      setTimeout(function(){
         ChangeSize(Next.i);
      },500);
      
   }
   
   function ChangeSize(i){
   var word = changebox.children("span").eq(i);
   var wordsize = word.css("width");
   changebox.css("width",wordsize);
}
   
});

//text slide
const lazyImages = document.querySelectorAll('img[loading="lazy"]');

        lazyImages.forEach(img => {
            img.addEventListener('load', () => {
                img.removeAttribute('data-src');
            });
        });
//images loading        
 // Add a click event listener to a common ancestor of the table headers
document.addEventListener("click", function (event) {
    if (event.target.classList.contains("toggleSort")) {
        toggleSort(event.target.parentElement);
    }
});

function toggleSort(header) {
    var icon = header.querySelector(".toggleSort");
    if (icon.classList.contains("fa-chevron-down")) {
        icon.classList.remove("fa-chevron-down");
        icon.classList.add("fa-chevron-up");
    } else {
        icon.classList.remove("fa-chevron-up");
        icon.classList.add("fa-chevron-down");
    }

    var columnName = header.getAttribute("data-sort");
    
}


 function sortTable(column) {
            const table = document.querySelector('.fl-table');
            const rows = Array.from(table.querySelector('tbody').querySelectorAll('tr'));

            rows.sort((a, b) => {
                const aValue = a.querySelector(`[data-sort="${column}"]`).textContent;
                const bValue = b.querySelector(`[data-sort="${column}"]`).textContent;
                return aValue.localeCompare(bValue);
            });

            table.querySelector('tbody').innerHTML = '';
            rows.forEach(row => {
                table.querySelector('tbody').appendChild(row);
            });
        }

  // Get all heart icons
var heartIcons = document.querySelectorAll(".heart-icon");
function toggleHeart(icon) {
  if (icon.classList.contains("fa-heart-o")) {
    icon.classList.remove("fa-heart-o");
    icon.classList.add("fa-heart");
    icon.style.color = "#ff8080";
  } else {
    icon.classList.remove("fa-heart");
    icon.classList.add("fa-heart-o");
    icon.style.color = "gray";
  }
}
//sorting

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
//center table

function add_2Row() {
    // Get the table reference
    var table = document.getElementById("sidestoneTable").getElementsByTagName('tbody')[0];

    // Find the index of the row containing the "Add Row" button
    var rowIndex = -1;
    var rows = table.rows;
    for (var i = 0; i < rows.length; i++) {
        if (rows[i].querySelector('.aad_2row')) {
            rowIndex = i;
            break;
        }
    }

    // Create a new row
    var newRow = table.insertRow(rowIndex);

    // Add the first cell with the same content as in the existing rows
    var firstCell = newRow.insertCell(0);
    firstCell.textContent = "Side Stone G-1";

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


function remove_2Row() {
    var table = document.getElementById("sidestoneTable").getElementsByTagName('tbody')[0];

    // Find the index of the row containing the "Add Row" button
    var rowIndex = -1;
    var rows = table.rows;
    for (var i = 0; i < rows.length; i++) {
        if (rows[i].querySelector('.aad_2row')) {
            rowIndex = i;
            break;
        }
    }

    // Ensure there's at least one row to remove
    if (rowIndex > 1) {
        table.deleteRow(rowIndex - 1);
    }
}

//side stone g-1 table

function add_3Row() {
    // Get the table reference
    var table = document.getElementById("sidestone2Table").getElementsByTagName('tbody')[0];

    // Find the index of the row containing the "Add Row" button
    var rowIndex = -1;
    var rows = table.rows;
    for (var i = 0; i < rows.length; i++) {
        if (rows[i].querySelector('.aad_3row')) {
            rowIndex = i;
            break;
        }
    }

    // Create a new row
    var newRow = table.insertRow(rowIndex);

    // Add the first cell with the same content as in the existing rows
    var firstCell = newRow.insertCell(0);
    firstCell.textContent = "Side Stone G-2";

    // Define an array of options for select elements
    var selectOptions = [
        ["Origin", "Origin 1", "Origin 2", "Origin 3"],
        ["Category", "Category 1", "Category 2", "Category 3"],
        ["Name", "Name 1", "Name 2", "Name 3"],
        ["Cut", "Cut 1", "Cut 2", "Cut 3"],
        ["Quality", "Quality 1", "Quality 2", "Quality 3"]
    ];

acdefghijklnmnopqrstuvwxyz
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


function remove_3Row() {
    var table = document.getElementById("sidestone2Table").getElementsByTagName('tbody')[0];

    // Find the index of the row containing the "Add Row" button
    var rowIndex = -1;
    var rows = table.rows;
    for (var i = 0; i < rows.length; i++) {
        if (rows[i].querySelector('.aad_3row')) {
            rowIndex = i;
            break;
        }
    }

    // Ensure there's at least one row to remove
    if (rowIndex > 1) {
        table.deleteRow(rowIndex - 1);
    }
}

// side stone g-2


function add_4Row() {
    // Get the table reference
    var table = document.getElementById("smallstoneTable").getElementsByTagName('tbody')[0];

    // Find the index of the row containing the "Add Row" button
    var rowIndex = 1;
    var rows = table.rows;
    for (var i = 0; i < rows.length; i++) {
        if (rows[i].querySelector('.aad_4row')) {
            rowIndex = i;
            break;
        }
    }

    // Create a new row
    var newRow = table.insertRow(rowIndex);

    // Add the first cell with the same content as in the existing rows
    var firstCell = newRow.insertCell(0);
    firstCell.textContent = "Small Stone G-1";

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

function remove_4Row() {
    var table = document.getElementById("smallstoneTable").getElementsByTagName('tbody')[0];

    // Find the index of the row containing the "Add Row" button
    var rowIndex = -1;
    var rows = table.rows;
    for (var i = 0; i < rows.length; i++) {
        if (rows[i].querySelector('.aad_4row')) {
            rowIndex = i;
            break;
        }
    }

    // Ensure there's at least one row to remove
    if (rowIndex > 1) {
        table.deleteRow(rowIndex - 1);
    }
}

//small stone g-1

function addRow() {
    var table = document.getElementById("centerstonesizeTable").getElementsByTagName('tbody')[0];
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

  function removeRow() {
    var table = document.getElementById("centerstonesizeTable").getElementsByTagName('tbody')[0];
    if (table.rows.length > 2) { // Ensure there are at least two rows (including the add/remove row buttons)
      table.deleteRow(table.rows.length - 2); // Remove the second-to-last row
    }
  }

 // centerstone size table
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
 //side stone size table

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
  }

  function removeRow_1() {
    var table = document.getElementById("smallstonesizeTable").getElementsByTagName('tbody')[0];
    if (table.rows.length > 2) { // Ensure there are at least two rows (including the add/remove row buttons)
      table.deleteRow(table.rows.length - 2); // Remove the second-to-last row
    }
  }

//small stone size table  
$('.btn-number').click(function(e){
  e.preventDefault();
  
  fieldName = $(this).attr('data-field');
  type      = $(this).attr('data-type');
  var input = $("input[name='"+fieldName+"']");
  var currentVal = parseInt(input.val());
  if (!isNaN(currentVal)) {
      if(type == 'minus') {
          
          if(currentVal > input.attr('min')) {
              input.val(currentVal - 1).change();
          } 
          if(parseInt(input.val()) == input.attr('min')) {
              $(this).attr('disabled', true);
          }

      } else if(type == 'plus') {

          if(currentVal < input.attr('max')) {
              input.val(currentVal + 1).change();
          }
          if(parseInt(input.val()) == input.attr('max')) {
              $(this).attr('disabled', true);
          }

      }
  } else {
      input.val(0);
  }
});
$('.input-number').focusin(function(){
 $(this).data('oldValue', $(this).val());
});
$('.input-number').change(function() {
  
  minValue =  parseInt($(this).attr('min'));
  maxValue =  parseInt($(this).attr('max'));
  valueCurrent = parseInt($(this).val());
  
  name = $(this).attr('name');
  if(valueCurrent >= minValue) {
      $(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
  } else {
      alert('Sorry, the minimum value was reached');
      $(this).val($(this).data('oldValue'));
  }
  if(valueCurrent <= maxValue) {
      $(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
  } else {
      alert('Sorry, the maximum value was reached');
      $(this).val($(this).data('oldValue'));
  }
  
  
});
$(".input-number").keydown(function (e) {
      // Allow: backspace, delete, tab, escape, enter and .
      if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
           // Allow: Ctrl+A
          (e.keyCode == 65 && e.ctrlKey === true) || 
           // Allow: home, end, left, right
          (e.keyCode >= 35 && e.keyCode <= 39)) {
               // let it happen, don't do anything
               return;
      }
      // Ensure that it is a number and stop the keypress
      if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
          e.preventDefault();
      }
  });

  //add to cart quantity
  $(document).ready(function() {
    $('#my_cart').click(function(event) {
      event.stopPropagation();
      $(".my_cart").slideDown("slow");
    });

    $('#close_cart').click(function(event) {
      event.stopPropagation();
      $(".my_cart").slideUp("slow");
    });

    $(".my_cart").on("click", function (event) {
      event.stopPropagation();
    });

    $(document).on("click", function () {
      $(".my_cart").slideUp("slow");
    });
  });

  $(document).ready(function() {
    $('#my_cart').click(function(event) {
      event.stopPropagation();
      $(".my_cart").slideDown("slow");
    });

    $('#close_cart').click(function(event) {
      event.stopPropagation();
      $(".my_cart").slideUp("slow");
    });

    $(".my_cart").on("click", function (event) {
      event.stopPropagation();
    });

    $(document).on("click", function () {
      $(".my_cart").slideUp("slow");
    });
  });


  $(document).ready(function() {
    $('#my_cart_mo').click(function(event) {
      event.stopPropagation();
      $(".my_cart").slideDown("slow");
    });

    $('#close_cart').click(function(event) {
      event.stopPropagation();
      $(".my_cart").slideUp("slow");
    });

    $(".my_cart").on("click", function (event) {
      event.stopPropagation();
    });

    $(document).on("click", function () {
      $(".my_cart").slideUp("slow");
    });
  });
  //cart view