
$(document).ready(function() {
$("#countries").msDropdown();
})

$(document).ready(function() {
  $("#sidebarCollapse").on("click", function() {
    $("#sidebar").addClass("active");
  });

  $("#sidebarCollapseX").on("click", function() {
    $("#sidebar").removeClass("active");
  });

  $("#sidebarCollapse").on("click", function() {
    if ($("#sidebar").hasClass("active")) {
      $(".overlay").addClass("visible");
      console.log("it's working!");
    }
  });

  $("#sidebarCollapseX").on("click", function() {
    $(".overlay").removeClass("visible");
  });
});
//menu end


//tab start
$('.tab-nav span').on('click', function() {
  var targetTab = $($(this).data('href'));

  // Check if the clicked tab is already active
  if ($(this).parent().hasClass('active')) {
    // If it is, hide the corresponding tab content with a smooth slide-up animation
    targetTab.slideUp('slow', function() {
      $(this).removeClass('active');
    });
    $(this).parent().removeClass('active');
  } else {
    // If it's not, perform the regular tab switching logic with a smooth slide-down animation
    targetTab.siblings('.tab').slideUp('slow').removeClass('active');
    targetTab.slideDown('slow').addClass('active');
    
    // Remove 'active' class from other tabs
    $(this).parent().siblings().removeClass('active');
    
    // Add 'active' class to the clicked tab
    $(this).parent().addClass('active');
  }
});


$(document).ready(function(){
  $('.tabbed ul li').on('click', function() {
    // Remove 'active' class from all <li> elements inside the same <ul>
    $(this).siblings().removeClass('active');
    
    // Add 'active' class to the clicked <li>
    $(this).addClass('active');
    
    var target = $(this).data('href');
    
    // Add 'active' class to the corresponding tab content
    $(target).addClass('active').siblings('.tab').removeClass('active');
  });
})

//tabbed end

var header = $('header');
  var shrinkIt = header.height();

  $(window).scroll(function() {
    var scroll = $(window).scrollTop();

    if ( scroll >= shrinkIt ) {
      header.addClass('shrunk');
    }
    else {
      header.removeClass('shrunk');
    }
  });


//header

document.querySelectorAll('.toggle-section').forEach(button => {
  button.addEventListener('click', function() {
    var target = document.querySelector(this.dataset.target);
    if (target.style.display === 'none') {
      target.style.display = 'block';
      this.textContent = 'Show Less';
    } else {
      target.style.display = 'none';
      this.textContent = 'Show More';
    }
  });
});

//filter menu



 /* select function */
 var fnSelect = function() {
  var selectData = document.querySelectorAll('.select .select-data');
  selectData.forEach(function(_this) {
    var dataOption = _this.querySelectorAll('option');
    var _thisSelect = _this.closest('.select');
    if (dataOption.length) {
      var addSelectUI = document.createElement('div');
      addSelectUI.setAttribute('class', 'select-ui');
      _thisSelect.append(addSelectUI);

      var addLabel = document.createElement('button');
      addLabel.setAttribute('class', 'label');
      _thisSelect.querySelector('.select-ui').append(addLabel);

      var addOptions = document.createElement('ul');
      addOptions.setAttribute('class', 'options scrollbar');
      _thisSelect.querySelector('.select-ui').append(addOptions);

      dataOption.forEach(function(_option, _index){
        if (_option.selected === true) {
          var addSelectedTxt = document.createElement('span');
          _thisSelect.querySelector('.select-ui .label').append(addSelectedTxt);
          _thisSelect.querySelector('.select-ui .label span').innerHTML = _option.innerHTML;
        }
        var addOptionList = document.createElement('li');
        if (_option.selected === true) {
          addOptionList.setAttribute('class', 'item is-active');
        } else {
          addOptionList.setAttribute('class', 'item');
        }
        _thisSelect.querySelector('.select-ui .options').append(addOptionList);
        _thisSelect.querySelector('.select-ui .options').children[_index].innerHTML = _option.innerHTML;
      });
    }
  });
};
fnSelect();

var fnSelectClose = function() {
  var selectUIOptions = document.querySelectorAll('.select .select-ui .options');
  selectUIOptions.forEach(function(_this) {
    _this.closest('.select-ui').classList.remove('is-open');
    _this.classList.remove('show-up', 'show-down');
  });
};

var fnSelectOpen = function() {
  var selectLabel = document.querySelectorAll('.select .select-ui .label');
  selectLabel.forEach(function(_this) {
    _this.addEventListener('click', function() {
      var _thisParent = this.closest('.select-ui');
      var _thisOptions = _thisParent.querySelector('.options');
  
      if (_thisParent.classList.contains('is-open')) {
        _thisParent.classList.remove('is-open');
        _thisOptions.classList.remove('show-up', 'show-down');
        return true;
      } else {
        fnSelectClose();
        _thisParent.classList.add('is-open');
        if (this.getBoundingClientRect().top > (screen.height / 2)) {
          _thisOptions.classList.add('show-up');
        } else {
          _thisOptions.classList.add('show-down');
        }
      }
  
    });
  });
};
fnSelectOpen();

var fnSelectOption = function() {
  var selectItem = document.querySelectorAll('.select .select-ui .options .item');
  selectItem.forEach(function(_this) {
    _this.addEventListener('click', function(e){
      var _thisParent = this.closest('.select');

      var selectIdx = [...e.target.parentElement.children].indexOf(e.target);
      _thisParent.querySelector('.select-data').children[selectIdx].selected = true;
  
      _thisParent.querySelector('.select-ui .label').innerHTML = this.innerHTML;
  
      _thisParent.querySelectorAll('.select-ui .options .item').forEach(function(_item){
        _item.classList.remove('is-active');
      });

      this.classList.add('is-active');
      fnSelectClose();
    });
  });
};

fnSelectOption();
/*select */
 
$("input:file").change(function (){
    var fileName = $(this).val();
    if(fileName.length >0){
    $(this).parent().children('span').html(fileName);
    }
    else{
      $(this).parent().children('span').html("Choose file");

    }
  });
  //file input preview
  function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();            
        reader.onload = function (e) {
            $('.logoContainer img').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
  }
  $("input:file").change(function(){
      readURL(this);
  });


//image upload
function sortTable(columnName) {
        var table, rows, switching, i, x, y, shouldSwitch;
        table = document.querySelector('.fl-table');
        switching = true;

        while (switching) {
            switching = false;
            rows = table.rows;

            for (i = 1; i < rows.length - 1; i++) {
                shouldSwitch = false;
                x = rows[i].querySelector('td[data-sort="' + columnName + '"]').innerHTML.toLowerCase();
                y = rows[i + 1].querySelector('td[data-sort="' + columnName + '"]').innerHTML.toLowerCase();

                // Check if the two rows should switch places
                if (x > y) {
                    shouldSwitch = true;
                    break;}

                            }

            if (shouldSwitch) {
                rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                switching = true;
            }
        }
    }

// table sorting  

 $('.palceholder').click(function() {
  $(this).siblings('input','textarea').focus();
});
$('.form-control').focus(function() {
  $(this).siblings('.palceholder').hide();
});
$(document).on('blur', '.form-control', function() {
  var $this = $(this);
  if ($this.val().length == 0) {
    $this.siblings('.palceholder').show();
  }
});
$('.form-control').blur();

//b2c

$(document).ready(function() {
  // Initialize tooltips
  $('[data-toggle="tooltip"]').tooltip();

  // Hide tooltip when clicking outside
  $(document).on("click", function(event) {
    if (!$(event.target).closest('[data-toggle="tooltip"]').length) {
      $('[data-toggle="tooltip"]').tooltip("hide");
    }
  });
});
//tooltip mega menu
$('.moreless').click(function() {
    var index = $(this).data('index');
    var $moretext = $('.moretext[data-index="' + index + '"]');
    
    $moretext.slideToggle();
    
    if ($(this).text() === "Read Less") {
      $(this).text("Read More");
    } else {
      $(this).text("Read Less");
    }
  });


const buttons = document.querySelectorAll('.moreless-button');
    
    buttons.forEach(button => {
        let contentVisible = false;
        
        button.addEventListener('click', () => {
            const content = button.nextElementSibling;
            content.style.display = contentVisible ? 'none' : 'block';
            button.textContent = contentVisible ? 'Read More' : 'Read Less';
            contentVisible = !contentVisible;
        });
    });

//read more

$(document).ready(function(){
    $('.well-sm').click(function(event){
        event.stopPropagation();
         $(".advance_search_drop").slideToggle("slow");
    });
    $(".advance_search_drop").on("click", function (event) {
        event.stopPropagation();
    });
});

$(document).on("click", function () {
    $(".advance_search_drop").hide();
});

//advance serach

/*$(document).ready(function(){
  $('.quick_table').click(function(event){
      event.stopPropagation();
       $(".quick_table_drop").slideToggle("slow");
  });
  $(".quick_table_drop").on("click", function (event) {
      event.stopPropagation();
  });
});

$(document).on("click", function () {
  $(".quick_table_drop").hide();
});*/

//advance serach

document.addEventListener('DOMContentLoaded', function () {
    var filter = document.querySelector('.filter');
    var filterItems = filter.querySelectorAll('li');

    // Hide all nested ul elements
    function hideAllNestedULs() {
        filterItems.forEach(function (item) {
            item.classList.remove('active');
        });
    }

    filterItems.forEach(function (item) {
        item.addEventListener('click', function (event) {
            // If the clicked li is already active, hide its nested ul
            if (this.classList.contains('active')) {
                this.classList.remove('active');
            } else {
                // Toggle 'active' class on the clicked li element
                hideAllNestedULs();
                this.classList.add('active');
            }

            // Toggle the 'up' class on the icon
            var icon = this.querySelector('i.fa');
            if (icon) {
                icon.classList.toggle('fa-caret-up', this.classList.contains('active'));
            }

            // Stop event propagation to prevent the click outside from triggering immediately
            event.stopPropagation();
        });
    });

    // Attach click event listener to document body to hide all nested ul elements when clicking outside
    document.body.addEventListener('click', function () {
        hideAllNestedULs();
        // Remove 'up' class from all icons when clicking outside
        filterItems.forEach(function (item) {
            var icon = item.querySelector('i.fa');
            if (icon) {
                icon.classList.remove('fa-caret-up');
            }
        });
    });
});

//filters

//outside click

$(document).ready(function(){
    $('#open_menu').click(function(event){
        event.stopPropagation();
         $("#sub_content").slideToggle("slow");
    });
    $("#sub_content").on("click", function (event) {
        event.stopPropagation();
    });
});

$(document).on("click", function () {
    $("#sub_content").hide();
});
  // india english rup.

$(document).ready(function(){
    $('.mymultiplediv').mouseover(function() {
        myvar = this.id;
        $('#div'+myvar).show();
    });
});

$(document).ready(function(){
    $('.mymultiplediv').mouseleave(function() {
        myvar = this.id;
        $("div.mydiv").hide();
        
    });
});

 //image show on hover
   $(function(){
      $('li.dropdown > a').on('click',function(event){
        event.preventDefault();
        $(this).toggleClass('selected');
        $(this).parent().find('ul').first().toggle(300);
        $(this).parent().siblings().find('ul').hide(200);
        
        //Hide menu when clicked outside
        $(this).parent().find('ul').parent().mouseleave(function(){ 
          var thisUI = $(this);
          $('html').click(function(){
            thisUI.children(".dropdown-menu").hide();
        thisUI.children("a").removeClass('selected');
            $('html').unbind('click');
          });
        });
        
      });
      
    });
         
    
$(window).scroll(function() {
    if ($(this).scrollTop()) {
        $('#topfun').fadeIn();
    } else {
        $('#topfun').fadeOut();
    }
});

$("#topfun").click(function () {
   $("html, body").animate({scrollTop: 0}, 1000);
});


        /* Element.closest() use IE */
    if (!Element.prototype.matches) {
      Element.prototype.matches = Element.prototype.msMatchesSelector || Element.prototype.webkitMatchesSelector;
    }
    if (!Element.prototype.closest) {
      Element.prototype.closest = function(s) {
        var el = this;
        do {
          if (el.matches(s)) return el;
          el = el.parentElement || el.parentNode;
        } while (el !== null && el.nodeType === 1);
        return null;
      };
    }
    
 document.getElementById("directCheckbox").addEventListener("change", function() {
        var associateCheckbox = document.getElementById("associatesCheckbox");

        // Uncheck "Associates/Affiliates Through" checkbox
        associateCheckbox.checked = false;

        var directSection = document.querySelector('.direct_cust');
        var associateSection = document.querySelector('.associate_through');

        // Toggle visibility based on checkbox state
        directSection.style.display = this.checked ? 'flex' : 'none';
        associateSection.style.display = this.checked ? 'none' : 'flex';
    });

    // Add event listener for "Associates/Affiliates Through" checkbox
    document.getElementById("associatesCheckbox").addEventListener("change", function() {
        var directCheckbox = document.getElementById("directCheckbox");

        // Uncheck "Direct" checkbox
        directCheckbox.checked = false;

        var directSection = document.querySelector('.direct_cust');
        var associateSection = document.querySelector('.associate_through');

        // Toggle visibility based on checkbox state
        directSection.style.display = this.checked ? 'none' : 'flex';
        associateSection.style.display = this.checked ? 'flex' : 'none';
    });

    //customer & associate 

//tab


$(document).ready(function() {  
  $('ul li a').click(function(){  
    $('li a').removeClass("active");  
    $(this).addClass("active");  
});  
});  


//li mega menu


$(document).ready(function(){
    $('.customer-logos').slick({
  autoplay:true,
  autoplaySpeed:4000,
  arrows:true,
  prevArrow:'<button type="button" class="PrevArrow slick-prev"></button>',
  nextArrow:'<button type="button" class="NextArrow slick-next"></button>',
  centerMode:true,
  slidesToShow:5,
  slidesToScroll:2
    });
});


//slick