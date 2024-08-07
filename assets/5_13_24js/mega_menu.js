$(document).ready(function () {
    $('#billij').click(function(event){
        event.stopPropagation();
        $(this).toggleClass('active'); 
        $(".mydivvvv").toggle(); 
    });

    $(".mydivvvv").click(function(event) {
        event.stopPropagation(); 
    });

    $(document).click(function(event) {
        var target = $(event.target);
        if (!target.is('#billij')) {
            if (!target.closest('.mydivvvv').length) {
                $('#billij').removeClass('active'); 
                $(".mydivvvv").hide(); 
                    }}

    });
});

$(document).ready(function () {
    var mydivvvVisible = false;

    $('#billij').click(function(event){
        event.stopPropagation();
        $(this).toggleClass('clicked'); 
        mydivvvVisible = !mydivvvVisible;

        if (mydivvvVisible) {
            $(".mydivvv").show();
            $('#myList li:not(#billij)').addClass('disabled'); 
        } else {
            $(".mydivvv").hide(); 
            $('#myList li:not(#billij)').removeClass('disabled'); 
        }
    });

    $(".mydivvv").click(function(event) {
        event.stopPropagation();
    });

    $(document).click(function(event) {
        var target = $(event.target);
        if (!target.is('#billij')) {
            if (!target.closest('.mydivvv').length) {
                $('#billij').removeClass('clicked'); 
                $(".mydivvv").hide(); 
                $('#myList li:not(#billij)').removeClass('disabled'); 
                mydivvvVisible = false;
            }
        }
    });
});

// for billionare

$(document).ready(function () {
    $('#millij').click(function(event){
        event.stopPropagation();
        $(this).toggleClass('active'); 
        $(".divone").toggle(); 
    });

    $(".divone").click(function(event) {
        event.stopPropagation(); 
    });

    $(document).click(function(event) {
        var target = $(event.target);
        if (!target.is('#millij')) {
            if (!target.closest('.divone').length) {
                $('#millij').removeClass('active'); 
                $(".divone").hide(); 
            }
        }
    });
});

$(document).ready(function () {
    var divoneVisible = false;

    $('#millij').click(function(event){
        event.stopPropagation();
        $(this).toggleClass('clicked');
        divoneVisible = !divoneVisible;

        if (divoneVisible) {
            $(".divone").show(); 
            $('#myList li:not(#millij)').addClass('disabled'); 
        } else {
            $(".divone").hide();
            $('#myList li:not(#millij)').removeClass('disabled'); 
        }
    });

    $(".divone").click(function(event) {
        event.stopPropagation(); 
    });

    $(document).click(function(event) {
        var target = $(event.target);
        if (!target.is('#millij')) {
            if (!target.closest('.divone').length) {
                $('#millij').removeClass('clicked'); 
                $(".divone").hide(); 
                $('#myList li:not(#millij)').removeClass('disabled'); 
               divoneVisible = false;
            }
        }
    });
});

// millionare 
$(document).ready(function () {
    $('#promij').click(function(event){
        event.stopPropagation();
        $(this).toggleClass('active'); 
        $(".promicering").toggle(); 
    });

    $(".promicering").click(function(event) {
        event.stopPropagation(); 
    });

    $(document).click(function(event) {
        var target = $(event.target);
        if (!target.is('#promij')) {
            if (!target.closest('.promicering').length) {
                $('#promij').removeClass('active'); 
                $(".promicering").hide(); 
            }
        }
    });
});

$(document).ready(function () {
    var promiceringVisible = false;

    $('#promij').click(function(event){
        event.stopPropagation();
        $(this).toggleClass('clicked'); 
        promiceringVisible = !promiceringVisible;

        if (promiceringVisible) {
            $(".promicering").show(); 
            $('#myList li:not(#promij)').addClass('disabled'); 
        } else {
            $(".promicering").hide(); 
            $('#myList li:not(#promij)').removeClass('disabled'); 
        }
    });

    $(".promicering").click(function(event) {
        event.stopPropagation(); 
    });

    $(document).click(function(event) {
        var target = $(event.target);
        if (!target.is('#promij')) {
            if (!target.closest('.promicering').length) {
                $('#promij').removeClass('clicked'); 
                $(".promicering").hide();
                $('#myList li:not(#promij)').removeClass('disabled');
                promiceringVisible = false;
            }
        }
    });
});

//promicering

$(document).ready(function () {
    $('#engagj').click(function(event){
        event.stopPropagation();
        $(this).toggleClass('active'); 
        $(".engaring").toggle();
    });

    $(".engaring").click(function(event) {
        event.stopPropagation(); 
    });

    $(document).click(function(event) {
        var target = $(event.target);
        if (!target.is('#engagj')) {
            if (!target.closest('.engaring').length) {
                $('#engagj').removeClass('active'); 
                $(".engaring").hide(); 
            }
        }
    });
});

$(document).ready(function () {
    var engaringVisible = false;

    $('#engagj').click(function(event){
        event.stopPropagation();
        $(this).toggleClass('clicked'); 
       engaringVisible = !engaringVisible;

        if (engaringVisible) {
            $(".engaring").show(); 
            $('#myList li:not(#engagj)').addClass('disabled'); 
        } else {
            $(".engaring").hide(); 
            $('#myList li:not(#engagj)').removeClass('disabled'); 
        }
    });

    $(".engaring").click(function(event) {
        event.stopPropagation(); 
    });

    $(document).click(function(event) {
        var target = $(event.target);
        if (!target.is('#engagj')) {
            if (!target.closest('.engaring').length) {
                $('#engagj').removeClass('clicked'); 
                $(".engaring").hide();
                $('#myList li:not(#engagj)').removeClass('disabled'); 
                engaringVisible = false;
            }
        }
    });
});

//engagement ring

$(document).ready(function () {
    $('#weddij').click(function(event){
        event.stopPropagation();
        $(this).toggleClass('active'); 
        $(".weddiring").toggle();
    });

    $(".weddiring").click(function(event) {
        event.stopPropagation(); 
    });

    $(document).click(function(event) {
        var target = $(event.target);
        if (!target.is('#weddij')) {
            if (!target.closest('.weddiring').length) {
                $('#weddij').removeClass('active'); 
                $(".weddiring").hide(); 
            }
        }
    });
});

$(document).ready(function () {
    var weddiringVisible = false;

    $('#weddij').click(function(event){
        event.stopPropagation();
        $(this).toggleClass('clicked'); 
       weddiringVisible = !weddiringVisible;

        if (weddiringVisible) {
            $(".weddiring").show(); 
            $('#myList li:not(#weddij)').addClass('disabled'); 
        } else {
            $(".weddiring").hide(); 
            $('#myList li:not(#weddij)').removeClass('disabled'); 
        }
    });

    $(".weddiring").click(function(event) {
        event.stopPropagation(); 
    });

    $(document).click(function(event) {
        var target = $(event.target);
        if (!target.is('#weddij')) {
            if (!target.closest('.weddiring').length) {
                $('#weddij').removeClass('clicked'); 
                $(".weddiring").hide();
                $('#myList li:not(#weddij)').removeClass('disabled'); 
                weddiringVisible = false;
            }
        }
    });
});
//wedding ring

$(document).ready(function () {
    $('#mensj').click(function(event){
        event.stopPropagation();
        $(this).toggleClass('active'); 
        $(".mensgift").toggle();
    });

    $(".mensgift").click(function(event) {
        event.stopPropagation(); 
    });

    $(document).click(function(event) {
        var target = $(event.target);
        if (!target.is('#mensj')) {
            if (!target.closest('.mensgift').length) {
                $('#mensj').removeClass('active'); 
                $(".mensgift").hide(); 
            }
        }
    });
});

$(document).ready(function () {
    var mensgiftVisible = false;

    $('#mensj').click(function(event){
        event.stopPropagation();
        $(this).toggleClass('clicked'); 
       mensgiftVisible = !mensgiftVisible;

        if (mensgiftVisible) {
            $(".mensgift").show(); 
            $('#myList li:not(#mensj)').addClass('disabled'); 
        } else {
            $(".mensgift").hide(); 
            $('#myList li:not(#mensj)').removeClass('disabled'); 
        }
    });

    $(".mensgift").click(function(event) {
        event.stopPropagation(); 
    });

    $(document).click(function(event) {
        var target = $(event.target);
        if (!target.is('#mensj')) {
            if (!target.closest('.mensgift').length) {
                $('#mensj').removeClass('clicked'); 
                $(".mensgift").hide();
                $('#myList li:not(#mensj)').removeClass('disabled'); 
                mensgiftVisible = false;
            }
        }
    });
});
//mens gift


$(document).ready(function () {
    $('#kidsj').click(function(event){
        event.stopPropagation();
        $(this).toggleClass('active'); 
        $(".kidsgift").toggle();
    });

    $(".kidsgift").click(function(event) {
        event.stopPropagation(); 
    });

    $(document).click(function(event) {
        var target = $(event.target);
        if (!target.is('#kidsj')) {
            if (!target.closest('.kidsgift').length) {
                $('#kidsj').removeClass('active'); 
                $(".kidsgift").hide(); 
            }
        }
    });
});

$(document).ready(function () {
    var kidsgiftVisible = false;

    $('#kidsj').click(function(event){
        event.stopPropagation();
        $(this).toggleClass('clicked'); 
      kidsgiftVisible = !kidsgiftVisible;

        if (kidsgiftVisible) {
            $(".kidsgift").show(); 
            $('#myList li:not(#kidsj)').addClass('disabled'); 
        } else {
            $(".kidsgift").hide(); 
            $('#myList li:not(#kidsj)').removeClass('disabled'); 
        }
    });

    $(".kidsgift").click(function(event) {
        event.stopPropagation(); 
    });

    $(document).click(function(event) {
        var target = $(event.target);
        if (!target.is('#kidsj')) {
            if (!target.closest('.kidsgift').length) {
                $('#kidsj').removeClass('clicked'); 
                $(".kidsgift").hide();
                $('#myList li:not(#kidsj)').removeClass('disabled'); 
                kidsgiftVisible = false;
            }
        }
    });
});
//kids gift


$(document).ready(function () {
    $('#bithj').click(function(event){
        event.stopPropagation();
        $(this).toggleClass('active'); 
        $(".birthgift").toggle();
    });

    $(".birthgift").click(function(event) {
        event.stopPropagation(); 
    });

    $(document).click(function(event) {
        var target = $(event.target);
        if (!target.is('#bithj')) {
            if (!target.closest('.birthgift').length) {
                $('#bithj').removeClass('active'); 
                $(".birthgift").hide(); 
            }
        }
    });
});

$(document).ready(function () {
    var birthgiftVisible = false;

    $('#bithj').click(function(event){
        event.stopPropagation();
        $(this).toggleClass('clicked'); 
      birthgiftVisible = !birthgiftVisible;

        if (birthgiftVisible) {
            $(".birthgift").show(); 
            $('#myList li:not(#bithj)').addClass('disabled'); 
        } else {
            $(".birthgift").hide(); 
            $('#myList li:not(#bithj)').removeClass('disabled'); 
        }
    });

    $(".birthgift").click(function(event) {
        event.stopPropagation(); 
    });

    $(document).click(function(event) {
        var target = $(event.target);
        if (!target.is('#bithj')) {
            if (!target.closest('.birthgift').length) {
                $('#bithj').removeClass('clicked'); 
                $(".birthgift").hide();
                $('#myList li:not(#bithj)').removeClass('disabled'); 
                birthgiftVisible = false;
            }
        }
    });
});
//birthday gift

$(document).ready(function () {
    $('#aniivj').click(function(event){
        event.stopPropagation();
        $(this).toggleClass('active'); 
        $(".anivgift").toggle();
    });

    $(".anivgift").click(function(event) {
        event.stopPropagation(); 
    });

    $(document).click(function(event) {
        var target = $(event.target);
        if (!target.is('#aniivj')) {
            if (!target.closest('.anivgift').length) {
                $('#aniivj').removeClass('active'); 
                $(".anivgift").hide(); 
            }
        }
    });
});

$(document).ready(function () {
    var anivgiftVisible = false;

    $('#aniivj').click(function(event){
        event.stopPropagation();
        $(this).toggleClass('clicked'); 
      anivgiftVisible = !anivgiftVisible;

        if (anivgiftVisible) {
            $(".anivgift").show(); 
            $('#myList li:not(#aniivj)').addClass('disabled'); 
        } else {
            $(".anivgift").hide(); 
            $('#myList li:not(#aniivj)').removeClass('disabled'); 
        }
    });

    $(".anivgift").click(function(event) {
        event.stopPropagation(); 
    });

    $(document).click(function(event) {
        var target = $(event.target);
        if (!target.is('#aniivj')) {
            if (!target.closest('.anivgift').length) {
                $('#aniivj').removeClass('clicked'); 
                $(".anivgift").hide();
                $('#myList li:not(#aniivj)').removeClass('disabled'); 
                anivgiftVisible = false;
            }
        }
    });
});
// anniversary gift

$(document).ready(function () {
    $('#ringsj').click(function(event){
        event.stopPropagation();
        $(this).toggleClass('active'); 
        $(".ringgift").toggle();
    });

    $(".ringgift").click(function(event) {
        event.stopPropagation(); 
    });

    $(document).click(function(event) {
        var target = $(event.target);
        if (!target.is('#ringsj')) {
            if (!target.closest('.ringgift').length) {
                $('#ringsj').removeClass('active'); 
                $(".ringgift").hide(); 
            }
        }
    });
});

$(document).ready(function () {
    var ringgiftVisible = false;

    $('#ringsj').click(function(event){
        event.stopPropagation();
        $(this).toggleClass('clicked'); 
      ringgiftVisible = !ringgiftVisible;

        if (ringgiftVisible) {
            $(".ringgift").show(); 
            $('#myList li:not(#ringsj)').addClass('disabled'); 
        } else {
            $(".ringgift").hide(); 
            $('#myList li:not(#ringsj)').removeClass('disabled'); 
        }
    });

    $(".ringgift").click(function(event) {
        event.stopPropagation(); 
    });

    $(document).click(function(event) {
        var target = $(event.target);
        if (!target.is('#ringsj')) {
            if (!target.closest('.ringgift').length) {
                $('#ringsj').removeClass('clicked'); 
                $(".ringgift").hide();
                $('#myList li:not(#ringsj)').removeClass('disabled'); 
                ringgiftVisible = false;
            }
        }
    });
});
//rings gift


$(document).ready(function () {
    $('#earringj').click(function(event){
        event.stopPropagation();
        $(this).toggleClass('active'); 
        $(".earringgift").toggle();
    });

    $(".earringgift").click(function(event) {
        event.stopPropagation(); 
    });

    $(document).click(function(event) {
        var target = $(event.target);
        if (!target.is('#earringj')) {
            if (!target.closest('.earringgift').length) {
                $('#earringj').removeClass('active'); 
                $(".earringgift").hide(); 
            }
        }
    });
});

$(document).ready(function () {
    var earringgiftVisible = false;

    $('#earringj').click(function(event){
        event.stopPropagation();
        $(this).toggleClass('clicked'); 
      earringgiftVisible = !earringgiftVisible;

        if (earringgiftVisible) {
            $(".earringgift").show(); 
            $('#myList li:not(#earringj)').addClass('disabled'); 
        } else {
            $(".earringgift").hide(); 
            $('#myList li:not(#earringj)').removeClass('disabled'); 
        }
    });

    $(".earringgift").click(function(event) {
        event.stopPropagation(); 
    });

    $(document).click(function(event) {
        var target = $(event.target);
        if (!target.is('#earringj')) {
            if (!target.closest('.earringgift').length) {
                $('#earringj').removeClass('clicked'); 
                $(".earringgift").hide();
                $('#myList li:not(#earringj)').removeClass('disabled'); 
                earringgiftVisible = false;
            }
        }
    });
});
//earring gift


$(document).ready(function () {
    $('#pendantj').click(function(event){
        event.stopPropagation();
        $(this).toggleClass('active'); 
        $(".pendantgift").toggle();
    });

    $(".pendantgift").click(function(event) {
        event.stopPropagation(); 
    });

    $(document).click(function(event) {
        var target = $(event.target);
        if (!target.is('#pendantj')) {
            if (!target.closest('.pendantgift').length) {
                $('#pendantj').removeClass('active'); 
                $(".pendantgift").hide(); 
            }
        }
    });
});

$(document).ready(function () {
    var pendantgiftVisible = false;

    $('#pendantj').click(function(event){
        event.stopPropagation();
        $(this).toggleClass('clicked'); 
      pendantgiftVisible = !pendantgiftVisible;

        if (pendantgiftVisible) {
            $(".pendantgift").show(); 
            $('#myList li:not(#pendantj)').addClass('disabled'); 
        } else {
            $(".pendantgift").hide(); 
            $('#myList li:not(#pendantj)').removeClass('disabled'); 
        }
    });

    $(".pendantgift").click(function(event) {
        event.stopPropagation(); 
    });

    $(document).click(function(event) {
        var target = $(event.target);
        if (!target.is('#pendantj')) {
            if (!target.closest('.pendantgift').length) {
                $('#pendantj').removeClass('clicked'); 
                $(".pendantgift").hide();
                $('#myList li:not(#pendantj)').removeClass('disabled'); 
                pendantgiftVisible = false;
            }
        }
    });
});
//pendants gift


$(document).ready(function () {
    $('#smallsetj').click(function(event){
        event.stopPropagation();
        $(this).toggleClass('active'); 
        $(".smallsetgift").toggle();
    });

    $(".smallsetgift").click(function(event) {
        event.stopPropagation(); 
    });

    $(document).click(function(event) {
        var target = $(event.target);
        if (!target.is('#smallsetj')) {
            if (!target.closest('.smallsetgift').length) {
                $('#smallsetj').removeClass('active'); 
                $(".smallsetgift").hide(); 
            }
        }
    });
});

$(document).ready(function () {
    var smallsetgiftVisible = false;

    $('#smallsetj').click(function(event){
        event.stopPropagation();
        $(this).toggleClass('clicked'); 
      smallsetgiftVisible = !smallsetgiftVisible;

        if (smallsetgiftVisible) {
            $(".smallsetgift").show(); 
            $('#myList li:not(#smallsetj)').addClass('disabled'); 
        } else {
            $(".smallsetgift").hide(); 
            $('#myList li:not(#smallsetj)').removeClass('disabled'); 
        }
    });

    $(".smallsetgift").click(function(event) {
        event.stopPropagation(); 
    });

    $(document).click(function(event) {
        var target = $(event.target);
        if (!target.is('#smallsetj')) {
            if (!target.closest('.smallsetgift').length) {
                $('#smallsetj').removeClass('clicked'); 
                $(".smallsetgift").hide();
                $('#myList li:not(#smallsetj)').removeClass('disabled'); 
                smallsetgiftVisible = false;
            }
        }
    });
});
//small sets gift

$(document).ready(function () {
    $('#awardj').click(function(event){
        event.stopPropagation();
        $(this).toggleClass('active'); 
        $(".awarddesign").toggle();
    });

    $(".awarddesign").click(function(event) {
        event.stopPropagation(); 
    });

    $(document).click(function(event) {
        var target = $(event.target);
        if (!target.is('#awardj')) {
            if (!target.closest('.awarddesign').length) {
                $('#awardj').removeClass('active'); 
                $(".awarddesign").hide(); 
            }
        }
    });
});

$(document).ready(function () {
    var awarddesignVisible = false;

    $('#awardj').click(function(event){
        event.stopPropagation();
        $(this).toggleClass('clicked'); 
      awarddesignVisible = !awarddesignVisible;

        if (awarddesignVisible) {
            $(".awarddesign").show(); 
            $('#myList li:not(#awardj)').addClass('disabled'); 
        } else {
            $(".awarddesign").hide(); 
            $('#myList li:not(#awardj)').removeClass('disabled'); 
        }
    });

    $(".awarddesign").click(function(event) {
        event.stopPropagation(); 
    });

    $(document).click(function(event) {
        var target = $(event.target);
        if (!target.is('#awardj')) {
            if (!target.closest('.awarddesign').length) {
                $('#awardj').removeClass('clicked'); 
                $(".awarddesign").hide();
                $('#myList li:not(#awardj)').removeClass('disabled'); 
                awarddesignVisible = false;
            }
        }
    });
});
//award winning design

$(document).ready(function () {
    $('#designerj').click(function(event){
        event.stopPropagation();
        $(this).toggleClass('active'); 
        $(".awarddesign").toggle();
    });

    $(".awarddesign").click(function(event) {
        event.stopPropagation(); 
    });

    $(document).click(function(event) {
        var target = $(event.target);
        if (!target.is('#designerj')) {
            if (!target.closest('.awarddesign').length) {
                $('#designerj').removeClass('active'); 
                $(".awarddesign").hide(); 
            }
        }
    });
});

$(document).ready(function () {
    var designerdesignVisible = false;

    $('#designerj').click(function(event){
        event.stopPropagation();
        $(this).toggleClass('clicked'); 
      designerdesignVisible = !designerdesignVisible;

        if (designerdesignVisible) {
            $(".designerdesign").show(); 
            $('#myList li:not(#designerj)').addClass('disabled'); 
        } else {
            $(".designerdesign").hide(); 
            $('#myList li:not(#designerj)').removeClass('disabled'); 
        }
    });

    $(".designerdesign").click(function(event) {
        event.stopPropagation(); 
    });

    $(document).click(function(event) {
        var target = $(event.target);
        if (!target.is('#designerj')) {
            if (!target.closest('.designerdesign').length) {
                $('#designerj').removeClass('clicked'); 
                $(".designerdesign").hide();
                $('#myList li:not(#designerj)').removeClass('disabled'); 
               designerdesignVisible = false;
            }
        }
    });
});
//designer design

$(document).ready(function () {
    $('#fammousj').click(function(event){
        event.stopPropagation();
        $(this).toggleClass('active'); 
        $(".famousbrand").toggle();
    });

    $(".famousbrand").click(function(event) {
        event.stopPropagation(); 
    });

    $(document).click(function(event) {
        var target = $(event.target);
        if (!target.is('#fammousj')) {
            if (!target.closest('.famousbrand').length) {
                $('#fammousj').removeClass('active'); 
                $(".famousbrand").hide(); 
            }
        }
    });
});

$(document).ready(function () {
    var famousbrandVisible = false;

    $('#fammousj').click(function(event){
        event.stopPropagation();
        $(this).toggleClass('clicked'); 
      famousbrandVisible = !famousbrandVisible;

        if (famousbrandVisible) {
            $(".famousbrand").show(); 
            $('#myList li:not(#fammousj)').addClass('disabled'); 
        } else {
            $(".famousbrand").hide(); 
            $('#myList li:not(#fammousj)').removeClass('disabled'); 
        }
    });

    $(".famousbrand").click(function(event) {
        event.stopPropagation(); 
    });

    $(document).click(function(event) {
        var target = $(event.target);
        if (!target.is('#fammousj')) {
            if (!target.closest('.famousbrand').length) {
                $('#fammousj').removeClass('clicked'); 
                $(".famousbrand").hide();
                $('#myList li:not(#fammousj)').removeClass('disabled'); 
               famousbrandVisible = false;
            }
        }
    });
});
//famous brand

$(document).ready(function () {
    $('#westernj').click(function(event){
        event.stopPropagation();
        $(this).toggleClass('active'); 
        $(".westerndesign").toggle();
    });

    $(".westerndesign").click(function(event) {
        event.stopPropagation(); 
    });

    $(document).click(function(event) {
        var target = $(event.target);
        if (!target.is('#westernj')) {
            if (!target.closest('.westerndesign').length) {
                $('#westernj').removeClass('active'); 
                $(".westerndesign").hide(); 
            }
        }
    });
});

$(document).ready(function () {
    var westerndesignVisible = false;

    $('#westernj').click(function(event){
        event.stopPropagation();
        $(this).toggleClass('clicked'); 
      westerndesignVisible = !westerndesignVisible;

        if (westerndesignVisible) {
            $(".westerndesign").show(); 
            $('#myList li:not(#westernj)').addClass('disabled'); 
        } else {
            $(".westerndesign").hide(); 
            $('#myList li:not(#westernj)').removeClass('disabled'); 
        }
    });

    $(".westerndesign").click(function(event) {
        event.stopPropagation(); 
    });

    $(document).click(function(event) {
        var target = $(event.target);
        if (!target.is('#westernj')) {
            if (!target.closest('.westerndesign').length) {
                $('#westernj').removeClass('clicked'); 
                $(".westerndesign").hide();
                $('#myList li:not(#westernj)').removeClass('disabled'); 
               westerndesignVisible = false;
            }
        }
    });
});
//western design

$(document).ready(function () {
    $('#banglej').click(function(event){
        event.stopPropagation();
        $(this).toggleClass('active'); 
        $(".banglegift").toggle();
    });

    $(".banglegift").click(function(event) {
        event.stopPropagation(); 
    });

    $(document).click(function(event) {
        var target = $(event.target);
        if (!target.is('#banglej')) {
            if (!target.closest('.banglegift').length) {
                $('#banglej').removeClass('active'); 
                $(".banglegift").hide(); 
            }
        }
    });
});

$(document).ready(function () {
    var banglegiftVisible = false;

    $('#banglej').click(function(event){
        event.stopPropagation();
        $(this).toggleClass('clicked'); 
      banglegiftVisible = !banglegiftVisible;

        if (banglegiftVisible) {
            $(".banglegift").show(); 
            $('#myList li:not(#banglej)').addClass('disabled'); 
        } else {
            $(".banglegift").hide(); 
            $('#myList li:not(#banglej)').removeClass('disabled'); 
        }
    });

    $(".banglegift").click(function(event) {
        event.stopPropagation(); 
    });

    $(document).click(function(event) {
        var target = $(event.target);
        if (!target.is('#banglej')) {
            if (!target.closest('.banglegift').length) {
                $('#banglej').removeClass('clicked'); 
                $(".banglegift").hide();
                $('#myList li:not(#banglej)').removeClass('disabled'); 
               banglegiftVisible = false;
            }
        }
    });
});
//bangles gift

$(document).ready(function () {
    $('#watchj').click(function(event){
        event.stopPropagation();
        $(this).toggleClass('active'); 
        $(".watchgift").toggle();
    });

    $(".watchgift").click(function(event) {
        event.stopPropagation(); 
    });

    $(document).click(function(event) {
        var target = $(event.target);
        if (!target.is('#watchj')) {
            if (!target.closest('.watchgift').length) {
                $('#watchj').removeClass('active'); 
                $(".watchgift").hide(); 
            }
        }
    });
});

$(document).ready(function () {
    var watchgiftVisible = false;

    $('#watchj').click(function(event){
        event.stopPropagation();
        $(this).toggleClass('clicked'); 
      watchgiftVisible = !watchgiftVisible;

        if (watchgiftVisible) {
            $(".watchgift").show(); 
            $('#myList li:not(#watchj)').addClass('disabled'); 
        } else {
            $(".watchgift").hide(); 
            $('#myList li:not(#watchj)').removeClass('disabled'); 
        }
    });

    $(".watchgift").click(function(event) {
        event.stopPropagation(); 
    });

    $(document).click(function(event) {
        var target = $(event.target);
        if (!target.is('#watchj')) {
            if (!target.closest('.watchgift').length) {
                $('#watchj').removeClass('clicked'); 
                $(".watchgift").hide();
                $('#myList li:not(#watchj)').removeClass('disabled'); 
               watchgiftVisible = false;
            }
        }
    });
});
//watches gift

$(document).ready(function () {
    $('#bracej').click(function(event){
        event.stopPropagation();
        $(this).toggleClass('active'); 
        $(".bracegift").toggle();
    });

    $(".bracegift").click(function(event) {
        event.stopPropagation(); 
    });

    $(document).click(function(event) {
        var target = $(event.target);
        if (!target.is('#bracej')) {
            if (!target.closest('.bracegift').length) {
                $('#bracej').removeClass('active'); 
                $(".bracegift").hide(); 
            }
        }
    });
});

$(document).ready(function () {
    var bracegiftVisible = false;

    $('#bracej').click(function(event){
        event.stopPropagation();
        $(this).toggleClass('clicked'); 
      bracegiftVisible = !bracegiftVisible;

        if (bracegiftVisible) {
            $(".bracegift").show(); 
            $('#myList li:not(#bracej)').addClass('disabled'); 
        } else {
            $(".bracegift").hide(); 
            $('#myList li:not(#bracej)').removeClass('disabled'); 
        }
    });

    $(".bracegift").click(function(event) {
        event.stopPropagation(); 
    });

    $(document).click(function(event) {
        var target = $(event.target);
        if (!target.is('#bracej')) {
            if (!target.closest('.bracegift').length) {
                $('#bracej').removeClass('clicked'); 
                $(".bracegift").hide();
                $('#myList li:not(#bracej)').removeClass('disabled'); 
               bracegiftVisible = false;
            }
        }
    });
});
//bracelates gift


$(document).ready(function () {
    $('#precj').click(function(event){
        event.stopPropagation();
        $(this).toggleClass('active'); 
        $(".preciousgift").toggle();
    });

    $(".preciousgift").click(function(event) {
        event.stopPropagation(); 
    });

    $(document).click(function(event) {
        var target = $(event.target);
        if (!target.is('#precj')) {
            if (!target.closest('.preciousgift').length) {
                $('#precj').removeClass('active'); 
                $(".preciousgift").hide(); 
            }
        }
    });
});

$(document).ready(function () {
    var preciousgiftVisible = false;

    $('#precj').click(function(event){
        event.stopPropagation();
        $(this).toggleClass('clicked'); 
      preciousgiftVisible = !preciousgiftVisible;

        if (preciousgiftVisible) {
            $(".preciousgift").show(); 
            $('#myList li:not(#precj)').addClass('disabled'); 
        } else {
            $(".preciousgift").hide(); 
            $('#myList li:not(#precj)').removeClass('disabled'); 
        }
    });

    $(".preciousgift").click(function(event) {
        event.stopPropagation(); 
    });

    $(document).click(function(event) {
        var target = $(event.target);
        if (!target.is('#precj')) {
            if (!target.closest('.preciousgift').length) {
                $('#precj').removeClass('clicked'); 
                $(".preciousgift").hide();
                $('#myList li:not(#precj)').removeClass('disabled'); 
               preciousgiftVisible = false;
            }
        }
    });
});
//precious stones

$(document).ready(function () {
    $('#pearlj').click(function(event){
        event.stopPropagation();
        $(this).toggleClass('active'); 
        $(".pearlgift").toggle();
    });

    $(".pearlgift").click(function(event) {
        event.stopPropagation(); 
    });

    $(document).click(function(event) {
        var target = $(event.target);
        if (!target.is('#pearlj')) {
            if (!target.closest('.pearlgift').length) {
                $('#pearlj').removeClass('active'); 
                $(".pearlgift").hide(); 
            }
        }
    });
});

$(document).ready(function () {
    var pearlgiftVisible = false;

    $('#pearlj').click(function(event){
        event.stopPropagation();
        $(this).toggleClass('clicked'); 
      pearlgiftVisible = !pearlgiftVisible;

        if (pearlgiftVisible) {
            $(".pearlgift").show(); 
            $('#myList li:not(#pearlj)').addClass('disabled'); 
        } else {
            $(".pearlgift").hide(); 
            $('#myList li:not(#pearlj)').removeClass('disabled'); 
        }
    });

    $(".pearlgift").click(function(event) {
        event.stopPropagation(); 
    });

    $(document).click(function(event) {
        var target = $(event.target);
        if (!target.is('#pearlj')) {
            if (!target.closest('.pearlgift').length) {
                $('#pearlj').removeClass('clicked'); 
                $(".pearlgift").hide();
                $('#myList li:not(#pearlj)').removeClass('disabled'); 
               pearlgiftVisible = false;
            }
        }
    });
});
//pearls jewelry

$(document).ready(function () {
    $('#northj').click(function(event){
        event.stopPropagation();
        $(this).toggleClass('active'); 
        $(".northgift").toggle();
    });

    $(".northgift").click(function(event) {
        event.stopPropagation(); 
    });

    $(document).click(function(event) {
        var target = $(event.target);
        if (!target.is('#northj')) {
            if (!target.closest('.northgift').length) {
                $('#northj').removeClass('active'); 
                $(".northgift").hide(); 
            }
        }
    });
});

$(document).ready(function () {
    var northgiftVisible = false;

    $('#northj').click(function(event){
        event.stopPropagation();
        $(this).toggleClass('clicked'); 
      northgiftVisible = !northgiftVisible;

        if (northgiftVisible) {
            $(".northgift").show(); 
            $('#myList li:not(#northj)').addClass('disabled'); 
        } else {
            $(".northgift").hide(); 
            $('#myList li:not(#northj)').removeClass('disabled'); 
        }
    });

    $(".northgift").click(function(event) {
        event.stopPropagation(); 
    });

    $(document).click(function(event) {
        var target = $(event.target);
        if (!target.is('#northj')) {
            if (!target.closest('.northgift').length) {
                $('#northj').removeClass('clicked'); 
                $(".northgift").hide();
                $('#myList li:not(#northj)').removeClass('disabled'); 
               northgiftVisible = false;
            }
        }
    });
});
//north design

$(document).ready(function () {
    $('#southj').click(function(event){
        event.stopPropagation();
        $(this).toggleClass('active'); 
        $(".southgift").toggle();
    });

    $(".southgift").click(function(event) {
        event.stopPropagation(); 
    });

    $(document).click(function(event) {
        var target = $(event.target);
        if (!target.is('#southj')) {
            if (!target.closest('.southgift').length) {
                $('#southj').removeClass('active'); 
                $(".southgift").hide(); 
            }
        }
    });
});

$(document).ready(function () {
    var southgiftVisible = false;

    $('#southj').click(function(event){
        event.stopPropagation();
        $(this).toggleClass('clicked'); 
      southgiftVisible = !southgiftVisible;

        if (southgiftVisible) {
            $(".southgift").show(); 
            $('#myList li:not(#southj)').addClass('disabled'); 
        } else {
            $(".southgift").hide(); 
            $('#myList li:not(#southj)').removeClass('disabled'); 
        }
    });

    $(".southgift").click(function(event) {
        event.stopPropagation(); 
    });

    $(document).click(function(event) {
        var target = $(event.target);
        if (!target.is('#southj')) {
            if (!target.closest('.southgift').length) {
                $('#southj').removeClass('clicked'); 
                $(".southgift").hide();
                $('#myList li:not(#southj)').removeClass('disabled'); 
               southgiftVisible = false;
            }
        }
    });
});
//south deisgn

$(document).ready(function () {
    $('#mumbaij').click(function(event){
        event.stopPropagation();
        $(this).toggleClass('active'); 
        $(".mumbaigift").toggle();
    });

    $(".mumbaigift").click(function(event) {
        event.stopPropagation(); 
    });

    $(document).click(function(event) {
        var target = $(event.target);
        if (!target.is('#mumbaij')) {
            if (!target.closest('.mumbaigift').length) {
                $('#mumbaij').removeClass('active'); 
                $(".mumbaigift").hide(); 
            }
        }
    });
});

$(document).ready(function () {
    var mumbaigiftVisible = false;

    $('#mumbaij').click(function(event){
        event.stopPropagation();
        $(this).toggleClass('clicked'); 
      mumbaigiftVisible = !mumbaigiftVisible;

        if (mumbaigiftVisible) {
            $(".mumbaigift").show(); 
            $('#myList li:not(#mumbaij)').addClass('disabled'); 
        } else {
            $(".mumbaigift").hide(); 
            $('#myList li:not(#mumbaij)').removeClass('disabled'); 
        }
    });

    $(".mumbaigift").click(function(event) {
        event.stopPropagation(); 
    });

    $(document).click(function(event) {
        var target = $(event.target);
        if (!target.is('#mumbaij')) {
            if (!target.closest('.mumbaigift').length) {
                $('#mumbaij').removeClass('clicked'); 
                $(".mumbaigift").hide();
                $('#myList li:not(#mumbaij)').removeClass('disabled'); 
               mumbaigiftVisible = false;
            }
        }
    });
});
// mumbai design

$(document).ready(function () {
    $('#religij').click(function(event){
        event.stopPropagation();
        $(this).toggleClass('active'); 
        $(".religigift").toggle();
    });

    $(".religigift").click(function(event) {
        event.stopPropagation(); 
    });

    $(document).click(function(event) {
        var target = $(event.target);
        if (!target.is('#religij')) {
            if (!target.closest('.religigift').length) {
                $('#religij').removeClass('active'); 
                $(".religigift").hide(); 
            }
        }
    });
});

$(document).ready(function () {
    var religigiftVisible = false;

    $('#religij').click(function(event){
        event.stopPropagation();
        $(this).toggleClass('clicked'); 
      religigiftVisible = !religigiftVisible;

        if (religigiftVisible) {
            $(".religigift").show(); 
            $('#myList li:not(#religij)').addClass('disabled'); 
        } else {
            $(".religigift").hide(); 
            $('#myList li:not(#religij)').removeClass('disabled'); 
        }
    });

    $(".religigift").click(function(event) {
        event.stopPropagation(); 
    });

    $(document).click(function(event) {
        var target = $(event.target);
        if (!target.is('#religij')) {
            if (!target.closest('.religigift').length) {
                $('#religij').removeClass('clicked'); 
                $(".religigift").hide();
                $('#myList li:not(#religij)').removeClass('disabled'); 
               religigiftVisible = false;
            }
        }
    });
});
//religious jew

$(document).ready(function () {
    $('#astroloj').click(function(event){
        event.stopPropagation();
        $(this).toggleClass('active'); 
        $(".astrolgift").toggle();
    });

    $(".astrolgift").click(function(event) {
        event.stopPropagation(); 
    });

    $(document).click(function(event) {
        var target = $(event.target);
        if (!target.is('#astroloj')) {
            if (!target.closest('.astrolgift').length) {
                $('#astroloj').removeClass('active'); 
                $(".astrolgift").hide(); 
            }
        }
    });
});

$(document).ready(function () {
    var astrolgiftVisible = false;

    $('#astroloj').click(function(event){
        event.stopPropagation();
        $(this).toggleClass('clicked'); 
      astrolgiftVisible = !astrolgiftVisible;

        if (astrolgiftVisible) {
            $(".astrolgift").show(); 
            $('#myList li:not(#astroloj)').addClass('disabled'); 
        } else {
            $(".astrolgift").hide(); 
            $('#myList li:not(#astroloj)').removeClass('disabled'); 
        }
    });

    $(".astrolgift").click(function(event) {
        event.stopPropagation(); 
    });

    $(document).click(function(event) {
        var target = $(event.target);
        if (!target.is('#astroloj')) {
            if (!target.closest('.astrolgift').length) {
                $('#astroloj').removeClass('clicked'); 
                $(".astrolgift").hide();
                $('#myList li:not(#astroloj)').removeClass('disabled'); 
               astrolgiftVisible = false;
            }
        }
    });
});
//astrological gemstones

$(document).ready(function () {
    $('#giftj').click(function(event){
        event.stopPropagation();
        $(this).toggleClass('active'); 
        $(".giftgift").toggle();
    });

    $(".giftgift").click(function(event) {
        event.stopPropagation(); 
    });

    $(document).click(function(event) {
        var target = $(event.target);
        if (!target.is('#giftj')) {
            if (!target.closest('.giftgift').length) {
                $('#giftj').removeClass('active'); 
                $(".giftgift").hide(); 
            }
        }
    });
});

$(document).ready(function () {
    var giftgiftVisible = false;

    $('#giftj').click(function(event){
        event.stopPropagation();
        $(this).toggleClass('clicked'); 
      giftgiftVisible = !giftgiftVisible;

        if (giftgiftVisible) {
            $(".giftgift").show(); 
            $('#myList li:not(#giftj)').addClass('disabled'); 
        } else {
            $(".giftgift").hide(); 
            $('#myList li:not(#giftj)').removeClass('disabled'); 
        }
    });

    $(".giftgift").click(function(event) {
        event.stopPropagation(); 
    });

    $(document).click(function(event) {
        var target = $(event.target);
        if (!target.is('#giftj')) {
            if (!target.closest('.giftgift').length) {
                $('#giftj').removeClass('clicked'); 
                $(".giftgift").hide();
                $('#myList li:not(#giftj)').removeClass('disabled'); 
               giftgiftVisible = false;
            }
        }
    });
});
//gifting jewelry

$(document).ready(function () {
    $('#alphaj').click(function(event){
        event.stopPropagation();
        $(this).toggleClass('active'); 
        $(".alphagift").toggle();
    });

    $(".alphagift").click(function(event) {
        event.stopPropagation(); 
    });

    $(document).click(function(event) {
        var target = $(event.target);
        if (!target.is('#alphaj')) {
            if (!target.closest('.alphagift').length) {
                $('#alphaj').removeClass('active'); 
                $(".alphagift").hide(); 
            }
        }
    });
});

$(document).ready(function () {
    var alphagiftVisible = false;

    $('#alphaj').click(function(event){
        event.stopPropagation();
        $(this).toggleClass('clicked'); 
      alphagiftVisible = !alphagiftVisible;

        if (alphagiftVisible) {
            $(".alphagift").show(); 
            $('#myList li:not(#alphaj)').addClass('disabled'); 
        } else {
            $(".alphagift").hide(); 
            $('#myList li:not(#alphaj)').removeClass('disabled'); 
        }
    });

    $(".alphagift").click(function(event) {
        event.stopPropagation(); 
    });

    $(document).click(function(event) {
        var target = $(event.target);
        if (!target.is('#alphaj')) {
            if (!target.closest('.alphagift').length) {
                $('#alphaj').removeClass('clicked'); 
                $(".alphagift").hide();
                $('#myList li:not(#alphaj)').removeClass('disabled'); 
               alphagiftVisible = false;
            }
        }
    });
});
//alphabetical jewelry

$(document).ready(function () {
    $('.toggleAlphaGift').click(function(event) {
        event.stopPropagation();
        var target = $(this).data('target');
        var $alphaGift = $('#' + target);

        $(this).toggleClass('clicked');
        $alphaGift.toggle(); // Toggle visibility of related .alphagift

        // Disable other clickable elements
        $('.toggleAlphaGift').not(this).addClass('disabled');
    });

    $('.alphagift').click(function(event) {
        event.stopPropagation();
    });

    $(document).click(function(event) {
        var target = $(event.target);
        if (!target.is('.toggleAlphaGift')) {
            if (!target.closest('.alphagift').length) {
                // Reset all elements to their initial state
                $('.toggleAlphaGift').removeClass('clicked');
                $('.alphagift').hide();
                $('.toggleAlphaGift').removeClass('disabled');
            }
        }
    });
});

//mega menu end