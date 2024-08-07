document.addEventListener("DOMContentLoaded", function() {
  const toggleButtons = document.querySelectorAll(".toggle-button");

  toggleButtons.forEach(function(button) {
      button.addEventListener("click", function() {
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
// var selectorcolor = '.color_type';
// $(selectorcolor).on('click', function() {
//   $(this).toggleClass('active');
//   var checkbox = $(this).siblings('input[type="checkbox"]');
//   $(this).toggleClass('active');
//   checkbox.prop('checked', !checkbox.prop('checked'));
// });

// $('input[type="checkbox"],.color_type').on('change', function() {
//   var shape_color = $(this).siblings('.color_type');
//   shape_color.toggleClass('active', $(this).prop('checked'));
// });

$('.color_type').on('click', function() {
  var checkbox = $(this).find('input[type="checkbox"]');
  var isChecked = checkbox.prop('checked');
  $(this).toggleClass('active');
  checkbox.prop('checked', !isChecked);
  updateActiveState(checkbox, $(this));
});

$('input[type="checkbox"]').on('change', function() {
  var colorType = $(this).closest('.color_type');
  colorType.toggleClass('active', $(this).prop('checked'));
  updateActiveState($(this), colorType);
});

function updateActiveState(checkbox, colorType) {
  var isChecked = checkbox.prop('checked');
  var isColorTypeActive = colorType.hasClass('active');
  
  if (isChecked && isColorTypeActive) {
    checkbox.add(colorType).addClass('active');
  } else {
    checkbox.add(colorType).removeClass('active');
  }
}
//color letter active
//clarity letter active
$('.clarity').on('click', function() {
  var checkbox  = $(this).find('input[type="checkbox"]');
  var isChecked = checkbox.prop('checked');
  $(this).toggleClass('active');
  checkbox.prop('checked', !isChecked);
  updateActiveState(checkbox, $(this));
});

$('input[type="checkbox"]').on('change', function() {
  var clarityType = $(this).closest('.clarity');
  clarityType.toggleClass('active', $(this).prop('checked'));
  updateActiveState($(this), clarityType);
});

function updateActiveState(checkbox, clarityType) {
  var isChecked = checkbox.prop('checked');
  var isClarityActive = clarityType.hasClass('active');
  
  if (isChecked && isClarityActive) {
    checkbox.add(clarityType).addClass('active');
  } else {
    checkbox.add(clarityType).removeClass('active');
  }
}
//color letter active

//fancy clarity letter active
$('.fancy_advance').on('click', function() {
  var checkbox  = $(this).find('input[type="checkbox"]');
  var isChecked = checkbox.prop('checked');
  $(this).toggleClass('active');
  checkbox.prop('checked', !isChecked);
  updateActiveState(checkbox, $(this));
});

$('input[type="checkbox"]').on('change', function() {
  var clarityType = $(this).closest('.clarity');
  clarityType.toggleClass('active', $(this).prop('checked'));
  updateActiveState($(this), clarityType);
});

function updateActiveState(checkbox, clarityType) {
  var isChecked = checkbox.prop('checked');
  var isClarityActive = clarityType.hasClass('active');
  
  if (isChecked && isClarityActive) {
    checkbox.add(clarityType).addClass('active');
  } else {
    checkbox.add(clarityType).removeClass('active');
  }
}

//fancy shape letter active
$('.fancy_advance').on('click', function() {
  var checkbox  = $(this).find('input[type="checkbox"]');
  var isChecked = checkbox.prop('checked');
  $(this).toggleClass('active');
  checkbox.prop('checked', !isChecked);
  updateActiveState(checkbox, $(this));
});

$('input[type="checkbox"]').on('change', function() {
  var clarityType = $(this).closest('.clarity');
  clarityType.toggleClass('active', $(this).prop('checked'));
  updateActiveState($(this), clarityType);
});

function updateActiveState(checkbox, clarityType) {
  var isChecked = checkbox.prop('checked');
  var isClarityActive = clarityType.hasClass('active');
  if (isChecked && isClarityActive) {
    checkbox.add(clarityType).addClass('active');
  } else {
    checkbox.add(clarityType).removeClass('active');
  }
}

// JavaScript
var selector_shape = '.shape_image';
$(selector_shape).on('click', function() {
  $(this).toggleClass('active');
  // Trigger click event on the associated checkbox
  var checkbox = $(this).siblings('input[type="checkbox"]');
  $(this).toggleClass('active');
  checkbox.prop('checked', !checkbox.prop('checked'));
});

// Optional: You can also handle the checkbox change event to update the shape's class
$('input[type="checkbox"]').on('change', function() {
  var shape = $(this).siblings('.shape_image');
  shape.toggleClass('active', $(this).prop('checked'));
});
//Fancy Color Filter active

// JavaScript
var selector = '.gia span';

$(selector).on('click', function() {
  $(this).toggleClass('active');

  // Trigger click event on the associated checkbox
  var checkbox = $(this).siblings('input[type="checkbox"]');
  $(this).toggleClass('active');
  checkbox.prop('checked', !checkbox.prop('checked'));
});

// Optional: You can also handle the checkbox change event to update the shape's class
$('input[type="checkbox"]').on('change', function() {
  var shape = $(this).siblings('.gia span');
  shape.toggleClass('active', $(this).prop('checked'));
});

//intencity Color Filter active
var selector = '.intencity_type span';
$(selector).on('click', function() {
  $(this).toggleClass('active');
  // Trigger click event on the associated checkbox
  var checkbox = $(this).siblings('input[type="checkbox"]');
  $(this).toggleClass('active');
  checkbox.prop('checked', !checkbox.prop('checked'));
});

// Optional: You can also handle the checkbox change event to update the shape's class
$('input[type="checkbox"], .intencity_type span').on('change', function() {
  var intencity = $(this).siblings('.intencity_type span');
  intencity.toggleClass('active', $(this).prop('checked'));
});

//Overtone Color Filter active
var selector = '.colortone_type span';
$(selector).on('click', function() {
  $(this).toggleClass('active');
  // Trigger click event on the associated checkbox
  var checkbox = $(this).siblings('input[type="checkbox"]');
  $(this).toggleClass('active');
  checkbox.prop('checked', !checkbox.prop('checked'));
});

// Optional: You can also handle the checkbox change event to update the shape's class
$('input[type="checkbox"], .colortone_type span').on('change', function() {
  var intencity = $(this).siblings('.colortone_type span');
  intencity.toggleClass('active', $(this).prop('checked'));
});


var selectedFilterData = [];
//select shape
var selector = '.shape_image';
var selectedValues = {};
selectedValues.shapes = new Array();
$(selector).on('click', function() {
  var dataTargetValue = $(this).closest('.shape').data('target');
  var toggle = $(this).toggleClass('active').hasClass('active');
  if (toggle) {
      selectedValues.shapes.push(dataTargetValue);
  } else {
      var index = selectedValues.shapes.findIndex(function(item) {
          return item == dataTargetValue
      });
      selectedValues.shapes.splice(index, 1)
  }
});

selectedValues.otherData = new Array();
$('#quick_search_btn').click(function() {
  // Initialize selectedValues if it's undefined or null
  if (!selectedValues) {
      selectedValues = {};
  }
  // Initialize selectedValues.bestcolor if it's undefined or null
  if (!selectedValues.bestcolor || !selectedValues.bestclarity || !selectedValues.goodcolor || !selectedValues.goodclarity || !selectedValues.averagecolor || !selectedValues.averageclarity) {
      selectedValues.bestcolor = [];
      selectedValues.bestclarity = [];
      selectedValues.goodcolor = [];
      selectedValues.goodclarity = [];
      selectedValues.averagecolor = [];
      selectedValues.averageclarity = [];
  }
  // Initialize selectedValues.otherData if it's undefined or null
  if (!selectedValues.otherData) {
      selectedValues.otherData = [];
  }

  // Iterate over checked checkboxes and push their values into selectedValues.otherData
  // $('.myCheckbox:checked').each(function() {
  //   alert('Hii');
  //   let checkbox        = $(this);
  //   let color           = checkbox.data('color');
  //   let clarity         = checkbox.data('clarity');
  //   // let best_color      = $('#best').data('color'); 
  //   // let best_clarity    = $('#best').data('clarity');
  //   // let good_color      = $('#good').data('color');
  //   // let good_clarity    = $('#good').data('clarity');
  //   // let average_color   = $('#average').data('color');
  //   // let average_clarity = $('#average').data('clarity');
  //   let value = `${color}_${clarity}`;
  //   if (selectedValues.otherData.indexOf(value) === -1) {
  //     // selectedValues.bestcolor.push(best_color);
  //     // selectedValues.bestclarity.push(best_clarity);
  //     // selectedValues.goodcolor.push(good_color);
  //     // selectedValues.goodclarity.push(good_clarity);
  //     selectedValues.color.push(color);
  //     selectedValues.clarity.push(clarity);
  //     selectedValues.otherData.push(value);
  //   }
  //   // if(selectedValues.otherData.indexOf(checkbox.value) === -1) {
  //   //   selectedValues.otherData.push($(this).val());
  //   // }
  // });

  $('.myCheckbox:checked').each(function() {
      let checkbox = $(this);
      let color    = checkbox.data('color');
      let clarity  = checkbox.data('clarity');
      let value    = `${color}_${clarity}`;

      if (!selectedValues) {
          selectedValues = {
              color: [],
              clarity: [],
              otherData: []
          };
      }
      selectedValues.color = selectedValues.color || [];
      selectedValues.clarity = selectedValues.clarity || [];

      if (!selectedValues.color.includes(color)) {
          selectedValues.color.push(color);
      }

      if (!selectedValues.clarity.includes(clarity)) {
          selectedValues.clarity.push(clarity);
      }

      if (!selectedValues.otherData.includes(value)) {
          selectedValues.otherData.push(value);
      }
  });
  sessionStorage.setItem("objectdata", JSON.stringify(selectedValues));
  window.location.href = 'products?status=true';
});


// var selectedCheckboxValues = [];
//selectedValues.otherData = new Array();
//selectedValues.bestcolor = new Array();
//$('#quick_search_btn').click(function() {
//let best_color         = $('#best').data('color');//DEF
// let best_clarity    = $('#best').data('clarity');
// let good_color      = $('#good').data('color');
// let good_clarity    = $('#good').data('clarity');
// let average_color   = $('#average').data('color');
// let average_clarity = $('#average').data('clarity');
//selectedValues.bestcolor.push(best_color);
// selectedValues.otherData.push(best_clarity);
// selectedValues.otherData.push(good_color);
// selectedValues.otherData.push(good_clarity);
// selectedValues.otherData.push(average_color);
// selectedValues.otherData.push(average_clarity);
// var checkboxes = document.querySelectorAll('.myCheckbox:checked');
//   checkboxes.forEach(function(checkbox) {
//     if(selectedValues.otherData.indexOf(checkbox.value) === -1) {
//       selectedValues.otherData.push();
//       selectedValues.bestcolor.push();
//     }
// });
// $('.myCheckbox:checked').each(function() {
//   selectedValues.otherData.push($(this).val());
// });
// sessionStorage.setItem("objectdata",JSON.stringify(selectedValues));
//window.location.href =  'products?status=true';  //?objectdata=' + JSON.stringify(selectedValues)
/* $.ajax({
  type: 'POST',
  url: 'get-products-filter',
  data: {filterData: selectedValues},
  dataType: "json",
  success: function(response) {
      console.log(response); 
      // if (response && response.response && response.response.body) {
      //     const diamondsData = response.response.body.diamonds;
      //     if (Array.isArray(diamondsData)) {
      //         diamondsData.forEach(diamondData => {
      //             const videoElementId = `video_${diamondData.id}`;
      //             const imageElementId = `image_${diamondData.id}`;
      //             let decimalNumber    = diamondData.size;
      //             let sizeElementId    = decimalNumber.toString().split('.')[0];
      //             let afterDot         = decimalNumber.toString().split('.')[1];
      //             let caretMarge       = sizeElementId.concat("-", afterDot);
      //             let number           = diamondData.total_sales_price * 5;
      //             let roundedUpNumber  = Math.ceil(number);
      //             $('#product_filter_container').append(`
      //             <div class="col-md-3"  id="${diamondData.id}">
      //             <a  style="text-decoration:none"  href="product-view/${diamondData.id}">
      //                 <div id="${imageElementId}">
      //                     <img src="${diamondData.image_url}" class="img-fluid mymultiplediv" id="vvs22">
      //                 </div>
      //                 <p class="image_description">
      //                 <h2 style="font-size: 1.15rem;"> ${decimalNumber} Carat ${diamondData.shape} Lab Diamond </h2>
      //                 <p>${diamondData.cut} | ${diamondData.lab} | ${diamondData.clarity} ;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rs.${roundedUpNumber}.00</p>
      //                 <p>Shape: ${diamondData.shape} |  Color: ${diamondData.color}
      //                 <a href="${diamondData.cert_url}" title="Diamond certificate" class="pull right" target="_blank"><i class="fa fa-certificate"></i></a> </p>                
      //             </a>
      //             </div>
      //         `);
      //         });
      //     }
      // } else {
      //     console.error("Invalid JSON format or missing properties.");
      // }
  },
  error: function(error) {
      console.error('Error fetching API data:', error);
  }
}); */
//});
//select color

var selector = '.fancy_advance';
$(selector).on('click', function() {
  //$(selector).addClass('active');
  $(this).toggleClass('active');
});

//show def color

// select clarity show
var selector = '.colortone span';
$(selector).on('click', function() {
  //$(selector).addClass('active');
  $(this).toggleClass('active');
});
//color fancy  active

var selector = '.intencity span';
$(selector).on('click', function() {
  //$(selector).addClass('active');
  $(this).toggleClass('active');

});
//intencity  active

var selector = '.certi span';
$(selector).on('click', function() {
  //$(selector).addClass('active');
  $(this).toggleClass('active');

});

var selector = '.round_vv';
$(selector).on('click', function() {
  //$(selector).addClass('active');
  $(this).toggleClass('active');
});

//$(document).ready(function() {
  // $('.gia input[type="text"]').click(function(event) {
  //   let selected = $(this).val(); // Get the value of the clicked text input
  //   if ($(this).is('[selected]')) { // Check if the input already has the "selected" attribute
  //     $(this).removeAttr('selected'); // If it does, remove the "selected" attribute
  //   } else {
  //     $(this).attr('selected', 'selected'); // Otherwise, add the "selected" attribute to the clicked input
  //   }
  // });
//});

//certi span active

var selector = '.product_shap';
$(selector).on('click', function() {
  $(this).toggleClass('active');
});

//center stone active

$(document).ready(function() {
  $("#hide").click(function() {
      $(".second_catelouge").slideToggle('');
  });
});

$(function() {
  //toggle two classes on button element
  $('#hide').on('click', function() {
      $('#hide').toggleClass('clicked');
  });
});
//product mega menu toogle


$(document).ready(function() {
  $('#sort').click(function(event) {
      event.stopPropagation();
      $("#input_range").slideToggle("slow");
  });
  $("#input_range").on("click", function(event) {
      event.stopPropagation();
  });
});

$(document).on("click", function() {
  $("#input_range").hide();
});


$(function() {
  $('.slider').on('input change', function() {
      $(this).next($('.slider_label')).html(this.value);
  });
  $('.slider_label').each(function() {
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
  offset: {
      vertical: 0,
      horizontal: 10
  }
};

// Initialize ImageZoom for all elements with the class "img-zoom-container"
initializeImageZoomForClass("img-zoom-container", options2);
//zoom effect


// var checkboxes = document.querySelectorAll('.myCheckbox');
// checkboxes.forEach(function(checkbox) {
//     checkbox.addEventListener('click', function() {
//         var targetId = checkbox.getAttribute('data-target');
//         alert(targetId);
//         var targetElement = document.getElementById(targetId);
//         if (targetElement) { // Check if targetElement exists
//             if (checkbox.checked) {
//                 targetElement.style.display = 'inline';
//             } else {
//                 targetElement.style.display = 'none';
//             }
//         } else {
//             console.error("Element with ID '" + targetId + "' not found.");
//         }
//     });
// });


//breadcrumb for checkbox in quick search 
// const checkboxes = document.querySelectorAll('.myCheckbox');
// checkboxes.forEach(shbr => {
//   shbr.addEventListener('click', function() {
//       const target = this.getAttribute('data-target');
//       const associatedLi = document.getElementById(target);
//       const otherBreadcrumbs = document.querySelectorAll('#breadcrumb li[id]:not([id="' + target + '"])');

//       // Toggle the display of the breadcrumb span
//     if (!this.checked) {
//       // If the checkbox is unchecked and the associated breadcrumb item exists, remove it
//       if (associatedLi) {
//         associatedLi.remove();
//       }
//     }
//     //associatedLi.style.display = (associatedLi.style.display === 'none') ? 'inline' : 'none';

//   });
// });
//End breadcrumb for checkbox in quick search 

// document.addEventListener('DOMContentLoaded', function() {
//     const shapes = document.querySelectorAll('.shbr');
//     shapes.forEach(shbr => {
//         shbr.addEventListener('click', function() {
//             const target = this.getAttribute('data-target');
//             alert(target);
//             const associatedLi = document.getElementById(target);
//             const otherBreadcrumbs = document.querySelectorAll('#breadcrumb_advance li[id]:not([id="' + target + '"])');

//             if (!this.checked) {
//               // If the checkbox is unchecked and the associated breadcrumb item exists, remove it
//               if (associatedLi) {
//                 associatedLi.remove();
//               }
//             }
//             // Check if associatedLi is not null before accessing its style property
//             // if (associatedLi) {
//             //     // Toggle the display of the breadcrumb span
//             //     associatedLi.style.display = (associatedLi.style.display === 'none') ? 'inline' : 'none';
//             // }
//         });
//     });
// });


document.addEventListener('DOMContentLoaded', function() {
    const shapes = document.querySelectorAll('.myCheckbox_advance');
    shapes.forEach(shbr => {
        shbr.addEventListener('click', function() {
            const target = this.getAttribute('data-target');
            if (target) { // Check if the target attribute is not null or empty.
                const associatedLi = document.getElementById(target);
                //alert(target); // Alert the target to debug/check functionality.
                const otherBreadcrumbs = document.querySelectorAll('#breadcrumb_advance li[id]:not([id="' + target + '"])');
                //console.log(otherBreadcrumbs); // Log other breadcrumbs to debug/check.

                // If the checkbox is unchecked and the associated breadcrumb item exists, remove it
                if (!this.checked && associatedLi) {
                    associatedLi.remove();
                }

                // Add else if or else here if you need to handle the case when the checkbox is checked.
            }
        });
    });
});

//breadcrums list in Advance  search 

document.addEventListener('DOMContentLoaded', function() {
    const fancy_shapes = document.querySelectorAll('.myCheckbox_fancy');
    fancy_shapes.forEach(fancyshape => {
        fancyshape.addEventListener('click', function() {
            const target = this.getAttribute('data-target');
            //alert(target);
            if(target) { // Check if the target attribute is not null or empty.
                const fancyLi = document.getElementById(target);
                //alert(target); // Alert the target to debug/check functionality.
                const fancyBreadcrumbs = document.querySelectorAll('#breadcrumb_fancy li[id]:not([id="' + target + '"])');
                console.log(fancyBreadcrumbs); // Log other breadcrumbs to debug/check.
                // If the checkbox is unchecked and the associated breadcrumb item exists, remove it
                if (!this.checked && fancyLi) {
                    fancyLi.remove();
                }
            }
        });
    });
});


// const advanceshapes = document.querySelectorAll('.shbr');
// advanceshapes.forEach(shbr => {
//   advanceshapes.addEventListener('click', function() {
//       const target = this.getAttribute('data-target');
//       const advanceshapesLi = document.getElementById(target);
//       const otherBreadcrumbs = document.querySelectorAll('#breadcrumb_advance li[id]:not([id="' + target + '"])');
//       advanceshapesLi.style.display = (advanceshapesLi.style.display === 'none') ? 'inline' : 'none';

//   });
// });

//breadcrums list in quick search 

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

$(document).ready(function() {
  // Add hover event handler to table rows
  $('table tbody tr').hover(
      function() {
          // Show the popup when hovering over a row
          $(this).find('.tbl-popup').show();
      },
      function() {
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

//for filterv breadcrumb

$(document).ready(function() {

  $(".fa-search").click(function() {
      $(".wrap, .input").toggleClass("active");
      $("input[type='text']").focus();
  });

});
//search resize

$(document).ready(function() {
  $('.sum_info').click(function() {
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
  engravedText.textContent = engravingText;
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

$(document).ready(function() {
  $('.risize_btn').click(function() {
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
radioButtons.forEach(function(radioButton) {
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
$(document).ready(function() {
  $('.wri_re').click(function() {
      $('.write_review').slideToggle('slow')
  })
});

//review toggle
$(document).ready(function() {
  var changebox = $(".changebox");

  var firstclone = changebox.children(":first").clone();
  changebox.append(firstclone);

  var fsstr = changebox.parent().css("font-size");
  fsstr = fsstr.slice(0, fsstr.indexOf("p"));
  var fs = parseInt(fsstr);

  changebox.css("height", changebox.parent().css("font-size"));
  ChangeSize(0);
  setInterval(Next, 2000);

  function Next() {
      if (typeof Next.i == 'undefined') {
          Next.i = 0;
      }
      Next.i++;
      if (Next.i == changebox.children("span").length) {
          Next.i = 1;
          changebox.scrollTop(0);
      }
      changebox.animate({
          scrollTop: (fs * Next.i) + Next.i * 5 + 3
      }, 500);
      setTimeout(function() {
          ChangeSize(Next.i);
      }, 500);

  }

  function ChangeSize(i) {
      var word = changebox.children("span").eq(i);
      var wordsize = word.css("width");
      changebox.css("width", wordsize);
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
document.addEventListener("click", function(event) {
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

function showNecklace(type) {
  // Hide all sections
  document.querySelectorAll('.single-line, .double-line, .three-line').forEach(section => {
      section.style.display = 'none';
  });

  // Show the selected section
  document.querySelector(`.${type}`).style.display = 'block';
}

//btn active for single double three line


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
//  <script>
//  $(document).ready(function() {
//     // Function to update breadcrumb based on stored data
//     function updateBreadcrumbFromStorage() {
//        var breadcrumbData = sessionStorage.getItem('breadcrumb');
//        if (breadcrumbData) {
//              $('#breadcrumb').html(breadcrumbData);
//        }
//     }
//     // Update breadcrumb on page load
//     updateBreadcrumbFromStorage();
//     // Add event listener to handle click on each '.myCheckbox' individually
//     $('.myCheckbox').each(function() {
//        $(this).on('click', function() {
//              var value = $(this).val();
//              var target = $(this).data('target');
//              var breadcrumbItem = `<li id="${target}">${value} <i class="fa fa-times"></i></li>`;

//              // Check if the checkbox is checked
//              if (this.checked) {
//                 // Check if the item already exists in the breadcrumb
//                 if ($('#breadcrumb').find(`#${target}`).length === 0) {
//                    // Add item to the breadcrumb
//                    $('#breadcrumb').append(breadcrumbItem);

//                    // Update sessionStorage with the current breadcrumb HTML
//                    sessionStorage.setItem('breadcrumb', $('#breadcrumb').html());
//                 }
//              } else {
//                 // Remove item from the breadcrumb
//                 $('#' + target).remove();

//                 // Update sessionStorage with the current breadcrumb HTML
//                 sessionStorage.setItem('breadcrumb', $('#breadcrumb').html());
//              }
//        });
//     });
//     // Event delegation to handle click on '.fa.fa-times'
//     $('#breadcrumb').on('click', '.fa fa-times', function() {
//        alert('Hii');
//        var target = $(this).parent().attr('id');
//        $(this).parent().remove(); // Remove the parent <li> element
//        // Update sessionStorage with the current breadcrumb HTML
//        sessionStorage.setItem('breadcrumb', $('#breadcrumb').html());
//     });
//  });
//  </script>