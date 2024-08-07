$(function() {

  var native_width = 0;
  var native_height = 0;
  var mouse = {x: 0, y: 0};
  var magnify;
  var cur_img;

  var ui = {
    magniflier: $('.magnifier')
  };

  // Adding glass lense
  if (ui.magniflier.length) {
    var div = document.createElement('div');
    div.setAttribute('class', 'glass');
    ui.glass = $(div);

    $('body').append(div);
  }

  // Make it happen on mouseover
  var mouseMove = function(e) {
    var $el = $(this);
    var magnify_offset = cur_img.offset();

    // Define mouse position
    mouse.x = e.pageX - magnify_offset.left;
    mouse.y = e.pageY - magnify_offset.top;
    
    // Make magnifying glass only visible if inside the image
    if (
      mouse.x < cur_img.width() &&
      mouse.y < cur_img.height() &&
      mouse.x > 0 &&
      mouse.y > 0
      ) {

      magnify(e);
    }
    else {
      ui.glass.fadeOut(100);
    }

    return;
  };

  var magnify = function(e) {

    // Changing background position according to mouse position over image → Get ratio of the pixel under mouse and use to position large image inside the glass lense
    var rx = Math.round(mouse.x/cur_img.width()*native_width - ui.glass.width()/2)*-1;
    var ry = Math.round(mouse.y/cur_img.height()*native_height - ui.glass.height()/2)*-1;
    var bg_pos = rx + "px " + ry + "px";
    
    // Calculate position for glass → Substract width and height in half from mouse position
    var glass_left = e.pageX - ui.glass.width() / 2;
    var glass_top  = e.pageY - ui.glass.height() / 2;
    ui.glass.css({
      left: glass_left,
      top: glass_top,
      backgroundPosition: bg_pos
    });

    return;
  };

  $('.magnifier').on('mousemove', function() {
    ui.glass.fadeIn(200);
    
    cur_img = $(this);

    var large_img_loaded = cur_img.data('large-img-loaded');
    var src = cur_img.data('large') || cur_img.attr('src');

    if (src) {
      ui.glass.css({
        'background-image': 'url(' + src + ')',
        'background-repeat': 'no-repeat'
      });
    }

      // When the user hovers on the image, the script will first calculate the native dimensions if they don't exist. Only after the native dimensions are available, the script will show the zoomed version.
      if (!cur_img.data('native_width')) {
        // This will create a new image object with the same image as that in .small
        var image_object = new Image();

        image_object.onload = function() {
          // Important: Wrap in .load function! If accessed before the image is loaded object width and height would return 0
          native_width = image_object.width;
          native_height = image_object.height;

          cur_img.data('native_width', native_width);
          cur_img.data('native_height', native_height);

          mouseMove.apply(this, arguments);

          ui.glass.on('mousemove', mouseMove);
        };


        image_object.src = src;
        
        return;
      } else {

        native_width = cur_img.data('native_width');
        native_height = cur_img.data('native_height');
      }

    mouseMove.apply(this, arguments);

    ui.glass.on('mousemove', mouseMove);
  });

  ui.glass.on('mouseout', function() {
    ui.glass.off('mousemove', mouseMove);
  });

});