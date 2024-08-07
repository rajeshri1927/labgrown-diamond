$(function() {
    "use strict";
    $(window).on('load', function() {
        $('.page-loader').fadeOut('slow', function() {
            $(this).remove();
        });
    });
    $('#rev_slider-home01').show().revolution({
        responsiveLevels: [1920, 1600, 768, 480],
        gridwidth: [1240, 1024, 768, 600],
        sliderType: "standard",
        dottedOverlay: "none",
        sliderLayout: 'auto',
        gridheight: [800, 600, 600, 500],
        delay: 5000,
        spinner: 'spinner2',
        navigation: {
            onHoverStop: "off",
            arrows: {
                enable: true,
                style: 'uranus',
                hide_onleave: true,
                hide_under: 767
            },
            bullets: {
                enable: false,
                style: 'hermes',
                hide_onleave: false,
                h_align: "center",
                v_align: "bottom",
                h_offset: 0,
                v_offset: 20,
                space: 5
            }
        }
    });
    $('#rev_slider-home02').show().revolution({
        responsiveLevels: [1920, 1600, 768, 480],
        gridwidth: [1240, 1024, 768, 600],
        sliderLayout: 'fullwidth',
        gridheight: [900, 700, 700, 600],
        delay: 5000,
        spinner: 'spinner2',
        navigation: {
            onHoverStop: "off",
            arrows: {
                enable: true,
                style: 'uranus',
                hide_onleave: true,
                hide_under: 767
            },
            bullets: {
                enable: false,
                style: 'hermes',
                hide_onleave: false,
                h_align: "center",
                v_align: "bottom",
                h_offset: 0,
                v_offset: 20,
                space: 5
            }
        }
    });
    $('#rev_slider-home03').show().revolution({
        responsiveLevels: [1920, 1600, 768, 480],
        gridwidth: [1240, 1024, 768, 600],
        sliderLayout: 'fullwidth',
        gridheight: [940, 740, 540, 440],
        delay: 5000,
        spinner: 'spinner2',
        navigation: {
            onHoverStop: "off",
            arrows: {
                enable: true,
                style: 'uranus',
                hide_onleave: true,
                hide_under: 767
            },
            bullets: {
                enable: false,
                style: 'hermes',
                hide_onleave: false,
                h_align: "center",
                v_align: "bottom",
                h_offset: 0,
                v_offset: 20,
                space: 5
            }
        }
    });

    function maso() {
        $('.gallery-isotope').masonry({
            itemSelector: '.element-item',
            columnWidth: '.element-item',
            percentPosition: true
        });
    }
    var $Gird = $('.gallery-isotope').isotope({
        itemSelector: '.element-item',
    });
    $('.filters-button-group').on('click', 'li', function() {
        var filterValue = $(this).attr('data-filter');
        $Gird.isotope({
            filter: filterValue
        });
        return false;
    });
    maso();
    $(".filters-button-group li").on('click', function(e) {
        $(".filters-button-group li").removeClass("active");
        $(this).addClass("active");
    });
    jQuery(".color1").on("click", function() {
        jQuery("#colors").attr("href", "css/colors/color-green.css");
    });
    jQuery(".color2").on("click", function() {
        jQuery("#colors").attr("href", "css/colors/color-black.css");
    });
    jQuery(".color3").on("click", function() {
        jQuery("#colors").attr("href", "css/colors/color-gray.css");
    });
    jQuery(".color4").on("click", function() {
        jQuery("#colors").attr("href", "css/colors/color-lavender.css");
    });
    jQuery(".color5").on("click", function() {
        jQuery("#colors").attr("href", "css/colors/color-orange.css");
    });
    $(".switcher-cog").on("click", function() {
        $('#switcher').toggleClass("show");
    });
    $('.ic-search').on('click', function(e) {
        $('.search').toggle(500);
    })
    var miniCart = $('.mini-cart');
    $('.nav-cart .ic-cart').on('click', function() {
        miniCart.toggleClass('opened');
    });
    $(window).on('click', function(event) {
        if (!$(event.target).closest(miniCart).length && !$(event.target).closest('.nav-cart .ic-cart').length) {
            miniCart.removeClass('opened');
        }
    });

    function makeTimer() {
        var endTime = new Date("August 20, 2017 18:00:00 PDT");
        var endTime = (Date.parse(endTime)) / 1000;
        var now = new Date();
        var now = (Date.parse(now) / 1000);
        var timeLeft = endTime - now;
        var days = Math.floor(timeLeft / 86400);
        var hours = Math.floor((timeLeft - (days * 86400)) / 3600);
        var minutes = Math.floor((timeLeft - (days * 86400) - (hours * 3600)) / 60);
        var seconds = Math.floor((timeLeft - (days * 86400) - (hours * 3600) - (minutes * 60)));
        if (hours < "10") {
            hours = "0" + hours;
        }
        if (minutes < "10") {
            minutes = "0" + minutes;
        }
        if (seconds < "10") {
            seconds = "0" + seconds;
        }
        $("#days").html(days + "<span> Days</span>");
        $("#hours").html(hours + "<span> Hours</span>");
        $("#minutes").html(minutes + "<span> Minutes</span>");
        $("#seconds").html(seconds + "<span> Seconds</span>");
        $(".comming-coundown #days").html(days + "<span>/Days</span>");
        $(".comming-coundown #hours").html(hours + "<span>/Hours</span>");
        $(".comming-coundown #minutes").html(minutes + "<span>/Minutes</span>");
        $(".comming-coundown #seconds").html(seconds + "<span>/Seconds</span>");
    }
    setInterval(function() {
        makeTimer();
    }, 1000);
    $('.testimonial-slide').owlCarousel({
        loop: true,
        margin: 30,
        autoplay: true,
        dots: true,
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2
            },
            992: {
                items: 3
            }
        }
    });
    $('.feature-slide').owlCarousel({
        loop: true,
        margin: 30,
        autoplay: true,
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            480: {
                items: 2
            },
            768: {
                items: 2
            },
            992: {
                items: 3
            }
        }
    })
    $('.testimonial-home02-content').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        speed: 500,
        arrows: false,
        fade: true,
        asNavFor: '.testimonial-home02-slide'
    });
    $('.testimonial-home02-slide').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        asNavFor: '.testimonial-home02-content',
        autoplay: true,
        arrows: false,
        dots: true,
        centerMode: true,
        focusOnSelect: true,
        responsive: [{
            breakpoint: 1024,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1
            }
        }, {
            breakpoint: 600,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }, {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }]
    });
    $('.testimonial-home03-slide').owlCarousel({
        loop: true,
        autoplay: true,
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 1
            },
            992: {
                items: 1
            }
        }
    })
    $('.gallery-home-gird').isotope({
        itemSelector: '.gallery-item',
        percentPosition: true,
        masonry: {
            columnWidth: '.gallery-sizer'
        }
    });
    $(".categories li").on('click', function(e) {
        $(".categories li").removeClass("active");
        $(this).addClass("active");
    });
    $('.quantity').each(function() {
        var spinner = $(this),
            input = spinner.find('input[type="number"]'),
            btnUp = spinner.find('.quantity-up'),
            btnDown = spinner.find('.quantity-down'),
            min = input.attr('min'),
            max = input.attr('max');
        btnUp.on('click', function(e) {
            var oldValue = parseFloat(input.val());
            var newVal;
            if (oldValue >= max) {
                newVal = oldValue;
            } else {
                newVal = oldValue + 1;
            }
            spinner.find("input").val(newVal);
            spinner.find("input").trigger("change");
        });
        btnDown.on('click', function(e) {
            var oldValue = parseFloat(input.val());
            var newVal;
            if (oldValue <= min) {
                newVal = oldValue;
            } else {
                newVal = oldValue - 1;
            }
            spinner.find("input").val(newVal);
            spinner.find("input").trigger("change");
        });
    });
    $("#slider-range").slider({
        range: true,
        min: 610,
        max: 1100,
        values: [610, 980],
        slide: function(event, ui) {
            $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
        }
    });
    $("#amount").val("$" + $("#slider-range").slider("values", 0) + " - $" + $("#slider-range").slider("values", 1));
    $('.detail-slider .slider-for').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        autoplay: true,
        fade: true,
        asNavFor: '.detail-slider .slider-nav'
    });
    $('.detail-slider .slider-nav').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        asNavFor: '.detail-slider .slider-for',
        dots: true,
        centerMode: true,
        focusOnSelect: true
    });
    $('.collapse').on('shown.bs.collapse', function() {
        $(this).parent().find(".fa-plus").removeClass("fa-plus").addClass("fa-minus");
        $(this).parent().find(".faq-head").css({
            'border-left-width': '4px',
            'border-left-style': 'solid',
            'border-radius': '0'
        });
    }).on('hidden.bs.collapse', function() {
        $(this).parent().find(".fa-minus").removeClass("fa-minus").addClass("fa-plus");
        $(this).parent().find(".faq-head").css({
            'border': '0'
        });
    });
    
});