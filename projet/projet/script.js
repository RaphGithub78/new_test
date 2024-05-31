$(document).ready(function(){
    var $carrousel = $('#carrousel'),
        $img = $('#carrousel ul li'),
        indexImg = $img.length - 1,
        i = 0,
        $currentImg = $img.eq(i);

    var $graduation = $('.graduation');
    for (var j = 0; j <= indexImg; j++) {
        $graduation.append('<span class="point"></span>');
    }

    function updateGraduation() {
        $('.point').removeClass('active');
        $('.point').eq(i).addClass('active');
    }

    $('.next').click(function(){ 
        i++; 
        if (i > indexImg) {
            i = 0;
        }
        updateGraduation();
        $currentImg.fadeOut(1000);
        $currentImg = $img.eq(i);
        $currentImg.fadeIn(1000);
    });

    $('.prev').click(function(){ 
        i--;
        if (i < 0) {
            i = indexImg;
        }
        updateGraduation();
        $currentImg.fadeOut(1000);
        $currentImg = $img.eq(i);
        $currentImg.fadeIn(1000);
    });

    function slideImg() {
        i++;
        if (i > indexImg) {
            i = 0;
        }
        updateGraduation();
        $currentImg.fadeOut(1000);
        $currentImg = $img.eq(i);
        $currentImg.fadeIn(1000);
        setTimeout(slideImg, 4000); // Défilement automatique
    }

    slideImg();
});